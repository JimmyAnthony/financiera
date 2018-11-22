<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********USUARIO********/
	public function ingreso_user($parametros)
	{
		$query="select * from usuarios where user='".trim($parametros['user'])."' and pass = '".trim($parametros['pass'])."' and flag = 0";
		$resultado  = $this->links->execute_xim($query);
		//var_export($result);
		if (!$resultado){
			print "No se pudo ejecutar la consulta  : $query";
			return false;
		}
		return $resultado;
	}
}//fin class
?>