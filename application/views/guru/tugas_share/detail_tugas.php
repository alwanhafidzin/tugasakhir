<link rel="stylesheet" href="<?=base_url()?>assets/admin_lte/dist/css/contents.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
           	$user = $this->ion_auth->user()->row();
            $user_id =$user->id;
            $create = $user->created_on;
            $id_name =$this->ion_auth->get_users_groups($user_id)->row()->description;
            $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
            foreach($identity->result() as $result){
              $nama = $result->nama;
              $foto = $result->foto;
            }
            ?> 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tugas Share</h1>
            <div class="card">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Tugas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Detail</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Data Share</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <?php foreach($tugas->result() as $result) : ?>
              <?php
                  $content =$result->content;
                  $judul = $result->judul;
                  $nama = $result->nama;
                  $tgl_dibuat = $result->tgl_share;
                  $mapel = $result->mapel;
                  $foto = $result->foto;
                  $nama_kelas = $result->nama_kelas;
                  $tgl_selesai = $result->tgl_selesai;
              ?>
            <?php endforeach;?>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url()?>uploads/guru/<?php echo $foto; ?>" alt="User Image">
                        <span class="username">
                          <a href=""><?php echo $nama; ?></a>
                        </span>
                        <span class="description">Membuat Tugas - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="ck-content">
                       <?php echo $content ?>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                   <div id="tampil">
                   </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-3">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Tugas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-chalkboard-teacher mr-1"></i> Guru </strong>

                <p class="text-muted">
                <?php echo $nama; ?>
                </p>
                <hr>
                <strong><i class="fas fa-heading mr-1"></i> Judul</strong>

                <p class="text-muted">
                <?php echo $judul; ?>
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Mapel</strong>

                <p class="text-muted">
                <?php echo $mapel; ?>
                </p>
                <hr>
                <strong><i class="fas fa-chalkboard mr-1"></i> Kelas</strong>

                <p class="text-muted">
                <?php echo $nama_kelas; ?>
                </p>

                <hr>
                <strong><i class="far fa-calendar-check mr-1"></i> Tanggal Dibuat</strong>

                <p class="text-muted"><?php echo $tgl_dibuat; ?></p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Batas Pengerjaan</strong>

                <p class="text-muted">
                <?php echo $tgl_selesai; ?>
                </p>

                <hr>
                <a href="<?=site_url('tugasshare')?>" class="btn btn-primary btn-block mb-3">Kembali Ke List Tugas</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->