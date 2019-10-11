<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-2">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <h3 class="page-title">Jadwal Pemetaan Ruangan Kelas</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('dosen/filter_surat');?>"  method="get" style="float:right" >
                    <div hidden id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <option value="1" selected>Filter Bersdasarkan</option>
                        <option value="2">Hari</option>
                        <option value="2">Ruangan</option>
                        <option value="3">Jurusan</option>
                    </select>  
                    
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div><br>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 py-2">
                        <span class="text-uppercase page-subtitle text-dark" style="font-size:1em">
                        <?php  
                            $date = $tanggal;
                            $hari =  date("l", strtotime($date));
                            $tgl = date("d M Y", strtotime($date));
                            if($hari == 'Monday'){echo 'Senin, '.$tgl;}
                            else if($hari == 'Tuesday'){echo 'Selasa, '.$tgl;}
                            else if($hari == 'Wednesday'){echo 'Rabu, '.$tgl;}
                            else if($hari == 'Thursday'){echo 'Kamis, '.$tgl;}
                            else if($hari == 'Friday'){echo 'Jumat, '.$tgl;}
                            else if($hari == 'Saturday'){echo 'Sabtu, '.$tgl;}
                            else if($hari == 'Sunday'){echo 'Minggu, '.$tgl;}
                          ?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('dosen/filter_peta_ruangan');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <input  name="date" type="date" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div>
                </div>
                
                  <!-- End Page Header -->
                  <!-- Small Stats Blocks -->
                  
                 
                  <!-- End Small Stats Blocks -->
                  <div class="row">
                    <div class="col">
                      <div class=" bg-white mb-4">
                      <div class=" alert alert-accent alert-dismissible fade show mb-3" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                        <strong class="text-white">Perhatian! Untuk melakukan peminjman ruangan rutin, silahkan ikuti langkah berikut </strong>    <br>
                        <strong class="text-white">1. Atur tanggal peminjaman terlebih dahulu </strong>    <br>
                        <strong class="text-white">2. Pilih ruangan pada kolom warna biru dengan simbol centang </strong>    <br>
                        <strong class="text-white">3. Akan muncul halaman baru untuk mengisi data lengkap peminjaman</strong>    
                    </div>
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto; ">
                        <table class="table table-bordered" >
                            <thead class="bg-light">
                                <tr>
                                        <th>R/J</th>
                                        <?php foreach ($jam_kuliah as $jam){?>
                                        <th ><?php echo $jam->jam_kuliah?></th>
                                        <?php }?>
                                </tr>
                            </thead>
                            <tbody >
                            <?php 
                                 foreach ($ruangan as $r){?>
                                <tr>
                                    <th><?php echo $r->ruangan?> 
                                      </th>
                                    <?php foreach ($jam_kuliah as $jam){
                                      
                                    $ruang = $r->id_ruangan;
                                    $jenis_ruang = $r->jenis_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    $i=0;
                                    $result = 0;
                                    ?>
                                    <th style="max-width:120px;">
                                      <?php 
                                      if($status_jadwal == 'ada'){
                                          foreach ($jadwal_kuliah as $j){
                                            $j_ruang = $j->id_ruangan;
                                            $j_waktu = $j->id_jam_kuliah;
                                            if($j_ruang == $ruang){
                                              if($j_waktu == $waktu){
                                                ?> <a class="btn"  title="Ruangan Digunakan, Tidak dapat dipinjam">
                                                  <span class="badge badge-danger"><i class="material-icons">close</i></span>
                                                </a>
                                              <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        }
                                      }?> 
                                      <?php foreach ($peminjaman_rutin as $pr){
                                        $pr_ruang = $pr->id_ruangan;
                                        $pr_waktu = $pr->id_jam_kuliah;
                                        $pr_status =  $pr->status;
                                        if($pr_ruang == $ruang){
                                          if($pr_waktu == $waktu){
                                            ?> <a class="btn" 
                                              <?php if($pr_status == 'setuju' || $pr_status == 'digunakan'){ ?>
                                                title="Ruangan Digunakan, Tidak dapat dipinjam">
                                              <span class="badge badge-danger">
                                               <?php  }else{ ?>
                                                title="Ruangan dalam proses peminjaman, Sementara tidak dapat dipinjam">
                                              <span class="badge badge-warning">
                                               <?php }?>
                                              <i class="material-icons">close</i></span>
                                            </a>
                                          <?php
                                            $result=1;
                                          }
                                        }
                                        $i++;
                                      }?> 

                                      <?php foreach ($peminjaman_non_rutin as $npr){
                                        $npr_ruang = $npr->id_ruangan;
                                        $npr_waktu = $npr->id_jam_kuliah;
                                        $npr_status =  $npr->status;
                                        if($npr_ruang == $ruang){
                                          if($npr_waktu == $waktu){
                                            ?> <a class="btn" 
                                              <?php if($npr_status == 'setuju' || $npr_status == 'digunakan'){ ?>
                                                title="Ruangan Digunakan, Tidak dapat dipinjam">
                                              <span class="badge badge-danger">
                                               <?php  }else{ ?>
                                                title="Ruangan dalam proses peminjaman, Sementara tidak dapat dipinjam">
                                              <span class="badge badge-warning">
                                               <?php }?>
                                              <i class="material-icons">close</i></span>
                                            </a>
                                          <?php
                                            $result=1;
                                          }
                                        }
                                        $i++;
                                      }?>
                                      
                                      <?php 
                                      if($result == 0){
                                          $dt_ruang = $ruang;
                                          $dt_waktu = $waktu;
                                          $jenis = $jenis_ruang;?>
                                            <a data-toggle="modal" 
                                            <?php if($jenis == 'rutin'){?>
                                            class="btn" data-target="#modal_edit<?php echo $dt_waktu ?><?php echo $dt_ruang ?>" title="Ruangan Tidak Digunakan, Dapat dipinjam">
                                              <span class="badge  badge-primary">
                                              <i class="material-icons">check</i></span>
                                            <?php }else{ ?>
                                            class="btn"  title="Ruangan Non Rutin, Tidak Dapat dipinjam untuk kelas rutin">
                                              <span class="badge  badge-dark" style="width:200%;">
                                              <i class="material-icons">close</i></span>
                                            <?php } ?>
                                            
                                            </a>
                                          <?php
                                      }
                                      ?> 
                                    </th>
                                    <?php } ?>
                                </tr>
                                <?php }?>
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  


<?php 
   
   $i=0;
   foreach($jam_kuliah as $j):
    foreach($ruangan as $r):
        
        $id_jam = $j->id_jam_kuliah;
        $id_ruang = $r->id_ruangan;
        $i++;
   ?>
        

<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_edit<?php echo $id_jam ?><?php echo $id_ruang ?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
        <?php
        $ruang = $r->ruangan;
        $jam = $j->jam_kuliah;
        ?>
            
        <h5 class="modal-title" id="exampleModalLongTitle">Form Pengajuan Peminjaman Ruang Kelas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
        <div class="row">
              <div class="col-lg-12">
                <div class=" mb-4">
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'dosen/tambahPeminjamanRutin'; ?>" method="POST">
                          
                          <div class="form-group">
                              <label for="feInputAddress">Semester</label> <?php foreach($semester as $u ){ ?>
                              <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->semester ?>"> 
                              <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>">  <?php } ?>
                            </div>
                            
                          <div class="form-group">
                              <label for="feInputAddress">Peminjam</label> 
                              <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $this->session->userdata('nama_login') ?>"> 
                              <input  hidden name="id_peminjam" type="text"  class="form-control" id="feInputAddress" value="<?php echo $this->session->userdata('id_login') ?>"> 
                              <input  hidden name="id_dosen" type="text"  class="form-control" id="feInputAddress" value="<?php echo $this->session->userdata('id_login') ?>"> 
                            </div>
                          <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Tanggal Penggunaan</label>
                                    <input hidden  name="tanggal_pemakaian" type="date"  class="form-control" id="feInputAddress" value="<?php echo $tanggal; ?>">  
                                    <input disabled  name="" type="date"  class="form-control" id="feInputAddress" value="<?php echo $tanggal; ?>">  
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feInputAddress">Jam Kuliah</label>
                                    <input hidden  name="id_jam_kuliah" type="text"  class="form-control" id="feInputAddress" value="<?php echo $id_jam; ?>">  
                                    <input disabled  name="" type="text"  class="form-control" id="feInputAddress" value="<?php echo $jam; ?>">                 
                                </div>
                                  <div class="form-group col-md-4">
                                  <label for="feInputAddress">Ruangan</label>
                                    <input hidden  name="id_ruangan" type="text"  class="form-control" id="feInputAddress" value="<?php echo $id_ruang; ?>">  
                                    <input disabled  name="" type="text"  class="form-control" id="feInputAddress" value="<?php echo $ruang; ?>">  
                                </div>
                                </div>
                         <div class="form-group">
                                <label for="feInputAddress">Kode Mata Kuliah</label>
                            <input required class="form-control" name="kode_matkul" list="matkul">
                              <datalist id="matkul">
                                    <?php foreach($mata_kuliah as $u ){ ?>
                                <option value="<?php echo $u->kode_matkul;?>"><?php echo $u->nama_matkul;?></option>
                                    <?php } ?>
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
                            
                            <div class="form-group">
                            <label for="feInputAddress">Keterangan</label>
                                    <input   name="keterangan" type="text"  class="form-control" id="feInputAddress">  
                            </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
        </div>
       
        
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-accent">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php endforeach;?>
 
    <?php endforeach;?>