<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********SOLICITUDES**********/
	public function get_clientes($parametros){
		require_once('../vista/clientes.php');
	}
	public function form_nuevo_cliente($parametros){
		if(!empty($parametros['cod_cli'])){
			$resultado = $this->data->form_nuevo_cliente($parametros);
			foreach($resultado as $fila){
				$cod_cli =$fila['cod_cli'];
				$nombres =utf8_encode($fila['nombres']);
				$apellidos =utf8_encode($fila['apellidos']);
				$fecha =date('d/m/Y',strtotime($fila['fecha']));
				$nacimiento =date('d/m/Y',strtotime($fila['nacimiento']));
				$edad =utf8_encode($fila['edad']);
				$dni =utf8_encode($fila['dni']);
				$domicilio =utf8_encode($fila['domicilio']);
				$nombre_pais =utf8_encode($fila['nombre_pais']);
				$nombre_provincia =utf8_encode($fila['nombre_provincia']);
				$cod_pais =$fila['cod_pais'];
				$cod_pro =$fila['cod_pro'];
				$telefono =utf8_encode($fila['telefonos']);
				$limite_credito =$fila['limite_credito'];
				$cod_est =$fila['cod_estado'];
				$nombre_estado =utf8_encode($fila['nombre_estado']);
				$cod_laboral =$fila['cod_laboral'];	
				$profesion =utf8_encode($fila['profesion']);
				$sueldo =utf8_encode($fila['sueldo']);
				$empleador =utf8_encode($fila['empleador']);
				$antiguedad =$fila['antiguedad'];
				$telefono_empl =utf8_encode($fila['telefono_empl']);
				$domicilio_emple =utf8_encode($fila['domicilio_emple']);
				$cod_prop =$fila['cod_prop'];
				$descripcionp =utf8_encode($fila['descripcionp']);
				$descripcion =utf8_encode($fila['descripcion']);		
				/****garante***/
				$cod_garante=$fila['cod_garante'];
				$nombre_ga =utf8_encode($fila['nomb']);
				$apellido_ga=utf8_encode($fila['ape']);
				$telefono_ga=utf8_encode($fila['telf']);
				$domicilio_ga=utf8_encode($fila['domi']);
				$profesion_ga=utf8_encode($fila['prof']);
				$sueldo_ga=utf8_encode($fila['sul']);
				$dni_ga=utf8_encode($fila['dni_ga']);
				$img=$fila['img'];
				/**************/
				$flag =$fila['flag'];
			}   	
		}	
		require_once('../vista/nuevo_cliente.php');
	}
	public function get_grid_clientes($parametros){
		return $this->data->get_grid_clientes($parametros);
	}
	public function get_combo_estado($parametros){
		return $this->data->get_combo_estado($parametros);
	}
	public function get_combo_propiedad($parametros){
		return $this->data->get_combo_propiedad($parametros);
	}
	public function grabar_update_cliente($parametros){
		return $this->data->grabar_update_cliente($parametros);
	}
	public function set_img_clientes($parametros){
		return $this->data->set_img_clientes($parametros);
	}
	public function get_img($parametros){
		return $this->data->get_img($parametros);
	}
	public function get_grid_pais($parametros){
		return $this->data->get_grid_pais($parametros);
	}
	public function get_grid_provincias($parametros){
		return $this->data->get_grid_provincias($parametros);
	}
	public function general_desactivaActiva($parametros){
		return $this->data->general_desactivaActiva($parametros);
	}
}//fin action
?>