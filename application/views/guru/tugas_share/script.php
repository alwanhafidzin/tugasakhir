<script>
  function refresh_table() {
  var id_t_akademik = $("#filter_t_akademik").val();
  var semester = $("#filter_semester").val();
  var kode_mapel = $('#filter_mapel').val();
  var kode_kelas = $('#filter_kelas').val();
  $.ajax({
      type: 'GET',
      url: "<?php echo base_url(); ?>/tugasshare/get_all",
      data: {
        id_t_akademik : id_t_akademik,
        semester : semester,
        kode_mapel : kode_mapel,
        kode_kelas : kode_kelas
      },
      success: function(data) {
        $("#tampil").html(data);
        $('#tugas').DataTable({
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
</script>