<table id="kkm" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">KKM</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($agama->result() as $result) : ?>
                     <tr>
                       <td class="text-center"><?php echo $no++ ?></td>
                       <td class="text-center"><?php echo $result->kkm ?></td>
                       <td class="text-center">
                         <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                       </td>
                     </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data KKM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit-kkm">
            <input type="hidden" name="id">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kkm">Nilai KKM</label>
                    <input type="number"min="0" max="100" class="form-control" autocomplete="off" name="kkm" placeholder="Masukkan Nilai KKM" required>
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
        url: '<?=site_url('datalain/get_by_id_kkm')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit-kkm input[name='id']").val(data.object.id);
        $("#form-edit-kkm input[name='kkm']").val(data.object.kkm);
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit-kkm input[name='kkm']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit-kkm").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('datalain/crud/update_kkm')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data KKM Berhasil Diedit.", "success");
        modal_edit.modal('hide');
        $('#kkm').DataTable().clear().destroy();
        refresh_table();
      },
      error: function(response){
        swal("Gagal!", "Data Gagal diedit terjadi kesalahan.", "error");
      }
     })
    });
</script>