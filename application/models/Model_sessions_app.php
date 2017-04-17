<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sessions_app extends CI_Model {

	protected $table_name = 'sessions_app';
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
	function get_truncate(){
		$this->db->truncate($this->table_name); 
	}

}

/* End of file Model_sessions_app.php */
/* Location: ./application/models/Model_sessions_app.php */