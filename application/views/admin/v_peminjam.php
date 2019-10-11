 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
    <!-- alert -->

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Peminjaman</span>
            <h3 class="page-title">Ruangan Rutin</h3>
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <form hidden action="#"  method="get" style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
        <select  name="bln1" class="custom-select custom-select-sm" style="max-width: 130px;">
                <option value="1" selected>Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">november</option>
                <option value="12">Desember</option>
            </select>
            <select name="bln2" class="custom-select custom-select-sm" style="max-width: 130px;">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">november</option>
                <option value="12" selected>Desember</option>
            </select>
            <select name="tahun" class="custom-select custom-select-sm" style="max-width: 130px;">
                <?php
                $mulai= date('Y') ;
                for($i = $mulai;$i>$mulai - 50;$i--){
                $sel = $i == date('Y') ? ' selected="selected"' : '';
                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                }
                ?>
            </select>              
            <button  type="submit" class="input-group-append form-control btn btn-white" style="max-width: 40px;">
                <i class="material-icons">search</i>
            </button>
        </div>
        </form>
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
                        <h6 class="m-0">List Peminjaman</h6>
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
                        <div class="" style="overflow-x:auto; ">
                            <table class="table mb-0 " id="pegawai" style="width:100%">
                            <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                                <tr>
                                    <th scope="col" class="">No</th>
                                    <th scope="col" class="">ID Peminjaman</th>
                                    <th scope="col" class="">ID Peminjam</th>
                                    <th scope="col" class="">Nama Peminjam</th>
                                    <th scope="col" class="">Tanggal Peminjaman</th>
                                    <th scope="col" class="">Ruangan</th>
                                    <th scope="col" class="">Jam</th>
                                    <th scope="col" class="">Status</th>
                                    <th scope="col" class="">Validasi</th>
                                </tr>
                            </thead>
                           <tr>
                               <td>1</td>
                               <td>rutin1</td>
                               <td>155150201111309</td>
                               <td>Minari</td>
                               <td>29-09-2018</td>
                               <td>E12</td>
                               <td>07:00 - 09:30</td>
                               <td>pending</td>
                               <td>
                                        <a type="button" class="mb-2 btn btn-sm btn-outline-success mr-1" title="Edit Peminjaman" href="<?php echo base_url('mahasiswa/edit_peminjaman'); ?>">
                                          <i class="material-icons">setuju</i>
                                        </a>
                                        <a type="button" class="mb-2 btn btn-sm btn-outline-warning mr-1" title="Hapus Peminjaman" data-toggle="modal" data-target="#modal_hapus_peminjaman">
                                          <i class="material-icons">pending</i>
                                        </a>
                                        <a type="button" class="mb-2 btn btn-sm btn-outline-danger mr-1" title="Hapus Peminjaman" data-toggle="modal" data-target="#modal_hapus_peminjaman">
                                          <i class="material-icons">tolak</i>
                                        </a>
                               </td>
                           </tr>
                           <tr>
                               <td>2</td>
                               <td>rutin2</td>
                               <td>155150201111903</td>
                               <td>sihotang</td>
                               <td>29-09-2018</td>
                               <td>E13</td>
                               <td>07:00 - 09:30</td>
                               <td>
                               <a title="update Peminjaman" href="#" type="button" class="btn btn-white" title="Edit Peminjaman">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" type="button" class="btn btn-white" onclick="return deletechecked();" title="hapus Peminjaman">
                                    <i class="material-icons">delete</i>
                                </a>   
                               </td>
                           </tr>
                           <tr>
                               <td>3</td>
                               <td>rutin3</td>
                               <td>155150201111903</td>
                               <td>mawar</td>
                               <td>29-09-2018</td>
                               <td>F35</td>
                               <td>07:00 - 09:30</td>
                               <td>
                               <a title="update Peminjaman" href="#" type="button" class="btn btn-white" title="Edit Peminjaman">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" type="button" class="btn btn-white" onclick="return deletechecked();" title="hapus Peminjaman">
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


