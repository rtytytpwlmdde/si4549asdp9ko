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
              <div class="col-lg-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Tambah Jadwal Kuliah</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">



                          <div class="col">
                          <form action="<?php echo base_url(). 'operator/insertJadwalKuliahRutin'; ?>" method="POST">
                          
                          <div class="form-group">
                              <label for="feInputAddress">Semester </label>
                              <?php foreach($semester as $u ){ ?>
                              <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->semester ?>"> 
                              <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>"> 
                              <input  hidden name="status" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->status ?>"> 
                              <?php } ?>
                            </div>
                         
                          <div class="form-row">
                          <div class="form-group col-md-4">
                                <label for="feInputAddress">Hari</label>
                                    <?php foreach($hari as $u ){ ?>
                                    <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php
                                    if($u->hari == 'Monday'){echo 'Senin';}
                                    else if($u->hari == 'Tuesday'){echo 'Selasa';}
                                    else if($u->hari == 'Wednesday'){echo 'Rabu';}
                                    else if($u->hari == 'Thursday'){echo 'Kamis';}
                                    else if($u->hari == 'Friday'){echo 'Jumat';}
                                    else if($u->hari == 'Saturday'){echo 'Saptu';}
                                    else if($u->hari == 'Sunday'){echo 'Minggu';}
                                    ?>"> 
                                    <input  hidden name="hari" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->hari ?>"> 
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Jam Kuliah</label>
                                    <?php foreach($jam_kuliah as $u ){ ?>
                                    <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->jam_kuliah ?>"> 
                                    <input  hidden name="id_jam_kuliah" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_jam_kuliah ?>"> 
                                    <?php } ?>                
                                </div>
                                  <div class="form-group col-md-4">
                                  <label for="feInputAddress">Ruangan</label>
                                    <?php foreach($ruangan as $u ){ ?>
                                    <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->ruangan ?>"> 
                                    <input  hidden name="id_ruangan" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_ruangan ?>"> 
                                    <?php } ?>                
                                </div>
                                </div>
                         
                            <div class="form-group">
                                <label for="feInputAddress">Mata Kuliah</label>
                                <input required list="list_matkul" name="kode_matkul" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_matkul">
                                    <?php foreach($mata_kuliah as $p): ?>
                                    <option value="<?php echo $p->kode_matkul?>"><?php echo $p->nama_matkul?></option>
                                    
                                    <?php endforeach ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="feInputAddress">Dosen</label>
                                <input required list="list_dosen" name="id_dosen" type="text" class="form-control" id="feInputAddress" placeholder="Ketik.."> 
                                <datalist id="list_dosen">
                                    <?php foreach($dosen as $p): ?>
                                    <option value="<?php echo $p->NIP?>"><?php echo $p->Nama?></option>
                                    <?php endforeach ?>
                                </datalist>
                            </div>
                            
                          <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="feInputAddress">Jurusan</label>
                                    <select required  name="id_jurusan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Program Studi</label>
                                        <select required  name="id_prodi" id="feInputState" class="form-control">
                                        <option value="" selected>Pilih </option>
                                        <?php foreach($prodi as $u ){ ?>
                                        <option value="<?php echo $u->id_prodi;?>"><?php echo $u->prodi;     ?></option> 
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Kelas</label>
                                    <input   name="kelas" type="text"  class="form-control" id="feInputAddress">  
                                </div>
                            </div>
                            <button type="submit" class="btn btn-accent">Tambah Jadwal</button>
                            </form>
                        </div>




                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
</div>
    


