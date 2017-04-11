<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `rut` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ap_paterno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ap_materno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(2) NOT NULL,
  `comuna_id` int(2) NOT NULL,
  `ciudad_id` int(2) NOT NULL,
  `activity_type_id` int(2) NOT NULL,
  `phone_f` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `phone_m` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 */

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
    function insert($rut, $nombre, $ap_paterno, $ap_materno, $direccion, $region, $comuna, $ciudad, $actividad, $phone_f, $phone_m, $email)
    {
        $data = array(
                'rut' => $rut,
                'name' => ucwords(strtolower($nombre)),
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
				//'user_id' => $user_id,
				'create_date' => date('Y-m-d H:i:s'),
				'edit_date' => date('Y-m-d H:i:s')
                );
        $this->db->insert('customers',$data);
    }
	function update($registro) {
		$data = array( 
			'name' => ucwords(strtolower($registro['nombre'])),
			'ap_paterno' => ucwords(strtolower($registro['ap_paterno'])),
			'ap_materno' => $registro['ap_materno'],
			'phone_f' => $registro['phone_f'],
			'phone_m' => $registro['phone_m'],
			'direccion' => ucwords(strtolower($registro['direccion'])),
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo'],
			'edit_date' => date('Y-m-d H:i:s')
			);
		$this->db->where('id', $registro['id']);
		$this->db->update('customers', $data);
	}
}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */