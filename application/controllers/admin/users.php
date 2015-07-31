<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url'); 
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $this->load->model('modules_model');
        $lang = $this->config->item('language_site');
        $this->lang->load($lang, $lang);
         $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');    
        $this->load->model('user_model');
        $this->load->model('app_model');
        $this->load->model('cateapp_model');
        @session_start();
    }

    function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {

            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->model('user_model');
            $data['list_user'] = $this->user_model->list_all_member();

            $this->load->view('admincp/dashboard', $data);
        }
    }

    function profile() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function delete($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('user_model');
            $this->user_model->delete($id);
            redirect('admin/users');
        }
    }

    function create_new() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else{
            $data['success'] = "";
            $data['list_apptype'] = $this->app_model->list_apptype();
            $data['list_cateapps'] = $this->cateapp_model->list_all_type();
            $data['list_menu'] = $this->modules_model->list_all_active();
            if (isset($_REQUEST['btt_submit'])) {
                $username = $this->input->post('username', true);
                $userpass = $this->input->post('userpass', true);
                $utype=$this->input->post('usertype',true);
                $active = $this->input->post('active', true);
                
                //$utype=2;
                $result = $this->user_model->insert($username,$userpass,$active,$utype);
                if ($result <> null) {
                    $data['success'] = '<div class="alert alert-success">Thêm ứng dụng mới thành công !</div>';
                } else {
                    $data['success'] = '<div class="alert alert-danger"> Cõ lỗi trong quá trình tạo mới ! </div>';
                }
                redirect('admin/users');
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

}
