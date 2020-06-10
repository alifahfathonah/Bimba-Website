<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelas extends CI_Model {

	public function read(){
		$this->db->select('a.id_kelas, a.kode_kelas, a.nama_kelas, a.diubah, a.dibuat, b.thumb_guru, b.nama_guru, (select count(id_kelas) from materi where id_kelas = a.id_kelas) as materi');
		$this->db->join('guru b', 'a.id_guru = b.id_guru');
		return $this->db->get('kelas a');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('kelas');
	}

	public function insert($data){
		return $this->db->insert('kelas', $data);
	}

	public function update($data, $id){
		$this->db->where('id_kelas', $id);
		return $this->db->update('kelas', $data);
	}

	public function delete($id){
		$this->db->where('id_kelas', $id);
		return $this->db->delete('kelas');
	}

}

/* End of file Mkelas.php */
/* Location: ./application/models/Mkelas.php */