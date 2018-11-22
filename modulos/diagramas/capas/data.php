<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET INFO DIAGRAMAS-XIM********/
	public function get_diagramas_data($parametros)
	{
		$query="select * from credito a
		inner join detalle_credito b on a.cod_credito = b.cod_credito where a.cod_cli=1 and a.cod_credito=3 order by nro_cuota";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){	
			$fila['fecha_cuota']=date('d/m/Y',strtotime($fila['fecha_cuota']));		
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function get_creditos($parametros)
	{
		$query="select * from credito a
		inner join clientes b on a.cod_cli = b.cod_cli where a.flag=0 order by b.nombres";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){	
			$fila['cod_credito']=$fila['cod_credito'];
			$fila['cod_credito_t']="P-".$fila['cod_credito'];
			$fila['cod_cli']=$fila['cod_cli'];
			$fila['cod_cli_t']="CLI-".$fila['cod_cli'];
			$fila['nombres']=utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);
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