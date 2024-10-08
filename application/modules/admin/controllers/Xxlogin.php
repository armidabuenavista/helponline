<?php
  if (!defined('BASEPATH'))
      exit('No direct script access allowed');
  class Login extends MX_Controller
  { 
      function __construct()
      {
          parent::__construct();
          $this->load->model('user');
          $this->load->database();
          $this->load->helper(array(
              'form'
          ));
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->library('form_validation');
      }
      public function index()
      {
          if (!isset($this->session->userdata['logged_in'])) {
            
              $this->load->view('loginview');
          } else {
              redirect('admin/help/site_stats');
          }
      }
  }
?>