<?php
require_once ROOT.DS.'vendor'.DS.'phpoffice'.DS.'phpexcel'.DS.'Classes'.DS.'PHPExcel.php';
Class FuncionesExcel
{
  public static function exportarCabecera()
    {
  	
      $objPHPExcel = new \PHPExcel();
      ini_set('memory_limit', '-1');
    	$objPHPExcel->
    		getProperties()
    			->setTitle("cabecera");


          $objPHPExcel->setActiveSheetIndex(0)
        				->setCellValue('A1', 'nombre')
        				->setCellValue('B1', 'dni')
        				->setCellValue('C1', 'domicilio')
        				->setCellValue('D1', 'provincia')
        				->setCellValue('E1', 'localidad')
        				->setCellValue('F1', 'laboral')
        				->setCellValue('G1', 'cantidad')
        				->setCellValue('H1', 'categoria')
                ->setCellValue('I1', 'producto')
                ->setCellValue('J1', 'numero_producto')
                ->setCellValue('K1', 'fecha_mora')
                ->setCellValue('L1', 'dias_mora')
                ->setCellValue('M1', 'capital_inicial')
                ->setCellValue('N1', 'total')
                ->setCellValue('O1', 'asignado')
                ->setCellValue('P1', 'telefono')
                ->setCellValue('Q1', 'telefono')
                ->setCellValue('R1', 'telefono')
                ->setCellValue('S1', 'telefono')
                ->setCellValue('T1', 'telefono')
                ->setCellValue('U1', 'telefono')
                ->setCellValue('V1', 'telefono');

                foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col)
                {
                      $objPHPExcel->getActiveSheet()
                              ->getColumnDimension($col)
                              ->setAutoSize(true);
                  }

                  // Seteo el nombre del archivo

                  $_file_name_aux = "cabecera";

                  header("Content-Type:   application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
                  //header('Content-Type: application/vnd.ms-excel');
                  header('Content-Disposition: attachment;filename='.$_file_name_aux.'.xls');
                  header('Cache-Control: max-age=0');


                  $objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
                  $objWriter->save('php://output');
                  return;

    }
}
?>