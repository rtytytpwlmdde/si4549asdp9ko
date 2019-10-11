<?php 

class Jadwal extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_jadwal');
	$this->load->model('m_admin');
	}

	function plot_jadwal($id_semester){
		ini_set('memory_limit', '-1');
		$id_sem = $id_semester;
		//$this->m_jadwal->hapus_jadwal_semester($id_semester);
		$this->m_jadwal->ganti_status_jadwal_semester($id_semester);
		$this->m_jadwal->ganti_status_aktif_semester($id_semester);
		$status_ada = 'ada';
		$status_aktif = 'aktif';
		$data_ada = array(
			'id_semester' =>$id_sem,
			'status' => $status_ada,
		);
		
		$data_aktif = array(
			'id_semester' =>$id_sem,
			'status' => $status_aktif,
		);

		$where = array('id_semester' => $id_sem);
		$this->m_admin->update_data($where,$data_ada,'jadwal_kuliah');
		$this->m_admin->update_data($where,$data_aktif,'semester');
		$this->session->set_flashdata('notif', "Sukses! Jadwal baru berhasil di ploting");
		redirect('jadwal/peta_jadwal_kuliah_filter?semester='.$id_sem);
	}

	function updateJadwalKuliahHasilPlot(){
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_jadwal_kuliah = $this->input->post('id_jadwal_kuliah');
		$kelas = $this->input->post('kelas');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');

		// membuat data jadwal kuliah baru di tabel jadwal kuliah
		$data = array(
			'id_semester' => $id_semester,
			'hari' => $hari,
			'id_jam_kuliah' => $id_jam_kuliah,
			'id_jadwal_kuliah' => $id_jadwal_kuliah,
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
		////
		redirect('jadwal/peta_jadwal_kuliah_filter?semester='.$id_semester);
	}

	function insertJadwalKuliahRutin(){
		$id_semester = $this->input->post('id_semester');
		$hari = $this->input->post('hari');
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$kelas = $this->input->post('kelas');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$status = $this->input->post('status');

		// membuat data jadwal kuliah baru di tabel jadwal kuliah
		$data = array(
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
	

		$this->m_admin->tambahData($data,'jadwal_kuliah');
		////
		redirect('jadwal/peta_jadwal_kuliah_filter?semester='.$id_semester);
	}

	function editJadwalKuliah($id_semester,$id_jadwal_kuliah){
		$data['main_view'] = 'jadwal/v_edit_jadwal_kuliah';
		$data['jadwal_kuliah'] = $this->m_jadwal->get_data_jadwal_kuliah_by_id($id_jadwal_kuliah);
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jam_kuliah_id'] = $this->m_admin->get_data_id_jam_kuliah();
		$data['ruangan_id'] = $this->m_admin->get_data_id_ruangan_rutin_bagus();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['hari'] = $this->m_admin->get_data_hari();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$data['jenis_barang'] = $this->m_jadwal->get_jenis_barang(); 
		$this->load->view('template/template_admin',$data);
	}

	

	

	function peta_jadwal_kuliah(){
		ini_set('memory_limit', '-1');
		$semester = $this->m_admin->semester_akhir();
		$id_sem;
		$sem;
		foreach ($semester as $s) {
			$id_sem = $s->id_semester;
			$sem = $s->semester;
		}
		$data['main_view'] = 'jadwal/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jam_kuliah_id'] = $this->m_admin->get_data_id_jam_kuliah();
		$data['ruangan_id'] = $this->m_admin->get_data_id_ruangan_rutin_bagus();
		$data['jadwal_kuliah'] = $this->m_admin->tampilLastJadwalKuliah($id_sem);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['hari'] = $this->m_admin->get_data_hari();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$data['last_semester'] = $sem;
		$data['is_semester_by_id'] = $id_sem;
		$data['jenis_barang'] = $this->m_jadwal->get_jenis_barang(); 
		$this->load->view('template/template_admin',$data);
	}

	function tambahJadwalKuliah($id_semester, $id_ruang, $id_waktu, $hari){
		$data['main_view'] = 'jadwal/v_tambah_jadwal_kuliah';
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['hari'] = $this->m_jadwal->get_data_hari_by_id($hari);
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['ruangan'] = $this->m_jadwal->get_data_ruangan_rutin_bagus_by_id($id_ruang);
		$data['jam_kuliah'] = $this->m_jadwal->get_jam_kuliah_by_id($id_waktu);
		$data['semester'] = $this->m_jadwal->get_data_semester_by_id($id_semester);
		$this->load->view('template/template_admin',$data);

	}

	function get_option_matakuliah(){
		$id=$this->input->post('id');
		$data=$this->m_jadwal->get_subkategori_matakuliah($id);
		echo json_encode($data);
	}

	function get_option_ruang(){
		$id=$this->input->post('id');
		$data=$this->m_jadwal->get_subkategori_ruang($id);
		echo json_encode($data);
	}

	function get_option_dosen(){
		$id=$this->input->post('id');
		$data=$this->m_jadwal->get_subkategori_dosen($id);
		echo json_encode($data);

	}

	function get_option_prodi(){
		$id=$this->input->post('id');
		$data=$this->m_jadwal->get_subkategori_prodi($id);
		echo json_encode($data);
	}


	function peta_jadwal_kuliah_filter(){
		$sems = $this->input->get('semester');
		$semester = $this->m_admin->semester_by_id($sems);
		$id_sem;
		$sem;
		foreach ($semester as $s) {
			$id_sem = $s->id_semester;
			$sem = $s->semester;
		}
		$data['main_view'] = 'jadwal/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliah($id_sem);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['hari'] = $this->m_admin->get_data_hari();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$data['last_semester'] = $sem;
		$data['is_semester_by_id'] = $id_sem;
		$this->load->view('template/template_admin',$data);
	}

	function filter_jadwal_plot(){
		$date = $this->input->post('date');
		$data['main_view'] = 'jadwal/v_peta_jadwal_kuliah_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin',$data);
	}

	function peta_ruangan(){
		$date = date("Y-m-d");
		$data['main_view'] = 'jadwal/v_peta_ruangan';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin',$data);
	}

	function filter_peta_ruangan(){
		$date = $this->input->post('date');
		$data['main_view'] = 'jadwal/v_peta_jadwal_kuliah_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_admin',$data);
	}

	function agenda(){
		$date = date("Y-m-d");
		$data['main_view'] = 'jadwal/v_agenda';
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['last_date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_admin',$data);
	}



	function ubah_status_sisip($id_semester){
		$status = "ada";
		$data_status = array(
			'id_semester' => $id_semester,
			'status' => $status
		);
		$where_status = array('id_semester' => $id_semester);
		$this->m_admin->update_data($where_status,$data_status,'jadwal_kuliah');
		$this->session->set_flashdata('notif', "Sukses! Jadwal baru berhasil di ploting");
		redirect('admin/lihat_jadwal_plot'.$id_semester);
	}

	function hapusJadwalKuliahHasilPlot($id_sem,$id_jadwal_kuliah){
		$where = array('id_jadwal_kuliah' => $id_jadwal_kuliah);
		$this->m_admin->hapus_data($where,'jadwal_kuliah');
		$this->session->set_flashdata('notif', "Data jadwal kuliah $id_jadwal_kuliah berhasil dihapus");
		redirect('jadwal/peta_jadwal_kuliah_filter?semester='.$id_sem);
	}

	public function editEmployee(){
		$result = $this->m_jadwal->editEmployee();
		echo json_encode($result);
	}


	
		
	
}
