<?php 

class Validator extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_validator');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
		$this->load->model('m_mahasiswa');
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
		$data['main_view'] = 'validator/v_peta_jadwal_kuliah';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_validator',$data);
	}

	function agenda(){
		$date = date("Y-m-d");
		$data['main_view'] = 'validator/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_validator',$data);
	}

	function filter_jadwal_plot(){
		$date = $this->input->get('date');
		$data['main_view'] = 'validator/v_peta_jadwal_kuliah_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $date;
		$data['semester'] = $this->m_admin->tampilSemester()->result();
		$this->load->view('template/template_validator',$data);
	}

	function peta_ruangan_rutin(){
		$date = date("Y-m-d");
		$data['main_view'] = 'validator/v_peta_ruangan_rutin';
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
		$this->load->view('template/template_validator',$data);
	}

	function filter_peta_ruangan(){
		$date = $this->input->get('date');
		$data['main_view'] = 'validator/v_peta_ruangan_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_admin->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_admin->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_rutin_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['tgl_peminjaman'] = $date;
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
    
    function peminjaman(){
		$data['main_view'] = 'validator/v_list_peminjaman';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['mata_kuliah'] = $this->m_admin->tampilMatkul()->result();
		$data['peminjaman_rutin'] = $this->m_validator->get_all_data_peminjaman_rutin();
		$data['peminjaman_non_rutin'] = $this->m_validator->get_all_data_peminjaman_non_rutin();
		$data['peminjaman_non_rutins'] = $this->m_validator->get_all_data_peminjaman_non_rutins();
		$data['peminjaman_barang'] = $this->m_validator->get_all_data_peminjaman_barang();
		$data['peminjaman_barangs'] = $this->m_validator->get_all_data_peminjaman_barangs();
		$data['detail_peminjaman_barang'] = $this->m_validator->get_all_data_detail_peminjaman_barang();
		$data['detail_peminjaman_non_rutin'] = $this->m_validator->get_all_data_detail_peminjaman_non_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_rutin(){
		$data['main_view'] = 'validator/v_list_peminjaman_rutin';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['mata_kuliah'] = $this->m_admin->tampilMatkul()->result();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_rutin'] = $this->m_validator->get_all_data_peminjaman_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_non_rutin(){
		$data['main_view'] = 'validator/v_list_peminjaman_non_rutin';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_non_rutin'] = $this->m_validator->get_all_data_peminjaman_non_rutin();
		$data['peminjaman_non_rutins'] = $this->m_validator->get_all_data_peminjaman_non_rutins();
		$data['detail_peminjaman_non_rutin'] = $this->m_validator->get_all_data_detail_peminjaman_non_rutin();
		$this->load->view('template/template_validator',$data);
	}
    
    function peminjaman_barang(){
		$data['main_view'] = 'validator/v_list_peminjaman_barang';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_barang'] = $this->m_validator->get_all_data_peminjaman_barang();
		$data['peminjaman_barangs'] = $this->m_validator->get_all_data_peminjaman_barangs();
		$data['detail_peminjaman_barang'] = $this->m_validator->get_all_data_detail_peminjaman_barang();
		$this->load->view('template/template_validator',$data);
	}

	function peminjaman_khusus(){
		$data['main_view'] = 'validator/v_list_peminjaman_khusus';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman_khusus();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_non_rutin'] = $this->m_validator->get_all_data_peminjaman_khusus();
		$data['peminjaman_non_rutins'] = $this->m_validator->get_all_data_peminjaman_khususs();
		$data['detail_peminjaman_non_rutin'] = $this->m_validator->get_all_data_detail_peminjaman_non_rutin();
		$this->load->view('template/template_validator',$data);
	}

	function pengembalian_barang(){
		$data['main_view'] = 'validator/v_list_pengembalian_barang';
		$data['peminjaman'] = $this->m_validator->get_data_peminjaman();
		$data['mahasiswa'] = $this->m_admin->get_data_mahasiswa();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['peminjaman_barang'] = $this->m_validator->get_all_data_peminjaman_barang();
		$data['peminjaman_barangs'] = $this->m_validator->get_all_data_peminjaman_barangs();
		$data['detail_peminjaman_barang'] = $this->m_validator->get_all_data_detail_peminjaman_barang();
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
			$data['main_view'] = 'validator/v_detail_peminjaman_barang';
			$where = array('id_peminjaman_non_rutin' => $id);
			$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
			$this->load->view('template/template_validator',$data);
		}elseif($jenis == "khusus"){
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id);
			$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id);
			$data['main_view'] = 'validator/v_detail_peminjaman_non_rutin';
			$this->load->view('template/template_validator',$data);
		}else{
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id);
			$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id);
			$data['main_view'] = 'validator/v_detail_peminjaman_non_rutin';
			$this->load->view('template/template_validator',$data);
		}
	}

	
    function validasi($id_peminjaman,$status){
		$user_login = $this->session->userdata('status');
		$data = array(
            'status_peminjaman' => $status
        );
        $data_rutin = array(
            'status' => $status
        );
            
        $where = array('id_peminjaman' => $id_peminjaman);
        $where_rutin = array('id_peminjaman_rutin' => $id_peminjaman);
        $where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
        $where_barang = array('id_peminjaman_barang' => $id_peminjaman);

        $this->m_admin->update_data($where,$data,'peminjaman');
        $this->m_admin->update_data($where_rutin,$data_rutin,'peminjaman_rutin');
        $this->m_admin->update_data($where_non_rutin,$data_rutin,'peminjaman_non_rutin');
        $this->m_admin->update_data($where_barang,$data_rutin,'peminjaman_barang');
		$this->session->set_flashdata('notif', "SUKSES! Status peminjaman berhasil diganti menjadi $status");
		
		if($user_login == 'validator_rutin'){
			redirect('validator/peminjaman_rutin/');
		}else if($user_login == 'validator_non_rutin'){
			redirect('validator/peminjaman_non_rutin/');
		}else if($user_login == 'validator_khusus'){
			redirect('validator/peminjaman_khusus/');
		}else if($user_login == 'validator_barang'){
			redirect('validator/peminjaman_barang/');
		}else{
			redirect('validator/peminjaman/');
		}
	}

	function tolakPeminjaman(){
		$user_login = $this->session->userdata('status');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$catatan_penolakan = $this->input->post('catatan_penolakan');
		$status = "tolak";
        $data = array(
            'id_peminjaman' => $id_peminjaman,
            'catatan_penolakan' => $catatan_penolakan,
            'status_peminjaman' => $status
        );           
        $data_rutin = array(
            'id_peminjaman_rutin' => $id_peminjaman, 'status' => $status
        );              
        $data_non_rutin = array(
            'id_peminjaman_non_rutin' => $id_peminjaman, 'status' => $status
        );            
        $data_barang = array(
            'id_peminjaman_barang' => $id_peminjaman,'status' => $status
        );        
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
			redirect('validator/peminjaman_rutin/');
		}else if($user_login == 'validator_non_rutin'){
			redirect('validator/peminjaman_non_rutin/');
		}else if($user_login == 'validator_barang'){
			redirect('validator/peminjaman_barang/');
		}else if($user_login == 'validator_khusus'){
			redirect('validator/peminjaman_khusus/');
		}else{
			redirect('validator/peminjaman/');
		}

	}

	function set_kembali($id_peminjaman,$status){
		$user_login = $this->session->userdata('status');
		$data = array(
            'status_pengembalian' => $status
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
		$status="kembali";
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

		


   
}
