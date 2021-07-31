<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Materi Share Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Materi</a></li>
              <li class="breadcrumb-item active">Materi Share</li>
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

  