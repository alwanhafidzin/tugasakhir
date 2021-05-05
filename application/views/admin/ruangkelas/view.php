<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Ruang Kelas SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Ruang Kelas</li>
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
                <button class="btn bg-navy btn-flat margin"data-toggle="modal" data-target="#modal-tambah">Tambah Data</button>
              </br></br>
            <div class="row">
              <div class="col-md-2"><b>Filter Data:</b></div>
              <div class="col-md-3">
                 <div class="form-group">
                  <select class="form-control select2" name="filter_jurusan" id="filter_jurusan" style="width: 100%;">
                    <option value="">Filter Jurusan</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                  <select class="form-control select2" id="filter_tingkat" name="filter_tingkat" style="width: 100%;">
                     <option value="">Filter Kelas</option>
                     <option value="0">Perlihatkan Semua</option>
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
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
              <h4 class="modal-title">Tambah Data Ruang Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="kode_kelas">Kode Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="kode_kelas" placeholder="Masukkan Kode Jurusan">
                </div>
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama_kelas" placeholder="Masukkan Nama ">
                </div>
                <div class="form-group">
                  <label>Tingkatan Kelas</label>
                  <select class="form-control select2" id="kode_tingkat" name="kode_tingkat" style="width: 100%;">
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control select2" name="kode_jurusan" id="kode_jurusan" style="width: 100%;">
                    <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
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

  