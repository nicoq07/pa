

<?php 
$this->PhpExcel->
    	getProperties()
    	->setTitle("Cumpleanos $month");
    	$styleCells = array(
    			'borders' => array(
    					'allborders' => array(
    							'style' => \PHPExcel_Style_Border::BORDER_THIN
    					)
    			)
    	);
    	$this->PhpExcel->setActiveSheetIndex(0)
    	->setCellValue('A1', 'Nombre y Apellido')
    	->setCellValue('B1', 'Día')
    	->setCellValue('C1', 'Correo')
    	->setCellValue('D1', 'Correo madre')
    	->setCellValue('E1', 'Correo padre');
    	$_row = 1;
    	foreach ($alumnos as $alumno)
    	{
    		$_row = $_row +1;
    		$this->PhpExcel->setActiveSheetIndex(0)
    		->setCellValue('A'.$_row,h($alumno->presentacion))
    		->setCellValue('B'.$_row,h($alumno->fecha_nacimiento->format('j')))
    		->setCellValue('C'.$_row,h($alumno->email))
    		->setCellValue('D'.$_row,h($alumno->email_madre))
    		->setCellValue('E'.$_row,h($alumno->email_padre))
    		;
    		// Le aplico a todas las celdas el formato de borde.
    		$this->PhpExcel->getActiveSheet()->getStyle('A'.$_row)->applyFromArray($styleCells);
    		$this->PhpExcel->getActiveSheet()->getStyle('B'.$_row)->applyFromArray($styleCells);
    		$this->PhpExcel->getActiveSheet()->getStyle('C'.$_row)->applyFromArray($styleCells);
    		$this->PhpExcel->getActiveSheet()->getStyle('D'.$_row)->applyFromArray($styleCells);
    		$this->PhpExcel->getActiveSheet()->getStyle('E'.$_row)->applyFromArray($styleCells);
    	}
    	// Ajusto el ancho de las columnas
    	foreach (range('A', $this->PhpExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
    		$this->PhpExcel->getActiveSheet()
    		->getColumnDimension($col)
    		->setAutoSize(true);
    	}
    	//
    	// Seteo el formato por default de los bordes para las celdas del encabezado y las pongo en negrita
    	$styleHeader = array(
    			'borders' => array(
    					'allborders' => array(
    							'style' => \PHPExcel_Style_Border::BORDER_THIN
    					)
    			),
    			'font' => array(
    					'bold' => true
    			)
    	);
    	$this->PhpExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleHeader);
    	$this->PhpExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleHeader);
    	$this->PhpExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleHeader);
    	$this->PhpExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleHeader);
    	$this->PhpExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleHeader);
    	// Seteo el nombre del archivo
    	$this->response = $this->response->withType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

?>