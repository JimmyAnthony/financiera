<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********SOLICITUDES**********/
	public function get_solicitudes($parametros){
		require_once('../vista/solicitudes.php');
	}
	public function get_personal($parametros){
		return $this->data->get_personal($parametros);
	}
}//fin action
?>