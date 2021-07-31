<table id="akun" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center"><input type="checkbox" id="check-all"></th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Tipe</th>
                    <th class="text-center">Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($buat_akun->result() as $result) : ?>
                     <tr>
                       <td class="text-center"><?php echo $no++ ?></td>
                       <td class="text-center"><input type='checkbox' class='check-item' value="<?php echo $result->id ?>"></td>
                       <td class="text-center"><?php echo $result->identity ?></td>
                       <td class="text-center"><?php echo $result->nama ?></td>
                       <td class="text-center"><?php echo $result->email ?></td>
                       <td class="text-center"><?php echo $result->tipe ?></td>
                       <td class="text-center"><?php if($result->active==1){echo '<button type="button" class="btn btn-success btn-xs">Aktif</button>';}else{echo '<button type="button" class="btn btn-warning btn-xs">Nonaktif</button>';}  ?></td>
                     </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
      <div class="modal fade" id="modal-buat-guru">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buat Akun Guru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-guru">
            <input type="hidden" name="id">
            <input type="hidden" name="nama_guru">
            <input type="hidden" name="email_guru">
            <div class="col-lg-12">
                <h5>Password Sementara akan dikirim lewat Email</h5>
                <div class="form-group">
                    <label for="nip">Nip</label>
                    <input type="text" class="form-control" autocomplete="off" name="nip" placeholder="Masukkan Nip" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Masukkan Nama" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control" autocomplete="off" name="email" placeholder="Masukkan Email" disabled="disabled">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary">Buat Akun</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-buat-siswa">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buat Akun Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-siswa">
            <input type="hidden" name="id">
            <input type="hidden" name="nama_siswa">
            <input type="hidden" name="email_siswa">
            <div class="col-lg-12">
                <h5>Password Sementara akan dikirim lewat Email</h5>
                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" class="form-control" autocomplete="off" name="nis" placeholder="Masukkan Nis" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Masukkan Nama" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control" autocomplete="off" name="email" placeholder="Masukkan Email" disabled="disabled">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary">Buat Akun</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

<script>
  //Menampilkan data diedit
    modal_guru = $("#modal-buat-guru");
    modal_siswa = $("#modal-buat-siswa");
    $(".buat_akun").click(function(e) {
      id = $(this).data('id');
      tipe = $(this).data('tipe');
      if(tipe=='siswa'){
        $.ajax({
        url: '<?=site_url('buatakun/get_by_id_siswa')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id: id
        },
        })
        .done(function(data) {
          $("#form-siswa input[name='id']").val(data.object.nis);
          $("#form-siswa input[name='nis']").val(data.object.nis);
          $("#form-siswa input[name='nama']").val(data.object.nama);
          $("#form-siswa input[name='email']").val(data.object.email);
          $("#form-siswa input[name='nama_siswa']").val(data.object.nama);
          $("#form-siswa input[name='email_siswa']").val(data.object.email);
          modal_siswa.modal('show').on('shown.bs.modal', function(e) {
            $("#form-siswa input[name='id']").focus();
          });
        });
      }else if(tipe=='guru'){
        $.ajax({
        url: '<?=site_url('buatakun/get_by_id_guru')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id: id
        },
        })
        .done(function(data) {
          $("#form-guru input[name='id']").val(data.object.nip);
          $("#form-guru input[name='nip']").val(data.object.nip);
          $("#form-guru input[name='nama']").val(data.object.nama);
          $("#form-guru input[name='email']").val(data.object.email);
          $("#form-guru input[name='nama_guru']").val(data.object.nama);
          $("#form-guru input[name='email_guru']").val(data.object.email);
          modal_guru.modal('show').on('shown.bs.modal', function(e) {
            $("#form-guru input[name='nip']").focus();
          });
        });
      }
    });
    //Proses Update ke Db
    $("#form-guru").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('buatakun/crud/insert_akun_guru')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        modal_guru.modal('hide');
        swal("Berhasil!", "Akun Guru Berhasil Dibuat,Password Sementara dikirim via email.", "success");
        $('#akun').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Email Gagal Dikirim,Silahakan Cek Koneksi.", "error");
      }
     })
    });
    $("#form-siswa").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('buatakun/crud/insert_akun_siswa')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        modal_guru.modal('hide');
        swal("Berhasil!", "Akun Siswa Berhasil Dibuat,Password Sementara dikirim via email.", "success");
        $('#akun').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Email Gagal Dikirim,Silahakan Cek Koneksi.", "error");
      }
     })
    });
    $("#check-all").click(function(){
      if($(this).is(":checked"))
        $(".check-item").prop("checked", true); 
      else 
        $(".check-item").prop("checked", false);
    });
    function updateStatus(){
      var arr = [];
      $('input.check-item:checkbox:checked').each(function () {
          arr.push($(this).val());
      });
      alert(JSON.stringify(arr));
      if(arr.length == 0){
        swal("Gagal!", "Tidak ada data yang dipilih,centang checkbox untuk merubah status", "warning");
      }else{
        $.ajax({
             url: '<?=site_url('listuser/crud/update_status')?>',
             type: 'POST',
             dataType: 'json',
             data: {arr:arr},
             error: function() {
              swal("Gagal!", "Tidak dapat terhubung ke server.periksa koneksi anda", "error");
             },
             success: function(data) {
                swal("Berhasil!", "Status User  berhasil dirubah.", "success");
                $('#siswa').DataTable().clear().destroy();
                refresh_table();
             }
          });
      }
    }
</script>