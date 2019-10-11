<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Jadwal</span>
                        <h3 class="page-title">Perkuliahan</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('admin/filter_surat');?>"  method="get" style="float:right" >
                    <div hidden id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <option value="1" selected>Filter Berdasarkan</option>
                        <option value="2">Hari</option>
                        <option value="2">Ruangan</option>
                        <option value="3">Jurusan</option>
                    </select>  
                    <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 100px;">
                            <option value="1" selected>Ruangan</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                            <option value="2">f.1.1</option>
                            <option value="3">f.1.2</option>
                            <option value="2">c.1.1</option>
                            <option value="3">c.1.2</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                            <option value="1" >Hari</option>
                            <option value="2">Senin</option>
                            <option value="3">Senin</option>
                            <option value="2">Rabu</option>
                            <option value="3">Kamis</option>
                            <option value="2">Jumat</option>
                            <option value="3">Saptu</option>
                            <option value="2">Minggu</option>
                            <option value="1"> Akuntansi</option>
                            <option value="2">Ilmu Ekonomi</option>
                            <option value="3">Manajemen</option>
                        </select>
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div><br>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 py-2">
                        <span class="text-uppercase page-subtitle text-dark" style="font-size:1em">
                          <?php  echo date("l d M Y") . "<br>";?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('jadwal/filter_peta_ruangan');?>"  method="post" style="float:right" >
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
                  
                  <div class="row mb-2 jadwal-color py-2">
                    <div class="col mb-4">
                      <div class="col-hijau text-center p-1">Akuntansi S1</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-kuning text-center p-1">Akuntansi S2</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-pink text-center p-1">Akuntansi S3</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-orange text-center p-1">Ilmu Ekonomi S1</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-ungu text-center p-1">Ilmu Ekonomi S2</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-ungutua text-center p-1">Ilmu Ekonomi S3</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-biru text-center p-1">Managemen S1</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-merah text-center p-1">Managemen S2</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-birumuda text-center p-1">Managemen S3</div>
                    </div>
                  </div>
                  <!-- End Small Stats Blocks -->
                  <div class="row">
                    <div class="col">
                      <div class=" bg-white py-4 px-4 mb-4">
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
                            <?php  $ya=0; $tidak=2;$jum=0; $ada=0; $status=0;
                                    foreach ($ruangan as $r){
                                        $jum=0; $ya=0;?>
                                    <tr>
                                        <th><?php echo $r->ruangan?></th>
                                        <?php foreach ($jam_kuliah as $jm){$jum=0; $ya=0; ?>
                                        <th style="max-width:120px;">
                                        <?php 
                                        foreach ($peminjaman_rutin as $u){
                                            $ruang = $r->id_ruangan;
                                            $waktu =  $jm->id_jam_kuliah;
                                                if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu ){
                                                    $ya=5;
                                                   ?>
                                                <span class="btn badge-pill badge-primary" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">check</i></span>
                                                <?php }else{
                                                    $jum++;
                                                    if($jum<2 ){
                                                        if($ya<2){ ?>
                                                           <span class="btn badge-pill badge-danger" title="Tidak Digunakan, Dapat dipinjam"><i class="material-icons">close</i></span>
                                                    <?php }
                                                    }
                                                }
                                        }
                                    }?>
                                    </th>
                                </tr>
                            <?php }?>
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                
                </div>  