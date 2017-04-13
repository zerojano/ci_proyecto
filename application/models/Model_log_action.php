<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {
 
	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'log_action';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function get($id){
		return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
	}		
	function get_all( $fields='', $where, $order_by='', $limit ){
        if ($fields != '') { $this->db->select($fields); }
		if (count($where)) { $this->db->where($where); }
		if ($limit != '') 	{ $this->db->limit($limit); }
        if ($order_by != '') { $this->db->order_by($order_by); }
		$query = $this->db->get( $this->table_name );
		return $query->result();
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
        $this->db->insert($this->table_name,$data);
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
			'nombre' => $registro['nombre'],
			'apellido' => $registro['apellido'],
			'telefono' => $registro['telefono'],
			'direccion' => $registro['direccion'],
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo']
			);
		$this->db->where('id', $registro['id']);
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
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update($this->table_name, $data);
	}     
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}
}