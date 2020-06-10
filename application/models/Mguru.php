<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mguru extends CI_Model {

	public function read(){
		return $this->db->get('guru');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('guru');
	}

	public function insert($data){
		return $this->db->insert('guru', $data);
	}

	public function update($data, $id){
		$this->db->where('id_guru', $id);
		return $this->db->update('guru', $data);
	}

	public function delete($id){
		$this->db->where('id_guru', $id);
		return $this->db->delete('guru');
	}

}

/* End of file Mguru.php */
/* Location: ./application/models/Mguru.php */