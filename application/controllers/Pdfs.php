<?php
/**
 * Description of Pdfs Controller
 *
 * @author Web Preparations Team
 *
 * @email  webpreparations@gmail.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Pdfs extends CI_Controller {
	// construct
    public function __construct() {
        parent::__construct();
		// load model
        $this->load->model('Pdf', 'pdf');
		// load model
		$this->load->model('m_admin');
		$this->load->model('m_mahasiswa');
    }    
	 // show mobiles data
    public function index() {
        $data['page'] = 'export-pdf';
        $data['title'] = 'Export PDF data | Web Preparations';
        $data['mobiledata'] = $this->pdf->mobileList();
		// load view file for output
        $this->load->view('laporan/test', $data);
    }

// for generate pdf
	public function save_pdf()
	{ 
		//load mPDF library
		$this->load->library('m_pdf'); 
		//now pass the data//
		$data['mobiledata'] = $this->pdf->mobileList();
		$html=$this->load->view('laporan/test',$data, true); //load the pdf.php by passing our data and get all data in $html varriable.
		$pdfFilePath ="webpreparations-".time().".pdf";		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$stylesheet = '<style>'.file_get_contents('assets/styles/shards-dashboards.1.0.0.min.css').'</style>';
		// apply external css
		$pdf->WriteHTML($stylesheet,1);
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
		exit;
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
			$this->load->library('m_pdf'); 
			//now pass the data//
			$html=$this->load->view('laporan/cetak_peminjaman_rutin',$data, true); 
			$pdfFilePath ="peminjaman_rutin-".time().".pdf";		
		
		}elseif($jenis == "barang"){
			$where = array('id_peminjaman_barang' => $id_peminjaman);
			$data['peminjaman_barang'] = $this->m_admin->edit_data($where,'peminjaman_barang')->result();
			$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_detail_peminjaman_barang_by_id($id_peminjaman);

			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['barang'] = $this->m_admin->tampilBarang()->result();
			$data['ktu'] = $this->m_admin->get_data_ktu();
			//load mPDF library
			$this->load->library('m_pdf'); 
			//now pass the data//
			$html=$this->load->view('laporan/cetak_peminjaman_barang',$data, true); 
			$pdfFilePath ="peminjaman_sarpras-".time().".pdf";		

		}elseif($jenis == "non_rutin"){
			$where = array('id_peminjaman_non_rutin' => $id_peminjaman);
			$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
			$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman);

			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
			$this->load->library('m_pdf'); 
			
			//now pass the data//
			$html=$this->load->view('laporan/cetak_peminjaman_non_rutin',$data, true); 
			$pdfFilePath ="peminjaman_non_kelas-".time().".pdf";		
		
		}elseif($jenis == "khusus"){
			$where = array('id_peminjaman_non_rutin' => $id_peminjaman);
			$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
			$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman);

			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
			$this->load->library('m_pdf'); 
			
			//now pass the data//
			$html=$this->load->view('laporan/cetak_peminjaman_khusus',$data, true); 
			$pdfFilePath ="peminjaman_khusus-".time().".pdf";		
		}

		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		// apply external css
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
		exit;
	}

	public function save_pdf_peminjamans($id_peminjaman,$jenis){ 
		if($jenis == "rutin"){
			$where = array('id_peminjaman_rutin' => $id_peminjaman);
			$data['peminjaman_rutin'] = $this->m_admin->edit_data($where,'peminjaman_rutin')->result();
			$data['mata_kuliah'] = $this->m_admin->get_data_matakuliah();
			$data['jam_kuliah'] = $this->m_admin->tampilJamKuliah()->result();
			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['ktu'] = $this->m_admin->get_data_ktu();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['prodi'] = $this->m_admin->tampilProdi()->result();
			$data['semester'] = $this->m_admin->tampilSemester()->result();
			//load mPDF library
			$this->load->library('m_pdf'); 
			//now pass the data//
			$this->load->view('laporan/cetak_peminjaman_rutin',$data); //load the pdf.php by passing our data and get all data in $html varriable.
				
		
		}elseif($jenis == "barang"){
			$where = array('id_peminjaman_barang' => $id_peminjaman);
			$data['peminjaman_barang'] = $this->m_admin->edit_data($where,'peminjaman_barang')->result();
			$data['detail_peminjaman_barang'] = $this->m_mahasiswa->get_detail_peminjaman_barang_by_id($id_peminjaman);

			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['barang'] = $this->m_admin->tampilBarang()->result();
			$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
			$this->load->library('m_pdf'); 
			//now pass the data//
			$this->load->view('laporan/cetak_peminjaman_barang',$data); //load the pdf.php by passing our data and get all data in $html varriable.
				
		}elseif($jenis == "non_rutin"){
			$where = array('id_peminjaman_non_rutin' => $id_peminjaman);
			$data['peminjaman_non_rutin'] = $this->m_admin->edit_data($where,'peminjaman_non_rutin')->result();
			$data['detail_peminjaman_non_rutin'] = $this->m_mahasiswa->get_detail_peminjaman_non_rutin_by_id($id_peminjaman);

			$data['dosen'] = $this->m_admin->get_data_dosen();
			$data['mahasiswa'] = $this->m_admin->tampilMahasiswa()->result();
			$data['ruangan'] = $this->m_admin->get_data_ruangan_bagus();
			$data['jurusan'] = $this->m_admin->tampilJurusan()->result();
			$data['ktu'] = $this->m_admin->get_data_ktu();//load mPDF library
			$this->load->library('m_pdf'); 
			//now pass the data//
			$this->load->view('laporan/cetak_peminjaman_non_rutin',$data); //load the pdf.php by passing our data and get all data in $html varriable.
				
		}else{
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id);
		}

		
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
			//load mPDF library
			$this->load->library('m_pdf'); 
			//now pass the data//
			$data['mobiledata'] = $this->pdf->mobileList();
			$html=$this->load->view('laporan/test',$data, true); //load the pdf.php by passing our data and get all data in $html varriable.
			$pdfFilePath ="webpreparations-".time().".pdf";		
		
		}elseif($jenis == "barang"){
			redirect('mahasiswa/input_barang_peminjaman_barang/'.$id);
		}elseif($jenis == "khusus"){
			redirect('mahasiswa/input_ruangan_peminjaman_khusus/'.$id);
		}else{
			redirect('mahasiswa/input_ruangan_peminjaman_non_rutin/'.$id);
		}
	}
}
?>