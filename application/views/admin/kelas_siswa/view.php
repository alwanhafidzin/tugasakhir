<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kelas Siswa SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Kelas Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
              <button class="btn btn-primary bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <button class="btn btn-warning bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-upload"><i class="fa fa-file-import"></i> Import Excel</button>
              </br></br>
            <div class="row">
                 <div class="col-md-2"><b>Filter Data:</b></div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_tahunakademik" id="filter_tahunakademik" style="width: 100%;">
                    <option value="">Filter Tahun Akademik</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($tahun_akademik as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tahun_akademik ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_kelas" id="filter_kelas" style="width: 100%;">
                    <option value="">Filter Kelas</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($kelas as $row) : ?>
                      <option value="<?php echo $row->kode_kelas?>"><?php echo $row->nama_kelas ?></option>
                    <?php endforeach ?>
                 </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_j_kelamin" id="filter_j_kelamin" style="width: 100%;">
                    <option value="">Filter Jenis Kelamin</option>
                    <option value="0">Perlihatkan Semua</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                 </div>
            </div>
                <div id="tampil">
                <!-- Data tampil disini -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>

      <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Kelas Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                  <label>Pilih Siswa</label>
                  <select class="form-control select2" id="siswa_sl2_tbh" name="nis" style="width: 100%;">
                     <option value="">Pilih Siswa</option>
                     <?php foreach($siswa as $row) : ?>
                      <option value="<?php echo $row->nis ?>"><?php echo $row->nis ?>-<?php echo $row->nama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="no_absen">No Absen</label>
                    <input type="number" autocomplete="off"class="form-control" name="no_absen" placeholder="Masukkan No Absen ">
                </div>
                <div class="form-group">
                  <label>Tahun Akademik</label>
                  <select class="form-control select2" name="tahunakademik" id="tahunakademik_sl2_tbh" style="width: 100%;">
                    <option value="">Pilih Tahun Akademik</option>
                    <?php foreach($tahun_akademik as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tahun_akademik ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="form-control select2" name="kelas" id="kelas_sl2_tbh" style="width: 100%;">
                  <option value="">Pilih Kelas</option>
                    <?php foreach($kelas as $row) : ?>
                      <option value="<?php echo $row->kode_kelas ?>"><?php echo $row->nama_kelas ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  