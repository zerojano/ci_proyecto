<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->library('usuarioLib');
		$this->load->model('Model_user');
		$this->load->model('Model_users_activation');

		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('loginok', 'Usuario o contraseña incorrecta.');
	}
	public function index(){
		show_404();
	}
	public function user($code=null){
		/*$this->load->library('encryption');

		$plain_text = 'This is a plain-text message!';
		$ciphertext = $this->encryption->encrypt($plain_text);

		// Outputs: This is a plain-text message!
		echo $ciphertext;*/

		$data['activation'] = $this->Model_users_activation->get_activation($code);

		if ( $data['activation']) {

			$data['code'] = $data['activation']->code;	
			$data['contenido'] = 'login/activation';
			$data['titulo'] = 'Activación de cuenta';
			$data['title_form'] = 'Activación';

			$this->load->view('template-login', $data);

		}else{
			show_404();
		}
	}
	public function valid(){

		$registro = $this->input->post();
		//$registro = $this->security->xss_clean($registro);
		
		$this->form_validation->set_rules('code', 'Código', 'required');
		$this->form_validation->set_rules('new', 'Nueva contraseña', 'required');
		$this->form_validation->set_rules('new_rep', 'Confirmación nueva contraseña', 'required|matches[new]');


		$new = $this->input->post('new',TRUE);
		$new_rep = $this->input->post('new_rep',TRUE);
		$code = $this->input->post('code',TRUE);

		if($this->form_validation->run() == FALSE){
			$this->user($registro['code']);
		}else{

			$data['activation'] = $this->Model_users_activation->get_activation($code);

			$this->Model_user->update_password_activation( $data['activation']->user_id, $new );

			$this->session->set_flashdata('msg_tipo', 'success');
			$this->session->set_flashdata('msg_titulo', 'Activación exitosa!');
			$this->session->set_flashdata('msg_texto', 'Has activado tu cuenta exitosamente.');

			$this->Model_users_activation->update($code, 0);

			redirect('login','refresh');

		}

	}	
}

/* End of file Activation.php */
/* Location: ./application/controllers/Activation.php */