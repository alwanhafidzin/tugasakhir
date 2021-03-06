<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/listujiansiswa/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#list_ujian').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,
          columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
          ],
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