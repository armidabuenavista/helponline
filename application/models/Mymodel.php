<?php

class mymodel extends CI_Model
{
	

 function getAllGroups()
    {
		$this->load->database();
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT * FROM pa_lvl_db');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

public function did_get_faq_data($pa_lvl){
$this->load->database();
    $this->db->select('*');
    $this->db->from('pa_lvl_db');   
    $this->db->where('id', $pa_lvl); 

    $query = $this->db->get('pa_lvl_db');

    if ($query->num_rows() > 0){
    return $query->result();
    }
    else {
    return false;
    }
   }  


}
?>