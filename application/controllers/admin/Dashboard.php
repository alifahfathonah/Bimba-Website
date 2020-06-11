<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->model('Mberita');
		$this->load->model('Mguru');
		$this->load->model('Msiswa');
		admin();
	}

	public function index(){
		$x['title']		= "Dashboard - Admin ".get_webinfo()->nama_website;
		$x['t_admin']	= $this->Madmin->read()->num_rows();
		$x['t_blog']	= $this->Mberita->read()->num_rows();
		$x['t_guru']	= $this->Mguru->read()->num_rows();
		$x['t_siswa']	= $this->Msiswa->read()->num_rows();
		$this->load->view('admin/dashboard/index', $x);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */