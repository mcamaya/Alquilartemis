<?php
require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML('HEEEY');

// Output a PDF file directly to the browser
$mpdf->Output();