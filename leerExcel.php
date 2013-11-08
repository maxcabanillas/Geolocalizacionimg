<?php
	require_once 'PHPExcel/IOFactory.php';
	include_once('clases/MySQL.php');
	include_once('GLOBALS.php');
	$oMySQL = new MySQL(BASE, USUARIO, CLAVE,SERVIDOR);
	
	$objPHPExcel = PHPExcel_IOFactory::load("insumos/espectaculares.xlsx");
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 64;
		/* echo "<br>The worksheet ".$worksheetTitle." has ";
		echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
		echo ' and ' . $highestRow . ' row.';
		echo '<br>Data: <table border="1"><tr>'; */
		for ($row = 1; $row <= $highestRow; ++ $row) {

			for ($col = 0; $col < $highestColumnIndex; ++ $col) {
				$cell = $worksheet->getCellByColumnAndRow($col, $row);
				$val = $cell->getValue();
				if($col==0){
					$No=$cell->getValue();;
				}
				if($col==1){
					$Clave=$cell->getValue();;
				}
				if($col==2){
					$ID=$cell->getValue();;
				}
				if($col==3){
					$Municipio=$cell->getValue();;
				}
				if($col==4){
					$h=$cell->getValue();;
				}
				if($col==5){
					$w=$cell->getValue();;
				}
				if($col==6){
					$Dir=$cell->getValue();;
				}
				if($col==7){
					$Latitud=$cell->getValue();;
				}
				if($col==8){
					$Longitud=$cell->getValue();;
				}
				if($col==8){
					$query = "Insert Into espectaculares (idciudad,clave,latitud,longitud,direccion,w,h,foto) 
												values('".$ID."','".$Clave."','".$Latitud."','".$Longitud."','".$Dir."','".$w."','".$h."','img/uploads/reales/espectaculares/".$No.".jpg')";
					$res = $oMySQL->ExecuteSQL($query);
					
					//echo "No.".$No." Clave:".$Clave." Id:".$ID." Municipio:".$Municipio." h:".$h." w:".$w." Dir:".$Dir." Latitud:".$Latitud." Longitud:".$Longitud."<br>";
				}
				$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
				//echo '<td>' . $val . '<br></td>';
			}
		}
	}

?>