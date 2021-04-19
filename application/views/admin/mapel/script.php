  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 -->
<script src="<?=base_url()?>assets/admin_lte/plugins/select2/js/select2.full.min.js"></script>
<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/kelas/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#kelas').DataTable({
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
       url: '<?=site_url('kelas/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        modal_tambah.modal('hide');
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
          alert(response);
      }
     })
    });
    $('#kode_tingkat').select2({
      theme: 'bootstrap4'
    });
    $('#kode_jurusan').select2({
      theme: 'bootstrap4'
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