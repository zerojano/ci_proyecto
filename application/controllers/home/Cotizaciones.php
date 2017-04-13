<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_cotiza_customers');
		/*$this->load->model('Model_customers_activity');
		$this->load->model('Model_config_regiones');
		$this->load->model('Model_config_comunas');
		$this->load->model('Model_config_provincias');*/
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		
	}
	public function create() {
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title_ppal'] = 'Nueva cotización';
				$data['title_subt'] = 'registro';
				$data['title_form'] = 'Ingresar nuevo cliente';
				$data['title_form_subt'] = 'registro de nuevo cliente';
				$data['btn_submit'] = 'cliente';
				$data['dropdown_list_region'] = $this->Model_config_regiones->get_dropdown_list_regiones();
				$data['dropdown_list_ciudad'] = $this->Model_config_provincias->get_dropdown_list_ciudad();
				$data['dropdown_list_activity'] = $this->Model_customers_activity->get_dropdown_list_activity();
				$data['contenido'] = 'admin/customers/create';
				$this->load->view('template-home', $data);
			//}else{
			//	$this->session->set_flashdata('msg_tipo', 'warning');
			//	$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
			//	$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
			//	redirect('home');
			//}
		/*}else{
			redirect('login');
		}*/
	}
}

/* End of file Cotizaciones.php */
/* Location: ./application/controllers/Cotizaciones.php */