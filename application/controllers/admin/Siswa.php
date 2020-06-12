<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Msiswa');
		$this->load->model('Mguru');
		admin();
	}

	public function index(){
		$x['title']		= "Siswa - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Msiswa->read()->result();
		$x['dguru']		= $this->Mguru->read()->result();
		$this->load->view('admin/siswa/index', $x);
	}

	public function aktifkan($id){
		if ($this->Msiswa->update(array('aktif' => 1), $id)) {
			notif("Data berhasil diaktifkan", "s");
		}else{
			notif("Data gagal diaktifkan", "e");
		}
		redirect('admin/siswa','refresh');
	}

	public function non_aktifkan($id){
		if ($this->Msiswa->update(array('aktif' => 0), $id)) {
			notif("Data berhasil dinonaktifkan", "s");
		}else{
			notif("Data gagal dinonaktifkan", "e");
		}
		redirect('admin/siswa','refresh');
	}

	public function delete($id){
		$data = $this->Msiswa->read_where(array('id_siswa' => $id))->row();
		if ($this->Msiswa->delete($id)) {
			$path = "./files/siswa/";
			unlink($path."source/".$data->foto_siswa);
			unlink($path."thumb/".$data->thumb_siswa);
			notif("Data berhasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/siswa','refresh');
	}

	public function insert(){
		$nm_file = "siswa_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/siswa/source/'; //folder untuk meyimpan foto
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
                    'source_image' => './files/siswa/source/'.$data_upload['file_name'],
                    'new_image' => './files/siswa/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'nama_siswa'			=> $this->input->post('nama_siswa'),
					'password_siswa'		=> password_hash($this->input->post('password_siswa'), PASSWORD_DEFAULT),
					'foto_siswa'    		=> $data_upload['file_name'],
                    'thumb_siswa'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'email_siswa'		=> $this->input->post('email_siswa'),
					'telepon_siswa'		=> $this->input->post('telepon_siswa'),
					'nama_ayah'			=> $this->input->post('nama_ayah'),
					'nama_ibu'			=> $this->input->post('nama_ibu'),
					'agama'				=> $this->input->post('agama'),
					'tgl_lahir_siswa'	=> $this->input->post('tgl_lahir_siswa'),
					'alamat_siswa'		=> $this->input->post('alamat_siswa'),
					'id_guru'			=> $this->input->post('id_guru')
				);
            }
        }
		if ($this->Msiswa->insert($data)) {
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/siswa','refresh');
	}

	public function update(){
		$nm_file = "siswa_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/siswa/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);
		$id_siswa = $this->input->post('id_siswa');
		

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/siswa/source/'.$data_upload['file_name'],
                    'new_image' => './files/siswa/thumb/'.$data_upload['file_name'],
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
						'nama_siswa'			=> $this->input->post('nama_siswa'),
						'foto_siswa'    		=> $data_upload['file_name'],
	                    'thumb_siswa'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_siswa'		=> $this->input->post('email_siswa'),
						'telepon_siswa'		=> $this->input->post('telepon_siswa'),
						'nama_ayah'			=> $this->input->post('nama_ayah'),
						'nama_ibu'			=> $this->input->post('nama_ibu'),
						'agama'				=> $this->input->post('agama'),
						'tgl_lahir_siswa'	=> $this->input->post('tgl_lahir_siswa'),
						'alamat_siswa'		=> $this->input->post('alamat_siswa'),
						'id_guru'			=> $this->input->post('id_guru')
					);
				}else{
					$data = array(
						'nama_siswa'			=> $this->input->post('nama_siswa'),
						'password_siswa'		=> password_hash($this->input->post('password_siswa'), PASSWORD_DEFAULT),
						'foto_siswa'    		=> $data_upload['file_name'],
	                    'thumb_siswa'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
						'email_siswa'		=> $this->input->post('email_siswa'),
						'telepon_siswa'		=> $this->input->post('telepon_siswa'),
						'nama_ayah'			=> $this->input->post('nama_ayah'),
						'nama_ibu'			=> $this->input->post('nama_ibu'),
						'agama'				=> $this->input->post('agama'),
						'tgl_lahir_siswa'	=> $this->input->post('tgl_lahir_siswa'),
						'alamat_siswa'		=> $this->input->post('alamat_siswa'),
						'id_guru'			=> $this->input->post('id_guru')
					);
				}
				$x = $this->Msiswa->read_where(array('id_siswa' => $id_siswa))->row();
				if ($this->Msiswa->update($data, $id_siswa)) {
					$path = "./files/siswa/";
					unlink($path."source/".$x->foto_siswa);
					unlink($path."thumb/".$x->thumb_siswa);
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }else{
				if(empty($this->input->post('password'))){
					$data = array(
						'nama_siswa'			=> $this->input->post('nama_siswa'),
						'email_siswa'		=> $this->input->post('email_siswa'),
						'telepon_siswa'		=> $this->input->post('telepon_siswa'),
						'nama_ayah'			=> $this->input->post('nama_ayah'),
						'nama_ibu'			=> $this->input->post('nama_ibu'),
						'agama'				=> $this->input->post('agama'),
						'tgl_lahir_siswa'	=> $this->input->post('tgl_lahir_siswa'),
						'alamat_siswa'		=> $this->input->post('alamat_siswa'),
						'id_guru'			=> $this->input->post('id_guru')
					);
				}else{
					$data = array(
						'nama_siswa'			=> $this->input->post('nama_siswa'),
						'password_siswa'		=> password_hash($this->input->post('password_siswa'), PASSWORD_DEFAULT),
						'email_siswa'		=> $this->input->post('email_siswa'),
						'telepon_siswa'		=> $this->input->post('telepon_siswa'),
						'nama_ayah'			=> $this->input->post('nama_ayah'),
						'nama_ibu'			=> $this->input->post('nama_ibu'),
						'agama'				=> $this->input->post('agama'),
						'tgl_lahir_siswa'	=> $this->input->post('tgl_lahir_siswa'),
						'alamat_siswa'		=> $this->input->post('alamat_siswa'),
						'id_guru'			=> $this->input->post('id_guru')
					);
				}
				if ($this->Msiswa->update($data, $id_siswa)) {
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
			}
        }
		
		redirect('admin/siswa','refresh');
	}

	public function data(){
		$id = $this->input->post('id');
		$x = $this->Msiswa->read_where(array('id_siswa' => $id))->row();
		$data = array(
			"id_siswa"		=> $x->id_siswa,
			"nama_siswa"		=> $x->nama_siswa,
			"email_siswa"	=> $x->email_siswa,
			"telepon_siswa"	=> $x->telepon_siswa,
			"nama_ayah"	=> $x->nama_ayah,
			"nama_ibu"	=> $x->nama_ibu,
			"agama"	=> $x->agama,
			"tgl_lahir_siswa"	=> $x->tgl_lahir_siswa,
			"alamat_siswa"	=> $x->alamat_siswa,
			"id_guru"	=> $x->id_guru,
			"foto_siswa"		=> base_url('files/siswa/source/').$x->foto_siswa,
			"thumb_siswa"	=> base_url('files/siswa/thumb/').$x->thumb_siswa
		);
		echo json_encode($data);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/admin/Siswa.php */