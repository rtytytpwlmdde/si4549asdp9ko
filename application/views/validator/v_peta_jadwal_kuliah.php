<div class="color-switcher animated">
      <h5 class="py-2">Accent Color</h5>
      <?php 
        $j=0;
        foreach ($prodi as $u){ $j++;?>
        <div class=" ">
          <a <?php if($u->id_prodi == '1'){?>
            class="card-post__category text-white badge badge-pill col2 col-orange text-center p-1"
          <?php }else if($u->id_prodi == '2'){?>
            class="card-post__category text-white badge badge-pill col2 col-kuning text-center p-1"
          <?php }else if($u->id_prodi == '3'){?>
            class="card-post__category text-white badge badge-pill col2 col-pink text-center p-1"
          <?php }else if($u->id_prodi == '4'){?>
            class="card-post__category text-white badge badge-pill col2 col-hijau text-center p-1"
          <?php }else if($u->id_prodi == '5'){?>
            class="card-post__category text-white badge badge-pill col2 col-ungu text-center p-1"
          <?php }else if($u->id_prodi == '6'){?>
            class="card-post__category text-white badge badge-pill col2 col-ungutua text-center p-1"
          <?php }else if($u->id_prodi == '7'){?>
            class="card-post__category text-white badge badge-pill col2 col-birumuda text-center p-1"
          <?php }else if($u->id_prodi == '8'){?>
            class="card-post__category text-white badge badge-pill col2 col-merah text-center p-1"
          <?php }else if($u->id_prodi == '9'){?>
            class="card-post__category text-white badge badge-pill col2 col-biru text-center p-1"
            <?php }else if($u->id_prodi == '10'){?>
            class="card-post__category text-white badge badge-pill col2 col-hijautua text-center p-1"
          <?php }else {?>
            class="card-post__category text-white badge badge-pill col2 col-merahhitam text-center p-1"
          <?php }?>
          ><?php echo $u->prodi; ?></a>
        </div>
        <?php } ?>
      <div class="close">
        <i class="material-icons">close</i>
      </div>
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">announcement</i>
    </div>
