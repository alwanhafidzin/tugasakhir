
<script>
    function refresh_table() {
    var id_tahun_akademik = $('#filter_tahunakademik').val();
    var j_kelamin = $('#filter_j_kelamin').val();
    var id_kelas = $('#filter_kelas').val();
    $.ajax({
        url: "<?= base_url('kelassiswa/get_all') ?>",
        data: {
        tahunakademik : id_tahun_akademik,
        jkelamin : j_kelamin,
        kelas :id_kelas
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#kelas_siswa').DataTable({
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
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('kelassiswa/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        alert('success!');
        modal_tambah.modal('hide');
        form[0].reset();
        $('#tahunakademik_sl2_tbh').select2({
         theme: 'bootstrap4',
         placeholder: "Pilih Tahun Akademik"
        });
        $('#kelas_sl2_tbh').select2({
         theme: 'bootstrap4',
         placeholder: "Pilih Kelas"
        });
        $('#siswa_sl2_tbh').select2({
         theme: 'bootstrap4',
         placeholder: "Pilih Siswa"
        });
        $('#kelassiswa').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $('#tahunakademik_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Tahun Akademik"
    });
    $('#kelas_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kelas"
    });
    $('#siswa_sl2_tbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Siswa"
    });
    $('#filter_tahunakademik').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Tahun Akademik"
    });
    $('#filter_j_kelamin').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Jenis Kelamin"
    });
    $('#filter_kelas').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Kelas"
    });
    $(document).ready(function() {
      $('#filter_tahunakademik').change(function() {
        filter_kelassiswa();
       });
      $('#filter_j_kelamin').change(function() {
        filter_kelassiswa();
      });
      $('#filter_kelas').change(function() {
        filter_kelassiswa();
      });
    });
    function filter_kelassiswa() {
    var id_tahun_akademik = $('#filter_tahunakademik').val();
    var j_kelamin = $('#filter_j_kelamin').val();
    var id_kelas = $('#filter_kelas').val();
    $.ajax({
      url: "<?= base_url('kelassiswa/get_all') ?>",
      data: {
        tahunakademik : id_tahun_akademik,
        jkelamin : j_kelamin,
        kelas :id_kelas
      },
      success: function(data) {
        $('#kelas_siswa').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#kelas_siswa').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
      }
    });
  }
</script>