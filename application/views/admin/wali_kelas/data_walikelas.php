<style>
.drop_sl2 option[disabled] {
  display: none;
}
.select2-container--default .select2-results__option[aria-disabled=true] {
    display: none;
}
</style>
<table id="walikelas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kelas</th>
         <th class="text-center">Wali Kelas</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($walikelas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td>
                <div class="form-group">
                  <select class="form-control select2 item<?php echo $result->id ?> drop_sl2" onchange="myFunction('<?php echo $result->id ?>')" name="ruangan_sl2" style="width: 100%;">
                     <?php if ($result->nip == '0') { ?>
                        <option value="0">Belum Memilih Wali Kelas</option>
                     <?php } ?>
                     <?php if ($result->nip != '0') { ?>
                       <?php foreach($guru2 as $row2) : ?>
                         <option value="<?php echo $row2->nip ?>"<?php if ($row2->nip == $result->nip) {
                         echo "selected";}?><?php if ($row2->nip != $result->nip) {
                          echo "disabled";}?>><?php echo $row2->nama ?></option>
                         <?php endforeach ?>
                     <?php } ?>
                     <option value="1">Default</option>
                     <?php foreach($guru->result() as $row) : ?>
                       <option value="<?php echo $row->nip ?>"<?php if ($row->nip == $result->nip) {
                       echo "selected";}?>><?php echo $row->nama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
    $(".drop_sl2").select2({
      theme: 'bootstrap4',
      templateResult: function(option) {
      if(option.element && (option.element).hasAttribute('disabled')){
         return null;
      }
      return option.text;
     }
    });
    function myFunction(id)
    { 
      let nip_guru = $(".item"+id).val();
      $.ajax({
      url: '<?=site_url('walikelas/crud/update')?>',
      data: {
             id: id,
             nip :nip_guru
            },
      success: function(data){ 
        refresh_table();
      },
      error: function(response){
          alert(response);
      }
     })
    }
</script>