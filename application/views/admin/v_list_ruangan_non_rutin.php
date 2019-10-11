 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
    <!-- alert -->

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Inventaris</span>
            <h3 class="page-title">Ruangan Non Rutin</h3>
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
            <a href="<?php  echo base_url('admin/tambah_ruangan'); ?>" type="submit" class="form-control btn btn-primary text-center text-white"  style="float:center">
                <i class="material-icons">add</i>Tambah
               
            </a>      
            <a href="<?php  echo base_url('admin/import_jadwal_kuliah'); ?>" type="submit" class="form-control btn btn-primary text-center text-white" style="float:center">
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
                <div class="card card-small">
                  <div class="card-header border-bottom">
                  <div class="row  py-2">
                      <div class="col-sm-3 text-center text-sm-left mb-0">
                        <h6 class="m-0">List Ruangan Non Rutin</h6>
                      </div>
                      <div class="col  text-center text-sm-right mb-0">
                        <div id="export"></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
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
                            <table class="table table-bordered table-hover " id="pegawai" style="width:100%">
                            <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                                <tr>
                                    <th scope="col" class="">No</th>
                                    <th scope="col" class="">Ruangan</th>
                                    <th scope="col" class="">Aksi</th>
                                </tr>
                            </thead>
                           <tr>
                               <td>1</td>
                               <td>Aula</td>
                               <td>
                               <a  href="#" type="button" class="btn btn-white" title="Edit Ruangan">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a  href="#" type="button" class="btn btn-white" onclick="return deletechecked();" title="hapus ruangan">
                                    <i class="material-icons">delete</i>
                                </a>   
                               </td>
                           </tr>
                           <tr>
                               <td>1</td>
                               <td>Lobby</td>
                               <td>
                               <a title="update Ruangan" href="#" type="button" class="btn btn-white" title="Edit Ruangan">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" type="button" class="btn btn-white" onclick="return deletechecked();" title="hapus ruangan">
                                    <i class="material-icons">delete</i>
                                </a>   
                               </td>
                           </tr>
                           <tr>
                               <td>1</td>
                               <td>Lapangan</td>
                               <td>
                               <a href="#" type="button" class="btn btn-white" title="Edit Ruangan">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus Ruangan">
                                    <i class="material-icons">delete</i>
                                </a>   
                               </td>
                           </tr>
                            </table>
                        </div>
            
                    </div>
                  </div>
                </div>
              </div>
           
            <!-- End Default Dark Table -->
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
                filename: "Ruangan",
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
                filename: "Ruangan",
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


