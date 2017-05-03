<?php

require_once 'fpdf181/fpdf.php';
include_once '../../Application/livesearch.php';

class PDF extends FPDF
{

  function Header()
  {
      $this->Image('fpdf181/logo1.PNG',10,10,33,33);
      $this->SetFont('Arial','IB',36);
      $this->Cell(65);
      $this->Cell(60,20,'ADwytee',1,0,'C', false, 'index.php');
      $this->Ln(20);

      $this->SetFont('Arial','B',20);
      $this->Cell(65);
      $this->Cell(60,20,'Statistics',0,20,'C');
  }

  function TableBody($array)
  {
    $this->Ln();

    $this->SetFont('Arial','B',16);
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);

    $this->Cell(20,10,"No.",1,0,'C',true);
    $this->Cell(40,10,"Pharmacy",1,0,'C',true);
    $this->Cell(40,10,"Medicine",1,0,'C',true);
    $this->Cell(40,10,"Barcode",1,0,'C',true);
    $this->Cell(40,10,"No Of Orders",1,0,'C',true);
    $this->Ln();

    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);

    $fill = false;

    foreach($array as $a => $value)
    {
      $this->SetFont('Times','I',14);
      $this->Cell(20,8,$a,'LR',0,'L',$fill);
      $this->Cell(40,8,"Pharmacy Name...",'LR',0,'L',$fill);
      $this->Cell(40,8,$value['EnName'],'LR',0,'L',$fill);
      $this->Cell(40,8,"Medicine Barcode...",'LR',0,'L',$fill);
      $this->Cell(40,8,"No Of Orders...",'LR',0,'L',$fill);
      $this->Ln();
      $fill = !$fill;
    }

      $this->Cell(180,0,'','T');

  }

  function Footer()
  {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'ADwytee', 0, 0, 'L');
      $this->Cell(-185, 10, 'Page '. $this->PageNo(), 0, 0, 'C');
      $this->Cell(0, 10, 'ADwytee', 0, 0, 'R');
  }

}


$pdf = new PDF();
$pdf->AddPage();

//Will be changed, just testing!
$livesearch = new livesearch();
$results = $livesearch->search("p");

$pdf->TableBody($results);

$pdf->Output();

?>