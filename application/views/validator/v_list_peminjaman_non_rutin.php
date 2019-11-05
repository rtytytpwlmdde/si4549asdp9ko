 <!-- / .main-navbar -->
 <?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

 <div class="main-content-container container-fluid ">
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
    
            <!-- End Page Header -->
            <!-- Default Light Table -->
    <div class="row">
    <div class="col ">
        <div class="bg-white ">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0 py-1">Validasi Peminjaman Non Kelas</h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
               
            </div>
            </div>
        </div>
        <div class="">
        <div class="row border-bottom  py-1">
            <div class="col-sm-6 text-center text-sm-left mb-0">
                <form action="<?php echo base_url('validator/peminjaman_non_rutin/'); ?>" method="post"> 
                    <div class="btn-group " >
                        <input id="search_inp" name="cari"  class="custom-select-sm input-sm form-control"  placeholder="Search id, tgl, agenda"  type="text" value="" >
                        <input type="date" name="tglMulai" class="custom-select custom-select-sm" >
                        - 
                        <input type="date" name="tglSelesai" class="custom-select custom-select-sm" >

                        <input type="submit" name="searchSubmit" class="btn btn-sm btn-secondary" value="Search">
                    </div>
                </form>
                    
            </div>
            <div class="col  text-center text-sm-right mb-0">
            
                <div class="btn-group">
                    <form action="<?php echo base_url('validator/peminjaman_non_rutin/'); ?>" method="post"> 
                        <input type="submit" name="semuaSubmit" class="input-group-append form-control btn btn-primary dropdown-toggle" value="Semua"> 
                    </form>
                    <button type="button" class="input-group-append form-control btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">tune</i>
                    </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="dropdown-item" action="<?php echo base_url('validator/peminjaman_non_rutin/'); ?>" method="post"> 
                                <input hidden type="text" name="cari" value="setuju"> 
                                <input type="submit" name="searchSubmit" class="btn btn-sm btn-success text-white" value="Setuju"> 
                            </form>
                            <form class="dropdown-item" action="<?php echo base_url('validator/peminjaman_non_rutin/'); ?>" method="post"> 
                                <input hidden type="text" name="cari" value="terkirim"> 
                                <input type="submit" name="searchSubmit" class="btn btn-sm btn-warning text-white" value="Terkirim"> 
                            </form>
                            <form class="dropdown-item" action="<?php echo base_url('validator/peminjaman_non_rutin/'); ?>" method="post"> 
                                <input hidden type="text" name="cari" value="tolak"> 
                                <input type="submit" name="searchSubmit" class="btn btn-sm btn-danger text-white" value="Tolak"> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" pt-0 py-1">    
        
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; min-width:100%;">
                <table class="table table-bordered table-hover  " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="border-0">No</th>
                        <th scope="col" class="border-0">Kode Booking </th>
                        <th scope="col" class="border-0">Nama</th>
                        <th scope="col" class="border-0">Tanggal Pengajuan</th>
                        <th scope="col" class="border-0">Tanggal Penggunaan</th>
                        <th scope="col" class="border-0">Sarana Prasarana</th>
                        <th scope="col" class="border-0">Jam</th>
                        <th scope="col" class="border-0">Jenis</th>
                        <th scope="col" class="border-0">Status</th>
                        <th scope="col" class="border-0">Status Wakadek</th>
                        <th scope="col" class="border-0">Tukang Validasi</th>
                        <th scope="col" class="border-0">Aksi</th>
						<th scope="col" class="border-0">Notifikasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = (int)$this->uri->segment('3') + 1;
                        foreach ($peminjaman_non_rutin as $u){ ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <a  href="<?php echo site_url('validator/detail_peminjaman/'.$u->id_peminjaman_non_rutin.'/non_rutin'); ?>" >
                                <span class="text-primary font-weight-bold"> <?php echo $u->id_peminjaman_non_rutin ?></span>
                                </a>
                            </td>
                            <td>
                                <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                                <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
								<?php foreach ($pegawai as $a){if ($a->username == $u->id_peminjam) :echo $a->username;endif;}  ?>
                       
                            </td>
                            <td><?php echo date("d-m-Y", strtotime($u->tanggal_peminjaman));?></td>
                            <td><?php echo date("d-m-Y", strtotime($u->tanggal_pemakaian));?> </td>
                            <td>
                                <?php 
                                $i=1;
                                $last = null;
                                foreach ($ruangan_non_rutin as $pnr){
                                    if($u->id_peminjaman_non_rutin == $pnr->id_peminjaman_non_rutin){
                                        if($i == 1 ){
                                            echo "- ".$pnr->ruangan ?> <br><?php   
                                            $last = $pnr->id_ruangan;
                                        }else{
                                            if($last != $pnr->id_ruangan){
                                                echo "- ".$pnr->ruangan ?> <br><?php   
                                                $last = $pnr->id_ruangan;
                                            }
                                        }
                                        $i++;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                if (strlen($u->jam_mulai_peminjaman) == 1){
                                    echo "0".$u->jam_mulai_peminjaman.":00"; 
                                }else{
                                    echo $u->jam_mulai_peminjaman.":00"; 
                                }
                                
                                ?> - 
                                <?php
                                if (strlen($u->jam_selesai_peminjaman) == 1){
                                    echo "0".$u->jam_selesai_peminjaman.":59"; 
                                }else{
                                    echo $u->jam_selesai_peminjaman.":59"; 
                                } 
                                ?>
                            </td>
                            <td> <span class="text-dark"><?php echo "non rutin" ?></span></td>
                            <td>
                                <span 
                                    <?php if($u->status == 'terkirim'){ ?>
                                        class="text-warning"
                                    <?php }else if($u->status == 'tolak'){ ?>
                                        class="text-danger"
                                    <?php }else if($u->status == 'setuju'){ ?>
                                        class="text-success"
                                    <?php } else{ ?>
                                        class="text-secondary"
                                    <?php } ?>
                                ><?php echo $u->status ?></span>
                            </td>
							<td>
                                <span 
                                    <?php if($u->status_wakadek == 'terkirim'){ ?>
                                        class="text-warning"
                                    <?php }else if($u->status_wakadek == 'tolak'){ ?>
                                        class="text-danger"
                                    <?php }else if($u->status_wakadek == 'setuju'){ ?>
                                        class="text-success"
                                    <?php } else{ ?>
                                        class="text-secondary"
                                    <?php } ?>
                                ><?php echo $u->status_wakadek ?></span>
                            </td>
                            <td><?php echo $u->nip_validator?></td>
                            
							
                             <td class="sorting_1" style="">
								<a href="<?php 								
														if($u->status == '1' ){
															if($u->status_wakadek == 'setuju'){
																echo site_url('validator/validasi/'.$u->id_peminjaman_non_rutin.'/'.$u->id_peminjam.'/setuju');
																
															}else {
																echo '#';
																
															}
														}else {
															echo site_url('validator/validasi/'.$u->id_peminjaman_non_rutin.'/'.$u->id_peminjam.'/setuju');
															
														}
												?>"  class="btn btn-primary " title="Setuju Peminjaman">
                                    <i class="material-icons">check</i>
                                </a>
                                <a data-toggle="modal" class="btn btn-danger text-white open-modal_tolak" href="#modal_tolak" data-id_peminjaman="<?= $u->id_peminjaman_non_rutin; ?>" data-id_peminjam="<?= $u->id_peminjam; ?>" title="Tolak Peminjaman">
                                    <i class="material-icons">close</i>
                                </a>
                            </td>
							
						
							
							<td class="sorting_1" style="">
                                    <?php if($u->status == 'tolak'){ ?>
                                       <a href="https://api.whatsapp.com/send?phone=<?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->telpon;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->No_Telp;endif;}  ?>&
																			text=Untuk Saudara <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?> 
																			Mohon maaf, Booking Ruangan anda *TIDAK DISETUJUI*. Dengan keterangan sebagai berikut%20%3A
																			%0ANama%20%3A <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?> 
																			%0AKode Booking%20%3A <?php echo $u->id_peminjaman_non_rutin ?>
																			%0ARuangan%20%3A 
																			<?php 
																										$i=1;
																										foreach ($ruangan_non_rutin as $pnr){
																											if($u->id_peminjaman_non_rutin == $pnr->id_peminjaman_non_rutin){
																												foreach ($ruangan as $a){if ($a->id_ruangan == $pnr->id_ruangan) :echo $i.") ".$a->ruangan ?> %0A<?php ;endif;}  
																												$i++;
																											}
																										}
																										?>
																			%0AJam%20%3A <?php 
																									if (strlen($u->jam_mulai_peminjaman) == 1){
																										echo "0".$u->jam_mulai_peminjaman.":00"; 
																									}else{
																										echo $u->jam_mulai_peminjaman.":00"; 
																									}
																									
																									?> - 
																									<?php
																									if (strlen($u->jam_selesai_peminjaman) == 1){
																										echo "0".$u->jam_selesai_peminjaman.":00"; 
																									}else{
																										echo $u->jam_selesai_peminjaman.":00"; 
																									} 
																							?>
																			%0ATanggal%20%3A <?php echo date("d-m-Y", strtotime($u->tanggal_pemakaian));?>
																			%0ACatatan Penolakan%20%3A <?php foreach ($catatan as $a){if ($a->id_peminjaman == $u->id_peminjaman_non_rutin) :echo $a->catatan_penolakan;endif;}?>
																			%0A%0APengirim%0AAdmin Manajemen Ruangan
																			" 
																			
																			target="_blank"  title="Kirim Pesan WA">
                                                                            <i class="fab fa-whatsapp-square text-danger" style="font-size:40px"></i>
                                </a>
                                    <?php }else if($u->status == 'setuju'){ ?>
                                        <a href="https://api.whatsapp.com/send?phone=<?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->telpon;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->No_Telp;endif;}  ?>&
																			text=Untuk Saudara <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?> 
																			Selamat, Booking Ruangan anda telah *BERHASIL*. Dengan keterangan sebagai berikut%20%3A
																			%0ANama%20%3A <?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}?>
																			<?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?> 
																			%0AKode Booking%20%3A <?php echo $u->id_peminjaman_non_rutin ?>
																																					%0ARuangan%20%3A <?php 
																										$i=1;
																										foreach ($ruangan_non_rutin as $pnr){
																											if($u->id_peminjaman_non_rutin == $pnr->id_peminjaman_non_rutin){
																												foreach ($ruangan as $a){if ($a->id_ruangan == $pnr->id_ruangan) :echo $i.") ".$a->ruangan ?> %0A<?php ;endif;}  
																												$i++;
																											}
																										}
																										?>
																			%0AJam%20%3A <?php 
																									if (strlen($u->jam_mulai_peminjaman) == 1){
																										echo "0".$u->jam_mulai_peminjaman.":00"; 
																									}else{
																										echo $u->jam_mulai_peminjaman.":00"; 
																									}
																									
																									?> - 
																									<?php
																									if (strlen($u->jam_selesai_peminjaman) == 1){
																										echo "0".$u->jam_selesai_peminjaman.":00"; 
																									}else{
																										echo $u->jam_selesai_peminjaman.":00"; 
																									} 
																								?>
																			%0ATanggal%20%3A <?php echo date("d-m-Y", strtotime($u->tanggal_pemakaian));?>
																			%0A%0APengirim%0AAdmin Manajemen Ruangan
																			" 
																			
																			target="_blank" class="" title="Kirim Pesan WA">
                                                                            <i class="fab fa-whatsapp-square text-success" style="font-size:40px"></i>
                                </a>
                                    <?php } else{ ?>
                                        
                                    <?php } ?>
                                
                                
                            </td>
                        </tr> 
                            <?php } ?>
                    
                    </tbody>
                </table>
                    </div>
                    <?php  echo $this->pagination->create_links(); ?>
            </div>
        </div>
        </div>
    </div>
    </div>

        <!-- End Default Dark Table -->
    </div>



          <script type="text/javascript">


var table = $('#pegawsai').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        responsive: true,
        paging: true,
        stateSave: true,
        processing: true,        
        
        scrollCollapse: true,
        dom: 'frtip<"clear">l',
    "columnDefs": [{
      className: "dt-right",
    }],
        

    });
    
    
    $('.dataTables_paginate').addClass('btn rounded text-white text-center p-1');
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



<div class="modal fade " data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modal_tolak">
  <div class="modal-dialog full-screen modal-dialog-centered " role="document"  style="min-width:80%;">
    <div class="modal-content" style="min-width:80%; " >
        <div class="modal-header">
            
        <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penalokan Pengajuan Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" >
        <div class="row">
              <div class="col-lg-12">
                <div class=" mb-4">
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'validator/tolakPeminjaman'; ?>" method="POST">
                          
                          <div class="form-group modal-asd">
                            <label for="feInputAddress">Catatan Penolakan</label>
                              <input  name="catatan_penolakan" type="text"  class="form-control" id="feInputAddress" value=""> 
                              <input  hidden name="id_peminjaman" id="id_peminjaman" >
                              <input hidden  name="id_peminjam" id="id_peminjam" >
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
        <a type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-accent">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

 
<script>
$(document).on("click", ".open-modal_tolak", function () {
     var id_peminjaman = $(this).data('id_peminjaman');
     $(".modal-asd #id_peminjaman").val( id_peminjaman );
     var id_peminjam = $(this).data('id_peminjam');
     $(".modal-asd #id_peminjam").val( id_peminjam );
});
</script>


