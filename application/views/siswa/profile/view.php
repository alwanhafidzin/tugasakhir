   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Guru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
           	$user = $this->ion_auth->user()->row();
            $user_id =$user->id;
            $email = $user->email;
            $username = $user->username;
            $create = $user->created_on;
            $id_name =$this->ion_auth->get_users_groups($user_id)->row()->description;
            $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
            foreach($identity->result() as $result){
              $nama = $result->nama;
              $foto = $result->foto;
              if ($id_user==2){
                $j_k = $result->gender;
                if ($j_k=='P'){
                  $j_kelamin = 'Pria';
                }else if ($j_k=='W'){
                  $j_kelamin = 'Wanita';
                }
              }else if($id_user==3){
                $j_k = $result->j_kelamin;
                if ($j_k=='P'){
                  $j_kelamin = 'Perempuan';
                }else if ($j_k=='L'){
                  $j_kelamin = 'Laki-Laki';
                }
              }else if($id_user==1){
                $j_k = $result->gender;
                if ($j_k=='P'){
                  $j_kelamin = 'Pria';
                }else if ($j_k=='W'){
                  $j_kelamin = 'Wanita';
                }
              }
              $agama = $result->agama;
            }
    ?>
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php if ($id_user==2){
                 echo ' <img class="profile-user-img img-fluid img-circle"
                 src="'.base_url().'uploads/guru/'.$foto.'"
                 alt="User profile picture">';
                }else if($id_user==3){
                  echo ' <img class="profile-user-img img-fluid img-circle"
                  src="'.base_url().'uploads/siswa/'.$foto.'"
                  alt="User profile picture">';
                }else if($id_user==1){
                 echo ' <img class="profile-user-img img-fluid img-circle"
                 src="'.base_url().'uploads/admin/'.$foto.'"
                 alt="User profile picture">';
                }
            ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $nama ?></h3>

                <p class="text-muted text-center"><?php echo $id_name ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username:</b> <p class="float-right"><?php echo $username ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Agama:</b> <p class="float-right"><?php echo $agama ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin:</b> <p class="float-right"><?php echo $j_kelamin ?></p>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Ganti Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings">
                   <h3>Ganti Email/Password</h3></br>
                    <form  id="quickForm" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo $email ?>" placeholder="Email" disabled="disabled">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassLama" placeholder="Password Lama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                        <input type="password" data-minlength="8" class="form-control" id="inputPassBaru" placeholder="Password Baru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Pass Confirm</label>
                        <div class="col-sm-10">
                          <input type="password" data-minlength="8" class="form-control" id="konfirmasiPassword" placeholder="Konfirmasi Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" id="ganti_email" value="ganti" class="btn btn-danger">Ganti Email</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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