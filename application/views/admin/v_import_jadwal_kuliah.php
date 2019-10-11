<div class="main-content-container container-fluid px-4 mb-3">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col">
                <span class="text-uppercase page-subtitle">Import</span>
                <h3 class="page-title">Import File</h3>
              </div>
              <div class="col d-flex">
                <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                 
                </div>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- File Manager - Cards -->
            <div class="row">
                    <div class="col-lg-9 col-md-12">
                      <!-- Add New Post Form -->
                      <div class="mb-3">
                      <div class="file-manager file-manager-cards">
                        <div class="card card-small mb-3">
                            <div class="row no-gutters border-bottom">
                            <div class="file-manager-cards__dropzone w-100 p-2">
                                <form action="/file-upload" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
                            </div>
                            </div>
                            <div class="row no-gutters p-2">
                            <div class="col-lg-12 mb-2 mb-lg-0">
                                <form action="POST">
                                <div class="input-group input-group-seamless">
                                    <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="form-control form-control-sm file-manager-cards__search" placeholder="Search files">
                                </div>
                                </form>
                            </div>
                            <div class="col py-2">
                                <div class="d-flex ml-lg-auto my-auto">
                                <div class="btn-group btn-group-sm mr-2 ml-lg-auto" role="group" aria-label="Table row actions">
                                    
                                </div>
                                <button class="btn btn-sm btn-accent d-inline-block ml-auto ml-lg-0">
                                    <i class="material-icons">import_export</i> Import </button>
                                </div>
                            </div>
                            </div>
                        </div>
                        
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
                              <span class=""> Format nama file yang di import  <strong>  file_import.xls</strong></span>
                            </li>
                            
                            <li class="list-group-item p-3">
                              <span class=""> Contoh format excel dapat download link berikut </span> <a href="#" type="submit" class="btn">File</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                   
                    </div>
                  </div>
                  
                
                </div>
          
            <!-- End File Manager - Cards -->
          </div>
