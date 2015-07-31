<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Traffic_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_boot');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_by_user($id = null) {
        $this->db->where('userid', $id);
        $this->db->order_by("id", "asc");
        $query = $this->db->get('tbl_boot');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function insert($userid, $link) {
        $data = array(
            'userid' => $userid,
            'link' => $link,
            'coins' => 0,
            'views' => 0,
        );
        $this->db->insert('tbl_boot', $data);
        return $this->db->insert_id();
    }

    function update($id, $link, $coins, $view) {
        $data = array(
            'link' => $link,
            'coins' => $coins,
            'views' => $views,
            
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_boot', $data);
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_boot');
    }

//    function list_all_traffic() {
//        $this->load->database();
//        $this->db->where('utype !=', 1);
//        $this->db->order_by("id", "desc");
//        $query = $this->db->get('tbl_user');
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        }
//        return $query->result();
//    }

    function get_profile($id) {
        $this->db->where('id', $id);
        $this->load->database();
        $query = $this->db->get('tbl_boot');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

//    function check_per($id) {
//        $this->db->where('id', $id);
//        $this->load->database();
//        $query = $this->db->get('tbl_boot');
//        if ($query->num_rows() > 0) {
//            foreach ($query->result() as $value) {
//                return $value->utype;
//            }
//        } else {
//            return 0;
//        }
//    }
//    function authen($username, $password, $usertype = null, $status = null) {
//        $this->db->where(array(
//            'uname' => trim($username),
//            'upass' => md5($this->config->item('key') . '+-*%' . $password),
//        ));
//        $query = $this->db->get('tbl_user');
//
//        if ($query->num_rows() > 0) {
//            foreach ($query->result() as $value) {
//                $result = array(
//                    'user_id' => $value->id,
//                    'user_name' => $value->uname,
//                    'user_type' => $value->utype,
//                    'user_active' => $value->uactive
//                );
//                return $result;
//            }
//        } else {
//            return null;
//        }
//    }
//    function check_exit($username) {
//        $this->db->where(array(
//            'uname' => $username,
//        ));
//        $query = $this->db->get("tbl_user");
//        if ($query->num_rows() > 0) {
//            return false;
//        } else {
//            return true;
//        }
//    }

    /*
     * Praram Array to insert
     */
}

