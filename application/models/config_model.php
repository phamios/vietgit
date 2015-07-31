<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Config_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $query = $this->db->get('tbl_configs');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function details_timeauto(){
        $query = $this->db->get('tbl_siteauto');
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return null;
        }
    }

    function update_timeauto($hour,$min){
        $data = array(
            'config_time'=>$hour,
            'config_minute'=>$min,
        );
        $this->db->where('id', 1);
        $this->db->update('tbl_siteauto', $data);
    }

    function details_config() {
        $query = $this->db->get('tbl_configs');
        $arr = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $arr['sitename'] = $value->sitename;
                $arr['meta_author'] = $value->meta_author;
                $arr['meta_des'] = $value->meta_des;
                $arr['meta_keyword'] = $value->meta_keyword;
                $arr['address1'] = $value->address1;
                $arr['address2'] = $value->address2;
                $arr['phone1'] = $value->phone1;
                $arr['phone2'] = $value->phone2;
                $arr['codeanalytic'] = $value->codeanalytic;
            }
            return $arr;
        } else {
            return null;
        }
    }

    function updateconfig($values) {
        $this->db->where('id', 1);
        $this->db->update('tbl_configs', $values);
    }

    /*
     * --------------EMAIL
     */
    function list_email() {
        $query = $this->db->get('tbl_email');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function get_email_auto(){
        $this->db->limit(1);
        $this->db->where('mailtype',1);
        $query = $this->db->get('tbl_email');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }


    function get_email_verify(){
        $this->db->limit(1);
        $this->db->where('mailtype',3);
        $query = $this->db->get('tbl_email');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function mail_detail($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_email');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function insert_email($mail, $type,$pass,$emailcontent) {
        $data = array(
            'email' => $mail,
            'mailtype' => $type,
            'mailpass' =>$pass,
            'emailcontent'=>$emailcontent,
        );
        $this->db->insert('tbl_email', $data);
        return $this->db->insert_id();
    }

    function update_email($id, $mail, $type,$pass,$emailcontent) {
        $data = array(
            'email' => $mail,
            'mailtype' => $type,
            'mailpass' =>$pass,
            'emailcontent'=>$emailcontent,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_email', $data);
    }

    function del_mail($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_email');
    }

    function get_account_payment($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_payment_conf');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value ){
                return $value->payment_email;
            }
        } else {
            return null;
        }
    }

    function details_payment($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_payment_conf');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function update_payment($id,$accountname,$nametype){
        $data = array(
            'payment_email' => $accountname,
            'payment_name_type' => $nametype,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_payment_conf', $data);
    }

    /*********************************DEPOSIT****************************
     * Config Deposit for Member
     */
    function list_deposit(){
        $query = $this->db->get('tbl_depositconfig');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function list_active_deposit(){
        $this->db->where('active',1);
        $query = $this->db->get('tbl_depositconfig');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function deposit_details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_depositconfig');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function insert_deposit($name,$amount) {
        $data = array(
            'deposit_name' => $name,
            'deposit_amount' => $amount,
        );
        $this->db->insert('tbl_depositconfig', $data);
        return $this->db->insert_id();
    }

    function update_deposit($id,$name,$amount,$active) {
        $data = array(
            'deposit_name' => $name,
            'deposit_amount' => $amount,
            'active' =>$active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_depositconfig', $data);
    }

    function update_status_deposit($id,$active){
        $data = array(
            'active' =>$active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_depositconfig', $data);
    }

    function del_deposit($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_depositconfig');
    }




    /*
     *  UPLOAD IMAGES -----------------------
     */
    function insert_image($userid, $imagelink = null) {
        $data = array(
            'avarta' => base_url('uploads').'/'.$imagelink,
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_user', $data);
    }

    function insert_bannerimage($userid, $imagelink = null) {
        $data = array(
            'banner' => base_url('uploads').'/'.$imagelink,
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_user', $data);
    }




}
