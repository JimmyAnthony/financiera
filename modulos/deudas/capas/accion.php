<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********SOLICITUDES**********/
	public function get_deudas($parametros){
		require_once('../vista/deudas.php');
	}
	public function form_nuevo_credito($parametros){
		require_once('../vista/nuevo_credito.php');
	}
}//fin action
?>