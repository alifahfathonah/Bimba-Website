<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Msertifikat');
	}

	public function data(){
		$id = $this->input->post('id');
		echo json_encode($this->Msertifikat->read_where(['id_siswa' => $id])->result());
	}

	public function delete(){
		$id = $this->input->post('id');
		$foto = $this->input->post('foto');
		$path_foto = "./files/sertifikat/";
		if ($this->Msertifikat->delete($id)) {
			unlink($path_foto.$foto);
			$response = array(
				'message'	=> "Foto berhasil dihapus"
			);
		}else{
			$response = array(
				'message'	=> "Foto gagal dihapus"
			);
		}

		echo json_encode($response);
	}

	public function insert(){
		$nm_file = "sertifikat_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/sertifikat/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);

		$id_siswa = $this->input->post('id_siswa');

		if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
            	$data_upload = $this->upload->data();
            	$data = array(
					'id_siswa'		=> $id_siswa,
					'keterangan'	=> $this->input->post('keterangan'),
					'sertifikat'    => $data_upload['file_name']
				);
				if ($this->Msertifikat->insert($data)) {
					$response = array(
						'message'	=> "Foto berhasil disimpan"
					);
				}else{
					$response = array(
						'message'	=> "Foto gagal disimpan"
					);
				}
            }else{
            	$response = array(
					'message'	=> "Foto gagal disimpan"
				);
            }
        }else{
        	$response = array(
				'message'	=> "Foto gagal disimpan"
			);
        }

        echo json_encode($response);
	}

}

/* End of file Sertifikat.php */
/* Location: ./application/controllers/admin/Sertifikat.php */