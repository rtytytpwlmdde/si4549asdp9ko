<form action="<?php echo site_url('welcome/index/'); ?>" method="post">
		<p>
			<input type="search" name="cari" placeholder="Search Keyword..."> <input type="submit" name="q" value="Search">
		</p>
		<table border="1" width="780px">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (count($peminjaman) > 0) {
					foreach($peminjaman as $row)
					{
						echo "<div class=\"letter\">";
						?>

						<tr>
							<td valign="top"><?php echo $row['id_peminjaman_non_rutin']; ?></td>
							<td valign="top"><?php echo $row['id_peminjaman']; ?></td>
							<td valign="top"><?php echo $row['nama_agenda']; ?></td>
							<td valign="top"><?php echo $row['status']; ?></td>
						</tr>

				<?php
						echo "</div>";
					}
					echo "<tr><td colspan='6'><div style='background:000; float:right;'>".$this->pagination->create_links()."</div></td></tr>";
				} else {
					echo "<tbody><tr><td colspan='8' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
				}
				?>
			</tbody>
		</table>
		</form>