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
            <h3 class="page-title">Tambah Jadwal Kuliah</h3>
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
                    <h6 class="m-0">Form Tambah Jadwal Kuliah</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/tambahJadwalKuliah'; ?>" method="POST">
                          
                          <div class="form-group">
                              <label for="feInputAddress">Semester</label> <?php foreach($semester as $u ){ ?>
                              <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->semester ?>"> 
                              <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>">  <?php } ?>
                            </div>
                          <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="feInputAddress">Hari</label>
                                    <select required  name="hari" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday </option>
                                    <option value="Thursday">Thursday </option>
                                    <option value="Friday">Friday </option>
                                    <option value="Saturday">Saturday </option>
                                    <option value="Sunday">Sunday </option>
                                     </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Jam Kuliah</label>
                                        <select required  name="id_jam_kuliah" id="feInputState" class="form-control">
                                        <option value="" selected>Pilih </option>
                                        <?php foreach($jam_kuliah as $u ){ ?>
                                        <option value="<?php echo $u->id_jam_kuliah;?>"><?php echo $u->jam_kuliah;     ?></option> 
                                        <?php } ?>
                                    </select>
                                </div>
                                  <div class="form-group col-md-4">
                                  <label for="feInputAddress">Ruangan</label>
                                    <select required  name="id_ruangan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($ruangan as $u ){ ?>
                                    <option value="<?php echo $u->id_ruangan;?>"><?php echo $u->ruangan;     ?></option> 
                                    <?php } ?>
                                </select>
                                </div>
                                </div>
                         
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="feInputAddress">Mata Kuliah</label>
                                    <select required  name="kode_matkul" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($mata_kuliah as $u ){ ?>
                                    <option value="<?php echo $u->kode_matkul;?>"><?php echo $u->nama_matkul;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="feInputAddress">Kelas</label>
                                <input required name="kelas" type="text"  class="form-control" id="feInputAddress" > 
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="feInputAddress">Dosen</label>
                                    <select required  name="id_dosen" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($dosen as $u ){ ?>
                                    <option value="<?php echo $u->NIP;?>"><?php echo $u->Nama;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                            
                          <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Jurusan</label>
                                    <select required  name="id_jurusan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Program Studi</label>
                                        <select required  name="id_prodi" id="feInputState" class="form-control">
                                        <option value="" selected>Pilih </option>
                                        <?php foreach($prodi as $u ){ ?>
                                        <option value="<?php echo $u->id_prodi;?>"><?php echo $u->prodi;     ?></option> 
                                        <?php } ?>
                                    </select>
                                </div>
                                <div hidden class="form-group col-md-4">
                                    <label for="feInputAddress">status</label>
                                    <input   name="status" type="text"  class="form-control" id="feInputAddress" value="ada" > 
                                </div>
                            </div>
                           
							
                            <button type="submit" class="btn btn-accent">Tambah Mata Kuliah</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
</div>
    


