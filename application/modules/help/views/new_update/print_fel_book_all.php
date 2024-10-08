<?php
// create new PDF document
$pdf = new MYPDF('L', 'mm', array(300,300), true, 'UTF-8', false);

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
    }
    //Page Footer
    public function Footer() {
        $this->SetFont('helvetica', 'N', 10);
        $time=(date("h")+6);
        $this->Cell(0, 5, '                      Release 1 February 2021 Download Date '.date("m/d/Y ".$time.":i:s"), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 6);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('FEL Records');
$pdf->SetTitle('HelpOnline FEL');
$pdf->SetSubject('FEL');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// ---------------------------------------------------------

// remove default header/footer
$pdf->setPrintHeader(false);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont("helvetica", 10);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

$pdf->setPrintFooter(false);

// Display image on full page
$pdf->Image(base_url().'assets/images/felfrontcover.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 0, '', false, false, 0, false, false, false);

// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

$pdf->setPrintFooter(false);

// Display image on full page
$pdf->Image(base_url().'assets/images/fel_1.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 200, '', false, false, 0, false, false, false);

// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

$pdf->setPrintFooter(false);

// Display image on full page
$pdf->Image(base_url().'assets/images/fel_2.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 200, '', false, false, 0, false, false, false);

// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

$pdf->setPrintFooter(true);

// Display image on full page
$pdf->Image(base_url().'assets/images/fel_3.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 200, '', false, false, 0, false, false, false);


$space_val = '<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

//$html = $html.'<img style="padding-top: 0px; margin-top; 0px; width: 30000%; height: auto;" src="'.base_url().'assets/images/felfrontcover.jpg" alt="FEL Icon" width="10000%" height="auto">';
//$html = $html.'<img style="padding-top: 0px; margin-top; 0px; width: 10000%; height: auto;" src="'.base_url().'assets/images/fel_1.jpg" alt="FEL Icon" width="10000%" height="auto">';
//$html = $html.'<img style="padding-top: 0px; margin-top; 0px; width: 10000%; height: auto;" src="'.base_url().'assets/images/fel_2.jpg" alt="FEL Icon" width="10000%" height="auto">';

            $this->load->model('mdl_help', '', TRUE);
            foreach ($this->load->mdl_help->get_fel_content_update_all() as $value) {

                // add a page 
                $pdf->AddPage("", "");
                
                $html = '';
                $img_data = base_url()."assets/images/fel_photo/none_img.jpg";
                if($value->image_lib!=""){
                    $img_data = base_url()."assets/images/fel_photo/".$value->image_lib;
                }else{
                    $img_data = base_url()."assets/images/fel_photo/none_img.jpg";
                }    
                
                $html = $html.'<br>';
                $html = $html.$space_val.'<img style="padding: 0px; margin; 0px; width: 900px; height: auto;" src="'.$img_data.'" alt="FEL Icon" width="900px" height="auto">';
                
                
                
                $html = $html.'<br><br><br><br><table width="100%" style="width: 100%;">
                  <tbody>
                    <tr>
                        <td colspan="2" width="100%" style="text-align: center; font-family: Arial;"><center><p><b>'; foreach ($this->load->mdl_help->get_fel_cat_by_id($value->list_id) as $value_cat) { $html = $html."List ".$value_cat->numerical_val.' - '.$value_cat->name; } $html = $html.'</b></p></center></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>English Name: <br><b>'.$value->name_e.'</b></p></td>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Edible Weight (g): <br><b>'.$value->weight.'</b></p></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Filipino Name: <br><b>'.$value->name_p.'</b></p></td>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Household Measure (Dimension): <br><b>'.$value->household_measure.'</b></p></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Calorie (kcal): <br><b>'; if($value->calorie=="0"){ $html = $html.'-'; }else{ $html = $html.$value->calorie; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Carbohydrate (g): <br><b>'; if($value->carb=="0"){ $html = $html.'-'; }else{ $html = $html.$value->carb; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Protein (g): <br><b>'; if($value->protein=="0"){ $html = $html.'-'; }else{ $html = $html.$value->protein; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Fat (g): <br><b>'; if($value->fat=="0"){ $html = $html.'-'; }else{ $html = $html.$value->fat; } $html = $html.'</b></p></td>
                    </tr>
                  </tbody>
                </table>';
                
                // Print a text
                $pdf->writeHTML($html, true, false, true, false, '');
                //----------------------------------------------------------
                    
            }

            foreach ($this->load->mdl_help->get_fel_content_update_sub_all() as $value) {

                // add a page 
                $pdf->AddPage("", "");
                
                $html = '';
                $img_data = base_url()."assets/images/fel_photo/none_img.jpg";
                if($value->image_lib!=""){
                    $img_data = base_url()."assets/images/fel_photo/".$value->image_lib;
                }else{
                    $img_data = base_url()."assets/images/fel_photo/none_img.jpg";
                }    
                
                $html = $html.'<br>';
                $html = $html.$space_val.'<img style="padding: 0px; margin; 0px; width: 900px; height: auto;" src="'.$img_data.'" alt="FEL Icon" width="900px" height="auto">';
                
                
                
                $html = $html.'<br><table width="100%" style="width: 100%;">
                  <tbody>
                    <tr>
                        <td colspan="2" width="100%" style="text-align: center; font-family: Arial;"><center><p><b> Selected Food List'; $html = $html.'</b></p></center></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>English Name: <br><b>'.$value->name_e.'</b></p></td>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Edible Weight (g): <br><b>'.$value->weight.'</b></p></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Filipino Name: <br><b>'.$value->name_p.'</b></p></td>
                        <td width="50%" style="text-align: center; font-family: Arial;"><p>Household Measure (Dimension): <br><b>'.$value->household_measure.'</b></p></td>
                    </tr>
                    <tr><td></td></tr>
                    
                    
                    <tr>
                        <td colspan="2" width="100%" style="text-align: center; font-family: Arial;"><center><p><b>Exchange per Serving:</b></p></center></td>
                    </tr>
                    <tr>
                            <td width="25%" style="text-align: center; font-family: Arial;"><p>Vegetables: <b>'; if($value->veg=="0"){ $html = $html.'-'; }else{ $html = $html.$value->veg; } $html = $html.'</b></p></center></td>
                            <td width="25%" style="text-align: center; font-family: Arial;"><p>Fruit: <b>'; if($value->fruit=="0"){ $html = $html.'-'; }else{ $html = $html.$value->fruit; } $html = $html.'</b></p></center></td>
                            <td width="25%" style="text-align: center; font-family: Arial;"><p>Milk: <b>'; if($value->milk=="0"){ $html = $html.'-'; }else{ $html = $html.$value->milk; } $html = $html.'</b></p></center></td>
                            <td width="25%" style="text-align: center; font-family: Arial;"><p>Rice: <b>'; if($value->rice=="0"){ $html = $html.'-'; }else{ $html = $html.$value->rice; } $html = $html.'</b></p></center></td>
                    </tr>      
                    <tr>
                            <td width="5%" style="text-align: center; font-family: Arial;"></td>
                            <td width="30%" style="text-align: center; font-family: Arial;"><p>Meat: <b>'; if($value->meat=="0"){ $html = $html.'-'; }else{ $html = $html.$value->meat; } $html = $html.'</b></p></center></td>
                            <td width="30%" style="text-align: center; font-family: Arial;"><p>Sugar: <b>'; if($value->sugar=="0"){ $html = $html.'-'; }else{ $html = $html.$value->sugar; } $html = $html.'</b></p></center></td>
                            <td width="30%" style="text-align: center; font-family: Arial;"><p>Fat: <b>'; if($value->fat_serve=="0"){ $html = $html.'-'; }else{ $html = $html.$value->fat_serve; } $html = $html.'</b></p></center></td>
                            <td width="5%" style="text-align: center; font-family: Arial;"></td>
                    </tr>
                    
                    <tr><td></td></tr>       
                    <tr>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Calorie (kcal): <br><b>'; if($value->calorie=="0"){ $html = $html.'-'; }else{ $html = $html.$value->calorie; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Carbohydrate (g): <br><b>'; if($value->carb=="0"){ $html = $html.'-'; }else{ $html = $html.$value->carb; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Protein (g): <br><b>'; if($value->protein=="0"){ $html = $html.'-'; }else{ $html = $html.$value->protein; } $html = $html.'</b></p></td>
                        <td width="25%" style="text-align: center; font-family: Arial;"><p>Fat (g): <br><b>'; if($value->fat=="0"){ $html = $html.'-'; }else{ $html = $html.$value->fat; } $html = $html.'</b></p></td>
                    </tr>
                  </tbody>
                </table>';
                
                // Print a text
                $pdf->writeHTML($html, true, false, true, false, '');
                //----------------------------------------------------------
                    
            }


// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

$pdf->setPrintFooter(false);

// Display image on full page
$pdf->Image(base_url().'assets/images/authors_and_acknowledgement.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 200, '', false, false, 0, false, false, false);

// reset pointer to the last page
$pdf->lastPage();

// add a page
$pdf->AddPage("", "");
//$pdf->AddPage('L', 'LEGAL');

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set margins
$pdf->SetMargins(0, 0, 0, 0);

$pdf->setPrintFooter(false);

// Display image on full page
$pdf->Image(base_url().'assets/images/felbackcover_new.jpg', 0, 0, 300, 300, 'JPG', '', '', false, 200, '', false, false, 0, false, false, false);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('HelpOnline_FEL.pdf', 'I');

?>