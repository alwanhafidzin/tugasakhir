<table id="jurusan" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Ruangan</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($jurusan->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_ruang ?></td>
            <td class="text-center"><?php echo $result->ruangan ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->kode_ruang ?>" data-placement="top" title="Edit"></i>
                <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->kode_ruang ?>" data-placement="top" title="Delete"></i>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Ruangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-jurusan">
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kode_ruangan">Kode Ruangan</label>
                    <input type="text" class="form-control" autocomplete="off" name="kode_ruangan" placeholder="Masukkan Kode Ruangan">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" autocomplete="off" name="jurusan" placeholder="Masukkan Nama Jurusan">
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
        url: '<?=site_url('jurusan/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-jurusan input[name='id']").val(data.object.kode_jurusan);
        $("#form-edit-jurusan input[name='kode_jurusan']").val(data.object.kode_jurusan);
        $("#form-edit-jurusan input[name='jurusan']").val(data.object.jurusan);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-jurusan input[name='jurusan']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit-jurusan").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('jurusan/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#jurusan').DataTable().clear().destroy();
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
          url: '<?=site_url('jurusan/crud/delete')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#jurusan').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
        })
      }
    });
</script>