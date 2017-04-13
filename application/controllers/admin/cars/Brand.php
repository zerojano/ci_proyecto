<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_cars_brand');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/cars/brand/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Administración modelos autos <small>registro</small> </h3>';
			$data['contenido'] = 'admin/cars/brand/view';

			/*Inicializand var query*/
			$fields = '*';
			$where = array();
			$order_by = 'id ASC';
			$limit = 0;

			$data['type'] = $this->Model_cars_brand->get_all( $fields, $where, $order_by, $limit );

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

/* End of file Brand.php */
/* Location: ./application/controllers/admin/cars/Brand.php */