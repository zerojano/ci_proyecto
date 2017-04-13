<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_example extends CI_Model {

	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'customers';
	protected $primary_key = 'id';

	function __construct() {
		parent::__construct();
		}
	function get($id){
		return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
	}
	/**
		//Desde controlador llamar ha
		$fields = 'id, rut,email';
		$where = array('rut <> '=>'155482370','email <>'=>'@');
		$order_by = 'id DESC';
		$limit = 0;

		//EXAMPLE:
		$data['all'] = $this->Model_example->get_all( $fields, $where, $order_by, $limit);
	 */
	function get_all( $fields='', $where, $order_by='', $limit ){
        if ($fields != '') { $this->db->select($fields); }
		if (count($where)) { $this->db->where($where); }
		if ($limit != '') 	{ $this->db->limit($limit); }
        if ($order_by != '') { $this->db->order_by($order_by); }
		$query = $this->db->get( $this->table_name );
		return $query->result();
	}
    public function insert($data) {
        $data['date_created'] = $data['date_updated'] = date('Y-m-d H:i:s');
        $data['created_from_ip'] = $data['updated_from_ip'] = $this->input->ip_address();

        $success = $this->db->insert($this->table_name, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($data, $id) {
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['updated_from_ip'] = $this->input->ip_address();

        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }
}

/* End of file Model_cotizaciones.php */
/* Location: ./application/models/Model_cotizaciones.php */