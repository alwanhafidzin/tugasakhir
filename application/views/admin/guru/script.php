<script>
    function refresh_table() {
    var agama = $('#filter_agama').val();
    var gender = $('#gender').val();
    $.ajax({
        url: "<?= base_url('guru/get_all') ?>",
        data: {
          agama : agama,
          gender : gender
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#guru').DataTable({
          columnDefs: [
            {
              targets: 3,
              className: 'zoom'
            }
          ],
          dom: 
          "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          "responsive": true, "lengthChange": true, "autoWidth": false,
          buttons: [{
            extend: 'pdf',
            title: 'Customized PDF Title',
            filename: 'customized_pdf_file_name', 
            pageSize: 'A4',
            customize: function (doc) {
                           doc.defaultStyle.fontSize = 10; //2, 3, 4,etc
                           doc.styles.tableHeader.fontSize = 10; //2, 3, 4, etc
                           doc.content[1].table.widths = [ '14%',  '14%', '14%', '14%', 
                                                           '15%', '15%', '15%'];
                       },
            exportOptions: {
                columns: [0,1,2,3,4,5,6] 
            }

            }, {
            extend: 'excel',
            title: 'Data Siswa SMAN 1 SOOKO',
            filename: 'data_siswa',
            exportOptions: {
                columns: [0,1,2,3,4,5,6] 
            }

          }, {
            extend: 'csv',
            filename: 'Data Siswa SMAN 1 SOOKO',
          },{
            extend: 'colvis'
          }]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        }
      });
    };
    refresh_table();
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      form = $(this);
      $.ajax({
       url: '<?=site_url('guru/crud/insert')?>',
       type: 'POST',
      //  Tambahan Jika dengan file upload agar terbaca
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      success: function(){ 
        swal("Berhasil!", "Data Guru Baru Telah Ditambahkan.", "success");
        form[0].reset();
        modal_tambah.modal('hide');
        $('#guru').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $('#gendertbh').select2({
      theme: 'bootstrap4',
    });
    $('#agamatbh').select2({
      theme: 'bootstrap4'
    });
    $('#genderedit').select2({
      theme: 'bootstrap4'
    });
    $('#genderedit').select2({
      theme: 'bootstrap4'
    });
    $('#filter_agama').select2({
      theme: 'bootstrap4',
      width: 'resolve',
      placeholder: "Filter Agama",
      bindEvents: false
    });
    $('#filter_gender').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Gender"
    });
      $(document).ready(function() {
        $('#filter_agama').change(function() {
          filter_guru();
        });
        $('#filter_gender').change(function() {
         filter_guru();
        });
      });
      
    function filter_guru() {
    var agama = $('#filter_agama').val();
    var gender = $('#filter_gender').val();
    $.ajax({
      url: "<?= base_url('guru/get_all') ?>",
      data: {
        agama : agama,
        gender : gender
      },
      success: function(data) {
        $('#guru').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#guru').DataTable({
          columnDefs: [
            {
              targets: 3,
              className: 'zoom'
            }
          ],
          "responsive": true, "lengthChange": true, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>