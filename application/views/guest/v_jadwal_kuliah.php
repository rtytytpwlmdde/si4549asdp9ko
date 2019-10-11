<div class="main-content-container container-fluid">
                  <!-- Page Header -->
                  <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                        <span class="text-uppercase page-subtitle">Jadwal</span>
                        <h3 class="page-title">Perkuliahan</h3>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
                    <form action="<?php echo site_url('admin/filter_surat');?>"  method="get" style="float:right" >
                    <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
                      <select  name="bln1" class="custom-select custom-select-sm" style="min-width: 200px;">
                        <option value="1" selected>Filter Berdasarkan</option>
                        <option value="2">Hari</option>
                        <option value="2">Ruangan</option>
                        <option value="3">Jurusan</option>
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
                            <option value="1" >Hari</option>
                            <option value="2">Senin</option>
                            <option value="3">Senin</option>
                            <option value="2">Rabu</option>
                            <option value="3">Kamis</option>
                            <option value="2">Jumat</option>
                            <option value="3">Saptu</option>
                            <option value="2">Minggu</option>
                            <option value="1"> Akuntansi</option>
                            <option value="2">Ilmu Ekonomi</option>
                            <option value="3">Manajemen</option>
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
                  
                  <div class="row mb-2 jadwal-color py-2">
                    <div class="col mb-4">
                      <div class="col-merah text-center p-1">Akuntansi</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-biru text-center p-1">Managemen</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-orange text-center p-1">Ilmu Ekonomi</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-kuning text-center p-1">Magister Akuntansi</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-hijau text-center p-1">Magister Managemen</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-ungu text-center p-1">Magister Ilmu Ekonomi</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-pink text-center p-1">Doktor Akuntansi</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-birumuda text-center p-1">Doktor Managemen</div>
                    </div>
                    <div class="col mb-4">
                      <div class="col-ungutua text-center p-1">Doktor Ilmu Ekonomi</div>
                    </div>
                  </div>
                  <!-- End Small Stats Blocks -->
                  <div class="row">
                    <div class="col">
                      <div class=" bg-white py-4 px-4 mb-4">
                        <div class=" p-0 pb-3 text-center" style="overflow-x:auto; ">
                          <table class="table mb-0 table-bordered" >
                            <thead class="bg-light">
                              <tr>
                                <th >Hari</th>
                                <th >R/J</th>
                                <th >07:00 - 09:29</th>
                                <th>09:30 - 12:00</th>
                                <th style="max-width:100px">12:00 - 12:50</th>
                                <th>12:50 - 15:20</th>
                                <th >15:20 - 17:00</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-merah">Pengantar Akuntansi</td>
                                <td class="col-hijau">Ekonomi Pembangunan</td>
                                <td style="max-width:100px"></td>
                                <td class="col-kuning">Perilaku Konsumen</td>
                                <td class="col-orange">Kepemimpinan</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>6D-D4.1</td>
                                <td class="col-ungu">Pengantar Mangamen</td>
                                <td class="col-merah">Metodologi Penelitian</td>
                                <td style="max-width:100px"></td>
                                <td class="col-hijau">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5E-D2.1</td>
                                <td class="col-biru">Ekonomi Monenter 2</td>
                                <td class="col-orange">Bahasa Inggris</td>
                                <td style="max-width:100px"></td>
                                <td ></td>
                                <td class="col-pink">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>3G-D2.1</td>
                                <td class="col-kuning">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                                <td style="max-width:100px"></td>
                                <td class="col-merah">Pengantar Akuntansi</td>
                                <td class="col-biru">Ekonomi Pembangunan</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>2D-E2.1</td>
                                <td class="col-ungu">Pengantar Mangamen</td>
                                <td class="col-merah">Metodologi Penelitian</td>
                                <td style="max-width:100px"></td>
                                <td class="col-hijau">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-E2.1</td>
                                <td class="col-biru">Ekonomi Monenter 2</td>
                                <td class="col-orange">Bahasa Inggris</td>
                                <td style="max-width:100px"></td>
                                <td class="col-pink">Matematika</td>
                                <td ></td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-kuning">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                                <td style="max-width:100px"></td>
                                <td class="col-merah">Pengantar Akuntansi</td>
                                <td class="col-biru">Ekonomi Pembangunan</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td ></td>
                                <td class="col-merah">Metodologi Penelitian</td>
                                <td style="max-width:100px"></td>
                                <td class="col-hijau">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-biru">Ekonomi Monenter 2</td>
                                <td ></td>
                                <td style="max-width:100px"></td>
                                <td class="col-pink">Matematika</td>
                                <td class="col-pink">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-kuning">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                                <td style="max-width:100px"></td>
                                <td ></td>
                                <td class="col-biru">Ekonomi Pembangunan</td>
                              </tr>
                              
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-kuning">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                                <td style="max-width:100px"></td>
                                <td class="col-merah">Pengantar Akuntansi</td>
                                <td class="col-biru">Ekonomi Pembangunan</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td ></td>
                                <td class="col-merah">Metodologi Penelitian</td>
                                <td style="max-width:100px"></td>
                                <td class="col-hijau">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-biru">Ekonomi Monenter 2</td>
                                <td ></td>
                                <td style="max-width:100px"></td>
                                <td class="col-pink">Matematika</td>
                                <td class="col-pink">Keuangan Daerah</td>
                              </tr>
                              <tr>
                                <td>Senin</td>
                                <td>5D-D2.1</td>
                                <td class="col-kuning">Ekonomi Monenter 2</td>
                                <td class="col-biru">Keuangan Daerah</td>
                                <td style="max-width:100px"></td>
                                <td ></td>
                                <td class="col-biru">Ekonomi Pembangunan</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                
                </div>