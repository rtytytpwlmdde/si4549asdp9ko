
<!-- Tampilan tabel -->
	<div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Rekap Peminjaman</span>
            <h3 class="page-title">Data Pegawai</h3>
	</div>
	</div>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
        ?>
	<div class="row">
    <div class="col ">
        <div class="bg-white py-4 px-4">
        <div class="">
        <div class="row border-bottom  py-2">
            <div class="col-sm-3 text-center text-sm-left mb-0">
                <h6 class="m-0">Tabel Data Peminjaman Rutin</h6>
            </div>
            <div class="col  text-center text-sm-right mb-0">
                <div id="export"></div>
            </div>
            </div>
        </div>
				<!-- TABLE STRIPED -->
		<div class="main-content-container ">
            <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="surattugas">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
				<thead>
                    <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Januari</th>
                                    <th>Februari</th>
                                    <th>Maret</th>
                                    <th>April</th>
                                    <th>Mei</th>
                                    <th>Juni</th>
                                    <th>Juli</th>
                                    <th>Agustus</th>
                                    <th>September</th>
                                    <th>Oktober</th>
                                    <th>November</th>
                                    <th>Desember</th>
                                    <th>Jumlah Peminjaman</th>
                                </tr>
                                <?php 
                                $no = 1;
                                foreach ($records as $rows){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $rows['NIP'];?></td> 
                                    <td><?php echo $rows['Nama'];?></td>
                                    <td><?php echo $rows['januari'];?></td>
                                    <td><?php echo $rows['februari'];?></td>
                                    <td><?php echo $rows['maret'];?></td>
                                    <td><?php echo $rows['april'];?></td>
                                    <td><?php echo $rows['mei'];?></td>
                                    <td><?php echo $rows['juni'];?></td>
                                    <td><?php echo $rows['juli'];?></td>
                                    <td><?php echo $rows['agustus'];?></td>
                                    <td><?php echo $rows['september'];?></td>
                                    <td><?php echo $rows['oktober'];?></td>
                                    <td><?php echo $rows['november'];?></td>
                                    <td><?php echo $rows['desember'];?></td>
                                    <td><?php echo $rows['JumlahST'];?></td>

                                </tr>
                                <?php } ?>
								
							</tbody>
						</table>
                        


					</div>
				</div>
				<!-- END TABLE STRIPED -->




 <!-- Javascript tambahan untuk prepare update dan delete-->
<script type="text/javascript">

</script>
