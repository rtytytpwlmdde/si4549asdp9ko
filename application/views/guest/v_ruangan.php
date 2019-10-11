<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4 px-3">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Status Ruangan Rutin</span>
                        <h3 class="page-title">Perkuliahan</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('admin/filter_surat');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 100px;">
                        <option value="1" selected>Gedung</option>
                        <option value="2">GU</option>
                        <option value="3">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="2">D</option>
                        <option value="3">E</option>
                        <option value="2">F</option>
                    </select>  
                    <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 100px;">
                            <option value="1" selected>Ruangan</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                            <option value="2">f.1.1</option>
                            <option value="3">f.1.2</option>
                            <option value="2">c.1.1</option>
                            <option value="3">c.1.2</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                            <option value="2">A.1.1</option>
                            <option value="3">A.1.2</option>
                        </select>
                        <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 100px;">
                          <option value="1" selected>Hari</option>
                          <option value="2">Senin</option>
                          <option value="3">Selasa</option>
                          <option value="2">Rabu</option>
                          <option value="3">Kamis</option>
                          <option value="2">Jumat</option>
                          <option value="3">Saptu</option>
                          <option value="2">Minggu</option>
                      </select>  
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div><br>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0 py-2">
                        <span class="text-uppercase page-subtitle text-dark" style="font-size:1em">Senin, 12 Januari Bertemu</span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('admin/filter_surat');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <input  name="bln1" type="date" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                    </div>
                </div>
                  <!-- End Page Header -->
                  <!-- Small Stats Blocks -->

                  <!-- End Small Stats Blocks -->
                  <div class="row">
                    <div class="col">
                      <div class="bg-white py-4 px-4  mb-4">
                        <div class=" p-0 pb-3 text-center">
                          <table class="table mb-0 table-bordered" >
                            <thead class="bg-light">
                              <tr>
                                <th >R/J</th>
                                <th>07:00 - 09:29</th>
                                <th>09:30 - 12:00</th>
                                <th style="max-width:100px">12:00 - 12:50</th>
                                <th>12:50 - 15:20</th>
                                <th >15:20 - 17:00</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>5D-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>6D-D4.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>5E-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-primary" title="Tidak digunakan, dapat dipinjam"><i class="material-icons">check</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>3G-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>2D-E2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>5D-E2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-primary" title="Tidak digunakan, dapat dipinjam"><i class="material-icons">check</i></span></td>
                              </tr>
                              <tr>
                                <td>5D-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>5D-D2.1</td>
                                <td><span class="badge badge-pill badge-primary" title="Tidak digunakan, dapat dipinjam"><i class="material-icons">check</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>5D-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-primary" title="Tidak digunakan, dapat dipinjam"><i class="material-icons">check</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                              <tr>
                                <td>5D-D2.1</td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                                <td style="max-width:100px"></td>
                                <td><span class="badge badge-pill badge-primary" title="Tidak digunakan, dapat dipinjam"><i class="material-icons">check</i></span></td>
                                <td><span class="badge badge-pill badge-danger" title="Digunakan, Tidak bisa dipinjam"><i class="material-icons">close</i></span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                
                </div>