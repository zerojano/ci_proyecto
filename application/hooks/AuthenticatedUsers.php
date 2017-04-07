<?php 
/**
 *  Creditos: http://todoprogramacion.com.ve/cursos/codeigniter/utilizar-hooks-videotutorial-39
 */
class AuthenticatedUsers
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
	private $disallowed_controllers;
	/**
	 * Metodos a los que el usuario puede acceder estando logueado
	 * @var array
	 */
	private $allowed_methods;
	/**
	 * Metodos a los cuales no podra acceder el usuario
	 * @var [type]
	 */
	private $disallowed_methods;
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->ci 						=& get_instance();
		$this->disallowed_controllers 	= array('login');
		$this->allowed_methods			= array('salir');
		$this->disallowed_methods 		= array('logout');
		$this->ci->load->helper('url');
	}
	public function checkAccess()
	{
		//Get the class
		$class 		= $this->ci->router->class;
		//Get the method
		$method 	= $this->ci->router->method;
		//Get the session data
		$session 	= $this->ci->session->userdata('id');
		if($session && in_array($class, $this->disallowed_controllers)) {
			if(!in_array($method, $this->allowed_methods)) {
				redirect('inicio');
			}
		}
		if($session && !in_array($class, $this->disallowed_controllers)) {
			if(in_array($method, $this->disallowed_methods)) {
				redirect('inicio');
			}
		}
	}
}