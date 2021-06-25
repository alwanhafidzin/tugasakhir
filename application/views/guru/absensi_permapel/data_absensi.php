<table  id="data_a_permapel_tambah" class="table table-bordered"  width="100%">
    <thead>
        <tr>
            <th class="text-center" width="20px">Absensi</th>
            <th class="text-center">Nis</th>
            <th>Nama</th>
            <th class="text-center" width="20px">Hadir</th>
            <th class="text-center" width="20px">Izin</th>
            <th class="text-center" width="20px">Sakit</th>
            <th class="text-center" width="20px">Alpha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($absensi_permapel->result() as $result) : ?>
        <tr>
          <td class="text-center"><?php echo $result->no_absen ?></td>
          <td class="text-center"><?php echo $result->nis ?></td>
          <td><?php echo $result->nama ?></td>
          <td class="text-center">
            <div class="icheck-primary d-inline ml-2">
                <input type="checkbox"  class="hadir<?php echo $result->id ?>" value="" onchange="Hadir('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'H') echo "checked='checked'"; ?> id="todoCheck1-<?php echo $result->id ?>">
                <label for="todoCheck1-<?php echo $result->id ?>"></label>
            </div>
          </td>
          <td class="text-center">
            <div  class="icheck-primary d-inline ml-2">
                <input type="checkbox"  class="izin<?php echo $result->id ?>" value="" onchange="Izin('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'I') echo "checked='checked'"; ?> id="todoCheck2-<?php echo $result->id ?>">
                <label for="todoCheck2-<?php echo $result->id ?>"></label>
            </div>
           </td>
           <td class="text-center">
            <div class="icheck-primary d-inline ml-2">
                <input type="checkbox"  class="sakit<?php echo $result->id ?>" value="" onchange="Sakit('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'S') echo "checked='checked'"; ?> id="todoCheck3-<?php echo $result->id ?>">
                <label for="todoCheck3-<?php echo $result->id ?>"></label>
            </div>
           </td>
           <td class="text-center">
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" class="alpha<?php echo $result->id ?>" value="" onchange="Alpha('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'A') echo "checked='checked'"; ?> id="todoCheck4-<?php echo $result->id ?>">
                  <label for="todoCheck4-<?php echo $result->id ?>"></label>
                </div>
           </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<script>
    function Hadir(id)
    { 
      if($(".hadir"+id).is(':checked')) {
        $(".hadir"+id).val('H');
      } else {
        $(".hadir"+id).val('0');
      }
      let absensi = $(".hadir"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".izin"+id).prop('checked', false);
        $(".sakit"+id).prop('checked', false);
        $(".alpha"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function Izin(id)
    { 
      if($(".izin"+id).is(':checked')) {
        $(".izin"+id).val('I');
      } else {
        $(".izin"+id).val('0');
      }
      let absensi = $(".izin"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".hadir"+id).prop('checked', false);
        $(".sakit"+id).prop('checked', false);
        $(".alpha"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function Sakit(id)
    { 
      if($(".sakit"+id).is(':checked')) {
        $(".sakit"+id).val('S');
      } else {
        $(".sakit"+id).val('0');
      }
      let absensi = $(".sakit"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".izin"+id).prop('checked', false);
        $(".hadir"+id).prop('checked', false);
        $(".alpha"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function Alpha(id)
    { 
      if($(".alpha"+id).is(':checked')) {
        $(".alpha"+id).val('A');
      } else {
        $(".alpha"+id).val('0');
      }
      let absensi = $(".alpha"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi : absensi
            },
      success: function(data){ 
        $(".izin"+id).prop('checked', false);
        $(".sakit"+id).prop('checked', false);
        $(".hadir"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
</script>