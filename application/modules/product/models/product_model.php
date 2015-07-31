<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function search_by_param($array = null){  
        $this->db->where($array); 
        $query = $this->db->get('tbl_products'); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_all_home() {
        $this->db->limit(16);
        $this->db->order_by("proorder", "desc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function hot_product() {
        $this->db->where('proactive', 1);
        $this->db->order_by('proview', 'DESC');
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return null;
    }

    function list_khuyenmai() {
        $this->db->where(array(
            'proactive' => 1,
            'protypeid' => 2,
        ));
        $this->db->order_by("proorder", "asc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function get_by_keyword($name) {
        $this->db->like('proname', $name);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function get_by_cost($cost = null) {
        $this->db->like('mainprice', $cost);
        $this->db->like('secondprice', $cost);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_bycate($cateid) {
        $this->db->where(array(
            'procateid' => $cateid,
            'proactive' => 1,
        ));

        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_active_order() {
        $this->db->where('proactive', 1);
        $this->db->order_by("proorder", "asc");
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function insert($values) {
        $data = array(
            'proname' => $values['proname'],
            'procateid' => $values['procateid'],
            'protypeid' => $values['protypeid'],
            'mainprice' => $values['mainprice'],
            'secondprice' => $values['secondprice'],
            'prodes' => $values['prodes'],
            'proactive' => $values['proactive'],
            'proorder' => $values['proorder'],
        );
        $this->db->trans_start();
        $this->db->insert('tbl_products', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function update($values) {

        $data = array(
            'proname' => $values['proname'],
            'procateid' => $values['procateid'],
            'protypeid' => $values['protypeid'],
            'mainprice' => $values['mainprice'],
            'secondprice' => $values['secondprice'],
            'prodes' => $values['prodes'],
            'proactive' => $values['proactive'],
            'proorder' => $values['proorder'],
        );

        $this->db->where('id', $values['id']);
        $this->db->update('tbl_products', $data);
    }

    function check_exit($proname) {
        $this->db->where('proname', $proname);
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_products');
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

    function updateview($id) {
        $data = array(
            'proview' => $this->getview($id) + 5,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_products', $data);
    }

    function get_relateprod() { 
        $this->db->limit(4);
        $this->db->order_by('proview', 'random');
        $query = $this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return null;
    }

}
