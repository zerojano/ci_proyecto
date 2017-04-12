<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_config_comunas extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('conf_ubi_comuna');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('conf_ubi_comuna')->row();
	}
	function get_dropdown_list_comuna(){
		$this->db->from('conf_ubi_comuna');
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
	function get_dropdown_list_comuna_ajax($ciudad_id){
		/*$this->db->where('region_id', $region_id);
		return $this->db->get('conf_ubi_ciudad')->row();*/
		$this->db->select('id,name');  
		$this->db->from('conf_ubi_comuna');  
		$this->db->where('ciudad_id',$ciudad_id);  
		$query = $this->db->get();  
		return $query->result();  
	}
}