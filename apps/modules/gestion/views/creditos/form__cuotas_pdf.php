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
class MYPDF extends tcpdf {
	public function __construct(){
		parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, array(110, 220), true, 'UTF-8', false);
		$this->width_page = $this->getPageWidth();
		$this->height_page = $this->getPageHeight();

		$this->TYPE='A';
		$this->CARTILLA=1;
		
		$this->id_creditos='';
	    $this->nro_solicitud='';
	    $this->id_age='';
	    $this->nombre_agencia='';
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
	    $this->dir_descripcion='';
	    $this->cod_ubi_dep='';
	    $this->cod_ubi_pro='';
	    $this->cod_ubi='';
	    
	    $this->numero='';
	    $this->tipo='';
	    $this->operador='';
	    
	    $this->nombre='';
	    $this->rubro='';
	    $this->telefono='';
	    $this->descripcion_empresa='';
	    $this->antiguedad='';
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
	    $this->dir_descripcion_EMP='';
	    $this->cod_ubi_dep_EMP='';
	    $this->cod_ubi_pro_EMP='';
	    $this->cod_ubi_EMP='';

	    $this->nombre_neg='';
	    $this->rubro_neg='';
	    $this->telefono_neg='';
	    $this->descripcion_empresa_neg='';
	    $this->antiguedad_neg='';
	    //$this->id_dir_empresa_neg='';
	    $this->ruc_neg='';

	    $this->dir_direccion_NEG='';
	    $this->dir_numero_NEG='';
	    $this->dir_mz_NEG='';
	    $this->dir_lt_NEG='';
	    $this->dir_dpto_NEG='';
	    $this->dir_interior_NEG='';
	    $this->dir_urb_NEG='';
	    $this->dir_referencia_NEG='';
	    $this->dir_descripcion_NEG='';
	    $this->cod_ubi_dep_NEG='';
	    $this->cod_ubi_pro_NEG='';
	    $this->cod_ubi_NEG='';
	    
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

	    $this->nombre_EYU='';
	    
	    
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
	    $this->dir_descripcion_AGE='';
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
	    $this->telefono_asesor='';

	    $this->personal='';
	    $this->telefono1='';
	    $this->telefono2='';
	    $this->comercial='';
	    $this->telefono3='';
	    $this->telefono4='';
		
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

        
        
        $img_file = PATH.'/public_html/images/front/cartilla_trascender.jpg';
        $this->Image($img_file, 0, 1, 110, 214, '', '', '', false, 300, '', false, false, 0);


        $this->SetFont('times','',8);	

		$this->SetXY(79,3.5);
		$this->Cell(50,20,strtoupper('N° '.$this->nro_solicitud.'-'.$this->CARTILLA),0,0,'L');//$this->nombre  //monto solicitado
		$this->SetFont('times','',10);	
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
		$this->SetFont('times','',7);	

		$this->SetXY(79,11);
		$this->Cell(20,11,strtoupper($this->nombre_agencia),0,0,'L');//

		$this->SetXY(79,13.5);
		$this->Cell(20,13.5,strtoupper($this->nombres_ASE),0,0,'L');//

		$this->SetXY(79,16);
		$this->Cell(20,16,strtoupper($this->telefono_asesor),0,0,'L');//

		$this->SetFont('times','',9);	
		$this->SetXY(21,19.2);
		$this->Cell(77,19,strtoupper($this->ape_pat.' '.$this->ape_mat.', '.$this->nombres),0,0,'L');//

		$this->SetXY(15,23);
		$this->Cell(25,19,strtoupper($this->doc_dni),0,0,'C');

		$this->SetXY(60,23);
		$this->Cell(39,19,strtoupper($this->tipo_cliente=='N'?'NUEVO':'RECURRENTE'),0,0,'C');

		
		$this->SetFont('times','',10);
		$this->SetXY(39,24);
		$this->Cell(33,24,strtoupper($this->monto_aprobado),0,0,'C');	

		$this->SetXY(81,24);
		$this->Cell(18,24,strtoupper($this->fecha_1ra_letra),0,0,'C');		


