<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_config_provincias extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('conf_ubi_ciudad');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('conf_ubi_ciudad')->row();
	}
	function get_dropdown_list_ciudad(){
		$this->db->from('conf_ubi_ciudad');
		$this->db->order_by('id');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
	function get_dropdown_list_ciudad_ajax($region_id){
		/*$this->db->where('region_id', $region_id);
		return $this->db->get('conf_ubi_ciudad')->row();*/
		$this->db->select('id,name');  
		$this->db->from('conf_ubi_ciudad');  
		$this->db->where('region_id',$region_id);  
		$query = $this->db->get();  
		return $query->result();  
	}
}