<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Sementara</h1><hr>
	<a href="<?php echo base_url("index.php/import_ruangan/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>ID Ruangan</th>
		<th>Ruangan</th>
		<th>Jenis Ruangan</th>
		<th>Status</th>
	</tr>

	<?php
	if( ! empty($ruangan)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($ruangan as $data){ // Lakukan looping pada variabel siswa dari controller
			echo "<tr>";
			echo "<td>".$data->id_ruangan."</td>";
			echo "<td>".$data->ruangan."</td>";
			echo "<td>".$data->jenis_ruangan."</td>";
			echo "<td>".$data->status."</td>";
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
