<table id="tahunakademik" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id Tahun Akademik</th>
                    <th class="text-center">Tahun Akademik</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($tahunakademik->result() as $result) : ?>
                     <tr>
                       <td class="text-center"><?php echo $no++ ?></td>
                       <td class="text-center"><?php echo $result->id ?></td>
                       <td class="text-center"><?php echo $result->tahun_akademik ?></td>
                       <td class="text-center"><?php if($result->is_aktif == "N"){ echo "Tidak Aktif"; } elseif($result->is_aktif == "Y") {echo "Aktif"; } ?></td>
                       <td class="text-center"><?php echo $result->semester ?></td>
                       <td class="text-center">
                         <button type="button" class="btn btn-warning btn-xs aktifkan"data-id="<?php echo $result->id ?>">Aktifkan</button>
                         <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                         <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->id ?>" id="delete-data" data-placement="top" title="Delete"></i>
                       </td>
                     </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Tahun Akademik</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="tahunakademik">Tahun Akademik</label>
                    <input type="text" class="form-control" autocomplete="off" name="tahunakademik" placeholder="Masukkan Tahun Akademik">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status" disabled='disabled'>
                      <option value="Y">Aktif</option>
                      <option value="N">Tidak Aktif</option>
                  </select>
                </div>
                <div class="form-group">
                   <label>Semester</label>
                   <select class="form-control" name="semester" id="semester">
                      <option value="ganjil">Ganjil</option>
                      <option value="genap">Genap</option>
                   </select>
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
        url: '<?=site_url('tahunakademik/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='tahunakademik']").val(data.object.tahun_akademik);
        $("#status").val(data.object.is_aktif);
        $("#semester").val(data.object.semester);
        if(document.getElementById("status").value=="N"){
          document.getElementById("semester").disabled = true;
        } else {
          document.getElementById("semester").disabled = false;
        } 
        modal_edit.modal('show').on('shown.bs.modal', function(e) {
          $("#form-edit input[name='tahunakademik']").focus();
        });
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('tahunakademik/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#tahunakademik').DataTable().clear().destroy();
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
          url: '<?=site_url('tahunakademik/crud/delete')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#tahunakademik').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
        })
      }
    });
    $(".aktifkan").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      $.ajax({
          url: '<?=site_url('tahunakademik/set_aktif')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#tahunakademik').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
      })
    });
    $('#semester').select2({
      theme: 'bootstrap4',
    });
</script>