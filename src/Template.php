<?php

require_once __DIR__ . "/../vendor/autoload.php";

interface Template
{
    function writeStrip(tFPDF $pdf, $csvLine, $songA, $songB, $artistA, $artistB, $imageRef);
}

class Template1 implements Template
{
    function writeStrip(tFPDF $pdf, $csvLine, $songA, $songB, $artistA, $artistB, $imageRef)
    {
        $pdf->SetFont('DejaVu', '', 14);
        $pdf->Write(5, $songA . "\n");
        $pdf->Write(5, $artistA . "\n");
        if ($artistB != "") {
            $pdf->Write(5, $artistB . "\n");
        }
        $pdf->Write(5, $songB . "\n\n");
    }
}

class Template2 implements Template
{
    function writeStrip(tFPDF $pdf, $csvLine, $songA, $songB, $artistA, $artistB, $imageRef)
    {
        $pdf->SetFont('Scheherazade', '', 14);
        $pdf->Write(5, $songA . "\n");
        $pdf->Write(5, $artistA . "\n");
        if ($artistB != "") {
            $pdf->Write(5, $artistB . "\n");
        }
        $pdf->Write(5, $songB . "\n\n");
    }
}