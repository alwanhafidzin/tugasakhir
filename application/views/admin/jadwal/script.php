<script>
    function refresh_table() {
    var id_kelas = $('#filter_kelas').val();
    var id_guru = $('#filter_guru').val();
    var id_mapel = $('#filter_mapel').val();
    $.ajax({
        url: "<?= base_url('jadwal/get_all') ?>",
        data: {
        guru : id_guru,
        kelas : id_kelas,
        mapel : id_mapel
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#jadwal').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    $('#filter_kelas').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Kelas"
    });
    $('#filter_guru').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Guru"
    });
    $('#filter_mapel').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Mapel"
    });
    $(document).ready(function() {
      $('#filter_guru').change(function() {
        filter_jadwal();
       });
       $('#filter_kelas').change(function() {
        filter_jadwal();
       });
       $('#filter_mapel').change(function() {
        filter_jadwal();
       });
    });
    function filter_jadwal() {
    var id_guru = $('#filter_guru').val();
    var id_kelas = $('#filter_kelas').val();
    var id_mapel = $('#filter_mapel').val();
    $.ajax({
      url: "<?= base_url('jadwal/get_all') ?>",
      data: {
        guru : id_guru,
        kelas : id_kelas,
        mapel : id_mapel
      },
      success: function(data) {
        $('#jadwal').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#jadwal').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>