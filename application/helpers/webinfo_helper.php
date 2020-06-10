<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_webinfo')){
	function get_webinfo(){
		$ci =& get_instance();
		$ci->load->model('Minfo');

		$data = $ci->Minfo->read_where(array('aktif' => 1))->row();
		return $data;
	}
}

if ( ! function_exists('site_key')){
	function site_key(){
		return "6LdPCbkUAAAAADO73KtxYfMSBK5ffrKt5KVoPXRf";
	}
}

if ( ! function_exists('secret_key')){
	function secret_key(){
		return "6LdPCbkUAAAAAE30smSQVuEwKeaVa5ZBubGd3HYl";
	}
}