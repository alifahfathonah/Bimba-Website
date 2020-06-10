<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mkelas');
		admin();
	}

	public function index(){
		$this->load->model('Mguru');
		$x['title']		= "Kelas - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mkelas->read()->result();
		$x['dguru']		= $this->Mguru->read()->result();
		$this->load->view('admin/kelas/index', $x);
	}

	public function insert(){
		$this->load->helper('string');
		$data = [
			'nama_kelas'	=> $this->input->post('nama_kelas'),
			'id_guru'		=> $this->input->post('id_guru'),
			'kode_kelas'	=> random_string('alnum', 7)
		];
		if ($this->Mkelas->insert($data)) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/kelas','refresh');
	}

	public function update(){
		$data = [
			'nama_kelas'	=> $this->input->post('nama_kelas'),
			'id_guru'		=> $this->input->post('id_guru')
		];
		if ($this->Mkelas->update($data, $this->input->post('id_kelas'))) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/kelas','refresh');
	}

	public function delete($id){
		if ($this->Mkelas->delete($id)) {
			notif("Data behasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/kelas','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x= $this->Mkelas->read_where(array('id_kelas' => $id))->row();
		$data = array(
			"id_kelas"				=> $x->id_kelas,
		    "nama_kelas"			=> $x->nama_kelas,
		    "id_guru"				=> $x->id_guru
		);
		echo json_encode($data);
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/admin/Kelas.php */