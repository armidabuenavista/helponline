<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_help extends CI_Model {

function __construct() {
parent::__construct();
}

    
public function setBatchImport($batchImport) {
    $this->_batchImport = $batchImport;
}

// save data
public function importData() {
    $data = $this->_batchImport;
    $this->db->insert_batch('tbl_ptri_baseline', $data);
}
    
// get employee list
public function employeeList() {
    $this->db->select(array(
'e.lname',
'e.fname',
'e.mname',
'e.email',
'e.gender',
'e.birthdate',
'e.institution',
'e.weight',
'e.height',
'e.body_fat',
'e.pa',
'e.feet',
'e.inches',
'e.pounds',
'e.bmi',
'e.classification',
'e.dbw',
'e.ll_dbw',
'e.ul_dbw',
'e.energy',
'e.date',
    ));
    $this->db->from('tbl_ptri_baseline as e');
    $query = $this->db->get();
    return $query->result_array();
}
    
function get_feedback(){
    
$this->db->select('*');
$this->db->from('tbl_feedbackform');
$query = $this->db->get();
return $query->result();
    
}  
    
function get_history(){
    
$this->db->select('*');
$this->db->from('tbl_help_puzzle');
$this->db->order_by('grp_stat','asc');
$query = $this->db->get();
return $query->result();
    
}
    
function get_record($stat_grp){
    
$this->db->select('*');
$this->db->from('tbl_help_puzzle');
$this->db->where('grp_stat',$stat_grp);
$query = $this->db->get();
return $query->result();
    
}
    
function check_user($email){
    
$this->db->select('*');
$this->db->from('users_db');
$this->db->where('email_address',$email);
$query = $this->db->get();
return $query->result();
    
}
    
    
function get_ptri($data1,$data2,$data3){
    
    $query = $this->db->query("SELECT * FROM tbl_ptri_baseline WHERE email='".$data3."' AND lname='".$data1."' OR fname='".$data2."';");
    return $query->result();
    
}
    
function get_ptri_assess($data1,$data2,$data3){
    
    $query = $this->db->query("SELECT * FROM tbl_ptri_baseline WHERE email='".$data3."' AND lname='".$data1."' OR fname='".$data2."' ORDER BY date DESC LIMIT 2;");
    return $query->result();
    
}
    
function get_ptri_graph($data1,$data2,$data3){
    
    $query = $this->db->query("SELECT * FROM tbl_ptri_baseline WHERE email='".$data3."' AND lname='".$data1."' OR fname='".$data2."';");
    return $query->result();
    
}
    
function get_ptri_admin(){
    
$this->db->select('*');
$this->db->from('tbl_ptri_baseline');
$query = $this->db->get();
return $query->result();

}
    
function get_survey1(){
    
$this->db->select('*');
$this->db->from('tbl_survey1');
$query = $this->db->get();
return $query->result();

}

function get_survey2(){
    
$this->db->select('*');
$this->db->from('tbl_survey2');
$query = $this->db->get();
return $query->result();

}
    
function get_ptri_config(){
    
$this->db->select('*');
$this->db->from('tbl_ptri_config');
$this->db->where('id','1');
$query = $this->db->get();
return $query->result();

}
    
function get_home_data(){
  
$this->db->select('*');
$this->db->from('tbl_home');
$query = $this->db->get();
return $query->result();
    
}
    
function get_tracker_data(){
  
$this->db->select('*');
$this->db->from('tbl_tracker');
$query = $this->db->get();
return $query->result();
    
}
    
function get_tools_data(){
  
$this->db->select('*');
$this->db->from('tbl_tools');
$query = $this->db->get();
return $query->result();
    
}
    
function get_ptri_edit($id){
      
$this->db->select('*');
$this->db->from('tbl_ptri_baseline');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
  
}
    
function get_ptri_count($data1,$data2,$data3){
      
    $query = $this->db->query("SELECT * FROM tbl_ptri_baseline WHERE email='".$data3."' AND lname='".$data1."' OR fname='".$data2."';");
    return $query->result();
  
}
         
      public function get_data($table){
          $this->db->select('*');
          $this->db->from($table);
          $query = $this->db->get();
          return $query->result();
      }
    
function get_fel_intro(){
  
$this->db->select('*');
$this->db->from('tbl_fel_intro');
$query = $this->db->get();
return $query->result();
    
}

function get_pingang_pinoy_intro(){
  
$this->db->select('*');
$this->db->from('tbl_pingang_pinoy_intro');
$query = $this->db->get();
return $query->result();
    
}
   
function get_faq_main(){
  
$this->db->select('*');
$this->db->from('tbl_faq_main');
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_cat(){
  
$this->db->select('*');
$this->db->from('tbl_list');
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_cat_by_id($id){
  
$this->db->select('*');
$this->db->from('tbl_list');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_app_true(){
  
$this->db->select('*');
$this->db->from('tbl_true_app');
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_app_sub(){
  
$this->db->select('*');
$this->db->from('tbl_fel_app');
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_app_true_id($id){
  
$this->db->select('*');
$this->db->from('tbl_true_app');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_app_sub_id($id){
  
$this->db->select('*');
$this->db->from('tbl_fel_app');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_content(){
  
$this->db->select('*');
$this->db->from('tbl_image_lib');
$query = $this->db->get();
return $query->result();
    
}
 
function get_fel_content_update_all(){
  
    $query = $this->db->query("SELECT * FROM tbl_image_lib ORDER BY list_id;");
    return $query->result();
    
}
    
function get_fel_content_update_sub_all(){
  
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub;");
    return $query->result();
    
}
    
function get_fel_content_update($seg){
  
if($seg==1){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '1';");
    return $query->result();
}elseif($seg==2){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '2';");
    return $query->result();
}elseif($seg==3){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '3';");
    return $query->result();
}elseif($seg==4){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '4' or list_id = '5' or list_id = '6';");
    return $query->result();
}elseif($seg==5){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '7' or list_id = '8' or list_id = '9' or list_id = '10';");
    return $query->result();
}elseif($seg==6){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '11'");
    return $query->result();
}elseif($seg==7){
    $query = $this->db->query("SELECT * FROM tbl_image_lib WHERE list_id = '12'");
    return $query->result();
}
    
}
    
function get_fel_content_update_sub($seg){
  
    
if($seg==1){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '1';");
    return $query->result();
}elseif($seg==2){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '2';");
    return $query->result();
}elseif($seg==3){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '3';");
    return $query->result();
}elseif($seg==4){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '4' or true_serve = '5' or true_serve = '6';");
    return $query->result();
}elseif($seg==5){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '7' or true_serve = '8' or true_serve = '9' or true_serve = '10';");
    return $query->result();
}elseif($seg==6){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '11'");
    return $query->result();
}elseif($seg==7){
    $query = $this->db->query("SELECT * FROM tbl_fel_content_sub WHERE true_serve = '12'");
    return $query->result();
}
    
}
    
function get_fel_content_sub(){
  
$this->db->select('*');
$this->db->from('tbl_fel_content_sub');
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_content_id($id){
  
$this->db->select('*');
$this->db->from('tbl_image_lib');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
    
}
    
function get_fel_content_sub_id($id){
  
$this->db->select('*');
$this->db->from('tbl_fel_content_sub');
$this->db->where('id',$id);
$query = $this->db->get();
return $query->result();
    
}
    
function get_ufct(){
  
$this->db->select('*');
$this->db->from('ufct');
$query = $this->db->get();
return $query->result();
    
}
    
function get_counseling(){
  
$this->db->select('*');
$this->db->from('tbl_counseling');
$query = $this->db->get();
return $query->result();
    
}
    
}

//6ef59fb2a8fa9b10c8a0c9410725b11a
//e0eb1941a48f23ea9c3bdd79cd817680
