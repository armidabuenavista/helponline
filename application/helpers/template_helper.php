<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('template')) {
    function template($view, $data = array()) {
        $CI =& get_instance();

        // Load the view content
        $data['content'] = $CI->load->view($view, $data, TRUE);
        
        // Load the main layout template
        $CI->load->view('template', $data);
    }
}
