<table id="kelas_siswa" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">NIS</th>
         <th class="text-center">No Absen</th>
         <th class="text-center">Nama</th>
         <th class="text-center">Kelas</th>
         <th class="text-center">Jenis Kelamin</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($kelas_siswa->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nis ?></td>
            <td class="text-center"><?php echo $result->no_absen ?></td>
            <td class="text-center"><?php echo $result->nama ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td class="text-center"><?php if($result->j_kelamin == "L"){ echo "Laki-Laki"; } elseif($result->j_kelamin == "P") {echo "Perempuan"; } ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Kelas Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id"/>
              <div class="col-lg-12">
              <div class="form-group">
                  <label>Pilih Siswa</label>
                  <select class="form-control select2" id="siswa_sl2_edit" name="nis" style="width: 100%;">
                     <?php foreach($siswa as $row) : ?>
                      <option value="<?php echo $row->nis ?>"><?php echo $row->nis ?>-<?php echo $row->nama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="no_absen">No Absen</label>
                    <input type="number" autocomplete="off"class="form-control" name="no_absen" placeholder="Masukkan No Absen ">
                </div>
                <div class="form-group">
                  <label>Tahun Akademik</label>
                  <select class="form-control select2" name="tahunakademik" id="tahunakademik_sl2_edit" style="width: 100%;">
                    <?php foreach($tahun_akademik as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tahun_akademik ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="form-control select2" name="kelas" id="kelas_sl2_edit" style="width: 100%;">
                    <?php foreach($kelas as $row) : ?>
                      <option value="<?php echo $row->kode_kelas ?>"><?php echo $row->nama_kelas ?></option>
                    <?php endforeach ?>
                  </select>
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
              <h4 class="modal-title">Upload Data Kelas Siswa Via Excel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-excel">
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

<script>
  //Menampilkan data diedit
    modal_edit = $("#modal-edit");
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('kelassiswa/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='no_absen']").val(data.object.no_absen);
        $('#tahunakademik_sl2_edit').select2({
         theme: 'bootstrap4',
        }).val(data.object.id_tahun_akademik).trigger('change');
        $('#kelas_sl2_edit').select2({
         theme: 'bootstrap4',
        }).val(data.object.kode_kelas).trigger('change');
        $('#siswa_sl2_edit').select2({
         theme: 'bootstrap4',
        }).val(data.object.nis).trigger('change');
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='id']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('kelassiswa/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#kelassiswa').DataTable().clear().destroy();
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
      if (confirm("Anda yakin menghapus data ini?")) {
        $.ajax({
          url: '<?=site_url('kelassiswa/crud/delete')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#kelas').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
        })
      }
    });
    $("#form-excel").submit(function(e) {
      e.preventDefault();
      modal_upload = $("#modal-upload");
      form = $(this);
      $.ajax({
       url: '<?=site_url('kelassiswa/importExcel')?>',
       type: 'POST',
       data:new FormData(this),
       processData:false,
       contentType:false,
       cache:false,
       async:false,
      success: function(){ 
        swal("Berhasil!", "Data Kelas Siswa Dari Excel Berhasil Di Import.", "success");
        form[0].reset();
        modal_upload.modal('hide');
        $('#kelas_siswa').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    });
</script>