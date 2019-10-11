 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
 <!-- alert -->
 <?php
    $notif = $this->session->flashdata('notif');
    if($notif != NULL){
        echo '
        <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
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
                      <span class="text-uppercase page-subtitle">Peminjaman</span>
                      <h3 class="page-title">Ruangan Rutin</h3>
                  </div>
                  <div class="col-12 col-sm-6 text-right text-sm-right mb-4 mb-sm-0">
                          <a href="ecommerce.html" hidden class="btn btn-white active"> Tambah </a>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="h-100">
                      <div class="border-bottom ">
                        <h6 class="m-0">Daftar Riwayat Peminjaman</h6>
                        <div class="block-handle"></div>
                      </div>
                      <div class="pt-0  py-2">
                          <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <div class="row py-2 ">
                          <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                            <div class="btn-group btn-group-sm btn-group-toggle d-flex my-auto mx-auto mx-sm-0" >
                                  <input class="input-sm form-control" type="text" placeholder="Cari disini" style="min-width: 300px;">
                                  <a href="index.html" class="btn btn-white" hidden> Pending </a>
                                  <a href="ecommerce.html" class="btn btn-white active" hidden> Sales </a>
                            </div>
                          </div>
                          
                          <div class="col-12 col-sm-6">
                            <div id="sessions-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                              <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="analytics-overview-sessions-date-range-1">
                              <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="analytics-overview-sessions-date-range-2">
                              <span class="input-group-append">
                                <span class="input-group-text">
                                  <i class="material-icons">search</i>
                                </span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto;">
                          <table class="table mb-0 table-bordered"  >
                            <thead class="bg-light">
                              <tr>
                                <th>No</th>
                                <th>KODE PEMINJAMAN</th>
                                <th>TANGGAL PEMINJAMAN</th>
                                <th>Jenis</th>
                                <th>STATUS</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td><a data-toggle="modal" data-target="#modal_peminjaman" class="nav-item text-primary btn" title="Tampilkan detail peminjaman"> FEB1</a></td>
                                <td>12-03-2018</td>
                                <td class="text-primary">Ruang Rutin</td>
                                <td class="text-warning">pending</td>
                                <td >
                                    <div class="btn-group btn-group-sm" >
                                      <a type="button" class="btn btn-white" title="Edit Peminjaman" href="<?php echo base_url('mahasiswa/edit_peminjaman'); ?>">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <a type="button" class="btn btn-white" title="Hapus Peminjaman" data-toggle="modal" data-target="#modal_hapus_peminjaman">
                                        <i class="material-icons">delete</i>
                                      </a>
                                    </div>
                              </td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td><a data-toggle="modal" data-target="#modal_peminjaman" class="nav-item text-primary btn" title="Tampilkan detail peminjaman"> FEB1</a></td>
                                <td>12-03-2018</td>
                                <td class="text-primary">Ruang Rutin</td>
                                <td class="text-primary">Terkirim</td>
                                <td >
                                    <div class="btn-group btn-group-sm" >
                                      <a type="button" class="btn btn-white" title="Cancel Peminjaman" href="<?php echo base_url('mahasiswa/edit_peminjaman'); ?>">
                                        <i class="material-icons">cancel</i>
                                      </a>
                                    </div>
                              </td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td><a data-toggle="modal" data-target="#modal_peminjaman" class="nav-item text-primary btn" title="Tampilkan detail peminjaman"> FEB2</a></td>
                                <td>12-03-2018</td>
                                <td class="text-info">Ruang Non Rutin</td>
                                <td class="text-danger">Tolak</td>
                                <td style="max-width: 20px;">
                                      <div class="btn-group btn-group-sm" >
                                        <a type="button" class="btn btn-white" title="Edit Peminjaman">
                                          <i class="material-icons">edit</i>
                                        </a>
                                        <a type="button" class="btn btn-white" title="Hapus Peminjaman" data-toggle="modal" data-target="#modal_hapus_peminjaman">
                                          <i class="material-icons">delete</i>
                                        </a>
                                      </div>
                                </td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td><a data-toggle="modal" data-target="#modal_peminjaman" class="nav-item text-primary btn" title="Tampilkan detail peminjaman"> FEB3</a></td>
                                <td>12-03-2018</td>
                                <td class="text-dark">Sarana Prasarana</td>
                                <td class="text-success">Complete</td>
                                <td style="max-width: 20px;">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>


                <div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_peminjaman">
      <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
        <div class="modal-content" style="min-width:80%; " >
            <div class="modal-header">
                
            <h5 class="modal-title" id="exampleModalLongTitle">Detail Peminjaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" >
                  <div class="row">
                  <div class="col-lg-5 ">
                  <table class="table table-sm borderless " style="text-align:left;">
                      <tbody class="">
                          <tr>
                              <td class="">Kode Peminjaman</td>
                              <td class="">: FEB1</td>
                          </tr>
                          <tr>
                              <td class="">Tanggal Peminjaman</td>
                              <td class="">: 12-03-2018</td>
                          </tr>
                      </tbody>
                  </table>
                  </div>
                  <div class="col-lg-2 " ></div>
                  <div class="col-lg-5 ml-auto ">
                  <table class="table table-sm borderless " style="text-align:left;">
                      <tbody class="">
                          <tr>
                              <td class="">Nama Peminjam</td>
                              <td class="">: Sueddi Sihotang </td>
                          </tr>
                          <tr>
                              <td class="">NIM </td>
                              <td class="">: 155150201111309 </td>
                          </tr>
                        
                      </tbody>
                  </table>
                  </div>
                  </div>
                  <div class="card-body p-0 ">
                  <table class="table table-sm  " >
                      <thead style="text-align:center;">
                          <tr>
                          <th>No</th>
                          <th>Ruangan</th>
                          <th>Hari</th>
                          <th>Jam</th>
                          </tr>
                      </thead>
                      <tbody style="text-align:center;">
                      <tr>
                          <td>1</td>
                          <td>D12</td>
                          <td>Senin</td>
                          <td>07:00 - 09:30</td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>E12</td>
                          <td>Senin</td>
                          <td>07:00 - 09:30</td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>E13</td>
                          <td>Senin</td>
                          <td>07:00 - 09:30</td>
                      </tr>
                      <tr>
                          <td>4</td>
                          <td>E14</td>
                          <td>Senin</td>
                          <td>07:00 - 09:30</td>
                      </tr>
                      </tbody>
                      
                  </table>
                  </div>
              </div>
            
            
            <div class="modal-footer">
            <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
            <a type="button" class="btn btn-sm btn-primary" href=""><i class="fa fa-print"></i> Print</a>
          </div>
        </div>
      </div>
    </div>

  <div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_hapus_peminjaman">
  <div class="modal-dialog  modal-dialog-centered "   >
      <div class="modal-content" >
          <div class="modal-body" >
              <div class="row " >
          <h5 class="modal-title " style="max-height:200px; " >Hapus Peminjaman FEB1?</h5>
          </div></br>
          <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
          <a type="button" class="btn btn-sm btn-primary" href=""><i class="fa fa-trash"></i> Hapus</a>
      </div>
      </div>
  </div>
  </div>