<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dostpinoy extends MX_Controller {
function __construct()
{
parent::__construct();
  		date_default_timezone_set('Asia/Hong_Kong');
  		// Load our model
		$this->load->model('map_model');	
  		$this->load->database();

         /* Load form library */ 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        
		$this->load->library('upload');
		$this->load->library('pagination');
	
		  /* Load form helper */ 
		$this->load->helper('url'); 
        $this->load->helper(array('form'));

        $this->load->helper('html');
			
    

}


/*public function index(){
	$this->load->view('index');
	
	
	
}*/

public function index()
 {
 	  // $this->load->view('home_view');

  if($this->session->userdata('id'))
   {
     $session_data = $this->session->userdata('adminlogged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('admin/dostpinoy/areas', $data);
	 

   }
   else
   {
     //If no session, redirect to login page
     redirect('admin/login', 'refresh');
	
	
	//$this->load->view('home_view', $data);
   }
 }
 
 public function logout()
 {
 	
   	//$this->session->unset_userdata('id');
 	$this->session->sess_destroy();
   	redirect('admin/login');
 }

   public function add_area()
	{
		
        
		  $data['groups'] = $this->map_model->getRegions(); 
		  $data['groups1'] = $this->map_model->getStatus(); 
		if(isset($_POST['addarea'])){
		 
		 $data['groups'] = $this->map_model->getRegions(); 
		 $data['groups1'] = $this->map_model->getStatus(); 
		//area covered
		 $region = $this->input->post('add_region',TRUE);
		 $area_covered= $this->input->post('add_area',TRUE);
		 $overall_status= $this->input->post('add_overall_status',TRUE);
		 $contact_person= $this->input->post('add_contact_person',TRUE);
		 $contact_number= $this->input->post('add_contact_number',TRUE);
		 $longitude= $this->input->post('add_longitude',TRUE);
		 $latitude= $this->input->post('add_latitude',TRUE);
		 
		 //photo
		 if(!empty($_FILES['add_photo']['name'])){
		   		$config['upload_path'] = './assets/images/dostpinoy/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['add_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('add_photo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = 'no_photo.png';
                }
            }else{
                $picture = 'no_photo.png';
            }
	
		 //advocacy
		 $advocacy_place = $this->input->post('add_advocacy_place',TRUE);
		 $advocacy_date = $this->input->post('add_advocacy_date',TRUE);
		 $advocacy_participants= $this->input->post('add_advocacy_participants',TRUE);
		 $advocacy_status= $this->input->post('add_advocacy_status',TRUE);
		 
		 //training
		 $training_place = $this->input->post('add_training_place',TRUE);
		 $training_date = $this->input->post('add_training_date',TRUE);
		 $training_participants= $this->input->post('add_training_participants',TRUE);
		 $training_status= $this->input->post('add_training_status',TRUE);
 
  
   		/* Set validation rule for name field in the form */ 
		 $this->form_validation->set_rules( 'add_region','Region','required|greater_than[0]'); 
         $this->form_validation->set_rules('add_area', 'Area', 'required'); 
         $this->form_validation->set_rules('add_overall_status', 'Monitoring', 'required'); 
         $this->form_validation->set_rules('add_contact_person', 'Contact Person', 'required'); 
         $this->form_validation->set_rules('add_longitude', 'Longitude', 'required'); 
         $this->form_validation->set_rules('add_latitude', 'Latitude', 'required'); 
         $this->form_validation->set_rules('add_advocacy_place', 'Place of Advocacy', 'required'); 
         $this->form_validation->set_rules('add_advocacy_date', 'Date of Advocacy', 'required'); 
         $this->form_validation->set_rules('add_advocacy_participants', 'Number of Advocacy Participants', 'required');
		 $this->form_validation->set_rules( 'add_advocacy_status','Advocacy Status','required|greater_than[0]'); 
		 $this->form_validation->set_rules('add_training_place', 'Place of Training', 'required'); 
         $this->form_validation->set_rules('add_training_date', 'Date of Training', 'required'); 
         $this->form_validation->set_rules('add_training_participants', 'Number of Training Participants', 'required');
		 $this->form_validation->set_rules( 'add_training_status','Training Status','required|greater_than[0]'); 
			//$this->load->view('add_area',$data);
         if ($this->form_validation->run() == FALSE) { 
        // $this->load->view('add_area'); 
		 //$this->load->view('dp_navbar');
		 $this->load->view('add_area',$data);
         } 
         else { 
	
	//make array of variables
   // $data = array($area_covered,$region,$overall_status,$contact_person,$contact_number,$longitude,$latitude,$picture);
   // $data1 = array($advocacy_place,$advocacy_date,$advocacy_participants,$advocacy_status);
   // $data2 = array($training_place,$training_date,$training_participants,$training_status);
  
   //call function save model and insert to database
	//$this->map_model->save($data,$data1,$data2);
    $this->map_model->save();
	$this->session->set_flashdata('item', array('message' => 'Record created successfully','class' => 'success')); 
	//redirect page
	redirect('admin/dostpinoy/areas');
	
	
	}
		}else{
			//$this->load->view('dp_navbar');
			$this->load->view('add_area',$data);
		}
		
		

	}
	
	/*public function save_area(){
		 $this->load->library('session'); 
         $this->load->helper('url'); 
		 $this->load->library('upload');
		 
		
		
		 //Load form helper 
         $this->load->helper(array('form'));
			
         // Load form validation library 
         $this->load->library('form_validation');
		 $this->load->model('map_model', '', TRUE);	
		 
		 $data['groups'] = $this->map_model->getRegions(); 
		 $data['groups1'] = $this->map_model->getStatus(); 
		//area covered
		 $region = $this->input->post('add_region');
		 $area_covered= $this->input->post('add_area');
		 $overall_status= $this->input->post('add_overall_status');
		 $contact_person= $this->input->post('add_contact_person');
		 $contact_number= $this->input->post('add_contact_number');
		 $longitude= $this->input->post('add_longitude');
		 $latitude= $this->input->post('add_latitude');
		 
		 //photo
		 if(!empty($_FILES['add_photo']['name'])){
		   		$config['upload_path'] = './assets/images/dostpinoy/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['add_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('add_photo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = 'no_photo.png';
                }
            }else{
                $picture = 'no_photo.png';
            }
	
   
		 //advocacy
		 $advocacy_place = $this->input->post('add_advocacy_place');
		 $advocacy_date = $this->input->post('add_advocacy_date');
		 $advocacy_participants= $this->input->post('add_advocacy_participants');
		 $advocacy_status= $this->input->post('add_advocacy_status');
		 
		 //training
		 $training_place = $this->input->post('add_training_place');
		 $training_date = $this->input->post('add_training_date');
		 $training_participants= $this->input->post('add_training_participants');
		 $training_status= $this->input->post('add_training_status');
 
  
   			// Set validation rule for name field in the form  
		$this->form_validation->set_rules( 'add_region','Region','required|greater_than[0]'); 
         $this->form_validation->set_rules('add_area', 'Area', 'required'); 
         $this->form_validation->set_rules('add_overall_status', 'Monitoring', 'required'); 
      	 $this->form_validation->set_rules('add_contact_person', 'Contact Person', 'required'); 
			//$this->load->view('add_area',$data);
         if ($this->form_validation->run() == FALSE) { 
        // $this->load->view('add_area'); 
		$this->load->view('add_area',$data);
         } 
         else { 
         
 
  
  $data = array($area_covered,$region,$overall_status,$contact_person,$contact_number,$longitude,$latitude,$picture);
    $data1 = array($advocacy_place,$advocacy_date,$advocacy_participants,$advocacy_status);
    $data2 = array($training_place,$training_date,$training_participants,$training_status);
  
   
		 $this->map_model->save($data,$data1,$data2);
		 $this->session->set_flashdata('item', array('message' => 'Record created successfully','class' => 'success')); 
			 redirect('dostpinoy/areas');
		 //$this->load->view('add_area',$data); 
		
	//	 $this->session->set_flashdata('message', 'Saved');
	
	}
	}*/
	
	     public function edit_area($id)
    {
		
       	
				if(isset($_POST['editarea'])){
						//area covered
		 $region = $this->input->post('add_region',TRUE);
		 $area_covered= $this->input->post('add_area',TRUE);
		 $overall_status= $this->input->post('add_overall_status',TRUE);
		 $contact_person= $this->input->post('add_contact_person',TRUE);
		 $contact_number= $this->input->post('add_contact_number',TRUE);
		 $longitude= $this->input->post('add_longitude',TRUE);
		 $latitude= $this->input->post('add_latitude',TRUE);
		  //$id= $this->input->post('area_id');
		 //	$data['area_id']= $this->map_model->get_area($id);
		 //photo
		 
		
		 if(!empty($_FILES['add_photo']['name']) && $_FILES['add_photo']['name'] != $this->input->post('add_photo_1')){
		   		$config['upload_path'] = './assets/images/dostpinoy/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['add_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               if($this->upload->do_upload('add_photo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = 'no_photo.png';
                }
               
            }else{
				
			
                $picture =$this->input->post('add_photo_1');
				
            }
	
   
		 //advocacy
		 $advocacy_place = $this->input->post('add_advocacy_place',TRUE);
		 $advocacy_date = $this->input->post('add_advocacy_date',TRUE);
		 $advocacy_participants= $this->input->post('add_advocacy_participants',TRUE);
		 $advocacy_status= $this->input->post('add_advocacy_status',TRUE);
		 
		 //training
		 $training_place = $this->input->post('add_training_place',TRUE);
		 $training_date = $this->input->post('add_training_date',TRUE);
		 $training_participants= $this->input->post('add_training_participants',TRUE);
		 $training_status= $this->input->post('add_training_status',TRUE);
		 $area_id= $this->input->post('area_id',TRUE);
		 
		 
		 
		   
   		/* Set validation rule for name field in the form */ 
		 $this->form_validation->set_rules( 'add_region','Region','required|greater_than[0]'); 
         $this->form_validation->set_rules('add_area', 'Area', 'required'); 
         $this->form_validation->set_rules('add_overall_status', 'Monitoring', 'required'); 
         $this->form_validation->set_rules('add_contact_person', 'Contact Person', 'required'); 
         $this->form_validation->set_rules('add_longitude', 'Longitude', 'required'); 
         $this->form_validation->set_rules('add_latitude', 'Latitude', 'required'); 
         $this->form_validation->set_rules('add_advocacy_place', 'Place of Advocacy', 'required'); 
         $this->form_validation->set_rules('add_advocacy_date', 'Date of Advocacy', 'required'); 
         $this->form_validation->set_rules('add_advocacy_participants', 'Number of Advocacy Participants', 'required');
		 $this->form_validation->set_rules( 'add_advocacy_status','Advocacy Status','required|greater_than[0]'); 
		 $this->form_validation->set_rules('add_training_place', 'Place of Training', 'required'); 
         $this->form_validation->set_rules('add_training_date', 'Date of Training', 'required'); 
         $this->form_validation->set_rules('add_training_participants', 'Number of Training Participants', 'required');
		 $this->form_validation->set_rules( 'add_training_status','Training Status','required|greater_than[0]'); 
		 $this->form_validation->set_rules( 'area_id','Area id','required|integer'); 
 
 
 
 		 if ($this->form_validation->run() == FALSE) {
		 		//$id =   $this->uri->segment(3); 
        // $this->load->view('add_area'); 
		
		 //$aaa= $this->input->post('area_id',TRUE);
		 
				//$area_id=$this->map_model->get_area($id);
				
				//$data['groups'] = $this->map_model->getRegions(); 
				//$data['groups1'] = $this->map_model->getStatus(); 
			//	$data['area_id']= $area_id;
			//	echo '<script>alert("You have not fill the form correctly.Recheck");</script>';
        	//	redirect('dostpinoy/areas');
			 $this->session->set_flashdata('item', array('message' => 'Please check all fields before submitting the form','class' => 'danger'));
			 redirect('admin/dostpinoy/areas');
			 
        

         } 
		 else{
		//$data = array($area_covered,$region,$overall_status,$contact_person,$contact_number,$longitude,$latitude,$picture,$area_id);
    	//$data1 = array($advocacy_place,$advocacy_date,$advocacy_participants,$advocacy_status,$area_id);
    	//$data2 = array($training_place,$training_date,$training_participants,$training_status,$area_id);
			

		//$this->map_model->update($data,$data1,$data2);
		 	$this->map_model->update();
			$this->session->set_flashdata('item', array('message' => 'Record updated successfully','class' => 'success')); 
	    redirect('admin/dostpinoy/areas');
		 }
  
  	
					
					
					}
					else{
						
             	//$area_id=$this->map_model->get_area($id);
				
				$data['groups'] = $this->map_model->getRegions(); 
				$data['groups1'] = $this->map_model->getStatus(); 
				$data['area_id']= $this->map_model->get_area($id);
				//$this->load->view('dp_navbar');
        		$this->load->view('edit_area',$data);
					}
				
    }
	
	/*	public function update_area(){
		$this->load->library('session'); 
         	$this->load->helper('url'); 
		 	$this->load->library('upload');
		 	$this->load->model('map_model', '', TRUE);	
			
		
			//area covered
		 $region = $this->input->post('add_region');
		 $area_covered= $this->input->post('add_area');
		 $overall_status= $this->input->post('add_overall_status');
		 $contact_person= $this->input->post('add_contact_person');
		 $contact_number= $this->input->post('add_contact_number');
		 $longitude= $this->input->post('add_longitude');
		 $latitude= $this->input->post('add_latitude');
		  //$id= $this->input->post('area_id');
		 //	$data['area_id']= $this->map_model->get_area($id);
		 //photo
		 if(!empty($_FILES['add_photo']['name'])){
		   		$config['upload_path'] = './assets/images/dostpinoy/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['add_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('add_photo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = 'no_photo.png';
                }
            }else{
				
			
                $picture =$this->input->post('add_photo_1');
				
            }
	
   
		 //advocacy
		 $advocacy_place = $this->input->post('add_advocacy_place');
		 $advocacy_date = $this->input->post('add_advocacy_date');
		 $advocacy_participants= $this->input->post('add_advocacy_participants');
		 $advocacy_status= $this->input->post('add_advocacy_status');
		 
		 //training
		 $training_place = $this->input->post('add_training_place');
		 $training_date = $this->input->post('add_training_date');
		 $training_participants= $this->input->post('add_training_participants');
		 $training_status= $this->input->post('add_training_status');
		 $area_id= $this->input->post('area_id');
 
  
  		$data = array($area_covered,$region,$overall_status,$contact_person,$contact_number,$longitude,$latitude,$picture,$area_id);
    	$data1 = array($advocacy_place,$advocacy_date,$advocacy_participants,$advocacy_status,$area_id);
    	$data2 = array($training_place,$training_date,$training_participants,$training_status,$area_id);
			
			
			
		
		$this->map_model->update($data,$data1,$data2);
			$this->session->set_flashdata('item', array('message' => 'Record updated successfully','class' => 'success')); 
	    redirect('dostpinoy/areas');
			
	}*/
	
	public function delete_area($id){
		 /* $this->load->database();
        $this->load->model('map_model');
		
        $this->map_model->delete($id);
         redirect('map/areas');*/
       // delete person
	   // $this->load->model('map_model');
      //  $this->map_model->delete($id);
         
        // redirect to person list page
      //  redirect('map/area/','refresh');
	  

		//$id = $this->uri->segment(3);
        $this->map_model->delete($id);
		redirect('admin/dostpinoy/areas/');
	}


	public function areas(){
	
	
		$config = array();
        $config["base_url"] = base_url() . "admin/dostpinoy/areas";
        $config["total_rows"] = $this->map_model->total_areas();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
		$choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->map_model->get_areas($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data["results1"] = $this->map_model->logs();
		$data['numRows'] = $this->map_model->getAffectedRows();
	
        $this->load->view("areas", $data);
		
	
 

		
	}


}