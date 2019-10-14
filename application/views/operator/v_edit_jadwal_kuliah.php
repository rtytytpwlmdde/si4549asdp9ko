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
            <h3 class="page-title">Edit Jadwal Kuliah</h3>
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
            <h6 class="m-0">Form Edit Jadwal Kuliah</h6>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <div class="row">
                <div class="col">
                <?php foreach($jadwal_kuliah as $u): ?>
                    <form action="<?php echo base_url(). 'operator/editJadwal'; ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="feInputAddress">Semester</label> 
                        <input  disabled name="semester" type="text"  class="form-control" id="feInputAddress" value="<?php foreach($semester as $a ){  if ($u->id_semester==$a->id_semester) {echo $a->semester;}} ?>"> 
                        <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>">  <?php  ?>
                        <input  hidden name="id_jadwal_kuliah" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_jadwal_kuliah ?>">  <?php  ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="feInputAddress">Hari</label>
                        <select required  name="hari" id="feInputState" class="form-control">
                            <option value="Monday" <?php echo ($u->hari=='Monday')?'selected="selected"':''; ?>>Senin</option>
                            <option value="Tuesday" <?php echo ($u->hari=='Tuesday')?'selected="selected"':''; ?>>Selasa</option>
                            <option value="Wednesday" <?php echo ($u->hari=='Wednesday')?'selected="selected"':''; ?>>Rabu</option>
                            <option value="Thursday" <?php echo ($u->hari=='Thursday')?'selected="selected"':''; ?>>Kamis</option>
                            <option value="Friday" <?php echo ($u->hari=='Friday')?'selected="selected"':''; ?>>Jumat</option>
                            <option value="Saturday" <?php echo ($u->hari=='Saturday')?'selected="selected"':''; ?>>Sabtu</option>
                            <option value="Sunday" <?php echo ($u->hari=='bagus')?'selected="selected"':''; ?>>Minggu</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Jam Kuliah</label>
                                <select required  name="id_jam_kuliah" id="feInputState" class="form-control">
                                <?php foreach ($jam_kuliah as $a) : ?>
                                <option value="<?= $a->id_jam_kuliah; ?>"
                                    <?php if ($u->id_jam_kuliah == $a->id_jam_kuliah) :
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
                                    <?php if ($u->id_ruangan == $a->id_ruangan) :
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
						 <input required list="list_matkul" name="kode_matkul" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->kode_matkul ?>"> 
                                <datalist id="list_matkul">
                                    <?php foreach($mata_kuliah as $p): ?>
                                    <option value="<?php echo $p->kode_matkul?>"><?php echo $p->nama_matkul?></option>
                                    
                                    <?php endforeach ?>
                                </datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="feInputAddress">Kelas</label>
                        <input  required name="kelas" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->kelas ?>"> 
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Dosen</label>
                          <input required list="list_dosen" name="id_dosen" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->id_dosen ?>"> 
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
                            <?php foreach ($jurusan as $a) : ?>
                                <option value="<?= $a->id_jurusan; ?>"
                                    <?php if ($u->id_jurusan == $a->id_jurusan) :
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
                                    <?php if ($u->id_prodi == $a->id_prodi) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->prodi; ?>
                                </option>
                                 <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">status</label>
                            <input   name="status" type="text"  class="form-control" value="<?php echo $u->status ?>" id="feInputAddress" > 
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-accent">Update Mata Kuliah</button>
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
    


