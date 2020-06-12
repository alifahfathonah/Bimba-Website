<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msertifikat extends CI_Model {

	public function read(){
		return $this->db->get('sertifikat');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('sertifikat');
	}

	public function insert($data){
		return $this->db->insert('sertifikat', $data);
	}

	public function update($data, $id){
		$this->db->where('id_siswa', $id);
		return $this->db->update('sertifikat', $data);
	}

	public function delete($id){
		$this->db->where('id_sertifikat', $id);
		return $this->db->delete('sertifikat');
	}

	public function delete_siswa($id){
		$this->db->where('id_siswa', $id);
		return $this->db->delete('sertifikat');
	}

}

/* End of file Msertifikat.php */
/* Location: ./application/models/Msertifikat.php */