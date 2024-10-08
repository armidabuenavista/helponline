<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_help extends CI_Model {

function __construct() {
parent::__construct();
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
    
}
