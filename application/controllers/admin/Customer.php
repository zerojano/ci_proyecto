<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_customers');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/customer/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Administración de clientes <small>registro</small> </h3>';
			$data['migajas'] = '<li><a href="#"><i class="fa fa-dashboard">
					</i> Administración</a></li>
		            <li class="active">Clientes</li>
		            <li class="#">Todos</li>';
			$data['contenido'] = 'admin/customer/view';
			$data['user'] = $this->Model_customers->all();
			$this->load->view('template-home',$data);
		//}else{
		//	redirect('login');
		//}
	}
	public function create() {
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title'] = '<h3>Crea usuario <small>registro</small> </h3>';
				$data['migajas'] = '<li><a href="#"><i class="fa fa-dashboard">
				</i> Administración</a></li>
				<li><a href="#">Usuarios</a></li>
	            <li class="active">Agregar</li>';
				$data['contenido'] = 'admin/user/create';
				$data['title-form'] = 'Crear usuario';
				$data['boton'] = 'Crear usuario';
				$this->load->view('template-home', $data);
			//}else{
			//	$this->session->set_flashdata('msg_tipo', 'warning');
			//	$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
			//	$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
			//	redirect('home');
			//}
		//}else{
		//	redirect('login');
		//}
	}
	public function insert(){
		
	}
	public function edit($id){
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title'] = '<h3>Crea usuario <small>registro</small> </h3>';
				$data['migajas'] = '<li><a href="#"><i class="fa fa-dashboard">
				</i> Administración</a></li>
				<li><a href="#">Usuarios</a></li>
	            <li class="active">Agregar</li>';
				$data['contenido'] = 'admin/user/edit';
				$data['title-form'] = 'Modificar usuario';
				$data['user'] = $this->Model_customers->find($id);
				$data['boton'] = 'Crear usuario';
				$this->load->view('template-home', $data);
			//}else{
			//	$this->session->set_flashdata('msg_tipo', 'warning');
			//	$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
			//	$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
			//	redirect('home');
			//}
		//}else{
		//	redirect('login');
		//}		

	}
	public function update(){

	}
	public function delete(){

	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */