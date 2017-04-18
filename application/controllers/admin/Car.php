<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_car');
		$this->load->model('Model_cars_type');
		$this->load->model('Model_cars_brand');
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

			$fields = '*';
			$where = array();
			$order_by = 'id ASC';
			$limit = 0;

			$data['cars'] = $this->Model_car->get_all( $fields, $where, $order_by, $limit );

			$this->load->view('template-home',$data);
		}else{
			redirect('login');
		}
	}
	public function create(){
		if( $this->session->userdata('id') ){

			if ($this->session->userdata('user_type') < 3) {

				$data['title_ppal'] = 'Ingresar automovil ';
				$data['title_subt'] = 'registro';	
				$data['title-form'] = 'Crear automovil';
				$data['title_btn_submit'] = 'Nuevo automovil';

				$data['contenido'] = 'admin/car/create';

				$data['dropdown_list_type'] = $this->Model_cars_type->get_dropdown_list_type();
				$data['dropdown_list_brand'] = $this->Model_cars_brand->get_dropdown_list_brand();

				$this->load->helper('dropdown');
				$data['dropdown_list_year'] = dropdown('1990');

/*
				$year_ini = 1990;
				$data['dropdown_list_year'][0] = 'Seleccionar año';
				for($i = 1950 ; $i <= date('Y'); $i++){
				   $data['dropdown_list_year'][$i] = $i;
				}
				$data['dropdown_list_year'];
*/
				//$data['dropdown_list_type'] = $this->Model_users_type->get_dropdown_list_type();

				$this->load->view('template-home', $data);
			}else{
				$this->session->set_flashdata('msg_tipo', 'warning');
				$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
				$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
				redirect('home');
			}
		}else{
			redirect('login');
		}		
	}
	public function insert(){}
	public function edit($id){}
	public function update(){}
	public function delete($id){}
}

/* End of file Car.php */
/* Location: ./application/controllers/admin/Car.php */