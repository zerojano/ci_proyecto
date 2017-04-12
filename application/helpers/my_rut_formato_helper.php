<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_rut_formato')){
	function my_rut_formato($rut) {
		if ( $rut ) {
			return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1);
		}
	return $rut;
	}
}
