<style>
.btn2{
  font-weight:900;
}
</style>
<table id="kategori_ujian" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nama Ujian</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Tipe Ujian</th>
         <th class="text-center">Soal Tersedia</th>
         <th class="text-center">Tanggal Dibuat</th>
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
        ?>
        <?php foreach($kategori_ujian->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_ujian ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->tipe ?></td>
            <td class="text-center"><?php echo $result->jumlah_soal ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->tgl_dibuat))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_dibuat)) ?></td>
            <td class="text-center">
                <i class="btn btn2 btn-xs btn-primary fas fa-share share-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Share"></i>
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
      <?php foreach($tahun_aktif->result() as $result) : ?>
        <?php $id_t_akademik= $result->id ?>
        <?php $semester = $result->semester ?>
      <?php endforeach;?>
      <div class="modal fade" id="modal-share">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Share Quiz Ke Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-share" method="post">
      <div class="col-lg-12">
          <input type="hidden" name="id"/>
          <input type="hidden" value="<?php echo $id_t_akademik ?>" name="id_t_akademik"/>
          <input type="hidden" value="<?php echo $semester ?>" name="semester"/>
          <input type="hidden" id="kode_mapel_share"name="kode_mapel_share"/>
          <input type="hidden" id="soal_tersedia2"name="soal_tersedia2"/>
          <div class="form-group">
              <label for="judul">Nama Ujian</label>
              <input type="text" autocomplete="off"class="form-control" name="nama" placeholder="Masukkan Nama Ujian" disabled='disabled'>
          </div>
          <div class="form-group">
              <label for="tipe">Tipe</label>
              <input type="text" autocomplete="off" class="form-control" name="tipe" placeholder="Masukkan tipe Ujian" disabled="disabled">
          </div>
          <div class="form-group">
              <label for="judul">Tanggal Dibuat</label>
              <input type="text" autocomplete="off"class="form-control" name="tgl_dibuat" placeholder="Masukkan Tanggal Dibuat" disabled='disabled'>
          </div>
          <div class="form-group">
              <label for="jadwaltbh">Mapel</label>
              <input type="text" autocomplete="off" class="form-control" name="jadwaltbh" placeholder="Masukkan Mapel" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Pilih Kelas</label>
            <select class="form-control select2" name="kelas" onchange="myKelas()" id="kelastbh" style="width: 100%;" disabled="disabled">
                <option value="">Pilih Kelas</option>
            </select>
          </div>
          <label for="tanggal">Tanggal Jadwal</label>
          <div class="input-group mb-3">
              <input type="text" autocomplete="off" class="form-control" onchange="myTanggal()" id="date-absensi_permapel" name="tanggal_absensi" placeholder="Hari, DD MM YYYY" disabled='disabled'>
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-check nav-icon"></i></i></span>
              </div>
          </div>
          <input type="hidden" name="tanggal" id="tanggal_tbh"/>
          <div class="form-group">
            <label>Jam Jadwal</label>
            <select class="form-control select2" name="jam" id="jamtbh" onchange="myJam()" style="width: 100%;" disabled="disabled">
                <option value="">Pilih Kelas</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Mengerjakan</label>
            <input type="datetime-local" autocomplete="off" onchange="myMulai()"  class="form-control" name="tgl_mulai" id="tgl_mulai" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Batas Akhir Pengerjaan</label>
            <input type="datetime-local"   autocomplete="off" onchange="mySelesai()"  class="form-control" name="tgl_selesai" id="tgl_selesai" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Waktu Pengerjaan(Menit)</label>
            <input type="number" min="1" placeholder="Masukkan Waktu Pengerjaan" autocomplete="off"  class="form-control" name="waktu" id="waktu_ujian" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Jumlah Soal Tersedia</label>
            <input type="number" autocomplete="off" onchange="myJumlah()"  class="form-control" name="soal_tersedia" id="soal_tersedia" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Jumlah Soal Ujian</label>
            <input type="number" min="1" placeholder="Masukkan Jumlah Soal Quiz" autocomplete="off"  class="form-control" name="jumlah_soal" id="jumlah_soal" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Jenis Soal</label>
              <select class="form-control select2" name="jenis_soal" id="jenis_soal" style="width: 100%;" disabled="disabled">
                  <option value="acak">Acak Soal</option>
                  <option value="urut">Urutkan Soal</option>
              </select>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="submit" id="submit_tbh" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
