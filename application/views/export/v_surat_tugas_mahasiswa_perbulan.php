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
    
<?php 
   
   foreach($surat as $i):
   
    $id_peminjam=$i['nim'];
    $bulanModal=$i['bulan'];
    $tahunModal=$i['tahun'];
    $dt = DateTime::createFromFormat('!m', $i['bulan']);
    $thn = DateTime::createFromFormat('!y', $tahunModal);
   ?>
      
      
            <table class="" >
                <thead>
                    <tr>
                        <th colspan="8">Rincian Rekap Peminjaman [<?php echo $dt->format('F'); ?> - <?php echo $thn->format('Y'); ?>]</th>
                    </tr>
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
                        <td>Nama</td>
                        <td>: <?php echo $i['nama']?></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>: <?php echo $i['nim']?></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    
                    <tr>
                        <th>No</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Jenis Peminjaman</th>
                        <th>Sarana dan Prasarana</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody style="text-align:left;">
                <?php 
                $no = 1;
                foreach ($detail as $s){
                        
                ?>
                <tr >
                    <td style="text-align:center;"><?php echo $no++?></td>
                    <td style="text-align:center;"><?php echo $s['id_peminjaman'] ?></td>
                    <td style="text-align:center;"><?php echo date("d/m/Y", strtotime($s['tanggal_peminjaman']));?></td>
                    <td style="text-align:center;"><?php echo $s['jenis_peminjaman'] ?></td>
                    <td style="text-align:center;"><?php if ($s['jenis_peminjaman'] == 'rutin'){ 
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
                                } ?></td>
                    <td style="text-align:center;"><?php echo $s['status_peminjaman'] ?></td>
                    <td style="text-align:center;"><?php echo $s['catatan_penolakan'] ?></td>
                </tr>
                    
                <?php } ?>
                </tbody>
                
                <tfoot >
                    <th scope="row" colspan="7" style="text-align:center;">Jumlah Peminjaman </th>
                    <th style="text-align:center;"><?php echo $no-1 ?></th>
                </tfoot>
            </table>
        
    <?php endforeach;?>
</body>
</html>