<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

 

class Log_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function log($user,$place) { 
        $data = array(
            'userid' => $user, 
            'logtype' => $place,
            'logdate' => date("Y-m-d h:s:m"),
        );
        $this->db->trans_start();
        $this->db->insert('user_logs', $data);
        $this->db->trans_complete(); 
    }

}
