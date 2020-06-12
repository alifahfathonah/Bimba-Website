<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mmodul');
		admin();
	}

	public function index(){
		$x['title']		= "Modul - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mmodul->read()->result();
		$this->load->view('admin/modul/index', $x);
	}

	public function insert(){
		if ($this->Mmodul->insert($this->input->post())) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/modul','refresh');
	}

	public function update(){
		if ($this->Mmodul->update($this->input->post(), $this->input->post('id_modul'))) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/modul','refresh');
	}

	public function delete($id){
		if ($this->Mmodul->delete($id)) {
			notif("Data behasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/modul','refresh');
	}

	public function aktifkan($id){
		if ($this->Mmodul->update(array('aktif' => 1), $id)) {
			$this->Mmodul->update_not(array('aktif' => 0), $id);
			notif("Data behasil diaktifkan", "s");
		}else{
			notif("Data gagal diaktifkan", "e");
		}
		redirect('admin/modul','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x= $this->Mmodul->read_where(array('id_modul' => $id))->row();
		$data = array(
			"id_modul"				=> $x->id_modul,
		    "nama_modul"			=> $x->nama_modul,
		    "tipe_modul"			=> $x->tipe_modul
		);
		echo json_encode($data);
	}

}

/* End of file Modul.php */
/* Location: ./application/controllers/admin/Modul.php */