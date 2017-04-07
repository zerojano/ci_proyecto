<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('my_msj_alert')){
	function my_msj_alert( $tipo, $titulo, $texto ){
	$msj = '';
	if ( $tipo ){
		if( $tipo == 'warning'){
		  $msj = '<div class="alert alert-'.$tipo.' alert-dismissable">';
		  $msj = $msj.'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		  $msj = $msj.'<strong>'.$titulo.'</strong> '.$texto ;
		  $msj = $msj.'</div>';
		}elseif( $tipo == 'success'){
		  $msj = '<div class="alert alert-'.$tipo.' alert-dismissable">';
		  $msj = $msj.'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		  $msj = $msj.'<strong>'.$titulo.'</strong> '.$texto ;
		  $msj = $msj.'</div>';
		}elseif( $tipo == 'info'){
		  $msj = '<div class="alert alert-'.$tipo.' alert-dismissable">';
		  $msj = $msj.'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		  $msj = $msj.'<strong>'.$titulo.'</strong> '.$texto ;
		  $msj = $msj.'</div>';
		}elseif( $tipo == 'danger'){
		  $msj = '<div class="alert alert-'.$tipo.' alert-dismissable">';
		  $msj = $msj.'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		  $msj = $msj.'<strong>'.$titulo.'</strong> '.$texto ;
		  $msj = $msj.'</div>';
		}
	}
	return $msj;
	}
}