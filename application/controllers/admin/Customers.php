<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
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
		$data['contenido'] = 'admin/customers/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			if (ENVIRONMENT == 'development') {
				$data['title_ppal'] = '';
				$data['title_subt'] = '';
				$data['title_form'] = '';
				$data['title_btn_add'] = '';
				$theme = 'template-desarrollo';
			}else{
				$data['title_ppal'] = 'Nuevo cliente';
				$data['title_subt'] = 'registro';
				$data['title_form'] = 'Ingresar nuevo cliente';
				$data['title_btn_add'] = 'Nuevo cliente';
				$theme = 'template-home';				
			}

			$data['contenido'] = 'admin/customers/view';

			/*Inicializand var query*/
			$fields = '*';
			$where = array();
			$order_by = 'id DESC';
			$limit = 0;

			$data['customers'] = $this->Model_customers->get_all( $fields, $where, $order_by, $limit );

			$this->load->view($theme,$data);
		//}else{
		//	redirect('login');
		//}
	}
	public function create() {
		if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title_ppal'] = 'Nuevo cliente';
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
		}else{
			redirect('login');
		}
	}
	public function insert(){

		$registro = $this->input->post();

		$this->form_validation->set_rules('rut', '"Rut"', 'trim|required|callback_rut_check');//|callback_rut_validar');
		$this->form_validation->set_rules('name', '"Nombre"', 'trim|required');
		$this->form_validation->set_rules('ap_paterno', '"Apellido Paterno"', 'trim|required');
		$this->form_validation->set_rules('ap_materno', '"Apellido Materno"', 'trim|required');
		$this->form_validation->set_rules('direccion', '"Dirección"', 'trim');
		$this->form_validation->set_rules('phone_f', '"Teléfono fijo"', 'required');
		$this->form_validation->set_rules('phone_m', '"Teléfono movil"', 'required');
		$this->form_validation->set_rules('email', '"E-mail"', 'required|valid_email');

		$rut = $this->input->post('rut');
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
			//echo 'dato: '.$rut;exit;
        	$this->Model_customers->insert($rut, $name, $ap_paterno, $ap_materno, $direccion, $region, $comuna, $ciudad, $actividad, $phone_f, $phone_m, $email);
			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', '¡Modificación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has ingresado exitosamente el cliente <strong>'.$name.' '.$ap_paterno.'</strong>');
			redirect('admin/customers/view');
        }			
	}
	public function edit($id){
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
			if (ENVIRONMENT == 'development') {
				$data['title_ppal'] = '';
				$data['title_subt'] = '';
				$data['title_form'] = '';
				$data['title_form_subt'] = '';
				$data['btn_submit'] = 'enviar';
				$theme = 'template-desarrollo';
			}else{
				$data['title_ppal'] = 'Modificar cliente';
				$data['title_subt'] = 'registro';
				$data['title_form'] = 'Modificar cliente';
				$data['title_form_subt'] = 'Modificación de cliente';
				$data['btn_submit'] = 'Modificar cliente';
				$theme = 'template-home';
			}
				$data['customers'] = $this->Model_customers->get($id);
				$data['dropdown_list_region'] = $this->Model_config_regiones->get_dropdown_list_regiones();
				$data['dropdown_list_ciudad'] = $this->Model_config_provincias->get_dropdown_list_ciudad();
				$data['dropdown_list_comuna'] = $this->Model_config_comunas->get_dropdown_list_comuna();
				$data['dropdown_list_activity'] = $this->Model_customers_activity->get_dropdown_list_activity();
				$data['contenido'] = 'admin/customers/edit';
				//$this->load->view('template-home', $data); 
				$this->load->view($theme, $data);
			//}else{
		//}else{
		//	redirect('login');
		//}		
	}
	public function update(){

		$registro = $this->input->post();
		$registro = $this->security->xss_clean($registro);

		$this->form_validation->set_rules('rut', '"Rut"', 'trim|required|callback_rut_validar');//|callback_rut_validar|callback_rut_check');
		$this->form_validation->set_rules('name', '"Nombre"', 'trim|required');
		$this->form_validation->set_rules('ap_paterno', '"Apellido Paterno"', 'trim|required');
		$this->form_validation->set_rules('ap_materno', '"Apellido Materno"', 'trim|required');
		$this->form_validation->set_rules('direccion', '"Dirección"', 'trim');
		$this->form_validation->set_rules('phone_f', '"Teléfono fijo"', 'trim');
		$this->form_validation->set_rules('phone_m', '"Teléfono movil"', 'trim');
		$this->form_validation->set_rules('email', '"E-mail"', 'required|valid_email');
		
		$rut = $this->input->post('rut');
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

		if($this->form_validation->run() == FALSE){
			$this->edit($registro['id']);
		}
		else{
			$this->Model_customers->update($rut, $name, $ap_paterno, $ap_materno, $direccion, $region, $comuna, $ciudad, $actividad, $phone_f, $phone_m, $email);
			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', '¡Modificación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has modificado la categoría <strong>'.$nombre.'</strong>');

			redirect('admin/customers/view');
		}
	}
	public function delete(){

	}
	public function ajax_ciudad(){
		$region_id = $this->input->post('id',TRUE);
		if ($region_id) {
			$data['ciudad'] = $this->Model_config_provincias->get_dropdown_list_ciudad_ajax($region_id);
			//$output = null; 
			$output = "<option value='0'>Seleccionar ciudad</option>";  
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
			$output = "<option value='0'>Seleccionar comuna</option>";  
			foreach ($data['comuna'] as $row)
			{  
				$output .= "<option value='".$row->id."'>".$row->name."</option>";  
			}  
			echo $output;
		}
	}
   	public function rut_check($rut){
		/**
		 * Código para validar rut
		 * @return true or false
		 * @author https://gist.github.com/rbarrigav/3881019
		 * @since 2015-05-07
		 */
		$rut = preg_replace('/[^k0-9]/i', '', $rut);
		
		$dv  = substr($rut, -1);
		$numero = substr($rut, 0, strlen($rut)-1);
		$i = 2;
		$suma = 0;
		foreach(array_reverse(str_split($numero)) as $v)
		{
			if($i==8)
				$i = 2;

		        $suma += $v * $i;
		        ++$i;
		}
		$dvr = 11 - ($suma % 11); 

		if($dvr == 11){
			$dvr = 0;
		}
		if($dvr == 10){
			$dvr = 'K';
		}

		if($dvr == strtoupper($dv)){
			
			return true;
		}else{
			$this->form_validation->set_message('rut_check', 'El RUT no es válido!');
			return false;
		}
	}
	public function rut_validar($rut){

		/*Validar si existe cliente*/
		$rut = preg_replace('/[^k0-9]/i', '', $rut);
		//echo 'dato: '.$rut;exit;
		$comprobar_rut = $this->Model_customers->verifica_rut($rut);
		//if ($rut=='15.548.237-0') {

		if ($comprobar_rut == $rut) {
			$this->form_validation->set_message('rut_validar', 'El cliente ya se encuentra registrado!.');
			return false;
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */