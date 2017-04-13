<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
	function __construct(){
		parent::__construct();
		//Cargando modelos
		$this->load->model('Model_car');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		//$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/car/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		if( $this->session->userdata('id') ){
			$data['title_ppal'] = 'Administración de stock';
			$data['title_subt'] = 'registro';
			$data['title_btn'] = 'Nuevo vehículo';
			$data['contenido'] = 'admin/car/view';

			/*Inicializand var query*/
			$fields = '*';
			$where = array();
			$order_by = 'id ASC';
			$limit = 0;

			$data['cars'] = $this->Model_customers->get_all( $fields, $where, $order_by, $limit );

			$this->load->view('template-home',$data);
		}else{
			redirect('login');
		}
	}

}

/* End of file Car.php */
/* Location: ./application/controllers/admin/Car.php */