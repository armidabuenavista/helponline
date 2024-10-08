<?php
  class Help_model extends CI_Model
  {
      
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Ensure the database is loaded
    }
      
      
      
      public function get_brochures()
      {
          $query = $this->db->query('SELECT * FROM brochures_db');
          return $query->result();
      }
      public function get_infographics()
      {
          $query = $this->db->query('SELECT * FROM infographics_db');
          return $query->result();
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

      public function get_acct_details($uid)
      {
          $sql   = "SELECT users_db.username,users_db.password FROM users_db  WHERE users_db.id= ? ";
          $query = $this->db->query($sql, array(
              $uid
          ));
          return $query->result();
      }
      public function get_email_address($email_address)
      {
          $sql   = "SELECT users_db.id,users_db.lname,users_db.fname,users_db.mname,users_db.email_address FROM users_db  WHERE users_db.email_address= ? ";
          $query = $this->db->query($sql, array(
              $email_address
          ));
          return $query->result();
      }
      public function get_client_photo($id)
      {
          $sql   = "SELECT photo FROM photos_db WHERE id=?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      }
      public function save_count($page_url)
      {
          $this->db->trans_start();
          $uid = $this->session->id;
          if (isset($uid)) {
              $uid = $this->session->id;
          } else {
              $uid = 'NULL';
          }
         
          $data      = array(
              'user'        => $uid,
              'access_date' => date('Y-m-d H:i:s'),
              'ip'          => $this->input->ip_address(),
             //'module_id'   => $module_id,
              'page'        => $page_url
          );
          $this->db->insert('logs_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
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
      public function get_bmi_range_id($yrs, $mos, $gender)
      {
          $sql   = "SELECT * FROM bmi_age_range_db WHERE year = ? AND month= ? AND gender_id=?";
          $query = $this->db->query($sql, array(
              $yrs,
              $mos,
              $gender
          ));
          return $query->result();
      }
      public function get_bmi_range_db($bmi, $bmi1, $age_range_id)
      {
          $sql   = "SELECT bmi_age_range_db.year,bmi_age_range_db.month,bmi_range_db.bmi_range,bmi_db.bmi,bmi_db.bmi_indicator,bmi_db.font_color,bmi_range_db.bmi_photo FROM bmi_range_db INNER JOIN bmi_db ON bmi_db.id= bmi_range_db.bmi_id INNER JOIN bmi_age_range_db ON bmi_age_range_db.id= bmi_range_db.age_range_id WHERE bmi_range BETWEEN ? AND ?  AND  age_range_id=? ";
          $query = $this->db->query($sql, array(
              $bmi,
              $bmi1,
              $age_range_id
          ));
          return $query->result();
      }
      public function get_low_bmi_range_db($age_range_id)
      {
          $sql   = "SELECT bmi_age_range_db.year,bmi_age_range_db.month,bmi_range_db.bmi_range,bmi_db.bmi,bmi_db.bmi_indicator,bmi_db.font_color,bmi_range_db.bmi_photo FROM bmi_range_db INNER JOIN bmi_db ON bmi_db.id= bmi_range_db.bmi_id INNER JOIN bmi_age_range_db ON bmi_age_range_db.id= bmi_range_db.age_range_id WHERE  age_range_id=? ORDER BY bmi_age_range_db.id ASC LIMIT 1 ";
          $query = $this->db->query($sql, array(
              $age_range_id
          ));
          return $query->result();
      }
      public function get_high_bmi_range_db($age_range_id)
      {
          $sql   = "SELECT bmi_age_range_db.year,bmi_age_range_db.month,bmi_range_db.bmi_range,bmi_db.bmi,bmi_db.bmi_indicator,bmi_db.font_color,bmi_range_db.bmi_photo FROM bmi_range_db INNER JOIN bmi_db ON bmi_db.id= bmi_range_db.bmi_id INNER JOIN bmi_age_range_db ON bmi_age_range_db.id= bmi_range_db.age_range_id WHERE  age_range_id=? ORDER BY bmi_age_range_db.id DESC LIMIT 1  ";
          $query = $this->db->query($sql, array(
              $age_range_id
          ));
          return $query->result();
      }
      public function get_dbw_range_id($yrs, $mos, $gender)
      {
          $sql   = "SELECT * FROM dbw_age_range_db WHERE year = ? AND month= ? AND gender_id=?";
          $query = $this->db->query($sql, array(
              $yrs,
              $mos,
              $gender
          ));
          return $query->result();
      }
      public function get_low_dbw_range_db($age_range_id)
      {
          $sql   = "SELECT * FROM dbw_wt_range_db INNER JOIN bmi_db ON bmi_db.id= dbw_wt_range_db.bmi_id WHERE  age_range_id='$age_range_id' AND bmi_id= 2 ORDER BY dbw_wt_range_db.id ASC LIMIT 1 ";
          $query = $this->db->query($sql, array(
              $age_range_id
          ));
          return $query->result();
      }
      public function get_high_dbw_range_db($age_range_id)
      {
          $sql   = "SELECT * FROM dbw_wt_range_db INNER JOIN bmi_db ON bmi_db.id= dbw_wt_range_db.bmi_id WHERE  age_range_id='$age_range_id'  AND bmi_id= 2 ORDER BY dbw_wt_range_db.id DESC LIMIT 1 ";
          $query = $this->db->query($sql, array(
              $age_range_id
          ));
          return $query->result();
      }
      public function get_gestation($gestation_wks, $ht)
      {
          $sql   = "SELECT * FROM gestation_db WHERE week='$gestation_wks' AND height='$ht' ";
          $query = $this->db->query($sql, array(
              $gestation_wks,
              $ht
          ));
          return $query->result();
      }
      public function get_age_group($age_group, $gender)
      {
          $sql   = "SELECT * FROM reni_age_range WHERE age_group= '$age_group' AND gender_id='$gender'";
          $query = $this->db->query($sql, array(
              $age_group,
              $gender
          ));
          return $query->result();
      }
      public function get_age_group1()
      {
          $query = $this->db->query('SELECT * FROM reni_age_group WHERE id != 8 AND id != 9');
          return $query->result();
      }
      public function get_age_group2()
      {
          $query = $this->db->query('SELECT * FROM reni_age_group');
          return $query->result();
      }
      public function getGender()
      {
          $query = $this->db->query('SELECT * FROM gender_db');
          return $query->result();
      }


      public function get_pdri()
      {
          $query = $this->db->query('SELECT * FROM pdri_nutrients_db WHERE general != 0 ');
          return $query->result();
      }

      public function get_pdri_nutrients($item)
      {
          $sql   = "SELECT * FROM pdri_nutrients_db WHERE id=?";
          $query = $this->db->query($sql, array(
              $item
          ));
          return $query->result();
      }


      public function make_captcha()
      {
          $this->load->helper('captcha');
          $vals = array(
              'img_path'    => './assets/images/captcha/',
              'img_url'     => base_url() . 'assets/images/captcha/',
              'img_width'   => 200,
              'img_height'  => 100,
              'font_path'   => './system/fonts/texb.ttf',
              'expiration'  => 3600
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
      public function save_comment()
      {
          $this->db->trans_start();
          $data = array(
              'name'          => $this->input->post('name', TRUE),
              'email_address' => $this->input->post('email_address', TRUE),
              'subject'       => $this->input->post('subject', TRUE),
              'message'       => $this->input->post('message', TRUE),
              'submitted_on'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('comments_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function save_user()
      {
          $this->db->trans_start();
          $user_type_id = 3;
         
          $data         = array(
              'lname'           => $this->input->post('lname', TRUE),
              'fname'           => $this->input->post('fname', TRUE),
              'mname'           => $this->input->post('mname', TRUE),
              'gender'          => $this->input->post('gender', TRUE),
              'birthday'        => $this->input->post('birthday', TRUE),
              'email_address'   => $this->input->post('email_address', TRUE),
              'address'         => $this->input->post('address', TRUE),
              'contact_number'  => $this->input->post('contact_no', TRUE),
              'username'        => $this->input->post('username', TRUE),
              'password'        => md5($this->input->post('password', TRUE)),
              'user_type_id'    => $user_type_id,
              'submitted_on'    => date('Y-m-d H:i:s')
          );
          $this->db->insert('users_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
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
      public function save_photo()
      {
          $this->db->trans_start();
          $config['upload_path']   = './assets/images/client_photos/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['remove_spaces'] = TRUE;
          $a                       = $_FILES['file']['name'];
          $b                       = preg_replace("/\s+/", "_", $a);
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('picture')) {
              $file_info = $this->upload->data();
              $file_name = $file_info['file_name'];
              $picture   = $file_name;
          } else {
              $picture = 'no_photo.png';
          }
          $data = array(
              'client_id' => $this->session->id,
              'photo' => $picture
          );
          $this->db->insert('photos_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }


       public function update_photo()
      {
          $this->db->trans_start();
          $uid= $this->session->id;
          $photo_id = $this->input->post('photo_id', TRUE);
          $data    = array(
              'photo' => $this->input->post('photo_id', TRUE)
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

      public function delete_photo($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('photos_db');
          return true;
      }
      public function get_all_rnd_email_address()
      {
          $sql   = "SELECT email_address FROM users_db WHERE user_type_id != 3";
          $query = $this->db->query($sql);
          return $query->result();
      }
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
      public function check_rnd_sched_time($datepick, $timepick1, $timepick2, $event_type_id)
      {
          $sql   = "SELECT approved_date,approved_time_from,approved_time_to FROM rnd_sched_db WHERE approved_date=? AND
        ? BETWEEN approved_time_from AND approved_time_to AND ?
         BETWEEN approved_time_from AND approved_time_to AND event_type_id=?";
          $query = $this->db->query($sql, array(
              $datepick,
              $timepick1,
              $timepick2,
              $event_type_id
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
      public function get_photos_db($uid)
      {
          $query  = " SELECT * FROM photos_db WHERE client_id=?";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function get_pa_tracker($perday)
      {
          $sql   = "SELECT  pa_tracker_db.id,pa_tracker_db.pa_code,pa_tracker_db.time,pa_tracker_db.duration,pa_tracker_db.pa_cal,pa_db.activity,pa_tracker_db.submitted_on,pa_tracker_db.entry_date FROM pa_tracker_db  INNER JOIN pa_db ON pa_tracker_db.pa_code = pa_db.pa_code WHERE entry_date= ? ORDER BY pa_tracker_db.time ASC";
          $query = $this->db->query($sql, array(
              $perday
          ));
          return $query->result();
      }
      public function get_pa_db($pa)
      {
          $this->db->select('activity,pa_code,mets');
          $this->db->from('pa_db');
          $this->db->like('activity', $pa);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
      }
      public function get_body_stats_db($uid)
      {
          $this->db->select('*');
          $this->db->from('body_stats_db');
          $this->db->where('client_id', $uid);
          $this->db->order_by('submitted_on', 'desc');
          $this->db->limit('1');
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
      }
     
      public function get_all_body_stats_db($uid)
      {
          $query  = " SELECT *,body_stats_db.submitted_on as a,body_stats_db.id as b  FROM body_stats_db INNER JOIN users_db ON users_db.id= body_stats_db.client_id WHERE body_stats_db.client_id= ? ORDER BY a DESC";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function save_pa()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'     => $this->session->id,
              'pa_code'       => $this->input->post('pa_code', TRUE),
              'time'          => $this->input->post('time', TRUE),
              'duration'      => $this->input->post('duration', TRUE),
              'pa_cal'        => $this->input->post('pa_cal', TRUE),
              'entry_date'    => $this->input->post('entrydate', TRUE),
              'submitted_on'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('pa_tracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function update_pa()
      {
          $this->db->trans_start();
          $id   = $this->input->post('rowid', TRUE);
          $data = array(
              'pa_code'   => $this->input->post('pa_code1', TRUE),
              'time'      => $this->input->post('time1', TRUE),
              'duration'  => $this->input->post('duration1', TRUE),
              'pa_cal'    => $this->input->post('pa_cal1', TRUE)
          );
          $this->db->where('id', $id);
          $this->db->update('pa_tracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function delete_pa($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('pa_tracker_db');
          return true;
      }
      public function get_pa_id($pa_id)
      {
          $sql   = "SELECT  pa_tracker_db.id,pa_tracker_db.pa_code,pa_db.activity,pa_db.mets,pa_tracker_db.time,pa_tracker_db.duration,pa_tracker_db.pa_cal,pa_tracker_db.submitted_on FROM pa_tracker_db INNER JOIN pa_db ON pa_tracker_db.pa_code= pa_db.pa_code   WHERE pa_tracker_db.id =?";
          $query = $this->db->query($sql, array(
              $pa_id
          ));
          return $query->result();
      }
      public function get_meal()
      {
          $query  = " SELECT t1.id, t1.meal_name
            FROM meals_db t1
           ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_menu($meal_id, $uid, $entry_date)
      {
          $sql   = "SELECT id,menu_name FROM menu_tracker_db WHERE  meal_id=? AND client_id=? AND entry_date=?";
          $query = $this->db->query($sql, array(
              $meal_id,
              $uid,
              $entry_date
          ));
          return $query->result();
      }
      public function get_food($menu_id, $meal_id, $uid, $entry_date)
      {
          $sql   = "SELECT  *,foodtracker_db.id, foodtracker_db.fat,cooking_method_db.cooking_method,cf_db.conversion_factor,foodunits_db.foodunit FROM foodtracker_db INNER JOIN fct ON foodtracker_db.fooditem_code= fct.foodcode LEFT JOIN cooking_method_db ON fct.cooking_method = cooking_method_db.id LEFT JOIN cf_db ON fct.conversion_factor = cf_db.id INNER JOIN foodunits_db ON foodunits_db.id = foodtracker_db.hh_m   WHERE   foodtracker_db.menu_id= ? AND foodtracker_db.meal_id= ? AND foodtracker_db.client_id=? AND  foodtracker_db.entry_date= ? ";
          $query = $this->db->query($sql, array(
              $menu_id,
              $meal_id,
              $uid,
              $entry_date
          ));
          return $query->result();
      }
      public function get_fooditem($fooditem)
      {
          $this->db->select('foodcode,food_name,alt_name,ep,energy,chocdf,protein,fatce');
          $this->db->from('fct');
          $this->db->like('food_name', $fooditem);
          //$this->db->limit('20');
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
      }
      
      public function get_foodgroup(){
         $sql = "Select * from foodgroups_th_db";
         $query = $this->db->query($sql);
         return $query->result();
      }
      public function get_fooditem_alt_name($fooditem)
      {
          $this->db->select('foodcode,food_name,alt_name,ep,energy,chocdf,protein,fatce');
          $this->db->from('fct');
          $this->db->like('alt_name', $fooditem);
          //$this->db->limit('20');
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
      }
      public function get_hh_m()
      {
          $query  = "SELECT id,foodunit FROM foodunits_db ";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function save_food()
      {
          $this->db->trans_start();
          $config['upload_path']   = './assets/images/meal_photos/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['remove_spaces'] = TRUE;
          $a                       = $_FILES['file']['name'];
          $b                       = preg_replace("/\s+/", "_", $a);
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('file')) {
              $file_info = $this->upload->data();
              $file_name = $file_info['file_name'];
              $picture   = $file_name;
          } else {
              $picture = 'no_photo.png';
          }
          $data = array(
              'client_id'     => $this->session->id,
              'menu_id'       => $this->input->get('menu_id', TRUE),
              'meal_id'       => $this->input->get('meal_id', TRUE),
              'fooditem_code' => $this->input->get('fic', TRUE),
              'hh_val'        => $this->input->get('hh_val', TRUE),
              'hh_m'          => $this->input->get('hh_m', TRUE),
              'ep_wt'         => $this->input->get('ep_wt', TRUE),
              'cal'           => $this->input->get('comp_cal', TRUE),
              'cho'           => $this->input->get('comp_cho', TRUE),
              'pro'           => $this->input->get('comp_pro', TRUE),
              'fat'           => $this->input->get('comp_fat', TRUE),
              'image'         => $picture,
              'entry_date'    => $this->input->get('entry_date', TRUE),
              'submitted_on'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('foodtracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function save_menu()
      {
          $this->db->trans_start();
          $data = array(
              'menu_name'     => $this->input->post('menu_name', TRUE),
              'client_id'     => $this->session->id,
              'meal_id'       => $this->input->post('value', TRUE),
              'entry_date'    => $this->input->post('entry_date', TRUE),
              'submitted_on'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('menu_tracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function get_menu_id($menu_id)
      {
          $sql   = "SELECT id,menu_name FROM menu_tracker_db WHERE  id=?";
          $query = $this->db->query($sql, array(
              $menu_id
          ));
          return $query->result();
      }
      public function update_menu()
      {
          $this->db->trans_start();
          $menu_id = $this->input->post('menu_id', TRUE);
          $data    = array(
              'menu_name' => $this->input->post('menu_name', TRUE)
          );
          $this->db->where('id', $menu_id);
          $this->db->update('menu_tracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function delete_menu($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('menu_tracker_db');
         // $this->db->where('menu_id', $id);
         // $this->db->delete('foodtracker_db');
          return true;
      }
      public function get_food_id($id)
      {
          $sql   = "SELECT  foodtracker_db.id,foodtracker_db.menu_id,foodtracker_db.meal_id,fct.food_name,foodtracker_db.fooditem_code,foodtracker_db.hh_val,foodtracker_db.hh_m,foodtracker_db.ep_wt,foodtracker_db.cal,foodtracker_db.cho,foodtracker_db.pro,foodtracker_db.fat,foodtracker_db.image,fct.ep as ep_wt_val,fct.energy,fct.chocdf,fct.protein,fct.fatce FROM foodtracker_db INNER JOIN fct ON foodtracker_db.fooditem_code= fct.foodcode  WHERE foodtracker_db.id =?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      }
      public function update_food()
      {
          $this->db->trans_start();
          $id = $this->input->get('rowid', TRUE);
          if (!empty($_FILES['file']['name']) && $_FILES['file']['name'] != $this->input->get('image1')) {
              $config['upload_path']   = './assets/images/meal_photos/';
              $config['allowed_types'] = 'jpg|jpeg|png|gif';
              $config['file_name']     = $_FILES['file']['name'];
              $this->load->library('upload', $config);
              $this->upload->initialize($config);
              if ($this->upload->do_upload('file')) {
                  $uploadData = $this->upload->data();
                  $picture    = $_FILES['file']['name'];
              } else {
                  $picture = 'no_photo.png';
              }
          } else {
              $picture = $this->input->get('image1');
          }
          $data = array(
              'fooditem_code' => $this->input->get('fic1', TRUE),
              'hh_val'        => $this->input->get('hh_val1', TRUE),
              'hh_m'          => $this->input->get('hh_m1', TRUE),
              'ep_wt'         => $this->input->get('ep_wt1', TRUE),
              'cal'           => $this->input->get('comp_cal1', TRUE),
              'cho'           => $this->input->get('comp_cho1', TRUE),
              'pro'           => $this->input->post('menu_name', TRUE),
              'fat'           => $this->input->get('comp_fat1', TRUE),
              'image'         => $picture
          );
          $this->db->where('id', $id);
          $this->db->update('foodtracker_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function get_meal_photo($id)
      {
          $sql   = "SELECT image FROM foodtracker_db WHERE id=?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      }
      public function delete_food($where,$id)
      {
          $this->db->where($where, $id);
          $this->db->delete('foodtracker_db');
          return true;
      }
      public function menu($menu_id)
      {
          $sql   = "SELECT menu_name,client_id,meal_id,entry_date FROM menu_tracker_db WHERE id=?";
          $query = $this->db->query($sql, array(
              $menu_id
          ));
          return $query->result();
      }
      public function meal($menu_id)
      {
          $sql   = "SELECT client_id,menu_id,meal_id,fooditem_code,hh_val,hh_m,ep_wt,cal,cho,pro,fat,image,entry_date FROM foodtracker_db WHERE menu_id=?";
          $query = $this->db->query($sql, array(
              $menu_id
          ));
          return $query->result();
      }
      public function get_last_menu_id()
      {
          $query  = "SELECT id FROM menu_tracker_db  ORDER BY id DESC LIMIT 1";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function get_food_entry_dates($uid)
      {
          $query  = "SELECT DISTINCT(entry_date) FROM foodtracker_db WHERE client_id = ? ";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function compare_pa($item)
      {
          $query  = "SELECT  pa_tracker_db.id,pa_tracker_db.pa_code,pa_tracker_db.time,pa_tracker_db.duration,pa_tracker_db.pa_cal,pa_db.activity FROM pa_tracker_db  INNER JOIN pa_db ON pa_tracker_db.pa_code = pa_db.pa_code WHERE  entry_date= ?";
          $result = $this->db->query($query, array(
              $item
          ));
          return $result->result();
      }
      public function get_pa_entry_dates($uid)
      {
          $query  = "SELECT DISTINCT(entry_date) FROM pa_tracker_db WHERE client_id = ? ";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function get_pa_food_entry_dates($uid)
      {
          $query  = "SELECT DISTINCT (pa_tracker_db.entry_date) FROM pa_tracker_db INNER JOIN foodtracker_db ON foodtracker_db.client_id = pa_tracker_db.client_id WHERE pa_tracker_db.client_id = ? ";
          $result = $this->db->query($query, array(
              $uid
          ));
          return $result->result();
      }
      public function compare_pa_food($entry_date)
      {
          $query  = "SELECT * FROM pa_tracker_db INNER JOIN foodtracker_db ON foodtracker_db.client_id = pa_tracker_db.client_id WHERE pa_tracker_db.entry_date = ?";
          $result = $this->db->query($query, array(
              $entry_date
          ));
          return $result->result();
      }
      public function save_body_stats()
      {
          $this->db->trans_start();
          $data = array(
              'client_id'             => $this->session->id,
              'weight'                => $this->input->post('wt', TRUE),
              'weight_unit'           => $this->input->post('wt_opt', TRUE),
              'height'                => $this->input->post('ht', TRUE),
              'bmi'                   => $this->input->post('bmi', TRUE),
              'bmr'                   => $this->input->post('bmr', TRUE),
              'bmi_classification'    => $this->input->post('bmi_class', TRUE),
              'dbw'                   => $this->input->post('dbw', TRUE),
              'lwr_lmt'               => $this->input->post('lower_lmt', TRUE),
              'uppr_lmt'              => $this->input->post('upper_lmt', TRUE),
              'waist_c'               => $this->input->post('wc', TRUE),
              'waist_unit'            => $this->input->post('wc_opt', TRUE),
              'risk_indicator'        => $this->input->post('risk_indicator', TRUE),
              'hip_c'                 => $this->input->post('hc', TRUE),
              'hip_unit'              => $this->input->post('hc_opt', TRUE),
              'whipr'                 => $this->input->post('whipr', TRUE),
              'whipr_classification'  => $this->input->post('whipr_class', TRUE),
              'whtr'                  => $this->input->post('whtr', TRUE),
              'whtr_classification'   => $this->input->post('whtr_class', TRUE),
              'pa_lvl_id'             => $this->input->post('pa_lvl', TRUE),
              'cal'                   => $this->input->post('cal', TRUE),
              'cho'                   => $this->input->post('cho', TRUE),
              'protein'               => $this->input->post('protein', TRUE),
              'fat'                   => $this->input->post('fat', TRUE),
              'pregnant'              => $this->input->post('ask_pregnant', TRUE),
              'gestation'             => $this->input->post('ask_gestation', TRUE),
              'last_mens_date'        => $this->input->post('mens_date', TRUE),
              'gestational_weeks'     => $this->input->post('gestation_wks', TRUE),
              'lactation'             => $this->input->post('ask_lactation', TRUE),
              'submitted_on'          => date('Y-m-d H:i:s')
          );
          $this->db->insert('body_stats_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

       public function update_body_stats()
      {
          $this->db->trans_start();
          $id = $this->input->post('id', TRUE);
          $data = array(
              //'client_id'             => $this->session->id,
              'weight'                => $this->input->post('wt', TRUE),
              'weight_unit'           => $this->input->post('wt_opt', TRUE),
              'height'                => $this->input->post('ht', TRUE),
              'bmi'                   => $this->input->post('bmi', TRUE),
              'bmr'                   => $this->input->post('bmr', TRUE),
              'bmi_classification'    => $this->input->post('bmi_class', TRUE),
              'dbw'                   => $this->input->post('dbw', TRUE),
              'lwr_lmt'               => $this->input->post('lower_lmt', TRUE),
              'uppr_lmt'              => $this->input->post('upper_lmt', TRUE),
              'waist_c'               => $this->input->post('wc', TRUE),
              'waist_unit'            => $this->input->post('wc_opt', TRUE),
              'risk_indicator'        => $this->input->post('risk_indicator', TRUE),
              'hip_c'                 => $this->input->post('hc', TRUE),
              'hip_unit'              => $this->input->post('hc_opt', TRUE),
              'whipr'                 => $this->input->post('whipr', TRUE),
              'whipr_classification'  => $this->input->post('whipr_class', TRUE),
              'whtr'                  => $this->input->post('whtr', TRUE),
              'whtr_classification'   => $this->input->post('whtr_class', TRUE),
              'pa_lvl_id'             => $this->input->post('pa_lvl', TRUE),
              'cal'                   => $this->input->post('cal', TRUE),
              'cho'                   => $this->input->post('cho', TRUE),
              'protein'               => $this->input->post('protein', TRUE),
              'fat'                   => $this->input->post('fat', TRUE),
              'pregnant'              => $this->input->post('ask_pregnant', TRUE),
              'gestation'             => $this->input->post('ask_gestation', TRUE),
              'last_mens_date'        => $this->input->post('mens_date', TRUE),
              'gestational_weeks'     => $this->input->post('gestation_wks', TRUE),
              'lactation'             => $this->input->post('ask_lactation', TRUE),
              //'submitted_on'          => date('Y-m-d H:i:s')
          );
           $this->db->where('id', $id);
          $this->db->update('body_stats_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }

      public function delete_body_stats($id)
      {
          $this->db->where('id', $id);
          $this->db->delete('body_stats_db');
          return true;
      }
      public function get_body_stats_id($id)
      {
          $sql   = "SELECT  * FROM body_stats_db    WHERE id =?";
          $query = $this->db->query($sql, array(
              $id
          ));
          return $query->result();
      }
      public function get_events($event_date)
      {
          $query  = "SELECT event_type_id,custom_event_type,approved_date,whole_day, approved_time_from,approved_time_to,all_rnd,event_type_db.event_type,users_db.lname,users_db.mname,users_db.fname FROM rnd_sched_db INNER JOIN event_type_db ON event_type_db.id=rnd_sched_db.event_type_id LEFT JOIN users_db ON users_db.id= rnd_sched_db.assigned_rnd_id  WHERE approved_date=? ORDER BY approved_date";
          $result = $this->db->query($query, array(
              $event_date
          ));
          return $result->result();
      }
      public function upcoming_events()
      {
          $query  = "SELECT event_type_id,custom_event_type,approved_date,whole_day, approved_time_from,approved_time_to,all_rnd,event_type_db.event_type,users_db.lname,users_db.mname,users_db.fname FROM rnd_sched_db INNER JOIN event_type_db ON event_type_db.id=rnd_sched_db.event_type_id LEFT JOIN users_db ON users_db.id= rnd_sched_db.assigned_rnd_id WHERE MONTH(approved_date)=? ORDER BY approved_date";
          $result = $this->db->query($query, array(
              $thismonth
          ));
          return $result->result();
      }
      public function get_event_dates()
      {
          $query  = "SELECT DISTINCT(approved_date),whole_day,all_rnd FROM rnd_sched_db";
          $result = $this->db->query($query);
          return $result->result();
      }
      public function save_request()
      {
          $this->db->trans_start();
          $timepick1 = $this->input->post('timepick1', TRUE);
          $timepick2 = $this->input->post('timepick2', TRUE);
          $whole_day = $this->input->post('whole_day', TRUE);
          if ($whole_day == 1) {
              $timepick1 = '08:00:00';
              $timepick2 = '17:00:00';
          } else {
              $timepick1 = date("H:i:s", strtotime($timepick1));
              $timepick2 = date("H:i:s", strtotime($timepick2));
          }
          $status = 2;
          $data   = array(
              'client_id'         => $this->session->id,
              'event_type_id'     => $this->input->post('type', TRUE),
              'request_date'      => $this->input->post('datepick', TRUE),
              'whole_day'         => $this->input->post('whole_day', TRUE),
              'time_from'         => $timepick1,
              'time_to'           => $timepick2,
              'status_id'         => $status,
              'message'           => $this->input->post('message', TRUE),
              'submitted_on'      => date('Y-m-d H:i:s')
          );
          $this->db->insert('ncs_requests_db', $data);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) {
              return false;
          } else {
              return true;
          }
      }
      public function getAffectedRows()
      {
          return $this->db->affected_rows();
      }
      
  }
?>