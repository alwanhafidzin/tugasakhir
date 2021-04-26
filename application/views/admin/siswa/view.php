<!-- Datepicker styling default -->
<style>
  input {
        position: relative;
        width: 150px; height: 20px;
        color: white;
    }

    input:before {
        position: absolute;
        top: 3px; left: 3px;
        content: attr(data-date);
        display: inline-block;
        color: black;
    }

    input::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
        display: none;
    }

    input::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 3px;
        right: 0;
        color: black;
        opacity: 1;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Kelas</li>
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
                <button class="btn btn-primary"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <button class="btn btn-warning"data-toggle="modal" data-target="#modal-upload"><i class="fa fa-file-import"></i> Import Excel</button>
                <button class="btn btn-danger"data-toggle="modal" data-target="#modal-multiple"><i class="fa fa-file-upload"></i> Upload Multiple Foto</button>
              </br></br>
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
              <h4 class="modal-title">Tambah Data Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" autocomplete="off"class="form-control" name="nis" placeholder="Masukkan NIS">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" autocomplete="off"class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" autocomplete="off"class="form-control" name="foto" placeholder="Pilih Foto">
                </div>
                <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" autocomplete="off"class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="" id="datepicker" autocomplete="off" class="form-control" name="tanggallahir" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="tahunmasuk">Tahun Masuk</label>
                    <input type="year"  autocomplete="off" class="form-control" id="date-tahunmasuk" name="tahunmasuk" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control select2" name="agama" id="agama" style="width: 100%;">
                     <?php foreach($agama as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->agama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" name="jkelamin" id="jkelamin" style="width: 100%;">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
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

  