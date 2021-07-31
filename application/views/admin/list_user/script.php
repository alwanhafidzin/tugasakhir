
<script>
    function refresh_table() {
    var tipe = $('#filter_tipe').val();
    var status = $('#filter_status').val();
    $.ajax({
        url: "<?= base_url('listuser/get_all') ?>",
        data: {
        tipe : tipe,
        status:status,
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#akun').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,
          columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 },
          ],
          });
        }
      });
    };
    refresh_table();
    $('#filter_tipe').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tipe"
    });
    $('#filter_status').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Status"
    });
    $(document).ready(function() {
      $('#filter_tipe').change(function() {
        refresh_table();
       });
       $('#filter_status').change(function() {
        refresh_table();
       });
    });
</script>