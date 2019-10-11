<div class="main-content-container container-fluid">
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
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Jadwal</span>
                        <h3 class="page-title">Pemetaan Jadwal Kuliah</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('mahasiswa/filter_surat');?>"  method="get" style="float:right" >
                    <div hidden id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <option value="1" selected>Filter Berdasarkan</option>
                        <option value="">Hari</option>
                        <option value="">Ruangan</option>
                        <option value="">Jurusan</option>
                    </select>  
                    
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div><br>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 py-2">
                        <span class="text-uppercase page-subtitle text-dark" style="font-size:1em">
                       
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
					<div class="form-row">
					<input id="search_inp"   placeholder="Search"  type="text" class="custom-select custom-select-sm" style="max-width: 180px;">
                    <select name="kategori" id="kategori"   class="custom-select custom-select-sm" style="min-width: 100px;">
                        <option value="" selected>Filter By</option>
                        <option value="hari">Hari</option>
                        <option value="prodi">Program Studi</option>
                        <option value="ruang">Ruang</option>
                        <option value="dosen">Dosen</option>
                        <option value="matakuliah">Mata Kuliah</option>
                        <option value="status">Status</option>
                    </select>  
                    <select   name="id_fiter_by" id="singleSelectDD"  onchange="singleSelectChangeValue()" class="id_fiter_by custom-select custom-select-sm" style="min-width: 200px;">
                      <option value="" selected>Pilih </option>
                    </select>
                    </div> 
					</div>
                    <input hidden type="text" id="myInputs" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" >
                    
                </div>
				
                
                <!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks -->
               
                <!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks --><!-- End Small Stats Blocks -->
                  <!-- End Small Stats Blocks -->
                        
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto; ">
                          <table class="table table-bordered" id="pegawai" >
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
                                 foreach ($hari as $h){
                                 foreach ($ruangan as $r){?>
                                <tr>
                                    <th>
                                    <?php
                                    if($h->hari == 'Monday'){echo 'Senin';}
                                    else if($h->hari == 'Tuesday'){echo 'Selasa';}
                                    else if($h->hari == 'Wednesday'){echo 'Rabu';}
                                    else if($h->hari == 'Thursday'){echo 'Kamis';}
                                    else if($h->hari == 'Friday'){echo 'Jumat';}
                                    else if($h->hari == 'Saturday'){echo 'Saptu';}
                                    else if($h->hari == 'Sunday'){echo 'Minggu';}
                                    ?></th>
                                    <th><?php echo $r->ruangan?> </th>
                                    <?php foreach ($jam_kuliah as $jam){
                                      
                                    $ruang = $r->id_ruangan;
                                    $waktu =  $jam->id_jam_kuliah;
                                    $day =  $h->hari;
                                    $i=0;
                                    $result = 0;
                                    ?>
                                    <th style="max-width:120px;" class="py-2">
                                      <?php foreach ($jadwal_kuliah as $u){ 
                                        if($u->hari == $day){
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
                                                      <a href="<?php echo site_url('jadwal/editJadwalKuliah/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>"" type="button" class="btn btn-white" title="Edit">
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
                                        ?> <a href="<?php echo site_url('jadwal/tambahJadwalKuliah/'.$u->id_semester.'/'.$dt_ruang.'/'.$dt_waktu.'/'.$h->hari); ?>"  title="Tambah Jadwal">
                                              
                                              <i class="material-icons" style="font-size: 40px">add_circle</i>
                                            </a>
                                          <?php
                                      }
                                      ?> 
                                    </th>
                                    <?php } ?>
                                </tr>
                                <?php } } ?>
                           
                            
                                </tbody>
                          </table>
                        </div>
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
      document.getElementById("myInputs").value = selValue;
      ////////
      var input, filter, tbody, tr, th, i, txtValue;
      input = document.getElementById("singleSelectDD");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");
      
      var data = selValue.split(" ");
      //create a jquery object of the rows
      var col = $("#myTable").find(".col2");
      if (this.value == "") {
          col.show();
          return;
      }
      //hide all the rows
      col.hide();

      //Recusively filter the jquery object to get results.
      col.filter(function (i, v) {
          var $t = $(this);
          for (var d = 0; d < data.length; ++d) {
              if ($t.is(":contains('" + data[d] + "')")) {
                  return true;
              }
          }
          false;
      })
      .show();
      //
      var jo = $("#myTable").find("tr");
      if (this.value == "") {
          jo.show();
          return;
      }
      //hide all the rows
      jo.hide();

      //Recusively filter the jquery object to get results.
      jo.filter(function (i, v) {
          var $t = $(this);
          for (var d = 0; d < data.length; ++d) {
              if ($t.is(":contains('" + data[d] + "')")) {
                  return true;
              }
          }
          false;
      })
      .show();
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
      }
      
      else if(id == 'ruang'){

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