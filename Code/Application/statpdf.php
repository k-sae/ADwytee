<?php

require_once 'fpdf181/fpdf.php';

class PDF extends FPDF
{
    private $file_name= '../../Database/statistics.php';
    private $stat;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);

        try {
            include_once $this->file_name ;
        } catch (Exception $e) {
            echo "error";
        }

        $results = $this->retrieveData();

        $this->AddPage();
        $this->TableBody($results);
        $this->AliasNbPages();
    }

    function retrieveData()
    {
        $this->stat = new statistics_Query();

        return $this->stat->fetch_stat();
    }

    function Header()
    {
        $this->Image('../../Application/fpdf181/logo1.PNG',10,10,33,33);
        $this->SetFont('Arial','IB',36);
        $this->Cell(65);
        $this->Cell(60,20,'ADwytee',1,0,'C', false, 'index.php');
        $this->Ln(20);

        $this->SetFont('Arial','B',20);
        $this->Cell(65);
        $this->Cell(60,20,'Statistics',0,1,'C');
        $this->Cell(190,0,'','T');
    }

    function TableBody($array)
    {

      $this->Ln(10);

      $this->SetFont('Arial','B',16);
      $this->SetFillColor(128,128,128);
      $this->SetTextColor(255);

      $this->Cell(15,10,"No.",1,0,'C',true);
      $this->Cell(40,10,"Pharmacy",1,0,'C',true);
      $this->Cell(50,10,"Medicine",1,0,'C',true);
      $this->Cell(40,10,"Barcode",1,0,'C',true);
      $this->Cell(40,10,"No Of Orders",1,0,'C',true);
      $this->Ln();

      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);

      $fill = false;

      if($array != 0) {
        foreach ($array as $a => $value) {
          $this->SetFont('Times', 'I', 14);
          $this->Cell(15, 8, $a + 1, 'LR', 0, 'C', $fill);
          $this->Cell(40, 8, $value['Name'], 'LR', 0, 'L', $fill);
          $this->Cell(50, 8, $value['EnName'], 'LR', 0, 'L', $fill);
          $this->Cell(40, 8, $value['Code'], 'LR', 0, 'L', $fill);
          $this->Cell(40, 8, $value['NumberOfOrders'], 'LR', 0, 'L', $fill);
          $this->Ln();
          $fill = !$fill;
        }
      }else{
        $this->Cell(185, 8, 'No data were found!', 'LR', 0, 'C');
        $this->ln();
      }

      $this->Cell(185,0,'','T');

      $this->Ln();

      $this->SetFont('Arial','I',10);
      $this->Cell(40,8,'ON:'.$array[0]['Time']);

    }

    function Footer()
    {
        $this->SetY(-15);
        $this->Cell(190,0,'','T');
        $this->ln();
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'ADwytee', 0, 0, 'L');
        $this->Cell(-185, 10, 'Page '. $this->PageNo() . "/{nb}", 0, 0, 'C');
        $this->Cell(0, 10, 'ADwytee', 0, 0, 'R');
    }

}

?>