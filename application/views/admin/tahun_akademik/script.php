<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/tahunakademik/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#tahunakademik').DataTable({
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
    //Tambah Data Agama,Posisi Ajax ada di inspect network
    $("#form-tambah").submit(function(e) {
      Swal1();
      e.preventDefault();
      ctx_modal = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('tahunakademik/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        form[0].reset();
        $('#tahunakademik').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal.close();
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
    })
    .done(function(data) {
      if (data) {
        ctx_modal.modal('hide');
        swal("Berhasil!", "Data Tahun Akademik Baru Berhasil Ditambahkan.", "success");
      }
      else {
        swal.close();
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
    });
    });
    function Swal1(){
    swal({
     title: "Status!",
     text: "Sedang Membuat data keperluan tahun akademik.Harap Tunggu...",
     type: "warning",
     showConfirmButton: false
    });
    }
</script>