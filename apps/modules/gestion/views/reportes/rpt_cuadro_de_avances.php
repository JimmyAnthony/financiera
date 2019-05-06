<?php
set_time_limit(180);
ini_set("memory_limit", -1);

require_once PATH . 'libs/PHPExcel/PHPExcel.php';
require_once PATH . 'libs/PHPExcel/PHPExcel/Reader/Excel2007.php';

$styleArray = array(
    'font' => array(
        'name' => 'Calibri',
        'size' => 11,
        'color' => array(
            'argb' => 'FFFFFFFF',
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
    ), 'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'argb' => 'FF6495ED',
        ),
        'endcolor' => array(
            'argb' => 'FF6495ED',
        ),
    ),
);

$rs = $this->objDatos->get_list_reportes_cuadro_avance($p);
$objReader = new PHPExcel_Reader_Excel5();
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

$arrayNCol = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

$arrayHeader= array('Asesor','Detalle','DIRECCION','SERVICIO HOUSE','Asesor','Detalle','DIRECCION','SERVICIO HOUSE','Asesor','Detalle','DIRECCION','SERVICIO HOUSE','Asesor','Detalle','SERVICIO HOUSE','Asesor','Detalle','Detalle');

$i=1;
$stable=6;

/*foreach($arrayHeader as $index => $value){
    $objPHPExcel->getActiveSheet()->getColumnDimension($arrayNCol[$index])->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->setCellValue($arrayNCol[$index].''.$i, $value);
    $objPHPExcel->getActiveSheet()->getStyle($arrayNCol[$index].''.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle($arrayNCol[$index].''.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
}*/

$styleArray2 = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );
$objPHPExcel->getDefaultStyle()->applyFromArray($styleArray2);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, 'Asesor');
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('A1:A3');

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, 'Detalle');
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('B1:B3');



$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, 'Semana');
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('C1:P1');



$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, 'Total Solicitudes');
$objPHPExcel->getActiveSheet()->getStyle('Q'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('Q'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('Q1:Q3');


$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('R'.$i, 'Total');
$objPHPExcel->getActiveSheet()->getStyle('R'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('R'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('R1:R3');


++$i;

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, 'Lunes');
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('C2:D2');

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, 'Martes');
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('E2:F2');

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, 'Miercoles');
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('G2:H2');

$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, 'Jueves');
$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('I2:J2');

$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, 'Viernes');
$objPHPExcel->getActiveSheet()->getStyle('K'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('K2:L2');

$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, 'Sábado');
$objPHPExcel->getActiveSheet()->getStyle('M'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('M2:N2');

$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, 'Domingo');
$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
$objPHPExcel->getActiveSheet()->mergeCells('O2:P2');


++$i;


$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);


$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);


$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('K'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('L'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('M'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);


$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('N'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, 'Nro');
$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);

$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, 'Monto');
$objPHPExcel->getActiveSheet()->getStyle('P'.$i)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('P'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);


++$i;
$j = 0;
foreach($rs as $fila){    

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[0].$i)->setValueExplicit(trim(utf8_encode($fila['nombres'])), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[1].$i)->setValueExplicit(trim(utf8_encode($fila['detalle'])), PHPExcel_Cell_DataType::TYPE_STRING);    

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[2].$i)->setValueExplicit(trim($fila['cant_lu']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[3].$i)->setValueExplicit(trim($fila['monto_lu']), PHPExcel_Cell_DataType::TYPE_STRING);
    
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[4].$i)->setValueExplicit(trim($fila['cant_ma']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[5].$i)->setValueExplicit(trim($fila['monto_ma']), PHPExcel_Cell_DataType::TYPE_STRING);

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[6].$i)->setValueExplicit(trim($fila['cant_mi']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[7].$i)->setValueExplicit(trim($fila['monto_mi']), PHPExcel_Cell_DataType::TYPE_STRING);

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[8].$i)->setValueExplicit(trim($fila['cant_ju']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[9].$i)->setValueExplicit(trim($fila['monto_ju']), PHPExcel_Cell_DataType::TYPE_STRING);

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[10].$i)->setValueExplicit(trim($fila['cant_vi']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[11].$i)->setValueExplicit(trim($fila['monto_vi']), PHPExcel_Cell_DataType::TYPE_STRING);

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[12].$i)->setValueExplicit(trim($fila['cant_sa']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[13].$i)->setValueExplicit(trim($fila['monto_sa']), PHPExcel_Cell_DataType::TYPE_STRING);

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[14].$i)->setValueExplicit(trim($fila['cant_do']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[15].$i)->setValueExplicit(trim($fila['monto_do']), PHPExcel_Cell_DataType::TYPE_STRING);   

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[16].$i)->setValueExplicit(trim($fila['total_sol']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[17].$i)->setValueExplicit(trim($fila['total']), PHPExcel_Cell_DataType::TYPE_STRING);  
    ++$i;
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rpt_cuadro_de_avances.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