<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters ">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 py-2">
                        <h3 class="page-title">Jadwal Perkuliahan</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    
                    </div><br>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 ">
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
                            else if($hari == 'Saturday'){echo 'Saptu, '.$tgl;}
                            else if($hari == 'Sunday'){echo 'Minggu, '.$tgl;}
                          ?>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('validator/filter_jadwal_plot');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
					<input id="search_inp" class="input-sm form-control"  placeholder="Search"  type="text">
                
					
                    <select name="kategori" id="kategori"   class="custom-select custom-select-sm" style="min-width: 100px;">
                        <option value="" selected>Filter By</option>
                        <option value="prodi">Program Studi</option>
                        <option value="ruang">Ruang</option>
                        <option value="dosen">Dosen</option>
                        <option value="matakuliah">Mata Kuliah</option>
                        <option value="status">Status</option>
                    </select>  
                    <select   name="id_fiter_by" id="singleSelectDD"  onchange="singleSelectChangeValue()" class="id_fiter_by custom-select custom-select-sm" style="min-width: 200px;">
                      <option value="" selected>Pilih </option>
                    </select>
                      <input  name="date" type="date" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                       
                    </div>
                    </form>
                    </div>
                        <input hidden type="text" id="myInputs" onkeyup="myFunction()" >
                </div>
                
                  <!-- End Page Header -->
                  <!-- Small Stats Blocks -->
                 
                  
                  <!-- End Small Stats Blocks -->
                  <div class="row">
                    <div class="col">
                      <div class=" bg-white py-2  mb-4">
                        <div class="jadwal_kuliah p-0 pb-3 text-center" >
                        <div class="table-responsive table-bordered  table-hover">
                        <table class="" style="overflow-x:auto; width: 100%; padding:0; margin:0;" id="pegawai">
                            <thead class="bg-light">
                                <tr>
                                        <th>R/J</th>
                                        <?php foreach ($jam_kuliah as $jam){?>
                                        <th class="p-2"><?php echo $jam->jam_kuliah?></th>
                                        <?php }?>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php 
                                  if($status_jadwal == 'ada'){
                                    foreach ($ruangan as $r){?>

                                      <tr class="">
                                          <th class="col1" style="width:120px; height:110px;" ><?php echo $r->ruangan?></th>
                                          <?php foreach ($jam_kuliah as $jam){?>
                                          <th  
                                          <?php 
                                          $ruang = $r->id_ruangan;
                                          $waktu =  $jam->id_jam_kuliah;
                                          foreach ($jadwal_kuliah as $u){
                                            if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                            style=""
                                              <?php if($u->id_prodi == '1'){?>
                                                class="col2 col-orange text-center p-3"
                                              <?php }else if($u->id_prodi == '2'){?>
                                                class="col2 col-kuning text-center p-3"
                                              <?php }else if($u->id_prodi == '3'){?>
                                                class="col2 col-pink text-center p-3"
                                              <?php }else if($u->id_prodi == '4'){?>
                                                class="col2 col-hijau text-center p-3"
                                              <?php }else if($u->id_prodi == '5'){?>
                                                class="col2 col-ungu text-center p-3"
                                              <?php }else if($u->id_prodi == '6'){?>
                                                class="col2 col-ungutua text-center p-3"
                                              <?php }else if($u->id_prodi == '7'){?>
                                                class="col2 col-birumuda text-center p-3"
                                              <?php }else if($u->id_prodi == '8'){?>
                                                class="col2 col-merah text-center p-3"
                                              <?php }else if($u->id_prodi == '9'){?>
                                                class="col2 col-biru text-center p-3"
                                                <?php }else if($u->id_prodi == '10'){?>
                                                class="col2 col-hijautua text-center p-3"
                                              <?php }else {?>
                                                class="col2 col-merahhitam text-center p-3"
                                              <?php }?>>
                                              <div class="kolom">
                                                <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :?></div>
                                                  <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                <?php endif;}  ?>
                                                <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                </div>
                                                <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                                <h6 class="text-white" style="font-size:12px;">
                                                <?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?><br>
                                                <?php echo "Kelas - ".$u->kelas;?></h6>
                                                
                                              </div>
                                            <?php }else{
      
                                            }
                                          }
                                          foreach ($peminjaman_rutin as $u){
                                              if($u->id_ruangan == $ruang && $u->id_jam_kuliah == $waktu){?>
                                              style=""
                                              <?php if($u->id_prodi == '1'){?>
                                                class="col2 col-orange text-center p-3"
                                              <?php }else if($u->id_prodi == '2'){?>
                                                class="col2 col-kuning text-center p-3"
                                              <?php }else if($u->id_prodi == '3'){?>
                                                class="col2 col-pink text-center p-3"
                                              <?php }else if($u->id_prodi == '4'){?>
                                                class="col2 col-hijau text-center p-3"
                                              <?php }else if($u->id_prodi == '5'){?>
                                                class="col2 col-ungu text-center p-3"
                                              <?php }else if($u->id_prodi == '6'){?>
                                                class="col2 col-ungutua text-center p-3"
                                              <?php }else if($u->id_prodi == '7'){?>
                                                class="col2 col-birumuda text-center p-3"
                                              <?php }else if($u->id_prodi == '8'){?>
                                                class="col2 col-merah text-center p-3"
                                              <?php }else if($u->id_prodi == '9'){?>
                                                class="col2 col-biru text-center p-3"
                                                <?php }else if($u->id_prodi == '10'){?>
                                                class="col2 col-hijautua text-center p-3"
                                              <?php }else {?>
                                                class="col2 col-merahhitam text-center p-3"
                                              <?php }?> >
                                              <div class="kolom">
                                                 <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :?></div>
                                                    <div style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;"><?php echo "matkul".$u->kode_matkul."matkul";  ?></div>
                                                  <?php endif;}  ?>
                                                  <div  style="color: rgba(0, 0, 0, 0.02); font-size: 0.015pt;" class=""><?php echo "prodi".$u->id_prodi."prodi";  ?> 
                                                  <?php echo "ruang".$u->id_ruangan."ruang";  ?>  <?php echo "dosen".$u->id_dosen."dosen";  ?>                      
                                                  </div>
                                                  <div class=""><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></div>
                                                  <h6 class="text-white" style="font-size:12px;">
                                                  <?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?><br>
                                                  <?php echo "Kelas - ".$u->kelas;?></h6>
                                                  <?php 
                                                    $status_ruang = $u->status;
                                                    if ($status_ruang == "setuju") { ?> <span class="badge badge-pill badge-light text-danger">Pengganti</span>  <?php }else{
                                                    echo "";}?>                    
                                                    </div>
                                              <?php }else{
      
                                              }
                                            } ?>
                                            </th>
                                          <?php } ?>
                                      </tr>
                                      <?php }
                                  }else{ ?>
                                  <tr>
                                    <td>Tidak ada Jadwal</td>
                                  </tr>
                                  <?php }?>
                                 
                            </tbody>
                            
                        </table>

                        </div>
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
      var col = $("#myTable").find(".kolom");
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

        else if(id == 'status'){
              var html = '';
              var i;
                  html += '<option value="Pengganti">Pengganti</option>';
                  html += '<option value="">Semua Jadwal</option>';
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