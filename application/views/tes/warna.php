<html>
<head>
	<title>warna</title>
</head>
<body>
<div>
    <span>Group 1:</span>
    <input type="checkbox" class="group1" checked />
    <input type="checkbox" class="group1" />
    <input type="checkbox" class="group1" />
</div>

<div>
    <span>Group 2:</span>
    <input type="checkbox" class="group2" />
    <input type="checkbox" class="group2" checked />
    <input type="checkbox" class="group2" />
</div>

<div>
    <span>Group 3:</span>
    <input type="checkbox" class="group3" />
    <input type="checkbox" class="group3" />
    <input type="checkbox" class="group3" checked />
</div>
	<?php echo form_open('warna/insert') ?>
		<input type="checkbox" name="check_list[]" id="progress1" alt="Checkbox" class="group1"  onClick="ckChange(this)" value="merah"> merah
		<input type="checkbox" name="check_list[]" id="progress2" alt="Checkbox" class="group1"  onClick="ckChange(this)" value="kuning"> kuning
		<input type="checkbox" name="check_list[]" id="progress3" alt="Checkbox" class="group1"  onClick="ckChange(this)" value="hijau"> hijau
		<input type="checkbox" name="check_list[]" id="progress4" alt="Checkbox" class="group1"  onClick="ckChange(this)" value="biru"> biru
		<input type="submit"   name="tampil" value="Simpan">
	<?php echo form_close()?>
 
	<table border="1">
		<tr>
			<td>No</td>
			<td>Nama Warna</td>
		</tr>
	<?php $i=1; foreach($tampil_warna as $tampil) { ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>

        <input type="checkbox" name="check_list[]" alt="Checkbox" value="merah"  id="progress1"  onClick="ckChange(this)" <?php if ($tampil->option == 'merah') echo "checked='checked'"; ?>> merah
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="kuning"  id="progress2" onClick="ckChange(this)" <?php if ($tampil->option == 'kuning') echo "checked='checked'"; ?>> kuning
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="hijau"   id="progress3" onClick="ckChange(this)" <?php if ($tampil->option == 'hijau') echo "checked='checked'"; ?>> hijau
		<input type="checkbox" name="check_list[]" alt="Checkbox" value="biru"   id="progress4" onClick="ckChange(this)" <?php if ($tampil->option == 'biru') echo "checked='checked'"; ?>> biru
                <?php echo $tampil->option ?>
            </td>
		</tr>
	<?php $i++; } ?>
</table>
<script src="<?=base_url()?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>
<script>
// function ckChange(ckType){
//     var ckName = document.getElementsByName(ckType.name);
//     var checked = document.getElementById(ckType.id);

//     if (checked.checked) {
//       for(var i=0; i < ckName.length; i++){

//           if(!ckName[i].checked){
//               ckName[i].disabled = true;
//           }else{
//               ckName[i].disabled = false;
//           }
//       } 
//     }
//     else {
//       for(var i=0; i < ckName.length; i++){
//         ckName[i].disabled = false;
//       } 
//     }    
// }
$('input[type="checkbox"]').on('change', function() {
   $(this).siblings('input[type="checkbox"]').prop('checked', false);
});
</script>
</body>
</html>