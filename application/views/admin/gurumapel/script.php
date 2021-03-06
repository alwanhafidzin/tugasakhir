
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_mapel = $('#filter_mapel').val();
    $.ajax({
        url: "<?= base_url('gurumapel/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        mapel : id_mapel
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#gurumapel').DataTable({
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
       url: '<?=site_url('gurumapel/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        form[0].reset();
        modal_tambah.modal('hide');
        swal("Berhasil!", "Data Guru Mapel Baru Berhasil Ditambahkan.", "success");
        $('#gurumapel').DataTable().clear().destroy();
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
    $('#guru_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Nip Guru"
    });
    $('#filter_mapel').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Mapel"
    });
    $('#filter_jurusan').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Jurusan"
    });
    $(document).ready(function() {
      $('#filter_jurusan').change(function() {
        refresh_table();
       });
      });
      $('#filter_mapel').change(function() {
        refresh_table();
       });
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
        },
        error: function (request, status, error) {
          alert(request.responseText);
        }
      })
    }
</script>