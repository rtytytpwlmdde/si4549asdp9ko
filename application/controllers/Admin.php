<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'admin'){
				redirect('auth/logout');
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->model('m_auth');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
		$this->load->model('m_mahasiswa');
	}

	function index(){
		$tahun = date("Y");
		$data['user'] = $this->m_admin->countUser();
		$data['dosen'] = $this->m_admin->countDosen();
		$data['mahasiswa'] = $this->m_admin->countMahasiswa();
		$data['rutin'] = $this->m_admin->countRuanganRutin();
		$data['non_rutin'] = $this->m_admin->countRuanganNonRutin();
		$data['barang'] = $this->m_admin->countBarang();
		$data['count_peminjaman'] = $this->m_admin->countPeminjaman();
		$data['periode'] = $this->m_admin->get_periode($tahun);
		$data['tot_peminjaman_by_year'] = $this->m_admin->get_count_peminjaman_by_year($tahun);
		$data['pegawai'] = $this->m_admin->get_jum_surat_dosen($tahun);
		$data['mahasiswaP'] = $this->m_admin->get_jum_surat_staff($tahun);
		$data['barangP'] = $this->m_admin->get_jum_surat_barang($tahun);
		$data['peminjaman_rutin'] = $this->m_admin->countPeminjamanRutin();
		$data['peminjaman_non_rutin'] = $this->m_admin->countPeminjamanNonRutin();
		$data['peminjaman_barang'] = $this->m_admin->countPeminjamanBarang();
		$data['main_view'] = 'admin/v_dashboard';
		$this->load->view('template/template_admin', $data);
	}

	function indeks(){
		$tahun = $this->input->post('tahun');
		$data['user'] = $this->m_admin->countUser();
		$data['dosen'] = $this->m_admin->countDosen();
		$data['mahasiswa'] = $this->m_admin->countMahasiswa();
		$data['rutin'] = $this->m_admin->countRuanganRutin();
		$data['non_rutin'] = $this->m_admin->countRuanganNonRutin();
		$data['barang'] = $this->m_admin->countBarang();
		$data['count_peminjaman'] = $this->m_admin->countPeminjaman();
		$data['pegawai'] = $this->m_admin->get_jum_surat_dosen($tahun);
		$data['mahasiswaP'] = $this->m_admin->get_jum_surat_staff($tahun);
		$data['barangP'] = $this->m_admin->get_jum_surat_barang($tahun);
		$data['periode'] = $this->m_admin->get_periode($tahun);
		$data['tot_peminjaman_by_year'] = $this->m_admin->get_count_peminjaman_by_year($tahun);
		$data['peminjaman_rutin'] = $this->m_admin->countPeminjamanRutin();
		$data['peminjaman_non_rutin'] = $this->m_admin->countPeminjamanNonRutin();
		$data['peminjaman_barang'] = $this->m_admin->countPeminjamanBarang();
		$data['main_view'] = 'admin/v_dashboard';
		$this->load->view('template/template_admin', $data);
	}
	

	function data_pegawai(){
		$data['main_view'] = 'admin/v_list_pegawai';
		$data['pegawai'] = $this->m_admin->tampilPegawai()->result();
		$this->load->view('template/template_admin', $data);
	}

	function data_dosen(){
		$data['main_view'] = 'admin/v_list_dosen';
		$data['pegawai'] = $this->m_admin->tampilDosen()->result();
		$this->load->view('template/template_admin', $data);
	}

	function data_staff(){
		$data['main_view'] = 'admin/v_list_staff';
		$data['pegawai'] = $this->m_admin->tampilStaff()->result();
		$this->load->view('template/template_admin', $data);
	}

	function data_non_homebase(){
		$data['main_view'] = 'admin/v_list_non_homebase';
		$data['pegawai'] = $this->m_admin->tampilNonHomebase()->result();
		$this->load->view('template/template_admin', $data);
	}

	function tambah_pegawai(){
		$data['main_view'] = 'admin/v_tambah_pegawai';
		$this->load->view('template/template_admin', $data);
	}

	function tambahPegawai(){
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Status = $this->input->post('Status');
		$Pangkat = $this->input->post('Pangkat');
		$No_Telp = $this->input->post('No_Telp');
		$Bagian = $this->input->post('Bagian');
		$Urusan = $this->input->post('Urusan');
		$Sub_Bagian = $this->input->post('Sub_Bagian');
		$stat = 'aktif';
		$jabatan = $this->input->post('jabatan');
		$password = substr($NIP, -6);
		
		if(!preg_match('/[^+0-9]/',trim($No_Telp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($No_Telp), 0, 2)=='62'){
            $hp = trim($No_Telp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($No_Telp), 0, 1)=='0'){
            $hp = '62'.substr(trim($No_Telp), 1);
        }
    }
		
		$data = array(
			'NIP' => $NIP,
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Password' =>$password,
			'No_Telp' =>$hp,
			'Bagian' => $Bagian,
			'Sub_Bagian' => $Sub_Bagian,
			'stat' => $stat,
			'Urusan' => $Urusan,
			'jabatan' => $jabatan
		);
		$this->m_admin->tambahdata($data,'pegawai');
		$this->session->set_flashdata('notif', "Pegawai $NIP berhasil ditambahkan");
		redirect('admin/data_pegawai');
	}

	function update_pegawai($NIP){
		$data['main_view'] = 'admin/v_edit_pegawai';
		$where = array('NIP' => $NIP);
		$data['pegawai'] = $this->m_admin->edit_data($where,'pegawai')->result();
		$data['peg'] = $this->m_admin->get_bagian();
		$this->load->view('template/template_admin', $data);
	}

	function editPegawai(){
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Status = $this->input->post('Status');
		$Pangkat = $this->input->post('Pangkat');
		$No_Telp = $this->input->post('No_Telp');
		$Bagian = $this->input->post('Bagian');
		$Urusan = $this->input->post('Urusan');
		$Sub_Bagian = $this->input->post('Sub_Bagian');
		$jabatan = $this->input->post('jabatan');
		$stat = $this->input->post('stat');
		
		if(!preg_match('/[^+0-9]/',trim($No_Telp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($No_Telp), 0, 2)=='62'){
            $hp = trim($No_Telp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($No_Telp), 0, 1)=='0'){
            $hp = '62'.substr(trim($No_Telp), 1);
        }
    }
		
		$data = array(
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Bagian' => $Bagian,
			'Sub_Bagian' => $Sub_Bagian,
			'Urusan' => $Urusan,
			'stat' => $stat,
			'jabatan' => $jabatan,
			'No_Telp' => $hp
			
		
		);

		$where = array('NIP' => $NIP);

		$this->m_admin->update_data($where,$data,'pegawai');
		$this->session->set_flashdata('notif', "Data Pegawai $NIP berhasil di Update");
		redirect('admin/data_pegawai');
	}

	function hapusPegawai($NIP){
		$where = array('NIP' => $NIP);
		$this->m_admin->hapus_data($where,'pegawai');
		$this->session->set_flashdata('notif', "Data Pegawai $NIP berhasil dihapus");
		redirect('admin/data_pegawai');
	}

	//------------Mahasiswa
	function mahasiswa(){
		$data['main_view'] = 'admin/v_list_mahasiswa';
		$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin', $data);
	}
	public function get_prodi_by_jurusan_js(){
      if($this->input->post('id_jurusan'))
      {
      echo $this->m_admin->get_prodi_by_jurusan_js($this->input->post('id_jurusan'));
      }
    }	
	function inputMahasiwa(){
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_mahasiswa';
		$this->load->view('template/template_admin',$data);
	}
	function tambahMahasiswa(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$telpon = $this->input->post('telpon');
		$password = substr($nim, -6);
		/*if($id_jurusan=="prodi"){
		echo $this->model_select->kabupaten($id_prodi);
		}*/
		if(!preg_match('/[^+0-9]/',trim($telpon))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($telpon), 0, 2)=='62'){
            $hp = trim($telpon);
        }elseif(substr(trim($telpon), 0, 3)=='+62'){
            $hp = trim($telpon);
		}
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($telpon), 0, 1)=='0'){
            $hp = '62'.substr(trim($telpon), 1);
        }
    }
	
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'password' =>$password,
			'telpon' =>$hp
		);
		$this->m_admin->tambahdata($data,'mahasiswa');
		$this->session->set_flashdata('notif', "Mahasiswa $NIM berhasil ditambahkan");
		redirect('admin/mahasiswa');
	}

	function hapusMahasiswa($nim){
		$where = array('nim' => $nim);
		$this->m_admin->hapus_data($where,'mahasiswa');
		$this->session->set_flashdata('notif', "Data Mahasiswa $nim berhasil dihapus");
		redirect('admin/mahasiswa');
	}

	function updateMahasiswa($nim){
		$data['main_view'] = 'admin/v_edit_mahasiswa';
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['mahasiswa'] = $this->m_admin->edit_data($where,'mahasiswa')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_mahasiswa($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editMahasiswa(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$telpon = $this->input->post('telpon');
		if(!preg_match('/[^+0-9]/',trim($telpon))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($telpon), 0, 2)=='62'){
            $hp = trim($telpon);
        }elseif(substr(trim($telpon), 0, 3)=='+62'){
            $hp = trim($telpon);
		}
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($telpon), 0, 1)=='0'){
            $hp = '62'.substr(trim($telpon), 1);
        }
    }
		$data = array(
			'nama' => $nama,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'telpon' => $hp	
		
		);

		$where = array('nim' => $nim);

		$this->m_admin->update_data($where,$data,'mahasiswa');
		$this->session->set_flashdata('notif', "Data mahasiswa $nim berhasil di Update");
		redirect('admin/mahasiswa');
	}

	
	//------------Mahasiswa
	function penyelenggara(){
		$data['main_view'] = 'admin/v_list_penyelenggara';
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputPenyelenggara(){
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_penyelenggara';
		$this->load->view('template/template_admin',$data);
	}
	function tambahPenyelenggara(){
		$penyelenggara = $this->input->post('penyelenggara');
		$status = $this->input->post('status');
		$status_penyelenggara = 'aktif';
		
		$data = array(
			'penyelenggara' => $penyelenggara,
			'status' => $status,
			'status_penyelenggara' =>$status_penyelenggara
		);
		$this->m_admin->tambahdata($data,'penyelenggara');
		$this->session->set_flashdata('notif', "Penyelenggara $penyelenggara berhasil ditambahkan");
		redirect('admin/penyelenggara');
	}

	function hapusPenyelenggara($id_penyelenggara){
		$where = array('id_penyelenggara' => $id_penyelenggara);
		$this->m_admin->hapus_data($where,'penyelenggara');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_penyelenggara berhasil dihapus");
		redirect('admin/penyelenggara');
	}

	function updatePenyelenggara($id_penyelenggara){
		$data['main_view'] = 'admin/v_edit_penyelenggara';
		$where = array('id_penyelenggara' => $id_penyelenggara);
		$data['penyelenggara'] = $this->m_admin->edit_data($where,'penyelenggara')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editPenyelenggara(){
		$id_penyelenggara = $this->input->post('id_penyelenggara');
		$penyelenggara = $this->input->post('penyelenggara');
		$status = $this->input->post('status');
		$status_penyelenggara = $this->input->post('status_penyelenggara');
		
		$data = array(
			'id_penyelenggara' => $id_penyelenggara,
			'penyelenggara' => $penyelenggara,
			'status_penyelenggara' => $status_penyelenggara,
			'status' => $status
		);

		$where = array('id_penyelenggara' => $id_penyelenggara);

		$this->m_admin->update_data($where,$data,'penyelenggara');
		$this->session->set_flashdata('notif', "Data penyelenggara $penyelenggara berhasil di Update");
		redirect('admin/penyelenggara');
	}

	//ruangan

	function ruangan(){
		$data['main_view'] = 'admin/v_list_ruangan';
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['detail_hak_akses'] = $this->m_admin->list_hak_akses_ruangan();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputRuangan(){
		//$data['ruangan'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah_ruangan';
		$this->load->view('template/template_admin',$data);
	}
	function tambahRuangan(){
		$ruangan = $this->input->post('ruangan');
		$status = $this->input->post('status');
		$jenis_ruangan = $this->input->post('jenis_ruangan');
		$data = array(
			'ruangan' => $ruangan,
			'status' => $status,
			'jenis_ruangan' =>$jenis_ruangan
		);
		$this->m_admin->tambahdata($data,'ruangan');
		$this->session->set_flashdata('notif', "Ruangan berhasil ditambahkan");
		redirect('admin/ruangan');
	}

	function hapusRuangan($id){
		$where = array('id_ruangan' => $id);
		$this->m_admin->hapus_data($where,'ruangan');
		$this->session->set_flashdata('notif', "Data Ruangan berhasil dihapus");
		redirect('admin/ruangan');
	}

	function updateRuangan($id){
		$data['main_view'] = 'admin/v_edit_ruangan';
		$where = array('id_ruangan' => $id);
		$data['ruangan'] = $this->m_admin->edit_data($where,'ruangan')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_ruangan($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editRuangan(){
		$id_ruangan = $this->input->post('id_ruangan');
		$ruangan = $this->input->post('ruangan');
		$status = $this->input->post('status');
		$jenis_ruangan = $this->input->post('jenis_ruangan');
		$data = array(
			'ruangan' => $ruangan,
			'status' => $status,
			'jenis_ruangan' => $jenis_ruangan
		
		);

		$where = array('id_ruangan' => $id_ruangan);

		$this->m_admin->update_data($where,$data,'ruangan');
		$this->session->set_flashdata('notif', "Data ruangan berhasil di Update");
		redirect('admin/ruangan');
	}

	////////----------------- matakuliah ---------////
	function matakuliah(){
		$data['main_view'] = 'admin/v_list_mata_kuliah';
		$data['mata_kuliah'] = $this->m_admin->tampilMatkul()->result();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputMatkul(){
		//$data['ruangan'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah_mata_kuliah';
		$this->load->view('template/template_admin',$data);
	}

	function tambahMatkul(){
		$kode_matkul = $this->input->post('kode_matkul');
		$nama_matkul = $this->input->post('nama_matkul');
		$status = $this->input->post('status');
		
		$data = array(
			'kode_matkul' => $kode_matkul,
			'nama_matkul' => $nama_matkul,
			'status' => $status
		);
		$this->m_admin->tambahdata($data,'mata_kuliah');
		$this->session->set_flashdata('notif', "matakuliah $kode_matkul berhasil ditambahkan");
		redirect('admin/matakuliah');
	}

	function hapusMatkul($kode_matkul){
		$where = array('kode_matkul' => $kode_matkul);
		$this->m_admin->hapus_data($where,'mata_kuliah');
		$this->session->set_flashdata('notif', "Data matakuliah $kode_matkul berhasil dihapus");
		redirect('admin/matakuliah');
	}

	function updateMatkul($kode_matkul){
		$data['main_view'] = 'admin/v_edit_mata_kuliah';
		$where = array('kode_matkul' => $kode_matkul);
		$data['mata_kuliah'] = $this->m_admin->edit_data($where,'mata_kuliah')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_matkul($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editMatkul(){
		$kode_matkul = $this->input->post('kode_matkul');
		$nama_matkul = $this->input->post('nama_matkul');
		$status = $this->input->post('status');
			
		$data = array(
			'nama_matkul' => $nama_matkul,
			'status' => $status	
		
		);

		$where = array('kode_matkul' => $kode_matkul);

		$this->m_admin->update_data($where,$data,'mata_kuliah');
		$this->session->set_flashdata('notif', "Data matakuliah $kode_matkul berhasil di Update");
		redirect('admin/matakuliah');
	}

	// user
	function user(){
		$data['main_view'] = 'admin/v_list_user';
		$data['user'] = $this->m_admin->tampilUser()->result();
		$data['detail_hak_akses'] = $this->m_admin->list_hak_akses();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputUser(){
		//$data['ruangan'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah_user';
		$this->load->view('template/template_admin',$data);
	}
	function tambahUser(){
		$username = $this->input->post('username');
		$status = $this->input->post('status');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'status' => $status,
			'password' =>$password
		);
		$this->m_admin->tambahdata($data,'user');
		$this->session->set_flashdata('notif', "User $username berhasil ditambahkan");
		redirect('admin/user');
	}

	function hapusUser($id){
		$where = array('username' => $id);
		$this->m_admin->hapus_data($where,'user');
		$this->session->set_flashdata('notif', "Data user $id berhasil dihapus");
		redirect('admin/user');
	}

	function updateUser($id){
		$data['main_view'] = 'admin/v_edit_user';
		$where = array('username' => $id);
		$data['user'] = $this->m_admin->edit_data($where,'user')->result();
		$this->load->view('template/template_admin',$data);
	}

	function edit_data_user($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function editUser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		
		$data = array(
			'username' => $username,
			'status' => $status,
			'password' => $password	
		
		);

		$where = array('username' => $username);

		$this->m_admin->update_data($where,$data,'user');
		$this->session->set_flashdata('notif', "Data user $username berhasil di Update");
		redirect('admin/user');
	}

	////---------------------------- Kategori-----------///
	
	function jenis_barang(){
		$data['main_view'] = 'admin/v_list_jenis_barang';
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$this->load->view('template/template_admin', $data);
    }
    
    function inputKategori(){
		//$data['ruangan'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah_jenis_barang';
		$this->load->view('template/template_admin',$data);
	}
	function tambahKategori(){
		$jenis_barang = $this->input->post('jenis_barang');
		
		$data = array(
			'jenis_barang' => $jenis_barang
		);
		$this->m_admin->tambahdata($data,'jenis_barang');
		$this->session->set_flashdata('notif', "Kategori berhasil ditambahkan");
		redirect('admin/jenis_barang');
	}

	function hapusKategori($id){
		$where = array('id_jenis_barang' => $id);
		$this->m_admin->hapus_data($where,'jenis_barang');
		$this->session->set_flashdata('notif', "Data Kategori berhasil dihapus");
		redirect('admin/jenis_barang');
	}

	function updateKategori($id){
		$data['main_view'] = 'admin/v_edit_jenis_barang';
		$where = array('id_jenis_barang' => $id);
		$data['jenis_barang'] = $this->m_admin->edit_data($where,'jenis_barang')->result();
		$this->load->view('template/template_admin',$data);
	}
	function edit_data_kategori($where,$table){
	 return $this->db->get_where($table,$where);
	}
	
	function editKategori(){
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$jenis_barang = $this->input->post('jenis_barnag');
		
		$data = array(
			'jenis_barang' => $jenis_barang
		);

		$where = array('id_jenis_barang' => $id_jenis_barang);

		$this->m_admin->update_data($where,$data,'jenis_barang');
		$this->session->set_flashdata('notif', "Data kategori berhasil di Update");
		redirect('admin/jenis_barang');
	}

	/////////////////----------------- Barang------///
	function barang(){
		$data['main_view'] = 'admin/v_list_barang';
		$data['jenis_barang'] = $this->m_admin->get_jenisbarang();
		$data['barang'] = $this->m_admin->tampilBarang()->result();
		$this->load->view('template/template_admin', $data);
    }
	function inputBarang(){
		$data['jenis_barang'] = $this->m_admin->get_jenisbarang();
		$data['main_view'] = 'admin/v_tambah_barang';
		$this->load->view('template/template_admin',$data);
	}
	function tambahBarang(){
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$nama_barang = $this->input->post('nama_barang');
		$status_barang = $this->input->post('status_barang');
		
		$data = array(
			'id_jenis_barang'=> $id_jenis_barang,
			'nama_barang' => $nama_barang,
			'status_barang' => $status_barang
		);
		$this->m_admin->tambahdata($data,'barang');
		$this->session->set_flashdata('notif', "Kategori berhasil ditambahkan");
		redirect('admin/barang');
	}
	
	function hapusBarang($id){
		$where = array('id_barang' => $id);
		$this->m_admin->hapus_data($where,'barang');
		$this->session->set_flashdata('notif', "Data berhasil dihapus");
		redirect('admin/barang');
	}

	function updateBarang($id){
		$data['main_view'] = 'admin/v_edit_barang';
		$where = array('id_barang' => $id);
		$data['barang'] = $this->m_admin->edit_data($where,'barang')->result();
		$data['jenis_barang']=$this->m_admin->get_jenisbarang();
		$this->load->view('template/template_admin',$data);
	}
	function edit_data_barang($where,$table){
	 return $this->db->get_where($table,$where);
	}
	
	function editBarang(){
		$id_barang = $this->input->post('id_barang');
		$id_jenis_barang = $this->input->post('id_jenis_barang');
		$nama_barang = $this->input->post('nama_barang');
		$status_barang = $this->input->post('status_barang');
		
		$data = array(
			'id_jenis_barang' => $id_jenis_barang,
			'nama_barang' => $nama_barang,
			'status_barang' => $status_barang
		);

		$where = array('id_barang' => $id_barang);

		$this->m_admin->update_data($where,$data,'barang');
		$this->session->set_flashdata('notif', "Data kategori berhasil di Update");
		redirect('admin/barang');
	}
	
	////////----------------- semester ---------////
	function semester(){
		$data['main_view'] = 'admin/v_list_semester';
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin', $data);
	}
		
	function inputSemester(){
		//$data['ruangan'] = $this->m_admin->get_bagian();
		$data['main_view'] = 'admin/v_tambah_semester';
		$this->load->view('template/template_admin',$data);
	}

	function tambahSemester(){
		$semester = $this->input->post('semester');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
		
		$data = array(
			'semester' => $semester,
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_selesai' => $tanggal_selesai
		);
		$this->m_admin->tambahdata($data,'semester');
		$this->session->set_flashdata('notif', "semester $semester berhasil ditambahkan");
		redirect('admin/semester');
	}

	function hapusSemester($id_semester){
		$where = array('id_semester' => $id_semester);
		$this->m_admin->hapus_data($where,'semester');
		$this->session->set_flashdata('notif', "Data semester $id_semester berhasil dihapus");
		redirect('admin/semester');
	}

	function updateSemester($id_semester){
		$data['main_view'] = 'admin/v_edit_semester';
		$where = array('id_semester' => $id_semester);
		$data['semester'] = $this->m_admin->edit_data($where,'semester')->result();
		$this->load->view('template/template_admin',$data);
	}

	
	function editSemester(){
		$id_semester = $this->input->post('id_semester');
		$semester = $this->input->post('semester');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
			
		$data = array(
			'semester' => $semester,
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_selesai' => $tanggal_selesai
		
		);

		$where = array('id_semester' => $id_semester);

		$this->m_admin->update_data($where,$data,'semester');
		$this->session->set_flashdata('notif', "Data semester $semester berhasil di Update");
		redirect('admin/semester');
	}

	////////----------------- jadwal matakuliah ---------////
	function jadwal_kuliah($id_semester){
		$data['main_view'] = 'admin/v_list_jadwal_kuliah';
		$where = array('id_semester' => $id_semester);
		$data['semester'] = $this->m_admin->edit_data($where,'semester')->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliah($id_semester);
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin',$data);
	}
		
	function inputJadwalKuliah($id_semester){
		$data['main_view'] = 'admin/v_tambah_jadwal_kuliah';
		$where = array('id_semester' => $id_semester);
		$data['semester'] = $this->m_admin->edit_data($where,'semester')->result();
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin',$data);
	}

	function tambahJadwalKuliah(){
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$kelas = $this->input->post('kelas');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');
		$cek = $this->m_admin->cek_jadwal_kuliah($id_semester,$hari,$id_jam_kuliah,$id_ruangan)->num_rows();
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar di sistem");
			redirect('admin/inputJadwalKuliah/'.$id_semester);
		}else{ 
			$data = array(
				'id_semester' => $id_semester,
				'hari' => $hari,
				'id_jam_kuliah' => $id_jam_kuliah,
				'id_ruangan' => $id_ruangan,
				'kode_matkul' => $kode_matkul,
				'kelas' => $kelas,
				'id_dosen' => $id_dosen,
				'id_jurusan' => $id_jurusan,
				'id_prodi' => $id_prodi,
				'status' => $status
			);
			$this->m_admin->tambahdata($data,'jadwal_kuliah');
			$this->session->set_flashdata('notif', "jadwal kuliah berhasil ditambahkan");
			redirect('admin/jadwal_kuliah/'.$id_semester);
		}
	}

	function hapusJadwalKuliah($id_semester,$id_jadwal_kuliah){
		$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);
		$this->m_admin->hapus_data($where,'jadwal_kuliah');
		$this->session->set_flashdata('notif', "Data jadwal kuliah $id_jadwal_kuliah berhasil dihapus");
		redirect('admin/jadwal_kuliah/'.$id_semester);
	}

	function updateJadwalKuliah($id_semester,$id_jadwal_kuliah){
		$data['main_view'] = 'admin/v_edit_jadwal_kuliah';
		$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);
		$data['jadwal_kuliah'] = $this->m_admin->edit_data($where,'jadwal_kuliah')->result();
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin',$data);
	}

	
	function editJadwalKuliah(){
		$id_jadwal_kuliah = $this->input->post('id_jadwal_kuliah');
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$kelas = $this->input->post('kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');
		$cek = $this->m_admin->cek_update_jadwal_kuliah($id_jadwal_kuliah,$id_semester,$hari,$id_jam_kuliah,$id_ruangan)->num_rows();
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar di sistem");
			redirect('admin/updateJadwalKuliah/'.$id_jadwal_kuliah);
		}else{ 
			$data = array(
				'id_jadwal_kuliah' => $id_jadwal_kuliah,
				'id_semester' => $id_semester,
				'hari' => $hari,
				'id_jam_kuliah' => $id_jam_kuliah,
				'id_ruangan' => $id_ruangan,
				'kode_matkul' => $kode_matkul,
				'id_dosen' => $id_dosen,
				'kelas' => $kelas,
				'id_jurusan' => $id_jurusan,
				'id_prodi' => $id_prodi,
				'status' => $status
			);
				
			$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);

			$this->m_admin->update_data($where,$data,'jadwal_kuliah');
			$this->session->set_flashdata('notif', "SUKSES! jadwal kuliah berhasil di Update");
			redirect('admin/jadwal_kuliah/'.$id_semester);
		}
	}

	

	function rekap_jadwal_rutin(){
		$data['main_view'] = 'admin/v_rekap_jadwal_rutin';
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function lihat_jadwal_plot($id_semester){
		$data['main_view'] = 'admin/v_list_jadwal_hasil_plot';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->get_peminjaman_rutin_by_semester($id_semester);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$data['semester_id'] = $id_semester;
		$this->load->view('template/template_admin',$data);
	}

	//sisip jadwal kuliah
	function inputSisipJadwalKuliah($id_semester){
		$data['main_view'] = 'admin/v_tambah_sisip_jadwal_kuliah';
		$where = array('id_semester' => $id_semester);
		$data['semester'] = $this->m_admin->edit_data($where,'semester')->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliah($id_semester);
		$data['jadwal_sisip'] = $this->m_admin->get_jadwal_sisip($id_semester);
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin',$data);
	}

	function tambahSisipJadwalKuliah(){
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');
		$cek = $this->m_admin->cek_jadwal_kuliah($id_semester,$hari,$id_jam_kuliah,$id_ruangan)->num_rows();
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar di sistem");
			redirect('admin/inputSisipJadwalKuliah/'.$id_semester);
		}else{ 
			$data = array(
				'id_semester' => $id_semester,
				'hari' => $hari,
				'id_jam_kuliah' => $id_jam_kuliah,
				'id_ruangan' => $id_ruangan,
				'kode_matkul' => $kode_matkul,
				'id_dosen' => $id_dosen,
				'id_jurusan' => $id_jurusan,
				'id_prodi' => $id_prodi,
				'status' => $status
			);
			$this->m_admin->tambahdata($data,'jadwal_kuliah');
			$this->session->set_flashdata('notif', "jadwal kuliah berhasil ditambahkan");
			redirect('admin/inputSisipJadwalKuliah/'.$id_semester);
		}
	}

	function hapusSisipJadwalKuliah($id_semester,$id_jadwal_kuliah){
		$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);
		$this->m_admin->hapus_data($where,'jadwal_kuliah');
		$this->session->set_flashdata('notif', "Data jadwal kuliah $id_jadwal_kuliah berhasil dihapus");
		redirect('admin/inputSisipJadwalKuliah/'.$id_semester);
	}
	
	function editSisipJadwalKuliah(){
		$id_jadwal_kuliah = $this->input->post('id_jadwal_kuliah');
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');
		$cek = $this->m_admin->cek_update_jadwal_kuliah($id_jadwal_kuliah,$id_semester,$hari,$id_jam_kuliah,$id_ruangan)->num_rows();
		if($cek > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar di sistem");
			redirect('admin/inputSisipJadwalKuliah/'.$id_semester);
		}else{ 
			$data = array(
				'id_jadwal_kuliah' => $id_jadwal_kuliah,
				'id_semester' => $id_semester,
				'hari' => $hari,
				'id_jam_kuliah' => $id_jam_kuliah,
				'id_ruangan' => $id_ruangan,
				'kode_matkul' => $kode_matkul,
				'id_dosen' => $id_dosen,
				'id_jurusan' => $id_jurusan,
				'id_prodi' => $id_prodi,
				'status' => $status
			);
				
			$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);

			$this->m_admin->update_data($where,$data,'jadwal_kuliah');
			$this->session->set_flashdata('notif', "SUKSES! jadwal kuliah berhasil di Update");
			redirect('admin/inputSisipJadwalKuliah/'.$id_semester);
		}
	}

	
	/*function rekap_tahunan_mahasiswa(){
		$mahasiswa = $this->db->query("SELECT
		x.nim,
		x.Nama,
		SUM(x.januari) AS januari,
		SUM(x.februari) AS februari,
		SUM(x.maret) AS maret,
		SUM(x.april) AS april,
		SUM(x.mei) AS mei,
		SUM(x.juni) AS juni,
		SUM(x.juli) AS juli,
		SUM(x.agustus) AS agustus,
		SUM(x.september) AS september,
		SUM(x.oktober) AS oktober,
		SUM(x.november) AS november,
		SUM(x.desember) AS desember,
		SUM(x.JumlahST) AS JumlahST
		FROM (
		SELECT 
		mahasiswa.nim,
		mahasiswa.Nama,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 1, 0)  AS januari,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 2, 0)  AS februari,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 3, 0)  AS maret,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 4, 0)  AS april,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 5, 0 ) AS mei,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 6, 0 ) AS juni,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 7, 0)  AS juli,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 8, 0)  AS agustus,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 9, 0)  AS september,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 10, 0) AS oktober,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 11, 0) AS november,
		IF( MONTH(peminjaman.tanggal_peminjaman) = 12, 0) AS desember,
		Count(peminjaman.id_peminjam) AS JumlahST
		FROM
		mahasiswa, peminjaman
		WHERE
		peminjaman.id_peminjam = mahasiswa.nim  AND YEAR(peminjaman.tanggal_peminjaman)
		GROUP BY
		mahasiswa.nim,
		mahasiswa.Nama,
		MONTH (peminjaman.tanggal_peminjaman)) x
		GROUP BY x.nim, x.Nama");
		$data = array();
		$data['main_view']= 'admin/v_rekap_tahunan_mahasiswa';
		$data['records'] = $pegawai->result_array();
		$this->load->view('template/template_admin', $data);
	}*/
	//	
		function perbulan_pegawai($id_peminjam){
		$data['main_view'] = 'admin/v_bulan_pegawai';
		$data['peminjam_pegawai'] = $this->m_admin->surat_perbulan_pegawai($id_peminjam);
		$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_pegawai($id_peminjam);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjamP($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		$this->load->view('template/template_admin', $data);
		}
		
		function perbulan_pegawai_filter(){
		$data['main_view'] = 'admin/v_bulan_pegawai';
		$tahun = $this->input->get('tahun');
		$id_peminjam = $this->input->get('id_peminjam');
		$cek = $this->m_admin->pencarian_rekapP($tahun,$id_peminjam);
		if($cek == true){
			$data['peminjam_pegawai'] = $this->m_admin->pencarian_rekapP($tahun,$id_peminjam);
			$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_pegawai($id_peminjam);
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
			$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
			$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
			$this->load->view('template/template_admin',$data);
		}else{
			$this->session->set_flashdata('notif', "SUKSES! jadwal kuliah berhasil di Update");
			$data['peminjam_pegawai'] = $this->m_admin->pencarian_rekapP($id_peminjam);
			$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_pegawai($id_peminjam);
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
			$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
			$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
			$this->load->view('template/template_admin',$data);
		}
		}
		
		function perbulan_mahasiswa_filter(){
		$data['main_view'] = 'admin/v_bulan_mahasiswa';
		$tahun = $this->input->get('tahun');
		$id_peminjam = $this->input->get('id_peminjam');
		$cek = $this->m_admin->pencarian_rekapM($tahun,$id_peminjam);
		if($cek == true){
			$data['peminjam_pegawai'] = $this->m_admin->pencarian_rekapM($tahun,$id_peminjam);
			$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_mahasiswa($id_peminjam);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
			$this->load->view('template/template_admin',$data);
		}else{
			$this->load->view('template/template_admin',$data);
		}
		}
	 
		
		function perbulan_mahasiswa($id_peminjam){
		$data['main_view'] = 'admin/v_bulan_mahasiswa';
		$data['peminjam_pegawai'] = $this->m_admin->surat_perbulan_mahasiswa($id_peminjam);
		$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_mahasiswa($id_peminjam);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		//$data['peminjaman'] = $this->m_admin->tampilPeminjam();
		$this->load->view('template/template_admin', $data);
		}
		
		function excelsuratpegawaiperbulan($id_peminjam,$bulan,$tahun){
		$data['surat'] = $this->m_admin->surat_perbulan_export($id_peminjam,$bulan,$tahun);
		$data['detail'] = $this->m_admin->rekap_surat_perbulan_export_pegawai($id_peminjam,$bulan,$tahun);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		$this->load->view('export/v_surat_tugas_pegawai_perbulan', $data);
	}
	
		function excelsuratmahasiswaperbulan($id_peminjam,$bulan,$tahun){
		$data['surat'] = $this->m_admin->surat_perbulan_export_mahasiswa($id_peminjam,$bulan,$tahun);
		$data['detail'] = $this->m_admin->rekap_surat_perbulan_export_mahasiswa($id_peminjam,$bulan,$tahun);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		$this->load->view('export/v_surat_tugas_mahasiswa_perbulan', $data);
	}
		
		function detail_peminjam($id_peminjam){
		$data['main_view'] = 'admin/v_data_peminjam_pegawai';
		$data['peminjaman'] = $this->m_admin->dataPeminjamanPegawai($id_peminjam);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		//$data['peminjaman'] = $this->m_admin->tampilPeminjam();
		$this->load->view('template/template_admin', $data);
		}
		
		function PencariandetailP(){
		$data['main_view'] = 'admin/v_data_peminjam_pegawai';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$id_peminjam = $this->input->get('id_peminjam');
		
		$cek = $this->m_admin->pencarian_detailP($bln1,$bln2,$tahun,$id_peminjam);
		if($cek == true){
			$data['peminjaman'] = $this->m_admin->pencarian_detailP($bln1,$bln2,$tahun,$id_peminjam);
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
			$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
			$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		//	$this->session->set_flashdata('notif', "Pegawai $id_peminjam ");
			$this->load->view('template/template_admin',$data);
		}else{
			$this->session->set_flashdata('notif', "Pegawai $id_peminjam tidak mempunyai data dibulan tersebut");
			$data['peminjaman'] = $this->m_admin->dataPeminjamanPegawai($id_peminjam);
			
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
			$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
			$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
			$this->load->view('template/template_admin',$data);
		}
	}
	function PencariandetailM(){
		$data['main_view'] = 'admin/v_data_peminjam_mahasiswa';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$id_peminjam = $this->input->get('id_peminjam');
		
		$cek = $this->m_admin->pencarian_detailM($bln1,$bln2,$tahun,$id_peminjam);
		if($cek == true){
			$data['peminjaman'] = $this->m_admin->pencarian_detailM($bln1,$bln2,$tahun,$id_peminjam);
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		//	$this->session->set_flashdata('notif', "Pegawai $id_peminjam ");
			$this->load->view('template/template_admin',$data);
		}else{
			$this->session->set_flashdata('notif', "Mahasiswa $id_peminjam tidak mempunyai data dibulan tersebut");
			$data['peminjaman'] = $this->m_admin->dataPeminjamanMahasiswa($id_peminjam);
			$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
			$this->load->view('template/template_admin',$data);
		}
	}
		
		function detail_peminjamM($id_peminjam){
		$data['main_view'] = 'admin/v_data_peminjam_mahasiswa';
		$data['peminjaman'] = $this->m_admin->dataPeminjamanMahasiswa($id_peminjam);
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang_by_peminjam($id_peminjam);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		//$data['peminjaman'] = $this->m_admin->tampilPeminjam();
		$this->load->view('template/template_admin', $data);
		}
		
		
		function rekap_peminjam(){
		$data['main_view'] = 'admin/v_rekap_peminjam';
		$data['rekap_peminjam']= $this->m_admin->rekap_peminjaman_mahasiswa();
		
		$this->load->view('template/template_admin', $data);
		}
		
		function rekap_peminjam_pegawai(){
			$data['main_view'] = 'admin/v_rekap_peminjam_pegawai';
			$data['rekap_peminjam']= $this->m_admin->rekap_peminjaman_pegawai();
			$this->load->view('template/template_admin', $data);
		}
		
		
	function pencarian_peminjam(){
		$data ['main_view'] = 'admin/v_pencarian_peminjaman';
		$data['peminjaman'] = $this->m_admin->tampilPeminjam();
		//$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		//$data['dosen'] = $this->m_admin->get_data_dosen();
		//$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
		//$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
		//$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
		$this->load->view('template/template_admin',$data);	
	}
		
	function cek_peminjam(){
		
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun1 = $this->input->get('tahun1');
		$tahun2 = $this->input->get('tahun2');
		//$id_peminjam = $this->input->get('id_peminjam');
		
		$cek = $this->m_admin->pencarian_peminjaman($bln1,$bln2,$tahun1,$tahun2);
		if($cek == true){
		$data['peminjaman'] = $this->m_admin->pencarian_peminjaman($bln1,$bln2,$tahun1,$tahun2);
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
		$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
		$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
		$data['main_view'] = 'admin/v_rekap_peminjaman';
			$this->load->view('template/template_admin',$data);
		}else{
			$this->session->set_flashdata('notif', "Belum Terdapat data dibulan tersebut");
			//$data['peminjaman'] = $this->m_admin->dataPeminjamanPegawai($id_peminjam);
			redirect('admin/pencarian_peminjam');
		}
	}
	
	function peminjaman_rutin_filter($jenis_peminjaman){
		$data['peminjaman'] = $this->m_admin->peminjaman_rutin_filter($jenis_peminjaman);
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
		$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
		$data['nama_agenda'] = $this->m_admin->tampil_peminjaman_non_rutin_nama_agenda();
		$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
		$data['main_view'] = 'admin/v_rekap_peminjaman';
		$this->load->view('template/template_admin',$data);	
		}
		
		function peminjaman_non_rutin_filter(){
		$data['peminjaman'] = $this->m_admin->peminjaman_non_rutin_filter();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
		$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
		$data['nama_agenda'] = $this->m_admin->tampil_peminjaman_non_rutin_nama_agenda();
		$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
		$data['main_view'] = 'admin/v_rekap_peminjaman';
		$this->load->view('template/template_admin',$data);	
		}
		
		
		
		
	function rekap_peminjaman(){
		$data['main_view'] = 'admin/v_rekap_peminjaman';
		$data['peminjaman'] = $this->m_admin->tampilPeminjam();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		//$data['dosen'] = $this->m_admin->tampilPegawai();
		$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
		$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
		$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
		$this->load->view('template/template_admin', $data);
		}
	
		function rekap_peminjaman_mahasiswa($id_peminjam){
			$data['main_view'] = 'admin/v_rekap_peminjaman_mahasiswa';
			$data['peminjaman'] = $this->m_admin->tampilPeminjam_mahasiswa();
			$data['peminjaman_rutin'] = $this->m_admin->tampil_peminjaman_rutin();
			$data['peminjaman__non_rutin'] = $this->m_admin->tampil_peminjaman_non_rutin();
			$data['peminjaman_barang'] = $this->m_admin->tampil_peminjaman_barang();
			$this->load->view('template/template_admin', $data);
		}
		
		function peminjaman_rutin_Mahasiswa($id_peminjaman){
		$data['main_view'] = 'admin/v_peminjaman_rutin';
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['peminjaman_rutin']=$this->m_admin->tampilPeminjamanRutinMahasiswa($id_peminjaman);
		$this->load->view('template/template_admin', $data);
		}
		
		function peminjaman_non_rutin_Mahasiswa($id_peminjaman){
		$data['main_view'] = 'admin/v_peminjaman_non_rutin';
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['peminjaman_non_rutin']=$this->m_admin->tampilPeminjamanNonRutinMahasiswa($id_peminjaman);
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_non_rutin_peminjaman_non_rutin_by_peminjam($id_peminjaman);
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		//$data['peminjaman']=$this->m_admin->getDataPeminjamanById($id_peminjaman);
		//$data['detail_peminjaman_non_rutin']=$this->m_admin->detail_non_rutin();
		//$data['detail_ruangan']=$this->m_admin->detail_peminjaman($id_peminjaman);
		$this->load->view('template/template_admin', $data);
		}
	
		function peminjaman_sarana_prasarana_Mahasiswa($id_peminjaman){
			$data['main_view'] = 'admin/v_peminjaman_sarana_prasarana';
			$where = array ('id_peminjaman' => $id_peminjaman);
			$data['peminjaman_barang']= $this->m_admin->tampilPeminjamanBarangMahasiswa($id_peminjaman);
			$data['detail_peminjaman_barang'] = $this->m_admin->get_barang_peminjaman_barang_by_peminjam($id_peminjaman);
			//$data['detail_peminjam_barnag']= $this->m_admin->detail_sarpras();
			//$data['detail_sarpras']= $this->m_admin->detail_rekap_sarpras();
			$this->load->view('template/template_admin', $data);
		}
	
		function peminjaman_rutin_Pegawai($id_peminjaman){
			$data['main_view'] = 'admin/v_peminjaman_rutin_pegawai';
			$where = array('id_peminjaman_rutin' => $id_peminjaman);
			$data['peminjaman_rutin']=$this->m_admin->tampilPeminjamanRutinPegawai($id_peminjaman);
			$this->load->view('template/template_admin', $data);
		}
			
		function peminjaman_non_rutin_Pegawai($id_peminjaman){
			$data['main_view'] = 'admin/v_peminjaman_non_rutin_pegawai';
			$where = array('id_peminjaman' => $id_peminjaman);
			$data['peminjaman_non_rutin']=$this->m_admin->tampilPeminjamanNonRutinPegawai($id_peminjaman);
			//$data['peminjaman']=$this->m_admin->getDataPeminjamanById($id_peminjaman);
			//$data['detail_peminjaman_non_rutin']=$this->m_admin->detail_non_rutin();
			//$data['detail_ruangan']=$this->m_admin->detail_peminjaman($id_peminjaman);
			$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_non_rutin_peminjaman_non_rutin_by_peminjam($id_peminjaman);
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			//$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
			$this->load->view('template/template_admin', $data);
		}
		
		function peminjaman_sarana_prasarana_Pegawai($id_peminjaman){
				$data['main_view'] = 'admin/v_peminjaman_sarana_prasarana_pegawai';
				$where = array ('id_peminjaman' => $id_peminjaman);
				$data['peminjaman_barang']= $this->m_admin->tampilPeminjamanBarangPegawai($id_peminjaman);
				$data['detail_peminjaman_barang'] = $this->m_admin->get_barang_peminjaman_barang_by_peminjam($id_peminjaman);
				//$data['detail_peminjam_barnag']= $this->m_admin->detail_sarpras();
				//$data['detail_sarpras']= $this->m_admin->detail_rekap_sarpras();
				$this->load->view('template/template_admin', $data);
		}
		

		function profil(){
			$data['main_view'] = 'admin/v_profil';
			$data['user'] = $this->m_admin->getDataProfil();   
			$this->load->view('template/template_admin', $data);
		}
		
		function update_password(){
			$username = $this->input->post('username');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$data_lama = array(
				'username' => $username,
				'password' => $password_lama,
				);
			$data_baru = array(
				'username' => $username,
				'password' => $password_baru,
				);
		
			$where = array(
				'username' => $username
			);
			//
			$cek = $this->m_auth->cek_login("user",$data_lama)->num_rows();
			if($cek > 0){
				$this->m_auth->update_password($where,$data_baru,'user');
				$this->session->set_flashdata('notif', "Password berhasil diupdate");
				redirect('admin/profil');
			}else{
				$this->session->set_flashdata('notif', "GAGAL - Password Lama tidak sesuai");
				redirect('admin/profil');
			}
		}
		
		function reset_password(){
		$data['main_view'] = 'admin/v_reset_password';
		$data['pegawai'] = $this->m_admin->tampilrestpegawai()->result();
		$data['mahasiswa'] = $this->m_admin->tampilrestmahasiswa()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function resetaksi(){
		$NIP = $this->input->post('NIP');
		$cek = $this->m_admin->cek_ketersediaan_pegawai($NIP)->num_rows();
		$cek1 = $this->m_admin->cek_ketersediaan_mahasiswa($NIP)->num_rows();
		if($cek > 0){
			$data['pegawai'] = $this->m_admin->get_pegawai_nip($NIP);
			$data['main_view'] = 'admin/v_reset_pass_P';
			$this->load->view('template/template_admin', $data);
		}else if($cek1 > 0){
			$data['mahasiswa'] = $this->m_admin->get_mahasiswa_nim($NIP);
			$data['main_view'] = 'admin/v_reset_pass_M';
			$this->load->view('template/template_admin', $data);
		}else{ 	 
			$this->session->set_flashdata('notif', "Gagal - NIP/NIM tidak terdaftar");
			redirect('admin/reset_password');
		}	
	}

	function pass(){
		$NIP = $this->input->post('NIP');
		$pass = substr($NIP,-6);
		$cek = $this->m_admin->cek_ketersediaan_pegawai($NIP)->num_rows();
		if($cek > 0){
			$data = array(
				'NIP' => $NIP,
				'Password' => $pass
				);
		
			$where = array(
				'NIP' => $NIP
			);
		
			$this->m_admin->update_pegawai($where,$data,'pegawai');
			$this->session->set_flashdata('notif', "Berhasil - Password telah diupdate!");
			redirect('admin/reset_password/');;
		}else{ 	 
			$this->session->set_flashdata('notif', "Gaagal - NIP Pegawai tidak terdaftar");
			redirect('admin/reset_password');
		}	
		
	}
	
	function passM(){
		$nim = $this->input->post('nim');
		$pass = substr($nim,-6);
		$cek = $this->m_admin->cek_ketersediaan_mahasiswa($nim)->num_rows();
		if($cek > 0){
			$data = array(
				'nim' => $nim,
				'Password' => $pass
				);
		
			$where = array(
				'nim' => $nim
			);
		
			$this->m_admin->update_pegawai($where,$data,'mahasiswa');
			$this->session->set_flashdata('notif', "Berhasil - Password telah diupdate!");
			redirect('admin/reset_password/');;
		}else{ 	 
			$this->session->set_flashdata('notif', "Gaagal - NIM Mahasiswa tidak terdaftar");
			redirect('admin/reset_password');
		}	
		
	}
	function list_agenda_akademik(){
		$date = date("Y-m-d");
		$data['main_view'] = 'admin/v_list_agenda_akademik';
		$data['agenda'] = $this->m_admin->get_data_agenda_akademik($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['penyelenggara']= $this->m_admin->tampilPenyelenggara()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_admin',$data);	
	}
	
	function filter_akademik(){
		$data['main_view'] = 'admin/v_list_agenda_akademik_filter';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$data['agenda'] = $this->m_admin->filter_akademik($bln1,$bln2,$tahun);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda();
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['penyelenggara']= $this->m_admin->tampilPenyelenggara()->result();
		//$data['surattugas'] = $this->m_admin->filter_surat($bln1,$bln2,$tahun);
		//$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_admin',$data);
	}
	
	function list_agenda_umum(){
		$date = date("Y-m-d");
		$data['main_view'] = 'admin/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda_umum($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['penyelenggara']= $this->m_admin->tampilPenyelenggara()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_admin',$data);	
	}
	
	function filter_surat(){
		$data['main_view'] = 'admin/v_list_agenda_filter';
		$bln1 = $this->input->get('bln1');
		$bln2 = $this->input->get('bln2');
		$tahun = $this->input->get('tahun');
		$data['agenda'] = $this->m_admin->filter_surat($bln1,$bln2,$tahun);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda();
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['penyelenggara']= $this->m_admin->tampilPenyelenggara()->result();
		//$data['surattugas'] = $this->m_admin->filter_surat($bln1,$bln2,$tahun);
		//$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_admin',$data);
	}

	function pencarian(){
		$data['main_view'] = 'admin/v_pencarian_mahasiswa';
		$data['mahasiswa'] = $this->m_admin->tampilrestmahasiswa()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin',$data);	
	}

	function cek_mahasiswa(){
		$NIP = $this->input->post('NIP');
		$id_jurusan = $this->input->post('id_jurusan');
		//$cek = $this->m_admin->cek_ketersediaan_pegawai($NIP)->num_rows();
		$cek1 = $this->m_admin->cek_ketersediaan_mahasiswa($NIP)->num_rows();
		if($cek1 > 0){
			$data['mahasiswa'] = $this->m_admin->get_mahasiswa_nim($NIP);
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['main_view'] = 'admin/v_list_mahasiswa_data';
			$this->load->view('template/template_admin', $data);
		}else{ 	 
			$this->session->set_flashdata('notif', "Gagal - NIP/NIM tidak terdaftar");
			redirect('admin/pencarian');
		}	
	}
	
	function api_key(){
		$data['main_view'] = 'admin/v_list_api_wa';
		$data['api_key'] = $this->m_admin->tampilapi_key()->result();
		$this->load->view('template/template_admin', $data);
	}

	function input_api(){
		$data['main_view'] = 'admin/v_tambah_api';
		$this->load->view('template/template_admin', $data);
	}

	function tambah_api(){
		$id = $this->input->post('id');
		$no_telp = $this->input->post('no_telp');
		$api_key = $this->input->post('api_key');
		$status = $this->input->post('status');
		$data = array(
			'id' => $id,
			'no_telp' => $no_telp,
			'api_key' => $api_key,
			'status' => $status
		);
		$this->m_admin->tambahdata($data,'api_wa');
		$this->session->set_flashdata('notif', "Berhasil ditambahkan");
		redirect('admin/api_key');
	}

	function update_api($id){
		$data['main_view'] = 'admin/v_edit_api';
		$where = array('id' => $id);
		$data['api_wa'] = $this->m_admin->edit_data($where,'api_wa')->result();
		//$data['peg'] = $this->m_admin->get_bagian();
		$this->load->view('template/template_admin', $data);
	}

	function edit_api(){
		$id = $this->input->post('id');
		$no_telp = $this->input->post('no_telp');
		$api_key = $this->input->post('api_key');
		$status = $this->input->post('status');
		
		$data = array(
			'no_telp' => $no_telp,
			'api_key' => $api_key,
			'status' => $status
			
		
		);

		$where = array('id' => $id);

		$this->m_admin->update_data($where,$data,'api_wa');
		$this->session->set_flashdata('notif', "Data berhasil di Update");
		redirect('admin/api_key');
	}

	function hapus_api($id){
		$where = array('id' => $id);
		$this->m_admin->hapus_data($where,'api_wa');
		$this->session->set_flashdata('notif', "Data berhasil dihapus");
		redirect('admin/api_key');
	}
	
	function rekap_peminjaman_barang(){
		$data['main_view'] = 'admin/v_rekap_barang';
		$data['barang']= $this->m_admin->rekap_peminjaman_barang();
		$data['Nama_barang'] = $this->m_admin->tampilBarang();
		$this->load->view('template/template_admin', $data);
	}
	function perbulan_barang($id_peminjam){
		$data['main_view'] = 'admin/v_bulan_barang';
		$data['peminjam_pegawai'] = $this->m_admin->surat_perbulan_barang($id_peminjam);
		$data['detail_pegawai'] = $this->m_admin->rekap_surat_perbulan_barang($id_peminjam);
		//$data['Nama_barang'] = $this->m_admin->tampilBarang();
		//$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjamP($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang($id_peminjam);
		//$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		$this->load->view('template/template_admin', $data);
		}
		
	function excelsuratbarang($id_peminjam,$bulan,$tahun){
		$data['surat'] = $this->m_admin->surat_perbulan_export_barang($id_peminjam,$bulan,$tahun);
		$data['detail'] = $this->m_admin->rekap_surat_perbulan_export_barang($id_peminjam,$bulan,$tahun);
		//$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_by_peminjam($id_peminjam);
		$data['detail_peminjaman_barang'] = $this->m_admin->get_peminjaman_barang($id_peminjam);
		//$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_peminjaman_non_rutin_by_peminjamM($id_peminjam);
		$this->load->view('export/v_barang', $data);
	}
	
	function hak_akses($username){
		$data['main_view'] = 'admin/v_hak_akses';
		$data['user'] = $this->m_admin->get_hak_akses($username);
		$data['detail_hak_akses'] = $this->m_admin->detail_hak_akses($username);
		$data['ruangan'] = $this->m_admin->tampilNonRutin();
		$this->load->view('template/template_admin', $data);
	}
	function tambah_hak_akses(){
		$username = $this->input->post('username');
		$ruangan = $this->input->post('ruangan');
		
				$data = array(
				'username' => $username,
				'ruangan' => $ruangan
			);
			$where = array(
			'ruangan' => $ruangan
		);
			$this->m_admin->update_data($where,$data,'ruangan');
			$this->session->set_flashdata('notif', "Data berhasil ditambahkan !");
			redirect('admin/hak_akses/'.$username);
		
	
	}
	
	
	function hapus_pegawai($username,$ruangan){
		$page = $_SERVER['PHP_SELF'];
		$values=explode("/",$page); 
		$length=sizeof($values); 
		$url=$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1];
		//$cek = $this->m_admin->cek_ketersediaan_detail($url)->num_rows(); 
		$string = substr_count("$url","hapus_pegawai");
		if($string > 0){
			$ruangan=$ruangan;
			$url = $username;
		}else{
			$username=$values[$length-1];
			$url=$values[$length-5].'/'.$values[$length-4].'/'.$values[$length-3].'/'.$values[$length-2].'/'.$values[$length-1];
		}
		
		$data = array(
				'username' => NULL
			);
		$where = array(
			'username' => $url,
			'id_ruangan' => $ruangan
		);
		$this->m_admin->update_data($where,$data,'ruangan');
		$this->session->set_flashdata('notif', "Data Berhasil Di Hapus !");
		redirect('admin/hak_akses/'.$url);
	}
	function lihat_jurusan(){
		$data['main_view'] = 'admin/v_list_jurusan';
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputJurusan(){
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_jurusan';
		$this->load->view('template/template_admin',$data);
	}
	
	function tambahJurusan(){
		$jurusan = $this->input->post('jurusan');
		
		$data = array(
			'jurusan' => $jurusan
		);
		$this->m_admin->tambahdata($data,'jurusan');
		$this->session->set_flashdata('notif', "Jurusan $jurusan berhasil ditambahkan");
		redirect('admin/lihat_jurusan');
	}
	
	function updateJurusan($id_jurusan){
		$data['main_view'] = 'admin/v_edit_jurusan';
		$where = array('id_jurusan' => $id_jurusan);
		$data['jurusan'] = $this->m_admin->edit_data($where,'jurusan')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editJurusan(){
		$id_jurusan = $this->input->post('id_jurusan');
		$jurusan = $this->input->post('jurusan');
		
		$data = array(
			'id_jurusan' => $id_jurusan,
			'jurusan' => $jurusan
		);

		$where = array('id_jurusan' => $id_jurusan);

		$this->m_admin->update_data($where,$data,'jurusan');
		$this->session->set_flashdata('notif', "Data jurusan $jurusan berhasil di Update");
		redirect('admin/lihat_jurusan');
	}
	
	function hapusJurusan($id_jurusan){
		$where = array('id_jurusan' => $id_jurusan);
		$this->m_admin->hapus_data($where,'jurusan');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_jurusan berhasil dihapus");
		redirect('admin/lihat_jurusan');
	}
	
	//CRUD prodi alvin
	function lihat_prodi(){
		$data['main_view'] = 'admin/v_list_prodi';
		$data['jurusan'] = $this->m_admin->get_jurusan();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$this->load->view('template/template_admin', $data);
	}
	
	function inputProdi(){
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['main_view'] = 'admin/v_tambah_prodi';
		$this->load->view('template/template_admin',$data);
	}
	
	function tambahProdi(){
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_prodi = $this->input->post('nama_prodi');
		
		$data = array(
			'id_jurusan' => $id_jurusan,
			'prodi' => $nama_prodi
		);
		$this->m_admin->tambahdata($data,'prodi');
		$this->session->set_flashdata('notif', "Jurusan $nama_prodi berhasil ditambahkan");
		redirect('admin/lihat_prodi');
	}
	
	function updateProdi($id_prodi){
		$data['main_view'] = 'admin/v_edit_prodi';
		$where = array('id_prodi' => $id_prodi);
		$data['jurusan'] = $this->m_admin->get_jurusan();
		$data['prodi'] = $this->m_admin->edit_data($where,'prodi')->result();
		$this->load->view('template/template_admin',$data);
	}
	
	function editProdi(){
		$id_prodi = $this->input->post('id_prodi');
		$id_jurusan = $this->input->post('id_jurusan');
		$prodi = $this->input->post('nama_prodi');
		
		$data = array(
			'id_prodi' => $id_prodi,
			'id_jurusan' => $id_jurusan,
			'prodi' => $prodi
		);

		$where = array('id_prodi' => $id_prodi);

		$this->m_admin->update_data($where,$data,'prodi');
		$this->session->set_flashdata('notif', "Data jurusan $prodi berhasil di Update");
		redirect('admin/lihat_prodi');
	}
	
	function hapusProdi($id_prodi){
		$where = array('id_prodi' => $id_prodi);
		$this->m_admin->hapus_data($where,'prodi');
		$this->session->set_flashdata('notif', "Data penyelenggara $id_prodi berhasil dihapus");
		redirect('admin/lihat_prodi');
	}
	
	  public function listKota(){    // Ambil data ID Provinsi yang dikirim via ajax post    
	  $id_jurusan = $this->input->post('id_jurusan');        
	  $prodi = $this->m_admin->getProdi($id_jurusan);        // Buat variabel untuk menampung tag-tag option nya    // Set defaultnya dengan tag option Pilih    
	  $lists = "<option value=''>Pilih</option>";        
	  foreach($prodi as $data){     
	  $lists .= "<option value='".$data->id_prodi."'>".$data->prodi."</option>"; // Tambahkan tag option ke variabel $lists   
	  }       
	  $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota   
	  echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }
	  
	function history_rutin(){
		$data['main_view'] = 'admin/v_history_rutin';
		$data['peminjaman'] = $this->m_admin->get_data_history_peminjam();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa_peminjam();
		$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_peminjam();
		//$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_barang_peminjaman_barang_by_peminjam();
		//$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_non_rutin_peminjaman_non_rutin_by_peminjam();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['dosen_peminjam'] = $this->m_admin->get_data_dosen_peminjam();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$this->load->view('template/template_admin',$data);
	}
	
	function history_non_rutin(){
		$data['main_view'] = 'admin/v_history_non_rutin';
		$data['peminjaman'] = $this->m_admin->get_data_history_peminjam_non();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa_peminjam();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
		//$data['peminjaman_rutin'] = $this->m_admin->get_ruangan_peminjaman_rutin_peminjam();
		//$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_barang_peminjaman_barang_by_peminjam();
		$data['detail_peminjaman_non_rutin'] = $this->m_admin->get_non_rutin_peminjaman_non_rutin_peminjam();
		$data['dosen_peminjam'] = $this->m_admin->get_data_dosen_peminjam();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$this->load->view('template/template_admin',$data);
	}
	
	function batal_peminjaman_rutin($id_peminjaman){
		$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
		$where_rutin = array('id_peminjaman_rutin' => $id_peminjaman);
		//$where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
		//$where_barang = array('id_peminjaman_barang' => $id_peminjaman);
		$this->m_admin->hapus_data($where_peminjaman,'peminjaman');
		$this->m_admin->hapus_data($where_rutin,'peminjaman_rutin');
		$this->session->set_flashdata('notif', "Peminjaman $id_peminjaman berhasil dibatalkan");
		redirect('admin/history_rutin');
	}
	
	function batal_peminjaman($id_peminjaman){
		$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
		$where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
		$this->m_admin->hapus_data($where_peminjaman,'peminjaman');
		$this->m_admin->hapus_data($where_non_rutin,'peminjaman_non_rutin');
		$this->m_admin->hapus_data($where_non_rutin,'detail_peminjaman_non_rutin');;
		$this->session->set_flashdata('notif', "Peminjaman $id_peminjaman berhasil dibatalkan");
		redirect('admin/history_non_rutin');
	}
}


