<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Sementara</h1><hr>
	<a href="<?php echo base_url("index.php/import_mahasiswa_op/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>NIM</th>
		<th>Nama</th>
		<th>Id Jurusan</th>
		<th>Id Prodi</th>
		<th>No Telp</th>
		<th>Password</th>
	</tr>

	<?php
	if( ! empty($barang)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($barang as $data){ // Lakukan looping pada variabel siswa dari controller
			echo "<tr>";
			echo "<td>".$data->nim."</td>";
			echo "<td>".$data->nama."</td>";
			echo "<td>".$data->id_jurusan."</td>";
			echo "<td>".$data->id_prodi."</td>";
			echo "<td>".$data->telpon."</td>";
			echo "<td>".$data->password."</td>";
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
