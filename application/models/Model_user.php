<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {
 
	protected $table_name = 'users';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	 
	function all($order) {
		$this->db->order_by("id", $order); 
		$query = $this->db->get($table_name);
		return $query->result( $this->table_name );
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->table_name)->row();
	}
	function find_email($email) {
        $this->db->where('email',$email);
        $query = $this->db->get($this->table_name);
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->email;
		}
	}
	function update_password_activation( $user_id, $new_pass ){
		$data = array( 'password' => md5( $new_pass ) );
		$this->db->where($this->primary_key, $user_id );
		$this->db->update($this->table_name, $data);	
	}
	function get_login($username, $pass) {
		$this->db->where('username', $username);
		$this->db->where('password', md5 ( $pass ));
		$this->db->where('status = 1');
		return $this->db->get($this->table_name);
	}	
    function insert($registro)
    {
        $data = array(
                'rut' => $registro['rut'],
                'name' => ucwords(strtolower($registro['name'])),
                'apellidos' => ucwords(strtolower($registro['apellidos'])),
				'email' => strtolower($registro['email']),
				'username' => strtolower($registro['username']),
				'password' => md5(date('Y-m-d H:i:s')),
				//Por defecto
				'user_type' => $registro['perfil'],
				'status' => 1,
				'img_avatar' => '_files/user/type/root.png',
				'create_date' => date('Y-m-d H:i:s'),
				'edit_date' => date('Y-m-d H:i:s')
                );
        $this->db->insert($this->table_name,$data);
    }
    function verifica_user($username){
        $this->db->where('username',$username);
        $consulta = $this->db->get($this->table_name);
		if($consulta->num_rows() == 1){
	        $row = $consulta->row();
	        return $row->user;
		}
    }    
	function verifica_rut($rut) {
        $this->db->where('rut',$rut);
        $query = $this->db->get($this->table_name);
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->rut;
		}
    }
	function update($registro) {
		$data = array( 
			'name' => ucwords(strtolower($registro['name'])),
			'apellidos' => ucwords(strtolower($registro['apellidos'])),
			'email' => ucwords(strtolower($registro['email'])),
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo']
			);
		$this->db->where($this->primary_key, $registro['id']);
		$this->db->update($this->table_name, $data);
	}
	function update_perfil($registro) {
		$data = array( 
			'nombre' => ucfirst(strtolower($registro['nombre'])),
			'apellido' => ucfirst(strtolower($registro['apellido'])),
			'telefono' => $registro['telefono'],
			'direccion' => ucfirst(strtolower($registro['direccion'])),
			'cargo' => ucfirst(strtolower($registro['cargo']))
			);
		$this->db->where($this->primary_key, $this->session->userdata('id'));
		$this->db->update($this->table_name, $data);
	}     
	function delete($id) {
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	} 
	function estado($usuario,$estado) {
		if ($estado == 1) {
			$estado = 0;
		}else{
			$estado = 1;
		}
		$this->db->set('estado',$estado);
		$this->db->where($this->primary_key, $usuario);
		$this->db->update($this->table_name);
	}
    function verifica_email($email) {
        $this->db->where('email',$email);
        $consulta = $this->db->get($this->table_name);
		if($consulta->num_rows() == 1)
		{
	        $row = $consulta->row();
	        return $row->email;
		}
    }
	function find_user( $email )
	{
		$this->db->where('email', $email);
		return $this->db->get($this->table_name)->row();
	}
	function get_password( $password ) {

		$this->db->where($this->primary_key, $this->session->userdata('id') );
        $this->db->where('password',md5($password));
        $query = $this->db->get($this->table_name);
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        //echo $row;exit;
	        return $row->id;
		}

		/*
		$this->db->where('id', $this->session->userdata('id') );
		$this->db->where('password', md5 ( $password ));
		return $this->db->get('info_usuarios');
		*/
	}    
    function update_pass( $usuario, $clavenueva ){
		$data = array( 'password' => $clavenueva );
		$this->db->where('id', $usuario );
		$this->db->update($this->table_name, $data);
    }
    function get_count_all($operador, $tipo){
		$this->db->where('estado'.$operador,$tipo);
		return $this->db->count_all_results($this->table_name); 
    }
    function update_img( $imagen ){
		$data = array( 'img' => $imagen );
		$this->db->where($this->primary_key, $this->session->userdata('id') );
		$this->db->update($this->table_name, $data);
    }    
}