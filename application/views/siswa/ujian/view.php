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

    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
               <?php 
               foreach($kelas_siswa->result() as $result){
                 $no_absen = $result->no_absen;
               }
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
                 $id_ujian = $result->id;
                 }
                ?>
                 <?php 
           	$user = $this->ion_auth->user()->row();
            $user_id =$user->id;
            $create = $user->created_on;
            $id_name =$this->ion_auth->get_users_groups($user_id)->row()->name;
            $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
            foreach($identity->result() as $result){
              $nama = $result->nama;
              $nis = $result->nis;
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
                <div class="row row-editor">
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
                      <td>Tanggal Mulai</td>
                      <td><?php echo hariIndo(date("l", strtotime($tgl_mulai))).' '.date("d-m-Y H:i:s", strtotime($tgl_mulai)) ?></td>
                    </tr>
                    <tr>
                      <td>12.</td>
                      <td>Batas Akhir</td>
                      <td>
                      <?php echo hariIndo(date("l", strtotime($terlambat))).' '.date("d-m-Y H:i:s", strtotime($terlambat)) ?>
                      </td>
                    </tr>
                    <tr>
                      <td>13.</td>
                      <td>Waktu</td>
                      <td>
                      <?php echo $waktu ?>
                      </td>
                    </tr>
                    <tr>
                      <td>14.</td>
                      <td>Jumlah Soal</td>
                      <td>
                      <?php echo $jumlah_soal ?>
                      </td>
                    </tr>
                  </tbody>
                  </br>
                </table>
                  <h3>Keterangan pengerjaan</h3>
                  <p>1.Pastikan koneksi internet stabil untuk mengambil data soal dari server SVL</p>
                  <p>2.Ketika token sesuai soal akan muncul dan pengerjaan berjalan sesuai waktu yang telah ditentukan</p>
                  <p>3.Quiz akan berakhir pada saat waktu sudah habis</p>
                  <p>4.Ketika klik tombol akhiri ujian,maka quiz akan berakhir</p>
                  <p>5.Jika anda keluar dari browser,maka untuk mengerjakan lagi perlu memasukkan token,jawaban sebelumnya telah disimpan di server</p>
                </div>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quiz Token</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="hidden" id="hidden_id" value="<?php echo $id_ujian ?>"/>
                <input type="hidden" id="hidden_nis" value="<?php echo $nis ?>"/>
                <div class="form-group">
                    <label for="token">Token Quiz</label>
                    <input type="text" autocomplete="off"class="form-control" maxlength="5" name="token" id="token_ujian" placeholder="Masukkan Token Quiz">
                </div>
                <hr>
                <a class="btn btn-primary btn-block mb-3 cek_token">Kerjakan Quiz</a>
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