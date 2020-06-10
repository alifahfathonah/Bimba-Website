<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('x')){
	function x($s){
		return htmlentities($s, ENT_QUOTES, 'UTF-8');
	}
}

if ( ! function_exists('initial')){
	function initial($s){
		$words = explode(" ", $s);
		$acronym = "";

		foreach ($words as $w) {
			$acronym .= $w[0];
		}
		return $acronym;
	}
}