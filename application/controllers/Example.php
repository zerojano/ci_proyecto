<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_example');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		
	}
	public function get($id){

		$data['get'] = $this->Model_example->get($id);

		var_dump($data['get']);

		exit;
	}
	public function getall(){
		
	  	//Desde controlador llamar ha:
		$fields = '*'; //Default * All Campos
		$where = array('rut <> '=>'155482370','email <>'=>'@');
		$order_by = 'id DESC';
		$limit = 0; //Default 0 All

		//EXAMPLE:
		$data['all'] = $this->Model_example->get_all( $fields, $where, $order_by, $limit );
	
		var_dump($data['all']);

		exit;
	}



	
}

/* End of file Example.php */
/* Location: ./application/controllers/Example.php */