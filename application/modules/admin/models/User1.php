<?php
  Class User extends CI_Model
  {
      public function login($username,$password,$user_type_id)
      {
          $this->db->select('id,username,password,user_type_id');
          $this->db->from('users_db');
          $this->db->where('username = ' . "'" . $username . "'");
          $this->db->where('password = ' . "'" . MD5($password) . "'");
          $this -> db -> where('user_type_id != ' . "'" .$user_type_id. "'"); 
        //  $this->db->where('module_id = ' . "'" . $module . "'");
          $this->db->limit(1);
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
              return $query->result();
          } else {
              return false;
          }
      }
      public function getModule()
      {
          $query = $this->db->query('SELECT * FROM modules_db');
          return $query->result();
      }

      
  }
?>