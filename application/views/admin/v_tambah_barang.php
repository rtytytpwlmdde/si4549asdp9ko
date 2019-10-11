<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Tambah</span>
                        <h3 class="page-title">Sarana Prasarana Baru</h3>
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
                             <form action="<?php echo base_url(). 'admin/tambahBarang'; ?>" method="POST">
                                
                            <div class="form-group">
                              <label for="feInputAddress">Jenis Barang</label>
                              <select required  name="id_jenis_barang" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jenis_barang as $u ){ ?>
                                    <option value="<?php echo $u->id_jenis_barang;?>"><?php echo $u->jenis_barang;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="feFirstName">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="feFirstName" placeholder="" > 
                                </div>
                                <div class="form-group">
                                <label for="feInputAddress">Keterangan</label>
                                    <select required  name="status_barang" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <option value="bagus">Bagus</option>
                                    <option value="rusak">Rusak</option>
                                    </select>
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
                          <h6 class="m-0">Catatan</h6>
                        </div>
                        <div class='card-body p-0'>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item p-3">
                              <span class="d-flex mb-2"> 
                              </span>
                            </li>
                          </ul>
                        </div>
                      </div>
                   
                    </div>
                  </div>
                  
                
                </div>