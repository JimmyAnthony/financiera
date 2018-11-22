<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********RECIBOS**********/
	public function get_recibos($parametros){
		require_once('../vista/recibos.php');
	}
	public function form_nuevo_recibo($parametros){
		$load = 'false';
		$paramer = "op:'get_cuotas'";
		$paramer_cobrado = "op:'get_cuotas_cobradas'";
		$cod_credito=0;
		$cod_cobra=0;
		if($parametros['editar']=='editar'){
			$load = 'true';			
			$resultado = $this->data->get_recibo_solo($parametros);
			 foreach($resultado as $fila){
				$cod_recibo =$fila['cod_recibo'];
				$cod_cli =$fila['cod_cli'];
				$cobrador =utf8_encode($fila['nombres_cobra'])." ".utf8_encode($fila['apellidos_cobra']);
				$cod_cobra =$fila['cod_cobra'];
				$cod_recibo_c ="R-".$fila['cod_recibo'];
				$fecha =date('d/m/Y',strtotime($fila['fex']));
				$nombres =utf8_encode($fila['nombres_cli'])." ".utf8_encode($fila['apellidos_cli']);	
				$importe =$fila['importe'];
				$mora =$fila['mora'];
				$cobro =$fila['cobro'];
				$recibido =$fila['recibido'];
				$flag=$fila['flag_cred'];	
				$param['cod_recibo']=$fila['cod_recibo'];
				$cod_credito =$this->data->cod_recibo($param);	
				if(empty($cod_cobra))$cod_cobra=0;	
			}
			$paramer = "op:'get_cuotas',cod_cli:".$cod_cli;
			$paramer_cobrado = "op:'get_cuotas_cobradas',cod_cli:".$cod_cli.",cod_recibo:".$cod_recibo;
		}
		
		require_once('../vista/nuevo_recibo.php');
	}
	public function get_cuotas($parametros){
		return $this->data->get_cuotas($parametros);
	}
	public function get_clientes($parametros){
		return $this->data->get_clientes($parametros);
	}
	public function grabar_update_recibo($parametros){
		return $this->data->grabar_update_recibo($parametros);
	}
	public function grid_recibos($parametros){
		return $this->data->grid_recibos($parametros);
	}
	public function get_cuotas_cobradas($parametros){
		return $this->data->get_cuotas_cobradas($parametros);
	}
	public function grid_cobradores($parametros){
		return $this->data->grid_cobradores($parametros);
	}
}//fin action
?>