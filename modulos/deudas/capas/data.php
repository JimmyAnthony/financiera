<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET PERSONAL********/
	public function get_personal($parametros)
	{
		$query="select * from personal a
		left join otro_dato b on a.idper = b.idper";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		if (!$resultado){
			print "No se pudo ejecutar la consulta  : $query";
			return false;
		}
		$array00 = array();
        foreach($resultado as $fila){
			$fila['idper'] =$fila['idper'];
			$fila['dni'] =$fila['DNI'];
			$fila['flag'] =$fila['flag']==1?$fila['flag']='Inactivo':$fila['flag']='Activo';
			$fila['nombre'] =$fila['nombres']." ".$fila['apepa']." ".$fila['apema'];
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
}//fin class
?>