<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_media');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function list_all_bycate() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_media');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_active_media_where_type($type = null) {
        $this->db->where('mediatype', $type);
        $this->db->where('mediaactive', 1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_media');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    /*
     * Type = 1 : Photo 
     * Type = 2 : Video
     */

    function list_all_type($type = null) {
        $this->db->where('mediatype', $type);
        $query = $this->db->get('tbl_media');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_media');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function return_media_link($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_media_temp');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->medialink;
            }
        } else {
            return null;
        }
    }

    function insert_media($type = null, $link = null) {
        $data = array(
            'mediatype' => $type,
            'medialink' => $link,
            'mediaactive' => 1,
            'meadiacreatedate' => date('d-m-Y'),
        );
        $this->db->insert('tbl_media', $data);
        return $this->db->insert_id();
    }

    function update($id, $type = null, $link = null) {
        $data = array(
            'mediatype' => $type,
            'medialink' => $link,
            'mediaactive' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_media', $data);
    }

    function update_status($id = null, $active = null) {
        $data = array(
            'mediaactive' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_media', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_media');
    }

}
