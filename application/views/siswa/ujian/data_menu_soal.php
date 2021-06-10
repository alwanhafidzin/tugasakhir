
<?php $no = 1; 
$jumlah=0;?>
<?php $off = 0; ?>
<?php foreach($list_soal->result() as $result) : ?>
<?php
    if($result->jawaban != null){
    if($result->ragu== 'N'){
    echo '<button class="btn btn-success btn-sm" onclick="GetSoal(\''.$off++.'\');">'.$no++.'</button>';
    }else{
    echo '<button class="btn btn-warning btn-sm"  onclick="GetSoal(\''.$off++.'\');">'.$no++.'</button>';
    }
    }else{
    if($result->ragu== 'N'){
    echo '<button class="btn default btn-sm" onclick="GetSoal(\''.$off++.'\');">'.$no++.'</button>';
    }else{
    echo '<button class="btn btn-warning btn-sm"  onclick="GetSoal(\''.$off++.'\');">'.$no++.'</button>';
    }
    }
    $jumlah +=1;
    ?>
<?php endforeach;?>
<input type="hidden" id="hidden_count" value="<?php echo $jumlah; ?>"/>