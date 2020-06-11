<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmodul extends CI_Model {

	public function read(){
		return $this->db->get('modul');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('modul');
	}

	public function insert($data){
		return $this->db->insert('modul', $data);
	}

	public function update($data, $id){
		$this->db->where('id_modul', $id);
		return $this->db->update('modul', $data);
	}

	public function delete($id){
		$this->db->where('id_modul', $id);
		return $this->db->delete('modul');
	}

}

/* End of file Mmodul.php */
/* Location: ./application/models/Mmodul.php */