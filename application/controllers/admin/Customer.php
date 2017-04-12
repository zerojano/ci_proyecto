<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_customers');
		$this->load->model('Model_customers_activity');
		$this->load->model('Model_config_regiones');
		$this->load->model('Model_config_comunas');
		$this->load->model('Model_config_provincias');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/customer/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			$data['title'] = '<h3>Administración de clientes <small>registro</small> </h3>';
			$data['title_ppal'] = '';// 'Administración de clientes ';
			$data['title_subt'] = 'registro';
			$data['contenido'] = 'admin/customer/view';
			$data['user'] = $this->Model_customers->all();
			$this->load->view('template-desarrollo',$data);
		//}else{
		//	redirect('login');
		//}
	}
	public function create() {
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title_ppal'] = '';// 'Nuevo cliente';
				$data['title_subt'] = 'registro';
				$data['title_form'] = '';// 'Ingresar nuevo cliente';
				$data['title_form_subt'] = '';// 'registro de nuevo cliente';
				$data['btn_submit'] = 'Nuevo ';// cliente';
				$data['dropdown_list_region'] = $this->Model_config_regiones->get_dropdown_list_regiones();
				$data['dropdown_list_ciudad'] = $this->Model_config_provincias->get_dropdown_list_ciudad();
				$data['dropdown_list_activity'] = $this->Model_customers_activity->get_dropdown_list_activity();
				$data['contenido'] = 'admin/customer/create';
				$this->load->view('template-desarrollo', $data);
			//}else{
			//	$this->session->set_flashdata('msg_tipo', 'warning');
			//	$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
			//	$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
			//	redirect('home');
			//}
		//}else{
		//	redirect('login');
		//}
	}
	public function insert(){

		$registro = $this->input->post();

		$this->form_validation->set_rules('rut', '"Rut"', 'trim|required');//'callback_rut_check');
		$this->form_validation->set_rules('name', '"Nombre"', 'trim|required');
		$this->form_validation->set_rules('ap_paterno', '"Apellido Paterno"', 'trim|required');
		$this->form_validation->set_rules('ap_materno', '"Apellido Materno"', 'trim|required');
		$this->form_validation->set_rules('direccion', '"Dirección"', 'trim');
		$this->form_validation->set_rules('phone_f', '"Teléfono fijo"', 'required');
		$this->form_validation->set_rules('phone_m', '"Teléfono movil"', 'required');
		$this->form_validation->set_rules('email', '"E-mail"', 'required|valid_email');

		$rut = $this->input->post('rut',TRUE);
		$name = $this->input->post('name',TRUE);
		$ap_paterno = $this->input->post('ap_paterno',TRUE);
		$ap_materno = $this->input->post('ap_materno',TRUE);
		$direccion = $this->input->post('direccion',TRUE);
		$phone_f = $this->input->post('phone_f',TRUE);
		$phone_m = $this->input->post('phone_m',TRUE);
		$email = $this->input->post('email',TRUE);
		$actividad = $this->input->post('actividad',TRUE);
		$region = $this->input->post('region',TRUE);
		$comuna = $this->input->post('comuna',TRUE);
		$ciudad = $this->input->post('ciudad',TRUE);

        if ($this->form_validation->run() == FALSE){
            $this->create();
        }
        else{
        	$this->Model_customers->insert($rut, $name, $ap_paterno, $ap_materno, $direccion, $region, $comuna, $ciudad, $actividad, $phone_f, $phone_m, $email);
			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', '¡Modificación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has ingresado exitosamente el cliente <strong>'.$name.' '.$ap_paterno.'</strong>');
			redirect('admin/customer/view');
        }			
	}
	public function edit($id){
		if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title-'] = '<h3>Crea usuario <small>registro</small> </h3>';
				$data['contenido'] = 'admin/customer/edit';
				$data['title-form'] = 'Modificar cliente';
				$data['user'] = $this->Model_customers->find($id);
				//$data['dropdown_list_activity'] = $this->Model_customers_activity->get_dropdown_list_regiones();
				$data['boton'] = 'Modificar información cliente';
				$this->load->view('template-desarrollo', $data);
			//}else{
			//	$this->session->set_flashdata('msg_tipo', 'warning');
			//	$this->session->set_flashdata('msg_titulo', '¡ACCESO DENEGADO!');
			//	$this->session->set_flashdata('msg_texto', 'No cuenta con privilegios para acceder a la sección seleccionada.');
			//	redirect('home');
			//}
		}else{
			redirect('login');
		}		

	}
	public function update(){

	}
	public function delete(){

	}
	public function ajax_ciudad(){
		$region_id = $this->input->post('id',TRUE);
		if ($region_id) {
			$data['ciudad'] = $this->Model_config_provincias->get_dropdown_list_ciudad_ajax($region_id);
			//$output = null; 
			foreach ($data['ciudad'] as $row)
			{  
				$output .= "<option value='".$row->id."'>".$row->name."</option>";  
			}  
			echo $output;
		}
	}
	public function ajax_comunas(){
		$ciudad_id = $this->input->post('id',TRUE);
		if ($ciudad_id) {
			$data['comuna'] = $this->Model_config_comunas->get_dropdown_list_comuna_ajax($ciudad_id);
			//$output = null; 
			foreach ($data['comuna'] as $row)
			{  
				$output .= "<option value='".$row->id."'>".$row->name."</option>";  
			}  
			echo $output;
		}
	}
	function callback_valid_rut(){

	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */