<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_verify_user(){
        $this->load->database();
        $this->db->where('uactive',0); 
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_member() {
        $this->load->database();
        $this->db->where('utype !=', 1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function get_profile($id) {
        $this->db->where('id', $id);
        $this->load->database();
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function check_per($id) {
        $this->db->where('id', $id);
        $this->load->database();
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->utype;
            }
        } else {
            return 0;
        }
    }

    function authen($username, $password, $usertype = null, $status = null) {
        $this->db->where(array(
            'uname' => trim($username),
            'upass' => md5($this->config->item('key') . '+-*%' . $password),
        ));
        $query = $this->db->get('tbl_user');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result = array(
                    'user_id' => $value->id,
                    'user_name' => $value->uname,
                    'user_type' => $value->utype,
                    'user_active' => $value->uactive,
                );
                return $result;
            }
        } else {
            return null;
        }
    }

    function check_exit($username) {
        $this->db->where(array(
            'uname' => $username,
        ));
        $query = $this->db->get("tbl_user");
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    /*
     * Praram Array to insert
     */

    function insert($uname, $upass, $uactive, $utype) {
        if ($this->check_exit($uname)) {
        $data = array(
            'uname' => $uname,
            'upass' => md5($this->config->item('key') . '+-*%' .$upass),
            'uactive' => $uactive,
            'utype' => $utype,
            'udate'=>date('Y-m-d h:m:s'),
        );
        }else{
            return null;
        }
        $this->db->insert('tbl_user', $data);
        return $this->db->insert_id();
    }

    

    function update_password($userid, $newpass) {
        $data = array(
            'upass' => md5($this->config->item('key') . '+-*%' . $newpass),
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_user', $data);
    }

    function active_member($uname) {
        $data = array(
            'uactive' => 1,
        );
        $this->db->where('uname', $uname);
        $this->db->update('tbl_user', $data);
    }


    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_user');
    }

}
