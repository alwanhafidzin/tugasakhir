<?php foreach($ujian->result() as $result) : ?>
<?php 
    // echo $result->waktu_selesai;
    $datetime = date('Y-m-d H:i:s');
    $start_date = new DateTime($datetime);
    $since_start = $start_date->diff(new DateTime($result->waktu_selesai));
    // echo $since_start->days.' days total<br>';
    // echo $since_start->y.' years<br>';
    // echo $since_start->m.' months<br>';
    // echo $since_start->d.' days<br>';
    // echo $since_start->h.' hours<br>';
    // echo $since_start->i.' minutes<br>';
    // echo $since_start->s.' seconds<br>';
    // date_default_timezone_set('Asia/Kolkata');
    $curDateTime = $datetime;
    $myDate = date("Y-m-d H:i:s", strtotime($result->waktu_selesai));
    if($myDate < $curDateTime){
        $total=0;
    }else{
        $start_date = new DateTime($datetime);
        $since_start = $start_date->diff(new DateTime($result->waktu_selesai));
        $jam= $since_start->h;
        $menit= $since_start->i;
        $detik= $since_start->s;
        $total = ($jam*3600)+($menit*60)+$detik;
    }
    $id =$this->uri->segment(3);
    // $timezone = new DateTimeZone('Asia/Jakarta');
// $date = new DateTime();
// $date->setTimeZone($timezone);

// echo 'Indonesian Timezone: ' . $date->format('Y-m-d H:i:s') . '<br/>';
// echo 'Default Timezone: ' . date('Y-m-d H:i:s');
?>
<?php endforeach;?>
<script>
function tampil_menu() {
    var id = "<?php echo $id; ?>";
    $.ajax({
        type: 'GET',
        url: "<?php echo base_url(); ?>/ujian/get_list_soal",
        data:{
          id :id
        },
        success: function(data) {
          $("#tampil_menu").html(data);
        }
      });
    };
tampil_menu();
function refresh_soal() {
    var id = "<?php echo $id; ?>";
    $.ajax({
        type: 'GET',
        url: "<?php echo base_url(); ?>/ujian/get_soal",
        data:{
          id :id
        },
        success: function(data) {
          $("#tampil").html(data);
          document.getElementById('show_number').innerHTML = "1";
          check_position();
          cek_ragu();
        }
      });
    };
refresh_soal();
function check_position(){
  var check_next = $("#hidden_count").val();
  var check_position =$('#show_number').text();
  if(check_position==1){
    $("#back").hide();
  }else{
    $("#back").show();
  }
  if(check_position==check_next){
    $("#next").hide();
  }else{
    $("#next").show();
  }
}
function Next(){
  var position =$('#show_number').text();
  var off= position;
  let lokasi= off;
  let number= Number(lokasi)+1;
  var id = "<?php echo $id; ?>";
  $.ajax({
        type: 'GET',
        url: "<?php echo base_url(); ?>/ujian/get_soal_button",
        data:{
          id :id,
          off:off
        },
        success: function(data) {
          $("#tampil").empty();
          $("#tampil").html(data);
          document.getElementById('show_number').innerHTML = number;
          check_position();
          cek_ragu();
        }
  });
}
function Back(){
  var position =$('#show_number').text();
  var off= position-2;
  let lokasi= off;
  let number= Number(lokasi)+1;
  var id = "<?php echo $id; ?>";
  $.ajax({
        type: 'GET',
        url: "<?php echo base_url(); ?>/ujian/get_soal_button",
        data:{
          id :id,
          off:off
        },
        success: function(data) {
          $("#tampil").empty();
          $("#tampil").html(data);
          document.getElementById('show_number').innerHTML = number;
          check_position();
          cek_ragu();
        }
  });
}
function GetSoal(off) {
    var id = "<?php echo $id; ?>";
    let lokasi= off;
    let number= Number(lokasi)+1;
    $.ajax({
        type: 'GET',
        url: "<?php echo base_url(); ?>/ujian/get_soal_button",
        data:{
          id :id,
          off:off
        },
        success: function(data) {
          $("#tampil").empty();
          $("#tampil").html(data);
          document.getElementById('show_number').innerHTML = number;
          check_position();
          cek_ragu();
        }
      });
    };
