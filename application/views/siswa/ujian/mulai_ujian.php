<style>
.quiz {
    top: 240px;
    position: fixed;
    z-index: -1;
    width: 100%;
}
.quiz button {
    width: 90%;
    border-radius: 8px;
    display: block;
}
.tampil{
  width:100%;
}
.tampil_menu{
  width:100%;
  height:100%;
  margin-bottom:10px;
}
.button-akhir{
  width:100%;
  margin-bottom:10px;
}
.default {
  background-color: gray;
}
.tampil {
  margin-bottom: 5px;
}
.btn-sm{
  width:17%;
  height:auto;
  color: white;
  /* height:35px; */
  margin-left: 5px;
  margin-bottom:5px;
}
.btn-ragu{
  width:80%;
  max-height:38px;
  box-sizing: border-box;
}
.left{
  float:left;
}
.a-1{
  font-size: 1.1rem;
    font-weight: 400;
}
.disabled{
  pointer-events: none;
}
.block-h3{
  display:block;
  background-color:#B3B6B7 ;
}
h3>span {background-color:yellow;line-height:2}
</style>
<link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/dist/css/contents.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h2 class="m-0"> Ujian <small>|UAS</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title left block-h3 text-light">Soal No.<button class="a-1 btn-tes btn-primary disabled" id="show_number">-</button></h3>
                  <div class="card-tools">
                    <h3 class="card-title block-h3 text-light">Sisa Waktu <button class="a-1 btn-tes btn-primary disabled" id="countdown">00:00:00</button></h3>
                    <!-- <div id="countdown" class="timer"></div> -->
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ck-content">
                   <div id="tampil">
                   </div>
                  <!-- /.mailbox-controls -->
                </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                  <div class="float-right">
                    <a class="action next btn btn-info" id="next" onclick="Next();">Soal Selanjutnya <i class="fas fa-angle-right"></i></a>
                  </div>
                  <div class="float-left">
                  <a class="action next btn btn-info" id="back" onclick="Back()"><i class="fas fa-angle-left"></i> Soal Sebelumnya</a>
                  </div>
                  <div class="text-center">
                  <a class="btn btn-warning text-center" id="btn_ragu" onclick="Ragu()">Ragu-Ragu</a>
                 </div>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Navigasi Soal</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item active">
                        <a class="nav-link">
                        <div id="tampil_menu" class="tampil_menu">
                        </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Akhiri Ujian</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item active">
                        <a class="nav-link">
                        <?php
                         	$id_ujian = $this->uri->segment(3);
                        ?>
                        <div class="text-center button-akhir">
                          <button class="btn btn-danger btn-ragu text-center" data-id="<?php echo $id_ujian ?>" id="btn_akhir">Akhiri Ujian</button>
                        </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
              </div>
              <!-- /.col -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->