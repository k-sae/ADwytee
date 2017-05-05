<?php

include_once '../../Application/livesearch.php';
include_once '../../Application/statpdf.php';

$pdf = new PDF();
//$pdf->AddPage();

$pdf->Output();

?>