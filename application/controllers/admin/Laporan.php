<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpenilaian');
		$this->load->model('Msiswa');
	}

	public function index()
	{
		$x['title']		= "Laporan Penilaian - Admin ".get_webinfo()->nama_website;
		$x['dsiswa']	= $this->Msiswa->read()->result();
		$this->load->view('admin/laporan/index', $x);
	}

	public function penilaian(){
		$id_siswa = $this->input->post('id_siswa');
		$bulan = $this->input->post('bulan');
		if (empty($bulan) && empty($id_siswa)) {
			$x['bulan']	= "Semua Periode";
			$x['data']	= $this->Mpenilaian->read_where_laporan([])->result();
		}else if (empty($bulan) && !empty($id_siswa)) {
			$x['bulan']	= "Semua Periode";
			$x['data']	= $this->Mpenilaian->read_where_laporan(['a.id_siswa' => $id_siswa])->result();
		}else if (!empty($bulan) && empty($id_siswa)) {
			$x['bulan']	= "Periode ".bulan($bulan);
			$x['data']	= $this->Mpenilaian->read_where_laporan(['a.bulan' => $bulan])->result();
		}else if (!empty($bulan) && !empty($id_siswa)) {
			$x['bulan']	= "Periode ".bulan($bulan);
			$x['data']	= $this->Mpenilaian->read_where_laporan(['a.id_siswa' => $id_siswa, 'a.bulan' => $bulan])->result();
		}

		$this->load->view('admin/laporan/penilaian', $x);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */