<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
     
    function list_apptype() {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('tbl_apptype');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function list_active_app() {
        $this->db->where('active', 1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function search_keyword($keyword = null) {
        $this->db->like('appname', $keyword);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function list_all_type($type = null) { 
        $this->db->where('apptype', $type);
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function details($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
         
    }
    
    function return_appname($id = null) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_app');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->appname;
            }
        } else {
            return null;
        }
        
    }
    
    function list_app_temp($app_temp_id = null){
        $this->db->where('id', $app_temp_id);
        $query = $this->db->get('tbl_app_temp');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    
    
    function return_app_link($id=null){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_app_temp');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->file_link;
            }
        } else {
            return null;
        } 
    }
    
    function return_icon ($id = null){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_images');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->imagelink;
            }
        } else {
            return null;
        }
    }

    function insert_app($appfile = null, $applink = null, $appid = 0) {
        $data = array(
            'file_name' => $appfile,
            'file_link' => $applink,
            'app_id' => $appid,
        );
        $this->db->insert('tbl_app_temp', $data);
        return $this->db->insert_id();
    }

    function insert($name, $cateid, $apptype, $appicon, $applink, $appdes) {
        $data = array(
            'appname' => $name,
            'cateid' => $cateid,
            'appicon' => $appicon,
            'applink' => $applink,
            'apptype' => $apptype,
            'appdes' => $appdes, 
            'appcreatedate' => date("d-m-Y"),
            'active' => 1,
        );
        $this->db->insert('tbl_app', $data);
        return $this->db->insert_id();
    }

    function update($id, $name, $cateid, $apptype, $appicon, $applink, $appdes, $appreview, $apporder, $apphot, $active) {
        if ($appicon <> null) {
            $data = array(
                'appname' => $name,
                'cateid' => $cateid,
                'appicon' => $appicon,
                'applink' => $applink,
                'apptype' => $apptype,
                'appdes' => $appdes,
                'appreview' => $appreview,
                'apporder' => $apporder,
                'apphot' => $apphot,
                'active' => $active,
            );
        } else {
            $data = array(
                'appname' => $name,
                'cateid' => $cateid,
                'applink' => $applink,
                'apptype' => $apptype,
                'appdes' => $appdes,
                'appreview' => $appreview,
                'apporder' => $apporder,
                'apphot' => $apphot,
                'active' => $active,
            );
        }

        $this->db->where('id', $id);
        $this->db->update('tbl_app', $data);
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_app');
    }

    function insert_image($imagelink, $appid = null) {
        $data = array(
            'imagelink' => $imagelink,
            'appid' => $appid,
        );
        $this->db->insert('tbl_images', $data);
        return $this->db->insert_id();
    }

    function insert_request_app($userid,$appid,$appname,$apptype,$pakagename,$appicon,$appdescription){
        $data = array(
            'userid'=>$userid,
            'appid' => $appid,
            'requestdate'=>date("m-d-Y h:m:s"),
            'appname' => $appname,
            'apptype'=>$apptype,
            'pakagename'=>$pakagename,
            'appicon'=>$appicon,
            'appdescription'=>$appdescription,
        );
        $this->db->insert('tbl_request_app', $data);
        return $this->db->insert_id();
    }

    function list_request($userid = null){
        $this->db->where('userid', $userid);
        $query = $this->db->get('tbl_request_app');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}
