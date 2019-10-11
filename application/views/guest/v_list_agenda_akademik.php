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
        <i class="fa fa-span mx-2"></i>
        <strong>'.$notif.'</strong> 
        </div>
        ';
    }
?>
   
    <!-- Page Header -->
    <div class="page-header row   py-1">
            <div class="col-sm-3 text-center text-sm-left mb-0">
            <h3 class="page-title"> AGENDA AKADEMIK</h3>
            </div>
            <div class="col  text-center text-sm-right mb-0 "> 
             <input id="search_inp"   placeholder="Search"  type="text" class="custom-select custom-select-sm" style="max-width: 180px;">
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
                          <table class="table mb-0 " id="pegawai" >
                          <thead hidden>
                          <td>asd</td>
                          <td>asd</td>
                          </thead>
                            <tbody>
                    <?php foreach($agenda as $u){ ?>
                                <tr>
                                    <td class="text-center">
                                    <div class='vl' >
                                    <div class="text-center text-sm-center mb-4 mb-sm-0" style="border-left: 6px solid #4ba9e7; height: 70px; padding-left:20px;">
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
										<info>Penguji : <?php echo $u->keterangan ?> </info>
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
    
    
    $('.dataTables_paginate').addClass('btn rounded text-white text-center p-1');
    $('#search_inp').keyup(function(){
    table.search($(this).val()).draw() ;
    })
    $('#data_length').on('change', function(){
    table.page.len( $(this).val() ).draw();
    
});
</script>


