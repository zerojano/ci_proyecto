<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_user');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		if( $this->session->userdata('id') ){
			$data['contenido'] = 'admin/user/view';
			$this->load->view('template-home',$data);
		}else{
			redirect('login');
		}		
	}
	public function view()
	{
		if( $this->session->userdata('id') ){
			/*Configuración titulos*/
			$data['title_ppal'] = 'Administración de usuarios ';
			$data['title_subt'] = 'registro';	
			$data['title_btn_submit'] = 'Nuevo usuario';
			$data['contenido'] = 'admin/user/view';
			$data['user'] = $this->Model_user->all('ACS');
			$this->load->view('template-home',$data);
		}else{
			redirect('login');
		}
	}
	public function create() {
		if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title'] = '<h3>Crea usuario <small>registro</small> </h3>';
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
		}else{
			redirect('login');
		}
	}
	public function insert(){
		
	}
	public function edit($id){
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title'] = '<h3>Crea usuario <small>registro</small> </h3>';
				$data['contenido'] = 'admin/user/edit';
				$data['title-form'] = 'Modificar usuario';
				$data['user'] = $this->Model_users->find($id);
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