<?php 
    /*if(!defined('BASEPATH')) exit('No direct script access allowed'); 
    require_once('PHPExcel.php');

    class Excel extends PHPExcel {
        public function __construct() {
            parent::__construct();
        }
    }*/
?>
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  ======================================= 
 *  Author     : Team Tech Arise 
 *  License    : Protected 
 *  Email      : info@techarise.com 
 * 
 *  ======================================= 
 */
require_once APPPATH . "/third_party/PHPExcel.php";
class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}
?>