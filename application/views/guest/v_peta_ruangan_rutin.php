<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-2">
				  
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <h3 class="page-title">Jadwal Pemetaan Ruangan Rutin</h3>
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
                    <form action="<?php echo site_url('guest/filter_peta_ruangan_rutin');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
					<input id="search_inp" class="input-sm form-control"  placeholder="Search"  type="text">
                    
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
                      <div class=" bg-white  mb-4">
                      <div class=" alert alert-accent alert-dismissible fade show mb-3" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x
                        </button>
                        <strong class="text-white">Perhatian! Untuk melakukan peminjman ruangan rutin, silahkan ikuti langkah berikut </strong>    <br>
                        <strong class="text-white">1. Atur tanggal peminjaman terlebih dahulu </strong>    <br>
                        <strong class="text-white">2. Pilih ruangan pada kolom warna biru dengan simbol centang </strong>    <br>
                        <strong class="text-white">3. Akan muncul halaman baru untuk mengisi data lengkap peminjaman</strong>    
                    </div>
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto; ">
                        <table class="table table-bordered" id="pegawai">
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
                                            <a 
                                            <?php if($jenis == 'rutin'){?>
                                            class="btn" data-toggle="modal" data-target="#modalLogin" title="Ruangan Tidak Digunakan, Dapat dipinjam">
                                              <span class="badge badge-primary">
                                              <i class="material-icons">check</i></span>
                                            <?php }else{ ?>
                                            class="btn"  title="Ruangan Non Rutin, Tidak Dapat dipinjam untuk kelas rutin">
                                              <span class="badge badge-dark">
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

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Silahkan login untuk melakukan peminjaman
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <script type="text/javascript">

var table = $('#pegawai').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        paging: false,
        stateSave: true,
        processing: true,        
        
        scrollCollapse: true,
        dom: 'frtip<"clear">l',
    "columnDefs": [{
      className: "dt-right",
    }],
        

    });
    
    
    $('#search_inp').keyup(function(){
    table.search($(this).val()).draw() ;
    })
    $('#data_length').on('change', function(){
    table.page.len( $(this).val() ).draw();
    
});
</script>


