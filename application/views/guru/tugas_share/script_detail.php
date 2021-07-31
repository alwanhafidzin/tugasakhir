<script>
   alert('a');
   function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/tugasshare/get_nilai",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#nilai').DataTable({
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
</script>