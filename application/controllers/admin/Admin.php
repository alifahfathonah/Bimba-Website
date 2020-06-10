<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Madmin');
		admin();
	}

	public function index(){
		$x['title']		= "Admin - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Madmin->read()->result();
		$this->load->view('admin/admin/index', $x);
	}

	public function aktifkan($id){
		if ($this->Madmin->update(array('status' => 1), $id)) {
			notif("Data berhasil diaktifkan", "s");
		}else{
			notif("Data gagal diaktifkan", "e");
		}
		redirect('admin/admin','refresh');
	}

	public function non_aktifkan($id){
		if ($this->Madmin->update(array('status' => 0), $id)) {
			notif("Data berhasil dinonaktifkan", "s");
		}else{
			notif("Data gagal dinonaktifkan", "e");
		}
		redirect('admin/admin','refresh');
	}

	public function delete($id){
		$data = $this->Madmin->read_where(array('id_admin' => $id))->row();
		if ($this->Madmin->delete($id)) {
			$path = "./files/admin/";
			unlink($path."source/".$data->foto_admin);
			unlink($path."thumb/".$data->thumb_admin);
			notif("Data berhasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/admin','refresh');
	}

	public function insert(){
		$nm_file = "admin_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/admin/source/'; //folder untuk meyimpan foto
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
                    'source_image' => './files/admin/source/'.$data_upload['file_name'],
                    'new_image' => './files/admin/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'nama_admin'		=> $this->input->post('nama_admin'),
					'username'			=> $this->input->post('username'),
					'password'			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'foto_admin'    	=> $data_upload['file_name'],
                    'thumb_admin'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'email_admin'		=> $this->input->post('email_admin'),
					'telp_admin'		=> $this->input->post('telp_admin'),
					'alamat_admin'		=> $this->input->post('alamat_admin')
				);
            }
        }
		if ($this->Madmin->insert($data)) {
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/admin','refresh');
	}

	public function update(){
		$nm_file = "admin_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/admin/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);
		$id_admin = $this->input->post('id_admin');
		

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/admin/source/'.$data_upload['file_name'],
                    'new_image' => './files/admin/thumb/'.$data_upload['file_name'],
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
						'nama_admin'		=> $this->input->post('nama_admin'),
						'username'			=> $this->input->post('username'),
						'foto_admin'    	=> $data_upload['file_name'],
						'thumb_admin'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_admin'		=> $this->input->post('email_admin'),
						'telp_admin'		=> $this->input->post('telp_admin'),
						'alamat_admin'		=> $this->input->post('alamat_admin')
					);
				}else{
					$data = array(
						'nama_admin'		=> $this->input->post('nama_admin'),
						'username'			=> $this->input->post('username'),
						'password'			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'foto_admin'    	=> $data_upload['file_name'],
						'thumb_admin'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_admin'		=> $this->input->post('email_admin'),
						'telp_admin'		=> $this->input->post('telp_admin'),
						'alamat_admin'		=> $this->input->post('alamat_admin')
					);
				}
				$x = $this->Madmin->read_where(array('id_admin' => $id_admin))->row();
				if ($this->Madmin->update($data, $id_admin)) {
					$path = "./files/admin/";
					unlink($path."source/".$x->foto_admin);
					unlink($path."thumb/".$x->thumb_admin);
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }else{
				if(empty($this->input->post('password'))){
					$data = array(
						'nama_admin'		=> $this->input->post('nama_admin'),
						'username'			=> $this->input->post('username'),
						'email_admin'		=> $this->input->post('email_admin'),
						'telp_admin'		=> $this->input->post('telp_admin'),
						'alamat_admin'		=> $this->input->post('alamat_admin')
					);
				}else{
					$data = array(
						'nama_admin'		=> $this->input->post('nama_admin'),
						'username'			=> $this->input->post('username'),
						'password'			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'email_admin'		=> $this->input->post('email_admin'),
						'telp_admin'		=> $this->input->post('telp_admin'),
						'alamat_admin'		=> $this->input->post('alamat_admin')
					);
				}
				if ($this->Madmin->update($data, $id_admin)) {
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
			}
        }
		
		redirect('admin/admin','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x = $this->Madmin->read_where(array('id_admin' => $id))->row();
		$data = array(
			"id_admin"		=> $x->id_admin,
			"nama_admin"	=> $x->nama_admin,
			"email_admin"	=> $x->email_admin,
			"telp_admin"	=> $x->telp_admin,
			"alamat_admin"	=> $x->alamat_admin,
			"username"		=> $x->username,
			"foto_admin"	=> base_url('files/admin/source/').$x->foto_admin,
			"thumb_admin"	=> base_url('files/admin/thumb/').$x->thumb_admin
		);
		echo json_encode($data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */