<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    

    function delete_image($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_images');
    }

    function insert_image($imagelink, $producid = null) {
        $data = array(
            'imagelink' => $imagelink,
            'proid' => $producid,
        );
        $this->db->insert('tbl_images', $data);
        return $this->db->insert_id();
    }

    function get_imagesby_proid($id) {
        $this->db->where('proid', $id);
        $query = $this->db->get('tbl_images');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_image() {
        $this->db->group_by("proid");
        $this->db->distinct();
        $query = $this->db->get('tbl_images');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_imagenews() {
        $this->db->group_by("newsid");
        $this->db->distinct();
        $query = $this->db->get('tbl_images');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function updateimagepro($id, $proid) {
        $data = array(
            'proid' => $proid,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_images', $data);
    }

    function list_slide() {
        $this->db->where('islide', 1);
        $query = $this->db->get('tbl_images');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function updateslide($id) {
        $data = array(
            'islide' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_images', $data);
    }

    function getview($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->proview;
            }
        }
        return 0;
    }
 

}
