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
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Peminjaman</span>
            <h3 class="page-title">Detail Peminjaman Rutin</h3>
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
        <div class="bg-white py-4">
        <div class="">
        <div class="row  py-2">
            <div class="col-sm-8 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Detail Peminjaman Rutin</h6>
            </div>
            <div class="col-sm-4  text-center text-sm-right mb-0">
            <?php foreach ($peminjaman_rutin as $a){ ?>
            <a  class="mb-2 btn btn-sm btn-outline-primary mr-1" style="max-width:100px" href="<?php echo base_url('Pdfs/save_pdf_peminjaman/'.$a->id_peminjaman_rutin.'/rutin') ?>"> <i class="material-icons">print</i> Print </a>   
            <?php } ?>
            </div>
        </div>
        </div>
        <div class=" pt-0">
            <br>
        
            <div class="main-content-container ">
                <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0"></th>
                    <th scope="col" class="border-0"> </th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($peminjaman_rutin as $u){ 
                    ?>
                <tr>
                    <td>Kode Booking</td>
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
                    <td>Mata Kuliah</td>
                    <td><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></td>
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
                <?php if($u->status == 'tolak'){
                    foreach ($peminjaman as $s){ ?>
                <tr>
                    <td>Catatan Penolakan</td>
                    <td><?php echo $s->catatan_penolakan ?></td>
                </tr>
                <?php } ?>
                <?php } ?>
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
</div>

          <script type="text/javascript">



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


