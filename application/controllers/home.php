<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Home extends CI_Controller {

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
        $this->load->model('user_model');
        @session_start();
    }
    
   

    function index($value = null) {
        if ($value <> null) {
            echo $this->product_id;
        } else {
            $data['site_title_name'] = $this->lang->line('site_name_home');
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
            $data['list_app'] = $this->app_model->list_active_app();
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
            $this->load->view('home2/index', $data);
        }
    }

    function register() {
        if (isset($_REQUEST['btt_register'])) {
            $email = $this->input->post('useremail', true);
            $username = $this->input->post('username', true);
            $userpass = $this->input->post('userpass', true);
            $utype = $this->input->post('usertype', true);
            $array = array(
                'username' => $username,
                'password' => $userpass,
                'active' => 0,
                'usertype' => $utype,
                'useremail' => $email,
            );
            $userid = $this->user_model->insert($array);
            if ($userid == null) {
                redirect('');
            } else {
                redirect('dang-nhap');
            }
        }
    }

//    function list_app() {
//        $data['site_title_name'] = "Danh sách ứng dụng - " . $this->lang->line('site_name_home');
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_slide'] = $this->product_model->list_slide();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        // $data['list_cate'] = $this->categories_model->
//        // 
//        $data['list_all_product'] = $this->product_model->list_all_home();
//        $data['categories'] = $this->categories_model->list_all_catedisplay();
//        $data['allimages'] = $this->product_model->list_image();
//        $this->load->model('app_model');
//        $this->load->model('cateapp_model');
//        $data['list_cateapps'] = $this->cateapp_model->list_all_type(null);
//        $data['list_app'] = $this->app_model->list_active_app();
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }
//
//    function pakage() {
//        $data['site_title_name'] = "Gói giá - " . $this->lang->line('site_name_home');
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_slide'] = $this->product_model->list_slide();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        // $data['list_cate'] = $this->categories_model->
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }

    function contact() {
        $data['site_title_name'] = "Liên hệ - " . $this->lang->line('site_name_home');
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_slide'] = $this->product_model->list_slide();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->
        //------------NOI DUNG TREN FUNCTION 
        //------------Ket thuc noi dung tren function
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
        $this->load->view('home3/index', $data);
    }

