<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends MX_Controller {

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
        $lang = $this->config->item('language_site'); 
        $this->lang->load($lang, $lang);
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->load->model('categories_model'); 
        @session_start();
    }

    /*
     * Index List Categories
     */

    public function index() {  
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();

            $data['list_category'] = $this->categories_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function update($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            if (isset($_REQUEST['btt_submit'])) {
                $catename = $this->input->post('catename', true);
                $cateorder = $this->input->post('cateorder', true);
                $catedispay = $this->input->post('catedispay', true);
                $cateroot = $this->input->post('cateroot', true);
                $cateactive = $this->input->post('cateactive', true);
                
                $params = array(
                    'id'=>$id,
                    'root' => $cateroot,
                    'name' => $catename,
                    'order' => $cateorder,
                    'display' => $catedispay,
                    'active' => $cateactive,
                ); 
                $this->categories_model->update($params);
                redirect('categories/index');
            }
            $data['details_cate'] = $this->categories_model->details($id);
            $data['list_category'] = $this->categories_model->list_all($id);
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function create_new() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $catename = $this->input->post('catename', true);
                $cateorder = $this->input->post('cateorder', true);
                $catedispay = $this->input->post('catedispay', true);
                $cateroot = $this->input->post('cateroot', true);
                $cateactive = $this->input->post('cateactive', true);
                $params = array(
                    'root' => $cateroot,
                    'name' => $catename,
                    'order' => $cateorder,
                    'display' => $catedispay,
                    'active' => $cateactive,
                );

                $result = $this->categories_model->insert($params);

                redirect('categories/index');
            }
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_category'] = $this->categories_model->list_all_root();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function delete($param = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->categories_model->delete($param);
            redirect('categories');
        }
    }

}
