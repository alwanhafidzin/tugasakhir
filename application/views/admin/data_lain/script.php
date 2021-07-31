<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/datalain/get_all_kkm",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#kkm').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 },
          ]
          });
        }
      });
    };
    function refresh_table2() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/datalain/get_all_hari_masuk_detail",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#hari_masuk').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: -1 },
          ]
          });
        }
      });
    };
    refresh_table();
    refresh_table2();
</script>