<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('notif')){
	function notif($notif, $type){
		$ci =& get_instance();
		$ci->session->set_flashdata('notif', $notif);
		$ci->session->set_flashdata('type', $type);
	}
}

if ( ! function_exists('admin')){
    function admin(){
        $ci =& get_instance();
        $id_admin = $ci->session->userdata('id_admin');
        $ci->load->model('Madmin');

        if (empty($id_admin)) {
            notif("Ups! Anda tidak memiliki hak akses untuk memasuki halaman ini", "i");
            redirect('admin/login','refresh');
        }else{
            $data = $ci->Madmin->read_where(array('id_admin' => $id_admin))->row();
            return $data;
        }
    }
}

if ( ! function_exists('slug')){
    function slug($judul){
        $string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $judul);
        $trim=trim($string);
        $pre_slug=strtolower(str_replace(" ", "-", $trim));
        return $slug=$pre_slug.'.html';
    }
}

if ( ! function_exists('ip')){
    function ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}