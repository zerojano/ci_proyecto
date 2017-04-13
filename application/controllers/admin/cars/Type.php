<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_cars_type');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/cars/type/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Administración tipos de transporte <small>registro</small> </h3>';
			$data['contenido'] = 'admin/cars/type/view';

			/*Inicializand var query*/
			$fields = '*';
			$where = array();
			$order_by = 'id ASC';
			$limit = 0;

			$data['type'] = $this->Model_cars_type->get_all( $fields, $where, $order_by, $limit );

			//$data['type'] = $this->Model_cars_type->all('ACS');

			$this->load->view('template-home',$data);
		}else{
			redirect('login');
		}
	}
	public function insert(){}

	public function create(){}
	
	public function edit(){}
	
	public function update(){}
	
	public function delete(){}
}

/* End of file Type.php */
/* Location: ./application/controllers/admin/cars/Type.php */