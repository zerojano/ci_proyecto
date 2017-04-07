<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users_type extends CI_Model {

	function __construct() {
		parent::__construct();
		}
	function all($order) {
		$this->db->order_by("id", $order); 
		$query = $this->db->get('users_type');
		return $query->result();
	}	

}

/* End of file Model_users_type.php */
/* Location: ./application/models/Model_users_type.php */