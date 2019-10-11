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
            <h3 class="page-title">Update Data Ruangan</h3>
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
                    <h6 class="m-0">Form Update Data Ruangan</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach($user as $u): ?>
                          <form action="<?php echo base_url(). 'operator/editUser'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">Username</label>
                              <input  disabled name="username" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->username ?>"> 
                              <input  hidden name="username" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->username ?>"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Password</label>
                              <input name="password" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->password ?>"> 
                            </div>
                            <div class="form-group"> 
                                <div class="form-group">
                                <label for="feInputAddress">Status</label>
                                    <select required  name="status" id="feInputState" class="form-control">
                                    <option value="admin" <?php echo ($u->status=='admin')?'selected="selected"':''; ?>>admin</option>
                                    <option value="operator" <?php echo ($u->status=='operator')?'selected="selected"':''; ?>>operator</option>
                                    <option value="validator_rutin" <?php echo ($u->status=='validator_rutin')?'selected="selected"':''; ?>>validator rutin</option>
                                    <option value="validator_non_rutin" <?php echo ($u->status=='validator_non_rutin')?'selected="selected"':''; ?>>validator non rutin</option>
                                    <option value="validator_barang" <?php echo ($u->status=='validator_barang')?'selected="selected"':''; ?>>validator barang</option>
                                    <option value="validator_khusus" <?php echo ($u->status=='validator_khusus')?'selected="selected"':''; ?>>validator khusus</option>
                                    </select>
                                </div>
                            <button type="submit" class="btn btn-accent">Update Data</button>
                          </form>
                        <?php endforeach ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
       
            </div>
</div>
    


