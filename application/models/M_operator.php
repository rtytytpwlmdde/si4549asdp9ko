<?php 

class M_operator extends CI_Model{

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

	function countPeminjamanNonRutin(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_non_rutin');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','non rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanRutin(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_rutin');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','rutin');
		$query = $this->db->get();
		return $query->result_array();
	}

	function countPeminjamanBarang(){
		$this->db->select('id_peminjaman ,count(*) as count_peminjaman_barang');
		$this->db->from('peminjaman');
		$this->db->where('peminjaman.status_peminjaman','setuju');
		$this->db->where('peminjaman.jenis_peminjaman','barang');
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

	function tampilJamKuliah_modal(){
		$this->db->select('*');
		$this->db->from('jam_kuliah');
		$query = $this->db->get();
		return $query->result_array();
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
		$this->db->select('id_ruangan,ruangan');
		$this->db->from('ruangan');
		$this->db->where('ruangan.status', 'bagus');
		$this->db->where('ruangan.jenis_ruangan', 'rutin');
		$this->db->order_by("ruangan", "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	
	function get_data_dosen(){
		$this->db->select('Nama,NIP');
		$this->db->from('pegawai');
		$this->db->where('pegawai.Status', 'Dosen');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_matakuliah(){
		$this->db->select('kode_matkul,nama_matkul');
		$this->db->from('mata_kuliah');
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
		$this->db->select('nim,nama');
		$this->db->from('mahasiswa');
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
    
	
    
    
    
}