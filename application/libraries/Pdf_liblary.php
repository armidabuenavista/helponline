<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 
    //require_once ('tcpdf/tcpdf.php');
    require_once dirname(__FILE__).'/tcpdf/tcpdf.php';

    class Pdf_Liblary extends TCPDF {
        public function __construct() {
            parent::__construct();
        }
    }
?>
