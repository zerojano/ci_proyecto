<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_config_regiones extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('conf_ubi_region');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('conf_ubi_region')->row();
	}
	function get_dropdown_list_regiones(){
		$this->db->from('conf_ubi_region');
		$this->db->order_by('id');
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