<?php


interface Template
{
    function writeStrip($pdf, $csvLine);
}

class Template1 implements Template
{
    function writeStrip($pdf, $csvLine)
    {
        $pdf->SetFont('Arial', '', 14);
        $pdf->Write(5, join("::", $csvLine) . "\n");
    }
}

class Template2 implements Template
{
    function writeStrip($pdf, $csvLine)
    {
        $pdf->SetFont('Scheherazade', '', 14);
        $pdf->Write(5, join("::", $csvLine) . "\n");
    }
}