<table id="kategori_ujian" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nama Ujian</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Tipe Ujian</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($kategori_ujian->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_ujian ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->tipe ?></td>
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
            <form id="form-edit" method="post">
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
              <div class="form-group">
                  <label for="kategorisoal">Nama Ujian</label>
                  <input type="text" autocomplete="off"class="form-control" name="nama_ujian" placeholder="Masukkan Nama Ujian">
              </div>
              <div class="form-group">
                 <label for="kategorisoal">Tipe Ujian</label>
                  <select class="form-control select2" name="id_t_ujian" id="tipe-edit" style="width: 100%;">
                    <option value="">Pilih Tipe Ujian</option>
                    <?php foreach($tipe_ujian as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tipe ?></option>
                     <?php endforeach ?>
                  </select>
                 </div>
              <div class="form-group">
                <label for="kategorisoal">Pilih Mapel</label>
                <select class="form-control select2" name="kode_mapel" id="kode_mapel-edit" style="width: 100%;">
                  <option value="">Pilih Mapel</option>
                  <?php foreach($jadwal_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                  <?php endforeach ?>
                </select>
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
        url: '<?=site_url('kategoriujian/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='nama_ujian']").val(data.object.nama_ujian);
        $("#tipe-edit").val(data.object.id_t_ujian);
        $("#kode_mapel-edit").val(data.object.kode_mapel);
        $('#kode_mapel-edit').select2({
          theme: 'bootstrap4',
          placeholder: "pilih Mapel"
        });
        $('#tipe-edit').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Tipe Ujian"
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
      url: '<?=site_url('kategoriujian/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data Kategori Soal Berhasil Diupdate.", "success");
        modal_edit.modal('hide');
        $('#kategori_ujian').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
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
             url: '<?=site_url('kategoriujian/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Kategori Soal Berhasil Dihapus.", "success");
                  $('#kategori_soal').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
</script>