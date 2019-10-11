 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
    <!-- alert -->
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
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Surat Tugas</span>
            <h3 class="page-title">Tambah User</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tambah Admin, Operator & Validator</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach( $user as $u): ?>
                          <form id="myform" action="<?php echo base_url(). 'admin/editadmin'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">Username</label>
                              <input required name="username" pattern="[A-Za-z0-9]{5,16}" title="Gunakan kombinasi huruf dan angka, 5-16 karakter" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->username ?>"> 
                            </div>
                           
                            <div class="form-row"> 
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Status</label>
                                      <input required  name="Status" pattern="[A-Za-z0-9]{5,16}" title="gunakan huruf, angka, 5 sampai 16 karakter"   type="text" class="form-control" id="feInputAddress" value="<?php echo $u->Status ?>"> 
                                  
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Password</label>
                                    <input required  name="Password" pattern="[A-Za-z0-9]{5,16}" title="gunakan huruf, angka, 5 sampai 16 karakter"   type="text" class="form-control" id="feInputAddress" value="<?php echo $u->Password ?>"> 
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-accent">Update User</button>
                          </form>
                        <?php endforeach ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Petunjuk</strong>
                      <span>1. Username harus minimal 5 karakter dan maksimal 16 karakter</span><br>
                      <span>2. Username hanya boleh menggunakan kombinasi huruf dan angka</span><br>
                      <span>3. Password harus minimal 5 karakter dan maksimal 16 karakter</span><br>
                      <span>4. Password hanya boleh menggunakan kombinasi huruf dan angka</span><br>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
</div>
    


