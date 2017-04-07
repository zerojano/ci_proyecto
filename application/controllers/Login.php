<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('usuarioLib');
		$this->load->library('user_agent');
		$this->load->model('Model_user');
		$this->load->model('Model_log_access');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('loginok', 'Usuario o contraseña incorrecta.');
		//$this->form_validation->set_message('matches', '%s no coincide con %s');
		//$this->form_validation->set_message('cambiook', 'No se puede realizar el cambio de clave');
	}
	public function index(){
		$data['contenido'] = 'login/form';
		$data['titulo'] = 'Login';
		$this->load->view('template-login', $data);
	}
	/*public function acerca_de(){
		if( $this->session->userdata('nombre')){
			$data['contenido'] = 'home/acerca_de';
			$data['titulo'] = 'Acerca De';
			$this->load->view('template', $data);
		}
		else{
			redirect ('home/ingreso');
		}
	}*/
	/*public function acceso_denegado(){
		$data['contenido'] = 'home/acceso_denegado';
		$data['titulo'] = 'Acceso denegado';
		$this->load->view('template', $data);
	}*/
	/*public function ingreso_req(){
		$data['contenido'] = 'home/ingresar_req';
		$data['titulo'] = 'Ingreso requerimiento';
		$this->load->view('template', $data);
	}*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
	public function ingreso(){
		if( $this->session->userdata('id')){
			redirect('home/index');
		}
		else{
			$data['contenido'] = 'login/form';
			$data['titulo'] = 'Ingreso';
			$this->load->view('template-login', $data);
		}
	}

	public function valid(){	 
		$this->form_validation->set_rules('login', 'Usuario', 'required|callback_loginok');
		$this->form_validation->set_rules('password', 'Clave', 'required');
		if($this->form_validation->run() == FALSE){
			$this->ingreso();
		}
		else{
			$user_id = $this->session->userdata('id');
			$ip = $this->input->ip_address();

			if ($this->agent->is_browser()){
			    $agent = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot()){
			    $agent = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile()){
			    $agent = $this->agent->mobile();
			}
			else{
			    $agent = 'Agente no definido';
			}

			$navegador_short = $this->agent->browser();
			$navegador = $agent;
			$plataforma = $this->agent->platform();

			$this->Model_log_access->insert_access($user_id, $ip, $navegador, $navegador_short, $plataforma);

			redirect('home/index');
		}
	}
	public function loginok(){
		$login=$this->input->post('login');
		$password=$this->input->post('password');
		return $this->usuariolib->login( $login , $password );
	}


	public function cambio_clave(){
		$data['contenido'] = 'home/cambio_clave';
		$data['titulo'] = 'Cambiar Clave';
		$this->load->view('template', $data);
	}
	public function cambiar_clave(){
	  	$this->form_validation->set_rules('clave_act', 'Clave Actual', 'required|callback_cambiook');
	  	$this->form_validation->set_rules('clave_new', 'Clave Nueva', 'required|matches[clave_rep]');
	  	$this->form_validation->set_rules('clave_rep', 'Repita Nueva', 'required');
	  	if($this->form_validation->run() == FALSE){
	   		$this->cambio_clave();
	  	}
	  	else{
	   		redirect('requerimiento/index');
	  	}
	}
	public function cambiook(){
		$act = $this->input->post('clave_act');
		$new = $this->input->post('clave_new');
  		return $this->usuariolib->cambiarPWD(md5($act), md5($new));
	}
}