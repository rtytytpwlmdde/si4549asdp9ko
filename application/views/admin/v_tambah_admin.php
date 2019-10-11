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
            <span class="text-uppercase page-subtitle"></span>
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
                    <h6 class="m-0">Form Tambah User</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/tambahadmin'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">Username</label>
                              <input required name="username" type="text"  class="form-control" id="feInputAddress" placeholder="Username"> 
                            </div>
                            <div class="form-group">
                               <label for="feInputAddress">Status</label>
                               <input required pattern="[^'\x11]+" name="Status" type="text" class="form-control" id="feInputAddress" placeholder="Status"> 
                            </div>
							<div class="form-group">
                               <label for="feInputAddress">Password</label>
                               <input required pattern="[^'\x11]+" name="Password" type="text" class="form-control" id="feInputAddress" placeholder="Password"> 
                            </div>
                           
                            <button type="submit" class="btn btn-accent">Tambah User</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
</div>
    


