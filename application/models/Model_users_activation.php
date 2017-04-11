<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users_activation extends CI_Model {

	function __construct() {
		parent::__construct();
		}
	function get_activation($code) {
		$this->db->where('status', 1);
		$this->db->where('code',$code);
		return $this->db->get('users_activation')->row();
	}
	function update($code, $status) {
		$data = array( 'status' => $status, 'edit_date' => date('Y-m-d H:i:s') );
		$this->db->where('code', $code);
		$this->db->update('users_activation', $data);
	}
	function insert($user, $code){
        $data = array(
                'code' => $code,
				'user_id' => $user,
				'status' => 1,
				'create_date' => date('Y-m-d H:i:s'),
				'edit_date' => date('Y-m-d H:i:s')
                );
        $this->db->insert('users_activation',$data);
	}
}

/* End of file Model_users_activation.php */
/* Location: ./application/models/Model_users_activation.php */