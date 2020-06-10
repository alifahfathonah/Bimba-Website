<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function read(){
		return $this->db->get('admin');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('admin');
	}

	public function insert($data){
		return $this->db->insert('admin', $data);
	}

	public function update($data, $id){
		$this->db->where('id_admin', $id);
		return $this->db->update('admin', $data);
	}

	public function delete($id){
		$this->db->where('id_admin', $id);
		return $this->db->delete('admin');
	}

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */