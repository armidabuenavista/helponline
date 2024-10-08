<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Help extends MX_Controller {
		public function __construct()    {
			parent::__construct();
			date_default_timezone_set('Asia/Hong_Kong');
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			$this->load->model('help_model');
			$this->load->database();
			$this->load->helper(array('form'));
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->helper('html');
			/* Load form validation library */
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->library('upload');
                        $this->load->model('Mdl_help');
    }
		 

		/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */public function index()
		{
	 		$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}

			$data['title'] = 'Nutrition Counseling Services';
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('ncs',$data);
		}
        
        public function tools(){
            $uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}

			$data['title'] = 'Nutrition Counseling Services';
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('tools',$data);
        }
        
        public function tracker(){
    		$uid= $this->session->id;
            $utype = $this->session->userdata['user_type_id'];
	   		$logged_in = $this->session->userdata['logged_in'];
            
	 		
			if (isset($logged_in) && !isset($uid) && isset($utype)!=1) {
              $this->session->sess_destroy();
          	}
              
			$data['title'] = 'Nutrition Counseling Services';
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('tracker',$data);
        }

		public function fast_tools()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
			$data['title'] = 'Fast Assessment Tools';
			$data['groups'] = $this->help_model->get_pa_lvl();
			$data['groups1'] = $this->help_model->get_age_group1();
			//$data['pdri_nutrients'] = $this->help_model->get_pdri();

			$page_url=current_url();
			$this ->help_model->save_count($page_url);


			$this->load->view('fast_tools',$data);
		}

		public function pdri_compute(){
			$select_nutrients = $this->input->get('nutrients',TRUE);
			$computation = $this->input->get('computation', TRUE);
			$content = $this->input->get('content', TRUE);
			$content_array= explode(",",$content);
			$select_array = explode(",",$select_nutrients);
			$array_merge = array_combine($select_array,$content_array);
			echo "<br>";
			echo "<div class=\"table-responsive\"><table class=\"table table-condensed \" border=\"0\"  cellspacing=\"0\"cellpadding=\"0\">";
			echo "<thead>";
			echo "<tr>";
				    echo "<th align=\"center\" colspan=\"2\"   style=\" font-size:30px; padding-left:160px; font-size:50px;\" ><span  align=\"center\" ><strong>Nutrition Facts</strong></span></th>";
				    //echo "<th align=\"center\">Content/ Value</th>";
				    //echo "<th align=\"center\" >%RNI</th>";
			echo "</thead>";
			echo "</tr>";
			echo "<tr>";
			//echo "<td align=\"center\"><small>Content/ Value</small></td>";
			echo "<td align=\"center\" colspan=\"2\" height=\"10\" style=\"background-color:#000000; font-size:12px; color:#FFFFFF;\">This icon is for visual representation only, it cannot be used to label products</td>";

			echo "</tr>";
			echo "<tr>";
			//echo "<td align=\"center\"><small>Content/ Value</small></td>";
			echo "<td align=\"center\" colspan=\"2\"><small>%RNI</small></td>";

			echo "</tr>";
			
			echo "<tbody>";

			//foreach($content_array as $item0){
				foreach($array_merge as $key=>$value){
					//echo $item;

				$data['get_pdri_nutrients'] = $this->help_model->get_pdri_nutrients($key);	
				
				foreach($data['get_pdri_nutrients'] as $row){
					$id = $row->id;
					$nutrients= $row->nutrients;
					$pdri_units = $row->general_units;
					if($computation == 1){
						$rni_computation = $row->general;
					}else{
						$rni_computation = $row->children;


					}

					 if ($id % 2 === 0) {
                		$progress_class = "progress-bar-primary";
              		} else {
               			$progress_class = "progress-bar-warning";
             	 	}
             	 	$rni = round((($value/$rni_computation)*100)*10) / 10 . "%";
					$rni1 = round((($value/$rni_computation)*100)*10) / 10 . "px";

					echo "<tr>";
					echo "<td style=\"border-bottom: gray solid 1px !important; font-size:16px;\"><strong>".$nutrients."(".$pdri_units.")"."</strong>".""."<input type=\"hidden\" value=\"$rni_computation\" class=\"form-control\" id=\"rni_computation$id\" name=\"computation\" /></td>";
					echo "<td width=\"500\" style=\"border-bottom: gray solid 1px !important;\">
					
					<div id=\"progress$id\" >


  <div class=\"progress-bar  progress-bar-striped active $progress_class\" role=\"progressbar\"
  aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" id=\"rni_progress$id\" style=\"color:black; width:$rni1;height:35px;\" >
  <div id=\"rni_progress_label$id\" style=\"color:black;\">$rni</div>
  </div>
</div>
<div id=\"rni_progress_label1$id\" style=\"color:black\"></div>

					<input type=\"hidden\"  class=\"form-control rni\" id=\"rni$id\" name=\"rni\" /></td>";
					echo "</tr>";

					}

			}

		//}
					echo "</tbody></table></div><br><button class=\"btn btn-danger btn-lg\" id=\"reset\" name=\"reset\">Reset</button>";





			
		}

		public function nutrition_label()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
			$data['title'] = 'Nutrition Label';
			//$data['groups'] = $this->help_model->get_pa_lvl();
			//$data['groups1'] = $this->help_model->get_age_group1();
			$data['pdri_nutrients'] = $this->help_model->get_pdri();

			$page_url=current_url();
			$this ->help_model->save_count($page_url);


			$this->load->view('nutrition_label',$data);
		}

		public function register()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(isset($_SESSION['logged_in'])){
				redirect('help/');
			}
			$data['title'] = 'Registration';
			$register   =   $this->input->post('register');
			
			if(isset($register)){
				$fname= $this->input->post('fname',TRUE);
				$mname= $this->input->post('mname',TRUE);
				$lname = $this->input->post('lname',TRUE);
				//$extn= $this->input->post('extn',TRUE);
				$gender= $this->input->post('gender',TRUE);
				$birthday= $this->input->post('birthday',TRUE);
				$address= $this->input->post('address',TRUE);
				$contact_no= $this->input->post('contact_no',TRUE);
				$email_address= $this->input->post('email_address',TRUE);
				$username= $this->input->post('username',TRUE);
				$password= $this->input->post('password',TRUE);
				$cnf_password= $this->input->post('cnf_password',TRUE);
				$user_type_id= 3;
				$module_id= 1;
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('mname', 'Middle Name', 'required');
				$this->form_validation->set_rules('lname','Last Name','required');
				//	$this->form_validation->set_rules('gender','Gender','required|greater_than[0]'); 
				//   $this->form_validation->set_rules('birthday', 'Birthday', 'required'); 
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
				$this->form_validation->set_rules('email_address', 'Email Address', 'required');
				//$this->form_validation->set_rules('email_address', 'Email', 'required|valid_email|is_unique[users.email]');
				//	$this->form_validation->set_rules('email', 'Email',  'trim|required|min_length[3]|max_length[30]|valid_email');
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules( 'password','Passsword','required');
				$this->form_validation->set_rules('cnf_password', 'Confirm Password', 'required');
				//$this->form_validation->set_rules('email_address', 'Email Address', 'required');
				//$this->form_validation->set_rules('email_address', 'Email Address', 'valid_email');
				//$this->form_validation->set_rules('email_address', 'Email Address', 'callback_email_check');
				//$this->form_validation->set_rules('captcha', 'Captcha', 'required');
				 
				if ($this->form_validation->run() == FALSE)    {
					
					$data['cap_img'] = $this ->help_model->make_captcha();
					$data['groups'] = $this->help_model->getGender();
					$this->load->view('register', $data);
				} else {
					
					if($this->help_model->check_captcha()==TRUE){
						$check_query = "SELECT * FROM users_db WHERE username='$username' OR email_address='$email_address'";
						$query = $this->db->query($check_query);
						
						if ($query->num_rows() > 0){
				 			
							$data['cap_img'] = $this ->help_model->make_captcha();
							$data['groups'] = $this->help_model->getGender();
							$data['message_return'] = 'username or email address you entered is already used by another, please change<br/>';
							$this->load->view('register', $data);
						} else {
				 			//insert
							//$data = array($lname,$fname,$mname,$gender,$birthday,$email_address,$address,$contact_no,$username,$password,$user_type_id,$module_id);
							$this->help_model->save_user();
							$this->session->set_flashdata('item', array('message' => 'You have successfully register. Please login.','class' => 'success'));
							redirect('help/register');
						}

					} else {
						
						$data['cap_img'] = $this ->help_model->make_captcha();
						$data['groups'] = $this->help_model->getGender();
						$data['message_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
						$this->load->view('register', $data);
					}

				}

			} else {
				
				$data['cap_img'] = $this ->help_model->make_captcha();
				$data['groups'] = $this->help_model->getGender();
				$data['message_return'] = '';
				$this->load->view('register', $data);
				//$register   =   $this->input->post('register');
			}

		}
		public function forgot_password()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}

			$this->load->library('My_PHPMailer');
			$nameuser = 'NCS Admin';
			$usergmail = 'ncsfnri@gmail.com';
			$password = 'ncsfnri123';
			$mail = new PHPMailer;
			$mail->isSMTP();
			// Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';
			// Specify main and backup server
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			// Enable SMTP authentication
			$mail->Username = $usergmail;
			// SMTP username
			$mail->Password = $password;
			// SMTP password
			$mail->SMTPSecure = 'ssl';
			// Enable encryption, 'ssl' also accepted
			$mail->From = $usergmail;
			$mail->FromName = $nameuser;

			$data['title']= 'Forgot Password';
			$email_address  =   $this->input->post('email_address');	
			$submit   =   $this->input->post('submit');

			if(isset($submit)){

				if($this->help_model->check_captcha()==TRUE){
						$data['results'] = $this ->help_model->get_email_address($email_address);
						$numRows = $this->help_model->getAffectedRows();

						
						if ($numRows == 0){
							
							$data['cap_img'] = $this ->help_model->make_captcha();
							
							$data['message_return'] = 'Email address not found in our database<br/>';
							$this->load->view('forgot_password', $data);
						} else {

							foreach($data['results'] as $row){
								$id= $row->id;
								$lname= $row->lname;
								$fname=$row->fname;
								$mname= $row->mname;
								$name= $lname." ".$fname." ".$mname;
								$email_address1 = $row->email_address;
								}	
		

								$mail->addReplyTo($usergmail, 'NCS FNRI');
								$mail->WordWrap = 50;
								// Set word wrap to 50 characters
								$mail->isHTML(true);
								// Set email format to HTML
								//$client_request="<a href=\"http://localhost/fnri-help/administrator/index.php\">here </a>";
								$mail->Subject = 'Forgot Password';
								$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear {CLIENT_NAME},<br /><br />
                                    Your default password: fnrincs123
                                    <br /><br />Best Regards,<br />
                                    The Nutrition Counseling Service Team<br />
                                    ncsfnri@gmail.com<br/>
                                    Tel. No.: 8372071 local 2288 or 2299<br /><br />

                                    Disclaimer: This is an automatic message. Please do not reply.</p>";
								$mail->Body = str_replace(array('{CLIENT_NAME}'),array($name), $htmlBody);
					//$mail->Body = str_replace('{TYPE}', $type, $htmlBody);
								$mail->addAddress($email_address1);
								$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



								if($mail->Send()){
									
									$default_password = md5('fnrincs123');
									
									$data = array(
        							'password'   	 => $default_password
        	
    								);
			
    								$this->db->where('id', $id);
    								$this->db->update('users_db', $data);	
    								
    								$this->session->set_flashdata('item', array('message' => 'Email sent. Please check your email for your password.','class' => 'success'));

									redirect('help/forgot_password');
								}else{
									//error
									$data['message_return'] = 'Message could not be sent at the moment. Please try again later.';	

								}

								$data['cap_img'] = $this ->help_model->make_captcha();
								$this->load->view('forgot_password',$data);	
							

						}

					} else {
						
						$data['cap_img'] = $this ->help_model->make_captcha();
						
						$data['message_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
						$this->load->view('forgot_password', $data);
					}






				
			
			}else{
				
				$data['cap_img'] = $this ->help_model->make_captcha();
				$this->load->view('forgot_password',$data);	

			}





		}

		

		public function events()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	} 
			$thismonth= date('m');
			$data['title']= 'Nutrition Counseling Services Calendar';
			$data['events'] = $this->help_model->upcoming_events($thismonth);
			$data['numRows'] = $this->help_model->getAffectedRows();
				
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('events',$data);	

		}
		public function get_events($event_date)
		{

			$event_date= $this->input->post('event_date',TRUE);

			//echo $event_date;
			$data['events'] = $this->help_model->get_events($event_date);
			$numRows = $this->help_model->getAffectedRows();
			if($numRows > 0){
			foreach($data['events'] as $row){
			$event_type_id = $row->event_type_id;
				//$appointment_id= $row->appointment_id;
		//	$event_type_id= $row->event_type_id;
			$event_type= $row->event_type;
			$custom_event_type= $row->custom_event_type;

			$event_date= date("jS \of F Y",strtotime($row->approved_date));
			$approved_time_to=$row->approved_time_to;
			
			if($approved_time_to== NULL){
				$event_time = date("h:i A",strtotime($row->approved_time_from));
			} else {
				$event_time = date("h:i A",strtotime($row->approved_time_from))."-".date("h:i A",strtotime($row->approved_time_to));
			}

			$whole_day = $row->whole_day;
			//$event_status= $row->status;
			//$assigned_rnd_id = $row->assigned_rnd_id;
			$assigned_rnd= $row->lname.", ". $row->fname." ".$row->mname;
			$all_rnd = $row->all_rnd;
			$remarks = $row->remarks;
			if($remarks == NULL || $remarks== 'none'){
			$remarks = '';	
			}else{
			$remarks = $row->remarks;	
			}
		//	$a= strtotime($row->approved_date);
			//$b= strtotime($datetime);
			

				if($event_type_id == 1){
					$x[] = array($event_type_id);
				}else{

					$y[] = array($event_type_id);
				}


			}	
			echo "<strong><i>".$event_date."</strong></i>";	
			echo "<div align=\"left\" class=\"img-thumbnail container\" style=\"text-align:left; width: 400px; margin-bottom:10px;\">";


			$a= sizeof($x);
			echo "<strong>".$a."</strong>"." ". " appointment/s for this day";
			echo "</div>";

			echo "<div align=\"left\" class=\"img-thumbnail container\" style=\"text-align:left; width: 400px;\">";
			$b= sizeof($y);
			echo "<strong>".$b."</strong>"." ". " event/s for this day";
			echo "</div>";


			/*if($event_type_id == 1){
				echo "<div align=\"left\" class=\"img-thumbnail container\" style=\"text-align:left; width: 400px;\">";
				
				$a= sizeof($x);
				echo "<strong>".$a."</strong>"." ". " appointment/s for this day";
			
				
				
				echo "<p><strong>".$event_type. "</strong></p>";
				echo "<p>".$remarks. "</p>";
				
				if($whole_day == 1){
					echo "<p>".$event_date." <br> "."whole day" ."</p>";
				} else {
					echo "<p>".$event_date." <br> ".$event_time ."</p>";
				}

				
				if($all_rnd == 1){
					echo "";
				} else {
					echo "<p>"."Assigned RND: ".$assigned_rnd."</p>";
				}

			
				echo "</div><br>";
			} else {
				$b= sizeof($y);
				echo "<strong>".$b."</strong>"." ". " event/s for this day";
				if($custom_event_type != NULL || $custom_event_type != ''){
					$event_type = "<p><strong>".$custom_event_type."</p></strong>";
				} else {
					$event_type = "<p><strong>".$event_type."</p></strong>";
					}

				echo "<div align=\"left\" class=\"img-thumbnail container\" style=\"text-align:left; width: 400px;\">";
				echo $event_type;
				echo "<p>".$remarks. "</p>";
				
				if($whole_day == 1){
					echo "<p>".$event_date." <br> "."whole day" ."</p>";
				} else {
					echo "<p>".$event_date." <br> ".$event_time ."</p>";
					}

				echo "<p>".$event_status."</p>";
				
				if($all_rnd == 1){
					echo "";
				} else {
					echo "<p>"."Assigned RND: ".$assigned_rnd."</p>";
					}


				}*/

				echo "</div><br><br>";
				//echo "<hr></hr>";

		

			}else{
					echo "No available events for this day.";

				}

		}

		public function get_event_dates() 
		{
			// header('Content-Type: application/json',true);
			$data['event_dates']= $this->help_model->get_event_dates();
			$output = array(); 
			foreach($data['event_dates'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['event_date'] = $row->approved_date;
				$temp['whole_day'] = $row->whole_day;
				$temp['all_rnd'] = $row->all_rnd;
				array_push($output,$temp);
			}

			header("Content-Type: application/json");
			echo json_encode($output);
		}

	

		public function login()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              	$this->session->sess_destroy();
          	} else if (isset($logged_in) && isset($uid)) {
          	  redirect('help/');
          		
          	}
          		$data['title']= 'Login';
				$this->load->view('loginview',$data);
			
		}
        
        public function login_ptri()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              	$this->session->sess_destroy();
          	} else if (isset($logged_in) && isset($uid)) {
          	  redirect('help/');
          		
          	}
          		$data['title']= 'Login_ptri';
				$this->load->view('login_ptri',$data);
			
		}

		
		public function logout() 
		{
			//$this->load->helper('url');
			//$this->session->unset_userdata('id');
			$this->session->sess_destroy();
			redirect('help/');
		}

		
		public function email_check($str)
		{
			
			if (stristr($str,'@uni-email-1.com') !== false) return true;
			
			if (stristr($str,'@uni-email-2.com') !== false) return true;
			
			if (stristr($str,'@uni-email-3.com') !== false) return true;
			$this->form_validation->set_message('email', 'Please provide an acceptable email address.');
			return FALSE;
		}
 
		public function bmi()
		{
			$this->load->view('fast/bmi');
		}

		public function heart_disease()
		{
			$this->load->view('fast/heart_disease');
		}

		public function hypertension()
		{
			$this->load->view('fast/hypertension');
		}

		public function type2diabetes()
		{
			$this->load->view('fast/type2diabetes');
		}

		public function cancer()
		{
			$this->load->view('fast/cancer');
		}

		public function tannhauser()
		{
			$this->load->view('fast/tannhauser');
		}

		public function energy_requirement()
		{
			$this->load->view('fast/energy_requirement');
		}

		public function physical_activity(){
			$this->load->view('fast/physical_activity');
		}

		public function calorie()
		{
			$this->load->view('fast/calorie');
		}

		public function carbohydrates()
		{
			$this->load->view('fast/carbohydrates');
		}

		public function protein()
		{
			$this->load->view('fast/protein');
		}

		public function fat()
		{
			$this->load->view('fast/fat');
		}

		public function wc(){
			$this->load->view('fast/wc');
		}

		public function whipr()
		{
			$this->load->view('fast/whipr');
		}

		public function whtr()
		{
			$this->load->view('fast/whtr');
		}
		public function pregnant()
		{
			$this->load->view('fast/pregnant');
		}

		public function get_pa_lvl_data() 
		{
			// header('Content-Type: application/json',true);
		
			$pa_lvl = $this->input->get('fast_pa_lvl');
			
			if(isset($pa_lvl)){
				$pa_lvl = $this->input->get('fast_pa_lvl');
			} else {
				$pa_lvl = $this->input->get('pa_lvl');
			}

			$data['getPa']= $this->help_model->get_pa_data($pa_lvl);
			$output = array();
			foreach($data['getPa'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['id'] = $row->id;
				$temp['pa_lvl_val'] = $row->pa_lvl_value;
				$pa_lvl_img =  $row->pa_lvl_img;
				$temp['pa_lvl_img'] = base_url('assets/images/fast/'.$pa_lvl_img.'');
				$temp['pa_lvl_desc'] = $row->pa_lvl_desc;
				array_push($output,$temp);
			}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}



		public function get_bmi_range() 
		{
			// header('Content-Type: application/json',true);
			$yrs=$this->input->get('yrs');
			$mos=$this->input->get('mos');
			$a=$this->input->get('fast_gender');
			if(isset($a)){
				$gender =$this->input->get('fast_gender'); 
			}else{
				$gender =$this->input->get('gender'); 
			}
			$v= $this->input->get('fast_bmi_val');
			if(isset($v)){
				$bmi = round($this->input->get('fast_bmi_val'),1);
			}else{
				$bmi = round($this->input->get('bmi'),1);
			}
			$bmi1 =round($bmi,1);
			

			$data['getRangeId']= $this->help_model->get_bmi_range_id($yrs,$mos,$gender);

			foreach($data['getRangeId'] as $row){
				$age_range_id= $row->id;
			}
			$data['getBmiRange']= $this->help_model->get_bmi_range_db($bmi,$bmi1,$age_range_id);
			$output = array();
			$numRows = $this->help_model->getAffectedRows();


			if($numRows > 0){
			foreach($data['getBmiRange'] as $row1){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
	


				$round_bmi_range=round($row1->bmi_range,2);

				if($yrs >=0 && $yrs <= 2){
					if($gender == 1){
							if($bmi < $round_bmi_range){

								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = 'SEVERE THINNESS';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-2-1.png';


							}else if ($bmi > $round_bmi_range){
								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = 'OBESE';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-4-1.png';

		
							}else{
	

								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = $row1->bmi;
								$temp['bmi_indicator'] = $row1->bmi_indicator;
								$temp['font_color'] = $row1->font_color;
								$temp['bmi_photo'] = $row1->bmi_photo;
	

								}

							}else{
	
							if($bmi < $round_bmi_range){

		
								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = 'SEVERE THINNESS';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-2-2.png';

							}else if ($bmi > $round_bmi_range){
								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = 'OBESE';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-4-2.png';

		
							}else{
	
								$temp['bmi_range'] = $round_bmi_range;
								$temp['bmi'] = $row1->bmi;
								$temp['bmi_indicator'] = $row1->bmi_indicator;
								$temp['font_color'] = $row1->font_color;
								$temp['bmi_photo'] = $row1->bmi_photo;
	

								}

							}

									}else if($yrs >=3 && $yrs <= 12){
										if($gender == 1){
											if($bmi < $round_bmi_range){

											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-2-1.png';

											}else if ($bmi > $round_bmi_range){
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-4-1.png';
											}else{

											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = $row1->bmi;
											$temp['bmi_indicator'] = $row1->bmi_indicator;
											$temp['font_color'] = $row1->font_color;
											$temp['bmi_photo'] = $row1->bmi_photo;
	

											}


										}else{
	
	
											if($bmi < $round_bmi_range){

											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-2-2.png';


											}else if ($bmi > $round_bmi_range){
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-4-2.png';
											}else{
	
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = $row1->bmi;
											$temp['bmi_indicator'] = $row1->bmi_indicator;
											$temp['font_color'] = $row1->font_color;
											$temp['bmi_photo'] = $row1->bmi_photo;
	
									}
	
	
	
								}
	
	
								}

								else if($yrs >=13 && $yrs <= 18){
									if($gender == 1){
											if($bmi < $round_bmi_range){

											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-2-1.png';




											}else if ($bmi > $round_bmi_range){
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-4-1.png';
											}else{


											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = $row1->bmi;
											$temp['bmi_indicator'] = $row1->bmi_indicator;
											$temp['font_color'] = $row1->font_color;
											$temp['bmi_photo'] = $row1->bmi_photo;
	

											}


										}else{
												if($bmi < $round_bmi_range){

											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-2-2.png';


											}else if ($bmi > $round_bmi_range){
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-4-2.png';
											}else{
	
											$temp['bmi_range'] = $round_bmi_range;
											$temp['bmi'] = $row1->bmi;
											$temp['bmi_indicator'] = $row1->bmi_indicator;
											$temp['font_color'] = $row1->font_color;
											$temp['bmi_photo'] = $row1->bmi_photo;
	
									}	







										}
	
	

	
									}else{


										if($gender == 1){
	
											if($bmi < $round_bmi_range){
												$temp['bmi_range'] = $round_bmi_range;
												$temp['bmi'] = 'SEVERE THINNESS';
												$temp['bmi_indicator'] = 'HIGHER RISK';
												$temp['font_color'] = '#ff0000';
												$temp['bmi_photo'] = 'bmi_male-1.svg';


												}else if ($bmi > $round_bmi_range){
													$temp['bmi_range'] = $round_bmi_range;
													$temp['bmi'] = 'OBESE';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_male-7.svg';
													
												
												}else{
													$temp['bmi_range'] = $round_bmi_range;
													$temp['bmi'] = $row1->bmi;
													$temp['bmi_indicator'] = $row1->bmi_indicator;
													$temp['font_color'] = $row1->font_color;
													$temp['bmi_photo'] = $row1->bmi_photo;
												
												

												}

											}else{
												
	
												if($bmi < $round_bmi_range){
													$temp['bmi_range'] = $round_bmi_range;
													$temp['bmi'] = 'SEVERE THINNESS';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_female-1.svg';


												}else if ($bmi > $round_bmi_range){
													$temp['bmi_range'] = $round_bmi_range;
													$temp['bmi'] = 'OBESE';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_female-7.svg';
													
												
												}else{
													$temp['bmi_range'] = $round_bmi_range;
													$temp['bmi'] = $row1->bmi;
													$temp['bmi_indicator'] = $row1->bmi_indicator;
													$temp['font_color'] = $row1->font_color;
													$temp['bmi_photo'] = $row1->bmi_photo;
												
												

												}
	
	
	
													}		







									}




				}




				array_push($output,$temp);
		

		}else{

		$data['getLowBmiRange']= $this->help_model->get_low_bmi_range_db($age_range_id);
			foreach($data['getLowBmiRange'] as $row){
				$low_bmi_range=round($row->bmi_range,2);
            }
		$data['getHighBmiRange']= $this->help_model->get_low_bmi_range_db($age_range_id);
			foreach($data['getHighBmiRange'] as $row1){
				$high_bmi_range=round($row1->bmi_range,2);
            }
	
	

				if($yrs >=0 && $yrs <= 2){
					if($gender == 1){
							if($bmi < $low_bmi_range){

								$temp['bmi_range'] = $bmi;
								$temp['bmi'] = 'SEVERE THINNESS';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-2-1.png';


							}else if ($bmi > $high_bmi_range){
								$temp['bmi_range'] = $bmi;
								$temp['bmi'] = 'OBESE';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-4-1.png';

		
							}

							}else{
	
							if($bmi < $low_bmi_range){

		
								$temp['bmi_range'] = $bmi;
								$temp['bmi'] = 'SEVERE THINNESS';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-2-2.png';

							}else if ($bmi > $high_bmi_range){
								$temp['bmi_range'] = $bmi;
								$temp['bmi'] = 'OBESE';
								$temp['bmi_indicator'] = 'HIGHER RISK';
								$temp['font_color'] = '#ff0000';
								$temp['bmi_photo'] = '02-4-2.png';

		
							}

							}

									}else if($yrs >=3 && $yrs <= 12){
										if($gender == 1){
											if($bmi < $low_bmi_range){

											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-2-1.png';

											}else if ($bmi > $high_bmi_range){
											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-4-1.png';
											}


										}else{
	
	
											if($bmi < $low_bmi_range){

											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-2-2.png';


											}else if ($bmi > $high_bmi_range){
											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '312-4-2.png';
											}
	
	
	
								}
	
	
								}

								else if($yrs >=13 && $yrs <= 18){
									if($gender == 1){
											if($bmi < $low_bmi_range){

											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-2-1.png';




											}else if ($bmi > $high_bmi_range){
											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-4-1.png';
											}


										}else{
												if($bmi < $low_bmi_range){

											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'SEVERE THINNESS';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-2-2.png';


											}else if ($bmi > $high_bmi_range){
											$temp['bmi_range'] = $bmi;
											$temp['bmi'] = 'OBESE';
											$temp['bmi_indicator'] = 'HIGHER RISK';
											$temp['font_color'] = '#ff0000';
											$temp['bmi_photo'] = '1318-4-2.png';
											}



										}
	
	

	
									}else{


										if($gender == 1){
	
											if($bmi < $low_bmi_range){
												$temp['bmi_range'] = $bmi;
												$temp['bmi'] = 'SEVERE THINNESS';
												$temp['bmi_indicator'] = 'HIGHER RISK';
												$temp['font_color'] = '#ff0000';
												$temp['bmi_photo'] = 'bmi_male-1.svg';


												}else if ($bmi > $high_bmi_range){
													$temp['bmi_range'] = $bmi;
													$temp['bmi'] = 'OBESE';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_male-7.svg';
													
												
												}

											}else{
												
	
												if($bmi < $low_bmi_range){
													$temp['bmi_range'] = $bmi;
													$temp['bmi'] = 'SEVERE THINNESS';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_female-1.svg';


												}else if ($bmi > $high_bmi_range){
													$temp['bmi_range'] = $bmi;
													$temp['bmi'] = 'OBESE';
													$temp['bmi_indicator'] = 'HIGHER RISK';
													$temp['font_color'] = '#ff0000';
													$temp['bmi_photo'] = 'bmi_female-7.svg';
													
												
												}
	
	
	
													}		







									}










		
		
		array_push($output,$temp);
		





			}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}



		public function get_dbw_range()
		{
			$yrs=$this->input->get('yrs1');
			$mos=$this->input->get('mos1');
			$gender=$this->input->get('fast_gender');

			$data['getRangeId']= $this->help_model->get_dbw_range_id($yrs,$mos,$gender);
			$output = array();
			foreach($data['getRangeId'] as $row){
				$age_range_id= $row->id;

			}
			$data['getLowDbw']= $this->help_model->get_low_dbw_range_db($age_range_id);
			foreach($data['getLowDbw'] as $row1){
				$low_dbw_range=round($row1->wt_range,2);

				}
			$data['getHighDbw']= $this->help_model->get_high_dbw_range_db($age_range_id);
			foreach($data['getHighDbw'] as $row2){
				$high_dbw_range=round($row2->wt_range,2);

				}

			$temp['lower'] = $low_dbw_range;
			$temp['upper'] = $high_dbw_range;

		

			array_push($output,$temp);
			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);



		}

		public function select_gestation()
		{
		
			
			$gestation_wks=$this->input->get('gestation_wks');


			$y= $this->input->get('fast_ht1');

			if(isset($y)){
				$ht=round($this->input->get('fast_ht1')/1)*1;
			}else{
				$ht=round($this->input->get('ht')/1)*1;
			}


		
			

			$data['getGestation']= $this->help_model->get_gestation($gestation_wks,$ht);
			$output = array();
			foreach($data['getGestation'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['gestation_value'] = $row->gestation_value;
				$temp['dbw_photo'] = $row->dbw_photo;
				//$pa_lvl_img =  $row->pa_lvl_img;
				//$temp['pa_lvl_img'] = base_url('assets/images/fast/'.$pa_lvl_img.'');
				//$temp['pa_lvl_desc'] = $row->pa_lvl_desc;
				array_push($output,$temp);


				//$results[] = array('gestation_value' => $row->gestation_value,'dbw_photo'=>$row->dbw_photo);
			}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);


		}



		public function rangeList()
		{
			$selected_opt= $this->input->post('selected_opt');


			if($selected_opt == 'lbs'){
					for ($i=0; $i<=1100; $i++) {
   						echo "<option>$i</option>";

				}


			}else if($selected_opt == 'kgs'){
					for ($i=0; $i<=500; $i++) {
   						echo "<option>$i</option>";

				}

			}else if($selected_opt == 'in'){
					for ($i=20; $i<=80; $i++) {
   						echo "<option>$i</option>";

				}

			}else if($selected_opt == 'cm'){
					for ($i=50; $i<=180; $i++) {
  					 	echo "<option>$i</option>";

				}



						}

		}

		public function select_age_group()
		{
			$age_group=$this->input->get('age_group');
			$gender=$this->input->get('fast_genderx');

			$data['getAgeGroup']= $this->help_model->get_age_group($age_group,$gender);
			$output = array();
			foreach($data['getAgeGroup'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['cal'] = $row->cal;
				
				
				array_push($output,$temp);


				//$results[] = array('gestation_value' => $row->gestation_value,'dbw_photo'=>$row->dbw_photo);
			}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);



		}

		public function get_age_group()
		{			
			$selected_opt=$this->input->get('selected_opt');

			if($selected_opt == 1){
			 	echo "<option value=\"0\" >--Age Group--</option>";
					
				$data['getAgeGroup1']= $this->help_model->get_age_group1();

				foreach($data['getAgeGroup1'] as $row1){
					echo "<option value=\"$row1->id\"   data-placement=\"right\"  >".$row1->age_group."</option>";	
				}
				
	
			}else{
	
				echo "<option value=\"0\" >--Age Group--</option>";
					
				$data['getAgeGroup2']= $this->help_model->get_age_group2();

				foreach($data['getAgeGroup2'] as $row2){
					echo "<option value=\"$row2->id\"   data-placement=\"right\"  >".$row2->age_group."</option>";	
				}
	
	
			}


		}
		public function help_tracker()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		$user_type_id = $this->session->user_type_id;

	 		

			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
			$data['title'] = 'Healthy Eating Lifestyle Program';
		
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('ncs',$data);
		}
		public function publications()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
			$data['title'] = 'Publications';
			
			$page_url=current_url();
			$this ->help_model->save_count($page_url);

			$data['infographics'] = $this->help_model->get_infographics();
			$data['brochures'] = $this->help_model->get_brochures();

			$this->load->view('publications',$data);
		}

		public function contact_us()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
			$data['title'] = 'Contact Us';
			$this->load->library('My_PHPMailer');
			$nameuser = 'NCS FNRI';
			$usergmail = 'ncsfnri@gmail.com'; //module email
			$password = 'ncsfnri123'; //module password
			$mail = new PHPMailer;
			$mail->isSMTP();
			// Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';
			// Specify main and backup server
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			// Enable SMTP authentication
			$mail->Username = $usergmail;
			// SMTP username
			$mail->Password = $password;
			// SMTP password
			$mail->SMTPSecure = 'ssl';
			// Enable encryption, 'ssl' also accepted
			$mail->From = $usergmail;
			$mail->FromName = $nameuser;
			$submit   =   $this->input->post('submit');
			if(isset($submit)){
				$name= $this->input->post('name',TRUE);
				$email_address= $this->input->post('email_address',TRUE);
				$subject= $this->input->post('subject',TRUE);
				$message= $this->input->post('message',TRUE);
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('email_address', 'Email Address', 'required');
				$this->form_validation->set_rules('subject','Subject','required');
				$this->form_validation->set_rules('message','Message','required');
				if ($this->form_validation->run() == FALSE)    {
					$data['cap_img'] = $this ->help_model->make_captcha();
					$this->load->view('contact_us', $data);
				}else{
					if($this->help_model->check_captcha()==TRUE){
						/*$check_query = "SELECT * FROM comments_db WHERE email_address='$email_address' AND DATE(`submitted_on`) = CURDATE()";
						$query = $this->db->query($check_query);
						
						if ($query->num_rows() > 0){
							
							$data['cap_img'] = $this ->help_model->make_captcha();
							$data['message_return'] = 'You have already submitted a comment for this day. Please wait for another day.<br/>';
							$this->load->view('contact_us', $data);
						} else {*/
							

							$data['all_rnd_email_address'] = $this->help_model->get_all_rnd_email_address();

						foreach ($data['all_rnd_email_address'] as $row1) {
							$all_rnd_email_address= $row1->email_address;
							$mail->Subject = 'Comments/ Feedbacks';
							$mail->AddCC($all_rnd_email_address);
							$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear administrator and users,<br /><br />
	 The system received comments/ feedbacks from {NAME}.<br/><br/>

	 Comments/Feedbacks:<br/><br/> 
	 {SUBJECT}<br/><br/>
	 {MESSAGE} <br/><br/>
	 Please dont forget to reply to his/ her email address: {EMAIL_ADDRESS}.
	 
	  <br /><br />
	 <br /><br />Sincerely,<br />NCS System<br /></p>";
	
							$mail->Body = str_replace(array('{NAME}','{SUBJECT}','{MESSAGE}','{EMAIL_ADDRESS}'),array($name,$subject,nl2br($message),$email_address),$htmlBody);
							$mail->IsHTML(true);
							$mail->ClearAddresses();
						//}

						if($mail->Send()){
						
							//insert
							$this->help_model->save_comment();
							$this->session->set_flashdata('item', array('message' => 'Comment successfully submitted. Please wait for response.','class' => 'success'));
							redirect('help/contact_us');

						}else{
				
							$this->session->set_flashdata('item', array('message' => 'Message could not be sent at the moment. Please try again later.','class' => 'danger'));
							redirect('help/contact_us');

						}	
							
							}	

					}else{
						$data['cap_img'] = $this ->help_model->make_captcha();
						
						$data['message_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
						$this->load->view('contact_us', $data);

					}


				}

			}else{
				$data['cap_img'] = $this ->help_model->make_captcha();
				$page_url=current_url();
				$this ->help_model->save_count($page_url);
				$data['message_return'] = '';
				$this->load->view('contact_us',$data);

			}
			
			
		}




		public function sidebar()
		{
		
			$uid= $this->session->id;
			
			//$module_id= $this->session->module_id;
			
			
			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){
				$photo = $row->photo;

				if($photo == NULL){
					$data['photo']='no_photo.png';
				}else{
					$data['photo']= $row->photo;

				}
			

			}	
			$this->load->view('sidebar',$data);
		}


		public function get_fooditem_data() 
		{
			header('Content-Type: application/json',true);
			$fooditem = $this->input->get('term');
			$data['getFooditem']= $this->help_model->get_fooditem($fooditem);
			$numRows = $this->help_model->getAffectedRows();

			if($numRows>0){

			$output = array();
			foreach($data['getFooditem'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				$foodname= $row->food_name;
				$foodcode= $row->foodcode;
				$ep= $row->ep;
				$cal= $row->energy;
				$cho= $row->chocdf;
				$pro= $row->protein;
				$fat= $row->fatce;
				$cooking_method = $row->cooking_method;
				$conversion_factor = $row->conversion_factor;


				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['label']=$foodname;
				$temp['foodcode']=$foodcode;
				$temp['ep']=$ep;
				$temp['cal']=$cal;
				$temp['cho']=$cho;
				$temp['pro']=$pro;
				$temp['fat']=$fat;
				array_push($output,$temp);
			}

				}else{

			$data['getFooditem1']= $this->help_model->get_fooditem_alt_name($fooditem);
			$numRows = $this->help_model->getAffectedRows();		

			$output = array();

			foreach($data['getFooditem1'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				$foodname= $row->alt_name;
				$foodcode= $row->foodcode;
				$ep= $row->ep;
				$cal= $row->energy;
				$cho= $row->chocdf;
				$pro= $row->protein;
				$fat= $row->fatce;
				$cooking_method = $row->cooking_method;
				$conversion_factor = $row->conversion_factor;


				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['label']=$foodname;
				$temp['foodcode']=$foodcode;
				$temp['ep']=$ep;
				$temp['cal']=$cal;
				$temp['cho']=$cho;
				$temp['pro']=$pro;
				$temp['fat']=$fat;
				array_push($output,$temp);
			}


				}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}
 
		public function foodtracker()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
		 	$data['title']= 'Food Tracker';
           	$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
            $uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}	
		

    

            $this->load->view('foodtracker',$data);
          
		}


		public function create_foodtracker()
		{
		  	$foodtracker_js             = base_url("assets/js/foodtracker.js");
          	echo "<script type=\"text/javascript\" src=\"$foodtracker_js\"></script>";
          
			$entry_date= date('Y-m-d');
            $txtdate= date('l jS F Y');
            $uid= $this->session->id;
            echo " <div class=\"main-content\" >";
            echo "<div class=\"fluid-container\">";
            echo "<div class=\"container\" style=\"margin-top: 20px;\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-md-10\"  >";
            echo "<h2 >Food Tracker</h2>";
            echo "<hr class=\"colorgraph\"></hr>";
            // echo "<div class=\"col-md-12\" >";
            echo "<div class=\"form-group form-inline\" align=\"right\" >";
            //$food_entry_date=$this->input->post('food_entry_date',TRUE);
			//$a=base_url('help/search_foodtracker/food_entry_date/'$food_entry_date);
            //echo "<form name=\"form\" id=\"form\" method=\"GET\" action=\"$a\">";
            echo "<input type=\"text\" placeholder=\"$txtdate\" class=\"form-control\" id=\"food_entry_date\" name=\"food_entry_date\" /> <a id=\"search_food_date\"  class=\"btn btn-primary\"> Go!</a>";
            echo " </div>";
           // echo "</form>";
            // echo "</div>";
            $data['results'] = $this->help_model->get_meal();
            echo "<div id=\"meal_div\">";
            foreach($data['results'] as $row){
                $meal_id = $row->id;
                $meal_name = $row->meal_name;
                echo  "<h3>".$meal_name."</h3>";
                //$data['meal_name'].=$meal_name;
                $data['results1'] = $this->help_model->get_menu($meal_id,$uid,$entry_date);
                echo "<div>";
                echo "<div align=\"right\" style=\"margin-bottom: 10px;\"><div class=\"form-group form-inline\"><input type=\"text\" class=\"form-control text-box menu  \" id=\"menu_name$meal_id\" name=\"menu_name\"  placeholder=\"Enter menu name\">
            <button class=\"btn btn-primary add_menu btn-sm \" data-meal_id=\"$meal_id\"   data-entry_date=\"$entry_date\" id=\"meal_id\" value=\"$meal_id\" >Create </button></div></div>";
                echo "<div id=\"alert$meal_id\" tabindex=\"1\" ></div><br><br><br>";
                foreach($data['results1'] as $row1){
                    $menu_id= $row1->id;
                    $menu_name= $row1->menu_name;
                    echo "<br>";
                    echo "<h4><a id=\"$menu_id\"  href=\"#\" class=\"edit_menu\">&nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\" class=\"delete_menu\"><span class=\"glyphicon glyphicon-minus-sign\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\"  class=\"copy_menu\"><span class=\"glyphicon glyphicon-duplicate\"></span></a>&nbsp;"."<i >".$menu_name."</i></h4>";
                    echo "<div class=\"table-responsive\" ><table   border=\"1\" class=\"table table-striped\">";
                   echo "<tr>
		<th>Image</th>
		<th>Fooditem</th>
		<th >Quantity</th>
		<th >Unit</th>
		<th>Weight (EP)</th>
		<th>Cal (KCAL)</th>
		<th>C (gm)</th>
		<th>P (gm)</th>
		<th>F (gm)</th>
		<th colspan=\"2\">Action</th>
		
		</tr>";
                    $data['results2'] = $this->help_model->get_food($menu_id,$meal_id,$uid,$entry_date);
                    $total_cal= 0;
                    $total_cho= 0;
                    $total_pro= 0;
                    $total_fat= 0;
                    foreach($data['results2'] as $row2){
                        $id= $row2->id;
                        $fooditem= $row2->food_name;
                        $hh_val= $row2->hh_val;
                     	$hh_m= $row2->foodunit;
                        $ep_wt= $row2->ep_wt;
                        $cal= $row2->cal;
                        $total_cal += $cal;
                        $cho= $row2->cho;
                        $total_cho += $cho;
                        $pro= $row2->pro;
                        $total_pro+=$pro;
                        $fat= $row2->fat;
                        $total_fat += $fat;
                        $image= $row2->image;

                        $k= base_url("assets/images/meal_photos/$image");
                        echo "<tr>";
                        echo "<td><img src=\"$k\" alt=\"Meal\" width=\"50%\" height=\"50%\" class=\"img-thumbnail img\"></td>";
                        echo "<td>$fooditem</td>";
                        echo "<td>$hh_val</td>";
                        echo "<td>$hh_m</td>";
                        echo "<td align=\"right\">$ep_wt</td>";
                        echo "<td align=\"right\">$cal</td>";
                        echo "<td align=\"right\">$cho</td>";
                        echo "<td align=\"right\">$pro</td>";
                        echo "<td align=\"right\">$fat</td>";
                        echo "<td width=\"10\"><a href=\"#\" id=\"$id\"    data-meal_code=\"$meal_code\" data-meal_id=\"$meal_id\" data-menu_id=\"$menu_id\" class=\"edit_food\"  ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
                        echo "<td width=\"10\"><a id=\"$id\"  href=\"#\" class=\"delete_food\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
                        echo "</tr>";
                        echo "<tr >";
                        echo "</tr>";
                    }
                    echo "<tr >";
					//	echo "<td colspan=\"4\" align=\"right\"></td>";
					echo "<td colspan=\"5\" align=\"right\"><strong>Total</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_cal</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_cho</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_pro</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_fat</strong></td>";
					echo "<td colspan=\"2\" align=\"right\"><strong></strong></td>";
					echo "</tr>";
                  
                    echo "<tr>";
                    echo "<td width=\"150\">
                            <input type=\"file\" id=\"aa$menu_id\" name=\"aa\"  style=\"width: 150px;\"  /></td>";
                    echo "<td><input type=\"text\" name=\"fooditem\" id=\"fooditem$menu_id\" style=\"width: 150px;\" class=\"form-control fooditem\" data-count=\"$menu_id\" /><input type=\"hidden\" name=\"fic\" id=\"fic$menu_id\"  class=\"form-control\" /></td>";
                    echo "<td><input type=\"text\" style=\"width: 50px;\" class=\"form-control hh_val\" name=\"hh_val\" id=\"hh_val$menu_id\" data-count=\"$menu_id\" /></td>";
                    echo "<td>";
                    echo  "<select  name=\"hh_m\" id=\"hh_m$menu_id\" class=\" hh_m  form-control\" style=\"width:100px;\" >";
                   // echo "<option value=\"0\">--Household Measure--</option>";
                    $data['groups'] = $this->help_model->get_hh_m();
                    foreach($data['groups'] as $row3)            {
                     $id= $row3->id;
                     $foodunit = $row3->foodunit;
                        echo "<option  value=\"$id\"  >".$foodunit."</option>";
                    }

                    echo "</select>";
                    echo "</td>";

                    echo "<td><input type=\"text\" id=\"ep_wt$menu_id\" class=\"form-control ep_wt\" size=\"5\" data-count=\"$menu_id\" /><input type=\"hidden\" id=\"ep_wt_val$menu_id\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_ep$menu_id\" name=\"comp_ep\" class=\"form-control\" size=\"5\" /></td>";
							
                    echo "<td><strong><span id=\"cal_label$menu_id\"></span></strong><input type=\"hidden\" id=\"cal$menu_id\" id=\"cal\" class=\"form-control\" size=\"5\"/><input type=\"hidden\" id=\"comp_cal$menu_id\" name=\"comp_cal\" class=\"form-control\" size=\"5\"/></td>";
                    echo "<td><strong><span id=\"cho_label$menu_id\"></span></strong><input type=\"hidden\" id=\"cho$menu_id\" id=\"cho\" class=\"form-control\" size=\"5\"/><input type=\"hidden\" id=\"comp_cho$menu_id\" name=\"comp_cho\" class=\"form-control\" size=\"5\"/></td>";
                    echo "<td><strong><span id=\"pro_label$menu_id\"></span></strong><input type=\"hidden\" id=\"pro$menu_id\" name=\"pro\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_pro$menu_id\" name=\"comp_pro\" class=\"form-control\" size=\"5\"/></td>";
                    echo "<td><strong><span id=\"fat_label$menu_id\"></span></strong><input type=\"hidden\" id=\"fat$menu_id\" id=\"fat\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_fat$menu_id\" name=\"comp_fat\" class=\"form-control\" size=\"5\"/></td>";
                    echo "<td align=\"center\" colspan=\"7\">";
                    echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><button class=\"btn btn-primary add_food btn-sm\" data-menu_id=\"$menu_id\" data-meal_id=\"$meal_id\"   data-entry_date=\"$entry_date\" data-count=\"$menu_id\" id=\"add_food\" value=\"$menu_id\"   ><span class=\"glyphicon glyphicon-plus\"></span></button>";
                    echo "</td>";
                    echo "</tr>";



                    echo "<tr >";
                    //    echo "<td colspan=\"4\" align=\"right\"></td>";
                    echo "<td colspan=\"11\" align=\"right\">";
                   	$a = round(($total_cal*100)/100);
                   	$b = round(($total_cho*100)/100);
                   	if($a>100){
                   		$a = "80"."%";	
                   	}else if ($a < 5){
                   		$a = "15"."%";
                   	}else{
                   		$a = round(($total_cal*100)/100)."%";
                   	}

                   	if($b < 5){
                   		$b = "15"."%";	
                   	}else{
                   		$b = round(($total_cho*100)/100)."%";
                   	}
                   
                   	$c = round(($total_pro*100)/100);	
                   	if($c < 5){
                   		$c = "15"."%";	
                   	}else{
                   		$c = round(($total_pro*100)/100)."%";
                   	}
                   	$d = round(($total_fat*100)/100)."%";	

                   	if($d < 5){
                   		$d = "15"."%";	
                   	}else{
                   		$d = round(($total_fat*100)/100)."%";
                   	}	

                    echo "<div class=\"progress\">";
  						echo "<div class=\"progress-bar progress-bar-default progress-bar-striped\" role=\"progressbar\" style=\"width:$a\">"."Calories ".$total_cal."</div>";
  						
  						echo "<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" style=\"width:$b\">".
    					"Carbohydrates ".$total_cho."
  						</div>";
  						echo "<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\" style=\"width:$c\">".
    					"Protein ".$total_pro."
  						</div>";

  						echo "<div class=\"progress-bar progress-bar-danger progress-bar-striped\" role=\"progressbar\" style=\"width:$d\">".
    					"Fat ".$total_fat."
  						</div>";
					echo "</div>";

                    echo "</td>";
                   /* echo "<td colspan=\"1\" align=\"right\"><strong>$total_cal</strong></td>";
                    echo "<td colspan=\"1\" align=\"right\"><strong>$total_cho</strong></td>";
                    echo "<td colspan=\"1\" align=\"right\"><strong>$total_pro</strong></td>";
                    echo "<td colspan=\"1\" align=\"right\"><strong>$total_fat</strong></td>";*/
                    //echo "<td colspan=\"2\" align=\"right\"><strong></strong></td>";
                    echo "</tr>";
                    echo "</table></div>";
                }

                echo "</div>";
            }

            echo "</div><br>";
          
            echo "</div></div></div></div></div>";



		}

		public function save_menu()
		{
			$menu_name=$this->input->post('menu_name',TRUE);
			//$client_id= $this->input->post('client_id',TRUE);
			$uid= $this->session->id;
			$meal_id= $this->input->post('value',TRUE);
			$entry_date=$this->input->post('entry_date',TRUE);
			$this->form_validation->set_rules( 'menu_name','Menu Name','required');
			
			if ($this->form_validation->run() == FALSE) {
				echo "error";
			} else {
				//$data = array($menu_name,$uid,$meal_id,$entry_date);
				$this->help_model->save_menu();
				echo "success";
			}

		}

		public function save_food()
		{
			$this->help_model->save_food();
			echo "success";

		}


		

		public function edit_menu($id)
		{
			$id=$this->input->get('id',TRUE);
			$data['menu_id']= $this->help_model->get_menu_id($id);
			$this->load->view('edit_menu',$data);
		}

		public function update_menu()
		{
			$menu_id = $this->input->post('menu_id',TRUE);
			$menu_name = $this->input->post('menu_name',TRUE);
			//$data = array($menu_name,$menu_id);
			$this->form_validation->set_rules( 'menu_name','Menu Name','required');
			
			if ($this->form_validation->run() == FALSE) {
				echo "error";
			} else {
				//$data = array($menu_name,$uid,$meal_id,$entry_date);
				$this->help_model->update_menu();
				echo "success";
			}

		}

		public function delete_menu($id)
		{ 
			$id = $this->input->post('id',TRUE);
			$where='id';
			if($this->help_model->delete_menu($where,$id) == TRUE){
				$where= 'menu_id';
				$this->help_model->delete_food($where,$id);

			}
			//redirect('help/foodtracker');
		}

		public function edit_food($id)
		{
			$foodtracker_js             = base_url("assets/js/foodtracker.js");
          	echo "<script type=\"text/javascript\" src=\"$foodtracker_js\"></script>";
			$id=$this->input->get('id',TRUE);
			$data['food_id']	= $this->help_model->get_food_id($id);
			$data['groups']		= $this->help_model->get_hh_m();
			$this->load->view('edit_food',$data);
		}

		public function update_food()
		{
			$fic=$this->input->get('fic1',TRUE);
			$hh_val=$this->input->get('hh_val1',TRUE);
			$hh_m=$this->input->get('hh_m1',TRUE);
			$ep_wt= $this->input->get('ep_wt1',TRUE);
			$cal= $this->input->get('comp_cal1',TRUE);
			$cho=  $this->input->get('comp_cho1',TRUE);
			$pro= $this->input->get('comp_pro1',TRUE);
			$fat= $this->input->get('comp_fat1',TRUE);
			$id= $this->input->get('rowid',TRUE);
			
			if(!empty($_FILES['file']['name']) && $_FILES['file']['name'] != $this->input->get('image1')){
				$config['upload_path'] = './assets/images/meal_photos/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['file']['name'];
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				// $this->upload->do_upload('file');
				// $picture = $_FILES['file']['name'];
				
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$picture =$_FILES['file']['name'];
				} else {
					$picture = 'no_photo.png';
				}

			} else {
				$picture=$this->input->get('image1');
			}

			//$data = array($fic,$hh_val,$hh_m,$ep_wt,$cal,$cho,$pro,$fat,$picture,$id);
			$this->help_model->update_food();
			echo "success";
		}

		public function delete_food($id)
		{
			$id = $this->input->post('id',TRUE);

			$data['result'] = $this->help_model->get_meal_photo($id);
			foreach($data['result'] as $row){	
				$image = $row->image;

			}

			//$x= base_url("assets/images/meal_photos/$image");
			$x= "./assets/images/meal_photos/$image";
			if($image == 'no_photo.png'){
				$where= 'id';
				$this->help_model->delete_food($where,$id);

			}else{

				if(unlink($x)){
					$where= 'id';
					$this->help_model->delete_food($where,$id);
				}else{
					echo "error";

				}
			
			}

			
			//redirect('help/foodtracker');
		}

		public function copy_menu($menu_id)
		{
			$menu_id = $this->input->get('id',TRUE);
			$data['menu_id']= $menu_id;
			$data['groups']= $this->help_model->get_meal();
			$this->load->view('copy_menu',$data);
		}

		public function copy_menu_action($menu_id,$copy_to)
		{
			$menu_id = $this->input->post('copy_menu_id',TRUE);
			$copy_meal_to = $this->input->post('copy_to',TRUE);
			
			if(isset($menu_id) &&  isset($copy_meal_to)){
				$data['menu']= $this->help_model->menu($menu_id);
				foreach($data['menu'] as $row){
					$menu_name= $row->menu_name;
					$uid= $row->client_id;
					$meal_id= $row->meal_id;
					$entry_date=$row->entry_date;
					//$data = array($menu_name,$uid,$copy_meal_to,$entry_date);
					/*$sql = "INSERT INTO menu_tracker_db(menu_name,client_id,meal_id,entry_date,submitted_on) VALUES (?,?,?,?,NOW())";
			         $this->db->query($sql, $data);*/
					$data = array(
        			'menu_name'   	 => $menu_name,
        			'client_id' 	 => $uid,
        			'meal_id' 		 => $copy_meal_to,
			        'entry_date' 	 => $entry_date,
			    	'submitted_on' 	 => date('Y-m-d H:i:s')
    				);
	
    				$this->db->insert('menu_tracker_db', $data);



					$data['last_menu_id']= $this->help_model->get_last_menu_id();
					foreach($data['last_menu_id'] as $row1){
						$last_menu_id= $row1->id;
					}

				}

				$data['meal']= $this->help_model->meal($menu_id);
				foreach($data['meal'] as $row2){
					$client_id= $row2->client_id;
					//$meal_menu_id= $row1->menu_id;
					//$meal_id = $row1->meal_id;
					$fic= $row2->fooditem_code;
					$hh_val= $row2->hh_val;
					$hh_m= $row2->hh_m;
					$ep_wt= $row2->ep_wt;
					$cal= $row2->cal;
					$cho= $row2->cho;
					$pro= $row2->pro;
					$fat= $row2->fat;
					$image= $row2->image;
					$entry_date= $row2->entry_date;
					//$data1 = array($client_id,$last_menu_id,$copy_meal_to,$fic,$hh_val,$hh_m,$ep_wt,$cal,$cho,$pro,$fat,$image,$entry_date);

				//	$sql = "INSERT INTO foodtracker_db(client_id,menu_id,meal_id,fooditem_code,hh_val,hh_m,ep_wt,cal,cho,pro,fat,image,entry_date,submitted_on) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";


					$data1 = array(
		        	'client_id'   	 => $client_id,
		        	'menu_id' 	 	 => $last_menu_id,
		        	'meal_id' 		 => $copy_meal_to,
			        'fooditem_code'  => $fic,
			    	'hh_val' 	 	 => $hh_val,
			    	'hh_m' 	 		 => $hh_m,
			    	'ep_wt' 	 	 => $ep_wt,
			    	'cal' 	 		 => $cal,
			    	'cho' 	 		 => $cho,
			    	'pro' 	 		 => $pro,
			    	'fat' 	 		 => $fat,
			    	'image' 		 => $image,
			    	'entry_date' 	 => $entry_date,
			    	'submitted_on' 	 => date('Y-m-d H:i:s')

    				);
			
    				$this->db->insert('foodtracker_db', $data1);


					
				}

				//$this->help_model->copy_menu($data);
				echo "success";
			}

		}

		public function get_food_entry_dates() 
		{
			// header('Content-Type: application/json',true);
		
			$uid= $this->session->id;
			$data['entry_dates']= $this->help_model->get_food_entry_dates($uid);
			$output = array();
			foreach($data['entry_dates'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['entry_date'] = $row->entry_date;
				array_push($output,$temp);
			}

			header("Content-Type: application/json");
			echo json_encode($output);
		}

		public function search_foodtracker($entry_date)
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$data['title']= 'Search Food Tracker';
			$client_header = $this->load->view('client_header',$data,true);
			echo $client_header;
			//$sidebar = $this->load->view('sidebar','',true);
			//echo $sidebar;
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}	
			$this->load->view('sidebar',$data);
			$data['entry_date'] = $entry_date;
			$txtdate= date('l jS F Y',strtotime($entry_date));
			$uid= $this->session->id;
			//echo $entry_date;

			// echo "</div>";
		
			$this->load->view('search_foodtracker',$data);
			$this->load->view('client_footer');
		}


		public function create_search_foodtracker($entry_date)
		{
			
		
			$foodtracker_js             = base_url("assets/js/foodtracker.js");
          	echo "<script type=\"text/javascript\" src=\"$foodtracker_js\"></script>";
			
			$txtdate= date('l jS F Y',strtotime($entry_date));
			$uid= $this->session->id;
		
			$aa             = base_url("assets/js/client.js");
          	$bb             = base_url("assets/js/client_func.js");
          	echo "<script type=\"text/javascript\" src=\"$aa\"></script>";
          	echo "<script type=\"text/javascript\" src=\"$bb\"></script>";
			$data['results'] = $this->help_model->get_meal();
			echo " <div class=\"main-content\" >";
			echo "<div class=\"fluid-container\">";
			echo "<div class=\"container\" style=\"margin-top: 20px;\">";
			echo "<div class=\"row\">";
			echo "<div class=\"col-md-10\"  >";
			echo "<h3>$txtdate</h3>";
			echo "<hr class=\"colorgraph\"></hr>";
			$a=base_url('help/foodtracker');
			echo "<a href=\"$a\" class=\"btn btn-primary\">Search Again</a>";
			echo "<div id=\"meal_div\">";
			foreach($data['results'] as $row){
				$meal_id = $row->id;
				$meal_name = $row->meal_name;
				echo  "<h3>".$meal_name."</h3>";
				//$data['meal_name'].=$meal_name;
				$data['results1'] = $this->help_model->get_menu($meal_id,$uid,$entry_date );
				echo "<div>";
				echo "<div align=\"right\" style=\"margin-bottom: 10px;\"><div class=\"form-group form-inline\"><input type=\"text\" class=\"form-control text-box menu  \" id=\"menu_name$meal_id\" name=\"menu_name\"  placeholder=\"Enter menu name\">
			<button class=\"btn btn-primary add_menu btn-sm \" data-meal_id=\"$meal_id\"   data-entry_date=\"$entry_date\" id=\"meal_id\" value=\"$meal_id\" >Create </button></div></div>";
				echo "<div id=\"alert$meal_id\" tabindex=\"1\" ></div><br><br><br>";
				foreach($data['results1'] as $row1){
					$menu_id= $row1->id;
					$menu_name= $row1->menu_name;
					echo "<br>";
					echo "<h4><a id=\"$menu_id\"  href=\"#\" class=\"edit_menu\">&nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\" class=\"delete_menu\"><span class=\"glyphicon glyphicon-minus-sign\"></span></a>&nbsp;<a href=\"#\" id=\"$menu_id\"  class=\"copy_menu\"><span class=\"glyphicon glyphicon-duplicate\"></span></a>&nbsp;"."<i >".$menu_name."</i></h4>";
					echo "<div class=\"table-responsive\" ><table   border=\"1\" class=\"table table-striped\">";
					echo "<tr>
		<th>Image</th>
		<th>Fooditem</th>
		<th colspan=\"2\" style=\"text-align: center;\">HH Measure</th>
		<th>Edible Portion (EP)</th>
		<th>Cal (KCAL)</th>
		<th>C (gm)</th>
		<th>P (gm)</th>
		<th>F (gm)</th>
		<th colspan=\"2\">Action</th>
		</tr>";
					$data['results2'] = $this->help_model->get_food($menu_id,$meal_id,$uid,$entry_date );
					$total_cal= 0;
					$total_cho= 0;
					$total_pro= 0;
					$total_fat= 0;
					foreach($data['results2'] as $row2){
						$id= $row2->id;
						$fooditem= $row2->food_name;
						$hh_val= $row2->hh_val;
						$hh_m= $row2->hh_m;
						$ep_wt= $row2->ep_wt;
						$cal= $row2->cal;
						$total_cal += $cal;
						$cho= $row2->cho;
						$total_cho += $cho;
						$pro= $row2->pro;
						$total_pro+=$pro;
						$fat= $row2->fat;
						$total_fat += $fat;
						$image= $row2->image;
						echo "<tr>";
						$k= base_url("assets/images/meal_photos/$image");
						echo "<td><img src=\"$k\" alt=\"Meal\" width=\"50%\" height=\"50%\" class=\"img-thumbnail img\"></td>";
						echo "<td>$fooditem</td>";
						echo "<td>$hh_val</td>";
						echo "<td>$hh_m</td>";
						echo "<td align=\"right\">$ep_wt</td>";
						echo "<td align=\"right\">$cal</td>";
						echo "<td align=\"right\">$cho</td>";
						echo "<td align=\"right\">$pro</td>";
						echo "<td align=\"right\">$fat</td>";
						echo "<td width=\"10\"><a href=\"#\" id=\"$id\"    data-meal_code=\"$meal_code\" data-meal_id=\"$meal_id\" data-menu_id=\"$menu_id\" class=\"edit_food\"  ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
						echo "<td width=\"10\"><a id=\"$id\"  href=\"#\" class=\"delete_food\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
						echo "</tr>";
						echo "<tr >";
						echo "</tr>";
					}

					echo "<tr >";
					//	echo "<td colspan=\"4\" align=\"right\"></td>";
					echo "<td colspan=\"5\" align=\"right\"><strong>Total</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_cal</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_cho</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_pro</strong></td>";
					echo "<td colspan=\"1\" align=\"right\"><strong>$total_fat</strong></td>";
					echo "<td colspan=\"2\" align=\"right\"><strong></strong></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=\"150\">
							<input type=\"file\" id=\"aa$menu_id\" name=\"aa\"  style=\"width: 150px;\"  /></td>";
					echo "<td><input type=\"text\" name=\"fooditem\" id=\"fooditem$menu_id\" style=\"width: 150px;\" class=\"form-control fooditem\" data-count=\"$menu_id\" /><input type=\"hidden\" name=\"fic\" id=\"fic$menu_id\"  class=\"form-control\" /></td>";
					echo "<td><input type=\"text\" style=\"width: 50px;\" class=\"form-control hh_val\" name=\"hh_val\" id=\"hh_val$menu_id\" data-count=\"$menu_id\" /> </td>";
					echo "<td>";
					echo  "<select  name=\"hh_m\" id=\"hh_m$menu_id\" class=\" hh_m  form-control\" style=\"width:100px;\ >";
					echo "<option value=\"0\">--Household Measure--</option>";
					 $data['groups'] = $this->help_model->get_hh_m();
                    foreach($data['groups'] as $row3)            {
                     $id= $row3->id;
                     $foodunit = $row3->foodunit;
                        echo "<option  value=\"$id\"  >".$foodunit."</option>";
                    }
					echo "</select>";
					echo "</td>";
                    echo "<td><input type=\"text\" id=\"ep_wt$menu_id\" class=\"form-control ep_wt\" size=\"5\" data-count=\"$menu_id\" /><input type=\"hidden\" id=\"ep_wt_val$menu_id\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_ep$menu_id\" name=\"comp_ep\" class=\"form-control\" size=\"5\" /></td>";
					echo "<td><strong><span id=\"cal_label$menu_id\"></span></strong><input type=\"hidden\" id=\"cal$menu_id\" id=\"cal\" class=\"form-control\" size=\"5\"/><input type=\"hidden\" id=\"comp_cal$menu_id\" name=\"comp_cal\" class=\"form-control\" size=\"5\"/></td>";
					echo "<td><strong><span id=\"cho_label$menu_id\"></span></strong><input type=\"hidden\" id=\"cho$menu_id\" id=\"cho\" class=\"form-control\" size=\"5\"/><input type=\"hidden\" id=\"comp_cho$menu_id\" name=\"comp_cho\" class=\"form-control\" size=\"5\"/></td>";
					echo "<td><strong><span id=\"pro_label$menu_id\"></span></strong><input type=\"hidden\" id=\"pro$menu_id\" name=\"pro\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_pro$menu_id\" name=\"comp_pro\" class=\"form-control\" size=\"5\"/></td>";
					echo "<td><strong><span id=\"fat_label$menu_id\"></span></strong><input type=\"hidden\" id=\"fat$menu_id\" id=\"fat\" class=\"form-control\" size=\"5\" /><input type=\"hidden\" id=\"comp_fat$menu_id\" name=\"comp_fat\" class=\"form-control\" size=\"5\"/></td>";
					echo "<td align=\"center\" colspan=\"7\">";
					echo "<input type=\"hidden\" id=\"meal_id$menu_id\" name=\"meal_id\" value=\"$meal_id\" class=\"form-control\"  /><button class=\"btn btn-primary add_food btn-sm\" data-menu_id=\"$menu_id\" data-meal_id=\"$meal_id\"   data-entry_date=\"$entry_date\" data-count=\"$menu_id\" id=\"add_food\" value=\"$menu_id\"   ><span class=\"glyphicon glyphicon-plus\"></span></button>";
					echo "</td>";
					echo "</tr>";
					echo "</table></div>";
				}

				echo "</div>";
			}

			echo "</div><br>";
			echo "</div></div></div></div></div>";




		}
		public function pa_tracker()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$data['title'] = "Physical Activity Tracker";
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
				
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']	= $row->age_year;
			$data['age_month']	= $row->age_month;
			$data['gender']		= $row->gender;
			$data['a_gender']	= $row->a_gender;
			}	
			


			
			$this->load->view('pa_tracker',$data);
		
			
		}


		public function create_pa_tracker()
		{
			$uid            = $this->session->id;
		
          	$pa_tracker_function             = base_url("assets/js/pa_tracker_function.js");
          	echo "<script type=\"text/javascript\" src=\"$pa_tracker_function\"></script>";
          
			$today = time();
			$days_since_sunday = date('w', $today);
			$txtdate= date('l jS F Y');
			echo "<div class=\"main-content\" >";
			echo "<div class=\"fluid-container\">";
			echo "<div class=\"container\" style=\"margin-top: 20px;\">";
			echo "<div class=\"row\">";
			echo "<div class=\"col-md-10\"  >";
			echo "<h2 >Physical Activity Tracker</h2>";
			echo " <hr class=\"colorgraph\"></hr>";
			echo " <div class=\"col-md-12\">";
			//$a=base_url('help/search_pa_tracker');
			//$a=base_url('help/search_pa_tracker/');
			//echo "<form name=\"form\" id=\"form\" method=\"GET\" action=\"$a\">";
			echo" <div class=\"form-group form-inline\" align=\"right\">";
			echo "<input type=\"text\" class=\"form-control\" id=\"pa_entry_date\" name=\"pa_entry_date\" placeholder=\"$txtdate\" /> <a id=\"search_pa_date\"  class=\"btn btn-primary\"> Go!</a>";
			echo  "</div></div>";
			//echo "</form>";
			echo "<p>Movement of the body that uses energy is the most basic meaning of physical activity. There are 3 categories of PA namely light, moderate or vigorous intensity which can be observed by the way an activity makes you breathe harder and your heart beat faster.</p>";
			echo"<div  class=\"container\" style=\"width: 100%; height: 700px;min-height: 400px; overflow-y: scroll;\">";
			$data['weight'] = $this->help_model->get_body_stats_db($uid);
			foreach($data['weight'] as $stats_row){
				$wt= $stats_row->weight;
				$cal= $stats_row->cal;
				echo "<input type=\"hidden\" class=\"form-control wt\" name=\"wt\" id=\"wt\" value=\"$wt\" />";
			
			}
		
				
			echo "<div id=\"compare_div\" class=\"form-group form-inline\" align=\"center\" >";
			echo "<select multiple=\"multiple\" name=\"compare_date\" id=\"compare_date\" class=\"compare_date \" style=\"width:200px;\">";
			for($i = 0; $i < 7; $i++) {
				$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
				$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
				//echo $days[$i]['pretty_date'];
				$perday= $days[$i]['pretty_date'];
				echo "<option value=\"$perday\">$perday</option>";
			}

			echo "</select>&nbsp;</span>";
			echo "<button id=\"compare\" name=\"compare\" class=\"btn btn-success btn btn-sm\">Compare</button>";
			echo " </div> ";
			echo "<div id=\"perday_div\">";
			for($i = 0; $i < 7; $i++) {
				$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
				$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
				//echo $days[$i]['pretty_date'];
				$perday= $days[$i]['pretty_date'];
				$perdaylabel=  date('l jS F Y', $days[$i]['stamp']);
				echo "<h3>$perdaylabel</h3>";
				echo "<div >";
				echo " <div id=\"alert$i\" tabindex=\"1\"></div>";
				echo"<table  width=\"800\" border=\"1\" class=\"table table-striped\">";
				/*echo "<tr>";
			echo "<td colspan=\"6\" align=\"center\"><strong><i>$perdaylabel</i></strong></td>";
			echo "</tr>";	*/
				echo "<tr>";
				echo "<tr>
		<th width=\"150\">Time of the Day</th>
		<th width=\"150\">Physical Acitivity Performed</th>
		<th width=\"150\">Duration (minutes)</th>
		<th width=\"50\">Calorie Equivalent</th>
		<th colspan=\"2\" width=\"50\">Action</th>
		</tr>";
				$total_pa_cal =0;
				$data['results'] = $this->help_model->get_pa_tracker($perday );
				foreach($data['results'] as $row){
					$row_id = $row->id;
					$time = date("h:i A",strtotime($row->time));
					$activity = $row->activity;
					$duration = $row->duration ." minutes";
					$pa_cal = $row->pa_cal;
					$total_pa_cal += $pa_cal;
					//$submitted_on= $row->submitted_on;
					//$day = date("l jS F Y",strtotime($submitted_on));
					//echo "<td><input type=\"checkbox\" id=\"row_id\" name=\"row_id[]\" value=\"$row_id\"  /></td>";		
					echo "<td width=\"150\">$time</td>";
					echo "<td width=\"150\">$activity</td>";
					echo "<td width=\"150\">$duration</td>";
					echo "<td width=\"50\">$pa_cal</td>";
					echo "<td width=\"10\"><a href=\"#\" id=\"$row_id\" class=\"edit_pa\" data-count=\"$i\" ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
					echo "<td width=\"10\"><a id=\"$row_id\"  href=\"#\" class=\"delete_pa\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
					echo "</tr>";
				}

				echo "<tr>";
				/*	echo "<td align=\"right\" colspan=\"7\"><h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4></td>";*/				//$a= $total_pa_cal."px";
				
				if($total_pa_cal == 0 || $total_pa_cal ==''){
					$cal_perday= $cal;
					$total_pa_cal = '';
					$y="0%";
					$z= "100%";
					$remcal_perday=$cal;
				} else {
					$cal_perday= $cal;
					$remcal_perday= $cal_perday - $total_pa_cal;
					$x= $total_pa_cal / $cal_perday;
					
					if($total_pa_cal > $cal_perday){
						$y = "100%";
						//$z= "100%";
					} else {
						$y = round($x*100)."%";
						$z= round(100-$y)."%";
					}

				}

				
				if($total_pa_cal>$cal_perday){
					$progress_alert= "info";
				} else {
					$progress_alert = "success";
				}

				echo "<td></td>";
				echo "<td></td>";
				echo "<td >TEE:</td>";
				echo "<td colspan=\"7\" valign=\"middle\"><strong>$total_pa_cal</strong> kcal</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td width=\"150\"><input type=\"text\" id=\"time$i\" name=\"time\" class=\"form-control time\" data-count=\"$i\" /></td>";
				echo "<td width=\"250\"><input type=\"text\" class=\"pa form-control \"  id=\"pa$i\" name=\"pa\" data-count=\"$i\"  /><input type=\"hidden\" id=\"pa_code$i\" name=\"pa_code\" class=\"form-control \" /><input type=\"hidden\" id=\"mets$i\" name=\"mets\" class=\"form-control \" /></td>";
			
				echo "<td width=\"150\"><input type=\"text\" id=\"duration$i\" name=\"duration\" class=\"form-control duration\" data-count=\"$i\" /></td>";
				echo "<td width=\"150\"><span id=\"pa_cal_label$i\" name=\"pa_cal_label\"></span><input type=\"hidden\" id=\"pa_cal$i\" name=\"pa_cal\" class=\"form-control\" /></td>";
				echo "<td colspan=\"2\" width=\"50\" align=\"center\"><input type=\"hidden\" class=\"form-control\" value=\"$i\" id=\"count\" name=\"count\" /><button id=\"add_pa\" class=\"btn btn-primary add_pa\" data-entrydate=\"$perday\" data-count=\"$i\"><span class=\"glyphicon glyphicon-plus\"></span></button></td>";
				echo "</tr>";
				echo "<tr>";
				/*	echo "<td align=\"right\" colspan=\"7\"><h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4></td>";*/				//$a= $total_pa_cal."px";
				
				if($total_pa_cal == 0 || $total_pa_cal ==''){
					$cal_perday= $cal;
					$total_pa_cal = '';
					$y="0%";
					$z= "100%";
					$remcal_perday=$cal;
				} else {
					$cal_perday= $cal;
					$remcal_perday= $cal_perday - $total_pa_cal;
					$x= $total_pa_cal / $cal_perday;
					
					if($total_pa_cal > $cal_perday){
						$y = "100%";
						//$z= "100%";
					} else {
						$y = round($x*100)."%";
						$z= round(100-$y)."%";
					}

				}

				
				if($total_pa_cal>$cal_perday){
					$progress_alert= "info";
				} else {
					$progress_alert = "success";
				}

				//
				echo "<td colspan=\"7\" valign=\"middle\"><input type=\"hidden\" id=\"totalpa_cal$i\" value=\"$total_pa_cal\" class=\"form-control\" /><strong>Total: $cal_perday kcal / day</strong><div class=\"progress progress-striped active\">
  <div class=\"progress-bar progress-bar-$progress_alert\" id=\"totalpa$i\" role=\"progressbar\" style=\"width:$y;\" >
TEE: $total_pa_cal kcal
  </div>
  <div class=\"progress-bar progress-bar-warning\" id=\"totalpa_perday$i\"  role=\"progressbar\" style=\"width:$z;\">
 $remcal_perday kcal / day
  </div>
</div><input type=\"hidden\" id=\"cal_perday$i\" value=\"$cal_perday\" class=\"form-control\"/></td>";
				echo "</tr>";
				echo "</table></div>";
			}
		
			echo "</div></div></div></div></div></div></div></div>";


		}

		public function get_pa_data() {
			header('Content-Type: application/json',true);
			$pa = $this->input->get('term');
			$data['results']= $this->help_model->get_pa_db($pa);
			$output = array();
			foreach($data['results'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				$pa= $row->activity;
				$pa_code= $row->pa_code;
				$mets= $row->mets;
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['label']=$pa;
				$temp['pa_code']=$pa_code;
				$temp['mets']=$mets;
				array_push($output,$temp);
			}

			// header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
		}

		public function save_pa(){
			$uid= $this->session->id;
			$pa_code= $this->input->post('pa_code',TRUE);
			$time= $this->input->post('time',TRUE);
			$duration= $this->input->post('duration',TRUE);
			$pa_cal= $this->input->post('pa_cal',TRUE);
			$entry_date=$this->input->post('entrydate',TRUE);

			//$data = array($uid,$pa_code,$time,$duration,$pa_cal,$entry_date);
			

			$this->help_model->save_pa();

			echo "success";
			/*  if ($this->form_validation->run() == FALSE) { 
      		 	echo "error";
         } 
		 else{
		 		$data = array($client_id,$pa_code,$time,$duration,$pa_cal,$entry_date);
				$this->help_model->save_pa($data);
				echo "success";
		 }*/
		}

		public function edit_pa($id){
			$pa_tracker_function             = base_url("assets/js/pa_tracker_function.js");
          	echo "<script type=\"text/javascript\" src=\"$pa_tracker_function\"></script>";
			$i=$this->input->get('count',TRUE);
			$id=$this->input->get('id',TRUE);
			$data['count']= $i;
			$data['pa_id']= $this->help_model->get_pa_id($id);
			$this->load->view('edit_pa',$data);
		}

		public function update_pa(){
			//	$uid= $this->session->id;
			$pa_code=$this->input->post('pa_code1',TRUE);
			$time=$this->input->post('time1',TRUE);
			$duration=$this->input->post('duration1',TRUE);
			$pa_cal= $this->input->post('pa_cal1',TRUE);
			$id= $this->input->post('rowid',TRUE);
			//$data = array($pa_code,$time,$duration,$pa_cal,$id);
			$this->help_model->update_pa();
			echo "success";
		}

		public function delete_pa($id){
			$id = $this->input->post('id',TRUE);
			$this->help_model->delete_pa($id);
			//redirect('help/foodtracker');
		}

		public function compare_pa(){
			$select_date = $this->input->get('select_date',TRUE);
			$select_array = explode(",",$select_date);
			//echo $select_array;
			echo "<h3 >Physical Activity Comparison</h3>";
			
			foreach($select_array as $item){
				$item= $item;
				$data['compare_pa']= $this->help_model->compare_pa($item);
				$numRows = $this->help_model->getAffectedRows();
				$day = date("l jS F Y",strtotime($item));
				echo "<div class=\"col-md-12\" align=\"center\">";
				echo "<hr></hr>";
				echo "<div class=\"table-responsive\" ><table  width=\"400\" border=\"1\" class=\"table table-striped\">";
				echo "<tr>";
				echo "<td align=\"center\" colspan=\"7\"><strong>$day</strong></td>";
				echo "</tr>";
				echo "<tr>
		<th width=\"50\">Time of the Day</th>
		<th width=\"100\">Physical Acitivity Performed</th>
		<th width=\"30\">Duration (minutes)</th>
		<th width=\"30\">Calorie Equivalent</th>
		</tr>";
				
				if($numRows >0){
					$total_pa_cal =0;
					foreach($data['compare_pa'] as $row){
						$row_id = $row->id;
						$time = date("h:i A",strtotime($row->time));
						$activity = $row->activity;
						$duration = $row->duration ." minutes";
						$pa_cal = $row->pa_cal;
						$total_pa_cal += $pa_cal;
						echo "<tr>";
						echo "<td width=\"50\">$time</td>";
						echo "<td width=\"100\">$activity</td>";
						echo "<td width=\"50\">$duration</td>";
						echo "<td width=\"50\">$pa_cal</td>";
						echo "</tr>";
					}

				} else {
					$total_pa_cal =0;
					echo "<tr>";
					echo "<td colspan=\"4\" align=\"center\"> No data available</td>";
					echo "</tr>";
				}

				echo "</table></div></div>";
				//echo "<div class=\"container\">";
				echo "<div class=\"col-md-12\">";
				echo "<h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4>";
				echo "<hr></hr>";
				echo "<br>";
				echo "</div>";
			}

			
		}

		public function get_pa_entry_dates() {
			// header('Content-Type: application/json',true);
			$this->load->model("help_model");
			$uid= $this->session->id;
			$data['entry_dates']= $this->help_model->get_pa_entry_dates($uid);
			$output = array();
			foreach($data['entry_dates'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['entry_date'] = $row->entry_date;
				array_push($output,$temp);
			}

			header("Content-Type: application/json");
			echo json_encode($output);
		}

		public function search_pa_tracker($entry_date)
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$data['title'] = "Physical Activity Tracker";
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			//$client_header = $this->load->view('client_header',$data,true);
			//echo $client_header;
			

			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}
			$data['entry_date'] = $entry_date;	
			

			
			$this->load->view('search_pa_tracker',$data);
			
		}
		public function create_search_pa_tracker($entry_date)
		{

			//$entry_date = $this->input->get('pa_entry_date',TRUE);
			
			$pa_tracker_function             = base_url("assets/js/pa_tracker_function.js");
          	echo "<script type=\"text/javascript\" src=\"$pa_tracker_function\"></script>";
          
			$txtdate= date('l jS F Y',strtotime($entry_date));
			$uid= $this->session->id;
			$today = strtotime($entry_date);
			$days_since_sunday = date('w', $today);
			echo " <div class=\"main-content\" >";
			echo "<div class=\"fluid-container\">";
			echo "<div class=\"container\" style=\"margin-top: 20px;\">";
			echo "<div class=\"row\">";
			echo "<div class=\"col-md-10\"  >";
			echo "<h3>$txtdate</h3>";
			$a=base_url('help/pa_tracker');
			echo "<a href=\"$a\" class=\"btn btn-primary\">Search Again</a>";
			echo "<hr></hr>";
			echo "<h2 >Physical Activity Tracker</h2>";
			echo " <hr class=\"colorgraph\"></hr>";
			echo " <div class=\"col-md-12\">";
			echo  "</div>";
			echo "<p>Movement of the body that uses energy is the most basic meaning of physical activity. There are 3 categories of PA namely light, moderate or vigorous intensity which can be observed by the way an activity makes you breathe harder and your heart beat faster.</p>";
			echo"<div  class=\"container\" style=\"width: 100%; height: 700px;min-height: 400px; overflow-y: scroll;\">";
			$data['weight'] = $this->help_model->get_body_stats_db($uid);
			foreach($data['weight'] as $stats_row){
				$wt= $stats_row->weight;
				$cal= $stats_row->cal;
				echo "<input type=\"hidden\" name=\"wt\" id=\"wt\" value=\"$wt\" />";
			}

			echo "<div id=\"compare_div\" class=\"form-group form-inline\" align=\"center\" >";
			echo "<select multiple=\"multiple\" name=\"compare_date\" id=\"compare_date\" class=\"compare_date \" style=\"width:200px;\">";
			for($i = 0; $i < 7; $i++) {
				$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
				$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
				//echo $days[$i]['pretty_date'];
				$perday= $days[$i]['pretty_date'];
				echo "<option value=\"$perday\">$perday</option>";
			}

			echo "</select>&nbsp;</span>";
			echo "<button id=\"compare\" name=\"compare\" class=\"btn btn-success btn btn-sm\">Compare</button>";
			echo " </div> ";
			echo "<div id=\"perday_div\">";
			for($i = 0; $i < 7; $i++) {
				$days[$i]['stamp'] = mktime(0, 0, 0, date('n', $today),(date('j', $today) + $i - $days_since_sunday), date('Y', $today));
				$days[$i]['pretty_date'] = date('Y-m-d', $days[$i]['stamp']);
				//echo $days[$i]['pretty_date'];
				$perday= $days[$i]['pretty_date'];
				$perdaylabel=  date('l jS F Y', $days[$i]['stamp']);
				echo "<h3>$perdaylabel</h3>";
				echo "<div >";
				echo " <div id=\"alert$i\" tabindex=\"1\"></div>";
				echo"<table  width=\"800\" border=\"1\" class=\"table table-striped\">";
				/*echo "<tr>";
			echo "<td colspan=\"6\" align=\"center\"><strong><i>$perdaylabel</i></strong></td>";
			echo "</tr>";	*/
				echo "<tr>";
				echo "<tr>
		<th width=\"150\">Time of the Day</th>
		<th width=\"150\">Physical Acitivity Performed</th>
		<th width=\"150\">Duration (minutes)</th>
		<th width=\"50\">Calorie Equivalent</th>
		<th colspan=\"2\" width=\"50\">Action</th>
		</tr>";
				$total_pa_cal =0;
				$data['results'] = $this->help_model->get_pa_tracker($perday );
				foreach($data['results'] as $row){
					$row_id = $row->id;
					$time = date("h:i A",strtotime($row->time));
					$activity = $row->activity;
					$duration = $row->duration ." minutes";
					$pa_cal = $row->pa_cal;
					$total_pa_cal += $pa_cal;
					echo "<td width=\"150\">$time</td>";
					echo "<td width=\"150\">$activity</td>";
					echo "<td width=\"150\">$duration</td>";
					echo "<td width=\"50\">$pa_cal</td>";
					echo "<td width=\"10\"><a href=\"#\" id=\"$row_id\" class=\"edit_pa\" data-count=\"$i\" ><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
					echo "<td width=\"10\"><a id=\"$row_id\"  href=\"#\" class=\"delete_pa\"><span class=\"glyphicon glyphicon-remove\"></span></a></td>";
					echo "</tr>";
				}

				echo "<tr>";
				/*	echo "<td align=\"right\" colspan=\"7\"><h4>Total Calorie Expended for the Day: "."<strong>".$total_pa_cal."</strong></h4></td>";*/				//$a= $total_pa_cal."px";
				
				if($total_pa_cal == 0 || $total_pa_cal ==''){
					$cal_perday= $cal;
					$total_pa_cal = '';
					$y="0%";
					$z= "100%";
					$remcal_perday=$cal;
				} else {
					$cal_perday= $cal;
					$remcal_perday= $cal_perday - $total_pa_cal;
					$x= $total_pa_cal / $cal_perday;
					
					if($total_pa_cal > $cal_perday){
						$y = "100%";
						//$z= "100%";
					} else {
						$y = round($x*100)."%";
						$z= round(100-$y)."%";
					}

				}

				
				if($total_pa_cal>$cal_perday){
					$progress_alert= "info";
				} else {
					$progress_alert = "success";
				}

				echo "<td></td>";
				echo "<td></td>";
				echo "<td >TEE:</td>";
				echo "<td colspan=\"7\" valign=\"middle\"><strong>$total_pa_cal</strong> kcal</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td width=\"150\"><input type=\"text\" id=\"time$i\" name=\"time\" class=\"form-control time\" data-count=\"$i\" /></td>";
				echo "<td width=\"250\"><input type=\"text\" class=\"pa form-control \"  id=\"pa$i\" name=\"pa\" data-count=\"$i\"  /><input type=\"hidden\" id=\"pa_code$i\" name=\"pa_code\" class=\"form-control \" /><input type=\"hidden\" id=\"mets$i\" name=\"mets\" class=\"form-control \" /></td>";
				echo "<td width=\"150\"><input type=\"text\" id=\"duration$i\" name=\"duration\" class=\"form-control duration\" data-count=\"$i\" /></td>";
				echo "<td width=\"150\"><span id=\"pa_cal_label$i\" name=\"pa_cal_label\"></span><input type=\"hidden\" id=\"pa_cal$i\" name=\"pa_cal\" class=\"form-control\" /></td>";
				echo "<td colspan=\"2\" width=\"50\" align=\"center\"><input type=\"hidden\" class=\"form-control\" value=\"$i\" id=\"count\" name=\"count\" /><button id=\"add_pa\" class=\"btn btn-primary add_pa\" data-entrydate=\"$perday\" data-count=\"$i\"><span class=\"glyphicon glyphicon-plus\"></span></button></td>";
				echo "</tr>";
				echo "<tr>";
				
				if($total_pa_cal == 0 || $total_pa_cal ==''){
					$cal_perday= $cal;
					$total_pa_cal = '';
					$y="0%";
					$z= "100%";
					$remcal_perday=$cal;
				} else {
					$cal_perday= $cal;
					$remcal_perday= $cal_perday - $total_pa_cal;
					$x= $total_pa_cal / $cal_perday;
					
					if($total_pa_cal > $cal_perday){
						$y = "100%";
						//$z= "100%";
					} else {
						$y = round($x*100)."%";
						$z= round(100-$y)."%";
					}

				}

				
				if($total_pa_cal>$cal_perday){
					$progress_alert= "info";
				} else {
					$progress_alert = "success";
				}

				//
				echo "<td colspan=\"7\" valign=\"middle\"><input type=\"hidden\" id=\"totalpa_cal$i\" value=\"$total_pa_cal\" class=\"form-control\" /><strong>Total: $cal_perday kcal / day</strong><div class=\"progress progress-striped active\">
  <div class=\"progress-bar progress-bar-$progress_alert\" id=\"totalpa$i\" role=\"progressbar\" style=\"width:$y;\" >
TEE: $total_pa_cal kcal
  </div>
  <div class=\"progress-bar progress-bar-warning\" id=\"totalpa_perday$i\"  role=\"progressbar\" style=\"width:$z;\">
 $remcal_perday kcal / day
  </div>
</div><input type=\"hidden\" id=\"cal_perday$i\" value=\"$cal_perday\" class=\"form-control\"/></td>";
				echo "</tr>";
				echo "</table></div>";
			}

			echo "</div></div></div></div></div></div></div>";

		}


		public function profile(){
			$data['title']='Profile';
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;

			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			//$this->load->view('sidebar');
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){
			$lname= $row->lname;
			$fname=$row->fname;
			$mname= $row->mname;
			$data['lname']= $lname;
			$data['fname']=$fname;
			$data['mname']=$mname;
			$data['extn']=$extension;

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			$data['address']= $row->address;
			$data['contact_number']= $row->contact_number;
			$data['email_address']= $row->email_address;
			$data['username']=$this->session->username;
			$data['uid']=$this->session->id;
			}	
			 $data['groups'] = $this->help_model->getGender();
			$data['results1'] = $this->help_model->get_photos_db($uid);
			$data['numRows'] = $this->help_model->getAffectedRows();



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
              $this->load->view('profile', $data);
              } else {

              $this->help_model->update_info();
              $this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
              redirect('help/profile', 'refresh');

              }


            } else  if (isset($update_acct)) {

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
              $this->load->view('profile', $data);
              } else {


              if($new_password != $confirm_password){
                $this->session->set_flashdata('item2', array('message2' => 'Password not match.','class' => 'danger'));
                      redirect('help/profile', 'refresh');
              }else{

              $check_query = "SELECT * FROM users_db WHERE username='$username' AND password='$old_password'";
              $query = $this->db->query($check_query);
            
              if ($query->num_rows() > 0){
                $this->help_model->update_acct();
                $this->session->set_flashdata('item2', array('message2' => 'Account successfully updated.','class' => 'success'));
                    redirect('help/profile', 'refresh');



              }else{
                $this->session->set_flashdata('item2', array('message2' => 'Account not found in the database.','class' => 'danger'));
               redirect('admin/help/profile');
              }

              }
             
              
              //$this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
            //  redirect('admin/help/edit_account');

              }
            }

            else{

               $this->load->view('profile',$data);
            }

            // $this->load->view('profile',$data);
			
		}




		public function edit_info($uid)
		{
			$uid= $this->session->id;
			$data['uid']=$this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
		
			$data['groups'] = $this->help_model->getGender();
			$this->load->view('edit_info',$data);


		}

		public function update_info()
		{
			$this->help_model->update_info();
			echo "success";

			//echo $this->input->post('contact_no', TRUE);   

		}




		public function edit_client_photo()
		{
			$id=$this->input->get('id',TRUE);
			$data['photo_id']=$this->input->get('id',TRUE);
			$data['results'] = $this ->help_model->get_client_photo($id);
			$data['numRows'] = $this->help_model->getAffectedRows();


			$this->load->view('edit_client_photo',$data);
		}


		public function update_photo()
		{
			$this->help_model->update_photo();
			echo "success";


		}

		public function delete_photo($id)
		{
			$id = $this->input->post('id',TRUE);
			$this->help_model->delete_photo($id);
			//redirect('help/foodtracker');
		}





		public function save_photo()
		{
				
			
			if(isset($_FILES['picture']) && empty($_FILES['picture']['name'])) {
				$this->session->set_flashdata('item', array('message' => 'Please choose image to upload.','class' => 'danger'));
			}else{
			if($this->help_model->save_photo()){
				$this->session->set_flashdata('item', array('message' => 'Photo successfully uploaded.','class' => 'success'));

			}else{
				$this->session->set_flashdata('item', array('message' => 'Error','class' => 'danger'));


				}

			}
			
			redirect('help/profile', 'refresh');

		}


		public function edit_acct()
		{
			$uid=$this->session->id;
			$data['uid']=$this->session->id;
			$data['username']=$this->session->username;	
		
			$data['results'] = $this ->help_model->get_acct_details($uid);
			$data['numRows'] = $this->help_model->getAffectedRows();


			$this->load->view('edit_acct',$data);
		}

		public function update_acct()
		{
			  $username = $this->input->post('username', TRUE);
              $old_password= md5($this->input->post('old_password',TRUE));
              $new_password= md5($this->input->post('new_password',TRUE));
              $confirm_password= md5($this->input->post('cnf_password',TRUE));
             

            

              if($new_password != $confirm_password){
               echo "error";
          
              }else{

              $check_query = "SELECT * FROM users_db WHERE username='$username' AND password='$old_password'";
              $query = $this->db->query($check_query);
            
              if ($query->num_rows() > 0){
                $this->help_model->update_acct();
                echo "success";

              }else{
               	echo "error1";
              }

          	}

		}
        
        public function body_statistics()
		{  
			$data['title']='Body Statistics';
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}

			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			//$this->load->view('client_header',$data);
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			}	
			//$this->load->view('sidebar',$data);
			
			$data['results'] = $this->help_model->get_body_stats_db($uid);
			$data['numRows'] = $this->help_model->getAffectedRows();
			$data['results1'] = $this->help_model->get_all_body_stats_db($uid);

			$this->load->view('body_statistics',$data);
			//$this->load->view('client_footer');
		}
                
        public function events_data(){
            $uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	} 
			$thismonth= date('m');
			$header['title']= 'Nutrition Counseling Services Calendar';
			$data['events'] = $this->help_model->upcoming_events($thismonth);
			$data['numRows'] = $this->help_model->getAffectedRows();
				
			$page_url=current_url();
			$this ->help_model->save_count($page_url);
			$this->load->view('design/header',$header);
            $this->load->view('design/topbar');
            $this->load->view('design/sidebar');
			$this->load->view('design/events',$data);
            $this->load->view('design/footer');
        }
        public function profile_data(){
            $header['title']='Profile';
			if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;

			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			//$this->load->view('sidebar');
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){
			$lname= $row->lname;
			$fname=$row->fname;
			$mname= $row->mname;
			$data['lname']= $lname;
			$data['fname']=$fname;
			$data['mname']=$mname;
			$data['extn']=$extension;

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			$data['address']= $row->address;
			$data['contact_number']= $row->contact_number;
			$data['email_address']= $row->email_address;
			$data['username']=$this->session->username;
			$data['uid']=$this->session->id;
			}	
			 $data['groups'] = $this->help_model->getGender();
			$data['results1'] = $this->help_model->get_photos_db($uid);
			$data['numRows'] = $this->help_model->getAffectedRows();



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
              $this->load->view('profile', $data);
              } else {

              $this->help_model->update_info();
              $this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
              redirect('help/profile', 'refresh');

              }


            } else  if (isset($update_acct)) {

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
              $this->load->view('profile', $data);
              } else {


              if($new_password != $confirm_password){
                $this->session->set_flashdata('item2', array('message2' => 'Password not match.','class' => 'danger'));
                      redirect('help/profile', 'refresh');
              }else{

              $check_query = "SELECT * FROM users_db WHERE username='$username' AND password='$old_password'";
              $query = $this->db->query($check_query);
            
              if ($query->num_rows() > 0){
                $this->help_model->update_acct();
                $this->session->set_flashdata('item2', array('message2' => 'Account successfully updated.','class' => 'success'));
                    redirect('help/profile', 'refresh');



              }else{
                $this->session->set_flashdata('item2', array('message2' => 'Account not found in the database.','class' => 'danger'));
               redirect('admin/help/profile');
              }

              }
             
              
              //$this->session->set_flashdata('item1', array('message1' => 'Account successfully updated.','class' => 'success'));
            //  redirect('admin/help/edit_account');

              }
            }

            else{
                $this->load->view('design/header',$header);
                $this->load->view('design/topbar');
                $this->load->view('design/sidebar');
                $this->load->view('design/profile',$data);
                $this->load->view('design/footer');
            }

            // $this->load->view('profile',$data);
        }
        public function pa_tracker_data(){
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$header['title'] = "Physical Activity Tracker";
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
				
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']	= $row->age_year;
			$data['age_month']	= $row->age_month;
			$data['gender']		= $row->gender;
			$data['a_gender']	= $row->a_gender;
			}	
			


			$this->load->view('design/header',$header);
            $this->load->view('design/topbar');
            $this->load->view('design/sidebar');
            $this->load->view('design/pa_tracker',$data);
            $this->load->view('design/footer');
        }
        public function foodtracker_data(){
            $uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
		 	$header['title']= 'Food Tracker';
           	$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
            $uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}	
		

    
            $this->load->view('design/header',$header);
            $this->load->view('design/topbar');
            $this->load->view('design/sidebar');
            $this->load->view('design/foodtracker',$data);
            $this->load->view('design/footer');
        }
        public function summary_data(){
            $uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$header['title']='Summary';
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			}	
			
			$this->load->view('design/header',$header);
            $this->load->view('design/topbar');
            $this->load->view('design/sidebar');
            $this->load->view('design/summary',$data);
            $this->load->view('design/footer');
        }

		public function body_statistics_data()
		{  
			$header['title']='Body Statistics';
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}

			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			//$this->load->view('client_header',$data);
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			}	
			//$this->load->view('sidebar',$data);
			
			$data['results'] = $this->help_model->get_body_stats_db($uid);
			$data['numRows'] = $this->help_model->getAffectedRows();
			$data['results1'] = $this->help_model->get_all_body_stats_db($uid);
            
            $this->load->view('design/header',$header);
            $this->load->view('design/topbar');
            $this->load->view('design/sidebar');
			$this->load->view('design/view',$data);
            $this->load->view('design/footer');
		}

		public function add_body_statistics()
		{
			$body_stats_function_js    = base_url("assets/js/body_stats_function.js");
        	echo "<script type=\"text/javascript\" src=\"$body_stats_function_js\"></script>";
		

          
			//$data['title']='Body Statistics';
			//$this->load->view('client_header',$data);
			//$this->load->view('sidebar');
			//$body_stats_js             		= base_url("assets/js/body_stats.js");
          //echo "<script type=\"text/javascript\" src=\"$body_stats_js\"></script>";

          	//$body_stats_function_js   		= base_url("assets/js/body_stats_function.js");
         	//echo "<script type=\"text/javascript\" src=\"$body_stats_function_js \"></script>";
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			}	
			//$this->load->view('sidebar',$data);
			$data['groups'] = $this->help_model->get_pa_lvl();
			$this->load->view('add_body_statistics' ,$data);
			//$this->load->view('client_footer');
		}
		
		public function save_body_stats()
		{
			$uid= $this->session->id;		
			$wt= $this->input->post('wt',TRUE);
			$wt_unit=  $this->input->post('wt_opt',TRUE);
			$ht = $this->input->post('ht',TRUE);
			$wc= $this->input->post('wc',TRUE);
			$waist_unit= $this->input->post('wc_opt',TRUE);
			$hc=  $this->input->post('hc',TRUE);
			$hip_unit=  $this->input->post('hc_opt',TRUE);
			$bmi=  $this->input->post('bmi',TRUE);
			$bmr=  $this->input->post('bmr',TRUE);
			$bmi_class= $this->input->post('bmi_class',TRUE);
			$dbw= $this->input->post('dbw',TRUE);
			$lwr_lmt= $this->input->post('lower_lmt',TRUE);
			$uppr_lmt= $this->input->post('upper_lmt',TRUE);
			$risk_indicator= $this->input->post('risk_indicator',TRUE);
			$whipr= $this->input->post('whipr',TRUE);
			$whipr_class= $this->input->post('whipr_class',TRUE);
			$whtr= $this->input->post('whtr',TRUE);
			$whtr_class= $this->input->post('whtr_class',TRUE);
			$pa_lvl= $this->input->post('pa_lvl',TRUE);
			$cal= $this->input->post('cal',TRUE);
			$cho= $this->input->post('cho',TRUE);
			$protein=$this->input->post('protein',TRUE);
			$fat= $this->input->post('fat',TRUE);
			$ask_pregnant= $this->input->post('ask_pregnant',TRUE);
			$mens_date= $this->input->post('mens_date',TRUE);
			$gestation_wks=$this->input->post('gestation_wks',TRUE);
			$ask_lactation= $this->input->post('ask_lactation',TRUE);
			$datetime= date("Y-m-d");
		
			$sql = "SELECT * FROM body_stats_db WHERE body_stats_db.client_id= '$uid' AND DATE(body_stats_db.submitted_on) = CURDATE()";
			$query = $this->db->query($sql);

			if ($query->num_rows() == 0) {
  			// no duplicates found, add new record
				$this->help_model->save_body_stats();
				echo "success";
			}else{
				echo "error";
			}
			
		}
		
		public function edit_body_statistics($id)
		{

			/*$data['title']='Edit Body Statistics';

			$this->load->view('client_header',$data);
			$this->load->view('sidebar');*/
			$body_stats_function_js    = base_url("assets/js/body_stats_function.js");
        	echo "<script type=\"text/javascript\" src=\"$body_stats_function_js\"></script>";
			
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}	
			
			/*$data['body_stats_id']= $this->help_model->get_body_stats_id($id);
			$data['groups'] = $this->help_model->get_pa_lvl();
			$this->load->view('edit_body_statistics' ,$data);
			$this->load->view('client_footer');*/
			$id=$this->input->get('id',TRUE);
			$data['groups'] = $this->help_model->get_pa_lvl();
			$data['body_stats_id']= $this->help_model->get_body_stats_id($id);
			$data['numRows'] = $this->help_model->getAffectedRows();

			//$data['menu_id']= $this->help_model->get_menu_id($id);
			$this->load->view('edit_body_statistics',$data);

			
		}

		public function view_body_statistics($id)
		{

			/*$data['title']='Edit Body Statistics';

			$this->load->view('client_header',$data);
			$this->load->view('sidebar');*/
		

			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			}	
			
			/*$data['body_stats_id']= $this->help_model->get_body_stats_id($id);
			$data['groups'] = $this->help_model->get_pa_lvl();
			$this->load->view('edit_body_statistics' ,$data);
			$this->load->view('client_footer');*/
			$id=$this->input->get('id',TRUE);
			$data['groups'] = $this->help_model->get_pa_lvl();
			$data['body_stats_id']= $this->help_model->get_body_stats_id($id);
			//$data['menu_id']= $this->help_model->get_menu_id($id);
			$this->load->view('view_body_statistics',$data);

			
		}



		public function update_body_stats()
		{
			$uid= $this->session->id;		
			$wt= $this->input->post('wt',TRUE);
			$wt_unit=  $this->input->post('wt_opt',TRUE);
			$ht = $this->input->post('ht',TRUE);
			$wc= $this->input->post('wc',TRUE);
			$waist_unit= $this->input->post('wc_opt',TRUE);
			$hc=  $this->input->post('hc',TRUE);
			$hip_unit=  $this->input->post('hc_opt',TRUE);
			$bmi=  $this->input->post('bmi',TRUE);
			$bmr=  $this->input->post('bmr',TRUE);
			$bmi_class= $this->input->post('bmi_class',TRUE);
			$dbw= $this->input->post('dbw',TRUE);
			$lwr_lmt= $this->input->post('lower_lmt',TRUE);
			$uppr_lmt= $this->input->post('upper_lmt',TRUE);
			$risk_indicator= $this->input->post('risk_indicator',TRUE);
			$whipr= $this->input->post('whipr',TRUE);
			$whipr_class= $this->input->post('whipr_class',TRUE);
			$whtr= $this->input->post('whtr',TRUE);
			$whtr_class= $this->input->post('whtr_class',TRUE);
			$pa_lvl= $this->input->post('pa_lvl',TRUE);
			$cal= $this->input->post('cal',TRUE);
			$cho= $this->input->post('cho',TRUE);
			$protein=$this->input->post('protein',TRUE);
			$fat= $this->input->post('fat',TRUE);
			$ask_pregnant= $this->input->post('ask_pregnant',TRUE);
			$mens_date= $this->input->post('mens_date',TRUE);
			$gestation_wks=$this->input->post('gestation_wks',TRUE);
			$ask_lactation= $this->input->post('ask_lactation',TRUE);
			$datetime= date("Y-m-d");
			
			//echo $bmi_class;	
			$this->help_model->update_body_stats();
			echo "success";
		}

		public function delete_body_stats($id)
		{
			$id = $this->input->post('id',TRUE);
			$this->help_model->delete_body_stats($id);
			//redirect('help/foodtracker');
		}
 
		public function summary()
		{
			$uid= $this->session->id;
	 		$logged_in = $this->session->userdata['logged_in'];
	 		
			/*if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}else{
          	  redirect('help/');
          	}*/
          	if (isset($logged_in) && !isset($uid)) {
              $this->session->sess_destroy();
          	}
          	$user_type_id = $this->session->user_type_id;
			if(!isset($_SESSION['logged_in']) || $user_type_id !=3){
				redirect('help/');
			}
			$data['title']='Summary';
			$client_js          = base_url("assets/js/client.js");
          	$data['js']			= "<script type=\"text/javascript\" src=\"$client_js\"></script>";
			
			$uid= $this->session->id;

			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){

                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			}	
			
			
			$this->load->view('summary',$data);
		


		}


		public function get_pa_food_entry_dates() 
		{
			// header('Content-Type: application/json',true);
		
			$uid= $this->session->id;
			$data['entry_dates']= $this->help_model->get_pa_food_entry_dates($uid);
			$output = array();
			foreach($data['entry_dates'] as $row){
				unset($temp);
				// Release the contained value of the variable from the last loop
				$temp = array();
				// It guess your client side will need the id to extract, and distinguish the ScoreCH data
				$temp['entry_date'] = $row->entry_date;
				array_push($output,$temp);
			}

			header("Content-Type: application/json");
			echo json_encode($output);
		}


		public function compare_pa_food()
		{
			$entry_date= $this->input->post('pa_food_entry_date',TRUE);

			$data['results']= $this->help_model->compare_pa_food($entry_date);

			foreach($data['results'] as $row){
				$pa_tracker_cal += $row->pa_cal;
				$foodtracker_cal += $row->cal;
	


			}
/*background: url('<?php echo base_url(); ?>assets/images/fast/chart.png');*/


		//echo $foodtracker_cal;
			if($pa_tracker_cal == $foodtracker_cal){
				$image_a = "weight-balance.png";
 $a= base_url("assets/images/$image_a");
	echo "<div class=\"col-md-12\"  align=\"center\" style=\"background: url('$a');  width: 900px; height: 800px; background-repeat: no-repeat; position: relative; left: 100px;\">";
		echo "	<div id=\"pa_tracker_cal\" style=\"position: absolute; top:25%; left:45%;  font-weight: bold; width:50px;\">"."<h4>".$pa_tracker_cal." kcal"."</h4>"."</div>";
echo "<div id=\"foodtracker_cal\" style=\"position: absolute; top:25%; right:88%;  font-weight: bold; width:50px;\">"."<h4>".$foodtracker_cal." kcal"."</h4>"."</div>";
			  
	
		echo "</div>";	
	}
	else if($pa_tracker_cal < $foodtracker_cal){
	$image_b = "imbalanced-scale-1.png";
 $b= base_url("assets/images/$image_b");
//imbalanced-scale-1.png
		echo "<div class=\"col-md-12\"  align=\"center\" style=\"background: url('$b');  width: 900px; height: 800px; background-repeat: no-repeat; position: relative; left: 100px;\">";
		echo "	<div id=\"pa_tracker_cal\" style=\"position: absolute; top:25%; left:43%;  font-weight: bold; width:50px; \">"."<h4 style=\"color:#ffffff;\">".$pa_tracker_cal." kcal"."</h4>"."</div>";
echo "<div id=\"foodtracker_cal\" style=\"position: absolute; top:35%; right:86%;  font-weight: bold; width:50px;\">"."<h4 style=\"color:#ffffff;\">".$foodtracker_cal." kcal"."</h4>"."</div>";
			  
	
		echo "</div>";	
		
	}
	
	else if($pa_tracker_cal > $foodtracker_cal){
			$image_c = "imbalanced-scale-2.png";
 $c= base_url("assets/images/$image_c");
			echo "<div class=\"col-md-12\"  align=\"center\" style=\"background: url('$c');  width: 900px; height: 800px; background-repeat: no-repeat; position: relative; left: 100px;\">";
		echo "	<div id=\"pa_tracker_cal\" style=\"position: absolute; top:35%; left:43%;  font-weight: bold; width:50px;\">"."<h4 style=\"color:#ffffff;\">".$pa_tracker_cal." kcal"."</h4>"."</div>";
echo "<div id=\"foodtracker_cal\" style=\"position: absolute; top:25%; right:85%;  font-weight: bold; width:50px;\">"."<h4 style=\"color:#ffffff;\">".$foodtracker_cal." kcal"."</h4>"."</div>";
			  
	
		echo "</div>";	
		
	}








		}


		public function save_request()
		{
			$this->load->library('My_PHPMailer');
			$nameuser = 'NCS Admin';
			$usergmail = 'ncsfnri@gmail.com';
			$password = 'ncsfnri123';
			$mail = new PHPMailer;
			$mail->isSMTP();
			// Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';
			// Specify main and backup server
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			// Enable SMTP authentication
			$mail->Username = $usergmail;
			// SMTP username
			$mail->Password = $password;
			// SMTP password
			$mail->SMTPSecure = 'ssl';
			// Enable encryption, 'ssl' also accepted
			$mail->From = $usergmail;
			$mail->FromName = $nameuser;

			$uid= $this->session->id;
			$data['results'] = $this ->help_model->get_user_details($uid);
			foreach($data['results'] as $row){
			$lname= $row->lname;
			$fname=$row->fname;
			$mname= $row->mname;
			
                if($row->photo!=""){
                    $data['photo']= $row->photo;
                }else{
                    if($row->gender=="Female"){
                        $data['photo']= "avatar2.png";
                    }else{
                        $data['photo']= "avatar1.png";
                    }
                }
			$data['age_year']= $row->age_year;
			$data['age_month']= $row->age_month;
			$data['gender']= $row->gender;
			$data['a_gender']= $row->a_gender;
			$data['birthday']= $row->birthday;
			$data['address']= $row->address;
			$data['contact_number']= $row->contact_number;
			$email_address= $row->email_address;
			$data['username']=$this->session->username;
			$data['uid']=$this->session->id;
			}

			$name= $lname.", ".$fname." ".$mname;
				 
		
			//$email_address= $this->session->email_address;
			$type= $this->input->post('type',TRUE);
			$no_person=  $this->input->post('no_of_person',TRUE);
			$datepick= $this->input->post('datepick',TRUE);
			$timepick1= $this->input->post('timepick1',TRUE);
			$timepick2= $this->input->post('timepick2',TRUE);
			$date=date("l F j, Y", strtotime($datepick));
			$whole_day= $this->input->post('whole_day',TRUE);
	
			if($whole_day ==1){
				$timepick1= '08:00:00';
				$timepick2= '17:00:00';
				$time= 'whole day';
			} else {
				$timepick1= date("H:i:s",strtotime($timepick1));
				$timepick2= date("H:i:s",strtotime($timepick2));
				$time =date("h:i A", strtotime($timepick1))."-". date("h:i A", strtotime($timepick2));
			}

				$status =2;
				$message=  $this->input->post('message',TRUE);
	
			if($message == ''){
				$message= NULL;
			} else {
				$message=  $this->input->post('message',TRUE);
			}	
 
			if($type == 1){
				 
				$data['results0'] = $this->help_model->check_pending_request($uid,$datepick,$status);
				$numRows0 = $this->help_model->getAffectedRows();
				if($numRows0 > 0 ){
					$this->session->set_flashdata('item', array('message' => 'You have a pending request for this day. Please try another day!','class' => 'danger')); 	
				}
				else{
					if($whole_day == 1){
						$data['results1'] = $this->help_model->check_request_whole_day($datepick);
						$numRows1 = $this->help_model->getAffectedRows();

						$all_rnd= 1;
						$data['results2'] = $this->help_model->check_rnd_sched_whole_day($datepick,$all_rnd);
						$numRows2 = $this->help_model->getAffectedRows();
					}else{
						$data['results1'] = $this->help_model->check_request_time($datepick,$timepick1,$timepick2);
						$numRows1 = $this->help_model->getAffectedRows();
						//check this line--> time of appointment only
						$event_type_id= 1;
						$data['results2'] = $this->help_model->check_rnd_sched_time($datepick,$timepick1,$timepick2,$event_type_id);
						$numRows2 = $this->help_model->getAffectedRows();
						//$numRows2= 0 ;
					
					}
						$all_rnd=1;
						$data['results3'] = $this->help_model->check_all_rnd_sched($datepick,$timepick1,$timepick2,$all_rnd);
						$numRows3 = $this->help_model->getAffectedRows();


					if($numRows1 >0 || $numRows2 >0 ||  $numRows3 >0 ){
						$this->session->set_flashdata('item', array('message' => 'RND/ Time and date not available. Please select another day.','class' => 'danger')); 

					}else{
						$mail->addAddress($email_address);	
						$mail->addReplyTo($usergmail, 'NCS FNRI');
						$mail->WordWrap = 50;
						// Set word wrap to 50 characters
						$mail->isHTML(true);
					// Set email format to HTML
					//$client_request="<a href=\"http://localhost/fnri-help/administrator/index.php\">here </a>";
						$mail->Subject = 'Client Request';
						$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear {CLIENT_NAME},<br /><br />
 We have received your appointment request and it's now being processed. You will be hearing from us very soon.<br/><br/>
Thank you very much for spending a moment to fill up the form.
 <br /><br />Best Regards,<br />
The Nutrition Counseling Service Team<br />
ncsfnri@gmail.com<br/>
Tel. No.: 8372071 local 2288 or 2299<br /><br />

Disclaimer: This is an automatic message. Please do not reply.</p>";
						$mail->Body = str_replace(array('{CLIENT_NAME}'),array($name), $htmlBody);
					
						
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
						/*if($mail->Send()){
							$this->help_model->save_request();
						$this->session->set_flashdata('item', array('message' => 'You have successfully scheduled an appointment. Please check your email for details and confirmation.','class' => 'success'));	
						} */
						
						if($mail->Send()){
						
							$this->help_model->save_request();
							$mail->ClearAddresses();
							$mail->addReplyTo($usergmail, 'Reply To');
							$mail->WordWrap = 50;
							// Set word wrap to 50 characters
							$mail->isHTML(true);
							// Set email format to HTML
							$mail->Subject = 'Sample Admin';
							$mail->addAddress($usergmail);
							$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
							// optional, comment out and test
							$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear administrator,<br /><br />
 The system received request from {CLIENT_NAME}.<br/><br/>
For more details, please login to the NCS Customer Database System.
 <br /><br />Sincerely,<br />NCS System<br /></p>";
						
							$mail->Body = str_replace(array('{CLIENT_NAME}'),array($name), $htmlBody);
							$mail->Send();
							echo "You have successfully scheduled an appointment. Please check your email for details and confirmation.";
							$mail->ClearAddresses();
						

							$this->session->set_flashdata('item', array('message' => 'You have successfully scheduled an appointment. Please check your email for details and confirmation.','class' => 'success'));	
						}else{
							$this->session->set_flashdata('item', array('message' => 'Message could not be sent at the moment. Please try again later.','class' => 'danger'));
						}	



						
					}

				}
				/*$data = array($uid,$type,$datepick,$whole_day,$timepick1,$timepick2,$status,$message);
				$this->help_model->save_request($data);	
				$this->session->set_flashdata('item', array('message' => 'You have successfully scheduled an appointment. Please check your email for details and confirmation.','class' => 'success')); 	*/	
			}else{
				$mail->addReplyTo($usergmail, 'NCS FNRI');
				$mail->WordWrap = 50;
				// Set word wrap to 50 characters
				$mail->isHTML(true);
				// Set email format to HTML
				//$client_request="<a href=\"http://localhost/fnri-help/administrator/index.php\">here </a>";
				$mail->Subject = 'Client Request';
				$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear {CLIENT_NAME},<br /><br />
 We have received your appointment request and it's now being processed. You will be hearing from us very soon.<br/><br/>
Thank you very much for spending a moment to fill up the form.
 <br /><br />Best Regards,<br />
The Nutrition Counseling Service Team<br />
ncsfnri@gmail.com<br/>
Tel. No.: 8372071 local 2288 or 2299</p>";
				$mail->Body = str_replace(array('{CLIENT_NAME}'),array($name,$event_type), $htmlBody);
				//$mail->Body = str_replace('{TYPE}', $type, $htmlBody);
				$mail->addAddress($email_address);
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
				if($mail->Send()){
					$mail->ClearAddresses();
					$mail->addReplyTo($email_address, 'NCS FNRI');
					$mail->WordWrap = 50;
					// Set word wrap to 50 characters
					$mail->isHTML(true);
					// Set email format to HTML
					//$client_request="<a href=\"http://localhost/fnri-help/administrator/index.php\">here </a>";
					$mail->Subject = 'Sample Admin';
					$mail->addAddress($usergmail);
					$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
					// optional, comment out and test
					$htmlBody = "<p style=\"font-family:Georgia, Times New Roman, Times, serif; font-size:14px\">Dear administrator,<br /><br />
 The system received a request/ inquiry from {CLIENT_NAME} on {DATE} {TIME_FROM} for {NO._OF_PERSONS} person(s). Please reply to this email for confirmation.<br/><br/>
Sincerely,<br />NCS System<br /></p>";
					//$name= $lname." ".$fname.", ".$mname;
					$mail->Body = str_replace(array('{CLIENT_NAME}','{DATE}','{TIME_FROM}','{NO._OF_PERSONS}'),array($name,$date,$time,$no_person), $htmlBody);
				//$mail->Body = "$client_request";
					$mail->Send();
					$this->session->set_flashdata('item', array('message' => 'You have successfully scheduled an appointment. Please check your email for details and confirmation.','class' => 'success'));
				}else{
					$this->session->set_flashdata('item', array('message' => 'Message could not be sent at the moment. Please try again later.','class' => 'danger'));
				}




			}

				   	redirect('help/events', 'refresh');

		
       
        

		}
		
        
        
        
function puzzle_start(){
      $this->load->view('puzzle/access');
}
    
function history_main(){

    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
	$logged_in = $this->session->userdata['logged_in'];
            
	 		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
     }
          if (isset($logged_in) && $utype==1){

          	return

     		 $this->load->view('puzzle/history_main');

          }else{

         	
         	redirect(base_url());
          }

  
}
    
function home_data(){

    $this->load->view('puzzle/home_data');
}
function tools_data(){
    $this->load->view('puzzle/tools_data');
}
function tracker_data(){
    $this->load->view('puzzle/tracker_data');
}
    
    
function history_add_process(){
$title = $this->input->post('title');
$description = $this->input->post('description');
$category = $this->input->post('category');

if($category=="0"){
    $this->load->view('puzzle/cat'); 
}else{
    $add_data=array('name'=>$title,'facts'=>$description,'grp_stat'=>$category);
    $this->db->insert('tbl_help_puzzle',$add_data);
    
    $this->load->view('puzzle/history_main'); 
}
     
}
    
function history_edit_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    $category = $this->input->post('category');
    
            if($_FILES["inputFile1"]["name"] != ''){
                $config=array();
                $uploadPath = './assets/images/puzzle_photo/'; 
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['quality'] = '40%';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

            if($this->upload->do_upload('inputFile1')){
                $data = $this->upload->data();
                $name_file2 = $data["file_name"];
                
                if($category=="0"){
                    $this->load->view('puzzle/cat');  
                }else{
                    $edit_data=array('name'=>$title,'facts'=>$description,'grp_stat'=>$category,'photo'=>$name_file2);
                    $seg=$this->uri->segment(3, 0);
                    $this->db->where ('id',$seg);
                    $this->db->update('tbl_help_puzzle',$edit_data);

                    $this->load->view('puzzle/history_update');   
                }
            }
            elseif(!$this->upload->do_upload('file')){
                $this->load->view('puzzle/not_upload');  
            }
            else{
                $this->load->view('puzzle/went_wrong');  
            }
        }
        else{
                $this->load->view('puzzle/choose_file');  
            }
    
}
    
function history_delete_process(){
    
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_help_puzzle');

    $this->load->view('puzzle/history_main');  
}
    
function access_verify(){

    $data1=$this->input->post('access_code',TRUE);
    $data2=$this->input->post('password',TRUE);
    //$data=bin2hex($data2);
    //$this->load->model('mdl_adoptors', '', TRUE);
    //$user_access = $this->mdl_adoptors->user_access_sub($data1,$data1);
    $this->db->select('*');
    $this->db->from("admin_help");
    $this->db->where('user',$data1);
    $this->db->where('pass',$data2);   
    $query = $this->db->get();
    
    if($query->num_rows() != 0){
        redirect('/help/history_main', 'refresh');
    }
    else{
        $this->load->view('puzzle/access'); 
    }
    
}
    
    function game(){
      $this->load->view('puzzle/game'); 
    }
        
    function start_game(){
      $this->load->view('puzzle/start_game'); 
    }
        
    function cat1(){
      $this->load->view('puzzle/cat1'); 
    }
    
    function cat2(){
      $this->load->view('puzzle/cat2'); 
    }
    
    function cat3(){
      $this->load->view('puzzle/cat3'); 
    }
    
    function cat4(){
      $this->load->view('puzzle/cat4'); 
    }
        
    public function ptri_baseline(){
        $this->load->view('ptri/home'); 
    }
        
    public function ptri_verify(){
        
        $data1=$this->input->post('lastname',TRUE);
        //$data2=$this->input->post('birthdate',TRUE);
        
        $data['lname']=$data1;
        //$data['birthdate']=$data2;

        $this->db->select('*');
        $this->db->from("tbl_ptri_baseline");
        $this->db->where('email',$data1);
        //$this->db->where('birthdate',$data2);   
        $query = $this->db->get();

        if($query->num_rows() != 0){
            $this->load->view('ptri/access',$data); 
        }
        else{
            $this->load->view('ptri/wrong',$data); 
        }
        
    }

    public function home_ptri(){
        $this->load->view('ptri/home_ptri'); 
    }
        
