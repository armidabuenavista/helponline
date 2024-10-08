<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin_ptri extends MX_Controller {
 
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
 	$this->load->helper('security');
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->load->helper('url');
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run($this) == FALSE)
   { 
     $data['title']= 'Login';
     //Field validation failed.  User redirected to login page
     redirect('help/login_ptri', 'refresh');
   }
   else
   {
     $data['title']= 'PTRI';
     //Go to private area
     redirect('help/home_ptri', 'refresh');
   }
 
 }
 
 public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $user_type_id = 3;
 
   //query the database
   $result = $this->user->login($username, $password,$user_type_id);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array( 
        'id'    => $row->id,
        'lname' => $row->lname,
        'fname' => $row->fname,
        'mname' => $row->mname,
        'username' => $row->username,
        'gender' => $row->gender,
        'birthday' => $row->birthday,
        'email_address' => $row->email_address,
        'user_type_id'  => $row->user_type_id,
        'logged_in'     => TRUE
       );
	   
       $this->session->set_userdata($sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
   
//     if(isset($this->session->userdata['logged_in'])){
//                 $data['username'] =  $this->session->username;
//                 $data['user_type_id'] =  $this->session->user_type_id;
//                 $data['lname'] =  $this->session->lname;
//                 $data['fname'] =  $this->session->fname;
//                 $data['mname'] =  $this->session->mname;
//                 $data['gender'] =  $this->session->gender;
//                 $data['birthday'] =  $this->session->birthday;
//                 $data['email_address'] =  $this->session->email_address;
//                 //$data['photo'] =  $this->session->photo;
//                 
//              
//				 }
//                $newdata = array(
//                    'user_id'=> $id,
//                    'course'=> $course,
//                    'subject'=> $subject,
//                    'logged_in' => TRUE
//                );
//                $this->session->set_userdata($newdata);
   
   
 }
}
?>