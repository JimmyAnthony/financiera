<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********USUARIO**********/
	public function ingreso_user($parametros){
		$parametros['pass'] = sha1($parametros['pass']);
		$resultado=$this->data->ingreso_user($parametros);
		$num = mysql_num_rows($resultado);
		//var_export($resultado);
		if($num){
			while($fila = mysql_fetch_array($resultado)){
				$nombres = $fila['nombres'];
				$apellidos = $fila['apellidos'];
			}
		}
        $men = 0;
		if($num)$men = 1;
		return json_encode(array('est'=>$men,'nombres'=>$nombres,'apellidos'=>$apellidos));
	}
}//fin action
?>