<script>
  function refresh_table() {
  var id_t_akademik = $("#filter_t_akademik").val();
  var semester = $("#filter_semester").val();
  var kode_mapel = $('#filter_mapel').val();
  var kode_kelas = $('#filter_kelas').val();
  $.ajax({
      type: 'GET',
      url: "<?php echo base_url(); ?>/tambahnilai/get_all",
      data: {
        id_t_akademik : id_t_akademik,
        semester : semester,
        kode_mapel : kode_mapel,
        kode_kelas : kode_kelas
      },
      success: function(data) {
        $("#tampil").html(data);
        $('#nilai').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false
        });
      }
    });
  };
  refresh_table();
  $('#filter_t_akademik').select2({
    theme: 'bootstrap4',
    placeholder: "Filter Tahun Akademik"
  });
  $('#filter_mapel').select2({
    theme: 'bootstrap4',
    placeholder: "Filter Mapel"
  });
  $('#filter_kelas').select2({
    theme: 'bootstrap4',
    placeholder: "Filter Kelas"
  });
  $('#filter_semester').select2({
    theme: 'bootstrap4',
    placeholder: "Filter Semester"
  });
  let kode_mapel = $("#filter_mapel").val();
  if(kode_mapel ==''){
      $.ajax({
      url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal_all')?>',
      type: 'GET',
      dataType: 'json',
      data: {kode_mapel: kode_mapel},
      success: function(response) {
        $("#filter_kelas").empty();
        $("#filter_kelas").append(new Option("Pilih Kelas", ""));
        $("#filter_kelas").append(new Option("Perlihatkan Semua", "0"));
        $.each(response,function(index,data){
          $('#filter_kelas').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
        });
      },
      error: function (request, status, error) {
        alert('data Kelas Untuk Mapel Ini Kosong');
      }
  })
  }
  function myMapel()
  { 
    let kode_mapel = $("#filter_mapel").val();
    if(kode_mapel =='0'){
      $.ajax({
      url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal_all')?>',
      type: 'GET',
      dataType: 'json',
      data: {kode_mapel: kode_mapel},
      success: function(response) {
        $("#filter_kelas").empty();
        $("#filter_kelas").append(new Option("Pilih Kelas", ""));
        $("#filter_kelas").append(new Option("Perlihatkan Semua", "0"));
        $.each(response,function(index,data){
          $('#filter_kelas').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
        });
      },
      error: function (request, status, error) {
        alert('data Kelas Untuk Mapel Ini Kosong');
      }
     })
    }else{
      $.ajax({
      url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
      type: 'GET',
      dataType: 'json',
      data: {kode_mapel: kode_mapel},
      success: function(response) {
        $("#filter_kelas").empty();
        $("#filter_kelas").append(new Option("Pilih Kelas", ""));
        $("#filter_kelas").append(new Option("Perlihatkan Semua", "0"));
        $.each(response,function(index,data){
          $('#filter_kelas').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
        });
      },
      error: function (request, status, error) {
        alert('data Kelas Untuk Mapel Ini Kosong');
      }
     })
    }
  }
  $(document).ready(function() {
    $('#filter_semester').change(function() {
      refresh_table();
    });
    $('#filter_t_akademik').change(function() {
      refresh_table();
    });
    $('#filter_mapel').change(function() {
      refresh_table();
    });
    $('#filter_kelas').change(function() {
      refresh_table();
    });
  });
  $('#kelastbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kelas"
  });
  $('#jadwaltbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jadwal"
  });
  $('#nilai_lain').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jenis"
  });
  $('#jamtbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jam"
  });
  $('#kelasedit').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kelas"
  });
  $('#jadwaledit').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jadwal"
  });
  $('#jamedit').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jam"
  });
  $("#form-tambah").submit(function(e) {
      // stop submiting the form e.preventDefault();
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('tambahnilai/crud/insert')?>',
       type: 'POST',
       data: form.serialize(),
      success: function(response){
        modal_tambah.modal('hide');
        if (response == 'success')
          Swal2();
        $('#submit_tbh').hide();
        $('#reset_tbh').show();
        $("#jadwaltbh").prop("disabled", true);
        $("#kelastbh").prop("disabled", true);
        $("#jamtbh").prop("disabled", true);
        $("#date-absensi_permapel").prop("disabled", true);
        refresh_table_tambah();
      },
      error: function(response){
          alert('Terjadi Kesalahan');
      }
     })
  });
  $('#reset_tbh').hide();
  $('#reset_edit').hide();
  $('#modal-tambah').on('hidden.bs.modal', function () {
    refresh_table();
  });
  function Swal1(){
    swal({
     title: "Absensi Telah Dibuat!",
     text: "Data Absensi pada jadwal,jam dan hari yang dipilih sudah tersedia.",
     type: "warning",
     showConfirmButton: true
    },function(){
      modal_tambah.modal('show');
    })
  }
  function Swal2(){
    swal({
     title: "Berhasil!",
     text: "Data Absensi untuk jadwal,jam dan hari yang dipilih telah dibuat.",
     type: "success",
     showConfirmButton: true
    },function(){
      modal_tambah.modal('show');
    })
  }
  function myJadwal()
    { 
      let kode_mapel = $("#jadwaltbh").val();
      $.ajax({
        url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {kode_mapel: kode_mapel},
        success: function(response) {
          $("#kelastbh").prop("disabled", false).empty();
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
          $("#jamtbh").prop("disabled", true).empty();
          $.each(response,function(index,data){
           $("#kelastbh").append(new Option("Pilih Kelas", ""));
           $('#kelastbh').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('data Kelas Untuk Mapel Ini Kosong');
          $("#kelastbh").prop("disabled", true).empty();
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
        }
      })
    }
  function myKelas()
    { 
      let kode_mapel = $("#jadwaltbh").val();
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
      let kode_mapel = $("#jadwaltbh").val();
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
          $.each(response,function(index,data){
           $("#jamtbh").append(new Option("Pilih Jam", ""));
           $('#jamtbh').append('<option value="'+data['id']+'">'+data['jam_mulai']+'-'+data['jam_selesai']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('Maaf Jadwal Tidak Tersedia Untuk Hari Ini');
          $("#jamtbh").prop("disabled", true).empty();
        }
      })
  }
  function ResetForm(){
    $('#data_a_permapel_tambah').DataTable().clear().destroy();
    $('#data_a_permapel_tambah').hide();
    $("#jadwaltbh").prop("disabled", false).val("");
    $('#jadwaltbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jadwal"
    });
    $("#kelastbh").prop("disabled", true).empty();
    $("#date-absensi_permapel").prop("disabled", true);
    $("#date-absensi_permapel").val('');
    $("#jamtbh").prop("disabled", true).empty();
    $('#reset_tbh').hide();
    $('#submit_tbh').show();
  }
</script>