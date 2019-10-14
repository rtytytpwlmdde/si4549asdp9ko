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
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Tambah Mahasiswa</h3>
        </div>
        <div class="offset-sm-4 col-4 d-flex col-12 col-sm-4 d-flex text-sm-center align-items-center">
            <div style="max-width: 130px; " id="transaction-history-date-range" class="input-group input-group-sm ml-auto ">
               
            </div>
        </div>
    </div>

    <div class="row">
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Tambah Mahasiswa</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url(). 'operator/tambahMahasiswa'; ?>" method="POST">
                            <div class="form-group">
                              <label for="feInputAddress">NIM</label>
                              <input required name="nim" type="text" pattern="[0-9]{5,25}" title="Gunakan Angka, 5-25 karakter" class="form-control" id="feInputAddress" placeholder="NIM"> 
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Nama</label>
                              <input required  pattern="[^'\x11]+" name="nama" type="text" class="form-control" id="feInputAddress" placeholder="Nama"> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="feInputAddress">Jurusan</label>
                                    <select required  name="id_jurusan" id="id_jurusan" class="form-control">
                                    <option value="" selected>Pilih </option>
                                    <?php foreach($jurusan as $u ){ ?>
                                    <option value="<?php echo $u->id_jurusan;?>"><?php echo $u->jurusan;     ?></option> 
                                    <?php } ?>
							   </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="feInputAddress">Program Studi</label>
                                        <select required  name="id_prodi" id="feInputState" class="form-control">
										<option value="" selected>Pilih </option>
                                    </select>
                                </div>
                            </div>
                           
                           <div class="form-group">
                              <label for="feInputAddress">No Telpon</label>
                              <input required  name="telpon" type="text" pattern="[0-9]{5,16}" title="Gunakan kombinasi angka, 5-16 karakter" class="form-control" id="feInputAddress" placeholder="No Telpon"> 
                            </div>
                            <button type="submit" class="btn btn-accent">Tambah Mahasiswa</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><i class="material-icons">info_outline</i> Petunjuk</strong>
                      <span>1. Password pegawai baru akan diambil berdasarkan 6 terakhir dari NIM.</span><br>
					  <span>2. No Telpon menggunakan 62</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#id_jurusan').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>/mahasiswa/get_subkategori",
				method : "POST",
				data : {id: id},
				async : false,
		        dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option value='+data[i].id_prodi+'>'+data[i].prodi+'</option>';
		            }
		            $('.id_prodi').html(html);
					
				}
			});
		});
	});
</script>
</div>
    


