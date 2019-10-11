 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
    <!-- alert -->

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Rekap</span>
            <h3 class="page-title">Peminjaman</h3>
			
        </div>
		<div class="col-12 col-sm-0 text-center text-sm-right mb-4 mb-sm-6">
                <div class="btn-group " >
                    <a href="<?php echo base_url('admin/peminjaman_rutin_filter/rutin'); ?>" class="btn btn-warning text-white"> Rutin </a>
                    <a href="<?php echo base_url('admin/peminjaman_non_rutin_filter/'); ?>" class="btn btn-success text-white">Non Kelas </a>
                     <a href="<?php echo base_url('admin/peminjaman_rutin_filter/barang'); ?>" class="btn btn-danger text-white">Sarana dan Prasarana </a>
                </div>
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
                        <h6 class="m-0">Rekap Peminjaman Semua</h6>
                      </div>
                    <div hidden class="col-12 col-sm-4 d-flex align-items-center">
                    
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
                            <table class="table mb-0 " id="pegawai" style="width:100%">
                            <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                                <tr>
                                    <th scope="col" class="border-0">No</th>
                                    <th scope="col" class="border-0">Kode Booking</th>
                                    <th scope="col" class="border-0">Nama</th>
									<th scope="col" class="border-0">Nama Kegiatan</th>
                                    <th scope="col" class="border-0">Tanggal Peminjaman</th>
                                    <th scope="col" class="border-0">Jenis</th>
									<th scope="col" class="border-0">Sarana dan Prasarana</th>
									<th scope="col" class="border-0">Nama Validator</th>
									
                                </tr>
                            </thead>
                          <tbody>
							<?php 
								$no = 1;
								foreach ($peminjaman as $u){ 
								?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $u->id_peminjaman ?></td>
									<td>
                            <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
                        </td>
						<td> 
                            <?php if($u->jenis_peminjaman == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ 
                                    echo $pr->keterangan;
                                    }
                                }
                                }else if($u->jenis_peminjaman == 'non rutin'){ 
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nama_agenda; ?> <br><?php
                                        }
                                    }
                                }else if($u->jenis_peminjaman == 'khusus'){ 
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nama_agenda; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($peminjaman_barang as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_barang){ 
                                            echo $pb->nama_agenda; ?> <br><?php
                                        }
                                    }
                                } ?>
                        </td>
									<td><?php echo $u->tanggal_peminjaman ?></td>
									<td><?php echo $u->jenis_peminjaman ?></td>
									<td> 
                            <?php if($u->jenis_peminjaman == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($u->id_peminjaman == $pr->id_peminjaman_rutin){ 
                                    echo $pr->ruangan;
                                    }
                                }
                                }else if($u->jenis_peminjaman == 'non rutin'){ 
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->ruangan; ?> <br><?php
                                        }
                                    }
                                }else if($u->jenis_peminjaman == 'khusus'){ 
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->ruangan; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($peminjaman_barang as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_barang){ 
                                            echo $pb->nama_barang; ?> <br><?php
                                        }
                                    }
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
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                }else if($u->jenis_peminjaman == 'khusus'){ 
                                    foreach ($peminjaman__non_rutin as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_non_rutin){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($peminjaman_barang as $pb){ 
                                        if($u->id_peminjaman == $pb->id_peminjaman_barang){ 
                                            echo $pb->nip_validator; ?> <br><?php
                                        }
                                    }
                                } ?>
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
        scrollX:        true,
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


