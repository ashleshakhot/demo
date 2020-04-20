<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once dirname(APPPATH) . '/pdf/tcpdf.php';
require_once APPPATH . 'third_party/pdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'fixed_logo.png';
        $this->Image($image_file, 0, 1, 210, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 10, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
	   $logoX = 0; // 186mm. The logo will be displayed on the right side close to the border of the page
	   $logoFileName = K_PATH_IMAGES.'footer_logo.png';
	   $logoWidth = 210; // 15mm
	   $logo = $this->PageNo() . ' | '. $this->Image($logoFileName, $logoX, $this->GetY()-18, $logoWidth);

	   $this->Cell(0,1, $logo, 0, 0, 'R');


    }
    public function download($txt='')
    {
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('STATCOMP TECHNOLOGY PVT LTD');
        $pdf->SetTitle('STATCOMP TECHNOLOGY PVT LTD');
        // $pdf->SetSubject('TCPDF Tutorial');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
        $pdf->SetFont('times', 'B', 10);
        
        // add a page
        $pdf->AddPage();
         $image_file = K_PATH_IMAGES.'stamp.jpeg';

        
        $pdf->writeHTML($txt, true, 0, true, 0);
        $pdf->Image($image_file, 160,$this->GetY(),35, '', 'JPEG', '', 'T', false, 0, '', false, false, 10, false, false, false);

        // reset pointer to the last page
        $pdf->lastPage();
        // ---------------------------------------------------------
        ob_end_clean();
        //Close and output PDF document
        $pdf->Output('STATCOMP TECHNOLOGY PVT LTD.pdf', 'I');


    }
   



}