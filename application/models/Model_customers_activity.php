<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customers_activity extends CI_Model {

	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('customers_activity_type');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('customers_activity_type')->row();
	}
	function get_dropdown_list_activity(){
		$this->db->from('customers_activity_type');
		$this->db->order_by('id');
		$result = $this->db->get();
		$return = array();
		$return[0] = 'Seleccionar actividad';
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
}

/* End of file Model_customers_activity.php */
/* Location: ./application/models/Model_customers_activity.php */