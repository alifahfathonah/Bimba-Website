<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmenu extends CI_Model {

	public function read(){
		return $this->db->get('menu');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('menu');
	}

	public function insert($data){
		return $this->db->insert('menu', $data);
	}

	public function update($data, $id){
		$this->db->where('id_menu', $id);
		return $this->db->update('menu', $data);
	}

	public function delete($id){
		$this->db->where('id_menu', $id);
		return $this->db->delete('menu');
	}

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */