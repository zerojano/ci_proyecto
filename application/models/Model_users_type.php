<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users_type extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'users_type';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function all($order) {
		$this->db->order_by($this->primary_key, $order); 
		$query = $this->db->get($this->table_name);
		return $query->result();
	}	
	function get_dropdown_list_type(){
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$result = $this->db->get();
		$return = array();
		$return[0] = 'Seleccionar perfil';
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
}

/* End of file Model_users_type.php */
/* Location: ./application/models/Model_users_type.php */