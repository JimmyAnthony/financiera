<?php
class data{
private $consultas;
private $links;
	public function __construct(){
	$wichFactory = Parameter::MySQL;
		$this->links = DAOFactory::getConnection($wichFactory);
	}
	/********GET PERSONAL********/
	public function grid_recibos($parametros)
	{
		$query="select *,a.fecha as fex from recibo a 
		inner join clientes b on a.cod_cli = b.cod_cli order by cod_recibo desc";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_recibo'] =$fila['cod_recibo'];
			$fila['cod_recibo_c'] ="R-".$fila['cod_recibo'];
			$fila['fecha'] =date('d/m/Y',strtotime($fila['fex']));
			$fila['nombres'] =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);
			$fila['cobro'] =number_format($fila['cobro'],2);
			$fila['recibido'] =number_format($fila['recibido'],2);
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
	public function get_cuotas($parametros)
	{
		$query="select a.*,DATEDIFF(vence,NOW()) as diferencia,b.cod_tipo,DATEDIFF(vence,fecha_cuota) as dias_vence  from detalle_credito a
		inner join credito b on a.cod_credito = b.cod_credito where b.cod_cli =".$parametros['cod_cli']." 
		and cod_det_credito not in(select a.cod_det_credito from detalle_recibo a inner join recibo b on a.cod_recibo= b.cod_recibo where cod_cli=".$parametros['cod_cli'];
		//if(!empty($parametros['cod_recibo']))$query.=" and b.cod_recibo=".$parametros['cod_recibo'];
		$query.=") and b.flag = 0 order by cod_det_credito ";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
		$j=1;
		/**********OBTENIEENDO MORA**************/
		$resultados = $this->get_tiempo_mora();
		foreach($resultados as $fila){
			$tiempo =$fila['tiempo_mora'];
			$tasa =$fila['tasa']; 
			$aplica =$fila['flag'];
			$vencimiento =$fila['vencimiento'];
        }
		/****************************************/
        foreach($resultado as $fila){
			$fila['nro_cuota'] =$fila['nro_cuota'];
			$fila['cod_det_credito'] =$fila['cod_det_credito'];
			$fila['abonado']='0.00';
			$fila['cod_credito'] =$fila['cod_credito'];
			$fila['nro_cuota_cli'] ="C-".$fila['nro_cuota'];
			$fila['cod_credito_cli'] ="P-".$fila['cod_credito'];
			$fila['fecha_cuota'] =date('d/m/Y',strtotime($fila['fecha_cuota']));
			$fila['fecha_vence'] =date('d/m/Y',strtotime($fila['vence']));	
			$fila['cuota_total'] =$fila['valor_cuota'];
			$fila['interes_periodico'] =$fila['interes'];
			$fila['amortizacion'] =$fila['amortizacion'];
			$fila['capital_vivo'] =$fila['capital_vivo'];
			$fila['mora'] = $this->analizar_vencimiento($fila['cod_tipo'],$fila['amortizacion'],$fila['diferencia'],$aplica,$tiempo,$tasa,$fila['flag_cred'],$fila['mora'],$fila['dias_vence']);//$fila['mora']
			$fila['saldo_cuota'] =$fila['saldo_cuota']+$fila['mora'];
			$fila['flag_x']=(int)$fila['flag_cred'];
			$fila['flag'] =((int)$fila['flag_cred']==1)?"<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'>Cancelado</div>":"<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'>Pendiente</div>";		
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
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
	public function redondear($valor){
		return round($valor,2);
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
	public function grabar_update_recibo($parametros)
	{	

		if(empty($parametros['cod_recibo'])){
			$query="insert into recibo (fecha,cod_cli,cod_cobrador,importe,cobro,moras,recibido)values('".date('Y-m-d H:i:s')."','".$parametros['cod_cli']."','".$parametros['cod_cobrador']."','".$parametros['importe']."','".$parametros['cobrar']."','".$parametros['total_mora']."','".$parametros['recibido']."')";
			$resultado  = $this->links->execute_xim($query);
			$maxid ="select max(cod_recibo) from recibo";
			$resul  = $this->links->execute($maxid);
			$ids = explode(',',$parametros['cod_det_credito']);
			$mora = explode(',',$parametros['mora']);
			for($i = 0;$i<count($ids);++$i){
				if(!empty($ids[$i])){
					$querys="insert into detalle_recibo (cod_recibo,cod_det_credito,fecha)values(".$resul[0][0].",".$ids[$i].",'".date('Y-m-d H:i:s')."')";
					$resultado  = $this->links->execute_xim($querys);
					$pagado = "update detalle_credito set estado=1,mora='".$mora[$i]."' where cod_det_credito = ".$ids[$i];
					$resultado  = $this->links->execute_xim($pagado);
				}
			}
			$men = 0;
			if($resultado)$men = 1;
			return json_encode(array('est'=>$men,'cod_recibo'=>$resul[0][0]));
		}else{
		
			$query="update recibo set fecha='".date('Y-m-d H:i:s')."',cod_cli='".$parametros['cod_cli']."',cod_cobrador='".$parametros['cod_cobrador']."',importe='".$parametros['importe']."',cobro='".$parametros['cobrar']."',moras='".$parametros['total_mora']."',recibido='".$parametros['recibido']."' where cod_recibo=".$parametros['cod_recibo'];
			$resultado  = $this->links->execute_xim($query);

			$dele ="delete from detalle_recibo where cod_recibo = ".$parametros['cod_recibo'];
			$resul  = $this->links->execute_xim($dele);
			$ids = explode(',',$parametros['cod_det_credito']);
			for($i = 0;$i<count($ids);++$i){
				if(!empty($ids[$i])){
					$querys="insert into detalle_recibo (cod_recibo,cod_det_credito,fecha)values(".$parametros['cod_recibo'].",".$ids[$i].",'".date('Y-m-d H:i:s')."')";
					$resultado  = $this->links->execute_xim($querys);
					$pagado = "update detalle_credito set estado=1 where cod_det_credito = ".$ids[$i];
					$resultado  = $this->links->execute_xim($pagado);
				}	
			}
			$men = 0;
			if($resultado)$men = 1;
			return json_encode(array('est'=>$men,'cod_recibo'=>$parametros['cod_recibo']));
		}
	}
	public function get_recibo_solo($parametros){
		$query="select *,a.fecha as fex,c.nombres as nombres_cobra,c.apellidos as apellidos_cobra,c.cod_cobra,b.nombres as nombres_cli,b.apellidos as apellidos_cli  from recibo a 
		inner join clientes b on a.cod_cli = b.cod_cli 
		left join cobradores c on a.cod_cobrador= c.cod_cobra  where a.cod_cli = ".$parametros['cod_cli'];
		if(!empty($parametros['cod_recibo']))$query.=" and a.cod_recibo=".$parametros['cod_recibo'];
		$query .=" order by cod_recibo desc";
		return $this->links->execute($query);
	}
	public function cod_recibo($parametros){
		$query="select cod_credito from detalle_recibo a
		inner join  detalle_credito b on a.cod_det_credito = b.cod_det_credito 	
		where a.cod_recibo=".$parametros['cod_recibo']." limit 1";
		$data = $this->links->execute($query);
		return $data[0][0];
	}
	public function get_cuotas_cobradas($parametros)
	{
		$query="select a.* from detalle_credito a
		inner join credito b on a.cod_credito = b.cod_credito where b.cod_cli =".$parametros['cod_cli']." 
		and cod_det_credito in(select a.cod_det_credito from detalle_recibo a inner join recibo b on a.cod_recibo= b.cod_recibo where cod_cli=".$parametros['cod_cli']." and b.cod_recibo=".$parametros['cod_recibo']." and b.flag=0)  order by cod_det_credito ";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
		$j=1;
        foreach($resultado as $fila){
			$fila['nro_cuota'] =$fila['nro_cuota'];
			$fila['cod_det_credito'] =$fila['cod_det_credito'];
			$fila['abonado']='0.00';
			$fila['cod_credito'] =$fila['cod_credito'];
			$fila['nro_cuota_cli'] ="C-".$fila['nro_cuota'];
			$fila['cod_credito_cli'] ="P-".$fila['cod_credito'];
			$fila['fecha_cuota'] =date('d/m/Y',strtotime($fila['fecha_cuota']));
			$fila['fecha_vence'] =date('d/m/Y',strtotime($fila['vence']));	
			$fila['cuota_total'] =$fila['valor_cuota'];
			$fila['interes_periodico'] =$fila['interes'];
			$fila['amortizacion'] =$fila['amortizacion'];
			$fila['capital_vivo'] =$fila['capital_vivo'];
			$fila['mora'] =$fila['mora'];
			$fila['saldo_cuota'] =$fila['saldo_cuota'];
			$fila['flag_x']=1;
			$fila['flag'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#33CC99;float:left;padding-left:5px;'>Cancelado</div>";		
            $array00[]=$fila;
        }
        $array = array(
            'success'=>true,
            'total'=>count($resultado),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function get_tiempo_mora(){
		$query="select * from interes_mora where estado=0";
		return $this->links->execute($query);
		//var_export($result);
	}
	/***************IMPRIMIR RECIBO******************/
	public function get_calculo_generado_print($parametros)
	{
		$query="select c.* from detalle_recibo a 
		inner join recibo b on a.cod_recibo= b.cod_recibo 
		inner join detalle_credito c on a.cod_det_credito =c.cod_det_credito	
		where cod_cli=".$parametros['cod_cli']." and b.cod_recibo=".$parametros['cod_recibo']." and b.flag=0 and c.estado=1";
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
	public function grid_cobradores($parametros)
	{
		$query="select * from cobradores where flag=0 order by nombres,apellidos desc";
		$parametros['start'] = isset($parametros['start']) ? $parametros['start'] : 0;
		$parametros['limit'] = isset($parametros['limit']) ? $parametros['limit'] : 80;
		$query.=" limit ".$parametros['start'].",".$parametros['limit'];
		$resultado  = $this->links->execute($query);
		//var_export($result);
		$array00 = array();
        foreach($resultado as $fila){
			$fila['cod_cobra'] =$fila['cod_cobra'];
			$fila['nombres'] =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);
			//$fila['nombres'] =$fila['nombres']." ".$fila['apellidos'];	
			$fila['dni'] =$fila['dni'];
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
}//fin class
?>