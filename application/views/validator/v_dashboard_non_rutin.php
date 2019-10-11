<div class="main-content-container container-fluid px-4" id="wrapper">
            <!-- Page Header -->
            
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Siruas Overview</h3>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Grafik Peminjaman Non Kelas</h6>
                  </div>
                  <div class="card-body pt-0">
                  <div class="row border-bottom py-2 bg-light">
                      <div class="col-sm-3 text-center text-sm-left mb-0">
                        <div id="" class=" input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <p class="text-center">Periode - <?php foreach($periode as $per){ echo $per['periode']; }?></p>
                        </div>
                      </div>
                      <div class="col  text-center text-sm-right mb-0">
                      <form  method="post" action="<?php echo site_url('validator/indeks');?>" style="float:right" >
                        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                        
                            <select name="tahun" class="custom-select custom-select-sm" style="max-width: 130px;" title="Tampilkan Grafik Berdasarkan tahun">
                                <option value="">Pilih Tahun..</option>
                                <?php
                                $mulai= date('Y') ;
                                for($i = $mulai;$i>$mulai - 30;$i--){
                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                                ?>
                            </select>              
                            <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                        </form>
                      </div>
                    </div><br>
                              
				            <div id="smultiple-chart" height="130" style="max-width: 100% !important;" class="ct-chart"></div>
                    <?php 
                            $no = 1;
                            foreach($tot_peminjaman_non_rutin_by_year as $u){
                              if($u['count_peminjaman_by_month'] == 0){
                                
                                echo '<div id="multiple-chart" height="130" style="max-width: 200px !important;" class="ct-chart">
                                      <span class="stats-small__label text-uppercase">Tidak ada surat </span>
                                      </div>';
                              } else{
                                echo '<div id="multiple-chart" height="130" style="max-width: 100% !important;" class="ct-chart"></div>';
                              }
                              ?>  
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Statistik Peminjaman [ <?php foreach($periode as $per){ echo $per['periode']; }?> ]</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <div height="220" class="card-body p-0 ">
                    <ul class="list-group list-group-small list-group-flush">
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Bulan</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">Jumlah </span>
                      </li>
                            <?php 
                            $no = 1;
                            foreach($tot_peminjaman_non_rutin_by_year as $u){ 
                            $dt = DateTime::createFromFormat('!m', $u['bulan']);
                            ?>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue"><?php echo $dt->format('M');?></span>
                            <span class="ml-auto text-right text-semibold text-reagent-gray"><?php echo $u['count_peminjaman_by_month'] ?></span>
                        </li>
                                        
                            <?php } ?>
                    </ul>
                  </div>
                  </div>
                  
                </div>
              </div>
            </div><br>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Non Kelas</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_non_rutin as $a){ echo $a['count_peminjaman_non_rutin']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Non Kelas Setuju</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_non_rutin_setuju as $a){ echo $a['count_peminjaman_non_rutin_setuju']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Non Kelas Tolak</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_non_rutin_tolak as $a){ echo $a['count_peminjaman_non_rutin_tolak']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Non Kelas Terkirim</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_non_rutin_terkirim as $a){ echo $a['count_peminjaman_non_rutin_terkirim']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            
         
          <script>

$(function() {
  var options;



  // multiple chart
  var data = {
			labels: [<?php 
                        $no = 1;
                        foreach($tot_peminjaman_non_rutin_by_year as $u){ 
                            $dt = DateTime::createFromFormat('!m', $u['bulan']);
                            echo "'".$dt->format('M')."',";
                    } ?>],
			series: [
				[<?php 
                    foreach($tot_peminjaman_non_rutin_by_year as $u){ 
                        echo $u["count_peminjaman_by_month"].",";
                } ?>],
			],
		};

  var options = {
    fullWidth: true,
    lineSmooth: false,
    height: "270px",
    low: 0,
    high: 'auto',
    series: {
      'series-projection': {
        showArea: true,
        showPoint: false,
        showLine: false
      },
    },
    axisX: {
      showGrid: false,

    },
    axisY: {
      showGrid: true,
      onlyInteger: true,
      offset: 0,
    },
    chartPadding: {
      left: 30,
      right: 30
    }
  };

  new Chartist.Line('#multiple-chart', data, options);

});
</script>


           

 