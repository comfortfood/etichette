<?php

require_once __DIR__ . "/Template.php";

class StripWriter
{
    function writeStrip($pdf, $csvLine)
    {
        $template = null;
        switch ($csvLine[0]) {
            case "1":
                $template = new Template1();
                break;
            case "2":
                $template = new Template2();
                break;
            default:
                $template = new Template1();
        }
        $template->writeStrip($pdf, $csvLine);
    }
}