		$this->SetFont('times','',6);	
		$this->SetXY(24,38.5);
		$this->MultiCell(76,10,$this->dir_direccion.' Nro:'.$this->dir_numero.' Mz:'.$this->dir_mz.' Lt:'.$this->dir_lt.' Dpto:'.$this->dir_dpto.' Dpto:'.$this->dir_interior,0,0,'L',true);
		


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


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(120, 220), true, 'UTF-8', false);
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


//$pdf->AddPage();


$cont=1;
$total_c=0;
$parametros['VP_CODIGO']=$_REQUEST['vp_id_solicitud'];


$y=54;
$VUELTAS=0;
$init=0;
$rs =$this->objDatos->SP_CREDITOS_DETALLE_LIST($parametros);
foreach ($rs as $index => $item){
	 
	 if($VUELTAS%27==0){
	 	$pdf->AddPage();
	 	$y=54;
		$VUELTAS=0;
		$pdf->CARTILLA+=1;
	 }
	 $pdf->Ln(1);
	 if($init!=1){
		 $pdf->SetXY(12,$y);
		 
		 //$pdf->SetFont('Arial','',7);
		 $pdf->Cell(9,3,$dia,0,0,'C',0);
		 //$pdf->SetXY(8,$y);
		 $pdf->SetXY(19,$y);
		 $pdf->Cell(9,3,$mes,0,0,'C',0);
		 //$pdf->SetXY(25,$y);
		 $pdf->SetXY(28,$y);
		 $pdf->Cell(11,3,'',0,0,'R',0);
		 $pdf->SetXY(43,$y);
		 $pdf->Cell(11,3,'',0,0,'L',0);
		 $pdf->SetXY(51.5,$y);
		 
		 $pdf->Cell(22,3,$diax,0,0,'L',0);
		 $pdf->SetXY(59,$y);
		 $pdf->Cell(23,3,$mesx,0,0,'L',0);
		 $pdf->SetXY(65.3,$y);
		 $pdf->Cell(9,3,'',0,0,'C',0);
		 $pdf->SetXY(73,$y);
		 $pdf->Cell(9,3,'',0,0,'C',0);
		 $pdf->SetXY(81,$y);
		 $pdf->Cell(12,3,$item['saldo_cuota'],0,0,'R',0);
		 $pdf->Ln(2);
		 $init=1;
	}else{
		$pdf->SetXY(12,$y);
		 list($año, $mes , $dia) = split('[/.-]', $item['fecha_cuota']);
		 //$pdf->SetFont('Arial','',7);
		 $pdf->Cell(9,3,$dia,0,0,'C',0);
		 //$pdf->SetXY(8,$y);
		 $pdf->SetXY(19,$y);
		 $pdf->Cell(9,3,$mes,0,0,'C',0);
		 //$pdf->SetXY(25,$y);
		 $pdf->SetXY(28,$y);
		 $pdf->Cell(11,3,number_format($item['valor_cuota'],2),0,0,'R',0);
		 $pdf->SetXY(43,$y);
		 $pdf->Cell(11,3,number_format($item['pagado'],2),0,0,'L',0);
		 $pdf->SetXY(51.5,$y);
		 list($añox, $mesx , $diax) = split('[/.-]', $item['fecha_pago']);
		 $pdf->Cell(22,3,$diax,0,0,'L',0);
		 $pdf->SetXY(59,$y);
		 $pdf->Cell(23,3,$mesx,0,0,'L',0);
		 $pdf->SetXY(65.3,$y);
		 $pdf->Cell(9,3,number_format($item['mora'],2),0,0,'C',0);
		 $pdf->SetXY(73,$y);
		 $pdf->Cell(9,3,number_format(($item['dias']),0),0,0,'C',0);
		 $pdf->SetXY(81,$y);
		 $pdf->Cell(12,3,$item['saldo_cuota'],0,0,'R',0);
		 $pdf->Ln(2);

	}
	 $y+=4.9;
	 $VUELTAS+=1;
}
$pdf->setPrintHeader(false);
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