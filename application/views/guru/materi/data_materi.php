<style>
.btn2{
  font-weight:900;
}
</style>
<table id="materi" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Judul</th>
         <th class="text-center">Tipe</th>
         <th class="text-center">Tanggal Dibuat</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($materi->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->judul ?></td>
            <td class="text-center"><?php echo $result->jenis ?></td>
            <td class="text-center"><?php echo $result->tgl_dibuat ?></td>
            <?php if($result->jenis == "Editor")
            { echo
              '<td class="text-center">
              <i class="btn btn2 btn-xs btn-primary fas fa-share share-data" data-id="'.$result->id.'" data-placement="top" title="Share"></i>
              <i class="btn btn-xs btn-primary fa fa-eye lihat-data" data-id="'.$result->id.'" data-placement="top" title="Lihat"></i>
              <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="'.$result->id.'" data-placement="top" title="Edit"></i>
              <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="'.$result->id.'" data-placement="top" title="Delete"></i>
              </td>'; 
            } 
            elseif($result->jenis == "Upload")
            {echo 
              '<td class="text-center">
              <i class="btn btn2 btn-xs btn-primary fas fa-share share-data" data-id="'.$result->id.'" data-placement="top" title="Share"></i>
              <a href="'.$result->content.'" target="_blank"><i class="btn btn-xs btn-primary fa fa-eye" data-id="'.$result->id.'" data-placement="top" title="Lihat"></i></a>
              <i class="btn btn-xs btn-primary fa fa-edit edit-upload" data-id="'.$result->id.'" data-content="'.$result->content.'" data-placement="top" title="Edit"></i>
              <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data-upload" data-id="'.$result->id.'" data-path="'.$result->path.'" data-placement="top" title="Delete"></i>
              </td>'; 
            } ?>
            
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Materi Upload</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" autocomplete="off"class="form-control" name="judul" placeholder="Masukkan Judul Materi">
                </div>
                <label class="mgin" for="nama_kelas">Upload Materi(Kosongkan bila tidak ingin mengganti file)</label>
                <div class="input-group mgin mb-3 mgin2">
                        <!-- /btn-group -->
                        <input type="file" autocomplete="off"class="form-control" name="file" placeholder="Pilih File Materi Yang Akan diupload">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger" id="lihat_file">File Sebelumnya</button>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>
      <?php foreach($tahun_aktif->result() as $result) : ?>
      <?php $id_t_akademik= $result->id ?>
      <?php $semester = $result->semester ?>
      <?php endforeach;?>

      <div class="modal fade" id="modal-share">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Share Materi Ke Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-share" method="post">
            <div class="col-lg-12">
                <input type="hidden" name="id"/>
                <input type="hidden" value="<?php echo $id_t_akademik ?>" name="id_t_akademik"/>
                <input type="hidden" value="<?php echo $semester ?>" name="semester"/>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" autocomplete="off"class="form-control" name="judul" placeholder="Masukkan Judul Materi" disabled='disabled'>
                </div>
                <div class="form-group">
                    <label for="jenis">Tipe Materi</label>
                    <input type="text" id="tipemateri" autocomplete="off" class="form-control" name="jenis" placeholder="Masukkan Tipe Materi" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="tgl_dibuat">Tanggal Dibuat</label>
                    <input type="text" autocomplete="off" class="form-control" name="tgl_dibuat" placeholder="Masukkan Tanggal Dibuat" disabled="disabled">
                </div>
                <div class="form-group">
                  <label>Pilih Jadwal</label>
                  <select class="form-control select2" name="mapel" onchange="myJadwal()" id="jadwaltbh" style="width: 100%;">
                     <option value="">Pilih Jadwal</option>
                     <?php foreach($jadwal_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Kelas</label>
                  <select class="form-control select2" name="kelas" onchange="myKelas()" id="kelastbh" style="width: 100%;" disabled="disabled">
                     <option value="">Pilih Kelas</option>
                  </select>
                </div>
                <label for="tanggal">Tanggal</label>
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" onchange="myTanggal()" id="date-absensi_permapel" name="tanggal_absensi" placeholder="Hari, DD MM YYYY" disabled='disabled'>
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-check nav-icon"></i></i></span>
                    </div>
                </div>
                <input type="hidden" name="tanggal" id="tanggal_tbh"/>
                <div class="form-group">
                  <label>Pilih Jam</label>
                  <select class="form-control select2" name="jam" id="jamtbh" style="width: 100%;" disabled="disabled">
                     <option value="">Pilih Kelas</option>
                  </select>
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
    var base_url = "<?php echo base_url();?>";
  //Menampilkan data diedit
    $(".buat-materi").click(function(e) {
      location.href = base_url+`materi/tambah`;
    });
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      location.href = base_url+`materi/edit/${id}`;
    });
    $(".lihat-data").click(function(e) {
      id = $(this).data('id');
      location.href = base_url+`materi/detail/${id}`;
    });
    modal_edit = $("#modal-edit");
    $(".edit-upload").click(function(e) {
      id = $(this).data('id');
      content = $(this).data('content');
      $.ajax({
        url: '<?=site_url('materi/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='judul']").val(data.object.judul);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='id']").focus();
          document.getElementById("lihat_file").setAttribute("id", "lihat_file"+id);
          $('#lihat_file'+id).click(function(){
          window.open(`${content}`, '_blank');
        });
        $('#modal-edit').on('hidden.bs.modal', function () {
          document.getElementById("lihat_file"+id).setAttribute("id", "lihat_file");
        });
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('materi/update_dropbox')?>',
      type: 'POST',
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data Berhasil Dihapus.", "success");
        modal_edit.modal('hide');
        $('#materi').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $(".hapus-data").click(function(e) {
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
             url: '<?=site_url('materi/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {
               id: id,
               },
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#materi').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
    $(".hapus-data-upload").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      path = $(this).data('path');
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
          Swal2();
          $.ajax({
             url: '<?=site_url('materi/delete_upload')?>',
             type: 'POST',
             dataType: 'json',
             data: {
               id: id,
               path: path
               },
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#materi').DataTable().clear().destroy();
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
        url: '<?=site_url('materi/get_share_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-share input[name='id']").val(data.object.id);
        $("#form-share input[name='judul']").val(data.object.judul);
        $("#form-share input[name='jenis']").val(data.object.jenis);
        $("#form-share input[name='tgl_dibuat']").val(data.object.tgl_dibuat);
        modal_share.modal('show').on('shown.bs.modal', function(e) {
          $("#form-share input[name='id']").focus();
        });
      });
    });
    function myJadwal()
    { 
      let kode_mapel = $("#jadwaltbh").val();
      $.ajax({
        url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {kode_mapel: kode_mapel},
        success: function(response) {
          $("#kelastbh").prop("disabled", false).empty();
          $.each(response,function(index,data){
           $("#kelastbh").append(new Option("Pilih Kelas", ""));
           $('#kelastbh').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('data Kelas Untuk Mapel Ini Kosong');
          $("#kelastbh").prop("disabled", true).empty();
        }
      })
    }
    function myJadwal()
    { 
      let kode_mapel = $("#jadwaltbh").val();
      if($('#jadwaltbh').val()== ''){
        //jangan lakukan apa apa
      }else{
        $.ajax({
        url: '<?=site_url('absensipermapel/get_guru_mapel_jadwal')?>',
        type: 'GET',
        dataType: 'json',
        data: {kode_mapel: kode_mapel},
        success: function(response) {
          $("#kelastbh").prop("disabled", false).empty();
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
          $("#jamtbh").prop("disabled", true).empty();
          $.each(response,function(index,data){
           $("#kelastbh").append(new Option("Pilih Kelas", ""));
           $('#kelastbh').append('<option value="'+data['kode_kelas']+'">'+data['nama_kelas']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('data Kelas Untuk Mapel Ini Kosong');
          $("#kelastbh").prop("disabled", true).empty();
          $("#date-absensi_permapel").prop("disabled", true);
          $("#date-absensi_permapel").val('');
        }
        })
      }
    }
  function myKelas()
    { 
      let kode_mapel = $("#jadwaltbh").val();
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
      let kode_mapel = $("#jadwaltbh").val();
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
          $.each(response,function(index,data){
           $("#jamtbh").append(new Option("Pilih Jam", ""));
           $('#jamtbh').append('<option value="'+data['id']+'">'+data['jam_mulai']+'-'+data['jam_selesai']+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('Maaf Jadwal Tidak Tersedia Untuk Hari Ini');
          $("#jamtbh").prop("disabled", true).empty();
        }
      })
  }
  $('#kelastbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Kelas"
  });
  $('#jadwaltbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jadwal"
  });
  $('#jamtbh').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Jam"
  });
  $("#form-share").submit(function(e) {
      // stop submiting the form e.preventDefault();
      e.preventDefault();
      modal_tambah = $("#modal-share");
      form = $(this);
      $.ajax({
       url: '<?=site_url('materi/crud/share')?>',
       type: 'POST',
       data: form.serialize(),
      success: function(response){
        modal_share.modal('hide');
        if (response == 'exists')
          Swal1();
        else if (response == 'success')
          Swal2();
        $('#jadwaltbh').val('').trigger('change');
        $("#kelastbh").prop("disabled", true);
        $("#jamtbh").prop("disabled", true);
        $("#date-absensi_permapel").prop("disabled", true);
        refresh_table_tambah();
      },
      error: function(response){
          alert('Terjadi Kesalahan');
      }
     })
  });
  function Swal1(){
    swal({
     title: "Materi Sudah Ada!",
     text: "Materi Telah di bagikan ke kelas dan jadwal yang dipilih.",
     type: "warning",
     showConfirmButton: true
    })
  }
  function Swal2(){
    swal({
     title: "Berhasil!",
     text: "Data Materi Berhasil dibagikan ke kelas dan jadwal yang dipilih.",
     type: "success",
     showConfirmButton: true
    })
  }
  $('#modal-share').on('hidden.bs.modal', function () {
    $("#kelastbh").prop("disabled", true).empty();
    $('#jadwaltbh').val('').trigger('change');
    $("#date-absensi_permapel").prop("disabled", true);
    $("#date-absensi_permapel").val('');
    $("#jamtbh").prop("disabled", true).empty();
  });
</script>