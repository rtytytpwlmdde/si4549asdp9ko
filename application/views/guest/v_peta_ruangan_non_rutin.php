<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-2">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <h3 class="page-title">Jadwal Pemetaan Ruangan Non Kelas</h3>
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
                   
                    <form action="<?php echo site_url('guest/filter_peta_ruangan_non_rutin');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      
                      <input  hidden type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" >
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
                      <div class=" bg-white py-2  mb-4">
                      <div class=" alert alert-accent alert-dismissible fade show mb-3" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x
                        </button>
                        <strong class="text-white">Perhatian! Untuk melakukan peminjman sarana prasarana, silahkan klik menu peminjaman pada menu navigasi </strong>    <br>
                    </div>
                        <div class=" p-0 pb-3 text-left" style="overflow-x:auto; ">
                        <table class="table table-bordered" >
                            <thead class="bg-light">
                                <tr>
                                        <th>R/J</th>
                                        <?php for ($x = 7; $x <= 9; $x++) { ?>
                                           <th class="text-sm-center"><?php echo '0'.$x.':00';?></th>
                                        <?php }?>
                                        <?php for ($x = 10; $x <= 22; $x++) { ?>
                                           <th class="text-sm-center"><?php echo $x.':00';?></th>
                                        <?php }?>
                                </tr>
                            </thead>
                            <tbody id="myTable" >
                            <?php 
                                 foreach ($ruangan_non_rutin as $r){?>
                                <tr>
                                    <th><?php echo $r->ruangan?>  </th>
                                    <?php for ($x = 7; $x <= 22; $x++) {
                                      
                                    $ruang = $r->id_ruangan;
                                    $i=0;
                                    $result = 0;
                                    $waktu = $x;
                                    ?>
                                    <th class="text-sm-center" style="max-width:10px;">
                                    <?php foreach ($peminjaman_non_rutin as $pb){
                                        $pb_ruang = $pb->id_ruangan;
                                        $start = $pb->jam_mulai_peminjaman;
                                        $end = $pb->jam_selesai_peminjaman;
                                        $pb_status =  $pb->status;
                                        for ($time = $start; $time <= $end; $time++) {
                                        if($pb_ruang == $ruang){
                                          if($time == $waktu){
                                            ?> 
                                            <span 
                                              <?php if($pb_status == 'setuju' || $pb_status == 'digunakan'){ ?>
                                                title="Sarana Prasarana Digunakan, Tidak dapat dipinjam">
                                              <span class="badge badge-danger">
                                               <?php  }else{ ?>
                                                title="Sarana Prasarana dalam proses peminjaman, Sementara tidak dapat dipinjam">
                                              <span class="badge badge-warning">
                                               <?php }?>
                                              <i class="material-icons">close</i></span>
                                            </span>
                                          <?php
                                            $result=1;
                                          }
                                        }
                                        $i++;
                                        }
                                      }?> 
                                      <?php 
                                      if($result == 0){?>
                                              <span class="badge  badge-primary" title="Sarana Prasarana Tidak Digunakan, Dapat dipinjam"> 
                                              <i class="material-icons">check</i></span>
                                          <?php
                                      } ?>
                                      
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
      } 
      //////////
      else {
        tr[i].style.display = "none";
      }
    }
  }
  }

</script>

