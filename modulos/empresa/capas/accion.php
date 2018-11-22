<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********BUSCADOR**********/
	public function datos_empresa($parametros){
		$resultado = $this->data->datos_empresa($parametros);
        foreach($resultado as $fila){
			$cod_empresa =$fila['cod_empresa'];
			$nombre =utf8_encode($fila['nombre']);
			$sub_titulo =utf8_encode($fila['sub_titulo']);
			$cuidad =utf8_encode($fila['cuidad']);
			$direccion =utf8_encode($fila['direccion']);
			$telefono =utf8_encode($fila['telefono']);
			$web =utf8_encode($fila['web']);
			$email =utf8_encode($fila['email']);
			$horario =utf8_encode($fila['horario']);
			$ruc =$fila['ruc'];
			$img =$fila['img'];
			$fecha =$fila['fecha'];
			$flag =$fila['flag'];			
        }   
		$resultados = $this->data->interes_mora($parametros);
		foreach($resultados as $fila){
			$cod_mora =$fila['cod_mora'];
			$tasa =$fila['tasa'];
			$tiempo_mora =(!empty($fila['tiempo_mora']))?$fila['tiempo_mora']:0;
			$vencimiento =(!empty($fila['vencimiento']))?$fila['vencimiento']:0;
			$flag =((int)$fila['flag']==1)?'true':'false';
			$flag2 =((int)$fila['flag']==0)?'true':'false';				
        }    
		require_once('../vista/datos_empresa.php');
	}
	public function get_fecha_no_habiles($parametros){
		return $this->data->get_fecha_no_habiles($parametros);
	}
	public function set_empresa($parametros){
		return $this->data->set_empresa($parametros);
	}
	public function get_dias_no_habiles($parametros){
		return $this->data->get_dias_no_habiles($parametros);
	}
	public function set_dias_no_habiles($parametros){
		return $this->data->set_dias_no_habiles($parametros);
	}
	public function set_activa_desactiva_dias($parametros){
		return $this->data->set_activa_desactiva_dias($parametros);
	}
	public function set_img_empresa($parametros){
		return $this->data->set_img_empresa($parametros);
	}
	public function get_img($parametros){
		return $this->data->get_img($parametros);
	}
	
}//fin action
?>
