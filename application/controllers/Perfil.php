<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->library('usuarioLib');
		//$this->load->library('user_agent');
		$this->load->model('Model_perfil');
		$this->load->model('Model_log_access');
		//this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		//$this->form_validation->set_message('loginok', 'Usuario o contraseña incorrecta.');
		//$this->form_validation->set_message('matches', '%s no coincide con %s');
		//$this->form_validation->set_message('cambiook', 'No se puede realizar el cambio de clave');
	}
	public function index()
	{
		if( $this->session->userdata('id') ){
			$data['contenido'] = 'perfil/view';
			$data['perfil'] = $this->Model_perfil->find();
			$data['latest_access'] = $this->Model_log_access->find( $this->session->userdata('id'), 'DESC' );
			$this->load->view('template-home', $data);
		}else{
			redirect('login');
		}	
	}
	public function edit(){

	}
	public function update(){

	}

}

/* End of file Perfil.php */
/* Location: ./application/controllers/Perfil.php */