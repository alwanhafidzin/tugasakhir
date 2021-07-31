<table id="hari_masuk" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th class="text-center">No</th>
    <th class="text-center">Hari</th>
    <th class="text-center">Status</th>
    <th class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php foreach($hari_masuk->result() as $result) : ?>
        <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td class="text-center"><?php echo $result->hari ?></td>
        <td class="text-center"><?php if ($result->status=='masuk' ){echo'<button type="button" class="btn btn-success btn-xs">Masuk</button>';}else{echo'<button type="button" class="btn btn-danger btn-xs">Libur</button>';}?></td>
        <td class="text-center">
        <button type="button" class="btn btn-primary btn-xs ubah_status"data-id="<?php echo $result->id ?>">Aktifkan</button>
        </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<script>
    $(".ubah_status").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      $.ajax({
          url: '<?=site_url('datalain/update_hari_masuk')?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success: function(data){ 
          $('#hari_masuk').DataTable().clear().destroy();
          refresh_table2();
          },
          error: function(response){
          alert(response);
          }
      })
    });
</script>