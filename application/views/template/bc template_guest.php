<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIARAS FEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" id="main-stylesheet" data-version="1.0.0" href="<?php echo base_url(); ?>/assets/styles/shards-dashboards.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/extras.1.0.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/agenda.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/new_agenda.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/chartist/css/chartist-custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/datatable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/vendor/import.css">
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
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
		<script src="https://cdn.datatables.net/scroller/1.5.1/js/dataTables.scroller.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100 bg-white">
    <div class="container-fluid ">
        <div class="row">
            <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
                <div class="main-navbar nav-up">
                  <div class=" p-0">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light  flex-md-nowrap p-0">
                      <a class="navbar-brand logo-navbar" href="<?php echo base_url('validator/index'); ?>" style="line-height: 25px;">
                        <div class="d-table m-auto">
                          <img id="main-logo" class="d-inline-block align-top mr-1 ml-3 " style="max-width: 30px;" src="<?php echo base_url(); ?>/assets/images/ub.png" alt="Shards Dashboard">
                          <span class="d-none d-md-inline ml-1 text-white py-6" style="font-family: 'Abril Fatface', cursive; font-size:30px">FEB UB</span>
                        </div>
                      </a>
                     
                      <ul class="navbar-nav flex-row  ml-auto">
                        <li class="nav-item dropdown text-white">
                        <a class="nav-link text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle mr-2" src="<?php echo base_url(); ?>/assets/images/avatars/0.jpg" alt="User Avatar"> <span class="d-none d-md-inline-block text-white"><?php echo $this->session->userdata('username'); ?></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-small text-white">
                          <a class="dropdown-item" href="<?php echo base_url('validator/profil/'); ?>"><i class="material-icons"></i> Update Password</a>
                         <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons"></i> Logout</a>
                           
                          </div>
                        </li>
                      </ul>
                      <nav class="nav">
                        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center " data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                          <i class="material-icons text-white"></i>
                        </a>
                      </nav>
                    </nav>
                  </div> <!-- / .container -->
                </div> <!-- / .main-navbar -->
                <div class="header-navbar collapse d-lg-flex p-0 nav-down ">
                  <div class="px-2">
                    <div class="row">
                      <div class="col">
                        <ul class="nav  border-0 flex-column flex-lg-row ">
                          <li class="nav-item">
                            <a href="<?php echo base_url('validator/index'); ?>" class="nav-link  text-white"><i class="material-icons">dashboard</i> Dashboard</a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('validator/peta_jadwal_kuliah'); ?>" class="nav-link  text-white"><i class="material-icons">event</i> Jadwal Kuliah</a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('validator/agenda'); ?>" class="nav-link  text-white"><i class="material-icons">event</i> Agenda</a>
                          </li>
                          <li class="nav-item ">
                              <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button">
                                <span><i class="material-icons">devices_other</i> Sarana Prasarana</span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-small">
                              <a href="<?php echo base_url('validator/peta_ruangan_rutin'); ?>" class="dropdown-item">Kelas</a>
                              <a href="<?php echo base_url('validator/peta_ruangan_non_rutin'); ?>" class="dropdown-item">Non Kelas</a>
                              <a href="<?php echo base_url('validator/peta_sarpras'); ?>" class="dropdown-item">Sarana Prasarana</a>
                          </li>
                          <?php if($this->session->userdata('status') == 'validator_rutin'){ ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/peminjaman_rutin'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Peminjaman Kelas</a>
                            </li>
                          <?php } else if($this->session->userdata('status') == 'validator_non_rutin'){ ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/peminjaman_non_rutin'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Peminjaman Non Kelas</a>
                            </li>
                          <?php } else if($this->session->userdata('status') == 'validator_khusus'){ ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/peminjaman_khusus'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Peminjaman Khusus</a>
                            </li>
                          <?php } else if($this->session->userdata('status') == 'validator_barang'){ ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/peminjaman_barang'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Peminjaman Barang</a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/pengembalian_barang'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Pengembalian Barang</a>
                            </li>
                          <?php } else { ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url('validator/peminjaman'); ?>" class="nav-link  text-white"><i class="material-icons">view_list</i> Peminjaman</a>
                            </li>
                          <?php }
                          ?>
                           
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/extras.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/shards-dashboards.1.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/scripts/app/app-blog-overview.1.0.0.js"></script>
	<script src="<?php echo base_url(); ?>/assets/chartist/js/chartist.min.js"></script>
  </body>
</html>