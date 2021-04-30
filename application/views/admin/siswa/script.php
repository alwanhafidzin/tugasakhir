<script>
    function refresh_table() {
    var agama = $('#filter_agama').val();
    var tahunmasuk = $('#filter_tahunmasuk').val();
    var jkelamin = $('#filter_j_kelamin').val();
    $.ajax({
        url: "<?= base_url('siswa/get_all') ?>",
        data: {
          agama : agama,
          tahunmasuk : tahunmasuk,
          jkelamin : jkelamin
        },
        success: function(data) {
          $("#tampil").html(data);
          $('#siswa').DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "initComplete": function (settings, json) {  
            $("#siswa").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
            },
            columnDefs: [
            {
              targets: 3,
              className: 'zoom'
            },
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
            {
                "targets": [ 4 ,5],
                "visible": false,
                "searchable": false
            },
            {
                targets: [4,5],
                className: 'noVis'
            }
          ],
          dom: 
          "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-3'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
          // "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
          // "<'row'<'col-sm-12'tr>>" +
          // "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [{
            extend: 'pdf',
            title: 'Data Siswa SMAN 1 SOOKO',
            filename: 'customized_pdf_file_name', 
            pageSize: 'A4',
            // customize: function (doc) {
            //                doc.defaultStyle.fontSize = 10; //2, 3, 4,etc
            //                doc.styles.tableHeader.fontSize = 10; //2, 3, 4, etc
            //                doc.content[1].table.widths = [ '14%',  '14%', '14%', '0%', '14%', 
            //                                                '15%', '15%', '15%'];
            //            },
            exportOptions: {
                stripHtml: false,
                columns: [0,1,2,6,7,8,9,10] 
            },
            customize: function(doc) {
              doc.styles.tableBodyEven.alignment = 'center';
              doc.styles.tableBodyOdd.alignment = 'center'; 
             }  
            }, {
            extend: 'excel',
            title: 'Data Siswa SMAN 1 SOOKO',
            filename: 'data_siswa',
            exportOptions: {
                columns: [0,1,2,4,5,6,7,8,9],
            },
            customize: function(xlsx) {
            var sheet = xlsx.xl.worksheets['sheet1.xml'];
            // Loop over the cells
            $('row c', sheet).each(function() {
            //select the index of the row
            var angka=$(this).parent().index() ;
            var residu = angka%2;
            if (angka==1){           
                $(this).attr('s','22');//22 - Bold, blue background
            }
            // else if (angka>1){
            //     if(residu ==0  ){//'is t',
            //     $(this).attr('s','25');//25 - Normal text, fine black border
            //     }else{
            //     $(this).attr('s','32');//32 - Bold, gray background, fine black border
            //     }
            // }
        });
        },

          }, {
            extend: 'csv',
            filename: 'Data Siswa SMAN 1 SOOKO',
            exportOptions: {
                columns: [0,1,2,4,5,6,7,8,9] 
            }
          },{
            extend: 'print',
            title: '<center>Data Siswa SMAN 1 SOOKO</center>',
            text: 'Cetak',
            exportOptions: 
            {
              stripHtml: false,
              columns: [0, 1, 2, 5, 6, 7, 8, 9, 10] 
            }
          },{
            extend: 'colvis',
            text: 'Tampilan kolom',
            columns: ':not(.noVis)'
          }]
          }).buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
        }
      });
    };
    refresh_table();
    $("#form-tambah").submit(function(e) {
      e.preventDefault();
      modal_tambah = $("#modal-tambah");
      foto =  $('[name=foto]').val();
      form = $(this);
      $.ajax({
       url: '<?=site_url('siswa/crud/insert')?>',
       type: 'POST',
      //  Tambahan Jika dengan file upload agar terbaca
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      //  dataType: 'json',
      //  data:{
      //     'nis'  : $('[name=nis]').val(),
      //     'nama' : $('[name=nama]').val(),
      //     'tempatlahir'  : $('[name=tempatlahir]').val(),
      //     'tanggallahir' : $('[name=tanggallahir]').val(),
      //     'tahunmasuk' : $('[name=tahunmasuk]').val(),
      //     'agama' : $('select#agama').val(),
      //     'jkelamin' : $('select#jkelamin').val(),
      //     'foto' : $('[name=foto]').val()
      //  } ,
      success: function(){ 
        swal("Berhasil!", "Data Siswa Baru Telah Ditambahkan.", "success");
        form[0].reset();
        modal_tambah.modal('hide');
        $('#siswa').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $('#jkelamintbh').select2({
      theme: 'bootstrap4',
    });
    $('#agamatbh').select2({
      theme: 'bootstrap4'
    });
    $('#jkelaminedit').select2({
      theme: 'bootstrap4'
    });
    $('#agamaedit').select2({
      theme: 'bootstrap4'
    });
    $('#filter_agama').select2({
      theme: 'bootstrap4',
      width: 'resolve',
      placeholder: "Filter Agama",
      bindEvents: false
    });
    $('#filter_j_kelamin').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Jenis Kelamin"
    });
    $('#filter_tahunmasuk').select2({
      theme: 'bootstrap4',
      placeholder: "Filter Tahun Masuk"
      });
      $(document).ready(function() {
        $('#filter_agama').change(function() {
          filter_siswa();
        });
        $('#filter_j_kelamin').change(function() {
         filter_siswa();
        });
        $('#filter_tahunmasuk').change(function() {
          filter_siswa();
        });
      });
      
    function filter_siswa() {
    var agama = $('#filter_agama').val();
    var tahunmasuk = $('#filter_tahunmasuk').val();
    var jkelamin = $('#filter_j_kelamin').val();
    $.ajax({
      url: "<?= base_url('siswa/get_all') ?>",
      data: {
        agama : agama,
        tahunmasuk : tahunmasuk,
        jkelamin : jkelamin
      },
      success: function(data) {
        $('#siswa').DataTable().clear().destroy();
        $("#tampil").html(data);
        $('#siswa').DataTable({
          columnDefs: [
            {
              targets: 3,
              className: 'zoom'
            }
          ],
          "responsive": true, "lengthChange": true, "autoWidth": false
        });
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
  //change value
  //  $("input").on("change", function() {
  //       this.setAttribute(
  //           "data-date",
  //           moment(this.value, "YYYY-MM-DD")
  //           .format( this.getAttribute("data-date-format") )
  //       )
  //   }).trigger("change")

  //No Conflig            
  $(function() {
  if (!$.fn.bootstrapDP && $.fn.datepicker && $.fn.datepicker.noConflict) {
    var datepicker = $.fn.datepicker.noConflict();
    $.fn.bootstrapDP = datepicker;
  }
  $("#datepicker").datepicker({
    monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
    dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    yearRange: "-30:+0", 
  });
  $("#date-tahunmasuk").bootstrapDP({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    endDate: '+2d'
  }).on('changeDate', function(e){
    $(this).bootstrapDP('hide');
  });
  // $(".datepicker").bootstrapDP({});
});
</script>

<!-- 
  show only Year
<style>
.ui-datepicker-calendar {
   display: none;
}
.ui-datepicker-month {
   display: none;
}
.ui-datepicker-next,.ui-datepicker2-prev {
  display:none;
}
</style> -->

