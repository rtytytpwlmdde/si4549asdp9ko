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
    <div class="page-header row no-gutters py-4 px-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Peminjaman</span>
            <h3 class="page-title">Validasi Peminjaman Ruang Kelas</h3>
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
        <div class="bg-white py-4 px-4">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Peminjaman</h6>
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
                    <th scope="col" class="border-0">Kode Booking  </th>
                    <th scope="col" class="border-0">Nama</th>
                    <th scope="col" class="border-0">Dosen</th>
                    <th scope="col" class="border-0">Mata Kuliah</th>
                    <th scope="col" class="border-0">Jurusan</th>
                    <th scope="col" class="border-0">Tgl Pinjam</th>
                    <th scope="col" class="border-0">Ruangan</th>
                    <th scope="col" class="border-0">Jam</th>
                    <th scope="col" class="border-0">Jenis</th>
                    <th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($peminjaman as $u){ 
                        if($u->jenis_peminjaman == 'rutin'){ ?>
                        <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                        
                        <a data-toggle="modal" class="btn" data-target="#modal_edit<?php echo $u->id_peminjaman ?>" >
                           <info class="text-primary font-weight-bold"> <?php echo $u->id_peminjaman ?></info>
                        </a>
                        
                        </td>
                        <td>
                            <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
                        </td>
                            <?php 
                                foreach ($peminjaman_rutin as $pr){
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ ?>
                        <td><?php foreach ($dosen as $a){if ($a->NIP == $pr->id_dosen) :echo $a->Nama;endif;}  ?> </td>
                        <td><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $pr->kode_matkul) :echo $a->nama_matkul;endif;}  ?> </td>
                        <td><?php foreach ($jurusan as $a){if ($a->id_jurusan == $pr->id_jurusan) :echo $a->jurusan;endif;}  ?> </td>
                                   <?php }
                                }
                            ?>
                        <td><?php echo $u->tanggal_peminjaman ?></td>
                        <?php 
                                foreach ($peminjaman_rutin as $pr){
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ ?>
                                       <td><?php foreach ($ruangan as $a){if ($a->id_ruangan == $pr->id_ruangan) :echo $a->ruangan;endif;} ?> </td>
                                       <td><?php foreach ($jam_kuliah as $a){if ($a->id_jam_kuliah == $pr->id_jam_kuliah) :echo $a->jam_kuliah;endif;}  ?> </td>
                                   <?php }
                                }
                            ?>
                        <td> <span 
                                <?php if($u->jenis_peminjaman == 'rutin'){ ?>
                                    class="text-primary"
                                <?php }else if($u->jenis_peminjaman == 'non rutin'){ ?>
                                    class="text-dark"
                                <?php } else{ ?>
                                    class="text-muted"
                                <?php } ?>
                            ><?php echo $u->jenis_peminjaman ?></span>
                        </td>
                        <td>
                            <span 
                                <?php if($u->status_peminjaman == 'terkirim'){ ?>
                                    class="text-warning"
                                <?php }else if($u->status_peminjaman == 'tolak'){ ?>
                                    class="text-danger"
                                <?php }else if($u->status_peminjaman == 'setuju'){ ?>
                                    class="text-success"
                                <?php } else{ ?>
                                    class="text-secondary"
                                <?php } ?>
                            ><?php echo $u->status_peminjaman ?></span>
                        </td>
						
                        <td class="sorting_1" style="">
                            <a href="<?php echo site_url('validator/validasi/'.$u->id_peminjaman.'/setuju'); ?>" type="button" class="btn btn-primary" onclick="return valid();" title="Setuju Peminjaman">
                                <i class="material-icons">check</i>
                            </a>
                            <a href="<?php echo site_url('validator/validasi/'.$u->id_peminjaman.'/tolak'); ?>"  type="button" class="btn btn-danger" onclick="return tolak();" title="Tolak Peminjaman">
                                <i class="material-icons">close</i>
                            </a>
                        </td>
                        </tr>
                        <?php } } ?>
                
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



<?php 
   
   $i=0;
   foreach($peminjaman as $p):
   ?>
<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_edit<?php echo $p->id_peminjaman ?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Peminjaman <?php echo $p->jenis_peminjaman?></h5>
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
                          <!-- peminjaman rutin -->
                          <?php 
                          if($p->jenis_peminjaman == 'rutin'){?>
                            <table class="table mb-0 " id="pegawai">
                                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                                
                                </thead>
                                <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($peminjaman_rutin as $u){ 
                                        if($p->id_peminjaman == $u->id_peminjaman_rutin){?>
                                <tr>
                                    <td>Kode Booking </td>
                                    <td><?php echo $u->id_peminjaman_rutin ?></td>
                                </tr>
                                <tr>
                                    <td>NIP/NIK/NIM</td>
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
                                        <?php }
                                    ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                          <?php }
                          ?>

                         
                          
                        </div>
                      </div>
                </div>
              </div> 
            </div>
        </div>
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
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


