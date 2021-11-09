
<?php
// cell( width, height , border (0=no border , 1=bordered) , end line(0=continue , 1=newline) ,align L or C or R )
include("../conn.php");
require_once('tcpdf_include.php');


$code = $_GET['code'];    
$identite_patient = "SELECT * FROM patient where pat_id = $code ";
$resultpat= mysqli_query($conn, $identite_patient);
$patients = mysqli_fetch_assoc($resultpat);
$nom_prenom = strtoupper($patients['nom'] );
$datenais = $patients['ddn'];
$age= $patients['adresse'];

$identite_doc ="SELECT * FROM docteur";
$resultdoc= mysqli_query($conn, $identite_doc);
$doc = mysqli_fetch_assoc($resultdoc);
$nom_doc = strtoupper($doc['nomDoc'] );
$adresse=$doc['adresse'];
$telephone=$doc['telephone'];




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




$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage('p', 'A4', 'mm' ); 
$pdf->SetFont('dejavusans', '', 12);
$h = 7;
$retrait = "         ";




$pdf->SetXY(13,9.4);
//Cell(width , height , text , border , end line , [align] )
$pdf->SetTextColor(51,122,183);
 $pdf->Ln(1.4);
 $pdf->SetX(15);
$pdf->Cell(120	,5,'Docteur DOCTEUR ',0,0);

$pdf->SetFont('aefurat', '', 15);
$pdf->SetX(-35);
$pdf->Cell(169	,5,'الدكتور',0,1);//end of line

$pdf->SetX(15);

//set font to arial, regular, 12pt
$pdf->SetFont('dejavusans', '', 10);
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


$pdf->SetXY(-188,61);

$pdf->Cell(72	,5,'Date :',0,1);

$pdf->SetXY(19,79);

$pdf->Cell(72	,6,'Patient :',0,1);
$pdf->SetY(61);
$pdf->SetX(40);

$pdf->SetY(79.7);
$pdf->SetX(40);
$pdf->MultiCell(105,5, $nom_prenom ,0, 'L'); 

$pdf->SetY(47);
// print some spot colors
$pdf->SetFont('dejavusans', 'BI U', 12);
$pdf->MultiCell(170,20,("CERTIFICAT MEDICAL"),0, 'C'); 



       

        $pdf->Ln(23);
        $pdf->SetFont('dejavusans', '', 12);
        $h = 7;
        $retrait = "           ";
        $pdf->SetY(112);
        $pdf->SetX(9);
        $pdf->Write($h, $retrait .  "JE SOUSSIGNE (E)   : " );
        $pdf->SetFont('', 'BI');
       $pdf -> Write($h, $nom_doc  . "\n" );
       $pdf->Ln(2);
        $pdf->SetFont('', '');

        $pdf->Write($h, $retrait .  "DOCTEUR EN MEDECINE, CERTIFIE    \n" );
        $pdf->Ln(2);
        $pdf->SetFont('', '');
        $pdf->Write($h, $retrait .  "AVOIR EXAMINE AUJOURDHUI M. / Mme  :  " );

        $pdf->SetFont('', 'BI');
        $pdf -> Write($h, $nom_prenom  . "\n" );
        $pdf->Ln(2);

        $pdf->SetFont('', '');

        $pdf->Write($h, $retrait .  "LE/LA PATIENT(E) EST EN BONNE SANTE PHYSIQUE ET NE SOUFFRE PAS DE
           GRAVES MALADIES          
    " );
        $pdf->Ln(2);
           $pdf->Write($h, $retrait . "CHRONIQUES OU VENERIENNES, DE TUBERCULOSE NI D’AUTRE MALADIE
            MORTELLE. 
" );
         $pdf->Ln(2);

$pdf->Output();

?>





