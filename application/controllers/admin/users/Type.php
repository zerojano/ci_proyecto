<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_users_type');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/user/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Tipo usuarios <small>registro</small> </h3>';
			$data['migajas'] = '<li><a href="#"><i class="fa fa-dashboard">
					</i> Administración</a></li>
		            <li class="active">Usuarios</li>
		            <li class="#">Todos</li>';
			$data['contenido'] = 'admin/user/type/view';
			$data['type'] = $this->Model_users_type->all('ACS');
			$this->load->view('template-home',$data);
		//}else{
		//	redirect('login');
		//}
	}
}

/* End of file Type.php */
/* Location: ./application/controllers/admin/users/Type.php */