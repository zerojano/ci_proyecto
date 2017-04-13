<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_factory extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'factory';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function get($id){
		return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
	}		
	function get_all( $fields='', $where, $order_by='', $limit ){
        if ($fields != '') { $this->db->select($fields); }
		if (count($where)) { $this->db->where($where); }
		if ($limit != '') 	{ $this->db->limit($limit); }
        if ($order_by != '') { $this->db->order_by($order_by); }
		$query = $this->db->get( $this->table_name );
		return $query->result();
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