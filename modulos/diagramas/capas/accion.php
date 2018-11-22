<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********DIAGRAMAS**********/
	public function get_diagrama($parametros){
		require_once('../vista/diagramas.php');
	}
	public function get_diagramas_data($parametros){
		return $this->data->get_diagramas_data($parametros);
	}
	public function get_creditos($parametros){
		return $this->data->get_creditos($parametros);
	}	
}//fin action
?>