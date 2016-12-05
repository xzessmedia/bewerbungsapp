<?php

require_once __DIR__ . '/vendor/mpdf/mpdf.php';

$mpdf = new Mpdf();

$mpdf->useOddEven = true;

$mpdf->SetHTMLHeader('<div style="text-align: right;"><img src="var:images" 
width="80px"/></div>', 'O');

$mpdf->SetHTMLFooter('<div style="text-align: left; font-family: Arial, Helvetica,
sans-serif; font-weight: bold;font-size: 7pt; ">Footer</div>');

$html = 'Content';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>