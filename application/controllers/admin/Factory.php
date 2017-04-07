<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factory extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_factory');
		$this->load->model('Model_config_regiones');
		//$this->load->model('model_config_alertas_mail');
		//$this->load->model('model_log_tools');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		$data['contenido'] = 'admin/factory/view';
		$this->load->view('template-home',$data);
	}
	public function view()
	{
		//if( $this->session->userdata('id') ){
			$data['title_ppal'] = 'Administración de empresa';
			$data['title_subt'] = 'registro';
			$data['title_btn_submit'] = 'Modificar información';
			$data['title_btn_info'] = 'Ver información';
			$data['contenido'] = 'admin/factory/view';
			$data['factory'] = $this->Model_factory->all();
			$this->load->view('template-home',$data);
		//}else{
		//	redirect('login');
		//}
	}
	public function edit(){
		$id = 1;
		//if( $this->session->userdata('id') ){
			//if ( get_instance()->session->userdata('perfil') == 1 ) {
				$data['title_ppal'] = 'Información de mi empresa';
				$data['title_btn_submit'] = 'Modificar información';
				$data['title_btn_clear'] = 'Limpiar';
				$data['title_btn_previus'] = 'Volver';
				$data['title'] = '<h3>Modificar Empresa <small>registro</small> </h3>';
				$data['contenido'] = 'admin/factory/edit';
				$data['title_form'] = 'Modificar Empresa';
				$data['factory'] = $this->Model_factory->find($id);
				$data['mod_date_reg'] =	date('d/m/Y H:i',strtotime($data['factory']->edit_date));
				$data['dropdown_list_regiones'] = $this->Model_config_regiones->get_dropdown_list_regiones();	
				$this->load->view('template-home', $data);
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
	public function update(){
		$registro = $this->input->post();
		//$registro = $this->security->xss_clean($registro);
		//
		$this->form_validation->set_rules('name', 'Nombre empresa', 'required');

		$id = $this->input->post('id',TRUE);
		$name = $this->input->post('name',TRUE);
		$name_corto = $this->input->post('name_corto',TRUE);
		$giro = $this->input->post('giro',TRUE);
		$email = $this->input->post('email',TRUE);

		if($this->form_validation->run() == FALSE){

			$this->edit($registro['id']);
		}
		else{
			
			$this->Model_factory->update($id, $name, $name_corto, $giro, $email);

			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', '¡Modificación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has modificado la categoría <strong>'.$name.'</strong>');

			redirect('admin/factory/view');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */