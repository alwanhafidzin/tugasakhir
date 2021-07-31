<script>
    function refresh_table() {
    var id_tipe = $('#filter_tipe').val();
    var kode_mapel = $('#filter_mapel').val();
    $.ajax({
        url: "<?php echo base_url(); ?>/kategoriujian/get_all",
        data: {
        id_tipe : id_tipe,
        kode_mapel : kode_mapel
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#kategori_ujian').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
          });
        }
      });
    };
    refresh_table();
    $('#filter_mapel').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Mapel"
    });
    $('#filter_tipe').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Tipe Quiz"
    });
    $('#kode_mapel-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "pilih Mapel"
    });
    $('#tipe-tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tipe Quiz"
    });
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('kategoriujian/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        swal("Berhasil!", "Data Kategori Ujian Baru Berhasil Ditambahkan.", "success");
        modal_tambah.modal('hide');
        form[0].reset();
        $('#kategori_ujian').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $(document).ready(function() {
      $('#filter_mapel').change(function() {
        filter_k_ujian();
      });
      $('#filter_tipe').change(function() {
      filter_k_ujian();
      });
    });
    function filter_k_ujian() {
    var id_tipe = $('#filter_tipe').val();
    var kode_mapel = $('#filter_mapel').val();
    $.ajax({
        url: "<?php echo base_url(); ?>/kategoriujian/get_all",
        data: {
        id_tipe : id_tipe,
        kode_mapel : kode_mapel
        },
      success: function(data) {
        $('#kategori_ujian').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#kategori_ujian').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>