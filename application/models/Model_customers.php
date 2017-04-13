<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customers extends CI_Model {
	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'customers';
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
    function insert($rut, $name, $ap_paterno, $ap_materno, $direccion, $region, $comuna, $ciudad, $actividad, $phone_f, $phone_m, $email)
    {
        $data = array(
                'rut' => $rut,
                'name' => ucwords(strtolower($name)),
                'ap_paterno' => ucwords(strtolower($ap_paterno)),
                'ap_materno' => ucwords(strtolower($ap_materno)),
                'direccion' => ucwords(strtolower($direccion)),
				'region_id' => $region,
				'comuna_id' => $comuna,
				'ciudad_id' => $ciudad,
				'activity_type_id' => $actividad,
				'phone_f' => $phone_f,
				'phone_m' => $phone_m,
				'email' => strtolower($email),
				'user_id' => 1,
				'create_date' => date('Y-m-d H:i:s'),
				'edit_date' => date('Y-m-d H:i:s')
                );
        $this->db->insert( $this->table_name ,$data);
    }
	function update($registro) {
		$data = array( 
			'name' => ucwords(strtolower($registro['name'])),
			'ap_paterno' => ucwords(strtolower($registro['ap_paterno'])),
			'ap_materno' => $registro['ap_materno'],
			'phone_f' => $registro['phone_f'],
			'phone_m' => $registro['phone_m'],
			'direccion' => ucwords(strtolower($registro['direccion'])),
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo'],
			'create_date' => date('Y-m-d H:i:s'),
			'edit_date' => date('Y-m-d H:i:s')
			);
		$this->db->where( $this->primary_key , $registro['id']);
		$this->db->update( $this->table_name , $data);
	}
	function verifica_rut($rut) {
        $this->db->where('rut',$rut);
        $query = $this->db->get( $this->table_name );
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->rut;
		}
    }
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }
}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */