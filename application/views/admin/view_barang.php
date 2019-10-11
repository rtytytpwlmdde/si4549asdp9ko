<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Sementara</h1><hr>
	<a href="<?php echo base_url("index.php/import_barang/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>ID Barang</th>
		<th>Jenis Barang</th>
		<th>Nama Barang</th>
		<th>Status Barang</th>
	</tr>

	<?php
	if( ! empty($barang)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($barang as $data){ // Lakukan looping pada variabel siswa dari controller
			echo "<tr>";
			echo "<td>".$data->id_barang."</td>";
			echo "<td>".$data->id_jenis_barang."</td>";
			echo "<td>".$data->nama_barang."</td>";
			echo "<td>".$data->status_barang."</td>";
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
