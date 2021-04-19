<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/kelompokmapel/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#kelompokmapel').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,  "order": [[ 2, "desc" ]]
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
       url: '<?=site_url('kelompokmapel/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        form[0].reset();
        modal_tambah.modal('hide');
        $('#kelompokmapel').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>