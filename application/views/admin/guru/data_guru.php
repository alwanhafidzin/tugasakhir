<style>
  .zoom:hover {
    transform: scale(5.5);
}
</style>

<table id="guru" class="table table-bordered table-striped center-all">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nip</th>
         <th class="text-center">Nama</th>
         <th class="text-center">Foto</th>
         <th class="text-center">Email</th>
         <th class="text-center">Agama</th>
         <th class="text-center">Gender</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($guru->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nip ?></td>
            <td class="text-center"><?php echo $result->nama ?></td>
            <td class="text-center"><img width="35" src="<?php echo base_url()?>uploads/guru/<?php echo $result->foto; ?>" /></td>
            <td class="text-center"><?php echo $result->email ?></td>
            <td class="text-center"><?php echo $result->agama ?></td>
            <td class="text-center"><?php if($result->gender == "P"){ echo "Pria"; } elseif($result->gender == "W") {echo "Wanita"; } ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->nip ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->nip ?>" data-placement="top" title="Delete"></i>
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
            <form id="form-edit-guru" method='POST' enctype='multipart/form-data'>
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
               <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" autocomplete="off"class="form-control" name="nip" placeholder="Masukkan NIP">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label><br>
                    <img id="foto-guru" src="" alt="Foto Siswa" width="150" height="200">
                    <input type="file" autocomplete="off"class="form-control" name="foto" placeholder="Pilih Foto">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off"class="form-control" name="email" placeholder="Masukkan Email Aktif">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control select2" name="agama" id="agamatbh" style="width: 100%;">
                     <?php foreach($agama as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->agama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2" name="jkelamin" id="jkelamintbh" style="width: 100%;">
                      <option value="P">Pria</option>
                      <option value="W">Wanita</option>
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
              <h4 class="modal-title">Upload Data Guru Via Excel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-excel-guru">
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
              <h4 class="modal-title">Upload Multiple Foto Guru</h4>
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
        url: '<?=site_url('guru/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-guru input[name='nip']").val(data.object.nip);
        $("#form-edit-guru input[name='nama']").val(data.object.nama);
        var foto = data.object.foto;
        $('#foto-guru').attr("src", `<?php echo base_url()?>uploads/siswa/${foto}`);
        $("#form-edit-guru input[name='email']").val(data.object.email);
        $("#agama").val(data.object.id_agama);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-guru input[name='nip']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit-guru").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('guru/crud/update')?>',
      type: 'POST',
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success: function(data){ 
        form[0].reset();
        modal_edit.modal('hide');
        swal("Berhasil!", "Data guru berhasil diedit.", "success");
        $('#guru').DataTable().clear().destroy();
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
             url: '<?=site_url('guru/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#guru').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
    $("#form-excel-guru").submit(function(e) {
      e.preventDefault();
      modal_upload = $("#modal-upload");
      form = $(this);
      $.ajax({
       url: '<?=site_url('guru/importExcel')?>',
       type: 'POST',
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      success: function(){ 
        swal("Berhasil!", "Data Guru Dari Excel Berhasil Di Import.", "success");
        form[0].reset();
        modal_upload.modal('hide');
        $('#guru').DataTable().clear().destroy();
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
        swal("Berhasil!", "Upload Multiple Foto Guru Berhasil.", "success");
        form[0].reset();
        modal_multiple.modal('hide');
        $('#guru').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>