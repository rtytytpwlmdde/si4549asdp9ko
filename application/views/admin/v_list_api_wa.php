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
    <div class="page-header row no-gutters py-3">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
             <h3 class="page-title">Semua Api Key WhatsApp</h3>
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
                <h6 class="m-0">Tabel Data No Telphone</h6>
            </div>
			<div class="col-12 col-sm-0 text-center text-sm-left mb-4 mb-sm-0">
			<div  style="float:right" >
			<div id="transaction-history-date-range" class="input-daterange input-group  input-group-sm ml-auto">
            <a  href="<?php  echo base_url('admin/input_api'); ?>" type="submit" class="form-control btn btn-primary text-center text-white"  style="float:center">
            <i class="material-icons">add</i>Tambah
            </a>      
			</div>
			</div>
			</div>
            <div class="col  text-center text-sm-right mb-0">
                <div id="export"></div>
            </div>
            </div>
        </div>
        <div class=" pt-0">
            
        </div><br>
        
            <div class="main-content-container ">
                <div class="" style="overflow-x:auto; ">
                <table class="table table-bordered table-hover " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="">No</th>
                    <th scope="col" class="">ID</th>
                    <th scope="col" class="">No Telphone</th>
                    <th scope="col" class="">Api Key</th>
					<th scope="col" class="">Status</th>
                    <th scope="col" class="">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($api_key as $u){ 
                    ?>
                <tr>
                <td><?php echo $no++ ?></td>
                        <td><?php echo $u->id ?></td>
                        <td><?php echo $u->no_telp ?></td>
						<td><?php echo $u->api_key ?></td>
                        <td><?php echo $u->status ?></td>
						
                        <td class="sorting_1" style="">
                            <a href="<?php echo site_url('admin/update_api/'.$u->id); ?>" type="button" class="btn btn-white" title="Edit Data ">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="<?php echo site_url('admin/hapus_api/'.$u->id); ?>" onclick="return deletechecked();" type="button" class="btn btn-white" onclick="return deletechecked();" title="Hapus Data ">
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


