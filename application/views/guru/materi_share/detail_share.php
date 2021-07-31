<link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/dist/css/contents.css">
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <?php foreach($materi->result() as $result) : ?>
              <?php
                  $judul =$result->judul;
                  $content =$result->content;
                  $nama_kelas = $result->nama_kelas;
                  $mapel = $result->mapel;
                  $nama = $result->nama;
                  $nama_kelas = $result->nama_kelas;
                  $semester = $result->semester;
                  $tahun_akademik = $result->tahun_akademik;
              ?>
            <?php endforeach;?>
            <h1>Materi Pembelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Materi</a></li>
              <li class="breadcrumb-item active">Lihat Materi Share</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <div class="row row-editor">
                  <div class="editor ck-content">
                    <?php echo $content ?>
                  </div>
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
                <h3 class="card-title">Detail Materi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-chalkboard-teacher mr-1"></i> Guru </strong>

                <p class="text-muted">
                <?php echo $nama; ?>
                </p>
                <hr>
                <strong><i class="fas fa-heading mr-1"></i> Judul</strong>

                <p class="text-muted">
                <?php echo $judul; ?>
                </p>

                <hr>
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
          function url_base64_encode($str = '')
          {
            return strtr(base64_encode($str), '+=/', '.-~');
          }
        ?>
                <strong><i class="far fa-calendar-check mr-1"></i> Tanggal Dibagikan</strong>

                <p class="text-muted"><?php echo hariIndo(date("l", strtotime($result->tgl_dibagikan))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_dibagikan)) ?></p>
                <hr>
                <strong><i class="fas fa-book-open mr-1"></i> Mapel</strong>

                <p class="text-muted">
                <?php echo $mapel; ?>
                </p>
                <hr>
                <strong><i class="fas fa-chalkboard mr-1"></i> Kelas</strong>

                <p class="text-muted">
                <?php echo $nama_kelas; ?>
                </p>
                <hr>
                <strong><i class="fas fa-calendar-alt mr-1"></i> Jadwal</strong>

                <p class="text-muted">
                <?php echo $judul; ?>
                </p>
                <hr>
                <strong><i class="fas fa-calendar-check mr-1"></i> Tahun Akademik</strong>

                <p class="text-muted">
                <?php echo $tahun_akademik; ?>
                </p>
                <hr>
                <strong><i class="fas fa-calendar-minus mr-1"></i> Semester</strong>

                <p class="text-muted">
                <?php echo $semester; ?>
                </p>
                <hr>
                <a href="<?=site_url('materishare')?>" class="btn btn-primary btn-block mb-3">Kembali Ke List Materi Share </a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->