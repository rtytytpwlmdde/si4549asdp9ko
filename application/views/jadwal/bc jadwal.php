<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Jadwal</span>
                        <h3 class="page-title">Pemetaan Ruangan Rutin</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('mahasiswa/filter_surat');?>"  method="get" style="float:right" >
                    <div hidden id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <option value="1" selected>Filter Berdasarkan</option>
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
                        echo date("l, d M Y")?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('jadwal/peta_jadwal_kuliah_filter');?>"  method="get" style="float:right" >
                      <div  id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                        <select  name="semester" class="custom-select custom-select-sm" style="min-width: 200px;">
                          <option value="" selected>Pilih Semester</option>
                          <?php foreach($semester as $u ){ ?>
                          <option value="<?php echo $u->id_semester;?>"><?php echo $u->semester;     ?></option> 
                          <?php } ?>
                      </select> 
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
                      <div class=" bg-white py-4 px-4 mb-4">
                    
                    
                  <!-- End Small Stats Blocks -->
                    <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-8 text-center text-sm-left mb-4 mb-sm-0">
                        <h3 class="page-title">Jadwal Kuliah <?php echo $last_semester?></h3>
                        
                    </div>
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                    <select name="kategori" id="kategori"   class="custom-select custom-select-sm" style="min-width: 100px;">
                        <option value="" selected>Filter By</option>
                        <option value="hari">Hari</option>
                        <option value="prodi">Program Studi</option>
                        <option value="ruang">Ruang</option>
                        <option value="dosen">Dosen</option>
                        <option value="matakuliah">Mata Kuliah</option>
                    </select>  
                    <select required  name="id_fiter_by" id="singleSelectDD"  onchange="singleSelectChangeValue()" class="id_fiter_by custom-select custom-select-sm" style="min-width: 200px;">
                      <option value="" selected>Pilih </option>
                    </select>
                    </div>
                    <input hidden type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" >
                   
                </div>
                <!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks -->
               
                <!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks -->
                  <!-- End Small Stats Blocks -->
                        
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto; ">
                          <table class="table table-bordered" >
                            <thead class="bg-light">
                                <tr>
                                        <th>Hari</th>
                                        <th>R/J</th>
                                        <?php foreach ($jam_kuliah as $jam){?>
                                        <th ><?php echo $jam->jam_kuliah?></th>
                                        <?php }?>
                                </tr>

                            </thead>
                            <tbody id="myTable">
                                <!-- //Hari Senin ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                <tr>
                                    <th><?php echo 'Senin'?> </th>
                                    <th><?php echo $r->ruangan?> </th>
                                    <?php foreach ($jam_kuliah as $jam){
                                      
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    $i=0;
                                    $result = 0;
                                    ?>
                                    <th style="max-width:120px;" class="py-2">
                                      <?php foreach ($jadwal_kuliah as $u){ 
                                        if($u->hari == 'Monday'){
                                        $pr_ruang = $u->id_ruangan;
                                        $pr_waktu = $u->id_jam_kuliah;
                                        if($pr_ruang == $ruang){
                                          if($pr_waktu == $waktu){
                                            ?> 
                                            <div <?php if($u->id_prodi == '1'){?>
                                            class="col-hijau text-center p-1"
                                          <?php }else if($u->id_prodi == '2'){?>
                                            class="col-kuning text-center p-1"
                                          <?php }else if($u->id_prodi == '3'){?>
                                            class="col-pink text-center p-1"
                                          <?php }else if($u->id_prodi == '4'){?>
                                            class="col-orange text-center p-1"
                                          <?php }else if($u->id_prodi == '5'){?>
                                            class="col-ungu text-center p-1"
                                          <?php }else if($u->id_prodi == '6'){?>
                                            class="col-ungutua text-center p-1"
                                          <?php }else if($u->id_prodi == '7'){?>
                                            class="col-biru text-center p-1"
                                          <?php }else if($u->id_prodi == '8'){?>
                                            class="col-merah text-center p-1"
                                          <?php }else if($u->id_prodi == '9'){?>
                                            class="col-birumuda text-center p-1"
                                          <?php }else {?>
                                            class="bg-dark text-center p-1"
                                          <?php }?>
                                        >
                                                <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>

                                            </div>
                                            

                                          <?php
                                            $result=1;
                                          }
                                        }
                                        $i++;
                                      } }?> 
                                      
                                      <?php 
                                      if($result == 0){
                                          $dt_ruang = $ruang;
                                          $dt_waktu = $waktu;
                                        ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '1' ?>" title="Tambah Jadwal">
                                              
                                              <i class="material-icons" style="font-size: 40px">add_circle</i>
                                            </a>
                                          <?php
                                      }
                                      ?> 
                                    </th>
                                    <?php } ?>
                                </tr>
                                <?php }?>

                                <!-- //Hari Selasa ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Selasa'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Tuesday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                              <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>

                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '2' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
                                              </a>
                                            <?php
                                        }
                                        ?> 
                                      </th>
                                      <?php } ?>
                                  </tr>
                                <?php }?>
                           
                           <!-- //Hari Selasa ----------------------------------------- -->
                           <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Rabu'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Wednesday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                             <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>
                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '3' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
                                              </a>
                                            <?php
                                        }
                                        ?> 
                                      </th>
                                      <?php } ?>
                                  </tr>
                                <?php }?>

                                <!-- //Hari Kamis ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Kamis'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Thursday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                              <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>
                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '4' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
                                              </a>
                                            <?php
                                        }
                                        ?> 
                                      </th>
                                      <?php } ?>
                                  </tr>
                                <?php }?>

                                <!-- //Hari Jumat ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Jumat'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Friday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                              <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>
                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '5' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
                                              </a>
                                            <?php
                                        }
                                        ?> 
                                      </th>
                                      <?php } ?>
                                  </tr>
                                <?php }?>

                                <!-- //Hari Kamis ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Saptu'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Saturday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                              <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>
                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '6' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
                                              </a>
                                            <?php
                                        }
                                        ?> 
                                      </th>
                                      <?php } ?>
                                  </tr>
                                <?php }?>

                                <!-- //Hari Minggu ----------------------------------------- -->
                                <?php 
                                 foreach ($ruangan as $r){?>
                                  <tr>
                                      <th><?php echo 'Minggu'?> </th>
                                      <th><?php echo $r->ruangan?> </th>
                                      <?php foreach ($jam_kuliah as $jam){
                                        
                                      $ruang = $r->id_ruangan;
                                      $waktu =  $jam->id_jam_kuliah;
                                      $i=0;
                                      $result = 0;
                                      ?>
                                      <th style="max-width:120px;" class="py-2">
                                        <?php foreach ($jadwal_kuliah as $u){ 
                                          if($u->hari == 'Sunday'){
                                          $pr_ruang = $u->id_ruangan;
                                          $pr_waktu = $u->id_jam_kuliah;
                                          if($pr_ruang == $ruang){
                                            if($pr_waktu == $waktu){
                                              ?> 
                                              <div <?php if($u->id_prodi == '1'){?>
                                              class="col-hijau text-center p-1"
                                            <?php }else if($u->id_prodi == '2'){?>
                                              class="col-kuning text-center p-1"
                                            <?php }else if($u->id_prodi == '3'){?>
                                              class="col-pink text-center p-1"
                                            <?php }else if($u->id_prodi == '4'){?>
                                              class="col-orange text-center p-1"
                                            <?php }else if($u->id_prodi == '5'){?>
                                              class="col-ungu text-center p-1"
                                            <?php }else if($u->id_prodi == '6'){?>
                                              class="col-ungutua text-center p-1"
                                            <?php }else if($u->id_prodi == '7'){?>
                                              class="col-biru text-center p-1"
                                            <?php }else if($u->id_prodi == '8'){?>
                                              class="col-merah text-center p-1"
                                            <?php }else if($u->id_prodi == '9'){?>
                                              class="col-birumuda text-center p-1"
                                            <?php }else {?>
                                              class="bg-dark text-center p-1"
                                            <?php }?>
                                          >
                                              <div  data-toggle="collapse" data-target="#collapse<?php echo $u->id_jadwal_kuliah ?>" aria-expanded="false" aria-controls="collapseExample">
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?>
                                                  <br><?php echo  "Kelas - ". $u->kelas;?>
                                                  </h6>
                                                </div>
                                                <div class="collapse" id="collapse<?php echo $u->id_jadwal_kuliah ?>">
                                                  <p>
                                                      <a data-toggle="modal" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" type="button" class="btn btn-white" title="Edit">
                                                          <i class="material-icons text-success">edit</i>
                                                      </a>
                                                      <a href="<?php echo site_url('jadwal/hapusJadwalKuliahHasilPlot/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                                          <i class="material-icons text-danger">delete</i>
                                                      </a>
                                                  </p>
                                                </div>
                                              </div>
                                              

                                            <?php
                                              $result=1;
                                            }
                                          }
                                          $i++;
                                        } }?> 
                                        
                                        <?php 
                                        if($result == 0){
                                            $dt_ruang = $ruang;
                                            $dt_waktu = $waktu;
                                          ?> <a data-toggle="modal" class="btn" data-target="#modal_tambah<?php echo $dt_waktu ?><?php echo $dt_ruang ?><?php echo '7' ?>" title="Tambah Jadwal">
                                                
                                                <i class="material-icons" style="font-size: 40px">add_circle</i>
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


    <script>
function myFunctsion() {
  var input, filter, tbody, tr, th, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    // kolom 0
    td0 = tr[i].getElementsByTagName("th")[0];
    if (td0) {
      txtValue = td0.textContent || td0.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {

        td1 = tr[i].getElementsByTagName("th")[1];
        if (td1) {
          txtValue = td1.textContent || td1.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            //// kolom 2
            td2 = tr[i].getElementsByTagName("th")[2];
            if (td2) {
              txtValue = td2.textContent || td2.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                  // kolom 3
                td2 = tr[i].getElementsByTagName("th")[2];
                if (td2) {
                  txtValue = td2.textContent || td2.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                      // //// kolom 5
                      td3 = tr[i].getElementsByTagName("th")[3];
                      if (td3) {
                        txtValue = td3.textContent || td3.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          // //// kolom 1
                            td4 = tr[i].getElementsByTagName("th")[4];
                            if (td4) {
                              txtValue = td4.textContent || td4.innerText;
                              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                              } else {
                                   // //// kolom 1
                                  td5 = tr[i].getElementsByTagName("th")[5];
                                  if (td5) {
                                    txtValue = td5.textContent || td5.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                      tr[i].style.display = "";
                                    } else {
                                       // //// kolom 7
                                        td6 = tr[i].getElementsByTagName("th")[6];
                                        if (td6) {
                                          txtValue = td6.textContent || td6.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                          } else {
                                            tr[i].style.display = "none";
                                          }
                                        }
                                    }
                                  }
                              }
                            }
                        }
                      }
                  }
                }
              }
            }
          }
        }

      }
    }








   
    
    //              
  }

}
</script>

