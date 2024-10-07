<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
      public function Header() {
        // Logo
		
        $image_file = K_PATH_IMAGES.'NCS Form Logo.jpg';
        
        $this->Image($image_file, 15, 3, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('dejavuserif', 'N', 18);

        /*$this->Ln(5);        

        $this->Cell(294, 15, 'fhsjdfhdsjfgjhfdgjh', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(5);        
        $this->Cell(300, 0, 'Company tag line here', 0, false, 'C', 0, '', 0, false, 'M', 'M');*/
        // Title
        //$this->Cell(0, 40, '', 0, false, 'C', 0, '', 0, false, 'M', 'B');
    }

   // Page footer
 public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
		
        $this->Cell(0, 10,'Form 1 | Life Stage Section / Nutrition Research and Development Group / Food and Nutrition Research Institute- Department of Science and Technology | '. 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


    
}
/*Author:Tutsway.com */  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */