<?php
/**
 *  Creditos: http://todoprogramacion.com.ve/cursos/codeigniter/utilizar-hooks-videotutorial-39
 *  https://codeigniter.com/user_guide/general/hooks.html
 */
class UnauthenticatedUsers
{
	/**
	 * CI object instance
	 * @var object
	 */
	private $ci;
	/**
	 * Controladores a los que el usuario puede acceder cuando no este logeado
	 * @var array
	 */
	private $allowed_controllers;
	/**
	 * Metodos a los que el usuario puede acceder estando logueado
	 * @var array
	 */
	private $allowed_methods;
	/**
	 * Metodos a los cuales no podra acceder el usuario
	 * @var array
	 */
	private $disallowed_methods;
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->ci 					=& get_instance();
		$this->allowed_controllers 	= array('login');
		$this->allowed_methods		= array('demo');
		$this->disallowed_methods 	= array('logout');
		$this->ci->load->helper('url');
	}
	/**
	 * Obtiene los permisos del usuario
	 * @return redirect Redirect the user to the login
	 */
	public function checkAccess()
	{
		/*$ip = $_SERVER['REMOTE_ADDR'];
		$numeros = explode(".", $ip);
		$intranet = "$numeros[0].$numeros[1].$numeros[2].$numeros[3]";
		$intranet2 = "$numeros[0].$numeros[1]";

		if ($intranet=="146.83.222.25") {
			$redUach = 1; // Con acceso
		}else{
			$redUach = 0; // Sin acceso
			exit;
		}*/

		//Get the class
		$class 		= $this->ci->router->class;
		//Get the method
		$method 	= $this->ci->router->method;
		//Get the session data
		$session 	= $this->ci->session->userdata('id');

		if(empty($session) && !in_array($class, $this->allowed_controllers)) {
			if(!in_array($method, $this->allowed_methods)) {
				//Generando mensaje
				$this->ci->session->set_flashdata('msg_tipo', 'danger');
				$this->ci->session->set_flashdata('msg_titulo', '¡Acceso restringido!<br>');
				$this->ci->session->set_flashdata('msg_texto', '<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>  Acceso restringido');
				//Generando log
				log_message('errorHook', 'Acceso restringido :: ');
				//redireccionando
				redirect('login');
			}
		}
		if(empty($session) && in_array($class, $this->allowed_controllers)) {
			if(in_array($method, $this->disallowed_methods)) {
				//Generando mensaje
				$this->ci->session->set_flashdata('msg_tipo', 'danger');
				$this->ci->session->set_flashdata('msg_titulo', '¡Acceso restringido!');
				$this->ci->session->set_flashdata('msg_texto', 'Acceso restringido');
				//Generando log
				log_message('errorHook', 'Acceso restringido :: '.$this->ci->input->ip_address().'::Controller > Metodo');
				//redireccionando
				redirect('login');
			}
		}
	}
}