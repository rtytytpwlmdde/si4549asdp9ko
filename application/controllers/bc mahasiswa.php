<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_admin');
		$this->load->model('m_jadwal');
	}

	function index(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_peta_jadwal_kuliah';
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
		$this->load->view('template/template_mahasiswa',$data);
	}

	function peta_jadwal_kuliah(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_peta_jadwal_kuliah';
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
		$this->load->view('template/template_mahasiswa',$data);
	}

	function agenda(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_list_agenda';
		$data['agenda'] = $this->m_admin->get_data_agenda($date);
		$data['ruangan_agenda'] = $this->m_admin->get_data_ruangan_agenda($date);
		$data['ruangan'] = $this->m_admin->tampilRuangan()->result();
		$data['date'] = $this->m_jadwal->get_last_date();
		$this->load->view('template/template_mahasiswa',$data);
	}

	function filter_jadwal_plot(){
		$date = $this->input->get('date');
		$data['main_view'] = 'mahasiswa/v_peta_jadwal_kuliah';
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
		$this->load->view('template/template_mahasiswa',$data);
	}

	function peta_ruangan(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_peta_ruangan';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['tgl_peminjaman'] = $date;
		$this->load->view('template/template_mahasiswa',$data);
	}

	function filter_peta_ruangan(){
		$date = $this->input->get('date');
		$data['main_view'] = 'mahasiswa/v_peta_ruangan_filter';
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['peminjaman_rutin'] = $this->m_mahasiswa->tampilPeminjamanRutinToDay($date);
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->tampilPeminjamanNonRutinToDay($date);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tanggal'] = $this->m_admin->get_data_tanggal_plot($date);
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['tgl_peminjaman'] = $date;
		$this->load->view('template/template_mahasiswa',$data);
	}
		
	//peminjaman rutin
	function inputPeminjamanRutin($date,$jam,$ruangan){
		$data['main_view'] = 'mahasiswa/v_tambah_peminjaman_rutin';
		$data['semester'] = $this->m_admin->semester_akhir();
		$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
		$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
		$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
		$data['prodi'] = $this->m_admin->tampilProdi()->result();
		$data['tgl_peminjaman'] = $date;
		$data['id_jam'] = $jam;
		$data['id_ruang'] = $ruangan;
		$this->load->view('template/template_mahasiswa',$data);
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
			redirect('mahasiswa/inputPeminjamanRutin/');
		}else{ 
			if($cek_non_rutin > 0 ){
				$this->session->set_flashdata('notif', "GAGAL! jadwal kuliah tersebut sudah terdaftar non rutin di sistem");
				redirect('mahasiswa/inputPeminjamanRutin/');
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
				redirect('mahasiswa/history_peminjaman/'.$id_peminjam);
			}
		}
	}

	

	function inputPeminjamanNonRutin(){
		$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'mahasiswa/v_tambah_peminjaman_ruang_non_rutin';		
		$this->load->view('template/template_mahasiswa',$data);
	}
	
	function tambahPeminjamanNonRutin(){
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
		$id_peminjaman_non_rutin = $kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman;
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
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
		
	}

	function input_ruangan_peminjaman_non_rutin($id_peminjaman_non_rutin){
		
		$data['ruangan'] = $this->m_mahasiswa->get_data_ruangan_rutin_non_rutin_tersedia();
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		
		//$data['ruangan_peminjaman_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_rutin($tgl);
		//$data['ruangan_peminjaman_non_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_non_rutin($tgl);
		
		$data['main_view'] = 'mahasiswa/v_tambah_ruangan_peminjaman_non_rutin';
		$this->load->view('template/template_mahasiswa',$data);
	}

	function tambahRuanganPeminjamanNonRutin(){
		$id_peminjaman_non_rutin = $this->input->post('id_peminjaman_non_rutin');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$jam_mulai_pemakaian = $this->input->post('jam_mulai_pemakaian');
		$jam_selesai_pemakaian = $this->input->post('jam_selesai_pemakaian');
		//$jam_mulai = explode(' ', $jam_mulai_pemakaian);
		//s$jam_selesai = explode(' ', $jam_selesai_pemakaian);
		$id_ruangan_input = $this->input->post('id_ruangan');
		$i=0;
		$jam_mulai_rutin[$i] = 0;
		$jam_selesai_rutin[$i] = 0;
		$result_rutin=0;
		$asd=0;
		$ruang_rutin = $this->m_mahasiswa->get_data_cek_ruangan_rutin($tanggal_pemakaian,$id_ruangan_input);
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

		if($result_rutin > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
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
							echo $p.",";
							//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
						}
					}
				}
			}

			if($result_non_rutin > 0 ){
				$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
				redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
			}else{
				$id_jam_non_rutin=0;
				for($z = $jam_mulai_pemakaian; $z <= $jam_selesai_pemakaian; $z++){
					if($z==8 ){
						$id_jam_non_rutin=1;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==10 ){
						$id_jam_non_rutin=2;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==13 ){
						$id_jam_non_rutin=3;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==16 ){
						$id_jam_non_rutin=4;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==19){
						$id_jam_non_rutin=5;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}
				}
			}
			$this->session->set_flashdata('notif', "Sukses, Ruangan berhasil ditambahkan");
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
		}
	}

	function hapus_ruangan_peminjaman_non_rutin($id_peminjaman,$id_ruangan){
		$where = array('id_peminjaman_non_rutin' => $id_peminjaman, 'id_ruangan'=>$id_ruangan);
		$this->m_admin->hapus_data($where,'detail_peminjaman_non_rutin');
		$this->session->set_flashdata('notif', "Ruangan berhasil dihapus");
		redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman);
	}

	// peminjaman khusus
	function inputPeminjamanKhusus(){
		$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'mahasiswa/v_tambah_peminjaman_khusus';		
		$this->load->view('template/template_mahasiswa',$data);
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
		$id_peminjaman_non_rutin = $kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman;
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
			redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
		
	}

	function input_ruangan_peminjaman_khusus($id_peminjaman_non_rutin){
		
		$data['ruangan'] = $this->m_mahasiswa->get_data_ruangan_tersedia();
		$data['peminjaman_non_rutin'] = $this->m_mahasiswa->get_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman_non_rutin);
		
		//$data['ruangan_peminjaman_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_rutin($tgl);
		//$data['ruangan_peminjaman_non_rutin'] = $this->m_mahasiswa->get_ruangan_peminjaman_non_rutin($tgl);
		
		$data['main_view'] = 'mahasiswa/v_tambah_ruangan_peminjaman_khusus';
		$this->load->view('template/template_mahasiswa',$data);
	}

	function tambahRuanganPeminjamanKhusus(){
		$id_peminjaman_non_rutin = $this->input->post('id_peminjaman_non_rutin');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
		$jam_mulai_pemakaian = $this->input->post('jam_mulai_pemakaian');
		$jam_selesai_pemakaian = $this->input->post('jam_selesai_pemakaian');
		//$jam_mulai = explode(' ', $jam_mulai_pemakaian);
		//s$jam_selesai = explode(' ', $jam_selesai_pemakaian);
		$id_ruangan_input = $this->input->post('id_ruangan');
		$i=0;
		$jam_mulai_rutin[$i] = 0;
		$jam_selesai_rutin[$i] = 0;
		$result_rutin=0;
		$asd=0;
		$ruang_rutin = $this->m_mahasiswa->get_data_cek_ruangan_rutin($tanggal_pemakaian,$id_ruangan_input);
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

		if($result_rutin > 0 ){
			$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
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
							echo $p.",";
							//echo ",jam kuliah ".$i ."=". $id_jadwal[$i]." x/y =".$x."/".$y."r".$id_ruangan[$i];
						}
					}
				}
			}

			if($result_non_rutin > 0 ){
				$this->session->set_flashdata('notif', "GAGAL! Ruangan Digunakan Sudah Digunakan Pada Jam tersebut ");
				redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman_non_rutin);
			}else{
				$id_jam_non_rutin=0;
				for($z = $jam_mulai_pemakaian; $z <= $jam_selesai_pemakaian; $z++){
					if($z==8 ){
						$id_jam_non_rutin=1;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==10 ){
						$id_jam_non_rutin=2;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==13 ){
						$id_jam_non_rutin=3;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==16 ){
						$id_jam_non_rutin=4;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}elseif($z==19){
						$id_jam_non_rutin=5;
						$data = array(
							'id_peminjaman_non_rutin' => $id_peminjaman_non_rutin,
							'id_ruangan' => $id_ruangan_input,
							'id_jam_kuliah' => $id_jam_non_rutin
						);
						$this->m_admin->tambahdata($data,'detail_peminjaman_non_rutin');
					}
				}
			}
			$this->session->set_flashdata('notif', "Sukses, Ruangan berhasil ditambahkan");
			redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id_peminjaman_non_rutin);
		}
	}

	function hapus_ruangan_peminjaman_khusus($id_peminjaman,$id_ruangan){
		$where = array('id_peminjaman_non_rutin' => $id_peminjaman, 'id_ruangan'=>$id_ruangan);
		$this->m_admin->hapus_data($where,'detail_peminjaman_non_rutin');
		$this->session->set_flashdata('notif', "Ruangan berhasil dihapus");
		redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id_peminjaman);
	}
	//

	function history_peminjaman($id){
		$data['main_view'] = 'mahasiswa/v_list_peminjaman';
		$data['peminjaman'] = $this->m_mahasiswa->get_data_history_peminjam($id);
		$data['mahasiswa'] = $this->m_mahasiswa->get_data_mahasiswa_peminjam($id);
		$data['dosen_peminjam'] = $this->m_mahasiswa->get_data_dosen_peminjam($id);
		$data['dosen'] = $this->m_admin->get_data_dosen();
		$this->load->view('template/template_mahasiswa',$data);
	}

	function detail_peminjaman($id,$jenis){
		if($jenis == "rutin"){
			$data['main_view'] = 'mahasiswa/v_detail_peminjaman_rutin';
			$where = array('id_peminjaman_rutin' => $id);
			$data['peminjaman_rutin'] = $this->m_admin->edit_data($where,'peminjaman_rutin')->result();
			$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['semester'] = $this->m_admin->tampilSemester()->result();
			$this->load->view('template/template_mahasiswa',$data);
		}elseif($jenis == "barang"){
			redirect('mahasiswa/input_barang_peminjaman_barang/'.$id);
		}elseif($jenis == "khusus"){
			redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id);
		}else{
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id);
		}
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
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id_peminjaman);
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
			redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id_peminjaman);
		}
		
	}

	function batal_peminjaman($id_peminjaman,$id_peminjam){
		$where_peminjaman = array('id_peminjaman' => $id_peminjaman);
		$where_rutin = array('id_peminjaman_rutin' => $id_peminjaman);
		$where_non_rutin = array('id_peminjaman_non_rutin' => $id_peminjaman);
		$where_barang = array('id_peminjaman_barang' => $id_peminjaman);
		$this->m_admin->hapus_data($where_peminjaman,'peminjaman');
		$this->m_admin->hapus_data($where_rutin,'peminjaman_rutin');
		$this->m_admin->hapus_data($where_barang,'peminjaman_barang');
		$this->m_admin->hapus_data($where_non_rutin,'peminjaman_non_rutin');
		$this->m_admin->hapus_data($where_non_rutin,'detail_peminjaman_non_rutin');
		$this->m_admin->hapus_data($where_barang,'detail_peminjaman_barang');
		$this->session->set_flashdata('notif', "Peminjaman $id_peminjaman berhasil dibatalkan");
		redirect('mahasiswa/history_peminjaman/'.$id_peminjam);
	}

