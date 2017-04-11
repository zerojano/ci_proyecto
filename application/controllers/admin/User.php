<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_user');
		$this->load->model('Model_users_activation');
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
		$registro = $this->input->post();
		$this->form_validation->set_rules('rut', '"Rut"', 'trim|required');
		$this->form_validation->set_rules('username', '"Usuario"', 'trim|required');
		$this->form_validation->set_rules('name', '"Nombre"', 'trim|required');
		$this->form_validation->set_rules('apellidos', '"Apellidos"', 'required');
		$this->form_validation->set_rules('email', '"E-mail"', 'required|valid_email');
        if ($this->form_validation->run() == FALSE){
            $this->create();
        }
        else{

        	$code = md5(date('Y-m-d H:i:s'));

        	$this->Model_user->insert($registro);

         	$this->Model_users_activation->insert( $this->db->insert_id(), $code );

        	$this->email($registro['email'], $code);

			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', '¡Modificación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has ingresado exitosamente el usuario <strong>'.$registro['nanme'].' '.$registro['apellidos'].'</strong>');

			$this->email();

			redirect('admin/user/view');
        }		
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

	public function email($email, $code){
		//$this->load->libreria('email');

		$link = base_url('activation/user/'.$code);

		$config['protocol'] = 'mail';
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from('contacto@infoplan.cl', 'Sistema');
		$this->email->to($email);
		$this->email->subject('Activación cuenta');
   
        $this->email->message('Se ha creado la cuenta<br>Para realizar la activación es necesario completar ultimo paso en el siguiente link<br><a href="'.$link.'">'.$link.'</a>');
					

        $this->email->send();
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */