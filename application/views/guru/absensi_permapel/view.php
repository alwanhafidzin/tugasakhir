<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}


.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
button.bottom {
      margin-right:5px;
      margin-bottom:5px;
}
/* td.day.disabled {
  opacity: 0.4;
} */
td.date-possible {
  color: #000;
  background-color: #c1d7e3;
  border-color: #4b88a6;
  /* background-color: blue;
  color: white; */
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Absensi Permapel SMAN 1 SOOKO</h1>
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

            <div class="card card-danger card-outline">
            <div class="col-md-12">
                <table class="table table-bordered styled-table">
                <?php foreach($tahun_aktif->result() as $result) : ?>
                <tr>
                    <td width="200">Tahun Akademik</td>
                    <td><?php echo $result->tahun_akademik ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><?php echo $result->semester ?></td>
                </tr>
                </table>
                <?php endforeach;?>

            <div class="row">

            <!-- /.card -->
          </div>
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

            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-primary bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data Absensi</button>
                <button class="btn btn-warning bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i> Edit Data Absensi</button>
               </br></br>
            <div class="row">
                <div class="col-md-2"><b>Filter Data:</b></div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_kelas" id="filter_kelas" style="width: 100%;">
                    <option value="">Filter Kelas</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($kelas_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_kelas ?>"><?php echo $row->nama_kelas ?></option>
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
              <h4 class="modal-title">Tambah Data Absensi Permapel</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
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

  