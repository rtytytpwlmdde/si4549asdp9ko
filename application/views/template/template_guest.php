<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIRUAS FEB UB</title>
		<meta property="og:title" content="Siruas Fakultas Ekonomi Dan Bisnis (FEB) Universitas Brawijaya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIRUAS - Fakultas Ekonomi Dan Bisnis (FEB) Universitas Brawijaya">
	  <meta name="keywords" content="FEB,FEB UB,UB">
    <meta name="author" content="Siruas">
	  <meta name="robots" content="index, follow">
    <meta name="HandheldFriendly" content="true">
    <meta http-equiv="cleartype" content="on">
    <meta property="og:site_name" content="Siruas - Fakultas Ekonomi Dan Bisnis (FEB) Universitas Brawijaya">
    <meta property="og:description" content="Siruas - Fakultas Ekonomi Dan Bisnis (FEB) Universitas Brawijaya">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" id="main-stylesheet" data-version="1.0.0" href="<?php echo base_url(); ?>/assets/styles/shards-dashboards.1.0.0.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/extras.1.0.0.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/vendor/agenda.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/vendor/datatable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/vendor/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/vendor/import.css">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/images/ub.png">
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
  <nav class="navbar navbar-expand-lg flex-md-nowrap p-0 nav-down">
  <a class="navbar-brand text-white" href="<?php echo base_url('guest/peta_jadwal_kuliah'); ?>" style="line-height: 29px;">
  <div class="d-table m-auto">
    <img id="main-logo" class="d-inline-block align-top mr-1 ml-3 " style="max-width: 30px;" src="<?php echo base_url(); ?>/assets/images/ub.png">
    <span class=" text-white py-6" style="font-family: 'Abril Fatface', cursive; font-size:30px">FEB UB</span>
  </div>
  </a>
 
  <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center text-white" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-controls="header-navbar">
    <i class="material-icons"></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto px-3">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?php echo base_url('guest/peta_jadwal_kuliah'); ?>"><i class="material-icons">airplay</i> Jadwal Kuliah</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">event</i> Agenda
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('guest/list_agenda_umum'); ?>">Agenda Umum</a>
          <a class="dropdown-item" href="<?php echo base_url('guest/list_agenda_akademik'); ?>">Agenda Akademik</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">devices_other</i> Sarana Prasarana
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('guest/peta_ruangan_rutin'); ?>">Kelas</a>
          <a class="dropdown-item" href="<?php echo base_url('guest/peta_ruangan_non_rutin'); ?>">Non Kelas</a>
          <a class="dropdown-item" href="<?php echo base_url('guest/peta_sarpras'); ?>">Sarana Prasarana</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">view_module</i> Peminjaman
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('auth/login'); ?>">Kelas</a>
          <a class="dropdown-item" href="<?php echo base_url('auth/login'); ?>">Non Kelas</a>
          <a class="dropdown-item" href="<?php echo base_url('auth/login'); ?>">Sarana Prasarana</a>
          <a hidden class="dropdown-item" href="<?php echo base_url('auth/login'); ?>">Ruangan Khusus</a>
        </div>
      </li>
      <li class="nav-item active">
          <a href="<?php echo base_url('guest/kodeboking'); ?>" class="nav-link  text-white"><i class="material-icons">center_focus_weak</i> Cek Kode Booking</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
          <a href="<?php echo base_url('auth/login'); ?>" class="nav-link px-3 text-white"> Log in</a>
        </li>
      </ul>
  </div>
</nav>

    <div class="container-fluid ">
        <div class="row">
            <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
                 
                <?php $this->load->view($main_view); ?>
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
  </body>
</html>