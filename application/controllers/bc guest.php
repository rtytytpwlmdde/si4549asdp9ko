<?php 

class Guest extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
	}

	function index(){
		
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_guest',$data);
	}

	function peta_jadwal_kuliah(){
		
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_guest',$data);
	}

	function agenda(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_guest',$data);
	}

	function filter_jadwal_plot(){
		$date = $this->input->get('date');
		$data['main_view'] = 'guest/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['tanggal'] = $date;
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_guest',$data);
	}

	function peta_ruangan_rutin(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_peta_ruangan_rutin';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['tgl_peminjaman'] = $date;
		$this->load->view('template/template_guest',$data);
	}

	function peta_sarpras(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_peta_sarana_prasarana';
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['tgl_peminjaman'] = $date;
		$data['tanggal'] = $date;
		$this->load->view('template/template_guest',$data);
	}

	function filter_peta_ruangan_rutin(){
		$date = $this->input->get('date');
		$data['main_view'] = 'guest/v_peta_ruangan_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['tgl_peminjaman'] = $date;
		$this->load->view('template/template_guest',$data);
	}

	function filter_peta_sarpras(){
		$date = $this->input->get('date');
		$data['main_view'] = 'guest/v_peta_sarana_prasarana';
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['tanggal'] = $date;
		$this->load->view('template/template_guest',$data);
	}

	function peta_ruangan_non_rutin(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_peta_ruangan_non_rutin';
		$data['peminjaman_non_rutin'] = $this->m_admin->get_data_peminjaman_non_rutin($date);
		$data['ruangan_non_rutin'] = $this->m_admin->get_data_ruangan_non_rutin();
		$data['tanggal'] = $date;
		$this->load->view('template/template_guest',$data);
	}

	function filter_peta_ruangan_non_rutin(){
		$date = $this->input->get('date');
		$data['main_view'] = 'guest/v_peta_ruangan_non_rutin';
		$data['peminjaman_non_rutin'] = $this->m_admin->get_data_peminjaman_non_rutin($date);
		$data['ruangan_non_rutin'] = $this->m_admin->get_data_ruangan_non_rutin();
		$data['tanggal'] = $date;
		$this->load->view('template/template_guest',$data);
	}
	
	function list_agenda_umum(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda_umum($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_guest',$data);	
	}
	
	function list_agenda_akademik(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda_akademik($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_guest',$data);	
	}
}
