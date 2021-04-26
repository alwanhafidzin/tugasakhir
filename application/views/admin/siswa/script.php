<script>
    function refresh_table() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/siswa/get_all",
        cache: false,
        success: function(data) {
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
  $('.select2').select2({
      theme: 'bootstrap4'
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
