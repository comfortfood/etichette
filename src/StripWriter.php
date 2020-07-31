<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/Template.php";

class StripWriter
{
    function writeStrip(tFPDF $pdf, $csvLine)
    {

        $templateNum = $this->getCsvCell($csvLine, 0);
        $songA = $this->getCsvCell($csvLine, 1);
        $songB = $this->getCsvCell($csvLine, 2);
        $artistA = $this->getCsvCell($csvLine, 3);
        $artistB = $this->getCsvCell($csvLine, 4);
        $imageRef = $this->getCsvCell($csvLine, 5);

        $template = null;
        switch ($templateNum) {
            case "1":
                $template = new Template1();
                break;
            case "2":
                $template = new Template2();
                break;
            default:
                $template = new Template1();
        }

        $template->writeStrip($pdf, $csvLine, $songA, $songB, $artistA, $artistB, $imageRef);
    }

    public function getCsvCell($csvLine, $i)
    {
        return count($csvLine) > $i ? trim($csvLine[$i]) : "";
    }
}