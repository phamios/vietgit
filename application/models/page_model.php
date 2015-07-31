<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_pages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function get_page_name($id=null){
        $this->db->where('id',$id);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_pages');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->page_name;
            }
        }
        return $query->result();
    }
    
    function list_all_active_root($id) {
        $this->db->where('page_active',1); 
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_pages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_pages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function insert($name, $title,$content, $active,$order) {
        $data = array(
            'page_name' => $name,
            'page_link' => strtolower(trim($name)),
            'page_title' => $title,
            'page_content'=>$content,
            'page_active'=>$active,
            'page_order'=>$order,
        ); 
        $this->db->trans_start();
        $this->db->insert('tbl_pages', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function update($id, $name, $root, $active) {
        $data = array(
            'page_name' => $name,
            'page_link' => strtolower(trim($name)),
            'page_title' => $title,
            'page_content'=>$content,
            'page_active'=>$active,
            'page_order'=>$order,
        ); 
        $this->db->where('id', $id);
        $this->db->update('tbl_pages', $data);
    }

    function delete($id) { 
        $this->db->where('id', $id);
        $this->db->delete('tbl_pages');
    }

}
