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
        <h3 class="page-title">Form Peminjaman Barang</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-12">
        <!-- Add New Post Form -->
        <div class="mb-3">
        <div class="">
            <p class="mb-4">Isi form berikut dengan <info>BENAR</info></p>
            <div class="alert alert-accent alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                <strong class="text-white">Perhatian! Halaman ini hanya untuk mengisi biodata peminjam. Barang dapat ditambahkan di halaman berikutnya, yakni setelah menekan tombol  </strong>  <strong class="text-warning">next</strong> 
            </div>

            <form action="<?php echo base_url(). 'validator/tambahPeminjamanBarang'; ?>" method="post">
           
                
                    <div hidden class="form-group col-md-6">
                    <label for="feFirstName">Nim</label>
                    <input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('username'); ?>"> 
                    <input hidden name="id_peminjam" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $this->session->userdata('username'); ?>"> 
                    </div>
                    <div class="form-group ">
                    <label for="feLastName">Nama</label>
                    <input disabled type="text" class="form-control" id="feLastName"  value="<?php echo $this->session->userdata('username'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="feInputAddress">Penyelenggara</label>
                    <select name="penyelenggara" id="feInputState" class="form-control ">
                        <option selected>Pilih</option>
                        <?php foreach($penyelenggara as $p): ?>
                        <option value="<?php echo $p->id_penyelenggara?>"><?php echo $p->penyelenggara?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="feInputAddress">Nama Kegiatan</label>
                    <input name="nama_agenda" type="text" class="form-control" id="feLastName" > 
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="feInputState">Tanggal Pemakaian</label>
                    <input name="tanggal_pemakaian" type="date" class="form-control" id="feLastName" > 
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Jam Mulai</label>
                    <select name="jam_mulai_peminjaman" id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                         <option value="7">07:00 </option>
                        <option value="8">08:00 </option>
                        <option value="9">09:00 </option>
                        <option value="10">10:00 </option>
                        <option value="11">11:00 </option>
                        <option value="12">12:00 </option>
                        <option value="13">13:00 </option>
                        <option value="14">14:00 </option>
                        <option value="15">15:00 </option>
                        <option value="16">16:00 </option>
                        <option value="17">17:00 </option>
                        <option value="18">18:00 </option>
                        <option value="19">19:00 </option>
                        <option value="20">20:00 </option>
                        <option value="21">21:00 </option>
                        <option value="22">22:00 </option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Jam Selesai</label>
                    <select name="jam_selesai_peminjaman" id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                         <option value="7">07:00 </option>
                        <option value="8">08:00 </option>
                        <option value="9">09:00 </option>
                        <option value="10">10:00 </option>
                        <option value="11">11:00 </option>
                        <option value="12">12:00 </option>
                        <option value="13">13:00 </option>
                        <option value="14">14:00 </option>
                        <option value="15">15:00 </option>
                        <option value="16">16:00 </option>
                        <option value="17">17:00 </option>
                        <option value="18">18:00 </option>
                        <option value="19">19:00 </option>
                        <option value="20">20:00 </option>
                        <option value="21">21:00 </option>
                        <option value="22">22:00 </option>
                    </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="feDescription">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" id="feLastName" > 
                   </div>
                </div>
                
                <button type="submit" class="btn btn-accent">Submit</button>
                </form>
        </div>
        </div>
        <!-- / Add New Post Form -->
    <div class="col-lg-3 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Keterangan</h6>
        </div>
        <div class='card-body p-0'>
            <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <span class="d-flex mb-2">
                <strong class="mr-1">NIM</strong> tidak bisa di ubah
                </span>
            </li>
            <li class="list-group-item p-3">
                
            <strong class="mr-1">Langkah Peminjaman Non Rutin</strong> <br>

                <span>1. Isi form ruangan untuk membuat peminjaman baru</span> <br>
                <span>2. Klik Submit</span> <br>
                <span>3. Akan muncul halaman baru</span> <br>
                <span>4. Tambahkan ruangan kemudian</span> <br>
            </li>
            </ul>
        </div>
        </div>
    
    </div>
    </div>
    

</div>

