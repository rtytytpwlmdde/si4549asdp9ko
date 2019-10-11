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
                    <h6 class="m-0">Grafik Peminjaman</h6>
                  </div>
                  <div class="card-body pt-0">
                  <div class="row border-bottom py-2 bg-light">
                      <div class="col-sm-3 text-center text-sm-left mb-0">
                        <div id="" class=" input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <p class="text-center">Periode - <?php foreach($periode as $per){ echo $per['periode']; }?></p>
                        </div>
                      </div>
                      <div class="col  text-center text-sm-right mb-0">
                      <form  method="post" action="<?php echo site_url('admin/indeks');?>" style="float:right" >
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
                            foreach($tot_peminjaman_by_year as $u){
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
                            foreach($tot_peminjaman_by_year as $u){ 
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
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex ">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase text-success py-2"><a href="rekap_peminjam" class="card-post__category badge badge-success">Mahasiswa Peminjam Terbanyak<i class="material-icons">trending_up</i></a></span>
                        <div class="table-responsive table-striped py-2">
                          <table class="table mb-0 table-responsive  text-left">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col" class="border-0">No</th>
                                  <th scope="col" class="border-0">Nama</th>
                                  <th scope="col" class="border-0">Jumlah</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($mahasiswaP as $u){ ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><span class=""><?php echo $u['nama'] ?></span></td>
                                        <td><?php echo $u['jumSurat'] ?></td>
                                    </tr>
                                        
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
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
                        <span class="stats-small__label text-uppercase text-primary py-2"> <a href="rekap_peminjam_pegawai" class="card-post__category badge badge-info">Dosen/Staff Peminjam Terbanyak<i class="material-icons">trending_up</i></a></span>
                        <div class="table-responsive table-striped py-2">
                        <table class="table mb-0 responsive-table text-left">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">No</th>
                          <th scope="col" class="border-0">Nama</th>
                          <th scope="col" class="border-0">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no = 1;
                            foreach($pegawai as $u){ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><span class=""><?php echo $u['Nama'] ?></span></td>
                                <td><?php echo $u['jumSurat'] ?></td>
                            </tr>
                                
                        <?php } ?>
                      </tbody>
                    </table>
                            </div>
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
                        <span class="stats-small__label text-uppercase text-primary py-2"> <a href="rekap_peminjaman_barang" class="card-post__category badge badge-info">Barang Peminjam Terbanyak<i class="material-icons">trending_up</i></a></span>
                        <div class="table-responsive table-striped py-2">
                        <table class="table mb-0 responsive-table text-left ">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">No</th>
                          <th scope="col" class="border-0">Nama</th>
                          <th scope="col" class="border-0">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no = 1;
                            foreach($barangP as $u){ ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><span class=""><?php echo $u['nama_barang'] ?></span></td>
                                <td><?php echo $u['jumSurat'] ?></td>
                            </tr>
                                
                        <?php } ?>
                      </tbody>
                    </table>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Rutin</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_rutin as $a){ echo $a['count_peminjaman_rutin']; }?></h6>
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
                        <span class="stats-small__label text-uppercase">Peminjaman Non Rutin</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_non_rutin as $a){ echo $a['count_peminjaman_non_rutin']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Peminjaman Barang</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($peminjaman_barang as $a){ echo $a['count_peminjaman_barang']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            
          <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Ruangan Rutin</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($rutin as $a){ echo $a['count_rutin']; }?></h6>
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
                        <span class="stats-small__label text-uppercase">Ruangan Non Rutin</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($non_rutin as $a){ echo $a['count_non_rutin']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Sarana Prasarana</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($barang as $a){ echo $a['count_barang']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         
            </div>
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small ">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">User</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($user as $a){ echo $a['count_user']; }?></h6>
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
                        <span class="stats-small__label text-uppercase">Dosen</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($dosen as $a){ echo $a['count_dosen']; }?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Mahasiswa</span>
                        <h6 class="stats-small__value count my-3"><?php foreach($mahasiswa as $a){ echo $a['count_mahasiswa']; }?></h6>
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
                        foreach($tot_peminjaman_by_year as $u){ 
                            $dt = DateTime::createFromFormat('!m', $u['bulan']);
                            echo "'".$dt->format('M')."',";
                    } ?>],
			series: [
				[<?php 
                    foreach($tot_peminjaman_by_year as $u){ 
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


           

 