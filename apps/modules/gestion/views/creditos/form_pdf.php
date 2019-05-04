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
        
        $img_file = PATH.'/public_html/images/front/trascender.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        //$this->Image($img_file,7,7,60);
        $W=50;
        $H=50;
        $X=($this->width_page/2)-($W/2);
		$Y=($this->height_page/2)-($H/2);

        $this->SetFont('calibrib', '', 16);
		$this->SetXY($X-($W+14), $Y-4);
		
		
		$fecha =date("d/m/Y,H:i:s");
		$this->SetX(10);	
		$this->SetY($H);
		//$this->Image('images/qr_img_.png',170,7,30);
		$this->SetFont('times','',10);	

		$this->SetXY(9,$H);
		$this->Cell(34,$H,strtoupper('1000.00'),0,0,'R');//$this->nombre  //monto solicitado

		$this->SetXY(53,$H);
		$this->Cell(33,$H-1,'NUEVO',0,0,'C');//tipo cliente


		$this->SetXY(122,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//exepcion A

		$this->SetXY(136,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//exepcion B


		$this->SetXY(166,$H);
		$this->Cell(10,$H-1,'01',0,0,'C');//fecha

		$this->SetXY(174,$H);
		$this->Cell(10,$H-1,'01',0,0,'C');//fecha

		$this->SetXY(183,$H);
		$this->Cell(10,$H-1,'2019',0,0,'C');//fecha

		//$this->Ln(6);
		$H+=8;
		$this->SetXY(8.5,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DNI

		$this->SetXY(53.7,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//RECIBO DE LUZ AGUA

		$this->SetXY(104.5,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//DECLARACIÓN

		$this->SetXY(144,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//LABORAL

		$this->SetXY(167.5,$H);
		$this->Cell(10,$H-1,'X',0,0,'C');//DOMICILARIO

		$H+=10.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'HERNANDEZ',0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'HERNANDEZ',0,0,'C');//APELLIDO MATARNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'JIMMY ANTHONY',0,0,'C');//NOMBRES

		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO



		$H+=5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'SOLTERO',0,0,'C');//ESTADO CIVIL
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'01/01/2017',0,0,'C');//FECHA NACIMIENTO


		$this->SetXY(90,$H);
		$this->Cell(33,$H,'987807172',0,0,'C');//TELEFONO

		$this->SetXY(125,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO PROPIO

		$this->SetXY(140,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO PAGANDOLO

		$this->SetXY(160,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO ALQUILADO

		$this->SetXY(179,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO FAMILIAR
		

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,'AV LOS PINOS',0,0,'L');//DIRECCION

		$this->SetXY(108.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(126.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(145.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,'LOS PORTALES',0,0,'C');//URBANIZACION

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'LIMA',0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'LIMA',0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'LIMA',0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,'POR EL PARQUE 2',0,0,'C');//NUMERO
		


		//INFORMACION LABORAL
		$H+=10;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,'AV LOS PINOS',0,0,'L');//DIRECCION

		$this->SetXY(108.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(126.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(145.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,'LOS PORTALES',0,0,'C');//URBANIZACION


		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'LIMA',0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'LIMA',0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'LIMA',0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,'POR EL PARQUE 2',0,0,'C');//NUMERO


		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(43,$H,'LIMA',0,0,'C');//DISTRITO
		
		$this->SetXY(57,$H);
		$this->Cell(44,$H,'LIMA',0,0,'C');//PROVINCIA


		$this->SetXY(105,$H);
		$this->Cell(93,$H-1,'POR EL PARQUE 2',0,0,'C');//NUMERO


		/*INFORMACION DEL CONYUGUE*/
		$H+=10.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'HERNANDEZ',0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'HERNANDEZ',0,0,'C');//APELLIDO MATARNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'JIMMY ANTHONY',0,0,'C');//NOMBRES

		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO
		

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'SOLTERO',0,0,'C');//ESTADO CIVIL


		$this->SetXY(48,$H-4);
		$this->Cell(10,$H,'X',0,0,'C');//CONTRATADO

		$this->SetXY(48,$H);
		$this->Cell(10,$H,'X',0,0,'C');//INDEPENDIENTE


		$this->SetXY(85.5,$H-4);
		$this->Cell(10,$H,'X',0,0,'C');//DEPENDIENTE GRADO

		$this->SetXY(85.5,$H);
		$this->Cell(10,$H,'X',0,0,'C');//OTROS


		$this->SetXY(134.5,$H-4);
		$this->Cell(10,$H,'X',0,0,'C');//BACHILLER

		$this->SetXY(134.5,$H);
		$this->Cell(10,$H,'X',0,0,'C');//TITULADO

		$this->SetXY(164,$H-4);
		$this->Cell(10,$H,'X',0,0,'C');//TECNOLOGIA

		$this->SetXY(164,$H);
		$this->Cell(10,$H,'X',0,0,'C');//MAGISTER


		$H+=5.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'SISTEMAS',0,0,'C');//PROFESION
		
		$this->SetXY(51,$H);
		$this->Cell(47,$H,'TRASCENDER',0,0,'C');//CENTRO DEL TRABAJO


		$this->SetXY(102,$H);
		$this->Cell(31,$H,'ANALISTA',0,0,'C');//CARGO


		$this->SetXY(139,$H-0.3);
		$this->Cell(29,$H,'20/01/2019',0,0,'C');//FECHA INGRESO

		$this->SetXY(171,$H-0.3);
		$this->Cell(27,$H,'20/01/2019',0,0,'C');//FECHA INGRESO


		/*GARANTE*/

		$H+=10.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'HERNANDEZ',0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'HERNANDEZ',0,0,'C');//APELLIDO MATARNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'JIMMY ANTHONY',0,0,'C');//NOMBRES

		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,'7',0,0,'C');//NUMERO


		$H+=5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'SOLTERO',0,0,'C');//ESTADO CIVIL
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'01/01/2017',0,0,'C');//FECHA NACIMIENTO


		$this->SetXY(90,$H);
		$this->Cell(33,$H,'987807172',0,0,'C');//TELEFONO

		$this->SetXY(122,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO PROPIO

		$this->SetXY(138,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO PAGANDOLO

		$this->SetXY(159,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO ALQUILADO

		$this->SetXY(178,$H);
		$this->Cell(10,$H,'X',0,0,'C');//DOMICILIO FAMILIAR


		$H+=5.2;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'SISTEMAS',0,0,'C');//PROFESION
		
		$this->SetXY(51,$H);
		$this->Cell(47,$H,'TRASCENDER',0,0,'C');//CENTRO DEL TRABAJO


		$this->SetXY(102,$H);
		$this->Cell(31,$H,'ANALISTA',0,0,'C');//CARGO


		$this->SetXY(139,$H-0.3);
		$this->Cell(29,$H,'20/01/2019',0,0,'C');//FECHA INGRESO

		$this->SetXY(171,$H-0.3);
		$this->Cell(27,$H,'20/01/2019',0,0,'C');//FECHA INGRESO


		$H+=5.3;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,'AV LOS PINOS',0,0,'L');//DIRECCION

		$this->SetXY(109.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT

		$this->SetXY(125.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(146.5,$H);
		$this->Cell(7,$H,'001',0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,'LOS PORTALES',0,0,'C');//URBANIZACION

		$H+=5.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,'LIMA',0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,'LIMA',0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,'LIMA',0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,'POR EL PARQUE 2',0,0,'C');//NUMERO


		/*REFERENCIA PERSONAL*/
		$H+=12.2;
		$this->SetXY(10,$H);
		$this->Cell(97,$H,'JIMMY ANTHONY',0,0,'C');//PERSONAL

		$this->SetXY(113,$H-0.5);
		$this->Cell(40,$H,'987807171',0,0,'C');//PERSONAL

		$this->SetXY(158.5,$H-0.5);
		$this->Cell(40,$H,'987807171',0,0,'C');//PERSONAL

		$H+=4.8;
		$this->SetXY(10,$H);
		$this->Cell(97,$H,'JIMMY ANTHONY',0,0,'C');//COMERCIAL

		$this->SetXY(113,$H-0.5);
		$this->Cell(40,$H,'987807171',0,0,'C');//PERSONAL

		$this->SetXY(158.5,$H-0.5);
		$this->Cell(40,$H,'987807171',0,0,'C');//PERSONAL
		
		$H+=97;
		$this->SetXY(11,$H);
		//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
		$this->MultiCell(185,$H,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing .',0,0,'L',true);//PERSONAL
		



        #$this->SetAutoPageBreak($auto_page_break, $bMargin);
/*
        $this->AddPage();
        
        #$this->setPageMark();


        $bMargin = $this->getBreakMargin();
        
        $auto_page_break = $this->AutoPageBreak;
        
        $this->SetAutoPageBreak(false, 0);
        
        $img_file = PATH.'/public_html/images/front/trascender2.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        //$this->Image($img_file,7,7,60);
        $W=50;
        $H=50;
        $X=($this->width_page/2)-($W/2);
		$Y=($this->height_page/2)-($H/2);

        $this->SetFont('calibrib', '', 16);
		$this->SetXY($X-($W+14), $Y-4);
		
		
		$fecha =date("d/m/Y,H:i:s");
		$this->SetX(10);	
		$this->SetY($H);
		//$this->Image('images/qr_img_.png',170,7,30);
		$this->SetFont('times','',10);	

		$this->SetXY(9,$H);
		$this->Cell(34,$H,strtoupper('1000.00'),0,0,'R');//$this->nombre  //monto solicitado

		$this->SetAutoPageBreak($auto_page_break, $bMargin);


        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();*/
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
#$rs = $this->objDatos->SP_CREDITOS_CLIENTE_LIST($parametros);
/*foreach ($rs as $index => $datos){
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
*/
/*************DATOS DEL CLIENTE*****************/
$parametros['VP_CODIGO_CLIENTE']=$_REQUEST['VP_CODIGO_CLIENTE'];
#$rs = $this->objDatos->SP_CREDITOS_CLIENTE_LIST($parametros);
/*foreach ($rs as $index => $datos){
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
}*/
/*************DATOS DEL CREDITO*****************/
/*$parametros['VP_CODIGO']=$_REQUEST['VP_CODIGO'];
$parametros['VP_CODIGO_CLIENTE']=$_REQUEST['VP_CODIGO_CLIENTE'];
#$rs = $this->objDatos->SP_CREDITOS_CLIENTE_LIST($parametros);
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
}*/
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
/*
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
		
	/*}*/
/*
 $pdf->Ln(30);
 $pdf->Ln(-4.5); 
 $pdf->Cell(172,6,'................................................',0,0,'R');
 $pdf->Ln(3); 
 $pdf->Cell(10,7,'Total de cuotas : '.(((int)$cont)-1).'               Total Crédito : '.number_format($total_c,2),0,0,'L');
 $pdf->Cell(155,7,'FIRMA CLIENTE',0,0,'R');*/
   
 $pdf->Output(); 

//============================================================+
// END OF FILE
//============================================================+