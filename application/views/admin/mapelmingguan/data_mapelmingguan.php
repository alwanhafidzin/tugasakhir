<table id="mapelmingguan" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Nama Mapel</th>
         <th class="text-center">Kelompok Mapel</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Tingkat Kelas</th>
         <th class="text-center">Per Minggu</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($mapelmingguan->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->kelompok_mapel ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
            <td class="text-center"><?php echo $result->tingkatan ?></td>
            <td class="text-center"><?php echo $result->jumlah ?></td>
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
              <h4 class="modal-title">Edit Data Jumlah Jadwal Per Minggu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-edit">
            <input type="hidden" name="id"/>
            <?php foreach($tahun_aktif->result() as $result) : ?>
            <input type="hidden" name="tahunakademik" value="<?php echo $result->id ?>"/>
            <input type="hidden" name="semester" value="<?php echo $result->semester ?>"/>
            <?php endforeach;?>
            <div class="col-lg-12">
                <div class="form-group">
                  <label>Pilih Jurusan</label>
                  <select class="form-control select2" id="jurusan_sl2_edit" onchange="myJurusanEdit()" name="jurusan" style="width: 100%;">
                    <option value="">Pilih Jurusan</option>
                     <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Tingkat Kelas</label>
                  <select class="form-control select2" id="tingkatkelas_sl2_edit" name="tingkatkelas" style="width: 100%;">
                    <option value="">Pilih Tingkat Kelas</option>
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="mapel" onchange="myMapelEdit()" id="mapel_sl2_edit" style="width: 100%;">
                    <option value="">Pilih Mapel</option>
                    <?php foreach($mapel as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->kode_mapel ?>(<?php echo $row->mapel ?>)</option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="kelompok_mapel">Kelompok Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="kelompok_mapel" id="kelompok_mapel_edit" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" autocomplete="off"class="form-control" name="jurusan" id="jurusan_edit" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Mapel Diulangi Perminggu</label>
                    <input type="number" autocomplete="off"class="form-control" name="jumlah" id="jumlah_edit">
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
        url: '<?=site_url('mapelmingguan/get_by_id')?>',
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        $("#form-edit input[name='id']").val(data.object.id);
        $("#form-edit input[name='kelompok_mapel']").val(data.object.kelompok_mapel);
        $("#form-edit input[name='jurusan']").val(data.object.jurusan);
        $("#form-edit input[name='jumlah']").val(data.object.jumlah);
        $("#jurusan_sl2_edit").val(data.object.kode_jurusan);
        $("#mapel_sl2_edit").val(data.object.kode_mapel);
        $("#tingkatkelas_sl2_edit").val(data.object.kode_tingkat);
        $('#jurusan_sl2_edit').select2({
          theme: 'bootstrap4'
        });
        $('#tingkatkelas_sl2_edit').select2({
         theme: 'bootstrap4'
        });
        $('#mapel_sl2_edit').select2({
         theme: 'bootstrap4'
        });
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
      url: '<?=site_url('mapelmingguan/crud/update')?>',
      type: 'POST',
      dataType: 'json',
      data: form.serialize(),
      success: function(data){ 
        form[0].reset();
        alert('success!');
        modal_edit.modal('hide');
        $('#gurumapel').DataTable().clear().destroy();
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
      alert(id);
      if (confirm("Anda yakin menghapus data ini?")) {
        $.ajax({
          url: '<?=site_url('mapelmingguan/crud/delete')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#mapelmingguan').DataTable().clear().destroy();
          refresh_table();
          },
          error: function(response){
          alert(response);
          }
        })
      }
    });
    function myJurusanEdit()
    { 
      let id_jurusan = $("#jurusan_sl2_edit").val();
      $.ajax({
        url: '<?=site_url('mapelmingguan/get_mapel_jurusan')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_jurusan: id_jurusan},
        success: function(response) {
          $("#tingkatkelas_sl2_edit").prop("disabled", false); 
          $("#mapel_sl2_edit").prop("disabled", false); 
          $.each(response,function(index,data){
           $('#mapel_sl2_edit').append('<option value="'+data['kode_mapel']+'">'+data['kode_mapel']+"("+data['mapel']+")"+'</option>');
         });
        },
        error: function (request, status, error) {
          alert('data Mapel Untuk Jurusan Ini Kosong');
          $("#mapel_sl2_edit").prop("disabled", true).empty();
          $("#jumlah_edit").prop("disabled", true).empty();
          $("#tingkatkelas_sl2_edit").prop("disabled", true);
          $("#kelompok_mapel_edit").val('');
          $("#jurusan_edit").val('');
          $("#jumlah_edit").val('');
        }
      })
    }
  function myMapelEdit()
    { 
      let id_mapel = $("#mapel_sl2_edit").val();
      $.ajax({
        url: '<?=site_url('gurumapel/get_detail_mapel')?>',
        type: 'GET',
        dataType: 'json',
        data: {id_mapel: id_mapel},
        success: function(data) {
          $("#kelompok_mapel_edit").val(data.object.kelompok_mapel);
          $("#jurusan_edit").val(data.object.jurusan);
          $("#jumlah_edit").prop("disabled", false);
        },
        error: function (request, status, error) {
          alert(request.responseText);
        }
      })
    }
</script>