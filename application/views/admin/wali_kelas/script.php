
<script>
    function refresh_table() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelas = $('#filter_tingkat').val();
    $.ajax({
        url: "<?= base_url('walikelas/get_all') ?>",
        data: {
        jurusan : id_jurusan,
        kelas : id_kelas
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#walikelas').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false
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
       url: '<?=site_url('ruangkelas/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        modal_tambah.modal('hide');
        form[0].reset();
        $('#ruangkelas').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
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
        filter_walikelas();
       });
      });
      $('#filter_tingkat').change(function() {
        filter_walikelas();
       });
    function filter_walikelas() {
    var id_jurusan = $('#filter_jurusan').val();
    var id_kelas = $('#filter_tingkat').val();
    $.ajax({
      url: "<?= base_url('walikelas/get_all') ?>",
      data: {
        jurusan : id_jurusan,
        kelas : id_kelas
      },
      success: function(data) {
        $('#walikelas').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#walikelas').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>