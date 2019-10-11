<?php 

class M_jadwal extends CI_Model{

	function get_data_jadwal($id_semester){
		$data = $this->db->query("SELECT * FROM jadwal_kuliah WHERE id_semester = $id_semester");
		return $data->result_array();
    }	
    
    function get_data_semester($id_semester){
		$data = $this->db->query("SELECT * FROM semester WHERE id_semester = $id_semester");
		return $data->result_array();
	}	

	function hapus_jadwal_semester($id_semester){
		$this->db->query("DELETE FROM peminjaman_rutin WHERE id_semester = $id_semester");
	}

    function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function hapus_jadwal(){
		$this->db->empty_table('peminjaman_rutin');
	}	

	function ganti_status_jadwal_semester($id_semester){
		$this->db->query("UPDATE jadwal_kuliah SET status='tidak' WHERE id_semester!=$id_semester");
	}

	function ganti_status_aktif_semester($id_semester){
		$this->db->query("UPDATE semester SET status='non aktif' WHERE id_semester!=$id_semester");
	}


	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_data_agenda($date){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		//$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
	//	$this->db->where('tanggal_pemakaian >=',$date);
		$this->db->order_by("tanggal_pemakaian", "DESC");
		//$this->db->where("status='setuju' OR  status='terkirim' OR  status='pending'");
		$query=$this->db->get();
		return $query;
	}

	function get_last_date(){
		$this->db->select('tanggal_pemakaian');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('peminjaman_non_rutin.status !=', 'tolak');
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_jadwal_sisip($id_semester){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester', $id_semester);
		$this->db->where('jadwal_kuliah.status', 'sisip');
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_data_jadwal_ada($id_semester){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester', $id_semester);
		$this->db->where('jadwal_kuliah.status !=', 'sisip');
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_data_jadwal_by_id($id_jadwal_kuliah){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_jadwal_kuliah', $id_jadwal_kuliah);
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_data_jadwal_kuliah_by_id($id_jadwal_kuliah){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_jadwal_kuliah', $id_jadwal_kuliah);
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_jadwal_by_value($id_semester,$hari,$id_jam_kuliah,$id_ruangan){
		$this->db->select('*');
		$this->db->from('jadwal_kuliah');
		$this->db->where('id_semester', $id_semester);
		$this->db->where('hari', $hari);
		$this->db->where('id_jam_kuliah', $id_jam_kuliah);
		$this->db->where('id_ruangan', $id_ruangan);
		$query=$this->db->get();
		return $query->result_array();
	}

	function hapus_jadwal_kuliah_rutin($id_jadwal_kuliah){
		$this->db->query("DELETE FROM peminjaman_rutin WHERE id_jadwal_kuliah = $id_jadwal_kuliah");
	}

	function get_jenis_barang(){
		$hasil=$this->db->query("SELECT * FROM jenis_barang");
		return $hasil;
	}

	function get_subkategori_matakuliah($id){
		$hasil=$this->db->query("SELECT kode_matkul, nama_matkul FROM mata_kuliah ORDER BY nama_matkul ASC");
		return $hasil->result();
	}

	function get_subkategori_ruang($id){
		$hasil=$this->db->query("SELECT id_ruangan, ruangan FROM ruangan WHERE jenis_ruangan = 'rutin'");
		return $hasil->result();
	}

	function get_subkategori_dosen($id){
		$hasil=$this->db->query("SELECT NIP, Nama FROM pegawai WHERE Status = 'dosen' ORDER BY Nama ASC");
		return $hasil->result();

	}

	function get_subkategori_prodi($id){
		$hasil=$this->db->query("SELECT prodi, id_prodi FROM prodi");
		return $hasil->result();
	}

	function get_subkategori_jenis_barang($id){
		$hasil=$this->db->query("SELECT jenis_barang, id_jenis_barang FROM jenis_barang");
		return $hasil->result();

	}

	public function editEmployee(){
		$id = $this->input->get('id_ruangan');
		$this->db->where('id_ruangan', $id);
		$query = $this->db->get('ruangan');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	function get_data_hari_by_id($hari){
		$this->db->select('hari');
		$this->db->from('hari');
		$this->db->where('hari', $hari);
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_ruangan_rutin_bagus_by_id($id_ruang){
		$this->db->select('id_ruangan,ruangan');
		$this->db->from('ruangan');
		$this->db->where('id_ruangan', $id_ruang);
		$query=$this->db->get();
		return $query->result();
	}

	function get_jam_kuliah_by_id($id_waktu){
		$this->db->select('id_jam_kuliah,jam_kuliah');
		$this->db->from('jam_kuliah');
		$this->db->where('id_jam_kuliah', $id_waktu);
		$query=$this->db->get();
		return $query->result();
	}

	function get_data_semester_by_id($id_semester){
		$this->db->select('id_semester,semester,status');
		$this->db->from('semester');
		$this->db->where('id_semester', $id_semester);
		$query=$this->db->get();
		return $query->result();
	}
    
}