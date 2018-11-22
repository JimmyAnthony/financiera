<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET PERSONAL********/
	public function datos_empresa($parametros)
	{
		$query="select * from empresa";		
		return $this->links->execute($query);
		//var_export($resultado);
	}
	public function interes_mora($parametros)
	{
		$query="select * from interes_mora";		
		return $this->links->execute($query);
	}
	public function get_fecha_no_habiles($parametros)
	{
		$query="select * from dias_no_habiles";
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
			$fila['cod_dias_no_hab'] =$fila['cod_dias_no_hab'];
			$fila['fecha'] =date('d/m/Y',strtotime($fila['fecha']));
			$fila['descripcion'] =utf8_encode($fila['descripcion']);
			$fila['flag'] = ((int)$fila['flag']==0)?"<img src='iconos/Note-Add.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'> Activo</div>":"<img src='iconos/Note-Remove.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'> Inactivo</div>";
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function set_empresa($parametros)
	{
		$query="select * from empresa";
		$resultado  = $this->links->execute($query);
		$num = $this->links->numRows();
		if($num > 0){
			$query="update empresa set nombre='".utf8_decode(trim($parametros['nombre']))."', sub_titulo='".utf8_decode(trim($parametros['sub_titulo']))."', cuidad='".utf8_decode(trim($parametros['ciudad']))."', direccion='".utf8_decode(trim($parametros['direccion']))."', telefono='".utf8_decode(trim($parametros['telefono']))."', web='".utf8_decode(trim($parametros['web']))."', email='".utf8_decode(trim($parametros['correo']))."', horario='".utf8_decode(trim($parametros['horario']))."', ruc='".utf8_decode(trim($parametros['ruc']))."',  fecha='".date('Y-m-d H:i:s')."'";//img='".utf8_decode(trim($parametros['img']))."',
		}else{
			$query ="insert into empresa(nombre,sub_titulo,cuidad,direccion,telefono,web,email,horario,ruc,fecha)value('".utf8_decode(trim($parametros['nombre']))."','".utf8_decode(trim($parametros['sub_titulo']))."','".utf8_decode(trim($parametros['ciudad']))."','".utf8_decode(trim($parametros['direccion']))."','".utf8_decode(trim($parametros['telefono']))."','".utf8_decode(trim($parametros['web']))."','".utf8_decode(trim($parametros['correo']))."','".utf8_decode(trim($parametros['horario']))."','".utf8_decode(trim($parametros['ruc']))."','".date('Y-m-d H:i:s')."')";//'".utf8_decode(trim($parametros['img']))."',//img,
		}
		$resultado  = $this->links->execute_xim($query);
		
		$query="select * from interes_mora";
		$resultado  = $this->links->execute($query);
		$num = $this->links->numRows();
		if($num > 0){
			$query="update interes_mora set tasa=".trim($parametros['tasa']).", tiempo_mora=".trim($parametros['mora']).", vencimiento=".trim($parametros['vencimiento']).", flag=".trim($parametros['flag']);
		}else{
			$query ="insert into interes_mora(tasa,tiempo_mora,vencimiento,flag)value(".trim($parametros['tasa']).",".trim($parametros['mora']).",".trim($parametros['vencimiento']).",".trim($parametros['flag']).")";
		}
		$resultado  = $this->links->execute_xim($query);
		
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function get_dias_no_habiles($parametros)
	{
		$query="select * from dias_no_habiles where cod_dias_no_hab = ".$parametros['cod_dia'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		if (!$resultado){
			print "No se pudo ejecutar la consulta  : $query";
			return false;
		}
        foreach($resultado as $fila){
			$codigo =$fila['cod_dias_no_hab'];
			$fecha =date('d/m/Y',strtotime($fila['fecha']));
			$descripcion =utf8_encode($fila['descripcion']);
			$flag =$fila['flag']==1?$fila['flag']='Inactivo':$fila['flag']='Activo';
        }
        return json_encode(array('codigo'=>$codigo,'fecha'=>$fecha,'descripcion'=>$descripcion,'flag'=>$flag));
		
	}
	public function set_dias_no_habiles($parametros)
	{
		switch((int)$parametros['modo']){
			case 1:
				$query="insert into dias_no_habiles (fecha,descripcion)values('".trim($parametros['fecha'])."','".utf8_decode(trim($parametros['descripcion']))."')";
			break;
			case 2:
				$query="update dias_no_habiles set fecha='".trim($parametros['fecha'])."', descripcion='".utf8_decode(trim($parametros['descripcion']))."' where cod_dias_no_hab = ".$parametros['cod_dia'];		
			break;
		}
		$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function set_activa_desactiva_dias($parametros)
	{
		$cod_dias = explode(',',$parametros['cod_dias']);
		for($i = 0;$i<count($cod_dias);++$i){
			if(!empty($cod_dias[$i])){
			$query="update dias_no_habiles set flag = ".$parametros['flag']." where cod_dias_no_hab = ".$cod_dias[$i];
			$resultado  = $this->links->execute_xim($query);
			}
		}
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function set_img_empresa($parametros)
	{	
		$querys="select * from empresa";
		$resultados  = $this->links->execute($querys);
		foreach($resultados as $filas){
			if(!empty($filas['img']))unlink("../galeria/empresa/".$filas['img']);
		}
		$query="update empresa set img='".trim($parametros['img'])."'";					
		$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function get_img($parametros)
	{
		$query="select * from empresa";
		$resultado  = $this->links->execute($query);
		//var_export($result);
		if (!$resultado){
			print "No se pudo ejecutar la consulta  : $query";
			return false;
		}
        foreach($resultado as $fila){
			$img =$fila['img'];		
        }
        return json_encode(array('img'=>$img));
	}
}//fin class
?>