//    public function ptri_admin(){
//        $this->load->view('puzzle/ptri'); 
//    }
        
    public function print_fel_book(){
        $this->load->library('Pdf_Liblary');
        //$this->load->view('new_update/header_sub');  
        $this->load->view('new_update/print_fel_book');  
        //$this->load->view('new_update/footer');  
    }
        
    public function print_fel_book_all(){
        $this->load->library('Pdf_Liblary');
        //$this->load->view('new_update/header_sub');  
        $this->load->view('new_update/print_fel_book_all');  
        //$this->load->view('new_update/footer');  
    }
          
function upload_data(){
    $this->load->library('excel');
        
        if ($this->input->post('importfile')) {
            $path = './assets/pdri_excel/';
            
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $flag = 0;
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            
            $createArray = array(     
            'lastname',
            'firstname',
            'middlename',
            'email',
            'gender',
            'birthdate',
            'institution',
            'weight',
            'height',
            'body_fat',
            'pa',
            'feet',
            'inches',
            'pounds',
            'bmi',
            'classification',
            'dbw',
            'll_dbw',
            'ul_dbw',
            'energy',
            'date'
            );

            $makeArray = array(   
            'lastname'=>'lastname',
            'firstname'=>'firstname',
            'middlename'=>'middlename',
            'email'=>'email',
            'gender'=>'gender',
            'birthdate'=>'birthdate',
            'institution'=>'institution',
            'weight'=>'weight',
            'height'=>'height',
            'body_fat'=>'body_fat',
            'pa'=>'pa',
            'feet'=>'feet',
            'inches'=>'inches',
            'pounds'=>'pounds',
            'bmi'=>'bmi',
            'classification'=>'classification',
            'dbw'=>'dbw',
            'll_dbw'=>'ll_dbw',
            'ul_dbw'=>'ul_dbw',
            'energy'=>'energy',
            'date'=>'date'    
            );
            
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            
            $data = array_diff_key($makeArray, $SheetDataKey);
            if($SheetDataKey['lastname']==""){}
            else{
                $flag = 1;
            }

            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    
            $lastname = $SheetDataKey['lastname'];
            $firstname = $SheetDataKey['firstname'];
            $middlename = $SheetDataKey['middlename'];
            $email = $SheetDataKey['email'];
            $gender = $SheetDataKey['gender'];
            $birthdate = $SheetDataKey['birthdate'];
            $institution = $SheetDataKey['institution'];
            $weight = $SheetDataKey['weight'];
            $height = $SheetDataKey['height'];
            $body_fat = $SheetDataKey['body_fat'];
            $pa = $SheetDataKey['pa'];
            $feet = $SheetDataKey['feet'];
            $inches = $SheetDataKey['inches'];
            $pounds = $SheetDataKey['pounds'];
            $bmi = $SheetDataKey['bmi'];
            $classification = $SheetDataKey['classification'];
            $dbw = $SheetDataKey['dbw'];
            $ll_dbw = $SheetDataKey['ll_dbw'];
            $ul_dbw = $SheetDataKey['ul_dbw'];
            $energy = $SheetDataKey['energy'];
            $date = $SheetDataKey['date'];

            $lastname = filter_var(trim($allDataInSheet[$i][$lastname]), FILTER_SANITIZE_STRING);
            $firstname = filter_var(trim($allDataInSheet[$i][$firstname]), FILTER_SANITIZE_STRING);
            $middlename = filter_var(trim($allDataInSheet[$i][$middlename]), FILTER_SANITIZE_STRING);
            $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
            $gender = filter_var(trim($allDataInSheet[$i][$gender]), FILTER_SANITIZE_STRING);
            $birthdate = filter_var(trim($allDataInSheet[$i][$birthdate]), FILTER_SANITIZE_STRING);
            $institution = filter_var(trim($allDataInSheet[$i][$institution]), FILTER_SANITIZE_STRING);
            $weight = filter_var(trim($allDataInSheet[$i][$weight]), FILTER_SANITIZE_STRING);
            $height = filter_var(trim($allDataInSheet[$i][$height]), FILTER_SANITIZE_STRING);
            $body_fat = filter_var(trim($allDataInSheet[$i][$body_fat]), FILTER_SANITIZE_STRING);
            $pa = filter_var(trim($allDataInSheet[$i][$pa]), FILTER_SANITIZE_STRING);
            $feet = filter_var(trim($allDataInSheet[$i][$feet]), FILTER_SANITIZE_STRING);
            $inches = filter_var(trim($allDataInSheet[$i][$inches]), FILTER_SANITIZE_STRING);
            $pounds = filter_var(trim($allDataInSheet[$i][$pounds]), FILTER_SANITIZE_STRING);
            $bmi = filter_var(trim($allDataInSheet[$i][$bmi]), FILTER_SANITIZE_STRING);
            $classification = filter_var(trim($allDataInSheet[$i][$classification]), FILTER_SANITIZE_STRING);
            $dbw = filter_var(trim($allDataInSheet[$i][$dbw]), FILTER_SANITIZE_STRING);
            $ll_dbw = filter_var(trim($allDataInSheet[$i][$ll_dbw]), FILTER_SANITIZE_STRING);
            $ul_dbw = filter_var(trim($allDataInSheet[$i][$ul_dbw]), FILTER_SANITIZE_STRING);
            $energy = filter_var(trim($allDataInSheet[$i][$energy]), FILTER_SANITIZE_STRING);
            $date = filter_var(trim($allDataInSheet[$i][$date]), FILTER_SANITIZE_STRING);

                    
//            if(($lastname=="")||($firstname=="")||($middlename=="")||($gender=="")||($birthdate=="")||($institution=="")||($date=="")){
//                break;
//            }

            if($gender=="F"){
                $gender="2";
            }else{
                $gender="1";
            }   
            $energy = str_replace(",","",$energy);

            $fetchData[] = array(          
            'lname' => $lastname,
            'fname' => $firstname,
            'mname' => $middlename,
            'email' => $email,
            'gender' => $gender,
            'birthdate' => $birthdate,
            'institution' => $institution,
            'weight' => $weight,
            'height' => $height,
            'body_fat' => $body_fat,
            'pa' => $pa,
            'feet' => $feet,
            'inches' => $inches,
            'pounds' => $pounds,
            'bmi' => $bmi,
            'classification' => $classification,
            'dbw' => $dbw,
            'll_dbw' => $ll_dbw,
            'ul_dbw' => $ul_dbw,
            'energy' => $energy,
            'date' => $date
            );
              
                }
            
            $this->load->model('mdl_help', '', TRUE);
            $data['employeeInfo'] = $fetchData;
            $this->mdl_help->setBatchImport($fetchData);
            $this->mdl_help->importData();
                
            }else {
                echo "Please import correct file";
            }
        }
    
