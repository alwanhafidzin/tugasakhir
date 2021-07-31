<style>
.drop_sl2 option[disabled] {
  display: none;
}
.select2-container--default .select2-results__option[aria-disabled=true] {
    display: none;
}
</style>
<table id="ruangkelas" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kelas</th>
         <th class="text-center">Ruangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($ruangkelas->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td>
                <div class="form-group">
                  <select class="form-control select2 item<?php echo $result->id ?> drop_sl2" onchange="myFunction('<?php echo $result->id ?>')" name="ruangan_sl2" style="width: 100%;">
                     <?php if ($result->kode_ruangan == '0') { ?>
                        <option value="0">Belum Memilih Ruangan</option>
                     <?php } ?>
                     <?php if ($result->kode_ruangan != '0') { ?>
                       <?php foreach($ruangan2 as $row2) : ?>
                         <option value="<?php echo $row2->kode_ruangan ?>"<?php if ($row2->kode_ruangan == $result->kode_ruangan) {
                         echo "selected";}?><?php if ($row2->kode_ruangan != $result->kode_ruangan) {
                          echo "disabled";}?>><?php echo $row2->ruangan ?></option>
                         <?php endforeach ?>
                     <?php } ?>
                     <?php if ($result->kode_ruangan == '1') { ?>
                      <option value="1" selected>Default</option>
                     <?php }else{ ?>
                     <option value="1">Default</option>
                     <?php } ?>
                     <?php foreach($ruangan->result() as $row) : ?>
                       <option value="<?php echo $row->kode_ruangan ?>"<?php if ($row->kode_ruangan == $result->kode_ruangan) {
                       echo "selected";}?>><?php echo $row->ruangan ?></option>
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
      let kode_ruangan = $(".item"+id).val();
      $.ajax({
      url: '<?=site_url('ruangkelas/crud/update')?>',
      data: {
             id: id,
             kode_ruangan :kode_ruangan
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

     <!-- Foreach cek foreach
     <?php 
     foreach( $first_array as $key => $value) {
      foreach( $second_array as $second ){
        if ($second['menu_url'] == $key) {
           echo "Hi";
        }
       }
    }
     ?>
      Masukkan ke table bagian ruangan
     <?php foreach($ruangan as $row) : ?>
              <?php
              if ($row->kode_ruangan == $result->kode_ruangan) {
                echo "Hi";
              }else{
                echo 'Lah';
              }
              ?>
            <?php endforeach ?> -->