<?php 

class Mvalidator extends CI_Model{

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
		$this->db->join('peminjaman', 'peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
		$this->db->where('status', 'terkirim');
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_all_data_peminjaman_non_rutin($number,$offset){
		$semua = 0;
		if (isset($_POST['semuaSubmit'])) {
			$semua = 1;
		}
		if (isset($_POST['searchSubmit'])) {
			$search = $this->input->post('cari');
			$tglMulai = $this->input->post('tglMulai');
			$tglSelesai = $this->input->post('tglSelesai');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $search);
			$this->session->set_userdata('sess_tglMulai', $tglMulai);
			$this->session->set_userdata('sess_tglSelesai', $tglSelesai);
		}
		else {
				$search = $this->session->userdata('sess_ringkasan');
				$tglMulai = $this->session->userdata('sess_tglMulai');
				$tglSelesai = $this->session->userdata('sess_tglSelesai');
		}
		$akses = $this->session->userdata('username'); //alvin
		$this->db->select('peminjaman_non_rutin.*' );
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('ruangan.username', $akses);
		if($search != null && $semua != 1){
			$this->db->like('peminjaman_non_rutin.id_peminjaman_non_rutin', $search);
			$this->db->or_like('peminjaman_non_rutin.id_peminjam', $search);
			$this->db->or_like('peminjaman_non_rutin.nama_agenda', $search);
			$this->db->or_like('peminjaman.status_peminjaman', $search);
			$this->db->or_like('peminjaman_non_rutin.status_wakadek', $search);
			$this->db->or_like('peminjaman.jenis_peminjaman', $search);
		}
		if($tglSelesai != null && $semua != 1){
			$this->db->where('peminjaman_non_rutin.tanggal_pemakaian >= ', $tglMulai);
			$this->db->where('peminjaman_non_rutin.tanggal_pemakaian <= ', $tglSelesai);
		}else{
			$this->db->where('peminjaman_non_rutin.tanggal_pemakaian', $tglMulai);
		}
		$this->db->order_by('peminjaman_non_rutin.tanggal_peminjaman','desc');
		$this->db->distinct();
		$query = $this->db->get('peminjaman_non_rutin',$number,$offset);
		return $query->result();
	}

