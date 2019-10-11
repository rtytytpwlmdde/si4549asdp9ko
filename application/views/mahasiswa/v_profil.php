<div class="main-content-container container-fluid px-4">
<?php
    $notif = $this->session->flashdata('notif');
    if($notif != NULL){
        echo '
        <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-close text-white"></i></span>
        </button>
        <i class="fa fa-info mx-2"></i>
        <strong>'.$notif.'</strong> 
        </div>
        ';
    }
?>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Siaras</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="" src="<?php echo base_url(); ?>/assets/images/avatars/ub.png" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo $this->session->userdata('nama_login') ?></h4>
                    <span class="text-muted d-block mb-2"><?php echo $this->session->userdata('id_login') ?></span>
					<?php foreach ($user as $u){?>
					<a href="<?php echo site_url('mahasiswa/updateMahasiswa/'.$u->nim); ?>" type="button" class="btn btn-white" title="Edit Data Mahasiswa">
                    <button type="submit" class="btn btn-accent">Edit Biodata</button>
                    </a>
					<?php } ?>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2"></strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar"  style="width: 100%;">
                          </div>
                        </div>
                      </div>
                    </li>
                    
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Ganti Password ?</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach($user as $u): ?>
                          <form action="<?php echo base_url(). 'Mahasiswa/update_password'; ?>" method="POST">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Password lama</label>
                                <input required name="password_lama" pattern="[A-Za-z0-9]{5,16}" title="Gunakan kombinasi huruf dan angka, 5-16 karakter" type="password" class="form-control" id="feEmailAddress" placeholder="Password Lama"> 
                            </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password baru</label>
                                <input required name="password_baru" pattern="[A-Za-z0-9]{5,16}" title="Gunakan kombinasi huruf dan angka, 5-16 karakter" type="password" class="form-control" id="fePassword" placeholder="Password Baru"> 
                            </div>
                            </div>
                            <input hidden type="text" name="username" class="form-control" id="feFirstName" value="<?php echo $u->nim ?>"> 
                            <button type="submit" class="btn btn-accent">Update Password</button>
                          </form>
                        <?php endforeach ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>