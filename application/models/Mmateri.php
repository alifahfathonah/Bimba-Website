<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmateri extends CI_Model {

	public function read(){
		return $this->db->get('materi');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('materi');
	}

	public function insert($data){
		return $this->db->insert('materi', $data);
	}

	public function update($data, $id){
		$this->db->where('id_materi', $id);
		return $this->db->update('materi', $data);
	}

	public function delete($id){
		$this->db->where('id_materi', $id);
		return $this->db->delete('materi');
	}

}

/* End of file Mmateri.php */
/* Location: ./application/models/Mmateri.php */