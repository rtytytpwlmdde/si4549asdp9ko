 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
 <!-- alert -->
 <?php
    $notif = $this->session->flashdata('notif');
    if($notif != NULL){
        echo '
        <div class="alert alert-primary mr-20" role="alert">  
        <div class="text-sm-center align-items-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-close text-white"></i></span>
        </button>
        <h4 class="alert-heading">Sukses!</h4>
        <div >
            <i class="large material-icons"">check_circle</i><br>
        </div>
        <strong>'.$notif.'</strong>  
        </div>
        </div>
        
        ';
    }
?>


   
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Jadwal Kuliah Pengganti</span>
            <h3 class="page-title">Data Jadwal Kuliah Pengganti</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
        <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
          
        </div>
      </div>
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
       
            <a hidden href="<?php echo site_url('operator/inputSisipJadwalKuliah/'.$semester_id); ?>"  class="btn btn-primary" title="Sisipkan jadwal tanpa harus ploting ulang">
                            <i class="material-icons">input</i> Sisipkan Jadwal
                        </a>  
           
           
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
            <div class="col-sm-6 text-center text-sm-left mb-0">
                <?php  
                    foreach ($semester as $a){?>
                    <?php if ($a->id_semester == $semester_id) :?>
                <h6 class="m-0 text-semibold"><?php echo $a->semester?></h6>
                <p class="m-0">Periode <?php echo date("d-m-Y", strtotime($a->tanggal_mulai)); ?> - <?php echo date("d-m-Y", strtotime($a->tanggal_selesai)); ?></p>
                <?php ;endif; }  ?>
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
                <div class="box-body" style="">
                <table class="table table-bordered table-hover" id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="">No</th>
                    <th scope="col" class="">Hari </th>
                    <th scope="col" class="">Tanggal </th>
                    <th scope="col" class="">Jam</th>
                    <th scope="col" class="">Mata Kuliah</th>
                    <th scope="col" class="">Ruangan</th>
                    <th scope="col" class="">Dosen</th>
                    <th scope="col" class="">Jurusan</th>
                    <th scope="col" class="">Prodi</th>
                    <th scope="col" class="">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($peminjaman_rutin as $u){ 
                    ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php  
                    $hari = array (1 => 'Senin',
                    2 => 'Selasa',
                    3 => 'Rabu',
                    4 => 'Kamis',
                    5=>'Jumat',
                    6=>'Sabtu',
                    7=>'Minggu'
                    );
                    echo $hari[date('N')];
                    
                    ?></td>
                    <td><?php echo date("d-m-Y", strtotime($u->tanggal_pemakaian));?></td>
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

        <!-- End Default Dark Table -->
    </div>
</div>

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