$this->load->view('puzzle/ptri'); 
    
}
        
function active_ptri(){
    $seg=$this->uri->segment(3, 0);
    $data = array(
       $seg => "1" 	
    );
			
    $this->db->where('id', "1");
    $this->db->update('tbl_ptri_config', $data);
    $this->load->view('puzzle/ptri'); 
}
       
public function add_process(){
$lastname = $this->input->post("lastname");
$firstname = $this->input->post("firstname");
$middlename = $this->input->post("middlename");
$gender = $this->input->post("gender");
$birthdate = $this->input->post("birthdate");
$weight = $this->input->post("weight");
$height = $this->input->post("height");
$body_fat = $this->input->post("body_fat");
$pa = $this->input->post("pa");
$institution = $this->input->post("institution");
$feet_input = $this->input->post("feet_input");
$inches_input = $this->input->post("inches_input");
$pounds_input = $this->input->post("pounds_input");
$bmi_input = $this->input->post("bmi_input");
$dbw_input = $this->input->post("dbw_input");
$lldbw_input = $this->input->post("lldbw_input");
$uldbw_input = $this->input->post("uldbw_input");
$energy_input = $this->input->post("energy_input");
$cla_input = $this->input->post("cla_input");
$assess = $this->input->post("assess");
$email = $this->input->post("email");
    
$assess_sub = str_replace("-","/",$assess);
  
$data_ptri=array(
"lname"=>$lastname,
"fname"=>$firstname,
"mname"=>$middlename,
"email"=>$email,
"gender"=>$gender,
"birthdate"=>$birthdate,
"institution"=>$institution,
"weight"=>$weight,
"height"=>$height,
"body_fat"=>$body_fat,
"pa"=>$pa,
"feet"=>$feet_input,
"inches"=>$inches_input,
"pounds"=>$pounds_input,
"bmi"=>$bmi_input,
"classification"=>$cla_input,
"dbw"=>$dbw_input,
"ll_dbw"=>$lldbw_input,
"ul_dbw"=>$uldbw_input,
"energy"=>$energy_input,
"date"=>$assess_sub
);

$this->db->insert('tbl_ptri_baseline',$data_ptri);
$this->load->view('puzzle/ptri'); 
}
		
