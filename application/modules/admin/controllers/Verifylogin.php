<?php
  if (!defined('BASEPATH'))
      exit('No direct script access allowed');
  class VerifyLogin extends MX_Controller
  {
      function __construct()
      { 
          parent::__construct();
          date_default_timezone_set('Asia/Hong_Kong');
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          $this->load->model('user');
          $this->load->helper('security');
          $this->load->library('form_validation');
          $this->load->helper('url');
      }
      public function index()
      {
          
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          //$module   = 1;
          $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
          if ($this->form_validation->run($this) == FALSE ) {
              //$data['groups'] = $this->user->getModule();
              $data['title']= 'Administrator Login';
             // $admin_js               = base_url("assets/js/admin.js");
             // $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";

              $this->load->view('loginview',$data);
          } else {
              redirect('admin/help/site_stats', 'refresh');
          }
      }
      public function check_database($password)
      { 
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          //$module   = 1;
          $user_type_id = 3;
          $result   = $this->user->login($username,$password,$user_type_id);
          if ($result) {
              $sess_array = array();
              foreach ($result as $row) {
                  $sess_array = array(
                      'id'            => $row->id,
                      'username'      => $row->username,
                      //'module_id'     => $row->module_id,
                      'user_type_id'  => $row->user_type_id,
                      'logged_in'     => TRUE
                  );
                  $this->session->set_userdata($sess_array);
              }
              return TRUE;
          } else {
              $this->form_validation->set_message('check_database', 'Invalid username or password');
              return false;
          }
          if (isset($this->session->userdata['logged_in'])) {
              $data['username'] = $this->session->username;
          }
      }
  }
?>