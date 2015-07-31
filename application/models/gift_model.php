<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gift_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->load->database(); 
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_giftcard');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }
    
    function add_new($userid,$gift_namefrom,$gift_name,$gift_type,$gift_address,$gift_note,$gift_date,$productid=null,$productname=null,$gift_phone=null,$gift_order=0) {  
        
            $data = array(
                'userid' => $userid,
                'gift_namefrom' =>$gift_namefrom,
                'gift_name' => $gift_name,
                'gift_type' => $gift_type,
                'gift_name' => $gift_name,
                'gift_address'=>$gift_address,
                'gift_note'=>$gift_note,
                'gift_create'=>date("d-m-Y"),
                'gift_date'=>$gift_date,
                'product_id'=> $productid,
                'product_name'=>$productname,
                'gift_phone'=>$gift_phone,
                'gift_order'=>$gift_order,
            ); 
            $this->db->insert('tbl_giftcard', $data); 
            return $this->db->insert_id();
        
    }
      
    function delete($id){
        $this->load->database(); 
        $this->db->where('id', $id);
        $this->db->delete('tbl_giftcard');
    }
    
}