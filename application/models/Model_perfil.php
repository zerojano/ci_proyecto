<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perfil extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'users';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function find() {
		$this->db->where($this->primary_key, $this->session->userdata('id'));
		return $this->db->get($this->table_name)->row();
	}
}

/* End of file Model_perfil.php */
/* Location: ./application/models/Model_perfil.php */