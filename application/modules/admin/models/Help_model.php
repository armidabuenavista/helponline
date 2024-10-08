<?php
  class Help_model extends CI_Model
  {
      public function get_pa_lvl()
      {
          $query = $this->db->query('SELECT * FROM pa_lvl_db WHERE id != 1');
          return $query->result();
      }
      public function get_pa_data($pa_lvl)
      {
          $this->db->select('*');
          $this->db->from('pa_lvl_db');
          $this->db->where('id', $pa_lvl);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
      }
      public function getGender()
      {
          $query = $this->db->query('SELECT * FROM gender_db');
          return $query->result();
      }
      public function make_captcha()
      {
          $this->load->helper('captcha');
          $vals = array(
              'img_path' => './assets/images/captcha/',
              'img_url' => base_url() . 'assets/images/captcha/',
              'img_width' => 200,
              'img_height' => 100,
              'font_path' => './system/fonts/texb.ttf',
              'expiration' => 3600
          );
          $cap  = create_captcha($vals);
          if ($cap) {
              $data  = array(
                  'captcha_id'    => '',
                  'captcha_time'  => $cap['time'],
                  'ip_address'    => $this->input->ip_address(),
                  'word'          => $cap['word']
              );
              $query = $this->db->insert_string('captcha', $data);
              $this->db->query($query);
          } else {
              return "Captcha not work";
          }
          return $cap['image'];
      }
      public function check_captcha()
      {
          $expiration = time() - 3600;
          $sql        = " DELETE FROM captcha WHERE captcha_time < ? ";
          $binds      = array(
              $expiration
          );
          $query      = $this->db->query($sql, $binds);
          $sql        = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ?
 AND captcha_time > ?";
          $binds      = array(
              $_POST['captcha'],
              $this->input->ip_address(),
              $expiration
          );
          $query      = $this->db->query($sql, $binds);
          $row        = $query->row();
          if ($row->count > 0) {
              return true;
          }
          return false;
      }
      /*public function save_user($data)
      {
          $this->db->trans_start();
          $sql = "INSERT INTO users_db(lname,fname,mname,gender,birthday,email_address,address,contact_number,username,password,user_type_id,module_id,submitted_on) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
          $this->db->query($sql, $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }*/
      public function check_request_whole_day($datepick)
      {
          $sql   = "SELECT request_date FROM ncs_requests_db WHERE request_date=?";
          $query = $this->db->query($sql, array(
              $datepick
          ));
          return $query->result();
      }
      public function check_rnd_sched_whole_day($datepick, $all_rnd)
      {
          $sql   = "SELECT approved_date FROM rnd_sched_db WHERE approved_date=? AND all_rnd=?";
          $query = $this->db->query($sql, array(
              $datepick,
              $all_rnd
          ));
          return $query->result();
      }
      public function check_request_time($datepick, $timepick1, $timepick2)
      {
          $sql   = "SELECT request_date,time_from,time_to FROM ncs_requests_db WHERE request_date=? AND
        ? BETWEEN time_from AND time_to AND 
        ? BETWEEN time_from AND time_to";
          $query = $this->db->query($sql, array(
              $datepick,
              $timepick1,
              $timepick2
          ));
          return $query->result();
      }
      public function check_rnd_sched_time($datepick, $timepick1, $timepick2, $rnd)
      {
          $sql   = "SELECT approved_date,approved_time_from,approved_time_to FROM rnd_sched_db WHERE approved_date=? AND
        ? BETWEEN approved_time_from AND approved_time_to AND ?
         BETWEEN approved_time_from AND approved_time_to AND 
        assigned_rnd_id=?";
          $query = $this->db->query($sql, array(
              $datepick,
              $timepick1,
              $timepick2,
              $rnd
          ));
          return $query->result();
      }
      public function check_all_rnd_sched($datepick, $timepick1, $timepick2, $all_rnd)
      {
          $sql   = "SELECT approved_date,approved_time_from,approved_time_to FROM rnd_sched_db WHERE approved_date=? AND
        ? BETWEEN approved_time_from AND approved_time_to AND ?
         BETWEEN approved_time_from AND approved_time_to AND all_rnd=?";
          $query = $this->db->query($sql, array(
              $datepick,
              $timepick1,
              $timepick2,
              $all_rnd
          ));
          return $query->result();
      }
      public function check_pending_request($uid, $datepick, $status)
      {
          $sql   = "SELECT client_id,request_date FROM ncs_requests_db WHERE client_id = ? AND request_date=? AND status_id=?";
          $query = $this->db->query($sql, array(
              $uid,
              $datepick,
              $status
          ));
          return $query->result();
      }
      public function get_assigned_rnd($rnd)
      {
          $sql   = "SELECT id,lname,fname,mname FROM users_db WHERE id= ?";
          $query = $this->db->query($sql, array(
              $rnd
          ));
          return $query->result();
      }
      public function get_all_rnd_email_address()
      {
          $sql   = "SELECT email_address FROM users_db WHERE user_type_id != 3";
          $query = $this->db->query($sql);
          return $query->result();
      }
      public function get_appointment_id($client_id)
      {
          $sql   = "SELECT ncs_requests_db.client_id,ncs_requests_db.id,rnd_sched_db.approved_date FROM users_db INNER JOIN ncs_requests_db ON ncs_requests_db.client_id=users_db.id INNER JOIN rnd_sched_db ON ncs_requests_db.id=rnd_sched_db.appointment_id WHERE users_db.id=? ORDER BY id DESC LIMIT 1";
          $query = $this->db->query($sql, array(
              $client_id
          ));
          return $query->result();
      }
      public function get_request($appointment_id)
      {
          $sql   = "SELECT users_db.id,users_db.lname,users_db.fname,users_db.mname,gender_db.gender,users_db.address,users_db.email_address,users_db.birthday,users_db.contact_number,users_db.photo,TIMESTAMPDIFF(YEAR, birthday ,NOW()) AS age,ncs_requests_db.event_type_id,ncs_requests_db.request_date,ncs_requests_db.whole_day,ncs_requests_db.time_from,ncs_requests_db.time_to,ncs_requests_db.status_id,ncs_requests_db.message,rnd_sched_db.remarks,rnd_sched_db.assigned_rnd_id FROM ncs_requests_db INNER JOIN users_db ON users_db.id=ncs_requests_db.client_id INNER JOIN gender_db ON users_db.gender= gender_db.id LEFT JOIN rnd_sched_db ON rnd_sched_db.appointment_id = ncs_requests_db.id WHERE ncs_requests_db.id = ? ";
          $query = $this->db->query($sql, array(
              $appointment_id
          ));
          return $query->result();
      }
      public function update_request()
      {
          $this->db->trans_start();
          $appointment_id = $this->input->post('appointment_id', TRUE);
          $whole_day      = $this->input->post('whole_day', TRUE);
          $timepick1      = $this->input->post('timepick1', TRUE);
          $timepick2      = $this->input->post('timepick2', TRUE);
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          $data = array(
              'event_type_id' => $this->input->post('event_type', TRUE),
              'request_date'  => $this->input->post('datepick', TRUE),
              'whole_day'     => $whole_day,
              'time_from'     => $timepick1,
              'time_to'       => $timepick2,
              'status_id'     => $this->input->post('status', TRUE)
          );
          $this->db->where('id', $appointment_id);
          $this->db->update('ncs_requests_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function delete_sched($where,$id)
      {
          $this->db->where($where,$id);
          $this->db->delete('rnd_sched_db');

          return true;
      }
      public function delete_request($where,$id)
      {
          $this->db->where($where,$id);
          $this->db->delete('ncs_requests_db');

          return true;
      }

      public function update_event()
      {
          $this->db->trans_start();
          $id0 = $this->input->post('id', TRUE);
          if (isset($id0)) {
              $id    = $this->input->post('id', TRUE);
              $where = 'id';
          } else {
              $id    = $this->input->post('appointment_id', TRUE);
              $where = 'appointment_id';
          }
          $whole_day = $this->input->post('whole_day', TRUE);
          $timepick1 = $this->input->post('timepick1', TRUE);
          $timepick2 = $this->input->post('timepick2', TRUE);
          $remarks   = $this->input->post('remarks', TRUE);
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
          $event_type_id = $this->input->post('event_type', TRUE);
          if ($event_type_id == 4) {
              $custom_event = $this->input->post('custom_event', TRUE);
          } else {
              $custom_event = NULL;
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
          if ($remarks == '') {
              $remarks = 'none';
          } else {
              $remarks = $this->input->post('remarks', TRUE);
          }
          $data = array(
              'event_type_id'       => $this->input->post('event_type', TRUE),
              'custom_event_type'   => $custom_event,
              'approved_date'       => $this->input->post('datepick', TRUE),
              'whole_day'           => $whole_day,
              'approved_time_from'  => $timepick1,
              'approved_time_to'    => $timepick2,
              'assigned_rnd_id'     => $rnd,
              'all_rnd'             => $all_rnd,
              'status_id'           => $this->input->post('status', TRUE),
              'remarks'             => $remarks,
              'confirmed_on'        => date('Y-m-d H:i:s')
          );
          $this->db->where($where, $id);
          $this->db->update('rnd_sched_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function save_appointment_sched()
      {
          $this->db->trans_start();
          $whole_day = $this->input->post('whole_day', TRUE);
          $timepick1 = $this->input->post('timepick1', TRUE);
          $timepick2 = $this->input->post('timepick2', TRUE);
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          $data = array(
              'appointment_id'      => $this->input->post('appointment_id', TRUE),
              'event_type_id'       => $this->input->post('event_type', TRUE),
              'approved_date'       => $this->input->post('datepick', TRUE),
              'whole_day'           => $whole_day,
              'approved_time_from'  => $timepick1,
              'approved_time_to'   => $timepick2,
              'status_id'           => $this->input->post('status', TRUE),
              'assigned_rnd_id'     => $this->input->post('rnd', TRUE),
              'remarks'             => $this->input->post('remarks', TRUE),
              'confirmed_by'        => $this->session->id,
              'confirmed_on'        => date('Y-m-d H:i:s')
          );
          $this->db->insert('rnd_sched_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function save_event()
      {
          $this->db->trans_start();
          $whole_day = $this->input->post('whole_day', TRUE);
          $timepick1 = $this->input->post('timepick1', TRUE);
          $timepick2 = $this->input->post('timepick2', TRUE);
          $remarks   = $this->input->post('remarks', TRUE);
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
          $event_type_id = $this->input->post('event_type', TRUE);
          if ($event_type_id == 4) {
              $custom_event = $this->input->post('custom_event', TRUE);
          } else {
              $custom_event = 'none';
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
          if ($remarks == '') {
              $remarks = 'none';
          } else {
              $remarks = $this->input->post('remarks', TRUE);
          }
          $data = array(
              'event_type_id'       => $this->input->post('event_type', TRUE),
              'custom_event_type'   => $custom_event,
              'approved_date'       => $this->input->post('datepick', TRUE),
              'whole_day'           => $whole_day,
              'approved_time_from'  => $timepick1,
              'approved_time_to'    => $timepick2,
              'assigned_rnd_id'     => $rnd,
              'status_id'           => $this->input->post('status', TRUE),
              'all_rnd'             => $all_rnd,
              'remarks'             => $remarks,
              'confirmed_on'        => date('Y-m-d H:i:s')
          );
          $this->db->insert('rnd_sched_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function delete_event($where,$id)
      {
          $this->db->where($where,$id);
          $this->db->delete('rnd_sched_db');
          return true;
      }
      public function get_meal()
      {
          $query  = " SELECT * 
            FROM meals_db
           ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_default_menu($data_id, $meal_id)
      {
          $sql   = "SELECT id,menu_name FROM default_meal_menu_db WHERE default_nutrition_id = ? AND meal_id = ?";
          $query = $this->db->query($sql, array(
              $data_id,
              $meal_id
          ));
          return $query->result();
      }


     
      public function get_default_food($data_id, $menu_id, $meal_id)
      {
          $sql   = "SELECT  default_meal_plan_db.id,default_meal_plan_db.menu_id,default_meal_plan_db.meal_id,default_meal_plan_db.ex,default_meal_plan_db.qty_val ,default_meal_plan_db.hh_val,default_meal_plan_db.foodgroup_content,default_meal_plan_db.combination_id,foodlists_db.foodlist,fooditems_db.fooditem,foodunits_db.foodunit As hh_measure,GROUP_CONCAT(default_meal_plan_db.hh_val SEPARATOR '<br>') As hh_val,GROUP_CONCAT(foodgroups_db.foodgroup SEPARATOR '<br>' ) As foodgroup_content FROM default_meal_plan_db 
              INNER JOIN foodgroups_db ON foodid= foodgroup_content 
              INNER JOIN foodlists_db ON foodlists_db.id=  default_meal_plan_db.foodlist_id 
              INNER JOIN fooditems_db ON fooditems_db.id= default_meal_plan_db.fooditem_id 
              INNER JOIN foodunits_db ON foodunits_db.id = fooditems_db.hh_measure 
              WHERE  default_meal_plan_db.default_nutrition_id=? AND default_meal_plan_db.menu_id= ? AND default_meal_plan_db.meal_id= ? GROUP BY default_meal_plan_db.combination_id";
          $query = $this->db->query($sql, array(
              $data_id,
              $menu_id,
              $meal_id
          ));
          return $query->result();
      }
      public function is_digits($element)
      {
          return !preg_match("/[^0-9]/", $element);
      }
      public function fraction($decimal)
      {
          $big_fraction = $this->float2rat($decimal);
          $num_array    = explode('/', $big_fraction);
          $numerator    = $num_array[0];
          $denominator  = $num_array[1];
          $whole_number = floor($numerator / $denominator);
          $numerator    = $numerator % $denominator;
          if ($numerator == 0) {
              return $whole_number;
          } else if ($whole_number == 0) {
              return $numerator . '/' . $denominator;
          } else {
              return $whole_number . ' ' . $numerator . '/' . $denominator;
          }
      }
      public function float2rat($n, $tolerance = 1.e-6)
      {
          $h1 = 1;
          $h2 = 0;
          $k1 = 0;
          $k2 = 1;
          $b  = 1 / $n;
          do {
              $b   = 1 / $b;
              $a   = floor($b);
              $aux = $h1;
              $h1  = $a * $h1 + $h2;
              $h2  = $aux;
              $aux = $k1;
              $k1  = $a * $k1 + $k2;
              $k2  = $aux;
              $b   = $b - $a;
          } while (abs($n - $h1 / $k1) > $n * $tolerance);
          return "$h1/$k1";
      }
      public function get_fooditem($fooditem,$foodlist_id)
      {
          $query  = "SELECT GROUP_CONCAT(fooditems_db.id ORDER BY fooditems_db.id ASC SEPARATOR ',')AS id,GROUP_CONCAT(foodgroups_db.foodgroup  ORDER BY foodid ASC SEPARATOR '<br>') AS foodgroup,GROUP_CONCAT(foodgroup_id  ORDER BY fooditems_db.id ASC SEPARATOR ',') AS foodgroup_id,fooditem,GROUP_CONCAT(foodgroup_content ORDER BY foodgroup_content ASC ) AS content,  GROUP_CONCAT(weight_ep ORDER BY fooditems_db.id ASC ) AS wt_ep,GROUP_CONCAT(constant_exchange ORDER BY fooditems_db.id ASC ) AS const_ex,foodunits_db.foodunit AS hh_measure FROM fooditems_db 

              INNER JOIN foodgroups_db ON foodgroups_db.foodid= fooditems_db.foodgroup_content 
              INNER JOIN foodunits_db ON foodunits_db.id= fooditems_db.hh_measure 
              WHERE fooditem LIKE '%$fooditem%' AND foodlist_id= '$foodlist_id'  
              GROUP BY combination_id LIMIT 20";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_hh_m()
      {
          $query  = "SELECT * FROM foodunits_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function save_menu()
      {
          $this->db->trans_start();
          $data = array(
              'menu_name'       => $this->input->post('menu_name', TRUE),
              'client_id'       => $this->input->post('client_id', TRUE),
              'appointment_id'  => $this->input->post('appointment_id', TRUE),
              'meal_id'         => $this->input->post('value', TRUE),
              'submitted_by'    => $this->session->id,
              'submitted_on'    => date('Y-m-d H:i:s')
          );
          $this->db->insert('meal_menu_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

     
      public function get_menu_id($menu_id)
      {
          $sql   = "SELECT id,menu_name FROM meal_menu_db WHERE  id=?";
          $query = $this->db->query($sql, array(
              $menu_id
          ));
          return $query->result();
      }
      public function delete_food($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('foodtracker_db');
          return true;
      }
      public function menu($meal_id,$appointment_id)
      {
          $sql   = "SELECT id,menu_name FROM meal_menu_db WHERE meal_id = ? AND  appointment_id=?";
          $query = $this->db->query($sql, array(
              $meal_id,
              $appointment_id
          ));
          return $query->result();
      }
      public function meal_plan($appointment_id, $menu_id, $meal_id)
      {
          $sql   = "SELECT  meal_plan_db.id,meal_plan_db.menu_id,meal_plan_db.meal_id,meal_plan_db.ex,meal_plan_db.qty_val ,meal_plan_db.hh_val,meal_plan_db.foodgroup_content,meal_plan_db.combination_id,foodlists_db.foodlist,fooditems_db.fooditem,foodunits_db.foodunit As hh_measure,GROUP_CONCAT(meal_plan_db.hh_val SEPARATOR '<br>') As hh_val,GROUP_CONCAT(foodgroups_db.foodgroup SEPARATOR '<br>' ) As foodgroup_content FROM meal_plan_db 
              INNER JOIN foodgroups_db ON foodid= foodgroup_content 
              INNER JOIN foodlists_db ON foodlists_db.id=  meal_plan_db.foodlist_id 
              INNER JOIN fooditems_db ON fooditems_db.id= meal_plan_db.fooditem_id 
              INNER JOIN foodunits_db ON foodunits_db.id = fooditems_db.hh_measure 
              WHERE  meal_plan_db.appointment_id=? AND meal_plan_db.menu_id= ? AND meal_plan_db.meal_id= ? 
              GROUP BY meal_plan_db.combination_id";
          $query = $this->db->query($sql, array(
              $appointment_id,
              $menu_id,
              $meal_id
          ));
          return $query->result();
      }
      public function get_meal_plan($appointment_id)
      {
          $sql   = "SELECT  meal_plan_db.id,meal_plan_db.menu_id,meal_plan_db.meal_id,meal_plan_db.ex,meal_plan_db.qty_val ,meal_plan_db.hh_val,meal_plan_db.foodgroup_content,meal_plan_db.combination_id,foodlists_db.foodlist,fooditems_db.fooditem,fooditems_db.hh_measure,GROUP_CONCAT(meal_plan_db.hh_val SEPARATOR '<br>') As hh_val,GROUP_CONCAT(foodgroups_db.foodgroup SEPARATOR '<br>' ) As foodgroup_content FROM meal_plan_db 
              INNER JOIN foodgroups_db ON foodid= foodgroup_content 
              INNER JOIN foodlists_db ON foodlists_db.id=  meal_plan_db.foodlist_id 
              INNER JOIN fooditems_db ON fooditems_db.id= meal_plan_db.fooditem_id 
              WHERE  meal_plan_db.appointment_id=?  
              GROUP BY meal_plan_db.combination_id";
          $query = $this->db->query($sql, array(
              $appointment_id
          ));
          return $query->result();
      }
      public function get_last_meal_plan($client_id)
      {
          $sql   = "SELECT  meal_plan_db.appointment_id,meal_plan_db.id,meal_plan_db.menu_id,meal_plan_db.meal_id,meal_plan_db.ex,meal_plan_db.qty_val ,meal_plan_db.hh_val,meal_plan_db.foodgroup_content,meal_plan_db.combination_id,foodlists_db.foodlist,fooditems_db.fooditem,fooditems_db.hh_measure,GROUP_CONCAT(meal_plan_db.hh_val SEPARATOR '<br>') As hh_val,GROUP_CONCAT(foodgroups_db.foodgroup SEPARATOR '<br>' ) As foodgroup_content FROM meal_plan_db  
              INNER JOIN foodgroups_db ON foodid= foodgroup_content 
              INNER JOIN foodlists_db ON foodlists_db.id=  meal_plan_db.foodlist_id 
              INNER JOIN fooditems_db ON fooditems_db.id= meal_plan_db.fooditem_id 
              WHERE  meal_plan_db.client_id=?  
              GROUP BY meal_plan_db.combination_id 
              ORDER BY meal_plan_db.appointment_id ASC";
          $query = $this->db->query($sql, array(
              $client_id
          ));
          return $query->result();
      }
      public function get_events($event_date)
      {
          $query  = "SELECT rnd_sched_db.id,event_type_id,custom_event_type,approved_date,whole_day, approved_time_from,approved_time_to,all_rnd,remarks,appointment_id,event_type_db.event_type,rnd_sched_db.assigned_rnd_id,users_db.lname,users_db.mname,users_db.fname FROM rnd_sched_db 

            INNER JOIN event_type_db ON event_type_db.id=rnd_sched_db.event_type_id 
            LEFT JOIN users_db ON users_db.id= rnd_sched_db.assigned_rnd_id  
            WHERE approved_date=? 
            ORDER BY approved_date";
          $result = $this->db->query($query, array(
              $event_date
          ));
          return $result->result();
      }
      public function upcoming_events($thismonth, $thisyr)
      {
          $query  = "SELECT event_type_id,custom_event_type,approved_date,whole_day, approved_time_from,approved_time_to,assigned_rnd_id,all_rnd,event_type_db.event_type,users_db.lname,users_db.mname,users_db.fname FROM rnd_sched_db 

            INNER JOIN event_type_db ON event_type_db.id=rnd_sched_db.event_type_id 
            LEFT JOIN users_db ON users_db.id= rnd_sched_db.assigned_rnd_id 
            WHERE MONTH(approved_date)=? AND YEAR(approved_date)=? 
            ORDER BY approved_date";
          $result = $this->db->query($query, array(
              $thismonth,
              $thisyr
          ));
          return $result->result();
      }
      public function get_event_dates()
      {
          $query  = "SELECT DISTINCT(approved_date),whole_day,all_rnd FROM rnd_sched_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_comments()
      {
          $query  = "SELECT * FROM comments_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_pending_requests()
      {
          $query  = "SELECT users_db.lname,users_db.fname,users_db.mname,ncs_requests_db.client_id,ncs_requests_db.id,ncs_requests_db.whole_day,ncs_requests_db.request_date,ncs_requests_db.time_from,ncs_requests_db.time_to,ncs_requests_db.submitted_on,ncs_requests_db.status_id,help_status_db.status FROM users_db 
            INNER JOIN ncs_requests_db ON users_db.id = ncs_requests_db.client_id  
            INNER JOIN help_status_db ON ncs_requests_db.status_id = help_status_db.id 
            WHERE ncs_requests_db.status_id = 2 AND ncs_requests_db.request_date >= CURDATE() 
            ORDER BY ncs_requests_db.request_date DESC";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_all_confirmed_requests()
      {
          $query  = "SELECT a.lname as client_lname,a.fname as client_fname,a.mname as client_mname,b.lname as rnd_lname,b.fname as rnd_fname,b.mname as rnd_mname,ncs_requests_db.client_id,ncs_requests_db.id,ncs_requests_db.status_id,rnd_sched_db.appointment_id,rnd_sched_db.approved_date,rnd_sched_db.whole_day,rnd_sched_db.approved_time_from, rnd_sched_db.assigned_rnd_id,ncs_requests_db.submitted_on,help_status_db.status FROM users_db as a 

            INNER JOIN ncs_requests_db ON a.id = ncs_requests_db.client_id 
            LEFT JOIN rnd_sched_db ON ncs_requests_db.id = rnd_sched_db.appointment_id 
            INNER JOIN help_status_db ON ncs_requests_db.status_id = help_status_db.id 
            LEFT JOIN users_db as b ON b.id=rnd_sched_db.assigned_rnd_id 
            WHERE a.user_type_id= 3 AND ncs_requests_db.status_id = 1 AND ncs_requests_db.request_date >= CURDATE()";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_confirmed_requests_rnd($uid)
      {
          $query  = "SELECT a.lname as client_lname,a.fname as client_fname,a.mname as client_mname,b.lname as rnd_lname,b.fname as rnd_fname,b.mname as rnd_mname,ncs_requests_db.client_id,ncs_requests_db.id,ncs_requests_db.status_id,rnd_sched_db.appointment_id,rnd_sched_db.approved_date,rnd_sched_db.whole_day,rnd_sched_db.approved_time_from, rnd_sched_db.assigned_rnd_id,ncs_requests_db.submitted_on,help_status_db.status FROM users_db as a 

            INNER JOIN ncs_requests_db ON a.id = ncs_requests_db.client_id 
            LEFT JOIN rnd_sched_db ON ncs_requests_db.id = rnd_sched_db.appointment_id 
            INNER JOIN help_status_db ON ncs_requests_db.status_id = help_status_db.id 
            LEFT JOIN users_db as b ON b.id=rnd_sched_db.assigned_rnd_id 
            WHERE rnd_sched_db.assigned_rnd_id=?  AND a.user_type_id= 3 AND ncs_requests_db.status_id = 1 AND ncs_requests_db.request_date >= CURDATE()";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function get_client_request($id, $status_id)
      {
          $query  = "SELECT users_db.id,users_db.lname,users_db.fname,users_db.mname,gender_db.gender,users_db.address,users_db.email_address,users_db.birthday,users_db.contact_number,users_db.photo,TIMESTAMPDIFF(YEAR, birthday ,NOW()) AS age,ncs_requests_db.id AS appointment_id,ncs_requests_db.event_type_id,ncs_requests_db.request_date,ncs_requests_db.whole_day,ncs_requests_db.time_from,ncs_requests_db.time_to,ncs_requests_db.message  FROM ncs_requests_db 

            INNER JOIN users_db ON users_db.id=ncs_requests_db.client_id 
            INNER JOIN gender_db ON users_db.gender= gender_db.id WHERE ncs_requests_db.client_id = ? AND status_id =? ORDER BY request_date DESC LIMIT 1";
          $result = $this->db->query($query, array(
              $id,
              $status_id
          ));
          return $result->result();
      }
      //change timestampdiff to the current date of appointment
      public function get_appointment($appointment_id)
      {
          $query  = "SELECT a.id as client_id,a.lname as client_lname,a.fname as client_fname,a.mname as client_mname,a.gender as gender_id,a.birthday,a.address,a.contact_number,a.email_address,b.lname as rnd_lname,b.fname as rnd_fname,b.mname as rnd_mname,ncs_requests_db.client_id,ncs_requests_db.id,ncs_requests_db.status_id,rnd_sched_db.appointment_id,rnd_sched_db.approved_date,rnd_sched_db.whole_day,rnd_sched_db.approved_time_from, rnd_sched_db.assigned_rnd_id,ncs_requests_db.submitted_on,help_status_db.status,photos_db.photo,gender_db.gender,TIMESTAMPDIFF(YEAR, a.birthday ,NOW()) AS age_year,
        TIMESTAMPDIFF( MONTH, a.birthday , NOW() ) % 12 AS age_month FROM users_db as a 

            INNER JOIN ncs_requests_db ON a.id = ncs_requests_db.client_id 
            LEFT JOIN rnd_sched_db ON ncs_requests_db.id = rnd_sched_db.appointment_id 
            INNER JOIN help_status_db ON ncs_requests_db.status_id = help_status_db.id 
            LEFT JOIN users_db as b ON b.id=rnd_sched_db.assigned_rnd_id 
            LEFT JOIN photos_db ON photos_db.id= a.photo 
            INNER JOIN gender_db ON gender_db.id=a.gender
            WHERE ncs_requests_db.id =?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }

      public function get_age($client_id,$approved_date,$approved_date)
      {
          $query  = "SELECT TIMESTAMPDIFF(YEAR, users_db.birthday ,'$approved_date') AS age_year,
        TIMESTAMPDIFF( MONTH, users_db.birthday , '$approved_date' ) % 12 AS age_month FROM users_db

            WHERE users_db.id =?";
          $result = $this->db->query($query, array(
              $client_id,
             
          ));
          return $result->result();


      }
      public function get_all_appointment($client_id, $status_id)
      {
          $query  = "SELECT a.id as client_id,a.lname as client_lname,a.fname as client_fname,a.mname as client_mname,a.gender as gender_id,a.birthday,a.address,a.contact_number,a.email_address,b.lname as rnd_lname,b.fname as rnd_fname,b.mname as rnd_mname,ncs_requests_db.client_id,ncs_requests_db.id,ncs_requests_db.status_id,rnd_sched_db.appointment_id,rnd_sched_db.approved_date,rnd_sched_db.whole_day,rnd_sched_db.approved_time_from, rnd_sched_db.assigned_rnd_id,ncs_requests_db.submitted_on,help_status_db.status,photos_db.photo,gender_db.gender,TIMESTAMPDIFF(YEAR, a.birthday ,NOW()) AS age_year, TIMESTAMPDIFF( MONTH, a.birthday , NOW() ) % 12 AS age_month FROM users_db as a 
                INNER JOIN ncs_requests_db ON a.id = ncs_requests_db.client_id 
                LEFT JOIN rnd_sched_db ON ncs_requests_db.id = rnd_sched_db.appointment_id 
                INNER JOIN help_status_db ON ncs_requests_db.status_id = help_status_db.id 
                LEFT JOIN users_db as b ON b.id=rnd_sched_db.assigned_rnd_id 
                LEFT JOIN photos_db ON photos_db.id= a.photo
                INNER JOIN gender_db ON gender_db.id=a.gender
                WHERE ncs_requests_db.client_id =? AND ncs_requests_db.status_id =?";
          $result = $this->db->query($query, array(
              $client_id,
              $status_id
          ));
          return $result->result();
      }
      public function get_event_type()
      {
          $query  = "SELECT id,event_type FROM event_type_db WHERE id =1";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_all_rnd()
      {
          $query  = "SELECT id,user_id,lname,fname,mname FROM users_db WHERE user_type_id != 3";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_rnd_id($rnd_id)
      {
          $query  = "SELECT id,user_id,lname,fname,mname FROM users_db WHERE id =?";
          $result = $this->db->query($query, array(
              $rnd_id
          ));
          return $result->result();
      }
      public function get_last_anthropometry($client_id)
      {
          $query  = "SELECT *
            FROM anthropometry_db  WHERE client_id=?  ORDER BY  submitted_on DESC LIMIT 1";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_anthropometry($appointment_id)
      {
          $query  = "SELECT *
            FROM anthropometry_db  WHERE appointment_id=? ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_all_anthropometry($client_id)
      {
          $query  = "SELECT *
            FROM anthropometry_db  WHERE client_id=? ";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function save_anthropometry()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'             => $this->input->post('client_id', TRUE),
              'appointment_id'        => $this->input->post('appointment_id', TRUE),
              'weight'                => $this->input->post('wt', TRUE),
              'weight_unit'           => $this->input->post('wt_opt', TRUE),
              'height'                => $this->input->post('ht', TRUE),
              'bmi'                   => $this->input->post('bmi', TRUE),
              'bmi_classification'    => $this->input->post('bmi_class', TRUE),
              'dbw'                   => $this->input->post('dbw', TRUE),
              'dbw_unit'              => $this->input->post('dbw_opt', TRUE),
              'lwr_lmt'               => $this->input->post('lower_limit', TRUE),
              'uppr_lmt'              => $this->input->post('upper_limit', TRUE),
              'lmt_unit'              => $this->input->post('limit_opt', TRUE),
              'waist_c'               => $this->input->post('wc', TRUE),
              'waist_unit'            => $this->input->post('wc_opt', TRUE),
              'risk_indicator'        => $this->input->post('risk_indicator', TRUE),
              'hip_c'                 => $this->input->post('hc', TRUE),
              'hip_unit'              => $this->input->post('hc_opt', TRUE),
              'whipr'                 => $this->input->post('whipr', TRUE),
              'whipr_classification'  => $this->input->post('whipr_class', TRUE),
              'whtr'                  => $this->input->post('whtr', TRUE),
              'whtr_classification'   => $this->input->post('whtr_class', TRUE),
              'pregnant'              => $this->input->post('ask_pregnant', TRUE),
              'gestation'             => $this->input->post('ask_gestation', TRUE),
              'last_mens_date'        => $this->input->post('mens_date', TRUE),
              'gestational_weeks'     => $this->input->post('gestation_wks', TRUE),
              'lactation'             => $this->input->post('ask_lactation', TRUE),
              'submitted_by'          => $this->session->id,
              'submitted_on'          => date('Y-m-d H:i:s')
          );
          $this->db->insert('anthropometry_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_anthropometry()
      {
          $this->db->trans_start();
          $id   = $this->input->post('appointment_id', TRUE);
          $data = array(
              'weight'                => $this->input->post('wt', TRUE),
              'weight_unit'           => $this->input->post('wt_opt', TRUE),
              'height'                => $this->input->post('ht', TRUE),
              'bmi'                   => $this->input->post('bmi', TRUE),
              'bmi_classification'    => $this->input->post('bmi_class', TRUE),
              'dbw'                   => $this->input->post('dbw', TRUE),
              'dbw_unit'              => $this->input->post('dbw_opt', TRUE),
              'lwr_lmt'               => $this->input->post('lower_limit', TRUE),
              'uppr_lmt'              => $this->input->post('upper_limit', TRUE),
              'lmt_unit'              => $this->input->post('limit_opt', TRUE),
              'waist_c'               => $this->input->post('wc', TRUE),
              'waist_unit'            => $this->input->post('wc_opt', TRUE),
              'risk_indicator'        => $this->input->post('risk_indicator', TRUE),
              'hip_c'                 => $this->input->post('hc', TRUE),
              'hip_unit'              => $this->input->post('hc_opt', TRUE),
              'whipr'                 => $this->input->post('whipr', TRUE),
              'whipr_classification'  => $this->input->post('whipr_class', TRUE),
              'whtr'                  => $this->input->post('whtr', TRUE),
              'whtr_classification'   => $this->input->post('whtr_class', TRUE),
              'pregnant'              => $this->input->post('ask_pregnant', TRUE),
              'gestation'             => $this->input->post('ask_gestation', TRUE),
              'last_mens_date'        => $this->input->post('mens_date', TRUE),
              'gestational_weeks'     => $this->input->post('gestation_wks', TRUE),
              'lactation'             => $this->input->post('ask_lactation', TRUE),
              'submitted_by'          => $this->session->id
          );
          $this->db->where('appointment_id', $id);
          $this->db->update('anthropometry_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function get_last_nutrition_plan($client_id)
      {
          $query  = "SELECT nutrition_plan_db.client_id,nutrition_plan_db.appointment_id,nutrition_plan_db.submitted_on,nutrition_plan_db.wt_id,wt_db.weight_type,anthropometry_db.weight,anthropometry_db.weight_unit,anthropometry_db.dbw,anthropometry_db.dbw_unit,select_cal_plan_db.select_cal_plan,nutrition_plan_db.cal,nutrition_plan_db.cho,nutrition_plan_db.protein,nutrition_plan_db.fat,nutrition_plan_db.st_value,pa_lvl_db.pa_lvl,nutrition_plan_db.pmethod_id,pmethod_db.pmethod,nutrition_plan_db.method_id,method_db.method,nutrition_plan_db.cho_custom,nutrition_plan_db.pro_custom,nutrition_plan_db.fat_custom,nutrition_plan_db.select_plan_id,select_plan_db.select_plan FROM nutrition_plan_db 
                 INNER JOIN wt_db ON wt_db.id = nutrition_plan_db.wt_id 
                 INNER JOIN pa_lvl_db ON pa_lvl_db.id=nutrition_plan_db.pa_lvl_id 
                 INNER JOIN select_cal_plan_db ON select_cal_plan_db.id= nutrition_plan_db.select_cal_plan_id  
                 LEFT JOIN method_db ON  nutrition_plan_db.method_id = method_db.id
                 LEFT JOIN pmethod_db ON nutrition_plan_db.pmethod_id= pmethod_db.id 
                 INNER JOIN select_plan_db ON select_plan_db.id=nutrition_plan_db.select_plan_id 
                 INNER JOIN anthropometry_db ON anthropometry_db.appointment_id=nutrition_plan_db.appointment_id 
                 WHERE nutrition_plan_db.client_id=? ORDER BY submitted_on DESC LIMIT 1";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_nutrition_plan($appointment_id)
      {
          $query  = "SELECT nutrition_plan_db.wt_id,anthropometry_db.weight,anthropometry_db.weight_unit,anthropometry_db.dbw,anthropometry_db.dbw_unit,nutrition_plan_db.pa_lvl_id,nutrition_plan_db.select_cal_plan_id,nutrition_plan_db.cal,nutrition_plan_db.method_id,nutrition_plan_db.pmethod_id,nutrition_plan_db.st_value,nutrition_plan_db.cho_custom,nutrition_plan_db.pro_custom,nutrition_plan_db.fat_custom,nutrition_plan_db.cho,nutrition_plan_db.protein,nutrition_plan_db.fat,nutrition_plan_db.select_plan_id,nutrition_plan_db.default_nutrition_id,nutrition_plan_db.pregnant_lactating FROM nutrition_plan_db  
                 INNER JOIN anthropometry_db ON anthropometry_db.appointment_id=nutrition_plan_db.appointment_id 
                 WHERE nutrition_plan_db.appointment_id=?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_wt_type()
      {
          $query  = "SELECT *
            FROM wt_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_cal_plan()
      {
          $query  = "SELECT *
            FROM select_cal_plan_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_plan()
      {
          $query  = "SELECT *
            FROM select_plan_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_wt_type_anthropometry($appointment_id)
      {
          $query  = "SELECT weight,weight_unit,dbw,dbw_unit FROM anthropometry_db WHERE appointment_id=?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function select_custom_plan($select_plan)
      {
          $query  = "SELECT * FROM method_db WHERE select_plan_id= ?";
          $result = $this->db->query($query, array(
              $select_plan
          ));
          return $result->result();
      }
      public function low_cal($low_cal, $low_cal)
      {
          $query  = "SELECT * FROM default_nutrition_plan_db WHERE default_cal 
 BETWEEN  ? AND ?";
          $result = $this->db->query($query, array(
              $low_cal,
              $low_cal
          ));
          return $result->result();
      }
      public function high_cal($high_cal, $high_cal)
      {
          $query  = "SELECT * FROM default_nutrition_plan_db WHERE default_cal 
 BETWEEN  ? AND ?";
          $result = $this->db->query($query, array(
              $high_cal,
              $high_cal
          ));
          return $result->result();
      }
      public function cal($cal, $cal1)
      {
          $query  = "SELECT * FROM default_nutrition_plan_db WHERE default_cal 
 BETWEEN  ? AND ?";
          $result = $this->db->query($query, array(
              $cal,
              $cal1
          ));
          return $result->result();
      }
      public function select_pmethod($select_method)
      {
          $query  = "SELECT * FROM pmethod_db WHERE method_id= ?";
          $result = $this->db->query($query, array(
              $select_method
          ));
          return $result->result();
      }
      public function get_method()
      {
          $query  = "SELECT * FROM method_db ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_pmethod()
      {
          $query  = "SELECT * FROM pmethod_db ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function save_nutrition_plan()
      { 
          $this->db->trans_start();
          $data = array(
              'client_id'             => $this->input->post('client_id', TRUE),
              'appointment_id'        => $this->input->post('appointment_id', TRUE),
            //'pregnant_lactating'    => $this->input->post('pregnant_lactating', TRUE),
              'wt_id'                 => $this->input->post('select_wt', TRUE),
              'pa_lvl_id'             => $this->input->post('pa_lvl', TRUE),
              'select_cal_plan_id'    => $this->input->post('select_cal_plan', TRUE),
              //'cal_plan'              => $this->input->post('cal_plan', TRUE),
              'cal'                   => $this->input->post('cal', TRUE),
              'method_id'             => $this->input->post('select_method', TRUE),
              'pmethod_id'            => $this->input->post('select_pmethod', TRUE),
              'st_value'              => $this->input->post('st_value', TRUE),
              'cho_custom'            => $this->input->post('cho_plan', TRUE),
              'pro_custom'            => $this->input->post('pro_plan', TRUE),
              'fat_custom'            => $this->input->post('fat_plan', TRUE),
              'cho'                   => $this->input->post('cho', TRUE),
              'protein'               => $this->input->post('pro', TRUE),
              'fat'                   => $this->input->post('fat', TRUE),
              'select_plan_id'        => $this->input->post('select_plan', TRUE),
              'default_nutrition_id'  => $this->input->post('id', TRUE),
              'submitted_by'          => $this->session->id,
              'submitted_on'          => date('Y-m-d H:i:s')
          );
          $this->db->insert('nutrition_plan_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_nutrition_plan()
      {
          $this->db->trans_start();
          $id   = $this->input->post('appointment_id', TRUE);
          $data = array(
            //'pregnant_lactating'      => $this->input->post('pregnant_lactating', TRUE),
              'wt_id'                   => $this->input->post('select_wt', TRUE),
              'pa_lvl_id'               => $this->input->post('pa_lvl', TRUE),
              'select_cal_plan_id'      => $this->input->post('select_cal_plan', TRUE),
              //'cal_plan'                => $this->input->post('cal_plan', TRUE),
              'cal'                     => $this->input->post('cal', TRUE),
              'method_id'               => $this->input->post('select_method', TRUE),
              'pmethod_id'              => $this->input->post('select_pmethod', TRUE),
              'st_value'                => $this->input->post('st_value', TRUE),
              'cho_custom'              => $this->input->post('cho_plan', TRUE),
              'pro_custom'              => $this->input->post('pro_plan', TRUE),
              'fat_custom'              => $this->input->post('fat_plan', TRUE),
              'cho'                     => $this->input->post('cho', TRUE),
              'protein'                 => $this->input->post('pro', TRUE),
              'fat'                     => $this->input->post('fat', TRUE),
              'select_plan_id'          => $this->input->post('select_plan', TRUE),
              'default_nutrition_id'    => $this->input->post('id', TRUE),
              'submitted_by'            => $this->session->id,
              'submitted_on'            => date('Y-m-d H:i:s')
          );
          $this->db->where('appointment_id', $id);
          $this->db->update('nutrition_plan_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function get_foodgroups_th()
      {
          $query  = "SELECT * FROM foodgroups_th_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_default_fel_db($default_nutrition_id, $foodgroup_th_id)
      {
          $query  = "SELECT * FROM foodgroups_db  INNER JOIN default_fel_db ON foodgroups_db.foodid= default_fel_db.foodid WHERE  default_fel_db.default_nutrition_id=? AND foodgroup_th_id =?  ORDER BY  default_fel_db.foodid";
          $result = $this->db->query($query, array(
              $default_nutrition_id,
              $foodgroup_th_id
          ));
          return $result->result();
      }
      public function get_last_fel($client_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid WHERE  fel_db.client_id=?   
          ORDER BY  fel_db.foodid ";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_fel($appointment_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid WHERE  fel_db.appointment_id=?   
          ORDER BY  fel_db.foodid ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_fel_db($appointment_id, $foodgroup_th_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid 
          WHERE  fel_db.appointment_id=? AND foodgroup_th_id =?   
          ORDER BY  fel_db.foodid ";
          $result = $this->db->query($query, array(
              $appointment_id,
              $foodgroup_th_id
          ));
          return $result->result();
      }
      public function get_fel_foodgroups_th($foodgroup_th_id)
      {
          $query  = "SELECT * FROM foodgroups_db 
          WHERE foodgroup_th_id =?
          ORDER BY foodid ASC  ";
          $result = $this->db->query($query, array(
              $foodgroup_th_id
          ));
          return $result->result();
      }
      public function total_fel_nutrients($appointment_id)
      {
          $query  = "SELECT SUM(fel_cho)as total_cho,SUM(fel_pro) as total_pro,SUM(fel_fat) as total_fat, SUM(fel_cal) as total_cal FROM fel_db WHERE appointment_id = ?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function save_fel()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'         => $this->input->post('client_id', TRUE),
              'appointment_id'    => $this->input->post('appointment_id', TRUE),
              'foodid'            => $this->input->post('foodid', TRUE),
              'ex'                => $this->input->post('ex', TRUE),
              'fel_cho'           => $this->input->post('fel_cho', TRUE),
              'fel_pro'           => $this->input->post('fel_pro', TRUE),
              'fel_fat'           => $this->input->post('fel_fat', TRUE),
              'fel_cal'           => $this->input->post('fel_cal', TRUE),
              'bfast'             => $this->input->post('bfast', TRUE),
              'am_snack'          => $this->input->post('am_snack', TRUE),
              'lunch'             => $this->input->post('lunch', TRUE),
              'pm_snack'          => $this->input->post('pm_snack', TRUE),
              'dinner'            => $this->input->post('dinner', TRUE),
              'mn_snack'          => $this->input->post('mn_snack', TRUE),
              'submitted_by'      => $this->session->id,
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->insert('fel_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_fel()
      {
          $this->db->trans_start();
          $id   = $this->input->post('rowid', TRUE);
          $data = array(
              //'client_id'         => $this->input->post('client_id', TRUE),
             // 'appointment_id'    => $this->input->post('appointment_id', TRUE),
              'foodid'            => $this->input->post('foodid', TRUE),
              'ex'                => $this->input->post('ex', TRUE),
              'fel_cho'           => $this->input->post('fel_cho', TRUE),
              'fel_pro'           => $this->input->post('fel_pro', TRUE),
              'fel_fat'           => $this->input->post('fel_fat', TRUE),
              'fel_cal'           => $this->input->post('fel_cal', TRUE),
              'bfast'             => $this->input->post('bfast', TRUE),
              'am_snack'          => $this->input->post('am_snack', TRUE),
              'lunch'             => $this->input->post('lunch', TRUE),
              'pm_snack'          => $this->input->post('pm_snack', TRUE),
              'dinner'            => $this->input->post('dinner', TRUE),
              'mn_snack'          => $this->input->post('mn_snack', TRUE),
              'submitted_by'      => $this->session->id,
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $id);
          $this->db->update('fel_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function default_fel_total($data_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN default_fel_db ON foodgroups_db.foodid= default_fel_db.foodid 
          WHERE   default_fel_db.default_nutrition_id=?   
          ORDER BY default_fel_db.foodid";
          $result = $this->db->query($query, array(
              $data_id
          ));
          return $result->result();
      }
      public function fel_total($appointment_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid 
          WHERE   fel_db.appointment_id=?   
          ORDER BY fel_db.foodid";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_fel_default_foodgroup($meal_code, $data_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN default_fel_db ON foodgroups_db.foodid= default_fel_db.foodid 
          WHERE default_fel_db.$meal_code != 0  AND default_fel_db.default_nutrition_id='$data_id'";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_fel_foodgroup($meal_code, $appointment_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid 
          WHERE fel_db.$meal_code != 0  AND fel_db.appointment_id='$appointment_id'";
          $result = $this->db->query($query);
          $count  = $result->num_rows();
          return $result->result();
      }
       public function get_default_fel_foodgroup($meal_code, $data_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN default_fel_db ON foodgroups_db.foodid= default_fel_db.foodid 
          WHERE default_fel_db.$meal_code != 0  AND default_fel_db.default_nutrition_id='$data_id'";
          $result = $this->db->query($query);
          $count  = $result->num_rows();
          return $result->result();
      }

      public function get_all_fel_foodlists()
      {
          $query  = "SELECT * FROM foodlists_db ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_fel_foodlists($id)
      {
          $query  = "SELECT * FROM foodlists_db WHERE foodid= '$id'";
          $result = $this->db->query($query, array(
              $id
          ));
          return $result->result();
      }
      public function get_foodgroup_content($arr_fg)
      {
          $query  = "SELECT * FROM foodgroups_db WHERE foodid= ?";
          $result = $this->db->query($query, array(
              $arr_fg
          ));
          return $result->result();
      }
      public function get_total_default_meal($foodid, $meal_id, $data_id)
      {
          $query  = "SELECT * FROM default_meal_plan_db  WHERE foodgroup_content= ? AND meal_id=?  AND default_nutrition_id=?";
          $result = $this->db->query($query, array(
              $foodid,
              $meal_id,
              $data_id
          ));
          return $result->result();
      }
      public function get_total_meal($foodid, $meal_id, $appointment_id)
      {
          $query  = "SELECT * FROM meal_plan_db  WHERE foodgroup_content= ? AND meal_id=?  AND appointment_id=? ";
          $result = $this->db->query($query, array(
              $foodid,
              $meal_id,
              $appointment_id
          ));
          return $result->result();
      }
      public function get_meal_status()
      {
          $query  = "SHOW TABLE STATUS LIKE 'meal_plan_db' ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function check_fel_meal($item, $appointment_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN fel_db ON foodgroups_db.foodid= fel_db.foodid WHERE fel_db.foodid = ? AND appointment_id=? ";
          $result = $this->db->query($query, array(
              $item,
              $appointment_id
          ));
          return $result->result();
      }
      public function check_meal_plan_ex($meal_id, $appointment_id, $item)
      {
          $query  = "SELECT * FROM meal_plan_db 
          INNER JOIN foodgroups_db ON foodid= foodgroup_id 
          INNER JOIN foodlists_db ON foodlists_db.id=  meal_plan_db.foodlist_id 
          INNER JOIN fooditems_db ON fooditems_db.id= meal_plan_db.fooditem_id 
          WHERE meal_plan_db.meal_id=? AND appointment_id=? AND meal_plan_db.foodgroup_content= ?";
          $result = $this->db->query($query, array(
              $meal_id,
              $appointment_id,
              $item
          ));
          return $result->result();
      }
      public function update_menu()
      {
          $this->db->trans_start();
          $menu_id = $this->input->post('menu_id', TRUE);
          $data    = array(
              'menu_name' => $this->input->post('menu_name', TRUE)
          );
          $this->db->where('id', $menu_id);
          $this->db->update('meal_menu_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function get_foodmeal($id)
      {
          $sql   = "SELECT meal_plan_db.foodgroup_id,meal_plan_db.foodlist_id,GROUP_CONCAT(meal_plan_db.fooditem_id ORDER BY meal_plan_db.fooditem_id DESC) AS fooditem_id,GROUP_CONCAT(meal_plan_db.foodgroup_content ORDER BY meal_plan_db.fooditem_id DESC) AS foodgroup_content,meal_plan_db.ex,meal_plan_db.qty_val ,GROUP_CONCAT(meal_plan_db.hh_val) AS hh_val,fooditems_db.fooditem,GROUP_CONCAT(fooditems_db.constant_exchange) AS const_ex,foodunits_db.foodunit AS hh_measure FROM meal_plan_db 
                  INNER JOIN fooditems_db ON meal_plan_db.fooditem_id = fooditems_db.id 
                  INNER JOIN foodunits_db ON foodunits_db.id = fooditems_db.hh_measure 
                  WHERE meal_plan_db.combination_id=?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      } 
      public function delete_anthropometry($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('anthropometry_db');
          return true;
        
      }
      public function delete_nutrition_plan($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('nutrition_plan_db');
          return true;
      }
      public function delete_fel($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('fel_db');
          return true;
      }
      public function delete_menu($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('meal_menu_db');
         // $this->db->where('menu_id', $id);
          //$this->db->delete('meal_plan_db');
          return true;  
          
      }
    
      public function delete_meal($where,$id)
      {
        //menu_id || combination_id || appointment_id
          $this->db->where($where, $id);
          $this->db->delete('meal_plan_db');
          return true;
      }

      /*public function delete_all_meal($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('meal_plan_db');
          return true;
      }*/


      /*public function delete_meal1($id)
      {
          $this->db->where('combination_id', $id);
          $this->db->delete('meal_plan_db');
          return true;
      }*/
      public function get_btests($btest)
      {
          $query  = "SELECT biochem_test  FROM biochemical_tests_db WHERE biochem_test LIKE '%$btest%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_bresults($bresult)
      {
          $query  = "SELECT biochem_result FROM biochemical_db WHERE biochem_result LIKE '%$bresult%' ORDER BY submitted_on DESC LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_bnvalues($bnvalue)
      {
          $query  = "SELECT n_values FROM biochemical_db WHERE n_values LIKE '%$bnvalue%' ORDER BY submitted_on DESC LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_biochemical_db($client_id)
      {
          $query  = "SELECT id, client_id,appointment_id,biochem_test, biochem_result,n_values,biochem_result_date,biochem_remarks,submitted_on FROM biochemical_db WHERE client_id= ? ORDER BY submitted_on DESC  ";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_biochemical_appointment($appointment_id)
      {
          $query  = "SELECT id, client_id,appointment_id,biochem_test, biochem_result,n_values,biochem_result_date,biochem_remarks,submitted_on FROM biochemical_db WHERE appointment_id= ? ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function save_biochemical()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'           => $this->input->post('client_id', TRUE),
              'appointment_id'      => $this->input->post('appointment_id', TRUE),
              'biochem_test'        => $this->input->post('btest', TRUE),
              'biochem_result'      => $this->input->post('bresult', TRUE),
              'n_values'            => $this->input->post('n_values', TRUE),
              'biochem_result_date' => $this->input->post('result_date', TRUE),
              'biochem_remarks'     => $this->input->post('remarks', TRUE),
              'submitted_by'        => $this->session->id,
              'submitted_on'        => date('Y-m-d H:i:s')
          );
          $this->db->insert('biochemical_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_biochemical()
      {
          $this->db->trans_start();
          $id   = $this->input->post('id', TRUE);
          $data = array(
              'biochem_test'        => $this->input->post('btest1', TRUE),
              'biochem_result'      => $this->input->post('bresult1', TRUE),
              'n_values'            => $this->input->post('n_values1', TRUE),
              'biochem_result_date' => $this->input->post('result_date1', TRUE),
              'biochem_remarks'     => $this->input->post('remarks1', TRUE),
              'submitted_by'        => $this->session->id,
              'submitted_on'        => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $id);
          $this->db->update('biochemical_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function delete_biochemical($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('biochemical_db');
          return true;
      }
      public function delete_all_biochemical($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('biochemical_db');
          return true;
      }
      public function get_biochemical_id($id)
      {
          $query  = "SELECT id,biochem_test,biochem_result,n_values,biochem_result_date,biochem_remarks,submitted_on FROM biochemical_db WHERE id=? ";
          $result = $this->db->query($query, array(
              $id
          ));
          return $result->result();
      }
      public function get_biochemical_result_print($appointment_id, $biochem_result_date)
      {
          $query  = "SELECT biochem_test,biochem_result,n_values,biochem_result_date,biochem_remarks FROM biochemical_db 
 WHERE  appointment_id=? AND biochem_result_date= ?";
          $result = $this->db->query($query, array(
              $appointment_id,
              $biochem_result_date
          ));
          return $result->result();
      }
      public function get_clinical_db($client_id)
      {
          $query  = "SELECT id, client_id,appointment_id,clinical_parameter,observation,clinical_remarks,submitted_on FROM clinical_db WHERE client_id= ? ORDER BY submitted_on DESC  ";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_clinical_parameters($clinical_test)
      {
          $query  = "SELECT clinical_test FROM clinical_tests_db WHERE clinical_test LIKE '%$clinical_test%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_observations($observation)
      {
          $query  = "SELECT observation FROM clinical_db WHERE observation LIKE '%$observation%' ORDER BY submitted_on DESC LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_blood_pressures($bp)
      {
          $query  = "SELECT bp_classification FROM bp_classification_db WHERE bp_classification LIKE '%$bp%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_clinical_appointment($appointment_id)
      {
          $query  = "SELECT id, client_id,appointment_id,clinical_parameter,observation,clinical_remarks,submitted_on FROM clinical_db WHERE appointment_id= ?  ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function save_clinical()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'           => $this->input->post('client_id', TRUE),
              'appointment_id'      => $this->input->post('appointment_id', TRUE),
              'clinical_parameter'  => $this->input->post('clinical_param', TRUE),
              'observation'         => $this->input->post('obsrv', TRUE),
              'clinical_remarks'    => $this->input->post('remarks', TRUE),
              'submitted_by'        => $this->session->id,
              'submitted_on'        => date('Y-m-d H:i:s')
          );
          $this->db->insert('clinical_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_clinical()
      {
          $this->db->trans_start();
          $id   = $this->input->post('id', TRUE);
          $data = array(
              //'client_id'           => $this->input->post('client_id', TRUE),
              //'appointment_id'      => $this->input->post('appointment_id', TRUE),
              'clinical_parameter'  => $this->input->post('clinical_param1', TRUE),
              'observation'         => $this->input->post('obsrv1', TRUE),
              'clinical_remarks'    => $this->input->post('remarks1', TRUE),
              'submitted_by'        => $this->session->id,
              'submitted_on'        => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $id);
          $this->db->update('clinical_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function delete_clinical($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('clinical_db');
          return true;
      }
      public function delete_all_clinical($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('biochemical_db');
          return true;
      }
      public function get_clinical_id($id)
      {
          $query  = "SELECT id,clinical_parameter,observation,clinical_remarks,submitted_on FROM clinical_db WHERE id=?";
          $result = $this->db->query($query, array(
              $id
          ));
          return $result->result();
      }
      public function get_clinical_result_print($client_id, $appointment_id)
      {
          $query  = "SELECT clinical_parameter,observation,clinical_remarks,submitted_on FROM clinical_db WHERE client_id=? AND appointment_id=? ";
          $result = $this->db->query($query, array(
              $client_id,
              $appointment_id
          ));
          return $result->result();
      }
      public function get_diagnosis_result_print($client_id, $appointment_id)
      {
          $query  = "SELECT diagnosis,etiology,ss_diagnosis,diagnosis_remarks,submitted_on FROM diagnosis_db WHERE client_id=? AND appointment_id=?";
          $result = $this->db->query($query, array(
              $client_id,
              $appointment_id
          ));
          return $result->result();
      }
      public function get_diagnosis_db($client_id)
      {
          $query  = "SELECT id, client_id,appointment_id,diagnosis, etiology,ss_diagnosis,diagnosis_remarks,submitted_on FROM diagnosis_db WHERE client_id='$client_id' ORDER BY submitted_on DESC  ";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function save_diagnosis()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'         => $this->input->post('client_id', TRUE),
              'appointment_id'    => $this->input->post('appointment_id', TRUE),
              'diagnosis'         => $this->input->post('diagnosis', TRUE),
              'etiology'          => $this->input->post('etiology', TRUE),
              'ss_diagnosis'      => $this->input->post('ss_diagnosis', TRUE),
              'diagnosis_remarks' => $this->input->post('remarks', TRUE),
              'submitted_by'      => $this->session->id,
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->insert('diagnosis_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_diagnosis()
      {
          $this->db->trans_start();
          $id   = $this->input->post('id', TRUE);
          $data = array(
              'diagnosis'         => $this->input->post('diagnosis1', TRUE),
              'etiology'          => $this->input->post('etiology1', TRUE),
              'ss_diagnosis'      => $this->input->post('ss_diagnosis1', TRUE),
              'diagnosis_remarks' => $this->input->post('remarks1', TRUE),
              'submitted_by'      => $this->session->id,
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $id);
          $this->db->update('diagnosis_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function delete_diagnosis($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('diagnosis_db');
          return true;
      }

      public function delete_all_diagnosis($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('biochemical_db');
          return true;
      }
      public function get_diagnosis_id($id)
      {
          $query  = "SELECT id,client_id,diagnosis,etiology,ss_diagnosis,diagnosis_remarks,submitted_on FROM diagnosis_db WHERE id=? ";
          $result = $this->db->query($query, array(
              $id
          ));
          return $result->result();
      }
      public function get_diagnosis($diagnosis)
      {
          $query  = "SELECT diagnosis  FROM diagnosis_db WHERE diagnosis LIKE '%$diagnosis%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_etiology($etiology)
      {
          $query  = "SELECT etiology FROM diagnosis_db WHERE etiology LIKE '%$etiology%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_ss_diagnosis($ss_diagnosis)
      {
          $query  = "SELECT ss_diagnosis FROM diagnosis_db WHERE ss_diagnosis LIKE '%$ss_diagnosis%' LIMIT 10";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_diagnosis_appointment($appointment_id)
      {
          $query  = "SELECT id,client_id,diagnosis,etiology,ss_diagnosis,diagnosis_remarks,submitted_on FROM diagnosis_db WHERE appointment_id=? ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_recommendation($appointment_id)
      {
          $query  = "SELECT appointment_id,recommendation
            FROM recommendations_db   WHERE appointment_id=? ";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function save_recommendation()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'         => $this->input->post('client_id', TRUE),
              'appointment_id'    => $this->input->post('appointment_id', TRUE),
              'recommendation'    => $this->input->post('recommendation', TRUE),
              'submitted_by'      => $this->session->id,
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->insert('recommendations_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }


      public function get_recommendation_id($id)
      {
          $query  = "SELECT recommendation FROM recommendations_db WHERE appointment_id=?";
          $result = $this->db->query($query, array(
              $id
          ));
          return $result->result();
      }
      public function update_recommendation()
      {
          $this->db->trans_start();
          $id   = $this->input->post('appointment_id1', TRUE);
          $data = array(
              'recommendation'  => $this->input->post('recommendation1', TRUE),
              'submitted_by'    => $this->session->id,
              'submitted_on'    => date('Y-m-d H:i:s')
          );
          $this->db->where('appointment_id', $id);
          $this->db->update('recommendations_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function delete_recommendation($id)
      {
          $this->db->where('appointment_id', $id);
          $this->db->delete('recommendations_db');
          return true;
      }
      public function get_summary($appointment_id)
      {
          $query  = "SELECT * FROM anthropometry_db 
                  INNER JOIN nutrition_plan_db ON nutrition_plan_db.appointment_id = anthropometry_db.appointment_id 
                  LEFT JOIN fel_db ON fel_db.appointment_id=anthropometry_db.appointment_id 
                  LEFT JOIN recommendations_db ON recommendations_db.appointment_id= anthropometry_db.appointment_id   
                  WHERE anthropometry_db.appointment_id = ?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
      public function get_anthrop_nutrition_plan($appointment_id)
      {
          $query  = "SELECT select_cal_plan,height,height_unit,weight,weight_unit,lwr_lmt,uppr_lmt,lmt_unit,bmi,bmi_classification,dbw,dbw_unit,waist_c,waist_unit,hip_c,hip_unit,risk_indicator,whipr,whipr_classification,whtr,whtr_classification,cal,cho,protein,fat,select_plan_id,default_nutrition_id FROM nutrition_plan_db 
            LEFT JOIN anthropometry_db ON anthropometry_db.appointment_id = nutrition_plan_db.appointment_id 
            LEFT JOIN select_cal_plan_db ON select_cal_plan_db.id= nutrition_plan_db.select_cal_plan_id 
            WHERE  anthropometry_db.appointment_id=?";
          $result = $this->db->query($query, array(
              $appointment_id
          ));
          return $result->result();
      }
     
      public function get_stats_year($year)
      {
          $query  = "SELECT access_date as year,COUNT(id) as total FROM logs_db WHERE YEAR(access_date) = ?  GROUP BY YEAR(access_date)";
          $result = $this->db->query($query, array(
              $year
          ));
          return $result->result();
      }
      public function get_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_fast_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%fast%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year

          ));
          return $result->result();
      }

      public function get_events_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%events%' AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_publications_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%publications%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_help_tracker_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%help_tracker%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
            $month,
            $year
          ));
          return $result->result();
      }

      public function get_pdri_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%nutrition_label%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
            $month,
            $year
          ));
          return $result->result();
      }

      public function get_pa_tracker_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%pa_tracker%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_foodtracker_stats($month,$year)
      {
          $query  = "SELECT access_date as month,COUNT(*) as total FROM logs_db WHERE page LIKE '%foodtracker%'  AND DATE_FORMAT(access_date,'%M') = ?  AND DATE_FORMAT(access_date, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }
      public function get_total_stats()
      {
          $query  = "SELECT COUNT(*) as total FROM logs_db ";
          $result = $this->db->query($query);
          return $result->result();
      }

      public function get_total_appointments_stats()
      {
          $query  = "SELECT approved_date as month,COUNT(*) as total FROM rnd_sched_db WHERE  appointment_id != 'NULL' ";
          $result = $this->db->query($query);
          return $result->result();
      }


      public function get_appointments_stats($month,$year)
      {
          $query  = "SELECT approved_date as month,COUNT(*) as total FROM rnd_sched_db WHERE DATE_FORMAT(approved_date,'%M') = ? AND DATE_FORMAT(approved_date, '%Y')=? AND appointment_id != 'NULL'";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_users_stats($month,$year)
      {
          $query  = "SELECT submitted_on as month,COUNT(*) as total FROM users_db WHERE DATE_FORMAT(submitted_on,'%M') = ? AND DATE_FORMAT(submitted_on, '%Y')=?";
          $result = $this->db->query($query, array(
              $month,
              $year
          ));
          return $result->result();
      }

      public function get_wt_data($client_id)
      {
          $query  = "SELECT weight,weight_unit,submitted_on FROM anthropometry_db WHERE  client_id= ?";
          $result = $this->db->query($query, array(
              $client_id
          ));
          return $result->result();
      }
      public function get_event_id($id)
      {
          $sql   = "SELECT event_type_id,custom_event_type,approved_date,whole_day,approved_time_from,approved_time_to,status_id,assigned_rnd_id,all_rnd,remarks FROM rnd_sched_db WHERE id=?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      }
      public function get_event_type1()
      {
          $sql   = "SELECT id,event_type FROM event_type_db WHERE id != 1";
          $query = $this->db->query($sql);
          return $query->result();
      }
      public function get_rnd()
      {
          $sql   = "SELECT id,user_id,lname,fname,mname FROM users_db  WHERE user_type_id != 3";
          $query = $this->db->query($sql);
          return $query->result();
      }
      public function get_users( $uid)
      {
          $query  = "SELECT * FROM users_db WHERE 
                id != ?  ORDER BY users_db.id ASC ";
          $result = $this->db->query($query, array(
              
              $uid
          ));
          return $result->result();
      }


      public function update_privilege()
      {
         $this->db->trans_start();
          $id   = $this->input->post('id', TRUE);
          $data = array(
              'user_type_id'        => $this->input->post('user_type_id', TRUE),
           
          );
          $this->db->where('id', $id);
          $this->db->update('users_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }


      }
      public function get_user_type()
      {
          $query = $this->db->query('SELECT * FROM user_type_db ');
          return $query->result();
      }
      public function get_gestation($gestation_wks,$ht)
      {
          $sql   = "SELECT * FROM gestation_db WHERE week='$gestation_wks' AND height='$ht' ";
          $query = $this->db->query($sql, array(
              $gestation_wks,
              $ht
          ));
          return $query->result();
      }
      public function get_fooditems()
      {
          $query  = "SELECT fooditems_db.id,foodgroups_db.foodgroup,foodlists_db.foodlist,fooditems_db.fooditem FROM fooditems_db 
                  INNER JOIN foodgroups_db ON foodgroups_db.foodid= fooditems_db.foodgroup_content 
                  INNER JOIN foodlists_db ON foodlists_db.id=fooditems_db.foodlist_id ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_fooditem_id($fooditem_id)
      {
          $query  = "SELECT fooditems_db.id as fooditem_id,fooditems_db.foodgroup_id,fooditems_db.foodlist_id,fooditems_db.fooditem,fooditems_db.foodgroup_content,fooditems_db.weight_ep,fooditems_db.weight_ap,fooditems_db.constant_exchange,fooditems_db.hh_measure,fooditems_db.dimension,fooditems_db.combination_id FROM fooditems_db 
                  INNER JOIN foodgroups_db ON foodgroups_db.foodid= fooditems_db.foodgroup_content 
                  INNER JOIN foodlists_db ON foodlists_db.id=fooditems_db.foodlist_id WHERE  fooditems_db.id=? ";
          $result = $this->db->query($query, array(
              $fooditem_id
          ));
          return $result->result();
      }
      public function get_all_foodgroups()
      {
          $query  = "SELECT * FROM foodgroups_db";
          $result = $this->db->query($query);
          return $result->result();
      }

      public function get_all_fooditems($fooditem)
      {
          $query  = "SELECT id,fooditem FROM fooditems_db WHERE fooditem LIKE '%$fooditem%'";
          $result = $this->db->query($query);
          return $result->result();
      }

      public function save_fooditem()
      {
        
         $fooditem_id = $this->input->post('add_fooditem_id', TRUE);
          if ($fooditem_id == '' || $fooditem_id == NULL) {
              $get_new_fooditem = $this->db->query("SHOW TABLE STATUS LIKE 'fooditems_db'");
              $get_new_fooditem = $get_new_fooditem->row(0);
              $fooditem_id     = $get_new_fooditem->Auto_increment;
          } else {
              $fooditem_id = $this->input->post('add_fooditem_id', TRUE);
          }
          $this->db->trans_start();


          $data = array(
              'foodgroup_id'          => $this->input->post('add_foodgroup', TRUE),
              'foodlist_id'           => $this->input->post('add_foodlist', TRUE),
              'fooditem'              => $this->input->post('add_fooditem', TRUE),
              'foodgroup_content'     => $this->input->post('add_foodgroup_content', TRUE),
              'weight_ep'             => $this->input->post('add_wt_ep', TRUE),
              'weight_ap'             => $this->input->post('add_wt_ap', TRUE),
              'constant_exchange'     => $this->input->post('add_ex', TRUE),
              'hh_measure'            => $this->input->post('add_hh_m', TRUE),
              'dimension'             => $this->input->post('add_dimension', TRUE),
              'combination_id'        => $fooditem_id
          );
          
          $this->db->insert('fooditems_db', $data);
          $this->db->trans_complete();

          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }

      }

      public function update_fooditem()
      {
         $id          = $this->input->post('id', TRUE);
         $fooditem_id = $this->input->post('add_fooditem_id1', TRUE);
          if ($fooditem_id == '' || $fooditem_id == NULL) {
              $get_new_fooditem = $this->db->query("SHOW TABLE STATUS LIKE 'fooditems_db'");
              $get_new_fooditem = $get_new_fooditem->row(0);
              $fooditem_id1     = $get_new_fooditem->Auto_increment;
          } else {
              $fooditem_id1 = $this->input->post('add_fooditem_id1', TRUE);
          }
          $this->db->trans_start();
          $data = array(
              'foodgroup_id'          => $this->input->post('add_foodgroup1', TRUE),
              'foodlist_id'           => $this->input->post('add_foodlist1', TRUE),
              'fooditem'              => $this->input->post('add_fooditem1', TRUE),
              'foodgroup_content'     => $this->input->post('add_foodgroup_content1', TRUE),
              'weight_ep'             => $this->input->post('add_wt_ep1', TRUE),
              'weight_ap'             => $this->input->post('add_wt_ap1', TRUE),
              'constant_exchange'     => $this->input->post('add_ex1', TRUE),
              'hh_measure'            => $this->input->post('add_hh_m1', TRUE),
              'dimension'             => $this->input->post('add_dimension1', TRUE),
              'combination_id'        => $fooditem_id1
          );
          $this->db->where('id', $id);
          $this->db->update('fooditems_db', $data);
          $this->db->trans_complete();

          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }

      }


      public function delete_fooditem($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('fooditems_db');
          return true;
      }


      public function get_default_nutrition_plan()
      {
          $query  = "SELECT * FROM default_nutrition_plan_db";
          $result = $this->db->query($query);
          return $result->result();
      }


      public function save_default_menu()
      {
          $this->db->trans_start();
          $data = array(
              'menu_name'               => $this->input->post('menu_name', TRUE),
              'meal_id'                 => $this->input->post('value', TRUE),
              'default_nutrition_id'    => $this->input->post('nutrition_id', TRUE),
              'submitted_on'            => date('Y-m-d H:i:s')
          );
          $this->db->insert('default_meal_menu_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function delete_default_menu($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('default_meal_menu_db');
         // $this->db->where('menu_id', $id);
          //$this->db->delete('meal_plan_db');
          return true;  
          
      }
    
      public function delete_default_meal($where,$id)
      {
        //menu_id || combination_id || appointment_id
          $this->db->where($where, $id);
          $this->db->delete('default_meal_plan_db');
          return true;
      }

      /*public function delete_default_menu($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('default_meal_menu_db');
         
          return true;
      }
      public function delete_default_meal($id)
      {
          $this->db->where('menu_id', $id);
          $this->db->delete('default_meal_plan_db');
          return true;
      }*/
      public function get_default_meal_status()
      {
          $query  = "SHOW TABLE STATUS LIKE 'default_meal_plan_db' ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function check_default_fel_meal($item,$data_id)
      {
          $query  = "SELECT * FROM foodgroups_db  
          INNER JOIN default_fel_db ON foodgroups_db.foodid= default_fel_db.foodid WHERE default_fel_db.foodid = ? AND  default_fel_db.default_nutrition_id = ? ";
          $result = $this->db->query($query, array(
              $item,
              $data_id
          ));
          return $result->result();
      }

      public function check_default_meal_plan_ex($meal_id, $data_id,$item)
      {
          $query  = "SELECT * FROM default_meal_plan_db 
          INNER JOIN foodgroups_db ON foodid= foodgroup_id 
          INNER JOIN foodlists_db ON foodlists_db.id=  default_meal_plan_db.foodlist_id 
          INNER JOIN fooditems_db ON fooditems_db.id= default_meal_plan_db.fooditem_id 
          WHERE default_meal_plan_db.meal_id=? AND default_meal_plan_db.default_nutrition_id=? AND default_meal_plan_db.foodgroup_content= ?";
          $result = $this->db->query($query, array(
              $meal_id,
              $data_id,
              $item
          ));
          return $result->result();
      }

      public function get_default_foodmeal($id)
      {
          $sql   = "SELECT default_meal_plan_db.foodgroup_id,default_meal_plan_db.foodlist_id,GROUP_CONCAT(default_meal_plan_db.fooditem_id ORDER BY default_meal_plan_db.fooditem_id DESC) AS fooditem_id,GROUP_CONCAT(default_meal_plan_db.foodgroup_content ORDER BY default_meal_plan_db.fooditem_id DESC) AS foodgroup_content,default_meal_plan_db.ex,default_meal_plan_db.qty_val ,GROUP_CONCAT(default_meal_plan_db.hh_val) AS hh_val,fooditems_db.fooditem,GROUP_CONCAT(fooditems_db.constant_exchange) AS const_ex,foodunits_db.foodunit AS hh_measure FROM default_meal_plan_db 
                  INNER JOIN fooditems_db ON default_meal_plan_db.fooditem_id = fooditems_db.id 
                  INNER JOIN foodunits_db ON foodunits_db.id = fooditems_db.hh_measure 
                  WHERE default_meal_plan_db.combination_id=?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      } 

      public function get_default_menu_id($menu_id)
      {
          $sql   = "SELECT id,menu_name FROM default_meal_menu_db WHERE  id=?";
          $query = $this->db->query($sql, array(
              $menu_id
          ));
          return $query->result();
      }

      public function update_default_menu()
      {
          $this->db->trans_start();
          $menu_id = $this->input->post('menu_id', TRUE);
          $data    = array(
              'menu_name' => $this->input->post('menu_name', TRUE)
          );
          $this->db->where('id', $menu_id);
          $this->db->update('default_meal_menu_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          } 
      }

      public function get_user_details($uid)
      {
          $sql   = "SELECT users_db.id,users_db.lname,users_db.fname,users_db.mname,users_db.extension,users_db.gender,users_db.username,users_db.password,users_db.gender,gender_db.gender AS a_gender,TIMESTAMPDIFF(YEAR, users_db.birthday ,NOW()) AS age_year,
        TIMESTAMPDIFF( MONTH, users_db.birthday , NOW() ) % 12 AS age_month, users_db.birthday,users_db.address,users_db.contact_number,users_db.email_address,photos_db.photo FROM users_db LEFT JOIN photos_db ON photos_db.id= users_db.photo INNER JOIN gender_db ON gender_db.id = users_db.gender WHERE users_db.id= ? ";
          $query = $this->db->query($sql, array(
              $uid
          ));
          return $query->result();
      }

      public function update_info()
      {
          $this->db->trans_start();
          $uid  = $this->session->id;
          $data = array(
              'lname'           => $this->input->post('lname', TRUE),
              'fname'           => $this->input->post('fname', TRUE),
              'mname'           => $this->input->post('mname', TRUE),
              'extension'       => $this->input->post('extn', TRUE),
              'gender'          => $this->input->post('gender', TRUE),
              'birthday'        => $this->input->post('birthday', TRUE),
              'address'         => $this->input->post('address', TRUE),
              'contact_number'  => $this->input->post('contact_no', TRUE),
              'email_address'   => $this->input->post('email_address', TRUE),
              'updated_on'      => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $uid);
          $this->db->update('users_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function update_acct()
      {
          $this->db->trans_start();
          $uid  = $this->session->id;
          $data = array(
              'username'           => $this->input->post('username', TRUE),
              'password'           => md5($this->input->post('confirm_password', TRUE)),
              'updated_on'         => date('Y-m-d H:i:s')
          );
          $this->db->where('id', $uid);
          $this->db->update('users_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      
      public function get_data($table){
          $this->db->select('*');
          $this->db->from($table);
          $query = $this->db->get();
          return $query->result();
      }



      public function getAffectedRows()
      {
          return $this->db->affected_rows();
      }
  }
?>