<?php 
   
   $i=0;
   foreach($jadwal_kuliah as $p):
   ?>
<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_edit<?php echo $p->id_jadwal_kuliah ?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Jadwal Kuliah <?php echo $p->id_jadwal_kuliah?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
          <div class="row">
              <div class="col-lg-12">
                <div class=" mb-4">
                    <div class="row">
                      <div class="col">
                      <form action="<?php echo base_url(). 'jadwal/editJadwalKuliahHasilPlot'; ?>" method="POST">
                    
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
                            <option value="Monday" <?php echo ($p->hari=='Monday')?'selected="selected"':''; ?>>Monday</option>
                            <option value="Tuesday" <?php echo ($p->hari=='Tuesday')?'selected="selected"':''; ?>>Tuesday</option>
                            <option value="Wednesday" <?php echo ($p->hari=='Wednesday')?'selected="selected"':''; ?>>Wednesday</option>
                            <option value="Thursday" <?php echo ($p->hari=='Thursday')?'selected="selected"':''; ?>>Thursday</option>
                            <option value="Friday" <?php echo ($p->hari=='Friday')?'selected="selected"':''; ?>>Friday</option>
                            <option value="Saturday" <?php echo ($p->hari=='Saturday')?'selected="selected"':''; ?>>Saturday</option>
                            <option value="Sunday" <?php echo ($p->hari=='Sunday')?'selected="selected"':''; ?>>Sunday</option>
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
                            <select required  name="kode_matkul" id="feInputState" class="form-control">
                            <?php foreach ($mata_kuliah as $a) : ?>
                                <option value="<?= $a->kode_matkul; ?>"
                                    <?php if ($p->kode_matkul == $a->kode_matkul) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->nama_matkul; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
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
                      </div>
                    </div>
                </div>
              </div> 
          </div>
        </div>
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        </div>
    </div>
  </div>
