<?php
  if (!defined('BASEPATH'))
      exit('No direct script access allowed');
  class Help extends MX_Controller
  {
      function __construct()
      {
          parent::__construct();
          date_default_timezone_set('Asia/Hong_Kong');
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          $this->load->model('help_model');
          $this->load->database();
          $this->load->helper(array(
              'form'
          ));
          $this->load->helper('date');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->library('form_validation');
          $this->load->library('session');
          $this->load->library('pdf');
      }

      
      public function index()
      { 
      $uid= $this->session->id;
      $logged_in = $this->session->userdata['logged_in'];
      
      if (isset($logged_in) && !isset($uid)) {
                $this->session->sess_destroy();
            } else if (isset($logged_in) && isset($uid)) {
              redirect('admin/help/site_stats');
              
            }
        $data['title']= 'Administrator Login';
        //$admin_js             = base_url("assets/js/admin.js");
        // $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
        $this->load->view('loginview',$data);
      
      }

      public function edit_account()
      {
            $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $data['title']    = 'Edit Account';
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $uid= $this->session->id;
          $data['results1'] = $this ->help_model->get_user_details($uid);
          $data['groups'] = $this->help_model->getGender();
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            
            if($photo == NULL){
              $data['photo']='no_photo.png';
              //$data['photo1']='no_photo.png';

            }else{
              $data['photo']= $row->photo;
             // $data['photo1']= $row->photo;

            }

          }

          $update_info   =   $this->input->post('update_info');
          $update_acct   =   $this->input->post('update_acct');

          if (isset($update_info)) {
            $fname= $this->input->post('fname',TRUE);
            $mname= $this->input->post('mname',TRUE);
            $lname = $this->input->post('lname',TRUE);
            //$extn= $this->input->post('extn',TRUE);
            $gender= $this->input->post('gender',TRUE);
            $birthday= $this->input->post('birthday',TRUE);
            $address= $this->input->post('address',TRUE);
            $contact_no= $this->input->post('contact_no',TRUE);
            $email_address= $this->input->post('email_address',TRUE);

            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'required');
            $this->form_validation->set_rules('lname','Last Name','required');
            //  $this->form_validation->set_rules('gender','Gender','required|greater_than[0]'); 
            //   $this->form_validation->set_rules('birthday', 'Birthday', 'required'); 
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'required');

            if ($this->form_validation->run() == FALSE)    {
            
              $data['groups'] = $this->help_model->getGender();
              $this->load->view('edit_account', $data);
              } else {

              $this->help_model->update_info();
              $this->session->set_flashdata('item', array('message' => 'Account successfully updated.','class' => 'success'));
              redirect('admin/help/edit_account');

              }


            }
            else  if (isset($update_acct)) {

              $username= $this->input->post('username',TRUE);
              $old_password= md5($this->input->post('old_password',TRUE));
              $new_password= md5($this->input->post('new_password',TRUE));
              $confirm_password= md5($this->input->post('confirm_password',TRUE));
              $this->form_validation->set_rules('username', 'Username', 'required');
              $this->form_validation->set_rules('old_password', 'Old Password', 'required');
              $this->form_validation->set_rules('new_password', 'New Password', 'required');
              $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

              if ($this->form_validation->run() == FALSE)    {
            
              $data['groups'] = $this->help_model->getGender();
              $this->load->view('edit_account', $data);
              } else {


              if($new_password != $confirm_password){
                $this->session->set_flashdata('item1', array('message1' => 'Password not match.','class' => 'danger'));
                 redirect('admin/help/edit_account'); 
              }else{

              $check_query = "SELECT * FROM users_db WHERE username='$username' AND password='$old_password'";
              $query = $this->db->query($check_query);
            
              if ($query->num_rows() > 0){
                $this->help_model->update_acct();
                $this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
                redirect('admin/help/edit_account');



              }else{
                $this->session->set_flashdata('item1', array('message1' => 'Account not found in the database.','class' => 'danger'));
               redirect('admin/help/edit_account');
              }

              }
             
              
              //$this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
            //  redirect('admin/help/edit_account');

              }
            }


            else{

               $this->load->view('edit_account',$data);

            }

          


         // $this->load->view('edit_account',$data);
      }


      

      public function site_stats()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          } 
          $data['title']     = 'Site Statistics';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";

          $data["results"]   = $this->help_model->get_pending_requests();
          $data['numRows']   = $this->help_model->getAffectedRows();
          $data['results0']  = $this->help_model->get_comments();
          $data['numRows0']  = $this->help_model->getAffectedRows();
        //  $data["results1"]  = $this->help_model->get_total_stats();
          //$module_id         = 1;
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          //echo $photo;

          $data['numRows1']  = $this->help_model->getAffectedRows();
          $this->load->view('site_stats', $data);
      }

     

      public function site_count()
      {

          $data["results1"]  = $this->help_model->get_total_stats();

              foreach($data["results1"] as $row1){
                      $total_views= $row1->total;
                      echo $total_views;
                      
              }
              

      }
      public function appointments_count()
      {

          $data["results1"]  = $this->help_model->get_total_appointments_stats();

              foreach($data["results1"] as $row1){
                      $total_appointments= $row1->total;
                      echo $total_appointments;
                      
              }
              

      }
      public function pendings_count()
      {
          $data["results"]  = $this->help_model->get_pending_requests();
          $numRows  = $this->help_model->getAffectedRows();
          echo $numRows;

      }
      public function  users_count()
      {
          $uid               = $this->session->id;
          $data['get_users'] = $this->help_model->get_users($uid);
          $numRows = $this->help_model->getAffectedRows();
          echo $numRows;

      }


      public function pending_requests()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Pending Requests';  
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";

          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('pending_requests', $data);
      }
      public function client_request()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $appointment_id  = $this->input->get('appointment_id');
          //$status_id       = 2; 
          $data['results'] = $this->help_model->get_request($appointment_id);
          $data['groups']  = $this->help_model->get_event_type();
          $data['groups1'] = $this->help_model->get_all_rnd();
          $this->load->view('client_request', $data);
      }
      public function save_request()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->library('My_PHPMailer');
          $nameuser  = 'NCS Admin';
          $usergmail = 'ncsfnri@gmail.com';
          $password  = 'ncsfnri123';
          $mail      = new PHPMailer;
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com';
          $mail->Port       = 465;
          $mail->SMTPAuth   = true;
          $mail->Username   = $usergmail;
          $mail->Password   = $password;
          $mail->SMTPSecure = 'ssl';
          $mail->From       = $usergmail;
          $mail->FromName   = $nameuser;
          $client_id        = $this->input->post('client_id', TRUE);
          $appointment_id   = $this->input->post('appointment_id', TRUE);
          $name             = $this->input->post('name', TRUE);
          $email_address    = $this->input->post('email_address', TRUE);
          $datepick         = $this->input->post('datepick', TRUE);
          $timepick1        = $this->input->post('timepick1', TRUE);
          $timepick2        = $this->input->post('timepick2', TRUE);
          $date             = date("l F j, Y", strtotime($datepick));
          $whole_day        = $this->input->post('whole_day', TRUE);
          $rnd              = $this->input->post('rnd', TRUE);
          $event_type_id    = $this->input->post('event_type', TRUE);
          $status           = $this->input->post('status', TRUE);
          $remarks          = $this->input->post('remarks', TRUE);
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
              $time      = 'whole day';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
              $time      = date("h:i A", strtotime($timepick1)) . "-" . date("h:i A", strtotime($timepick2));
          }
          $by = $this->session->id;
          if ($remarks == '') {
              $remarks = 'none';
          } else {
              $remarks = $this->input->post('remarks', TRUE);
          }
          if ($whole_day == 1) {
              $all_rnd          = 1;
              $data['results2'] = $this->help_model->check_rnd_sched_whole_day($datepick, $all_rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          } else {
              $data['results2'] = $this->help_model->check_rnd_sched_time($datepick, $timepick1, $timepick2, $rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          }
          $all_rnd          = 1;
          $data['results3'] = $this->help_model->check_all_rnd_sched($datepick, $timepick1, $timepick2, $all_rnd);
          $numRows3         = $this->help_model->getAffectedRows();
          if ($numRows2 > 0 || $numRows3 > 0) {
              echo "error";
          } else {
              $data['rnd_email_address'] = $this->help_model->get_assigned_rnd($rnd);
              foreach ($data['rnd_email_address'] as $row) {
                  $selectrnd = $row->lname . ", " . $row->fname . " " . $row->mname;
                  $mail->AddAddress($email_address);
                  $mail->AddReplyTo($usergmail, 'NCS FNRI');
                  $mail->WordWrap = 50;
                  $mail->Subject  = 'Client Request';
                  $htmlBody       = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear {CLIENT_NAME},<br /><br />
                This is to confirm your request for a nutrition counseling on {DATE}, {TIME_FROM}. <br /><br />
                You will be attended by our resident RND, Mr./Ms. {RND}.
                Please send us an advance copy of the information listed below at least 3 days before the confirmed appointment date through email (ncsfnri@gmail.com) in order for us to start the evaluation process.
                <br /> <br /> 
                -    Clinical/laboratory test results <br /> 
                -    Accomplished three-day 24-hour food recall sheets <br /> 
                -    List of additional queries (if applicable)<br />  <br />  

                If you have changes in schedule please contact us asap.<br /><br />

                Note:<br /><br />

                When sending your information please indicate you Last Name, First Name, Date of Appointment in the subject box.<br />

                Example: DELA CRUZ, JUAN, JUNE 20, 2016<br /><br />


                See you soon!<br /><br />
                Remarks: {REMARKS}<br /><br />
                Best Regards,<br />
                The Nutrition Counseling Service Team<br />
                ncsfnri@gmail.com<br/>
                Tel. No.: 8372071 local 2288 or 2299</p>";
                  $mail->Body     = str_replace(array(
                      '{CLIENT_NAME}',
                      '{DATE}',
                      '{TIME_FROM}',
                      '{RND}',
                      '{REMARKS}'
                  ), array(
                      $name,
                      $date,
                      $time,
                      $selectrnd,
                      $remarks
                  ), $htmlBody);
                  $mail->IsHTML(true);
                  $mail->Send();
                  $mail->ClearAddresses();
              }
              $data['all_rnd_email_address'] = $this->help_model->get_all_rnd_email_address();
              foreach ($data['all_rnd_email_address'] as $row1) {
                  $all_rnd_email_address = $row1->email_address;
                  $mail->AddCC($all_rnd_email_address);
                  $htmlBody   = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear administrator and users,<br /><br />
     The system successfully sent a notification to {CLIENT_NAME} for the approved date and time of nutrition Counseling. He/She will be attended by resident RND {RND} on {DATE} {TIME} for a nutrition counseling session.<br/><br/>
    For more details, please login to the NCS Customer Database System.
      <br /><br />
     <br /><br />Sincerely,<br />NCS System<br /></p>";
                  $mail->Body = str_replace(array(
                      '{CLIENT_NAME}',
                      '{RND}',
                      '{DATE}',
                      '{TIME}'
                  ), array(
                      $name,
                      $selectrnd,
                      $date,
                      $time
                  ), $htmlBody);
                  $mail->ClearAddresses();
              }
              if ($mail->Send()) {
                  if ($this->help_model->update_request()) {
                      $this->help_model->save_appointment_sched();
                      echo "The system successfully confirmed an appointment and successfully sent an email to the client.";
                  }
                
                  echo "The system successfully confirmed an appointment and successfully sent an email to the client.";
              } else {
                  echo "Message could not be sent at the moment. Please try again later.";
              }
          }
      }
      public function confirmed_requests()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title'] = 'Confirmed Requests';
          $admin_js      = base_url("assets/js/admin.js");
          $data['js']    = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
       
          $user_type_id    = $this->session->user_type_id;
          $uid             = $this->session->id;
          $data["results"] = $this->help_model->get_pending_requests();
          $data['numRows'] = $this->help_model->getAffectedRows();
          if ($user_type_id == 1) {
              $data['results1'] = $this->help_model->get_all_confirmed_requests();
          } else {
              $data['results1'] = $this->help_model->get_confirmed_requests_rnd($uid);
          }
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $uid              = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('confirmed_requests', $data);
      }
      public function comments()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          } 
          $data['title'] = 'Comments';
          $admin_js      = base_url("assets/js/admin.js");
          $data['js']    = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
       
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $uid              = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('comments', $data);
      }
      public function client_profile($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title'] = 'Client Profile';
          $admin_js      = base_url("assets/js/admin.js");
          $data['js']    = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
       
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $client_id = $row->client_id;
              $approved_date = $row->approved_date;
          }

          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                      
                      
              
          }
    
          $data["results2"] = $this->help_model->get_last_anthropometry($client_id);
          $data['numRows2'] = $this->help_model->getAffectedRows();
          $data["results3"] = $this->help_model->get_recommendation($appointment_id);
          $data['numRows3'] = $this->help_model->getAffectedRows();
          $data['results4'] = $this->help_model->get_summary($appointment_id);
          $data['numRows4'] = $this->help_model->getAffectedRows();
          $status_id        = 1;
          $data['results5'] = $this->help_model->get_all_appointment($client_id, $status_id);
          $data['numRows5'] = $this->help_model->getAffectedRows();
          $data['results6'] = $this->help_model->get_anthropometry($appointment_id);
          $data['numRows6'] = $this->help_model->getAffectedRows();
          $data['results7'] = $this->help_model->get_nutrition_plan($appointment_id);
          $data['numRows7'] = $this->help_model->getAffectedRows();
          $data['results8'] = $this->help_model->get_fel($appointment_id);
          $data['numRows8'] = $this->help_model->getAffectedRows();
          $uid              = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('client_profile', $data);
      }
      public function select_gestation()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $gestation_wks        = $this->input->get('gestation_wks');
          $ht                   = round($this->input->get('ht') / 1) * 1;
          $data['getGestation'] = $this->help_model->get_gestation($gestation_wks, $ht);
          $output               = array();
          foreach ($data['getGestation'] as $row) {
              unset($temp);
              $temp                    = array();
              $temp['gestation_value'] = $row->gestation_value;
              $temp['dbw_photo']       = $row->dbw_photo;
              array_push($output, $temp);
          } 
          header("Content-Type: application/json");
          echo json_encode($output);
      }  
      public function anthropometry($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']        = 'Anthropometry';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']           = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
         /* $anthrop_js         = base_url("assets/js/anthrop.js");
          $data['js']           = "<script type=\"text/javascript\" src=\"$anthrop_js\"></script>";*/
          $anthrop_function_js  = base_url("assets/js/anthrop_function.js");
          $data['function_js']  = "<script type=\"text/javascript\" src=\"$anthrop_function_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->appointment_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']     = $row->age_year;
             // $data['age_month']    = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
             
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }
          $data["results2"] = $this->help_model->get_last_anthropometry($client_id);
          $data['numRows2'] = $this->help_model->getAffectedRows();
          foreach($data["results2"] as $row1){
              $data['last_appointment_id'] = $row1->appointment_id;


          }
          $data["results3"] = $this->help_model->get_anthropometry($appointment_id);
          $data['numRows3'] = $this->help_model->getAffectedRows();
          $a                = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );

          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('anthropometry', $data);
      }
      public function save_anthropometry()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
       /* $sql = "SELECT * FROM body_stats_db WHERE body_stats_db.client_id= '$uid' AND DATE(body_stats_db.submitted_on) = CURDATE()";
      $query = $this->db->query($sql);

      if ($query->num_rows() == 0) {
        // no duplicates found, add new record
        $this->help_model->save_body_stats();
        echo "success";
      }else{
        echo "error";
      }*/
          $this->help_model->save_anthropometry();
          echo "success";
      }
      public function edit_anthropometry($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']          = 'Edit Anthropometry';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
         /* $anthrop_js             = base_url("assets/js/anthrop.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$anthrop_js\"></script>";*/
          $anthrop_function_js    = base_url("assets/js/anthrop_function.js");
          $data['function_js']    = "<script type=\"text/javascript\" src=\"$anthrop_function_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
              //$data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $data['a']              = strtotime($row->approved_date);
              $datetime               = date("Y-m-d");
              $data['b']              = strtotime($datetime);
              $client_id              = $row->client_id;
          }


          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }
          $data['numRows2'] = $this->help_model->getAffectedRows();
          $data["results3"] = $this->help_model->get_anthropometry($appointment_id);
          $data['numRows3'] = $this->help_model->getAffectedRows();
          $a                = base_url('admin/help/anthropometry/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Anthropometry',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('edit_anthropometry', $data);
      }
      public function update_anthropometry()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id               = $this->input->post('appointment_id', TRUE);
          $wt               = $this->input->post('wt', TRUE);
          $wt_unit          = $this->input->post('wt_opt', TRUE);
          $ht               = $this->input->post('ht', TRUE);
          $wc               = $this->input->post('wc', TRUE);
          $waist_unit       = $this->input->post('wc_opt', TRUE);
          $hc               = $this->input->post('hc', TRUE);
          $hip_unit         = $this->input->post('hc_opt', TRUE);
          $bmi              = $this->input->post('bmi', TRUE);
          $bmi_class        = $this->input->post('bmi_class', TRUE);
          $dbw              = $this->input->post('dbw', TRUE);
          $dbw_unit         = $this->input->post('dbw_opt', TRUE);
          $lwr_lmt          = $this->input->post('lower_limit', TRUE);
          $uppr_lmt         = $this->input->post('upper_limit', TRUE);
          $lmt_unit         = $this->input->post('limit_opt', TRUE);
          $risk_indicator   = $this->input->post('risk_indicator', TRUE);
          $whipr            = $this->input->post('whipr', TRUE);
          $whipr_class      = $this->input->post('whipr_class', TRUE);
          $whtr             = $this->input->post('whtr', TRUE);
          $whtr_class       = $this->input->post('whtr_class', TRUE);
          $datetime         = date("Y-m-d");
          $by               = $this->session->id;
          $data["results1"] = $this->help_model->get_anthropometry($id);
          foreach ($data["results1"] as $row) {
              $bmi1   = $row->bmi;
              $dbw1   = $row->dbw;
              $whipr1 = $row->whipr;
              $whtr1  = $row->whtr;
          }
          if ($bmi != $bmi1 || $dbw != $dbw1 || $whipr != $whipr1 || $whtr != $whtr1) {
              $where= 'appointment_id';
              $this->help_model->delete_nutrition_plan($where,$id);
              $this->help_model->delete_fel($where,$id);
              if($this->help_model->delete_menu($where,$id) == TRUE){
              $where= 'appointment_id';
              $this->help_model->delete_meal($where,$id);

              }
             // $this->help_model->delete_all_meal($id);
              $this->help_model->update_anthropometry();
              echo "success";
          } else {
              echo "success";
          }
      }
      public function delete_anthropometry()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
          $where = 'appointment_id';
          if($this->help_model->delete_anthropometry($id)== TRUE){
              $this->help_model->delete_biochemical($where,$id); 
              $this->help_model->delete_clinical($where,$id); 
              $this->help_model->delete_diagnosis($where,$id); 
              $this->help_model->delete_nutrition_plan($where,$id);
              $this->help_model->delete_fel($where,$id);
              if($this->help_model->delete_menu($where,$id) == TRUE){
              $this->help_model->delete_meal($where,$id);

              }

          }
     

          
          
         
      }
      public function biochemical($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Biochemical';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
              //$data['age_year']       = $row->age_year;
              //$data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $data['a']              = strtotime($row->approved_date);
              $datetime               = date("Y-m-d");
              $data['b']              = strtotime($datetime);
              $client_id              = $row->client_id;
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }

          $data["results2"] = $this->help_model->get_biochemical_db($client_id);
          $a                = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('biochemical', $data);
      }
      public function save_biochemical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_biochemical();
          echo "success";
      }
      public function edit_biochemical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                 = $this->input->get('id', TRUE);
          $data['id']         = $this->input->get('id', TRUE);
          $data['biochem_id'] = $this->help_model->get_biochemical_id($id);
          $data['numRows']    = $this->help_model->getAffectedRows();
          $this->load->view('edit_biochemical', $data);
      }
      public function update_biochemical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_biochemical();
          echo "success";
      }

      public function delete_biochemical()
      {
         $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $id = $this->input->post('id', TRUE);
          $where= 'id';
          $this->help_model->delete_biochemical($where,$id);
        

      }
      public function get_btests()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $btest             = $this->input->get('term');
          $data['getBtests'] = $this->help_model->get_btests($btest);
          $output            = array();
          foreach ($data['getBtests'] as $row) {
              unset($temp);
              $temp          = array();
              $biochem_test  = $row->biochem_test;
              $temp['label'] = $biochem_test;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_bresults()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $bresult             = $this->input->get('term');
          $data['getBresults'] = $this->help_model->get_bresults($bresult);
          $output              = array();
          foreach ($data['getBresults'] as $row) {
              unset($temp);
              $temp           = array();
              $biochem_result = $row->biochem_result;
              $temp['label']  = $biochem_result;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_bnvalues()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $bnvalue             = $this->input->get('term');
          $data['getBnvalues'] = $this->help_model->get_bnvalues($bnvalue);
          $output              = array();
          foreach ($data['getBnvalues'] as $row) {
              unset($temp);
              $temp            = array();
              $biochem_nvalues = $row->n_values;
              $temp['label']   = $biochem_nvalues;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function biochemical_print($appointment_id, $biochem_result_date)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows'] = $this->help_model->getAffectedRows();
          foreach ($data["results"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $data["results1"] = $this->help_model->get_biochemical_result_print($appointment_id, $biochem_result_date);
          $tbl              = '';
          foreach ($data["results1"] as $row1) {
              $biochem_test        = $row1->biochem_test;
              $biochem_result      = $row1->biochem_result;
              $n_values            = $row1->n_values;
              $biochem_result_date = $row1->biochem_result_date;
              $biochem_remarks     = $row1->biochem_remarks;
              $tbl .= '<tr nobr="true">
    <td align="center">' . $biochem_test . '</td>
    <td align="center">' . $biochem_result . '</td>
    <td align="center">' . $n_values . '</td>
    <td align="center">' . date("d M Y", strtotime($biochem_result_date)) . '</td>
    <td align="center">' . $biochem_remarks . '</td>
    
    </tr>';
          }
          $html = <<<EOD

    <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>

    </tr>
    

    </table><br><br>
<table border="0" cellpadding="3"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>


    <td>
<strong>Date of Counseling:</strong> $approved_date<br>
    <strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>

</table><br><br>

<table border="1" cellpadding="3"  >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >BIOCHEMICAL RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="10" >
<tr>

<th align="center" ><strong>Biochemical Test</strong></th>
<th align="center"><strong>Biochemical Result</strong></th>
<th align="center"><strong>Normal Values</strong></th>
<th align="center"><strong>Result Date</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl


</table>


EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('biochemical_result.pdf', 'I');
      }
      public function clinical($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Clinical';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
              $data['age_year']       = $row->age_year;
              $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $data['a']              = strtotime($row->approved_date);
              $datetime               = date("Y-m-d");
              $data['b']              = strtotime($datetime);
              $client_id              = $row->client_id;
          }
          $data["results2"] = $this->help_model->get_clinical_db($client_id);
          $a                = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('clinical', $data);
      }
      public function get_clinical_parameters()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $clinical_test     = $this->input->get('term');
          $data['getCparam'] = $this->help_model->get_clinical_parameters($clinical_test);
          $output            = array();
          foreach ($data['getCparam'] as $row) {
              unset($temp);
              $temp          = array();
              $clinical_test = $row->clinical_test;
              $temp['label'] = $clinical_test;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_observations()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $observation            = $this->input->get('term');
          $data['getObservation'] = $this->help_model->get_observations($observation);
          $output                 = array();
          foreach ($data['getObservation'] as $row) {
              unset($temp);
              $temp          = array();
              $observation   = $row->observation;
              $temp['label'] = $observation;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_blood_pressures()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $bp            = $this->input->get('term');
          $data['getBp'] = $this->help_model->get_blood_pressures($bp);
          $output        = array();
          foreach ($data['getBp'] as $row) {
              unset($temp);
              $temp          = array();
              $bp            = $row->bp_classification;
              $temp['label'] = $bp;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function save_clinical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
         /* $client_id      = $this->input->post('client_id', TRUE);
          $appointment_id = $this->input->post('appointment_id', TRUE);
          $clinical_param = $this->input->post('clinical_param', TRUE);
          $obsrv          = $this->input->post('obsrv', TRUE);
          $remarks        = $this->input->post('remarks', TRUE);
          $by             = $this->session->id;
          $datetime       = date("Y-m-d");*/
          $this->help_model->save_clinical();
          echo "success";
      }
      public function edit_clinical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                  = $this->input->get('id', TRUE);
          $data['id']          = $this->input->get('id', TRUE);
          $data['clinical_id'] = $this->help_model->get_clinical_id($id);
          $data['numRows']     = $this->help_model->getAffectedRows();
          $this->load->view('edit_clinical', $data);
      }
      public function update_clinical()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_clinical();
          echo "success";
      }

      public function delete_clinical()
      {
         $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $id = $this->input->post('id', TRUE);
          $where= 'id';
          $this->help_model->delete_clinical($where,$id);
        

      }
      public function clinical_print($client_id, $appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $data["results1"] = $this->help_model->get_clinical_result_print($client_id, $appointment_id);
          $tbl              = '';
          foreach ($data["results1"] as $row1) {
              $clinical_param   = $row1->clinical_parameter;
              $obsrv            = $row1->observation;
              $clinical_remarks = $row1->clinical_remarks;
              $tbl .= '<tr nobr="true">
    <td align="center">' . $clinical_param . '</td>
    
    <td align="center">' . $obsrv . '</td>

    <td align="center">' . $clinical_remarks . '</td>
    </tr>';
          }
          $html = <<<EOD

    <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>

    </tr>
    

    </table><br><br>
<table border="0" cellpadding="3"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>


    <td>
<strong>Date of Counseling:</strong> $approved_date<br>
    <strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>

</table><br><br>

<table border="1" cellpadding="3"  >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >BIOCHEMICAL RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="10">
<tr>

<th align="center"><strong>Clinical Parameter</strong></th>

<th align="center"><strong>Observation</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl


</table>


EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('clinical_result.pdf', 'I');
      }
      public function diagnosis_print($client_id, $appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows'] = $this->help_model->getAffectedRows();
          foreach ($data["results"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $data["results1"] = $this->help_model->get_diagnosis_result_print($client_id, $appointment_id);
          $tbl              = '';
          foreach ($data["results1"] as $row1) {
              $diagnosis         = $row1->diagnosis;
              $etiology          = $row1->etiology;
              $ss_diagnosis      = $row1->ss_diagnosis;
              $diagnosis_remarks = $row1->diagnosis_remarks;
              $tbl .= '<tr nobr="true">
    <td align="center">' . $diagnosis . '</td>
    <td align="center">' . $etiology . '</td>
    <td align="center">' . $ss_diagnosis . '</td>
    <td align="center">' . $diagnosis_remarks . '</td>
    </tr>';
          }
          $html = <<<EOD

    <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>

    </tr>
    

    </table><br><br>
<table border="0" cellpadding="3"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>


    <td>
<strong>Date of Counseling:</strong> $approved_date<br>
    <strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>

</table><br><br>

<table border="1" cellpadding="3"  >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >DIAGNOSIS RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="10">
<tr>

<th align="center"><strong>Diagnosis</strong></th>
<th align="center"><strong>Etiology</strong></th>
<th align="center"><strong>Signs and Symptoms</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl


</table>


EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('diagnosis_result.pdf', 'I');
      }
      public function diagnosis($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Diagnosis';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
              $data['age_year']       = $row->age_year;
              $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $data['a']              = strtotime($row->approved_date);
              $datetime               = date("Y-m-d");
              $data['b']              = strtotime($datetime);
              $client_id              = $row->client_id;
          }
          $data["results2"] = $this->help_model->get_diagnosis_db($client_id);
          $data['numRows2'] = $this->help_model->getAffectedRows();
          $a                = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Client Profile',
                  'link'  => $a
              ),
              array(
                  'label' => $data["title"],
                  'link'  => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('diagnosis', $data);
      }
      public function save_diagnosis()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $client_id      = $this->input->post('client_id', TRUE);
          $appointment_id = $this->input->post('appointment_id', TRUE);
          $diagnosis      = $this->input->post('diagnosis', TRUE);
          $etiology       = $this->input->post('etiology', TRUE);
          $ss_diagnosis   = $this->input->post('ss_diagnosis', TRUE);
          $remarks        = $this->input->post('remarks', TRUE);
          $by             = $this->session->id;
          $datetime       = date("Y-m-d");
          $data           = array(
              $client_id,
              $appointment_id,
              $diagnosis,
              $etiology,
              $ss_diagnosis,
              $remarks,
              $by
          );
          $this->help_model->save_diagnosis($data);
          echo "success";
      }
      public function edit_diagnosis()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                   = $this->input->get('id', TRUE);
          $data['id']           = $this->input->get('id', TRUE);
          $data['diagnosis_id'] = $this->help_model->get_diagnosis_id($id);
          $data['numRows']      = $this->help_model->getAffectedRows();
          $this->load->view('edit_diagnosis', $data);
      }
      public function update_diagnosis()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_diagnosis();
          echo "success";
      }

      public function delete_diagnosis()
      {
         $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $id = $this->input->post('id', TRUE);
          $where= 'id' ;
          $this->help_model->delete_diagnosis($where,$id);
        

      }
      public function get_diagnosis()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $diagnosis            = $this->input->get('term');
          $data['getDiagnosis'] = $this->help_model->get_diagnosis($diagnosis);
          $output               = array();
          foreach ($data['getDiagnosis'] as $row) {
              unset($temp);
              $temp          = array();
              $diagnosis     = $row->diagnosis;
              $temp['label'] = $diagnosis;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_etiology()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $etiology            = $this->input->get('term');
          $data['getEtiology'] = $this->help_model->get_etiology($etiology);
          $output              = array();
          foreach ($data['getEtiology'] as $row) {
              unset($temp);
              $temp          = array();
              $etiology      = $row->etiology;
              $temp['label'] = $etiology;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_ss_diagnosis()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $ss_diagnosis           = $this->input->get('term');
          $data['getSsdiagnosis'] = $this->help_model->get_ss_diagnosis($ss_diagnosis);
          $output                 = array();
          foreach ($data['getSsdiagnosis'] as $row) {
              unset($temp);
              $temp          = array();
              $ss_diagnosis  = $row->ss_diagnosis;
              $temp['label'] = $ss_diagnosis;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function nutrition_plan($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Nutrition Plan';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $nutplan_function_js    = base_url("assets/js/nutplan_function.js");
          $data['function_js']    = "<script type=\"text/javascript\" src=\"$nutplan_function_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $data['client_id']      = $row->client_id;
              $client_id              = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
             // $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
              $data["results2"]       = $this->help_model->get_last_nutrition_plan($client_id);
              $data['numRows2']       = $this->help_model->getAffectedRows();
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                                 
              
          }
    
         
          $data["results3"] = $this->help_model->get_nutrition_plan($appointment_id);
          $data['numRows3'] = $this->help_model->getAffectedRows();
          $data["results4"] = $this->help_model->get_wt_type();
          $data["results5"] = $this->help_model->get_pa_lvl();
          $data["results6"] = $this->help_model->get_cal_plan();
          $data["results7"] = $this->help_model->get_plan();
          $data["results8"] = $this->help_model->get_anthropometry($appointment_id);
          $data['numRows8'] = $this->help_model->getAffectedRows();
          $a                = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('nutrition_plan', $data);
      }
      public function edit_nutrition_plan($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']    = 'Edit Nutrition Plan';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $nutplan_function_js    = base_url("assets/js/nutplan_function.js");
          $data['function_js']    = "<script type=\"text/javascript\" src=\"$nutplan_function_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->id;
              $client_id     = $row->client_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
              //$data['age_year']       = $row->age_year;
              //$data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $data['a']              = strtotime($row->approved_date);
              $datetime               = date("Y-m-d");
              $data['b']              = strtotime($datetime);
              $client_id              = $row->client_id;
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                                                 
          }
    
          $data["results2"] = $this->help_model->get_nutrition_plan($appointment_id);
          $data['numRows2'] = $this->help_model->getAffectedRows();
          $data["results3"] = $this->help_model->get_wt_type();
          $data["results4"] = $this->help_model->get_pa_lvl();
          $data["results5"] = $this->help_model->get_cal_plan();
          $data["results6"] = $this->help_model->get_plan();
          $data["results7"] = $this->help_model->get_method();
          $data["results8"] = $this->help_model->get_pmethod();
          $data["results9"] = $this->help_model->get_anthropometry($appointment_id);
          $a                = base_url('admin/help/nutrition_plan/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Nutrition Plan',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('edit_nutrition_plan', $data);
      }
      public function get_event_dates()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['event_dates'] = $this->help_model->get_event_dates();
          $output              = array();
          foreach ($data['event_dates'] as $row) {
              unset($temp);
              $temp               = array();
              $temp['event_date'] = $row->approved_date;
              $temp['whole_day']  = $row->whole_day;
              $temp['all_rnd']    = $row->all_rnd;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function select_wt_type()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $appointment_id         = $this->input->get('appointment_id', TRUE);
          $select_wt              = $this->input->get('select_wt', TRUE);
          $data['select_wt_type'] = $this->help_model->get_wt_type_anthropometry($appointment_id);
          $output                 = array();
          foreach ($data['select_wt_type'] as $row) {
              unset($temp);
              $temp = array();
              if ($select_wt == 1) {
                  $wt      = $row->weight;
                  $wt_unit = $row->weight_unit;
                  if ($wt_unit == 'lbs') {
                      $wt_kgs         = round(($wt / 2.2) * 100) / 100;
                      $temp['weight'] = $wt_kgs;
                      $temp['unit']   = 'kgs';
                  } else {
                      $wt_kgs         = $wt;
                      $temp['weight'] = $wt_kgs;
                      $temp['unit']   = $wt_unit;
                  }
              } else {
                  $dbw      = $row->dbw;
                  $dbw_unit = $row->dbw_unit;
                  if ($dbw_unit == "lbs") {
                      $dbw_kgs        = $dbw * 2.2;
                      $temp['weight'] = $dbw_kgs;
                      $temp['unit']   = 'kgs';
                  } else {
                      $dbw_kgs        = $dbw;
                      $temp['weight'] = $dbw_kgs;
                      $temp['unit']   = $dbw_unit;
                  }
              }
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_pa_lvl_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->model("help_model");
          $pa_lvl        = $this->input->get('pa_lvl');
          $data['getPa'] = $this->help_model->get_pa_data($pa_lvl);
          $output        = array();
          foreach ($data['getPa'] as $row) {
              unset($temp);
              $temp                = array();
              $temp['id']          = $row->id;
              $temp['pa_lvl_val']  = $row->pa_lvl_value;
              $pa_lvl_img          = $row->pa_lvl_img;
              $temp['pa_lvl_img']  = base_url('assets/images/fast/' . $pa_lvl_img . '');
              $temp['pa_lvl_desc'] = $row->pa_lvl_desc;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_select_custom_plan()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $select_plan                = $this->input->post('select_plan', TRUE);
          $data['select_custom_plan'] = $this->help_model->select_custom_plan($select_plan);
          echo "<option value=\"0\" >--Select Percentage Method--</option> ";
          foreach ($data['select_custom_plan'] as $row) {
              $id     = $row->id;
              $method = $row->method;
              echo "<option  value=\"$id\">" . $method . "</option>";
          }
      }
      public function get_select_default_plan()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $cal      = $this->input->get('cal', TRUE);
          $cal1     = round($cal / 100) * 100;
          $low_cal  = 1000;
          $high_cal = 2900;
          if ($cal < 1000 && $cal != 0) {
              $data['select_default_plan'] = $this->help_model->low_cal($low_cal, $low_cal);
          } else if ($cal > 2900) {
              $data['select_default_plan'] = $this->help_model->high_cal($high_cal, $high_cal);
          } else {
              $data['select_default_plan'] = $this->help_model->cal($cal, $cal1);
          }
          $output = array();
          foreach ($data['select_default_plan'] as $row) {
              if ($cal < 1000 && $cal != 0) {
                  $alert = 'Low total energy requirement. Please contact you RND for your health condition.';
              } else if ($cal > 2900) {
                  $alert = 'Very high total energy requirement. Please contact you RND for your health condition.';
              } else {
                  $alert = '';
              }
              unset($temp);
              $temp                    = array();
              $temp['alert']           = $alert;
              $temp['id']              = $row->id;
              $temp['default_cal']     = $row->default_cal;
              $temp['default_cho']     = $row->default_cho;
              $temp['default_protein'] = $row->default_protein;
              $temp['default_fat']     = $row->default_fat;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function get_default_meal_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data_id = $this->input->post('id', TRUE);
          ;
          $data['results'] = $this->help_model->get_meal();
          $numRows         = $this->help_model->getAffectedRows();
          if ($numRows > 0) {
              echo "<div id=\"default_meal_div\" align=\"left\">";
              foreach ($data['results'] as $row) {
                  $meal_id   = $row->id;
                  $meal_name = $row->meal_name;
                  $meal_code = $row->meal_code_name;
                  echo "<h3 >" . $meal_name . "</h3>";
                  echo "<div>";
                  echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 400px;\">";
                  $data['results1'] = $this->help_model->get_default_menu($data_id, $meal_id);
                  foreach ($data['results1'] as $menu_row) {
                      $menu_id   = $menu_row->id;
                      $menu_name = $menu_row->menu_name;
                      echo "<div><i>" . $menu_name . "</i>";
                      $data['results2'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                      $numRows1         = $this->help_model->getAffectedRows();
                      $total_ex         = 0;
                      if ($numRows1 > 0) {
                          echo "<div class=\"table-responsive\"><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                          echo "<tr>
                                    <th>Food Group</th>
                                    <th>Food List</th>
                                    <th>Food Item</th>
                                    <th >Ex</th>
                                    <th colspan=\"2\">Qty(EP)</th>
                                    <th colspan=\"2\">HH Measure</th>
                                    
                                    </tr>";
                          foreach ($data['results2'] as $meal_row) {
                              $id        = $meal_row->combination_id;
                              $menu_id   = $meal_row->menu_id;
                              $meal_id   = $meal_row->meal_id;
                              $foodgroup = $meal_row->foodgroup_content;
                              $foodlist  = $meal_row->foodlist;
                              $fooditem  = $meal_row->fooditem;
                              $ex        = $meal_row->ex;
                              $qty_val   = $meal_row->qty_val;
                              $hh_val    = $meal_row->hh_val;
                              $hh_m      = $meal_row->hh_measure;
                              $total_ex += $ex;
                              if ($this->help_model->is_digits($ex)) {
                                  $ex = $meal_row->ex;
                              } else {
                                  $ex = $this->help_model->fraction($meal_row->ex);
                              }
                              if ($this->help_model->is_digits($hh_val)) {
                                  $hh_val = $meal_row->hh_val;
                              } else {
                                  $hh_val = $this->help_model->fraction($meal_row->hh_val);
                              }
                              echo "<tr>";
                              echo "<td>" . $foodgroup . "</td>";
                              echo "<td>" . $foodlist . "</td>";
                              echo "<td>" . $fooditem . "</td>";
                              echo "<td>" . $ex . "</td>";
                              echo "<td colspan=\"2\">" . $qty_val . "</td>";
                              echo "<td>$hh_val</td>";
                              echo "<td>$hh_m</td>";
                              echo "</tr>";
                          }
                          echo "</table></div>";
                      }
                      echo "</div>";
                  }
                  echo "</div>";
                  echo "</div>";
              }
              echo "</div>";
          } else {
              echo "<div></div>";
          }
          echo "<hr class=\"colorgraph\"></hr>";
          echo '<script>
$(function() {
      $( "#default_meal_div" ).accordion({ active: true, collapsible: true });
  });

</script>';
      }
      public function get_select_pmethod()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $select_method          = $this->input->post('select_method', TRUE);
          $data['select_pmethod'] = $this->help_model->select_pmethod($select_method);
          echo "<option value=\"0\" >--Select Percentage Method--</option> ";
          foreach ($data['select_pmethod'] as $row) {
              $id      = $row->id;
              $pmethod = $row->pmethod;
              echo "<option  value=\"$id\">" . $pmethod . "</option>";
          }
      }
      public function save_nutrition_plan()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_nutrition_plan();
          echo "success";
      }
      public function update_nutrition_plan()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->post('appointment_id', TRUE);
          $select_wt       = $this->input->post('select_wt', TRUE);
          $pa_lvl          = $this->input->post('pa_lvl', TRUE);
          $select_cal_plan = $this->input->post('select_cal_plan', TRUE);
          $select_plan     = $this->input->post('select_plan', TRUE);
          $cal_plan        = $this->input->post('cal_plan', TRUE);
          $cal             = $this->input->post('cal', TRUE);
          $dstr_method     = $this->input->post('select_method', TRUE);
          $pmethod         = $this->input->post('select_pmethod', TRUE);
          $st_value        = $this->input->post('st_value', TRUE);
          $cho             = $this->input->post('cho', TRUE);
          $pro             = $this->input->post('pro', TRUE);
          $fat             = $this->input->post('fat', TRUE);
          $cho_plan        = $this->input->post('cho_plan', TRUE);
          $pro_plan        = $this->input->post('pro_plan', TRUE);
          $fat_plan        = $this->input->post('fat_plan', TRUE);
          $data_id         = $this->input->post('id', TRUE);
          $by              = $this->session->id;
          $data["results"] = $this->help_model->get_nutrition_plan($id);
          foreach ($data["results"] as $row) {
              $select_wt_id1       = $row->wt_id;
              $pa_lvl_id1          = $row->pa_lvl_id;
              $select_cal_plan_id1 = $row->select_cal_plan_id;
              $method_id1          = $row->method_id;
              $select_plan_id1     = $row->select_plan_id;
          }
          if ($select_wt != $select_wt_id1 || $pa_lvl != $pa_lvl_id1 || $select_plan != $select_plan_id1 || $select_cal_plan != $select_cal_plan_id1 || $dstr_method != $method_id1) {
              $where= 'appointment_id';
              $this->help_model->delete_fel($where,$id);
     
              if($this->help_model->delete_menu($where,$id) == TRUE){
              $where= 'appointment_id';
              $this->help_model->delete_meal($where,$id);
                $this->help_model->update_nutrition_plan();
                echo "success";    
              }
               
          } else {
              echo "success";
          }
      }

      public function delete_nutrition_plan()
      {
         $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $where= 'appointment_id';
          $id = $this->input->post('id', TRUE);
          $this->help_model->delete_nutrition_plan($where,$id);
         



      }
      public function fel($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $data["appointment_id"] = $appointment_id;

          $data['title'] = 'Food Exchange List';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
        
        
          //$admin_header  = $this->load->view('admin_header', $data, true);
         // echo $admin_header;

        
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
         // $admin_navbar     = $this->load->view('admin_navbar', $data, true);
         // echo $admin_navbar;
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          $k                = base_url('admin/help/meal_plan/' . $appointment_id . '');
          $x                = base_url('assets/images/' . "ncs.png" . '');
          $a             = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb'] = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data['title'],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
         // echo "<div class=\"container\" >";
         // echo "<div class=\"col-md-12\" >";
         // echo " <h3 class=\"page-header\"> <img  height=\"75\ width=\"75\" src=\"$x\">Food Exchange List</h3>";
         /* $a             = base_url('admin/help/client_profile/' . $appointment_id . '');
          $data['crumb'] = array(
              array(
                  'label' => 'Client Profile',
                  'link' => $a
              ),
              array(
                  'label' => $data['title'],
                  'link' => ''
              )
          );
          echo "<div class=\"container\" style=\"margin-bottom:20px;\">";
          $c = 0;
          foreach ($data['crumb'] as $result) {
              $crumb = $result['label'];
              $link  = $result['link'];
              $tb    = count($result);
              if (($tb - $c) > 1) {
                  echo "<a href=\"$link\">" . ucfirst($result['label']) . "</a>" . " / ";
              } else {
                  echo ucfirst($result['label']);
              }
          }
          echo "</div>";*/
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->appointment_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
             // $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
             
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }
        
          $this->load->view('fel',$data);
         
      }

      public function create_fel($appointment_id)
      {

          
             /* echo "<div class=\"col-md-6\" >";
              echo "<p class=\"lead\">Name of Client: " . $name . "</p>";
              echo "<p class=\"lead\">Age: " . $age . "</p>";
              echo "<p class=\"lead\" id=\"gender\" data-gender=\" $gender\">Gender: " . $gender . "<br>" . "</p>
        </div>";
              echo "<div class=\"col-md-6\" >";
              echo "<p class=\"lead\">Date of Counseling: " . date("F d, Y", strtotime($approved_date)) . "</p>";
              echo "<p class=\"lead\">Assigned RND: " . $assigned_rnd . "</p>";
              echo "</div>";*/
         // }


          //echo "</div>";
          //$admin_header  = $this->load->view('admin_header', $data, true);
          //echo $admin_header;

       
          $fel_function_js    = base_url("assets/js/fel_function.js");
          echo  "<script type=\"text/javascript\" src=\"$fel_function_js\"></script>";

          /*$aa             = base_url("assets/js/admin.js");
          $bb             = base_url("assets/js/admin_func.js");
          echo "<script type=\"text/javascript\" src=\"$aa\"></script>";
          echo "<script type=\"text/javascript\" src=\"$bb\"></script>";*/
          echo "<div class=\"col-md-12\"  >";
          echo "<hr></hr>";
          echo "<div id=\"alert\" tabindex=\"1\" style=\"margin-top: 20px; margin-bottom: 20px;\">
</div>";
          echo "</div>";
          echo "</div> ";
          $data["results2"] = $this->help_model->get_nutrition_plan($appointment_id);
          $numRows2 = $this->help_model->getAffectedRows();
          $k                = base_url('admin/help/meal_plan/' . $appointment_id . '');
          $aaa              = base_url('admin/help/fel_print/' . $appointment_id . '');
          if($numRows2>0){
          foreach ($data['results2'] as $row) {
              $select_plan_id       = $row->select_plan_id;
              $default_nutrition_id = $row->default_nutrition_id;
          }
        }else{

          $select_plan_id= 0;
        }
          if ($select_plan_id == 1) {
              echo "<div id=\"fel_data\" class=\"container\">";
              echo " <h3>Food Exchange List</h3>";
              echo "<div id=\"viewfeldata\"><div  align=\"right\" style=\"margin-bottom:10px;\" ><a href=\"$k\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"><span class=\"glyphicon glyphicon-cutlery\"></span> Meal Planner</a>&nbsp;<a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg\" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print </a>" . "</div><div  class=\"table-responsive\"><table  cellspacing=\"0\" cellpadding=\"0\"  border= \"0\" class=\"table table-condensed\">
                            <tr >
                            <th >Food Group</th><th>Exchange</th><th class=\"carbo\">CHO</th><th class=\"pro\">P</th><th class=\"fat\">F</th><th class=\"calorie\">Kcal</th><th class=\"meal_style\">Breakfast</th><th class=\"meal_style\">Am Snack</th><th class=\"meal_style\">Lunch</th><th class=\"meal_style\">Pm Snack </th><th class=\"meal_style\">Dinner</th><th class=\"meal_style\">MN Snack</th><th>Total</th>
                            </tr>";
              $data["results3"] = $this->help_model->get_foodgroups_th();
              foreach ($data['results3'] as $row3) {
                  $foodgroup_th_id = $row3->id;
                  $foodgroup_th    = $row3->foodgroup_th;
                  echo "<tr><td class=\"fel_style1\" >" . $foodgroup_th . "</td><td ></td><td class=\"carbo\"></td><td class=\"pro\"></td><td class=\"fat\" ></td><td class=\"calorie\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td></td></tr>";
                  $data["results4"] = $this->help_model->get_default_fel_db($default_nutrition_id, $foodgroup_th_id);
                  foreach ($data['results4'] as $row4) {
                      $id              = $row4->foodid;
                      $row_id          = $row4->id;
                      $foodgroup_th_id = $row4->foodgroup_th_id;
                      $foodgroup       = $row4->foodgroup;
                      $foodgroup_cho   = $row4->foodgroup_cho;
                      $foodgroup_pro   = $row4->foodgroup_protein;
                      $foodgroup_fat   = $row4->foodgroup_fat;
                      $ex              = $row4->default_ex;
                      $fel_cho         = $row4->default_cho;
                      $fel_protein     = $row4->default_pro;
                      $fel_fat         = $row4->default_fat;
                      $fel_cal         = $row4->default_cal;
                      $bfast           = $row4->bfast;
                      $am_snack        = $row4->am_snack;
                      $lunch           = $row4->lunch;
                      $pm_snack        = $row4->pm_snack;
                      $dinner          = $row4->dinner;
                      $mn_snack        = $row4->mn_snack;
                      echo "<tr><td  class=\"fel_style2\"  >" . $foodgroup . "</td>";
                      echo "<td align=\"center\">$ex</td>";
                      echo "<td class=\"carbo\" align=\"center\"><span  >$fel_cho</span></td>";
                      echo "<td class=\"pro\" align=\"center\"><span  >$fel_protein</span></td>";
                      echo "<td class=\"fat\" align=\"center\"><span >$fel_fat</span></td>";
                      echo "<td class=\"calorie\" align=\"center\"><span >$fel_cal</span></td>";
                      echo "<td class=\"meal_style\">$bfast</td>";
                      echo "<td class=\"meal_style\">$am_snack</td>";
                      echo "<td class=\"meal_style\">$lunch</td>";
                      echo "<td class=\"meal_style\">$pm_snack</td>";
                      echo "<td class=\"meal_style\">$dinner</td>";
                      echo "<td class=\"meal_style\">$mn_snack</td>";
                      echo "<td ><span >Complete</span></td>";
                      echo "</tr>";
                  }
              }
              echo "</table></div>";
              echo "</div></div>";
          } else {
              $data["results3"] = $this->help_model->get_fel($appointment_id);
              $numRows3         = $this->help_model->getAffectedRows();
              $aaa              = base_url('admin/help/fel_print/' . $appointment_id . '');
              if ($numRows3 > 0) {
                  echo "<div id=\"fel_data\" class=\"container\">";
                  echo " <h3>Food Exchange List</h3>";
                  if ($b <= $a) {
                      $z           = base_url('admin/help/edit_nutrition_plan/' . $appointment_id . '');
                      $edit_button = "<a href=\"$z\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"> <span class=\"glyphicon glyphicon-pencil\"></span> Edit Custom Plan</a>";
                  } else {
                      $edit_button = "";
                  }
                  echo "<div id=\"viewfeldata\" ><div  align=\"right\" style=\"margin-bottom:10px;\" ><a href=\"$k\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"><span class=\"glyphicon glyphicon-cutlery\"></span> Meal Planner</a>&nbsp;$edit_button&nbsp;<a id=\"delete_fel\" style=\"color: #ffffff;\" href=\"#\" class=\"btn btn-danger btn-lg \"  data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\" ><span class=\"glyphicon glyphicon-remove-sign \"></span> Delete</a>&nbsp;<a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg\" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print </a>" . "</div><div  class=\"table-responsive\"><table  cellspacing=\"0\" cellpadding=\"0\"  border= \"0\" class=\"table table-condensed\">
                            <tr >
                            <th >Food Group</th><th>Exchange</th><th class=\"carbo\">CHO</th><th class=\"pro\">P</th><th class=\"fat\">F</th><th class=\"calorie\">Kcal</th><th class=\"meal_style\">Breakfast</th><th class=\"meal_style\">Am Snack</th><th class=\"meal_style\">Lunch</th><th class=\"meal_style\">Pm Snack </th><th class=\"meal_style\">Dinner</th><th class=\"meal_style\">MN Snack</th><th>Total</th>
                            </tr>";
                  $data["results3"] = $this->help_model->get_foodgroups_th();
                  foreach ($data['results3'] as $row3) {
                      $foodgroup_th_id = $row3->id;
                      $foodgroup_th    = $row3->foodgroup_th;
                      echo "<tr><td class=\"fel_style1\" >" . $foodgroup_th . "</td><td ></td><td class=\"carbo\"></td><td class=\"pro\"></td><td class=\"fat\" ></td><td class=\"calorie\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td></td></tr>";
                      $data["results4"] = $this->help_model->get_fel_db($appointment_id, $foodgroup_th_id);
                      foreach ($data['results4'] as $row4) {
                          $id              = $row4->foodid;
                          $row_id          = $row4->id;
                          $foodgroup_th_id = $row4->foodgroup_th_id;
                          $foodgroup       = $row4->foodgroup;
                          $foodgroup_cho   = $row4->foodgroup_cho;
                          $foodgroup_pro   = $row4->foodgroup_protein;
                          $foodgroup_fat   = $row4->foodgroup_fat;
                          $ex              = $row4->ex;
                          $fel_cho         = $row4->fel_cho;
                          $fel_protein     = $row4->fel_pro;
                          $fel_fat         = $row4->fel_fat;
                          $fel_cal         = $row4->fel_cal;
                          $bfast           = $row4->bfast;
                          $am_snack        = $row4->am_snack;
                          $lunch           = $row4->lunch;
                          $pm_snack        = $row4->pm_snack;
                          $dinner          = $row4->dinner;
                          $mn_snack        = $row4->mn_snack;
                          echo "<tr><td  class=\"fel_style2\"  >" . $foodgroup . "</td>";
                          echo "<td align=\"center\">$ex</td>";
                          echo "<td class=\"carbo\" align=\"center\"><span  >$fel_cho</span></td>";
                          echo "<td class=\"pro\" align=\"center\"><span  >$fel_protein</span></td>";
                          echo "<td class=\"fat\" align=\"center\"><span >$fel_fat</span></td>";
                          echo "<td class=\"calorie\" align=\"center\"><span >$fel_cal</span></td>";
                          echo "<td class=\"meal_style\">$bfast</td>";
                          echo "<td class=\"meal_style\">$am_snack</td>";
                          echo "<td class=\"meal_style\">$lunch</td>";
                          echo "<td class=\"meal_style\">$pm_snack</td>";
                          echo "<td class=\"meal_style\">$dinner</td>";
                          echo "<td class=\"meal_style\">$mn_snack</td>";
                          echo "<td ><span >Complete</span></td>";
                          echo "</tr>";
                      }
                  }
                  $data["results5"] = $this->help_model->total_fel_nutrients($appointment_id);
                  foreach ($data["results5"] as $row5) {
                      $total_cho = $row5->total_cho;
                      $total_pro = $row5->total_pro;
                      $total_fat = $row5->total_fat;
                      $total_cal = $row5->total_cal;
                      echo "<tr><td class=\"fel_style1\"> <strong>Total </strong></td><td></td>";
                      echo "<td  class=\"carbo\"><span class=\"nutrient_style\"><strong>$total_cho<strong></span></td>";
                      echo "<td  class=\"pro\"><span class=\"nutrient_style\"><strong>$total_pro<strong></span></td>";
                      echo "<td  class=\"fat\"><span class=\"fat_style\"><strong>$total_fat<strong></span></td>";
                      echo "<td class=\"calorie\"><span><strong>$total_cal<strong></span></td></tr>";
                  }
                  $data["results6"] = $this->help_model->get_nutrition_plan($appointment_id);
                  foreach ($data["results6"] as $row6) {
                      $cho     = $row6->cho;
                      $protein = $row6->protein;
                      $fat     = $row6->fat;
                      $cal     = $row6->cal;
                  }
                  echo "<tr><td class=\"fel_style1\">Dietary RX</td><td></td>";
                  echo "<td  class=\"carbo\"><span class=\"nutrient_style\"><strong>$cho<strong></span><input type=\"hidden\" id=\"cho\" name=\"cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cho\" /></td>";
                  echo "<td  class=\"pro\"><span class=\"nutrient_style\"><strong>$protein<strong></span><input type=\"hidden\" id=\"protein\" name=\"protein\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$protein\" /></td>";
                  echo "<td  class=\"fat\"><span class=\"fat_style\"><strong>$fat<strong></span><input type=\"hidden\" id=\"fat\" name=\"fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$fat\" /></td>";
                  echo "<td class=\"calorie\"><span><strong>$cal<strong></span><input type=\"hidden\" id=\"cal\" name=\"cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cal\" /></td></tr>";
                  echo "</table></div>";
                  if ($b <= $a) {
                      echo "<div class=\"container\" align=\"center\" style=\"margin-bottom:10px; margin-top:10px;\">";
                      $zz = base_url('admin/help/edit_fel/' . $appointment_id . '');
                      echo "<a href=\"$zz\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"> Edit Food Exchange List</a></div>";
                  }
                  echo "</div></div>";
              } else {
                  echo "<div class=\"container\">";
                  echo "<div class=\"col-md-12\">";


                 // if ($numRows2 == 0) {
                      echo "<div class=\"fel_data\">";

                      
                      if($numRows2> 0){
                         echo "<button class=\"btn btn-success btn-lg\" id=\"new_fel\"> New Record</button>&nbsp;";
                      }
                     
                      echo "<br><br><div  class=\"alert alert-danger\" >No records found.</div>";
                      $data["results6"] = $this->help_model->get_last_fel($client_id);
                      $numRows6       = $this->help_model->getAffectedRows();

                      if($numRows6 > 0){
                        foreach ($data['results6'] as $row6) {
                          $appointment_id1 = $row6->appointment_id;
                      }
                        $xx = base_url('admin/help/fel_print/' . $appointment_id1 . '');
                      echo "<div id=\"viewfeldata\" ><form action=\"#\" id=\"form\" name=\"form\" method=\"POST\" ><div  align=\"right\" style=\"margin-bottom:10px;\" ><a href=\"#\" id=\"$appointment_id1\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg previous_meal_plan\"><span class=\"glyphicon glyphicon-cutlery\"></span> Last Meal Planner</a>&nbsp;<a href=\"#\" onclick=\"window.open('$xx')\" class=\"btn btn-success btn-lg\" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print </a>" . "</div><div  class=\"table-responsive\"><table  cellspacing=\"0\" cellpadding=\"0\"  border= \"0\" class=\"table table-condensed\"><tr>
                            <th >Food Group</th><th>Exchange</th><th class=\"carbo\">CHO</th><th class=\"pro\">P</th><th class=\"fat\">F</th><th class=\"calorie\">Kcal</th><th class=\"meal_style\">Breakfast</th><th class=\"meal_style\">Am Snack</th><th class=\"meal_style\">Lunch</th><th class=\"meal_style\">Pm Snack </th><th class=\"meal_style\">Dinner</th><th class=\"meal_style\">MN Snack</th><th>Total</th>
                            </tr>";
                      $data["results3"] = $this->help_model->get_foodgroups_th();
                      foreach ($data['results3'] as $row3) {
                          $foodgroup_th_id = $row3->id;
                          $foodgroup_th    = $row3->foodgroup_th;
                          echo "<tr><td class=\"fel_style1\" >" . $foodgroup_th . "</td><td ></td><td class=\"carbo\"></td><td class=\"pro\"></td><td class=\"fat\" ></td><td class=\"calorie\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td></td></tr>";
                          $data["results4"] = $this->help_model->get_fel_db($appointment_id1, $foodgroup_th_id);
                          foreach ($data['results4'] as $row4) {
                              $id              = $row4->foodid;
                              $row_id          = $row4->id;
                              $foodgroup_th_id = $row4->foodgroup_th_id;
                              $foodgroup       = $row4->foodgroup;
                              $foodgroup_cho   = $row4->foodgroup_cho;
                              $foodgroup_pro   = $row4->foodgroup_protein;
                              $foodgroup_fat   = $row4->foodgroup_fat;
                              $ex              = $row4->ex;
                              $fel_cho         = $row4->fel_cho;
                              $fel_pro         = $row4->fel_pro;
                              $fel_fat         = $row4->fel_fat;
                              $fel_cal         = $row4->fel_cal;
                              $bfast           = $row4->bfast;
                              $am_snack        = $row4->am_snack;
                              $lunch           = $row4->lunch;
                              $pm_snack        = $row4->pm_snack;
                              $dinner          = $row4->dinner;
                              $mn_snack        = $row4->mn_snack;
                              echo "<tr><td  style=\"text-indent:10px;\" class=\"fel_style2\"  >" . $foodgroup . "</td>";
                              echo "<td >" . $ex . "</td>";
                              echo "<td class=\"carbo\" align=\"center\">
                                                <span  id=\"fel_cho_label1$id\">$fel_cho</span></td>";
                              echo "<td class=\"pro\" align=\"center\"><span  id=\"fel_pro_label1$id\">$fel_pro</span></td>";
                              echo "<td class=\"fat\" align=\"center\"><span id=\"fel_fat_label1$id\">$fel_fat</span>
                                                </td>";
                              echo "<td class=\"calorie\" align=\"center\"><span  id=\"cal_label1$id\">$fel_cal</span>
                                                </td>";
                              echo "<td class=\"meal_style\">$bfast</td>";
                              echo "<td class=\"meal_style\">$am_snack</td>";
                              echo "<td class=\"meal_style\">$lunch</td>";
                              echo "<td class=\"meal_style\">$pm_snack</td>";
                              echo "<td class=\"meal_style\">$dinner</td>";
                              echo "<td class=\"meal_style\">$mn_snack</td>";
                              echo "<td ><span id=\"tot1$id\">Complete</span></td>";
                              echo "</tr>";
                          }
                      }
                      $data["results5"] = $this->help_model->total_fel_nutrients($appointment_id1);
                      foreach ($data["results5"] as $row5) {
                          $total_cho = $row5->total_cho;
                          $total_pro = $row5->total_pro;
                          $total_fat = $row5->total_fat;
                          $total_cal = $row5->total_cal;
                          echo "<tr><td class=\"fel_style1\">Total</td><td ></td>";
                          echo "<td class=\"carbo\">
            <strong><span  id=\"fel_cho_total_label\">$total_cho</span></strong>
            <input type=\"hidden\" id=\"fel_cho_total\" name=\"fel_cho_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_cho\" /></td>";
                          echo "<td class=\"pro\">
        <strong><span  id=\"fel_pro_total_label\">$total_pro</span></strong>
            <input type=\"hidden\" id=\"fel_pro_total\" name=\"fel_pro_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_pro\"/></td>";
                          echo "<td class=\"fat\" >
        <strong><span  id=\"fel_fat_total_label\">$total_fat</span></strong>
            <input type=\"hidden\" id=\"fel_fat_total\" name=\"fel_fat_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_fat\"/></td>";
                          echo "<td class=\"calorie\">
        <strong><span  id=\"fel_cal_total_label\">$total_cal</span></strong>
            <input type=\"hidden\" id=\"fel_cal_total\" name=\"fel_cal_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_cal\"/></td></tr>";
                      }
                      $data["results6"] = $this->help_model->get_nutrition_plan($appointment_id1);
                      foreach ($data["results6"] as $row6) {
                          $cho     = $row6->cho;
                          $protein = $row6->protein;
                          $fat     = $row6->fat;
                          $cal     = $row6->cal;
                      }
                      echo "<tr><td class=\"fel_style1\">Dietary RX</td><td></td>";
                      echo "<td class=\"carbo\"><strong>$cho<strong><input type=\"hidden\" id=\"cho\" name=\"cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cho\" /></td>";
                      echo "<td  class=\"pro\"><strong>$protein<strong><input type=\"hidden\" id=\"protein\" name=\"protein\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$protein\" /></td>";
                      echo "<td class=\"fat\"><strong>$fat<strong><input type=\"hidden\" id=\"fat\" name=\"fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$fat\" /></td>";
                      echo "<td class=\"calorie\"><strong>$cal<strong><input type=\"hidden\" id=\"cal\" name=\"cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cal\" /></td></tr>";
                      echo "</table></div>";
                      echo "<div class=\"form-group\"><input type=\"hidden\" name=\"appointment_id\" id=\"appointment_id\" value=\"$appointment_id\" class=\"form-control\" /></div>";
                      echo "<div class=\"col-md-12\" align=\"center\" id=\"update_div\" style=\"margin-bottom:10px;\" ></div></form>";
                      echo "</div></div>";
                  }
                  echo "</div>";
                  echo "</div>";

              
      
                      
                  echo "<div class=\"new_fel_data col-md-12\" style=\"display:none;\" >";
                  echo " <h3>Food Exchange List</h3>";
                  echo "<div id=\"viewfeldata\" ><form action=\"\" id=\"form\" name=\"form\" method=\"POST\">";
                  echo "<div class=\"table-responsive\"><table  cellspacing=\"0\" cellpadding=\"0\"  border= \"1\" class=\"table table-condensed\"  >
    <tr >
        <th >Food Group</th><th>Exchange</th><th class=\"carbo\">CHO</th><th class=\"pro\">P</th><th class=\"fat\">F</th><th class=\"calorie\">Kcal</th><th class=\"meal_style\">Breakfast</th><th class=\"meal_style\">Am Snack</th><th class=\"meal_style\">Lunch</th><th class=\"meal_style\">Pm Snack </th><th class=\"meal_style\">Dinner</th><th class=\"meal_style\">MN Snack</th><th>Total</th>
    </tr>";
                  $data["results3"] = $this->help_model->get_foodgroups_th();
                  foreach ($data['results3'] as $row3) {
                      $foodgroup_th_id = $row3->id;
                      $foodgroup_th    = $row3->foodgroup_th;
                      echo "<tr><td class=\"fel_style1\" >" . $foodgroup_th . "</td><td ></td><td class=\"carbo\"></td><td class=\"pro\"></td><td class=\"fat\" ></td><td class=\"calorie\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td></td></tr>";
                      $data["results4"] = $this->help_model->get_fel_foodgroups_th($foodgroup_th_id);
                      foreach ($data["results4"] as $row4) {
                          $id            = $row4->foodid;
                          $foodgroup     = $row4->foodgroup;
                          $foodgroup_cho = $row4->foodgroup_cho;
                          $foodgroup_pro = $row4->foodgroup_protein;
                          $foodgroup_fat = $row4->foodgroup_fat;
                          echo "<tr><td  class=\"fel_style2\"  >" . $foodgroup . "<input type=\"hidden\" id=\"foodid\" name=\"foodid[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$id\" />
        <input type=\"hidden\" id=\"foodgroup_cho$id\" name=\"foodgroup_cho[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_cho\" />    <input type=\"hidden\" id=\"foodgroup_pro$id\" name=\"foodgroup_pro[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_pro\" />    <input type=\"hidden\" id=\"foodgroup_fat$id\" name=\"foodgroup_fat[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_fat\" />    
        </td>";
                          echo "<td><input type=\"text\" id=\"ex$id\" name=\"ex[]\"   maxlength=\"3\" data=\"$id\"  class=\" exchange \"  tabindex=\"1\"/></td>";
                          echo "<td  class=\"carbo\" ><span  id=\"fel_cho_label$id\"></span><input type=\"hidden\" id=\"fel_cho$id\" name=\"fel_cho[]\" readonly=\"\" maxlength=\"4\" class=\"form-control \" /></td>";
                          echo "<td class=\"pro\"  ><span  id=\"fel_pro_label$id\"></span><input type=\"hidden\" id=\"fel_pro$id\" name=\"fel_pro[]\" readonly=\"\" maxlength=\"4\" class=\"form-control \" /></td>";
                          echo "<td class=\"fat\"><span  id=\"fel_fat_label$id\"></span><input type=\"hidden\" id=\"fel_fat$id\" name=\"fel_fat[]\" readonly=\"\" maxlength=\"4\"  class=\"form-control \"/></td>";
                          echo "<td class=\"calorie\"><span  id=\"fel_cal_label$id\"></span>
                                <input type=\"hidden\" id=\"fel_cal$id\" name=\"fel_cal[]\" readonly=\"\" maxlength=\"4\"  class=\"form-control \"/></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"bfast$id\" name=\"bfast[]\"  maxlength=\"4\" data=\"$id\" class=\" dstr_exchange  \" disabled=\"\"/></td>";
                          echo "<td  class=\"meal_style\"><input type=\"text\" id=\"am_snack$id\" name=\"am_snack[]\"  maxlength=\"4\" data=\"$id\"  class=\" dstr_exchange  \" disabled=\"\"/></td>";
                          echo "<td class=\"meal_style\" ><input type=\"text\" id=\"lunch$id\" name=\"lunch[]\"  maxlength=\"4\" data=\"$id\"   class=\" dstr_exchange\" disabled=\"\"/></td>";
                          echo "<td  class=\"meal_style\"><input type=\"text\" id=\"pm_snack$id\" name=\"pm_snack[]\"  maxlength=\"4\" data=\"$id\"  class=\"dstr_exchange  \" disabled=\"\"/></td>";
                          echo "<td class=\"meal_style\">
                                <input type=\"text\" id=\"dinner$id\" name=\"dinner[]\"  maxlength=\"4\"  data=\"$id\"  class=\"dstr_exchange  \" disabled=\"\"/></td>";
                          echo "<td  class=\"meal_style\"><input type=\"text\" id=\"mn_snack$id\" name=\"mn_snack[]\"  maxlength=\"4\" data=\"$id\"   class=\"  dstr_exchange  \" disabled=\"\"/></td>";
                          echo "<td ><span id=\"tot$id\"></span></td>";
                          echo "</tr>";
                      }
                  }
                  $data["results5"] = $this->help_model->get_nutrition_plan($appointment_id);
                  foreach ($data["results5"] as $row5) {
                      $cho     = $row->cho;
                      $protein = $row5->protein;
                      $fat     = $row5->fat;
                      $cal     = $row5->cal;
                      echo "<tr><td class=\"fel_style1\">Dietary RX</td><td></td>";
                      echo "<td  class=\"carbo\"><span class=\"nutrient_style\"><strong>$cho<strong></span><input type=\"hidden\" id=\"cho\" name=\"cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cho\" /></td>";
                      echo "<td  class=\"pro\"><span class=\"nutrient_style\"><strong>$protein<strong></span><input type=\"hidden\" id=\"protein\" name=\"protein\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$protein\" /></td>";
                      echo "<td  class=\"fat\"><span class=\"fat_style\"><strong>$fat<strong></span><input type=\"hidden\" id=\"fat\" name=\"fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$fat\" /></td>";
                      echo "<td class=\"calorie\"><span><strong>$cal<strong></span><input type=\"hidden\" id=\"cal\" name=\"cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cal\" /></td></tr>";
                  }
                  echo "<tr><td class=\"fel_style1\">Total</td><td ></td>";
                  echo "<td class=\"carbo\"><strong><span  id=\"fel_cho_total_label\"></span></strong><input type=\"hidden\" id=\"fel_cho_total\" name=\"fel_cho_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td class=\"pro\"><strong><span  id=\"fel_pro_total_label\"></span></strong><input type=\"hidden\" id=\"fel_pro_total\" name=\"fel_pro_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\"/></td>";
                  echo "<td class=\"fat\" ><strong><span  id=\"fel_fat_total_label\"></span></strong><input type=\"hidden\" id=\"fel_fat_total\" name=\"fel_fat_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\"/></td>";
                  echo "<td class=\"calorie\"><strong><span  id=\"fel_cal_total_label\"></span></strong><input type=\"hidden\" id=\"fel_cal_total\" name=\"fel_cal_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\"/></td></tr>";
                  echo "<tr><td class=\"fel_style1\">Rating</td><td></td>";
                  echo "<td ><strong><span id=\"rating_cho_label\"></span></strong><input type=\"hidden\" id=\"rating_cho\" name=\"rating_cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_pro_label\"></span></strong><input type=\"hidden\" id=\"rating_pro\" name=\"rating_pro\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_fat_label\"></span></strong><input type=\"hidden\" id=\"rating_fat\" name=\"rating_fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_cal_label\"></span></strong><input type=\"hidden\" id=\"rating_cal\" name=\"rating_cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td></tr>";
                  echo "</table></div>";
                 // echo "<div class=\"form-group\"><input type=\"hidden\" name=\"client_id\" id=\"client_id\" value=\"$client_id\" class=\"form-control\" /><input type=\"hidden\" name=\"appointment_id\" id=\"appointment_id\" value=\"$appointment_id\" class=\"form-control\" /></div>";
                  echo "<div class=\"col-md-12\" align=\"center\"id=\"save_div\" style=\"margin-bottom:10px;\" tabindex=\"1\" ></div></form>";
                  echo "</div></div>";
             // }

            }
              echo "</div></div>";
          }
         


      }
      public function save_fel()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_fel();
          echo "success";
      }
      public function edit_fel($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title'] = 'Edit Food Exchange List';
          $a                = base_url('admin/help/fel/' . $appointment_id . '');
          $data['crumb']    = array(
              array(
                  'label' => 'Food Exchange List',
                  'link' => $a
              ),
              array(
                  'label' => $data["title"],
                  'link' => ''
              )
          );
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
         /* $data['title'] = 'Edit Food Exchange List';
          $admin_header  = $this->load->view('admin_header', $data, true);
          echo $admin_header;
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $admin_navbar     = $this->load->view('admin_navbar', $data, true);
          echo $admin_navbar;
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          $x                = base_url('assets/images/' . "ncs.png" . '');
          echo "<div class=\"container\" >";
          echo "<div class=\"col-md-12\" >";
          echo " <h3 class=\"page-header\"> <img  height=\"75\ width=\"75\" src=\"$x\">Edit Food Exchange List</h3>";
          $a             = base_url('admin/help/fel/' . $appointment_id . '');
          $data['crumb'] = array(
              array(
                  'label' => 'Food Exchange List',
                  'link'  => $a
              ),
              array(
                  'label' => $data['title'],
                  'link'  => ''
              )
          );
          echo "<div class=\"container\" style=\"margin-bottom:20px;\">";
          $c = 0;
          foreach ($data['crumb'] as $result) {
              $crumb = $result['label'];
              $link  = $result['link'];
              $tb    = count($result);
              if (($tb - $c) > 1) {
                  echo "<a href=\"$link\">" . ucfirst($result['label']) . "</a>" . " / ";
              } else {
                  echo ucfirst($result['label']);
              }
          }
          echo "</div>";
          foreach ($data["results1"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $approved_date  = $row->approved_date;
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $datetime       = date("Y-m-d");
              $a              = strtotime($approved_date);
              $b              = strtotime($datetime);
              echo "<div class=\"col-md-6\" >";
              echo "<p class=\"lead\">Name of Client: " . $name . "</p>";
              echo "<p class=\"lead\">Age: " . $age . "</p>";
              echo "<p class=\"lead\" id=\"gender\" data-gender=\" $gender\">Gender: " . $gender . "<br>" . "</p>
            </div>";
              echo "<div class=\"col-md-6\" >";
              echo "<p class=\"lead\">Date of Counseling: " . date("F d, Y", strtotime($approved_date)) . "</p>";
              echo "<p class=\"lead\">Assigned RND: " . $assigned_rnd . "</p>";
              echo "</div>";
          }
          echo "</div>";*/

           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $data["appointment_id"] = $appointment_id;

          $data['title'] = 'Edit Food Exchange List';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          //$admin_header  = $this->load->view('admin_header', $data, true);
         // echo $admin_header;
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
         // $admin_navbar     = $this->load->view('admin_navbar', $data, true);
         // echo $admin_navbar;
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          $k                = base_url('admin/help/meal_plan/' . $appointment_id . '');
          $x                = base_url('assets/images/' . "ncs.png" . '');
      
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->appointment_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
             // $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
             
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }


          $this->load->view('edit_fel',$data);
      }

      public function create_edit_fel($appointment_id)
      {
         
          $fel_function_js    = base_url("assets/js/fel_function.js");
          echo  "<script type=\"text/javascript\" src=\"$fel_function_js\"></script>";
          echo "<div class=\"col-md-12\"  >";
          echo "<hr></hr>";
          echo "<div id=\"alert\" tabindex=\"1\" style=\"margin-top: 20px; margin-bottom: 20px;\"></div>";
          echo "</div>";
          echo "</div> ";
          if ($b > $a) {
              echo "<div id=\"fel_data\">";
              echo " <h3>Food Exchange List</h3>";
              echo "<div><div class=\"alert alert-danger\">Record not found. Please contact RND.</div></div>";
              echo "</div>";
          } else {
              $data["results2"] = $this->help_model->get_nutrition_plan($appointment_id);
              $numRows2         = $this->help_model->getAffectedRows();
              $aaa              = base_url('admin/help/fel_print/' . $appointment_id . '');
              $data["results7"] = $this->help_model->get_fel($appointment_id);
              $numRows7         = $this->help_model->getAffectedRows();


              if ($numRows2 > 0 && $numRows7 >0) {
                  echo "<div id=\"fel_data\" class=\"container\">";
                  echo " <h3>Food Exchange List</h3>";
                  if ($b <= $a) {
                      $z           = base_url('admin/help/edit_nutrition_plan/' . $appointment_id . '');
                      $edit_button = "<a href=\"$z\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"> <span class=\"glyphicon glyphicon-pencil\"></span> Edit Custom Plan</a>";
                  } else {
                      echo "";
                  }
                  $k = base_url('admin/help/meal_plan/' . $appointment_id . '');
                  echo "<div id=\"viewfeldata\" ><form action=\"#\" id=\"form\" name=\"form\" method=\"POST\" ><div  align=\"right\" style=\"margin-bottom:10px;\" ><a href=\"$k\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg\"><span class=\"glyphicon glyphicon-cutlery\"></span> Meal Planner</a>&nbsp;$edit_button&nbsp;<a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg\" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print </a>" . "</div><div  class=\"table-responsive\"><table  cellspacing=\"0\" cellpadding=\"0\"  border= \"0\" class=\"table table-condensed\"><tr>
                            <th >Food Group</th><th>Exchange</th><th class=\"carbo\">CHO</th><th class=\"pro\">P</th><th class=\"fat\">F</th><th class=\"calorie\">Kcal</th><th class=\"meal_style\">Breakfast</th><th class=\"meal_style\">Am Snack</th><th class=\"meal_style\">Lunch</th><th class=\"meal_style\">Pm Snack </th><th class=\"meal_style\">Dinner</th><th class=\"meal_style\">MN Snack</th><th>Total</th>
                            </tr>";
                  $data["results3"] = $this->help_model->get_foodgroups_th();
                  foreach ($data['results3'] as $row3) {
                      $foodgroup_th_id = $row3->id;
                      $foodgroup_th    = $row3->foodgroup_th;
                      echo "<tr><td class=\"fel_style1\" >" . $foodgroup_th . "</td><td ></td><td class=\"carbo\"></td><td class=\"pro\"></td><td class=\"fat\" ></td><td class=\"calorie\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td class=\"meal_style\"></td><td></td></tr>";
                      $data["results4"] = $this->help_model->get_fel_db($appointment_id, $foodgroup_th_id);
                      foreach ($data['results4'] as $row4) {
                          $id              = $row4->foodid;
                          $row_id          = $row4->id;
                          $foodgroup_th_id = $row4->foodgroup_th_id;
                          $foodgroup       = $row4->foodgroup;
                          $foodgroup_cho   = $row4->foodgroup_cho;
                          $foodgroup_pro   = $row4->foodgroup_protein;
                          $foodgroup_fat   = $row4->foodgroup_fat;
                          $ex              = $row4->ex;
                          $fel_cho         = $row4->fel_cho;
                          $fel_pro         = $row4->fel_pro;
                          $fel_fat         = $row4->fel_fat;
                          $fel_cal         = $row4->fel_cal;
                          $bfast           = $row4->bfast;
                          $am_snack        = $row4->am_snack;
                          $lunch           = $row4->lunch;
                          $pm_snack        = $row4->pm_snack;
                          $dinner          = $row4->dinner;
                          $mn_snack        = $row4->mn_snack;
                          echo "<tr><td  style=\"text-indent:10px;\" class=\"fel_style2\"  >" . $foodgroup . "<input type=\"hidden\" id=\"foodid\" name=\"foodid[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$id\" />
        <input type=\"hidden\" id=\"foodgroup_cho$id\" name=\"foodgroup_cho[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_cho\" />    <input type=\"hidden\" id=\"foodgroup_pro$id\" name=\"foodgroup_pro[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_pro\" />    <input type=\"hidden\" id=\"foodgroup_fat$id\" name=\"foodgroup_fat[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$foodgroup_fat\" /><input type=\"hidden\" id=\"rowid$row_id\" name=\"rowid[]\"  maxlength=\"4\" class=\"form-control input-lg\" tabindex=\"1\" value=\"$row_id\" />    
        </td>";
                          echo "<td ><input type=\"text\" id=\"ex$id\" name=\"ex[]\"   maxlength=\"3\" data=\"$id\"  class=\"exchange\" tabindex=\"1\" value=\"$ex\"  /></td>";
                          echo "<td class=\"carbo\" align=\"center\">
                                                <span  id=\"fel_cho_label$id\">$fel_cho</span>
                                                <input type=\"hidden\" id=\"fel_cho$id\" name=\"fel_cho[]\" readonly=\"\" maxlength=\"4\" class=\"form-control input-lg\" value=\"$fel_cho\" /></td>";
                          echo "<td class=\"pro\" align=\"center\"><span  id=\"fel_pro_label$id\">$fel_pro</span>
                                                <input type=\"hidden\" id=\"fel_pro$id\" name=\"fel_pro[]\" readonly=\"\" maxlength=\"4\" class=\"form-control input-lg\" value=\"$fel_pro\" /></td>";
                          echo "<td class=\"fat\" align=\"center\"><span id=\"fel_fat_label$id\">$fel_fat</span>
                                                <input type=\"hidden\" id=\"fel_fat$id\" name=\"fel_fat[]\" readonly=\"\" maxlength=\"4\"  class=\"form-control input-lg\" value=\"$fel_fat\"/></td>";
                          echo "<td class=\"calorie\" align=\"center\"><span  id=\"cal_label$id\">$fel_cal</span>
                                                <input type=\"hidden\" id=\"fel_cal$id\" name=\"fel_cal[]\" readonly=\"\" maxlength=\"4\"  class=\"form-control input-lg\" value=\"$fel_cal\"/></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"bfast$id\" name=\"bfast[]\"  maxlength=\"4\" data=\"$id\" class=\"  dstr_exchange\"  value=\"$bfast\"  /></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"am_snack$id\" name=\"am_snack[]\"  maxlength=\"4\" data=\"$id\"  class=\"dstr_exchange\"  value=\"$am_snack\" /></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"lunch$id\" name=\"lunch[]\"  maxlength=\"4\" data=\"$id\"   class=\" dstr_exchange\"  value=\"$lunch\"  /></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"pm_snack$id\" name=\"pm_snack[]\"  maxlength=\"4\" data=\"$id\"  class=\" dstr_exchange\"  value=\"$pm_snack\"  /></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"dinner$id\" name=\"dinner[]\"  maxlength=\"4\"  data=\"$id\"  class=\" dstr_exchange\"  value=\"$dinner\" /></td>";
                          echo "<td class=\"meal_style\"><input type=\"text\" id=\"mn_snack$id\" name=\"mn_snack[]\"  maxlength=\"4\" data=\"$id\"   class=\"dstr_exchange\" value=\"$mn_snack\" /></td>";
                          echo "<td ><span id=\"tot$id\">Complete</span></td>";
                          echo "</tr>";
                      }
                  }
                  $data["results5"] = $this->help_model->total_fel_nutrients($appointment_id);
                  foreach ($data["results5"] as $row5) {
                      $total_cho = $row5->total_cho;
                      $total_pro = $row5->total_pro;
                      $total_fat = $row5->total_fat;
                      $total_cal = $row5->total_cal;
                      echo "<tr><td class=\"fel_style1\">Total</td><td ></td>";
                      echo "<td class=\"carbo\">
            <strong><span  id=\"fel_cho_total_label\">$total_cho</span></strong>
            <input type=\"hidden\" id=\"fel_cho_total\" name=\"fel_cho_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_cho\" /></td>";
                      echo "<td class=\"pro\">
        <strong><span  id=\"fel_pro_total_label\">$total_pro</span></strong>
            <input type=\"hidden\" id=\"fel_pro_total\" name=\"fel_pro_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_pro\"/></td>";
                      echo "<td class=\"fat\" >
        <strong><span  id=\"fel_fat_total_label\">$total_fat</span></strong>
            <input type=\"hidden\" id=\"fel_fat_total\" name=\"fel_fat_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_fat\"/></td>";
                      echo "<td class=\"calorie\">
        <strong><span  id=\"fel_cal_total_label\">$total_cal</span></strong>
            <input type=\"hidden\" id=\"fel_cal_total\" name=\"fel_cal_total\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$total_cal\"/></td></tr>";
                  }
                  $data["results6"] = $this->help_model->get_nutrition_plan($appointment_id);
                  foreach ($data["results6"] as $row6) {
                      $cho     = $row6->cho;
                      $protein = $row6->protein;
                      $fat     = $row6->fat;
                      $cal     = $row6->cal;
                      echo "<tr><td class=\"fel_style1\">Dietary RX</td><td></td>";
                      echo "<td class=\"carbo\"><strong>$cho<strong><input type=\"hidden\" id=\"cho\" name=\"cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cho\" /></td>";
                      echo "<td  class=\"pro\"><strong>$protein<strong><input type=\"hidden\" id=\"protein\" name=\"protein\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$protein\" /></td>";
                      echo "<td class=\"fat\"><strong>$fat<strong><input type=\"hidden\" id=\"fat\" name=\"fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$fat\" /></td>";
                      echo "<td class=\"calorie\"><strong>$cal<strong><input type=\"hidden\" id=\"cal\" name=\"cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" value=\"$cal\" /></td></tr>";
                  }
                  echo "<tr><td class=\"fel_style1\">Rating</td><td></td>";
                  echo "<td ><strong><span id=\"rating_cho_label\"></span></strong><input type=\"hidden\" id=\"rating_cho\" name=\"rating_cho\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_pro_label\"></span></strong><input type=\"hidden\" id=\"rating_pro\" name=\rating_pro\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_fat_label\"></span></strong><input type=\"hidden\" id=\"rating_fat\" name=\rating_fat\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td>";
                  echo "<td ><strong><span id=\"rating_cal_label\"></span></strong><input type=\"hidden\" id=\"rating_cal\" name=\"rating_cal\"  maxlength=\"4\" readonly=\"\" class=\"form-control input-lg\" /></td></tr>";
                  echo "</table></div>";
                  echo "<div class=\"form-group\"><input type=\"hidden\" name=\"appointment_id\" id=\"appointment_id\" value=\"$appointment_id\" class=\"form-control\" /></div>";
                  echo "<div class=\"col-md-12\" align=\"center\" id=\"update_div\" style=\"margin-bottom:10px;\" ></div></form>";
                  echo "</div></div>";
              } else {
                  echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\">No record found.</div></div>";
              }
          }



      }
      public function update_fel()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $client_id       = $this->input->post('client_id', TRUE);
          //$id              = $this->input->post('appointment_id', TRUE);
          $foodid          = $this->input->post('foodid', TRUE);
          $ex              = $this->input->post('ex', TRUE);
          $fel_cho         = $this->input->post('fel_cho', TRUE);
          $fel_pro         = $this->input->post('fel_pro', TRUE);
          $fel_fat         = $this->input->post('fel_fat', TRUE);
          $fel_cal         = $this->input->post('fel_cal', TRUE);
          $bfast           = $this->input->post('bfast', TRUE);
          $am_snack        = $this->input->post('am_snack', TRUE);
          $lunch           = $this->input->post('lunch', TRUE);
          $pm_snack        = $this->input->post('pm_snack', TRUE);
          $dinner          = $this->input->post('dinner', TRUE);
          $mn_snack        = $this->input->post('mn_snack', TRUE);
          $id              = $this->input->post('rowid', TRUE);
          $datetime        = date("Y-m-d");
          $by              = $this->session->id;
          $data["results"] = $this->help_model->get_fel($id);
          $numRows         = $this->help_model->getAffectedRows();


          $alert           = 'success';
          
          if($numRows > 0){
          foreach ($data["results"] as $row) {
              $ex1 = $row->ex;
              if ($ex != $ex1) {
              $id              = $this->input->post('appointment_id', TRUE);
              $where= 'appointment_id';
              if($this->help_model->delete_menu($where,$id) == TRUE){
              $where= 'appointment_id';
              $this->help_model->delete_meal($where,$id);
              $this->help_model->update_fel();
              $alert;
              }
     
                  
              } else {
                  $alert;
              }
          }
        }else{
              $this->help_model->update_fel();
              echo $alert;
        }
      }

      public function delete_fel()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('appointment_id', TRUE);
          $where= 'appointment_id';
          $this->help_model->delete_fel($where,$id);
     
          if($this->help_model->delete_menu($where,$id) == TRUE){
              $where= 'appointment_id';
              $this->help_model->delete_meal($where,$id);
                   echo "success";
              }
     
             
            
      
          
         
      }
      public function meal_plan($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title'] = 'Create Meal Plan';
          $a             = base_url('admin/help/fel/' . $appointment_id . '');
          $data['crumb'] = array(
              array(
                  'label' => 'Food Exchange List',
                  'link' => $a
              ),
              array(
                  'label' => $data['title'],
                  'link' => ''
              )
          );
          

          $data['title']    = 'Meal Plan';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->appointment_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
             // $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
             
          }
          $data["get_age"] = $this->help_model->get_age($client_id,$approved_date,$approved_date);
          foreach ($data["get_age"] as $row1) {
              $data["age_year"] = $row1->age_year;
              $data["age_month"]= $row1->age_month;
                              
              
          }


          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          //$admin_footer = $this->load->view('admin_footer', $data, true);
          $this->load->view('meal_plan',$data);
          //echo $admin_footer;
      }

      public function create_meal_plan($appointment_id)
      {
          $meal_plan_js             = base_url("assets/js/meal_plan.js");
          echo "<script type=\"text/javascript\" src=\"$meal_plan_js\"></script>";
         
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          foreach ($data["results1"] as $row) {
              $data['appointment_id'] = $row->appointment_id;
              $data['client_id']      = $row->client_id;
              $data['name']           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $data['gender_id']      = $row->gender_id;
              $data['gender']         = $row->gender;
             // $data['age_year']       = $row->age_year;
             // $data['age_month']      = $row->age_month;
              $data['approved_date']  = $row->approved_date;
              $approved_date          = $row->approved_date;
              $data['assigned_rnd']   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
              $client_id              = $row->client_id;
             
          }
         
          $data["results00"] = $this->help_model->get_meal_plan($appointment_id);
          $numRows00         = $this->help_model->getAffectedRows();
          $data["results2"]  = $this->help_model->get_meal();
          echo "<div class=\"container\">";
          echo "<h2 align=\"center\">Meals for the Day</h2>";
          echo "<hr class=\"colorgraph\"></hr>";
          $data["results01"] = $this->help_model->get_fel($appointment_id);
          $numRows01         = $this->help_model->getAffectedRows();
          if ($numRows01 > 0) {
              echo "<div class=\"container\">";
              if ($b <= $a) {
                  $z           = base_url('admin/help/edit_fel/' . $appointment_id . '');
                  $edit_button = "<a href=\"$z\"  class=\"btn btn-success btn-lg \" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-pencil\" ></span> Food Exchange List</a>&nbsp;";
              } else {
                  $edit_button = "";
              }
              if ($numRows00 == 0) {
                  $data["results001"] = $this->help_model->get_last_meal_plan($client_id);
                  $numRows001         = $this->help_model->getAffectedRows();

                  if($numRows001 >0){
                    foreach ($data["results001"] as $row001) {
                      $appointment_id1 = $row001->appointment_id;
                  }
                   $previous_button = " <a href=\"#\" id=\"$appointment_id1\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg previous_meal_plan\">Last Meal Plan </a>&nbsp;";

                  }else{
                     $previous_button = "";
                  }
                  
                 
              } else {
                  $previous_button = "";
              }
          } else {


              if ($numRows00 == 0) {
                  $data["results001"] = $this->help_model->get_last_meal_plan($client_id);
                  $numRows001         = $this->help_model->getAffectedRows();
                  if($numRows001){
                  foreach ($data["results001"] as $row001) {
                      $appointment_id1 = $row001->appointment_id;
                  }

                   $previous_button = "";
                  echo "<a href=\"#\" id=\"$appointment_id1\" style=\"color: #ffffff\" class=\"btn btn-success btn-lg previous_meal_plan\">Last Meal Plan </a>&nbsp;";
                }else{
                   $previous_button = "";
                  $appointment_id1 =0;
                }
                 

              } else {
                  $previous_button = "";
              }
          }
          $data["select_plan_id0"] = $this->help_model->get_nutrition_plan($appointment_id);
          $numRows001         = $this->help_model->getAffectedRows();
          if($numRows001>0){
          foreach ($data["select_plan_id0"] as $row00) {
              $select_plan_id = $row00->select_plan_id;
          }
          $aaa = base_url('admin/help/meal_plan_print/' . $appointment_id . '');
          if ($select_plan_id == 1) {
              echo "<a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg  \" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print</a>&nbsp;";
          } else {
              echo $edit_button . " " . $previous_button;
              if ($numRows00 > 0) {
                  echo "&nbsp;<a href=\"#\" onclick=\"window.open('$aaa')\" class=\"btn btn-success btn-lg\" style=\"color:#ffffff\"><span class=\"glyphicon glyphicon-print\" ></span> Print</a>&nbsp;";
              } else {
                  echo "";
              }
          }
          echo "<div id=\"meal_div\">";
          foreach ($data["results2"] as $row2) {
              $meal_id          = $row2->id;
              $meal_name        = $row2->meal_name;
              $meal_code        = $row2->meal_code_name;
              $data["results3"] = $this->help_model->get_nutrition_plan($appointment_id);
              $data['numRows3'] = $this->help_model->getAffectedRows();
              foreach ($data['results3'] as $row3) {
                  $select_plan_id = $row3->select_plan_id;
                  $data_id        = $row3->default_nutrition_id;
              }
              if ($select_plan_id == 1) {
                  $data["results4"] = $this->help_model->default_fel_total($data_id);
                  $data["results5"] = $this->help_model->get_fel_default_foodgroup($meal_code, $data_id);
                  $numRows5         = $this->help_model->getAffectedRows();
              } else {
                  $data["results4"] = $this->help_model->fel_total($appointment_id);
                  $data["results5"] = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
                  $numRows5         = $this->help_model->getAffectedRows();
              }
              $total = 0;
              foreach ($data["results4"] as $row4) {
                  $total += $row4->$meal_code;
              }
              if ($total == 0) {
                  echo "<h4>" . $meal_name . "</h4>";
                  $create_menu = "";
              } else {
                  echo "<h4>" . $meal_name . " " . "</h4>";
                  $create_menu = "<div align=\"right\" style=\"margin-bottom: 10px;\"><div class=\"form-group form-inline\"><input type=\"text\" class=\"form-control text-box menu  \" id=\"menu_name$meal_id\" name=\"menu_name\"  placeholder=\"Enter menu name..\">
            <button class=\"btn btn-primary add_menu\" data-meal_id=\"$meal_id\" data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\" id=\"meal_id\" value=\"$meal_id\" >Create </button></div></div>";
              }
              echo "<div id=\"menu\" align=\"left\">";
              if ($numRows5 == 0) {
                  echo "<br><span class=\"alert alert-danger\">" . "No foodgroups available" . "</span><br><br>";
              } else {
                  echo "<div class=\"col-md-3\">";
                  echo "<ul class=\"list-group\">";
                  foreach ($data['results5'] as $row5) {
                      $foodid = $row5->foodid;
                      if ($select_plan_id == 1) {
                          $data["results6"] = $this->help_model->get_total_default_meal($foodid, $meal_id, $data_id);
                      } else {
                          $data["results6"] = $this->help_model->get_total_meal($foodid, $meal_id, $appointment_id);
                      }
                      $exrem       = 0;
                      $total_value = 0;
                      foreach ($data['results6'] as $row6) {
                          $hh_val = $row6->hh_val;
                          $exrem += $row6->ex;
                      }
                      $totalex_rem = $row5->$meal_code - $exrem;
                      echo "<li class=\"list-group-item \">";
                      echo "<span class=\"badge\" >" . $totalex_rem . "</span><label >" . $row5->foodgroup . "</label></li>";
                      $total_value += $row5->$meal_code;
                  }
                  echo "</ul></div>";
              }
              if ($select_plan_id == 1) {
                  echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 400px;\">";
                  $data['results7'] = $this->help_model->get_default_menu($data_id, $meal_id);
                  foreach ($data['results7'] as $row7) {
                      $menu_id   = $row7->id;
                      $menu_name = $row7->menu_name;
                      echo "<div><i>" . $menu_name . "</i>";
                      $data['results8'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                      $numRows8         = $this->help_model->getAffectedRows();
                      $total_ex         = 0;
                      if ($numRows8 > 0) {
                          echo "<div class=\"table-responsive\"><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                          echo "<tr>
                                    <th>Food Group</th>
                                    <th>Food List</th>
                                    <th>Food Item</th>
                                    <th >Ex</th>
                                    <th colspan=\"2\">Qty(EP)</th>
                                    <th colspan=\"2\">HH Measure</th>
                                    
                                    </tr>";
                          foreach ($data['results8'] as $row8) {
                              $id        = $row8->combination_id;
                              $menu_id   = $row8->menu_id;
                              $meal_id   = $row8->meal_id;
                              $foodgroup = $row8->foodgroup_content;
                              $foodlist  = $row8->foodlist;
                              $fooditem  = $row8->fooditem;
                              $ex        = $row8->ex;
                              $qty_val   = $row8->qty_val;
                              $hh_val    = $row8->hh_val;
                              $hh_m      = $row8->hh_measure;
                              $total_ex += $ex;
                              if ($this->help_model->is_digits($ex)) {
                                  $ex = $row8->ex;
                              } else {
                                  $ex = $this->help_model->fraction($row8->ex);
                              }
                              if ($this->help_model->is_digits($hh_val)) {
                                  $hh_val = $row8->hh_val;
                              } else {
                                  $hh_val = $this->help_model->fraction($row8->hh_val);
                              }
                              echo "<tr>";
                              echo "<td>" . $foodgroup . "</td>";
                              echo "<td>" . $foodlist . "</td>";
                              echo "<td>" . $fooditem . "</td>";
                              echo "<td>" . $ex . "</td>";
                              echo "<td colspan=\"2\">" . $qty_val . "</td>";
                              echo "<td>" . $hh_val . "</td>";
                              echo "<td>" . $hh_m . "</td>";
                              echo "</tr>";
                          }
                          echo "</table></div>";
                      }
                      echo "</div>";
                  }
              } else {
                  if ($b > $a) {
                      echo "";
                  } else {
                      echo $create_menu;
                  }
                  echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 600px;\">";
                  echo "<div id=\"alert$meal_id\" tabindex=\"1\" ></div>";
                  echo "<br><br>";
                  $data['results7'] = $this->help_model->menu($meal_id, $appointment_id);
                  $numRows7         = $this->help_model->getAffectedRows();
                  if ($numRows7 > 0) {
                      foreach ($data['results7'] as $row7) {
                          $menu_id   = $row7->id;
                          $menu_name = $row7->menu_name;
                          if ($b > $a) {
                              echo "<div><a id=\"meal_plan\"  href=\"#\" class=\"aa\">" . "<i>" . $menu_name . "</i>" . "</a>";
                          } else {
                              echo "<div><a id=\"$menu_id\"  href=\"\" class=\"edit_menu\">&nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\" class=\"delete_menu\"><span class=\"glyphicon glyphicon-minus-sign\"></span></a>&nbsp;" . "<i >" . $menu_name . "</i>";
                          }
                          $data['results8'] = $this->help_model->meal_plan($appointment_id, $menu_id, $meal_id);
                          $numRows8         = $this->help_model->getAffectedRows();
                          if ($numRows8 > 0) {
                              echo "<div class=\"table-responsive\" ><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                              if ($b > $a) {
                                  $action = '';
                              } else {
                                  $action = '<th colspan=\"2\" align=\"center\">Action</th><th></th>';
                              }
                              echo "<tr>
        <th>Food Group</th>
        <th>Food List</th>
        <th>Food Item</th>
        <th >Ex</th>
        <th colspan=\"2\">Qty(EP)</th>
        <th colspan=\"2\">HH Measure</th>$action
        
        
        </tr>";
                              $total_ex = 0;
                              foreach ($data['results8'] as $row8) {
                                  $menu_id   = $row8->menu_id;
                                  $meal_id   = $row8->meal_id;
                                  $foodgroup = $row8->foodgroup_content;
                                  $foodlist  = $row8->foodlist;
                                  $fooditem  = $row8->fooditem;
                                  $ex        = $row8->ex;
                                  $qty_val   = $row8->qty_val;
                                  $hh_val    = $row8->hh_val;
                                  $hh_m      = $row8->hh_measure;
                                  $id        = $row8->combination_id;
                                  $total_ex += $ex;
                                  if ($this->help_model->is_digits($ex)) {
                                      $ex = $row8->ex;
                                  } else {
                                      $ex = $this->help_model->fraction($row8->ex);
                                  }
                                  if ($this->help_model->is_digits($hh_val)) {
                                      $hh_val = $row8->hh_val;
                                  } else {
                                      $hh_val = $this->help_model->fraction($row8->hh_val);
                                  }
                                  echo "<tr >";
                                  echo "<td>" . $foodgroup . "</td>";
                                  echo "<td>" . $foodlist . "</td>";
                                  echo "<td>" . $fooditem . "</td>";
                                  echo "<td>" . $ex . "</td>";
                                  echo "<td colspan=\"2\">" . $qty_val . "</td>";
                                  echo "<td>" . $hh_val . "</td>";
                                  echo "<td>" . $hh_m . "</td>";
                                  if ($b > $a) {
                                      echo "";
                                  } else {
                                      echo "<td align=\"center\"><input type=\"hidden\" id=\"meal_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\" /><input type=\"hidden\" id=\"meal\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><a id=\"$id\"  data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\" data-meal_code=\"$meal_code\" data-meal_id=\"$meal_id\" data-menu_id=\"$menu_id\" href=\"#\" class=\"edit_meal\" ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
                                      echo "<td><a id=\"$id\"  href=\"#\" class=\"delete_meal\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
                                  }
                                  echo "</tr>";
                              }
                              if ($b > $a) {
                                  echo "";
                              } else {
                                  $data['groups'] = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
                                  echo "<tr><td>";
                                  echo "<select name=\"foodgroup\" id=\"foodgroup$menu_id\" class=\" foodgroup form-control \" data-menu_id=\"$menu_id\" >";
                                  echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
                                  foreach ($data['groups'] as $row9) {
                                      $foodid    = $row9->foodid;
                                      $foodgroup = $row9->foodgroup;
                                      echo "<option value=\"$foodid\" >$foodgroup</option>";
                                  }
                                  echo "<option value=\"14\" >Combination Foods</option> ";
                                  echo " </select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<select name=\"foodlist\" id=\"foodlist$menu_id\" class=\" foodlist  form-control \" data-menu_id=\"$menu_id\"  >
    <option value=\"0\">--Food Lists--</option>
</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<input type=\"text\" id=\"fooditem$menu_id\" name=\"fooditem \" class=\" fooditem  form-control \" placeholder=\"Select Food Item\"  data-menu_id=\"$menu_id\"  />";
                                  echo " <input type=\"hidden\" id=\"fooditem_id$menu_id\" name=\"fooditem_id\" class=\"form-control\" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"foodgroup_content$menu_id\" name=\"foodgroup_content\" class=\"foodgroup_content form-control \" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"const_ex_combination$menu_id\" name=\"const_ex_combination\" class=\"form-control\" data-menu_id=\"$menu_id\" />";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "    <input type=\"text\" class=\" meal_plan_exchange   form-control\"  placeholder=\"Ex\" id=\"ex$menu_id\" name=\"ex\" data-menu_id=\"$menu_id\"  size=\"2\"  />
        <input type=\"hidden\" class=\"form-control const_ex\"  placeholder=\"Constant Exchange\" id=\"const_ex$menu_id\" name=\"const_ex\" data-menu_id=\"$menu_id\"  size=\"2\"    />";
                                  echo "</td>";
                                  echo "<td colspan=\"2\">";
                                  echo "    <span id=\"qty_val_label$menu_id\" >Qty(EP)</span>
        <input type=\"hidden\" id=\"qty_val$menu_id\" name=\"qty_val\" class=\"form-control input-sm\" data-menu_id=\"$menu_id\"   size=\"2\" /><input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty$menu_id\" name=\"qty\" data-menu_id=\"$menu_id\"  size=\"5\"   />";
                                  echo "</td>";
                                  echo "<td><span id=\"hh_foodgroup$menu_id\"></span></td>";
                                  echo "<td><span id=\"hh_val_label$menu_id\" ></span><br><span id=\"hh_measure$menu_id\"></span><input type=\"hidden\" class=\"form-control hh_m\"  placeholder=\"HH Value\" id=\"hh_val$menu_id\" name=\"hh_val\" data-menu_id=\"$menu_id\"  size=\"1\"  /></td>";
                                  echo "<td align=\"center\" colspan=\"6\">";
                                  echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><input type=\"hidden\" id=\"meal$menu_id\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><button class=\"btn btn-primary add_meal btn-sm\" data-menu_id=\"$menu_id\" data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\"  id=\"menu_id\" value=\"$menu_id\"   ><span class=\"glyphicon glyphicon-plus\"></span></button>";
                                  echo "</td>";
                              }
                              echo "</tr>";
                              echo "</table>";
                          } else {
                              echo "<div class=\"table-responsive\" ><table  width=\"850\" class=\"table table-condensed\" border=\"0\">";
                              echo "<tr ><td colspan=\"9\">" . "No food item available" . "</td></tr>";
                              if ($b > $a) {
                                  echo "";
                              } else {
                                  $data['groups'] = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
                                  echo "<tr><td>";
                                  echo "<select name=\"foodgroup\" id=\"foodgroup$menu_id\" class=\" foodgroup form-control \" data-menu_id=\"$menu_id\" >";
                                  echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
                                  foreach ($data['groups'] as $row9) {
                                      $foodid    = $row9->foodid;
                                      $foodgroup = $row9->foodgroup;
                                      echo "<option value=\"$foodid\" >$foodgroup</option>";
                                  }
                                  echo "<option value=\"14\" >Combination Foods</option> ";
                                  echo " </select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<select name=\"foodlist\" id=\"foodlist$menu_id\" class=\" foodlist form-control \" data-menu_id=\"$menu_id\"  >
    <option value=\"0\">--Food Lists--</option>
</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<input type=\"text\" id=\"fooditem$menu_id\" name=\"fooditem \" class=\" fooditem  form-control \" placeholder=\"Select Food Item\"  data-menu_id=\"$menu_id\"  />";
                                  echo " <input type=\"hidden\" id=\"fooditem_id$menu_id\" name=\"fooditem_id\" class=\"form-control\" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"foodgroup_content$menu_id\" name=\"foodgroup_content\" class=\"foodgroup_content form-control \" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"const_ex_combination$menu_id\" name=\"const_ex_combination\" class=\"form-control\" data-menu_id=\"$menu_id\" />";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "    <input type=\"text\" class=\" meal_plan_exchange   form-control\"  placeholder=\"Ex\" id=\"ex$menu_id\" name=\"ex\" data-menu_id=\"$menu_id\"  size=\"2\"  />
        <input type=\"hidden\" class=\"form-control const_ex\"  placeholder=\"Constant Exchange\" id=\"const_ex$menu_id\" name=\"const_ex\" data-menu_id=\"$menu_id\"  size=\"2\"    />";
                                  echo "</td>";
                                  echo "<td colspan=\"2\">";
                                  echo "    <span id=\"qty_val_label$menu_id\" >Qty(EP)</span>
        <input type=\"hidden\" id=\"qty_val$menu_id\" name=\"qty_val\" class=\"form-control input-sm\" data-menu_id=\"$menu_id\"   size=\"2\" /><input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty$menu_id\" name=\"qty\" data-menu_id=\"$menu_id\"  size=\"5\"   />";
                                  echo "</td>";
                                  echo "<td><span id=\"hh_foodgroup$menu_id\"></span></td>";
                                  echo "<td><span id=\"hh_val_label$menu_id\" ></span><br><span id=\"hh_measure$menu_id\"></span><input type=\"hidden\" class=\"form-control hh_m\"  placeholder=\"HH Value\" id=\"hh_val$menu_id\" name=\"hh_val\" data-menu_id=\"$menu_id\"  size=\"1\"  /></td>";
                                  echo "<td align=\"center\" colspan=\"6\">";
                                  echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><input type=\"hidden\" id=\"meal$menu_id\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><button class=\"btn btn-primary add_meal btn-sm\" data-menu_id=\"$menu_id\" data-client_id=\"$client_id\" data-appointment_id=\"$appointment_id\"  id=\"menu_id\" value=\"$menu_id\"   ><span class=\"glyphicon glyphicon-plus\"></span></button>";
                                  echo "</td>";
                              }
                          }
                          echo "</tr>";
                          echo "</table></div></div>";
                      }
                  } else {
                      echo "<div class=\"alert alert-warning btn-sm\">No meal plan available.</div>";
                  }
              }
              echo "</div>";
              echo "</div>";
          }

        }else{
          echo "<div class=\"alert alert-danger \">No meal plan available.</div>";
        }
          echo "</div>";
          echo "</div>";
          echo "</div>";



      }
      public function save_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_menu();
          echo "success";
      }
      public function get_foodlists()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id             = $this->input->post('foodgroup', TRUE);
          $data['groups'] = $this->help_model->get_fel_foodlists($id);
          foreach ($data['groups'] as $row) {
              $id       = $row->id;
              $foodlist = $row->foodlist;
              echo "<option  value=\"$id\">" . $foodlist . "</option>";
          }
      }
      public function get_fooditem()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $fooditem            = $this->input->get('term');
          $foodlist_id         = $this->input->get('foodlist');
          $data['getFooditem'] = $this->help_model->get_fooditem($fooditem, $foodlist_id);
          $output              = array();
          foreach ($data['getFooditem'] as $row) {
              unset($temp);
              $temp              = array();
              $fooditem          = $row->fooditem;
              $id                = $row->id;
              $wt_ep             = $row->wt_ep;
              $ex                = $row->const_ex;
              $hh_m              = $row->hh_measure;
              $foodgroup         = $row->foodgroup;
              $content           = $row->content;
              $temp['label']     = $fooditem;
              $temp['id']        = $id;
              $temp['ep']        = $wt_ep;
              $temp['ex']        = $ex;
              $temp['hh_m']      = $hh_m;
              $temp['foodgroup'] = $foodgroup;
              $temp['content']   = $content;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function save_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $client_id         = $this->input->post('client_id', TRUE);
          $appointment_id    = $this->input->post('appointment_id', TRUE);
          $menu_id           = $this->input->post('menu_id', TRUE);
          $meal_id           = $this->input->post('meal_id', TRUE);
          $foodgroup         = $this->input->post('foodgroup', TRUE);
          $foodgroup_content = $this->input->post('foodgroup_content', TRUE);
          $foodlist          = $this->input->post('foodlist', TRUE);
          $fooditem_id       = $this->input->post('fooditem_id', TRUE);
          $ex                = $this->input->post('ex', TRUE);
          $qty_val           = $this->input->post('qty_val', TRUE);
          $hh_val            = $this->input->post('hh_val', TRUE);
          $meal              = $this->input->post('meal', TRUE);
          $by                = $this->session->id;
          $data['results']   = $this->help_model->get_meal_status();
          foreach ($data['results'] as $row) {
              $fg_id            = $row->Auto_increment;
              $fg_array         = explode(",", $foodgroup_content);
              $total_meal_item  = 0;
              $total_meal_ex    = 0;
              $total_foodfel_ex = 0;
              $total_item       = 0;
              $item1            = 0;
              $item             = 0;
          }
          $aaa_fg[] = 0;
          foreach ($fg_array as $item) {
              $aaa_fg[] .= $item;
              $data['results1'] = $this->help_model->check_fel_meal($item, $appointment_id);
              $aa               = 0;
              $aaa[]            = 0;
              foreach ($data['results1'] as $row1) {
                  $aa += $row1->$meal;
                  $aaa[] = $row1->$meal;
              }
              $data['results2'] = $this->help_model->check_meal_plan_ex($meal_id, $appointment_id, $item);
              $total            = 0;
              $total_ex         = 0;
              foreach ($data['results2'] as $row2) {
                  $total += $row2->ex;
              }
          }
          $total_ex = $total + $ex;
          if ($total_ex > $aa) {
              echo "error1";
          } else {
              $fooditem_array = explode(",", $fooditem_id);
              $fg_array       = explode(",", $foodgroup_content);
              $hh_val_array   = explode(",", $hh_val);
              $qty_val_array  = explode(",", $qty_val);
              $item           = 0;
              $item1          = 0;
              $item2          = 0;
              $item3          = 0;
              foreach (array_keys($fg_array) as $key) {
                  $item  = $fg_array[$key];
                  $item1 = $hh_val_array[$key];
                  $item2 = $qty_val_array[$key];
                  $item3 = $fooditem_array[$key];
                  $this->db->trans_start();
                  $data = array(
                      'client_id' => $client_id,
                      'appointment_id' => $appointment_id,
                      'menu_id' => $menu_id,
                      'meal_id' => $meal_id,
                      'foodgroup_id' => $foodgroup,
                      'foodlist_id' => $foodlist,
                      'fooditem_id' => $item3,
                      'foodgroup_content' => $item,
                      'ex' => $ex,
                      'qty_val' => $item2,
                      'hh_val' => $item1,
                      'combination_id' => $fg_id,
                      'submitted_by' => $by,
                      'submitted_on' => date('Y-m-d H:i:s')
                  );
                  $this->db->insert('meal_plan_db', $data);
                  $this->db->trans_complete();
                  if ($this->db->trans_status() === FALSE) {
                      return false;
                  } else {
                      echo "success";
                  }
              }
          }
      }
      public function delete_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
          $where= 'id';
          //$this->help_model->delete_menu($id);
          //$this->help_model->delete_meal($id);
         
          if($this->help_model->delete_menu($where,$id) == TRUE){
              $where= 'menu_id';
              $this->help_model->delete_meal($where,$id);

          }
        
      }
     /* public function delete_all_menu()
      {
            $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
          
          $this->help_model->delete_menu($id);
         



      }*/
   
      public function delete_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $id = $this->input->post('id', TRUE);
          $where= 'combination_id';
          $this->help_model->delete_meal($where,$id);
      }
      public function previous_meal_plan()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $appointment_id   = $this->input->get('id', TRUE);
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          $data["results2"] = $this->help_model->get_meal();
          echo "<div class=\"container\" style=\"width: 900px;\">";
          echo "<h2 align=\"center\">Last Meal Plan</h2>";
          echo "<hr class=\"colorgraph\"></hr>";
          echo "<div id=\"meal_div0\">";
          foreach ($data["results2"] as $row2) {
              $meal_id          = $row2->id;
              $meal_name        = $row2->meal_name;
              $meal_code        = $row2->meal_code_name;
              $data["results3"] = $this->help_model->get_nutrition_plan($appointment_id);
              $data['numRows3'] = $this->help_model->getAffectedRows();
              $select_plan_id   = '';
              echo "<h4>" . $meal_name . "</h4>";
              echo "<div id=\"menu\" align=\"left\">";
              $data["results3"] = $this->help_model->get_nutrition_plan($appointment_id);
              $data['numRows3'] = $this->help_model->getAffectedRows();
              foreach ($data['results3'] as $row3) {
                  $select_plan_id = $row3->select_plan_id;
                  $data_id        = $row3->default_nutrition_id;
              }
              if ($select_plan_id == 1) {
                  $data["results5"] = $this->help_model->get_fel_default_foodgroup($meal_code, $data_id);
                  $numRows5         = $this->help_model->getAffectedRows();
              } else {
                  $data["results5"] = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
                  $numRows5         = $this->help_model->getAffectedRows();
              }
              if ($numRows5 == 0) {
                  echo "<br><span class=\"alert alert-danger\">" . "No foodgroups available" . "</span><br><br>";
              } else {
                  echo "<div class=\"col-md-3\">";
                  echo "<ul class=\"list-group\">";
                  foreach ($data['results5'] as $row5) {
                      $foodid = $row5->foodid;
                      if ($select_plan_id == 1) {
                          $data["results6"] = $this->help_model->get_total_default_meal($foodid, $meal_id, $data_id);
                      } else {
                          $data["results6"] = $this->help_model->get_total_meal($foodid, $meal_id, $appointment_id);
                      }
                      $exrem       = 0;
                      $total_value = 0;
                      foreach ($data['results6'] as $row6) {
                          $hh_val = $row6->hh_val;
                          $exrem += $row6->ex;
                      }
                      $totalex_rem = $row5->$meal_code - $exrem;
                      echo "<li class=\"list-group-item \">";
                      echo "<span class=\"badge\" >" . $totalex_rem . "</span><label >" . $row5->foodgroup . "</label></li>";
                      $total_value += $row5->$meal_code;
                  }
                  echo "</ul></div>";
              }
              if ($select_plan_id == 1) {
                  echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 400px;\">";
                  $data['results7'] = $this->help_model->get_default_menu($data_id, $meal_id);
                  foreach ($data['results7'] as $row7) {
                      $menu_id   = $row7->id;
                      $menu_name = $row7->menu_name;
                      echo "<div><i>" . $menu_name . "</i>";
                      $data['results8'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                      $numRows8         = $this->help_model->getAffectedRows();
                      $total_ex         = 0;
                      if ($numRows8 > 0) {
                          echo "<div class=\"table-responsive\"><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                          echo "<tr>
                                    <th>Food Group</th>
                                    <th>Food List</th>
                                    <th>Food Item</th>
                                    <th >Ex</th>
                                    <th colspan=\"2\">Qty(EP)</th>
                                    <th colspan=\"2\">HH Measure</th>
                                    
                                    </tr>";
                          foreach ($data['results8'] as $row8) {
                              $id        = $row8->combination_id;
                              $menu_id   = $row8->menu_id;
                              $meal_id   = $row8->meal_id;
                              $foodgroup = $row8->foodgroup_content;
                              $foodlist  = $row8->foodlist;
                              $fooditem  = $row8->fooditem;
                              $ex        = $row8->ex;
                              $qty_val   = $row8->qty_val;
                              $hh_val    = $row8->hh_val;
                              $hh_m      = $row8->hh_measure;
                              $total_ex += $ex;
                              if ($this->help_model->is_digits($ex)) {
                                  $ex = $row8->ex;
                              } else {
                                  $ex = $this->help_model->fraction($row8->ex);
                              }
                              if ($this->help_model->is_digits($hh_val)) {
                                  $hh_val = $row8->hh_val;
                              } else {
                                  $hh_val = $this->help_model->fraction($row8->hh_val);
                              }
                              echo "<tr>";
                              echo "<td>" . $foodgroup . "</td>";
                              echo "<td>" . $foodlist . "</td>";
                              echo "<td>" . $fooditem . "</td>";
                              echo "<td>" . $ex . "</td>";
                              echo "<td colspan=\"2\">" . $qty_val . "</td>";
                              echo "<td>" . $hh_val . "</td>";
                              echo "<td>" . $hh_m . "</td>";
                              echo "</tr>";
                          }
                          echo "</table></div>";
                      }
                      echo "</div>";
                  }
                  echo "</div>";
              } else {
                  echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 400px;\">";
                  echo "<div id=\"alert$meal_id\" tabindex=\"1\" ></div>";
                  echo "<br><br>";
                  $data['results7'] = $this->help_model->menu($meal_id, $appointment_id);
                  $numRows7         = $this->help_model->getAffectedRows();
                  if ($numRows7 > 0) {
                      foreach ($data['results7'] as $row7) {
                          $menu_id   = $row7->id;
                          $menu_name = $row7->menu_name;
                          echo "<div><a id=\"meal_plan\"  href=\"#\" class=\"aa\">" . "<i>" . $menu_name . "</i>" . "</a>";
                          $data['results8'] = $this->help_model->meal_plan($appointment_id, $menu_id, $meal_id);
                          $numRows8         = $this->help_model->getAffectedRows();
                          if ($numRows8 > 0) {
                              echo "<div class=\"table-responsive\" ><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                              $action = '';
                              echo "<tr>
        <th>Food Group</th>
        <th>Food List</th>
        <th>Food Item</th>
        <th >Ex</th>
        <th colspan=\"2\">Qty(EP)</th>
        <th colspan=\"2\">HH Measure</th>$action
        
        
        </tr>";
                              $total_ex = 0;
                              foreach ($data['results8'] as $row8) {
                                  $menu_id   = $row8->menu_id;
                                  $meal_id   = $row8->meal_id;
                                  $foodgroup = $row8->foodgroup_content;
                                  $foodlist  = $row8->foodlist;
                                  $fooditem  = $row8->fooditem;
                                  $ex        = $row8->ex;
                                  $qty_val   = $row8->qty_val;
                                  $hh_val    = $row8->hh_val;
                                  $hh_m      = $row8->hh_measure;
                                  $id        = $row8->combination_id;
                                  $total_ex += $ex;
                                  if ($this->help_model->is_digits($ex)) {
                                      $ex = $row8->ex;
                                  } else {
                                      $ex = $this->help_model->fraction($row8->ex);
                                  }
                                  if ($this->help_model->is_digits($hh_val)) {
                                      $hh_val = $row8->hh_val;
                                  } else {
                                      $hh_val = $this->help_model->fraction($row8->hh_val);
                                  }
                                  echo "<tr >";
                                  echo "<td>" . $foodgroup . "</td>";
                                  echo "<td>" . $foodlist . "</td>";
                                  echo "<td>" . $fooditem . "</td>";
                                  echo "<td>" . $ex . "</td>";
                                  echo "<td colspan=\"2\">" . $qty_val . "</td>";
                                  echo "<td>$hh_val</td>";
                                  echo "<td>$hh_m</td>";
                                  echo "";
                                  echo "</tr>";
                              }
                              echo "";
                              echo "</tr>";
                              echo "</table>";
                          } else {
                              echo "<div class=\"table-responsive\" ><table  width=\"850\" class=\"table table-condensed\" border=\"0\">";
                              echo "<tr ><td colspan=\"9\">" . "No food item available" . "</td></tr>";
                              echo "";
                          }
                          echo "</tr>";
                          echo "</table></div></div>";
                      }
                  } else {
                      echo "<div class=\"alert alert-warning btn-sm\">No meal plan available.</div>";
                  }
                  echo "</div>";
              }
              echo "</div>";
          }
          echo "</div>";
          $this->load->view('previous_meal_plan');
      }
      public function update_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_menu();
          echo "success";
      }
      public function edit_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->get('id', TRUE);
          $data['menu_id'] = $this->help_model->get_menu_id($id);
          $this->load->view('edit_menu', $data);
      }
      public function edit_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $meal_plan_js           = base_url("assets/js/meal_plan.js");
          echo "<script type=\"text/javascript\" src=\"$meal_plan_js\"></script>";
          $rowid                  = $this->input->get('id', TRUE);
          $data['rowid']          = $this->input->get('id', TRUE);
          $data['client_id']      = $this->input->get('client_id', TRUE);
          $appointment_id         = $this->input->get('appointment_id', TRUE);
          $data['appointment_id'] = $this->input->get('appointment_id', TRUE);
          $meal_code              = $this->input->get('meal_code', TRUE);
          $data['meal_code']      = $this->input->get('meal_code', TRUE);
          $data['meal_id']        = $this->input->get('meal_id', TRUE);
          $data['menu_id']        = $this->input->get('menu_id', TRUE);
          $menu_id                = $this->input->get('menu_id', TRUE);
          $data['results']        = $this->help_model->get_foodmeal($rowid);
          foreach ($data['results'] as $row) {
              $foodgroup_id= $row->foodgroup_id;
              $foodgroup_content = $row->foodgroup_content;
             
          }
          $data['groups']   = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
          $id = $foodgroup_id;
          $data['groups1'] = $this->help_model->get_fel_foodlists($id);

          $data['fg_array'] = explode(",", $foodgroup_content);
          $fg_array=  explode(",", $foodgroup_content);
          
         /* foreach ($fg_array as $arr_fg) {
              $data['results1'] = $this->help_model->get_foodgroup_content($arr_fg);
             
          }*/
          /*echo "<div class=\"col-md-12\">";
          echo "<hr></hr>";
          echo "<table class=\"responsive table table-bordered\" >";
          echo "<tr>
            <th>Food Group</th>
            <th>Food List</th>
            <th>Food Item</th>
            <th>Exchange</th>
            <th>Qty(EP)</th>
            <th colspan=\"2\">HH Measure</th>
            <th colspan=\"3\" align=\"center\">Action</th>
            
        </tr>";
          $data['groups'] = $this->help_model->get_fel_foodgroup($meal_code, $appointment_id);
          echo "<tr><td>";
          echo "<select name=\"foodgroup1\" id=\"foodgroup0$menu_id\" class=\"foodgroup1 form-control input-lg\"data-menu_id=\"$menu_id\" >";
          echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
          foreach ($data['groups'] as $row1) {
              $foodid    = $row1->foodid;
              $foodgroup = $row1->foodgroup;
              if ($foodid == $foodgroup_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodid\" " . $selectCurrent . "  >$foodgroup</option>";
          }
          echo "<option value=\"14\" >Combination Foods</option> ";
          echo " </select>";
          echo "</td>";
          echo "<td > ";
          $id              = $foodgroup_id;
          $data['groups1'] = $this->help_model->get_fel_foodlists($id);
          echo "<select name=\"foodlist1\" id=\"foodlist0$menu_id\" class=\" form-control foodlist1 input-lg\" data-menu_id=\"$menu_id\"  >";
          echo "<option value=\"0\">--Food Lists--</option>    ";
          foreach ($data['groups1'] as $row2) {
              $foodlistid = $row2->id;
              $foodlist   = $row2->foodlist;
              if ($foodlistid == $foodlist_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodlistid\" " . $selectCurrent . " >$foodlist</option>";
          }
          echo "</select>";
          echo "</td>";
          echo "<td>";
          echo "<input type=\"text\" id=\"fooditem0$menu_id\" name=\"fooditem1\" class=\"fooditem1 form-control  input-lg meal_plan_exchange1\" placeholder=\"Select Food Item\" value=\"$fooditem\" data-menu_id=\"$menu_id\"  />
         
          <input type=\"hidden\" id=\"fooditem_id0$menu_id\" name=\"fooditem_id1\" class=\"form-control \" value=\"$fooditem_id\"/>";
          echo "</td>";
          echo "<td>";
          echo "<input type=\"text\" class=\"form-control meal_plan_exchange1 input-lg\"  placeholder=\"Ex\" id=\"ex0$menu_id\" name=\"ex1\" size=\"2\"   value=\"$ex\"   data-menu_id=\"$menu_id\" />
                <input type=\"hidden\" class=\"form-control\"  placeholder=\"Constant Exchange\" id=\"const_ex0$menu_id\" name=\"const_ex1\" size=\"2\" value=\"$const_ex\"  />
                
                    <input type=\"hidden\" class=\"form-control\"  id=\"foodgroup_content0$menu_id\" name=\"foodgroup_content1\" size=\"2\" value=\"$foodgroup_content\"  />";
          echo "</td>";
          echo "<td >";
          echo "<span id=\"qty_val_label0$menu_id\" > $qty_val
        </span>";
          echo "<input type=\"hidden\" id=\"qty_val0$menu_id\" name=\"qty_val1\" class=\"form-control\"  size=\"2\" value=\"$qty_val\" />
                <input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty0$menu_id\" name=\"qty1\" size=\"5\"  value=\"$qty_val\"  />";
          echo "</td>";


          echo "<td>";
          echo "<span id=\"hh_foodgroup0$menu_id\">";
          $fg_array = explode(",", $foodgroup_content);
          foreach ($fg_array as $arr_fg) {
              $data['results'] = $this->help_model->get_foodgroup_content($arr_fg);
              foreach ($data['results'] as $fg_row) {
                  echo $fg_row->foodgroup . "<br>";
              }
          }
          echo "</span></td>";
          echo "<td>";
          echo "<span id=\"hh_val_label0$menu_id\" >";
          $hh_val_comb_array = explode(",", $hh_val);
          $arr_hh_val        = 0;
          foreach ($hh_val_comb_array as $arr_hh_val) {
              echo $this->help_model->fraction($arr_hh_val) . "<br>";
          }
          echo "</span> <span id=\"hh_measure0$menu_id\">$hh_m</span>";
          echo "<input type=\"hidden\" class=\"form-control input-sm \"  placeholder=\"HH Value\" id=\"hh_val0$menu_id\" name=\"hh_val1\" size=\"1\"    />";
          echo "<td colspan=\"2\">";
          echo "<button  id=\"edit_meal2\" class=\"btn btn-primary btn-lg\" data-id1=\" $rowid\"  data-client_id1=\"$client_id\" data-appointment_id1=\"$appointment_id\" data-meal1=\"$meal_code\" data-meal_id1=\"$meal_id\" data-menu_id1=\"$menu_id\"> Update</button>";
          echo "</td>";
          echo "</tr>";
          echo "</table>";
          echo "<hr></hr>";
          echo "</div>";*/
          $this->load->view('edit_meal',$data);
      }


      public function get_arr_fg()
      {
        $foodgroup_content   = $this->input->post('foodgroup_content', TRUE);
      
        $fg_array = explode(",", $foodgroup_content);
         
          
          foreach ($fg_array as $arr_fg) {
              $data['results'] = $this->help_model->get_foodgroup_content($arr_fg);
               foreach ($data['results'] as $fg_row) {
                  echo $fg_row->foodgroup . "<br>";
              }
             
          }




      }
     
      public function update_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                = $this->input->post('id1', TRUE);
          $client_id         = $this->input->post('client_id1', TRUE);
          $appointment_id    = $this->input->post('appointment_id1', TRUE);
          $menu_id           = $this->input->post('menu_id1', TRUE);
          $meal_id           = $this->input->post('meal_id1', TRUE);
          $foodgroup         = $this->input->post('foodgroup1', TRUE);
          $foodgroup_content = $this->input->post('foodgroup_content1', TRUE);
          $foodlist          = $this->input->post('foodlist1', TRUE);
          $fooditem_id       = $this->input->post('fooditem_id1', TRUE);
          $ex                = $this->input->post('ex1', TRUE);
          $qty_val           = $this->input->post('qty_val1', TRUE);
          $hh_val            = $this->input->post('hh_val1', TRUE);
          $meal              = $this->input->post('meal1', TRUE);
          $by                = $this->session->id;
          $data['results0']  = $this->help_model->get_foodmeal($id);
          foreach ($data['results0'] as $row0) {
              $foodgroup_id1= $row0->foodgroup_id;
              $foodlist_id1       = $row0->foodlist_id;
              $fooditem_id1      = $row0->fooditem_id;
            //  $foodgroup_content = $row0->foodgroup_content;
              $ex1               = $row0->ex;
              $qty_val1           = $row0->qty_val;
              $hh_val1            = $row0->hh_val;
              $fooditem1          = $row0->fooditem;
              $const_ex1          = $row0->const_ex;
              $hh_m1            = $row0->hh_measure;
          }
    
          if ($foodgroup != $foodgroup_id1 || $foodlist != $foodlist_id1 || $fooditem_id != $fooditem_id1 || $ex != $ex1) {
              $data['results'] = $this->help_model->get_meal_status();
              foreach ($data['results'] as $row) {
                  $fg_id            = $row->Auto_increment;
                  $fg_array         = explode(",", $foodgroup_content);
                  $total_meal_item  = 0;
                  $total_meal_ex    = 0;
                  $total_foodfel_ex = 0;
                  $total_item       = 0;
                  $item1            = 0;
                  $item             = 0;
              }
              $aaa_fg[] = 0;
              foreach ($fg_array as $item) {
                  $aaa_fg[] .= $item;
                  $data['results1'] = $this->help_model->check_fel_meal($item, $appointment_id);
                  $aa               = 0;
                  $aaa[]            = 0;
                  foreach ($data['results1'] as $row1) {
                      $aa += $row1->$meal;
                      $aaa[] = $row1->$meal;
                  }


                  $data['results2'] = $this->help_model->check_meal_plan_ex($meal_id, $appointment_id, $item);
                  $total            = 0;
                  $total_ex         = 0;
                  foreach ($data['results2'] as $row2) {
                      $total += $row2->ex;
                  }
              }

              $total_ex = $total + $ex;

              if ($total_ex > $aa) {
                  echo "error1";
              } else {
                  $fooditem_array = explode(",", $fooditem_id);
                  $fg_array       = explode(",", $foodgroup_content);
                  $hh_val_array   = explode(",", $hh_val);
                  $qty_val_array  = explode(",", $qty_val);
                  $item           = 0;
                  $item1          = 0;
                  $item2          = 0;
                  $item3          = 0;
                  foreach (array_keys($fg_array) as $key) {
                      $item  = $fg_array[$key];
                      $item1 = $hh_val_array[$key];
                      $item2 = $qty_val_array[$key];
                      $item3 = $fooditem_array[$key];
                      $where = 'combination_id';
                      $this->help_model->delete_meal($where,$id);
                      $this->db->trans_start();
                      $data = array(
                          'client_id' => $client_id,
                          'appointment_id' => $appointment_id,
                          'menu_id' => $menu_id,
                          'meal_id' => $meal_id,
                          'foodgroup_id' => $foodgroup,
                          'foodlist_id' => $foodlist,
                          'fooditem_id' => $item3,
                          'foodgroup_content' => $item,
                          'ex' => $ex,
                          'qty_val' => $item2,
                          'hh_val' => $item1,
                          'combination_id' => $fg_id,
                          'submitted_by' => $by,
                          'submitted_on' => date('Y-m-d H:i:s')
                      );
                      $this->db->insert('meal_plan_db', $data);
                      $this->db->trans_complete();
                      if ($this->db->trans_status() === FALSE) {
                          return false;
                      } else {
                        echo "success";
                      }
                  }
                 
              }
          } else {
              echo "success";
          }
      }
      public function meal_plan_print($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results1"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $tbl              = '';
          $data["results2"] = $this->help_model->get_meal();
          foreach ($data["results2"] as $row2) {
              $meal_id   = $row2->id;
              $meal_name = $row2->meal_name;
              $tbl .= '<tr nobr="true"><td colspan="5"><h3>' . $meal_name . '</h3></td>
    </tr>';
              $data["results3"] = $this->help_model->get_nutrition_plan($appointment_id);
              foreach ($data['results3'] as $row3) {
                  $select_plan_id = $row3->select_plan_id;
                  $data_id        = $row3->default_nutrition_id;
              }
              if ($select_plan_id == 1) {
                  $data['results4'] = $this->help_model->get_default_menu($data_id, $meal_id);
                  $numRows4         = $this->help_model->getAffectedRows();
              } else {
                  $data['results4'] = $this->help_model->menu($meal_id, $appointment_id);
                  $numRows4         = $this->help_model->getAffectedRows();
              }
              if ($numRows4 > 0) {
                  foreach ($data['results4'] as $row4) {
                      $menu_id   = $row4->id;
                      $menu_name = $row4->menu_name;
                      if ($select_plan_id == 1) {
                          $data['results5'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                          $numRows5         = $this->help_model->getAffectedRows();
                      } else {
                          $data['results5'] = $this->help_model->meal_plan($appointment_id, $menu_id, $meal_id);
                          $numRows5         = $this->help_model->getAffectedRows();
                      }
                      if ($numRows5 > 0) {
                          foreach ($data['results5'] as $row5) {
                              $menu_id   = $row5->menu_id;
                              $meal_id   = $row5->meal_id;
                              $foodgroup = $row5->foodgroup_content;
                              $fooditem  = $row5->fooditem;
                              $ex        = $row5->ex;
                              $hh_val    = $row5->hh_val;
                              $hh_m      = $row5->hh_measure;
                              if ($this->help_model->is_digits($ex)) {
                                  $ex = $ex . " exchange";
                              } else {
                                  $ex = $this->help_model->fraction($ex) . " exchange";
                              }
                              if ($this->help_model->is_digits($hh_val)) {
                                  $hh_val = $hh_val;
                              } else {
                                  $hh_val = $this->help_model->fraction($hh_val);
                              }
                              $tbl .= '<tr nobr= "true"><td  style="margin-left:50px;">' . $foodgroup . '</td><td  style="text-indent:10px;">' . $fooditem . '</td><td  style="text-indent:10px;">' . $ex . '</td><td  style="margin-left:50px;">' . $hh_val . '</td><td >' . $hh_m . '</td>
</tr>';
                          }
                      } else {
                          $tbl .= '<tr nobr="true"><td colspan="5" style="text-align:center">' . 'No meals available' . '</td></tr>';
                      }
                  }
              } else {
                  $tbl .= '<tr nobr="true"><td colspan="5" style="text-align:center">' . 'No meals available' . '</td></tr>';
              }
          }
          $html = <<<EOD

    <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>

    </tr>
    
    </table><br><br>
<table border="0" cellpadding="0"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>


    <td>
<strong>Date of Counseling:</strong> $approved_date<br><strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>

</table><br><br>

<table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >MEAL PLAN </h3></td>

    </tr>
    
    </table><br><br>
<table border="1" cellpadding="5"  >
 $tbl

</table>

     

   

EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('meal_plan.pdf', 'I');
      }
      public function fel_print($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results1"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $data["results2"] = $this->help_model->get_nutrition_plan($appointment_id);
          foreach ($data['results2'] as $row2) {
              $cal                  = $row2->cal;
              $cho                  = $row2->cho;
              $protein              = $row2->protein;
              $fat                  = $row2->fat;
              $cho_custom           = $row2->cho_custom;
              $pro_custom           = $row2->pro_custom;
              $fat_custom           = $row2->fat_custom;
              $select_plan_id       = $row2->select_plan_id;
              $default_nutrition_id = $row2->default_nutrition_id;
          }
          $tbl = '';
          if ($select_plan_id == 1) {
              $data["results3"] = $this->help_model->get_foodgroups_th();
              foreach ($data['results3'] as $row3) {
                  $foodgroup_th_id = $row3->id;
                  $foodgroup_th    = $row3->foodgroup_th;
                  $tbl .= "<tr nobr= \"true\"><th ><strong>" . $foodgroup_th . "</strong></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                  $data["results4"] = $this->help_model->get_default_fel_db($default_nutrition_id, $foodgroup_th_id);
                  foreach ($data['results4'] as $row4) {
                      $id        = $row4->foodid;
                      $row_id    = $row4->id;
                      $foodgroup = $row4->foodgroup;
                      $ex        = $row4->default_ex;
                      $fel_cho   = $row4->default_cho;
                      $fel_pro   = $row4->default_pro;
                      $fel_fat   = $row4->default_fat;
                      $fel_cal   = $row4->default_cal;
                      $bfast     = $row4->bfast;
                      $am_snack  = $row4->am_snack;
                      $lunch     = $row4->lunch;
                      $pm_snack  = $row4->pm_snack;
                      $dinner    = $row4->dinner;
                      $mn_snack  = $row4->mn_snack;
                      $tbl .= "<tr nobr= \"true\"><td>&nbsp;&nbsp;&nbsp;$foodgroup</td>        
        <td>$ex</td><td>$fel_cho</td><td>$fel_pro</td><td>$fel_fat</td><td>$fel_cal</td><td>$bfast</td><td>$am_snack</td><td>$lunch</td><td>$pm_snack</td><td>$dinner</td><td>$mn_snack</td>
        </tr>";
                  }
              }
          } else {
              $data["results3"] = $this->help_model->get_foodgroups_th();
              foreach ($data['results3'] as $row3) {
                  $foodgroup_th_id = $row3->id;
                  $foodgroup_th    = $row3->foodgroup_th;
                  $tbl .= "<tr nobr= \"true\"><th ><strong>" . $foodgroup_th . "</strong></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                  $data["results4"] = $this->help_model->get_fel_db($appointment_id, $foodgroup_th_id);
                  foreach ($data['results4'] as $row4) {
                      $id        = $row4->foodid;
                      $row_id    = $row4->id;
                      $foodgroup = $row4->foodgroup;
                      $ex        = $row4->ex;
                      $fel_cho   = $row4->fel_cho;
                      $fel_pro   = $row4->fel_pro;
                      $fel_fat   = $row4->fel_fat;
                      $fel_cal   = $row4->fel_cal;
                      $bfast     = $row4->bfast;
                      $am_snack  = $row4->am_snack;
                      $lunch     = $row4->lunch;
                      $pm_snack  = $row4->pm_snack;
                      $dinner    = $row4->dinner;
                      $mn_snack  = $row4->mn_snack;
                      $tbl .= "<tr nobr= \"true\"><td>&nbsp;&nbsp;&nbsp;$foodgroup</td>        
        <td>$ex</td><td>$fel_cho</td><td>$fel_pro</td><td>$fel_fat</td><td>$fel_cal</td><td>$bfast</td><td>$am_snack</td><td>$lunch</td><td>$pm_snack</td><td>$dinner</td><td>$mn_snack</td>
        </tr>";
                  }
              }
          }
          $html = <<<EOD

    <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>

    </tr>
    
    </table><br><br>
<table border="0" cellpadding="0"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>


    <td>
<strong>Date of Counseling:</strong> $approved_date<br><strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>

</table><br><br>



<table border="1" cellpadding="3" >
    <tr>
<td bgcolor="#fbfaf9"><h3>FOOD EXCHANGE LIST</h3></td>

    </tr>
    
    </table><br><br>



<table border="1" cellpadding="3"  >
 <tr>

<th align="center" ><strong>Food Group</strong></th>
<th align="center"><strong>Exchange</strong></th>
<th align="center"><strong>CHO</strong></th>
<th align="center"><strong>Protein</strong></th>
<th align="center"><strong>Fat</strong></th>
<th align="center"><strong>Calorie</strong></th>
<th align="center"><strong>Breakfast</strong></th>
<th align="center"><strong>Am Snack</strong></th>
<th align="center"><strong>Lunch</strong></th>
<th align="center"><strong>PM Snack</strong></th>
<th align="center"><strong>Dinner</strong></th>
<th align="center"><strong>MN Snack</strong></th>
</tr>

$tbl

</table>

     


EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('fel.pdf', 'I');
      }
      public function anthropometry_print($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results1"] as $row) {
              $appointment_id = $row->id;
              $client_id      = $row->client_id;
              $name           = $row->client_lname . ", " . $row->client_fname . " " . $row->client_mname;
              $gender         = $row->gender;
              $age            = $row->age_year;
              $address        = $row->address;
              $approved_date  = date("F d, Y", strtotime($row->approved_date));
              $assigned_rnd   = $row->rnd_lname . ", " . $row->rnd_fname . " " . $row->rnd_mname;
          }
          $data["results2"] = $this->help_model->get_anthropometry($appointment_id);
          $tbl              = '';
          $tbl1             = '';
          $tbl2             = '';
          foreach ($data["results2"] as $row2) {
              $weight         = $row2->weight;
              $weight_unit    = $row2->weight_unit;
              $height         = $row2->height;
              $height_unit    = $row2->height_unit;
              $bmi            = $row2->bmi;
              $bmi_class      = $row2->bmi_classification;
              $dbw            = $row2->dbw;
              $dbw_unit       = $row2->dbw_unit;
              $lwr_lmt        = $row2->lwr_lmt;
              $uppr_lmt       = $row2->uppr_lmt;
              $lmt_unit       = $row2->lmt_unit;
              $waist_c        = $row2->waist_c;
              $waist_unit     = $row2->waist_unit;
              $risk_indicator = $row2->risk_indicator;
              $hip_c          = $row2->hip_c;
              $hip_unit       = $row2->hip_unit;
              $whipr          = $row2->whipr;
              $whipr_class    = $row2->whipr_classification;
              $whtr           = $row2->whtr;
              $whtr_class     = $row2->whtr_classification;
              $submitted_on   = $row2->submitted_on;
          }
          $tbl .= '<table border="1"  cellpadding="3">
<tr>
        <td colspan="3" align="center"><strong>BMI TABLE (WHO)</strong></td>
    </tr>
    <tr nobr="true">
        <td align="center">< 16</td>
        <td align="center">Severe Thinness</td>
        <td>In adults, being underweight may lead to wasting of tissues, poor resistance to infections and diseases, nervousness, low vitality and sterility. </td>
    </tr>
        <tr  nobr="true">
        <td align="center">16.00 - 16.99</td>
        <td align="center">Moderate Thinness</td>
        <td>In adults, underweight may lead to wasting of tissues, poor resistance to infections and diseases, nervousness, low vitality and sterility. </td>
    </tr>
    <tr  nobr="true">
        <td align="center">17.00 - 18.49</td>
        <td align="center">Mild Thinness</td>
        <td>In adults, underweight may lead to wasting of tissues, poor resistance to infections and diseases, nervousness, low vitality and sterility. </td>
    </tr>
    <tr  nobr="true">
        <td align="center"> 18.50 - 24.99</td>
        <td align="center">Normal</td>
        <td>Maintain normal body weight through proper diet and moderate physical activity. </td>
    </tr>
    <tr  nobr="true">
        <td align="center">25.00 - 29.99</td>
        <td align="center">Overweight</td>
        <td>The risk of acquiring noncommunicable diseases like heart diseases, hypertension, diabetes,  osteoarthritis and some types of cancers increases with raised BMI.
 </td>
    </tr>    
    <tr  nobr="true">
        <td align="center">30.00 - 34.99</td>
        <td align="center">Obese Class I</td>
        <td>The risk of acquiring noncommunicable diseases like heart diseases, hypertension, diabetes,  osteoarthritis and some types of cancers increases with raised BMI.
 </td>
    </tr>
        <tr  nobr="true">
        <td align="center">35.00 - 39.99</td>
        <td align="center">Obese Class II</td>
        <td>The risk of acquiring noncommunicable diseases like heart diseases, hypertension, diabetes,  osteoarthritis and some types of cancers increases with raised BMI.
 </td>
    </tr>    
    <tr  nobr="true">
        <td align="center">>= 40.00</td>
        <td align="center">Obese Class III</td>
        <td>The risk of acquiring noncommunicable diseases like heart diseases, hypertension, diabetes,  osteoarthritis and some types of cancers increases with raised BMI.
 </td>
    </tr>
</table><br>';
          $tbl1 .= '
<table border="1"cellpadding="3">
<tr  nobr="true">
        <td align="center" colspan="3"><strong>Waist Circumference Table</strong></td>
    </tr>
    <tr  nobr="true">
        <td align="center">Male risk classification</td>
        <td align="center"> < 94</td>
        <td >Low- Low risk of developing cardiovascular diseases and type-2 diabetes. </td>
    </tr>
    <tr  nobr="true">
    <td></td>
        <td align="center"> >= 94</td>
        <td>High- High risk of developing cardiovascular diseases and type-2 diabetes. </td>
    </tr>
    <tr  nobr="true">
        <td align="center">Female risk classification</td>
        <td align="center"> < 80</td>
        <td >Low- Low risk of developing cardiovascular diseases and type-2 diabetes. </td>
    </tr>
    <tr  nobr="true">
    <td></td>
        <td align="center"> >= 80</td>
        <td >High- High risk of developing cardiovascular diseases and type-2 diabetes. </td>
    </tr>
</table>
';
          $tbl2 = '<table border="1"cellpadding="3">
    <tr nobr="true">
        <td align="center" colspan="3"><strong>Waist Height Table</strong></td>
    </tr>
    <tr nobr="true">
        <td align="center"> =< 0.5</td>
        <td align="center">Low Risk</td>
        <td>May indicate lower risk of developing obesity-related diseases like heart diseases, hypertension, diabetes,  and some types of cancers.</td>
    </tr>
    <tr nobr="true">
        <td align="center"> >0.5</td>
        <td align="center">At Risk to Noncommunicable diseases (NCDs)</td>
        <td >May indicate risk of developing obesity-related diseases like heart diseases, hypertension, diabetes,  and some types of cancers.</td>
    </tr>
</table>';
          $html = <<<EOD
   <table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >CLIENT INFORMATION</h3></td>
    </tr>
    </table><br><br>
<table border="0" cellpadding="3"  >
    <tr>
    <td>
<strong>Name:</strong>  $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Gender:</strong>  $gender
</td>
    <td><strong>Date of Counseling:</strong> $approved_date<br><strong>Assigned RND:</strong> $assigned_rnd
</td>
</tr>
</table><br><br>
<table border="1" cellpadding="3" >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >ANTHROPOMETRY RESULT</h3></td>
    </tr>
    </table><br><br>
<table border="0" cellpadding="2" >
    <tr>
<td><strong>Weight:</strong> $weight $weight_unit</td> 
</tr>
<tr>
<td><strong>Height:</strong> $height $height_unit  </td>
</tr>
<tr>
<td><strong>Body Mass Index(BMI)</strong> is a way of interpreting one's nutritional status based on weight and height. It is only one of several assessments used to determine health risks related to being underweight, overweight, or obese.  </td>
</tr>
<tr nobr="true">
<td><strong>BMI:</strong> $bmi  </td>    
</tr>
<tr nobr="true">
<td><strong>Body Mass Index Classification:</strong> $bmi_class </td>
</tr>
<tr  nobr="true">
<td>$tbl</td>
</tr>
<tr nobr="true">
<td><strong>Desirable Body Weight (DBW)</strong>
is a weight that is believed to be maximally healthful for a person, based chiefly on height. Maintaining a healthy body weight can significantly decrease the risks of diseases and nutritional conditions, including heart disease, diabetes and hypertension. A healthy body weight has also been shown to improve overall quality of life.<br>
<strong>DBW</strong> is <strong>$dbw $dbw_unit</strong>. Keep weight within this range <strong>$lwr_lmt - $uppr_lmt $lmt_unit.</strong></td>
</tr>
<tr  nobr="true">
<td><strong>Waist Circumference</strong> should be made at the approximate midpoint between the lower   of the last palpable rib and the topof the iliac crest. Waist circumference is a reliable indicator of obesity and increased risk of lifestyle diseases. Waist-to-hip ratio is also being used for the same purpose, but research has shown that usin only the waist measurement gives you the same level of information. Waist Circumference is <strong>$waist_c $waist_unit.</strong> Waist Circumference may inidicate <strong> $risk_indicator. </strong> </td>
</tr>
<tr  nobr="true">
    <td>$tbl1</td>
</tr>
<tr nobr="true">
<td><strong>Hip Circumference</strong> should be taken around the widest portion of the buttocks. In addition to waist measurement, hip is measured to derive a Waist-Hip Ratio which is a useful tool in assessing risk of having Non-communicable diseases. Hip Circumference is <strong>$hip_c $hip_unit.</strong> Waist Hip Ratio is<strong> $whipr </strong> which may indicate <strong>$whipr_class</strong> risk of developing obesity-related diseases. </td>
</tr>
<tr nobr="true">
<td><strong>Waist Height</strong> measurement is a new proxy measure for abdominal obesity.  Keeping one's waist circumference to less than half of one's height can lower risk of developing obesity-related health diseases. <strong>Waist Height Ratio</strong>  is<strong> $whtr </strong> which may indicate <strong> $whtr_class.</strong> </td>
</tr>
<tr nobr="true">
<td>
$tbl2
</td>
</tr>
</table>
EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('anthropometry.pdf', 'I');
      }
      public function save_recommendation()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_recommendation();
          echo "success";
      }
      public function edit_recommendation()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                        = $this->input->get('id', TRUE);
          $data['id']                = $this->input->get('id', TRUE);
          $data['recommendation_id'] = $this->help_model->get_recommendation_id($id);
          $data['numRows']           = $this->help_model->getAffectedRows();
          $this->load->view('edit_recommendation', $data);
      }
      public function update_recommendation()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_recommendation();
          echo "success";
      }

      public function delete_recommendation()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
         
          //$this->help_model->delete_menu($id);
          //$this->help_model->delete_meal($id);
         
          $this->help_model->delete_recommendation($id);
        
      }


      public function summary_print($appointment_id)
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor('NCS Admin');
          $pdf->SetTitle('Nutrition Counseling');
          $pdf->SetSubject('NCS Print');
          $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
          $pdf->setHeaderFont(Array(
              PDF_FONT_NAME_MAIN,
              '',
              PDF_FONT_SIZE_MAIN
          ));
          $pdf->setFooterFont(Array(
              PDF_FONT_NAME_DATA,
              '',
              PDF_FONT_SIZE_DATA
          ));
          $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
          if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
              require_once(dirname(__FILE__) . '/lang/eng.php');
              $pdf->setLanguageArray($l);
          }
          $pdf->setFontSubsetting(true);
          $pdf->SetFont('dejavusans', '', 8, '', true);
          $pdf->AddPage('L');
          $data["results1"] = $this->help_model->get_appointment($appointment_id);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          foreach ($data["results1"] as $row1) {
              $appointment_id = $row1->id;
              $client_id      = $row1->client_id;
              $name           = $row1->client_lname . ", " . $row1->client_fname . " " . $row1->client_mname;
              $gender         = $row1->gender;
              $age            = $row1->age_year;
              $address        = $row1->address;
              $approved_date  = date("F d, Y", strtotime($row1->approved_date));
              $assigned_rnd   = $row1->rnd_lname . ", " . $row1->rnd_fname . " " . $row1->rnd_mname;
          }
          $data["results2"] = $this->help_model->get_anthrop_nutrition_plan($appointment_id);
          $numRows2         = $this->help_model->getAffectedRows();
          $tbl              = '';
          if ($numRows2) {
              foreach ($data["results2"] as $row2) {
                  $weight         = $row2->weight;
                  $weight_unit    = $row2->weight_unit;
                  $height         = $row2->height;
                  $height_unit    = $row2->height_unit;
                  $bmi            = $row2->bmi;
                  $bmi_class      = $row2->bmi_classification;
                  $dbw            = $row2->dbw;
                  $dbw_unit       = $row2->dbw_unit;
                  $lwr_lmt        = $row2->lwr_lmt;
                  $uppr_lmt       = $row2->uppr_lmt;
                  $lmt_unit       = $row2->lmt_unit;
                  $wc             = $row2->waist_c;
                  $wc_unit        = $row2->waist_unit;
                  $risk_indicator = $row2->risk_indicator;
                  $hc             = $row2->hip_c;
                  $hc_unit        = $row2->hip_unit;
                  $whipr          = $row2->whipr;
                  $whipr_class    = $row2->whipr_classification;
                  $whtr           = $row2->whtr;
                  $whtr_class     = $row2->whtr_classification;
                  $cal            = $row2->cal;
                  $cho            = $row2->cho;
                  $protein        = $row2->protein;
                  $fat            = $row2->fat;
              }
          } else {
              $weight         = 'none';
              $weight_unit    = '';
              $height         = 'none';
              $height_unit    = '';
              $bmi            = 'none';
              $bmi_class      = 'none';
              $dbw            = 'none';
              $dbw_unit       = '';
              $lwr_lmt        = 'none';
              $uppr_lmt       = 'none';
              $lmt_unit       = '';
              $wc             = 'none';
              $wc_unit        = '';
              $risk_indicator = 'none';
              $hc             = 'none';
              $hc_unit        = '';
              $whipr          = 'none';
              $whipr_class    = 'none';
              $whtr           = 'none';
              $whtr_class     = 'none';
              $cal            = '';
              $cho            = '';
              $protein        = '';
              $fat            = '';
          }
          $data["results3"] = $this->help_model->get_biochemical_appointment($appointment_id);
          $numRows3         = $this->help_model->getAffectedRows();
          $tbl1             = '';
          if ($numRows3 > 0) {
              foreach ($data["results3"] as $row3) {
                  $biochem_test        = $row3->biochem_test;
                  $biochem_result      = $row3->biochem_result;
                  $n_values            = $row3->n_values;
                  $biochem_result_date = $row3->biochem_result_date;
                  $biochem_remarks     = $row3->biochem_remarks;
                  $tbl1 .= '<tr nobr="true">
    <td align="center">' . $biochem_test . '</td>
    <td align="center">' . $biochem_result . '</td>
    <td align="center">' . $n_values . '</td>
    <td align="center">' . date("d M Y", strtotime($biochem_result_date)) . '</td>
    <td align="center">' . $biochem_remarks . '</td>
    
    </tr>';
              }
          } else {
              $tbl1 .= '<tr nobr= "true">
    <td colspan="5" align="center">No Biochemical Result</td>
    
    </tr>';
          }
          $data["results4"] = $this->help_model->get_clinical_appointment($appointment_id);
          $numRows4         = $this->help_model->getAffectedRows();
          $tbl2             = '';
          if ($numRows4 > 0) {
              foreach ($data["results4"] as $row4) {
                  $clinical_param   = $row4->clinical_parameter;
                  $obsrv            = $row4->observation;
                  $clinical_remarks = $row4->clinical_remarks;
                  $tbl2 .= '<tr nobr="true">
    <td >' . $clinical_param . '</td>
    
    <td align="center">' . $obsrv . '</td>

    <td align="center">' . $clinical_remarks . '</td>
    </tr>';
              }
          } else {
              $tbl2 .= '<tr nobr= "true">
    <td colspan="4" align="center">No Clinical Result</td>
    
    </tr>';
          }
          $data["results5"] = $this->help_model->get_diagnosis_appointment($appointment_id);
          $numRows5         = $this->help_model->getAffectedRows();
          $tbl3             = '';
          if ($numRows5 > 0) {
              foreach ($data["results5"] as $row5) {
                  $diagnosis         = $row5->diagnosis;
                  $etiology          = $row5->etiology;
                  $ss_diagnosis      = $row5->ss_diagnosis;
                  $diagnosis_remarks = $row5->diagnosis_remarks;
                  $tbl3 .= '<tr nobr= "true">
    <td align="center">' . $diagnosis . '</td>
    <td align="center">' . $etiology . '</td>
    <td align="center">' . $ss_diagnosis . '</td>
    <td align="center">' . $diagnosis_remarks . '</td>
    </tr>';
              }
          } else {
              $tbl3 .= '<tr nobr= "true">
    <td colspan="4" align="center">No Diagnosis Result</td>
    
    </tr>';
          }
          $tbl4             = '';
          $data["results6"] = $this->help_model->get_meal();
          $data["results7"] = $this->help_model->get_nutrition_plan($appointment_id);
          $numRows7         = $this->help_model->getAffectedRows();
          if ($numRows7 > 0) {
              foreach ($data["results6"] as $row6) {
                  $meal_id   = $row6->id;
                  $meal_name = $row6->meal_name;
                  $tbl4 .= '<tr nobr="true"><td colspan="5"><h3>' . $meal_name . '</h3></td>
    </tr>';
                  foreach ($data['results7'] as $row7) {
                      $select_plan_id = $row7->select_plan_id;
                      $data_id        = $row7->default_nutrition_id;
                  }
                  if ($select_plan_id == 1) {
                      $data['results8'] = $this->help_model->get_default_menu($data_id, $meal_id);
                      $numRows4         = $this->help_model->getAffectedRows();
                  } else {
                      $data['results8'] = $this->help_model->menu($meal_id, $appointment_id);
                      $numRows4         = $this->help_model->getAffectedRows();
                  }
                  if ($numRows4 > 0) {
                      foreach ($data['results8'] as $row8) {
                          $menu_id   = $row8->id;
                          $menu_name = $row8->menu_name;
                          if ($select_plan_id == 1) {
                              $data['results9'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                              $numRows5         = $this->help_model->getAffectedRows();
                          } else {
                              $data['results9'] = $this->help_model->meal_plan($appointment_id, $menu_id, $meal_id);
                              $numRows5         = $this->help_model->getAffectedRows();
                          }
                          if ($numRows5 > 0) {
                              foreach ($data['results9'] as $row9) {
                                  $menu_id   = $row9->menu_id;
                                  $meal_id   = $row9->meal_id;
                                  $foodgroup = $row9->foodgroup_content;
                                  $fooditem  = $row9->fooditem;
                                  $ex        = $row9->ex;
                                  $hh_val    = $row9->hh_val;
                                  $hh_m      = $row9->hh_measure;
                                  if ($this->help_model->is_digits($ex)) {
                                      $ex = $ex . " exchange";
                                  } else {
                                      $ex = $this->help_model->fraction($ex) . " exchange";
                                  }
                                  if ($this->help_model->is_digits($hh_val)) {
                                      $hh_val = $hh_val;
                                  } else {
                                      $hh_val = $this->help_model->fraction($hh_val);
                                  }
                                  $tbl4 .= '<tr nobr= "true"><td  style="margin-left:50px;">' . $foodgroup . '</td><td  style="text-indent:10px;">' . $fooditem . '</td><td  style="text-indent:10px;">' . $ex . '</td><td  style="margin-left:50px;">' . $hh_val . '</td><td >' . $hh_m . '</td>
</tr>';
                              }
                          } else {
                              $tbl4 .= '<tr nobr="true"><td colspan="5" style="text-align:center">' . 'No meals available' . '</td></tr>';
                          }
                      }
                  } else {
                      $tbl4 .= '<tr nobr="true"><td colspan="5" style="text-align:center">' . 'No meals available' . '</td></tr>';
                  }
              }
          } else {
              $tbl4 .= '<tr nobr="true"><td colspan="5" style="text-align:center">' . 'No meals available' . '</td></tr>';
          }
          $data['results10'] = $this->help_model->get_recommendation_id($appointment_id);
          $numRows10         = $this->help_model->getAffectedRows();
          $tbl5              = '';
          if ($numRows10 > 0) {
              foreach ($data['results10'] as $row10) {
                  $recommendation = $row10->recommendation;
                  $tbl5 .= '<tr nobr= "true">
    <td >' . nl2br($recommendation) . '</td>
    
    </tr>';
              }
          } else {
              $tbl5 .= '<tr nobr= "true">
    <td align="center">No recommendation</td>
    
    </tr>';
          }
          $html = <<<EOD
   <table border="1" cellpadding="2"  >
    <tr>
    <td bgcolor="#fbfaf9"><h3>CLIENT INFORMATION</h3></td>

    </tr>


    </table><br><br>
<table border="0" cellpadding="0" >
<tr>
    <td>
<strong>Name:</strong> $name<br>
<strong>Address:</strong> $address<br>
<strong>Age:</strong>  $age<br>
<strong>Sex:</strong>  $gender<br>
    </td>
    
    
    
    </tr>

    
    
</table><br>





<table border="1" cellpadding="2"  >
    <tr >
    <td bgcolor="#fbfaf9"><h3 >ANTHROPOMETRY RESULT</h3></td>
    </tr>
    
    </table><br><br>


 <table border="0" cellpadding="0">
    <tr>
        <td><strong>Weight:</strong>  $weight $weight_unit<br><strong>Height (cm):</strong> $height $height_unit<br><strong>Body Mass Index:</strong> $bmi<br><strong>Body Mass Index Classification:</strong> $bmi_class<br><strong>Desirable Body Weight:</strong> $dbw<br><strong>Healthy Weight Range (kg):</strong> $lwr_lmt - $uppr_lmt $lmt_unit
        </td>
        <td><strong>Waist Circumference:</strong> $wc $wc_unit<br><strong>Hip Circumference:</strong> $hc $hc_unit<br><strong>Waist-Hip Ratio:</strong> $whipr<br><strong>Waist-Hip Ratio Classification:</strong> $whipr_class<br><strong>Waist-Height Ratio:</strong> $whtr<br><strong>Waist-Height Ratio Classification:</strong> $whtr_class
        </td>
    </tr>
</table><br><br>



<table border="1" cellpadding="2"  >
    <tr >
    <td bgcolor="#fbfaf9"><h3 >BIOCHEMICAL RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="5">
<tr>

<th align="center" ><strong>Biochemical Test</strong></th>
<th align="center"><strong>Biochemical Result</strong></th>
<th align="center"><strong>Normal Values</strong></th>
<th align="center"><strong>Result Date</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl1


</table><br><br>





<table border="1" cellpadding="2"  >
    <tr >
    <td bgcolor="#fbfaf9"><h3 >CLINICAL RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="5">
<tr>

<th align="center"><strong>Clinical Parameter</strong></th>

<th align="center"><strong>Observation</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl2


</table><br><br>



<table border="1" cellpadding="2"  >
    <tr >
    <td bgcolor="#fbfaf9"><h3 >DIAGNOSIS RESULT</h3></td>
    </tr>
    
    </table><br><br>


<table border="1" cellpadding="5">
<tr>

<th align="center"><strong>Diagnosis</strong></th>
<th align="center"><strong>Etiology</strong></th>
<th align="center"><strong>Signs and Symptoms</strong></th>
<th align="center"><strong>Remarks</strong></th>
</tr>

$tbl3


</table><br><br>


<table border="1" cellpadding="2"  >
<tr>
    <td bgcolor="#fbfaf9"><h3 >DIET PRESCRIPTION</h3></td>

    </tr>
    </table><br><br>
    
    <table border="0" cellpadding="0"  >
    <tr>
    <td><strong>Energy: </strong>$cal kcal</td>
    <td><strong>CHO: </strong>$cho grams</td>
    <td><strong>Protein: </strong>$protein grams</td>
    <td><strong>Fat: </strong>$fat grams</td>
    </tr>
    </table><br><br>






<table border="1" cellpadding="2"  >
    <tr>
    <td bgcolor="#fbfaf9"><h3 >DISTRIBUTION OF EXCHANGES PER FOOD ITEM FOR EACH MEAL</h3></td>
    </tr>
    
    </table><br><br>



<table border="1" cellpadding="8" >

$tbl4


</table><br><br>



<table border="1" cellpadding="2"  >
<tr>
    <td bgcolor="#fbfaf9"><h3 >Recommendations</h3></td>

    </tr>
    
    
    
    </table><br><br>
<table border="1" cellpadding="8" >

<tr>
<td>
<strong>2012 Nutritional Guidelines for Filipinos</strong><br>
1.    Eat a variety of foods everyday to get the nutrients needed by  the body.<br>
2.    Breastfeed infants exclusively from birth up to six months then give appropriate complementary foods while continuing  breastfeeding for 2 years and beyond for optimum  growth and development.<br>
3.    Eat more vegetables  and fruits everyday  to get the essential vitamins, minerals and fiber for regulation of body processes. <br>
4.    Consume fish, lean meat, poultry, egg, dried beans, or nuts daily for growth and repair of body tissues. <br>
5.    Consume  milk, milk products and other calcium-rich foods, such as small fish and shellfish everyday for healthy bones and teeth.<br>
6.    Consume safe foods and water to prevent diarrhea  and other food- and water-borne diseases.<br>
7.    Used iodized salt  to prevent Iodine Deficiency Disorders.<br>
8.    Limit intake of salty, fried, fatty and sugar-rich foods to prevent cardiovascular diseases.<br>
9.    Attain normal body weight  through proper diet and moderate physical activity to maintain good health and help prevent obesity.<br>
10.    Be physically active, make healthy food choices , manage stress, avoid alcoholic beverages and do not smoke to help prevent lifestyle-related non-communicable diseases.
</td>
</tr>


</table><br><br>

<table border="1" cellpadding="2"  >
<tr>
    <td bgcolor="#fbfaf9"><h3 >Other Recommendations</h3></td>

    </tr>
    
    
    
    </table><br><br>
<table border="1" cellpadding="8" >

$tbl5


</table>
<br><br><br>




<table border="0" cellpadding="0" align="center">
<tr>
    <td><strong>Date of Counseling: </strong> <u>$approved_date</u> </td>
    <td><strong>Name/ Signature of RND: </strong><u>$assigned_rnd</u></td>
    <td><strong>License No.: </strong></td>
    
    </tr>





</table>
EOD;
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          $pdf->Output('summary.pdf', 'I');
      }
      public function site_graph()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->view('site_graph');
      }
      public function get_stats_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));

                $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {   

                  $data['stats'] = $this->help_model->get_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;
                      if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }
      public function page_graph()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->view('page_graph');
      }

      public function get_fast_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');

          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;

              foreach ($data['year'] as $row) {

                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));
                 // $z= 0;

                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {        
                  //$month = $z;


                  $data['stats'] = $this->help_model->get_fast_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                     /*$total        = (float) $row1->total;

                      if($total == 0){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $total        = (float) $row1->total;
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }

              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }



      public function get_events_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {


                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));


                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_events_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }

              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }


      public function get_publications_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));


                $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_publications_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function get_help_tracker_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));
         

                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");

                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_help_tracker_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function get_pa_tracker_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));
                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");

                foreach ($months as $month) {    
                  $data['stats'] = $this->help_model->get_pa_tracker_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function get_foodtracker_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));

                $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");

                foreach ($months as $month) {    
                  $data['stats'] = $this->help_model->get_foodtracker_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function get_pdri_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {
                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));
         

                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");

                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_pdri_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }
              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function get_appointments_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {


                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));


                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_appointments_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }

              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function appointment_graph()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->view('appointment_graph');
      }

      public function get_users_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $q = date('Y');
          for ($x = 2016; $x <= $q; $x++) {
              $year         = $x;
              $aa           = $x;
              $data['year'] = $this->help_model->get_stats_year($year);
              $aa           = array();
              $aa['name']   = $year;
              foreach ($data['year'] as $row) {


                  $total         = (float) $row->total;
                  $year          = date("Y", strtotime($row->year));


                  $months = array("January","February","March","April","May","June","July","August","September", 
                    "October", "November","December");
                foreach ($months as $month) {     
                  $data['stats'] = $this->help_model->get_users_stats($month,$year);
                  foreach ($data['stats'] as $row1) {
                      $total        = (float) $row1->total;

                      /*if($total == 1){
                        $total=0;
                      }else{
                         $total        = (float) $row1->total;
                      }*/
                      $month        = $month;
                      $aa['data'][] = $total;
                  }

                }

              }
              $result = array();
              $r[]    = array_merge($aa);
          }
          array_push($result, $r);
          print json_encode($r, JSON_NUMERIC_CHECK);
      }

      public function users_graph()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->load->view('users_graph');
      }


      public function wt_graph()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['client_id'] = $this->input->get('client_id', TRUE);
          $this->load->view('wt_graph', $data);
      }
     
      public function get_wt_data()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $client_id     = $this->input->get('client_id1');
          $data['getWt'] = $this->help_model->get_wt_data($client_id);
          $output        = array();
          foreach ($data['getWt'] as $row) {
              $wt_unit = $row->weight_unit;
              $month   = date("M/d/y", strtotime($row->submitted_on));
              if ($wt_unit == 'lbs') {
                  $wt = (float) round(($row->weight / 2.2) * 10) / 10;
              } else {
                  $wt = (float) $row->weight;
              }
              unset($temp);
              $temp          = array();
              $month         = date("M/d/y", strtotime($row->submitted_on));
              $temp['wt']    = $wt;
              $temp['month'] = $month;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }
      public function event_calendar()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $thismonth        = date('m');
          $thisyr           = date('Y');
          $data['title']    = 'Event Calendar'; 
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
       
          $data["results"]  = $this->help_model->get_pending_requests();
          $data['numRows']  = $this->help_model->getAffectedRows();
          $data['results0'] = $this->help_model->get_comments();
          $data['numRows0'] = $this->help_model->getAffectedRows();
          $data['events']   = $this->help_model->upcoming_events($thismonth, $thisyr);
          $data['numRows1'] = $this->help_model->getAffectedRows();
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('event_calendar', $data);
      }
      public function get_events()
      {
          $datetime       = date("Y-m-d");
          $uid            = $this->session->id;
          $user_type      = $this->session->user_type_id;
          $event_date     = $this->input->post('event_date', TRUE);
          $data['events'] = $this->help_model->get_events($event_date);
          $numRows        = $this->help_model->getAffectedRows();
          if ($numRows > 0) {
              foreach ($data['events'] as $row) {
                  $id                = $row->id;
                  $event_type_id     = $row->event_type_id;
                  $appointment_id    = $row->appointment_id;
                  $event_type        = $row->event_type;
                  $custom_event_type = $row->custom_event_type;
                  $event_date        = "<strong>".date("l jS F Y", strtotime($row->approved_date))."</strong>";
                  $approved_time_to  = $row->approved_time_to;
                  $event_time        = date("h:i A", strtotime($row->approved_time_from)) . "-" . date("h:i A", strtotime($row->approved_time_to));
                  $whole_day         = $row->whole_day;
                  $assigned_rnd_id   = $row->assigned_rnd_id;
                  $assigned_rnd      = $row->lname . ", " . $row->fname . " " . $row->mname;
                  $all_rnd           = $row->all_rnd;
                  $remarks           = $row->remarks;
                  if ($remarks == NULL || $remarks == 'none') {
                      $remarks = 'none';
                  } else {
                      $remarks = $row->remarks;
                  }
                  $a = strtotime($row->approved_date);
                  $b = strtotime($datetime);
                  if ($event_type_id == 1) {
                      echo "<div class=\"panel panel-default\" >";
                      echo "<div class=\"panel-heading\">";
                      echo "<i class=\"fa fa-fw fa-calendar\"></i>" . $event_type;
                      echo "</div>";
                      echo "<div class=\"body container\">";
                      
                      echo "<br>";
                      if ($whole_day == 1) {
                          echo $event_date . " <br> " . "whole day";
                      } else {
                          echo $event_date . " <br> " . $event_time;
                      }
                      if ($all_rnd == 1) {
                          echo "";
                      } else {
                          echo "<p>" . $assigned_rnd . "</p>";
                      }
                      echo "<div class=\"class=\"well well-sm pre-scrollable\" style=\"width: 20%;\">Remarks: ".$remarks."</div><br>";
                      if ($user_type == 1) {
                          $button = "<a href=\"#\"   id=\"$appointment_id\"  class=\"btn btn-success edit_request\">Edit</a>&nbsp;<a href=\"#\"  id=\"$appointment_id\" class=\"btn btn-danger delete_request\" >Delete</a>";
                      } else if ($b <= $a && $user_type == 1) {
                          $button = "<a href=\"#\"   id=\"$appointment_id\"  class=\"btn btn-success edit_request\">Edit</a>&nbsp;<a href=\"#\"  id=\"$appointment_id\" class=\"btn btn-danger delete_request\" >Delete</a>";
                      } else if ($b <= $a && $user_type == $assigned_rnd_id) {
                          $button = "<a href=\"#\"   id=\"$appointment_id\"  class=\"btn btn-success edit_request\">Edit</a>&nbsp;<a href=\"#\"  id=\"$appointment_id\" class=\"btn btn-danger delete_request\" >Delete</a>";
                      } else {
                          $button = "";
                      }
                      echo $button;
                      echo "<br><br>";
                      echo "</div></div>";
                  } else {
                      if ($custom_event_type != NULL || $custom_event_type != '' || $custom_event_type != 'none') {
                          $event_type = $event_type;
                      } else {
                          $event_type = $custom_event_type;
                      }
                      echo "<div class=\"panel panel-default\">";
                      echo "<div class=\"panel-heading\">";
                      echo "<i class=\"fa fa-fw fa-calendar\"></i>" . $event_type;
                      echo "</div>";
                      echo "<div class=\"body container\">";
                      
                      echo "<br>";
                      if ($whole_day == 1) {
                          echo $event_date . " <br> " . "whole day";
                          echo "<br>";
                      } else {
                          echo $event_date . " <br> " . $event_time;
                          echo "<br>";
                      }
                      if ($all_rnd == 1) {
                          echo "";
                      } else {
                          echo "<p>" . $assigned_rnd . "</p>";
                      }
                      echo "<div class=\"class=\"well well-sm pre-scrollable\" style=\"width: 20%;\">Remarks: ".$remarks."</div><br>";
                      if ($user_type == 1) {
                          $event_button = "<a href=\"#\"  id=\"$id\" class=\"btn btn-success edit_event \" >Edit</a>&nbsp;<a href=\"#\"  id=\"$id\" class=\"delete_event btn btn-danger\" >Delete</a>";
                      } else if ($b <= $a && $user_type == 1) {
                          $event_button = "<a href=\"#\"  id=\"$id\" class=\"btn btn-success edit_event \" >Edit</a>&nbsp;<a href=\"#\"  id=\"$id\" class=\"delete_event btn btn-danger\" >Delete</a>";
                      } else if ($b <= $a && $uid == $assigned_rnd_id) {
                          $event_button = "<a href=\"#\"  id=\"$id\" class=\"btn btn-success edit_event \" >Edit</a>&nbsp;<a href=\"#\"  id=\"$id\" class=\"delete_event btn btn-danger\" >Delete</a>";
                      } else {
                          $event_button = "";
                      }
                      echo $event_button;
                      echo "<br><br>";
                  }
                  echo "</div></div>";
              }
          } else {
              echo "No available events for this day.";
          }
      }
      public function add_event()
      {
          $datepick            = $this->input->get('id', TRUE);
          $data['datepick']    = $this->input->get('id', TRUE);
          $data['uid']         = $this->session->id;
          $data['user_type']   = $this->session->user_type_id;
          $data['numRows']     = $this->help_model->getAffectedRows();
          $data['event_type0'] = $this->help_model->get_event_type1();
          $data['rnd_user']    = $this->help_model->get_rnd();
          $this->load->view('add_event', $data);
      }
      public function save_event()
      {
          $event_type_id = $this->input->post('event_type', TRUE);
          $datepick      = $this->input->post('datepick', TRUE);
          $timepick1     = $this->input->post('timepick1', TRUE);
          $timepick2     = $this->input->post('timepick2', TRUE);
          $whole_day     = $this->input->post('whole_day', TRUE);
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          $all_rnd = $this->input->post('all_rnd', TRUE);
          if ($all_rnd == 0) {
              $rnd = $this->input->post('rnd', TRUE);
          } else {
              $rnd = 0;
          }
          $user_type = $this->session->user_type_id;
          $by        = $this->session->id;
          if ($user_type == 1) {
              $all_rnd = $this->input->post('all_rnd', TRUE);
              $rnd     = $this->input->post('rnd', TRUE);
          } else {
              $rnd     = $this->session->id;
              $all_rnd = 0;
          }
          if ($whole_day == 1) {
              $data['results2'] = $this->help_model->check_rnd_sched_whole_day($datepick, $all_rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          } else {
              $data['results2'] = $this->help_model->check_rnd_sched_time($datepick, $timepick1, $timepick2, $rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          }
          $all_rnd1         = 1;
          $data['results3'] = $this->help_model->check_all_rnd_sched($datepick, $timepick1, $timepick2, $all_rnd1);
          $numRows3         = $this->help_model->getAffectedRows();
          if ($numRows2 > 0 || $numRows3 > 0) {
              echo "error";
          } else {
              $this->help_model->save_event();
              echo "success";
          }
      }
      public function edit_event()
      {
          $id                  = $this->input->get('id', TRUE);
          $data['id']          = $this->input->get('id', TRUE);
          $data['uid']         = $this->session->id;
          $data['user_type']   = $this->session->user_type_id;
          $data['event_id']    = $this->help_model->get_event_id($id);
          $data['numRows']     = $this->help_model->getAffectedRows();
          $data['event_type0'] = $this->help_model->get_event_type1();
          $data['rnd_user']    = $this->help_model->get_rnd();
          $this->load->view('edit_event', $data);
      }
      public function update_event()
      {
          $id        = $this->input->post('id', TRUE);
          $datepick  = $this->input->post('datepick', TRUE);
          $timepick1 = $this->input->post('timepick1', TRUE);
          $timepick2 = $this->input->post('timepick2', TRUE);
          $whole_day = $this->input->post('whole_day', TRUE);
          $all_rnd   = $this->input->post('all_rnd', TRUE);
          if ($all_rnd == 0) {
              $rnd = $this->input->post('rnd', TRUE);
          } else {
              $rnd = 0;
          }
          $event_type_id = $this->input->post('event_type', TRUE);
          $user_type     = $this->session->user_type_id;
          $by            = $this->session->id;

          $data['event_id']    = $this->help_model->get_event_id($id);
          foreach ($data['event_id'] as $row){
                $datepick1    = $row->datepick;
              }
          if($datepick1 != $datepick){
              echo "success";
          }else{
          if ($user_type == 1) {
              $all_rnd = $this->input->post('all_rnd', TRUE);
              $rnd     = $this->input->post('rnd', TRUE);
          } else {
              $rnd     = $this->session->id;
              $all_rnd = 0;
          }
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          if ($whole_day == 1) {
              $data['results2'] = $this->help_model->check_rnd_sched_whole_day($datepick, $all_rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          } else {
              $data['results2'] = $this->help_model->check_rnd_sched_time($datepick, $timepick1, $timepick2, $rnd);
              $numRows2         = $this->help_model->getAffectedRows();
          }
          $all_rnd1         = 1;
          $data['results3'] = $this->help_model->check_all_rnd_sched($datepick, $timepick1, $timepick2, $all_rnd1);
          $numRows3         = $this->help_model->getAffectedRows();
          if ($numRows2 > 0 || $numRows3 > 0) {
              echo "error";
          } else {
              $this->help_model->update_event();
              echo "success";
                  }
                }
      }

      public function delete_event($id)
      {
        $id = $this->input->post('id',TRUE);
        $where= 'id';
        $this->help_model->delete_event($where,$id);
      //redirect('help/foodtracker');
      }
      public function edit_request()
      {
          $appointment_id         = $this->input->get('id', TRUE);
          $data['appointment_id'] = $this->input->get('id', TRUE);
          $data['uid']            = $this->session->id;
          $data['user_type']      = $this->session->user_type_id;
          $data['request_id']     = $this->help_model->get_request($appointment_id);
          $data['numRows']        = $this->help_model->getAffectedRows();
          $data['event_type']     = $this->help_model->get_event_type();
          $data['rnd_user']       = $this->help_model->get_rnd();
          $this->load->view('edit_request', $data);
      }
      public function update_request()
      {
          $appointment_id   = $this->input->post('appointment_id', TRUE);
          $datepick         = $this->input->post('datepick', TRUE);
          $timepick1        = $this->input->post('timepick1', TRUE);
          $timepick2        = $this->input->post('timepick2', TRUE);
          $whole_day        = $this->input->post('whole_day', TRUE);

          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          $event_type_id          = $this->input->post('event_type', TRUE);
          $rnd                    = $this->input->post('rnd', TRUE);
          $status                 = $this->input->post('status', TRUE);
          $remarks                = $this->input->post('remarks', TRUE);
          $data['request_id']     = $this->help_model->get_request($appointment_id);
          foreach( $data['request_id']  as $row){
            $datepick1    =     $row->datepick;

          }

          if($datepick1 == $datepick){
              echo "success";
          }else{
          $data['results2'] = $this->help_model->check_rnd_sched_time($datepick, $timepick1, $timepick2, $rnd);
          $numRows2         = $this->help_model->getAffectedRows();
          $all_rnd1         = 1;
          $data['results3'] = $this->help_model->check_all_rnd_sched($datepick, $timepick1, $timepick2, $all_rnd1);
          $numRows3         = $this->help_model->getAffectedRows();
          if ($numRows2 > 0 || $numRows3 > 0) {
              echo "error";
          } else {
            //$this->help_model->update_request();
            // $this->help_model->update_event();

              if ($this->help_model->update_request()) {
                  $this->help_model->update_event();
                  echo "success";
              }
          }

        }


      }

      public function delete_request($id)
      {
        $id = $this->input->post('id',TRUE);
        $where= 'id';

        if( $this->help_model->delete_request($where,$id) == TRUE){
              $where= 'appointment_id';
              $this->help_model->delete_sched($where,$id);

              }
      
      }
      public function users()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $data['title']         = 'Users';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          //$admin_header  = $this->load->view('admin_header', $data, true);
          //echo $admin_header;
         
          $data["results"]       = $this->help_model->get_pending_requests();
          $data['numRows']       = $this->help_model->getAffectedRows();
          $data['results0']      = $this->help_model->get_comments();
          $data['numRows0']      = $this->help_model->getAffectedRows();

          //$admin_navbar     = $this->load->view('admin_navbar', $data, true);
         // echo $admin_navbar;
 
          
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }

        
          $this->load->view('users',$data);
      }

      public function create_users()
      {
          $admin_js             = base_url("assets/js/admin.js");
          echo "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
          $module_id             = 1;
          $uid                   = $this->session->id;
          $get_users    = $this->help_model->get_users($module_id, $uid);
          $get_user_type = $this->help_model->get_user_type();

          echo "<div class=\"container\">";
          echo "<div class=\"col-md-12\">";
           
          echo "<hr></hr>";
  
          echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                             <i class=\"fa fa-user fa-fw\"></i> Users Database</div>";        
              
          echo "<div class=\"panel-body\">";
          echo "<div class=\"table-responsive\">";
          echo "<table id=\"users_acct\" class=\"table table-condensed\"  border=\"0\"  >";
          echo "<thead><tr>";
  
          echo "<th></th>";
          echo "<th >Name</th>";
          echo "<th >Email Address</th>";
          echo "<th>Username</th>";
          echo "<th>Privilege</th>";
          echo "<th>Active</th>";
          //echo "<th></th>";
          echo "<th></th>";
          
          echo "</tr></thead><tbody>";
           
          foreach($get_users as $row){
         
          
          $id= $row->id;
          $name= $row->lname.", ".$row->fname." ".$row->mname;
          $email_address= $row->email_address;
          $admin_username= $row->username;
          $user_type_id = $row->user_type_id;
          $user_active = $row->active;
          $status_id =1;
          
          if($user_active == 1){
            $active= "<div style=\"color:#41b452;\">"."Active"."</div>";
          }
          else{
            $active= "<div style=\"color: #ff0000;\">"."Not Active"."</div>";
          }
          echo "<tr>";  
          echo "<td >" . $id . "</td>";
          $get_client_request =  $this->help_model->get_client_request($id,$status_id);
          $numRows1     = $this->help_model->getAffectedRows();
          if($numRows1 > 0 ){
          foreach($get_client_request as $row1 ){
            $appointment_id= $row1->appointment_id;
            $a=base_url('admin/help/client_profile/'.$appointment_id.''); 
            echo "<td ><a href=\"$a\">". $name . "</a></td>";

          }
            } else{

             echo "<td >". $name . "</td>";

          } 

          
          echo "<td  >".$email_address."</td>";
        
          echo "<td >".$admin_username."</td>";
        
          echo "<td >";
          
          echo "<select name=\"user_type\" id=\"user_type\" data-id=\"$id\" class=\"form-control user_type\" >";
          echo "<option value=\"0\">--Select--</option>";

        
          foreach($get_user_type as $row1){
            $user_type_id1= $row1->id;
            $user_type= $row1->user_type;
          
          if($user_type_id==$user_type_id1){
              $selectCurrent=' selected';
            }else{
              $selectCurrent='';
            }
          echo "<option value=\"$user_type_id1\" ".$selectCurrent.">".$user_type."</option> ";
            
          }
        

          echo "</select>";
        
          echo "</td>";   
            
          
          
          
          echo "<td  style=\"text-align:center;\">".$active."</td>";
                
          
          echo "<td><a href=\"#\" id=\"$id\" class=\"delete_user\" ><span class=\"glyphicon glyphicon-remove\"></span></a></td>";

            
         
      }
       

          echo "</tr></tbody></table></div></div></div>";

          echo "</div></div>"; 


      }


      public function update_privilege()
      {

        $uid  = $this->input->post('id', TRUE);
        $uid1 = $this->session->id;

          if($uid == $uid1){
            $this->help_model->update_privilege();
            echo "success";

          }else{
            $this->help_model->update_privilege();
            echo "success1";

          }




      }
      public function fooditems()
      {
          $data['title']         = 'Fooditems';
          $admin_js             = base_url("assets/js/admin.js");
          $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";   
          $data["results"]       = $this->help_model->get_pending_requests();
          $data['numRows']       = $this->help_model->getAffectedRows();
          $data['results0']      = $this->help_model->get_comments();
          $data['numRows0']      = $this->help_model->getAffectedRows();
          $data['get_fooditems'] = $this->help_model->get_fooditems();
          $uid               = $this->session->id;
          $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
          $this->load->view('fooditems', $data);
      }

      public function add_fooditem()
      {
         
          $data['foodgroups'] = $this->help_model->get_all_foodgroups();
          $data['foodlists']  = $this->help_model->get_all_fel_foodlists();
          $data['get_hh_m']   = $this->help_model->get_hh_m();
          $this->load->view('add_fooditem', $data);
      }

      public function save_fooditem()
      { 
        
          if ($this->help_model->save_fooditem()) {
             echo "success";
          } else {
              echo "error";
          }
      }

      public function get_all_fooditems()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          header('Content-Type: application/json', true);
          $fooditem    = $this->input->get('term');
          $data['getFooditem'] = $this->help_model->get_all_fooditems($fooditem);
          $output            = array();
          foreach ($data['getFooditem'] as $row) {
              unset($temp);
              $temp          = array();
              $id = $row->id;
              $temp['label'] = $row->fooditem;
              array_push($output, $temp);
          }
          header("Content-Type: application/json");
          echo json_encode($output);
      }

      public function edit_fooditem()
      {
          $id                  = $this->input->get('id', TRUE);
          $data['fooditem_id'] = $this->help_model->get_fooditem_id($id);
          foreach ($data['fooditem_id'] as $row) {
              $id = $row->foodgroup_id;
          }
          $data['id']         = $this->input->get('id', TRUE);
          $data['numRows']    = $this->help_model->getAffectedRows();
          $data['foodgroups'] = $this->help_model->get_all_foodgroups();
          $data['foodlists']  = $this->help_model->get_fel_foodlists($id);
          $data['get_hh_m']   = $this->help_model->get_hh_m();
          $this->load->view('edit_fooditem', $data);
      }
      public function update_fooditem()
      {
        
          if ($this->help_model->update_fooditem()) {
             echo "success";
          } else {
              echo "error";
          }
      }

      public function delete_fooditem($id)
      {
        $id = $this->input->post('id',TRUE);
        $this->help_model->delete_fooditem($id);
      //redirect('help/foodtracker');
      }


      public function default_nutrition_plan()
      {
        $data['title']    = 'Default Meal Plan';
        $admin_js             = base_url("assets/js/admin.js");
        $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
        $data["results"]  = $this->help_model->get_pending_requests();
        $data['numRows']  = $this->help_model->getAffectedRows();
        $data['results0'] = $this->help_model->get_comments();
        $data['numRows0'] = $this->help_model->getAffectedRows();
        $data['default_nutrition_plan'] = $this->help_model->get_default_nutrition_plan();
        $uid               = $this->session->id;
        $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }
        $this->load->view('default_nutrition_plan', $data);


      }

      public function default_meal_plan($data_id)
      {
         $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

        $data['title']    = 'Default Meal Plan';
        $admin_js             = base_url("assets/js/admin.js");
        $data['js']             = "<script type=\"text/javascript\" src=\"$admin_js\"></script>";
        $a             = base_url('admin/help/default_nutrition_plan/' . $appointment_id . '');
        $data['crumb'] = array(
              array(
                  'label' => 'Default Nutrition Plan',
                  'link' => $a
              ),
              array(
                  'label' => $data['title'],
                  'link' => ''
              )
          ); 
       
     
        $data["results"]  = $this->help_model->get_pending_requests();
        $data['numRows']  = $this->help_model->getAffectedRows();
        $data['results0'] = $this->help_model->get_comments();
        $data['numRows0'] = $this->help_model->getAffectedRows();
        $data['data_id']  = $data_id;
        $uid               = $this->session->id;
        $data['get_user_details'] = $this->help_model->get_user_details($uid);

          foreach($data['get_user_details'] as $row){
            $photo = $row->photo;
            if($photo == NULL){
              $data['photo']='no_photo.png';
            }else{
              $data['photo']= $row->photo;

            }

          }

        



        $this->load->view('default_meal_plan', $data);

      }

      public function create_default_meal_plan($data_id)
      {
        $meal_plan_js             = base_url("assets/js/meal_plan.js");
        echo "<script type=\"text/javascript\" src=\"$meal_plan_js\"></script>";
         
       
        echo "<div class=\"container\" >";
        echo "<div class=\"col-md-12\" >";
        //echo " <h3 class=\"page-header\"> <img  height=\"75\ width=\"75\" src=\"$x\">Create Default Meal Plan</h3>";
    
        
        $data["results2"]  = $this->help_model->get_meal();
        echo "<div class=\"container\">";
        echo "<h2 align=\"center\">Meals for the Day</h2>";
        echo "<hr class=\"colorgraph\"></hr>";
          
        echo "<div id=\"meal_div\">";
          foreach ($data["results2"] as $row2) {
              $meal_id          = $row2->id;
              $meal_name        = $row2->meal_name;
              $meal_code        = $row2->meal_code_name;
              //echo "<h4>$meal_name</h4>";     
              $data["results3"] = $this->help_model->default_fel_total($data_id);
              $data["results4"] = $this->help_model->get_fel_default_foodgroup($meal_code, $data_id);
              $numRows4         = $this->help_model->getAffectedRows();


              $total = 0;
              foreach ($data["results3"] as $row3) {
                  $total += $row3->$meal_code;
              }
              if ($total == 0) {
                  echo "<h4>" . $meal_name . "</h4>";
                  $create_menu = "";
              } else {
                  echo "<h4>" . $meal_name . " " . "</h4>";
                  $create_menu = "<div align=\"right\" style=\"margin-bottom: 10px;\"><div class=\"form-group form-inline\"><input type=\"text\" class=\"form-control text-box menu  \" id=\"menu_name$meal_id\" name=\"menu_name\"  placeholder=\"Enter menu name..\">
            <button class=\"btn btn-primary add_default_menu \" data-meal_id=\"$meal_id\"  data-nutrition_id=\"$data_id\"  id=\"meal_id\" value=\"$meal_id\" >Create </button></div></div>";
              }

                 echo "<div>";
              //echo "<div id=\"menu\" align=\"left\">";
              if ($numRows4 == 0) {
                  echo "<br><span class=\"alert alert-danger\">" . "No foodgroups available" . "</span><br><br>";
              } else {
                  echo "<div class=\"col-md-3\">";
                  echo "<ul class=\"list-group\">";
                  foreach ($data['results4'] as $row4) {
                      $foodid = $row4->foodid;
                      $data["results5"] = $this->help_model->get_total_default_meal($foodid, $meal_id, $data_id);
                      $exrem       = 0;
                      $total_value = 0;
                      foreach ($data['results5'] as $row5) {
                          $hh_val = $row5->hh_val;
                          $exrem += $row5->ex;
                      }
                      $totalex_rem = $row4->$meal_code - $exrem;
                      echo "<li class=\"list-group-item \">";
                      echo "<span class=\"badge\" >" . $totalex_rem . "</span><label >" . $row4->foodgroup . "</label></li>";
                      $total_value += $row4->$meal_code;
                  }
                  echo "</ul></div>";
              }
              echo $create_menu;
             /* echo "<div align=\"right\" style=\"margin-bottom: 10px;\"><div class=\"form-group form-inline\"><input type=\"text\" class=\"form-control text-box menu  \" id=\"menu_name$meal_id\" name=\"menu_name\" placeholder=\"Enter menu name..\">
            <button class=\"btn btn-primary add_default_menu\" data-meal_id=\"$meal_id\"  id=\"meal_id\" value=\"$meal_id\" >Create </button></div></div>";*/

               echo "<div class=\"well well-sm pre-scrollable\" style=\"min-height: 600px;\">";
                echo "<div id=\"alert$meal_id\"  tabindex=\"1\" ></div>";
                  $data['results6'] = $this->help_model->get_default_menu($data_id, $meal_id);
                  foreach ($data['results6'] as $row6) {
                      $menu_id   = $row6->id;
                      $menu_name = $row6->menu_name;
                      echo "<div><a id=\"$menu_id\"  href=\"#\" class=\"edit_default_menu\">&nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\" class=\"delete_default_menu1\"><span class=\"glyphicon glyphicon-minus-sign\"></span></a>&nbsp;" . "<i >" . $menu_name . "</i>";
                      $data['results7'] = $this->help_model->get_default_food($data_id, $menu_id, $meal_id);
                      $numRows7         = $this->help_model->getAffectedRows();
                      $total_ex         = 0;
                      if ($numRows7 > 0) {
                          echo "<div class=\"table-responsive\"><table  width=\"850\" border=\"1\" class=\"table table-condensed\">";
                          echo "<tr>
                                    <th>Food Group</th>
                                    <th>Food List</th>
                                    <th>Food Item</th>
                                    <th >Ex</th>
                                    <th colspan=\"2\">Qty(EP)</th>
                                    <th colspan=\"2\">HH Measure</th>
                                    <th colspan=\"3\" align=\"center\">Action</th>
    </tr> ";
                          foreach ($data['results7'] as $row7) {
                              $id        = $row7->combination_id;
                              $menu_id   = $row7->menu_id;
                              $meal_id   = $row7->meal_id;
                              $foodgroup = $row7->foodgroup_content;
                              $foodlist  = $row7->foodlist;
                              $fooditem  = $row7->fooditem;
                              $ex        = $row7->ex;
                              $qty_val   = $row7->qty_val;
                              $hh_val    = $row7->hh_val;
                              $hh_m      = $row7->hh_measure;
                              $total_ex += $ex;
                              if ($this->help_model->is_digits($ex)) {
                                  $ex = $row7->ex;
                              } else {
                                  $ex = $this->help_model->fraction($row7->ex);
                              }
                              if ($this->help_model->is_digits($hh_val)) {
                                  $hh_val = $row7->hh_val;
                              } else {
                                  $hh_val = $this->help_model->fraction($row7->hh_val);
                              }
                              echo "<tr>";
                              echo "<td>" . $foodgroup . "</td>";
                              echo "<td>" . $foodlist . "</td>";
                              echo "<td>" . $fooditem . "</td>";
                              echo "<td>" . $ex . "</td>";
                              echo "<td colspan=\"2\">" . $qty_val . "</td>";
                              echo "<td>" . $hh_val . "</td>";
                              echo "<td>" . $hh_m . "</td>";
                              echo "<td><input type=\"hidden\" id=\"meal_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\" /><input type=\"hidden\" id=\"meal\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><a id=\"$id\" data-meal_code=\"$meal_code\" data-meal_id=\"$meal_id\" data-menu_id=\"$menu_id\" data-nutrition_id=\"$data_id\" href=\"#\" class=\"edit_default_meal\" ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
            echo "<td><a id=\"$id\"   href=\"#\" class=\"delete_default_meal\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
            echo "</tr>";

                            }
                              
                             $data['groups'] = $this->help_model->get_default_fel_foodgroup($meal_code, $data_id);
                                  echo "<tr><td>";
                                  echo "<select name=\"foodgroup\" id=\"foodgroup$menu_id\" class=\" foodgroup form-control \" data-menu_id=\"$menu_id\" >";
                                  echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
                                  foreach ($data['groups'] as $row8) {
                                      $foodid    = $row8->foodid;
                                      $foodgroup = $row8->foodgroup;
                                      echo "<option value=\"$foodid\" >$foodgroup</option>";
                                  }
                                  echo "<option value=\"14\" >Combination Foods</option> ";
                                  echo "</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<select name=\"foodlist\" id=\"foodlist$menu_id\" class=\" foodlist form-control \" data-menu_id=\"$menu_id\"  >
    <option value=\"0\">--Food Lists--</option>
</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<input type=\"text\" id=\"fooditem$menu_id\" name=\"fooditem \" class=\" fooditem  form-control \" placeholder=\"Select Food Item\"  data-menu_id=\"$menu_id\"  />";
                                  echo " <input type=\"hidden\" id=\"fooditem_id$menu_id\" name=\"fooditem_id\" class=\"form-control\" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"foodgroup_content$menu_id\" name=\"foodgroup_content\" class=\"foodgroup_content form-control \" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"const_ex_combination$menu_id\" name=\"const_ex_combination\" class=\"form-control\" data-menu_id=\"$menu_id\" />";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "    <input type=\"text\" class=\" meal_plan_exchange   form-control\"  placeholder=\"Ex\" id=\"ex$menu_id\" name=\"ex\" data-menu_id=\"$menu_id\"  size=\"2\"  />
        <input type=\"hidden\" class=\"form-control const_ex\"  placeholder=\"Constant Exchange\" id=\"const_ex$menu_id\" name=\"const_ex\" data-menu_id=\"$menu_id\"  size=\"2\"    />";
                                  echo "</td>";
                                  echo "<td colspan=\"2\">";
                                  echo "    <span id=\"qty_val_label$menu_id\" >Qty(EP)</span>
        <input type=\"hidden\" id=\"qty_val$menu_id\" name=\"qty_val\" class=\"form-control input-sm\" data-menu_id=\"$menu_id\"   size=\"2\" /><input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty$menu_id\" name=\"qty\" data-menu_id=\"$menu_id\"  size=\"5\"   />";
                                  echo "</td>";
                                  echo "<td><span id=\"hh_foodgroup$menu_id\"></span></td>";
                                  echo "<td><span id=\"hh_val_label$menu_id\" ></span><br><span id=\"hh_measure$menu_id\"></span><input type=\"hidden\" class=\"form-control hh_m\"  placeholder=\"HH Value\" id=\"hh_val$menu_id\" name=\"hh_val\" data-menu_id=\"$menu_id\"  size=\"1\"  /></td>";
                                  echo "<td align=\"center\" colspan=\"6\">";
                                  echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><input type=\"hidden\" id=\"meal$menu_id\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><button class=\"btn btn-primary add_default_meal btn-sm\" data-menu_id=\"$menu_id\"  id=\"menu_id\" value=\"$menu_id\"   ><span class=\"glyphicon glyphicon-plus\"></span></button>";
                                  echo "</td>";

                                  echo "</tr>";
                                  echo "</table></div>";
                      }else{

                        echo "<div class=\"table-responsive\"><table  width=\"850\" class=\"table table-condensed\">";
          echo "<tr ><td colspan=\"9\">"."No food item available"."</td></tr>";



                      
                              
                             $data['groups'] = $this->help_model->get_default_fel_foodgroup($meal_code, $data_id);
                                  echo "<tr><td>";
                                  echo "<select name=\"foodgroup\" id=\"foodgroup$menu_id\" class=\" foodgroup form-control \" data-menu_id=\"$menu_id\" >";
                                  echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
                                  foreach ($data['groups'] as $row8) {
                                      $foodid    = $row8->foodid;
                                      $foodgroup = $row8->foodgroup;
                                      echo "<option value=\"$foodid\" >$foodgroup</option>";
                                  }
                                  echo "<option value=\"14\" >Combination Foods</option> ";
                                  echo "</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<select name=\"foodlist\" id=\"foodlist$menu_id\" class=\" foodlist form-control \" data-menu_id=\"$menu_id\"  >
    <option value=\"0\">--Food Lists--</option>
</select>";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "<input type=\"text\" id=\"fooditem$menu_id\" name=\"fooditem \" class=\" fooditem  form-control \" placeholder=\"Select Food Item\"  data-menu_id=\"$menu_id\"  />";
                                  echo " <input type=\"hidden\" id=\"fooditem_id$menu_id\" name=\"fooditem_id\" class=\"form-control\" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"foodgroup_content$menu_id\" name=\"foodgroup_content\" class=\"foodgroup_content form-control \" data-menu_id=\"$menu_id\" />
 ";
                                  echo " <input type=\"hidden\" id=\"const_ex_combination$menu_id\" name=\"const_ex_combination\" class=\"form-control\" data-menu_id=\"$menu_id\" />";
                                  echo "</td>";
                                  echo "<td>";
                                  echo "    <input type=\"text\" class=\" meal_plan_exchange   form-control\"  placeholder=\"Ex\" id=\"ex$menu_id\" name=\"ex\" data-menu_id=\"$menu_id\"  size=\"2\"  />
        <input type=\"hidden\" class=\"form-control const_ex\"  placeholder=\"Constant Exchange\" id=\"const_ex$menu_id\" name=\"const_ex\" data-menu_id=\"$menu_id\"  size=\"2\"    />";
                                  echo "</td>";
                                  echo "<td colspan=\"2\">";
                                  echo "    <span id=\"qty_val_label$menu_id\" >Qty(EP)</span>
        <input type=\"hidden\" id=\"qty_val$menu_id\" name=\"qty_val\" class=\"form-control input-sm\" data-menu_id=\"$menu_id\"   size=\"2\" /><input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty$menu_id\" name=\"qty\" data-menu_id=\"$menu_id\"  size=\"5\"   />";
                                  echo "</td>";
                                  echo "<td><span id=\"hh_foodgroup$menu_id\"></span></td>";
                                  echo "<td><span id=\"hh_val_label$menu_id\" ></span><br><span id=\"hh_measure$menu_id\"></span><input type=\"hidden\" class=\"form-control hh_m\"  placeholder=\"HH Value\" id=\"hh_val$menu_id\" name=\"hh_val\" data-menu_id=\"$menu_id\"  size=\"1\"  /></td>";
                                  echo "<td align=\"center\" colspan=\"6\">";
                                  echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><input type=\"hidden\" id=\"meal$menu_id\" name=\"meal\" value=\"$meal_code\" class=\"form-control\" /><button class=\"btn btn-primary add_default_meal btn-sm\" data-menu_id=\"$menu_id\"  id=\"menu_id\" value=\"$menu_id\" data-nutrition_id=\"$data_id\"  ><span class=\"glyphicon glyphicon-plus\"></span></button>";
                                  echo "</td>";

                                  echo "</tr>";





                                  echo "</table></div>";
                      }






                      echo "</div>";
                  }









              echo "</div>";


            
                echo "</div>";
          }

        echo "</div>";
        echo "</div>";
        echo "</div>";
     


      }

        public function save_default_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->save_default_menu();
          echo "success";
      }

      /*public function delete_default_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
         // $this->help_model->delete_default_menu($id);
          if($this->help_model->delete_default_menu($id) ==TRUE){
              $this->help_model->delete_default_meal($id);

          }
        
      }*/

      public function delete_default_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id = $this->input->post('id', TRUE);
          $where= 'id';
     
          if($this->help_model->delete_default_menu($where,$id) == TRUE){
              $where= 'menu_id';
              $this->help_model->delete_default_meal($where,$id);

          }
        
      }

      public function delete_default_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }

          $id = $this->input->post('id', TRUE);
          $where= 'combination_id';
          $this->help_model->delete_default_meal($where,$id);
      }


      public function save_default_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
       
          $menu_id           = $this->input->post('menu_id', TRUE);
          $meal_id           = $this->input->post('meal_id', TRUE);
          $foodgroup         = $this->input->post('foodgroup', TRUE);
          $foodgroup_content = $this->input->post('foodgroup_content', TRUE);
          $foodlist          = $this->input->post('foodlist', TRUE);
          $fooditem_id       = $this->input->post('fooditem_id', TRUE);
          $ex                = $this->input->post('ex', TRUE);
          $qty_val           = $this->input->post('qty_val', TRUE);
          $hh_val            = $this->input->post('hh_val', TRUE);
          $meal              = $this->input->post('meal', TRUE);
          $data_id           = $this->input->post('nutrition_id', TRUE);
          $by                = $this->session->id;
         // echo $meal;
          $data['results']   = $this->help_model->get_default_meal_status();
          foreach ($data['results'] as $row) {
              $fg_id            = $row->Auto_increment;
              $fg_array         = explode(",", $foodgroup_content);
              $total_meal_item  = 0;
              $total_meal_ex    = 0;
              $total_foodfel_ex = 0;
              $total_item       = 0;
              $item1            = 0;
              $item             = 0;
          }

