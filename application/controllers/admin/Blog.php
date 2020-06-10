<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mblog');
		admin();
	}

	public function data(){
		$x['title']		= "Blog - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mblog->read()->result();
		$this->load->view('admin/blog/index', $x);
	}

	public function tambah(){
		$x['title']		= "Tulis Blog - Admin ".get_webinfo()->nama_website;
		$this->load->view('admin/blog/form/tambah', $x);
	}

	public function edit($id){
		$x['title']		= "Tulis Blog - Admin ".get_webinfo()->nama_website;
		$x['data']		= $this->Mblog->read_where(array('id_blog' => $id))->row();
		$this->load->view('admin/blog/form/edit', $x);
	}

	public function publish($id){
		if ($this->Mblog->update(array('publish' => 1), $id)) {
			notif("Data berhasil dipublish", "s");
		}else{
			notif("Data gagal dipublish", "e");
		}
		redirect('admin/blog/data','refresh');
	}

	public function unpublish($id){
		if ($this->Mblog->update(array('publish' => 0), $id)) {
			notif("Data berhasil diunpublish", "s");
		}else{
			notif("Data gagal diunpublish", "e");
		}
		redirect('admin/blog/data','refresh');
	}

	public function delete($id){
		$data = $this->Mblog->read_where(array('id_blog' => $id))->row();
		if ($this->Mblog->delete($id)) {
			$path = "./files/blog/";
			unlink($path."source/".$data->foto_blog);
			unlink($path."thumb/".$data->thumb_blog);
			notif("Data berhasil dihapus", "s");
		}else{
			notif("Data gagal dihapus", "e");
		}
		redirect('admin/blog/data','refresh');
	}

	public function insert(){
		$nm_file = "blog_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/blog/source/'; //folder untuk meyimpan foto
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
                    'source_image' => './files/blog/source/'.$data_upload['file_name'],
                    'new_image' => './files/blog/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'judul_blog'		=> $this->input->post('judul_blog'),
					'slug_blog'			=> slug($this->input->post('judul_blog')),
					'foto_blog'    		=> $data_upload['file_name'],
                    'thumb_blog'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'meta_blog'			=> $this->input->post('meta_blog'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);
            }
        }
		if ($this->Mblog->insert($data)) {
			notif("Data berhasil disimpan", "s");
		}else{
			notif("Data gagal disimpan", "e");
		}
		redirect('admin/blog/data','refresh');
	}

	public function update(){
		$nm_file = "blog_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/blog/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
		$this->upload->initialize($config);
		$id_blog = $this->input->post('id_blog');

        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
        		//echo "Foto ada";
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/blog/source/'.$data_upload['file_name'],
                    'new_image' => './files/blog/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '40%',
                    'height' => '100',
                    'width' => '100'
                );

                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();

                $data = array(
					'judul_blog'		=> $this->input->post('judul_blog'),
					'slug_blog'			=> slug($this->input->post('judul_blog')),
					'foto_blog'    		=> $data_upload['file_name'],
                    'thumb_blog'		=> $nm_file.'_thumb'.$data_upload['file_ext'],
					'isi_blog'			=> $this->input->post('isi_blog'),
					'meta_blog'			=> $this->input->post('meta_blog'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);

				$x = $this->Mblog->read_where(array('id_blog' => $id_blog))->row();
				if ($this->Mblog->update($data, $id_blog)) {
					$path = "./files/blog/";
					unlink($path."source/".$x->foto_blog);
					unlink($path."thumb/".$x->thumb_blog);
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }else{
            	$data = array(
					'judul_blog'		=> $this->input->post('judul_blog'),
					'slug_blog'			=> slug($this->input->post('judul_blog')),
					'isi_blog'			=> $this->input->post('isi_blog'),
					'meta_blog'			=> $this->input->post('meta_blog'),
					'id_admin'			=> $this->session->userdata('id_admin')
				);
            	if ($this->Mblog->update($data, $id_blog)) {
					notif("Data berhasil disimpan", "s");
				}else{
					notif("Data gagal disimpan", "e");
				}
            }
        }
		redirect('admin/blog/data','refresh');
	}

	public function kcfinder(){
		$this->load->view('admin/blog/kcfinder');
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/admin/Blog.php */