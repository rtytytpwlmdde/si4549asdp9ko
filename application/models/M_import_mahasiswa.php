<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_import_mahasiswa extends CI_Model {
	public function view(){
		return $this->db->get('mahasiswa')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('mahasiswa', $data);
	}
	
	function hilangkanPrimari(){
		$query = $this->db->query("ALTER TABLE mahasiswa DROP PRIMARY KEY");
		
	}
	
	function jadikanPrimari(){
		$query = $this->db->query("ALTER TABLE mahasiswa ADD PRIMARY KEY(nim)");
		
	}
	
	function hapusDataKosong($id_nim){ //delete data berdasarkan nim
  $this->db->where('nim',$id_nim);
  $this->db->delete('mahasiswa'); //query delete data mahasiswa
 }
}
