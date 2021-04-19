<table id="kelas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Kelas</th>
         <th class="text-center">Nama Kelas</th>
         <th class="text-center">Tingkatan Kelas</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($kelas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_kelas ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td class="text-center"><?php echo $result->tingkatan ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_kelas ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_kelas ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Jurusan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-kelas">
            <input type="hidden" name="id"/>
              <div class="col-lg-12">
               <div class="form-group">
                    <label for="kode_kelas">Kode Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="kode_kelas" placeholder="Masukkan Kode Jurusan">
                </div>
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama_kelas" placeholder="Masukkan Nama ">
                </div>
                <div class="form-group">
                  <label>Tingkatan Kelas</label>
                  <select class="form-control select2" name="kode_tingkat" id="kode_tingkat" style="width: 100%;">
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control select2" name="kode_jurusan" id="kode_jurusan" style="width: 100%;">
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
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

<script>
  //Menampilkan data diedit
    modal_edit = $("#modal-edit");
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('kelas/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-kelas input[name='id']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='kode_kelas']").val(data.object.kode_kelas);
        $("#form-edit-kelas input[name='nama_kelas']").val(data.object.nama_kelas);
        $("#kode_tingkat").val(data.object.kode_tingkat);
        $("#kode_jurusan").val(data.object.kode_jurusan);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-kelas input[name='kode_kelas']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit-kelas").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('kelas/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#kelas').DataTable().clear().destroy();
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
          url: '<?=site_url('kelas/crud/delete')?>',
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
</script>