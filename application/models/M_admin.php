<?php 

class M_admin extends CI_Model{

	// count user, dosen, mahasiswa, rutin, non rutin, barang

	function get_count_peminjaman_by_year($tahun){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_by_month');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->from('peminjaman');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_peminjaman_rutin_by_year($tahun){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_by_month');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_peminjaman_non_rutin_by_year($tahun){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_by_month');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_peminjaman_khusus_by_year($tahun){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_by_month');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','khusus');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_peminjaman_barang_by_year($tahun){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_by_month');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
		$this->db->group_by('bulan');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjaman(){
		$this->db->select('id_peminjaman ,count(*) as countPeminjaman');
		$this->db->from('peminjaman');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_periode($tahun){
		$this->db->select('date_format(tanggal_peminjaman,"%Y") as periode');
		$this->db->from('peminjaman');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->group_by('periode');
		$query = $this->db->get();
		return $query->result_array();
		
	}

	function countUser(){
		$this->db->select('username ,count(*) as count_user');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
	}
	

	function countDosen(){
		$this->db->select('NIP ,count(*) as count_dosen');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Status','Dosen');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countMahasiswa(){
		$this->db->select('nim ,count(*) as count_mahasiswa');
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countRuanganRutin(){
		$this->db->select('id_ruangan ,count(*) as count_rutin');
		$this->db->from('ruangan');
		$this->db->where('ruangan.jenis_ruangan','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countRuanganNonRutin(){
		$this->db->select('id_ruangan ,count(*) as count_non_rutin');
		$this->db->from('ruangan');
		$this->db->where('ruangan.jenis_ruangan','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countBarang(){
		$this->db->select('id_barang ,count(*) as count_barang');
		$this->db->from('barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	function tampilrestmahasiswa(){
		return $this->db->get('mahasiswa');
	}

	//alvin
	function get_data_agenda_umum(){
		$this->db->select('*');	
		$this->db->from('peminjaman_non_rutin');
		$this->db->order_by("peminjaman_non_rutin.tanggal_pemakaian", "ASC");
		$this->db->where('peminjaman_non_rutin.status', 'setuju');
		$this->db->where('peminjaman_non_rutin.kategori','umum');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian >= NOW() + INTERVAL -1 DAY');
		$query = $this->db->get();
		return $query->result();
	}

	
	
	function get_data_agenda_akademik($date){
		$this->db->select('*');	
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.status', 'setuju');
		$this->db->where('peminjaman_non_rutin.kategori','akademik');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian >= NOW() + INTERVAL -1 DAY');
		$this->db->order_by("peminjaman_non_rutin.tanggal_pemakaian", "ASC");
		$query = $this->db->get();
		return $query->result();
	}
	function pencarian_peminjaman($bln1,$bln2,$tahun1,$tahun2){
		$this->db->select('*');
		//$this->db->select('detail_st.Keterangan as detail_st_keterangan');
		$this->db->from('peminjaman');
		//$this->db->join('mahasiswa', 'mahasiswa.nim = peminjaman.id_peminjam');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)>=',$bln1);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)<=',$bln2);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun1);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun2);
		//$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}
	function peminjaman_rutin_filter($jenis_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman');
		//$this->db->join('pegawai','peminjaman.id_peminjam = pegawai.NIP');
		//$this->db->join('peminjaman_rutin','peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_non_rutin','detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_barang','detail_peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		
		$this->db->where('peminjaman.jenis_peminjaman',$jenis_peminjaman);
		$this->db->order_by("peminjaman.id_peminjam", "ASC");
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
		
		}
		
		function peminjaman_non_rutin_filter(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		//$this->db->join('pegawai','peminjaman.id_peminjam = pegawai.NIP');
		//$this->db->join('peminjaman_rutin','peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_non_rutin','detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_barang','detail_peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$this->db->order_by("peminjaman.id_peminjam", "ASC");
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
		
		}
		
	function tampilPeminjam(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		//$this->db->join('pegawai','peminjaman.id_peminjam = pegawai.NIP');
		//$this->db->join('peminjaman_rutin','peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_non_rutin','detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		//$this->db->join('detail_peminjaman_barang','detail_peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		//$this->db->where('peminjaman.id_peminjaman',$id_peminjam);
		$this->db->order_by("peminjaman.id_peminjam", "ASC");
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
		
		}
	
		function tampilPeminjam_mahasiswa(){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('mahasiswa','mahasiswa.nim = peminjaman.id_peminjam');
			$this->db->order_by("peminjaman.id_peminjam", "ASC");
			$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
			$query = $this->db->get();
			return $query->result();
			
		}
			
		public function tampilPeminjamanRutinMahasiswa($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			//$this->db->join('pegawai','pegawai.NIP =peminjaman.id_peminjam');
			$this->db->join('mahasiswa','mahasiswa.nim =peminjaman.id_peminjam');
			$this->db->join('peminjaman_rutin', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin' );
			$this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman_rutin.id_ruangan' );
			$this->db->join('jam_kuliah','jam_kuliah.id_jam_kuliah = peminjaman_rutin.id_jam_kuliah');
			//$this->db->where('peminjaman.jenis_peminjaman','rutin');
			$this->db->where('peminjaman.id_peminjaman',$id_peminjaman);
			$this->db->order_by("peminjaman.id_peminjaman", "desc");
			$query = $this->db->get();
			return $query->result();	
		}
		
		public function tampilPeminjamanNonRutinMahasiswa($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('mahasiswa','mahasiswa.nim =peminjaman.id_peminjam');
			$this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
			$this->db->where('peminjaman.id_peminjaman',$id_peminjaman);
			$this->db->order_by("peminjaman.id_peminjaman", "desc");
			$query = $this->db->get();
			return $query->result();
		}
	
		public function tampilPeminjamanBarangMahasiswa($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('mahasiswa', 'mahasiswa.nim = peminjaman.id_peminjam');
			$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = peminjaman. id_peminjaman');
			$this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
			$this->db->order_by("peminjaman.id_peminjaman","DESC");
			$query =$this->db->get();
			return $query->result();
	
		}
	
		public function tampilPeminjamanRutinPegawai($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman_rutin');
			$this->db->join('pegawai','pegawai.NIP =peminjaman_rutin.id_dosen');
			//$this->db->join('mahasiswa','mahasiswa.nim =peminjaman.id_peminjam');
			$this->db->join('peminjaman', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin' );
			$this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman_rutin.id_ruangan' );
			$this->db->join('jam_kuliah','jam_kuliah.id_jam_kuliah = peminjaman_rutin.id_jam_kuliah');
			//$this->db->where('peminjaman.jenis_peminjaman','rutin');
			$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjaman);
			//$this->db->order_by("peminjaman_rutin.id_peminjaman_rutin", "desc");
			$query = $this->db->get();
			return $query->result();	
		}
		
		public function tampilPeminjamanNonRutinPegawai($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('pegawai','pegawai.NIP =peminjaman.id_peminjam');
			//$this->db->join('mahasiswa','mahasiswa.nim =peminjaman.id_peminjam');
			$this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
			$this->db->where('peminjaman.id_peminjaman',$id_peminjaman);
			$this->db->order_by("peminjaman.id_peminjaman", "desc");
			$query = $this->db->get();
			return $query->result();
		}
	
		public function tampilPeminjamanBarangPegawai($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('pegawai','pegawai.NIP =peminjaman.id_peminjam');
			$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = peminjaman. id_peminjaman');
			$this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
			$this->db->order_by("peminjaman.id_peminjaman","DESC");
			$query =$this->db->get();
			return $query->result();
	
		}

		function getDataPeminjamanById($id_peminjaman){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
			$query =$this->db->get();
			return $query->result();
		}
	
		public function detail_non_rutin(){
			$this->db->select('*');
			$this->db->from('peminjaman_non_rutin');
			$this->db->join('detail_peminjaman_non_rutin','detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman_non_rutin.id_peminjaman_non_rutin');
			//$this->db->where(';
			$query =$this->db->get();
			return $query->result();
		}
		function get_non_rutin_peminjaman_non_rutin_by_peminjam($id_peminjaman){
		$this->db->select('ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();

		}
		
		function get_barang_peminjaman_barang_by_peminjam($id_peminjaman){
		$this->db->select('barang.nama_barang, detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
		}
	
		public function detail_peminjaman($id_peminjaman){
			$this->db->select('*');
			$this->db->from('detail_peminjaman_non_rutin');
			//$this->db->join('detail_peminjaman_non_rutin','detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman_non_rutin.id_peminjaman_non_rutin');
			$this->db->join('ruangan','ruangan.id_ruangan = detail_peminjaman_non_rutin.id_ruangan');
			$this->db->join('jam_kuliah','jam_kuliah.id_jam_kuliah = detail_peminjaman_non_rutin.id_jam_kuliah');
			$this->db->where('detail_peminjaman_non_rutin.id_peminjaman_non_rutin', $id_peminjaman);
			$query =$this->db->get();
			return $query->result();
		}
	
		public function detail_sarpras(){
			$this->db->select('*');
			$this->db->from('peminjaman_barang');
			$this->db->join('detail_peminjaman_barang','detail_peminjaman_barang.id_peminjaman_barang = peminjaman_barang.id_peminjaman_barang');
			$query =$this->db->get();
			return $query->result();
		}
		
		public function detail_rekap_sarpras(){
			$this->db->select('*');
			$this->db->from('detail_peminjaman_barang');
			$this->db->join('barang','barang.id_barang = detail_peminjaman_barang.id_barang');
			$query =$this->db->get();
			return $query->result();
		}
		public function getDataProfil(){
			$username = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user.username',$username);
			$query = $this->db->get();
			return $query->result();	
		}
		
		public function getDataProfilMahasiswa(){
		$username = $this->session->userdata('id_login');
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.nim',$username);
		$query = $this->db->get();
		return $query->result();	
		}
	
		public function getDataProfilPegawai(){
		$username = $this->session->userdata('id_login');
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai.NIP',$username);
		$query = $this->db->get();
		return $query->result();	
		}
		

		public function rekap_peminjaman_mahasiswa(){
			$this->db->select('*');
			$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
			$this->db->select('peminjaman.id_peminjam ,count(*) as jumPeminjaman');
			$this->db->from('peminjaman');
			$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
			$this->db->group_by('peminjaman.id_peminjam');
			$this->db->group_by('tahun');
			$this->db->order_by("tahun", "DESC");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function rekap_peminjaman_pegawai(){
			$this->db->select('*');
			$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
			$this->db->select('peminjaman_rutin.id_dosen ,count(*) as jumPeminjaman');
			$this->db->from('peminjaman_rutin');
			$this->db->join('peminjaman', 'peminjaman.id_peminjaman=peminjaman_rutin.id_peminjaman_rutin');
			$this->db->join('pegawai', 'pegawai.NIP=peminjaman_rutin.id_dosen');
			$this->db->group_by('peminjaman_rutin.id_dosen');
			$this->db->group_by('tahun');
			$this->db->order_by("tahun", "DESC");
			$query = $this->db->get();
			return $query->result();
		}
		function rekap($tahun){
			$this->db->select('*');
			$this->db->select('peminjaman.tanggal_peminjaman');
			$this->db->select('peminjaman.id_peminjam ,count(*) as jumPeminjaman');
			$this->db->from('peminjaman');
			//$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
			$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
			$this->db->group_by('peminjaman.id_peminjam');
			$this->db->order_by("jumPeminjaman", "DESC");
			//$this->db->where('pegawai.Status','Dosen');
			$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
			$this->db->limit('5');
			$query = $this->db->get();
			return $query->result_array();
		}

	function countPeminjamanRutin(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_rutin');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanRutinSetuju(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_rutin_setuju');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanRutinTerkirim(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_rutin_terkirim');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','terkirim');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanRutinTolak(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_rutin_tolak');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','tolak');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanNonRutin(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_non_rutin');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanNonRutinSetuju(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_non_rutin_setuju');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanNonRutinTerkirim(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_non_rutin_terkirim');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','terkirim');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanNonRutinTolak(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_non_rutin_tolak');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','tolak');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanKhusus(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_khusus');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','khusus');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanKhususSetuju(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_khusus_setuju');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','khusus');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanKhususTerkirim(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_khusus_terkirim');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','terkirim');
		$this->db->where('peminjaman.jenis_peminjaman','khusus');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanKhususTolak(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_khusus_tolak');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','tolak');
		$this->db->where('peminjaman.jenis_peminjaman','khusus');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanBarang(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_barang');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanBarangSetuju(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_barang_setuju');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanBarangTerkirim(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_barang_terkirim');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','terkirim');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanBarangTolak(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_barang_tolak');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','tolak');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	function cek_ketersediaan_nip($id_peminjaman){
		$this->db->select('id_peminjaman');
		$this->db->from('peminjaman');
		$this->db->where('id_peminjaman',$id_peminjaman);
		$query = $this->db->get();
		return $query;
	}

	

	function tampilReset(){
		return $this->db->get('peminjaman');
	}

	function get_data_pegawai_nip($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('id_peminjaman',$id_peminjaman);
		$query = $this->db->get();
		return $query->result();
	}
	function rutin_kode($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->where('id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	function non_rutin_kode($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	function barang_kode($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_barang.id_peminjaman_barang');
		$this->db->where('id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jenisbarang(){
		$this->db->select('*');	
		$this->db->from('jenis_barang');
		$this->db->order_by("jenis_barang", "ASC");
		$query = $this->db->get();
		return $query->result();
	}	
	
	function get_jurusan(){
		$this->db->select('*');	
		$this->db->from('jurusan');
		$this->db->order_by("jurusan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}	


	function get_data_agenda(){
		$this->db->select('*');	
		$this->db->from('peminjaman_non_rutin');
		$this->db->order_by("peminjaman_non_rutin.tanggal_pemakaian", "ASC");
		$this->db->where('peminjaman_non_rutin.status', 'setuju');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_data_ruangan_agenda(){
		$this->db->select(',id_peminjaman_non_rutin,id_ruangan');	
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->distinct();
		//$this->db->group_by('detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$query = $this->db->get();
		return $query->result();
	}

    
    //------------------------------------      PEGAWAI
    function tampilPegawai(){
        return $this->db->get('pegawai');
	}
	function tampilUser(){
        return $this->db->get('user');
    }
    function tampilDosen(){
        $this->db->where('Status', 'Dosen');
        return $this->db->get('pegawai');
	}

	function tampilPenyelenggara(){
        return $this->db->get('penyelenggara');
	}
	
    function tampilStaff(){
        $this->db->where('Status', 'Staff');
        return $this->db->get('pegawai');
    }
    function tampilNonHomebase(){
        $this->db->where('Status', 'Non Homebase');
        return $this->db->get('pegawai');
    }
	
	function tampilMahasiswa(){
		return $this->db->get('mahasiswa');
    }
    
    function tampilRuangan(){
		return $this->db->get('ruangan');
	}
	
	function tampilNonRutin(){
        $this->db->select('*');
		$this->db->from('ruangan');
		//$this->db->where('ruangan.jenis_ruangan','non rutin');
		$query = $this->db->get();
		return $query->result();
    }
	function tampilapi_key(){
		return $this->db->get('api_wa');
	}
	function tampilMatkul(){
		return $this->db->get('mata_kuliah');
	}
	
	function tampilSemester(){
        return $this->db->get('semester');
    }
	
	function tampilKategori(){
		return $this->db->get('jenis_barang');
    }
	function tampilBarang(){
		return $this->db->get('barang');
	}
	
	function tampilJadwalKuliah($id_semester){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester', $id_semester);
		$this->db->order_by("hari", "DESC");
		$this->db->where('status !=', 'sisip');
		$query = $this->db->get();
		return $query->result();
	}

	function get_peminjaman_rutin_by_semester($id_semester){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->where('id_semester', $id_semester);
		$this->db->order_by("tanggal_pemakaian", "DESC");
		$this->db->where('status !=', 'tolak');
		$this->db->where('status !=', 'terkirim');
		$query = $this->db->get();
		return $query->result();

	}

	function get_jadwal_sisip($id_semester){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester', $id_semester);
		$this->db->where('status', 'sisip');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_id_jam_kuliah(){
		$this->db->select('id_jam_kuliah,jam_kuliah');
		$this->db->from('jam_kuliah');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_id_ruangan_rutin_bagus(){
		$this->db->select('id_ruangan,ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$query = $this->db->get();
		return $query->result();
	}

	function tampilJamKuliah_modal(){
		$this->db->select('*');
		$this->db->from('jam_kuliah');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_semester_by_date($date){
		$this->db->select('*');
		$this->db->from('semester');
		$this->db->where('status', 'aktif');
		$query = $this->db->get();
		return $query->result();
	}


	function get_data_ruangan_rutin_bagus_modal(){
		$this->db->select('id_ruangan,ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$this->db->where('ruangan.jenis_ruangan', 'rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function tampilJamKuliah(){
		return $this->db->get('jam_kuliah');
	}

	function tampilJurusan(){
		return $this->db->get('jurusan');
	}

	function tampilProdi(){
		return $this->db->get('prodi');
	}
	
	function tampilMataKuliah(){
		return $this->db->get('mata_kuliah');
	}

	function tampilPeminjamanRutin(){
		return $this->db->get('peminjaman_rutin');
	}
	
	 function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function edit_data($where,$table){
	return $this->db->get_where($table,$where);	
    }
    
    function get_bagian(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_ruangan_bagus(){
		$this->db->select('id_ruangan,ruangan,jenis_ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.jenis_ruangan', 'rutin');
		$this->db->where('ruangan.status', 'bagus');
		$this->db->order_by("status", "DESC");
		$this->db->order_by("ruangan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_barang_bagus(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('barang.status_barang', 'bagus');
		$this->db->order_by("status_barang", "DESC");
		$this->db->order_by("nama_barang", "ASC");
		$query = $this->db->get();
		return $query->result();
	}


	function get_data_ruangan_rutin_bagus(){
		$this->db->select('*');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$this->db->where('ruangan.jenis_ruangan', 'rutin');
		$this->db->order_by("ruangan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	
	function get_data_dosen(){
		$this->db->select('Nama,NIP,No_Telp');
		$this->db->from('pegawai');
		//$this->db->where('pegawai.Status', 'Dosen');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_matakuliah(){
		$this->db->select('kode_matkul,nama_matkul');
		$this->db->from('mata_kuliah');
		$this->db->order_by("nama_matkul", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	function cek_jadwal_kuliah($id_semester,$hari,$id_jam_kuliah,$id_ruangan){
		$this->db->select('id_jadwal_kuliah');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester',$id_semester);
		$this->db->where('hari',$hari);
		$this->db->where('id_jam_kuliah',$id_jam_kuliah);
		$this->db->where('id_ruangan',$id_ruangan);
		$query=$this->db->get();
		return $query;
	}

	function cek_update_jadwal_kuliah($id_jadwal_kuliah,$id_semester,$hari,$id_jam_kuliah,$id_ruangan){
		$this->db->select('id_jadwal_kuliah');
		$this->db->from('jadwal_kuliah');
		$this->db->where("id_jadwal_kuliah != $id_jadwal_kuliah");
		$this->db->where('id_semester',$id_semester);
		$this->db->where('hari',$hari);
		$this->db->where('id_jam_kuliah',$id_jam_kuliah);
		$this->db->where('id_ruangan',$id_ruangan);
		$query=$this->db->get();
		return $query;
	}


	function tampilPeminjamanRutinToDay($date){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$date);
		$this->db->where('status !=', 'tolak');
		$this->db->where('status !=', 'pending');
		$this->db->where('status !=', 'terkirim');
		$query=$this->db->get();
		return $query->result();
	}

	function tampilJadwalKuliahToDay($day){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('hari',$day);
		$this->db->where('status', 'ada');
		$query=$this->db->get();
		return $query->result();
	}

	function petaRuanganRutinToDay($date){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$date);
		$this->db->where('status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}

	function tampilPeminjamanNonRutinToDay($date){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.penyelenggara, detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$this->db->where('peminjaman_non_rutin.status !=', 'terkirim');
		$this->db->where('peminjaman_non_rutin.status !=', 'pending');
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_tanggal_plot($date){
		$this->db->select('tanggal_pemakaian');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$date);
		$this->db->limit('1');
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_ktu(){
		$this->db->select('NIP, Nama');
		$this->db->from('pegawai');
		$this->db->where('Bagian','Tata Usaha');
		$this->db->where('Sub_Bagian','null');
		$this->db->where('Urusan','null');
		$this->db->where('jabatan','kepala');
		$this->db->where('stat','aktif');
		$query=$this->db->get();
		return $query->result();
	}

	function semester_akhir(){
        $this->db->select('*');
		$this->db->from('semester');
		$this->db->order_by("tanggal_selesai", "DESC");
		$this->db->limit('1');
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_data_mahasiswa(){
		$this->db->select('nim,nama,telpon');
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_data_user(){
		$this->db->select('username');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}


    function get_data_peminjaman(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		////$this->db->join('peminjaman_rutin', 'peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
	//	$this->db->join('peminjaman_non_rutin', 'peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	 function get_data_catatan($id){
		$this->db->select('*');
		$this->db->from('peminjaman');
		////$this->db->join('peminjaman_rutin', 'peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
	//	$this->db->join('peminjaman_non_rutin', 'peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman.id_peminjaman',$id);
		//$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function tampilLastJadwalKuliah($id_semester){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester',$id_semester);
		$query = $this->db->get();
		return $query->result();
	}

	function semester_by_id($id_semester){
		$this->db->select('*');
		$this->db->from('semester');
		$this->db->where('id_semester',$id_semester);
		$query = $this->db->get();
		return $query->result();
	}

	// peta peminjaman barang
	function get_data_peminjaman_barang($date){
		$this->db->select('peminjaman_barang.id_peminjaman_barang, detail_peminjaman_barang.id_barang, peminjaman_barang.jam_mulai, peminjaman_barang.jam_selesai, peminjaman_barang.status');
		$this->db->from('peminjaman_barang');
		$this->db->join('detail_peminjaman_barang', 'peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->where('peminjaman_barang.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_barang.status !=', 'tolak');
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_barang(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('status_barang','bagus');
		$this->db->order_by("nama_barang", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_tanggal_peminjaman_barang($date){

	}

	function get_data_peminjaman_non_rutin($date){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.status, peminjaman_non_rutin.jam_mulai_peminjaman, peminjaman_non_rutin.jam_selesai_peminjaman, detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$this->db->where('peminjaman_non_rutin.status !=', 'pending');
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_ruangan_non_rutin(){
		$this->db->select('*');
		$this->db->from('ruangan');
		$this->db->where('jenis_ruangan !=', 'rutin');
		$this->db->where('status','bagus');
		$this->db->order_by("ruangan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function ruangan_non_rutin($id_peminjaman){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, ruangan.jenis_ruangan');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('peminjaman_non_rutin', 'detail_peminjaman_non_rutin.id_peminjaman_non_rutin=peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'ruangan.id_ruangan=detail_peminjaman_non_rutin.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function hari_pemakaian($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=peminjaman_non_rutin.id_peminjaman_non_rutin');
	//	$this->db->join('ruangan', 'ruangan.id_ruangan=detail_peminjaman_non_rutin.id_ruangan');
		$this->db->where('peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_data_hari(){
		$this->db->select('*');
		$this->db->from('hari');
		$query = $this->db->get();
		return $query->result();
	}
	
	//wa gateway
	
	function get_data_mahasiswa_telpon($id_peminjam){
		$this->db->select('telpon');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.nim',$id_peminjam);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_pegawai_telpon($id_peminjam){
		$this->db->select('No_Telp');
		$this->db->from('pegawai');
		$this->db->where('pegawai.NIP',$id_peminjam);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_jam($id_peminjaman){
		$this->db->select('jam_mulai_peminjaman');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_jam_barang($id_peminjaman){
		$this->db->select('jam_mulai');
		$this->db->from('peminjaman_barang');
		$this->db->where('peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_jam_rutin($id_peminjaman){
		$this->db->select('jam_kuliah.jam_kuliah' );
		$this->db->from('peminjaman_rutin');
		$this->db->join('jam_kuliah','jam_kuliah.id_jam_kuliah = peminjaman_rutin.id_jam_kuliah');
		$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_jam_selesai($id_peminjaman){
		$this->db->select('jam_selesai_peminjaman');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_jam_selesai_barang($id_peminjaman){
		$this->db->select('jam_selesai');
		$this->db->from('peminjaman_barang');
		$this->db->where('peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_tanggal($id_peminjaman){
		$this->db->select('tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_tanggal_barang($id_peminjaman){
		$this->db->select('tanggal_pemakaian');
		$this->db->from('peminjaman_barang');
		$this->db->where('peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_tanggal_rutin($id_peminjaman){
		$this->db->select('tanggal_pemakaian');
		$this->db->from('peminjaman_rutin');
		$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_barang_wa($id_peminjaman){
		$this->db->select('barang.nama_barang');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('barang','barang.id_barang = detail_peminjaman_barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_ruangan_wa($id_peminjaman){
		$this->db->select('ruangan.ruangan');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan','ruangan.id_ruangan = detail_peminjaman_non_rutin.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_ruangan_wa_rutin($id_peminjaman){
		$this->db->select('peminjaman_rutin.id_ruangan, ruangan.ruangan');
		$this->db->from('peminjaman_rutin');
		$this->db->join('ruangan','ruangan.id_ruangan = peminjaman_rutin.id_ruangan');
		$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_nama_wa($id_peminjaman){
		$this->db->select('peminjaman_non_rutin.id_peminjam, mahasiswa.nama');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('mahasiswa','mahasiswa.nim = peminjaman_non_rutin.id_peminjam');
		$this->db->where('peminjaman_non_rutin.id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_nama_pegawai_wa($id_peminjam){
		$this->db->select('Nama');
		$this->db->from('pegawai');
		$this->db->where('Nama',$id_peminjam);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_nama_wa_barang($id_peminjaman){
		$this->db->select('peminjaman_barang.id_peminjam, mahasiswa.nama');
		$this->db->from('peminjaman_barang');
		$this->db->join('mahasiswa','mahasiswa.nim = peminjaman_barang.id_peminjam');
		$this->db->where('peminjaman_barang.id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_nama_wa_rutin($id_peminjaman){
		$this->db->select('peminjaman_rutin.id_peminjam, mahasiswa.nama');
		$this->db->from('peminjaman_rutin');
		$this->db->join('mahasiswa','mahasiswa.nim = peminjaman_rutin.id_peminjam');
		$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function subArraysToString($ar, $sep = ', ') {
		$str = '';
		foreach ($ar as $val) {
			$str .= implode($sep, $val);
			$str .= $sep; // add separator between sub-arrays
		}
		$str = rtrim($str, $sep); // remove last separator
		return $str;
	}

	public function dataPeminjamanPegawai($id_peminjam){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman =peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai','pegawai.NIP =peminjaman_rutin.id_dosen');
		//$this->db->join('mahasiswa','mahasiswa.nim= peminjaman.id_peminjam');
		//$this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	public function dataPeminjamanMahasiswa($id_peminjam){
		$this->db->select('*');
		$this->db->from('peminjaman');
		//$this->db->join('pegawai','pegawai.NiP =peminjaman.id_peminjam');
		$this->db->join('mahasiswa','mahasiswa.nim= peminjaman.id_peminjam');
		//$this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->order_by("peminjaman.id_peminjaman", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function tampilPeminjamanMahasiswa($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('mahasiswa','mahasiswa.nim =peminjaman.id_peminjam');
		//$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
		$this->db->where('peminjaman.id_peminjaman',$id_peminjaman);
		$this->db->order_by("peminjaman.id_peminjaman", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function tampilPeminjamanPegawai($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('pegawai','pegawai.NiP =peminjaman.id_peminjam');
		//$this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman ' );
		$this->db->where('peminjaman.id_peminjaman',$id_peminjaman);
		$this->db->order_by("peminjaman.id_peminjaman", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	function Peminjaman_non($id_peminjaman){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('id_peminjaman',$id_peminjaman);
		$query = $this->db->get();
		return $query->result();
	}
	
	function tampilrestpegawai(){
		return $this->db->get('pegawai');
	}
	
	function cek_ketersediaan_pegawai($nip){
		$this->db->select('NIP');
		$this->db->from('pegawai');
		$this->db->where('NIP',$nip);
		$query = $this->db->get();
		return $query;
	}
	function cek_ketersediaan_mahasiswa($nip){
		$this->db->select('nim');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$nip);
		$query = $this->db->get();
		return $query;
	}
	function get_pegawai_nip($nip){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('NIP',$nip);
		$query = $this->db->get();
		return $query->result();
	}
	function get_mahasiswa_nim($nip){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$nip);
		$query = $this->db->get();
		return $query->result();
	}
	function update_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_jum_surat_dosen($tahun){
		$this->db->select('*');
		$this->db->select('peminjaman.tanggal_peminjaman');
		$this->db->select('peminjaman_rutin.id_dosen ,count(*) as jumSurat');
		$this->db->from('peminjaman_rutin');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman_rutin.id_dosen');
		$this->db->group_by('peminjaman_rutin.id_dosen');
		$this->db->order_by("jumSurat", "DESC");
		//$this->db->where('pegawai.Status','Dosen');
		//$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_jum_surat_staff($tahun){
		$this->db->select('*');
		$this->db->select('peminjaman.tanggal_peminjaman');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->order_by("jumSurat", "DESC");
		//$this->db->where('peminjaman.status_peminjaman','setuju');
		//$this->db->where('m.Status','Dosen');
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_jum_surat_barang($tahun){
		$this->db->select('*');
		$this->db->select('peminjaman_barang.tanggal_peminjaman');
		$this->db->select('detail_peminjaman_barang.id_barang ,count(*) as jumSurat');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman_barang', 'peminjaman_barang.id_peminjaman_barang=detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
		$this->db->group_by('detail_peminjaman_barang.id_barang');
		$this->db->order_by("jumSurat", "DESC");
		//$this->db->where('m.Status','Dosen');
		$this->db->where('YEAR(peminjaman_barang.tanggal_peminjaman)',$tahun);
		$this->db->where('peminjaman_barang.status','setuju');
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result_array();
	}

	function filter_surat($bln1,$bln2,$tahun){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('MONTH(tanggal_pemakaian)>=',$bln1);
		$this->db->where('MONTH(tanggal_pemakaian)<=',$bln2);
		$this->db->where('YEAR(tanggal_pemakaian)',$tahun);
		$this->db->where('peminjaman_non_rutin.status', 'setuju');
		$this->db->where('peminjaman_non_rutin.kategori','umum');
		$query = $this->db->get();
		return $query->result();
	}
	
	function filter_akademik($bln1,$bln2,$tahun){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('MONTH(tanggal_pemakaian)>=',$bln1);
		$this->db->where('MONTH(tanggal_pemakaian)<=',$bln2);
		$this->db->where('YEAR(tanggal_pemakaian)',$tahun);
		$this->db->where('peminjaman_non_rutin.status', 'setuju');
		$this->db->where('peminjaman_non_rutin.kategori','akademik');
		$query = $this->db->get();
		return $query->result();
	}
	////---Pegwawai
	/*function surat_perbulan_pegawai($id_peminjam){	
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}*/
	
	function pencarian_rekapP($tahun,$id_peminjam){
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('peminjaman_rutin.id_dosen ,count(*) as jumSurat');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai', 'pegawai.NIP = peminjaman_rutin.id_dosen');
		$this->db->group_by('peminjaman_rutin.id_dosen');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam); 
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function pencarian_rekapM($tahun,$id_peminjam){
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		$this->db->join('mahasiswa', 'mahasiswa.nim = peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam); 
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function rekap_surat_perbulan_pegawai($id_peminjam){
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->from('peminjaman_rutin');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman_rutin.id_dosen');
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function rekap_surat_perbulan_export_pegawai($id_peminjam,$bulan,$tahun){
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->order_by("tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function surat_perbulan_export($id_peminjam,$bulan,$tahun){	

		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->group_by('bulan');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function rekap_surat_perbulan_export_mahasiswa($id_peminjam,$bulan,$tahun){
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->order_by("tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function surat_perbulan_export_mahasiswa($id_peminjam,$bulan,$tahun){	

		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->group_by('bulan');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function pencarian_detailP($bln1,$bln2,$tahun,$id_peminjam){
		$this->db->select('*');
		//$this->db->select('detail_st.Keterangan as detail_st_keterangan');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai', 'pegawai.NIP = peminjaman_rutin.id_dosen');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)>=',$bln1);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)<=',$bln2);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam); 
		$query = $this->db->get();
		return $query->result();
		}
	function pencarian_detailM($bln1,$bln2,$tahun,$id_peminjam){
	$this->db->select('*');
		//$this->db->select('detail_st.Keterangan as detail_st_keterangan');
		$this->db->from('peminjaman');
		$this->db->join('mahasiswa', 'mahasiswa.nim = peminjaman.id_peminjam');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat = detail_st.Nomor_Surat' );
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)>=',$bln1);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)<=',$bln2);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->where('peminjaman.id_peminjam',$id_peminjam); 
		$query = $this->db->get();
		return $query->result();
		}
		
		function get_ruangan_peminjaman_rutin_by_peminjamP($id_peminjam){
		$this->db->select('peminjaman_rutin.id_dosen, peminjaman_rutin.id_ruangan, ruangan.ruangan, peminjaman_rutin.id_peminjaman_rutin, peminjaman_rutin.keterangan, peminjaman_rutin.nip_validator, peminjaman_rutin.keterangan');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam);
		//$this->db->order_by("tanggal_pemakaian", "DESC");
		$query=$this->db->get();
		return $query->result_array();
	}
	function surat_perbulan_pegawai($id_dosen){	
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->select('peminjaman_rutin.id_dosen ,count(*) as jumSurat');
		$this->db->from('peminjaman_rutin');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('pegawai', 'pegawai.NIP=peminjaman_rutin.id_dosen');
		$this->db->group_by('peminjaman_rutin.id_dosen');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('peminjaman_rutin.id_dosen',$id_dosen);
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam){
		$this->db->select('peminjaman_rutin.id_dosen, peminjaman_rutin.id_ruangan, ruangan.ruangan, peminjaman_rutin.id_peminjaman_rutin, peminjaman_rutin.keterangan, peminjaman_rutin.nip_validator, peminjaman_rutin.keterangan');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman_rutin.id_dosen',$id_peminjam);
		//$this->db->order_by("tanggal_pemakaian", "DESC");
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_peminjaman_barang_by_peminjam($id_peminjam){
		$this->db->select(' barang.nama_barang, detail_peminjaman_barang.id_peminjaman_barang,peminjaman_barang.nama_agenda, peminjaman_barang.nip_validator, peminjaman_barang.nama_agenda');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_peminjam',$id_peminjam);
		$this->db->distinct('peminjaman_barang.nama_agenda');
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function get_non_rutin_by_peminjam($id_peminjam){
	$query=$this->db->query("SELECT distinct ruangan.ruangan, peminjaman_non_rutin.id_peminjaman_non_rutin,peminjaman_non_rutin.nama_agenda ,detail_peminjaman_non_rutin.id_ruangan, pegawai.nip
		from
		ruangan, peminjaman_non_rutin, detail_peminjaman_non_rutin, pegawai
		WHERE
		peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin and
		detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan
		and
		peminjaman_non_rutin.id_peminjam = pegawai.NIP");
		$this->db->where('peminjaman_non_rutin.id_peminjam',$id_peminjam);
		//$this->db->distinct();
		//$query=$this->db->get();
		return $query->result_array();
	}
	
	function get_peminjaman_non_rutin_by_peminjamM($id_peminjam){
		$this->db->select(' ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin,peminjaman_non_rutin.nama_agenda, peminjaman_non_rutin.nip_validator, peminjaman_non_rutin.nama_agenda');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'ruangan.id_ruangan = detail_peminjaman_non_rutin.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjam',$id_peminjam);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result_array();
	}
	
		
		////---mahasiswa
		function surat_perbulan_mahasiswa($id_peminjam){	
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->select('peminjaman.id_peminjam ,count(*) as jumSurat');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
		$this->db->group_by('peminjaman.id_peminjam');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function rekap_surat_perbulan_mahasiswa($id_peminjam){
		$this->db->select('*');
		$this->db->select('date_format(tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(tanggal_peminjaman,"%y") as tahun');
		$this->db->from('peminjaman');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('mahasiswa', 'mahasiswa.nim=peminjaman.id_peminjam');
		$this->db->where('peminjaman.id_peminjam',$id_peminjam);
		$this->db->order_by("tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_data_api_key(){
		$this->db->select('api_key');
		$this->db->from('api_wa');
		//$this->db->where('api_wa.api_key',$api_key);
		$this->db->where('api_wa.status','aktif');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function tampil_peminjaman_rutin(){
	$this->db->select('*');
	$this->db->from('peminjaman_rutin');
	$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_rutin.id_peminjaman_rutin');
	$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
	//$this->db->where('peminjaman_rutin.id_peminjaman_rutin',$id_peminjam);
	$this->db->distinct();
	$query = $this->db->get();
	return $query->result();
	}
	
	function tampil_peminjaman_non_rutin_nama_agenda(){
	$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.nip_validator, peminjaman_non_rutin.nama_agenda');
	$this->db->from('peminjaman_non_rutin');
	$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
	//$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
	//$this->db->join('ruangan', 'ruangan.id_ruangan = detail_peminjaman_non_rutin.id_ruangan');
	$this->db->distinct();
	$query = $this->db->get();
	return $query->result();
	}
	
	function tampil_peminjaman_non_rutin(){
	$this->db->select('ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.nip_validator, peminjaman_non_rutin.nama_agenda,peminjaman_non_rutin.tanggal_pemakaian');
	$this->db->from('detail_peminjaman_non_rutin');
	$this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
	$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
	$this->db->join('ruangan', 'ruangan.id_ruangan = detail_peminjaman_non_rutin.id_ruangan');
	$this->db->distinct();
	$this->db->distinct();
	$query = $this->db->get();
	return $query->result();
	}
	
	function tampil_peminjaman_barang(){
	$this->db->select(' barang.nama_barang, detail_peminjaman_barang.id_peminjaman_barang, peminjaman_barang.nip_validator, peminjaman_barang.nama_agenda, peminjaman_barang.tanggal_pemakaian');
	$this->db->from('detail_peminjaman_barang');
	$this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman_barang.id_peminjaman_barang');
	$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
	$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		//$this->db->where('detail_peminjaman_barang.id_peminjam',$id_peminjam);
	$this->db->distinct();
	$query=$this->db->get();
		//return $query->result_array();
	return $query->result();
	}
	
	function get_data_nama_validator_rutin($id_peminjaman){
		$this->db->select('nip_validator');
		$this->db->from('peminjaman_rutin');
		$this->db->where('id_peminjaman_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
    
	function get_data_nama_validator_non_rutin($id_peminjaman){
	$this->db->select('nip_validator');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('id_peminjaman_non_rutin',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_data_nama_validator_barang($id_peminjaman){
	$this->db->select('nip_validator');
		$this->db->from('peminjaman_barang');
		$this->db->where('id_peminjaman_barang',$id_peminjaman);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function rekap_peminjaman_barang(){
			$this->db->select('*');
			$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
			$this->db->select('detail_peminjaman_barang.id_barang ,count(*) as jumPeminjaman');
			$this->db->from('detail_peminjaman_barang');
			$this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman_barang.id_peminjaman_barang');
			$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
			$this->db->group_by('detail_peminjaman_barang.id_barang');
			$this->db->group_by('tahun');
			$this->db->order_by("tahun", "DESC");
			$query = $this->db->get();
			return $query->result();
		}
	function surat_perbulan_barang($id_peminjam){	
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->select('detail_peminjaman_barang.id_barang ,count(*) as jumSurat');
		$this->db->from('detail_peminjaman_barang');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
		$this->db->group_by('detail_peminjaman_barang.id_barang');
		$this->db->group_by('bulan');
		$this->db->group_by('tahun');
		$this->db->where('detail_peminjaman_barang.id_barang',$id_peminjam);
		$this->db->order_by("tahun", "DESC");
		$this->db->order_by("bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	function rekap_surat_perbulan_barang($id_peminjam){
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_barang',$id_peminjam);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_peminjaman_barang($id_peminjam){
		$this->db->select('*');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_barang',$id_peminjam);
		//$this->db->distinct('peminjaman_barang.nama_agenda');
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function surat_perbulan_export_barang($id_peminjam,$bulan,$tahun){	

		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->select('detail_peminjaman_barang.id_barang ,count(*) as jumSurat');
		$this->db->from('detail_peminjaman_barang');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		//$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
		$this->db->group_by('detail_peminjaman_barang.id_barang');
		$this->db->group_by('bulan');
		$this->db->where('detail_peminjaman_barang.id_barang',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		//$this->db->order_by("peminjaman.bulan", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function rekap_surat_perbulan_export_barang($id_peminjam,$bulan,$tahun){
		$this->db->select('*');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%m") as bulan');
		$this->db->select('date_format(peminjaman.tanggal_peminjaman,"%y") as tahun');
		$this->db->from('detail_peminjaman_barang');
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		
		//$this->db->join('surattugas', 'surattugas.Nomor_Surat=detail_st.Nomor_Surat');
		$this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'barang.id_barang=detail_peminjaman_barang.id_barang');
		//$this->db->join('pegawai', 'pegawai.NIP=peminjaman.id_peminjam');
		$this->db->where('detail_peminjaman_barang.id_barang',$id_peminjam);
		$this->db->where('MONTH(peminjaman.tanggal_peminjaman)',$bulan);
		$this->db->where('YEAR(peminjaman.tanggal_peminjaman)',$tahun);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_hak_akses($username){		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$query = $this->db->get();
		return $query->result();
	}
	
	function detail_hak_akses($username){
		$this->db->select('*');
		$this->db->from('ruangan');
		$this->db->join('user', 'user.username=ruangan.username');
		//$this->db->join('ruangan', 'ruangan.ruangan=hak_akses_validator.ruangan');
		$this->db->where('ruangan.username',$username);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
		
	
	}
	
	function list_hak_akses(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('ruangan', 'user.username=ruangan.username');
		//$this->db->join('ruangan', 'ruangan.ruangan=hak_akses_validator.ruangan');
		//$this->db->where('hak_akses_validator.username',$username);
		$query = $this->db->get();
		return $query->result();
	}
	
	function list_hak_akses_ruangan(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('ruangan', 'user.username=ruangan.username');
		//$this->db->join('ruangan', 'ruangan.ruangan=hak_akses_validator.ruangan');
		//$this->db->where('hak_akses_validator.username',$username);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}
	
	function update_std_marks($data,$id_ruangan) {
	$this->db->set('username', null);
    $this->db->where('id_ruangan',$id_ruangan);
    $this->db->update('ruangan',$data);
	}
	
	function getJurusan() {
	return $this->db->get('jurusan')->result(); // Tampilkan semua data yang ada di tabel provinsi ;
  
	}
  
  /* fungsi untuk memanggil data pada table kota*/
	function getProdi($id_jurusan) {
	$this->db->where('id_jurusan', $id_jurusan);   
	$result = $this->db->get('prodi')->result(); // Tampilkan semua data kota berdasarkan id provinsi        return $result; 
	}
	
	public function get_prodi_by_jurusan_js($id_jurusan) {
    $this->db->select('*');
    $this->db->from('prodi');
    $this->db->where('id_jurusan', $id_jurusan);
    $this->db->order_by('prodi', 'ASC');
    $query  = $this->db->get();
    $output = '<option value="">Pilih Program Studi</option>';
    foreach($query->result() as $row)
    {
      $output .= '<option value="'.$row->id_prodi.'">'.$row->prodi.'</option>';
    }
    return $output;
  }
  
  function get_data_history_peminjam(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	
	}
	
	function get_data_history_peminjam_non(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_data_mahasiswa_peminjam(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		//$this->db->where('nim',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_dosen_peminjam(){
		$this->db->select('*');
		$this->db->from('pegawai');
		//$this->db->where('NIP',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_ruangan_peminjaman_rutin_peminjam(){
		$this->db->select('peminjaman_rutin.id_ruangan, ruangan.ruangan, peminjaman_rutin.id_peminjaman_rutin,peminjaman_rutin.nip_validator');
		$this->db->from('peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		//$this->db->where('peminjaman_rutin.id_peminjam',$id);
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_non_rutin_peminjaman_non_rutin_peminjam(){
		$this->db->select('ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.nip_validator');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		//$this->db->where('detail_peminjaman_non_rutin.id_peminjam',$id);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();

	}

}