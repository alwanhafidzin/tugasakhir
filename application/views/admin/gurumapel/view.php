<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Guru Mapel SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Mapel</a></li>
              <li class="breadcrumb-item active">Guru Mapel</li>
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
                  <select class="form-control select2" id="filter_mapel" name="filter_mapel" style="width: 100%;">
                     <option value="">Filter Mapel</option>
                     <option value="0">Perlihatkan Semua</option>
                     <?php foreach($mapel as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->kode_mapel ?>(<?php echo $row->mapel ?>)</option>
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
              <h4 class="modal-title">Tambah Data Guru Mapel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                  <label>NIP Guru</label>
                  <select class="form-control select2" id="guru_sl2_tbh" name="guru" style="width: 100%;">
                    <option value="">Pilih NIP Guru</option>
                     <?php foreach($guru as $row) : ?>
                      <option value="<?php echo $row->nip ?>"><?php echo $row->nip ?>-<?php echo $row->nama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="mapel" onchange="myMapel()" id="mapel_sl2_tbh" style="width: 100%;">
                    <option value="">Pilih Mapel</option>
                    <?php foreach($mapel as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->kode_mapel ?>(<?php echo $row->mapel ?>)</option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="kelompok_mapel">Kelompok Mapel</label>
                    <input type="text" autocomplete="off"class="form-control" name="kelompok_mapel" id="kelompok_mapel_tbh" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="mapel">Jurusan</label>
                    <input type="text" autocomplete="off"class="form-control" name="jurusan" id="jurusan_tbh" disabled="disabled">
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

  