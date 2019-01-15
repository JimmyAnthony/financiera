<?php
set_time_limit(0);
ini_set("memory_limit", "-1");

require_once PATH . 'libs/tcpdf/config/lang/spa.php';
require_once PATH . 'libs/tcpdf/tcpdf.php';

define('PATH_FONTS', PATH . 'libs/tcpdf/fonts/');
define('PATH_IMG', 'scanning');

//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	public function __construct(){
		parent::__construct();
		$this->width_page = $this->getPageWidth();
		$this->height_page = $this->getPageHeight();
		$this->LOTE=0;

		$this->img;
		$this->nombre;
		$this->sub_titulo;
		$this->direccion;
		$this->telefono;
		$this->ruc;
		$this->horario;
		$this->web;
		$this->email;
		/**/
		$this->cod_cli;
		$this->nombres_cli;
		$this->nacimiento;
		$this->edad;
		$this->dni;
		$this->domicilio;
		$this->telefonos_cli;
		$this->limite_credito;
		$this->nombres_ga;
		$this->nombre_pais_pro;
		/**/
		$this->cod_credito;
		$this->fecha_emision;
		$this->tasa_interes;
		$this->prestamo;
		$this->cuotas;
		$this->valor_cuota;
		$this->fecha_calculo;
		$this->total_credito;
		$this->nota;
		$this->tipo;
		$this->metodo;
		
		$fecha =date("d/m/Y,H:i:s");


	    $this->style_barra = array(
			'position' => '',
			'align' => 'C',
			'stretch' => false,
			'fitwidth' => true,
			'cellfitalign' => '',
			'border' => false,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255),
			'text' => true,
			'font' => 'calibri',
			'fontsize' => 10,
			'stretchtext' => 4
		);
		$this->addTTFfont(PATH_FONTS.'cour.ttf');
		// $this->addTTFfont('courbd.ttf');
		// $this->addTTFfont('courbi.ttf');
		// $this->addTTFfont('couri.ttf');

		$this->addTTFfont(PATH_FONTS.'calibri.ttf');
		$this->addTTFfont(PATH_FONTS.'calibrib.ttf');
		$this->addTTFfont(PATH_FONTS.'calibrii.ttf');
		$this->addTTFfont(PATH_FONTS.'calibriz.ttf');

		//$this->addTTFfont(PATH_FONTS.'ariblk.ttf');
	}
	public function Header() {
        
        $bMargin = $this->getBreakMargin();
        
        $auto_page_break = $this->AutoPageBreak;
        
        $this->SetAutoPageBreak(false, 0);
        
        $img_file = PATH.'/public_html/images/front/logo_condominios.png';
        //$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->Image($img_file,7,7,60);
        $W=50;
        $H=40;
        $X=($this->width_page/2)-($W/2);
		$Y=($this->height_page/2)-($H/2);

        $this->SetFont('calibrib', '', 16);
		$this->SetXY($X-($W+14), $Y-4);
		
		
		$fecha =date("d/m/Y,H:i:s");
		$this->SetX(10);	
		$this->SetY(10);
		$this->Image('images/qr_img_.png',170,7,30);
		$this->SetFont('times','',10);	
		$this->SetX(90)	;		
		$this->SetXY(10,15);
		$this->Cell(170,10,strtoupper($this->nombre),0,0,'L');
		//$this->Cell(140,10,'Fecha y hora: '.$fecha,0,0,'R');
		$this->Ln(6);
		$this->SetXY(10,20);
		$this->Cell(170,10,strtoupper($this->sub_titulo),0,0,'L');
		//$this->Cell(148,10,'Usuario:'.$user,0,0,'R');
		$this->Ln(6);
		$this->SetFont('times','',8);	
		$this->SetXY(10,20);
		$this->Cell(23,20,'Dirección/Horario:',0,0,'L');
		$this->Cell(150,20,$this->direccion.' / '.$this->horario,0,0,'L');
		$this->Ln(5);
		$this->SetFont('times','',8);	
		$this->SetXY(10,25);
		$this->Cell(20,20,'Teléfonos/Ruc:',0,0,'L');
		$this->Cell(150,20,$this->telefono.' / '.$this->ruc,0,0,'L');
		$this->Ln(5);
		$this->SetFont('times','',8);	
		$this->SetXY(10,30);
		$this->Cell(18,20,'Web/Correo:',0,0,'L');
		$this->Cell(150,20,$this->web.' / '.$this->email,0,0,'L');
		$this->Ln(5);
		$this->SetFont('times','',8);	
		$this->SetXY(10,35);
		$this->Cell(18,20,'Fecha y Hora:',0,0,'L');
		$this->Cell(150,20,$fecha,0,0,'L');
		$this->Ln(10);
		
		$this->SetFont('times','',15);
		$this->Cell(190,10,'REPORTE DE CRÉDITO',0,0,'C');
		$this->Ln(10);
		$this->SetFont('times','',8);
		//$this->SetXY(10,30);
		/************************************************/
		$this->SetFont('times','',8);
		$this->SetXY(12,47);
		$this->Cell(18,27,'Cod-Cliente:',0,0,'L');
		$this->Cell(95,27,'CLI-'.$this->cod_cli,0,0,'L');
		/*->*/
		$this->Cell(18,27,'Cod-Prestamo:',0,0,'L');
		$this->Cell(20,27,'P-'.$this->cod_credito,0,0,'L');
		/*->*/
		/*->*/
		$this->Cell(18,27,'Emisión:',0,0,'L');
		$this->Cell(50,27,date('d/m/Y',strtotime($this->fecha_emision)),0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->SetX(12);
		$this->Cell(18,35,'Nombre:',0,0,'L');
		$this->Cell(95,35,utf8_encode($this->nombres_cli),0,0,'L');
		/*->*/
		$this->Cell(18,35,utf8_decode('Interés %:'),0,0,'L');
		$this->Cell(50,35,number_format($this->tasa_interes,2),0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->SetX(12);
		$this->Cell(18,45,'Teléfono/DNI:',0,0,'L');
		$this->Cell(95,45,$this->telefonos_cli."/".$this->dni,0,0,'L');
		/*->*/
		$this->Cell(18,45,'Nro Cuotas:',0,0,'L');
		$this->Cell(50,45,$this->cuotas,0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->SetX(12);
		$this->Cell(18,55,'Domicilio:',0,0,'L');
		$this->Cell(95,55,utf8_encode($this->domicilio),0,0,'L');
		/*->*/
		$this->Cell(18,55,'Tipo Crédito:',0,0,'L');
		$this->Cell(50,55,utf8_encode($this->tipo),0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->SetX(12);
		$this->Cell(18,65,'Pais/Provincia:',0,0,'L');
		$this->Cell(95,65,utf8_encode($this->nombre_pais_pro),0,0,'L');
		/*->*/
		$this->Cell(18,65,'Método:',0,0,'L');
		$this->Cell(50,65,utf8_encode($this->metodo),0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->SetX(12);
		$this->Cell(18,75,'Garante:',0,0,'L');
		$this->Cell(95,75,utf8_encode($this->nombres_ga),0,0,'L');
		/*->*/
		$this->Cell(18,75,'Prestamo:',0,0,'L');
		$this->Cell(50,75,number_format($this->prestamo,2),0,0,'L');
		/*->*/
		$this->Ln(1);
		/**/
		$this->Ln();
		/***********************************************/
		$this->SetXY(10,55);
		//$this->MultiCell(190,40,'',1,1,'L');
		$this->MultiCell(190, 40, '', 1, 'L');
		/*$this->Ln(0);
		$this->Cell(190,10,'_____________________',0,0,'C');*/
		$this->Ln(1);
		$this->SetFont('times','',13);
	    $this->Cell(190,2,'',0,0,'C');
		$this->Ln(1);
		
		$this->Cell(190,2,'',0,0,'L');
		$this->Cell(3.7,2,'____________________________________________________________________________________',0,0,'R');
		$this->SetX(4,15);
		$this->Ln(2);
		$this->SetTitle('REPORTE DE CREDITO');
		$this->SetFont('times','',10);
		$this->SetX(15);
		$this->Cell(23,12,'    Fecha',0,0,'C');
		$this->Cell(21,12,' Valor Cuota',0,0,'C');
		$this->Cell(21,12,utf8_decode('Interés'),0,0,'C');
		$this->Cell(25,12,utf8_decode('Amortización'),0,0,'C');
		$this->Cell(21,12,utf8_decode('Capital Vivo'),0,0,'C');
		$this->Cell(18,12,utf8_decode('Mora'),0,0,'C');
		$this->Cell(25,12,utf8_decode('Total Cuota'),0,0,'C');
		$this->Cell(18,12,utf8_decode('Vencimiento'),0,0,'C');
		$this->Cell(21,12,utf8_decode('Estado'),0,0,'C');
		$this->Cell(0.5,15,'_____________________________________________________________________________________________________________',0,0,'R');
		$this->Ln(9);

        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        
        $this->setPageMark();
    }
	
	function Footer()
	{
	$this->num_areas;
	$this->SetY(-25);
	//$this->Cell(78,10,'Total de Cargos:'.$num_areas,0,0,'C');
	//$this->Ln(5);
	//$this->Cell(79,10,utf8_decode('Av. Carlos Izaguirre N° 813 Urb. Mercurio'),0,0,'C');
	
//	$this->Cell(74,10,'www.munilosolivos.gob.pe',0,0,'C');
	$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'R');
	}
}
//$pdf=new PDF();
//$pdf->Open();


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DSP');
$pdf->SetTitle('REPORTE DE CRÉDITO');
$pdf->SetSubject('TRASCENDER');
$pdf->SetKeywords('PDF,DSP');

/*************DATOS DE LA EMPRESA*****************/
$parametros['VP_CODIGO']=$_REQUEST['VP_CODIGO'];
$rs = $this->objDatos->SP_EMPRESA_RECORD($parametros);
foreach ($rs as $index => $datos){
	//$img = $datos['img'];
	$pdf->nombre = $datos['nombre'];
	$pdf->sub_titulo = $datos['sub_titulo'];
	$pdf->direccion = $datos['direccion'];
	$pdf->telefono = $datos['telefono'];
	$pdf->horario = $datos['horario'];
	$pdf->ruc = $datos['ruc'];
	$pdf->web = $datos['web'];
	$pdf->email = $datos['email'];
}

/*************DATOS DEL CLIENTE*****************/
$parametros['VP_CODIGO_CLIENTE']=$_REQUEST['VP_CODIGO_CLIENTE'];
$rs = $this->objDatos->SP_CLIENTES_RECORD($parametros);
foreach ($rs as $index => $datos){
	$pdf->cod_cli = $datos['cod_cli'];
	$pdf->nombres_cli = $datos['nombres']." ".$datos['apellidos'];
	$pdf->nacimiento = $datos['nacimiento'];
	$pdf->edad = $datos['edad'];
	$pdf->dni = $datos['dni'];
	$pdf->domicilio = $datos['domicilio'];
	$pdf->telefonos_cli = $datos['telefonos'];
	$pdf->limite_credito = $datos['limite_credito'];
	$pdf->nombres_ga = $datos['nombres_ga']." ".$datos['apellidos_g'];
	$pdf->nombre_pais_pro = $datos['nombre_pais']."/".$datos['nombre_prov'];
}
/*************DATOS DEL CREDITO*****************/
$parametros['VP_CODIGO']=$_REQUEST['VP_CODIGO'];
$parametros['VP_CODIGO_CLIENTE']=$_REQUEST['VP_CODIGO_CLIENTE'];
$rs = $this->objDatos->SP_CLIENTES_DATA_REPORT($parametros);
foreach ($rs as $index => $datos){
	$pdf->cod_credito = $datos['cod_credito'];
	$pdf->fecha_emision = $datos['fecha'];
	$pdf->tasa_interes = $datos['tasa_interes'];
	$pdf->prestamo = $datos['prestamo'];
	$pdf->cuotas = $datos['cuotas'];
	$pdf->valor_cuota = $datos['valor_cuota'];
	$pdf->fecha_calculo = $datos['fecha_calculo'];
	$pdf->total_credito = $datos['total_credito'];
	$pdf->nota = $datos['nota'];
	$pdf->tipo= $datos['tipo'];
	$pdf->metodo= $datos['metodo'];
}
/**********************************************/

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

$pdf->setPrintFooter(false);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setLanguageArray($l);

$pdf->SetFont('times', '', 10);


$pdf->AddPage();

$pdf->setPrintHeader(false);
$cont=1;
$total_c=0;
$parametros['VP_CODIGO']=$_REQUEST['VP_CODIGO'];

$rs =$this->objDatos->SP_CREDITOS_DETALLE_LIST($parametros);
$y=110;
$DETECCION=1;
$VUELTAS=0;
foreach ($rs as $index => $item){
		 if((int)$item['estado']==1){$estado='Cancelado';}else{$estado='Pendiente';}
		 
		 $pdf->SetXY(5,$y);
		 $pdf->Ln(1);
		 //$pdf->SetFont('Arial','',7);
		 $pdf->Cell(5,4,$cont,0,0,'L',0);
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

		 //$pdf->Ln(3);
		//$pdf->SetXY(50,$y-3);
		 //$pdf->Cell(195,-2,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,0,'C');
		
		//$pdf->Ln(25);
		
		if($DETECCION==1){
			$VUELTAS +=1;
			if($VUELTAS>=16){
				$DETECCION+=1;
				$VUELTAS=0;
				$y=5;
				$pdf->AddPage();
			}
		}else{
			$VUELTAS +=1;
			if($VUELTAS>=25){
				$y=5;
				$VUELTAS=0;
				$pdf->AddPage();
			}
		}
		$cont+=1;
		$y+=10;
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
 $pdf->Ln(30);
 $pdf->Ln(-4.5); 
 $pdf->Cell(172,6,'................................................',0,0,'R');
 $pdf->Ln(3); 
 $pdf->Cell(10,7,'Total de cuotas : '.(((int)$cont)-1).'               Total Crédito : '.number_format($total_c,2),0,0,'L');
 $pdf->Cell(155,7,'FIRMA CLIENTE',0,0,'R');
   
 $pdf->Output(); 

//============================================================+
// END OF FILE
//============================================================+