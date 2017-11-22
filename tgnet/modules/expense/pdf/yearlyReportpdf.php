<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Image('logo.png',27,14,20);
	$this->SetFont('Arial','B',27);
	$this->ln(10);
	$this->Cell(63);
	$this->Cell(100,15,'Expense Report',0,1,'L',0);
	$this->ln(14);

	

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

$pdf->SetFont('Times','',14);

$pdf->Cell(63);
$pdf->Cell(27,12,'Time Period: ',0);
$pdf->Cell(25,12,$timePeriod,0);

$pdf->Ln(20);
$pdf->Cell(20);
$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(255,255,255);
foreach($header as $heading) {
		$pdf->SetFillColor(0, 0, 0);

		$pdf->Cell(50,7,$heading,1,0,'C',1);
}

$pdf->SetFont('Times','',12);

$i=0;
for ($i = 0; $i < count($row1); $i++) {

	$pdf->Ln();
	$pdf->Cell(20);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetTextColor(0,0,0);

	foreach($row1[$i] as $column)

		$pdf->Cell(50,7,$column,1,0,'C',1);
}
$pdf->SetFont('Times','B',12);
$pdf->Ln();
$pdf->Cell(20);
$pdf->SetFillColor(64, 64, 64);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(50,7,'Total Expense',1,0,'C',1);
$pdf->Cell(50,7,$totalBill,1,0,'C',1);
$pdf->Cell(50,7,'',1,0,'C',1);




$pdf->Output();
ob_end_flush();




/*
$filename = "bill.pdf";

$pdf->Output($filename, 'F'); // save the pdf under filename
*/

?>