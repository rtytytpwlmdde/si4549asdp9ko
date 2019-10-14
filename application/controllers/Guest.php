<?php 

class Guest extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
		$this->load->model('Mvalidator');
		
	}

	function index(){
		redirect('guest/peta_jadwal_kuliah/');
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
		$data['main_view'] = 'guest/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
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
		$kategori = $this->input->get('kategori');
		$sub_kategori = $this->input->get('sub_kategori');
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
		$data['main_view'] = 'guest/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jadwal_kuliah'] = $this->m_admin->tampilJadwalKuliahToDay($day);
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['tanggal'] = $date;
		$data['status_jadwal'] = $result;
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_guest',$data);
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
		$data['main_view'] = 'guest/v_peta_ruangan_rutin';
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
		$data['main_view'] = 'guest/v_peta_ruangan_rutin';
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
		$data['penyelenggara']= $this->m_admin->tampilPenyelenggara()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_guest',$data);	
	}
	
	function list_agenda_akademik(){
		$date = date("Y-m-d");
		$data['main_view'] = 'guest/v_list_agenda_akademik';
		$data['agenda'] = $this->m_admin->get_data_agenda_akademik($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_guest',$data);	
	}

	function kodeboking(){
		$data['main_view'] = 'jadwal/v_kodeboking';
		$data['peminjaman'] = $this->m_admin->tampilReset()->result();
		$this->load->view('template/template_guest', $data);	
	}

	function peminjaman(){
		$id_peminjaman = $this->input->get('id_peminjaman');
		$cek = $this->m_admin->cek_ketersediaan_nip($id_peminjaman)->num_rows();
		if($cek < 0){
			$this->session->set_flashdata('notif', "Gagal - Kode Booking Tidak Ditemukan!");
			redirect('guest/kodeboking');
		}else{ 	 
			$data['peminjaman'] = $this->m_admin->get_data_pegawai_nip($id_peminjaman);
			$data['mahasiswa']=$this->m_admin->tampilPeminjamanMahasiswa($id_peminjaman);
			$data['dosen']=$this->m_admin->tampilPeminjamanPegawai($id_peminjaman);
			$data['peminjaman_rutin'] = $this->m_admin->rutin_kode($id_peminjaman);
			$data['peminjaman_non_rutin']=$this->m_admin->non_rutin_kode($id_peminjaman);
			$data['peminjaman_barang']=$this->m_admin->barang_kode($id_peminjaman);
			$data['main_view'] = 'guest/v_kode';
			$this->load->view('template/template_guest', $data);
		}
	}
function detail_peminjaman($id,$jenis){
		if($jenis == "rutin"){
			$data['main_view'] = 'guest/v_detail';
			$where = array('id_peminjaman_rutin' => $id);
			$data['peminjaman_rutin'] = $this->m_admin->edit_data($where,'peminjaman_rutin')->result();
			$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['semester'] = $this->m_admin->tampilSemester()->result();
			$this->load->view('template/template_guest',$data);
		}elseif($jenis == "barang"){
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['catatan'] = $this->m_admin->get_data_catatan($id);
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
			$data['pegawaiTelp']=$this->Mvalidator->get_telp_pegawai();
			$data['mahasiswaTelp']=$this->Mvalidator->get_telp_mahasiswa();
			$data['peminjaman_barang'] = $this->m_mahasiswa->get_peminjaman_barang_by_id($id);
			$data['catatan'] = $this->m_admin->get_data_catatan($id);
			$data['sarpras'] = $this->Mvalidator->get_ruangan_detail_barang_by_id($id);
			$data['main_view'] = 'guest/v_barang';
			$this->load->view('template/template_guest',$data);
		}elseif($jenis == "khusus"){
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['catatan'] = $this->m_admin->get_data_catatan($id);
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
			$data['main_view'] = 'guest/v_detail_non';
			$this->load->view('template/template_guest',$data);
		}else{
			$data['peminjaman'] = $this->Mvalidator->get_data_peminjaman();
			$data['catatan'] = $this->m_admin->get_data_catatan($id);
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
			$data['main_view'] = 'guest/v_detail_non';
			$this->load->view('template/template_guest',$data);
		}
	}
}
