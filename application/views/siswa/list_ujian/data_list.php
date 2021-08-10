<table id="list_ujian" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nama Quiz</th>
         <th class="text-center">Tipe Quiz</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Jumlah Soal</th>
         <th class="text-center">Waktu</th>
         <th class="text-center">Tanggal Dibagikan</th>
         <th class="text-center">Tanggal Pengerjaan</th>
         <th class="text-center">Batas Pengerjaan</th>
         <th class="text-center">Jadwal</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php
          function hariIndo ($hariInggris) {
            switch ($hariInggris) {
              case 'Sunday':
                return 'Minggu';
              case 'Monday':
                return 'Senin';
              case 'Tuesday':
                return 'Selasa';
              case 'Wednesday':
                return 'Rabu';
              case 'Thursday':
                return 'Kamis';
              case 'Friday':
                return 'Jumat';
              case 'Saturday':
                return 'Sabtu';
              default:
                return 'hari tidak valid';
            }
          }
          function url_base64_encode($str = '')
          {
            return strtr(base64_encode($str), '+=/', '.-~');
          }
        ?>
        <?php foreach($list_ujian->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_ujian ?></td>
            <td class="text-center"><?php echo $result->tipe ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->jumlah_soal ?></td>
            <td class="text-center"><?php echo $result->waktu.' menit' ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->tgl_share))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_share)) ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->tgl_mulai))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_mulai)) ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->terlambat))).' '.date("d-m-Y H:i:s", strtotime($result->terlambat)) ?></td>
            <td class="text-center"><?php echo $result->tipe ?></td>
            <td class="text-center">
                <?php if ($result->jumlah==0 && $result->selesai==null){
                  echo'<button type="button" class="btn btn-primary btn-sm kerjakan"data-id="'.url_base64_encode($result->id).'"">Kerjakan</button>';
                }else if($result->jumlah==1 && $result->selesai=='N'){
                  echo'<button type="button" class="btn btn-success btn-sm lanjutkan"data-id="'.url_base64_encode($result->id).'">Lanjutkan</button>';
                }else if($result->jumlah==1 && $result->selesai=='Y'){
                  echo'<button type="button" class="btn btn-info btn-sm aktifkan"data-id="'.url_base64_encode($result->id).'">Nilai</button>';
                } ?>
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
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kategorisoal">Kategori Soal</label>
                    <input type="text" autocomplete="off"class="form-control" name="kategori_soal" placeholder="Masukkan Nama Kategori Soal">
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
    $(".lihat-ujian").click(function(e) {
      id = $(this).data('id');
      id_k_ujian = $(this).data('id_k_ujian');
      waktu = $(this).data('waktu');
      jenis = $(this).data('jenis');
      $.ajax({
      url: '<?=site_url('listujiansiswa/buat_soal')?>',
      type: 'POST',
      dataType: 'json',
      data:{
          id :id,
          id_k_ujian : id_k_ujian,
          waktu : waktu,
          jenis : jenis
      },
      success: function(data){ 
        swal("Berhasil!", "Data Berhasil Ditambahkan.", "success");
      },
      error: function(response){
          alert(response);
      }
     })
    });
    var base_url = "<?php echo base_url();?>";
  //Menampilkan data diedit
    $(".kerjakan").click(function(e) {
      id = $(this).data('id');
      location.href = base_url+`ujian/token/${id}`;
    });
    $(".lanjutkan").click(function(e) {
      id = $(this).data('id');
      location.href = base_url+`ujian/token/${id}`;
    });
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
      url: '<?=site_url('kategorisoal/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
       data:{
           id :id
       },
      })
      .done(function(data) {
        alert('Ok Berhasil');
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('kategorisoal/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data Kategori Soal Berhasil Diupdate.", "success");
        modal_edit.modal('hide');
        $('#kategori_soal').DataTable().clear().destroy();
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
             url: '<?=site_url('kategorisoal/crud/delete')?>',
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
    $(".kerjakan").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      $.ajax({
       url: '<?=site_url('ujian/cek_waktu')?>',
       type: 'GET',
       data: {
         id : id
       },
      success: function(response){
        if (response == 'belum')
          Swal1();
        else if (response == 'selesai')
          Swal2();
        else if (response == 'error')
        Swal3();
        },
      error: function(response){
          alert('Tidak Terhubung dengan server,periksa koneksi');
      }
     })
    });
  function Swal1(){
    swal({
     title: "Tunggu!",
     text: "Belum Waktunya Mengerjakan Quiz yang dipilih.Lihat tanggal pengerjaan!",
     type: "warning",
     showConfirmButton: true
    })
  }
  function Swal2(){
    swal({
     title: "Batas Waktu Berakhir!",
     text: "Batas waktu untuk pengerjaan telah habis.Silahkan hubungi guru pembuat quiz!",
     type: "warning",
     showConfirmButton: true
    })
  }
  function Swal3(){
    swal({
     title: "Error!",
     text: "Sepertinya terjadi kesalahan di server",
     type: "error",
     showConfirmButton: false
    });
  }
</script>