//echo $meal_id;
          $aaa_fg[] = 0;
          foreach ($fg_array as $item) {
                   //echo $item;
              $aaa_fg[] .= $item;
              $data['results1'] = $this->help_model->check_default_fel_meal($item, $data_id);
              $aa               = 0;
              $aaa[]            = 0;
              foreach ($data['results1'] as $row1) {
                  $aa += $row1->$meal;
                  $aaa[] = $row1->$meal;
              }
              $data['results2'] = $this->help_model->check_default_meal_plan_ex($meal_id, $data_id, $item);
              $total            = 0;
              $total_ex         = 0;
              foreach ($data['results2'] as $row2) {
                  $total += $row2->ex;
              }
          }
             $total_ex = $total + $ex;

   
          if ($total_ex > $aa) {
              echo "error1";
          } else {
              $fooditem_array = explode(",", $fooditem_id);
              $fg_array       = explode(",", $foodgroup_content);
              $hh_val_array   = explode(",", $hh_val);
              $qty_val_array  = explode(",", $qty_val);
              $item           = 0;
              $item1          = 0;
              $item2          = 0;
              $item3          = 0;
              foreach (array_keys($fg_array) as $key) {
                  $item  = $fg_array[$key];
                  $item1 = $hh_val_array[$key];
                  $item2 = $qty_val_array[$key];
                  $item3 = $fooditem_array[$key];
                  $this->db->trans_start();
                  $data = array(
                      'menu_id'                 => $menu_id,
                      'meal_id'                 => $meal_id,
                      'foodgroup_id'            => $foodgroup,
                      'foodlist_id'             => $foodlist,
                      'fooditem_id'             => $item3,
                      'foodgroup_content'       => $item,
                      'ex'                      => $ex,
                      'qty_val'                 => $item2,
                      'hh_val'                  => $item1,
                      'combination_id'          => $fg_id,
                      'default_nutrition_id'    => $data_id,
                      'submitted_by'            => $by,
                      'submitted_on'            => date('Y-m-d H:i:s')
                  );
                  $this->db->insert('default_meal_plan_db', $data);
                  $this->db->trans_complete();
                  if ($this->db->trans_status() === FALSE) {
                      return false;
                  } else {
                      echo "success";
                  }
              }
          }
      }


      public function edit_default_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $meal_plan_js           = base_url("assets/js/meal_plan.js");
          echo "<script type=\"text/javascript\" src=\"$meal_plan_js\"></script>";
          $id                     = $this->input->get('id', TRUE);
          $data['id']             = $this->input->get('id', TRUE);
          $data_id                = $this->input->get('nutrition_id', TRUE);
          $data['data_id']        = $this->input->get('nutrition_id', TRUE);  
          $meal_code              = $this->input->get('meal_code', TRUE);
          $meal_id                = $this->input->get('meal_id', TRUE);
          $data['menu_id']        = $this->input->get('menu_id', TRUE);
          $menu_id                = $this->input->get('menu_id', TRUE);
          $data['meal_code']      = $this->input->get('meal_code', TRUE);
          $data['meal_id']        = $this->input->get('meal_id', TRUE);
          $data['results']        = $this->help_model->get_default_foodmeal($id);
          foreach ($data['results'] as $row) {
              $foodgroup_id      = $row->foodgroup_id;
              $foodlist_id       = $row->foodlist_id;
              $fooditem_id       = $row->fooditem_id;
              $foodgroup_content = $row->foodgroup_content;
              $data['hh_val']    = $row->hh_val;
            
          }
          /*echo "<div class=\"col-md-12\">";
          echo "<hr></hr>";
          echo "<table class=\"responsive table table-bordered\" >";
          echo "<tr>
            <th>Food Group</th>
            <th>Food List</th>
            <th>Food Item</th>
            <th>Exchange</th>
            <th>Qty(EP)</th>
            <th colspan=\"2\">HH Measure</th>
            <th colspan=\"3\" align=\"center\">Action</th>
            
        </tr>";*/
          $data['groups'] = $this->help_model->get_default_fel_foodgroup($meal_code, $data_id);


          $id = $foodgroup_id;
          $data['groups1'] = $this->help_model->get_fel_foodlists($id);

          $data['fg_array'] = explode(",", $foodgroup_content);
          $fg_array=  explode(",", $foodgroup_content);
          
          foreach ($fg_array as $arr_fg) {
              $data['results1'] = $this->help_model->get_foodgroup_content($arr_fg);
              /*foreach ($data['results1'] as $fg_row) {
                  $data['fg']=$fg_row->foodgroup . "<br>";
              }*/
          }
          /*echo "<tr><td>";
          echo "<select name=\"foodgroup1\" id=\"foodgroup0$menu_id\" class=\"foodgroup1 form-control input-lg\"data-menu_id=\"$menu_id\" >";
          echo "<option value=\"0\" selected=\"\" >--Food Groups--</option> ";
          foreach ($data['groups'] as $row1) {
              $foodid    = $row1->foodid;
              $foodgroup = $row1->foodgroup;
              if ($foodid == $foodgroup_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodid\" " . $selectCurrent . "  >$foodgroup</option>";
          }
          echo "<option value=\"14\" >Combination Foods</option> ";
          echo " </select>";
          echo "</td>";*/
         /* echo "<td > ";
          $id              = $foodgroup_id;
          $data['groups1'] = $this->help_model->get_fel_foodlists($id);
          echo "<select name=\"foodlist1\" id=\"foodlist0$menu_id\" class=\" form-control foodlist1 input-lg\" data-menu_id=\"$menu_id\"  >";
          echo "<option value=\"0\">--Food Lists--</option>    ";
          foreach ($data['groups1'] as $row2) {
              $foodlistid = $row2->id;
              $foodlist   = $row2->foodlist;
              if ($foodlistid == $foodlist_id) {
                  $selectCurrent = ' selected';
              } else {
                  $selectCurrent = '';
              }
              echo "<option value=\"$foodlistid\" " . $selectCurrent . " >$foodlist</option>";
          }
          echo "</select>";
          echo "</td>";*/
          /*echo "<td>";
          echo "<input type=\"text\" id=\"fooditem0$menu_id\" name=\"fooditem1\" class=\"fooditem1 form-control  input-lg meal_plan_exchange1\" placeholder=\"Select Food Item\" value=\"$fooditem\" data-menu_id=\"$menu_id\"  />
         
          <input type=\"hidden\" id=\"fooditem_id0$menu_id\" name=\"fooditem_id1\" class=\"form-control \" value=\"$fooditem_id\"/>";
          echo "</td>";
          echo "<td>";
          echo "<input type=\"text\" class=\"form-control meal_plan_exchange1 input-lg\"  placeholder=\"Ex\" id=\"ex0$menu_id\" name=\"ex1\" size=\"2\"   value=\"$ex\"   data-menu_id=\"$menu_id\" />
                <input type=\"hidden\" class=\"form-control\"  placeholder=\"Constant Exchange\" id=\"const_ex0$menu_id\" name=\"const_ex1\" size=\"2\" value=\"$const_ex\"  />
                
                    <input type=\"hidden\" class=\"form-control\"  id=\"foodgroup_content0$menu_id\" name=\"foodgroup_content1\" size=\"2\" value=\"$foodgroup_content\"  />";
          echo "</td>";
          echo "<td >";
          echo "<span id=\"qty_val_label1$menu_id\" > $qty_val
        </span>";
          echo "<input type=\"hidden\" id=\"qty_val0$menu_id\" name=\"qty_val1\" class=\"form-control\"  size=\"2\" value=\"$qty_val\" />
                <input type=\"hidden\" class=\"form-control\"  placeholder=\"Quantity\" id=\"qty0$menu_id\" name=\"qty1\" size=\"5\"  value=\"$qty_val\"  />";
          echo "</td>";
          echo "<td>";
          echo "<span id=\"hh_foodgroup0$menu_id\">";
          $fg_array = explode(",", $foodgroup_content);
          foreach ($fg_array as $arr_fg) {
              $data['results'] = $this->help_model->get_foodgroup_content($arr_fg);
              foreach ($data['results'] as $fg_row) {
                  echo $fg_row->foodgroup . "<br>";
              }
          }
          echo "</span></td>";
          echo "<td>";
          echo "<span id=\"hh_val_label0$menu_id\" >";
          $hh_val_comb_array = explode(",", $hh_val);
          $arr_hh_val        = 0;
          foreach ($hh_val_comb_array as $arr_hh_val) {
              echo $this->help_model->fraction($arr_hh_val) . "<br>";
          }
          echo "</span> <span id=\"hh_measure0$menu_id\">$hh_m</span>";
          echo "<input type=\"hidden\" class=\"form-control input-sm \"  placeholder=\"HH Value\" id=\"hh_val0$menu_id\" name=\"hh_val1\" size=\"1\"    />";
          echo "<td colspan=\"2\">";
          echo "<button  id=\"update_default_meal\" class=\"btn btn-primary btn-lg\" data-id1=\" $id\"   data-meal1=\"$meal_code\" data-meal_id1=\"$meal_id\" data-menu_id1=\"$menu_id\"> Update</button>";
          echo "</td>";
          echo "</tr>";
          echo "</table>";
          echo "<hr></hr>";
          echo "</div>";*/
          $this->load->view('edit_default_meal',$data);
      }



      public function update_default_meal()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id                = $this->input->post('id1', TRUE);
          $data_id           = $this->input->post('nutrition_id', TRUE);
        //  $client_id         = $this->input->post('client_id1', TRUE);
         // $appointment_id    = $this->input->post('appointment_id1', TRUE);
          $menu_id           = $this->input->post('menu_id1', TRUE);
          $meal_id           = $this->input->post('meal_id1', TRUE);
          $foodgroup         = $this->input->post('foodgroup1', TRUE);
          $foodgroup_content = $this->input->post('foodgroup_content1', TRUE);
          $foodlist          = $this->input->post('foodlist1', TRUE);
          $fooditem_id       = $this->input->post('fooditem_id1', TRUE);
          $ex                = $this->input->post('ex1', TRUE);
          $qty_val           = $this->input->post('qty_val1', TRUE);
          $hh_val            = $this->input->post('hh_val1', TRUE);
          $meal              = $this->input->post('meal1', TRUE);
          $by                = $this->session->id;
          $data['results0']  = $this->help_model->get_default_foodmeal($id);
          foreach ($data['results0'] as $row0) {
              $foodgroup_id1      = $row0->foodgroup_id;
              $foodlist_id1       = $row0->foodlist_id;
              $fooditem_id1       = $row0->fooditem_id;
            //  $foodgroup_content = $row0->foodgroup_content;
              $ex1                = $row0->ex;
              $qty_val1           = $row0->qty_val;
              $hh_val1            = $row0->hh_val;
              $fooditem1          = $row0->fooditem;
              $const_ex1          = $row0->const_ex;
              $hh_m1              = $row0->hh_measure;
          }
    
          if ($foodgroup != $foodgroup_id1 || $foodlist != $foodlist_id1 || $fooditem_id != $fooditem_id1 || $ex != $ex1) {
              $data['results'] = $this->help_model->get_default_meal_status();
              foreach ($data['results'] as $row) {
                  $fg_id            = $row->Auto_increment;
                  $fg_array         = explode(",", $foodgroup_content);
                  $total_meal_item  = 0;
                  $total_meal_ex    = 0;
                  $total_foodfel_ex = 0;
                  $total_item       = 0;
                  $item1            = 0;
                  $item             = 0;
              }
              $aaa_fg[] = 0;
              foreach ($fg_array as $item) {
                  $aaa_fg[] .= $item;
                  $data['results1'] = $this->help_model->check_default_fel_meal($item, $data_id);
                  $aa               = 0;
                  $aaa[]            = 0;
                  foreach ($data['results1'] as $row1) {
                      $aa += $row1->$meal;
                      $aaa[] = $row1->$meal;
                  }


                  $data['results2'] = $this->help_model->check_default_meal_plan_ex($meal_id, $data_id, $item);
                  $total            = 0;
                  $total_ex         = 0;
                  foreach ($data['results2'] as $row2) {
                      $total += $row2->ex;
                  }
              }
              
              $total_ex = $total + $ex;
            
              if ($total_ex > $aa) {
                  echo "error1";
              } else {
                  $fooditem_array = explode(",", $fooditem_id);
                  $fg_array       = explode(",", $foodgroup_content);
                  $hh_val_array   = explode(",", $hh_val);
                  $qty_val_array  = explode(",", $qty_val);
                  $item           = 0;
                  $item1          = 0;
                  $item2          = 0;
                  $item3          = 0;
                  foreach (array_keys($fg_array) as $key) {
                      $item  = $fg_array[$key];
                      $item1 = $hh_val_array[$key];
                      $item2 = $qty_val_array[$key];
                      $item3 = $fooditem_array[$key];
                      $where = 'combination_id';
                      $this->help_model->delete_default_meal($where,$id);
                      $this->db->trans_start();
                      $data = array(
                        
                          'menu_id'               => $menu_id,
                          'meal_id'               => $meal_id,
                          'foodgroup_id'          => $foodgroup,
                          'foodlist_id'           => $foodlist,
                          'fooditem_id'           => $item3,
                          'foodgroup_content'     => $item,
                          'ex'                    => $ex,
                          'qty_val'               => $item2,
                          'hh_val'                => $item1,
                          'combination_id'        => $fg_id,
                          'default_nutrition_id'  => $data_id,
                          'submitted_by'          => $by,
                          'submitted_on'          => date('Y-m-d H:i:s')
                      );
                      $this->db->insert('default_meal_plan_db', $data);
                      $this->db->trans_complete();
                      if ($this->db->trans_status() === FALSE) {
                          return false;
                      } else {
                        echo "success";
                      }
                  }
                 
              }
          } else {
              echo "success";
          }
      }

      public function edit_default_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->get('id', TRUE);
          $data['menu_id'] = $this->help_model->get_default_menu_id($id);
          $this->load->view('edit_default_menu', $data);
      }

      public function update_default_menu()
      {
           $user_type_id = $this->session->user_type_id;
    
           if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $this->help_model->update_default_menu();
          echo "success";
      }
 


      public function logout()
      {
          $this->session->sess_destroy();
          redirect('help/');
      }
      public function sample_email()
      {
          
          $this->load->library('My_PHPMailer');
          $nameuser  = 'NCS FNRI';
          $usergmail = 'ncsfnri@gmail.com';
          $password  = 'ncsfnri123';
          $mail      = new PHPMailer;
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com';
          $mail->Port       = 465;
          $mail->SMTPAuth   = true;
          $mail->Username   = $usergmail;
          $mail->Password   = $password;
          $mail->SMTPSecure = 'ssl';
          $mail->From       = $usergmail;
          $mail->FromName   = $nameuser;
          $email_address    = "pirantemorelle@gmail.com";
          
                  $selectrnd =  "Pirante, Morelle";
                  $mail->AddAddress($email_address);
                  $mail->AddReplyTo($usergmail, 'NCS FNRI');
                  $mail->WordWrap = 50;
                  $mail->Subject  = 'Client Request';
                  $htmlBody       = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear {CLIENT_NAME},<br /><br />
                This is to confirm your request for a nutrition counseling on {DATE}, {TIME_FROM}. <br /><br />
                You will be attended by our resident RND, Mr./Ms. {RND}.
                Please send us an advance copy of the information listed below at least 3 days before the confirmed appointment date through email (ncsfnri@gmail.com) in order for us to start the evaluation process.
                <br /> <br /> 
                -    Clinical/laboratory test results <br /> 
                -    Accomplished three-day 24-hour food recall sheets <br /> 
                -    List of additional queries (if applicable)<br />  <br />  

                If you have changes in schedule please contact us asap.<br /><br />

                Note:<br /><br />

                When sending your information please indicate you Last Name, First Name, Date of Appointment in the subject box.<br />

                Example: DELA CRUZ, JUAN, JUNE 20, 2016<br /><br />


                See you soon!<br /><br />
                Remarks: {REMARKS}<br /><br />
                Best Regards,<br />
                The Nutrition Counseling Service Team<br />
                ncsfnri@gmail.com<br/>
                Tel. No.: 8372071 local 2288 or 2299</p>";
                  $mail->Body     = str_replace(array(
                      '{CLIENT_NAME}',
                      '{DATE}',
                      '{TIME_FROM}',
                      '{RND}',
                      '{REMARKS}'
                  ), array(
                      "Pirante, Morelle",
                      $time,
                  ), $htmlBody);
                  $mail->IsHTML(true);
                  $mail->Send();
                  $mail->ClearAddresses();
      }
      
      public function data_entry(){
          $this->load->model('help_model', '', TRUE);
          $user_type_id = $this->session->user_type_id;
          if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->get('id', TRUE);
          $data['menu_id'] = $this->help_model->get_default_menu_id($id);
          
          $table="tbl_data_counseling";
          $data['data_collect'] = $this->help_model->get_data($table);
          $this->load->view('admin_header');
          $this->load->view('admin_navbar'); 
          $this->load->view('data_entry',$data);
          $this->load->view('admin_footer');
      }
      
      public function team_member(){
          $this->load->model('help_model', '', TRUE);
          $user_type_id = $this->session->user_type_id;
          if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->get('id', TRUE);
          $data['menu_id'] = $this->help_model->get_default_menu_id($id);
          
          $table="tbl_team_member";
          $data['data_collect'] = $this->help_model->get_data($table);
          $this->load->view('admin_header');
          $this->load->view('admin_navbar'); 
          $this->load->view('team_member',$data);
          $this->load->view('admin_footer');
      }
      
      public function data_feedback(){
          $this->load->model('help_model', '', TRUE);
          $user_type_id = $this->session->user_type_id;
          if (!isset($this->session->userdata['logged_in']) || $user_type_id ==3) {
              redirect('help/');
          }
          $id              = $this->input->get('id', TRUE);
          $data['menu_id'] = $this->help_model->get_default_menu_id($id);
          
          $table="tbl_feedback_data";
          $data['data_collect'] = $this->help_model->get_data($table);
          $this->load->view('admin_header');
          $this->load->view('admin_navbar'); 
          $this->load->view('data_feedback',$data);
          $this->load->view('admin_footer');
      }
      
