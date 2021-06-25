<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h2 class="m-0"> Ujian <small>|UAS</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
               foreach($ujian->result() as $result ) {
                 $tgl_mulai =$result->tgl_mulai;
                 $tahun_akademik = $result->tahun_akademik;
                 $tipe = $result->tipe;
                 $tgl_jadwal = $result->tgl_jadwal;
                 $jumlah_soal = $result->jumlah_soal;
                 $kelas = $result->nama_kelas;
                 $mapel = $result->mapel;
                 $semester = $result->semester;
                 $terlambat = $result->terlambat;
                 $guru = $result->nama_guru;
                 $judul = $result->nama_ujian;
                 $waktu = $result->waktu;
                 $id_ujian = $result->id_ujian;
                 $no_absen = $result->no_absen;
                 $nama = $result->nama;
                 $nis = $result->nis;
                 $nilai = $result->nilai;
                 $jam_mulai = $result->jam_mulai;
                 $jam_selesai = $result->jam_selesai;
                 $jumlah_siswa = $result->jumlah_siswa;
                 }
                ?>
            <?php
          function hariIndo ($hariInggris) {
            switch ($hariInggris) {
              case 'Sunday':
                return 'Minggu';
              case 'Monday':
                return 'Senin';
              case 'Tuesday':
                return 'Selasa';
              case 'Wednesday':
                return 'Rabu';
              case 'Thursday':
                return 'Kamis';
              case 'Friday':
                return 'Jumat';
              case 'Saturday':
                return 'Sabtu';
              default:
                return 'hari tidak valid';
            }
          }
        ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
      <div class="col-md-9">
            <div class="card card-primary card-outline ">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Analisis Soal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Top 5</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <h3 >Keterangan Quiz</h3>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th style="width: 10px">#</th>
                        <th>Info</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1.</td>
                        <td>Nama</td>
                        <td><?php echo $nama ?></td>
                        </tr>
                        <tr>
                        <td>2.</td>
                        <td>NIS</td>
                        <td>
                        <?php echo $nis ?>
                        </td>
                        </tr>
                        <tr>
                        <td>3.</td>
                        <td>Tahun Akademik</td>
                        <td>
                        <?php echo $tahun_akademik ?>
                        </td>
                        </tr>
                        <tr>
                        <td>4.</td>
                        <td>Semester</td>
                        <td>
                        <?php echo $semester ?>
                        </td>
                        </tr>
                        <tr>
                        <td>5.</td>
                        <td>Kelas</td>
                        <td>
                        <?php echo $kelas ?>
                        </td>
                        </tr>
                        <tr>
                        <td>6.</td>
                        <td>No Absen</td>
                        <td>
                        <?php echo $no_absen ?>
                        </td>
                        </tr>
                        <tr>
                        <td>7.</td>
                        <td>Judul Quiz</td>
                        <td>
                        <?php echo $judul ?>
                        </td>
                        </tr>
                        <tr>
                        <td>8.</td>
                        <td>Tipe</td>
                        <td>
                        <?php echo $tipe ?>
                        </td>
                        </tr>
                        <tr>
                        <td>9.</td>
                        <td>Mapel</td>
                        <td>
                        <?php echo $mapel ?>
                        </td>
                        </tr>
                        <tr>
                        <td>10.</td>
                        <td>Guru</td>
                        <td>
                        <?php echo $guru ?>
                        </td>
                        </tr>
                        <tr>
                        <td>11.</td>
                        <td>Quiz Jadwal</td>
                        <td><?php echo hariIndo(date("l", strtotime($tgl_jadwal))).' '.date("d-m-Y", strtotime($tgl_jadwal)).' '.$jam_mulai.'-'.$jam_selesai ?></td>
                        </tr>
                        <tr>
                        <td>12.</td>
                        <td>Tanggal Mulai</td>
                        <td><?php echo hariIndo(date("l", strtotime($tgl_mulai))).' '.date("d-m-Y H:i:s", strtotime($tgl_mulai)) ?></td>
                        </tr>
                        <tr>
                        <td>13.</td>
                        <td>Batas Akhir</td>
                        <td>
                        <?php echo hariIndo(date("l", strtotime($terlambat))).' '.date("d-m-Y H:i:s", strtotime($terlambat)) ?>
                        </td>
                        </tr>
                        <tr>
                        <td>14.</td>
                        <td>Waktu</td>
                        <td>
                        <?php echo $waktu ?>
                        </td>
                        </tr>
                        <tr>
                        <td>15.</td>
                        <td>Jumlah Soal</td>
                        <td>
                        <?php echo $jumlah_soal ?>
                        </td>
                        </tr>
                    </tbody>
                    </br>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <canvas id="bar-chart-horizontal"></canvas>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <?php 
                  $no=1;
                  foreach($leaderboard->result() as $result2){
                       $mengerjakan = $result2->jumlah_mengerjakan;
                       $peringkat =$no++;
                       if ($result2->nis==$nis){
                         $mengerjakan_ujian = $mengerjakan;
                         $peringkat_ujian = $peringkat;
                       }
                  }
                  ?>
                  <h3>Analisis Per Kategori Soal</h3>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 10px">#</th>
                          <th>Kategori Soal</th>
                          <th>Jumlah Soal</th>
                          <th>Benar</th>
                          <th>Salah</th>
                          <th>Kosong</th>
                          <th>Persentase Benar</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1; ?>
                          <?php foreach($nilai_akhir->result() as $result) : ?>
                          <tr>
                              <td><?php echo $no++.'.' ?></td>
                              <td><?php echo $result->kategori ?></td>
                              <td><?php echo $result->jumlah_soal ?></td>
                              <td><?php echo $result->benar ?></td>
                              <td><?php echo $result->salah ?></td>
                              <td><?php echo $result->tidak_diisi ?></td>
                              <td><?php echo $result->persentase.'%' ?></td>
                          </tr>
                          <?php endforeach;?>
                      </tbody>
                    </table>
                    <br>
                    <h3>Peringkat Quiz</h3>
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                          <th style="width: 10px">#</th>
                          <th>Info</th>
                          <th>Keterangan</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td>1.</td>
                        <td>Nilai Akhir</td>
                        <td>
                        <?php echo $nilai ?>
                        </td>
                        </tr>
                        <tr>
                        <td>2.</td>
                        <td>Peringkat</td>
                        <td>
                        <?php echo $peringkat_ujian ?>
                        </td>
                        </tr>
                        <tr>
                        <td>3.</td>
                        <td>Kelas</td>
                        <td>
                        <?php echo $kelas ?>
                        </td>
                        </tr>
                        <tr>
                        <td>4.</td>
                        <td>Jumlah Siswa</td>
                        <td>
                        <?php echo $jumlah_siswa ?>
                        </td>
                        </tr>
                        <tr>
                        <td>5.</td>
                        <td>Siswa Mengerjakan</td>
                        <td>
                        <?php echo $mengerjakan_ujian ?>
                        </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nilai Akhir Quiz</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label for="token">Nilai Quiz</label>
                    <input type="number" autocomplete="off"class="form-control" value="<?php echo $nilai ?>" name="nilai" id="nilai" disabled="disabled">
                </div>
                <hr>
                <a class="btn btn-primary btn-block mb-3 cek_token">List Quiz</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->