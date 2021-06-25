<link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/dist/css/contents.css">
<style>
.btn2{
  font-weight:900;
}
</style>
<table id="tugas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Judul</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Tanggal Dibuat</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php
          function hariIndo ($hariInggris) {
            switch ($hariInggris) {
              case 'Sunday':
                return 'Minggu';
              case 'Monday':
                return 'Senin';
              case 'Tuesday':
                return 'Selasa';
              case 'Wednesday':
                return 'Rabu';
              case 'Thursday':
                return 'Kamis';
              case 'Friday':
                return 'Jumat';
              case 'Saturday':
                return 'Sabtu';
              default:
                return 'hari tidak valid';
            }
          }
          function url_base64_encode($str = '')
          {
            return strtr(base64_encode($str), '+=/', '.-~');
          }
        ?>
        <?php foreach($tugas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->judul ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->tgl_dibuat))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_dibuat)) ?></td>
            <td class="text-center">
                <i class="btn btn2 btn-xs btn-primary fas fa-share share-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Share"></i>
                <i class="btn btn-xs btn-primary fa fa-eye lihat-data" data-id="<?php echo url_base64_encode($result->id) ?>" data-placement="top" title="Lihat"></i>
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data"  data-id="<?php echo $result->id ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php foreach($tahun_aktif->result() as $result) : ?>
  <?php $id_t_akademik= $result->id ?>
  <?php $semester = $result->semester ?>
<?php endforeach;?>

<div class="modal fade" id="modal-share">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Share Tugas Ke Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-share" method="post">
      <div class="col-lg-12">
          <input type="hidden" name="id"/>
          <input type="hidden" value="<?php echo $id_t_akademik ?>" name="id_t_akademik"/>
          <input type="hidden" value="<?php echo $semester ?>" name="semester"/>
          <input type="hidden" id="kode_mapel_share"name="kode_mapel_share"/>
          <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" autocomplete="off"class="form-control" name="judul" placeholder="Masukkan Judul Materi" disabled='disabled'>
          </div>
          <div class="form-group">
              <label for="tgl_dibuat">Tanggal Dibuat</label>
              <input type="text" autocomplete="off" class="form-control" name="tgl_dibuat" placeholder="Masukkan Tanggal Dibuat" disabled="disabled">
          </div>
          <div class="form-group">
              <label for="jadwaltbh">Mapel</label>
              <input type="text" autocomplete="off" class="form-control" name="jadwaltbh" placeholder="Masukkan Mapel" disabled="disabled">
          </div>
          <div class="form-group">
            <label>Pilih Kelas</label>
            <select class="form-control select2" name="kelas" onchange="myKelas()" id="kelastbh" style="width: 100%;" disabled="disabled">
                <option value="">Pilih Kelas</option>
            </select>
          </div>
          <label for="tanggal">Tanggal Jadwal</label>
          <div class="input-group mb-3">
              <input type="text" autocomplete="off" class="form-control" onchange="myTanggal()" id="date-absensi_permapel" name="tanggal_absensi" placeholder="Hari, DD MM YYYY" disabled='disabled'>
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-check nav-icon"></i></i></span>
              </div>
          </div>
          <input type="hidden" name="tanggal" id="tanggal_tbh"/>
          <div class="form-group">
            <label>Jam Jadwal</label>
            <select class="form-control select2" name="jam" id="jamtbh" onchange="myJam()" style="width: 100%;" disabled="disabled">
                <option value="">Pilih Kelas</option>
            </select>
          </div>
          <?php 
          $timezone = new DateTimeZone('Asia/Jakarta');
          $date = new DateTime();
          $date->setTimeZone($timezone);
          ?>
          <div class="form-group">
            <label>Batas Pengumpulan</label>
            <input type="datetime-local"   autocomplete="off" class="form-control" name="tgl_batas" id="tgl_batas" disabled="disabled">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="submit" id="submit_tbh" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
</div>
  <!-- /.modal-dialog -->
