<table id="kelas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Kelas</th>
         <th class="text-center">Nama Kelas</th>
         <th class="text-center">Tingkatan Kelas</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($kelas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_kelas ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td class="text-center"><?php echo $result->tingkatan ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_kelas ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_kelas ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-kelas">
            <input type="hidden" name="id"/>
              <div class="col-lg-12">
               <div class="form-group">
                    <label for="kode_kelas-edit">Kode Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="kode_kelas" id="kode_kelas-edit" maxlength="11" placeholder="Masukkan Kode Kelas" required>
                </div>
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama_kelas" placeholder="Masukkan Nama " required>
                </div>
                <div class="form-group">
                  <label>Tingkatan Kelas</label>
                  <select class="form-control select2" name="kode_tingkat" id="kode_tingkat-edit" style="width: 100%;" required>
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control select2" name="kode_jurusan" id="kode_jurusan-edit" style="width: 100%;" required>
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
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
          url: '<?=site_url('kelas/cek_relasi')?>',
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
    $("#form-edit-kelas").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('kelas/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data Kelas Berhasil Diedit.", "success");
        modal_edit.modal('hide');
        $('#kelas').DataTable().clear().destroy();
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
          url: '<?=site_url('kelas/cek_relasi')?>',
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
             url: '<?=site_url('kelas/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
              swal("Gagal!", "Data gagal dihapus,terjadi kesalahan.", "error");
             },
             success: function(data) {
                  swal("Berhasil!", "Data yang dipilih berhasil dihapus.", "success");
                  $('#kelas').DataTable().clear().destroy();
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
        url: '<?=site_url('kelas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-kelas input[name='id']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='kode_kelas']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='nama_kelas']").val(data.object.nama_kelas);
        $("#kode_tingkat-edit").val(data.object.kode_tingkat);
        $("#kode_jurusan-edit").val(data.object.kode_jurusan);
        $("#kode_kelas-edit").prop("disabled", false);
        $('#kode_jurusan-edit').select2({
          theme: 'bootstrap4'
        });
        $('#kode_tingkat-edit').select2({
          theme: 'bootstrap4'
        })
        $("label[for='kode_kelas-edit']").text("Kode Kelas");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-kelas input[name='kode_kelas']").focus();
        });
      });

    }
    function get_data_relation(){
      $.ajax({
        url: '<?=site_url('kelas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-kelas input[name='id']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='kode_kelas']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='nama_kelas']").val(data.object.nama_kelas);
        $("#kode_tingkat-edit").val(data.object.kode_tingkat);
        $("#kode_jurusan-edit").val(data.object.kode_jurusan);
        $("#kode_kelas-edit").prop("disabled", true);
        $('#kode_jurusan-edit').select2({
          theme: 'bootstrap4'
        });
        $('#kode_tingkat-edit').select2({
          theme: 'bootstrap4'
        });
        $("label[for='kode_kelas-edit']").text("Kode Kelas(Berelasi)");
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-kelas input[name='kode_kelas']").focus();
        });
      });
    }
</script>