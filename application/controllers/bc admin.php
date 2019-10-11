<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
	}

	function index(){
		$data['user'] = $this->m_admin->countUser();
		$data['dosen'] = $this->m_admin->countDosen();
		$data['mahasiswa'] = $this->m_admin->countMahasiswa();
		$data['rutin'] = $this->m_admin->countRuanganRutin();
		$data['non_rutin'] = $this->m_admin->countRuanganNonRutin();
		$data['barang'] = $this->m_admin->countBarang();
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
		$data = array(
			'NIP' => $NIP,
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Password' =>$password,
			'No_Telp' =>$No_Telp,
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
		
		
		$data = array(
			'Nama' => $Nama,
			'Status' => $Status,
			'Pangkat' => $Pangkat,
			'Bagian' => $Bagian,
			'Sub_Bagian' => $Sub_Bagian,
			'Urusan' => $Urusan,
			'stat' => $stat,
			'jabatan' => $jabatan,
			'No_Telp' => $No_Telp
			
		
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
		
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'password' =>$password,
			'telpon' =>$telpon
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
		
		$data = array(
			'nama' => $nama,
			'id_jurusan' => $id_jurusan,
			'id_prodi' => $id_prodi,
			'telpon' => $telpon	
		
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
		$status_penyelenggara = 'aktif';
		
		$data = array(
			'penyelenggara' => $penyelenggara,
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
		$status_penyelenggara = $this->input->post('status_penyelenggara');
		
		$data = array(
			'id_penyelenggara' => $id_penyelenggara,
			'penyelenggara' => $penyelenggara,
			'status_penyelenggara' => $status_penyelenggara
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
		$id = $this->input->post('id');
		$nama_jenis = $this->input->post('nama_jenis');
		
		$data = array(
			'nama_jenis' => $nama_jenis
		);

		$where = array('id' => $id);

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
	//

			
}

