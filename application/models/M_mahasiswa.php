<?php 

class M_mahasiswa extends CI_Model{

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
    
	function get_data_dosen(){
		$this->db->select('Nama,NIP');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Status', 'Dosen');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_subkategori_kategori($id){
		$hasil=$this->db->query("SELECT * FROM penyelenggara ");
		return $hasil->result();

	}
	function get_subkategori_akademik($id){
		$hasil=$this->db->query("SELECT id_penyelenggara, penyelenggara FROM penyelenggara WHERE penyelenggara = ' akademik '");
		return $hasil->result();

	}
	
	function get_data_matakuliah(){
		$this->db->select('Mata_Kuliah,id');
		$this->db->from('matakuliah');
		$query = $this->db->get();
		return $query->result();
	}
    
    function get_data_ruangan(){
		$this->db->select('id,Nama_Ruangan');
		$this->db->from('ruangan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_peminjaman_rutin_by_peminjam($id){
		$this->db->select('peminjaman_rutin.id_ruangan, ruangan.ruangan, peminjaman_rutin.id_peminjaman_rutin,peminjaman_rutin.nip_validator');
		$this->db->from('peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman_rutin.id_peminjam',$id);
		$query=$this->db->get();
		return $query->result();
	}

	function get_barang_peminjaman_barang_by_peminjam($id){
		$this->db->select('barang.nama_barang, detail_peminjaman_barang.id_peminjaman_barang, peminjaman_barang.nip_validator');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_peminjam',$id);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}

	function get_non_rutin_peminjaman_non_rutin_by_peminjam($id){
		$this->db->select('ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.nip_validator');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjam',$id);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();

	}

	function get_ruangan_detail_non_rutin_by_id($id){
		$this->db->select('ruangan.ruangan, ruangan.id_ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');	
		$this->db->where('detail_peminjaman_non_rutin.id_peminjaman_non_rutin', $id);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_ruangan_khusus(){
		$this->db->select('*');
		$this->db->from('ruangan');
		$this->db->where('jenis_ruangan','khusus');
		$this->db->where('status','bagus');
		$query = $this->db->get();
		return $query->result();

	}

	function get_data_jam_kuliah(){
		$this->db->select('id_jam_kuliah,jam_kuliah');
		$this->db->from('jam_kuliah');
		$query = $this->db->get();
		return $query->result();
    }
    
    function get_data_semester(){
		$this->db->select('id_semester');
		$this->db->from('semester');
		$this->db->order_by("id_semester", "DESC");
		$this->db->limit('1');
		$query = $this->db->get();
		return $query->result();
		}
		
	function cek_kode(){
			$this->db->select('id_peminjaman_rutin');
			$this->db->from('peminjaman_rutin');
			$this->db->order_by("id_peminjaman_rutin", "DESC");
			$this->db->limit('1');
			$query = $this->db->get();
			return $query->result();
	}	

	function cek_ruang_rutin($id_semester,$id_jam_kuliah,$id_ruangan,$tanggal_pemakaian){
		$this->db->select('id_peminjaman_rutin');
		$this->db->from('peminjaman_rutin');
		$this->db->where('id_semester',$id_semester);
		$this->db->where('id_jam_kuliah',$id_jam_kuliah);
		$this->db->where('id_ruangan',$id_ruangan);
		$this->db->where('tanggal_pemakaian',$tanggal_pemakaian);
		$this->db->where('status !=', 'tolak');
		$query=$this->db->get();
		return $query;
	}

	function cek_ruang_non_rutin($id_jam_kuliah,$id_ruangan,$tanggal_pemakaian){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$tanggal_pemakaian);
		$this->db->where('detail_peminjaman_non_rutin.id_ruangan',$id_ruangan);
		$this->db->where('detail_peminjaman_non_rutin.id_jam_kuliah',$id_jam_kuliah);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query=$this->db->get();
		return $query;
	}

	function tampilPeminjamanRutinToDay($date){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$date);
		$this->db->where('status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}

	function get_status_ruangan($id){
		$this->db->select('id_ruangan, jenis_ruangan');
		$this->db->from('ruangan');
		$this->db->where('id_ruangan',$id);
		$query=$this->db->get();
		return $query->result();
	}

	function tampilPeminjamanNonRutinToDay($date){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.penyelenggara, detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian, peminjaman_non_rutin.status');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}


	function get_data_history_peminjam($id){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('id_peminjam',$id);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_mahasiswa_peminjam($id){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_dosen_peminjam($id){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('NIP',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_peminjaman_non_rutin_by_id($id){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('peminjaman','peminjaman.id_peminjaman = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('id_peminjaman_non_rutin',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_peminjaman_barang_by_id($id){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');
		$this->db->where('id_peminjaman_barang',$id);
		$query = $this->db->get();
		return $query->result();

	}

    function get_detail_peminjaman_non_rutin_by_id($id){
		$this->db->select('*');
		$this->db->select('detail_peminjaman_non_rutin.id_peminjaman_non_rutin as id_pem');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->where('id_peminjaman_non_rutin',$id);
		$this->db->group_by('detail_peminjaman_non_rutin.id_ruangan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_detail_peminjaman_barang_by_id($id){
		$this->db->select('*');
		$this->db->select('detail_peminjaman_barang.id_peminjaman_barang as id_pem');
		$this->db->from('detail_peminjaman_barang');
		$this->db->where('id_peminjaman_barang',$id);
		$query = $this->db->get();
		return $query->result();
	}


	function get_data_cek_ruangan_rutin($tanggal_pemakaian,$id_ruangan){
		$this->db->select('id_peminjaman_rutin,id_jam_kuliah,id_ruangan,tanggal_pemakaian');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$tanggal_pemakaian);
		$this->db->where('id_ruangan',$id_ruangan);
		$this->db->where('peminjaman_rutin.status !=', 'tolak');
		$query = $this->db->get();
		return $query->result();
	}

	
	function get_data_cek_jadwal_rutin($day,$id_ruangan){
		$this->db->select('id_jadwal_kuliah,id_jam_kuliah');
		$this->db->from('jadwal_kuliah');
		$this->db->where('hari',$day);
		$this->db->where('id_ruangan',$id_ruangan);
		$this->db->where('status', 'ada');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_cek_peminjaman_barang($tanggal_pemakaian,$id_barang){
		$this->db->select('detail_peminjaman_barang.id_barang, peminjaman_barang.jam_mulai, peminjaman_barang.jam_selesai, peminjaman_barang.status');
		$this->db->from('peminjaman_barang');
		$this->db->join('detail_peminjaman_barang', 'peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->where('peminjaman_barang.tanggal_pemakaian',$tanggal_pemakaian);
		$this->db->where('detail_peminjaman_barang.id_barang',$id_barang);
		$this->db->where('peminjaman_barang.status !=', 'tolak');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_cek_ruangan_non_rutin($tanggal_pemakaian, $id_ruangan){
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin, detail_peminjaman_non_rutin.id_ruangan, peminjaman_non_rutin.jam_mulai_peminjaman, peminjaman_non_rutin.jam_selesai_peminjaman, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$tanggal_pemakaian);
		$this->db->where('detail_peminjaman_non_rutin.id_ruangan',$id_ruangan);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_peminjaman_non_rutin($date){
		$this->db->select('detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}

	function get_tanggal_peminjaman($id){
		$data = $this->db->query(
			"SELECT peminjaman_non_rutin.tanggal_pemakaian, peminjaman_non_rutin.jam_mulai_peminjaman, peminjaman_non_rutin.jam_selesai_peminjaman
			FROM peminjaman_non_rutin 
			WHERE peminjaman_non_rutin.id_peminjaman_non_rutin = $id");
		return $data->result_array();
	}

	function get_jadwal_peminjaman_rutin($tgl,$mulai,$selesai){
		$jam1=0;$jam2=0;$jam3=0;$jam4=0;$jam5=0;
		for ($x = $mulai; $x <= $selesai; $x++) {
			if ($x==7 || $x==8 || $x==9 ){
				$jam1 = 1;
			}
			elseif ($x==10 || $x==11){
				$jam2 = 2;
			}
			elseif ($x==13 || $x==14 || $x==15 ){
				$jam3 = 3;
			}
			elseif ($x==16 || $x==17  ){
				$jam4 = 4;
			}   
			elseif ($x==18 || $x==19 || $x==20 || $x==21 ){
				$jam5 = 5;
			}     
		}
		
		$replace = max($jam1,$jam2,$jam4,$jam5,$jam3);


		$this->db->select('ruangan.id_ruangan, ruangan.ruangan');
		$this->db->from('peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman_rutin.tanggal_pemakaian',$tgl);
		$this->db->where('peminjaman_rutin.status !=', 'tolak');
		$this->db->where('peminjaman_rutin.status !=', 'tidak tersedia');
		if($jam1 == 0){ $jam1 = $replace;}
		if($jam2 == 0){ $jam2 = $replace;}
		if($jam3 == 0){ $jam3 = $replace;}
		if($jam4 == 0){ $jam4 = $replace;}
		if($jam5 == 0){ $jam5 = $replace;}
		$this->db->where('peminjaman_rutin.id_jam_kuliah',$jam1);
		$this->db->where('peminjaman_rutin.id_jam_kuliah',$jam2);
		$this->db->where('peminjaman_rutin.id_jam_kuliah',$jam3);
		$this->db->where('peminjaman_rutin.id_jam_kuliah',$jam4);
		$this->db->where('peminjaman_rutin.id_jam_kuliah',$jam5);
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_data_ruangan_rutin_tersedia($date){
		$this->db->select('detail_peminjaman_non_rutin.id_ruangan, detail_peminjaman_non_rutin.id_jam_kuliah, peminjaman_non_rutin.tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_ruangan_tersedia(){
		$this->db->select('id_ruangan,ruangan,jenis_ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_ruangan_rutin_non_rutin_tersedia(){
		$this->db->select('id_ruangan,ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$this->db->where('ruangan.jenis_ruangan !=', 'khusus');
		$this->db->order_by("jenis_ruangan", "ASC");
		$this->db->order_by("ruangan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}


	function get_ruangan_peminjaman_rutin($date){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->where('tanggal_pemakaian',$date);
		$this->db->where('status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
		// $this->db->select('*');
		// $this->db->from('peminjaman_rutin');
		// $this->db->join('peminjaman_non_rutin', 'peminjaman_non_rutin.tanggal_pemakaian = peminjaman_rutin.tanggal_pemakaian');
		// //$this->db->join('detail_peminjaman_non_rutin', 'detail_peminjaman_non_rutin.id_ruangan = peminjaman_rutin.id_ruangan');
		// $this->db->where('peminjaman_rutin.tanggal_pemakaian',$date);
		// $this->db->where('peminjaman_non_rutin.tanggal_pemakaian',$date);
		// $this->db->where('peminjaman_rutin.status !=', 'tolak');
		// $this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		// $query=$this->db->get();
		// return $query->result_array();
	}

	function get_barang_bagus(){
		$hasil=$this->db->query("SELECT * FROM barang");
		return $hasil;
    }

    function get_jenis_barang(){
		$hasil=$this->db->query("SELECT * FROM jenis_barang");
		return $hasil;
	}

	function get_subkategori($id){
		$hasil=$this->db->query("SELECT * FROM barang WHERE id_jenis_barang='$id'");
		return $hasil->result();
	}

}