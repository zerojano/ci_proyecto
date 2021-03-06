<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cars_type extends CI_Model {
	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'cars_type';
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
	function get_dropdown_list_type(){
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$result = $this->db->get();
		$return = array();
		$return[0] = 'Seleccionar tipo';
		if($result->num_rows() > 0){
			foreach($result->result_array() as $row){
				$return[$row['id']] = $row['name'];
			}
		}
		return $return;
	}
}

/* End of file Model_cars_type.php */
/* Location: ./application/models/Model_cars_type.php */