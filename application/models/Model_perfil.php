<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perfil extends CI_Model {

	function __construct() {
		parent::__construct();
		}
	function find() {
		$this->db->where('id', $this->session->userdata('id'));
		return $this->db->get('users')->row();
	}
}

/* End of file Model_perfil.php */
/* Location: ./application/models/Model_perfil.php */