<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
include("../conn.php");
require_once('tcpdf_include.php');



$code = $_GET['code'];    
$identite_patient = "SELECT * FROM patient where pat_id = $code";
$resultpat= mysqli_query($conn, $identite_patient);
$pat = mysqli_fetch_assoc($resultpat);

$identite = "SELECT * FROM rdv ";
$rs= mysqli_query($conn, $identite);
$rdv = mysqli_fetch_assoc($rs);


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = K_PATH_IMAGES.'dentaire.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$core_fonts = array('courier', 'courierB', 'courierI', 'courierBI', 'helvetica', 'helveticaB', 'helveticaI', 'helveticaBI', 'times', 'timesB', 'timesI', 'timesBI', 'symbol', 'zapfdingbats');

// add a page
$pdf->AddPage();





$pdf->Image('sans.jpg',0,0,210);
//set font to arial, bold, 14pt

$pdf->SetXY(13,9.4);
//Cell(width , height , text , border , end line , [align] )
$pdf->SetTextColor(51,122,183);
 $pdf->Ln(1.4);
 $pdf->SetX(15);
 $pdf->SetFont('timesB', '', 10);

$pdf->Cell(120	,5,'DOCTEUR DOCTEUR ',0,0);

$pdf->SetFont('aefurat', '', 15);
$pdf->SetX(-35);
$pdf->Cell(169	,5,'الدكتور',0,1);//end of line

$pdf->SetX(15);

//set font to arial, regular, 12pt
$pdf->SetFont('times', '', 10);
$pdf->SetTextColor(51,122,183);
$pdf->Cell(150	,5,'MEDECIN DENTAIRE',0,0);
$pdf->SetX(-65);
$pdf->SetTextColor(51,122,183);
$pdf->SetFont('aefurat', '', 10);
$pdf->SetX(-35);
$pdf->Cell(150	,4,'طب الاسنان',0,0);
$pdf->Cell(89	,5,'',0,1);//end of line
$pdf->SetTextColor(1,1,1);
$pdf->SetFont('courierBI', '', 10);



// $pdf->Cell(130	,5,'Phone [+12345678]',0,0);
// $pdf->Cell(25	,5,'Invoice #',0,1);


// $pdf->Cell(130	,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25	,5,'Customer ID',0,1);


// $pdf->SetFillSpotColor('My TCPDF Dark Green', 100);
// $pdf->Rect(30, $starty, 40, 20, 'DF');

// $pdf->SetFillSpotColor('My TCPDF Dark Green', 100);
// $pdf->Rect(14,$pdf->GetY(),180,10,"F"); 
// $pdf->SetDrawColor(51,122,183); 
// $pdf->SetLineWidth(0.4);
// $pdf->MultiCell(180,10,"",1, 'R'); 

// $pdf->SetY(50);
// $pdf->SetFont('dejavusans', '', 15);
// $pdf->MultiCell(180,20,utf8_decode("OBJET : PRÊT SUR SALAIRE"),0, 'C');



$pdf->SetXY(-188,61);
$pdf->SetTextColor(51,122,183);

$pdf->Cell(72	,5,'Date :',0,1);

$pdf->SetXY(17,79);
$pdf->SetTextColor(51,122,183);

$pdf->Cell(69	,6,'Patient :',0,1);
$pdf->SetY(61);
$pdf->SetX(40);
$pdf->SetTextColor(1,1,1);
$pdf->MultiCell(105,5,utf8_decode($rdv['date']),0, 'L'); 

$pdf->SetY(79.7);
$pdf->SetX(40);
$pdf->MultiCell(105,5,utf8_decode(strtoupper($pat['nom'])) ,0, 'L'); 

$pdf->SetY(47);
// print some spot colors
$pdf->SetFont('dejavusans', 'BI U', 12);
$pdf->MultiCell(170,20,("ORDONNANCE"),0, 'C'); 



$pdf->SetY(110);

$query = "SELECT * FROM `medicament` ORDER BY `id_med` ASC ";
$result = mysqli_query($conn, $query);  

if(mysqli_num_rows($result) > 0)  
{  
$i=1;
$numResults = mysqli_num_rows($result);
$counter = 0; 


while($row = mysqli_fetch_array($result))  
{ 
	$pdf->SetTextColor(51,122,183);

    $current_y = $pdf->GetY()+8;
    $current_x = $pdf->GetX()+25;

    $ttttt = $pdf->GetY()+11;
    $current_x = $current_x;
    $pdf->SetXY($current_x, $ttttt);  
	$pdf->SetFont('dejavusans', '', 12);
    $pdf->MultiCell(7,5,$i++,0, 'C'); 
	$pdf->SetFont('dejavusans', 'BI U', 12);
    $current_x = $current_x+10;
    $pdf->SetXY($current_x, $ttttt); 
	$pdf->MultiCell(105,5,utf8_decode($row['nom_med']),0, 'L'); 
    $current_x = $current_x+40;
    $pdf->SetXY($current_x, $ttttt); 
	$pdf->SetFont('dejavusans', 'BI U', 12);
	$pdf->MultiCell(105,5,utf8_decode($row['dosage']),0, 'L'); 
	$pdf->SetFont('courierBI', '', 11);
    $pdf->SetTextColor(1,1,1);

	$current_x = $current_x+24;

    $pdf->SetXY($current_x, $ttttt); 
	$pdf->MultiCell(105,2,utf8_decode($row['observation']),0, 'L'); 
    

   


}
}




















// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
