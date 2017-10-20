<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',5,2,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
	$this->Ln(15);

    $this->Cell(70);
    $this->Cell(30,10,'Yearly Revenue',0,'C');

	
    // Title
    //$this->image('logo1.png',140,2,60);
    // Line break
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start(); // it starts buffering
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Ln();
$pdf->Cell(70);
$pdf->Cell(40,12,'Year: ',0);
$pdf->Cell(25,12,$year,0);

$pdf->Ln();
$pdf->Cell(30);

$pdf->SetFont('Times','B',12);

foreach($header as $heading) {
		$pdf->Cell(50,12,$heading,1);
}

$pdf->SetFont('Times','',12);

$i=0;
for ($i = 0; $i < count($row1); $i++) {

	$pdf->Ln();
	$pdf->Cell(30);

	foreach($row1[$i] as $column)
	
		$pdf->Cell(50,12,$column,1);
}
$pdf->SetFont('Times','B',15);
$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(100,12,'Total Bill',1);
$pdf->Cell(50,12,$totalBill,1);



$pdf->Output();
ob_end_flush();




/*
$filename = "bill.pdf";

$pdf->Output($filename, 'F'); // save the pdf under filename
*/

?>