function edit_process(){
    $this->load->view('puzzle/edit_ptri'); 
}
    
function edit_process_complete(){
$lastname = $this->input->post("lastname");
$firstname = $this->input->post("firstname");
$middlename = $this->input->post("middlename");
$gender = $this->input->post("gender");
$birthdate = $this->input->post("birthdate");
$weight = $this->input->post("weight");
$height = $this->input->post("height");
$body_fat = $this->input->post("body_fat");
$pa = $this->input->post("pa");
$institution = $this->input->post("institution");
$feet_input = $this->input->post("feet_input");
$inches_input = $this->input->post("inches_input");
$pounds_input = $this->input->post("pounds_input");
$bmi_input = $this->input->post("bmi_input");
$dbw_input = $this->input->post("dbw_input");
$lldbw_input = $this->input->post("lldbw_input");
$uldbw_input = $this->input->post("uldbw_input");
$energy_input = $this->input->post("energy_input");
$cla_input = $this->input->post("cla_input");
$assess = $this->input->post("assess");
$email = $this->input->post("email");
    
$assess_sub = str_replace("-","/",$assess);
  
$data_ptri=array(
"lname"=>$lastname,
"fname"=>$firstname,
"mname"=>$middlename,
"email"=>$email,
"gender"=>$gender,
"birthdate"=>$birthdate,
"institution"=>$institution,
"weight"=>$weight,
"height"=>$height,
"body_fat"=>$body_fat,
"pa"=>$pa,
"feet"=>$feet_input,
"inches"=>$inches_input,
"pounds"=>$pounds_input,
"bmi"=>$bmi_input,
"classification"=>$cla_input,
"dbw"=>$dbw_input,
"ll_dbw"=>$lldbw_input,
"ul_dbw"=>$uldbw_input,
"energy"=>$energy_input,
"date"=>$assess_sub
);
    
$seg=$this->uri->segment(3, 0);
$this->db->where('id', $seg);
$this->db->update('tbl_ptri_baseline', $data_ptri);	
    
$this->load->view('puzzle/ptri'); 
}
        