function cek_ragu(){
  var ragu= $("#hidden_ragu").val();
  if (ragu == 'Y') {
    document.getElementById('btn_ragu').innerHTML = 'Batal Ragu';
  } else {
    document.getElementById('btn_ragu').innerHTML = 'Ragu-Ragu';
  }
}
var upgradeTime = "<?php echo $total; ?>";
var seconds = upgradeTime;
function timer() {
  var days        = Math.floor(seconds/24/60/60);
  var hoursLeft   = Math.floor((seconds) - (days*86400));
  var hours       = Math.floor(hoursLeft/3600);
  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
  var minutes     = Math.floor(minutesLeft/60);
  var remainingSeconds = seconds % 60;
  function pad(n) {
    return (n < 10 ? "0" + n : n);
  }
//   document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
document.getElementById('countdown').innerHTML =  pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
  if (seconds == 0) {
    clearInterval(countdownTimer);
    document.getElementById('countdown').innerHTML = "Completed";
  } else {
    seconds--;
  }
}
var countdownTimer = setInterval('timer()', 1000);
  function SimpanA(id)
    { 
      var jawaban = 'A';
      $.ajax({
      url: '<?=site_url('ujian/crud/update_jawaban')?>',
      data: {
             id: id,
             jawaban:jawaban
            },
      success: function(data){ 
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
    }
  function SimpanB(id)
    { 
      var jawaban = 'B';
      $.ajax({
      url: '<?=site_url('ujian/crud/update_jawaban')?>',
      data: {
             id: id,
             jawaban:jawaban
            },
      success: function(data){ 
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
    }
  function SimpanC(id)
  { 
    var jawaban = 'C';
      $.ajax({
      url: '<?=site_url('ujian/crud/update_jawaban')?>',
      data: {
             id: id,
             jawaban:jawaban
            },
      success: function(data){ 
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
  }
  function SimpanD(id)
  { 
    var jawaban = 'D';
      $.ajax({
      url: '<?=site_url('ujian/crud/update_jawaban')?>',
      data: {
             id: id,
             jawaban:jawaban
            },
      success: function(data){ 
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
  }
  function SimpanE(id)
  { 
    var jawaban = 'E';
      $.ajax({
      url: '<?=site_url('ujian/crud/update_jawaban')?>',
      data: {
             id: id,
             jawaban:jawaban
            },
      success: function(data){ 
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
  }
  function Ragu()
    { 
      var id= $('#hidden_id').val();
      var button_ragu = $('#btn_ragu').text();
      if(button_ragu == 'Ragu-Ragu'){
        var ragu = 'Y';
      }else{
        var ragu = 'N';
      }
      $.ajax({
      url: '<?=site_url('ujian/crud/update_ragu')?>',
      type: 'POST',
      data: {
             id: id,
             ragu: ragu
            },
      success: function(data){ 
      if(button_ragu == 'Ragu-Ragu'){
        document.getElementById('btn_ragu').innerHTML = 'Batal Ragu';
      }else{
        document.getElementById('btn_ragu').innerHTML = 'Ragu-Ragu';
      }
        tampil_menu();
      },
      error: function(response){
          alert(response);
      }
     })
    }
    $(document).on('click', '#btn_akhir', function (e) {
      e.preventDefault();
      id = $(this).data('id');
      swal({
        title: "Apa Anda Yakin?",
        text: "Ujian tidak dapat diulang,setelah di akhiri!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Akhiri!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?=site_url('ujian/akhiri_ujian')?>',
             type: 'POST',
             dataType: 'json',
             data: {id: id},
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#siswa').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Anda Bisa melanjutkan ujian hingga batas waktu yang tersedia", "error");
        }
      });
    });
    function Akhiri(){
     
    }
</script>