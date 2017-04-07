<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class usuarioLib{
	public function __construct($config = array()){
		$this->CI =& get_instance();
		$this->CI->load->model('Model_user');
		//$this->CI->load->model('Model_configuracion');
	}
	public function login($user, $pass){
		//$login_max = $this->CI->Model_configuracion->get_login_max('LOGIN_MAX');
		//$query = $this->CI->Model_usuarios->get_login($user, $pass, $login_max);
		$query = $this->CI->Model_user->get_login($user, $pass);
		if($query->num_rows() > 0){
			$usuario = $query->row();
			$datosSession = array(	'id' => $usuario->id,
									'username' => $usuario->username,
									'name' => $usuario->name,
									'apellidos' => $usuario->apellidos,
									'img_avatar' => $usuario->img_avatar,
									'user_type' => $usuario->user_type,
									'status' => $usuario->status );
			$this->CI->session->set_userdata($datosSession);

			//$this->CI->Model_usuarios->update_login_max($usuario->user, 0);
		
			return TRUE;
		}
		else{
			$usuario = $this->CI->Model_user->find($user, 'user');
			
			/*if ($usuario) {
				$count_login_max = $usuario->login_max + 1;
				$this->CI->Model_usuarios->update_login_max($usuario->user, $count_login_max);
			}*/

			log_message('error', 'Usuario o clave erronea.');
			$this->CI->session->sess_destroy();
			return FALSE;
		}
	}
    public function cambiarPWD($act, $new){
        if($this->CI->session->userdata('id') == null){
            return FALSE;
        }
         $id = $this->CI->session->userdata('id');
        $usuario = $this->CI->Model_Usuario->find($id);
        if($usuario->password == $act){
            $data = array('id' => $id,
                          'password' => $new);
            $this->CI->Model_Usuario->update($data);
        }
        else{
            return FALSE;
        }
    }
}