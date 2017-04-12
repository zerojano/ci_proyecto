<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customers extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('customers');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('customers')->row();
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
        $this->db->insert('customers',$data);
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
		$this->db->where('id', $registro['id']);
		$this->db->update('customers', $data);
	}
	function verifica_rut($rut) {
        $this->db->where('rut',$rut);
        $query = $this->db->get('customers');
		if($query->num_rows() == 1)
		{
	        $row = $query->row();
	        return $row->rut;
		}
    }
}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */