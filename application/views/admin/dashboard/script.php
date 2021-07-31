<?php foreach ($count->result() as $result) :
      $jumlah_siswa = $result->jumlah_siswa;
      $jumlah_guru_active = $result->jumlah_guru_aktif;
      $jumlah_siswa = $result->jumlah_siswa;
      $jumlah_siswa_lulus = $result->jumlah_siswa_lulus;
      $jumlah_siswa_aktif = $result->jumlah_siswa_aktif;
      $jumlah_kelas = $result->jumlah_kelas;
      $jumlah_ruangan = $result->jumlah_ruangan;
      $jumlah_mapel = $result->jumlah_mapel;
      $jumlah_user = $result->jumlah_users;
      $jumlah_user_siswa = $result->jumlah_user_siswa;
      $jumlah_user_guru = $result->jumlah_user_guru;
      $jumlah_user_admin = $result->jumlah_user_admin;
      $jumlah_user_active = $result->jumlah_user_active;
      $jumlah_user_unactive = $result->jumlah_user_unactive;
      $jumlah_agama = $result->jumlah_agama;
      $jumlah_a_admin = $result->jumlah_a_admin;
      $jumlah_a_guru = $result->jumlah_a_guru;
      $jumlah_a_siswa = $result->jumlah_a_siswa;
      $jumlah_un_admin = $result->jumlah_un_admin;
      $jumlah_un_guru = $result->jumlah_un_guru;
      $jumlah_un_siswa = $result->jumlah_un_siswa;
      $jumlah_jurusan = $result->jumlah_jurusan;
      endforeach;
      $donut_data=array($jumlah_jurusan,$jumlah_siswa,$jumlah_guru_active,$jumlah_kelas,$jumlah_ruangan,$jumlah_mapel,$jumlah_agama,$jumlah_user); 
      $data_user_admin=array($jumlah_a_admin,$jumlah_un_admin);
      $data_user_guru=array($jumlah_a_guru,$jumlah_un_guru);
      $data_user_siswa=array($jumlah_a_siswa,$jumlah_un_siswa);
      foreach ($jumlah_siswa_all->result() as $result) :
        $kelas_10_l = $result->jumlah_siswa_10_l;
        $kelas_10_p = $result->jumlah_siswa_10_p;
        $kelas_11_l = $result->jumlah_siswa_11_l;
        $kelas_11_p = $result->jumlah_siswa_11_p;
        $kelas_12_l = $result->jumlah_siswa_12_l;
        $kelas_12_p = $result->jumlah_siswa_12_p;
      endforeach;
      $data_jumlah_s = array($kelas_10_l,$kelas_10_p,$kelas_11_l,$kelas_11_p,$kelas_12_l,$kelas_12_p);
      foreach ($jumlah_guru_all->result() as $result) :
        $jumlah_guru_pria = $result->jumlah_guru_pria;
        $jumlah_guru_wanita = $result->jumlah_guru_wanita;
      endforeach;
      $data_jumlah_g_pria = array($jumlah_guru_pria);
      $data_jumlah_g_wanita = array($jumlah_guru_wanita);
    ?>
  <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------


    var areaChartData = {
      labels  : ['Active', 'Tidak Aktif'],
      datasets: [
        {
          label               : 'Admin',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($data_user_admin) ?>,
          minBarLength: 7, 
        },
        {
          label               : 'Guru',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($data_user_guru) ?>,
          minBarLength: 7, 
        },
        {
          label               : 'Siswa',
          backgroundColor     : 'rgba(255, 99, 71, 0.8)',
          borderColor         : 'rgba(255, 99, 71, 0.8)',
          pointRadius         : false,
          pointColor          : 'rgba(255, 99, 71, 0.8)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(255, 99, 71, 0.8)',
          data                : <?php echo json_encode($data_user_siswa) ?>,
          minBarLength: 7, 
        },
      ]
    }
    var stackChartData = {
      labels  : ['Guru'],
      datasets: [
        {
          label               : 'Pria',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($data_jumlah_g_pria) ?>,
          minBarLength: 7, 
        },
        {
          label               : 'Wanita',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($data_jumlah_g_wanita) ?>,
          minBarLength: 7, 
        },
      ]
    }


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Kelas X Laki-Laki',
          'Kelas X Perempuan',
          'Kelas XI Laki-Laki',
          'Kelas XI Perempuan',
          'Kelas XII Laki-Laki',
          'Kelas XII Perempuan',
      ],
      datasets: [
        {
          data: <?php echo json_encode($data_jumlah_s) ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Jurusan',
          'Siswa',
          'Guru',
          'Kelas',
          'Ruangan',
          'Mapel',
          'Agama',
          'User'
      ],
      datasets: [
        {
          data: <?php echo json_encode($donut_data) ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#DC143C','#DEB887'],
        }
      ]
    }
    var pieData        = pieData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    var temp2 = areaChartData.datasets[2]
    barChartData.datasets[0] = temp0
    barChartData.datasets[1] = temp1
    barChartData.datasets[2] = temp2

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, stackChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>