<table id="list_ujian" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nama Ujian</th>
         <th class="text-center">Tipe Ujian</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Batas Akhir</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($list_ujian->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_ujian ?></td>
            <td class="text-center"><?php echo $result->tipe ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->terlambat ?></td>
            <td class="text-center">
                <i class="btn btn-xs btn-primary fa fa-eye lihat-ujian" data-id="<?php echo $result->id ?>" data-waktu="<?php echo $result->waktu ?>" data-jenis="<?php echo $result->jenis ?>" data-id_k_ujian="<?php echo $result->id_k_ujian ?>" data-placement="top" title="Lihat"></i>
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
              <h4 class="modal-title">Edit Data Jurusan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id"/>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kategorisoal">Kategori Soal</label>
                    <input type="text" autocomplete="off"class="form-control" name="kategori_soal" placeholder="Masukkan Nama Kategori Soal">
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
    $(".lihat-ujian").click(function(e) {
      id = $(this).data('id');
      id_k_ujian = $(this).data('id_k_ujian');
      waktu = $(this).data('waktu');
      jenis = $(this).data('jenis');
      $.ajax({
      url: '<?=site_url('listujiansiswa/buat_soal')?>',
      type: 'POST',
      dataType: 'json',
      data:{
          id :id,
          id_k_ujian : id_k_ujian,
          waktu : waktu,
          jenis : jenis
      },
      success: function(data){ 
        swal("Berhasil!", "Data Berhasil Ditambahkan.", "success");
      },
      error: function(response){
          alert(response);
      }
     })
    });
    $(".edit-data").click(function(e) {
      id = $(this).data('id');
      $.ajax({
      url: '<?=site_url('kategorisoal/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
       data:{
           id :id
       },
      })
      .done(function(data) {
        alert('Ok Berhasil');
      });
    });
    //Proses Update ke Db
    $("#form-edit").submit(function(e) {
    e.preventDefault();
    form = $(this);
    $.ajax({
      url: '<?=site_url('kategorisoal/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        swal("Berhasil!", "Data Kategori Soal Berhasil Diupdate.", "success");
        modal_edit.modal('hide');
        $('#kategori_soal').DataTable().clear().destroy();
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
             url: '<?=site_url('kategorisoal/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Kategori Soal Berhasil Dihapus.", "success");
                  $('#kategori_soal').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
</script>