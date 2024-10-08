<?php 
///session_start(); //we need to call PHP's session object to access it through CI
class Home extends MX_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
 	  // $this->load->view('home_view');
  $this->load->helper('url');
  if($this->session->userdata('id'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('home_view', $data);
	 

   }
   else
   {
     //If no session, redirect to login page
     redirect('admin/login', 'refresh');
	
	
	//$this->load->view('home_view', $data);
   }
 }
 
 function logout()
 {
 	  $this->load->helper('url');
   //$this->session->unset_userdata('id');
 $this->session->sess_destroy();
   redirect('admin/login');
 }
 
}
 
?>