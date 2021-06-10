<table id="materi" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Judul</th>
         <th class="text-center">Tipe</th>
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
            <?php if($result->jenis == "Editor")
            { echo
              '<td class="text-center">
              <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="'.$result->id.'" data-placement="top" title="Edit"></i>
              <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="'.$result->id.'" data-placement="top" title="Delete"></i>
              </td>'; 
            } 
            elseif($result->jenis == "Upload")
            {echo 
              '<td class="text-center">
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

<script>
  //Menampilkan data diedit
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
</script>