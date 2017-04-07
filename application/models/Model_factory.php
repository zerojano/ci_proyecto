<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_factory extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	 
	function all() {
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('factory');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('factory')->row();
	}
	function update($id, $name, $name_corto, $giro, $email) {
		$data = array( 
			'name' => $name,
			'name_corto' => $name_corto,
			'giro' => $giro,
			'email' => $email
			);
		$this->db->where('id', $id);
		$this->db->update('factory', $data);
	}
}