	//alvin
	function get_all_data_peminjaman_non_rutin_wakadek($number,$offset){	$semua = 0;
		if (isset($_POST['semuaSubmit'])) {
			$semua = 1;
		}
		if (isset($_POST['searchSubmit'])) {
			$search = $this->input->post('cari');
			$tglMulai = $this->input->post('tglMulai');
			$tglSelesai = $this->input->post('tglSelesai');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $search);
			$this->session->set_userdata('sess_tglMulai', $tglMulai);
			$this->session->set_userdata('sess_tglSelesai', $tglSelesai);
		}
		else {
			$search = $this->session->userdata('sess_ringkasan');
			$tglMulai = $this->session->userdata('sess_tglMulai');
			$tglSelesai = $this->session->userdata('sess_tglSelesai');
		}
		$this->db->select('*');
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('penyelenggara', 'penyelenggara.id_penyelenggara = peminjaman_non_rutin.penyelenggara');
		$this->db->where('peminjaman_non_rutin.status !=','pending');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('penyelenggara.status', '1');
		if($search != null && $semua != 1){
			$this->db->like('peminjaman_non_rutin.id_peminjaman_non_rutin', $search);
			$this->db->or_like('peminjaman_non_rutin.id_peminjam', $search);
			$this->db->or_like('peminjaman_non_rutin.nama_agenda', $search);
			$this->db->or_like('peminjaman.status_peminjaman', $search);
			$this->db->or_like('peminjaman_non_rutin.status_wakadek', $search);
			$this->db->or_like('peminjaman.jenis_peminjaman', $search);
		
		}
		if($tglSelesai != null && $semua != 1){
			$this->db->where('peminjaman.tanggal_pemakaian >=', $tglMulai);
			$this->db->where('peminjaman.tanggal_pemakaian <= ', $tglSelesai);
		}else{
			$this->db->where('peminjaman.tanggal_pemakaian', $tglMulai);
		}
		$this->db->order_by('peminjaman_non_rutin.tanggal_peminjaman','desc');
		$this->db->distinct();
		$query = $this->db->get('peminjaman_non_rutin',$number,$offset);
		return $query->result();
	}

	function jumlah_data(){	
		$semua = 0;
		if (isset($_POST['semuaSubmit'])) {
			$semua = 1;
		}
		if (isset($_POST['searchSubmit'])) {
		$search = $this->input->post('cari');
			$tglMulai = $this->input->post('tglMulai');
			$tglSelesai = $this->input->post('tglSelesai');
		// se session userdata untuk pencarian, untuk paging pencarian
		$this->session->set_userdata('sess_ringkasan', $search);
			$this->session->set_userdata('sess_tglMulai', $tglMulai);
			$this->session->set_userdata('sess_tglSelesai', $tglSelesai);
		}
		else {
			$search = $this->session->userdata('sess_ringkasan');
			$tglMulai = $this->session->userdata('sess_tglMulai');
			$tglSelesai = $this->session->userdata('sess_tglSelesai');
		}
		$akses = $this->session->userdata('username'); //alvin
		$this->db->select('peminjaman_non_rutin.*' );
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('ruangan.username', $akses);
	
		if($search != null && $semua != 1){
			$this->db->like('peminjaman_non_rutin.id_peminjaman_non_rutin', $search);
			$this->db->or_like('peminjaman_non_rutin.id_peminjam', $search);
			$this->db->or_like('peminjaman_non_rutin.nama_agenda', $search);
			$this->db->or_like('peminjaman.status_peminjaman', $search);
			$this->db->or_like('peminjaman_non_rutin.status_wakadek', $search);
			$this->db->or_like('peminjaman.jenis_peminjaman', $search);
		
		}
		if($tglSelesai != null && $semua != 1){
			$this->db->where('peminjaman.tanggal_peminjaman >= ', $tglMulai);
			$this->db->where('peminjaman.tanggal_peminjaman <= ', $tglSelesai);
		}else{
			$this->db->where('peminjaman.tanggal_peminjaman', $tglMulai);
		}
		$this->db->distinct('');
		$query = $this->db->get('peminjaman_non_rutin');
		return 	$query->num_rows();	
	}

	//alvin
	function jumlah_data_wakadek(){	$semua = 0;
		if (isset($_POST['semuaSubmit'])) {
			$semua = 1;
		}
		if (isset($_POST['searchSubmit'])) {
			$search = $this->input->post('cari');
			$tglMulai = $this->input->post('tglMulai');
			$tglSelesai = $this->input->post('tglSelesai');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $search);
			$this->session->set_userdata('sess_tglMulai', $tglMulai);
			$this->session->set_userdata('sess_tglSelesai', $tglSelesai);
			}
			else {
				$search = $this->session->userdata('sess_ringkasan');
			$tglMulai = $this->session->userdata('sess_tglMulai');
			$tglSelesai = $this->session->userdata('sess_tglSelesai');
			}
		$this->db->select('peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('penyelenggara', 'penyelenggara.id_penyelenggara = peminjaman_non_rutin.penyelenggara');
		$this->db->where('peminjaman_non_rutin.status !=','pending');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('penyelenggara.status', '1');
	
		if($search != null && $semua != 1){
			$this->db->like('peminjaman_non_rutin.id_peminjaman_non_rutin', $search);
			$this->db->or_like('peminjaman_non_rutin.id_peminjam', $search);
			$this->db->or_like('peminjaman_non_rutin.nama_agenda', $search);
			$this->db->or_like('peminjaman.status_peminjaman', $search);
			$this->db->or_like('peminjaman_non_rutin.status_wakadek', $search);
			$this->db->or_like('peminjaman.jenis_peminjaman', $search);
		
		}
		if($tglMulai != null && $semua != 1){
			if($tglSelesai != null){
				$this->db->where('peminjaman.tanggal_peminjaman >= ', $tglMulai);
				$this->db->where('peminjaman.tanggal_peminjaman <= ', $tglSelesai);
			}else{
				$this->db->where('peminjaman.tanggal_peminjaman', $tglMulai);
			}
		}
		$this->db->distinct();
		$query = $this->db->get('peminjaman_non_rutin');
		return 	$query->num_rows();	
	}


	function get_all_data_peminjaman_barang(){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');	
		$this->db->join('peminjaman', 'peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		$this->db->where('status','terkirim');
		$this->db->where('peminjaman.jenis_peminjaman', 'barang');
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_pengembalian_barang_by_status($status){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');	
		$this->db->join('peminjaman', 'peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman', 'barang');
		$this->db->where('peminjaman_barang.status_pengembalian', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_rutin_by_status($status){
		
		$this->db->select('*');
		$this->db->from('peminjaman_rutin');
		$this->db->join('peminjaman', 'peminjaman_rutin.id_peminjaman_rutin = peminjaman.id_peminjaman');
		$this->db->where('status', $status);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	
	function catatan_penolakan(){
		
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		//$this->db->where('status', $status);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
//alvin
	function get_all_data_peminjaman_non_rutin_by_status_wakadek($status){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');	
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('penyelenggara', 'penyelenggara.id_penyelenggara = peminjaman_non_rutin.penyelenggara');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('penyelenggara.status', '1');
		$this->db->where('peminjaman_non_rutin.status_wakadek', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	} 
	
	//alvin
	function get_all_data_peminjaman_non_rutin_by_status($status,$akses){
		$this->db->select('peminjaman_non_rutin.*', 'ruangan.username' );
		$this->db->from('peminjaman_non_rutin');	
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('ruangan.username', $akses);
		$this->db->where('peminjaman_non_rutin.status', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}
	function get_all_data_peminjaman_nonnn($status,$akses){
		$this->db->select('peminjaman_non_rutin.*', 'ruangan.username' );
		$this->db->from('peminjaman_non_rutin');	
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->join('detail_peminjaman_non_rutin', 'peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->join('penyelenggara', 'penyelenggara.id_penyelenggara = peminjaman_non_rutin.penyelenggara');
		$this->db->where('peminjaman.jenis_peminjaman', 'non rutin');
		$this->db->where('ruangan.username', $akses);
		$this->db->where('peminjaman_non_rutin.status', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}
	function get_all_data_peminjaman_khusus_by_status($status){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');	
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman', 'khusus');
		$this->db->where('peminjaman_non_rutin.status', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_barang_by_status($status){
		$this->db->select('*');
		$this->db->from('peminjaman_barang');	
		$this->db->join('peminjaman', 'peminjaman_barang.id_peminjaman_barang = peminjaman.id_peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman', 'barang');
		$this->db->where('peminjaman_barang.status', $status);
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_khusus(){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');	
		$this->db->join('peminjaman', 'peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman.id_peminjaman');
		$this->db->where('peminjaman.jenis_peminjaman', 'khusus');
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_detail_non_rutin_wakadek(){
		$this->db->select('ruangan.ruangan, ruangan.id_ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}
	
	//alvin
	function get_ruangan_detail_non_rutin($akses){
		$this->db->select('*');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->join('peminjaman_non_rutin', 'detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->where('ruangan.username', $akses);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}
	
	function ruangan_pemakaian(){
		$this->db->select('*');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->join('peminjaman_non_rutin', 'detail_peminjaman_non_rutin.id_peminjaman_non_rutin = peminjaman_non_rutin.id_peminjaman_non_rutin');
		//$this->db->where('ruangan.username', $akses);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_ruangan_detail_barang(){
		$this->db->select('barang.nama_barang, barang.id_barang, detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
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

	function get_ruangan_detail_barang_by_id($id){
		$this->db->select('barang.nama_barang, barang.id_barang, detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');	
		$this->db->where('detail_peminjaman_barang.id_peminjaman_barang', $id);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}

	function get_all_data_peminjaman_khususs(){
		$this->db->select('*');
		$this->db->from('peminjaman_non_rutin');
		$this->db->where('status !=', 'terkirim');
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
    function get_telp_pegawai(){
			$this->db->select('*');
			$this->db->from('pegawai');
			//$this->db->join('peminjaman','peminjaman.id_peminjam =  pegawai.NIP');
			$query = $this->db->get();
			return $query->result();
	}
	 function get_telp_mahasiswa(){
			$this->db->select('*');
			$this->db->from('mahasiswa');
			//$this->db->join('peminjaman','peminjaman.id_peminjam =  mahasiswa.nim');
			//$this->db->where('mahasiswa.telpon');
			$query = $this->db->get();
			return $query->result();
	}
	   
	function get_data_history_peminjam(){
		$username=$this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('id_peminjam',$username);
		$this->db->order_by("peminjaman.tanggal_peminjaman", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_peminjaman_rutin_by_peminjam(){
		$username=$this->session->userdata('username');
		$this->db->select('peminjaman_rutin.id_ruangan, ruangan.ruangan, peminjaman_rutin.id_peminjaman_rutin,peminjaman_rutin.nip_validator');
		$this->db->from('peminjaman_rutin');
		$this->db->join('ruangan', 'peminjaman_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('peminjaman_rutin.id_peminjam',$username);
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_barang_peminjaman_barang_by_peminjam(){
		$username=$this->session->userdata('username');
		$this->db->select('barang.nama_barang, detail_peminjaman_barang.id_peminjaman_barang, peminjaman_barang.nip_validator');
		$this->db->from('detail_peminjaman_barang');
		$this->db->join('peminjaman_barang','peminjaman_barang.id_peminjaman_barang = detail_peminjaman_barang.id_peminjaman_barang');
		$this->db->join('barang', 'detail_peminjaman_barang.id_barang = barang.id_barang');
		$this->db->where('detail_peminjaman_barang.id_peminjam',$username);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();
	}
	
	function get_non_rutin_peminjaman_non_rutin_by_peminjam(){
		$username=$this->session->userdata('username');
		$this->db->select('ruangan.ruangan, detail_peminjaman_non_rutin.id_peminjaman_non_rutin, peminjaman_non_rutin.nip_validator');
		$this->db->from('detail_peminjaman_non_rutin');
		$this->db->join('peminjaman_non_rutin','peminjaman_non_rutin.id_peminjaman_non_rutin = detail_peminjaman_non_rutin.id_peminjaman_non_rutin');
		$this->db->join('ruangan', 'detail_peminjaman_non_rutin.id_ruangan = ruangan.id_ruangan');
		$this->db->where('detail_peminjaman_non_rutin.id_peminjam',$username);
		$this->db->distinct();
		$query=$this->db->get();
		return $query->result();

	}


}