function questionnaire(){
$this->load->view('puzzle/questionnaire'); 
}
      
function feedbackform(){
//questition_new_ 6 loop x5
$questition_new=array();
for($i=0;$i<=5;$i++){
    $pass="questition_new_".$i;
    $questition_new[$i]=$this->input->post($pass);
}

//questition_6_ 3 loop x5
$questition_6=array();
for($i=0;$i<=2;$i++){
    $pass="questition_6_".$i;
    $questition_6[$i]=$this->input->post($pass);
}

//questition_5_ 4 loop x5
$questition_5=array();
for($i=0;$i<=3;$i++){
    $pass="questition_5_".$i;
    $questition_5[$i]=$this->input->post($pass);
}

//questition_4_ 4 loop x5
$questition_4=array();
for($i=0;$i<=3;$i++){
    $pass="questition_4_".$i;
    $questition_4[$i]=$this->input->post($pass);
}
    
//questition_3_ 4 loop x5
$questition_3=array();
for($i=0;$i<=3;$i++){
    $pass="questition_3_".$i;
    $questition_3[$i]=$this->input->post($pass);
}
    
//questition_2_ 4 loop x5
$questition_2=array();
for($i=0;$i<=3;$i++){
    $pass="questition_2_".$i;
    $questition_2[$i]=$this->input->post($pass);
}

//questition_7 x5
$quest7=$this->input->post("questition_7");    
    
//questition_8 x5
$quest8=$this->input->post("questition_8");    
    
//questition_9 x5
$quest9=$this->input->post("questition_9");    

//*text last
$last_1=$this->input->post("last_1");
$last_2=$this->input->post("last_2");

//quest_1_4 x2
//quest_1_4_other 1st
$quest_1_4=$this->input->post("quest_1_4");
$quest_1_4_other=$this->input->post("quest_1_4_other");

//quest_1_3 x3
$quest_1_3=$this->input->post("quest_1_3");

//quest_1_1 x2
//quest_1_1_other 2nd
$quest_1_1=$this->input->post("quest_1_1");
$quest_1_1_other=$this->input->post("quest_1_1_other");
    
//quest_1_2 x2
$quest_1_2=$this->input->post("quest_1_2");

//occu x4
//other_occu
$occu=$this->input->post("occu");
$other_occu=$this->input->post("other_occu");

//educ x4
//other_educ 4th
$educ=$this->input->post("educ");
$other_educ=$this->input->post("other_educ");

//status x3
//other_status 3rd
$status=$this->input->post("status");
$other_status=$this->input->post("other_status");

//sex x2
$sex=$this->input->post("sex");

//lastname
//firstname
//middlename
//date
$lastname=$this->input->post("lastname");
$firstname=$this->input->post("firstname");
$middlename=$this->input->post("middlename");
$date_bday=$this->input->post("date");

   
    
    
/*$questition_new=array();
for($i=0;$i<=5;$i++){
    $pass="questition_new_".$i;
    echo $this->input->post($pass)."<br>";
}
$questition_6=array();
for($i=0;$i<=2;$i++){
    $pass="questition_6_".$i;
    echo $this->input->post($pass)."<br>";
}
$questition_5=array();
for($i=0;$i<=3;$i++){
    $pass="questition_5_".$i;
    echo $this->input->post($pass)."<br>";
}
$questition_4=array();
for($i=0;$i<=3;$i++){
    $pass="questition_4_".$i;
    echo $this->input->post($pass)."<br>";
}
$questition_3=array();
for($i=0;$i<=3;$i++){
    $pass="questition_3_".$i;
    echo $this->input->post($pass)."<br>";
}
$questition_2=array();
for($i=0;$i<=3;$i++){
    $pass="questition_2_".$i;
    echo $this->input->post($pass)."<br>";
}
echo $quest7."<br>";
echo $quest8."<br>";
echo $quest9."<br>";
echo $last_1."<br>";
echo $last_2."<br>";
echo $quest_1_4."<br>";
echo $quest_1_4_other."<br>";
echo $quest_1_3."<br>";
echo $quest_1_1."<br>";
echo $quest_1_1_other."<br>";
echo $occu."<br>";
echo $other_occu."<br>";
echo $educ."<br>";
echo $other_educ."<br>";
echo $status."<br>";
echo $other_status."<br>";
echo $sex."<br>";
echo $lastname."<br>";
echo $firstname."<br>";
echo $middlename."<br>";
echo $date."<br>";

46 fields
+1 for current date
*/
    
$date=date(DATE_RFC2822, time());
$data_feedback = array(
    "lname" => $lastname,
    "fname" => $firstname,
    "mname" => $middlename,
    "birthdate" => $date_bday,
    "sex" => $sex,
    "status" => $status,
    "status_other" => $other_status,
    "educ" => $educ,
    "educ_other" => $other_educ,
    "occup" => $occu,
    "occup_other" => $other_occu,
    "q_1_1" => $quest_1_1,
    "q_1_1_other" => $quest_1_1_other,
    "q_1_2" => $quest_1_2,
    "q_1_3" => $quest_1_3,
    "q_1_4" => $quest_1_4,
    "q_1_4_other" => $quest_1_4_other,
    "attrac_1" => $questition_2[0],
    "attrac_2" => $questition_2[1],
    "attrac_3" => $questition_2[2],
    "attrac_4" => $questition_2[3],
    "comp_1" => $questition_3[0],
    "comp_2" => $questition_3[1],
    "comp_3" => $questition_3[2],
    "comp_4" => $questition_3[3],
    "accep_1" => $questition_4[0],
    "accep_2" => $questition_4[1],
    "accep_3" => $questition_4[2],
    "accep_4" => $questition_4[3],
    "ease_1" => $questition_5[0],
    "ease_2" => $questition_5[1],
    "ease_3" => $questition_5[2],
    "ease_4" => $questition_5[3],
    "self_1" => $questition_6[0],
    "self_2" => $questition_6[1],
    "self_3" => $questition_6[2],
    "per_1" => $questition_new[0],
    "per_2" => $questition_new[1],
    "per_3" => $questition_new[2],
    "per_4" => $questition_new[3],
    "per_5" => $questition_new[4],
    "per_6" => $questition_new[5],
    "over_1" => $quest7,
    "over_2" => $quest8,
    "over_3" => $quest9,
    "last_1" => $last_1,
    "last_2" => $last_2,
    "date" => $date
);
    
    $this->db->insert('tbl_feedbackform', $data_feedback);
    $this->load->view('puzzle/feedback_done'); 
}
        
function NSTW(){
$this->load->view('ptri/nstw'); 
}
        
function NSTW_survey1(){
$this->load->view('ptri/nstw_survey1'); 
}
    
function NSTW_survey2(){
$this->load->view('ptri/nstw_survey2'); 
}
        
function NSTW_choice(){
$this->load->view('ptri/nstw_choice'); 
}
        
public function save_form1(){
$gender = $this->input->post("gender");
$educ = $this->input->post("educ");
$educ_in = $this->input->post("educ_in");
$region = $this->input->post("region");
$profe = $this->input->post("profe");
$affi = $this->input->post("affi");
$email_add = $this->input->post("email_add");
$nutri = $this->input->post("nutri");
$visit = $this->input->post("visit");
$impor = $this->input->post("impor");
$tips = $this->input->post("tips");
$facts = $this->input->post("facts");
$info = $this->input->post("info");
$info_in = $this->input->post("info_in");
$common1 = $this->input->post("common1");
$common2 = $this->input->post("common2");
$common3 = $this->input->post("common3");
$common4 = $this->input->post("common4");
$common5 = $this->input->post("common5");
$usual = $this->input->post("usual");
$usual_in = $this->input->post("usual_in");
$cmcon = $this->input->post("cmcon");
$ccon = $this->input->post("ccon");
$ccon_in = $this->input->post("ccon_in");
$image = $this->input->post("image");
$image_in = $this->input->post("image_in");
$langu = $this->input->post("langu");
$langu_in = $this->input->post("langu_in");
$like = $this->input->post("like");
$like_in = $this->input->post("like_in");
$recom = $this->input->post("recom");
$suggest = $this->input->post("suggest");
    
    
    $data = array(
        "gender" => $gender,
        "educ" => $educ,
        "educ_in" => $educ_in,
        "region" => $region,
        "profe" => $profe,
        "affi" => $affi,
        "email_add" => $email_add,
        "nutri" => $nutri,
        "visit" => $visit,
        "impor" => $impor,
        "tips" => $tips,
        "facts" => $facts,
        "info" => $info,
        "info_in" => $info_in,
        "common1" => $common1,
        "common2" => $common2,
        "common3" => $common3,
        "common4" => $common4,
        "common5" => $common5,
        "usual" => $usual,
        "usual_in" => $usual_in,
        "cmcon" => $cmcon,
        "ccon" => $ccon,
        "ccon_in" => $ccon_in,
        "image" => $image,
        "image_in" => $image_in,
        "langu" => $langu,
        "langu_in" => $langu_in,
        "like_data" => $like,
        "like_in" => $like_in,
        "recom" => $recom,
        "suggest" => $suggest
    );
	$this->db->insert('tbl_survey1', $data);
    
    $this->load->view('ptri/nstw_done'); 

}
        
function NSTW_stat(){
$this->load->view('ptri/nstw_stat'); 
}

function NSTW_stat_survey(){
$this->load->view('ptri/nstw_survey_stat'); 
}
        
function home_add_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    $date=date(DATE_RFC2822, time());
    
    if($_FILES["inputFile1"]["name"] != ''){
            $config=array();
            $uploadPath = './assets/images/home_data/'; 
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
        if($this->upload->do_upload('inputFile1')){
            $data = $this->upload->data();
            $name_file2 = $data["file_name"];
            $add_data=array('title'=>$title,'content'=>$description,'image_data'=>$name_file2);

            $this->db->insert('tbl_home',$add_data);
            
            echo "<p class='alert alert-success'>Successfully Add Data</alert>";
        }
        elseif(!$this->upload->do_upload('file')){
            
        }
        else{
            
        }
    } 
}
        
function home_delete_process(){
    
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_home');

    $this->load->view('puzzle/home_data');  
}
        
function tools_add_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    $date=date(DATE_RFC2822, time());
    
    if($_FILES["inputFile1"]["name"] != ''){
            $config=array();
            $uploadPath = './assets/images/tools_data/'; 
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
        if($this->upload->do_upload('inputFile1')){
            $data = $this->upload->data();
            $name_file2 = $data["file_name"];
            $add_data=array('title'=>$title,'content'=>$description,'image_data'=>$name_file2);

            $this->db->insert('tbl_tools',$add_data);
            
            echo "<p class='alert alert-success'>Successfully Add Data</alert>";
        }
        elseif(!$this->upload->do_upload('file')){
            
        }
        else{
            
        }
    } 
}
        
function tools_delete_process(){
    
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_tools');

    $this->load->view('puzzle/tools_data');  
}
        
function tracker_add_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    $date=date(DATE_RFC2822, time());
    
    if($_FILES["inputFile1"]["name"] != ''){
            $config=array();
            $uploadPath = './assets/images/tracker_data/'; 
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
        if($this->upload->do_upload('inputFile1')){
            $data = $this->upload->data();
            $name_file2 = $data["file_name"];
            $add_data=array('title'=>$title,'content'=>$description,'image_data'=>$name_file2);

            $this->db->insert('tbl_tracker',$add_data);
            
            echo "<p class='alert alert-success'>Successfully Add Data</alert>";
        }
        elseif(!$this->upload->do_upload('file')){
            
        }
        else{
            
        }
    } 
}
        
function tracker_delete_process(){
    
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_tracker');

    $this->load->view('puzzle/tracker_data');  
}
        
function user_index(){
    $this->load->view('new_update/header');  
    $this->load->view('new_update/index');  
    $this->load->view('new_update/footer');  
}

//-----------------------------------
        
function fel_intro(){
    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
                $this->load->view('puzzle/fel_intro');

          }
           else
          {
         	redirect(base_url());
          }
}
        
function fel_add_process(){
 
    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
                
  if (isset($logged_in) && !isset($uid))
   {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
            return
                  $title = $this->input->post('title');
    $description = $this->input->post('description');
    
    $add_data=array('title'=>$title,'description'=>$description);
    $this->db->insert('tbl_fel_intro',$add_data);

    $this->load->view('puzzle/fel_intro');

          }
           else
          {
          redirect(base_url());
          }
}
        
function fel_edit_process(){

   $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
    $title = $this->input->post('title');
    $description = $this->input->post('description');
                
  if (isset($logged_in) && !isset($uid))
   {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
            return
         $data=array('title'=>$title,'description'=>$description);
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_fel_intro', $data);  

    $this->load->view('puzzle/fel_intro');

          }
           else
          {
          redirect(base_url());
          }




   
}
        
function fel_delete_process(){
 






   $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
    $title = $this->input->post('title');
    $description = $this->input->post('description');
                
  if (isset($logged_in) && !isset($uid))
   {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
            return
   $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_fel_intro');

    $this->load->view('puzzle/fel_intro');

    $this->load->view('puzzle/fel_intro');

          }
           else
          {
          redirect(base_url());
          }








}
        
function pingang_pinoy_intro(){
	
    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
                $this->load->view('puzzle/pingang_pinoy_intro');

          }
           else
          {
         	redirect(base_url());
          }




}
        
function pingang_pinoy_add_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    
    $add_data=array('title'=>$title,'description'=>$description);
    $this->db->insert('tbl_pingang_pinoy_intro',$add_data);

    $this->load->view('puzzle/pingang_pinoy_intro');
}
        
function pingang_pinoy_edit_process()
{
	if (isset($this->session->userdata['logged_in']))
	{
		$title = $this->input->post('title');
	    $description = $this->input->post('description');
	    
	    $data=array('title'=>$title,'description'=>$description);
	    $this->db->where('id', $this->uri->segment(3));
	    $this->db->update('tbl_pingang_pinoy_intro', $data);	

	    $this->load->view('puzzle/pingang_pinoy_intro');
	}
	else
	{
		redirect(base_url().'help/user_index');
	}
}
        
function pingang_pinoy_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_pingang_pinoy_intro');

    $this->load->view('puzzle/pingang_pinoy_intro');
}
        
function faq_main(){

    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
             $this->load->view('puzzle/faq_main');

          }
           else
          {
         	redirect(base_url());
          }







    
}
        
function faq_main_add_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    
    $add_data=array('title'=>$title,'description'=>$description);
    $this->db->insert('tbl_faq_main',$add_data);

    $this->load->view('puzzle/faq_main');
}
        
function faq_main_edit_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    
    $data=array('title'=>$title,'description'=>$description);
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_faq_main', $data);	

    $this->load->view('puzzle/faq_main');
}
        
function faq_main_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_faq_main');

    $this->load->view('puzzle/faq_main');
}
        
function meal_plan(){
    $this->load->view('puzzle/meal_plan');
}
        
function login_user(){
    $this->load->view('new_update/header_log');  
    $this->load->view('new_update/login');  
    $this->load->view('new_update/footer_log');  
}
        
function register_user(){
    $this->load->view('new_update/header_log');  
    $this->load->view('new_update/register_user');  
    $this->load->view('new_update/footer_log');  
}

