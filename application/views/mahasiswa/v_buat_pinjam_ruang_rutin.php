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
        <h3 class="page-title">Peminjaman Ruangan Rutin</h3>
    </div>
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
    
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-12">
      <!-- Add New Post Form -->
      <div class="mb-3">
        <div class="">
            <p class="mb-4">Isi form berikut dengan <info>BENAR</info></p>
            <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="feFirstName">Nim</label>
                    <input disabled type="text" class="form-control"  value="<?php echo $this->session->userdata('NIM'); ?>"> </div>
                  <div class="form-group col-md-6">
                    <label for="feLastName">Nama</label>
                    <input disabled type="text" class="form-control" value="<?php echo $this->session->userdata('Nama'); ?>"> </div>
                </div>
                <div class="form-group">
                    <label for="feInputAddress">Dosen</label>
                        <select name="Nama_kegiatan_Remun" id="kategori" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->NIP;?>"><?php echo $row->Nama;?></option>
                            <?php endforeach;?>
                        </select>
                </div>
                  <div class="form-group">
                    <label for="feInputAddress">Mata Kuliah</label>
                    <select id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                        <option>Pengantar Akuntansi</option>
                        <option>Keuangan Daerah</option>
                      </select>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="feInputCity">Ruangan</label>
                    <select id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                        <option>E.12</option>
                        <option>D3.4</option>
                      </select>
                </div>
                  <div class="form-group col-md-4">
                    <label for="inputZip">Jam ke</label>
                    <select id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                        <option>07:00 - 09:30</option>
                        <option>09:30 - 12:00</option>
                      </select>
                </div>
                  <div class="form-group col-md-4">
                    <label for="feInputState">Tanggal Pemakaian</label>
                    <input id="feInputState" type="date" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="feDescription">Keterangan</label>
                    <textarea class="form-control" name="feDescription" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                  </div>
                </div>
                <button class="btn btn-sm btn-outline-accent">
                  <i class="material-icons">save</i> Submit</button>
              </form>
        </div>
      </div>
      <!-- / Add New Post Form -->
    </div>
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
                <strong class="mr-1">1. NIM</strong> tidak bisa di ubah
              </span>
              <span class="mb-2">
                  2. Peminjaman rutin hanya dapat meminjam <strong class="mr-1">1 (satu)</strong> ruangan saja
              </span><span class="d-flex"> </span>
              
              <span class="mb-2 py-2">
                  3. Gunakan Peminjaman <strong class="mr-1">Non Rutin</strong> untuk meminjam ruangan lebih dari 1 
              </span>
            </li>
          </ul>
        </div>
      </div>
    
    </div>
  </div>
  

</div>