//----------------------------------------------------------------------------------------------------------------------
      
      
    public function counseling_data_add(){
        
        $title = $this->input->post('title');
        $hits = $this->input->post('hits');
        $description = $this->input->post('description');
        
        if($_FILES["inputFile"]["name"] != ''){
            $config=array();
            $uploadPath = './assets/images/counseling/'; 
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
            if($this->upload->do_upload('inputFile')){
                $data = $this->upload->data();
                $name_file2 = $data["file_name"];
                $add_data=array(
                    'title'=>$title,
                    'description'=>$description,
                    'hits'=>$hits,
                    'images'=>$name_file2,
                );

                $this->db->insert('tbl_data_counseling',$add_data);
                
                echo "<p class='alert alert-success'>Successfully Add Data</alert>";
            }
            elseif(!$this->upload->do_upload('file')){

            }
            else{

            }
        } 
    }
      
    public function feedback_data_add(){
        
        $title = $this->input->post('title');
        $gender = $this->input->post('gender');
        $date_feed = $this->input->post('date_feed');
        $feedback = $this->input->post('feedback');
        
                $add_data=array(
                    'name'=>$title,
                    'gender'=>$gender,
                    'message'=>$feedback,
                    'date'=>$date_feed,
                );
                $this->db->insert('tbl_feedback_data',$add_data);
                echo "<p class='alert alert-success'>Successfully Add Data</alert>";
        
    }
//----------------------------------------------------------------------------------------------------------------------
      
      
  }

  ?>