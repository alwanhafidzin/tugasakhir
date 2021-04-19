<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/tingkatkelas/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#tingkatkelas').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,  "order": [[ 3, "desc" ]]
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
       url: '<?=site_url('tingkatkelas/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        modal_tambah.modal('hide');
        $('#tingkatkelas').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>