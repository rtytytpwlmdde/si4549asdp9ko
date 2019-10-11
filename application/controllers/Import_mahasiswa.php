<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_mahasiswa extends CI_Controller {
	private $filename = "import_data_mahasiswa"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('M_import_mahasiswa');
	}
	
	public function index(){
		$data['main_view'] = 'admin/view_mahasiswa';
		$data['mahasiswa'] = $this->M_import_mahasiswa->view();
		$this->load->view('template/template_admin', $data);
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->M_import_mahasiswa->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$data['main_view'] = 'admin/form_mahasiswa';
		$this->load->view('template/template_admin', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'nim'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'id_jurusan'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'id_prodi'=>$row['D'], 
					'telpon'=>$row['E'],
					'password'=>$row['F'],// Insert data jenis kelamin dari kolom D di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		
$this->M_import_mahasiswa->hilangkanPrimari($data);
		$this->M_import_mahasiswa->insert_multiple($data);
		$this->M_import_mahasiswa->hapusDataKosong(null);
		$this->M_import_mahasiswa->jadikanPrimari($data);
		
		
		redirect("Import_mahasiswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
