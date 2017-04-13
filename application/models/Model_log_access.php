<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_log_access extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'log_access';
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

	
	function all($user, $order){
		$this->db->select('log_access.id, log_access.create_date, users.name, users.apellidos');
		$this->db->from('log_access');
		$this->db->join('users', 'users.user_id = '.$user );
		$this->db->order_by('log_access.id', $order);
		$this->db->limit(15, 20);
		$query = $this->db->get();
		return $query->result();
	}
	function find($id, $order){
		$this->db->where('user_id', $id);
		$this->db->order_by('id', $order);
		$this->db->limit(1,1);
		return $this->db->get('log_access')->row();
	}
    function insert_access($user_id,$ip,$agent, $browser, $platform){
        $data = array(
        	'user_id'=> $user_id, 
        	'ip'	=> $ip,	
        	'agent'=> $agent,
        	'browser' => $browser, 
        	'platform' => $platform,
			'create_date'=> date('Y-m-d H:i:s'), 
			'edit_date'=> date('Y-m-d H:i:s')
        	 );
        $this->db->insert('log_access',$data);
    }
    function get_navegador( $name ){
    	$this->db->like('agente',$name); 
		$query = $this->db->get('log_access');

		return $query->result();
    }
    function acualizar($id, $name){
		$data = array('navegador'=> $name);		
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('log_access');    	
    }
    function get_total_navegadores(){
    	$this->db->select('navegador, COUNT(navegador) as total');
		$this->db->group_by("navegador"); 
		$query = $this->db->get('log_access');
		return $query->result();    	
    }
}