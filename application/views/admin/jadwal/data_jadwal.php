<style>
.drop_sl2 option[disabled] {
  display: none;
}
.select2-container--default .select2-results__option[aria-disabled=true] {
    display: none;
}
</style>
<table id="jadwal" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kelas</th>
         <th class="text-center">Guru</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Hari</th>
         <th class="text-center">Jam Mulai</th>
         <th class="text-center">Jam Selesai</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($jadwal->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td>
                <div class="form-group">
                  <select class="form-control select2 item<?php echo $result->id ?> drop_sl2" onchange="myFunction('<?php echo $result->id ?>')" name="ruangan_sl2" style="width: 100%;">
                     <?php if ($result->nip == null) { ?>
                        <option value="">Belum Memilih Guru</option>
                     <?php } ?>
                       <?php foreach($guru_mapel as $row2) : ?>
                         <option value="<?php echo $row2->nip ?>"<?php if ($row2->nip == $result->nip) {
                         echo "selected";}?><?php if ($row2->kode_mapel != $result->kode_mapel) {
                          echo "disabled";}?>><?php echo $row2->nama ?></option>
                         <?php endforeach ?>
                  </select>
                </div>
            </td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td>
                <div class="form-group">
                  <select class="form-control select2 hari<?php echo $result->id ?> hari_sl2" onchange="myHari('<?php echo $result->id ?>')" name="hari_sl2" style="width: 100%;">
                     <?php foreach($hari as $row2) : ?>
                         <option value="<?php echo $row2->id ?>"<?php if ($row2->id == $result->id_detail_hari) {
                         echo "selected";}?>><?php echo $row2->hari ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input class="jam1<?php echo $result->id ?>" type="time" onchange="jamMulai('<?php echo $result->id ?>')" <?php if($result->jam_mulai == "00:00:00"){ echo "value=''"; } elseif($result->jam_mulai != '00:00:00') {echo "value='$result->jam_mulai'"; } ?>>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input class="jam2<?php echo $result->id ?>" type="time"  onchange="jamSelesai('<?php echo $result->id ?>')" <?php if($result->jam_selesai == "00:00:00"){ echo "value=''"; } elseif($result->jam_selesai != '00:00:00') {echo "value='$result->jam_selesai'"; } ?>>
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
    $(".hari_sl2").select2({
      theme: 'bootstrap4',
    });
    function myFunction(id)
    { 
      let nip_guru = $(".item"+id).val();
      $.ajax({
      url: '<?=site_url('jadwal/crud/update_guru')?>',
      data: {
             id: id,
             nip :nip_guru
            },
      success: function(data){ 
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function myHari(id)
    { 
      let id_hari = $(".hari"+id).val();
      $.ajax({
      url: '<?=site_url('jadwal/crud/update_hari')?>',
      data: {
             id: id,
             hari :id_hari
            },
      success: function(data){ 
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function jamMulai(id)
    { 
      let jam_mulai = $(".jam1"+id).val();
      $.ajax({
      url: '<?=site_url('jadwal/crud/update_jam_mulai')?>',
      data: {
             id: id,
             jam_mulai :jam_mulai
            },
      success: function(data){ 
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function jamSelesai(id)
    { 
      let jam_selesai = $(".jam2"+id).val();
      $.ajax({
      url: '<?=site_url('jadwal/crud/update_jam_selesai')?>',
      data: {
             id: id,
             jam_selesai :jam_selesai
            },
      success: function(data){ 
      },
      error: function(response){
          alert(response);
      }
     })
    }
</script>