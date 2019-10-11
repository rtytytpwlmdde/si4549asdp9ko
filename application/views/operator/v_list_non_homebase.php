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
            <span class="text-uppercase page-subtitle">Pegawai</span>
            <h3 class="page-title">Data Pegawai</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
        <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
          <a href="<?php echo base_url('operator/data_dosen'); ?>" class="btn btn-white " title="Tampilkan hanya data dosen"> Dosen </a>
          <a href="<?php echo base_url('operator/data_pegawai'); ?>" class="btn btn-white " title="Tampilkan semua data pegawai"> Semua </a>
          <a href="<?php echo base_url('operator/data_staff'); ?>" class="btn btn-white " title="Tampilkan hanya data staff"> Staff </a>
          <a href="<?php echo base_url('operator/data_non_homebase'); ?>" class="btn btn-white active" title="Tampilkan hanya data Non Homebase"> Non Homebase </a>
        </div>
      </div>
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
            <a  href="<?php  echo base_url('operator/tambah_pegawai'); ?>" type="submit" class="form-control btn btn-primary text-center text-white"  style="float:center">
                <i class="material-icons">add</i>Tambah
            </a>      
            <a  href="<?php  echo base_url('operator/import_pegawai'); ?>" type="submit" class="form-control btn btn-primary text-center text-white" style="float:center">
                <i class="material-icons">import_export</i>Import
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
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Data Pegawai</h6>
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
                    <table class="table table-bordered table-hover " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="">No</th>
                        <th scope="col" class="">Nama</th>
                        <th scope="col" class="">NIP</th>
                        <th scope="col" class="">Password</th>
                        <th scope="col" class="">Status</th>
                        <th scope="col" class="">Jabatan</th>
                        <th scope="col" class="">Nomor Telpon</th>
                        <th scope="col" class="">Bagian</th>
                        <th scope="col" class="">Sub Bagian</th>
                        <th scope="col" class="">Urusan</th>
                        <th scope="col" class="">Jabatan</th>
                        <th scope="col" class="">Aktif</th>
                        <th scope="col" class="">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($pegawai as $u){ 
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u->Nama ?></td>
                            <td><?php echo $u->NIP ?></td>
                            <td><?php echo $u->password ?></td>
                            <td><span 
                                <?php if($u->Status == 'Dosen'){ ?>
                                    class="text-success"
                                <?php }else if($u->Status == 'Staff'){ ?>
                                    class="text-info"
                                <?php }else{ ?>
                                    class="text-warning"
                                <?php } ?>
                            
                                ><?php echo $u->Status ?></span></td>
                            <td><?php echo $u->Pangkat ?></td>
                            <td><?php echo $u->No_Telp ?></td>
                            <td><?php echo $u->Bagian ?></td>
                            <td><?php echo $u->Sub_Bagian ?></td>
                            <td><?php echo $u->Urusan ?></td>
                            <td><?php echo $u->jabatan ?></td>
                            <td><span 
                                <?php if($u->stat == 'aktif'){ ?>
                                    class="text-success"
                                <?php }else{ ?>
                                    class="text-danger"
                                <?php } ?>
                            
                                ><?php echo $u->stat ?></span></td>
                            <td class="sorting_1" style="">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                <a href="<?php echo site_url('operator/update_pegawai/'.$u->NIP); ?>" type="button" class="btn btn-white" title="Edit Data Pegawai">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="<?php echo site_url('operator/hapusPegawai/'.$u->NIP); ?>" onclick="return deletechecked();" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus Data Pegawai">
                                    <i class="material-icons">delete</i>
                                </a>
                                </div>
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

</script>


