<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FelController extends CI_Controller {
    
      public function __construct() {
        parent::__construct();
        $this->load->model('FelModel');
    }
    public function visualguide() {
        $data['felcategory'] = $this->FelModel->getFelcategory();
        $data['title'] = "FEL Visual Guide";
        template('fel/fel-visual-guide', $data);
    }
    
    public function booklet($id = null) {
        $limit = 10; 
        $offset = 0; 
        if (!is_numeric($id) || $id <= 0) {
            show_error('Invalid category ID');
            return;
        }
        $this->load->model('FelModel');
        $felfooditems = $this->FelModel->getFooditems($id, $limit, $offset);
        $data = array(
            'felfooditems' => $felfooditems
        );
       $this->load->view('fel/fel-booklet', $data);
       //template('fel/fel-booklet', $data);
    }
    public function index() {
        $this->load->model('FelModel');
        $felfooditems = $this->FelModel->getFooditems($id, $limit, $offset);
        $this->load->view('felview', array('felfooditems' => $felfooditems));
    }
    
    
    
    
    
    
    
    
    
    

}
