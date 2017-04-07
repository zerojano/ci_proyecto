<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_cars_brand');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/cars/brand/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Administración modelos autos <small>registro</small> </h3>';
			$data['migajas'] = '<li><a href="#"><i class="fa fa-dashboard">
					</i> Administración</a></li>
		            <li class="active">Usuarios</li>
		            <li class="#">Todos</li>';
			$data['contenido'] = 'admin/cars/brand/view';
			$data['type'] = $this->Model_cars_brand->all('ACS');
			$this->load->view('template-home',$data);
		//}else{
		//	redirect('login');
		//}
	}
}

/* End of file Brand.php */
/* Location: ./application/controllers/admin/cars/Brand.php */