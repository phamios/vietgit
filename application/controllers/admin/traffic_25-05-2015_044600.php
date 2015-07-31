<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Traffic extends CI_Controller
{

    function __construct()
    {
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
        @session_start();
    }

    function index()
    {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('user_model');
            $this->load->model('traffic_model');
            $this->load->model('modules_model');
            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();


            $data['list_traffic'] = $this->traffic_model->list_all_by_user($this->session->userdata('admin_id'));

            $this->load->view('admincp/dashboard', $data);
        }
    }
}

?>