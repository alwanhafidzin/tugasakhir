
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelas = $('#filter_tingkat').val();
    $.ajax({
        url: "<?= base_url('kelas/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        kelas : id_kelas
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#kelas').DataTable({
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
       url: '<?=site_url('kelas/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        modal_tambah.modal('hide');
        swal("Berhasil!", "Data Kelas Baru Berhasil Ditambahkan.", "success");
        form[0].reset();
        $('#kelas').DataTable().clear().destroy();
        refresh_table();
        $("#kode_jurusan").select2({
          theme: 'bootstrap4'
        });
        $("#kode_tingkat").select2({
          theme: 'bootstrap4'
        });
      },
      error: function(response){
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
     })
    });
    $('#kode_tingkat').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tingkat Kelas"
    });
    $('#kode_jurusan').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jurusan"
    });
    $('#filter_tingkat').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Kelas"
    });
    $('#filter_jurusan').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Jurusan"
    });
    $(document).ready(function() {
      $('#filter_jurusan').change(function() {
        filter_jurusan();
       });
      });
      $('#filter_tingkat').change(function() {
        filter_jurusan();
       });
    function filter_jurusan() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelas = $('#filter_tingkat').val();
    $.ajax({
      url: "<?= base_url('kelas/get_all') ?>",
      data: {
        jurusan : id_jurusan,
        kelas : id_kelas
      },
      success: function(data) {
        $('#kelas').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#kelas').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>