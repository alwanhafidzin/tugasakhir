<script>
    //Buat dan refresh datatable
    // function refresh_table(){
    //   var t = $('#agama').DataTable( {
    //         "ajax": '<?php echo site_url('agama/data'); ?>',
    //         "order": [[ 1, 'desc' ]],
    //         "columns": [
    //             {
    //                  "data": null,
    //                 "class": "text-center",
    //                 "orderable": false,
    //             },
    //             {
    //                 "data": "id_agama",
    //                 "class": "text-center"
    //             },
    //             {
    //                 "data": "agama",
    //                 "class": "text-center"
    //             },
    //             { 
    //                 "data": "aksi",
    //                 "class": "text-center"
    //             },
    //             ],
    //             "responsive": true, "lengthChange": true, "autoWidth": false,  "order": [[ 3, "desc" ]]
    //         } );
               
    //         t.on( 'order.dt search.dt', function () {
    //             t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //                 cell.innerHTML = i+1;
    //             } );
    //         } ).draw();
    // };
    // refresh_table();
    // function refresh_table(){
    //   $('#agama').DataTable({
    //     "responsive": true, "lengthChange": true, "autoWidth": false,  "order": [[ 3, "desc" ]]
    //   });
    // }
    // refresh_table();
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/agama/get_all",
        cache: false,
        success: function(data) {
          $("#tampil").html(data);
          $('#agama').DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false,  "order": [[ 3, "desc" ]],
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
      e.preventDefault();
      ctx_modal = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('agama/crud/insert')?>',
       type: 'POST',
       dataType: 'json',
       data: form.serialize(),
      success: function(){ 
        form[0].reset();
        $('#agama').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
    })
    .done(function(data) {
      if (data) {
        ctx_modal.modal('hide');
        swal("Berhasil!", "Data Agama Baru Berhasil Ditambahkan.", "success");
      }
      else {
        swal("Gagal!", "Data Gagal ditambahkan terjadi kesalahan.", "error");
      }
    });
    });
</script>