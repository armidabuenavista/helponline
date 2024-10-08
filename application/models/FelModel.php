<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FelModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getFelcategory() {
        $query = $this->db->get('fel_category');
        return $query->result_array();
    }
     
    public function getFooditems($id, $limit, $offset) {
        $this->db->select('fel_fooditems.*, fel_category.*, fel_subcategory.*');
        $this->db->from('fel_fooditems');
        $this->db->join('fel_subcategory', 'fel_fooditems.subcategory = fel_subcategory.id', 'left');
        $this->db->join('fel_category', 'fel_subcategory.category = fel_category.id', 'left');
        $this->db->where('fel_subcategory.category', $id);
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result(); 
    }

}
?>
