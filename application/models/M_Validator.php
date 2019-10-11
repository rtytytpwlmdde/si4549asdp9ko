<?php 

class M_validator extends CI_Model{

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
		
	function cek_kode($id_semester){
			$this->db->select('id_peminjaman_rutin');
			$this->db->from('peminjaman_rutin');
			$this->db->where('id_semester',$id_semester);
			$this->db->order_by("id_peminjaman_rutin", "DESC");
			$this->db->limit('1');
			$query = $this->db->get();
			return $query->result();
	}	

	function cek_ruang_rutin($id_semester,$hari,$id_jam_kuliah,$id_ruangan,$tanggal_pemakaian){
		$this->db->select('id_peminjaman_rutin');
		$this->db->from('peminjaman_rutin');
		$this->db->where('id_semester',$id_semester);
		$this->db->where('hari',$hari);
		$this->db->where('id_jam_kuliah',$id_jam_kuliah);
		$this->db->where('id_ruangan',$id_ruangan);
		$this->db->where('tanggal_pemakaian',$tanggal_pemakaian);
		$query=$this->db->get();
		return $query;
	}

	function get_data_peminjaman(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_peminjaman_per_page($number,$offset){
		$this->db->select('*');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get('peminjaman',$number,$offset);
		return $query->result();
	}

	function get_data_peminjaman_khusus(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('jenis_peminjaman','khusus');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_rutin(){
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->where('status !=', 'tidak tersedia');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_non_rutin_per_page(){
		$this->db->select('*' );
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		//$this->db->join('hak_akses_validator', 'hak_akses_validator.ruangan = ruangan.ruangan');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->group_by('detail_peminjaman_non_rutin.id_ruangan');
		$query = $this->db->get('peminjaman_non_rutin',$number,$offset);
		return $query->result();
	}

	function jumlah_data(){
		$this->db->select('*' );
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		//$this->db->join('hak_akses_validator', 'hak_akses_validator.ruangan = ruangan.ruangan');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->group_by('detail_peminjaman_non_rutin.id_ruangan');
		return 	$query->num_rows();	
	}

	function get_all_data_peminjaman_non_rutins(){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('status !=', 'dikirim');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_khusus(){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');		
		$this->db->where('status !=', 'terkirim');
		$this->db->group_by('detail_peminjaman_non_rutin.id_ruangan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_khususs(){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('status !=', 'terkirim');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_barangs(){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_barang(){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');
		$this->db->join('detail_peminjaman_barang', 'peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_detail_peminjaman_barang(){
		$this->db->select('*');
		$this->db->from('detail_peminjaman_barang');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_detail_peminjaman_non_rutin(){
		$this->db->select('*');
		$this->db->from('detail_peminjaman_non_rutin');
		$query = $this->db->get();
		return $query->result();
	}
    
   
    
}