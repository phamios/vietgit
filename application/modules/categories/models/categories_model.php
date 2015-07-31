<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_submenu(){
        $this->db->where(array(
            'cateactive'=>1,
        )); 
        $this->db->where('cateroot !=',0); 
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_all_root_active(){
        $this->db->where(array(
            'cateroot'=> 0,
            'cateactive'=>1,
        )); 
        $this->db->order_by("cateaorder", "asc");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_root() {
        $this->db->where('cateroot', 0);
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_active_order() {
        $this->db->where('cateactive', 1);
        $this->db->order_by("cateaorder", "asc");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_all_catedisplay() {
        $this->db->where(array(
            'cateactive' =>1,
            'catedisplay'=>1,
            'cateroot'=>0,
        ));
        $this->db->order_by("cateaorder", "ASC");
        $query = $this->db->get('tbl_procate');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function insert($values) {
        if ($this->check_exit($values['name']) == null) {
            $data = array(
                'cateroot' => $values['root'],
                'catename' => $values['name'],
                'cateaorder' => $values['order'],
                'catedisplay' => $values['display'],
                'cateactive' => $values['active'],
            );
            $this->db->insert('tbl_procate', $data);
            return $this->db->insert_id();
        } else {
            return null;
        }
    }

    function update($values) { 
        $data = array(
            'cateroot' => $values['root'],
            'catename' => $values['name'],
            'cateaorder' => $values['order'],
            'catedisplay' => $values['display'],
            'cateactive' => $values['active'],
        );
        $this->db->where('id', $values['id']);
        $this->db->update('tbl_procate', $data);
    }

    function check_exit($catename) {
        $this->db->where('catename', $catename);
        $query = $this->db->get('tbl_procate');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_procate');
    }

}
