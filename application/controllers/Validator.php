<?php 

class Validator extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('status') != 'validator_rutin'){
				if($this->session->userdata('status') != 'validator_non_rutin'){
					if($this->session->userdata('status') != 'validator_barang'){
						if($this->session->userdata('status') != 'validator_khusus'){
							redirect('auth/logout');
						}
					}
				}
			}
		} else {
			redirect('auth/logout');
		}
		$this->load->helper('url');
		$this->load->model('Mvalidator');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_auth');
	}

	function index(){
		$user_login = $this->session->userdata('status');
		if($user_login == 'validator_rutin'){
			$tahun = date("Y");
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_rutin_by_year'] = $this->m_admin->get_count_peminjaman_rutin_by_year($tahun);
			$data['peminjaman_rutin'] = $this->m_admin->countPeminjamanRutin();
			$data['peminjaman_rutin_setuju'] = $this->m_admin->countPeminjamanRutinSetuju();
			$data['peminjaman_rutin_tolak'] = $this->m_admin->countPeminjamanRutinTolak();
			$data['peminjaman_rutin_terkirim'] = $this->m_admin->countPeminjamanRutinTerkirim();
			$data['main_view'] = 'validator/v_dashboard_rutin';
		}else if($user_login == 'validator_non_rutin'){	
			$tahun = date("Y");
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_non_rutin_by_year'] = $this->m_admin->get_count_peminjaman_non_rutin_by_year($tahun);
			$data['peminjaman_non_rutin'] = $this->m_admin->countPeminjamanNonRutin();
			$data['peminjaman_non_rutin_setuju'] = $this->m_admin->countPeminjamanNonRutinSetuju();
			$data['peminjaman_non_rutin_terkirim'] = $this->m_admin->countPeminjamanNonRutinTerkirim();
			$data['peminjaman_non_rutin_tolak'] = $this->m_admin->countPeminjamanNonRutinTolak();
			$data['main_view'] = 'validator/v_dashboard_non_rutin';
		}else if($user_login == 'validator_barang'){
			$tahun = date("Y");
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_barang_by_year'] = $this->m_admin->get_count_peminjaman_barang_by_year($tahun);
			$data['peminjaman_barang'] = $this->m_admin->countPeminjamanBarang();
			$data['peminjaman_barang_setuju'] = $this->m_admin->countPeminjamanBarangSetuju();
			$data['peminjaman_barang_terkirim'] = $this->m_admin->countPeminjamanBarangTerkirim();
			$data['peminjaman_barang_tolak'] = $this->m_admin->countPeminjamanBarangTolak();
			$data['main_view'] = 'validator/v_dashboard_barang';
		}else if($user_login == 'validator_khusus'){
			$tahun = date("Y");
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_khusus_by_year'] = $this->m_admin->get_count_peminjaman_khusus_by_year($tahun);
			$data['peminjaman_khusus'] = $this->m_admin->countPeminjamanKhusus();
			$data['peminjaman_khusus_setuju'] = $this->m_admin->countPeminjamanKhususSetuju();
			$data['peminjaman_khusus_terkirim'] = $this->m_admin->countPeminjamanKhususTerkirim();
			$data['peminjaman_khusus_tolak'] = $this->m_admin->countPeminjamanKhususTolak();
			$data['main_view'] = 'validator/v_dashboard_khusus';
		}else{
		}
		$this->load->view('template/template_validator', $data);
	}

	function indeks(){
		$user_login = $this->session->userdata('status');
		if($user_login == 'validator_rutin'){
			$tahun = $this->input->post('tahun');
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_rutin_by_year'] = $this->m_admin->get_count_peminjaman_rutin_by_year($tahun);
			$data['peminjaman_rutin'] = $this->m_admin->countPeminjamanRutin();
			$data['peminjaman_rutin_setuju'] = $this->m_admin->countPeminjamanRutinSetuju();
			$data['peminjaman_rutin_tolak'] = $this->m_admin->countPeminjamanRutinTolak();
			$data['peminjaman_rutin_terkirim'] = $this->m_admin->countPeminjamanRutinTerkirim();
			$data['main_view'] = 'validator/v_dashboard_rutin';
		}else if($user_login == 'validator_non_rutin'){	
			$tahun = $this->input->post('tahun');
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_non_rutin_by_year'] = $this->m_admin->get_count_peminjaman_non_rutin_by_year($tahun);
			$data['peminjaman_non_rutin'] = $this->m_admin->countPeminjamanNonRutin();
			$data['peminjaman_non_rutin_setuju'] = $this->m_admin->countPeminjamanNonRutinSetuju();
			$data['peminjaman_non_rutin_terkirim'] = $this->m_admin->countPeminjamanNonRutinTerkirim();
			$data['peminjaman_non_rutin_tolak'] = $this->m_admin->countPeminjamanNonRutinTolak();
			$data['main_view'] = 'validator/v_dashboard_non_rutin';
		}else if($user_login == 'validator_barang'){
			$tahun = $this->input->post('tahun');
			$data['periode'] = $this->m_admin->get_periode($tahun);
			$data['tot_peminjaman_barang_by_year'] = $this->m_admin->get_count_peminjaman_barang_by_year($tahun);
			$data['peminjaman_barang'] = $this->m_admin->countPeminjamanBarang();
			$data['peminjaman_barang_setuju'] = $this->m_admin->countPeminjamanBarangSetuju();
			$data['peminjaman_barang_terkirim'] = $this->m_admin->countPeminjamanBarangTerkirim();
			$data['peminjaman_barang_tolak'] = $this->m_admin->countPeminjamanBarangTolak();
			$data['main_view'] = 'validator/v_dashboard_barang';
		}else{
		}
		$this->load->view('template/template_validator', $data);
	}

	function peta_jadwal_kuliah(){
		$date = date("Y-m-d");
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_validator',$data);
	}

	function list_agenda_umum(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda_umum($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_validator',$data);	
	}
	
	function list_agenda_akademik(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda_akademik($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_validator',$data);	
	}

	function filter_jadwal_plot(){
		$date = $this->input->get('date');
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_validator',$data);
	}
	
	function peta_ruangan_rutin(){
		$date = date("Y-m-d");
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_peta_ruangan_rutin';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->semester_akhir();
		$this->load->view('template/template_validator',$data);
	}

	function filter_peta_ruangan(){
		$date = $this->input->get('date');
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_peta_ruangan_rutin';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->semester_akhir();
		$this->load->view('template/template_validator',$data);
	}

	function peta_ruangan_non_rutin(){
		$date = date("Y-m-d");
		$data['main_view'] = 'validator/v_peta_ruangan_non_rutin';
		$data['peminjaman_non_rutin'] = $this->m_admin->get_data_peminjaman_non_rutin($date);
		$data['ruangan_non_rutin'] = $this->m_admin->get_data_ruangan_non_rutin();
		$data['tanggal'] = $date;
		$this->load->view('template/template_validator',$data);
	}

	function filter_peta_ruangan_non_rutin(){
		$date = $this->input->get('date');
		$data['main_view'] = 'validator/v_peta_ruangan_non_rutin';
		$data['peminjaman_non_rutin'] = $this->m_admin->get_data_peminjaman_non_rutin($date);
		$data['ruangan_non_rutin'] = $this->m_admin->get_data_ruangan_non_rutin();
		$data['tanggal'] = $date;
		$this->load->view('template/template_validator',$data);
	}
    


	function peminjaman_rutin(){
		$data['main_view'] = 'validator/v_list_peminjaman_rutin';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['mata_kuliah'] = $this->m_admin->tampilMatkul()->result();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_rutin'] = $this->Mvalidator->get_all_data_peminjaman_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_rutin_filter($status){
		$data['main_view'] = 'validator/v_list_peminjaman_rutin';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['mata_kuliah'] = $this->m_admin->tampilMatkul()->result();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_rutin'] = $this->Mvalidator->get_all_data_peminjaman_rutin_by_status($status);
		$this->load->view('template/template_validator',$data);
	}
	//alvin
	function peminjaman_non_rutin(){
		$akses = $this->session->userdata('username'); //alvin
		if($akses == "wakadek"){
			$jumlah_data = $this->Mvalidator->jumlah_data_wakadek();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'/validator/peminjaman_non_rutin/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$data['main_view'] = 'validator/v_list_peminjaman_non_rutin_wakadek';
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['pegawai'] = $this->m_admin->get_data_user();
			$data['search'] = $this->input->post('search');
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['catatan']=$this->Mvalidator->catatan_penolakan();
			$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin_wakadek();
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-right">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);	
			$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin_wakadek($config['per_page'],$from);
		}else{
			$this->load->library('pagination');
			$jumlah_data = $this->Mvalidator->jumlah_data();
			$config['base_url'] = base_url().'/validator/peminjaman_non_rutin/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$data['main_view'] = 'validator/v_list_peminjaman_non_rutin';
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['pegawai'] = $this->m_admin->get_data_user();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['search'] = $this->input->post('search');
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['catatan']=$this->Mvalidator->catatan_penolakan();
			$data['ruangan_pemakaian']=$this->Mvalidator->ruangan_pemakaian();
			$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin($akses);

			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-right">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);	
			$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin($config['per_page'],$from);
		}
		$this->load->view('template/template_validator',$data);
	}
	//alvin
	function peminjaman_non_rutin_filter($status){
		$akses = $this->session->userdata('username'); //alvin
		if($akses == "wakadek"){
		$data['main_view'] = 'validator/v_list_peminjaman_non_rutin_wakadek';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['catatan']=$this->Mvalidator->catatan_penolakan();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin_by_status_wakadek($status);
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin_wakadek();
		}else{
		$data['main_view'] = 'validator/v_list_peminjaman_non_rutin';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['catatan']=$this->Mvalidator->catatan_penolakan();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin_by_status($status, $akses);
		$data['akses'] = $this->Mvalidator->get_all_data_peminjaman_nonnn($status, $akses);
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin($akses);				
		}		
		$this->load->view('template/template_validator',$data);
	}

	/*function peminjaman_non_rutin(){
		$data['main_view'] = 'validator/v_list_peminjaman_non_rutin';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin();
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_non_rutin_filter($status){
		$data['main_view'] = 'validator/v_list_peminjaman_non_rutin';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_non_rutin_by_status($status);
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin();
		$this->load->view('template/template_validator',$data);
	}*/

	function peminjaman_khusus_filter($status){
		$data['main_view'] = 'validator/v_list_peminjaman_khusus';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_khusus_by_status($status);
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_barang_filter($status){
		$data['main_view'] = 'validator/v_list_peminjaman_barang';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_barang'] = $this->Mvalidator->get_all_data_peminjaman_barang_by_status($status);
		$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang();
		$this->load->view('template/template_validator',$data);
	}
    
    function peminjaman_barang(){
		$data['main_view'] = 'validator/v_list_peminjaman_barang';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['pegawai'] = $this->m_admin->get_data_user();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_barang'] = $this->Mvalidator->get_all_data_peminjaman_barang();
		$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_khusus(){
		$data['main_view'] = 'validator/v_list_peminjaman_khusus';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman_khusus();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
		$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
		$data['peminjaman_non_rutin'] = $this->Mvalidator->get_all_data_peminjaman_khusus();
		$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function pengembalian_barang(){
		$data['main_view'] = 'validator/v_list_pengembalian_barang';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_barang'] = $this->Mvalidator->get_all_data_peminjaman_barang();
		$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang();
		$this->load->view('template/template_validator',$data);
	}

	function pengembalian_barang_filter($status){
		$data['main_view'] = 'validator/v_list_pengembalian_barang';
		$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_barang'] = $this->Mvalidator->get_all_data_pengembalian_barang_by_status($status);
		$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang();
		$this->load->view('template/template_validator',$data);
	}

	function detail_peminjaman($id,$jenis){
		if($jenis == "rutin"){
			$data['main_view'] = 'validator/v_detail_peminjaman_rutin';
			$where = array('id_peminjaman_rutin' => $id);
			$data['peminjaman_rutin'] = $this->m_admin->edit_data($where,'peminjaman_rutin')->result();
			$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['semester'] = $this->m_admin->tampilSemester()->result();
			$this->load->view('template/template_validator',$data);
		}elseif($jenis == "barang"){
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['peminjaman_barang'] = $this->m_mahasiswa->get_peminjaman_barang_by_id($id);
			$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang_by_id($id);
			$data['main_view'] = 'validator/v_detail_peminjaman_barang';
			$this->load->view('template/template_validator',$data);
		}elseif($jenis == "khusus"){
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id);
			$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin_by_id($id);
			$data['main_view'] = 'validator/v_detail_peminjaman_khusus';
			$this->load->view('template/template_validator',$data);
		}else{
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id);
			$data['ruangan_non_rutin'] = $this->Mvalidator->get_ruangan_detail_non_rutin_by_id($id);
			$data['main_view'] = 'validator/v_detail_peminjaman_non_rutin';
			$this->load->view('template/template_validator',$data);
		}
	}

	
	function validasi($id_peminjaman,$id_peminjam,$status){
		$user_login = $this->session->userdata('status');
		$nama_login = $this->session->userdata('username');
		$n = "";
		if($nama_login == "wakadek"){
			$data = array(
					'status_peminjaman_wakadek' => $status
				);
			$data_rutin = 	array(
											'status_wakadek' => $status
										);
			$data_validator= array(
								'nip_validator' => $n
							);
		}else {
			$data = array(
					'status_peminjaman' => $status
				);
			$data_rutin = 	array(
											'status' => $status
										);
			$data_validator= array(
								'nip_validator' => $nama_login
							);
		}
        
		
            
        $where = array('id_peminjaman' => $id_peminjaman);
        $where_rutin = array('id_peminjaman_rutin' => $id_peminjaman);
        $where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
        $where_barang = array('id_peminjaman_barang' => $id_peminjaman);
		//alvin
		/* $jenis_ruangan = $this->m_admin->ruangan_non_rutin($id_peminjaman);
		$hari = date('l');
		if( $user_login == 'validator_rutin'and ($hari == "Saturday" OR $hari == "Sunday") ){
			$this->session->set_flashdata('notif', "Harap validasi pada hari kerja!");
			redirect('validator/peminjaman_rutin/');
		}else if ($hari != "Saturday" OR $hari != "Sunday" and $user_login == 'validator_non_rutin' and $jenis_ruangan =! "rutin") {
			$this->session->set_flashdata('notif', "Harap validasi pada hari kerja! non rutin");
			redirect('validator/peminjaman_non_rutin/');
		} */
		
        $this->m_admin->update_data($where,$data,'peminjaman');
        $this->m_admin->update_data($where_rutin,$data_rutin,'peminjaman_rutin');
				$this->m_admin->update_data($where_rutin,$data_validator,'peminjaman_rutin');
				$this->m_admin->update_data($where_non_rutin,$data_validator,'peminjaman_non_rutin');
				$this->m_admin->update_data($where_barang,$data_validator,'peminjaman_barang');
		$this->m_admin->update_data($where_non_rutin,$data_rutin,'peminjaman_non_rutin');
		$this->m_admin->update_data($where_barang,$data_rutin,'peminjaman_barang');
		$this->session->set_flashdata('notif', "SUKSES! Status peminjaman berhasil diganti menjadi $status");
		
		if($user_login == 'validator_rutin'){
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam_rutin($id_peminjaman);
				foreach ($data_jam as $u){
					$jam = $u['jam_kuliah'];			
				}
				$data_tanggal = $this->m_admin->get_data_tanggal_rutin($id_peminjaman);
				foreach ($data_tanggal as $d){
					$tgl = $d['tanggal_pemakaian'];
				}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa_rutin($id_peminjaman);
				foreach($data_ruangan as $a){
					$ruang = $a['ruangan'];
					
				}
				$data_nama_validator_rutin = $this->m_admin->get_data_nama_validator_rutin($id_peminjaman);
				foreach($data_nama_validator_rutin as $aa){
					$valid = $aa['nip_validator'];
				}
				$data_nama = $this->m_admin->get_data_nama_wa_rutin($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjam);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nSelamat, Booking Ruangan anda telah BERHASIL. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai. $tengah5. $tgl. $pengirim
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam. $tengah5. $tgl. $pengirim. $valid ;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false));
			redirect('validator/peminjaman_rutin/');
		}else if($user_login == 'validator_non_rutin'){
				$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}

				$data_jam= $this->m_admin->get_data_jam($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai_peminjaman'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai_peminjaman'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa($id_peminjaman);
					foreach($data_ruangan as $a){
						$ruang = $a['ruangan'];
						
					}
				$data_nama_validator_non_rutin = $this->m_admin->get_data_nama_validator_non_rutin($id_peminjaman);
					foreach($data_nama_validator_non_rutin as $aa){
						$valid = $aa['nip_validator'];
					}
				$data_nama = $this->m_admin->get_data_nama_wa($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjaman);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nSelamat, Booking Ruangan anda telah BERHASIL. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$arr = array($awal, $nama, $tengah, $tengah2, $id_peminjaman, $tengah3, $ruang, $tengah4, $jam_mulai,  $jam_selesai, $pengirim);
				//implode("/n",$arr)
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $pengirim. $valid;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false)); 
			redirect('validator/peminjaman_non_rutin/');
		}else if($user_login == 'validator_khusus'){
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai_peminjaman'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai_peminjaman'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa($id_peminjaman);
					
					$ruang = $this->m_admin->subArraysToString($data_ruangan);

				$data_nama_validator_non_rutin = $this->m_admin->get_data_nama_validator_non_rutin($id_peminjaman);
					foreach($data_nama_validator_non_rutin as $aa){
						$valid = $aa['nip_validator'];
					}				
				
				$data_nama = $this->m_admin->get_data_nama_wa($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjaman);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nSelamat, Booking Ruangan anda telah BERHASIL. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $pengirim. $valid;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false)); 
				
			redirect('validator/peminjaman_khusus/');
			
		}else if($user_login == 'validator_barang'){
			
				$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam_barang($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai_barang($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal_barang($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_barang_wa($id_peminjaman);
					
						$barang = $this->m_admin->subArraysToString($data_ruangan);
				$data_nama_validator_barang = $this->m_admin->get_data_nama_validator_barang($id_peminjaman);
					foreach($data_nama_validator_barang as $aa){
						$valid = $aa['nip_validator'];
					}	
				
				$data_nama = $this->m_admin->get_data_nama_wa_barang($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjam);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nSelamat, Booking Barang anda telah BERHASIL. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nBarang\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $barang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $pengirim
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $barang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $pengirim. $valid ;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false));
			
			redirect('validator/peminjaman_barang/');
		}else{
			redirect('validator/peminjaman/');
		}
	}
	
	
