<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET COBRADORES********/	
	public function get_grid_cobradores($parametros)
	{
		$query="select * from cobradores";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_cobra'] =$fila['cod_cobra'];
			$fila['fecha'] =date('d/m/Y',strtotime($fila['fecha']));
			$fila['nombre'] =utf8_encode($fila['nombres']);
			$fila['nombres'] =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);			
			$fila['apellido'] =utf8_encode($fila['apellidos']);
			$fila['dni'] =utf8_encode($fila['dni']);
			$fila['telefono'] =utf8_encode($fila['telefono']);
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
	public function set_cobrador($parametros)
	{
		switch((int)$parametros['modo']){
			case 1:
				$query="insert into cobradores (dni,nombres,apellidos,telefono,fecha)values('".trim($parametros['dni'])."','".utf8_decode(trim($parametros['nombres']))."','".utf8_decode(trim($parametros['apellidos']))."','".trim($parametros['telefono'])."','".date('Y-m-d H:i:s')."')";
			break;
			case 2:
				$query="update cobradores set dni='".trim($parametros['dni'])."', nombres='".utf8_decode(trim($parametros['nombres']))."' , apellidos='".utf8_decode(trim($parametros['apellidos']))."', telefono='".utf8_decode(trim($parametros['telefono']))."', fecha='".date('Y-m-d H:i:s')."' where cod_cobra = ".$parametros['cod_cobra'];		
			break;
		}
		$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function set_activa_desactiva_cobra($parametros)
	{
		$cod_cobra = explode(',',$parametros['cod_cobra']);
		for($i = 0;$i<count($cod_cobra);++$i){
			if(!empty($cod_cobra[$i])){
			$query="update cobradores set flag = ".$parametros['flag']." where cod_cobra = ".$cod_cobra[$i];
			$resultado  = $this->links->execute_xim($query);
			}
		}
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
}//fin class
?>