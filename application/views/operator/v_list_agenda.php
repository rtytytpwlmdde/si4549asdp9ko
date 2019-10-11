<style>
 
 </style>
 
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
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Agenda Kegiatan</span>
            <h3 class="page-title"> Semua Kegiatan</h3>
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <form action="<?php echo site_url('operator/filter_surat');?>"  method="get" style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
        <td><select  name="bln1" class="custom-select custom-select-sm" style="max-width: 130px;">
                <option value="1" selected>Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">november</option>
                <option value="12">Desember</option>
            </select></td>
			<select name="bln2" class="custom-select custom-select-sm" style="max-width: 130px;">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">november</option>
                <option value="12" selected>Desember</option>
            </select></td>
            <select name="tahun" class="custom-select custom-select-sm" style="max-width: 130px;">
                <?php
                $mulai= date('Y') ;
                for($i = $mulai;$i>$mulai - 50;$i--){
                $sel = $i == date('Y') ? ' selected="selected"' : '';
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
    </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
        <div style="min-width: 600px">
            <div class="row">
                <div class="col ">
                    <div class="bg-white ">
                        
                        <div class="pt-0">
                        <div class=" p-0 pb-3" style="overflow-x:auto;">
                          <table class="table mb-0 "  >
                            <tbody>
                    <?php foreach($agenda as $u){ ?>
                                <tr>
                                    <td class="text-center">
                                    <div class='vl' >
                                    <div class="text-center text-sm-center mb-4 mb-sm-0" style="border-left: 6px solid #4ba9e7; height: 70px;">
                                        <h3 class="page-title font-weight-bold text-primary"><?php $date = date_create($u->tanggal_pemakaian); echo date_format($date, "d") ; ?></h3>
                                        <span class="text-uppercase page-subtitle text-primary"><?php $date = date_create($u->tanggal_pemakaian); echo date_format($date, "F") ; ?></span>
                                    </div>
                                    </div>
                                    </td>
                                    <td class="">
                                    <div class="">
                                        <info style="font-size:27px; color:#5a8eef;"><?php echo $u->nama_agenda ?></info><br>
                                        <info>
                                        <?php 
                                        if (strlen($u->jam_mulai_peminjaman) == 1){
                                            echo "0".$u->jam_mulai_peminjaman.":00"; 
                                        }else{
                                            echo $u->jam_mulai_peminjaman.":00"; 
                                        }
                                        
                                        ?> - 
                                        <?php 
                                        if (strlen($u->jam_selesai_peminjaman) == 1){
                                            echo "0".$u->jam_selesai_peminjaman.":00"; 
                                        }else{
                                            echo $u->jam_selesai_peminjaman.":00"; 
                                        }
                                        
                                        ?>
                                        </info><i class="tiny material-icons text-primary">fiber_manual_record</i>
                                        <info><?php echo ($u->jam_selesai_peminjaman - $u->jam_mulai_peminjaman)?>h </info><i class="tiny material-icons text-primary">fiber_manual_record</i>
                                        <info>Lokasi : <?php 
                                            foreach ($ruangan_agenda as $ra){
                                                if($ra->id_peminjaman_non_rutin == $u->id_peminjaman_non_rutin){
                                                    foreach ($ruangan as $a){
                                                    if ($ra->id_ruangan == $a->id_ruangan) :
                                                        echo $a->ruangan. ", "; endif;
                                                    }
                                                }
                                            } ?>  
                                            </info><i class="tiny material-icons text-primary">fiber_manual_record</i>
                                        <info>Penyelenggara :<?php foreach ($penyelenggara as $a){if ($a->id_penyelenggara == $u->penyelenggara) :echo $a->penyelenggara;endif;}  ?></info><br>
										<info>Keterangan : <?php echo $u->keterangan?> </info>
                                    </div>
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
            </div>

          <script type="text/javascript">


</script>


