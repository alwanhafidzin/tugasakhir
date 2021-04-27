<style>
  .zoom:hover {
    transform: scale(5.5);
}
</style>

<table id="siswa" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nis</th>
         <th class="text-center">Nama</th>
         <th class="text-center">Foto</th>
         <th class="text-center">Tempat Lahir</th>
         <th class="text-center">Tanggal Lahir</th>
         <th class="text-center">Agama</th>
         <th class="text-center">Tahun Masuk</th>
         <th class="text-center">Jenis Kelamin</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($siswa->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nis ?></td>
            <td class="text-center"><?php echo $result->nama ?></td>
            <td class="text-center"><img width="35" src="<?php echo base_url()?>uploads/siswa/<?php echo $result->foto; ?>" /></td>
            <td class="text-center"><?php echo $result->tempat_lahir ?></td>
            <td class="text-center"><?php echo $result->tanggal_lahir ?></td>
            <td class="text-center"><?php echo $result->agama ?></td>
            <td class="text-center"><?php echo $result->tahun_masuk ?></td>
            <td class="text-center"><?php if($result->j_kelamin == "L"){ echo "Laki-Laki"; } elseif($result->j_kelamin == "P") {echo "Perempuan"; } ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->nis ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->nis ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-siswa" method='POST' enctype='multipart/form-data'>
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" autocomplete="off"disabled='disabled' class="form-control" name="nis" placeholder="Masukkan NIS">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label></br>
                    <img id="foto-siswa" src="" alt="Foto Siswa" width="150" height="200">
                    <input type="file" autocomplete="off"class="form-control" name="foto" placeholder="Pilih Foto">
                </div>
                <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" autocomplete="off"class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="" id="tanggallahird" autocomplete="off" class="form-control" name="tanggallahir" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="tahunmasuk">Tahun Masuk</label>
                    <input type="year" id="date-tahunmasuk-edit" autocomplete="off" class="form-control" name="tahunmasuk" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control select2" name="agama" id="agamaedit" style="width: 100%;">
                     <?php foreach($agama as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->agama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" name="jkelamin" id="jkelaminedit" style="width: 100%;">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                  </select>
                </div>
            </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-upload">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Data Siswa Via Excel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-excel-siswa">
              <div class="col-lg-12">
              <div class="form-group">
                    <label for="excel">Import Excel</label>
                    <input type="file" autocomplete="off"class="form-control" name="excel" placeholder="Pilih Foto">
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="submit" class="btn btn-primary">Import</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-multiple">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Multiple Foto Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-multiple">
              <div class="col-lg-12">
              <div class="form-group">
                    <label for="multiple">Upload Multiple</label>
                    <input type="file" autocomplete="off"class="form-control"name='files[]' multiple="" placeholder="Pilih Foto">
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="submit" class="btn btn-primary">Import</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

<script>
  //Menampilkan data diedit
    modal_edit = $("#modal-edit");
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('siswa/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $(function() {
         if (!$.fn.bootstrapDP && $.fn.datepicker && $.fn.datepicker.noConflict) {
          var datepicker = $.fn.datepicker.noConflict();
          $.fn.bootstrapDP = datepicker;
        }
        $("#tanggallahird").datepicker({
          monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
          dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          yearRange: "-30:+0", 
         });
          $("#date-tahunmasuk-edit").bootstrapDP({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            endDate: '+1d'
          }).on('changeDate', function(e){
             $(this).bootstrapDP('hide');
          });
        });

        $("#form-edit-siswa input[name='nis']").val(data.object.nis);
        $("#form-edit-siswa input[name='nama']").val(data.object.nama);
        var foto = data.object.foto;
        $('#foto-siswa').attr("src", `<?php echo base_url()?>uploads/siswa/${foto}`);
        $("#form-edit-siswa input[name='tempatlahir']").val(data.object.tempat_lahir);
        $("#form-edit-siswa input[name='tanggallahir']").val(data.object.tanggal_lahir);
        $("#form-edit-siswa input[name='tahunmasuk']").val(data.object.tahun_masuk);
        $("#agama").val(data.object.id_agama);
        $("#jkelamin").val(data.object.j_kelamin);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-kelas input[name='nis']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit-siswa").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('siswa/crud/update')?>',
      type: 'POST',
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data){ 
        form[0].reset();
        modal_edit.modal('hide');
        swal("Berhasil!", "Data siswa berhasil diedits.", "success");
        $('#siswa').DataTable().clear().destroy();
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
             url: '<?=site_url('siswa/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#siswa').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
    $("#form-excel-siswa").submit(function(e) {
      e.preventDefault();
      modal_upload = $("#modal-upload");
      form = $(this);
      $.ajax({
       url: '<?=site_url('siswa/importExcel')?>',
       type: 'POST',
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      success: function(){ 
        swal("Berhasil!", "Data Siswa Dari Excel Berhasil Di Import.", "success");
        form[0].reset();
        modal_upload.modal('hide');
        $('#siswa').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $("#form-multiple").submit(function(e) {
      e.preventDefault();
      modal_multiple = $("#modal-multiple");
      form = $(this);
      $.ajax({
       url: '<?=site_url('siswa/multipleUpload')?>',
       type: 'POST',
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      success: function(){ 
        swal("Berhasil!", "Upload Multiple Foto Siswa Berhasil.", "success");
        form[0].reset();
        modal_multiple.modal('hide');
        $('#siswa').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>