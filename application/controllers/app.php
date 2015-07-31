<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class App extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $this->lang->load('vietnam', 'vietnam');
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->load->model('modules_model');
        $this->load->model('product/product_model');
        $this->load->model('categories/categories_model');
        $this->load->helper("slug");
        $this->load->model('config_model');
        $this->load->model('catenews_model');
        $this->lang->load('home', 'vietnam');
        $this->lang->load('homemenu', 'vietnam');
        @session_start();
        $this->id = (int) end(explode("-", $this->uri->segment(2)));
    }

    public function _remap() {
        $this->load->model('app_model');
        $data['site_title_name'] = $this->app_model->return_appname($this->id)."-".$this->lang->line('site_name_home');
        
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_slide'] = $this->product_model->list_slide();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->
        // 
        $data['list_all_product'] = $this->product_model->list_all_home();
        $data['categories'] = $this->categories_model->list_all_catedisplay();
        $data['allimages'] = $this->product_model->list_image();
        $this->load->model('app_model');
        $this->load->model('cateapp_model');
        $data['list_cateapps'] = $this->cateapp_model->list_all_type(null);
        $data['details_app'] = $this->app_model->details($this->id);
        if($this->app_model->details($this->id) == null) {
            redirect('home');
        }
        //--params
        $params = $this->config_model->details_config();
        $data['sitename'] = $params['sitename'];
        $data['meta_author'] = $params['meta_author'];
        $data['meta_des'] = $params['meta_des'];
        $data['meta_keyword'] = $params['meta_keyword'];
        $data['address1'] = $params['address1'];
        $data['address2'] = $params['address2'];
        $data['phone1'] = $params['phone1'];
        $data['phone2'] = $params['phone2'];
        $data['codeanalytic'] = $params['codeanalytic'];
        $this->load->view('home/index', $data);
    }

}
