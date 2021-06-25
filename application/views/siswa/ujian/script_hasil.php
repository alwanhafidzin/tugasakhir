<?php 
$nama = array();
$nilai = array();
foreach($top5->result_array() as $result){
$nama []= $result['nama'];
$nilai [] = $result['nilai'];
}
foreach($ujian->result() as $result ) {
    $judul = $result->nama_ujian;
    $kelas = $result->nama_kelas;
    }
?>
<script src="<?=base_url()?>assets/admin_lte/plugins//chart.js/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: <?php echo json_encode($nama); ?>,
      datasets: [
        {
          label: "Nilai Akhir Quiz",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo json_encode($nilai); ?>
        }
      ]
    },
    options: {
      responsive: true,
      legend: { display: false },
      title: {
        display: true,
        text: '5 Nilai Terbaik '+"<?Php echo $judul.' '.$kelas ?>",
      },
      scales: {
        xAxes: [{
            ticks: {
                beginAtZero: true,
                max :100
            }
        }]
    }
    }
});
</script>