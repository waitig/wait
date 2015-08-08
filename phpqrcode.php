<?php 
include "./lib/phpqrcode/phpqrcode.php"; 
$value=$_GET["url"]; 
$errorCorrectionLevel = "L"; 
$matrixPointSize = "4"; 
QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize); 
exit; 
?>
