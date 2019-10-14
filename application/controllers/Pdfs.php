<?php 

class Pdfs extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->model('m_mahasiswa');
    }
    
    public function save_pdf_peminjaman($id_peminjaman,$jenis){ 
			if($jenis == "rutin"){
				$where = array('id_peminjaman_rutin' => $id_peminjaman);
				$data['peminjaman_rutin'] = $this->m_admin->edit_data($where,'peminjaman_rutin')->result();
				$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
				$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
				$data['dosen'] = $this->m_admin->get_data_dosen();
				$data['ktu'] = $this->m_admin->get_data_ktu();
				$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
				$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
				$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
				$data['prodi'] = $this->m_admin->tampilProdi()->result();
				$data['semester'] = $this->m_admin->tampilSemester()->result();
				//load mPDF library
				$html=$this->load->view('laporan/cetak_peminjaman_rutin',$data); 
			
			}elseif($jenis == "barang"){
				$where = array('id_peminjaman_barang' => $id_peminjaman);
				$data['peminjaman_barang'] = $this->m_admin->edit_data($where,'peminjaman_barang')->result();
				$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_detail_peminjaman_barang_by_id($id_peminjaman);
	
				$data['dosen'] = $this->m_admin->get_data_dosen();
				$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
				$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
				$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
				$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
				$data['barang'] = $this->m_admin->tampilBarang()->result();
				$data['ktu'] = $this->m_admin->get_data_ktu();
				$html=$this->load->view('laporan/cetak_peminjaman_barang',$data); 
	
			}elseif($jenis == "non_rutin"){
				$where = array('id_peminjaman_non_rutin' => $id_peminjaman);
				$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
				$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman);
				$data['dosen'] = $this->m_admin->get_data_dosen();
				$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
				$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
				$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
				$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
				$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
				$html=$this->load->view('laporan/cetak_peminjaman_non_rutin',$data); 
			
			}elseif($jenis == "khusus"){
				$where = array('id_peminjaman_non_rutin' => $id_peminjaman);
				$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
				$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman);
	
				$data['dosen'] = $this->m_admin->get_data_dosen();
				$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
				$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
				$data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
				$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
				$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
				$this->load->library('m_pdf'); 
				
				//now pass the data//
				$html=$this->load->view('laporan/cetak_peminjaman_khusus',$data); 
			}
	
		}

		
	
}
