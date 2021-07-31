<style>
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
            <h1>List User SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data User</a></li>
              <li class="breadcrumb-item active">List User</li>
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
                <button class="btn btn-primary bottom col-sm-12 col-md-3"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Admin</button>
                <button class="btn btn-success bottom col-sm-12 col-md-2" onclick="updateStatus()" id="ubahstatus"><i class="fa fa-info"></i> Ubah Status</button>
               </br>
               </br>
              <div class="row">
              <div class="col-md-2"><b>Filter Data:</b></div>
              <div class="col-md-3">
                 <div class="form-group">
                  <select class="form-control select2" name="filter_tipe" id="filter_tipe" style="width: 100%;">
                    <option value="">Filter Tipe</option>
                    <option value="0">Perlihatkan Semua</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                  </select>
                 </div>
              </div>
              <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_status" id="filter_status" style="width: 100%;">
                    <option value="">Filter Status</option>
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
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

  