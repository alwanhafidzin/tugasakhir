<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/materi/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#materi').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      modal_tambah.modal('hide');
      Swal1();
      form = $(this);
      $.ajax({
       url: '<?=site_url('materi/upload_dropbox')?>',
       type: 'POST',
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:true,
      success: function(){ 
        swal("Berhasil!", "Materi Baru Berhasil diupload.", "success");
        form[0].reset();
        $('#materi').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          swal.close();
          alert(response);
      }
     })
    });
    function Swal1(){
    swal({
     title: "Status!",
     text: "File Sedang diupload.Harap Tunggu...",
     type: "warning",
     showConfirmButton: false
    });
    }
    function Swal2(){
    swal({
     title: "Status!",
     text: "File Sedang dihapus.Harap Tunggu...",
     type: "warning",
     showConfirmButton: false
    });
    }
</script>