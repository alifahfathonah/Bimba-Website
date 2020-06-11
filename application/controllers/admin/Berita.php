<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mberita');
		admin();
	}

	public function data(){
		$x['title']		= "Berita - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mberita->read()->result();
		$this->load->view('admin/berita/index', $x);
	}

	public function tambah(){
		$x['title']		= "Tulis Berita - Admin ".get_webinfo()->nama_website;
		$this->load->view('admin/berita/form/tambah', $x);
	}

	public function edit($id){
		$x['title']		= "Tulis Berita - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mberita->read_where(array('id_berita' => $id))->row();
		$this->load->view('admin/berita/form/edit', $x);
	}

	public function publish($id){
		if ($this->Mberita->update(array('publish' => 1), $id)) {
			notif("Data berhasil dipublish", "s");
		}else{
			notif("Data gagal dipublish", "e");
		}
		redirect('admin/berita/data','refresh');
	}

	public function unpublish($id){
		if ($this->Mberita->update(array('publish' => 0), $id)) {
			notif("Data berhasil diunpublish", "s");
		}else{
			notif("Data gagal diunpublish", "e");
		}
		redirect('admin/berita/data','refresh');
	}

	public function delete($id){
		$data = $this->Mberita->read_where(array('id_berita' => $id))->row();
		if ($this->Mberita->delete($id)) {
			$path = "./files/berita/";
			unlink($path."source/".$data->foto_berita);
			unlink($path."thumb/".$data->thumb_berita);
			notif("Data berhasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/berita/data','refresh');
	}

	public function insert(){
		$nm_file = "blog_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/berita/source/'; //folder untuk meyimpan foto
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
                    'source_image' => './files/berita/source/'.$data_upload['file_name'],
                    'new_image' => './files/berita/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'judul_berita'		=> $this->input->post('judul_berita'),
					'slug_berita'			=> slug($this->input->post('judul_berita')),
					'foto_berita'    		=> $data_upload['file_name'],
                    'thumb_berita'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'meta_berita'			=> $this->input->post('meta_berita'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);
            }
        }
		if ($this->Mberita->insert($data)) {
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/berita/data','refresh');
	}

	public function update(){
		$nm_file = "blog_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/berita/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);
		$id_berita = $this->input->post('id_berita');

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/berita/source/'.$data_upload['file_name'],
                    'new_image' => './files/berita/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'judul_berita'		=> $this->input->post('judul_berita'),
					'slug_berita'			=> slug($this->input->post('judul_berita')),
					'foto_berita'    		=> $data_upload['file_name'],
                    'thumb_berita'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'isi_berita'			=> $this->input->post('isi_berita'),
					'meta_berita'			=> $this->input->post('meta_berita'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);

				$x = $this->Mberita->read_where(array('id_berita' => $id_berita))->row();
				if ($this->Mberita->update($data, $id_berita)) {
					$path = "./files/berita/";
					unlink($path."source/".$x->foto_berita);
					unlink($path."thumb/".$x->thumb_berita);
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }else{
            	$data = array(
					'judul_berita'		=> $this->input->post('judul_berita'),
					'slug_berita'			=> slug($this->input->post('judul_berita')),
					'isi_berita'			=> $this->input->post('isi_berita'),
					'meta_berita'			=> $this->input->post('meta_berita'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);
            	if ($this->Mberita->update($data, $id_berita)) {
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }
        }
		redirect('admin/berita/data','refresh');
	}

	public function kcfinder(){
		$this->load->view('admin/berita/kcfinder');
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */