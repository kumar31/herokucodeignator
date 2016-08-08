<?php require 'Classes/PHPExcel.php'; 


if ($talents_details != '') {


    // Create a new PHPExcel object 
    $objPHPExcel = new PHPExcel(); 
    $objPHPExcel->getActiveSheet()->setTitle('Talents Details'); 
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

    $rowNumber = 1; 
    $col = 'A'; 
	



	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'ID')	
            ->setCellValue('B1', 'Talent Name')
            ->setCellValue('C1', 'Email')
            ->setCellValue('D1', 'Amount')
            ->setCellValue('E1', 'Payment Status');
	
	
   // foreach($headings as $heading) { 
    //   $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading); 
     //  $col++; 
   // } 

    // Loop through the result set 
    $rowNumber = 2; 
    foreach ($talents_details as $val) { 	


		$col 	= 'A';
		$colB 	= 'B';
		$colC 	= 'C';
		$colD 	= 'D';
		$colE	= 'E'; 
	    
		if($val['amount'] == "")  { 
			$talent_payment = "";		
		} else { 
		$talent_payment = $val['amount'];
		} 
		if($val['amount'] == "") 
		{ 
		$paid = "Not Paid"; 
		} 
		else 
		{ 
		$paid = "Paid"; 
		} 

		$objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$val['talent_id']); 
		$objPHPExcel->getActiveSheet()->setCellValue($colB.$rowNumber,$val['first_name']); 
		$objPHPExcel->getActiveSheet()->setCellValue($colC.$rowNumber,$val['email']); 
		$objPHPExcel->getActiveSheet()->setCellValue($colD.$rowNumber,$talent_payment); 
		$objPHPExcel->getActiveSheet()->setCellValue($colE.$rowNumber,$paid); 
		
	
		$col++; 
		$colB++; 
		$colC++; 
		$colD++; 
		$colE++; 
		 		
	
       $rowNumber++; 
	   $count=$rowNumber;
    } 
	
	
            

    // Freeze pane so that the heading line won't scroll 
    $objPHPExcel->getActiveSheet()->freezePane('A2'); 
	
    // Save as an Excel BIFF (xls) file 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

   header('Content-Type: application/vnd.ms-excel'); 
   header('Content-Disposition: attachment;filename="Items.xls"'); 
   header('Cache-Control: max-age=0'); 

   $objWriter->save('php://output'); 
   exit(); 
} 
echo 'a problem has occurred... no data retrieved from the database'; 
?>