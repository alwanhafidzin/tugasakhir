<table id="gurumapel" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">NIP</th>
         <th class="text-center">Guru</th>
         <th class="text-center">Nama Mapel</th>
         <th class="text-center">Kelompok Mapel</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($gurumapel->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nip ?></td>
            <td class="text-center"><?php echo $result->nama ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->kelompok_mapel ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Jurusan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
              <div class="col-lg-12">
              <input type="hidden" name="id"/>
              <div class="form-group">
                  <label>NIP Guru</label>
                  <select class="form-control select2" id="guru_sl2_edit" name="guru" style="width: 100%;">
                     <?php foreach($guru as $row) : ?>
                      <option value="<?php echo $row->nip ?>"><?php echo $row->nip ?>-<?php echo $row->nama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="mapel" onchange="myMapelEdit()" id="mapel_sl2_edit" style="width: 100%;">
                    <?php foreach($mapel as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->kode_mapel ?>(<?php echo $row->mapel ?>)</option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="kelompok_mapel">Kelompok Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="kelompok_mapel" id="kelompok_mapel_edit" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="mapel">Jurusan</label>
                    <input type="text" autocomplete="off"class="form-control" name="jurusan" id="jurusan_edit" disabled="disabled">
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

<script>
  //Menampilkan data diedit
    modal_edit = $("#modal-edit");
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('gurumapel/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='kelompok_mapel']").val(data.object.kelompok_mapel);
        $("#form-edit input[name='jurusan']").val(data.object.jurusan);
        $("#guru_sl2_edit").val(data.object.nip);
        $("#mapel_sl2_edit").val(data.object.kode_mapel);
        $('#mapel_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        $('#guru_sl2_edit').select2({
         theme: 'bootstrap4'
        });
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='id']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('gurumapel/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        modal_edit.modal('hide');
        swal("Berhasil!", "Data Jurusan Berhasil Diedit.", "success");
        $('#gurumapel').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Data Gagal diedit terjadi kesalahan.", "error");
      }
     })
    });
    $(".hapus-data").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      swal({
        title: "Apa Anda Yakin?",
        text: "Data yang terhapus,tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?=site_url('gurumapel/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
              swal("Gagal!", "Data Gagal dihapus terjadi kesalahan.", "error");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#gurumapel').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
    function myMapelEdit()
    { 
      let id_mapel = $("#mapel_sl2_edit").val();
      $.ajax({
        url: '<?=site_url('gurumapel/get_detail_mapel')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_mapel: id_mapel},
        success: function(data) {
          $("#kelompok_mapel_edit").val(data.object.kelompok_mapel);
          $("#jurusan_edit").val(data.object.jurusan);
        },
        error: function (request, status, error) {
          alert(request.responseText);
        }
      })
    }
</script>