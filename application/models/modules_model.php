<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modules_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->load->database(); 
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_modules');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function  list_all_active(){
        $this->load->database(); 
        $this->db->where(array(
            'mod_active'=>1,
            'mod_type'=>1,
        ));
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_modules');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
            
    function list_admin(){
        $this->load->database(); 
        $this->db->where('mod_type',1);
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_modules');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_front(){
        $this->load->database(); 
        $this->db->where('mod_type',2);
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_modules');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    public function status_order($id, $order) { 
        $data = array(
            'mod_order' => $order,
        );
        $this->db->where('id', $id); 
        $this->db->update('tbl_modules', $data);
    }
    
    
    
    function check_exit($mod_name) {
        $this->db->where(array(
            'mod_name' => $mod_name,
        ));
        $query = $this->db->get("tbl_modules");
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    
    function add_new($values) {  
        if ($this->check_exit($values['mod_name'])) {
            $data = array(
                'mod_name' => trim(strtolower($values['mod_name'])),
                'mod_slug' => $values['mod_slug'],
                'mod_link' => $values['mod_link'],
                'mod_autoload' => $values['mod_autoload'],
                'mod_active' => $values['mod_active'],
                'mod_type'=>$values['mod_type'],
            ); 
            $this->db->insert('tbl_modules', $data); 
            return $this->db->insert_id();
        } else {
            return null;
        }
    }
    
    function delete_by_name($name){
        $this->load->database(); 
        $this->db->where('mod_name', trim(strtolower($name)));
        $this->db->delete('tbl_modules');
        rmdir('./application/modules/'.trim(strtolower($name)));
    }
    
    function delete($id){
        $this->load->database(); 
        $this->db->where('id', $id);
        $this->db->delete('tbl_modules');
    }
    
}