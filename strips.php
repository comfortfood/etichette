<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/src/StripWriter.php";

define("_SYSTEM_TTFONTS", __DIR__ .'/font/' );

$pdf = new tFPDF();
$pdf->AddPage();

$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->AddFont('MarkaziText', '', 'MarkaziText-Regular.ttf', true);
$pdf->AddFont('Scheherazade', '', 'Scheherazade-Regular.ttf', true);

$stripWriter = new StripWriter();
$csv = array_map('str_getcsv', file('php://input'));
foreach ($csv as $line) {
    if ($line != "") {
        $stripWriter->writeStrip($pdf, $line);
    }
}

$pdf->Output();