<!-- <script>
  $(function () {
    $("#tahun_akademik").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> -->
<script>
        $(document).ready(function() {
            var t = $('#tahun_akademik').DataTable( {
                "ajax": '<?php echo site_url('tahunakademik/data'); ?>',
                "order": [[ 1, 'desc' ]],
                "columns": [
                    {
                        "data": null,
                        "class": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "tahun_akademik",
                        "class": "text-center"
                    },
                    { 
                        "data": "is_aktif",
                        "class": "text-center"
                    },
                    { 
                        "data": "aksi",
                        "class": "text-center"
                    },
                ],
                "responsive": true, "lengthChange": true, "autoWidth": false,
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
        $('.select2').select2
        ({
            theme: 'bootstrap4'
        });
        //Ajax Tambah tahun Akademik
        $("#form-tambah").submit(function(e) {
    e.preventDefault();
    ctx_modal = $("#modal-tambah");
    form = $(this);
    $.ajax({
      url: '<?=site_url('tahun_akademik/insert')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
    })
    .done(function(data) {
      if (data) {
        form[0].reset();
        ctx_modal.modal('hide');
        buat_notifikasi({
          icon: 'done_outline',
          message: "Data berhasil ditambahkan",
          type: 'success'
        });
        refresh_buku();
      }
      else {
        alert('Tidak dapat terhubung dengan database');
      }
    });
  });

</script>
<style>
    .dataTables_scrollBody {
    width: 100%!important;
}
</style>