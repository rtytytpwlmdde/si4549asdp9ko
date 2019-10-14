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
            <h3 class="page-title">Update Data Pegawai</h3>
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
                    <h6 class="m-0">Form Update Data Pegawai</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach($pegawai as $u): ?>
                          <form action="<?php echo base_url(). 'admin/editPegawai'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">NIP</label>
                              <input  required name="NIP" type="text" pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" class="form-control" id="feInputAddress" value="<?php echo $u->NIP ?>"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Nama</label>
                              <input pattern="[^'\x11]+" required  name="Nama" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->Nama ?>"> 
                            </div>
                           
                            <div class="form-row"> 
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Status</label>
                                    <select required  name="Status" id="feInputState" class="form-control">
                                    <option value="Dosen" <?php echo ($u->Status=='Dosen')?'selected="selected"':''; ?>>Dosen</option>
                                    <option value="Staff" <?php echo ($u->Status=='Staff')?'selected="selected"':''; ?>>Staff</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Pangkat</label>
                                    <input required pattern="[^'\x11]+" name="Pangkat" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->Pangkat ?>"> 
                                </div>
                            </div>
                           <div class="form-group">
                              <label for="feInputAddress">No Telpon</label>
                              <input required  name="No_Telp" type="number" class="form-control" id="feInputAddress" value="<?php echo $u->No_Telp ?>"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Bagian</label>
                              <input required  name="Bagian" type="text" list="Bagian" class="form-control" id="feInputAddress" value="<?php echo $u->Bagian ?>"> 
                                 <datalist id = "Bagian">
                                    <?php 
                                        $arr = array();
                                        foreach($pegawai as $value){
                                            $arr[$value->Bagian] = $value->Bagian;
                                        }
                                        foreach($arr as $bag){?>
                                    <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                    <?php  }?>
                                </datalist>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Sub Bagian</label>
                              <input required  name="Sub_Bagian" type="text" list="Sub_Bagian" class="form-control" id="feInputAddress" value="<?php echo $u->Sub_Bagian ?>"> 
                                <datalist id = "Sub_Bagian">
                                    <?php 
                                        $arr = array();
                                        foreach($pegawai as $value){
                                            $arr[$value->Sub_Bagian] = $value->Sub_Bagian;
                                        }
                                        foreach($arr as $bag){?>
                                    <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                    <?php  }?>
                                </datalist>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Urusan</label>
                              <input required  name="Urusan" type="text" list="Urusan" class="form-control" id="feInputAddress" value="<?php echo $u->Urusan ?>"> 
                                <datalist id = "Urusan">
                                    <?php 
                                        $arr = array();
                                        foreach($pegawai as $value){
                                            $arr[$value->Urusan] = $value->Urusan;
                                        }
                                        foreach($arr as $bag){?>
                                    <option value="<?php echo $bag?>"> <?php echo $bag;?></option>
                                    <?php  }?>
                                </datalist>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Jabatan</label>
                                <select required  name="jabatan" id="feInputState" class="form-control">
                                    <option <?php echo ($u->jabatan=='kepala')?'selected="selected"':''; ?>>Kepala</option>
                                    <option <?php echo ($u->jabatan=='staff')?'selected="selected"':''; ?>>Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Status aktif</label>
                                <select required  name="stat" id="feInputState" class="form-control">
                                    <option <?php echo ($u->stat=='aktif')?'selected="selected"':''; ?>>aktif</option>
                                    <option <?php echo ($u->stat=='nonaktif')?'selected="selected"':''; ?>>nonaktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-accent">Update Pegawai</button>
                          </form>
                        <?php endforeach ?>
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
                      <span>1. Password pegawai baru akan diambil berdasarkan 6 terakhir dari NIP.</span><br>
                      <span>2. Status keaktifan pegawai akan secara default di set aktif.</span><br>
                      <span>3. Jabatan digunakan untuk..</span><br>
					  <span>4. No Telpon menggunakan 62.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
</div>
    


