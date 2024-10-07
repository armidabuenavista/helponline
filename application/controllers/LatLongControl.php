<?php  
class latLongControl extends CI_Controller{  
  
    public function __construct() {  
        parent::__construct();  
        $this->load->model('getLatLong');  
    }  
  
    function index()  
    {  
		$this->load->database();
        $data['base_url'] = base_url();  
        $data['title'] = 'Google Map with Code Igniter |';  
        $data['action']=site_url().'komoditas/';  
  
        $results = $this->getLatLong->get();  
        $count = 0;  
  
        foreach($results->result() as $row)  
        {  
            $data['latlong'][$count]['lat'] = $row->lat;  
            $data['latlong'][$count]['long'] = $row->lng;  
            $data['latlong'][$count]['area'] = $row->area_covered;  
            $count++;  
        }  
        $data['index']=$count;  
  
          $this->load->view('test',$data);  
    }  
  
    function load_test($data)  
    {  
        $this->load->view('test',$data);  
    }  
  
}  
?>  