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
thead {
  color: white;
  background: #0275d8;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jadwal Guru</h1>
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
              <button type="button" onclick="printJS({ printable: 'jadwal_siswa', type: 'html', header: 'PrintJS - Form Element Selection' })">
                Print Form with Header
              </button>
              <table class="table table-sm table-bordered" id="jadwal_siswa">
                <thead>
                  <tr>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Mapel</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($jadwal_guru->result() as $result) : ?>
                    <tr>
                        <td class="text-center"><?php echo $result->hari ?></td>
                        <td class="text-center"><?php echo $result->mapel ?></td>
                        <td class="text-center"><?php echo $result->nama_kelas ?></td>
                        <td class="text-center"><?php echo $result->ruangan ?></td>
                        <td class="text-center"><?php echo $result->jam_mulai ?>-<?php echo $result->jam_selesai ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
              </div>
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

  