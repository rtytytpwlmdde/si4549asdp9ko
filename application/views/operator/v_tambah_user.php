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
                          <form action="<?php echo base_url(). 'operator/tambahUser'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">Username</label>
                              <input required  name="username" type="text" class="form-control" id="feInputAddress" > 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="feInputAddress">Password</label>
                                  <input required  name="password" type="text" class="form-control" id="feInputAddress" > 
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="feInputAddress">Status</label>
                                  <select required  name="status" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <option value="admin">admin</option>
                                    <option value="operator">operator</option>
                                    <option value="validator_rutin">validator rutin</option>
                                    <option value="validator_non_rutin">validator non rutin</option>
                                    <option value="validator_barang">validator barang</option>
                                    <option value="validator_khusus">validator khusus</option>
                                    </select>
                                </div>
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
    


