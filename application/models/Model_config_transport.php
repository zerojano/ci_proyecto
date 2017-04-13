<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {

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
	function insert($data){

	}
	function update($id, $data){

	}
	function delete($id){

	}
}