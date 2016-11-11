<?php
define('FPDF_FONTPATH', '/home/carter/Documents/terca/projects/networking/phppdf/files/font');
require('fpdf.php');
require('BarcodeQR.php');

$code = new BarcodeQR();

$pdf = new FPDF("P", "in", "Letter");
$pdf->AddPage();
$pdf->SetFont('Times');
for($i = 0; $i <= 6; $i++){
	for($j = 0; $j <= 4; $j++){
		$code->text("test {$i} {$j}");
		$code->draw(150, "{$i}-{$j}.png");
		$pdf->Image("{$i}-{$j}.png", 0.5 + $j * 1.5, 0.25 + $i * 1.5, 1.5, 1.5);
	}
}
$pdf->Output();

?>