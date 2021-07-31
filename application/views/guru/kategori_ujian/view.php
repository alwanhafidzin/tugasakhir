<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kategori Quiz Guru SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Quiz</a></li>
              <li class="breadcrumb-item active">Kategori Quiz</li>
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
                <button class="btn btn-primary bottom col-sm-12 col-md-3 margin"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>
              </br></br>
              <div class="row">
              <div class="col-md-2"><b>Filter Data:</b></div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_tipe" id="filter_tipe" style="width: 100%;">
                    <option value="">Filter Tipe Ujian</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($tipe_ujian as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tipe ?></option>
                     <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_mapel" id="filter_mapel" style="width: 100%;">
                    <option value="">Filter Mapel</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php
                      $first = true;
                     foreach($jadwal_guru_absen as $row) : ?>
                      <?php 
                       if ( $first )
                       {
                          echo '<option value="'.$row->kode_mapel.'" selected>'.$row->mapel.'</option>';
                           $first = false;
                       }
                       else
                       {
                          echo '<option value="'.$row->kode_mapel.'">'.$row->mapel.'</option>';
                       }
                   
                      ?>
                    <?php endforeach ?>
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
              <h4 class="modal-title">Tambah Data Kategori Quiz</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
              <div class="form-group">
                  <label for="kategorisoal">Nama Quiz</label>
                  <input type="text" autocomplete="off"class="form-control" name="nama_ujian" placeholder="Masukkan Nama Quiz" required>
              </div>
              <div class="form-group">
                 <label for="kategorisoal">Tipe Quiz</label>
                  <select class="form-control select2" name="id_t_ujian" id="tipe-tbh" style="width: 100%;" required>
                    <option value="">Pilih Tipe Quiz</option>
                    <?php foreach($tipe_ujian as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tipe ?></option>
                     <?php endforeach ?>
                  </select>
                 </div>
              <div class="form-group">
                <label for="kategorisoal">Pilih Mapel</label>
                <select class="form-control select2" name="kode_mapel" id="kode_mapel-tbh" style="width: 100%;" required>
                  <option value="">Pilih Mapel</option>
                  <?php
                    $first = true;
                    foreach($jadwal_guru_absen as $row) : ?>
                    <?php 
                      if ( $first )
                      {
                        echo '<option value="'.$row->kode_mapel.'" selected>'.$row->mapel.'</option>';
                          $first = false;
                      }
                      else
                      {
                        echo '<option value="'.$row->kode_mapel.'">'.$row->mapel.'</option>';
                      }
                  
                    ?>
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

  