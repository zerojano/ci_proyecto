<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_sessions_app');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
	}
	public function index()
	{
		
	}
	public function resetsession(){
		/**
		 * quito las sessiones actuales
		 */
		if( $this->session->userdata('id') ){
			//Perfil adminSYS
			if ($this->session->userdata('user_type') == 1) {

				$this->Model_sessions_app->get_truncate();

				$this->session->set_flashdata('msg_tipo', 'success');
				$this->session->set_flashdata('msg_titulo', '¡Acción exitosa!');
				$this->session->set_flashdata('msg_texto', 'Has quitado todas las sesiones!');

				redirect('login');

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

}

/* End of file Car.php */
/* Location: ./application/controllers/admin/Car.php */