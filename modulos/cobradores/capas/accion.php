<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********BUSCADOR**********/	
	public function datos_cobradores($parametros){
		require_once('../vista/datos_cobradores.php');
	}
	public function get_grid_cobradores($parametros){
		return $this->data->get_grid_cobradores($parametros);
	}
	public function set_cobrador($parametros){
		return $this->data->set_cobrador($parametros);
	}
	public function set_activa_desactiva_cobra($parametros){
		return $this->data->set_activa_desactiva_cobra($parametros);
	}
}//fin action
?>
