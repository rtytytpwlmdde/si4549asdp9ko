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
            <h3 class="page-title">Pencarian Data Mahasiswa</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
		<div class="col-12 col-sm-0 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
            <a  href="<?php  echo base_url('admin/inputMahasiwa'); ?>" type="submit" class="form-control btn btn-primary text-center text-white"  style="float:center">
                <i class="material-icons">add</i>Tambah
            </a>      
            <a  href="<?php  echo base_url('import_mahasiswa/form'); ?>" type="submit" class="form-control btn btn-primary text-center text-white" style="float:center">
                <i class="material-icons">import_export</i>Import
            </a>
        </div>
        </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-12">
                <div class="card card-small mb-4">
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/cek_mahasiswa'; ?>" method="POST">
                            <div class="form-group">
                             <label for="feInputAddress">NIM</label>
                             <input list="NIP" pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" required name="NIP" class="form-control" id="feInputAddress" placeholder="Ketik Nama atau NIP"> 
                                <datalist id = "NIP">
                                
								<?php foreach($mahasiswa as $u){ ?>
                                <option value="<?php echo $u->nim ?>"> <?php echo $u->nim ?> <?php echo $u->nama ?></option>
                                <?php } ?>
                                </datalist>
						   <label for="feInputAddress">Jurusan</label>
						   <select required  name="id_jurusan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                             <button type="submit" class="btn btn-accent">Search</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            
            </div>
</div>
    


