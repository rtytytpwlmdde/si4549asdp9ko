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
    <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Peminjaman</span>
        <h3 class="page-title">Sarana Prasana</h3>
    </div>
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
    <div class="  text-center text-sm-right mb-0"><br>
        <?php foreach ($peminjaman_barang as $a){ ?>
        <a  class="mb-2 btn btn-sm btn-outline-primary mr-1" style="max-width:100px" href="<?php echo base_url('Pdfs/save_pdf_peminjaman/'.$a->id_peminjaman_barang.'/barang') ?>"> <i class="material-icons">print</i> Print </a>   
        <?php } ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <!-- Add New Post Form -->
        <div class="mb-3">
        <div class="">
            <p class="mb-4">Data Peminjaman Sarana Prasarana </p>
            <div class=" alert alert-accent alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                <strong class="text-white">Perhatian! Tambahkan Barang yang akan digunakan selama status peminjaman masih "pending" </strong>   <br>
                <strong class="text-white">Tekan tombol <info class="text-warning">Selesai</info> setelah semua barang telah di input </strong>   
            </div>
            <div class="main-content-container ">
                <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0">Kode Booking</th>
                    <th scope="col" class="border-0">Nama Peminjam</th>
                    <th scope="col" class="border-0">Penyelenggara</th>
                    <th scope="col" class="border-0">Agenda</th>
                    <th scope="col" class="border-0">Jam Peminjaman</th>
                    <th scope="col" class="border-0">Tgl Pemakaian</th>
                    <th scope="col" class="border-0">Keterangan</th>
                    <th scope="col" class="border-0">Status</th>
                    <th scope="col" class="border-0">Catatan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($peminjaman_barang as $u){ 
                    ?>
                <tr>
                <td><?php echo $this->session->userdata('id_login'); ?></td>
                        <td><?php echo $this->session->userdata('nama_login'); ?></td>
                        <td><?php foreach ($penyelenggara as $a){if ($a->id_penyelenggara == $u->penyelenggara) :echo $a->penyelenggara;endif;}  ?></td>
                        <td><?php echo $u->nama_agenda;?></td>
                        <td><?php echo $u->jam_mulai; ?> - <?php echo $u->jam_selesai; ?></td>
                        <td><?php echo $u->tanggal_pemakaian;?></td>
                        <td><?php echo $u->keterangan;?></td>
                        <td><?php echo $u->status;?></td>
                        <?php if($u->status == 'tolak'){
                            foreach ($peminjaman as $s){ ?>
                            <td><?php echo $s->catatan_penolakan ?></td>
                        <?php }
                         } else {?>
                            <td></td>
                        <?php } ?>
                    </tr>
                
                    <?php } ?>
                
                </tbody>
            </table>
                </div>
                </div>
               
        </div>
        </div>
        </div>
        <!-- / Add New Post Form -->
 
    </div>
    <div class="row">
    <div class="col-lg-8 col-md-12">
        <!-- Add New Post Form -->
            <div class="main-content-container ">
            <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Tabel Ruangan Yang Digunakan</h6>
        </div>
            <div class='card-body p-0'>
                <div class="p-3">
                <div class="table-striped" style="overflow-x:auto; ">
                    <table class="table mb-0 " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="border-0">No</th>
                        <th scope="col" class="border-0">Ruangan</th>
                        <th scope="col" class="border-0">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        foreach($peminjaman_barang as $r){ 
                        foreach ($detail_peminjaman_barang as $u){ 
                        ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                            <td><?php foreach ($barang as $a){if ($a->id_barang == $u->id_barang) :echo $a->nama_barang;endif;}  ?></td>
                            <td class="sorting_1" style="">
                            <?php 
                            if($r->status == "pending"){ ?>
                                <a href="<?php echo site_url('dosen/hapus_barang_peminjaman_barang/'.$u->id_peminjaman_barang.'/'.$u->id_detail_peminjaman_barang); ?>"  type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                    <i class="material-icons">delete</i>
                                </a>
                            <?php }else{ ?>
                                <a href="" hidden disabled type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus">
                                    <i class="material-icons">delete</i>
                                </a>       
                            <?php }
                            ?>
                               
                            </td>
                        </tr>
                    
                        <?php }} ?>
                    
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>

                
                </div>
        </div>
        <!-- / Add New Post Form -->
    <div class="col-lg-4 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Tambah Barang</h6>
        </div>
        <div class='card-body p-0'>
            <div class="p-3">
            <?php foreach($peminjaman_barang as $u):?> 
            <form action="<?php echo base_url(). 'dosen/tambahBarangPeminjamanBarang/'; ?>" method="post">
            <input hidden name="id_peminjaman_barang" type="text" class="form-control" value="<?php echo $u->id_peminjaman_barang;?>" > 
            <input hidden name="tanggal_pemakaian" type="date" class="form-control" value="<?php echo $u->tanggal_pemakaian;?>" > 
            <input hidden name="jam_mulai_pemakaian" type="text" class="form-control" value="<?php echo $u->jam_mulai;?>" > 
            <input hidden name="jam_selesai_pemakaian" type="text" class="form-control" value="<?php echo $u->jam_selesai;?>" > 
            <label for="feInputAddress">Jenis Barang</label>
                <select required  name="kategori" id="kategori" class="form-control">
                <option value="" selected>Pilih </option>
                <?php foreach($jenis_barang->result() as $r ){ ?>
                <option value="<?php echo $r->id_jenis_barang;?>"><?php echo $r->jenis_barang;     ?></option> 
                <?php } ?>
            </select><br>
            <label for="feInputAddress">Barang</label>
                <select required  name="id_barang" id="feInputState" class="id_barang form-control">
                <option value="" selected>Pilih </option>
            </select><br>
            <?php 
            if($u->status == "pending"){ ?>

            <button type="submit" class="mb-2 btn btn-outline-primary mr-2">Tambah Barang</button>
            <?php if($no == 1){ ?>
            <a  data-toggle="modal" data-target="#modalLogin" class="mb-2 btn btn-sm btn-primary mr-1"><info class="text-warning">Selesai</info></a>
                
            <?php }else{?>
                <a  href="<?php echo site_url('dosen/ubah_status_peminjaman_barang/'.$u->id_peminjaman_barang.'/'.$u->id_peminjam);?>" class="mb-2 btn btn-sm btn-primary mr-1"><info class="text-warning">Selesai</info></a>
            <?php }?>
            <?php }else{ ?>
                <button disabled class="mb-2 btn btn-outline-primary mr-2">Tambah Barang</button>
                <a  hidden href="" class="mb-2 btn btn-sm btn-primary mr-1"><info class="text-warning">Selesai </info></a>               
            <?php }
            ?>
            </form>
            <?php endforeach; ?>
            </div>
        </div>
        </div>
    
    </div>
    </div>

</div>


<div class="modal fade " id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-body text-center" >
        <span class="text-danger">Silahkan input barang yang akan dipinjam </span>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>/dosen/get_subkategori",
				method : "POST",
				data : {id: id},
				async : false,
		        dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option value='+data[i].id_barang+'>'+data[i].nama_barang+'</option>';
		            }
		            $('.id_barang').html(html);
					
				}
			});
		});
	});
</script>