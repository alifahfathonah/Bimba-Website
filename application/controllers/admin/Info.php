<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Minfo');
		admin();
	}

	public function index(){
		$x['title']		= "Info - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Minfo->read()->result();
		$this->load->view('admin/info/index', $x);
	}

	public function insert(){
		if ($this->Minfo->insert($this->input->post())) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/info','refresh');
	}

	public function update(){
		if ($this->Minfo->update($this->input->post(), $this->input->post('id_info'))) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/info','refresh');
	}

	public function delete($id){
		if ($this->Minfo->delete($id)) {
			notif("Data behasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/info','refresh');
	}

	public function aktifkan($id){
		if ($this->Minfo->update(array('aktif' => 1), $id)) {
			$this->Minfo->update_not(array('aktif' => 0), $id);
			notif("Data behasil diaktifkan", "s");
		}else{
			notif("Data gagal diaktifkan", "e");
		}
		redirect('admin/info','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x= $this->Minfo->read_where(array('id_info' => $id))->row();
		$data = array(
			"id_info"				=> $x->id_info,
		    "nama_website"			=> $x->nama_website,
		    "nama_singkat_website"	=> $x->nama_singkat_website,
		    "deskripsi"				=> $x->deskripsi,
		    "alamat"				=> $x->alamat,
		    "email"					=> $x->email,
		    "no_telepon"			=> $x->no_telepon,
		    "facebook"				=> $x->facebook,
		    "instagram"				=> $x->instagram,
		    "twitter"				=> $x->twitter
		);
		echo json_encode($data);
	}

}

/* End of file Info.php */
/* Location: ./application/controllers/admin/Info.php */