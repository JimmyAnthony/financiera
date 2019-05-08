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

$rs = $this->objDatos->SP_REPORTE_COLOCADO($p);
$objReader = new PHPExcel_Reader_Excel5();
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

$arrayNCol = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

$arrayHeader= array('Año','Mes','Asesor','Colocado','Monto','Cobrado');

$i=1;
$stable=6;

foreach($arrayHeader as $index => $value){
    $objPHPExcel->getActiveSheet()->getColumnDimension($arrayNCol[$index])->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->setCellValue($arrayNCol[$index].''.$i, $value);
    $objPHPExcel->getActiveSheet()->getStyle($arrayNCol[$index].''.$i)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle($arrayNCol[$index].''.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(16);
}

++$i;
$j = 0;
foreach($rs as $fila){    

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[0].$i)->setValueExplicit(trim($fila['yearx']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[1].$i)->setValueExplicit(trim($fila['mes']), PHPExcel_Cell_DataType::TYPE_STRING);    

    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[2].$i)->setValueExplicit(trim(utf8_encode($fila['nombres'])), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[3].$i)->setValueExplicit(trim($fila['colocado']), PHPExcel_Cell_DataType::TYPE_STRING);
    
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[4].$i)->setValueExplicit(trim($fila['monto']), PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getCell($arrayNCol[5].$i)->setValueExplicit(trim($fila['cobrado']), PHPExcel_Cell_DataType::TYPE_STRING);
    ++$i;
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rpt_colocado.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
