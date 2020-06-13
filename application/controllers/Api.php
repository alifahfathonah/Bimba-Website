<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mapi');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$x = $this->Mapi->auth($email);
		if ($x->num_rows() > 0) {
			$data = $x->row();
			if ($data->aktif == 1) {
				if (password_verify($password, $data->password_siswa)) {
					$res = [
						'code'	=> 1,
						'message'	=> "Login berhasil"
					];
				}else{
					$res = [
						'code'	=> 0,
						'message'	=> "Email dan kata sandi tidak sesuai"
					];
				}
			}else{
				$res = [
					'code'	=> 2,
					'message'	=> "Akun anda dinonaktifkan oleh admin"
				];
			}
		}else{
			$res = [
				'code'	=> 0,
				'message'	=> "Email dan kata sandi tidak sesuai"
			];
		}
		echo json_encode($res);
	}

	public function berita(){
		$x = $this->Mapi->berita()->result();
		$a = array();
		foreach ($x as $b) {
			$ar['id_berita']	= $b->id_berita;
			$ar['judul_berita']	= $b->judul_berita;
			$ar['slug_berita']	= $b->slug_berita;
			$ar['meta_berita']	= $b->meta_berita;
			$ar['foto_berita']	= base_url('files/berita/source/').$b->foto_berita;
			$ar['thumb_berita']	= base_url('files/berita/thumb/').$b->thumb_berita;
			$ar['isi_berita']	= $b->isi_berita;
			$ar['tanggal']		= tgl($b->dibuat);
			$ar['nama_admin']	= $b->nama_admin;

			array_push($a, $ar);
		}

		echo json_encode($a);
	}

	public function siswa($id){
		$b = $this->Mapi->siswa($id)->row();
		$ar['id_siswa']			= $b->id_siswa;
		$ar['nama_siswa']		= $b->nama_siswa;
		$ar['jk_siswa']			= $b->jk_siswa;
		$ar['tgl_lahir_siswa']	= tgl($b->tgl_lahir_siswa);
		$ar['alamat_siswa']		= $b->alamat_siswa;
		$ar['agama']			= $b->agama;
		$ar['nama_ayah']		= $b->nama_ayah;
		$ar['nama_ibu']			= $b->nama_ibu;
		$ar['email_siswa']		= $b->email_siswa;
		$ar['telepon_siswa']	= $b->telepon_siswa;
		$ar['foto_siswa']		= base_url('files/siswa/source/').$b->foto_siswa;
		$ar['thumb_siswa']		= base_url('files/siswa/thumb/').$b->thumb_siswa;
		$ar['nama_guru']		= $b->nama_guru;

		echo json_encode($ar);
	}

	public function penilaian($id){
		$x = $this->Mapi->penilaian($id)->result();
		$a['penilaian'] = array();
		$a['sertifikat'] = array();
		foreach ($x as $b) {
			$ar['id_penilaian']	= $b->id_penilaian;
			$ar['nama_siswa']	= $b->nama_siswa;
			$ar['nama_modul']	= $b->nama_modul;
			$ar['minggu']		= $b->minggu;
			$ar['bulan']		= bulan($b->bulan);
			$ar['nilai']		= $b->nilai;
			$ar['komentar']		= $b->komentar;

			array_push($a['penilaian'], $ar);
		}

		$s = $this->Mapi->sertifikat($id)->result();
		foreach ($s as $s) {
			$arr['sertifikat']	= base_url('files/sertifikat/').$s->sertifikat;

			array_push($a['sertifikat'], $arr);
		}

		echo json_encode($a);
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */