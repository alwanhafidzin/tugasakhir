
<script>
    function refresh_table() {
    var tipe = $('#filter_tipe').val();
    $.ajax({
        url: "<?= base_url('buatakun/get_all') ?>",
        data: {
        tipe : tipe,
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#akun').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    $('#filter_tipe').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tipe"
    });
    $(document).ready(function() {
      $('#filter_tipe').change(function() {
        filter_tipe();
       });
    });
    function filter_tipe() {
    var tipe = $('#filter_tipe').val();
    $.ajax({
      url: "<?= base_url('buatakun/get_all') ?>",
      data: {
        tipe :tipe
      },
      success: function(data) {
        $('#akun').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#akun').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>