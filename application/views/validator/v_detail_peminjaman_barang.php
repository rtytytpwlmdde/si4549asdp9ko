 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid ">
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
    
            <!-- End Page Header -->
            <!-- Default Light Table -->
    <div class="row">
    <div class="col ">
        <div class="bg-white ">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0 py-1">Detail Peminjaman Barang</h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <div hidden class="btn-group " >
                    <a href="<?php echo base_url('validator/peminjaman_non_rutin_filter/terkirim'); ?>" class="btn btn-warning text-white"> Terikirim </a>
                    <a href="<?php echo base_url('validator/peminjaman_non_rutin_filter/setuju'); ?>" class="btn btn-success text-white">Setuju </a>
                    <a href="<?php echo base_url('validator/peminjaman_non_rutin_filter/tolak'); ?>" class="btn btn-danger text-white">Tolak </a>
                </div>
            </div>
            </div>
        </div>
        <div class="">
        
        </div>
        <div class=" pt-0 py-1">
        
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; min-width:100%;">
                <table class="table table-bordered table-hover  " id="pegawai">
                    <tbody>
                    <?php foreach ($peminjaman_barang as $pnr){?>
                    <tr>
                        <td>Kode Booking </td>
                        <td><?php echo $pnr->id_peminjaman_barang ?></td>
                    </tr>
                    <tr>
                        <td>NIP/NIK/NIM</td>
                        <td><?php echo $pnr->id_peminjam ?></td>
                    </tr>
                    <tr>
                        <td>Nama Peminjam</td>
                        <td>
                            <?php foreach ($mahasiswa as $a){if ($a->nim == $pnr->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $pnr->id_peminjam) :echo $a->Nama;endif;}  ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Penyelenggara</td>
                        <td><?php foreach ($penyelenggara as $a){if ($a->id_penyelenggara == $pnr->penyelenggara) :echo $a->penyelenggara;endif;}  ?></td>
                    </tr>
                    <tr>
                        <td>Agenda</td>
                        <td><?php echo $pnr->nama_agenda ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penggunaan</td>
                        <td><?php echo date("d-m-Y", strtotime($pnr->tanggal_pemakaian));?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Peminjaman</td>
                        <td><?php echo date("d-m-Y", strtotime($pnr->tanggal_peminjaman));?></td>
                    </tr>
                    <tr>
                        <td>Jam Peminjaman</td>
                        <td> <?php
                        if (strlen($pnr->jam_mulai) == 1){
                                    echo "0".$pnr->jam_mulai.":00"; 
                                }else{
                                    echo $pnr->jam_mulai.":00"; 
                                }
                                
                                ?> - 
                                <?php
                                if (strlen($pnr->jam_selesai) == 1){
                                    echo "0".$pnr->jam_selesai.":00"; 
                                }else{
                                    echo $pnr->jam_selesai.":00"; 
                                } 
                                    ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan</td>
                        <td> <?php foreach ($sarpras as $a){ echo $a->nama_barang ?> <br><?php }  ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><?php echo $pnr->keterangan ?></td>
                    </tr>
                    <tr>
                            <td>No Telephone</td>
                            <td><?php foreach ($mahasiswaTelp as $a){if ($a->nim == $pnr->id_peminjam) :echo $a->telpon;endif;}  ?>
                            <?php foreach ($pegawaiTelp as $a){if ($a->NIP == $pnr->id_peminjam) :echo $a->No_Telp;endif;}  ?>
                            </td>
                    </tr>
                    <tr>
                        <td>Status Peminjaman</td>
                        <td><?php echo $pnr->status ?></td>
                    </tr>
                    <tr>
                        <td>Status Pengembalian</td>
                        <td><?php echo $pnr->status_pengembalian ?></td>
                    </tr>
                    <?php 
                    if($pnr->status == 'tolak'){?>
                    <tr>
                        <td>Catatan Penlolakan</td>
                            <?php foreach ($peminjaman as $br){ ?>
                            <td><?php echo $br->catatan_penolakan ?></td> <?php }?>
                    </tr>
                    <?php } ?>
                    <?php 
                    if($pnr->status_pengembalian == 'ya'){?>
                    <tr>
                        <td>Orang yang mengembalikan</td>
                        <td>
                        <?php foreach ($mahasiswa as $a){if ($a->nim == $pnr->id_pengembali) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $pnr->id_pengembali) :echo $a->Nama;endif;}  ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengembalian</td>
                        <td><?php echo date("d-m-Y", strtotime($pnr->tanggal_pengembalian));?></td>
                    </tr>
                    <tr>
                        <td>Catatan Pengembalian</td>
                        <td><?php echo $pnr->catatan_pengembalian;?></td>
                    </tr>
                    <?php } ?>
                            
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



 
          <script type="text/javascript">


var table = $('#pegawai').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        paging: true,
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

function deletechecked()
    {
        if(confirm("Serius ingin menghapus data ini ?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
</script>

 



