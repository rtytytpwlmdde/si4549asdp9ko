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
    <div class="page-header row no-gutters py-2">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <h3 class="page-title">History Peminjaman</h3>
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
        <div class="bg-white  ">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel History  Peminjaman</h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <div id="export"></div>
            </div>
        </div>
        <div class="row  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <input id="search_inp" class="input-sm form-control text-sm-left"  placeholder="Search"  type="text">
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
        </div>
        </div>
        <div class=" pt-0">
        
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; min-width:100%;">
                <table class="table table-bordered table-hover " id="pegawai" >
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="">No</th>
                        <th scope="col" class="">Kode Booking </th>
                        <th scope="col" class="">Tanggal Peminjaman</th>
                        <th scope="col" class="">Jenis</th>
                        <th scope="col" class="">Sarana</th>
                        <th scope="col" class="">Status</th>
                        <th scope="col" class="">Status Wakil Dekan</th>
                        <th scope="col" class="">Catatan</th>
						<th scope="col" class="">Nama Validasi</th>
                        <th scope="col" class="">Batalkan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach ($peminjaman as $u){ 
                        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><a href="<?php echo base_url(). 'mahasiswa/detail_peminjaman/'.$u->id_peminjaman.'/'.$u->jenis_peminjaman; ?>"><?php echo $u->id_peminjaman ?></a></td>
						
                        <td><?php echo date("d-m-Y", strtotime($u->tanggal_peminjaman));?></td>
                        <td> <span 
                                <?php if($u->jenis_peminjaman == 'rutin'){ ?>
                                    class="text-primary"
                                <?php }else if($u->jenis_peminjaman == 'non rutin'){ ?>
                                    class="text-dark"
                                <?php }else if($u->jenis_peminjaman == 'khusus'){ ?>
                                    class="text-warning"
                                <?php } else{ ?>
                                    class="text-muted"
                                <?php } ?>
                            ><?php echo $u->jenis_peminjaman ?></span>
                        </td>
                        <td> 
                            <?php if($u->jenis_peminjaman == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ 
                                    echo $pr->ruangan;
                                    }
                                }
                                }else if($u->jenis_peminjaman == 'non rutin'){ 
                                    foreach ($detail_peminjaman_non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->ruangan; ?> <br><?php
                                        }
                                    }
                                }else if($u->jenis_peminjaman == 'khusus'){ 
                                    foreach ($detail_peminjaman_non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->ruangan; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($detail_peminjaman_barang as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_barang){ 
                                            echo $pb->nama_barang; ?> <br><?php
                                        }
                                    }
                                } ?>
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
                            ><?php 
								echo $u->status_peminjaman;
							?></span>
                        </td>
						<td>
                            <span 
                                <?php if($u->status_peminjaman_wakadek == 'terkirim'){ ?>
                                    class="text-warning"
                                <?php }else if($u->status_peminjaman_wakadek == 'tolak'){ ?>
                                    class="text-danger"
                                <?php }else if($u->status_peminjaman_wakadek == 'setuju'){ ?>
                                    class="text-success"
                                <?php } else{ ?>
                                    class="text-secondary"
                                <?php } ?>
                            ><?php 
								echo $u->status_peminjaman_wakadek;
							?></span>
                        </td>
                        <td>
                            <?php 
                            if($u->status_peminjaman == 'tolak'){
                            echo $u->catatan_penolakan;
                            } ?>
                        </td>
						<td> 
                            <?php if($u->jenis_peminjaman == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ 
                                    echo $pr->nip_validator;
                                    }
                                }
                                }else if($u->jenis_peminjaman == 'non rutin'){ 
                                    foreach ($detail_peminjaman_non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                }else if($u->jenis_peminjaman == 'khusus'){ 
                                    foreach ($detail_peminjaman_non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($detail_peminjaman_barang as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_barang){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                } ?>
                        </td>
                        <td class="sorting_1" style="">
                            <?php if($u->status_peminjaman == "setuju" || $u->status_peminjaman == "tolak"){ ?>
                                <a href=""  class="mb-2 btn btn-sm btn-outline-warning mr-1" onclick="return tidak_dapat_batal();" title="Batalkan Peminjaman">
                                <i class="material-icons">cancel</i>
                            </a>
                            <?php }else{ ?>

                            <a href="<?php echo site_url('mahasiswa/batal_peminjaman/'.$u->id_peminjaman.'/'.$u->id_peminjam); ?>"  class="mb-2 btn btn-sm btn-outline-warning mr-1" onclick="return batal();" title="Batalkan Peminjaman">
                                <i class="material-icons">cancel</i>
                            </a>
                            <?php }
                                ?>
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

   function batal()
    {
        if(confirm("Serius ingin membatalkan peminjaman? Batal akan langsung menghapus peminjaman"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }

   function tidak_dapat_batal()
    {
        if(confirm("Perminjaman tidak dapat dibatalkan lagi"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }
</script>


