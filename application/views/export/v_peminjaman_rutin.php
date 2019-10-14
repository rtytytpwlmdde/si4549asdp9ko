<?php
header('Content-Transfer-Encoding: binary');
header("Content-type: application/octet-stream");
header("Content-Transfer-Encoding: binary"); 
header('Expires: '.gmdate('D, d M Y H:i:s').' GMT'); 
header('Content-Disposition: attachment; filename = "Rekap peminjaman.xls"'); 

header('Pragma: no-cache'); 


?>
<!doctype html>
<html lang="en">

<head>
	<title>FEB</title>
	<meta charset="utf-8">
	
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
	<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

#perihal{
    max-width:400px;
}
#pangkat{
    max-width:120px;
}

#transparan{
    color: rgba(255, 255, 255, 0);
}
}
</style>
</head>

<body>
      
      
            <table class="" >
                <thead>
                    <tr>
                        <td id="transparan">.</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Nama Validator Rutin</td>
                        <td>: <?php echo $this->session->userdata('username') ?></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        
                    </tr>
                    
                    <tr>
					<th>No</th>
                    <th>Kode Booking  </th>
                    <th>Nama</th>
                    <th>Dosen</th>
                    <th>Matkul</th>
                    <th>Jurusan</th>
					<th>Tgl Peminjaman</th>
                    <th>Tgl Digunakan</th>
                    <th>Ruangan</th>
                    <th>Jam</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Nama Validator</th>
                    </tr>
                </thead>
                <tbody style="text-align:left;">
                <?php 
                $no = 1;
                foreach ($peminjaman_rutin as $u){
                        
                ?>
                <tr >
                    <td style="text-align:center;"><?php echo $no++?></td>
                    <td style="text-align:center;"><?php echo $u->id_peminjaman_rutin ?></td>
                    <td style="text-align:center;"><?php foreach ($mahasiswa as $a){if ($a->nim == $u->id_peminjam) :echo $a->nama;endif;}  ?>
                            <?php foreach ($dosen as $a){if ($a->NIP == $u->id_peminjam) :echo $a->Nama;endif;}  ?>
							<?php foreach ($pegawai as $a){if ($a->username == $u->id_peminjam) :echo $a->username;endif;}  ?></td>
                    <td style="text-align:center;"><?php foreach ($dosen as $a){if ($a->NIP == $u->id_dosen) :echo $a->Nama;endif;}  ?></td>
					<td style="text-align:center;"><?php foreach ($mata_kuliah as $a){if ($a->kode_matkul == $u->kode_matkul) :echo $a->nama_matkul;endif;}  ?></td>
					<td style="text-align:center;"><?php($jurusan as $a){if ($a->id_jurusan == $u->id_jurusan) :echo $a->jurusan;endif;}  ?></td>
					<td style="text-align:center;"><?php echo date("d-m-Y", strtotime($u->tanggal_peminjaman));?></td>
					<td style="text-align:center;"><?php echo date("d-m-Y", strtotime($u->tanggal_pemakaian));?></td>
					<td style="text-align:center;"><?php foreach ($ruangan as $a){if ($a->id_ruangan == $u->id_ruangan) :echo $a->ruangan;endif;} ?> </td>
					<td style="text-align:center;"><?php foreach ($jam_kuliah as $a){if ($a->id_jam_kuliah == $u->id_jam_kuliah) :echo $a->jam_kuliah;endif;}  ?></td>
					<td style="text-align:center;"><span>Rutin</span></td>
                    <td style="text-align:center;"> <span 
                                <?php if($u->status == 'terkirim'){ ?>
                                    class="text-warning"
                                <?php }else if($u->status == 'tolak'){ ?>
                                    class="text-danger"
                                <?php }else if($u->status == 'setuju'){ ?>
                                    class="text-success"
                                <?php } else{ ?>
                                    class="text-secondary"
                                <?php } ?>
                            ><?php echo $u->status ?></span></td>
                    <td style="text-align:center;"><?php echo $u->nip_validator?></td>
                </tr>
                    
                <?php } ?>
                </tbody>
                
                <tfoot >
                    <th scope="row" colspan="7" style="text-align:center;">Jumlah Peminjaman </th>
                    <th style="text-align:center;"><?php echo $no-1 ?></th>
                </tfoot>
            </table>
        
</body>
</html>