<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Library extends MX_Controller{

function index(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'access';
      $this->load->module('template');
      $this->template->help_site($data); 

}
    //Anti-Theft Backpack With USB Charge Port double shoulder pack Large Capacity Waterproof Nylon laptop Computer Bag USB Rechargeable Sport rucksack Concealed Zippers - int (Grey)  
    //http://fb.me/msg/RandRWatches/
    
function history_main(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'history_main';
      $this->load->module('template');
      $this->template->help_site($data); 

}
    
    
function history_add_process(){
$title = $this->input->post('title');
$description = $this->input->post('description');
$category = $this->input->post('category');

if($category=="0"){
    $data['module'] = 'help_admin';
    $data['view_file'] = 'cat';
    $data['js']="";
    $this->load->module('template');
    $this->template->help_site($data); 
}else{
    $add_data=array('name'=>$title,'facts'=>$description,'grp_stat'=>$category);
    $this->db->insert('tbl_help_puzzle',$add_data);
    
    $data['module'] = 'help_admin';
    $data['view_file'] = 'history_main';
    $data['js']="";
    $this->load->module('template');
    $this->template->help_site($data); 
}
     
}
    
function history_edit_process(){
    $title = $this->input->post('title');
    $description = $this->input->post('description');
    $category = $this->input->post('category');

    
    if($category=="0"){
        $data['module'] = 'help_admin';
        $data['view_file'] = 'cat';
        $data['js']="";
        $this->load->module('template');
        $this->template->help_site($data); 
    }else{
        $edit_data=array('name'=>$title,'facts'=>$description,'grp_stat'=>$category);
        $seg=$this->uri->segment(4, 0);
        $this->db->where ('id',$seg);
        $this->db->update('tbl_help_puzzle',$edit_data);

        $data['module'] = 'help_admin';
        $data['view_file'] = 'history_update';
        $data['js']="";
        $this->load->module('template');
        $this->template->help_site($data);  
    }
     
}
    
function history_delete_process(){
    
    $this->db->where ('id',$this->uri->segment(4));
    $this->db->delete('tbl_help_puzzle');

    $data['module'] = 'help_admin';
    $data['view_file'] = 'history_main';
    $data['js']="";
    $this->load->module('template');
    $this->template->help_site($data);  
}
    
function access_verify(){

    $data1=$this->input->post('access_code',TRUE);
    $data2=$this->input->post('password',TRUE);
    
    //$this->load->model('mdl_adoptors', '', TRUE);
    //$user_access = $this->mdl_adoptors->user_access_sub($data1,$data1);
    $this->db->select('*');
    $this->db->from("admin_help");
    $this->db->where('user',$data1);
    $this->db->where('pass',$data2);   
    $query = $this->db->get();
    
    if($query->num_rows() != 0){
        $data['module'] = 'help_admin';
        $data['view_file'] = 'history_main';
        $data['js']="";
        $this->load->module('template');
        $this->template->help_site($data); 
    }
    else{
        $data['module'] = 'help_admin';
        $data['view_file'] = 'access';
        $data['js']="";
        $this->load->module('template');
        $this->template->help_site($data); 
    }
    
}
    
    function cat1(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'cat1';
      $this->load->module('template');
      $this->template->help_site($data); 

}
    
    function cat2(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'cat2';
      $this->load->module('template');
      $this->template->help_site($data); 

}
    
    function cat3(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'cat3';
      $this->load->module('template');
      $this->template->help_site($data); 

}
    
    function cat4(){

      $data['js']="";
      $data['module'] = 'help_admin';
      $data['view_file'] = 'cat4';
      $this->load->module('template');
      $this->template->help_site($data); 

}

}