</div>
  <!-- /.modal-dialog -->
</div>

<script>
    $('#jamtbh').select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Jam"
    });
    $('#kelastbh').select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Kelas"
    });
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
    modal_share = $("#modal-share");
    $(".share-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('kategoriujian/get_share_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-share input[name='id']").val(data.object.id);
        $("#form-share input[name='nama']").val(data.object.nama_ujian);
        $("#form-share input[name='soal_tersedia']").val(data.object.jumlah_soal);
        $("#form-share input[name='soal_tersedia2']").val(data.object.jumlah_soal);
        $("#form-share input[name='tipe']").val(data.object.tipe);
        $("#form-share input[name='tgl_dibuat']").val(data.object.tgl_dibuat);
        $("#form-share input[name='kode_mapel_share']").val(data.object.kode_mapel);
        $("#form-share input[name='jadwaltbh']").val(data.object.mapel);
        if($("#kode_mapel_share").val()!=''){
          let kode_mapel = $("#kode_mapel_share").val();
          $.ajax({
            url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
            type: 'GET',
            dataType: 'json',
            data: {kode_mapel: kode_mapel},
            success: function(response) {
              $("#kelastbh").prop("disabled", false).empty();
              $("#kelastbh").append(new Option("Pilih Kelas", ""));
              $.each(response,function(index,data){
              $('#kelastbh').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
            });
            },
            error: function (request, status, error) {
              alert('data Kelas Untuk Mapel Ini Kosong');
              $("#kelastbh").prop("disabled", true).empty();
            }
          })
        }else{
          //jangan lakukan apa2
        }
        modal_share.modal('show').on('shown.bs.modal', function(e) {
          $("#form-share input[name='id']").focus();
        });
      });
    });
  function myKelas()
    { 
      let kode_mapel = $("#kode_mapel_share").val();
      let kode_kelas = $("#kelastbh").val();
      $.ajax({
        url: '<?=site_url('absensipermapel/get_hari_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          kode_mapel: kode_mapel,
          kode_kelas: kode_kelas
        },
        success: function(response) {
          $("#date-absensi_permapel").prop("disabled", false).val('');
          $("#jamtbh").prop("disabled", true).empty();
          var hari = [];
          $.each(response,function(index,data){
            hari.push(data);
          });
          $(function() {
            if (!$.fn.bootstrapDP && $.fn.datepicker && $.fn.datepicker.noConflict) {
            var datepicker = $.fn.datepicker.noConflict();
            $.fn.bootstrapDP = datepicker;
          }
          $("#date-absensi_permapel").bootstrapDP().datepicker('remove');
          $("#date-absensi_permapel").bootstrapDP({
            todayBtn: "linked",
            language: "id",
            locale: "id",
            format: 'DD,dd MM yyyy',
            daysOfWeekHighlighted: hari,
            todayHighlight: true,
            beforeShowDay: function (date) {
            // var allDates = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            var allDates = date.getDay();
            if(hari.indexOf(allDates) != -1)
              return true;
              else
              return false;
            }
           }).on('changeDate', function(e) {
              //$('#other-input').val(e.format(0,"dd/mm/yyyy"));
              // alert(e.date);
              $('#tanggal_tbh').val(e.format(0,"yyyy-mm-dd"));
             });
          });
        },
        error: function (request, status, error) {
          alert('Maaf Belum Memilih Kelas');
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
          $("#jamtbh").prop("disabled", true).empty();
        }
      })
    }
  function myTanggal()
    { 
      const week_of_day_arr = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const number_of_day_arr = ['8', '2', '3', '4', '5', '6', '7'];
      var dateString = document.getElementById('date-absensi_permapel').value
      var day = week_of_day_arr[new Date(dateString).getDay()];
      var number_day = number_of_day_arr[new Date(dateString).getDay()];
      let kode_mapel = $("#kode_mapel_share").val();
      let kode_kelas = $("#kelastbh").val();
      var hilangkan_tanggal = dateString.indexOf(',');
      var hari =dateString.substring(0, hilangkan_tanggal);
      $.ajax({
        url: '<?=site_url('absensipermapel/get_jam_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          hari: hari,
          kode_mapel: kode_mapel,
          kode_kelas: kode_kelas
        },
        success: function(response) {
          $("#jamtbh").prop("disabled", false).empty();
          $("#jamtbh").append(new Option("Pilih Jam", ""));
          $.each(response,function(index,data){
           $('#jamtbh').append('<option value="'+data['id']+'">'+data['jam_mulai']+'-'+data['jam_selesai']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('Maaf Jadwal Tidak Tersedia Untuk Hari Ini');
          $("#jamtbh").prop("disabled", true).empty();
          $("#tgl_batas").prop("disabled", true).empty();
        }
      })
  }
  function myJam(){
    $("#tgl_mulai").prop("disabled", false).empty();
    set_min_date();
  }
  function myMulai(){
    $("#tgl_selesai").prop("disabled", false).empty();
    var i = $("#tgl_mulai").val();
    document.getElementById("tgl_selesai").setAttribute("min", i);
  }
  function mySelesai(){
    var i = $("#tgl_mulai").val();
    document.getElementById("tgl_selesai").setAttribute("min", i);
    $("#waktu_ujian").prop("disabled", false).empty();
  }
  $('#waktu_ujian').on('input', function() {
    $("#jumlah_soal").prop("disabled", false).empty();
  });
  $('#jumlah_soal').on('input', function() {
    if( parseInt($("#soal_tersedia2").val()) == 0){
      swal("Bank Soal Kosong!", "Bank Soal untuk kategori ini kosong.Harap buat soal terlebih dahulu di bank soal.", "warning");
      $("#jenis_soal").prop("disabled", true);
    }else if(parseInt($("#soal_tersedia2").val()) < parseInt($("#jumlah_soal").val())){
      swal("Bank Soal Kurang!", "Jumlah soal melebihi soal yang ada pada bank soal.", "warning");
      $("#jenis_soal").prop("disabled", true);
    }else if(parseInt($("#soal_tersedia2").val()) >= parseInt($("#jumlah_soal").val())){
      $("#jenis_soal").prop("disabled", false);
    }else{
      $("#jenis_soal").prop("disabled", true);
    }
  });
  $("#form-share").submit(function(e) {
      // stop submiting the form e.preventDefault();
      e.preventDefault();
      form = $(this);
      $.ajax({
       url: '<?=site_url('kategoriujian/crud/share')?>',
       type: 'POST',
       data: form.serialize(),
      success: function(response){
        modal_share.modal('hide');
        if (response == 'exists')
          Swal1();
        else if (response == 'success')
          Swal2();
        $("#kelastbh").prop("disabled", true);
        $("#jamtbh").prop("disabled", true);
        $("#date-absensi_permapel").prop("disabled", true);
        refresh_table();
      },
      error: function(response){
          alert('Terjadi Kesalahan');
      }
     })
  });
  $('#modal-share').on('hidden.bs.modal', function () {
    $("#kelastbh").prop("disabled", true).empty();
    $("#date-absensi_permapel").prop("disabled", true);
    $("#date-absensi_permapel").val('');
    $("#jamtbh").prop("disabled", true).empty();
    $("#tgl_batas").prop("disabled", true);
    $("#tgl_batas").val('');
  });
  function Swal1(){
    swal({
     title: "Quiz Sudah Ada!",
     text: "Quiz Telah di bagikan ke kelas dan jadwal yang dipilih.",
     type: "warning",
     showConfirmButton: true
    })
  }
  function Swal2(){
    swal({
     title: "Berhasil!",
     text: "Data Quiz Berhasil dibagikan ke kelas dan jadwal yang dipilih.",
     type: "success",
     showConfirmButton: true
    })
  }
  function Swal3(){
    swal({
     title: "Status!",
     text: "Sedang membagikan quiz untuk siswa.Harap Tunggu...",
     type: "warning",
     showConfirmButton: false
    });
    }
    function set_min_date(){
      <?php 
          $timezone = new DateTimeZone('Asia/Jakarta');
          $date = new DateTime();
          $date->setTimeZone($timezone);
      ?>
      var e= <?php echo  '"'.$date->format('Y-m-d').'"';?>;
    document.getElementById("tgl_mulai").setAttribute("min", e+'T00:00');
    }
</script>