</div>

    <?php endforeach;?>

    <?php 
   
   for ($x = 1; $x <= 7; $x++) {
   foreach($jam_kuliah as $j):
    foreach($ruangan as $r):
        
        $id_jam = $j->id_jam_kuliah;
        $id_ruang = $r->id_ruangan;
   ?>
        
<!-- Modal tambah jadwal-->
<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_tambah<?php echo $id_jam ?><?php echo $id_ruang ?><?php echo $x ?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
        <?php
        $ruang = $r->ruangan;
        $jam = $j->jam_kuliah;
        ?>
            
        <h5 class="modal-title" id="exampleModalLongTitle">Form Penambahan Jadwal Kuliah </h5>
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
                          <form action="<?php echo base_url(). 'jadwal/insertJadwalKuliahRutin'; ?>" method="POST">
                          
                          <div class="form-group">
                              <label for="feInputAddress">Semester <?php echo $i;?></label>
                              <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $last_semester ?>"> 
                              <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $is_semester_by_id ?>"> 
                              
                            </div>
                         
                          <div class="form-row">
                          <div class="form-group col-md-4">
                                <label for="feInputAddress">Hari</label>
                                <select hidden  name="hari" id="feInputState" class="form-control">
                                    <option value="Monday" <?php echo ($x=='1')?'selected="selected"':''; ?>>Monday</option>
                                    <option value="Tuesday" <?php echo ($x=='2')?'selected="selected"':''; ?>>Tuesday</option>
                                    <option value="Wednesday" <?php echo ($x=='3')?'selected="selected"':''; ?>>Wednesday</option>
                                    <option value="Thursday" <?php echo ($x=='4')?'selected="selected"':''; ?>>Thursday</option>
                                    <option value="Friday" <?php echo ($x=='5')?'selected="selected"':''; ?>>Friday</option>
                                    <option value="Saturday" <?php echo ($x=='6')?'selected="selected"':''; ?>>Saturday</option>
                                    <option value="Sunday" <?php echo ($x=='7')?'selected="selected"':''; ?>>Sunday</option>
                                </select>
                                <select disabled  name="" id="feInputState" class="form-control">
                                    <option value="Monday" <?php echo ($x=='1')?'selected="selected"':''; ?>>Monday</option>
                                    <option value="Tuesday" <?php echo ($x=='2')?'selected="selected"':''; ?>>Tuesday</option>
                                    <option value="Wednesday" <?php echo ($x=='3')?'selected="selected"':''; ?>>Wednesday</option>
                                    <option value="Thursday" <?php echo ($x=='4')?'selected="selected"':''; ?>>Thursday</option>
                                    <option value="Friday" <?php echo ($x=='5')?'selected="selected"':''; ?>>Friday</option>
                                    <option value="Saturday" <?php echo ($x=='6')?'selected="selected"':''; ?>>Saturday</option>
                                    <option value="Sunday" <?php echo ($x=='7')?'selected="selected"':''; ?>>Sunday</option>
                                </select>
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
                                <label for="feInputAddress">Mata Kuliah</label>
                                    <select required  name="kode_matkul" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($mata_kuliah as $u ){ ?>
                                    <option value="<?php echo $u->kode_matkul;?>"><?php echo $u->nama_matkul;     ?></option> 
                                    <?php } ?>
                                </select>
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
 
    <?php endforeach;
   }
    ?>

 
 <script>
  function singleSelectChangeValue() {
      //Getting Value
      
      // METHOD 1
      var selValue = document.getElementById("singleSelectDD").value;
      
      //METHOD 2
      var selObj = document.getElementById("singleSelectDD");
      var selValue = selObj.options[selObj.selectedIndex].value;
      
      //Setting Value
      document.getElementById("myInput").value = selValue;
      ////////
      var input, filter, tbody, tr, th, i, txtValue;
      input = document.getElementById("singleSelectDD");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
    // kolom 0
    td0 = tr[i].getElementsByTagName("th")[0];
    if (td0) {
      txtValue = td0.textContent || td0.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {

        td1 = tr[i].getElementsByTagName("th")[1];
        if (td1) {
          txtValue = td1.textContent || td1.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            //// kolom 2
            td2 = tr[i].getElementsByTagName("th")[2];
            if (td2) {
              txtValue = td2.textContent || td2.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                  // kolom 3
                td2 = tr[i].getElementsByTagName("th")[2];
                if (td2) {
                  txtValue = td2.textContent || td2.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                      // //// kolom 5
                      td3 = tr[i].getElementsByTagName("th")[3];
                      if (td3) {
                        txtValue = td3.textContent || td3.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          // //// kolom 1
                            td4 = tr[i].getElementsByTagName("th")[4];
                            if (td4) {
                              txtValue = td4.textContent || td4.innerText;
                              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                              } else {
                                   // //// kolom 1
                                  td5 = tr[i].getElementsByTagName("th")[5];
                                  if (td5) {
                                    txtValue = td5.textContent || td5.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                      tr[i].style.display = "";
                                    } else {
                                       // //// kolom 7
                                        td6 = tr[i].getElementsByTagName("th")[6];
                                        if (td6) {
                                          txtValue = td6.textContent || td6.innerText;
                                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                          } else {
                                            tr[i].style.display = "none";
                                          }
                                        }
                                    }
                                  }
                              }
                            }
                        }
                      }
                  }
                }
              }
            }
          }
        }

      }
    }








   
    
    //              
  }


  }

