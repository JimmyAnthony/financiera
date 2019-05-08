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

		$this->TYPE='A';
		
		$this->id_creditos='';
	    $this->nro_solicitud='';
	    $this->id_age='';
	    $this->id_per='';
	    $this->id_garante='';
	    $this->id_asesor='';
	    $this->moneda='';
	    $this->monto_solicitado='';
	    $this->tipo_cliente='';
	    $this->excepcion='';
	    $this->nro_cuotas='';
	    $this->interes='';
	    $this->mora='';
	    $this->fecha_1ra_letra='';
	    $this->monto_aprobado='';
	    $this->id_motivo='';
	    $this->estado='';
	    $this->fecha_sol='';
	    $this->nota='';
	    $this->fecha_mod='';
	    $this->enviado='';
	    $this->fuente='';
	    $this->fecha_creado='';
	    
	    $this->ape_pat='';
	    $this->ape_mat='';
	    $this->nombres='';
	    $this->sexo='';
	    $this->doc_dni='';
	    $this->doc_ce='';
	    $this->doc_cip='';
	    $this->doc_ruc='';
	    $this->doc_cm='';
	    $this->estado_civil='';
	    $this->fecha_nac='';
	    $this->correo='';
	    $this->id_tel='';
	    $this->domicilio='';
	    $this->estudios='';
	    $this->profesion='';
	    $this->laboral='';
	    $this->cargo='';
	    $this->id_empresa='';
	    $this->fecha_ingreso='';
	    $this->id_dir='';
	    $this->img='';
	    
	    $this->dir_direccion='';
	    $this->dir_numero='';
	    $this->dir_mz='';
	    $this->dir_lt='';
	    $this->dir_dpto='';
	    $this->dir_interior='';
	    $this->dir_urb='';
	    $this->dir_referencia='';
	    $this->cod_ubi_dep='';
	    $this->cod_ubi_pro='';
	    $this->cod_ubi='';
	    
	    $this->numero='';
	    $this->tipo='';
	    $this->operador='';
	    
	    $this->nombre='';
	    $this->rubro='';
	    $this->telefono='';
	    $this->id_dir_empresa='';
	    $this->ruc='';
	    
	    
	    $this->dir_direccion_EMP='';
	    $this->dir_numero_EMP='';
	    $this->dir_mz_EMP='';
	    $this->dir_lt_EMP='';
	    $this->dir_dpto_EMP='';
	    $this->dir_interior_EMP='';
	    $this->dir_urb_EMP='';
	    $this->dir_referencia_EMP='';
	    $this->cod_ubi_dep_EMP='';
	    $this->cod_ubi_pro_EMP='';
	    $this->cod_ubi_EMP='';
	    
	    $this->ape_pat_CONYU='';
	    $this->ape_mat_CONYU='';
	    $this->nombres_CONYU='';
	    $this->sexo_CONYU='';
	    $this->doc_dni_CONYU='';
	    $this->doc_ce_CONYU='';
	    $this->doc_cip_CONYU='';
	    $this->doc_ruc_CONYU='';
	    $this->doc_cm_CONYU='';
	    $this->estado_civil_CONYU='';
	    $this->fecha_nac_CONYU='';
	    $this->correo_CONYU='';
	    #PCO.id_tel='';
	    $this->domicilio_CONYU='';
	    $this->estudios_CONYU='';
	    $this->profesion_CONYU='';
	    $this->laboral_CONYU='';
	    $this->cargo_CONYU='';
	    #PCO.id_empresa as id_empresa='';
	    $this->fecha_ingreso_CONYU='';
	    
	    
	    $this->ape_pat_AGE='';
	    $this->ape_mat_AGE='';
	    $this->nombres_AGE='';
	    $this->sexo_AGE='';
	    $this->doc_dni_AGE='';
	    $this->doc_ce_AGE='';
	    $this->doc_cip_AGE='';
	    $this->doc_ruc_AGE='';
	    $this->doc_cm_AGE='';
	    $this->estado_civil_AGE='';
	    $this->fecha_nac_AGE='';
	    $this->correo_AGE='';
	    $this->id_tel_AGE='';
	    $this->domicilio_AGE='';
	    $this->estudios_AGE='';
	    $this->profesion_AGE='';
	    $this->laboral_AGE='';
	    $this->cargo_AGE='';
	    $this->id_empresa_AGE='';
	    $this->fecha_ingreso_AGE='';
	    $this->id_dir_AGE='';
	    $this->img_AGE='';
	    
	    $this->dir_direccion_AGE='';
	    $this->dir_numero_AGE='';
	    $this->dir_mz_AGE='';
	    $this->dir_lt_AGE='';
	    $this->dir_dpto_AGE='';
	    $this->dir_interior_AGE='';
	    $this->dir_urb_AGE='';
	    $this->dir_referencia_AGE='';
	    $this->cod_ubi_dep_AGE='';
	    $this->cod_ubi_pro_AGE='';
	    $this->cod_ubi_AGE='';
	    
	    $this->numero_AGE='';
	    $this->tipo_AGE='';
	    $this->operador_AGE='';
	    
	    $this->nombre_AGE='';
	    $this->rubro_AGE='';
	    $this->telefono_AGE='';
	    #E.id_dir as id_dir_empresa='';
	    $this->ruc_AGE='';
	    $this->img_AGE='';
	    
	    $this->ape_pat_ASE='';
	    $this->ape_mat_ASE='';
	    $this->nombres_ASE='';
	    $this->sexo_ASE='';
	    $this->doc_dni_ASE='';
	    $this->doc_ce_ASE='';
	    $this->doc_cip_ASE='';
	    $this->doc_ruc_ASE='';
	    $this->doc_cm_ASE='';
	    $this->estado_civil_ASE='';
	    $this->fecha_nac_ASE='';
	    $this->correo_ASE='';
	    #PA.id_tel='';
	    $this->domicilio_ASE='';
	    $this->estudios_ASE='';
	    $this->profesion_ASE='';
	    $this->laboral_ASE='';
	    $this->cargo_ASE='';
	    #PA.id_empresa='';
	    $this->fecha_ingreso_ASE='';
	    #PA.id_dir='';
	    $this->img_ASE='';
		
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

        if($this->TYPE==A){
        
        $img_file = PATH.'/public_html/images/front/trascender.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);


        $this->SetFont('times','',15);	

		$this->SetXY(144,20);
		$this->Cell(50,20,strtoupper('N° '.$this->nro_solicitud),0,0,'C');//$this->nombre  //monto solicitado

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
		$this->Cell(34,$H,strtoupper($this->monto_solicitado),0,0,'R');//$this->nombre  //monto solicitado

		$this->SetXY(53,$H);
		$this->Cell(33,$H-1,$this->tipo_cliente,0,0,'C');//tipo cliente


		$this->SetXY(122,$H);
		$this->Cell(10,$H-1,($this->excepcion=='N')?'':'X',0,0,'C');//exepcion A

		$this->SetXY(136,$H);
		$this->Cell(10,$H-1,($this->excepcion=='N')?'X':'',0,0,'C');//exepcion B


		
		list($año, $mes , $día) = split('[/.-]', $this->fecha_sol);
		$this->SetXY(166,$H);
		$this->Cell(10,$H-1,$día,0,0,'C');//fecha

		$this->SetXY(174,$H);
		$this->Cell(10,$H-1,$mes,0,0,'C');//fecha

		$this->SetXY(183,$H);
		$this->Cell(10,$H-1,$año,0,0,'C');//fecha

		//$this->Ln(6);
		$H+=8;
		$this->SetXY(8.5,$H);
		$this->Cell(10,$H,($this->doc_dni=='')?'':'X',0,0,'C');//DNI

		$this->SetXY(53.7,$H);
		$this->Cell(10,$H-1,'',0,0,'C');//RECIBO DE LUZ AGUA

		$this->SetXY(104.5,$H);
		$this->Cell(10,$H-1,'',0,0,'C');//DECLARACIÓN

		$this->SetXY(144,$H);
		$this->Cell(10,$H-1,($this->laboral=='')?'':'X',0,0,'C');//LABORAL

		$this->SetXY(167.5,$H);
		$this->Cell(10,$H-1,($this->id_dir=='')?'':'X',0,0,'C');//DOMICILARIO

		$H+=10.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->ape_pat,0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->ape_mat,0,0,'C');//APELLIDO MATARNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->nombres,0,0,'C');//NOMBRES


		
		#list($A, $B, $C, $D, $E, $F, $G ,$HH, $II) = explode("", $this->doc_dni);
		$parte=$this->doc_dni;
		$A=$parte[0];
		$B=$parte[1];
		$C=$parte[2];
		$D=$parte[3];
		$E=$parte[4];
		$F=$parte[5];
		$G=$parte[6];
		$HH=$parte[7];
		$II=$parte[8];

		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,$A,0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,$B,0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,$C,0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,$D,0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,$D,0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,$E,0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,$F,0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,$G,0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,$HH,0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,$II,0,0,'C');//NUMERO


		$H+=5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->estado_civil,0,0,'C');//ESTADO CIVIL
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->fecha_nac,0,0,'C');//FECHA NACIMIENTO


		$this->SetXY(90,$H);
		$this->Cell(33,$H,$this->numero,0,0,'C');//TELEFONO

		$this->SetXY(125,$H);
		$this->Cell(10,$H,($this->domicilio=='PRO')?'X':'',0,0,'C');//DOMICILIO PROPIO

		$this->SetXY(140,$H);
		$this->Cell(10,$H,($this->domicilio=='PAG')?'X':'',0,0,'C');//DOMICILIO PAGANDOLO

		$this->SetXY(160,$H);
		$this->Cell(10,$H,($this->domicilio=='ALQ')?'X':'',0,0,'C');//DOMICILIO ALQUILADO

		$this->SetXY(179,$H);
		$this->Cell(10,$H,($this->domicilio=='FAM')?'X':'',0,0,'C');//DOMICILIO FAMILIAR
		

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,$this->dir_direccion,0,0,'L');//DIRECCION

		$this->SetXY(108.5,$H);
		$this->Cell(7,$H,$this->dir_numero,0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,$this->dir_mz,0,0,'C');//NRO / MZ / LT

		$this->SetXY(126.5,$H);
		$this->Cell(7,$H,$this->dir_lt,0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,$this->dir_dpto,0,0,'C');//DTO - INT

		$this->SetXY(145.5,$H);
		$this->Cell(7,$H,$this->dir_interior,0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,$this->dir_urb,0,0,'C');//URBANIZACION

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->cod_ubi,0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->cod_ubi_pro,0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->cod_ubi_dep,0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,$this->dir_referencia,0,0,'C');//NUMERO
		


		//INFORMACION LABORAL
		$H+=10;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,$this->dir_direccion_EMP,0,0,'L');//DIRECCION

		$this->SetXY(108.5,$H);
		$this->Cell(7,$H,$this->dir_numero_EMP,0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,$this->dir_mz_EMP,0,0,'C');//NRO / MZ / LT

		$this->SetXY(126.5,$H);
		$this->Cell(7,$H,$this->dir_lt_EMP,0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,$this->dir_dpto_EMP,0,0,'C');//DTO - INT

		$this->SetXY(145.5,$H);
		$this->Cell(7,$H,$this->dir_interior_EMP,0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,$this->dir_urb_EMP,0,0,'C');//URBANIZACION


		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->cod_ubi_EMP,0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->cod_ubi_pro_EMP,0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->cod_ubi_dep_EMP,0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,'',0,0,'C');//OBSERVACION ADICIONAL


		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(43,$H,$this->rubro,0,0,'C');//GIRO DEL NEGOCIO
		
		$this->SetXY(57,$H);
		$this->Cell(44,$H,'',0,0,'C');//ANTIGUEDAD


		$this->SetXY(105,$H);
		$this->Cell(93,$H-1,$this->dir_referencia_EMP,0,0,'C');//NUMERO


		/*INFORMACION DEL CONYUGUE*/
		$H+=10.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->ape_pat_CONYU,0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->ape_mat_CONYU,0,0,'C');//APELLIDO MATERNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->nombres_CONYU,0,0,'C');//NOMBRES


		$parte=$this->doc_dni_CONYU;
		$A=$parte[0];
		$B=$parte[1];
		$C=$parte[2];
		$D=$parte[3];
		$E=$parte[4];
		$F=$parte[5];
		$G=$parte[6];
		$HH=$parte[7];
		$II=$parte[8];
		$JJ=$parte[9];

		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,$A,0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,$B,0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,$C,0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,$D,0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,$E,0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,$F,0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,$G,0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,$HH,0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,$II,0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,$JJ,0,0,'C');//NUMERO
		

		$H+=5.5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->estado_civil_CONYU,0,0,'C');//ESTADO CIVIL


		$this->SetXY(48,$H-4);
		$this->Cell(10,$H,($this->laboral_CONYU=='CO')?'X':'',0,0,'C');//CONTRATADO

		$this->SetXY(48,$H);
		$this->Cell(10,$H,($this->laboral_CONYU=='IN')?'X':'',0,0,'C');//INDEPENDIENTE


		$this->SetXY(85.5,$H-4);
		$this->Cell(10,$H,($this->laboral_CONYU=='DE')?'X':'',0,0,'C');//DEPENDIENTE GRADO

		$this->SetXY(85.5,$H);
		$this->Cell(10,$H,($this->laboral_CONYU=='OT')?'X':'',0,0,'C');//OTROS


		$this->SetXY(134.5,$H-4);
		$this->Cell(10,$H,($this->estudios_CONYU=='OT')?'BA':'',0,0,'C');//BACHILLER

		$this->SetXY(134.5,$H);
		$this->Cell(10,$H,($this->estudios_CONYU=='OT')?'TI':'',0,0,'C');//TITULADO

		$this->SetXY(164,$H-4);
		$this->Cell(10,$H,($this->estudios_CONYU=='OT')?'TE':'',0,0,'C');//TECNOLOGIA

		$this->SetXY(164,$H);
		$this->Cell(10,$H,($this->estudios_CONYU=='OT')?'MA':'',0,0,'C');//MAGISTER


		$H+=5.3;
		$this->SetXY(10,$H); 
		$this->Cell(38,$H,$this->profesion_CONYU,0,0,'C');//PROFESION
		
		$this->SetXY(51,$H);
		$this->Cell(47,$H,'',0,0,'C');//CENTRO DEL TRABAJO

		$this->SetFont('times','',7);	
		$this->SetXY(102,$H);
		$this->Cell(31,$H,$this->cargo_CONYU,0,0,'C');//CARGO
		$this->SetFont('times','',10);	

		$this->SetXY(139,$H-0.3);
		$this->Cell(29,$H,$this->fecha_ingreso_CONYU,0,0,'C');//FECHA INGRESO

		$this->SetXY(171,$H-0.3);
		$this->Cell(27,$H,'',0,0,'C');//FECHA INGRESO


		/*GARANTE*/

		$H+=10.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->ape_pat_AGE,0,0,'C');//APELLIDO PATERNO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->ape_mat_AGE,0,0,'C');//APELLIDO MATARNO


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->nombres_AGE,0,0,'C');//NOMBRES

		$parte=$this->doc_dni_AGE;
		$A=$parte[0];
		$B=$parte[1];
		$C=$parte[2];
		$D=$parte[3];
		$E=$parte[4];
		$F=$parte[5];
		$G=$parte[6];
		$HH=$parte[7];
		$II=$parte[8];
		$JJ=$parte[9];


		$this->SetXY(142,$H);
		$this->Cell(10,$H-1,$A,0,0,'C');//NUMERO

		$this->SetXY(148,$H);
		$this->Cell(10,$H-1,$B,0,0,'C');//NUMERO

		$this->SetXY(153.5,$H);
		$this->Cell(10,$H-1,$C,0,0,'C');//NUMERO

		$this->SetXY(158.5,$H);
		$this->Cell(10,$H-1,$D,0,0,'C');//NUMERO

		$this->SetXY(164.5,$H);
		$this->Cell(10,$H-1,$E,0,0,'C');//NUMERO

		$this->SetXY(169.5,$H);
		$this->Cell(10,$H-1,$F,0,0,'C');//NUMERO

		$this->SetXY(174.5,$H);
		$this->Cell(10,$H-1,$G,0,0,'C');//NUMERO

		$this->SetXY(179.5,$H);
		$this->Cell(10,$H-1,$HH,0,0,'C');//NUMERO

		$this->SetXY(185.5,$H);
		$this->Cell(10,$H-1,$II,0,0,'C');//NUMERO

		$this->SetXY(190.5,$H);
		$this->Cell(10,$H-1,$JJ,0,0,'C');//NUMERO


		$H+=5;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->estado_civil_AGE,0,0,'C');//ESTADO CIVIL
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->fecha_nac_AGE,0,0,'C');//FECHA NACIMIENTO


		$this->SetXY(90,$H);
		$this->Cell(33,$H,$this->numero_AGE,0,0,'C');//TELEFONO

		$this->SetXY(122,$H);
		$this->Cell(10,$H,($this->domicilio_AGE=='PRO')?'X':'',0,0,'C');//DOMICILIO PROPIO

		$this->SetXY(138,$H);
		$this->Cell(10,$H,($this->domicilio_AGE=='PAG')?'X':'',0,0,'C');//DOMICILIO PAGANDOLO

		$this->SetXY(159,$H);
		$this->Cell(10,$H,($this->domicilio_AGE=='ALQ')?'X':'',0,0,'C');//DOMICILIO ALQUILADO

		$this->SetXY(178,$H);
		$this->Cell(10,$H,($this->domicilio_AGE=='FAM')?'X':'',0,0,'C');//DOMICILIO FAMILIAR


		$H+=5.2;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->profesion_AGE,0,0,'C');//PROFESION
		
		$this->SetXY(51,$H);
		$this->Cell(47,$H,$this->nombre_AGE,0,0,'C');//CENTRO DEL TRABAJO


		$this->SetXY(102,$H);
		$this->Cell(31,$H,$this->cargo_AGE,0,0,'C');//CARGO


		$this->SetXY(139,$H-0.3);
		$this->Cell(29,$H,$this->fecha_ingreso_AGE,0,0,'C');//FECHA INGRESO

		$this->SetXY(171,$H-0.3);
		$this->Cell(27,$H,'',0,0,'C');//FECHA INGRESO


		$H+=5.3;
		$this->SetXY(10,$H);
		$this->Cell(95,$H,$this->dir_direccion_AGE,0,0,'L');//DIRECCION

		$this->SetXY(109.5,$H);
		$this->Cell(7,$H,$this->dir_numero_AGE,0,0,'C');//NRO / MZ / LT

		$this->SetXY(117.5,$H);
		$this->Cell(7,$H,$this->dir_mz_AGE,0,0,'C');//NRO / MZ / LT

		$this->SetXY(125.5,$H);
		$this->Cell(7,$H,$this->dir_lt_AGE,0,0,'C');//NRO / MZ / LT


		$this->SetXY(136.5,$H);
		$this->Cell(7,$H,$this->dir_dpto_AGE,0,0,'C');//DTO - INT

		$this->SetXY(146.5,$H);
		$this->Cell(7,$H,$this->dir_interior_AGE,0,0,'C');//DTO - INT

		$this->SetXY(157.5,$H);
		$this->Cell(40,$H,$this->dir_urb_AGE,0,0,'C');//URBANIZACION

		$H+=5.3;
		$this->SetXY(10,$H);
		$this->Cell(38,$H,$this->cod_ubi_AGE,0,0,'C');//DISTRITO
		
		$this->SetXY(51,$H);
		$this->Cell(35,$H,$this->cod_ubi_pro_AGE,0,0,'C');//PROVINCIA


		$this->SetXY(90,$H);
		$this->Cell(43,$H,$this->cod_ubi_dep_AGE,0,0,'C');//DEPARTAMENTO

		$this->SetXY(137,$H);
		$this->Cell(61,$H-1,$this->dir_referencia_AGE,0,0,'C');//REFERENCIA


		/*REFERENCIA PERSONAL*/
		$H+=12.2;
		$this->SetXY(10,$H);
		$this->Cell(97,$H,'',0,0,'C');//PERSONAL

		$this->SetXY(113,$H-0.5);
		$this->Cell(40,$H,'',0,0,'C');//PERSONAL

		$this->SetXY(158.5,$H-0.5);
		$this->Cell(40,$H,'',0,0,'C');//PERSONAL

		$H+=4.8;
		$this->SetXY(10,$H);
		$this->Cell(97,$H,'',0,0,'C');//COMERCIAL

		$this->SetXY(113,$H-0.5);
		$this->Cell(40,$H,'',0,0,'C');//PERSONAL

		$this->SetXY(158.5,$H-0.5);
		$this->Cell(40,$H,'',0,0,'C');//PERSONAL
		
		$H+=97;
		$this->SetXY(11,$H);
		//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
		$this->MultiCell(185,$H,$this->nombre,0,0,'L',true);//PERSONAL
		

		}else{
			$img_file = PATH.'/public_html/images/front/trascender2.jpg';
	        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
	        //$this->Image($img_file,7,7,60);
	        $W=50;
	        $H=27;
	        

	        #$this->SetFont('calibrib', '', 16);
			
			
			$this->SetFont('times','',10);	

			$this->SetXY(12,$H);
			$this->Cell(10,$H,($this->moneda=='SOL')?'X':'',0,0,'L');//$this->nombre  //SOLES
			$this->SetXY(12,$H+3.5);
			$this->Cell(10,$H,($this->moneda=='USD')?'X':'',0,0,'L');//$this->nombre  //DOLARES

			$H+=2.3;
			$this->SetXY(38,$H);
			$this->Cell(38,$H,$this->nro_cuotas,0,0,'C');//$this->nombre  //NRO CUOTAS

			$this->SetXY(87,$H);
			$this->Cell(33,$H,$this->fecha_1ra_letra,0,0,'C');//$this->nombre  //FECHA PRIMERA LETRA

			$this->SetXY(131,$H);
			$this->Cell(67,$H-0.5,$this->monto_aprobado,0,0,'R');//IMPORTE APROBADO

			$H+=10;
			$this->SetXY(79,$H);
			$this->Cell(10,$H,strtoupper(''),0,0,'L');//$this->nombre  //ADQUISICION DE MERCADERIA

			$this->SetXY(79,$H+5);
			$this->Cell(10,$H,strtoupper('X'),0,0,'L');//$this->nombre  //AMPLIAR O MEJORAR  SU VISITA


			$this->SetXY(174.5,$H-0.5);
			$this->Cell(10,$H,strtoupper(''),0,0,'L');//$this->nombre  //COMPRA DE ACCESORIOS  Y/O INSUMOS

			$this->SetXY(174.5,$H+4);
			$this->Cell(10,$H,strtoupper(''),0,0,'L');//$this->nombre  //OTROS

			$H+=16;
			list($año, $mes , $día) = split('[/.-]', $this->fecha_creado);
			
			$this->SetXY(17,$H);
			$this->Cell(19,$H,$día,0,0,'C');//$this->nombre  //FECHA DIA

			$this->SetXY(36,$H);
			$this->Cell(19,$H,$mes,0,0,'C');//$this->nombre  //MES

			$this->SetXY(54,$H);
			$this->Cell(19,$H,$año,0,0,'C');//$this->nombre  //YEAR

			$this->SetXY(87,$H);
			$this->Cell(23,$H,$this->id_asesor,0,0,'C');//$this->nombre  //PROMOTOR COD

			$this->SetFont('times','',7);	
			$this->SetXY(112,$H);
			$this->Cell(23,$H,$this->nombres_ASE,0,0,'C');//$this->nombre  //PROMOTOR NOMBRES

			$this->SetFont('times','',10);	

			$this->SetXY(149,$H-2);
			$this->Cell(49,$H,strtoupper('PRINCIPAL'),0,0,'C');//$this->nombre  //AGENCIA

			$H+=11;
			$this->SetXY(79,$H);
			$this->Cell(10,$H,strtoupper('X'),0,0,'C');//$this->nombre  //FECHA DIA

			$this->SetXY(100,$H);
			$this->Cell(10,$H,strtoupper('X'),0,0,'C');//$this->nombre  //FECHA DIA

			$this->SetXY(121,$H);
			$this->Cell(10,$H,strtoupper(''),0,0,'C');//$this->nombre  //FECHA DIA

			$this->SetXY(143,$H);
			$this->Cell(10,$H,strtoupper(''),0,0,'C');//$this->nombre  //FECHA DIA

			$H+=45;
			$this->SetXY(57,$H);
			//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
			$this->MultiCell(130,40,'',0,0,'L',true);//PERSONAL

			
		}


        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
/*
        $this->AddPage();
        
        


        $bMargin = $this->getBreakMargin();
        
        $auto_page_break = $this->AutoPageBreak;
        
        $this->SetAutoPageBreak(false, 0);
        
        

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
$parametros['VP_ID_CREDITOS']=$_REQUEST['vp_id_solicitud'];

$rs = $this->objDatos->SP_CREDITOS_PDF($parametros);
//var_export($rs);
foreach ($rs[0] as $index => $datos){

	
	if(!is_numeric($index)){
		$index=(string)$index;
		if(is_null($datos)){
			$datos='';
		}
		eval('$pdf->'.$index.'="'.utf8_encode($datos).'";');
	}
}

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

$pdf->TYPE='B';

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