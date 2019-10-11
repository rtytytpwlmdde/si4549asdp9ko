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
            <h3 class="page-title">Tambah Pegawai</h3>
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
                    <h6 class="m-0">Form Tambah Pegawai</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'operator/tambahPegawai'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">NIP</label>
                              <input required name="NIP" type="text" pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" class="form-control" id="feInputAddress" placeholder="NIP"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Nama</label>
                              <input required  pattern="[^'\x11]+" name="Nama" type="text" class="form-control" id="feInputAddress" placeholder="Nama"> 
                            </div>
                           
                            <div class="form-row"> 
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Status</label>
                                    <select required  name="Status" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <option value="Staff">Staff</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Non Homebase">Non Homebase</option>
                                    </select>
                                </div>
								
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Pangkat</label>
                                    <input required pattern="[^'\x11]+" name="Pangkat" type="text" class="form-control" id="feInputAddress" placeholder="Pangkat"> 
                                </div>
                            </div>
                           <div class="form-group">
                              <label for="feInputAddress">No Telpon</label>
                              <input required  name="No_Telp" type="text" pattern="[0-9]{5,16}" title="Gunakan kombinasi angka, 5-16 karakter" class="form-control" id="feInputAddress" placeholder="No Telpon"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Bagian</label>
                              <input required name="Bagian" type="text" list="Bagian" class="form-control" id="feInputAddress" placeholder="Bagian"> 
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
                              <input required name="Sub_Bagian" type="text" list="Sub_Bagian" class="form-control" id="feInputAddress" placeholder="Sub Bagian"> 
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
                              <input required name="Urusan" type="text" list="Urusan" class="form-control" id="feInputAddress" placeholder="Urusan"> 
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
                                    <option value="" selected>Pilih Jabatan..</option>
                                    <option value="kepala">Kepala</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-accent">Tambah Pegawai</button>
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
                      <span>1. Password pegawai baru akan diambil berdasarkan 6 terakhir dari NIP.</span><br>
                      <span>2. Status keaktifan pegawai akan secara default di set aktif.</span><br>
                      <span>3. Jabatan digunakan untuk..</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
</div>
    


