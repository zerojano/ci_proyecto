<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('dropdown')){
	function dropdown( $year_ini ){

	if ( $year_ini ){
		$data['dropdown_list_year'][0] = 'Seleccionar año';
		for($i = $year_ini ; $i <= date('Y'); $i++){
			$data['dropdown_list_year'][$i] = $i;
		}
	}
	return $data['dropdown_list_year'];
	}

}