<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_config_regiones extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'conf_ubi_region';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function all() {
		$this->db->order_by($this->primary_key, "desc"); 
		$query = $this->db->get($this->table_name);
		return $query->result();
	}
	function find($id) {
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name)->row();
	}
	function get_dropdown_list_regiones(){
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$result = $this->db->get();
		$return = array();
		$return[0] = 'Seleccionar región';
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
}