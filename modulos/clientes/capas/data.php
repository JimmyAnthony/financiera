<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET CLIENTES********/
	public function get_grid_clientes($parametros)
	{
		$query="select a.*,b.nombres as nomb,b.apellidos as ape from clientes a
		left join garante b on a.cod_garante = b.cod_garante";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_cli'] =$fila['cod_cli'];
			$fila['telefonos'] =$fila['telefonos'];
			$fila['dni'] =$fila['dni'];
			$fila['domicilio'] =utf8_encode($fila['domicilio']);
			$msj =utf8_encode($fila['nomb']);
			$fila['flag'] =((int)$fila['flag']==0)?"<img src='iconos/Note-Add.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'> Activo</div>":"<img src='iconos/Note-Remove.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'> Anulado</div>";
			$fila['nombres'] =utf8_encode($fila['nombres']);
			$fila['apellidos'] =utf8_encode($fila['apellidos']);
			$fila['nomb'] =utf8_encode($fila['nomb']." ".$fila['ape']);
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function form_nuevo_cliente($parametros)
	{
		$query="select a.*,b.nombres as nomb,b.apellidos as ape,b.telefonos as telf,b.domicilio as domi,b.profesion as prof,b.sueldo as sul,b.dni as dni_ga,e.nombre as nombre_pais,f.nombre as nombre_provincia,c.profesion,c.sueldo,c.empleador,c.antiguedad,c.telefono as telefono_empl,c.domicilio as domicilio_emple from clientes a
		left join garante b on a.cod_garante = b.cod_garante
		left join laboral c on a.cod_laboral = c.cod_lab
		left join propiedad d on a.cod_prop = d.cod_prop
		left join pais e on a.cod_pais = e.cod_pais
		left join provincia f on a.cod_pro = f.cod_provincia
		left join estado_civil g on a.cod_estado = g.cod_estado 
		where a.cod_cli = ".$parametros['cod_cli'];
		return $this->links->execute($query);
	}
	public function get_combo_estado($parametros)
	{
		$query="select * from estado_civil";		
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_estado'] =$fila['cod_estado'];
			$fila['nombre'] =utf8_encode($fila['nombre']);			
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function get_combo_propiedad($parametros)
	{
		$query="select * from propiedad";		
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_estado'] =$fila['cod_prop'];
			$fila['nombre'] =utf8_encode($fila['nombre']);			
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function set_get_garante($parametros){//var_export($parametros);
		if(empty($parametros['cod_garante'])){//inserto
			$query="insert into garante(nombres,apellidos,telefonos,domicilio,profesion,dni,sueldo,fecha)values('".utf8_decode(trim($parametros['nombre_garante']))."','".utf8_decode(trim($parametros['apellidos_garante']))."','".utf8_decode(trim($parametros['telefono_garante']))."','".utf8_decode(trim($parametros['domicilio_garante']))."','".utf8_decode(trim($parametros['profesion_garante']))."',".utf8_decode(trim($parametros['dni_garant'])).",'".trim($parametros['sueldo_garante'])."','".date('Y-m-d H:i:s')."')";
			$resultado=$this->links->execute_xim($query);
			if(!$resultado)return;
			$querys="select max(cod_garante) as cod_garante from garante";
			$resultados = $this->links->execute($querys);
			
			foreach($resultados as $fila){
				$cod_garante =$fila['cod_garante'];
			}
		}else{//actualizo
			$query="update garante set nombres='".utf8_decode(trim($parametros['nombre_garante']))."',apellidos='".utf8_decode(trim($parametros['apellidos_garante']))."',telefonos='".utf8_decode(trim($parametros['telefono_garante']))."',domicilio='".utf8_decode(trim($parametros['domicilio_garante']))."',profesion='".utf8_decode(trim($parametros['profesion_garante']))."',dni=".utf8_decode(trim($parametros['dni_garant'])).",sueldo='".trim($parametros['sueldo_garante'])."',fecha='".date('Y-m-d H:i:s')."' where cod_garante=".$parametros['cod_garante'];
			$resultado=$this->links->execute_xim($query);
			if(!$resultado)return;
			$cod_garante =$parametros['cod_garante'];
		}	
		return $cod_garante;
	}
	public function set_get_laboral($parametros){
		if(empty($parametros['cod_laboral'])){//inserto
			$query="insert into laboral(profesion,sueldo,empleador,antiguedad,telefono,domicilio,fecha)values('".utf8_decode(trim($parametros['profesion']))."','".trim($parametros['sueldo'])."','".utf8_decode(trim($parametros['empleador']))."','".trim($parametros['antiguedad'])."','".trim($parametros['telefono_lab'])."','".utf8_decode(trim($parametros['domicilo_empresa']))."','".date('Y-m-d H:i:s')."')";
			$resultado=$this->links->execute_xim($query);
			if(!$resultado)return;
			$querys="select max(cod_lab) as cod_lab from laboral";
			$resultados = $this->links->execute($querys);
			
			foreach($resultados as $fila){
				$cod_laboral =$fila['cod_lab'];
			}
		}else{//actualizo
			$query="update laboral set profesion='".utf8_decode(trim($parametros['profesion']))."',sueldo='".trim($parametros['sueldo'])."',empleador='".utf8_decode(trim($parametros['empleador']))."',antiguedad='".trim($parametros['antiguedad'])."',telefono='".trim($parametros['telefono_lab'])."',domicilio='".utf8_decode(trim($parametros['domicilo_empresa']))."',fecha='".date('Y-m-d H:i:s')."' where cod_lab=".$parametros['cod_laboral'];
			$resultado=$this->links->execute_xim($query);
			if(!$resultado)return;
			$cod_laboral =$parametros['cod_laboral'];
		}	
		return $cod_laboral;
	}
	public function grabar_update_cliente($parametros){
		$parametros['cod_garante']=$this->set_get_garante($parametros);
		if(empty($parametros['cod_garante']))return json_encode(array('est'=>2));
		$parametros['cod_laboral']=$this->set_get_laboral($parametros);
		if(empty($parametros['cod_laboral']))return json_encode(array('est'=>2));
		
		if(empty($parametros['cod_cli'])){//inserto
			$query="insert into clientes(nombres,apellidos,fecha,nacimiento,edad,dni,domicilio,cod_pais,cod_pro,telefonos,limite_credito,cod_estado,cod_garante,cod_laboral,cod_prop,	descripcionp,descripcion,fecha_creacion)values('".utf8_decode(trim($parametros['nombres']))."','".utf8_decode(trim($parametros['apellidos']))."','".trim($parametros['fecha_registro'])."','".trim($parametros['fecha_nacimiento'])."',".trim($parametros['edad']).",".utf8_decode(trim($parametros['dni'])).",'".utf8_decode(trim($parametros['domicilio']))."',".trim($parametros['cod_pais']).",".trim($parametros['cod_pro']).",'".trim($parametros['telefono'])."','".trim($parametros['limite_credito'])."',".trim($parametros['estado_civil']).",".trim($parametros['cod_garante']).",".trim($parametros['cod_laboral']).",".trim($parametros['tipo_propiedad']).",'".utf8_decode(trim($parametros['descripcion_pro']))."','".utf8_decode(trim($parametros['observaciones']))."','".date('Y-m-d H:i:s')."')";		
			$resultado  = $this->links->execute_xim($query);
		}else{//actualizo
			$query="update clientes set nombres='".utf8_decode(trim($parametros['nombres']))."',apellidos='".utf8_decode(trim($parametros['apellidos']))."',fecha='".trim($parametros['fecha_registro'])."',nacimiento='".trim($parametros['fecha_nacimiento'])."',edad=".trim($parametros['edad']).",dni=".utf8_decode(trim($parametros['dni'])).",domicilio='".utf8_decode(trim($parametros['domicilio']))."',cod_pais=".trim($parametros['cod_pais']).",cod_pro=".trim($parametros['cod_pro']).",telefonos='".trim($parametros['telefono'])."',limite_credito='".trim($parametros['limite_credito'])."',cod_estado=".trim($parametros['estado_civil']).",cod_garante=".trim($parametros['cod_garante']).",cod_laboral=".trim($parametros['cod_laboral']).",cod_prop=".trim($parametros['tipo_propiedad']).",descripcionp='".utf8_decode(trim($parametros['descripcion_pro']))."',descripcion='".utf8_decode(trim($parametros['observaciones']))."',fecha_creacion='".date('Y-m-d H:i:s')."' where cod_cli = ".$parametros['cod_cli'];		
			$resultado  = $this->links->execute_xim($query);
		}
			$men = 0;
			if($resultado)$men = 1;
			return json_encode(array('est'=>$men));
	}
	public function set_img_clientes($parametros)
	{	
		$querys="select * from clientes where cod_cli=".$parametros['cod_cli'];
		$resultados  = $this->links->execute($querys);
		foreach($resultados as $filas){
			if(!empty($filas['img']))unlink("../galeria/clientes/".$filas['img']);
		}
		$query="update clientes set img='".trim($parametros['img'])."' where cod_cli=".$parametros['cod_cli'];		
		$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return $men;
	}
	public function get_img($parametros)
	{
		$query="select * from clientes where cod_cli=".$parametros['cod_cli'];	
		$resultado  = $this->links->execute($query);
		//var_export($result);
		/*if (!$resultado){
			print "No se pudo ejecutar la consulta  : $query";
			return false;
		}*/
        foreach($resultado as $fila){
			$img =$fila['img'];		
        }
        return json_encode(array('img'=>$img));
	}
	/********GET PAISES********/
	public function get_grid_pais($parametros)
	{
		$query="select * from pais where flag=0";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_pais'] =$fila['cod_pais'];
			$fila['nombre'] =utf8_encode($fila['nombre']);
			$fila['flag'] =$fila['flag'];
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	/********GET PROVINCIAS********/
	public function get_grid_provincias($parametros)
	{
		$query="select * from provincia where flag=0 and cod_pais = ".$parametros['cod_pais'];
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){ 
			$fila['cod_provincia'] =$fila['cod_provincia'];	
			$fila['cod_pais'] =$fila['cod_pais'];
			$fila['nombre'] =utf8_encode($fila['nombre']);
			$fila['flag'] =$fila['flag'];
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function general_desactivaActiva($param)
	{
		$cod_cli = $param['cod_cli'];
		$ids  = explode(',',$cod_cli);
		for($i = 0;$i<count($ids);++$i){
			if(!empty($ids[$i])){
			$query="update clientes set flag = ".$param['flag'].", fecha_creacion = '".date('Y-m-d H:i:s')."' where cod_cli = ".$ids[$i];
			$resultado  = $this->links->execute_xim($query);
			}
		}
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
}//fin class
?>