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
                <h6 class="m-0 py-1">Detail Peminjaman Kelas</h6>
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
                <?php 
                    $no = 1;
                    foreach ($peminjaman_rutin as $u){ 
                    ?>
                <tr>
                    <td>ID Peminjaman</td>
                    <td><?php echo $u->id_peminjaman_rutin ?></td>
                </tr>
                <tr>
                    <td>ID Peminjaman</td>
                    <td><?php echo $u->id_peminjam ?></td>
                </tr>
                <tr>
                    <td>Tanggal Penggunaan</td>
                    <td><?php echo $u->tanggal_pemakaian ?></td>
                </tr>
                <tr>
                    <td>Jam Kuliah</td>
                    <td><?php foreach ($jam_kuliah as $a){if ($a->id_jam_kuliah == $u->id_jam_kuliah) :echo $a->jam_kuliah;endif;}  ?></td>
                </tr>
                <tr>
                    <td>Ruangan</td>
                    <td><?php foreach ($ruangan as $a){if ($a->id_ruangan == $u->id_ruangan) :echo $a->ruangan;endif;}  ?></td>
                </tr>
                <tr>
                    <td>Dosen</td>
                    <td><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $u->status ?></td>
                </tr>
				<tr>
                    <td>Keterangan</td>
                    <td><?php echo $u->keterangan ?></td>
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

 



