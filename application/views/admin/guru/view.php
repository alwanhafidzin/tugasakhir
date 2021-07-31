<style>
    div.space {
      margin-right: 20px;
      margin-bottom:10px;
    }
    .left-col {
    float: left;
    width: 25%;
}
 
.center-col {
    float: left;
    width: 50%;
}
 
.right-col {
    float: left;
    width: 25%;
}
table.center-all td,th{
    text-align :center;
}
button.bottom {
      margin-right:5px;
      margin-bottom:5px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Guru SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Guru</a></li>
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
                <button class="btn btn-danger bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-multiple"><i class="fa fa-file-upload"></i> Upload Multiple Foto</button>
                <button class="btn btn-success bottom col-sm-12 col-md-2" onclick="updateStatus()" id="ubahstatus"><i class="fa fa-info"></i> Ubah Status</button>
               </br></br>
            <div class="row">
                <div class="col-md-2"><b>Filter Data:</b></div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_agama" id="filter_agama" style="width: 100%;">
                    <option value="">Filter Agama</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($agama as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->agama ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_gender" id="filter_gender" style="width: 100%;">
                    <option value="">Filter Gender</option>
                    <option value="0">Perlihatkan Semua</option>
                    <option value="P">Pria</option>
                    <option value="W">Wanita</option>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_status" id="filter_status" style="width: 100%;">
                    <option value="">Filter Status</option>
                    <!-- <option value="0">Perlihatkan Semua</option> -->
                    <option value="active" selected>Aktif</option>
                    <option value="tidak_active">Tidak Aktif</option>
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
              <h4 class="modal-title">Tambah Data Guru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-tambah" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" autocomplete="off"class="form-control" name="nip" placeholder="Masukkan NIP">
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
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off"class="form-control" name="email" placeholder="Masukkan Email Aktif">
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control select2" name="agama" id="agamatbh" style="width: 100%;">
                     <?php foreach($agama as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->agama ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2" name="gender" id="gendertbh" style="width: 100%;">
                      <option value="P">Pria</option>
                      <option value="W">Wanita</option>
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

  