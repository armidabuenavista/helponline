<?php
class Map_model extends CI_Model {
function __construct()
{
parent::__construct();
}
public function get_coordinates()
{
$return = array();
//$this->db->select("lat,lng,address");
//$this->db->from("coords");

$this->db->select('areas_db.area_covered,advocacy_db.place AS advocacy_place,advocacy_db.date AS advocacy_date,advocacy_db.participants AS advocacy_participants,a.status AS advocacy_status, trainings_db.place AS training_place,trainings_db.date AS training_date,trainings_db.participants AS training_participants, b.status AS training_status,areas_db.status AS overall_status,areas_db.contact_person,areas_db.contact_number,areas_db.lat,areas_db.lng,areas_db.photo');
		$this->db->from('areas_db');
		$this->db->join('advocacy_db', 'areas_db.id = advocacy_db.area_id');
		$this->db->join('trainings_db', 'areas_db.id= trainings_db.area_id');
		$this->db->join('status_db AS a', 'advocacy_db.status_id= a.id');
		$this->db->join('status_db AS b', 'trainings_db.status_id= b.id');
$query = $this->db->get();

if ($query->num_rows()>0) {

foreach ($query->result() as $row) {
array_push($return, $row);

}
}
return $return;
}


 public function getRegions()
    {
		
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT * FROM regions_db');


        return $query->result();
	
        //echo 'Total Results: ' . $query->num_rows();
    }
	
	public function getStatus()
    {

        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT * FROM status_db');


        return $query->result();
	
        //echo 'Total Results: ' . $query->num_rows();
    }

	
	
	

/*public function search($region)
{
	
$return = array();
//$this->db->select("lat,lng,address");
//$this->db->from("coords");

$this->db->select('areas_db.area_covered,advocacy_db.place AS advocacy_place,advocacy_db.date AS advocacy_date,advocacy_db.participants AS advocacy_participants,a.status AS advocacy_status, trainings_db.place AS training_place,trainings_db.date AS training_date,trainings_db.participants AS training_participants, b.status AS training_status,areas_db.status AS overall_status,areas_db.contact_person,areas_db.contact_number,areas_db.lat,areas_db.lng,areas_db.photo');
		$this->db->from('areas_db');
		$this->db->join('advocacy_db', 'areas_db.id = advocacy_db.area_id');
		$this->db->join('trainings_db', 'areas_db.id= trainings_db.area_id');
		$this->db->join('status_db AS a', 'advocacy_db.status_id= a.id');
		$this->db->join('status_db AS b', 'trainings_db.status_id= b.id');
		$this->db->where('areas_db.region_id' , $region);
$query = $this->db->get();


if ($query->num_rows()>0) {
		
foreach ($query->result() as $row) {
array_push($return, $row);
}
}
return $return;
}*/


public function save()
{
	// start of sql process
	$this->db->trans_start();

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
	

	$data = array(
        'area_covered'   => $this->input->post('add_area',TRUE),
        'region_id' 	 => $this->input->post('add_region',TRUE),
        'status' => $this->input->post('add_overall_status',TRUE),
        'contact_person' => $this->input->post('add_contact_person',TRUE),
        'contact_number' =>	$this->input->post('add_contact_number',TRUE),
        'lng' 			 => $this->input->post('add_longitude',TRUE),
        'lat' 			 => $this->input->post('add_latitude',TRUE),
        'photo' 		 => $picture,
        'submitted_on'	 => date('Y-m-d H:i:s')
        
    );
	$this->db->insert('areas_db', $data);
	$area_id = $this->db->insert_id(); 



	$data1 = array(
        'place'   		=> $this->input->post('add_advocacy_place',TRUE),
        'date' 	 		=> $this->input->post('add_advocacy_date',TRUE),
        'participants'  => $this->input->post('add_advocacy_participants',TRUE),
        'status_id' 	=> $this->input->post('add_advocacy_status',TRUE),
        'area_id'	 	=> $area_id
        
    );
	$this->db->insert('advocacy_db', $data1);
	

	$data2 = array(
        'place'   		=> $this->input->post('add_training_place',TRUE),
        'date' 	 		=> $this->input->post('add_training_date',TRUE),
        'participants'  => $this->input->post('add_training_participants',TRUE),
        'status_id' 	=> $this->input->post('add_training_status',TRUE),
        'area_id'	 	=> $area_id
        
    );
	$this->db->insert('trainings_db', $data2);
	





    /*$sql = "INSERT areas_db(area_covered,region_id,status,contact_person,contact_number,lng,lat,photo) VALUES (?,?,?,?,?,?,?,?)";
    $this->db->query($sql, $data); 
	//last insert id
    $area_id = $this->db->insert_id(); 
	
	//insert on tbl2 the last insert id ($area_id) from tbl1
    $sql1 = "INSERT advocacy_db(place,date,participants,status_id,area_id) VALUES (?,?,?,?,$area_id)";
    $this->db->query($sql1, $data1);
	
	//insert on tbl3 the last insert id ($area_id) from tbl1
	$sql2 ="INSERT trainings_db(place,date,participants,status_id,area_id) VALUES (?,?,?,?,$area_id)";
    $this->db->query($sql2, $data2);*/

	//check if sql has no errors
    $this->db->trans_complete(); 
    return $this->db->insert_id(); 
if($this->db->trans_status() === FALSE){
			return false;
		}
		else{
			return true;
		}

}



public function update(){
		$this->db->trans_start();
		
		/*$sql = "UPDATE areas_db SET area_covered=?,region_id=?,status=?,contact_person=?,contact_number=?,lng=?,lat=?,
  photo=? WHERE id= ?";
    	$this->db->query($sql, $data);
		
		$sql1= "UPDATE advocacy_db SET place=?,date=?,participants=?,status_id=? WHERE area_id= ?";
		$this->db->query($sql1, $data1);
	
		$sql2 ="UPDATE trainings_db SET place=?,date=?,participants=?,status_id=? WHERE area_id= ?";
    	$this->db->query($sql2, $data2);*/


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

    	$area_id	= $this->input->post('area_id',TRUE);
    	$data = array(
        'area_covered'   => $this->input->post('add_area',TRUE),
        'region_id' 	 => $this->input->post('add_region',TRUE),
        'status' 		 => $this->input->post('add_overall_status',TRUE),
        'contact_person' => $this->input->post('add_contact_person',TRUE),
        'contact_number' =>	$this->input->post('add_contact_number',TRUE),
        'lng' 			 => $this->input->post('add_longitude',TRUE),
        'lat' 			 => $this->input->post('add_latitude',TRUE),
        'photo' 		 => $picture,
        'updated_on'	 => date('Y-m-d H:i:s')
        
    );
		$this->db->where('id', $area_id);
    	$this->db->update('areas_db', $data);



		$data1 = array(
        'place'   		=> $this->input->post('add_advocacy_place',TRUE),
        'date' 	 		=> $this->input->post('add_advocacy_date',TRUE),
        'participants'  => $this->input->post('add_advocacy_participants',TRUE),
        'status_id' 	=> $this->input->post('add_advocacy_status',TRUE),
      
        
    );
		$this->db->where('area_id', $area_id);
    	$this->db->update('advocacy_db', $data1);
	

		$data2 = array(
        'place'   		=> $this->input->post('add_training_place',TRUE),
        'date' 	 		=> $this->input->post('add_training_date',TRUE),
        'participants'  => $this->input->post('add_training_participants',TRUE),
        'status_id' 	=> $this->input->post('add_training_status',TRUE),
       
    );
		$this->db->where('area_id', $area_id);
    	$this->db->update('trainings_db', $data2);
	



		$this->db->trans_complete(); 
		
		if($this->db->trans_status() === FALSE){
			return false;
		}
		else{
			return true;
		}
}


/*function delete($id)
    {
       // $this->db->trans_start();

        $this->db->delete('areas_db', array('id' => $id));
        $this->db->delete('advocacy_db', array('area_id' => $id));
        $this->db->delete('trainings_db', array('area_id' => $id));
		
	
    }*/
	
