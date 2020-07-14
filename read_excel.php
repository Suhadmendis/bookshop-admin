<?php

/** Include path * */
set_include_path(get_include_path() . PATH_SEPARATOR . 'PHPExcel/Classes/');
include 'PHPExcel/IOFactory.php';

// include_once("connection_sql.php");

header('Content-Type: text/xml');


$columns = array("A", "Z");

$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file-3"]["name"]);
// unlink($target_file);
if (move_uploaded_file($_FILES["file-3"]["tmp_name"], $target_file)) {

}

$objPHPExcel = PHPExcel_IOFactory::load($target_file);
$objPHPExcel->setActiveSheetIndexByName("Sheet1");
$worksheet = $objPHPExcel->getActiveSheet();


// print_r($worksheet);

$cellCus = $worksheet->getCell("C2")->getValue();


$myArray = Array();
for ($i=1; $i < 990; $i++) { 
    array_push($myArray, $worksheet->getCell("D".$i)->getValue());
}


echo json_encode($myArray);

?>