//alvin
	function tolakPeminjaman(){
		$nama_login = $this->session->userdata('username');
		$user_login = $this->session->userdata('status');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_peminjam = $this->input->post('id_peminjam');
		$catatan_penolakan = $this->input->post('catatan_penolakan');
		$status = "tolak";
		
		if($nama_login == "wakadek"){
			$data = array(
							'id_peminjaman' => $id_peminjaman,
							'catatan_penolakan' => $catatan_penolakan,
							'status_peminjaman_wakadek' => $status
						);           
						
			 $data_rutin = array(
							'id_peminjaman_rutin' => $id_peminjaman, 'status_wakadek' => $status
							);    
							
			$data_non_rutin = array(
							'id_peminjaman_non_rutin' => $id_peminjaman, 'status_wakadek' => $status
							); 
							
			$data_barang = array(
							'id_peminjaman_barang' => $id_peminjaman,'status_wakadek' => $status
							); 
		}else {
			$data = array(
							'id_peminjaman' => $id_peminjaman,
							'catatan_penolakan' => $catatan_penolakan,
							'status_peminjaman' => $status
						);           
						
			$data_rutin = array(
							'id_peminjaman_rutin' => $id_peminjaman, 'status' => $status, 'status_wakadek' => $status
							);   
							
			$data_non_rutin = array(
							'id_peminjaman_non_rutin' => $id_peminjaman, 'status' => $status,
							'status_wakadek' => $status
							); 
							
			$data_barang = array(
							'id_peminjaman_barang' => $id_peminjaman,'status' => $status,
							'status_wakadek' => $status
							);
		}
		
        

		/*
		$jenis_ruangan = $this->m_admin->ruangan_non_rutin($id_peminjaman);
		$hari = date('l');
		if( $user_login == 'validator_rutin'and ($hari == "Saturday" OR $hari == "Sunday") ){
			$this->session->set_flashdata('notif', "Harap validasi pada hari kerja!");
			redirect('validator/peminjaman_rutin/');
		}else if ($hari != "Saturday" OR $hari != "Sunday" and $user_login == 'validator_non_rutin' and $jenis_ruangan =! "rutin") {
			$this->session->set_flashdata('notif', "Harap validasi pada hari kerja! non rutin");
			redirect('validator/peminjaman_non_rutin/');
		}*/
        
        $where = array('id_peminjaman' => $id_peminjaman);
        $where_rutin = array('id_peminjaman_rutin' => $id_peminjaman);
        $where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
		$where_barang = array('id_peminjaman_barang' => $id_peminjaman);
		
        $this->m_admin->update_data($where,$data,'peminjaman');
        $this->m_admin->update_data($where_rutin,$data_rutin,'peminjaman_rutin');
        $this->m_admin->update_data($where_non_rutin,$data_non_rutin,'peminjaman_non_rutin');
        $this->m_admin->update_data($where_barang,$data_barang,'peminjaman_barang');
		$this->session->set_flashdata('notif', "SUKSES! Status peminjaman berhasil diganti menjadi $status");
		if($user_login == 'validator_rutin'){
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam_rutin($id_peminjaman);
				foreach ($data_jam as $u){
					$jam = $u['jam_kuliah'];			
				}
				$data_tanggal = $this->m_admin->get_data_tanggal_rutin($id_peminjaman);
				foreach ($data_tanggal as $d){
					$tgl = $d['tanggal_pemakaian'];
				}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa_rutin($id_peminjaman);
				foreach($data_ruangan as $a){
					$ruang = $a['ruangan'];
					
				}
				$data_nama_validator_rutin = $this->m_admin->get_data_nama_validator_rutin($id_peminjaman);
				foreach($data_nama_validator_rutin as $aa){
					$valid = $aa['nip_validator'];
				}
				$data_nama = $this->m_admin->get_data_nama_wa_rutin($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjam);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nInformasi, Booking Ruangan anda telah DITOLAK. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$tengah6 = "\nCatatan\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai. $tengah5. $tgl. $pengirim
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam. $tengah5. $tgl. $tengah6. $catatan_penolakan. $pengirim. $valid ;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false));
			redirect('validator/peminjaman_rutin/');
		}else if($user_login == 'validator_non_rutin'){
				if($nama_login == "wakadek"){
					redirect('validator/peminjaman_non_rutin/');
				} else {
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}

				$data_jam= $this->m_admin->get_data_jam($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai_peminjaman'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai_peminjaman'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa($id_peminjaman);
					foreach($data_ruangan as $a){
						$ruang = $a['ruangan'];
						
					}
				$data_nama_validator_non_rutin = $this->m_admin->get_data_nama_validator_non_rutin($id_peminjaman);
					foreach($data_nama_validator_non_rutin as $aa){
						$valid = $aa['nip_validator'];
					}
				$data_nama = $this->m_admin->get_data_nama_wa($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjaman);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nInformasi, Booking Ruangan anda telah DITOLAK. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$tengah6 = "\nCatatan\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$arr = array($awal, $nama, $tengah, $tengah2, $id_peminjaman, $tengah3, $ruang, $tengah4, $jam_mulai,  $jam_selesai, $pengirim);
				//implode("/n",$arr)
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $tengah6. $catatan_penolakan. $pengirim. $valid;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false)); 
			redirect('validator/peminjaman_non_rutin/');
				}
		}else if($user_login == 'validator_barang'){
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam_barang($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai_barang($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal_barang($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_barang_wa($id_peminjaman);
					
				$barang = $this->m_admin->subArraysToString($data_ruangan);
				
				$data_nama_validator_barang = $this->m_admin->get_data_nama_validator_barang($id_peminjaman);
				foreach($data_nama_validator_barang as $aa){
					$valid = $aa['nip_validator'];
				}
				$data_nama = $this->m_admin->get_data_nama_wa_barang($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjam);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nInformasi, Booking Barang anda telah DITOLAK. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nBarang\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$tengah6 = "\nCatatan\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				//$awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $barang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $pengirim
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $barang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $tengah6. $catatan_penolakan. $pengirim. $valid ;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false));
			redirect('validator/peminjaman_barang/');
		}else if($user_login == 'validator_khusus'){
			$api = $this->m_admin->get_data_api_key();
					foreach ($api as $apii){
						$my_apikey = $apii['api_key'];			
					}
				$data_telpon = $this->m_admin->get_data_mahasiswa_telpon($id_peminjam);
					if(count($data_telpon) > 0){
						foreach($data_telpon as $r){
							$telpon = $r['telpon'];
						}
					}else{
						$data_telpon_pegawai = $this->m_admin->get_data_pegawai_telpon($id_peminjam);
						foreach($data_telpon_pegawai as $t){
							$telpon = $t['No_Telp'];
						}	
					}
				$data_jam= $this->m_admin->get_data_jam($id_peminjaman);
					foreach ($data_jam as $u){
						$jam_mulai = $u['jam_mulai_peminjaman'];			
					}
				$data_jam_selesai = $this->m_admin->get_data_jam_selesai($id_peminjaman);
					foreach ($data_jam_selesai as $c){
						$jam_selesai = $c['jam_selesai_peminjaman'];
					}
				$data_tanggal = $this->m_admin->get_data_tanggal($id_peminjaman);
					foreach ($data_tanggal as $d){
						$tgl = $d['tanggal_pemakaian'];
					}
				$data_ruangan = $this->m_admin->get_data_ruangan_wa($id_peminjaman);
					
				$ruang = $this->m_admin->subArraysToString($data_ruangan);
				
				$data_nama_validator_non_rutin = $this->m_admin->get_data_nama_validator_non_rutin($id_peminjaman);
					foreach($data_nama_validator_non_rutin as $aa){
						$valid = $aa['nip_validator'];
					}
				$data_nama = $this->m_admin->get_data_nama_wa($id_peminjaman);
					if(count($data_nama)>0){
						foreach($data_nama as $b){
							$nama = $b['nama'];
						}
					}else{
						$data_nama_pegawai = $this->m_admin->get_data_nama_pegawai_wa($id_peminjaman);
						foreach($data_nama_pegawai as $o){
							$nama = $o['Nama'];
						}
					}
				//$nama = $this->m_admin->subArraysToString($data['nama']);
				$destination = $telpon;
				$awal = "Untuk sdr ";
				$tengah = "\nInformasi, Booking Ruangan anda telah DITOLAK. Dengan keterangan sebagai berikut : ";
				$tengah2 = "\nKode Booking : ";
				$tengah3 = "\nRuangan\t\t\t\t\t: ";
				$tengah4 = "\nJam\t\t\t\t\t\t\t\t: ";
				$tengah5 = "\nTanggal\t\t\t\t\t\t: ";
				$tengah6 = "\nCatatan\t\t\t\t\t\t: ";
				$pengirim = "\n\nPengirim\nAdmin Manajemen Ruangan - ";
				$message = $awal. $nama.".". $tengah. $tengah2. $id_peminjaman. $tengah3. $ruang. $tengah4. $jam_mulai.".00 -".  $jam_selesai.".00 ". $tengah5. $tgl. $tengah6. $catatan_penolakan. $pengirim. $valid;   
				$api_url = "http://panel.apiwha.com/send_message.php"; 
				$api_url .= "?apikey=". urlencode ($my_apikey); 
				$api_url .= "&number=". urlencode ($destination); 
				$api_url .= "&text=". urlencode ($message); 
				$my_result_object = json_decode(file_get_contents($api_url, false)); 
			redirect('validator/peminjaman_khusus/');
		}else{
			redirect('validator/peminjaman/');
		}

	}



	function set_tolak_pengembalian_barang($id_peminjaman,$status){
		$user_login = $this->session->userdata('status');
		$id_pengembali = '';
		$catatan_pengembalian = '';
		$tanggal_pengembalian = '';
		$data = array(
			'status_pengembalian' => $status,
			'id_pengembali' => $id_pengembali,
			'catatan_pengembalian' => $catatan_pengembalian,
			'tanggal_pengembalian' => $tanggal_pengembalian
        );
            
        $where_barang = array('id_peminjaman_barang' => $id_peminjaman);

        $this->m_admin->update_data($where_barang,$data,'peminjaman_barang');
		$this->session->set_flashdata('notif', "SUKSES! Status peminjaman berhasil diganti menjadi $status");
		
		if($user_login == 'validator_rutin'){
			redirect('validator/peminjaman_rutin/');
		}else if($user_login == 'validator_non_rutin'){
			redirect('validator/peminjaman_non_rutin/');
		}else if($user_login == 'validator_barang'){
			redirect('validator/pengembalian_barang/');
		}else{
			redirect('validator/peminjaman/');
		}
	}

	function set_pengembalian_barang(){
		$id_peminjaman_barang = $this->input->post('id_peminjaman_barang');
		$catatan_pengembalian = $this->input->post('catatan_pengembalian');
		$id_pengembali = $this->input->post('id_pengembali');
		$status="ya";
		$data = array(
			'id_peminjaman_barang' => $id_peminjaman_barang,
            'catatan_pengembalian' => $catatan_pengembalian,
            'id_pengembali' => $id_pengembali,
            'status_pengembalian' => $status
        );
            
        $where_barang = array('id_peminjaman_barang' => $id_peminjaman_barang);

        $this->m_admin->update_data($where_barang,$data,'peminjaman_barang');
		$this->session->set_flashdata('notif', "SUKSES! Status peminjaman berhasil diganti menjadi $id_peminjaman_barang");
		redirect('validator/pengembalian_barang/');
	}

	function peta_sarpras(){
		$date = date("Y-m-d");
		$data['main_view'] = 'validator/v_peta_sarana_prasarana';
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['tgl_peminjaman'] = $date;
		$data['tanggal'] = $date;
		$this->load->view('template/template_validator',$data);
	}

	function filter_peta_sarpras(){
		$date = $this->input->get('date');
		$data['main_view'] = 'validator/v_peta_sarana_prasarana';
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['tanggal'] = $date;
		$this->load->view('template/template_validator',$data);
	}

	function profil(){
		$data['main_view'] = 'validator/v_profil';
		$data['user'] = $this->m_admin->getDataProfil();   
		$this->load->view('template/template_validator', $data);
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
			redirect('validator/profil');
		}else{
			$this->session->set_flashdata('notif', "GAGAL - Password Lama tidak sesuai");
			redirect('validator/profil');
        }
	}	

	
	function tambahPeminjamanRutin(){
		$id_semester = $this->input->post('id_semester');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$string_hari = strtotime($tanggal_pemakaian);
		$hari = date('l',$string_hari);
		$id_jam_kuliah = $this->input->post('id_jam_kuliah');
		$id_ruangan = $this->input->post('id_ruangan');
		$kode_matkul = $this->input->post('kode_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$id_peminjam = $this->input->post('id_peminjam');
		$keterangan = $this->input->post('keterangan');
		$kelas = $this->input->post('kelas');
		$status = "terkirim";
		$jenis_peminjaman = "rutin";
		$kode_tgl = str_replace("-","",$tanggal_pemakaian);
		$id_peminjaman_rutin = $kode_tgl."".$id_ruangan."".$id_jam_kuliah."2".$id_semester;
		$cek_rutin = $this->m_mahasiswa->cek_ruang_rutin($id_semester,$id_jam_kuliah,$id_ruangan,$tanggal_pemakaian)->num_rows();
		$cek_non_rutin = $this->m_mahasiswa->cek_ruang_non_rutin($id_jam_kuliah,$id_ruangan,$tanggal_pemakaian)->num_rows();
		if($cek_rutin > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar rutin di sistem");
			redirect('validator/inputPeminjamanRutin/');
		}else{ 
			if($cek_non_rutin > 0 ){
				$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar non rutin di sistem");
				redirect('validator/inputPeminjamanRutin/');
			}else{ 
				$data_rutin = array(
					'id_peminjaman_rutin' => $id_peminjaman_rutin,
					'id_semester' => $id_semester,
					'hari' => $hari,
					'id_jam_kuliah' => $id_jam_kuliah,
					'id_ruangan' => $id_ruangan,
					'kode_matkul' => $kode_matkul,
					'id_dosen' => $id_dosen,
					'id_jurusan' => $id_jurusan,
					'id_prodi' => $id_prodi,
					'id_peminjam' => $id_peminjam,
					'tanggal_pemakaian' => $tanggal_pemakaian,
					'keterangan' => $keterangan,
					'kelas' => $kelas,
					'status' => $status
				);
				$data_pinjam = array(
					'id_peminjaman' => $id_peminjaman_rutin,
					'id_peminjam' => $id_peminjam,
					'jenis_peminjaman' => $jenis_peminjaman,
					'status_peminjaman' => $status
				);
				$this->m_admin->tambahdata($data_rutin,'peminjaman_rutin');
				$this->m_admin->tambahdata($data_pinjam,'peminjaman');
				$this->session->set_flashdata('notif', "Peminjaman telah dikirim, ruangan dapat digunakan setelah disetujui oleh operator");
				redirect('validator/peminjaman_rutin/'.$id_peminjam);
			}
		}
	}

	

	function inputPeminjamanNonRutin(){
		//$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'validator/v_tambah_peminjaman_ruang_non_rutin';		
		$this->load->view('template/template_validator',$data);
	}
	
	function tambahPeminjamanNonRutin(){
		$id_peminjam = $this->input->post('id_peminjam');
		$penyelenggara = $this->input->post('penyelenggara');
		$nama_agenda = $this->input->post('nama_agenda');
		$kategori=$this->input->post('kategori');
		$jam_mulai_peminjaman = $this->input->post('jam_mulai_peminjaman');
		$jam_selesai_peminjaman = $this->input->post('jam_selesai_peminjaman');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$keterangan = $this->input->post('keterangan');
		$status = "pending";
		$jenis_peminjaman = "non rutin";
		$kode_tgl = str_replace("-","",$tanggal_pemakaian);
		$random = (rand(10,99));
		$id_peminjaman_non_rutin = $kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman."".$penyelenggara."".$random;
		$data_non_rutin = array(
			'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
			'id_peminjam' => $id_peminjam,
			'penyelenggara' => $penyelenggara,
			'nama_agenda' => $nama_agenda,
			'kategori'=>$kategori,
			'jam_mulai_peminjaman' => $jam_mulai_peminjaman,
			'jam_selesai_peminjaman' => $jam_selesai_peminjaman,
			'tanggal_pemakaian' => $tanggal_pemakaian,
			'keterangan' => $keterangan,
			'status' => $status
		);
		$data_pinjam = array(
			'id_peminjaman' => $id_peminjaman_non_rutin,
			'id_peminjam' => $id_peminjam,
			'jenis_peminjaman' => $jenis_peminjaman,
			'status_peminjaman' => $status
		);
		$this->m_admin->tambahdata($data_non_rutin,'peminjaman_non_rutin');
		$this->m_admin->tambahdata($data_pinjam,'peminjaman');
		$this->session->set_flashdata('notif', "Peminjaman berhasil dibuat, tambahkan ruangan yang akan digunakan untuk menyelesaikan proses peminjaman");
		redirect('validator/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
	}

	function input_ruangan_peminjaman_non_rutin($id_peminjaman_non_rutin){
		
		$data['ruangan'] = $this->m_mahasiswa->get_data_ruangan_rutin_non_rutin_tersedia();
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['peminjaman'] = $this->m_admin->getDataPeminjamanById($id_peminjaman_non_rutin);
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		
		//$data['ruangan_peminjaman_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_rutin($tgl);
		//$data['ruangan_peminjaman_non_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_non_rutin($tgl);
		
		$data['main_view'] = 'validator/v_tambah_ruangan_peminjaman_non_rutin';
		$this->load->view('template/template_validator',$data);
	}

	function tambahRuanganPeminjamanNonRutin(){
		$id_peminjaman_non_rutin = $this->input->post('id_peminjaman_non_rutin');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$jam_mulai_pemakaian = $this->input->post('jam_mulai_pemakaian');
		$jam_selesai_pemakaian = $this->input->post('jam_selesai_pemakaian');
		$id_peminjam = $this->session->userdata('username');
		$day = date('l', strtotime($tanggal_pemakaian));
		//$jam_mulai = explode(' ', $jam_mulai_pemakaian);
		//s$jam_selesai = explode(' ', $jam_selesai_pemakaian);
		$id_ruangan_input = $this->input->post('id_ruangan');
		$i=0;
		$jam_mulai_rutin[$i] = 0;
		$jam_selesai_rutin[$i] = 0;
		$result_rutin=0;
		$result_jadwal=0;
		$asd=0;
		$status_jenis_ruangan = $this->m_mahasiswa->get_status_ruangan($id_ruangan_input);
		$ruang_rutin = $this->m_mahasiswa->get_data_cek_ruangan_rutin($tanggal_pemakaian,$id_ruangan_input);
		$ruang_jadwal = $this->m_mahasiswa->get_data_cek_jadwal_rutin($day,$id_ruangan_input);
		foreach ($status_jenis_ruangan as $jr) {
			$j_ruangan = $jr->jenis_ruangan;
		}
		//if($jenis_ruangan != 'rutsin'){
			foreach ($ruang_rutin as $rutin) {
				$jam_kuliah[$i] = $rutin->id_jam_kuliah;
				$id_jadwal[$i] = $rutin->id_peminjaman_rutin;
				$id_ruangan[$i] = $rutin->id_ruangan;
				$jadwal[$i] = $rutin->id_peminjaman_rutin;
				if($id_ruangan[$i] == $id_ruangan_input){
					if($jam_kuliah[$i] == 1){
						$jam_mulai_rutin[$i] = 8;
						$jam_selesai_rutin[$i] = 9;
					}elseif($jam_kuliah[$i] == 2){
						$jam_mulai_rutin[$i] = 10;
						$jam_selesai_rutin[$i] = 11;
					}elseif($jam_kuliah[$i] == 3){
						$jam_mulai_rutin[$i] = 13;
						$jam_selesai_rutin[$i] = 14;
					}elseif($jam_kuliah[$i] == 4){
						$jam_mulai_rutin[$i] = 16;
						$jam_selesai_rutin[$i] = 16;
					}else{
						$jam_mulai_rutin[$i] = 19;
						$jam_selesai_rutin[$i] = 20;
					}
					for ($x = $jam_mulai_rutin[$i]; $x <= $jam_selesai_rutin[$i]; $x++){
						for ($y = $jam_mulai_pemakaian; $y <= $jam_selesai_pemakaian; $y++){
							if($x == $y){
								//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
								$result_rutin++;
								//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
							}
						}
					}
				}
				$i++;
			}

			$i=0;

			foreach ($ruang_jadwal as $jadwal) {
				$jam_kuliah[$i] = $jadwal->id_jam_kuliah;
				if($jam_kuliah[$i] == 1){
					$jam_mulai_rutin[$i] = 8;
					$jam_selesai_rutin[$i] = 9;
				}elseif($jam_kuliah[$i] == 2){
					$jam_mulai_rutin[$i] = 10;
					$jam_selesai_rutin[$i] = 11;
				}elseif($jam_kuliah[$i] == 3){
					$jam_mulai_rutin[$i] = 13;
					$jam_selesai_rutin[$i] = 14;
				}elseif($jam_kuliah[$i] == 4){
					$jam_mulai_rutin[$i] = 16;
					$jam_selesai_rutin[$i] = 16;
				}else{
					$jam_mulai_rutin[$i] = 19;
					$jam_selesai_rutin[$i] = 20;
				}
				for ($x = $jam_mulai_rutin[$i]; $x <= $jam_selesai_rutin[$i]; $x++){
					for ($y = $jam_mulai_pemakaian; $y <= $jam_selesai_pemakaian; $y++){
						if($x == $y){
							//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
							$result_jadwal++;
							echo $result_jadwal;
							//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
						}
					}
				}
				
				$i++;
			}

			if($result_rutin > 0 || $result_jadwal > 0){
				$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
				redirect('validator/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
			}else{ 
				$result_non_rutin=0;
				$ruang_non_rutin = $this->m_mahasiswa->get_data_cek_ruangan_non_rutin($tanggal_pemakaian,$id_ruangan_input);
				foreach ($ruang_non_rutin as $non_rutin) {
					$jam_mulai_peminjaman = $non_rutin->jam_mulai_peminjaman;
					$jam_selesai_peminjaman = $non_rutin->jam_selesai_peminjaman;
					for ($p = $jam_mulai_peminjaman; $p <= $jam_selesai_peminjaman; $p++){
						for ($q = $jam_mulai_pemakaian; $q <= $jam_selesai_pemakaian; $q++){
							if($p == $q){
								//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
								$result_non_rutin++;
								//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
							}
						}
					}
				}

				if($result_non_rutin > 0 ){
					$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
					redirect('validator/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
				}else{
					$id_jam_non_rutin=0;
					for($z = $jam_mulai_pemakaian; $z <= $jam_selesai_pemakaian; $z++){
						if($z==8 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=1;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==10 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=2;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==13 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=3;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==17 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=4;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==19){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=5;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}
					}
				}
				$this->session->set_flashdata('notif', "Sukses, Ruangan berhasil ditambahkan");
				redirect('validator/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
			}
		// }else{

		// }
	}

	function hapus_ruangan_peminjaman_non_rutin($id_peminjaman,$id_ruangan){
		$where = array('id_peminjaman_non_rutin' => $id_peminjaman, 'id_ruangan'=>$id_ruangan);
		$this->m_admin->hapus_data($where,'detail_peminjaman_non_rutin');
		$this->session->set_flashdata('notif', "Ruangan berhasil dihapus");
		redirect('validator/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman);
	}

	// peminjaman khusus
	function inputPeminjamanKhusus(){
		$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'validator/v_tambah_peminjaman_khusus';		
		$this->load->view('template/template_validator',$data);
	}
	
	function tambahPeminjamanKhusus(){
		$id_peminjam = $this->input->post('id_peminjam');
		$penyelenggara = $this->input->post('penyelenggara');
		$nama_agenda = $this->input->post('nama_agenda');
		$jam_mulai_peminjaman = $this->input->post('jam_mulai_peminjaman');
		$jam_selesai_peminjaman = $this->input->post('jam_selesai_peminjaman');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$keterangan = $this->input->post('keterangan');
		$status = "pending";
		$jenis_peminjaman = "khusus";
		$kode_tgl = str_replace("-","",$tanggal_pemakaian);
		$random = (rand(10,99));
		$id_peminjaman_non_rutin = $kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman."".$penyelenggara."".$random;
			$data_non_rutin = array(
				'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
				'id_peminjam' => $id_peminjam,
				'penyelenggara' => $penyelenggara,
				'nama_agenda' => $nama_agenda,
				'jam_mulai_peminjaman' => $jam_mulai_peminjaman,
				'jam_selesai_peminjaman' => $jam_selesai_peminjaman,
				'tanggal_pemakaian' => $tanggal_pemakaian,
				'keterangan' => $keterangan,
				'status' => $status
			);
			$data_pinjam = array(
				'id_peminjaman' => $id_peminjaman_non_rutin,
				'id_peminjam' => $id_peminjam,
				'jenis_peminjaman' => $jenis_peminjaman,
				'status_peminjaman' => $status
			);
			$this->m_admin->tambahdata($data_non_rutin,'peminjaman_non_rutin');
			$this->m_admin->tambahdata($data_pinjam,'peminjaman');
			$this->session->set_flashdata('notif', "Peminjaman berhasil dibuat, tambahkan ruangan yang akan digunakan untuk menyelesaikan proses peminjaman");
			redirect('validator/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
		
	}

	function input_ruangan_peminjaman_khusus($id_peminjaman_non_rutin){
		
		$data['ruangan'] = $this->m_mahasiswa->get_data_ruangan_khusus();
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['peminjaman'] = $this->m_admin->getDataPeminjamanById($id_peminjaman_non_rutin);
		
		
		//$data['ruangan_peminjaman_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_rutin($tgl);
		//$data['ruangan_peminjaman_non_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_non_rutin($tgl);
		
		$data['main_view'] = 'validator/v_tambah_ruangan_peminjaman_khusus';
		$this->load->view('template/template_validator',$data);
	}

	function tambahRuanganPeminjamanKhusus(){
		$id_peminjaman_non_rutin = $this->input->post('id_peminjaman_non_rutin');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$jam_mulai_pemakaian = $this->input->post('jam_mulai_pemakaian');
		$jam_selesai_pemakaian = $this->input->post('jam_selesai_pemakaian');
		$id_peminjam = $this->session->userdata('id_login');
		$day = date('l', strtotime($tanggal_pemakaian));
		//$jam_mulai = explode(' ', $jam_mulai_pemakaian);
		//s$jam_selesai = explode(' ', $jam_selesai_pemakaian);
		$id_ruangan_input = $this->input->post('id_ruangan');
		$i=0;
		$jam_mulai_rutin[$i] = 0;
		$jam_selesai_rutin[$i] = 0;
		$result_rutin=0;
		$result_jadwal=0;
		$asd=0;
		$status_jenis_ruangan = $this->m_mahasiswa->get_status_ruangan($id_ruangan_input);
		$ruang_rutin = $this->m_mahasiswa->get_data_cek_ruangan_rutin($tanggal_pemakaian,$id_ruangan_input);
		$ruang_jadwal = $this->m_mahasiswa->get_data_cek_jadwal_rutin($day,$id_ruangan_input);
		foreach ($status_jenis_ruangan as $jr) {
			$j_ruangan = $jr->jenis_ruangan;
		}
		//if($jenis_ruangan != 'rutsin'){
			foreach ($ruang_rutin as $rutin) {
				$jam_kuliah[$i] = $rutin->id_jam_kuliah;
				$id_jadwal[$i] = $rutin->id_peminjaman_rutin;
				$id_ruangan[$i] = $rutin->id_ruangan;
				$jadwal[$i] = $rutin->id_peminjaman_rutin;
				if($id_ruangan[$i] == $id_ruangan_input){
					if($jam_kuliah[$i] == 1){
						$jam_mulai_rutin[$i] = 8;
						$jam_selesai_rutin[$i] = 9;
					}elseif($jam_kuliah[$i] == 2){
						$jam_mulai_rutin[$i] = 10;
						$jam_selesai_rutin[$i] = 11;
					}elseif($jam_kuliah[$i] == 3){
						$jam_mulai_rutin[$i] = 13;
						$jam_selesai_rutin[$i] = 14;
					}elseif($jam_kuliah[$i] == 4){
						$jam_mulai_rutin[$i] = 16;
						$jam_selesai_rutin[$i] = 16;
					}else{
						$jam_mulai_rutin[$i] = 19;
						$jam_selesai_rutin[$i] = 20;
					}
					for ($x = $jam_mulai_rutin[$i]; $x <= $jam_selesai_rutin[$i]; $x++){
						for ($y = $jam_mulai_pemakaian; $y <= $jam_selesai_pemakaian; $y++){
							if($x == $y){
								//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
								$result_rutin++;
								//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
							}
						}
					}
				}
				$i++;
			}

			$i=0;

			foreach ($ruang_jadwal as $jadwal) {
				$jam_kuliah[$i] = $jadwal->id_jam_kuliah;
				if($jam_kuliah[$i] == 1){
					$jam_mulai_rutin[$i] = 8;
					$jam_selesai_rutin[$i] = 9;
				}elseif($jam_kuliah[$i] == 2){
					$jam_mulai_rutin[$i] = 10;
					$jam_selesai_rutin[$i] = 11;
				}elseif($jam_kuliah[$i] == 3){
					$jam_mulai_rutin[$i] = 13;
					$jam_selesai_rutin[$i] = 14;
				}elseif($jam_kuliah[$i] == 4){
					$jam_mulai_rutin[$i] = 16;
					$jam_selesai_rutin[$i] = 16;
				}else{
					$jam_mulai_rutin[$i] = 19;
					$jam_selesai_rutin[$i] = 20;
				}
				for ($x = $jam_mulai_rutin[$i]; $x <= $jam_selesai_rutin[$i]; $x++){
					for ($y = $jam_mulai_pemakaian; $y <= $jam_selesai_pemakaian; $y++){
						if($x == $y){
							//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
							$result_jadwal++;
							echo $result_jadwal;
							//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
						}
					}
				}
				
				$i++;
			}

			if($result_rutin > 0 || $result_jadwal > 0){
				$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
				redirect('validator/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
			}else{ 
				$result_non_rutin=0;
				$ruang_non_rutin = $this->m_mahasiswa->get_data_cek_ruangan_non_rutin($tanggal_pemakaian,$id_ruangan_input);
				foreach ($ruang_non_rutin as $non_rutin) {
					$jam_mulai_peminjaman = $non_rutin->jam_mulai_peminjaman;
					$jam_selesai_peminjaman = $non_rutin->jam_selesai_peminjaman;
					for ($p = $jam_mulai_peminjaman; $p <= $jam_selesai_peminjaman; $p++){
						for ($q = $jam_mulai_pemakaian; $q <= $jam_selesai_pemakaian; $q++){
							if($p == $q){
								//echo "jam kuliah ".$i ."=". $jam_kuliah[$i]."x->".$x." // y->".$y;
								$result_non_rutin++;
								//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
							}
						}
					}
				}

				if($result_non_rutin > 0 ){
					$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
					redirect('validator/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
				}else{
					$id_jam_non_rutin=0;
					for($z = $jam_mulai_pemakaian; $z <= $jam_selesai_pemakaian; $z++){
						if($z==8 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=1;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==10 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=2;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==13 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=3;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==16 ){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=4;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}elseif($z==19){
							if($j_ruangan == 'rutin'){
								$id_jam_non_rutin=5;
							}else{
								$id_jam_non_rutin=0;
							}
							$data = array(
								'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
								'id_ruangan' => $id_ruangan_input,
								'id_peminjam' => $id_peminjam,
								'id_jam_kuliah' => $id_jam_non_rutin
							);
							$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
						}
					}
				}
				$this->session->set_flashdata('notif', "Sukses, Ruangan berhasil ditambahkan");
				redirect('validator/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
			}
		// }else{

		// }
	}

	function hapus_ruangan_peminjaman_khusus($id_peminjaman,$id_ruangan){
		$where = array('id_peminjaman_non_rutin' => $id_peminjaman, 'id_ruangan'=>$id_ruangan);
		$this->m_admin->hapus_data($where,'detail_peminjaman_non_rutin');
		$this->session->set_flashdata('notif', "Ruangan berhasil dihapus");
		redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id_peminjaman);
	}
	//
function get_option_penyelenggara(){
		$id=$this->input->post('id');
		$data=$this->m_mahasiswa->get_subkategori_kategori($id);
		echo json_encode($data);
	}
	
	function get_option_penyelenggara_akademik(){
		$id=$this->input->post('id');
		$data=$this->m_mahasiswa->get_subkategori_akademik($id);
		echo json_encode($data);
	
	}
	
	function ubah_status_peminjaman_non_rutin($jenis,$id_peminjaman,$id_peminjam){
		if($jenis == 1){
			$status = "terkirim";
			$data_non_rutin = array(
				'status' => $status
			);
			$data_peminjaman = array(
				'status_peminjaman' => $status
			);
			$where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
			$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
			$this->m_admin->update_data($where_non_rutin,$data_non_rutin,'peminjaman_non_rutin');
			$this->m_admin->update_data($where_peminjaman,$data_peminjaman,'peminjaman');
			$this->session->set_flashdata('notif', "SUKSES! Peminjaman Berhasil dikirim");
			redirect('validator/peminjaman_non_rutin/'.$id_peminjam);
		}else{
			$status = "dikirim";
			$data_non_rutin = array(
				'status' => $status
			);
			$data_peminjaman = array(
				'status_peminjaman' => $status
			);
			$where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
			$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
			$this->m_admin->update_data($where_non_rutin,$data_non_rutin,'peminjaman_non_rutin');
			$this->m_admin->update_data($where_peminjaman,$data_peminjaman,'peminjaman');
			$this->session->set_flashdata('notif', "SUKSES! Peminjaman Berhasil dikirim");
			redirect('validator/peminjaman_non_rutin/'.$id_peminjam);
		}
		
	}

	
	function inputPeminjamanBarang(){
		$data['mahasiswa'] = $this->m_admin->tampilBarang()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'validator/v_tambah_peminjaman_barang';		
		$this->load->view('template/template_validator',$data);
	}
	
	function tambahPeminjamanBarang(){
		$id_peminjam = $this->input->post('id_peminjam');
		$penyelenggara = $this->input->post('penyelenggara');
		$nama_agenda = $this->input->post('nama_agenda');
		$jam_mulai_peminjaman = $this->input->post('jam_mulai_peminjaman');
		$jam_selesai_peminjaman = $this->input->post('jam_selesai_peminjaman');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$keterangan = $this->input->post('keterangan');
		$status = "pending";
		$jenis_peminjaman = "barang";
		$status_pengembalian = "tidak";
		$kode_tgl = str_replace("-","",$tanggal_pemakaian);
		$random = (rand(10,99));
		$id_peminjaman_barang = $kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman."".$penyelenggara."".$random;
			$data_non_rutin = array(
				'id_peminjaman_barang' => $id_peminjaman_barang,
				'id_peminjam' => $id_peminjam,
				'penyelenggara' => $penyelenggara,
				'nama_agenda' => $nama_agenda,
				'jam_mulai' => $jam_mulai_peminjaman,
				'jam_selesai' => $jam_selesai_peminjaman,
				'tanggal_pemakaian' => $tanggal_pemakaian,
				'keterangan' => $keterangan,
				'status_pengembalian' => $status_pengembalian,
				'status' => $status
			);
			$data_pinjam = array(
				'id_peminjaman' => $id_peminjaman_barang,
				'id_peminjam' => $id_peminjam,
				'jenis_peminjaman' => $jenis_peminjaman,
				'status_peminjaman' => $status
			);
			$this->m_admin->tambahdata($data_non_rutin,'peminjaman_barang');
			$this->m_admin->tambahdata($data_pinjam,'peminjaman');
			$this->session->set_flashdata('notif', "Peminjaman barang berhasil dibuat, tambahkan barang yang akan digunakan untuk menyelesaikan proses peminjaman");
			redirect('validator/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		
	}

	function input_barang_peminjaman_barang($id_peminjaman_barang){
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['peminjaman_barang'] = $this->m_mahasiswa->get_peminjaman_barang_by_id($id_peminjaman_barang);
		$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_detail_peminjaman_barang_by_id($id_peminjaman_barang);
		$data['barang_bagus']=$this->m_mahasiswa->get_barang_bagus();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['peminjaman'] = $this->m_admin->getDataPeminjamanById($id_peminjaman_barang);
		$data['jenis_barang'] = $this->m_mahasiswa->get_jenis_barang(); 
		$data['main_view'] = 'validator/v_tambah_barang_peminjaman_barang';
		$this->load->view('template/template_validator',$data);
	}

	function get_subkategori(){
		$id=$this->input->post('id');
		$data=$this->m_mahasiswa->get_subkategori($id);
		echo json_encode($data);
	}

	function tambahBarangPeminjamanBarang(){
		$id_peminjaman_barang = $this->input->post('id_peminjaman_barang');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$id_peminjam = $this->session->userdata('username');
		$jam_mulai_pemakaian = $this->input->post('jam_mulai_pemakaian');
		$jam_selesai_pemakaian = $this->input->post('jam_selesai_pemakaian');
		$id_barang_input = $this->input->post('id_barang');
		$i=0;
		$result=0;
		$barang = $this->m_mahasiswa->get_data_cek_peminjaman_barang($tanggal_pemakaian,$id_barang_input);
		foreach ($barang as $b) {
			$start[$i] = $b->jam_mulai;
			$end[$i] = $b->jam_selesai;
			$id_barang[$i] = $b->id_barang;
			if($id_barang[$i] == $id_barang_input){
				
				for ($x = $start[$i]; $x < $end[$i]; $x++){
					for ($y = $jam_mulai_pemakaian; $y < $jam_selesai_pemakaian; $y++){
						if($x == $y){
							$result++;
						}
					}
				}
			}
			$i++;
		}

		if($result > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! Baraang Digunakan Sudah Tidak Dapat digunakan Pada Jam tersebut ");
			redirect('validator/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		}else{ 
			$data = array(
				'id_peminjaman_barang' => $id_peminjaman_barang,
				'id_peminjam' => $id_peminjam,
				'id_barang' => $id_barang_input
			);
			$this->m_admin->tambahdata($data,'detail_peminjaman_barang');
			$this->session->set_flashdata('notif', "Sukses, Barang berhasil ditambahkan ");
			redirect('validator/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		}
	}

	function hapus_barang_peminjaman_Barang($id_peminjaman,$id_detail){
		$where = array('id_detail_peminjaman_barang' => $id_detail);
		$this->m_admin->hapus_data($where,'detail_peminjaman_barang');
		$this->session->set_flashdata('notif', "Barang berhasil dihapus");
		redirect('validator/input_barang_peminjaman_barang/'.$id_peminjaman);
	}

	function ubah_status_peminjaman_barang($id_peminjaman,$id_peminjam){
		$status = "terkirim";
		$data_barang = array(
			'status' => $status
		);
		$data_peminjaman = array(
			'status_peminjaman' => $status
		);
		$where_barang = array('id_peminjaman_barang' => $id_peminjaman);
		$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
		$this->m_admin->update_data($where_barang,$data_barang,'peminjaman_barang');
		$this->m_admin->update_data($where_peminjaman,$data_peminjaman,'peminjaman');
		$this->session->set_flashdata('notif', "SUKSES! Peminjaman Berhasil dikirim");
		redirect('validator/peminjaman_barang/'.$id_peminjam);
		
	}
	
	
	function peta_ruangan_rutin_user(){
		$date = date("Y-m-d");
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_list_rutin';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->semester_akhir();
		$this->load->view('template/template_validator',$data);
	}

	function filter_peta_ruangan_user(){
		$date = $this->input->get('date');
		$day = date('l', strtotime($date));
		$status_semester = $this->m_admin->get_semester_by_date($date);
		foreach ($status_semester as $sem) {
			$tgl_mulai = $sem->tanggal_mulai;
			$tgl_selesai = $sem->tanggal_selesai;
			$start= str_replace("-","",$sem->tanggal_mulai);
			$end= str_replace("-","",$sem->tanggal_selesai);
			$tgl = str_replace("-","",$date);
			if($start <= $tgl && $end >= $tgl){
				$result= 'ada';
			}else{
				$result = 'kosong';
			}
		}
		$data['main_view'] = 'validator/v_list_rutin';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['semester'] = $this->m_admin->semester_akhir();
		$this->load->view('template/template_validator',$data);
	}
	
	function history_peminjaman(){
		$data['main_view'] = 'validator/v_history_peminjaman';
		$data['peminjaman'] = $this->Mvalidator->get_data_history_peminjam();
		$data['peminjaman_rutin'] = $this->Mvalidator->get_ruangan_peminjaman_rutin_by_peminjam();
		$data['detail_peminjaman_barang'] = $this->Mvalidator->get_barang_peminjaman_barang_by_peminjam();
		$data['detail_peminjaman_non_rutin'] = $this->Mvalidator->get_non_rutin_peminjaman_non_rutin_by_peminjam();
		$this->load->view('template/template_validator',$data);
	}

   
}
