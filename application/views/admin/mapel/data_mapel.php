<table id="mapel" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Mapel</th>
         <th class="text-center">Nama Mapel</th>
         <th class="text-center">Kelompok Mapel</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($mapel->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_mapel ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->kelompok_mapel ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_mapel ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_mapel ?>" data-placement="top" title="Delete"></i>
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
            <form id="form-edit">
              <div class="col-lg-12">
              <div class="form-group">
                    <label for="kode_mapel">Kode Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="kode_mapel" placeholder="Masukkan Kode Mapel">
                </div>
                <div class="form-group">
                    <label for="mapel">Nama Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="mapel" placeholder="Masukkan Nama Mapel">
                </div>
                <div class="form-group">
                  <label>Kelompok Mapel</label>
                  <select class="form-control select2" id="kelompok_mapel_sl2_edit" name="kelompok_mapel" style="width: 100%;">
                     <?php foreach($kelompok_mapel as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->kelompok_mapel ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control select2" name="jurusan" id="jurusan_sl2_edit" style="width: 100%;">
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                    <?php endforeach ?>
                  </select>
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

<script>
  //Menampilkan data diedit
    modal_edit = $("#modal-edit");
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
        url: '<?=site_url('mapel/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='kode_mapel']").val(data.object.kode_mapel);
        $("#form-edit input[name='mapel']").val(data.object.mapel);
        $("#kelompok_mapel").val(data.object.id_k_mapel);
        $("#jurusan").val(data.object.kode_jurusan);
        $('#kelompok_mapel_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        $('#jurusan_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='kode_mapel']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('mapel/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#mapel').DataTable().clear().destroy();
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
          url: '<?=site_url('mapel/crud/delete')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#mapel').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
        })
      }
    });
</script>