<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cateapp_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_cateapp');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function search_keyword($keyword = null) {
        if ($keyword <> null) {
            $this->db->like('catename', $keyword);
        }
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_cateapp');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_type($type = null) {
        if ($type == 'app') {
            $this->db->where('catetype', 1);
        } elseif ($type == 'game') {
            $this->db->where('catetype', 2);
        }
        $query = $this->db->get('tbl_cateapp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function list_all_cate_by_type($type = null) {
        if($type <> 0 || $type <> null ){
            $this->db->where('catetype',$type);
        } 
        $query = $this->db->get('tbl_cateapp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_cateapp');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function insert($name, $type, $active) {
        $data = array(
            'catename' => $name,
            'catetype' => $type,
            'active' => $active,
        );
        $this->db->insert('tbl_cateapp', $data);
        return $this->db->insert_id();
    }

    function update($id, $name, $type, $active) {
        $data = array(
            'catename' => $name,
            'catetype' => $type,
            'active' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_cateapp', $data);
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_cateapp');
    }

}
