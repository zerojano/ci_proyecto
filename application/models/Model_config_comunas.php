<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_config_comunas extends CI_Model {
	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'conf_ubi_comuna';
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
	function get_dropdown_list_comuna(){
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
	function get_dropdown_list_comuna_ajax($ciudad_id){
		/*$this->db->where('region_id', $region_id);
		return $this->db->get('conf_ubi_ciudad')->row();*/
		$this->db->select('id,name');  
		$this->db->from($this->table_name);  
		$this->db->where('ciudad_id',$ciudad_id);  
		$query = $this->db->get();  
		return $query->result();  
	}
}