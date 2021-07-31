<table id="tingkatkelas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Tingkat Kelas</th>
         <th class="text-center">Tingkat Kelas</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($tingkat_kelas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_tingkat ?></td>
            <td class="text-center"><?php echo $result->tingkatan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_tingkat ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_tingkat ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Tingkat Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-tingkatan">
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kode_tingkat-edit">Kode Tingkat Kelas</label>
                    <input type="text" class="form-control" autocomplete="off" name="kode_tingkat" maxlength="8" id="kode_tingkat-edit" placeholder="Masukkan Kode Tingkat Kelas" required>
                </div>
                <div class="form-group">
                    <label for="tingkatan">Nama Tingkat Kelas</label>
                    <input type="text" class="form-control" autocomplete="off" name="tingkatan" placeholder="Masukkan Nama Tingkat Kelas" required>
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
          url: '<?=site_url('tingkatkelas/cek_relasi')?>',
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
    $("#form-edit-tingkatan").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('tingkatkelas/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        modal_edit.modal('hide');
        swal("Berhasil!", "Data Tingkat Kelas Berhasil Diedit.", "success");
        $('#tingkatkelas').DataTable().clear().destroy();
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
      $.ajax({
          url: '<?=site_url('tingkatkelas/cek_relasi')?>',
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
             url: '<?=site_url('tingkatkelas/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
              swal("Gagal!", "Data Gagal dihapus terjadi kesalahan.", "error");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#jurusan').DataTable().clear().destroy();
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
        url: '<?=site_url('tingkatkelas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-tingkatan input[name='id']").val(data.object.kode_tingkat);
        $("#form-edit-tingkatan input[name='kode_tingkat']").val(data.object.kode_tingkat);
        $("#form-edit-tingkatan input[name='tingkatan']").val(data.object.tingkatan);
        $("#kode_tingkat-edit").prop("disabled", false);
        $("label[for='kode_tingkat-edit']").text("Kode Tingkat Kelas");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-tingkatan input[name='tingkatan']").focus();
        });
      });
    }
    function get_data_relation(){
      $.ajax({
        url: '<?=site_url('tingkatkelas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-tingkatan input[name='id']").val(data.object.kode_tingkat);
        $("#form-edit-tingkatan input[name='kode_tingkat']").val(data.object.kode_tingkat);
        $("#form-edit-tingkatan input[name='tingkatan']").val(data.object.tingkatan);
        $("#kode_tingkat-edit").prop("disabled", true);
        $("label[for='kode_tingkat-edit']").text("Kode Tingkat Kelas(Berelasi)");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-tingkatan input[name='tingkatan']").focus();
        });
      });
    }
</script>