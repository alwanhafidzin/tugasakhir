<table  id="data_a_permapel_edit" class="table table-bordered"  width="100%">
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
                <input type="checkbox"  class="hadir-edit<?php echo $result->id ?>" value="" onchange="HadirEdit('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'H') echo "checked='checked'"; ?> id="todoCheck1-<?php echo $result->id ?>">
                <label for="todoCheck1-<?php echo $result->id ?>"></label>
            </div>
          </td>
          <td class="text-center">
            <div  class="icheck-primary d-inline ml-2">
                <input type="checkbox"  class="izin-edit<?php echo $result->id ?>" value="" onchange="IzinEdit('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'I') echo "checked='checked'"; ?> id="todoCheck2-<?php echo $result->id ?>">
                <label for="todoCheck2-<?php echo $result->id ?>"></label>
            </div>
           </td>
           <td class="text-center">
            <div class="icheck-primary d-inline ml-2">
                <input type="checkbox"  class="sakit-edit<?php echo $result->id ?>" value="" onchange="SakitEdit('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'S') echo "checked='checked'"; ?> id="todoCheck3-<?php echo $result->id ?>">
                <label for="todoCheck3-<?php echo $result->id ?>"></label>
            </div>
           </td>
           <td class="text-center">
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" class="alpha-edit<?php echo $result->id ?>" value="" onchange="AlphaEdit('<?php echo $result->id ?>')" name="todo1" <?php if ($result->absensi == 'A') echo "checked='checked'"; ?> id="todoCheck4-<?php echo $result->id ?>">
                  <label for="todoCheck4-<?php echo $result->id ?>"></label>
                </div>
           </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
    function HadirEdit(id)
    { 
      if($(".hadir-edit"+id).is(':checked')) {
        $(".hadir-edit"+id).val('H');
      } else {
        $(".hadir-edit"+id).val('0');
      }
      let absensi = $(".hadir-edit"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".izin-edit"+id).prop('checked', false);
        $(".sakit-edit"+id).prop('checked', false);
        $(".alpha-edit"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function IzinEdit(id)
    { 
      if($(".izin-edit"+id).is(':checked')) {
        $(".izin-edit"+id).val('I');
      } else {
        $(".izin-edit"+id).val('0');
      }
      let absensi = $(".izin-edit"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".hadir-edit"+id).prop('checked', false);
        $(".sakit-edit"+id).prop('checked', false);
        $(".alpha-edit"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function SakitEdit(id)
    { 
      if($(".sakit-edit"+id).is(':checked')) {
        $(".sakit-edit"+id).val('S');
      } else {
        $(".sakit-edit"+id).val('0');
      }
      let absensi = $(".sakit-edit"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi: absensi
            },
      success: function(data){ 
        $(".izin-edit"+id).prop('checked', false);
        $(".hadir-edit"+id).prop('checked', false);
        $(".alpha-edit"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
    function AlphaEdit(id)
    { 
      if($(".alpha-edit"+id).is(':checked')) {
        $(".alpha-edit"+id).val('A');
      } else {
        $(".alpha-edit"+id).val('0');
      }
      let absensi = $(".alpha-edit"+id).val();
      $.ajax({
      url: '<?=site_url('absensipermapel/crud/update_absensi')?>',
      data: {
             id: id,
             absensi : absensi
            },
      success: function(data){ 
        $(".izin-edit"+id).prop('checked', false);
        $(".sakit-edit"+id).prop('checked', false);
        $(".hadir-edit"+id).prop('checked', false);
      },
      error: function(response){
          alert(response);
      }
     })
    }
</script>