<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermodel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbluser');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function authen($username, $password, $usertype = null, $status = null) {
        $this->db->where(array(
            'username' => trim($username),
            'userpass' => md5($this->config->item('key') . '+-*%' . $password),
        ));
        $query = $this->db->get('tbluser');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result = array(
                    'id' => $value->id,
                    'username' => $value->uname,
                    'usertype' => $value->utype,
                    'active'=>$value->uactive,
                    'usertype'=>$value->utype,
                    'useremail'=>$value->uemail,
                    'userphone'=>$value->uphone,
                    'useraddress'=>$value->uaddress,
                    'userdate'=>$value->udate
                );
                return $result;
            }
        } else {
            return null;
        }
    }

    function check_exit($username) {
        $this->db->where(array(
            'username' => $username,
        ));
        $query = $this->db->get("tbluser");
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    /*
     * Praram Array to insert
     */

    function insert($values) {
        if ($this->check_exit($values['username'])) {
            $data = array(
                'username' => $values['username'],
                'userpass' => md5($this->config->item('key') . '+-*%' . $values['password']), 
                'userdate' => date("Y-m-d h:s:m"),
            );
            $this->db->trans_start();
            $this->db->insert('tbluser', $data);
            $this->db->trans_complete();
            return $this->db->insert_id();
        } else {
            return null;
        }
    }

}
