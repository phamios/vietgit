<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Mail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('config_model');
        $this->load->model('modules_model');
        @session_start();
    }

    function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
 
            $data['list_all_mail'] = $this->config_model->list_email();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function add_mail() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();

            $this->load->model('location_model');
            if (isset($_REQUEST['btt_add'])) {
                $name = $this->input->post('mail_add');
                $type = $this->input->post('email_type');
                $pass = $this->input->post('mailpass');
                $content = $this->input->post('emailcontent');
                $this->config_model->insert_email($name, $type,$pass,$content);
                redirect('admin/mail');
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }
    
    function edit_mail($id){
         if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active(); 
            $this->load->model('location_model');
            if (isset($_REQUEST['btt_edit'])) {
                $name = $this->input->post('mail_add');
                $type = $this->input->post('email_type');
                $pass = $this->input->post('mailpass');
                $content = $this->input->post('emailcontent');
                $this->config_model->update_email($id,$name, $type,$pass,$content);
                redirect('admin/mail');
            }
            $data['mail_details'] = $this->config_model->mail_detail($id);
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function del_mail($id) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else { 
            $this->config_model->del_mail($id);
            redirect('admin/mail/index');
        }
    }
    
    
     

}
