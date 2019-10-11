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
            <h3 class="page-title">Konfirmasi Reset Password</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'operator/passM'; ?>" method="POST">
                          
                          <?php foreach($mahasiswa as $u){ ?>
                            <div class="form-group">
                              <label for="feInputAddress">NIP</label>
                              <input required pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" name="nim" type="text" value= "<?php echo $u->nim ?>" class="form-control" id="feInputAddress" > 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Nama</label>
                              <input required  name="Nama" type="text" value= "<?php echo $u->nama ?>" class="form-control" id="feInputAddress" > 
                            </div>
                            <input type="hidden" name="Password" value= "<?php echo substr ($u->nim,-6) ?>">
                            <button type="submit" class="btn btn-accent">Konfirmasi Reset Password</button>
                            <?php } ?>
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
                      <span>1. <info class="text-danger">Satu Langkah Lagi</info> Klik konfirmasi reset password untuk reset password.</span><br>
                      <span>1. Password mahasiswa yang diriset akan diambil berdasarkan 6 terakhir dari NIM.</span><br>
                      <span>2. Pastikan nim mahasiswa tidak salah saat reset password.</span><br>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
</div>
    


