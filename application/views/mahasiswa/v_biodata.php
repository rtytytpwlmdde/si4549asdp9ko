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
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Peminjaman Ruang FEB</span>
            <h3 class="page-title">Update Data</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Update Data</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php foreach($mahasiswa as $u): ?>
                          <form action="<?php echo base_url(). 'mahasiswa/editMahasiswa'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">NIM</label>
                              <input  disabled name="nim" type="text" title="Gunakan Angka, 5-25 karakter" class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                              <input  hidden name="nim" type="text" title="Gunakan Angka, 5-25 karakter" class="form-control" id="feInputAddress" value="<?php echo $u->nim ?>"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Nama</label>
                              <input disabled pattern="[^'\x11]+" required  name="nama" type="text" class="form-control" id="feInputAddress" value="<?php echo $u->nama ?>"> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Jurusan</label>
                                    <select disabled required  name="id_jurusan" id="feInputState" class="form-control">
                                    <?php foreach ($jurusan as $a) : ?>
                                        <option value="<?= $a->id_jurusan; ?>"
                                            <?php if ($u->id_jurusan == $a->id_jurusan) :
                                                echo "selected=selected";
                                            endif; ?>>
                                            <?= $a->jurusan; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Program Studi</label>
                                        <select disabled required  name="id_prodi" id="feInputState" class="form-control">
                                        <?php foreach ($prodi as $a) : ?>
                                        <option value="<?= $a->id_prodi; ?>"
                                            <?php if ($u->id_prodi == $a->id_prodi) :
                                                echo "selected=selected";
                                            endif; ?>>
                                            <?= $a->prodi; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                           <div class="form-group">
                              <label for="feInputAddress">No Telpon</label>
                              <input required  name="telpon" type="number" class="form-control" id="feInputAddress" value="<?php echo $u->telpon ?>"> 
                            </div>

                            <button type="submit" class="btn btn-accent">Update Biodata</button>
                          </form>
                        <?php endforeach ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
             <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><i class="material-icons">info_outline</i> Petunjuk</strong>
                      <span>1. Mahasiswa hanya dapat melakukan edit data pada bagian No Telpon.</span><br>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
			
</div>
    


