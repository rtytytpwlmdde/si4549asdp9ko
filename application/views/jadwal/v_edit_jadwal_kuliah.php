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
            <h3 class="page-title">Update Jadwal Kuliah</h3>
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
                    <h6 class="m-0">Form Update Jadwal Kuliah</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">



                          <div class="col">
                          <?php 
   
   $i=0;
   foreach($jadwal_kuliah as $p):
   ?>
                          <form action="<?php echo base_url(). 'jadwal/updateJadwalKuliahHasilPlot'; ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="feInputAddress">Semester</label> 
                        <input  disabled name="semester" type="text"  class="form-control" id="feInputAddress" value="<?php foreach($semester as $a ){  if ($p->id_semester==$a->id_semester) {echo $a->semester;}} ?>"> 
                        <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $p->id_semester ?>">  
                        <input  hidden name="id_jadwal_kuliah" type="text"  class="form-control" id="feInputAddress" value="<?php echo $p->id_jadwal_kuliah ?>">  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="feInputAddress">Hari</label>
                        <select required  name="hari" id="feInputState" class="form-control">
                            <option value="Monday" <?php echo ($p->hari=='Monday')?'selected="selected"':''; ?>>Senin</option>
                            <option value="Tuesday" <?php echo ($p->hari=='Tuesday')?'selected="selected"':''; ?>>Selasa</option>
                            <option value="Wednesday" <?php echo ($p->hari=='Wednesday')?'selected="selected"':''; ?>>Rabu </option>
                            <option value="Thursday" <?php echo ($p->hari=='Thursday')?'selected="selected"':''; ?>>Kamis</option>
                            <option value="Friday" <?php echo ($p->hari=='Friday')?'selected="selected"':''; ?>>Jumat</option>
                            <option value="Saturday" <?php echo ($p->hari=='Saturday')?'selected="selected"':''; ?>>Sabtu</option>
                            <option value="Sunday" <?php echo ($p->hari=='Sunday')?'selected="selected"':''; ?>>Minggu</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Jam Kuliah</label>
                                <select required  name="id_jam_kuliah" id="feInputState" class="form-control">
                                <?php foreach ($jam_kuliah as $a) : ?>
                                <option value="<?= $a->id_jam_kuliah; ?>"
                                    <?php if ($p->id_jam_kuliah == $a->id_jam_kuliah) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->jam_kuliah; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Ruangan</label>
                            <select required  name="id_ruangan" id="feInputState" class="form-control">
                            <?php foreach ($ruangan as $a) : ?>
                                <option value="<?= $a->id_ruangan; ?>"
                                    <?php if ($p->id_ruangan == $a->id_ruangan) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->ruangan; ?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                      
                    <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="feInputAddress">Mata Kuliah</label>
                            <input required  name="kode_matkul"  list="list_matkul" id="feInputState" class="form-control" value="<?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $p->kode_matkul) :echo $a->nama_matkul;endif;}  ?>">
							<datalist id = "list_matkul">
						   <?php foreach ($mata_kuliah as $a) : ?>
                                <option value="<?= $a->kode_matkul; ?>"
                                    <?php if ($p->kode_matkul == $a->kode_matkul) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->nama_matkul; ?>
                                </option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="feInputAddress">Kelas</label>
                        <input  required name="kelas" type="text"  class="form-control" id="feInputAddress" value="<?php echo $p->kelas ?>"> 
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Dosen</label>
                            <select required  name="id_dosen" id="feInputState" class="form-control">
                            <?php foreach ($dosen as $a) : ?>
                                <option value="<?= $a->NIP; ?>"
                                    <?php if ($p->id_dosen == $a->NIP) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->Nama; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="feInputAddress">Jurusan</label>
                            <select required  name="id_jurusan" id="feInputState" class="form-control">
                            <?php foreach ($jurusan as $a) : ?>
                                <option value="<?= $a->id_jurusan; ?>"
                                    <?php if ($p->id_jurusan == $a->id_jurusan) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->jurusan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Program Studi</label>
                                <select required  name="id_prodi" id="feInputState" class="form-control">
                                <?php foreach ($prodi as $a) : ?>
                                <option value="<?= $a->id_prodi; ?>"
                                    <?php if ($p->id_prodi == $a->id_prodi) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->prodi; ?>
                                </option>
                                 <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">status</label>
                            <input   name="status" type="text"  class="form-control" value="<?php echo $p->status ?>" id="feInputAddress" > 
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-accent">Update Jadwal Kuliah</button>
                    </form>
    <?php endforeach;?>
                        </div>




                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
</div>
    


