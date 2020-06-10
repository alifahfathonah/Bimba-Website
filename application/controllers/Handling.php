<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function e404(){
		$this->load->view('errors/html/error_404');
	}

}

/* End of file Handling.php */
/* Location: ./application/controllers/Handling.php */