	 function delete($id)
    {
        $this -> db -> where('id', $id);
  		$this -> db -> delete('areas_db');
		
		$this -> db -> where('area_id', $id);
  		$this -> db -> delete('advocacy_db');
		
		$this -> db -> where('area_id', $id);
  		$this -> db -> delete('trainings_db');

       /* $this->db->delete('areas_db', array('id' => $id));
        $this->db->delete('advocacy_db', array('area_id' => $id));
        $this->db->delete('trainings_db', array('area_id' => $id));*/
    }

public function get_areas($limit,$start){
	$this->db->select('areas_db.id,regions_db.region,areas_db.area_covered,advocacy_db.place AS advocacy_place,advocacy_db.date AS advocacy_date,advocacy_db.participants AS advocacy_participants,a.status AS advocacy_status, trainings_db.place AS training_place,trainings_db.date AS training_date,trainings_db.participants AS training_participants, b.status AS training_status,areas_db.status AS overall_status,areas_db.contact_number,areas_db.lat,areas_db.lng');
		$this->db->from('areas_db');
		$this->db->join('regions_db', 'areas_db.region_id = regions_db.id');
		$this->db->join('advocacy_db', 'areas_db.id = advocacy_db.area_id');
		$this->db->join('trainings_db', 'areas_db.id= trainings_db.area_id');
		$this->db->join('status_db AS a', 'advocacy_db.status_id= a.id');
		$this->db->join('status_db AS b', 'trainings_db.status_id= b.id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
 		//return $query->result();
		
}
 public function total_areas(){
  return $this->db->count_all('areas_db');
 }
 
  public function get_area($id){
     
       $sql = "SELECT areas_db.id,areas_db.area_covered,areas_db.region_id,areas_db.status AS overall_status,areas_db.contact_person,areas_db.contact_number,areas_db.lat,areas_db.lng,areas_db.photo,advocacy_db.place AS advocacy_place,advocacy_db.date AS advocacy_date,advocacy_db.participants AS advocacy_participants,advocacy_db.status_id AS advocacy_status, trainings_db.place AS training_place,trainings_db.date AS training_date,trainings_db.participants AS training_participants, trainings_db.status_id AS training_status FROM areas_db INNER JOIN advocacy_db ON areas_db.id = advocacy_db.area_id INNER JOIN trainings_db ON areas_db.id= trainings_db.area_id INNER JOIN regions_db ON regions_db.id= areas_db.region_id WHERE areas_db.id = ?";
		

       $query =$this->db->query($sql, array($id)); 
    
    //   echo $this->db->last_query();
        return $query->result();
		
    }
 
 
 public function getAffectedRows()
{
    return $this->db->affected_rows();
}
 
public function logs(){
	$sql = "SELECT * FROM logs_db";
		

       $query =$this->db->query($sql); 
    
  
        return $query->result();
}




}