function faq_main_page(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/faq_main_page');  
    $this->load->view('new_update/footer');  
}

function pingang_pinoy_page(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/pingang_pinoy_page');  
    $this->load->view('new_update/footer');  
}
    
function fel_page(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_page');  
    $this->load->view('new_update/footer');  
}
   
function fel_page1(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_page1');  
    $this->load->view('new_update/footer');  
}
  
function fel_page2(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_page2');  
    $this->load->view('new_update/footer');  
}
        
function fel_page3(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_page3');  
    $this->load->view('new_update/footer');  
}
        
function fel_page4(){
    
    $this->load->model('Help_model', '', TRUE);
    $data['fel'] = $this->load->Help_model->get_foodgroup();
    //var_dump($data);
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_page4',$data);  
    $this->load->view('new_update/footer');  
}
        
function fel_booklet(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/fel_booklet');  
    $this->load->view('new_update/footer');  
}
        
function fel_cat(){
	    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
                $this->load->view('puzzle/fel_cat');

          }
           else
          {
         	redirect(base_url());
          }
}
        
function fel_cat_add_process(){
    $title = $this->input->post('title_1');
    $description = $this->input->post('title_2');
    
    $add_data=array('numerical_val'=>$title,'name'=>$description);
    $this->db->insert('tbl_list',$add_data);

    $this->load->view('puzzle/fel_cat');
}
        
function fel_cat_edit_process(){
    $title = $this->input->post('title_1');
    $description = $this->input->post('title_2');
    
    $data=array('numerical_val'=>$title,'name'=>$description);
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_list', $data);	

    $this->load->view('puzzle/fel_cat');
}
        
function fel_cat_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_list');

    $this->load->view('puzzle/fel_cat');
}
        
function fel_food_photo(){ 
    $this->load->view('puzzle/food_photo');  
}
        
function fel_items(){ 
    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
            $this->session->sess_destroy();
         } 
        if (isset($logged_in) && $utype==1)
         {
            return
            $this->load->view('puzzle/fel_content');
          }
        else
          {
             redirect(base_url());
          }
}
        
function fel_content_add_process(){
    
$list_cat = $this->input->post('list_cat');
$type_cat = $this->input->post('type_cat');
$name_e = $this->input->post('name_e');
$name_p = $this->input->post('name_p');
$household_measure = $this->input->post('household_measure');
$weight = $this->input->post('weight');
$calorie = $this->input->post('calorie');
$carb = $this->input->post('carb');
$protein = $this->input->post('protein');
$fat = $this->input->post('fat');
    
    $add_data=array(
        'list_id'=>$list_cat,
        'category'=>$type_cat,
        'name_e'=>$name_e,
        'name_p'=>$name_p,
        'weight'=>$weight,
        'household_measure'=>$household_measure,
        'calorie'=>$calorie,
        'carb'=>$carb,
        'protein'=>$protein,
        'fat'=>$fat
    );
    $this->db->insert('tbl_image_lib',$add_data);

    $this->load->view('puzzle/fel_content');
}
        
function fel_content_edit_process(){

$list_cat = $this->input->post('list_cat');
$type_cat = $this->input->post('type_cat');
$name_e = $this->input->post('name_e');
$name_p = $this->input->post('name_p');
$household_measure = $this->input->post('household_measure');
$weight = $this->input->post('weight');
$calorie = $this->input->post('calorie');
$carb = $this->input->post('carb');
$protein = $this->input->post('protein');
$fat = $this->input->post('fat');
    
    $data=array(
        'list_id'=>$list_cat,
        'category'=>$type_cat,
        'name_e'=>$name_e,
        'name_p'=>$name_p,
        'weight'=>$weight,
        'household_measure'=>$household_measure,
        'calorie'=>$calorie,
        'carb'=>$carb,
        'protein'=>$protein,
        'fat'=>$fat
    );
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_image_lib', $data);	

    $this->load->view('puzzle/fel_content');
}
  
function fel_content_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_image_lib');

    $this->load->view('puzzle/fel_content');
}
        
function login_onetime(){
            
          $username =  hex2bin($this->uri->segment(3, 0));
          $email =  hex2bin($this->uri->segment(4, 0));
          $firstname =  hex2bin($this->uri->segment(5, 0));
          $lastname =  hex2bin($this->uri->segment(6, 0));
          $company =  hex2bin($this->uri->segment(7, 0));
          
            $num_check = 0;
            $this->load->model('mdl_help', '', TRUE);
            foreach ($this->load->mdl_help->check_user($email) as $value) {
                $num_check++;
                
                       $sess_array = array( 
                        'id'    => $value->id,
                        'lname' => $value->lname,
                        'fname' => $value->fname,
                        'mname' => $value->mname,
                        'username' => $value->username,
                        'gender' => $value->gender,
                        'birthday' => $value->birthday == "" ? "2024-12-31": date("Y-m-d", strtotime($value->birthday)), 
                        'email_address' => $value->email_address,
                        'user_type_id'  => $value->user_type_id,
                        'logged_in'     => TRUE
                       );
                
                       $this->session->set_userdata($sess_array);
                       redirect(base_url()."help/user_index");
                
            }
    
    if($num_check==0){
                $registrant_arr = array(
                    "lname"         => $lastname,
                    "fname"         => $firstname,
                    "mname"         => "",
                    "extension"     => "",
                    "gender"  		=> 1,
                    "birthday"     => "",
                    "address"       => $company,
                    "contact_number"  => "",
                    "email_address"   => $email,
                    "username" 	      => $username,
                    "password" 		  => md5($username),
                    "active"          => 0,
                    "user_type_id"    => 3
                );
        
            $this->db->insert('users_db',$registrant_arr); 
        
        foreach ($this->load->mdl_help->check_user($email) as $value) {
                
                       $sess_array = array( 
                        'id'    => $value->id,
                        'lname' => $value->lname,
                        'fname' => $value->fname,
                        'mname' => $value->mname,
                        'username'      => $value->username,
                        'gender' => $value->gender,
                        'birthday' => $value->birthday,
                        'email_address' => $value->email_address,
                        'user_type_id'  => $value->user_type_id,
                        'logged_in'     => TRUE
                       );

                    $this->session->set_userdata($sess_array);
                    redirect(base_url()."help/user_index");
                
            }
        
    }
        
 //print_r($sess_array);
    
}
        
        
function fel_app_true(){
      if (isset($this->session->userdata['logged_in']))
  {
    $this->load->view('puzzle/fel_app_true');   
  }
  else
  {
    redirect(base_url().'help/user_index');
  
}
}
        
function fel_app_true_add_process(){
    $title = $this->input->post('title_1');
    
    $add_data=array('true_app'=>$title);
    $this->db->insert('tbl_true_app',$add_data);

    $this->load->view('puzzle/fel_app_true');
}
        
function fel_app_true_edit_process(){
    $title = $this->input->post('title_1');
    
    $data=array('true_app'=>$title);
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_true_app', $data);	

    $this->load->view('puzzle/fel_app_true');
}
        
function fel_app_true_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_true_app');

    $this->load->view('puzzle/fel_app_true');
}
   
        
function fel_app_category(){
	    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
                $this->load->view('puzzle/fel_app_category');

          }
           else
          {
         	redirect(base_url());
          }
}
        
function fel_app_category_add_process(){
    $title = $this->input->post('title_1');
    
    $add_data=array('name_app'=>$title);
    $this->db->insert('tbl_fel_app',$add_data);

    $this->load->view('puzzle/fel_app_category');
}
        
function fel_app_category_edit_process(){
    $title = $this->input->post('title_1');
    
    $data=array('name_app'=>$title);
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_fel_app', $data);	

    $this->load->view('puzzle/fel_app_category');
}
        
function fel_app_category_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_fel_app');

    $this->load->view('puzzle/fel_app_category');
}
     
        
function fel_app_content(){
    $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
    $logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
                $this->load->view('puzzle/fel_app_content');

          }
           else
          {
         	redirect(base_url());
          }
}
        
function fel_content_sub_add_process(){    
        
$app_true = $this->input->post('list_cat');
$app_cat = $this->input->post('type_cat');
$name_e = $this->input->post('name_e');
$name_p = $this->input->post('name_p');
$household_measure = $this->input->post('household_measure');
$weight = $this->input->post('weight');
$app_fruit = $this->input->post('app_fruit');
$app_milk = $this->input->post('app_milk');
$app_sugar = $this->input->post('app_sugar');
$app_fat = $this->input->post('app_fat');
$app_rice = $this->input->post('app_rice');
$app_meat = $this->input->post('app_meat');
$app_veg = $this->input->post('app_veg');
$calorie = $this->input->post('calorie');
$carb = $this->input->post('carb');
$protein = $this->input->post('protein');
$fat = $this->input->post('fat');
    
    $add_data=array(
        'true_serve' => $app_true,
        'category' => $app_cat,
        'name_e' => $name_e,
        'name_p' => $name_p,
        'veg' => $app_veg,
        'fruit' => $app_fruit,
        'milk' => $app_milk,
        'rice' => $app_rice,
        'meat' => $app_meat,
        'fat_serve' => $app_fat,
        'sugar' => $app_sugar,
        'weight' => $weight,
        'household_measure' => $household_measure,
        'calorie' => $calorie,
        'carb' => $carb,
        'protein' => $protein,
        'fat' => $fat,
    );
    
    $this->db->insert('tbl_fel_content_sub',$add_data);

    $this->load->view('puzzle/fel_app_content');
    
}
        
function fel_content_sub_edit_process(){    
        
$app_true = $this->input->post('list_cat');
$app_cat = $this->input->post('type_cat');
$name_e = $this->input->post('name_e');
$name_p = $this->input->post('name_p');
$household_measure = $this->input->post('household_measure');
$weight = $this->input->post('weight');
$app_fruit = $this->input->post('app_fruit');
$app_milk = $this->input->post('app_milk');
$app_sugar = $this->input->post('app_sugar');
$app_fat = $this->input->post('app_fat');
$app_rice = $this->input->post('app_rice');
$app_meat = $this->input->post('app_meat');
$app_veg = $this->input->post('app_veg');
$calorie = $this->input->post('calorie');
$carb = $this->input->post('carb');
$protein = $this->input->post('protein');
$fat = $this->input->post('fat');
    
    $data=array(
        'true_serve' => $app_true,
        'category' => $app_cat,
        'name_e' => $name_e,
        'name_p' => $name_p,
        'veg' => $app_veg,
        'fruit' => $app_fruit,
        'milk' => $app_milk,
        'rice' => $app_rice,
        'meat' => $app_meat,
        'fat_serve' => $app_fat,
        'sugar' => $app_sugar,
        'weight' => $weight,
        'household_measure' => $household_measure,
        'calorie' => $calorie,
        'carb' => $carb,
        'protein' => $protein,
        'fat' => $fat,
    );
    
    
    $this->db->where('id', $this->uri->segment(3));
    $this->db->update('tbl_fel_content_sub', $data);

    $this->load->view('puzzle/fel_app_content');
    
}
        
function fel_content_sub_delete_process(){
    $this->db->where ('id',$this->uri->segment(3));
    $this->db->delete('tbl_fel_content_sub');

    $this->load->view('puzzle/fel_app_content');
}
        
function fel_food_photo_sub(){
    $this->load->view('puzzle/fel_food_photo_sub');   
}
           
public function fel_do_upload_banner(){
    if($_FILES["files_banner"]["name"] != ''){
        $output = '';
        $config=array();
        $uploadPath = './assets/images/fel_photo/'; 
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|JPG|PNG';
        $config['max_size'] = '3024';
        $config['maintain_ratio'] = TRUE;
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        for($count = 0; $count < count($_FILES["files_banner"]["name"]); $count++){
            $_FILES["file"]["name"] = $_FILES["files_banner"]["name"][$count];
            $_FILES["file"]["type"] = $_FILES["files_banner"]["type"][$count];
            $_FILES["file"]["tmp_name"] = $_FILES["files_banner"]["tmp_name"][$count];
            $_FILES["file"]["error"] = $_FILES["files_banner"]["error"][$count];
            $_FILES["file"]["size"] = $_FILES["files_banner"]["size"][$count];
            if($this->upload->do_upload('file')){

                $data = $this->upload->data();

                $img=$data["file_name"];
                $add_img=array('image_lib'=>$img);
                
                $seg=$this->uri->segment(3, 0);
                $this->db->where ('id',$seg);
                $this->db->update('tbl_image_lib',$add_img);

                $output = '<img width="70%" height="auto" src="'.base_url().'assets/images/fel_photo/'.$data["file_name"].'" class="img-responsive img-thumbnail" title="'.$data["file_name"].'"/>';
            }
            elseif(!$this->upload->do_upload('file')){
                    echo $this->upload->display_errors();
            }
            else{
                echo '<div class="col-sm-4 text-danger">Sorry! Something Went Wrong!</div>';
            }
            echo $output;
        }
    }
}
        
public function fel_sub_do_upload_banner(){
    if($_FILES["files_banner"]["name"] != ''){
        $output = '';
        $config=array();
        $uploadPath = './assets/images/fel_photo/'; 
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|JPG|PNG';
        $config['max_size'] = '3024';
        $config['maintain_ratio'] = TRUE;
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        for($count = 0; $count < count($_FILES["files_banner"]["name"]); $count++){
            $_FILES["file"]["name"] = $_FILES["files_banner"]["name"][$count];
            $_FILES["file"]["type"] = $_FILES["files_banner"]["type"][$count];
            $_FILES["file"]["tmp_name"] = $_FILES["files_banner"]["tmp_name"][$count];
            $_FILES["file"]["error"] = $_FILES["files_banner"]["error"][$count];
            $_FILES["file"]["size"] = $_FILES["files_banner"]["size"][$count];
            if($this->upload->do_upload('file')){

                $data = $this->upload->data();

                $img=$data["file_name"];
                $add_img=array('image_lib'=>$img);

                $seg=$this->uri->segment(3, 0);
                $this->db->where ('id',$seg);
                $this->db->update('tbl_fel_content_sub',$add_img);

                $output = '<img width="70%" height="auto" src="'.base_url().'assets/images/fel_photo/'.$data["file_name"].'" class="img-responsive img-thumbnail" title="'.$data["file_name"].'"/>';
            }
            elseif(!$this->upload->do_upload('file')){
                    echo $this->upload->display_errors();
            }
            else{
                echo '<div class="col-sm-4 text-danger">Sorry! Something Went Wrong!</div>';
            }
            echo $output;
        }
    }
}

function fel_food_photo_sub_upload(){
    $this->load->view('puzzle/fel_food_photo_sub_update');   
}
        
function food_photo_upload(){
    $this->load->view('puzzle/food_photo_update');   
}
   
        
function infographics_files(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/infographics');  
    $this->load->view('new_update/footer');  
}
        
function brochures_files(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/brochures');  
    $this->load->view('new_update/footer');  
}
        
function street_food_files(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/street_food');  
    $this->load->view('new_update/footer');  
}
        
function pingangpinoy_files(){
    $this->load->view('new_update/header_sub');  
    $this->load->view('new_update/pingangpinoy_files');  
    $this->load->view('new_update/footer');  
}
        
function fct_main(){

 $uid= $this->session->id; 
    $utype = $this->session->user_type_id;
	$logged_in = $this->session->userdata['logged_in'];
            
	 		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
     }
          if (isset($logged_in) && $utype==1){

          	return

    $this->load->view('puzzle/fct_data'); 

          }else{

         	
         	redirect(base_url());
          }






}
        
        public function fast_tools_enchance()
		{
			$this->load->view('new_update/header_sub');  
            $this->load->view('fast_tools_enchance');  
            $this->load->view('new_update/footer');  
		}

        public function nutrition_label_update()
		{
			$this->load->view('new_update/header_sub');  
            $this->load->view('new_update/nutrition_label');  
            $this->load->view('new_update/footer');  
		}
        
        public function events_update()
		{
			$this->load->view('new_update/header_sub');  
            $this->load->view('new_update/events');  
            $this->load->view('new_update/footer');  
		}
        
        
        public function counsel_wrong()
		{
			$this->load->view('new_update/header_sub');  
            $this->load->view('new_update/counsel_wrong');  
            $this->load->view('new_update/footer');  
		}
        
        public function counsel_done()
		{
			$this->load->view('new_update/header_sub');  
            $this->load->view('new_update/counsel_done');  
            $this->load->view('new_update/footer');  
		}
        
        public function counseling_main()
		{

			    $uid= $this->session->id; 
  				$utype = $this->session->user_type_id;
   				$logged_in = $this->session->userdata['logged_in'];
            		
	if (isset($logged_in) && !isset($uid))
	 {
              $this->session->sess_destroy();
         }
         
          if (isset($logged_in) && $utype==1)
         {
          	return
               $this->load->view('puzzle/counseling_main'); 

          }
           else
          {
         	redirect(base_url());
          }
		}
        
public function counseling_record (){    

    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $type_counceling = $this->input->post('type_counceling');
    $phone_no = $this->input->post('phone_no');
    $email = $this->input->post('email');
    $date_counsel = $this->input->post('date_counsel');
    $time_in = $this->input->post('time_in');
    $time_out = $this->input->post('time_out');
    $message = $this->input->post('message');
    
    if($type_counceling==0){
        redirect(base_url()."help/counsel_wrong");
    }else{
        $add_data=array(
            'fname'=>$fname,
            'lname'=>$lname,
            'type'=>$type_counceling,
            'phone_no'=>$phone_no,
            'email'=>$email,
            'date_counseling'=>$date_counsel,
            'time_in_counseling'=>$time_in,
            'time_out_counseling'=>$time_out,
            'message'=>$message
        );
        
        
        
        
        if($email!=""){
            //SMTP & mail configuration
            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ncsfnri@gmail.com',
                'smtp_pass' => 'ncsfnri123',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
        
        
                $this->load->library('email', $config);
        
                $this->email->set_newline("\r\n");
                $this->email->from('ncsfnri@gmail.com','NCS FNRI');
                $this->email->to($email);
                $this->email->subject('Nutrition Counseling (HELPOnline Website)');
                
                        $htmlContent = '<center><img width="60%" height="auto" src="'.base_url().'assets/images/logo_counseling.jpg" alt="" class="img-fluid"></center>';
                        $htmlContent .= '<h3>Dear Mr./ Mrs. '.$lname.', '.$fname.'</h3>';

                        $htmlContent .= '<br><p>We have received your request and its now being processed. You will be hearing from us very soon. Thank you very much for spending a moment to fill up the form.</p>';
                        $htmlContent .= '<br><p>Best regards,</p>';
            
            
            
                        $htmlContent .= '<br><br><p>Nutrition Counseling Service Team</p>';
                        $htmlContent .= '<p>DOST-FNRI</p>';
                        $htmlContent .= '<br><br><p>Email address: ncsfnri@gmail.com</p>';
                        $htmlContent .= '<p>Telephone number: 8837-2071 local 2299</p>';
            
                $this->email->message($htmlContent);
            
                $this->email->send();
                
        }
        
        
        $this->db->insert('tbl_counseling',$add_data); 
        redirect(base_url()."help/counsel_done");
    }
}
        
    public function test_email(){   
        $email = "umalijaysonmondero@gmail.com";
        $lname = "Umali";
        $fname = "Jayson";
        
        if($email!=""){
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ncsfnri@gmail.com',
                'smtp_pass' => 'ncsfnri123',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
                $this->load->library('email', $config);
        
                $this->email->set_newline("\r\n");
                $this->email->from('ncsfnri@gmail.com','NCS FNRI');
                $this->email->to($email);
                $this->email->subject('Nutrition Counseling (HELPOnline Website)');
                
                        $htmlContent = '<p>Dear <b>Mr./ Mrs. '.$lname.' '.$fname.'</b></p>';

                        $htmlContent .= '<p>We have received your request and its now being processed. You will be hearing from us very soon. Thank you very much for spending a moment to fill up the form.</p>';
                        $htmlContent .= '<p>Best regards,</p>';
            
                        $htmlContent .= '<br><p>Nutrition Counseling Service Team</p>';
                        $htmlContent .= '<p>DOST-FNRI</p>';
                        $htmlContent .= '<br><p>Email address: ncsfnri@gmail.com</p>';
                        $htmlContent .= '<p>Telephone number: 8837-2071 local 2299</p>';
            
                $this->email->message($htmlContent);
            
                $this->email->send();
        }
        
    }
        
        

//    $this->load->helper('cookie');
//    $cookie= array(
//        'name'   => 'remember_me',
//        'value'  => 'test',                            
//        'expire' => '300',                                                                                   
//        'secure' => FALSE
//    );
//
//    $this->input->set_cookie($cookie);
//
//$cookie= get_cookie('name');  
//var_dump($cookie);

        
        
        
        
//      public function fast_tools_enchance()
//		{
//			$uid= $this->session->id;
//	 		$logged_in = $this->session->userdata['logged_in'];
//	 		
//			if (isset($logged_in) && !isset($uid)) {
//              $this->session->sess_destroy();
//          	}
//			$data['title'] = 'Fast Assessment Tools';
//			$data['groups'] = $this->help_model->get_pa_lvl();
//			$data['groups1'] = $this->help_model->get_age_group1();
//			//$data['pdri_nutrients'] = $this->help_model->get_pdri();
//
//			$page_url=current_url();
//			$this ->help_model->save_count($page_url);
//
//
//			$this->load->view('fast_tools_enchance',$data);
//		}
        
}

	/* End of file welcome.php */	/* Location: ./application/controllers/welcome.php */