<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/tahunakademik/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#tahunakademik').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    //Tambah Data Agama,Posisi Ajax ada di inspect network
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      ctx_modal = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('tahunakademik/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        $('#tahunakademik').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
    })
    .done(function(data) {
      if (data) {
        ctx_modal.modal('hide');
        buat_notifikasi({
          icon: 'done_outline',
          message: "Data berhasil ditambahkan",
          type: 'success'
        });
      }
      else {
        alert('Tidak dapat terhubung dengan database');
      }
    });
    });
</script>