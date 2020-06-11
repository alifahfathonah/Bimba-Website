<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mberita extends CI_Model {

	public function read(){
		$this->db->select('a.id_berita, a.judul_berita, a.slug_berita, a.meta_berita, a.foto_berita, a.thumb_berita, a.isi_berita, a.publish, a.dibuat, a.diubah, b.nama_admin, b.thumb_admin');
		$this->db->join('admin b', 'a.id_admin = b.id_admin');
		return $this->db->get('berita a');
	}

	public function read_by_id(){
		$this->db->select('a.id_berita, a.judul_berita, a.slug_berita, a.meta_berita, a.foto_berita, a.thumb_berita, a.isi_berita, a.publish, a.dibuat, a.diubah, b.nama_admin, b.thumb_admin');
		$this->db->join('admin b', 'a.id_admin = b.id_admin');
		return $this->db->get('berita a');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('berita');
	}

	public function read_where1($where, $limit, $offset){
		$this->db->where($where);
		return $this->db->get('berita', $limit, $offset);
	}

	public function read_like($where, $q, $limit, $offset){
		$this->db->where($where);
		$this->db->like('judul_berita', $q, 'BOTH');
		$this->db->like('isi_berita', $q, 'BOTH');
		return $this->db->get('berita', $limit, $offset);
	}

	public function insert($data){
		return $this->db->insert('berita', $data);
	}

	public function update($data, $id){
		$this->db->where('id_berita', $id);
		return $this->db->update('berita', $data);
	}

	public function delete($id){
		$this->db->where('id_berita', $id);
		return $this->db->delete('berita');
	}

}

/* End of file Mberita.php */
/* Location: ./application/models/Mberita.php */