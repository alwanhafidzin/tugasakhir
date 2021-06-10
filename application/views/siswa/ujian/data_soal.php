<?php 
foreach($soal->result_array() as $result) : ?>
<?php echo $result['soal'] ?>
<input type="hidden" id="hidden_ragu" value="<?php echo $result['ragu'] ?>"/>
<input type="hidden" id="hidden_id" value="<?php echo $result['id'] ?>"/>
<div class="funkyradio">
<div class="funkyradio-success"onchange="SimpanA('<?php echo $result['id'] ?>')"><input type="radio" id="opsi_a_3" name="opsi_1" value="A" <?php if($result['jawaban']=='A'){echo 'checked';} ?>> <label for="opsi_a_3"><?php echo $result['opsi_a'] ?><div class="w-25"></div></label></div>
<div class="funkyradio-success" onchange="SimpanB('<?php echo $result['id'] ?>')"><input type="radio" id="opsi_b_3" name="opsi_1" value="B" <?php if($result['jawaban']=='B'){echo 'checked';} ?>> <label for="opsi_b_3"><?php echo $result['opsi_b'] ?><div class="w-25"></div></label></div>
<div class="funkyradio-success" onclick="SimpanC('<?php echo $result['id'] ?>')"><input type="radio" id="opsi_c_3" name="opsi_1" value="C" <?php if($result['jawaban']=='C'){echo 'checked';} ?>> <label for="opsi_c_3"><?php echo $result['opsi_c'] ?><div class="w-25"></div></label></div>
<div class="funkyradio-success" onclick="SimpanD('<?php echo $result['id'] ?>')"><input type="radio" id="opsi_d_3" name="opsi_1" value="D" <?php if($result['jawaban']=='D'){echo 'checked';} ?>> <label for="opsi_d_3"><?php echo $result['opsi_d'] ?><div class="w-25"></div></label></div>
<div class="funkyradio-success" onclick="SimpanE('<?php echo $result['id'] ?>')"><input type="radio" id="opsi_e_3" name="opsi_1" value="E" <?php if($result['jawaban']=='E'){echo 'checked';} ?>> <label for="opsi_e_3"><?php echo $result['opsi_e'] ?><div class="w-25"></div></label></div>
<?php endforeach;?>

