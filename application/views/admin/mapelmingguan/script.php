
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_tingkatan = $('#filter_tingkat').val();
    $.ajax({
        url: "<?= base_url('mapelmingguan/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        kelas : id_tingkatan,
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#mapelmingguan').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,
          columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 },
          ]
          });
        }
      });
    };
    refresh_table();
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('mapelmingguan/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        form[0].reset();
        modal_tambah.modal('hide');
        swal("Berhasil!", "Data Jurusan Baru Berhasil Ditambahkan.", "success");
        $('#mapel_sl2_tbh').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Mapel"
        });
        $('#tingkatkelas_sl2_tbh').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Tingkat Kelas"
        });
        $('#jurusan_sl2_tbh').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Jurusan"
        });
        $('#mapelmingguan').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
     })
    });
    $('#mapel_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Mapel"
    });
    $('#tingkatkelas_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tingkat Kelas"
    });
    $('#jurusan_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jurusan"
    });
    $('#filter_mapel').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Mapel"
    });
    $('#filter_jurusan').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Jurusan"
    });
    $('#filter_tingkat').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Tingkat Kelas"
    });
    $(document).ready(function() {
      $('#filter_jurusan').change(function() {
        refresh_table();
       });
      $('#filter_tingkat').change(function() {
        refresh_table();
      });
    });
    function myJurusan()
    { 
      let id_jurusan = $("#jurusan_sl2_tbh").val();
      $.ajax({
        url: '<?=site_url('mapelmingguan/get_mapel_jurusan')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_jurusan: id_jurusan},
        success: function(response) {
          $("#tingkatkelas_sl2_tbh").prop("disabled", false); 
          $("#mapel_sl2_tbh").prop("disabled", false).empty(); 
          $.each(response,function(index,data){
           $("#mapel_sl2_tbh").append(new Option("Pilih Mapel", ""));
           $('#mapel_sl2_tbh').append('<option value="'+data['kode_mapel']+'">'+data['kode_mapel']+"("+data['mapel']+")"+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('data Mapel Untuk Jurusan Ini Kosong');
          $("#mapel_sl2_tbh").prop("disabled", true).empty();
          $("#jumlah_tbh").prop("disabled", true).empty();
          $("#tingkatkelas_sl2_tbh").prop("disabled", true);
          $("#kelompok_mapel_tbh").val('');
          $("#jurusan_tbh").val('');
          $("#jumlah_tbh").val('');
        }
      })
    }
  function myMapel()
    { 
      let id_mapel = $("#mapel_sl2_tbh").val();
      $.ajax({
        url: '<?=site_url('gurumapel/get_detail_mapel')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_mapel: id_mapel},
        success: function(data) {
          $("#kelompok_mapel_tbh").val(data.object.kelompok_mapel);
          $("#jurusan_tbh").val(data.object.jurusan);
          $("#jumlah_tbh").prop("disabled", false);
        },
        error: function (request, status, error) {
          alert(request.responseText);
        }
      })
    }
</script>