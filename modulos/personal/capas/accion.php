<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********BUSCADOR**********/
	public function vista_buscador($parametros){
		require_once('../vista/buscador.php');
	}
	public function get_personal($parametros){
		return $this->data->get_personal($parametros);
	}
}//fin action
?>