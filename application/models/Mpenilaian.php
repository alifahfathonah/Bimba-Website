<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenilaian extends CI_Model {

	public function read($id_siswa){
		$this->db->join('siswa b', 'a.id_siswa = b.id_siswa');
		$this->db->join('modul c', 'a.id_modul = c.id_modul');
		$this->db->where('a.id_siswa', $id_siswa);
		$this->db->order_by('c.tipe_modul', 'asc');
		$this->db->order_by('a.bulan', 'asc');
		$this->db->order_by('a.minggu', 'asc');
		return $this->db->get('penilaian a');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('penilaian');
	}

	public function insert($data){
		return $this->db->insert('penilaian', $data);
	}

	public function update($data, $id){
		$this->db->where('id_penilaian', $id);
		return $this->db->update('penilaian', $data);
	}

	public function delete($id){
		$this->db->where('id_penilaian', $id);
		return $this->db->delete('penilaian');
	}

}

/* End of file Mpenilaian.php */
/* Location: ./application/models/Mpenilaian.php */