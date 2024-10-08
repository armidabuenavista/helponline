<?php
Class User extends CI_Model
{ 
	function login($username, $password,$user_type_id)
	{
		$this -> db -> select('*');
		$this -> db -> from('users_db');
		//$this -> db -> join('photos_db', 'photos_db.id = users_db.photo','left');
		//$this -> db -> join('gender_db', 'gender_db.id = users_db.gender');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> where('user_type_id = ' . "'" .$user_type_id. "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
    
    function login_email($email){

        $data = hex2bin($email);

        $condition = "email_address =" . "'" . $data . "'";
        $this->db->select('*');
        $this->db->from('users_db');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();


          if($query->num_rows() == 1)
          {
            return $query->result();
          }
          else
          {
            return false;
          }
    }
}
?>