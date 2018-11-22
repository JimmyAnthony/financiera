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
	public function get_combo_metodos($parametros)
	{
		$query="select * from metodo";
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_metodo'] =$fila['cod_metodo'];
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
	public function get_combo_tipo_credito($parametros)
	{
		$query="select * from tipo_credito";
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_tipo'] =$fila['cod_tipo'];
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
	public function get_combo_entrega($parametros)
	{
		$query="select * from tipo_entrega where flag =0";
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_entrega'] =$fila['cod_entrega'];
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
	public function get_clientes($parametros)
	{
		$query="select * from clientes where flag=0";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_cli'] =$fila['cod_cli'];
			$fila['nombres'] =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);			
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function grabar_update_nuevo_recibo($parametros)
	{
	$tiempo_mora = $this->get_tiempo_mora();
		switch((int)$parametros['opcion']){
			case 1://insertar
				$querys="insert into credito(fecha,cod_cli,tasa_interes,cod_metodo,prestamo,cuotas,cod_tipo,valor_cuota,fecha_calculo,total_credito,nota,cod_entrega,fecha_creado,flag)values('".trim($parametros['fecha'])."','".trim($parametros['cod_cli'])."','".trim($parametros['tasa_interes'])."','".trim($parametros['cod_metodo'])."','".trim($parametros['prestamo'])."','".trim($parametros['cuotas'])."','".trim($parametros['cod_tipo'])."','".trim($parametros['valor_cuota'])."','".trim($parametros['fecha_calculo'])."','".trim($parametros['total_credito'])."','".utf8_decode(trim($parametros['nota']))."','".trim($parametros['cod_entrega'])."','".date('Y-m-d H:i:s')."',0)";
				$this->links->execute_xim($querys);
				
				$query="select max(cod_credito) as cod_metodo from credito limit 1";
				$resultado  = $this->links->execute($query);
				$cod_cred = $resultado[0][0];
				switch(trim($parametros['cod_metodo'])){
					case 1:
						
					break;
					case 2:
						$i =  ($parametros['tasa_interes']/100);
						$forma = (1+$i);
						$ext = pow($forma,$parametros['cuotas']);
						if($i>0){
							$cuota_total = $parametros['prestamo'] * (($ext*$i)/($ext-1));
						}else{
							$cuota_total = ($parametros['prestamo'] / $parametros['cuotas']);
						}
						//$cuota_total = $this->redondear($cuota_total);
						$amortizacion = $cuota_total - ($parametros['prestamo']*$i);
						$amortizacion = $this->redondear($amortizacion);
						$interes_periodico= $parametros['prestamo']*$i;
						$interes_periodico=$this->redondear_solo($interes_periodico);
						$capital_vivo = ($parametros['prestamo'] - $cuota_total) + $interes_periodico;	
						$capital_vivo = $this->redondear($capital_vivo);
					
						//$fila['amortizacion'] =number_format($amortizacion,2);
						//$interes_periodico =$interes_periodico;
						//$fila['capital_vivo'] =number_format($capital_vivo,2);
						$mora='0.00';
						$cuota_total =$this->redondear($cuota_total);
						
						//$fecha_calculo = date('d/m/Y',strtotime($parametros['fecha_calculo']));
						//$parametros['fecha_calculo']=date('Y/m/d',strtotime($parametros['fecha_calculo']));
						$fecha_calculo=date('Y/m/d',strtotime($parametros['fecha_calculo']));
						$fecha_vence=$this->fecha($parametros['fecha_calculo'],$tiempo_mora,1,0);
						//$fecha=date('d/m/Y',strtotime('+1 month'));
						$fila['flag']=1;
						$x=1;
						$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_calculo)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
						$resultado  = $this->links->execute_xim($query);
						$x++;
						$array00[]=$fila;
					   for($o=1;$o<$parametros['cuotas'];$o++){		
							$amortizacion = $cuota_total - ($capital_vivo*$i);	
							$amortizacion = $this->redondear($amortizacion);		
							$interes_periodico = $capital_vivo*$i;
							//$interes_periodico = $this->redondear_solo($interes_periodico);
							$capital_vivo = ($capital_vivo - $cuota_total) + $interes_periodico;
							//$capital_vivo = $this->redondear($capital_vivo);							
							$interes_periodico =$interes_periodico;
							$capital_vivo = $this->redondear($capital_vivo);
							$mora='0.00';
							$cuota_total =$this->redondear($cuota_total);
							$fecha_cuota=$this->fecha($parametros['fecha_calculo'],$o,$parametros['cod_tipo'],0);
							$fecha_vence=$this->fecha($parametros['fecha_calculo'],$o,$parametros['cod_tipo'],$tiempo_mora);
							
							$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_cuota)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
							$this->links->execute_xim($query);$x++;
						}
					break;
					case 3:
					
					break;
				}
			break;
			case 2://Actualizar
				$existe ="select a.cod_det_credito from detalle_recibo a
				inner join recibo b on a.cod_recibo = b.cod_recibo where a.cod_det_credito in(select cod_det_credito from detalle_credito where cod_credito=".trim($parametros['cod_credito']).") and b.flag = 0 and a.flag = 0";				
				$ex = $this->links->execute($existe);
				//var_export($ex);
				if(!empty($ex[0])){return json_encode(array('est'=>2));}
				$querys="update  credito set fecha = '".trim($parametros['fecha'])."',cod_cli='".trim($parametros['cod_cli'])."',tasa_interes='".trim($parametros['tasa_interes'])."',cod_metodo='".trim($parametros['cod_metodo'])."',prestamo='".trim($parametros['prestamo'])."',cuotas='".trim($parametros['cuotas'])."',cod_tipo='".trim($parametros['cod_tipo'])."',valor_cuota='".trim($parametros['valor_cuota'])."',fecha_calculo='".trim($parametros['fecha_calculo'])."',total_credito='".trim($parametros['total_credito'])."',nota='".utf8_decode(trim($parametros['nota']))."',cod_entrega='".trim($parametros['cod_entrega'])."',fecha_creado='".date('Y-m-d H:i:s')."',flag=0 where cod_credito = ".trim($parametros['cod_credito']);
				$this->links->execute_xim($querys);
				
				$query="delete from detalle_credito where cod_credito= ".trim($parametros['cod_credito']);
				$resultado  = $this->links->execute_xim($query);
				
				$cod_cred = trim($parametros['cod_credito']);
				switch(trim($parametros['cod_metodo'])){
					case 1:
						
					break;
					case 2:
						$i =  ($parametros['tasa_interes']/100);
						$forma = (1+$i);
						$ext = pow($forma,$parametros['cuotas']);
						if($i>0){
							$cuota_total = $parametros['prestamo'] * (($ext*$i)/($ext-1));
						}else{
							$cuota_total = ($parametros['prestamo'] / $parametros['cuotas']);
						}
						//$cuota_total = $this->redondear($cuota_total);
						$amortizacion = $cuota_total - ($parametros['prestamo']*$i);
						$amortizacion = $this->redondear($amortizacion);
						$interes_periodico= $parametros['prestamo']*$i;
						$interes_periodico=$this->redondear_solo($interes_periodico);
						$capital_vivo = ($parametros['prestamo'] - $cuota_total) + $interes_periodico;
						$capital_vivo = $this->redondear($capital_vivo);
					
						//$fila['amortizacion'] =number_format($amortizacion,2);
						//$interes_periodico =$interes_periodico;
						//$fila['capital_vivo'] =number_format($capital_vivo,2);
						$mora='0.00';
						$cuota_total =$this->redondear($cuota_total);
						
						//$fecha_calculo = date('d/m/Y',strtotime($parametros['fecha_calculo']));
						$fecha_calculo=date('Y/m/d',strtotime($parametros['fecha_calculo']));
						$fecha_vence=$this->fecha($parametros['fecha_calculo'],$tiempo_mora,1,0);
						//$fecha=date('d/m/Y',strtotime('+1 month'));
						$fila['flag']=1;
						$x=1;
						$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_calculo)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
						$resultado  = $this->links->execute_xim($query);
						$array00[]=$fila;
					  $x++;
					   for($o=1;$o<$parametros['cuotas'];$o++){
							$amortizacion = $cuota_total - ($capital_vivo*$i);	
							$amortizacion = $this->redondear($amortizacion);		
							$interes_periodico = $capital_vivo*$i;
							//$interes_periodico = $this->redondear_solo($interes_periodico);
							$capital_vivo = ($capital_vivo - $cuota_total) + $interes_periodico;
							//$capital_vivo = $this->redondear($capital_vivo);							
							$interes_periodico =$interes_periodico;
							$capital_vivo = $this->redondear($capital_vivo);
							$mora='0.00';
							$cuota_total =$this->redondear($cuota_total);
							$fecha_cuota=$this->fecha($parametros['fecha_calculo'],$o,$parametros['cod_tipo'],0);
							$fecha_vence=$this->fecha($parametros['fecha_calculo'],$o,$parametros['cod_tipo'],$tiempo_mora);
							
							$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_cuota)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
							$this->links->execute_xim($query); $x++;
						}
					break;
					case 3:
					
					break;
				}	
			break;
		}
		//$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function redondear($valor){
		return round($valor,2);
	}
	public function redondear_solo($valor){
		return round($valor);
	}
	public function get_lista_creditos($parametros)
	{
		$query="select *,a.flag as flag_cred,c.nombre as nombre_metodo,d.nombre as nombre_tipo,e.nombre as nombre_entrega from credito a 
		inner join clientes b on a.cod_cli=b.cod_cli
		inner join metodo c on a.cod_metodo=c.cod_metodo
		inner join tipo_credito d on a.cod_tipo=d.cod_tipo
		inner join tipo_entrega e on a.cod_entrega=e.cod_entrega order by a.cod_credito";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);		
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_credito'] =$fila['cod_credito'];
			$fila['fecha'] =date('d/m/Y',strtotime($fila['fecha']));
			$fila['cod_cli'] =$fila['cod_cli'];
			$fila['nombres'] =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);
			$fila['tasa_interes'] =$fila['tasa_interes'];
			$fila['cod_metodo'] =$fila['cod_metodo'];
			$fila['nombre_metodo'] =$fila['nombre_metodo'];
			$fila['prestamo'] =number_format($fila['prestamo'],2);
			$fila['cuotas'] =$fila['cuotas'];
			$fila['cod_tipo'] =$fila['cod_tipo'];
			$fila['nombre_tipo'] =$fila['nombre_tipo'];
			$fila['valor_cuota'] =number_format($fila['valor_cuota'],2);
			$fila['fecha_calculo'] =$fila['fecha_calculo'];
			$fila['total_credito'] =number_format($fila['total_credito'],2);
			$fila['nota'] =$fila['nota'];
			$fila['cod_entrega'] =$fila['cod_entrega'];
			$fila['nombre_entrega'] =$fila['nombre_entrega'];
			$msj =utf8_encode($fila['nombre']);

			$fila['flag'] =((int)$fila['flag_cred']==0)?"<img src='iconos/Note-Add.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'> Activo</div>":"<img src='iconos/Note-Remove.png' border='none' title='$msj' style='float:left;'><div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'> Anulado</div>";
						
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function set_general_desactivaActiva($param)
	{
		$cod_credito = $param['cod_credito'];
		$ids  = explode(',',$cod_credito);
		for($i = 0;$i<count($ids);++$i){
			if(!empty($ids[$i])){
			$query="update credito set flag = ".$param['flag'].", fecha_creado = '".date('Y-m-d H:i:s')."' where cod_credito = ".$ids[$i];
			$resultado  = $this->links->execute_xim($query);
			}
		}
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function get_gredito($parametros){
		$query="select *,a.flag as flag_cred,c.nombre as nombre_metodo,d.nombre as nombre_tipo,e.nombre as nombre_entrega,a.fecha as fecha_cred from credito a 
		inner join clientes b on a.cod_cli=b.cod_cli
		inner join metodo c on a.cod_metodo=c.cod_metodo
		inner join tipo_credito d on a.cod_tipo=d.cod_tipo
		inner join tipo_entrega e on a.cod_entrega=e.cod_entrega where a.cod_credito = ".$parametros['cod_credito']." order by a.cod_credito";
		//$query.=" limit 1,1";
		return  $this->links->execute($query);
		//var_export($result);		
	}
	public function get_calculo_generado($parametros)
	{
		$query="select a.*,DATEDIFF(a.vence,NOW()) as diferencia,b.cod_tipo,DATEDIFF(a.vence,a.fecha_cuota) as dias_vence from detalle_credito a
		inner join credito b on a.cod_credito=b.cod_credito where b.cod_credito =".$parametros['cod_credito']." order by cod_det_credito";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);	
		/**********OBTENIEENDO MORA**************/
		$resultados = $this->get_mora();
		foreach($resultados as $fila){
			$tiempo =$fila['tiempo_mora'];
			$tasa =$fila['tasa'];
			$aplica =$fila['flag'];
			$vencimiento =$fila['vencimiento'];
        }
		/****************************************/
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_credito'] =$fila['cod_credito'];
			$fila['fecha_cuota_tiempo']=$fila['fecha_cuota'];
			$fila['fecha_cuota'] =date('d/m/Y',strtotime($fila['fecha_cuota']));			
			$fila['fecha_vence'] =date('d/m/Y',strtotime($fila['vence']));
			$fila['cuota_total_t'] =$fila['valor_cuota'];	
			$fila['cuota_total'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#339999;float:left;padding-left:0px;'>".$fila['valor_cuota']."</div>";;
			$fila['interes_periodico']=$fila['interes'];
			$fila['amortizacion'] =$fila['amortizacion'];
			$fila['capital_vivo'] =$fila['capital_vivo'];
			$fila['mora'] =$this->analizar_vencimiento($fila['cod_tipo'],$fila['amortizacion'],$fila['diferencia'],$aplica,$tiempo,$tasa,$fila['flag'],$fila['mora'],$fila['dias_vence']);//flag_cred $fila['mora'];
			$fila['saldo_cuota'] =$fila['saldo_cuota']+$fila['mora'];
			$fila['flag'] =$fila['flag'];
			$fila['estado']=$fila['estado'];
			$fila['estado_muestra'] =((int)$fila['estado']==1)?"<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'>Cancelado</div>":"<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'>Pendiente</div>";		
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function grabar_update_renueva_cuotas($parametros)
	{
	$tiempo_mora = $this->get_tiempo_mora();
		switch((int)$parametros['opcion']){
			case 1:
				$cod_cred = $parametros['cod_credito'];
				switch(trim($parametros['cod_metodo'])){
					case 1:
						
					break;
					case 2:
						 $especifica ="update credito set nota = '".strtoupper($parametros['nota']).". LAS CUOTAS QUE SE MUESTRAN ACTUALMENTE, PUEDE NO PERTENECER AL NUMERO GENERADO DE CUOTAS ANTERIOR, NI LA CANTIDAD DEL VALOR TOTAL DE LA CUOTA POR MOTIVO DE RENOVACION DE CUOTAS.' where cod_credito = ".$parametros['cod_credito'];
						$this->links->execute_xim($especifica);
						$dele = "delete from detalle_credito where cod_credito =".$parametros['cod_credito']." and nro_cuota >= ".$parametros['nro_cuota'];
						$resultado  = $this->links->execute_xim($dele);
						$i =  ($parametros['interes']/100);
						$forma = (1+$i);
						$ext = pow($forma,$parametros['nro_cuotas']);
						if($i>0){
							$cuota_total = $parametros['capital_vivo'] * (($ext*$i)/($ext-1));
						}else{
							$cuota_total = ($parametros['capital_vivo'] / $parametros['nro_cuotas']);
						}
						//$cuota_total = $this->redondear($cuota_total);
						$amortizacion = $cuota_total - ($parametros['capital_vivo']*$i);
						$amortizacion = $this->redondear($amortizacion);
						$interes_periodico= $parametros['capital_vivo']*$i;
						$interes_periodico=$this->redondear_solo($interes_periodico);
						$capital_vivo = ($parametros['capital_vivo'] - $cuota_total) + $interes_periodico;	
						$capital_vivo = $this->redondear($capital_vivo);
					
						//$fila['amortizacion'] =number_format($amortizacion,2);
						//$interes_periodico =$interes_periodico;
						//$fila['capital_vivo'] =number_format($capital_vivo,2);
						$mora='0.00';
						$cuota_total =$this->redondear($cuota_total);
						
						//$parametros['fecha_calculo']=date('Y/d/m',strtotime($parametros['fecha_calculo']));
						$fecha_calculo=date('Y/m/d',strtotime($parametros['fecha_calculo']));
						$fecha_vence=$this->fecha($parametros['fecha_calculo'],$tiempo_mora,1,0);//date('Y/m/d',strtotime($parametros['fecha_calculo']));
						//$fecha=date('d/m/Y',strtotime('+1 month'));
						$fila['flag']=1;
						$x=$parametros['nro_cuota'];
						$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_calculo)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
						$resultado  = $this->links->execute_xim($query);
						$x++;
						$array00[]=$fila;
					   for($o=1;$o<$parametros['nro_cuotas'];$o++){		
							$amortizacion = $cuota_total - ($capital_vivo*$i);
							$amortizacion = $this->redondear($amortizacion);
							$interes_periodico = $capital_vivo*$i;
							//$interes_periodico = $this->redondear_solo($interes_periodico);
							$capital_vivo = ($capital_vivo - $cuota_total) + $interes_periodico;
							//$capital_vivo = $this->redondear($capital_vivo);							
							$interes_periodico =$interes_periodico;
							$capital_vivo = $this->redondear($capital_vivo);
							$mora='0.00';
							$cuota_total =$this->redondear($cuota_total);
							$fecha_calculo=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],0);
							$fecha_vence=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],$tiempo_mora);
							
							$query="insert into detalle_credito(cod_credito,nro_cuota,fecha_cuota,valor_cuota,interes,amortizacion,capital_vivo,mora,saldo_cuota,vence)values('".trim($cod_cred)."',".trim($x).",'".trim($fecha_calculo)."','".trim($cuota_total)."','".trim($interes_periodico)."','".trim($amortizacion)."','".trim($capital_vivo)."','".trim($mora)."','".trim($cuota_total)."','".trim($fecha_vence)."')";
							$this->links->execute_xim($query);$x++;
						}
					break;
					case 3:
					
					break;
				}
			break;
		}
		//$resultado  = $this->links->execute_xim($query);
		$men = 0;
		if($resultado)$men = 1;
		return json_encode(array('est'=>$men));
	}
	public function fecha($fecha,$o,$modo,$vence){
		$fecha = strtotime($fecha);
		switch($modo){
			case 1://dias
				$fecha = date('Y/m/d',strtotime(date('Y/m/d',$fecha).' +'.$o.' day'.' +'.$vence.' day'));
			break;
			case 2://semanas
				$fecha = date('Y/m/d',strtotime(date('Y/m/d',$fecha).' +'.$o.' week'.' +'.$vence.' day'));
			break;
			case 3://quincenas
					$forma =15*$o; 
					$fecha = date('Y/m/d',strtotime(date('Y/m/d',$fecha).' +'.$forma.' day'.' +'.$vence.' day'));		
			break;
			case 4://meses
				$fecha = date('Y/m/d',strtotime(date('Y/m/d',$fecha).' +'.$o.' month'.' +'.$vence.' day'));
			break;
			case 5://años
				$fecha = date('Y/m/d',strtotime(date('Y/m/d',$fecha).' +'.$o.' year'.' +'.$vence.' day'));
			break;			
		}
		return $fecha;
	}
	public function get_tiempo_mora(){
		$query="select * from interes_mora where estado=0";
		$resultado  = $this->links->execute($query);
		//var_export($result);
        foreach($resultado as $fila){
			$tiempo_mora =$fila['vencimiento'];
        }
		if(!$resultado)$tiempo_mora=0;
        return $tiempo_mora;
	}
	public function get_mora(){
		$query="select * from interes_mora where estado=0";
		return $this->links->execute($query);
		//var_export($result);
	}
	public function analizar_vencimiento($cod_tipo,$k,$dias_vencidos,$aplica,$tiempo,$tasa,$estado,$mora_actual,$vencimiento){
	//echo $vencimiento."--";
	//echo $tasa."---";
		if((int)$aplica==1){
			if((int)$estado==0){
				if($this->is_negative($dias_vencidos)){
					/***************APLICANDO_FORMULA DE LA MORA********/
					/*switch((int)$cod_tipo){
						case 1:
						$mora= $k * ((($tasa/100)/1) * ($dias_vencidos*-1));
						$mora = $this->redondear($mora);
						break;
						case 2:
							$mora= $k * ((($tasa/100)/7) * ($dias_vencidos*-1));
							$mora = $this->redondear($mora);
						break;
						case 3:
							$mora= $k * ((($tasa/100)/15) * ($dias_vencidos*-1));
						$mora = $this->redondear($mora);
						break;
						case 4:*/
							$dias_v = (($dias_vencidos)*-1);
							//$tiempo_v=((int)$vencimiento+((int)$tiempo-1));
							if($tiempo <=$dias_v){
							//echo $tiempo."<->".$dias_v."<-";
								if($tiempo==0){$tiempo=-1;}else{$tiempo=$tiempo-1;}
								//echo ($dias_v)."---";
							$mora= $k * ((($tasa/100)/30) * ($dias_v-$tiempo));
							$mora = $this->redondear($mora);
							if($mora==0)$mora = '0.00';
							}else{
								$mora = '0.00';
							}
						/*break;
						case 5:
							$mora= $k * ((($tasa/100)/365) * ($dias_vencidos*-1));
						$mora = $this->redondear($mora);
						break;
					}*/
					/**************FIN*******************/
				}else{
					$mora = '0.00';
				}
			}else{
				$mora = $mora_actual;
			}
		}else{
			$mora = '0.00';
		}
		return $mora;
	}
	public function is_negative($x){
		if($x <=0){
			return true;
		}else{
			return false;
		}
	}
	/***************IMPRIMIR CREDITO******************/
	public function get_calculo_generado_print($parametros)
	{
		$query="select a.*,DATEDIFF(a.vence,NOW()) as diferencia,b.cod_tipo,DATEDIFF(a.vence,a.fecha_cuota) as dias_vence from detalle_credito a
		inner join credito b on a.cod_credito=b.cod_credito where b.cod_credito =".$parametros['cod_credito']." order by cod_det_credito";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		return $this->links->execute($query);		
	}
	/******************DATOS EMPRESA****************/
	public function datos_empresa($parametros)
	{
		$query="select * from empresa";		
		return $this->links->execute($query);
		//var_export($resultado);
	}
	public function datos_cliente($parametros)
	{
		$query="select a.*,b.nombres as nombres_ga,b.apellidos as apellidos_g,c.nombre as nombre_pais,d.nombre as nombre_prov from clientes a 
		inner join garante b on a.cod_garante=b.cod_garante 
		inner join pais c on a.cod_pais = c.cod_pais 
		inner join provincia d on c.cod_pais = d.cod_pais
		where a.cod_cli=".$parametros['cod_cli'];		
		return $this->links->execute($query);
		//var_export($resultado);
	}
	public function datos_credito($parametros)
	{
		$query="select a.*,b.nombre as tipo ,c.nombre as  metodo from credito a
		inner join tipo_credito b on a.cod_tipo=b.cod_tipo
		inner join metodo c on a.cod_metodo = c.cod_metodo
		where a.cod_credito =".$parametros['cod_credito']." and a.cod_cli=".$parametros['cod_cli'];		
		return $this->links->execute($query);
		//var_export($resultado);
	}
}//fin class
?>