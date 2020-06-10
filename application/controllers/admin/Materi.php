<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mmateri');
		$this->load->model('Mkelas');
		admin();
	}

	public function index(){
		$x['title']		= "Materi - Admin ".get_webinfo()->nama_website;

		$id_kelas = $this->input->get('id-kelas');
		if (empty($id_kelas)) {
			$x['data']		= $this->Mmateri->read()->result();
		}else{
			$x['data']		= $this->Mmateri->read_where(['id_kelas' => $id_kelas])->result();
		}
		$x['kls']		= $this->Mkelas->read()->result();
		$this->load->view('admin/materi/index', $x);
	}

	public function insert(){
		if ($this->Mmateri->insert($this->input->post())) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		echo "<script>history.back()</script>";
	}

	public function update(){
		if ($this->Mmateri->update($this->input->post(), $this->input->post('id_materi'))) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		echo "<script>history.back()</script>";
	}

	public function delete($id){
		if ($this->Mmateri->delete($id)) {
			notif("Data behasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		echo "<script>history.back()</script>";
	}

	public function data(){
		$id = $this->input->post('id');
		$x= $this->Mmateri->read_where(array('id_materi' => $id))->row();
		$data = array(
			"id_materi"				=> $x->id_materi,
		    "id_kelas"				=> $x->id_kelas,
		    "nama_materi"			=> $x->nama_materi,
		    "deskripsi_materi"		=> $x->deskripsi_materi,
		    "link_materi"			=> $x->link_materi,
		    "tipe_materi"			=> $x->tipe_materi
		);
		echo json_encode($data);
	}

}

/* End of file Materi.php */
/* Location: ./application/controllers/admin/Materi.php */