<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Administración de usuarios
 * @author Alejandro Aguayo 2017/04/01
 */

/*
describe users;
+--------------+--------------+------+-----+---------+----------------+
| Field        | Type         | Null | Key | Default | Extra          |
+--------------+--------------+------+-----+---------+----------------+
| id           | int(5)       | NO   | PRI | NULL    | auto_increment |
| rut          | varchar(10)  | NO   |     | NULL    |                |
| nombre       | varchar(100) | NO   |     | NULL    |                |
| apellido     | varchar(100) | NO   |     | NULL    |                |
| telefono     | varchar(10)  | NO   |     | NULL    |                |
| direccion    | varchar(150) | NO   |     | NULL    |                |
| cargo        | varchar(180) | NO   |     | NULL    |                |
| email        | varchar(200) | NO   |     | NULL    |                |
| password     | varchar(200) | NO   |     | NULL    |                |
| perfil       | int(1)       | NO   |     | NULL    |                |
| img          | varchar(200) | NO   |     | NULL    |                |
| creado_fecha | datetime     | NO   |     | NULL    |                |
| estado       | int(11)      | NO   |     | NULL    |                |
| token        | varchar(100) | NO   |     | NULL    |                |
+--------------+--------------+------+-----+---------+----------------+
14 rows in set (0.07 sec)
*/
class Model_users extends CI_Model {
 
	function __construct() {
		parent::__construct();
		}
	 
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('users');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}
	function find_email($email) {
        $this->db->where('email',$email);
        $query = $this->db->get('users');
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->email;
		}
	}
    function insert($rut, $nombres, $apellidos, $email, $telefono, $direccion, $clave, $tipo, $cargo)
    {
        $data = array(
                'rut' => $rut,
                'nombre' => $nombres,
                'apellido' => $apellidos,
				'email' => $email,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'password' => md5($clave),
				'creado_fecha' => date('Y-m-d H:i:s'),
				'img' => 'default/user_1.png',
				'perfil' => $tipo,
				'cargo' => $cargo
                );
        $this->db->insert('info_usuarios',$data);
    }
	function verifica_rut($rut) {
        $this->db->where('rut',$rut);
        $query = $this->db->get('info_usuarios');
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->rut;
		}
    }
	function update($registro) {
		$data = array( 
			'nombre' => $registro['nombre'],
			'apellido' => $registro['apellido'],
			'telefono' => $registro['telefono'],
			'direccion' => $registro['direccion'],
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo']
			);
		$this->db->where('id', $registro['id']);
		$this->db->update('info_usuarios', $data);
	}
	function update_perfil($registro) {
		$data = array( 
			'nombre' => ucfirst(strtolower($registro['nombre'])),
			'apellido' => ucfirst(strtolower($registro['apellido'])),
			'telefono' => $registro['telefono'],
			'direccion' => ucfirst(strtolower($registro['direccion'])),
			'cargo' => ucfirst(strtolower($registro['cargo']))
			);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('info_usuarios', $data);
	}     
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('info_usuarios');
	} 
	function get_login($mail, $pass) {
		$this->db->where('email', $mail);
		$this->db->where('password', md5 ( $pass ));
		$this->db->where('estado = 1');
		return $this->db->get('info_usuarios');
	}
	function estado($usuario,$estado) {
		if ($estado == 1) {
			$estado = 0;
		}else{
			$estado = 1;
		}
		$this->db->set('estado',$estado);
		$this->db->where('id', $usuario);
		$this->db->update('info_usuarios');
	}
    function verifica_email($email) {
        $this->db->where('email',$email);
        $consulta = $this->db->get('info_usuarios');
		if($consulta->num_rows() == 1)
		{
	        $row = $consulta->row();
	        return $row->email;
		}
    }
	function find_user( $email )
	{
		$this->db->where('email', $email);
		return $this->db->get('info_usuarios')->row();
	}
	function get_password( $password ) {

		$this->db->where('id', $this->session->userdata('id') );
        $this->db->where('password',md5($password));
        $query = $this->db->get('info_usuarios');
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
		$this->db->update('info_usuarios', $data);
    }
    function get_count_all($operador, $tipo){
		$this->db->where('estado'.$operador,$tipo);
		return $this->db->count_all_results('info_usuarios'); 
    }
    function update_img( $imagen ){
		$data = array( 'img' => $imagen );
		$this->db->where('id', $this->session->userdata('id') );
		$this->db->update('info_usuarios', $data);
    }    
}