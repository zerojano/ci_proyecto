<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_car extends CI_Model {
	/**
	 * Inicializar variable con nombre de la tabla
	 * Inicializar primary_key de la tabla
	 */
	protected $table_name = 'cars_stock';
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
    function insert( $cars_type_id, $patente, $cars_brand_id, $model, $year, $value, $gastos, $total, $status, $observacion, $cotizacion_id)
    {
        $data = array(
                'cars_type_id' => $cars_type_id,
                'patente' => $patente,
                'cars_brand_id' => $cars_brand_id,
				'model' => $model,
				'year' => $year,
				'value' => $value,
				'gastos' => $gastos,
				'total' => $total,
				'status' => $status,
				'observacion' => $observacion,
				'cotizacion_id' => $cotizacion_id,
				//'user_id' => $user_id,
				'create_fecha' => date('Y-m-d H:i:s'),
				'edit_fecha' => date('Y-m-d H:i:s')
                );
        $this->db->insert($this->table_name,$data);
    }
	function update($registro) {
		$data = array( 
			'nombre' => $registro['nombre'],
			'apellido' => $registro['apellido'],
			'telefono' => $registro['telefono'],
			'direccion' => $registro['direccion'],
			'cargo' => $registro['cargo'],
			'perfil' => $registro['tipo']
			);
		$this->db->where($this->primary_key, $registro['id']);
		$this->db->update($this->table_name, $data);
	}
	function delete($id) {
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	} 
}

/* End of file Model_car.php */
/* Location: ./application/models/Model_car.php */