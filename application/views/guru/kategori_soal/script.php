<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/kategorisoal/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#kategori_soal').DataTable({
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
       url: '<?=site_url('kategorisoal/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        swal("Berhasil!", "Data Kategori Soal Baru Berhasil Ditambahkan.", "success");
        modal_tambah.modal('hide');
        $('#kategori_soal').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>