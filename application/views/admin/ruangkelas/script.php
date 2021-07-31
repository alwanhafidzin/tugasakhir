
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelas = $('#filter_tingkat').val();
    $.ajax({
        url: "<?= base_url('ruangkelas/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        kelas : id_kelas
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#ruangkelas').DataTable({
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
        refresh_table();
       });
      });
      $('#filter_tingkat').change(function() {
        refresh_table();
     });
</script>