</div>
<script>
$('#jamtbh').select2({
    theme: 'bootstrap4',
    placeholder: "Pilih Jam"
});
$('#kelastbh').select2({
    theme: 'bootstrap4',
    placeholder: "Pilih Kelas"
});
 var base_url = "<?php echo base_url();?>";
 $(document).on('click', '.lihat-data', function(e){ 
    id = $(this).data('id');
    location.href = base_url+`tugas/detail/${id}`;
  });
  //Menampilkan data diedit
  let datack_edit;
  ClassicEditor
    .create( document.querySelector( '.editor-edit' ), {
      toolbar: {
      items: [
        'heading',
        '|',
        'fontSize',
        'fontFamily',
        '|',
        'fontColor',
        'fontBackgroundColor',
        '|',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'subscript',
        'superscript',
        'specialCharacters',
        '|',
        'alignment',
        '|',
        'numberedList',
        'bulletedList',
        '|',
        'outdent',
        'indent',
        '|',
        'todoList',
        'link',
        'blockQuote',
        'CKFinder',
        'imageInsert',
        'insertTable',
        'mediaEmbed',
        'highlight',
        '|',
        'undo',
        'redo',
        'restrictedEditingException',
        'textPartLanguage',
        'codeBlock',
        'horizontalLine',
        'htmlEmbed',
        'pageBreak',
        'code',
        'removeFormat',
        // 'imageUpload'
      ]
    },
    mediaEmbed: {
      previewsInData: true
    },
    language: 'en',
    image: {
          // Configure the available styles.
          styles: [
              'alignLeft', 'alignCenter', 'alignRight'
          ],

          // Configure the available image resize options.
          resizeOptions: [
              {
                  name: 'resizeImage:original',
                  label: 'Original',
                  value: null
              },
              {
                  name: 'resizeImage:25',
                  label: '25%',
                  value: '25'
              },
              {
                  name: 'resizeImage:50',
                  label: '50%',
                  value: '50'
              },
              {
                  name: 'resizeImage:75',
                  label: '75%',
                  value: '75'
              }
          ],
    
          // You need to configure the image toolbar, too, so it shows the new style
          // buttons as well as the resize buttons.
          toolbar: [
              'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
              '|',
              'resizeImage',
              '|',
              'imageTextAlternative'
          ]
          },
    table: {
      contentToolbar: [
        'tableColumn',
        'tableRow',
        'mergeTableCells',
        'tableCellProperties',
        'tableProperties'
      ]
    },
    table: {
      contentToolbar: [
        'tableColumn',
        'tableRow',
        'mergeTableCells',
        'tableCellProperties',
        'tableProperties'
      ]
    },
      licenseKey: '',
      ckfinder: {
      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
      },
      
      
    } )
    .then( editor => {
      datack_edit=editor;
      window.editor = editor;
    } )
    .catch( error => {
      console.error( 'Oops, something went wrong!' );
      console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
      console.warn( 'Build id: 27gw32nl3ltt-cd9y4a801chs' );
      console.error( error );
  } );
    modal_edit = $("#modal-edit");
    $(document).on('click', '.edit-data', function(e){
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('tugas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#id-edit").val(data.object.id);
        $("#judul-edit").val(data.object.judul);
        datack_edit.setData(data.object.content);
        $("#kode_mapel-edit").val(data.object.kode_mapel);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#id-edit").focus();
        });
      });
    });
    //Proses Update ke Db
    document.querySelector( '#submit_edit' ).addEventListener( 'click', () => {
	   let judul = $("#judul-edit").val();
	   let kode_mapel = $("#kode_mapel-edit").val();
	   const editorData = datack_edit.getData();
     let id = $("#id-edit").val();
	   $.ajax({
       url: '<?=site_url('tugas/crud/update')?>',
       type: 'POST',
       dataType: 'json',
       data: {
       id:id,
		   judul :judul,
		   content : editorData,
		   kode_mapel : kode_mapel
	   },
       success: function(){ 
        // $("#id-edit").val('');
        // $("#judul-edit").val('');
        // $("#kode_mapel_edit").prop("selectedIndex", 0);
        // datack_edit.setData( '' );
        modal_edit.modal('hide');
        swal("Berhasil!", "Data Tugas Berhasil di Update.", "success");
        $('#tugas').DataTable().clear().destroy();
        refresh_table();
       },
       error: function(response){
          alert(response);
       }
	  })
    });
    $(document).on('click', '.hapus-data', function(e){ 
      e.preventDefault();
      id = $(this).data('id');
      swal({
        title: "Apa Anda Yakin?",
        text: "Data yang terhapus,tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?=site_url('tugas/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {
               id: id,
               },
             error: function() {
              swal("Gagal!", "Terjadi Kesalahan.", "warning");
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#tugas').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
    modal_share = $("#modal-share");
    $(".share-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('tugas/get_share_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-share input[name='id']").val(data.object.id);
        $("#form-share input[name='judul']").val(data.object.judul);
        $("#form-share input[name='tgl_dibuat']").val(data.object.tgl_dibuat);
        $("#form-share input[name='kode_mapel_share']").val(data.object.kode_mapel);
        $("#form-share input[name='jadwaltbh']").val(data.object.mapel);
        if($("#kode_mapel_share").val()!=''){
          let kode_mapel = $("#kode_mapel_share").val();
          $.ajax({
            url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
            type: 'GET',
            dataType: 'json',
            data: {kode_mapel: kode_mapel},
            success: function(response) {
              $("#kelastbh").prop("disabled", false).empty();
              $("#kelastbh").append(new Option("Pilih Kelas", ""));
              $.each(response,function(index,data){
              $('#kelastbh').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
            });
            },
            error: function (request, status, error) {
              alert('data Kelas Untuk Mapel Ini Kosong');
              $("#kelastbh").prop("disabled", true).empty();
            }
          })
        }else{
          //jangan lakukan apa2
        }
        modal_share.modal('show').on('shown.bs.modal', function(e) {
          $("#form-share input[name='id']").focus();
        });
      });
    });
  function myKelas()
    { 
      let kode_mapel = $("#kode_mapel_share").val();
      let kode_kelas = $("#kelastbh").val();
      $.ajax({
        url: '<?=site_url('absensipermapel/get_hari_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          kode_mapel: kode_mapel,
          kode_kelas: kode_kelas
        },
        success: function(response) {
          $("#date-absensi_permapel").prop("disabled", false).val('');
          $("#jamtbh").prop("disabled", true).empty();
          var hari = [];
          $.each(response,function(index,data){
            hari.push(data);
          });
          $(function() {
            if (!$.fn.bootstrapDP && $.fn.datepicker && $.fn.datepicker.noConflict) {
            var datepicker = $.fn.datepicker.noConflict();
            $.fn.bootstrapDP = datepicker;
          }
          $("#date-absensi_permapel").bootstrapDP().datepicker('remove');
          $("#date-absensi_permapel").bootstrapDP({
            todayBtn: "linked",
            language: "id",
            locale: "id",
            format: 'DD,dd MM yyyy',
            daysOfWeekHighlighted: hari,
            todayHighlight: true,
            beforeShowDay: function (date) {
            // var allDates = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            var allDates = date.getDay();
            if(hari.indexOf(allDates) != -1)
              return true;
              else
              return false;
            }
           }).on('changeDate', function(e) {
              //$('#other-input').val(e.format(0,"dd/mm/yyyy"));
              // alert(e.date);
              $('#tanggal_tbh').val(e.format(0,"yyyy-mm-dd"));
             });
          });
        },
        error: function (request, status, error) {
          alert('Maaf Belum Memilih Kelas');
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
          $("#jamtbh").prop("disabled", true).empty();
        }
      })
    }
  function myTanggal()
    { 
      const week_of_day_arr = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const number_of_day_arr = ['8', '2', '3', '4', '5', '6', '7'];
      var dateString = document.getElementById('date-absensi_permapel').value
      var day = week_of_day_arr[new Date(dateString).getDay()];
      var number_day = number_of_day_arr[new Date(dateString).getDay()];
      let kode_mapel = $("#kode_mapel_share").val();
      let kode_kelas = $("#kelastbh").val();
      var hilangkan_tanggal = dateString.indexOf(',');
      var hari =dateString.substring(0, hilangkan_tanggal);
      $.ajax({
        url: '<?=site_url('absensipermapel/get_jam_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {
          hari: hari,
          kode_mapel: kode_mapel,
          kode_kelas: kode_kelas
        },
        success: function(response) {
          $("#jamtbh").prop("disabled", false).empty();
          $("#jamtbh").append(new Option("Pilih Jam", ""));
          $.each(response,function(index,data){
           $('#jamtbh').append('<option value="'+data['id']+'">'+data['jam_mulai']+'-'+data['jam_selesai']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('Maaf Jadwal Tidak Tersedia Untuk Hari Ini');
          $("#jamtbh").prop("disabled", true).empty();
          $("#tgl_batas").prop("disabled", true).empty();
        }
      })
  }
  function myJam(){
    $("#tgl_batas").prop("disabled", false).empty();
    set_min_date();
  }
  $("#form-share").submit(function(e) {
      // stop submiting the form e.preventDefault();
      e.preventDefault();
      form = $(this);
      Swal3();
      $.ajax({
       url: '<?=site_url('tugas/crud/share')?>',
       type: 'POST',
       data: form.serialize(),
      success: function(response){
        modal_share.modal('hide');
        if (response == 'exists')
          Swal1();
        else if (response == 'success')
          Swal2();
        $("#kelastbh").prop("disabled", true);
        $("#jamtbh").prop("disabled", true);
        $("#date-absensi_permapel").prop("disabled", true);
        refresh_table_tambah();
      },
      error: function(response){
          swal.close();
          alert('Terjadi Kesalahan');
      }
     })
  });
  $('#modal-share').on('hidden.bs.modal', function () {
    $("#kelastbh").prop("disabled", true).empty();
    $("#date-absensi_permapel").prop("disabled", true);
    $("#date-absensi_permapel").val('');
    $("#jamtbh").prop("disabled", true).empty();
    $("#tgl_batas").prop("disabled", true);
    $("#tgl_batas").val('');
  });
  function Swal1(){
    swal({
     title: "Tugas Sudah Ada!",
     text: "Tugas Telah di bagikan ke kelas dan jadwal yang dipilih.",
     type: "warning",
     showConfirmButton: true
    })
  }
  function Swal2(){
    swal({
     title: "Berhasil!",
     text: "Data Tugas Berhasil dibagikan ke kelas dan jadwal yang dipilih.",
     type: "success",
     showConfirmButton: true
    })
  }
  function Swal3(){
    swal({
     title: "Status!",
     text: "Sedang membagikan tugas untuk siswa.Harap Tunggu...",
     type: "warning",
     showConfirmButton: false
    });
    }
    function set_min_date(){
      <?php 
          $timezone = new DateTimeZone('Asia/Jakarta');
          $date = new DateTime();
          $date->setTimeZone($timezone);
      ?>
      var e= <?php echo  '"'.$date->format('Y-m-d').'"';?>;
      alert(e);
    document.getElementById("tgl_batas").setAttribute("min", e+'T00:00');
    }
</script>