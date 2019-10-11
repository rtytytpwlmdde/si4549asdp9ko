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
   
<?php 
    $no = 1;
    $Nama = '';
    $id_dosen = '';
    foreach ($peminjam_pegawai as $b){ 
        $Nama = $b['Nama'];
        $id_dosen = $b['NIP'];
    }
    $n = $Nama;
    $np = $id_dosen;
?>
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
		<span></spam>
            <h3 class="page-title">Data Peminjaman Pegawai Perbulan</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
            <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
                <a href="<?php echo base_url('operator/detail_peminjam/'.$np); ?>" class="btn btn-white "> <i class="material-icons">apps</i> Tampilkan Semua </a>
                <a href="#" class="btn btn-white active">
                    <i class="material-icons">date_range</i> Tampilkan Perbulan </a>
            </div>
        </div>
	
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
        <form  action="<?php echo site_url('operator/perbulan_pegawai_filter');?>"  method="get" style="float:right" >
		<div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
			<input hidden name="id_peminjam" type="text" value=<?php echo $np ?>>
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
                <h6 class="m-0"><?php echo $n?></h6>
                <p class="m-0"><?php echo $np?></p>
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
                <select id="data_length" class="custom-select custom-select-sm" style="max-width: 80px;">
                    <option selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="-1">All</option>
                </select>
                </div>
            </div><br>
            
            <div class="main-content-container   ">
            <div class="table-responsive-md table-striped">
            <table class="table mb-0 " id="pegawai" style="width:100%;">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0">No</th>
                    <th scope="col" class="border-0">Bulan</th>
                    <th scope="col" class="border-0">Tahun</th>
                    <th scope="col" class="border-0">Jumlah Peminjaman</th>
                    <th scope="col" class="border-0">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($peminjam_pegawai as $u){ 
                    ?>
                <tr>
                    <td scope="row"><?php echo $no++ ?></td>
                    <td><?php 
                        $id_peminjam = $u['id_peminjam'];
                        $bulan = $u['bulan'];
                        $tahun = $u['tahun'];
                        $dt = DateTime::createFromFormat('!m', $u['bulan']);
                        echo $dt->format('F');
                        ?>
                    </td>
                    <td><?php 
                        $thn = DateTime::createFromFormat('!y', $u['tahun']);
                        echo $thn->format('Y');
                        ?>
                    </td>
                    <td><?php echo $u['jumSurat'] ?></td>
                    <td>
                    <a class="btn btn-sm btn-white" data-toggle="modal" data-target="#modal_edit<?php echo $id_dosen;?><?php echo $bulan;?><?php echo $tahun;?>" title="Tampilkan surat tugas di bulan ini"> Open</a>	
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
                filename: "Surat Tugas",
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
                filename: "Surat Tugas",
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
    
    
    $('.dt-button').addClass('btn btn-sm btn-outline-info mr-1 rounded  text-center p-1');
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
<?php 
   
   foreach($peminjam_pegawai as $i):
   
    $id_peminjam=$i['NIP'];
    $bulanModal=$i['bulan'];
    $tahunModal=$i['tahun'];
    $dt = DateTime::createFromFormat('!m', $bulanModal);
    $thn = DateTime::createFromFormat('!y', $tahunModal);
   
   ?>
        

<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_edit<?php echo $id_peminjam;?><?php echo $bulanModal;?><?php echo $tahunModal;?>">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
            
        <h5 class="modal-title" id="exampleModalLongTitle">Rincian Rekap Peminjaman[<?php echo $dt->format('F');?> - <?php echo $thn->format('Y');?> ]</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
            <div class="row">
            <div class="col-lg-5 ">
            <table class="table table-sm borderless " style="text-align:left;">
                <tbody class="">
                    <tr>
                        <td class="">Nama</td>
                        <td class="">: <?php echo $i['Nama']?></td>
                    </tr>
                    <tr>
                        <td class="">NIP</td>
                        <td class="">: <?php echo $i['NIP']?></td>
                    </tr>
                    <tr>
                        <td class="">Status </td>
                        <td class="">: <?php echo $i['Status'] ?> </td>
                    </tr>
                    
                    <tr>
                        <td class="">Pangkat </td>
                        <td class="">: <?php echo $i['Pangkat'] ?> </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-lg-2 " ></div>
            <div class="col-lg-5 ml-auto ">
           
            </div>
            </div>
            <div class="card-body p-0 ">
            <table class="table table-sm  " >
                <thead style="text-align:left;">
                    <tr>
                        <th>No</th>
                        <th >Kode Booking </th>
						<th >Tanggal Peminjaman</th>
						<th >Jenis</th>
                        <th >Sarana</th>
                        <th >Status</th>
                        <th >Catatan</th>
                    </tr>
                </thead>
                <tbody style="text-align:left;">
                <?php 
                $no = 1;
                foreach ($detail_pegawai as $s){
                    $bln =  $s['bulan'];
                    $th =  $s['tahun'];
                    if($bulanModal == $bln && $tahunModal == $th){
                ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $s['id_peminjaman'] ?></td>
					 
                    <td><?php echo date("d/m/Y", strtotime($s['tanggal_peminjaman']));?></td>
                    <td><?php echo $s['jenis_peminjaman'] ?></td>
                  <td> 
                            <?php if ($s['jenis_peminjaman'] == 'rutin'){ 
                                foreach ($peminjaman_rutin as $pr){ 
                                    if($s['id_peminjaman'] == $pr['id_peminjaman_rutin']){ 
                                    echo $pr['ruangan'];
                                    }
                                }
                                }else if($s ['jenis_peminjaman'] == 'non rutin' ){ 
                                    foreach ($detail_peminjaman_non_rutin as $cr7){ 
                                        if($s['id_peminjaman']== $cr7['id_peminjaman_non_rutin']){ 
                                            echo $cr7['ruangan']; ?> <br><?php
                                        }
                                    }
                                } else{ 
                                    foreach ($detail_peminjaman_barang as $cs){ 
                                        if($s['id_peminjaman'] == $cs['id_peminjaman_barang']){ 
                                            echo $cs['nama_barang']; ?> <br><?php
                                        }
                                    }
                                } ?>
                        </td>
                    <td><?php echo $s['status_peminjaman'] ?></td>
					<td><?php echo $s['catatan_penolakan'] ?></td>
					
                </tr>
                    
                <?php }} ?>
                </tbody>
                
                <tfoot>
                    <th scope="row" colspan="8" style="text-align:right;">Jumlah Peminjaman </th>
                    <th style="text-align:center;"><?php echo $no-1 ?></th>
                </tfoot>
            </table>
            </div>
        </div>
       
        
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
		<a type="button" class="btn btn-sm btn-primary" href="<?php echo site_url('operator/excelsuratpegawaiperbulan/'.$id_peminjam.'/'.$bulanModal.'/'.$thn->format('Y') ) ?>"><i class="fa fa-print"></i> Print</a>
      
       </div>
    </div>
  </div>
</div>

 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->

<?php 
   
   foreach($detail_pegawai as $u):
   
    $nosuratModal=$u['id_peminjam'];
   
   ?>
        

<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_surat<?php echo $nosuratModal?>">
  <div class="modal-dialog  modal-dialog-centered " role="document" >
    <div class="modal-content" style="min-width:50%">
        <div class="modal-header">
        <strong class="text-info d-block mb-2"><i class="material-icons">info_outline</i> Info</strong>
        </div>
        <div class="modal-body" >
            <div class="card-body p-0 ">
           
        <p class="modal-title" id="exampleModalLongTitle">NIP<?php echo $nosuratModal ?> Tidak Mempunyai Rekap Peminjaman</p>
            </div>
        </div>
        <div class="modal-footer">
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>

 
    <?php endforeach;?>


