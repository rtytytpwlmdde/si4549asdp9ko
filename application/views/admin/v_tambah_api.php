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
            <h3 class="page-title">Tambah No Telphone</h3>
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
                    <h6 class="m-0">Form Tambah Data</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/tambah_api'; ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="feInputAddress">No telphone</label>
                                  <input required  name="no_telp" type="text" class="form-control" id="feInputAddress" > 
                                </div>
								<div class="form-group col-md-6">
                                  <label for="feInputAddress">Api Key</label>
                                  <input required  name="api_key" type="text" class="form-control" id="feInputAddress" > 
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="feInputAddress">Status</label>
                                  <select required  name="status" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <option value="aktif">Aktif</option>
                                    <option value="non aktif">Non Aktif</option>>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-accent">Tambah No Telphone</button>
                          </form>
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
                      <strong class="text-muted d-block mb-2"><i class="material-icons">info_outline</i> Petunjuk</strong>
                      <span>1. No Telphone gunakan format 62.</span><br>
                      <span>2. Api Key silahkan copy dari website https://panel.apiwha.com/.</span><br>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
</div>
    


