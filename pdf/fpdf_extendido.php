<?php
class PDF extends FPDF {
	//public $dinamic_x;	
	public function getTablaTitulo($titulo,$cabecera,$alineacion,$data,$ancho,$fuente,$size,$x,$y,$alturaTitulo=4,$alturaData=4) {				
		$total = array_sum($ancho);
		$this->SetFont($fuente,'B',$size);		
		if(!empty($titulo))	{
			$this->SetXY($x,$y);
			$this->Cell($total,$alturaTitulo,$titulo,1,0,'C');
		}
		$y+=$alturaTitulo;
		$this->SetXY($x,$y);
		if($cabecera[0]<>''){	
			$this->SetFont($fuente,'B',$size);	
			for($i=0;$i<count($cabecera);$i++)
				$this->Cell($ancho[$i],$alturaTitulo,$cabecera[$i],1,0,'C');
			$this->Ln();
			$y+=$alturaTitulo;
		}
		$this->SetXY($x,$y);
		$this->SetFont($fuente,'I',$size);
		for($i=0; $i<count($data);$i++) {
			$this->Cell($ancho[$i],$alturaData,$data[$i],'LR',0,$alineacion[$i]);						
		}
		$this->Ln();
		//Línea de cierre
		$y+=$alturaData;
		$this->SetXY($x,$y);
		$this->Cell(array_sum($ancho),0,'','T');
	}
	
	public function getCuadro($ancho,$alturaTitulo=0,$alturaData=0,$titulo='',$data='',$borde=0,$alineacion='C',$x,$y,$fuente='Arial',$size='7') {		
		$this->SetXY($x,$y);		
		if(!empty($titulo))	{
			$this->SetFont($fuente,'B',$size);
			$this->Cell($ancho,$alturaTitulo,$titulo,1,0,'C');
			$y+=$alturaTitulo;
		}
		if(!empty($data)) {
			$this->SetFont($fuente,'I',$size);
			$this->SetXY($x,$y);
			$this->Cell($ancho,$alturaData,$data,$borde,0,$alineacion);
		}
	}	
	
