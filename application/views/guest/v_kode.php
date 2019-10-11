 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
 <!-- alert -->
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
    <div class="page-header row no-gutters py-2">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <h3 class="page-title">History Peminjaman</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
        <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
          
        </div>
      </div>
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div hidden id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
     
        </div>
        </div>
        </div>
    </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
    <div class="row">
    <div class="col ">
        <div class="bg-white py-2 ">
        
        <div class=" pt-0">
            
        
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; min-width:100%;">
                <table class="table table-bordered table-hover " id="pegawai" >
                    <thead role="row" class=" bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="">No</th>
                        <th scope="col" class="">Kode Booking </th>
                        <th scope="col" class="">ID Peminjam</th>
                        <th scope="col" class="">Nama Peminjam</th>
                        <th scope="col" class="">Tanggal Peminjaman</th>
                        <th scope="col" class="">Jenis</th>
                        <th scope="col" class="">Catatan</th>
                        <th scope="col" class="">Status</th>
						<th scope="col" class="">Nama Validator</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($peminjaman as $u){ 
                        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><a href="<?php echo base_url(). 'guest/detail_peminjaman/'.$u->id_peminjaman.'/'.$u->jenis_peminjaman; ?>"><?php echo $u->id_peminjaman ?></a></td>
                        <td><?php echo $u->id_peminjam ?></td>
                        <td>
                            <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
                        </td>
                        <td><?php echo date("d-m-Y", strtotime($u->tanggal_peminjaman));?></td>
                        <td> <span 
                                <?php if($u->jenis_peminjaman == 'rutin'){ ?>
                                    class="text-primary"
                                <?php }else if($u->jenis_peminjaman == 'non rutin'){ ?>
                                    class="text-dark"
                                <?php }else if($u->jenis_peminjaman == 'khusus'){ ?>
                                    class="text-warning"
                                <?php } else{ ?>
                                    class="text-muted"
                                <?php } ?>
                            ><?php echo $u->jenis_peminjaman ?></span>
                        </td>
                        <td><?php echo $u->catatan_penolakan ?></td>
                        <td>
                            <span 
                                <?php if($u->status_peminjaman == 'terkirim'){ ?>
                                    class="text-warning"
                                <?php }else if($u->status_peminjaman == 'tolak'){ ?>
                                    class="text-danger"
                                <?php }else if($u->status_peminjaman == 'setuju'){ ?>
                                    class="text-success"
                                <?php } else{ ?>
                                    class="text-secondary"
                                <?php } ?>
                            ><?php echo $u->status_peminjaman ?></span>
                        </td>
						<td> 
                            <?php if ($u->jenis_peminjaman == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($u->id_peminjaman == $pr['id_peminjaman_rutin']){ 
                                    echo $pr['nip_validator'];
                                    }
                                }
                                }else if($u ->jenis_peminjaman == 'non rutin' ){ 
                                    foreach ($peminjaman_non_rutin as $cr7){ 
                                        if($u->id_peminjaman== $cr7['id_peminjaman_non_rutin']){ 
                                            echo $cr7['nip_validator']; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($peminjaman_barang as $cs){ 
                                        if($u->id_peminjaman == $cs['id_peminjaman_barang']){ 
                                            echo $cs['nip_validator']; ?> <br><?php
                                        }
                                    }
                                } ?>
                        </td>
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
        <!-- End Default Dark Table -->
    </div>
</div>

