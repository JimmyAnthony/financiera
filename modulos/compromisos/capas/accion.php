<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	public function get_compromisos($parametros){
		require_once('../vista/compromisos.php');
	}
	public function form_nuevo_credito($parametros){
		$proc = "op:'get_calculo_prestamo'";
		$load = "false";
		$hidden = "true";
		if($parametros['editar']=='editar'){
			$load = "true";
			$hidden = "false";
			$rs = $this->data->get_gredito($parametros);
			foreach($rs as $fila){
			$cod_credito =$fila['cod_credito'];
			$fecha =date('d/m/Y',strtotime($fila['fecha_cred']));
			$cod_cli =$fila['cod_cli'];
			$nombres =utf8_encode($fila['nombres'])." ".utf8_encode($fila['apellidos']);
			$tasa_interes =$fila['tasa_interes'];
			$cod_metodo =$fila['cod_metodo'];
			$nombre_metodo =$fila['nombre_metodo'];
			$prestamo=$fila['prestamo'];
			$cuotas =$fila['cuotas'];
			$cod_tipo =$fila['cod_tipo'];
			$nombre_tipo =$fila['nombre_tipo'];
			$valor_cuota =$fila['valor_cuota'];
			$fecha_calculo =date('d/m/Y',strtotime($fila['fecha_calculo']));
			$total_credito =$fila['total_credito'];
			$limite_credito =$fila['limite_credito'];
			$nota =utf8_encode($fila['nota']);
			$cod_entrega =$fila['cod_entrega'];
			$nombre_entrega =$fila['nombre_entrega'];
			$flag =$fila['flag_cred'];		
        	}
			$proc = "op:'get_calculo_generado',cod_credito:'".$cod_credito."'";
		}
		require_once('../vista/nuevo_credito.php');
	}
	public function get_combo_metodos($parametros){
		return $this->data->get_combo_metodos($parametros);
	}
	public function get_combo_tipo_credito($parametros){
		return $this->data->get_combo_tipo_credito($parametros);
	}
	public function get_clientes($parametros){
		return $this->data->get_clientes($parametros);
	}
	public function get_combo_entrega($parametros){
		return $this->data->get_combo_entrega($parametros);
	}
	public function get_calculo_prestamo($parametros){
		$tiempo_mora = $this->data->get_tiempo_mora();
		$array00 = array();
		switch((int)$parametros['metodo']){
		case 2:
			$i = ($parametros['tasa']/100);//($parametros['tasa'])/((365*30));
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
		
			$fila['amortizacion'] =number_format($amortizacion,2);
			$fila['interes_periodico'] =number_format($interes_periodico,2);
			$fila['capital_vivo'] =$this->redondear($capital_vivo);
			$fila['mora']='0.00';
			$fila['cuota_total'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#339999;float:left;padding-left:0px;'>".number_format($this->redondear($cuota_total),2)."</div>";
			$fila['cuota_total_t'] =$cuota_total;
			$fila['saldo_cuota']=$this->redondear($cuota_total);
			$oo=1;
			$fila['nro_cuota']=$oo;$oo++;
			//$fecha_calculo = date('d/m/Y',strtotime($parametros['fecha_calculo']));
			$fila['fecha_cuota']=date('d/m/Y',strtotime($parametros['fecha_calculo']));
			$fila['fecha_vence']=$this->fecha($parametros['fecha_calculo'],$tiempo_mora,1,0);
			//$fecha=date('d/m/Y',strtotime('+1 month'));
			$fila['estado_muestra']="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'>Pendiente</div>";
			$array00[]=$fila;
		   for($o=1;$o<$parametros['cuotas'];$o++){			
				$amortizacion = $cuota_total - ($capital_vivo*$i);	
				$amortizacion = $this->redondear($amortizacion);		
				$interes_periodico = $capital_vivo*$i;
				//$interes_periodico = $this->redondear_solo($interes_periodico);
				$capital_vivo = ($capital_vivo - $cuota_total) + $interes_periodico;
				//$capital_vivo = $this->redondear($capital_vivo);
				$fila['nro_cuota']=$oo;$oo++;
				$fila['amortizacion'] =number_format($amortizacion,2);
				$fila['interes_periodico'] =number_format($interes_periodico,2);
				$fila['capital_vivo'] =$this->redondear($capital_vivo);
				$fila['mora']='0.00';
				$fila['cuota_total_t'] =$cuota_total;
				$fila['cuota_total'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#339999;float:left;padding-left:0px;'>".number_format($cuota_total,2)."</div>";
				$fila['saldo_cuota']=$this->redondear($cuota_total);
				$fila['fecha_cuota']=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],0);
				$fila['fecha_vence']=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],$tiempo_mora );
				//$fila['fecha_vence']=$this->tiempo_mora($fila['fecha_vence'],$tiempo_mora,$o);
				//echo $this->fecha($parametros['fecha_calculo'],$o)."<br>";---O_o- xim
				//echo $fila['fecha_vence']."<br>";
				$array00[]=$fila;
			}
		break;
	}
        $array = array(
            'success'=>true,
            'total'=>count($array00),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function fecha($fecha,$o,$modo,$vence){
		$fecha = strtotime($fecha);
		switch($modo){
			case 1://dias
				$fecha = date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$o.' day'.' +'.$vence.' day'));
			break;
			case 2://semanas
				$fecha = date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$o.' week'.' +'.$vence.' day'));
			break;
			case 3://quincenas
					$forma =15*$o; 
					$fecha = date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$forma.' day'.' +'.$vence.' day'));		
			break;
			case 4://meses
				$fecha = date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$o.' month'.' +'.$vence.' day'));
			break;
			case 5://años
				$fecha = date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$o.' year'.' +'.$vence.' day'));
			break;			
		}
		return $fecha;
	}
	/*public function tiempo_mora($fecha,$tiempo,$periodo){
				$fecha = strtotime($fecha);			
				return date('d/m/Y',strtotime(date('Y/m/d',$fecha).' +'.$tiempo.' day'));
	}*/
	public function redondear($valor){
		return round($valor,2);
	}
	public function redondear_solo($valor){
		return round($valor);
	}
	public function grabar_update_nuevo_recibo($parametros){
		return $this->data->grabar_update_nuevo_recibo($parametros);
	}
	public function get_lista_creditos($parametros){
		return $this->data->get_lista_creditos($parametros);
	}
	public function set_general_desactivaActiva($parametros){
		return $this->data->set_general_desactivaActiva($parametros);
	}
	public function get_calculo_generado($parametros){
		return $this->data->get_calculo_generado($parametros);
	}
	public function grabar_update_recibo($parametros){
		return $this->data->grabar_update_recibo($parametros);
	}
	public function get_calculo_renova($parametros){
		$tiempo_mora = $this->data->get_tiempo_mora();
		$array00 = array();
		switch((int)$parametros['cod_metodo']){
		case 2:
			$i =  ($parametros['tasa_interes']/100);
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
		
			$fila['amortizacion'] =number_format($amortizacion,2);
			$fila['interes_periodico'] =number_format($interes_periodico,2);
			$fila['capital_vivo'] =number_format($capital_vivo,2);
			$fila['mora']='0.00';
			$fila['cuota_total'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#339999;float:left;padding-left:0px;'>".number_format($this->redondear($cuota_total),2)."</div>";
			$fila['saldo_cuota']=$this->redondear($cuota_total);
			//$parametros['fecha_calculo']='2011/12/19';date('Y/m/d',strtotime($parametros['fecha_calculo']));
			//$fecha_calculo = date('d/m/Y',strtotime($parametros['fecha_calculo']));
			$fila['fecha_cuota']=date('d/m/Y',strtotime(trim($parametros['fecha_calculo'])));
			$fila['fecha_vence']=$this->fecha($parametros['fecha_calculo'],$tiempo_mora,1,0);//date('d/m/Y',strtotime($parametros['fecha_calculo']));
			//$fecha=date('d/m/Y',strtotime('+1 month'));
			$fila['estado_muestra']="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#CC3333;float:left;padding-left:5px;'>Pendiente</div>";
			$array00[]=$fila;
		   for($o=1;$o<$parametros['nro_cuotas'];$o++){			
				$amortizacion = $cuota_total - ($capital_vivo*$i);	
				$amortizacion = $this->redondear($amortizacion);		
				$interes_periodico = $capital_vivo*$i;
				//$interes_periodico = $this->redondear_solo($interes_periodico);
				$capital_vivo = ($capital_vivo - $cuota_total) + $interes_periodico;
				//$capital_vivo = $this->redondear($capital_vivo);
				
				$fila['amortizacion'] =number_format($amortizacion,2);
				$fila['interes_periodico'] =number_format($interes_periodico,2);
				$fila['capital_vivo'] =number_format($capital_vivo,2);
				$fila['mora']='0.00';
				$fila['cuota_total'] ="<div style='font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; color:#339999;float:left;padding-left:0px;'>".number_format($cuota_total,2)."</div>";
				$fila['saldo_cuota']=$this->redondear($cuota_total);
				$fila['fecha_cuota']=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],0);
				$fila['fecha_vence']=$this->fecha($parametros['fecha_calculo'],$o,$parametros['tipo_credito'],$tiempo_mora);
				$array00[]=$fila;
			}
		break;
	}
        $array = array(
            'success'=>true,
            'total'=>count($array00),
            'data'=>$array00
        );
        return json_encode($array);
	}
	public function grabar_update_renueva_cuotas($parametros){
		return $this->data->grabar_update_renueva_cuotas($parametros);
	}
	
}//fin action
?>