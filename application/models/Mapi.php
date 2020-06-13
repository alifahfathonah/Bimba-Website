<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapi extends CI_Model {

	public function auth($email){
		$this->db->where('email_siswa', $email);
		return $this->db->get('siswa');
	}

	public function berita(){
		$this->db->select('a.id_berita, a.judul_berita, a.slug_berita, a.meta_berita, a.foto_berita, a.thumb_berita, a.isi_berita, a.dibuat, b.nama_admin');
		$this->db->join('admin b', 'a.id_admin = b.id_admin');
		return $this->db->get('berita a');
	}

	public function siswa($id){
		$this->db->join('guru b', 'a.id_guru = b.id_guru');
		$this->db->where('a.id_siswa', $id);
		return $this->db->get('siswa a');
	}

	public function penilaian($id){
		$this->db->join('siswa b', 'a.id_siswa = b.id_siswa');
		$this->db->join('modul c', 'a.id_modul = c.id_modul');
		$this->db->where('a.id_siswa', $id);
		$this->db->order_by('a.bulan', 'asc');
		$this->db->order_by('a.minggu', 'asc');
		return $this->db->get('penilaian a');
	}

	public function sertifikat($id){
		$this->db->where('id_siswa', $id);
		return $this->db->get('sertifikat');
	}

}

/* End of file Mapi.php */
/* Location: ./application/models/Mapi.php */