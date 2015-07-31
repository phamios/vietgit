<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cateimage_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_cateimages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_all_type($type=null,$userid) {
        $this->db->where('userid',$userid);
        $this->db->where('catetype',$type);
        $this->db->where("active", 1); 
        $query = $this->db->get('tbl_cateimages'); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
        
        
    }
    
    function list_cate_user($id = null){
        $this->db->where('userid',$id);
        $this->db->where('active',1);
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_cateimages');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
        
    }
    
    function list_all_active_root($id) {
        $this->db->where('active',1);
        $this->db->where('cateroot',$id);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_cateimages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_cateimages');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function insert($userid,$name, $root,$type, $active) {
        $data = array(
            'userid'=>$userid,
            'catename' => $name,
            'cateroot' => $root,
            'catetype'=>$type,
            'active' => $active,
        );
        $this->db->insert('tbl_cateimages', $data);
        return $this->db->insert_id();
    }

    function update($id, $name, $root,$type, $active) {
        $data = array(
            'catename' => $name,
            'cateroot' => $root,
            'catetype'=>$type,
            'active' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_cateimages', $data);
    }

    function delete($id) { 
        $this->db->where('id', $id);
        $this->db->delete('tbl_cateimages');
    }

}
