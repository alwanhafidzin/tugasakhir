<table id="ruangan" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Ruangan</th>
         <th class="text-center">Ruangan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($ruangan->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_ruangan ?></td>
            <td class="text-center"><?php echo $result->ruangan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_ruangan ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_ruangan ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Ruangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kode_ruangan-edit">Kode Ruangan</label>
                    <input type="text" class="form-control" autocomplete="off" maxlength="10" name="kode_ruangan" id="kode_ruangan-edit" placeholder="Masukkan Kode Ruangan" required>
                </div>
                <div class="form-group">
                    <label for="ruangan">Nama Ruangan</label>
                    <input type="text" class="form-control" autocomplete="off" name="ruangan" placeholder="Masukkan Nama Ruangan" required>
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
          url: '<?=site_url('ruangan/cek_relasi')?>',
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
      url: '<?=site_url('ruangan/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        modal_edit.modal('hide');
        form[0].reset();
        swal("Berhasil!", "Data Ruangan Berhasil Diedit.", "success");
        $('#ruangan').DataTable().clear().destroy();
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
          url: '<?=site_url('ruangan/cek_relasi')?>',
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
             url: '<?=site_url('ruangan/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
              swal("Gagal!", "Data Gagal dihapus terjadi kesalahan.", "error");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#ruangan').DataTable().clear().destroy();
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
        url: '<?=site_url('ruangan/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.kode_ruangan);
        $("#form-edit input[name='kode_ruangan']").val(data.object.kode_ruangan);
        $("#form-edit input[name='ruangan']").val(data.object.ruangan);
        $("#kode_ruangan-edit").prop("disabled", false);
        $("label[for='kode_ruangan-edit']").text("Kode Ruangan");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='kode_ruangan']").focus();
        });
      });
    }
    function get_data_relation(){
      $.ajax({
        url: '<?=site_url('ruangan/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.kode_ruangan);
        $("#form-edit input[name='kode_ruangan']").val(data.object.kode_ruangan);
        $("#form-edit input[name='ruangan']").val(data.object.ruangan);
        $("#kode_ruangan-edit").prop("disabled", true);
        $("label[for='kode_ruangan-edit']").text("Kode Ruangan(Berelasi)");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='kode_ruangan']").focus();
        });
      });
    }
</script>