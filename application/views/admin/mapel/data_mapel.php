<table id="mapel" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Mapel</th>
         <th class="text-center">Nama Mapel</th>
         <th class="text-center">Kelompok Mapel</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($mapel->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_mapel ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->kelompok_mapel ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_mapel ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_mapel ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Mapel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
              <div class="col-lg-12">
              <div class="form-group">
                    <label for="kode_mapel-edit">Kode Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" maxlength="11" name="kode_mapel" id="kode_mapel-edit" placeholder="Masukkan Kode Mapel" required>
                </div>
                <div class="form-group">
                    <label for="mapel">Nama Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="mapel" placeholder="Masukkan Nama Mapel" required>
                </div>
                <div class="form-group">
                  <label>Kelompok Mapel</label>
                  <select class="form-control select2" id="kelompok_mapel_sl2_edit" name="kelompok_mapel" style="width: 100%;" required>
                     <?php foreach($kelompok_mapel as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->kelompok_mapel ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control select2" name="jurusan" id="jurusan_sl2_edit" style="width: 100%;" required>
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
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
          url: '<?=site_url('mapel/cek_relasi')?>',
          type: 'GET',
          data: {
              id : id
          },
          success: function(response){
              if (response == 'gagal')
              get_data_relation();
              else if (response == 'hapus')
              get_data_no_relation();
              },
          error: function(response){
            swal("Gagal!", "Tidak dapat terhubung ke server.periksa koneksi anda", "error");
          }
      })
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('mapel/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        modal_edit.modal('hide');
        swal("Berhasil!", "Data Mapel Berhasil Diedit.", "success");
        $('#mapel').DataTable().clear().destroy();
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
      $.ajax({
          url: '<?=site_url('mapel/cek_relasi')?>',
          type: 'GET',
          data: {
              id : id
          },
          success: function(response){
              if (response == 'gagal')
              swal("Peringatan!", "Data yang dipilih tidak dapat dihapus karena berelasi dengan data lainnya,hapus data relasi terlebih dahulu", "warning");
              else if (response == 'hapus')
              hapus();
              },
          error: function(response){
            swal("Gagal!", "Tidak dapat terhubung ke server.periksa koneksi anda", "error");
          }
      })
    });
    function hapus(){
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
             url: '<?=site_url('mapel/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
              swal("Gagal!", "Data Gagal dihapus terjadi kesalahan.", "error");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#mapel').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    }
    function get_data_no_relation(){
      $.ajax({
        url: '<?=site_url('mapel/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='kode_mapel']").val(data.object.kode_mapel);
        $("#form-edit input[name='mapel']").val(data.object.mapel);
        $("#kelompok_mapel").val(data.object.id_k_mapel);
        $("#jurusan").val(data.object.kode_jurusan);
        $("#kode_jurusan-edit").prop("disabled", false);
        $("label[for='kode_mapel-edit']").text("Kode Mapel");
        $('#kelompok_mapel_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        $('#jurusan_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='kode_mapel']").focus();
        });
      });

    }
    function get_data_relation(){
      $.ajax({
        url: '<?=site_url('mapel/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='kode_mapel']").val(data.object.kode_mapel);
        $("#form-edit input[name='mapel']").val(data.object.mapel);
        $("#kelompok_mapel").val(data.object.id_k_mapel);
        $("#jurusan").val(data.object.kode_jurusan);
        $("#kode_mapel-edit").prop("disabled", true);
        $("label[for='kode_mapel-edit']").text("Kode Mapel(Berelasi)");
        $('#kelompok_mapel_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        $('#jurusan_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='kode_mapel']").focus();
        });
      });
    }
</script>