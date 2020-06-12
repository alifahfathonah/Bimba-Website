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

	public function delete($id){
		$x = $this->Msertifikat->read_where(array('id_siswa' => $id))->row();
		if ($this->Msertifikat->delete_siswa($id)) {
			$path = "./files/sertifikat/";
			unlink($path.$x->sertifikat);
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/penilaian?id-siswa='.$id,'refresh');
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
            	if ($this->input->post('type') == "insert") {
            		$data = array(
						'id_siswa'		=> $id_siswa,
						'sertifikat'    => $data_upload['file_name']
					);
					if ($this->Msertifikat->insert($data)) {
						notif("Data berhasil disimpan", "s");
					}else{
						notif("Data gagal disimpan", "e");
					}
            	}else{
            		$data = array(
						'sertifikat'    => $data_upload['file_name']
					);
					$x = $this->Msertifikat->read_where(array('id_siswa' => $id_siswa))->row();
					if ($this->Msertifikat->update($data, $id_siswa)) {
						$path = "./files/sertifikat/";
						unlink($path.$x->sertifikat);
						notif("Data berhasil disimpan", "s");
					}else{
						notif("Data gagal disimpan", "e");
					}
            	}
            }else{
            	notif("Data berhasil disimpan", "s");
            }
        }else{
        	notif("Data berhasil disimpan", "s");
        }

        redirect('admin/penilaian?id-siswa='.$id_siswa,'refresh');
	}

}

/* End of file Sertifikat.php */
/* Location: ./application/controllers/admin/Sertifikat.php */