	public function ImprovedTable($cabecera,$data,$ancho,$x,$y,$altura=4,$fuente='Arial',$size='7',$tipo='')
	{
		
		$this->SetXY($x,$y);		
		$this->SetFont($fuente,'B',$size);
		//Cabeceras
		for($i=0;$i<count($cabecera);$i++)
			$this->Cell($ancho[$i],$altura,$cabecera[$i],1,0,'C');
		$this->Ln();
		$fill=0;
		$this->SetXY($x,$y+$altura);
		$this->SetFont($fuente,'I',$size);
		//Datos		
		switch($tipo){
			case 'pisos':
				foreach($data as $row)
				{
					$x=9;
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[0],'LR',0,'L',$fill);
					$this->Cell($ancho[1],$altura,$row[1],'LR',0,'L',$fill);
					$this->Cell($ancho[2],$altura,$row[19],'LR',0,'L',$fill);
					$this->Cell($ancho[3],$altura,$row[15],'LR',0,'L',$fill);
					$this->Cell($ancho[4],$altura,$row[16],'LR',0,'L',$fill);
					$this->Cell($ancho[5],$altura,$row[4],'LR',0,'L',$fill);
					$this->Cell($ancho[6],$altura,$row[7],'LR',0,'L',$fill);
					$this->Cell($ancho[7],$altura,$row[9],'LR',0,'L',$fill);
					$this->Cell($ancho[8],$altura,$row[10],'LR',0,'L',$fill);
					$this->Cell($ancho[9],$altura,$row[11],'LR',0,'L',$fill);
					$this->Cell($ancho[10],$altura,$row[12],'LR',0,'L',$fill);
					$this->Cell($ancho[11],$altura,$row[13],'LR',0,'L',$fill);
					$this->Cell($ancho[12],$altura,$row[14],'LR',0,'L',$fill);
					$this->Cell($ancho[13],$altura,'','LR',0,'L',$fill);
					$this->Cell($ancho[14],$altura,'','LR',0,'L',$fill);
					$this->Ln();
					$this->validaSalto(235);
				}
			break;
			case 'instalaciones':
				foreach($data as $row)
				{
					$x=9;
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[36],'LR',0,'L',$fill);
					$this->Cell($ancho[1],$altura,$row[11],'LR',0,'L',$fill);
					$this->Cell($ancho[2],$altura,$row[14],'LR',0,'L',$fill);
					$this->Cell($ancho[3],$altura,$row[15],'LR',0,'L',$fill);
					$this->Cell($ancho[4],$altura,$row[17],'LR',0,'L',$fill);
					$this->Cell($ancho[5],$altura,$row[16],'LR',0,'L',$fill);
					$this->Cell($ancho[6],$altura,$row[18],'LR',0,'L',$fill);
					$this->Cell($ancho[7],$altura,$row[19],'LR',0,'L',$fill);
					$this->Cell($ancho[8],$altura,$row[20],'LR',0,'L',$fill);
					$this->Cell($ancho[9],$altura,$row[24],'LR',0,'L',$fill);
					$this->Cell($ancho[10],$altura,$row[37],'LR',0,'L',$fill);					
					$this->Ln();		
					$this->validaSalto(235);			
				}
			break;
			case 'copropietarios':
				foreach($data as $row)
				{
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[4],'LR',0,'L',$fill);
					$this->Cell($ancho[1],$altura,$row[1],'LR',0,'L',$fill);								
					$this->Ln();
					$this->validaSalto(235);
				}
			break;
			case 'ficha_consolidado':
				foreach($data as $row){
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[1],'LR',0,'C',$fill);
					$this->Cell($ancho[1],$altura,$row[7],'LR',0,'L',$fill);	
					$this->Cell($ancho[2],$altura,$row[2],'LR',0,'C',$fill);	
					$this->Cell($ancho[3],$altura,substr($row[8],0,42),'LR',0,'L',$fill);	
					$this->Cell($ancho[4],$altura,$row[4],'LR',0,'C',$fill);	
					$this->Cell($ancho[5],$altura,$row[5],'LR',0,'C',$fill);	
					$this->Ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Expedientes':
				foreach($data as $row)
				{
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[0],'LR',0,'C',$fill);
					$this->Cell($ancho[1],$altura,$row[12],'LR',0,'L',$fill);	
					$this->Cell($ancho[2],$altura,$row[5],'LR',0,'C',$fill);	
					$this->Cell($ancho[3],$altura,$row[6],'LR',0,'C',$fill);	
					$this->Cell($ancho[4],$altura,$row[8],'LR',0,'C',$fill);	
					$this->Cell($ancho[5],$altura,$row[32],'LR',0,'C',$fill);	
					$this->Ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Reportebnd':
				foreach($data as $row){
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[1],'LR',0,'C',$fill);
					$this->Cell($ancho[1],$altura,$row[2],'LR',0,'L',$fill);	
					$this->Cell($ancho[2],$altura,$row[3],'LR',0,'C',$fill);	
					$this->Cell($ancho[3],$altura,$row[6],'LR',0,'C',$fill);	
					$this->Cell($ancho[4],$altura,$row[7],'LR',0,'C',$fill);	
					$this->Cell($ancho[5],$altura,$row[8],'LR',0,'C',$fill);	
					$this->Ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Reportebnd2':
				foreach($data as $row){
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[3],'LR',0,'C',$fill);
					$this->Cell($ancho[1],$altura,$row[1],'LR',0,'L',$fill);	
					$this->Cell($ancho[2],$altura,$row[2],'LR',0,'C',$fill);	
					$this->Cell($ancho[3],$altura,$row[4],'LR',0,'C',$fill);	
					$this->Cell($ancho[4],$altura,$row[5],'LR',0,'C',$fill);	
					$this->Cell($ancho[5],$altura,$row[6],'LR',0,'C',$fill);	
					$this->Ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Reportebnd3':
				foreach($data as $row){
					$this->SetX($x);
					$this->Cell($ancho[0],$altura,$row[3],'LR',0,'C',$fill);
					$this->Cell($ancho[1],$altura,$row[1],'LR',0,'L',$fill);	
					$this->Cell($ancho[2],$altura,$row[2],'LR',0,'C',$fill);	
					$this->Cell($ancho[3],$altura,$row[6],'LR',0,'C',$fill);	
					$this->Cell($ancho[4],$altura,$row[8],'LR',0,'C',$fill);	
					$this->Cell($ancho[5],$altura,$row[7],'LR',0,'C',$fill);	
					$this->Ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Tramites0':				
				foreach($data as $row){
					$this->SetX($x);										
					$y = $this->GetY();
					$this->MultiCell($ancho[0],$altura,trim($row[4]),'0','C',$fill);	
					$this->SetXY($x+$ancho[0],$y);
					$this->MultiCell($ancho[1],$altura,trim($row[6]),'0','C',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1],$y);
					$this->MultiCell($ancho[2],$altura,trim($row[3]),'0','L',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2],$y);
					$this->MultiCell($ancho[3],$altura,trim($row[8]),'0','L',$fill);																						
					$this->Line($x,$y,$x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3],$y);
					$this->ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Tramites1':
				foreach($data as $row)
				{
					$this->SetX($x);
					$y = $this->GetY();
					$this->MultiCell($ancho[0],$altura,$row[4],0,'C',$fill);	
					$this->SetXY($x+$ancho[0],$y);
					$this->MultiCell($ancho[1],$altura,$row[5],0,'C',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1],$y);
					$this->MultiCell($ancho[2],$altura,$row[6],0,'L',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2],$y);
					$this->MultiCell($ancho[3],$altura,$row[3],0,'L',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3],$y);
					$this->MultiCell($ancho[4],$altura,$row[9],0,'C',$fill);
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3]+$ancho[4],$y);
					$this->MultiCell($ancho[5],$altura,$row[10],0,'C',$fill);
					$this->Line($x,$y,$x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3]+$ancho[4]+$ancho[5],$y);
					$this->ln();
					$this->validaSalto(335);
				}
			break;
			case 'Lista_Tramites2':
				foreach($data as $row){
					$this->SetX($x);
					$y = $this->GetY();
					$this->MultiCell($ancho[0],$altura,$row[4],0,'C',$fill);	
					$this->SetXY($x+$ancho[0],$y);
					$this->MultiCell($ancho[1],$altura,$row[5],0,'C',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1],$y);
					$this->MultiCell($ancho[2],$altura,$row[6],0,'L',$fill);
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2],$y);
					$this->MultiCell($ancho[3],$altura,$row[3],0,'L',$fill);	
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3],$y);
					$this->MultiCell($ancho[4],$altura,$row[9],0,'C',$fill);
					$this->SetXY($x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3]+$ancho[4],$y);
					$this->MultiCell($ancho[5],$altura,$row[10],0,'C',$fill);
					$this->Line($x,$y,$x+$ancho[0]+$ancho[1]+$ancho[2]+$ancho[3]+$ancho[4]+$ancho[5],$y);
					$this->ln();
					$this->validaSalto(335);
				}
			break;	
			default:
			break;
		}
		//Línea de cierre
		$this->SetX($x);
		$this->Cell(array_sum($ancho),0,'','T');
	}
	
	public function getTexto($data,$x,$y) {
		$this->Text($x,$y,$data);
	}	
	
	public function validaSalto($num)
	{
		if($this->GetY()>$num) {
			$this->AddPage();
			$this->SetY(35);
			return true;
		}
		else
			return false;
	}
}
?>