</script>


                    <script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
      if(id == 'matakuliah'){

        $.ajax({
          url : "<?php echo base_url();?>/jadwal/get_option_matakuliah",
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+"matkul"+data[i].kode_matkul+"matkul"+'>'+data[i].nama_matkul+'</option>';
                  }
                  $('.id_fiter_by').html(html);
          }
        });
      }else if(id == 'ruang'){

        $.ajax({
          url : "<?php echo base_url();?>/jadwal/get_option_ruang",
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
            var pilih = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+"ruang"+data[i].id_ruangan+"ruang"+'>'+data[i].ruangan+'</option>';
                  }
                  $('.id_fiter_by').html(html);
          }
        });
        }
        else if(id == 'dosen'){

        $.ajax({
          url : "<?php echo base_url();?>/jadwal/get_option_dosen",
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+"dosen"+data[i].NIP+"dosen"+'>'+data[i].Nama+'</option>';
                  }
                  $('.id_fiter_by').html(html);
          }
        });
        }

        else if(id == 'prodi'){
          $.ajax({
            url : "<?php echo base_url();?>/jadwal/get_option_prodi",
            method : "POST",
            data : {id: id},
            async : false,
                dataType : 'json',
            success: function(data){
              var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+"prodi"+data[i].id_prodi+"prodi"+'>'+data[i].prodi+'</option>';
                    }
                    $('.id_fiter_by').html(html);
            }
          });
          }

        else if(id == 'hari'){
              var html = '';
              var i;
                  html += '<option value="Senin">Senin</option>';
                  html += '<option value="Selasa">Selasa</option>';
                  html += '<option value="Rabu">Rabu</option>';
                  html += '<option value="Kamis">Kamis</option>';
                  html += '<option value="Jumat">Jumat</option>';
                  html += '<option value="Saptu">Saptu</option>';
                  html += '<option value="Minggu">Minggu</option>';
              $('.id_fiter_by').html(html);
            
        }
      ///////////////////////
		});
	});
</script>