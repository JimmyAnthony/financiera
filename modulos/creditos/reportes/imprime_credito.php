<?php
ini_set('memory_limit','528M');
ob_clean();
//define('FPDF_FONTPATH','../../../../../phpscript_class/pdf/font/');
require_once "../../../factory/Parameter.class.php";
require_once "../../../factory/DAOFactory.class.php";
require_once("../../../pdf/fpdf.php");
require_once("../capas/data.php");
$data = new data();
/*************DATOS DE LA EMPRESA*****************/
$resp = $data->datos_empresa($oo);
foreach($resp as $datos){
$img = $datos['img'];
$nombre = $datos['nombre'];
$sub_titulo = $datos['sub_titulo'];
$direccion = $datos['direccion'];
$telefono = $datos['telefono'];
$horario = $datos['horario'];
$ruc = $datos['ruc'];
$web = $datos['web'];
$email = $datos['email'];
}
/*************DATOS DEL CLIENTE*****************/
$parametros['cod_cli']=$_REQUEST['cod_cli'];
$resp = $data->datos_cliente($parametros);
foreach($resp as $datos){
$cod_cli = $datos['cod_cli'];
$nombres_cli = $datos['nombres']." ".$datos['apellidos'];
$nacimiento = $datos['nacimiento'];
$edad = $datos['edad'];
$dni = $datos['dni'];
$domicilio = $datos['domicilio'];
$telefonos_cli = $datos['telefonos'];
$limite_credito = $datos['limite_credito'];
$nombres_ga = $datos['nombres_ga']." ".$datos['apellidos_g'];
$nombre_pais_pro = $datos['nombre_pais']."/".$datos['nombre_prov'];
}
/*************DATOS DEL CREDITO*****************/
$parametros['cod_credito']=$_REQUEST['cod_credito'];
$resp = $data->datos_credito($parametros);
foreach($resp as $datos){
$cod_credito = $datos['cod_credito'];
$fecha_emision = $datos['fecha'];
$tasa_interes = $datos['tasa_interes'];
$prestamo = $datos['prestamo'];
$cuotas = $datos['cuotas'];
$valor_cuota = $datos['valor_cuota'];
$fecha_calculo = $datos['fecha_calculo'];
$total_credito = $datos['total_credito'];
$nota = $datos['nota'];
$tipo= $datos['tipo'];
$metodo= $datos['metodo'];
}
/**********************************************/
class PDF extends FPDF
{
	function Header()
	{
	global $img;
	global $nombre;
	global $sub_titulo;
	global $direccion;
	global $telefono;
	global $ruc;
	global $horario;
	global $web;
	global $email;
	/**/
	global $cod_cli;
	global $nombres_cli;
	global $nacimiento;
	global $edad;
	global $dni;
	global $domicilio;
	global $telefonos_cli;
	global $limite_credito;
	global $nombres_ga;
	global $nombre_pais_pro;
	/**/
	global $cod_credito;
	global $fecha_emision;
	global $tasa_interes;
	global $prestamo;
	global $cuotas;
	global $valor_cuota;
	global $fecha_calculo;
	global $total_credito;
	global $nota;
	global $tipo;
	global $metodo;
	
	$fecha =date("d/m/Y,H:i:s");
	$this->SetX(10);	
	$this->SetY(10);
	$this->Image('../../../galeria/empresa/'.$img.'',170,7,30);
	$this->SetFont('times','',10);	
	$this->SetX(90)	;		
	$this->SetXY(10,15);
	$this->Cell(170,10,strtoupper($nombre),0,0,'L');
	//$this->Cell(140,10,'Fecha y hora: '.$fecha,0,0,'R');
	$this->Ln(6);
	$this->SetXY(10,20);
	$this->Cell(170,10,strtoupper($sub_titulo),0,0,'L');
	//$this->Cell(148,10,'Usuario:'.$user,0,0,'R');
	$this->Ln(6);
	$this->SetFont('times','',8);	
	$this->SetXY(10,20);
	$this->Cell(23,20,'Direccion/Horario:',0,0,'L');
	$this->Cell(150,20,$direccion.' / '.$horario,0,0,'L');
	$this->Ln(5);
	$this->SetFont('times','',8);	
	$this->SetXY(10,25);
	$this->Cell(20,20,'Telefonos/Ruc:',0,0,'L');
	$this->Cell(150,20,$telefono.' / '.$ruc,0,0,'L');
	$this->Ln(5);
	$this->SetFont('times','',8);	
	$this->SetXY(10,30);
	$this->Cell(18,20,'Web/Correo:',0,0,'L');
	$this->Cell(150,20,$web.' / '.$email,0,0,'L');
	$this->Ln(5);
	$this->SetFont('times','',8);	
	$this->SetXY(10,35);
	$this->Cell(18,20,'Fecha y Hora:',0,0,'L');
	$this->Cell(150,20,$fecha,0,0,'L');
	$this->Ln(10);
	
	$this->SetFont('times','',15);
	$this->Cell(190,10,'REPORTE DE CREDITO',0,0,'C');
	$this->Ln(10);
	$this->SetFont('times','',8);
	//$this->SetXY(10,30);
	/************************************************/
	$this->SetFont('times','',8);	
	$this->SetXY(12,47);
	$this->Cell(18,27,'Cod-Cliente:',0,0,'L');
	$this->Cell(95,27,'CLI-'.$cod_cli,0,0,'L');
	/*->*/
	$this->Cell(18,27,'Cod-Prestamo:',0,0,'L');
	$this->Cell(20,27,'P-'.$cod_credito,0,0,'L');
	/*->*/
	/*->*/
	$this->Cell(18,27,'Emision:',0,0,'L');
	$this->Cell(50,27,date('d/m/Y',strtotime($fecha_emision)),0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->SetX(12);
	$this->Cell(18,35,'Nombre:',0,0,'L');
	$this->Cell(95,35,utf8_encode($nombres_cli),0,0,'L');
	/*->*/
	$this->Cell(18,35,utf8_decode('Interés %:'),0,0,'L');
	$this->Cell(50,35,number_format($tasa_interes,2),0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->SetX(12);
	$this->Cell(18,45,'Telefono/DNI:',0,0,'L');
	$this->Cell(95,45,$telefonos_cli."/".$dni,0,0,'L');
	/*->*/
	$this->Cell(18,45,'Nro Cuotas:',0,0,'L');
	$this->Cell(50,45,$cuotas,0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->SetX(12);
	$this->Cell(18,55,'Domicilio:',0,0,'L');
	$this->Cell(95,55,utf8_encode($domicilio),0,0,'L');
	/*->*/
	$this->Cell(18,55,'Tipo Credito:',0,0,'L');
	$this->Cell(50,55,utf8_encode($tipo),0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->SetX(12);
	$this->Cell(18,65,'Pais/Provincia:',0,0,'L');
	$this->Cell(95,65,utf8_encode($nombre_pais_pro),0,0,'L');
	/*->*/
	$this->Cell(18,65,'Metodo:',0,0,'L');
	$this->Cell(50,65,utf8_encode($metodo),0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->SetX(12);
	$this->Cell(18,75,'Garante:',0,0,'L');
	$this->Cell(95,75,utf8_encode($nombres_ga),0,0,'L');
	/*->*/
	$this->Cell(18,75,'Prestamo:',0,0,'L');
	$this->Cell(50,75,number_format($prestamo,2),0,0,'L');
	/*->*/
	$this->Ln(1);
	/**/
	$this->Ln();
	/***********************************************/
	$this->SetXY(10,55);
	$this->MultiCell(190,40,'',1,1,'L');
	/*$this->Ln(0);
	$this->Cell(190,10,'_____________________',0,0,'C');*/
	$this->Ln(1);
	$this->SetFont('times','',13);
    $this->Cell(190,2,'',0,0,'C');
	$this->Ln(1);
	
	$this->Cell(190,2,'',0,0,'L');
	$this->Cell(5,2,'____________________________________________________________________________________',0,0,'R');
	$this->SetX(4,15);
	$this->Ln(2);
	$this->SetTitle('REPORTE DE CREDITO');
	$this->SetFont('times','',10);
	$this->SetX(8);
	$this->Cell(23,12,'    Fecha',0,0,'C');
	$this->Cell(21,12,' Valor Cuota',0,0,'C');
	$this->Cell(21,12,utf8_decode('Interés'),0,0,'C');
	$this->Cell(25,12,utf8_decode('Amortización'),0,0,'C');
	$this->Cell(21,12,utf8_decode('Capital Vivo'),0,0,'C');
	$this->Cell(21,12,utf8_decode('mora'),0,0,'C');
	$this->Cell(21,12,utf8_decode('Total Cuota'),0,0,'C');
	$this->Cell(21,12,utf8_decode('vence'),0,0,'C');
	$this->Cell(21,12,utf8_decode('Estado'),0,0,'C');
	$this->Cell(1.5,15,'_____________________________________________________________________________________________________________',0,0,'R');
	$this->Ln(9);
	}
	
	function Footer()
	{
	global $num_areas;
	$this->SetY(-25);
	//$this->Cell(78,10,'Total de Cargos:'.$num_areas,0,0,'C');
	//$this->Ln(5);
	//$this->Cell(79,10,utf8_decode('Av. Carlos Izaguirre N° 813 Urb. Mercurio'),0,0,'C');
	
//	$this->Cell(74,10,'www.munilosolivos.gob.pe',0,0,'C');
	$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
	}
} 
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();
$cont=1;
$total_c=0;
$parametros['cod_credito']=$_REQUEST['cod_credito'];
$resultados = $data->get_calculo_generado_print($parametros);
foreach($resultados as $item){
		 if((int)$item['estado']==1){$estado='Cancelado';}else{$estado='Pendiente';}
		 $pdf->Ln(1);
		 $pdf->SetFont('Arial','',7);
		 $pdf->Cell(5,4,$cont."- ",0,0,'L',0);
		 //$pdf->SetXY(8,$y);
		 $pdf->Cell(22,4," ".date('d/m/Y',strtotime($item['fecha_cuota'])),0,0,'L',0);
		 //$pdf->SetXY(25,$y);
		 $pdf->Cell(21,4,number_format($item['valor_cuota'],2),0,0,'L',0);
		 $pdf->Cell(23,4,number_format($item['interes'],2),0,0,'L',0);	
		 $pdf->Cell(22,4,number_format($item['amortizacion'],2),0,0,'L',0);
		 $pdf->Cell(23,4,number_format($item['capital_vivo'],2),0,0,'L',0);
		 $pdf->Cell(20,4,number_format($item['mora'],2),0,0,'L',0);
		 $pdf->Cell(19,4,number_format(($item['saldo_cuota']+$item['mora']),2),0,0,'L',0);
		 $pdf->Cell(21,4,date('d/m/Y',strtotime($item['vence'])),0,0,'L',0);
		 $pdf->Cell(25,4,$estado,0,0,'L',0);
		 $pdf->Ln(5);
		//$pdf->SetXY(50,$y-3);
		 $pdf->Cell(195,-2,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,0,'C');
		
		//$pdf->Ln(25);
		
		$cont+=1;
		$total_c = $total_c +($item['saldo_cuota']+$item['mora']);
		/*$y=$y+15;
		//echo " --- ".$y;
		$xim++;
		if($y>240){
			if($xim==12){
			$pdf->AddPage();
			$y=90;
			$xim=0;
			}
		}*/
		
	}
 $pdf->Ln(10);
 $pdf->Ln(-4.5); 
 $pdf->Cell(172,6,'................................................',0,0,'R');
 $pdf->Ln(3); 
 $pdf->Cell(10,7,'Total de cuotas : '.(((int)$cont)-1).'               Total Credito : '.number_format($total_c,2),0,0,'L');
 $pdf->Cell(155,7,'FIRMA CLIENTE',0,0,'R');
   
 $pdf->Output(); 
?> 