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

}

/* End of file Model_users_type.php */
/* Location: ./application/models/Model_users_type.php */