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
            <h3 class="page-title">Cek Peminjaman</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-12">
                <div class="card card-small mb-4">
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'admin/cek_peminjam'; ?>" method="get">
                            <div class="form-group">
                              <label for="feInputAddress">Bulan Awal</label>
                            <select  name="bln1" class="custom-select custom-select-sm" >
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
							<label for="feInputAddress">Tahun Awal</label>
							<select name="tahun1" class="custom-select custom-select-sm">
								<?php
								$mulai= date('Y') ;
								for($i = $mulai;$i>$mulai - 50;$i--){
								$sel = $i == date('Y') ? ' selected="selected"' : '';
								echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
								}
								?>
							</select>
							 <label for="feInputAddress">Bulan Akhir</label>
                            <select  name="bln2" class="custom-select custom-select-sm" >
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
							<label for="feInputAddress">Tahun Akhir</label>
							<select name="tahun2" class="custom-select custom-select-sm">
								<?php
								$mulai= date('Y') ;
								for($i = $mulai;$i>$mulai - 50;$i--){
								$sel = $i == date('Y') ? ' selected="selected"' : '';
								echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
								}
								?>
							</select> </div>
                             <button type="submit" class="btn btn-accent">Search Rekap Peminjaman</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            
            </div>
</div>
    


