<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MX_Controller {

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
        $this->lang->load("menu", "vietnam");
        $this->lang->load($lang, $lang);
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->load->model('product_model');
        $this->load->model('categories/categories_model');
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        @session_start();
    }

    public function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_category'] = $this->categories_model->list_all();
            
            if (isset($_REQUEST['btt_submit_search'])) {
                $cate = $this->input->post('cate_keyword', true);
                $cost = $this->input->post('main_cost', true);
                $type = $this->input->post('type_pro', true);
                $status = $this->input->post('status_keyword', true);
                $keyword = $this->input->post('keyword', true);
              
                $params = array(
                    "proname" => $keyword,
                    'procateid =' => $cate,
                    'protypeid =' => $type,
                    'mainprice =' => $cost,
                    'proactive' => $status,
                ); 
                $data['list_product'] = $this->product_model->search_by_param($this->array_output($params));
            }   else {
                $data['list_product'] = $this->product_model->list_all();
            }
            
            $this->load->view('admincp/dashboard', $data);
        }
    }

    //Bộ lọc xử lý nếu có item nào null 
    //hoặc giá trị = 0, 
    //thì loại bỏ item đó ra khỏi array
    function array_output($params) {
        $a = array();
        foreach ($params as $k => $v) {
            if (empty($v)) {
                unset($params[$k]);
            } else {
                array_push($a, $k);
            }
        }
        return $params;
    }

    public function create_new() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            //$data['list_product'] = $this->product_model->list_all();
            if (isset($_REQUEST['btt_submit'])) {

                $proname = $this->input->post('proname', true);
                $mainprice = $this->input->post('mainprice', true);
                $secondprice = $this->input->post('secondprice', true);
                $prodes = $this->input->post('prodes', true);
                $proorder = $this->input->post('proorder', true);
                $protypeid = $this->input->post('protypeid', true);
                $procateid = $this->input->post('procateid', true);
                $proactive = $this->input->post('proactive', true);
                $params = array(
                    'proname' => $proname,
                    'mainprice' => $mainprice,
                    'secondprice' => $secondprice,
                    'prodes' => $prodes,
                    'proorder' => $proorder,
                    'protypeid' => $protypeid,
                    'procateid' => $procateid,
                    'proactive' => $proactive,
                );
                $proid = $this->product_model->insert($params);
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->product_model->updateimagepro($imageid[$i], $proid);
                }
                redirect('product/index');
            }
            $data['list_category'] = $this->categories_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function update($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            //$data['list_product'] = $this->product_model->list_all();
            if (isset($_REQUEST['btt_submit'])) {
                $proname = $this->input->post('proname', true);
                $mainprice = $this->input->post('mainprice', true);
                $secondprice = $this->input->post('secondprice', true);
                $prodes = $this->input->post('prodes', true);
                $proorder = $this->input->post('proorder', true);
                $protypeid = $this->input->post('protypeid', true);

                $procateid = $this->input->post('procateid', true);
                $proactive = $this->input->post('proactive', true);
                $params = array(
                    'id' => $id,
                    'proname' => $proname,
                    'mainprice' => $mainprice,
                    'secondprice' => $secondprice,
                    'prodes' => $prodes,
                    'proorder' => $proorder,
                    'protypeid' => $protypeid,
                    'procateid' => $procateid,
                    'proactive' => $proactive,
                );
                $proid = $this->product_model->update($params);
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->product_model->updateimagepro($imageid[$i], $proid);
                }
                redirect('product/index');
            }
            $data['list_product'] = $this->product_model->details($id);
            $data['list_category'] = $this->categories_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function uploadimage() {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . time() . '_' . $_FILES['file']['name']);
            $file = time() . '_' . $_FILES['file']['name'];

            $image_id = $this->product_model->insert_image($file, null);

            echo "<input type='hidden' value='" . $image_id . "' name='file_image[]' />";
            echo "<img src='" . base_url('uploads') . '/' . $file . "' width='10%' alt='image' />";
            die;
        }
    }

    public function delete($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->product_model->delete($id);
            redirect('product/index');
        }
    }

}
