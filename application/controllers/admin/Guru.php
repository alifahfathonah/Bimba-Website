<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mguru');
		admin();
	}

	public function index(){
		$x['title']		= "Guru - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mguru->read()->result();
		$this->load->view('admin/guru/index', $x);
	}

	public function aktifkan($id){
		if ($this->Mguru->update(array('aktif' => 1), $id)) {
			notif("Data berhasil diaktifkan", "s");
		}else{
			notif("Data gagal diaktifkan", "e");
		}
		redirect('admin/guru','refresh');
	}

	public function non_aktifkan($id){
		if ($this->Mguru->update(array('aktif' => 0), $id)) {
			notif("Data berhasil dinonaktifkan", "s");
		}else{
			notif("Data gagal dinonaktifkan", "e");
		}
		redirect('admin/guru','refresh');
	}

	public function delete($id){
		$data = $this->Mguru->read_where(array('id_guru' => $id))->row();
		if ($this->Mguru->delete($id)) {
			$path = "./files/guru/";
			unlink($path."source/".$data->foto_guru);
			unlink($path."thumb/".$data->thumb_guru);
			notif("Data berhasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/guru','refresh');
	}

	public function insert(){
		$nm_file = "guru_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/guru/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/guru/source/'.$data_upload['file_name'],
                    'new_image' => './files/guru/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'nama_guru'			=> $this->input->post('nama_guru'),
					'password_guru'		=> password_hash($this->input->post('password_guru'), PASSWORD_DEFAULT),
					'foto_guru'    		=> $data_upload['file_name'],
                    'thumb_guru'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'email_guru'		=> $this->input->post('email_guru'),
					'telepon_guru'		=> $this->input->post('telepon_guru'),
					'alamat_guru'		=> $this->input->post('alamat_guru')
				);
            }
        }
		if ($this->Mguru->insert($data)) {
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/guru','refresh');
	}

	public function update(){
		$nm_file = "guru_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/guru/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);
		$id_guru = $this->input->post('id_guru');
		

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/guru/source/'.$data_upload['file_name'],
                    'new_image' => './files/guru/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                if(empty($this->input->post('password'))){
					$data = array(
						'nama_guru'			=> $this->input->post('nama_guru'),
						'foto_guru'    		=> $data_upload['file_name'],
	                    'thumb_guru'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_guru'		=> $this->input->post('email_guru'),
						'telepon_guru'		=> $this->input->post('telepon_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru')
					);
				}else{
					$data = array(
						'nama_guru'			=> $this->input->post('nama_guru'),
						'password_guru'		=> password_hash($this->input->post('password_guru'), PASSWORD_DEFAULT),
						'foto_guru'    		=> $data_upload['file_name'],
	                    'thumb_guru'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_guru'		=> $this->input->post('email_guru'),
						'telepon_guru'		=> $this->input->post('telepon_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru')
					);
				}
				$x = $this->Mguru->read_where(array('id_guru' => $id_guru))->row();
				if ($this->Mguru->update($data, $id_guru)) {
					$path = "./files/guru/";
					unlink($path."source/".$x->foto_guru);
					unlink($path."thumb/".$x->thumb_guru);
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }else{
				if(empty($this->input->post('password'))){
					$data = array(
						'nama_guru'			=> $this->input->post('nama_guru'),
						'email_guru'		=> $this->input->post('email_guru'),
						'telepon_guru'		=> $this->input->post('telepon_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru')
					);
				}else{
					$data = array(
						'nama_guru'			=> $this->input->post('nama_guru'),
						'password_guru'		=> password_hash($this->input->post('password_guru'), PASSWORD_DEFAULT),
						'email_guru'		=> $this->input->post('email_guru'),
						'telepon_guru'		=> $this->input->post('telepon_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru')
					);
				}
				if ($this->Mguru->update($data, $id_guru)) {
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
			}
        }
		
		redirect('admin/guru','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x = $this->Mguru->read_where(array('id_guru' => $id))->row();
		$data = array(
			"id_guru"		=> $x->id_guru,
			"nama_guru"		=> $x->nama_guru,
			"email_guru"	=> $x->email_guru,
			"telepon_guru"	=> $x->telepon_guru,
			"alamat_guru"	=> $x->alamat_guru,
			"foto_guru"		=> base_url('files/guru/source/').$x->foto_guru,
			"thumb_guru"	=> base_url('files/guru/thumb/').$x->thumb_guru
		);
		echo json_encode($data);
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */