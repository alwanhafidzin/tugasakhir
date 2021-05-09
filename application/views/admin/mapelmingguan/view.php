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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1>Data Jumlah Jadwal Per Minggu SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-5">
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
              <h4 class="modal-title">Tambah Data Jadwal Perminggu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <?php foreach($tahun_aktif->result() as $result) : ?>
            <input type="hidden" name="tahunakademik" value="<?php echo $result->id ?>"/>
            <input type="hidden" name="semester" value="<?php echo $result->semester ?>"/>
            <?php endforeach;?>
            <div class="col-lg-12">
                <div class="form-group">
                  <label>Pilih Jurusan</label>
                  <select class="form-control select2" id="jurusan_sl2_tbh" onchange="myJurusan()" name="jurusan" style="width: 100%;">
                    <option value="">Pilih Jurusan</option>
                     <?php foreach($jurusan as $row) : ?>
                      <option value="<?php echo $row->kode_jurusan ?>"><?php echo $row->jurusan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Tingkat Kelas</label>
                  <select class="form-control select2" id="tingkatkelas_sl2_tbh" name="tingkatkelas" style="width: 100%;" disabled="disabled">
                    <option value="">Pilih Tingkat Kelas</option>
                     <?php foreach($tingkat_kelas as $row) : ?>
                      <option value="<?php echo $row->kode_tingkat ?>"><?php echo $row->tingkatan ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="mapel" onchange="myMapel()" id="mapel_sl2_tbh" style="width: 100%;" disabled="disabled">
                    <option value="">Pilih Mapel</option>
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
                <div class="form-group">
                    <label for="jumlah">Jumlah Mapel Diulangi Perminggu</label>
                    <input type="number" autocomplete="off"class="form-control" name="jumlah" id="jumlah_tbh" disabled="disabled">
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

  