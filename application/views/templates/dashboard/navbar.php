 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <?php 
           	$user = $this->ion_auth->user()->row();
            $user_id =$user->id;
            $create = $user->created_on;
            $id_name =$this->ion_auth->get_users_groups($user_id)->row()->name;
            $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
            foreach($identity->result() as $result){
              $nama = $result->nama;
              $foto = $result->foto;
            }
            ?> 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <?php if ($id_user==2){
              echo '<img src="'.base_url().'uploads/guru/'.$foto.'" class="user-image img-circle elevation-2" alt="User Image">';
            }else if($id_user==3){
              echo '<img src="'.base_url().'uploads/siswa/'.$foto.'" class="user-image img-circle elevation-2" alt="User Image">';
            }
          ?>
          <span class="d-none d-md-inline"><?php echo $nama ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <?php if ($id_user==2){
              echo ' <img src="'.base_url().'uploads/guru/'.$foto.'" class="img-circle elevation-2" alt="User Image">';
            }else if($id_user==3){
              echo ' <img src="'.base_url().'uploads/siswa/'.$foto.'" class="img-circle elevation-2" alt="User Image">';
            }
            ?>
            <p>
           <?php echo $nama ?>- <?php echo $id_name ?>
              <small>Bergabung Sejak  <?php echo date("d-m-Y H:i", $create);?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="auth/logout" class="btn btn-default btn-flat float-right">Logout</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->