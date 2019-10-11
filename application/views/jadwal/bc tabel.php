<table class="table table-bordered" id="jadwal" >
                            <thead class="bg-light">
                                <tr>
                                        <th>Hari</th>
                                        <th>R/J</th>
                                        <?php foreach ($jam_kuliah as $jam){?>
                                        <th ><?php echo $jam->jam_kuliah?></th>
                                        <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <!--HARI SENIN -->
                            <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Senin";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Monday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI Selasa -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Selasa";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Tuesday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI Rabu -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Rabu";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Wednesday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI Kamis -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Kamis";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Thursday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI Jumat -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Jumat";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Friday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI Saptu -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Saptu";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Saturday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <!--HARI MINGGU -->
                                <?php 
                                 foreach ($ruangan as $r){ ?>
                                <tr>
                                    <th><?php echo "Minggu";?></th>
                                    <th><?php echo $r->ruangan?></th>
                                    <?php foreach ($jam_kuliah as $jam){?>
                                    <th style="max-width:120px;"
                                    <?php 
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    foreach ($jadwal_kuliah as $u){
                                      if($u->hari == 'Sunday'){
                                        if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                          <?php if($u->id_prodi == '1'){?>
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
                                            <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                            <div class=""><?php echo $u->hari;  ?></div>
                                            <h6 class="text-white" style="font-size:12px;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo substr($a->Nama,0,40);endif;}  ?></h6>
                                            <?php 
                                              
                                          }else{ 
                                          }
                                       }
                                      } ?>
                                      </th>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                          </table>