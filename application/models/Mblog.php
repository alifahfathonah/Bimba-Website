<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mblog extends CI_Model {

	public function read(){
		$this->db->select('a.id_blog, a.judul_blog, a.slug_blog, a.meta_blog, a.foto_blog, a.thumb_blog, a.isi_blog, a.publish, a.dibuat, a.diubah, b.nama_admin, b.thumb_admin, (select count(id_blog) from blog_view where id_blog = a.id_blog) as counter');
		$this->db->join('admin b', 'a.id_admin = b.id_admin');
		return $this->db->get('blog a');
	}

	public function read_by_id(){
		$this->db->select('a.id_blog, a.judul_blog, a.slug_blog, a.meta_blog, a.foto_blog, a.thumb_blog, a.isi_blog, a.publish, a.dibuat, a.diubah, b.nama_admin, b.thumb_admin, (select count(id_blog) from blog_view where id_blog = a.id_blog) as counter');
		$this->db->join('admin b', 'a.id_admin = b.id_admin');
		return $this->db->get('blog a');
	}

	public function read_where($where){
		$this->db->where($where);
		return $this->db->get('blog');
	}

	public function read_where1($where, $limit, $offset){
		$this->db->where($where);
		return $this->db->get('blog', $limit, $offset);
	}

	public function read_like($where, $q, $limit, $offset){
		$this->db->where($where);
		$this->db->like('judul_blog', $q, 'BOTH');
		$this->db->like('isi_blog', $q, 'BOTH');
		return $this->db->get('blog', $limit, $offset);
	}

	public function insert($data){
		return $this->db->insert('blog', $data);
	}

	public function update($data, $id){
		$this->db->where('id_blog', $id);
		return $this->db->update('blog', $data);
	}

	public function delete($id){
		$this->db->where('id_blog', $id);
		return $this->db->delete('blog');
	}

}

/* End of file Mblog.php */
/* Location: ./application/models/Mblog.php */