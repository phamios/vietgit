<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Mobile extends CI_Controller {
    /*
     * Khoi tao controller
     */

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $lang = $this->config->item('language_site');
        $this->load->model('modules_model');
        $this->lang->load($lang, $lang);
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('config_model');
        $this->load->model('cateapp_model');
        $this->load->model('app_model');
        @session_start();
    }

    /*
     * Index view
     */

    function index($params = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else { 
            $data['list_menu'] = $this->modules_model->list_all_active(); 
            $this->load->view('admincp/dashboard', $data);
        }
    }
 

}
