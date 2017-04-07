<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 CREATE TABLE `cars_stock` (
  `id` int(11) NOT NULL,
  `cars_type_id` int(2) NOT NULL,
  `patente` varchar(17) NOT NULL,
  `cars_brand_id` int(4) NOT NULL,
  `model` varchar(20) NOT NULL,
  `year` int(3) NOT NULL,
  `value` int(20) NOT NULL,
  `gastos` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `status` int(2) NOT NULL,
  `observacion` varchar(300) NOT NULL,
  `cotizacion_id` int(4) NOT NULL,
  `user_id` int(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 */

class Model_car extends CI_Model {

	function __construct() {
		parent::__construct();
		}
	function all($order) {
		$this->db->order_by("id", $order); 
		$query = $this->db->get('cars_stock');
		return $query->result();
	}
	function find($id) {
		$this->db->where('id', $id);
		return $this->db->get('cars_stock')->row();
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
        $this->db->insert('cars_stock',$data);
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
		$this->db->where('id', $registro['id']);
		$this->db->update('cars_stock', $data);
	}
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('cars_stock');
	} 
}

/* End of file Model_car.php */
/* Location: ./application/models/Model_car.php */