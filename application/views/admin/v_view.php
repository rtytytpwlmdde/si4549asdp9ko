 <!-- / .main-navbar -->   
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Jadwal Kuliah</span>
            <h3 class="page-title">Data Jadwal Kuliah</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
        
		</div>
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <div  style="float:right" >
        <div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
        <a  href="<?php  echo base_url('index.php/siswa/form"'); ?>" type="submit" class="form-control btn btn-primary text-center text-white" style="float:center">
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
                <h6 class="m-0">Tabel Mata Kuliah</h6>
            </div>
            
            </div>
        </div>     
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; ">
                    <table class="table table-bordered table-hover " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="">ID Jadwal KUliah</th>
                        <th scope="col" class="">Hari</th>
                        <th scope="col" class="">ID Jam Kuliah</th>
                        <th scope="col" class="">Kode Matakuliah</th>
                        <th scope="col" class="">Kelas</th>
                        <th scope="col" class="">ID Ruangan</th>
                        <th scope="col" class="">ID Dosen</th>
                        <th scope="col" class="">ID Jurusan</th>
                        <th scope="col" class="">ID Prodi</th>
                        <th scope="col" class="">ID Semester</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
	                if( ! empty($siswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	            	foreach($siswa as $data){ // Lakukan looping pada variabel siswa dari controller
			        echo "<tr>";
			        echo "<td>".$data->id_jadwal_kuliah."</td>";
			        echo "<td>".$data->hari."</td>";
			        echo "<td>".$data->id_jam_kuliah."</td>";
			        echo "<td>".$data->kode_matkul."</td>";
			        echo "<td>".$data->kelas."</td>";
			        echo "<td>".$data->id_ruangan."</td>";
			        echo "<td>".$data->id_dosen."</td>";
			        echo "<td>".$data->id_jurusan."</td>";
			        echo "<td>".$data->id_prodi."</td>";
			        echo "<td>".$data->id_semester."</td>";
			        echo "<td>".$data->status."</td>";
			        echo "</tr>";
		        }
	            }else{ // Jika data tidak ada
		            echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	            }
	        ?>
	</table>
</body>
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


