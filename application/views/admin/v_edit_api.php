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
             <h3 class="page-title">Update Data No Telphone</h3>
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
                    <h6 class="m-0">Form Update Data </h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach($api_wa as $u): ?>
                          <form action="<?php echo base_url(). 'admin/edit_api'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">ID</label>
                              <input  disabled name="id" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id ?>"> 
                              <input  hidden name="id" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id ?>"> 
                            </div>
							<div class="form-group">
                              <label for="feInputAddress">No Telphone</label>
                              <<input required  name="no_telp" type="number" class="form-control" id="feInputAddress" value="<?php echo $u->no_telp ?>"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Api Key</label>
                              <input name="api_key" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->api_key ?>"> 
                            </div>
                            <div class="form-group"> 
                                <div class="form-group">
                                <label for="feInputAddress">Status</label>
                                    <select required  name="status" id="feInputState" class="form-control">
                                    <option value="aktif" <?php echo ($u->status=='aktif')?'selected="selected"':''; ?>>aktif</option>
                                    <option value="non aktif" <?php echo ($u->status=='non aktif')?'selected="selected"':''; ?>>non aktif</option>
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
    



	