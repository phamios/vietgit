<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /*
     * Show list Blog 
     */
    function list_all_page($num, $offset) {
        $this->db->where('blog_type',1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_blog', $num, $offset);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    /*
     * Show list services 
     */
    function list_all_services() {
        $this->db->where('blog_type',2);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_relate(){
        $this->db->where('blog_type',1);
        $this->db->limit(10);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_relate_services(){
        $this->db->where('blog_type',2);
        $this->db->limit(10);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function get_title_blog($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_blog');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $blog){
                return $blog->blog_title;
            }
        }
        return null;
    }

    function insert($title, $short, $des,$type, $active) {
        $data = array(
            'blog_title' => $title,
            'blog_short' => $short,
            'blog_des' => $des,
            'blog_type'=>$type,
            'blog_active' => $active,
            'blog_date' => date('d-m-Y'),
        );
        $this->db->insert('tbl_blog', $data);
        return $this->db->insert_id();
    }

    function update($id, $title, $short, $des,$type, $active) {
        $data = array(
            'blog_title' => $title,
            'blog_short' => $short,
            'blog_des' => $des,
            'blog_type'=>$type,
            'blog_active' => $active,
            'blog_date' => date('d-m-Y'),
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_blog', $data);
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_blog');
    }

    function total() {
        return $this->db->count_all('tbl_blog');
    }

}
