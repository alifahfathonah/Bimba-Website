<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mpenilaian');
		$this->load->model('Msiswa');
		$this->load->model('Mmodul');
		admin();
	}

	public function index(){
		$id_siswa = $this->input->get_post('id-siswa');
		$x['title']		= "Penilaian - Admin ".get_webinfo()->nama_website;
		if (empty($id_siswa)) {
			$x['data']		= array();
		}else{
			$x['data']		= $this->Mpenilaian->read($id_siswa)->result();
		}
		$x['dsiswa']	= $this->Msiswa->read()->result();
		$x['dmodul']	= $this->Mmodul->read()->result();
		$this->load->view('admin/penilaian/index', $x);
	}

	public function insert(){
		if ($this->Mpenilaian->insert($this->input->post())) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/penilaian?id-siswa='.$this->input->post('id_siswa'),'refresh');
	}

	public function update(){
		if ($this->Mpenilaian->update($this->input->post(), $this->input->post('id_penilaian'))) {
			notif("Data behasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/penilaian?id-siswa='.$this->input->post('id_siswa'),'refresh');
	}

	public function delete($id){
		if ($this->Mpenilaian->delete($id)) {
			notif("Data behasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		echo "<script>history.back()</script>";
	}

	public function data(){
		$id = $this->input->post('id');
		$x= $this->Mpenilaian->read_where(array('id_penilaian' => $id))->row();
		$data = array(
			"id_penilaian"				=> $x->id_penilaian,
		    "id_siswa"			=> $x->id_siswa,
		    "id_modul"			=> $x->id_modul,
		    "minggu"			=> $x->minggu,
		    "bulan"			=> $x->bulan,
		    "nilai"			=> $x->nilai,
		    "komentar"			=> $x->komentar
		);
		echo json_encode($data);
	}

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/admin/Penilaian.php */