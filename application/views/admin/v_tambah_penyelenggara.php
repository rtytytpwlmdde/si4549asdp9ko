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
            <h3 class="page-title">Tambah Penyelenggara</h3>
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
                    <h6 class="m-0">Form Tambah Penyelenggara</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/tambahPenyelenggara'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">Nama Penyelenggara</label>
                              <input required  name="penyelenggara" type="text" class="form-control" id="feInputAddress" placeholder="Nama Penyelenggara"> 
                            </div>
							<div class="form-group">
                              <label for="feInputAddress">Jenis Penyelenggara</label>
                              <input required  name="status" type="text" class="form-control" id="feInputAddress" placeholder="Status"> 
                            </div>
                            <button type="submit" class="btn btn-accent">Tambah Penyelenggara</button>
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
                      <strong class="text-muted d-block mb-2"><i class="material-icons">info_outline</i> Petunjuk Jenis Penyelenggara</strong>
                      <span>1. Penyelenggara dengan ID " 1 " digunakan untuk mahsiswa.</span><br>
					  <span>2. Penyelenggara dengan ID " 2 " digunakan untuk Non mahsiswa.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            </div>
			
</div>
    


