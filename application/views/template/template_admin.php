<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIRUAS FEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="<?php echo base_url(); ?>/assets/styles/shards-dashboards.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/extras.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/chartist/css/chartist-custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/datatable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/import.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/images/ub.png">
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js "></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js  "></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100 ">
   
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="<?php echo base_url('admin/index'); ?>" style="line-height: 25px;">
                <div class="d-table m-auto">
                <img id="main-logo" class="d-inline-block align-top mr-1 ml-3 " style="max-width: 30px;" src="<?php echo base_url(); ?>/assets/images/ub.png">
                <span class="d-none d-md-inline ml-1 text-primary py-6" style="font-family: 'Abril Fatface', cursive; font-size:30px">FEB UB</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons"></i>
              </a>
            </nav>
          </div>
          <div class="nav-wrapper">
            <ul class="nav nav--no-borders flex-column">
              <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url('admin/index'); ?>">
                  <i class="material-icons">dashboard</i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">event</i>
                  <span>Jadwal</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item " href="<?php echo base_url('jadwal/peta_jadwal_kuliah'); ?>">Jadwal Kuliah</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/list_agenda_umum'); ?>">Agenda</a>
                </div>
              </li>
            </ul>
            <ul class="nav nav--no-borders flex-column">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">account_circle</i>
                  <span>Users</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item " href="<?php echo base_url('admin/user'); ?>">User</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/data_pegawai'); ?>">Pegawai</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/pencarian'); ?>">Mahasiswa</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">poll</i>
                  <span>Rekap</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item " href="<?php echo base_url('admin/rekap_jadwal_rutin'); ?>">Rekap Jadwal Pengganti</a>
                  <a hidden class="dropdown-item " href="<?php echo base_url('admin/rekap_peminjaman'); ?>">Rekap Peminjaman</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/rekap_peminjam_pegawai'); ?>">Rekap Peminjam</a>
				   <a class="dropdown-item " href="<?php echo base_url('admin/rekap_peminjaman_barang'); ?>">Rekap Peminjaman Barang</a>
				  <a class="dropdown-item " href="<?php echo base_url('admin/pencarian_peminjam'); ?>">Pencarian Rekap Peminjaman</a>
                   </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">view_module</i>
                  <span>Master</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item " href="<?php echo base_url('admin/semester'); ?>">Setting Semester</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/ruangan'); ?>">Kelas / Ruangan </a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/matakuliah'); ?>">Mata Kuliah</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/penyelenggara'); ?>">Penyelenggara</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/jenis_barang'); ?>">Jenis Barang</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/barang'); ?>">Sarana Prasarana</a>
				  <a class="dropdown-item " href="<?php echo base_url('admin/lihat_jurusan'); ?>">Data Jurusan</a>
                  <a class="dropdown-item " href="<?php echo base_url('admin/lihat_prodi'); ?>">Data Prodi</a>
                </div>
              </li>
				<li class="nav-item">
				<a class="nav-link " href="<?php echo base_url('admin/reset_password'); ?>">
                  <i class="material-icons">lock</i>
                  <span>Reset Password</span>
                </a>
				</li>
				<li class="nav-item">
				<a class="nav-link " href="<?php echo base_url('admin/api_key'); ?>">
                  <i class="material-icons">settings_cell</i>
                  <span>Edit No Telphone</span>
                </a>
				</li>
				<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">poll</i>
                  <span>Master Data Peminjam</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item " href="<?php echo base_url('admin/history_rutin'); ?>"> Data Peminjaman Rutin</a>
                  <a  class="dropdown-item " href="<?php echo base_url('admin/history_non_rutin'); ?>">Data Peminjaman Non Rutin</a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top nav-up">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <input hidden class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
              </form>
              <ul class="navbar-nav  flex-row ">
                <li class="nav-item dropdown">
                    <a style="margin-left:80px;" class="nav-link dropdown-toggle text-nowrap py-3 px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-md-inline-block text-white">
                    <i class="material-icons">person </i><?php echo $this->session->userdata('username'); ?>
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="<?php echo base_url('admin/profil/'.$this->session->userdata('username')) ?>">
                        <i class="material-icons ">&#xE7FD;</i> Update Password</a>
                    <a class="dropdown-item text-danger" href="<?php echo base_url('auth/logout'); ?>">
                        <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                    </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div>
            <?php $this->load->view($main_view); ?>
            </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/extras.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/shards-dashboards.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/app/app-blog-overview.1.0.0.js"></script>
	<script src="<?php echo base_url(); ?>/assets/chartist/js/chartist.min.js"></script>
  </body>
</html>