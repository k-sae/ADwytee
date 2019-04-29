<?php

include_once '../../Application/livesearch.php';
include_once '../../Application/reportFactory.php';
if(isset($_GET['reportType']))
{
    $reportFactory = new reportFactory();
    $report = $reportFactory->getReport($_GET['reportType']);
    $report->CreateReport();
}



?>