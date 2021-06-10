<style>
/* *{font-family: 'Roboto', sans-serif;} */
/* 
@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 4px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 20px;
  text-align: center;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
} */
</style>
<?php 
foreach($soal->result_array() as $result) : ?>
<?php echo $result['soal'] ?>
<?php endforeach;?>
<div class="funkyradio"><div class="funkyradio-success" onclick="return simpan_sementara();">
<input type="radio" id="opsi_a_3" name="opsi_1" value="A"> <label for="opsi_a_3"><div class="huruf_opsi">a</div><p>Alwan<p><div class="w-25"></div></label></div><div class="funkyradio-success" onclick="return simpan_sementara();">
<input type="radio" id="opsi_b_3" name="opsi_1" value="B"> <label for="opsi_b_3"><div class="huruf_opsi">b</div> <p></p><p>The students are watching their preacher.</p><p></p><div class="w-25"></div></label></div><div class="funkyradio-success" onclick="return simpan_sementara();">
<input type="radio" id="opsi_c_3" name="opsi_1" value="C"> <label for="opsi_c_3"><div class="huruf_opsi">c</div> <p></p><p>The teacher is angry with their students.</p><p></p><div class="w-25"></div></label></div><div class="funkyradio-success" onclick="return simpan_sementara();">
<input type="radio" id="opsi_d_3" name="opsi_1" value="D"> <label for="opsi_d_3"><div class="huruf_opsi">d</div> <p></p><p>The students are listening to their lecturer.</p><p></p><div class="w-25"></div></label></div><div class="funkyradio-success" onclick="return simpan_sementara();">
<input type="radio" id="opsi_e_3" name="opsi_1" value="E"> <label for="opsi_e_3"><div class="huruf_opsi">e</div> <p></p><p>The students detest the preacher.</p><p></p><div class="w-25"></div></label></div></div>
<!-- <div>
  <label>
    <input type="radio" class="option-input radio" name="example" />
    Radio option
  </label><br>
  <label>
    <input type="radio" class="option-input radio" name="example" />
    Radio option
  </label><br>
  <label>
    <input type="radio" class="option-input radio" name="example" />
    Radio option
  </label><br>
</div> -->
<!-- <?php
$numbers = range(1, 20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}
?> -->