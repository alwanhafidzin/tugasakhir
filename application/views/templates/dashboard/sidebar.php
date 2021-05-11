 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>assets/admin_lte/dist/img/sasoo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Smansasoo Vlearn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/admin_lte/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alwan Hafidzin Firdaus</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <?php 
			$page = $this->uri->segment(1);
			$data_sekolah = ["tahunakademik","jurusan", "tingkatkelas", "agama", "kelas", "kelassiswa"];
      $data_mapel = ["kelompokmapel", "mapel", "mapelmingguan", "gurumapel"];
			$data_ruangan = ["ruangan", "ruangkelas"];
			?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('dashboard')?>" class="nav-link <?= $page === 'dashboard' ? "active" : "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('siswa')?>" class="nav-link <?= $page === 'siswa' ? "active" : "" ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('guru')?>" class="nav-link <?= $page === 'guru' ? "active" : "" ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Data Guru
              </p>
            </a>
          </li>
          <li class="nav-item <?= in_array($page, $data_sekolah)  ? "active menu-open" : ""  ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Data Sekolah
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('tahunakademik')?>" class="nav-link <?= $page === 'tahunakademik' ? "active" : "" ?>">
                  <i class="fas fa-calendar-check nav-icon"></i>
                  <p>Tahun Akademik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('agama')?>" class="nav-link <?= $page === 'agama' ? "active" : "" ?>">
                  <i class="fas fa-quran nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('jurusan')?>" class="nav-link <?= $page === 'jurusan' ? "active" : "" ?>">
                  <i class="fas fa-map-signs nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('tingkatkelas')?>" class="nav-link <?= $page === 'tingkatkelas' ? "active" : "" ?>">
                  <i class="fas fa-network-wired nav-icon"></i>
                  <p>Tingkat Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('kelas')?>" class="nav-link <?= $page === 'kelas' ? "active" : "" ?>">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('kelassiswa')?>" class="nav-link <?= $page === 'kelassiswa' ? "active" : "" ?>">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Kelas Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?= in_array($page, $data_ruangan)  ? "active menu-open" : ""  ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Data Ruangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('ruangan')?>" class="nav-link <?= $page === 'ruangan' ? "active" : "" ?>">
                  <i class="fab fa-buromobelexperte nav-icon"></i>
                  <p>Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('ruangkelas')?>" class="nav-link <?= $page === 'ruangkelas' ? "active" : "" ?>">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Ruang Kelas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?= in_array($page, $data_mapel)  ? "active menu-open" : ""  ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Mapel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('kelompokmapel')?>" class="nav-link <?= $page === 'kelompokmapel' ? "active" : "" ?>">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Kelompok Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('mapel')?>" class="nav-link <?= $page === 'mapel' ? "active" : "" ?>">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('gurumapel')?>" class="nav-link <?= $page === 'gurumapel' ? "active" : "" ?>">
                  <i class="fas fa-book-reader nav-icon"></i>
                  <p>Guru Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('mapelmingguan')?>" class="nav-link <?= $page === 'mapelmingguan' ? "active" : "" ?>">
                  <i class="fas fa-calendar-plus nav-icon"></i>
                  <p>Jadwal Per-Minggu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('walikelas')?>" class="nav-link <?= $page === 'walikelas' ? "active" : "" ?>">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Wali Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('jadwal')?>" class="nav-link <?= $page === 'jadwal' ? "active" : "" ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal Pelajaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('absensi')?>" class="nav-link <?= $page === 'absensi' ? "active" : "" ?>">
              <i class="nav-icon fas fa-calendar-day"></i>
              <p>
                Absensi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pengguna')?>" class="nav-link <?= $page === 'pengguna' ? "active" : "" ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('ujian')?>" class="nav-link <?= $page === 'ujian' ? "active" : "" ?>">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Ujian
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


