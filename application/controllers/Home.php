<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		//$this->load->library('usuarioLib');
		//$this->load->library('user_agent');
		//$this->load->model('Model_users');
		//this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		//$this->form_validation->set_message('loginok', 'Usuario o contraseña incorrecta.');
		//$this->form_validation->set_message('matches', '%s no coincide con %s');
		//$this->form_validation->set_message('cambiook', 'No se puede realizar el cambio de clave');
	}
	public function index(){
		$data['contenido'] = 'home';
		$data['titulo'] = 'Inicio';
		$this->load->view('template-home', $data);

		if ($this->session->userdata('username')=='invitado') {
			$this->alert_visto();
		}
	}

   	/*Alerta Desarrollo*/
    public function alert_visto(){

    	$tiempo = date('d/m/Y H:i:s');

		$config['protocol'] = 'mail';
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$this->email->initialize($config);
		$this->email->from('contacto@infoplan.cl', 'app nomade');
		$this->email->to('aaguayonitrigual@gmail.com');
		$this->email->subject('Inicio sesion');
   
        $this->email->message('Invitado ha iniciado sesion<br> Ingreso: '.$tiempo.'<br>');

        $this->email->send();

		/*if(!$this->email->send()){
			echo 'error envio';
		}else{
			echo 'sent';
		}*/

    }	
}