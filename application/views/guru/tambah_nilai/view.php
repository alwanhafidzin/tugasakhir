<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tambah Nilai Guru SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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

            
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php foreach($tahun_aktif->result() as $result) :?>
             <?php 
               $id = $result->id;
               $tahun_pilih = $result->tahun_akademik;
               $semester_pilih = $result->semester;
              ?>
             <?php endforeach;?>
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn bg-navy btn-flat margin"data-toggle="modal" data-target="#modal-tambah">Tambah Nilai</button>
              </br></br>
              <div class="row">
              <div class="col-md-2"><b>Filter Data:</b></div>
              </div>
             <div class="row">
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_t_akademik" id="filter_t_akademik" style="width: 100%;">
                    <option value="">Filter Tahun Akademik</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($tahun_akademik as $row) : ?>
                      <option value="<?php echo $row->id ?>"<?php if($row->id==$id){ echo 'selected';}?>><?php echo $row->tahun_akademik ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_semester" id="filter_semester" style="width: 100%;">
                    <option value="">Filter Semester</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php 
                    if ($semester_pilih=='ganjil'){
                      echo '<option value="ganjil" selected>Ganjil</option>';
                    }else{
                      echo '<option value="ganjil">Ganjil</option>';
                    }
                    if ($semester_pilih=='genap'){
                      echo '<option value="genap" selected>Genap</option>';
                    }else{
                      echo '<option value="genap">Genap</option>';
                    }
                    ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_mapel" id="filter_mapel" onchange="myMapel()" style="width: 100%;">
                    <option value="">Filter Mapel</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($jadwal_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_kelas" id="filter_kelas" style="width: 100%;">
                    <option value="">Filter Kelas</option>
                  </select>
                 </div>
            </div>
                <div id="tampil">
                <!-- Data tampil disini -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <?php foreach($tahun_aktif->result() as $result) : ?>
              <?php $id_t_akademik= $result->id ?>
              <?php $semester = $result->semester ?>
            <?php endforeach;?>
          <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Nilai Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <input type="hidden" value="<?php echo $id_t_akademik ?>" name="id_t_akademik"/>
                <input type="hidden" value="<?php echo $semester ?>" name="semester"/>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" autocomplete="off" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Nilai">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <select class="form-control select2" name="nilai_lain"  id="nilai_lain" style="width: 100%;">
                     <option value="">Pilih Jenis</option>
                     <?php foreach($nilai_lain->result() as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->tipe ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Jadwal</label>
                  <select class="form-control select2" name="mapel" onchange="myJadwal()" id="jadwaltbh" style="width: 100%;">
                     <option value="">Pilih Jadwal</option>
                     <?php foreach($jadwal_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Kelas</label>
                  <select class="form-control select2" name="kelas" onchange="myKelas()" id="kelastbh" style="width: 100%;" disabled="disabled">
                     <option value="">Pilih Kelas</option>
                  </select>
                </div>
                <label for="tanggal">Tanggal</label>
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" onchange="myTanggal()" id="date-absensi_permapel" name="tanggal_absensi" placeholder="Hari, DD MM YYYY" disabled='disabled'>
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-check nav-icon"></i></i></span>
                    </div>
                </div>
                <input type="hidden" name="tanggal" id="tanggal_tbh"/>
                <div class="form-group">
                  <label>Pilih Jam</label>
                  <select class="form-control select2" name="jam" id="jamtbh" style="width: 100%;" disabled="disabled">
                     <option value="">Pilih Kelas</option>
                  </select>
                </div>
                <div id="tampil_tbh">
                <!-- Data tampil disini -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" onclick="ResetForm()" name="reset" id="reset_tbh" class="btn btn-primary">Reset Form</button>
              <button type="submit" name="submit" id="submit_tbh" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Absensi Permapel</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form-edit" method="post">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pilih Jadwal</label>
                <select class="form-control select2" name="mapel" onchange="myJadwalEdit()" id="jadwaledit" style="width: 100%;">
                    <option value="">Pilih Jadwal</option>
                    <?php foreach($jadwal_guru_absen as $row) : ?>
                    <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Kelas</label>
                <select class="form-control select2" name="kelas" onchange="myKelasEdit()" id="kelasedit" style="width: 100%;" disabled="disabled">
                    <option value="">Pilih Kelas</option>
                </select>
            </div>
            <label for="tanggal">Tanggal</label>
            <div class="input-group mb-3">
                <input type="text" autocomplete="off" class="form-control" onchange="myTanggalEdit()" id="date-absensi_permapel-edit" name="tanggal_absensi" placeholder="Hari, DD MM YYYY" disabled='disabled'>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-check nav-icon"></i></i></span>
                </div>
            </div>
            <input type="hidden" name="tanggal" id="tanggal_edit"/>
            <div class="form-group">
                <label>Pilih Jam</label>
                <select class="form-control select2" name="jam" id="jamedit" style="width: 100%;" disabled="disabled">
                    <option value="">Pilih Kelas</option>
                </select>
            </div>
            <div id="tampil_edit">
            <!-- Data tampil disini -->
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" name="submit" id="submit_edit" class="btn btn-primary">Lihat Absensi</button>
            <button type="button" onclick="ResetFormEdit()" name="reset" id="reset_edit" class="btn btn-primary">Reset Form</button>
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

  