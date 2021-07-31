
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelompok_mapel = $('#filter_kelompok_mapel').val();
    $.ajax({
        url: "<?= base_url('mapel/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        kelompok_mapel : id_kelompok_mapel
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#mapel').DataTable({
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
       url: '<?=site_url('mapel/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        form[0].reset();
        modal_tambah.modal('hide');
        swal("Berhasil!", "Data Mapel Baru Berhasil Ditambahkan.", "success");
        $('#kelompok_mapel_sl2_tbh').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Kelompok Mapel"
        });
        $('#jurusan_sl2_tbh').select2({
          theme: 'bootstrap4',
          placeholder: "Pilih Jurusan"
        });
        $('#mapel').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
     })
    });
    $('#kelompok_mapel_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kelompok Mapel"
    });
    $('#jurusan_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jurusan"
    });
    $('#filter_kelompok_mapel').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Kelompok Mapel"
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
      $('#filter_kelompok_mapel').change(function() {
        refresh_table();
       });
</script>