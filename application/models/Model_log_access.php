<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
CREATE TABLE `log_access` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL
)
*/
class Model_log_access extends CI_Model {
	function __construct() {
		parent::__construct();
		}
	function all($user){
		$this->db->select('log_access.id, log_access.fecha, user.firstname, user.lastname');
		$this->db->from('log_access');
		$this->db->join('user', 'user.id = '.$user );
		$this->db->order_by('log_access.id','DESC');
		$this->db->limit(15, 20);
		$query = $this->db->get();
		return $query->result();
	}
	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('user')->row();
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