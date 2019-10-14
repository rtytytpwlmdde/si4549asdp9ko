<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Tambah</span>
                        <h3 class="page-title">Prodi</h3>
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
                             <form action="<?php echo base_url(). 'admin/tambahProdi'; ?>" method="POST">
                                
                            <div class="form-group">
                              <label for="feInputAddress">Jurusan</label>
                              <select required  name="id_jurusan" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="feFirstName">Nama Prodi</label>
                                    <input type="text" name="nama_prodi" class="form-control" id="feFirstName" placeholder="" > 
                                </div>
                                
								
                                <button class="btn btn-sm btn-outline-accent">
                                  <i class="material-icons">save</i> Submit</button>
                              </form>
                        </div>
                      </div>
                      <!-- / Add New Post Form -->
                    </div>
                   
                  </div>
                  
                
                </div>