//    function support() {
//        $data['site_title_name'] = "Hướng dẫn kiếm tiền - " . $this->lang->line('site_name_home');
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_slide'] = $this->product_model->list_slide();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        // $data['list_cate'] = $this->categories_model->
//        //------------NOI DUNG TREN FUNCTION 
//        //------------Ket thuc noi dung tren function
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }
//
//    function search() {
//        $data['site_title_name'] = "Tìm kiếm - " . $this->lang->line('site_name_home');
//        $data['list_khuyenmai'] = $this->product_model->list_khuyenmai();
//        $data['allimages'] = $this->product_model->list_image();
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        //favorite product
//        $data['allimages_relate'] = $this->product_model->list_image();
//        $data['relate_product'] = $this->product_model->get_relateprod();
//        if (isset($_REQUEST['btt_search'])) {
//            $keyword = $this->input->post('keyword', true);
//            $data['list_products'] = $this->product_model->get_by_keyword($keyword);
//        } else {
//            $data['list_products'] = null;
//        }
//
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }
//
//    function categories() {
//        $data['list_khuyenmai'] = $this->product_model->list_khuyenmai();
//        $this->cateid = (int) end(explode("-", uri_string()));
//        $data['allimages'] = $this->product_model->list_image();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        $data['list_products'] = $this->product_model->list_all_bycate($this->cateid);
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        //favorite product
//        $data['allimages_relate'] = $this->product_model->list_image();
//        $data['relate_product'] = $this->product_model->get_relateprod();
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }
//
//    function product() {
//        //--params
//        $data['site_title_name'] = $this->lang->line('site_name_home');
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_slide'] = $this->product_model->list_slide();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
//        // $data['list_cate'] = $this->categories_model->
//        $this->load->model('blog_model');
//        $data['list_service_product'] = $this->blog_model->list_all_services();
//        //--params
//        $params = $this->config_model->details_config();
//        $data['sitename'] = $params['sitename'];
//        $data['meta_author'] = $params['meta_author'];
//        $data['meta_des'] = $params['meta_des'];
//        $data['meta_keyword'] = $params['meta_keyword'];
//        $data['address1'] = $params['address1'];
//        $data['address2'] = $params['address2'];
//        $data['phone1'] = $params['phone1'];
//        $data['phone2'] = $params['phone2'];
//        $data['codeanalytic'] = $params['codeanalytic'];
//        $this->load->view('home3/index', $data);
//    }

    function aboutus() {
        $data['site_title_name'] = $this->lang->line('site_name_home');
//        $data['list_model'] = $this->modules_model->list_front();
//        $data['menus'] = $this->categories_model->list_all_root_active();
//        $data['sub_menus'] = $this->categories_model->list_submenu();
//        $data['list_slide'] = $this->product_model->list_slide();
//        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
//        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->
        //
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
        $this->load->view('front/index', $data);
    }

    function details_services() {
        //--params
        $this->blogid = (int) end(explode("-", uri_string()));
        $data['site_title_name'] = $this->lang->line('site_name_home');
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_slide'] = $this->product_model->list_slide();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->
        $this->load->model('blog_model');
        $data['site_title_name'] = $this->blog_model->get_title_blog($this->blogid);
        $data['relate_blog'] = $this->blog_model->list_relate_services();
        $data["detail_blog"] = $this->blog_model->details($this->blogid);
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
        $this->load->view('home3/index', $data);
    }

    function blog() {
        //--params
        $data['site_title_name'] = $this->lang->line('site_name_home');
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_slide'] = $this->product_model->list_slide();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->

        $this->load->model('blog_model');
        $data['relate_blog'] = $this->blog_model->list_relate();
        $config['base_url'] = site_url('home/blog');
        $config['total_rows'] = $this->blog_model->total();
        $config['per_page'] = 10;
        $config['num_links'] = 2;
        $config['prev_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        $data["list_blog"] = $this->blog_model->list_all_page($config['per_page'], $this->uri->segment(3));
        $data['pages'] = $this->pagination->create_links();
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
        $this->load->view('home3/index', $data);
    }

    function details_blog() {
        $data['site_title_name'] = $this->lang->line('site_name_home'); 
        $this->blogid = (int) end(explode("-", uri_string())); 
        $data['list_model'] = $this->modules_model->list_front();
        //favorite product
        //favorite product
        $this->load->model('blog_model');
        $data['site_title_name'] = $this->blog_model->get_title_blog($this->blogid);
        $data['relate_blog'] = $this->blog_model->list_relate();
        $data["detail_blog"] = $this->blog_model->details($this->blogid);
        if($data["detail_blog"] == null){
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
        $this->load->view('home3/index', $data);
    }

    function cost() {
        $data['site_title_name'] = $this->lang->line('site_name_home');
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_slide'] = $this->product_model->list_slide();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        // $data['list_cate'] = $this->categories_model->
        // 
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
        $this->load->view('home3/index', $data);
    }

    function news() {
        $data['list_khuyenmai'] = $this->product_model->list_khuyenmai();
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        //favorite product
        //favorite product
        $data['allimages_relate'] = $this->product_model->list_image();
        $data['relate_product'] = $this->product_model->get_relateprod();
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
        $this->load->view('home3/index', $data);
    }

    function catenews() {
        $this->cateid = (int) end(explode("-", uri_string()));
        $data['list_khuyenmai'] = $this->product_model->list_khuyenmai();
        $data['list_model'] = $this->modules_model->list_front();
        $data['menus'] = $this->categories_model->list_all_root_active();
        $data['sub_menus'] = $this->categories_model->list_submenu();
        $this->load->model('news/news_model');
        $data['list_news'] = $this->news_model->list_all_bycate($this->cateid);
        $data['allimage_news'] = $this->product_model->list_imagenews();
        $data['list_catenews'] = $this->catenews_model->list_all_active_root(9);
        $data['list_catenews_2'] = $this->catenews_model->list_all_active_root(10);
        //favorite product
        //favorite product
        $data['allimages_relate'] = $this->product_model->list_image();
        $data['relate_product'] = $this->product_model->get_relateprod();
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
        $this->load->view('home3/index', $data);
    }

}