//peminjaman barang
	function inputPeminjamanBarang(){
		$data['mahasiswa'] = $this->m_admin->tampilBarang()->result();
		$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
		$data['main_view'] = 'mahasiswa/v_tambah_peminjaman_barang';		
		$this->load->view('template/template_mahasiswa',$data);
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
		$status_pengembalian = "belum";
		$kode_tgl = str_replace("-","",$tanggal_pemakaian);
		$id_peminjaman_barang = "3".$kode_tgl."".$jam_mulai_peminjaman."".$jam_selesai_peminjaman;
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
			redirect('mahasiswa/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		
	}

	function input_barang_peminjaman_barang($id_peminjaman_barang){
		$data['barang'] = $this->m_admin->get_data_barang_bagus();
		$data['peminjaman_barang'] = $this->m_mahasiswa->get_peminjaman_barang_by_id($id_peminjaman_barang);
		$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_detail_peminjaman_barang_by_id($id_peminjaman_barang);
		$data['barang_bagus']=$this->m_mahasiswa->get_barang_bagus();
		$data['jenis_barang'] = $this->m_mahasiswa->get_jenis_barang(); 
		$data['main_view'] = 'mahasiswa/v_tambah_barang_peminjaman_barang';
		$this->load->view('template/template_mahasiswa',$data);
	}

	function get_subkategori(){
		$id=$this->input->post('id');
		$data=$this->m_mahasiswa->get_subkategori($id);
		echo json_encode($data);
	}

	function tambahBarangPeminjamanBarang(){
		$id_peminjaman_barang = $this->input->post('id_peminjaman_barang');
		$tanggal_pemakaian = $this->input->post('tanggal_pemakaian');
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
			redirect('mahasiswa/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		}else{ 
			$data = array(
				'id_peminjaman_barang' => $id_peminjaman_barang,
				'id_barang' => $id_barang_input
			);
			$this->m_admin->tambahdata($data,'detail_peminjaman_barang');
			$this->session->set_flashdata('notif', "Sukses, Barang berhasil ditambahkan ");
			redirect('mahasiswa/input_barang_peminjaman_barang/'.$id_peminjaman_barang);
		}
	}

	function hapus_barang_peminjaman_Barang($id_peminjaman,$id_detail){
		$where = array('id_detail_peminjaman_barang' => $id_detail);
		$this->m_admin->hapus_data($where,'detail_peminjaman_barang');
		$this->session->set_flashdata('notif', "Barang berhasil dihapus");
		redirect('mahasiswa/input_barang_peminjaman_barang/'.$id_peminjaman);
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
		redirect('mahasiswa/input_barang_peminjaman_barang/'.$id_peminjaman);
		
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

	function peta_sarpras(){
		$date = date("Y-m-d");
		$data['main_view'] = 'mahasiswa/v_peta_sarana_prasarana';
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['tgl_peminjaman'] = $date;
		$data['tanggal'] = $date;
		$this->load->view('template/template_mahasiswa',$data);
	}

	function filter_peta_sarpras(){
		$date = $this->input->get('date');
		$data['main_view'] = 'mahasiswa/v_peta_sarana_prasarana';
		$data['peminjaman_barang'] = $this->m_admin->get_data_peminjaman_barang($date);
		$data['barang'] = $this->m_admin->get_data_barang();
		$data['jenis_barang'] = $this->m_admin->tampilKategori()->result();
		$data['tanggal'] = $date;
		$this->load->view('template/template_mahasiswa',$data);
	}

   
}
