<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cars_type extends CI_Model {

	function __construct() {
		parent::__construct();
		}
	function all($order) {
		$this->db->order_by("id", $order); 
		$query = $this->db->get('cars_type');
		return $query->result();
	}

}

/* End of file Model_cars_type.php */
/* Location: ./application/models/Model_cars_type.php */