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
            <span class="text-uppercase page-subtitle">Sisip Jadwal Kuliah</span>
            <h3 class="page-title">Data Jadwal Kuliah</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
        <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
          
        </div>
      </div>
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
        <?php foreach($semester as $u){?> 
            <a href="<?php echo site_url('jadwal/sisip_jadwal_kuliah/'.$u->id_semester); ?>"  class="btn btn-primary" title="Tombol ini untuk menyisipkan jadwal sisip ke jadwal kuliah">
                            <i class="material-icons">input</i> Sisipkan Jadwal
                    </a>  
        <?php  }?>
        </div>
        </div>
        </div>
    </div>
    <div class="row ">
    <div class="col">
         <div class="alert alert-accent alert-dismissible fade show" role="alert">
            <button type="button" class="close px-2 " data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
            <strong class="text-white">Perhatian! <br> Halaman ini untuk menyisipkan jadwal baru kedalam jadwal kuliah yang telah di PLOT  </strong><br>  
            <hr style="height: 1px;color: #fff;background-color: #fff;border: none;">
            <strong class="text-white">Penggunaan!
                <br> 1. Tambah semua jadwal yang akan disisipkan dengan mengisi form Sisip Jadwal Baru  
                <br> 2. Setiap tambah jadwal akan ditampilkan di tabel sisip jadwal kuliah semester  
                <br> 3. Tekan tombol <strong class="text-warning">Sisipkan Jadwal</strong> di pojok kanan atas untuk menyisipkan jadwal baru  
        </strong>  
        </div>
    </div>
    </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
    <div class="row">
    <div class="col-sm-8 ">
        
        <!-- -->
        <div class="bg-white py-4 px-4" >
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-6 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Sisip Jadwal Kuliah <?php foreach($semester as $u){echo $u->semester;  }?></h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <div id="export"></div>
            </div>
            </div>
        </div>
        <div class=" pt-0">
            <div class="row border-bottom py-2 bg-white">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <div id="" class=" input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                <input id="search_inp" class="input-sm form-control"  placeholder="Search"  type="text">
                </div>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <select id="data_length" class="custom-select custom-select-sm" style="max-width: 80px;" title="Tampilkan sebagaian atau semua data di tabel">
                <option selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="-1">All</option>
                </select>
            </div>
            </div><br>
        
            <div class="main-content-container ">
                <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0">No</th>
                    <th scope="col" class="border-0">ID Jadwal </th>
                    <th scope="col" class="border-0">Hari</th>
                    <th scope="col" class="border-0">Jam</th>
                    <th scope="col" class="border-0">Mata Kuliah</th>
                    <th scope="col" class="border-0">Ruangan</th>
                    <th scope="col" class="border-0">Dosen</th>
                    <th scope="col" class="border-0">Jurusan</th>
                    <th scope="col" class="border-0">Prodi</th>
                    <th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($jadwal_sisip as $u){ 
                    ?>
                <tr>
                <td><?php echo $no++ ?></td>
                        <td><?php echo $u->id_jadwal_kuliah ?></td>
                        <td><?php echo $u->hari ?></td>
                        <td><?php foreach ($jam_kuliah as $a){if ($a->id_jam_kuliah == $u->id_jam_kuliah) :echo $a->jam_kuliah;endif;}  ?></td>
                        <td><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></td>
                        <td><?php foreach ($ruangan as $a){if ($a->id_ruangan == $u->id_ruangan) :echo $a->ruangan;endif;}  ?></td>
                        <td><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?></td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                        <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
                        <td><?php echo $u->status ?></td>
						
						
                        <td class="sorting_1" style="">
                            <a data-toggle="modal" type="button" class="btn btn-white"  title="Update" data-target="#modal_edit<?php echo $u->id_jadwal_kuliah ?>" >
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="<?php echo site_url('admin/hapusSisipJadwalKuliah/'.$u->id_semester.'/'.$u->id_jadwal_kuliah); ?>"  type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                
                    <?php } ?>
                
                </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
        </div>
    
    <div class="col-sm-4 ">
        <div class="bg-white py-4 px-4">
            <div class="">
            <div class="row border-bottom  py-2">
                <div class="col-sm-12 text-center text-sm-left mb-0">
                    <h6 class="m-0">Form Sisip Jadwal Baru </h6>
                </div>
                </div>
            </div>
            <div class=" pt-0 py-2">
                <div class="main-content-container ">
                    <form action="<?php echo base_url(). 'admin/tambahSisipJadwalKuliah'; ?>" method="POST">
                          
                        <div class="form-group">
                            <label for="feInputAddress">Semester</label> <?php foreach($semester as $u ){ ?>
                            <input  disabled name="se" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->semester ?>"> 
                            <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>">  <?php } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="feInputAddress">Hari</label>
                                <select required  name="hari" id="feInputState" class="form-control">
                                <option value="" selected>Pilih </option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday </option>
                                <option value="Thursday">Thursday </option>
                                <option value="Friday">Friday </option>
                                <option value="Saturday">Saturday </option>
                                <option value="Sunday">Sunday </option>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="feInputAddress">Jam Kuliah</label>
                                    <select required  name="id_jam_kuliah" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jam_kuliah as $u ){ ?>
                                    <option value="<?php echo $u->id_jam_kuliah;?>"><?php echo $u->jam_kuliah;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group col-md-4">
                                <label for="feInputAddress">Ruangan</label>
                                <select required  name="id_ruangan" id="feInputState" class="form-control">
                                <option value="" selected>Pilih </option>
                                <?php foreach($ruangan as $u ){ ?>
                                <option value="<?php echo $u->id_ruangan;?>"><?php echo $u->ruangan;     ?></option> 
                                <?php } ?>
                            </select>
                            </div>
                            </div>
                        
                        <div class="form-group">
                            <label for="feInputAddress">Mata Kuliah</label>
                                <select required  name="kode_matkul" id="feInputState" class="form-control">
                                <option value="" selected>Pilih </option>
                                <?php foreach($mata_kuliah as $u ){ ?>
                                <option value="<?php echo $u->kode_matkul;?>"><?php echo $u->nama_matkul;     ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="feInputAddress">Dosen</label>
                                <select required  name="id_dosen" id="feInputState" class="form-control">
                                <option value="" selected>Pilih </option>
                                <?php foreach($dosen as $u ){ ?>
                                <option value="<?php echo $u->NIP;?>"><?php echo $u->Nama;     ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="feInputAddress">Jurusan</label>
                                <select required  name="id_jurusan" id="feInputState" class="form-control">
                                <option value="" selected>Pilih </option>
                                <?php foreach($jurusan as $u ){ ?>
                                <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                <?php } ?>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="feInputAddress">Program Studi</label>
                                    <select required  name="id_prodi" id="feInputState" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($prodi as $u ){ ?>
                                    <option value="<?php echo $u->id_prodi;?>"><?php echo $u->prodi;     ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                            <div hidden class="form-group col-md-4">
                                <label for="feInputAddress">status</label>
                                <input   name="status" type="text"  class="form-control" id="feInputAddress" value="sisip"> 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Tambah Jadwal Kuliah</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
        <!-- End Default Dark Table -->
        <div class="row py-4">
    <div class="col-sm-12 ">
        
        <!-- -->
        <div class="bg-white py-4 px-4">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-6 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Jadwal Kuliah <?php foreach($semester as $u){echo $u->semester;  }?></h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <div id="export"></div>
            </div>
            </div>
        </div>
        <div class=" pt-0">
            <div class="row border-bottom py-2 bg-white">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <div id="" class=" input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                <input id="search_inp" class="input-sm form-control"  placeholder="Search"  type="text">
                </div>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <select id="data_length" class="custom-select custom-select-sm" style="max-width: 80px;" title="Tampilkan sebagaian atau semua data di tabel">
                <option selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="-1">All</option>
                </select>
            </div>
            </div><br>
        
            <div class="main-content-container ">
                <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0">No</th>
                    <th scope="col" class="border-0">ID Jadwal </th>
                    <th scope="col" class="border-0">Hari</th>
                    <th scope="col" class="border-0">Jam</th>
                    <th scope="col" class="border-0">Mata Kuliah</th>
                    <th scope="col" class="border-0">Ruangan</th>
                    <th scope="col" class="border-0">Dosen</th>
                    <th scope="col" class="border-0">Jurusan</th>
                    <th scope="col" class="border-0">Prodi</th>
                    <th scope="col" class="border-0">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($jadwal_kuliah as $u){ 
                    ?>
                <tr>
                <td><?php echo $no++ ?></td>
                        <td><?php echo $u->id_jadwal_kuliah ?></td>
                        <td><?php echo $u->hari ?></td>
                        <td><?php foreach ($jam_kuliah as $a){if ($a->id_jam_kuliah == $u->id_jam_kuliah) :echo $a->jam_kuliah;endif;}  ?></td>
                        <td><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></td>
                        <td><?php foreach ($ruangan as $a){if ($a->id_ruangan == $u->id_ruangan) :echo $a->ruangan;endif;}  ?></td>
                        <td><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?></td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
                        <td><?php foreach ($prodi as $a){if ($a->id_prodi == $u->id_prodi) :echo $a->prodi;endif;}  ?></td>
                        <td><?php echo $u->status ?></td>
						
						
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
    </div>
</div>


 <?php 
   
   $i=0;
   foreach($jadwal_sisip as $u):
   ?>
<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_edit<?php echo $u->id_jadwal_kuliah ?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Jadwal Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
        <div class="row">
              <div class="col-lg-12">
                <div class=" mb-4">
                      <div class="row">
                        <div class="col">
                        <form action="<?php echo base_url(). 'admin/editSisipJadwalKuliah'; ?>" method="POST">
                            
                        <div class="form-group">
                        <label for="feInputAddress">Semester</label> 
                        <input  disabled name="semester" type="text"  class="form-control" id="feInputAddress" value="<?php foreach($semester as $a ){  if ($u->id_semester==$a->id_semester) {echo $a->semester;}} ?>"> 
                        <input  hidden name="id_semester" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_semester ?>">  <?php  ?>
                        <input  hidden name="id_jadwal_kuliah" type="text"  class="form-control" id="feInputAddress" value="<?php echo $u->id_jadwal_kuliah ?>">  <?php  ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="feInputAddress">Hari</label>
                        <select required  name="hari" id="feInputState" class="form-control">
                            <option value="Monday" <?php echo ($u->hari=='Monday')?'selected="selected"':''; ?>>Monday</option>
                            <option value="Tuesday" <?php echo ($u->hari=='Tuesday')?'selected="selected"':''; ?>>Tuesday</option>
                            <option value="Wednesday" <?php echo ($u->hari=='Wednesday')?'selected="selected"':''; ?>>Wednesday</option>
                            <option value="Thursday" <?php echo ($u->hari=='Thursday')?'selected="selected"':''; ?>>Thursday</option>
                            <option value="Friday" <?php echo ($u->hari=='Friday')?'selected="selected"':''; ?>>Friday</option>
                            <option value="Saturday" <?php echo ($u->hari=='Saturday')?'selected="selected"':''; ?>>Saturday</option>
                            <option value="Sunday" <?php echo ($u->hari=='bagus')?'selected="selected"':''; ?>>Sunday</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Jam Kuliah</label>
                                <select required  name="id_jam_kuliah" id="feInputState" class="form-control">
                                <?php foreach ($jam_kuliah as $a) : ?>
                                <option value="<?= $a->id_jam_kuliah; ?>"
                                    <?php if ($u->id_jam_kuliah == $a->id_jam_kuliah) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->jam_kuliah; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feInputAddress">Ruangan</label>
                            <select required  name="id_ruangan" id="feInputState" class="form-control">
                            <?php foreach ($ruangan as $a) : ?>
                                <option value="<?= $a->id_ruangan; ?>"
                                    <?php if ($u->id_ruangan == $a->id_ruangan) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->ruangan; ?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="feInputAddress">Mata Kuliah</label>
                            <select required  name="kode_matkul" id="feInputState" class="form-control">
                            <?php foreach ($mata_kuliah as $a) : ?>
                                <option value="<?= $a->kode_matkul; ?>"
                                    <?php if ($u->kode_matkul == $a->kode_matkul) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->nama_matkul; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Dosen</label>
                            <select required  name="id_dosen" id="feInputState" class="form-control">
                            <?php foreach ($dosen as $a) : ?>
                                <option value="<?= $a->NIP; ?>"
                                    <?php if ($u->id_dosen == $a->NIP) :
                                        echo "selected=selected";
                                    endif; ?>>
                                    <?= $a->Nama; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="feInputAddress">Jurusan</label>
                            <select required  name="id_jurusan" id="feInputState" class="form-control">
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
                                <select required  name="id_prodi" id="feInputState" class="form-control">
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
                        <div hidden class="form-group col-md-4">
                            <label for="feInputAddress">status</label>
                            <input   name="status" type="text"  class="form-control" value="<?php echo $u->status ?>" id="feInputAddress" > 
                        </div>
                    </div>
                         
                            
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> 
            </div>
        </div>
       
        
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-accent">Set Telah Kembali</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php endforeach;?>

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
        dom: 'fBrtip<"clear">l',
    "columnDefs": [{
      className: "dt-right",
      "targets": [0] // First column
    }],
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "User",
                title: "",
                orientation: 'landscape',
                customize: function (doc) {

                    doc.styles.tableHeader = {
                        color: 'black',
                        background: 'grey',
                        alignment: 'center'
                    }

                    doc.styles = {
                        subheader: {
                            fontSize: 10,
                            bold: true,
                            color: 'black'
                        },
                        tableHeader: {
                            bold: true,
                            fontSize: 10.5,
                            color: 'black'
                        },
                        lastLine: {
                            bold: true,
                            fontSize: 11,
                            color: 'blue'
                        },
                        defaultStyle: {
                            fontSize: 10,
                            color: 'black'
                        }
                    }

                    var objLayout = {};
                    objLayout['hLineWidth'] = function(i) { return .8; };
                    objLayout['vLineWidth'] = function(i) { return .5; };
                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                    objLayout['paddingLeft'] = function(i) { return 8; };
                    objLayout['paddingRight'] = function(i) { return 8; };
                    doc.content[0].layout = objLayout;

                    // margin: [left, top, right, bottom]

                    doc.content.splice(0, 0, {
                        text: [
                            {text: 'Texto 0', italics: true, fontSize: 12}
                        ],
                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });

                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*', '*'],
                            body: [
                                [
                                    {text: 'Texto 1', bold: true, fontSize: 10}
                                    , {text: 'Texto 2', bold: true, fontSize: 10}
                                    , {text: 'Texto 3', bold: true, fontSize: 10}]
                            ]
                        },

                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });


                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*'],
                            body: [
                                [
                                    {
                                        text: [
                                            {text: 'Texto 4', fontSize: 10},
                                            {
                                                text: 'Texto 5',
                                                bold: true,
                                                fontSize: 10
                                            }

                                        ]
                                    }
                                    , {
                                    text: [
                                        {
                                            text: 'Texto 6',
                                            bold: true, fontSize: 18
                                        },
                                        {
                                            text: 'Texto 7',
                                            fontSize: 10
                                        }

                                    ]
                                }]
                            ]
                        },

                        margin: [0, 0, 0, 22],
                        alignment: 'center'
                    });


                },
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                fieldSeparator: ';',
                filename: "User",
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-code-o"></i>',
                titleAttr: 'CSV',
                fieldSeparator: ';',
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            },

            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible',
                }
            },

            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore'],
                collectionLayout: 'fixed four-column'
            }

        ]

    });
    
    
    $('.dt-button').addClass('btn btn-sm btn-outline-primary mr-1 rounded  text-center p-1');
    $('.dataTables_paginate').addClass('btn rounded text-white text-center p-1');
    $(".dt-button").prependTo("#export"); 
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


