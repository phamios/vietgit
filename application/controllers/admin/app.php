<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class App extends CI_Controller {
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
            $data['list_cateapps'] = $this->cateapp_model->list_all_type(null);

            $data['list_menu'] = $this->modules_model->list_all_active();
            if (isset($_REQUEST['btt_submit_search'])) {
                $keyword = $this->input->post('keyword', true);
                $data['list_app'] = $this->app_model->search_keyword($keyword);
            }  
            
            if($params <> null ){
                $data['list_app'] = $this->app_model->list_all_type($params); 
            }else {
                 $data['list_app'] = $this->app_model->list_all(); 
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function add_app() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['success'] = "";
            $data['list_apptype'] = $this->app_model->list_apptype();
            $data['list_cateapps'] = $this->cateapp_model->list_all_type();
            $data['list_menu'] = $this->modules_model->list_all_active();
            if (isset($_REQUEST['btt_submit_addapp'])) {
                $appname = $this->input->post('app_name', true);
                $appdes = $this->input->post('app_des', true);
                $pakage = $this->input->post('pakage_app', true);
                $appicon = $this->input->post('file_image', true);
                $apk_id = $this->input->post('apk_id', true);
                $apptype = $this->input->post('apptype', true);
                $cateapp = $this->input->post('appcateid', true);
                $icon = $this->app_model->return_icon($appicon);
                $app_link = $this->app_model->return_app_link($apk_id);
                $result = $this->app_model->insert($appname, $cateapp, $apptype, base_url('uploads') . '/' . $icon, $app_link, $appdes);
                if ($result <> null) {
                    $data['success'] = '<div class="alert alert-success">Thêm ứng dụng mới thành công !</div>';
                } else {
                    $data['success'] = '<div class="alert alert-danger"> Cõ lỗi trong quá trình tạo mới ! </div>';
                }
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function list_cate_app($id = null) {
        echo '<select required name="appcateid" aria-required="true"  class="form-control">';
        $list_cateapps = $this->cateapp_model->list_all_cate_by_type($id);
        echo '<option>Choose</option>';
        foreach ($list_cateapps as $cateapp) {
            echo '<option value="' . $cateapp->id . '">' . $cateapp->catename . "</option>";
        }
        echo '</select>';
    }

    public function uploadimage() {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . time() . '_' . $_FILES['file']['name']);
            $file = time() . '_' . $_FILES['file']['name'];
            $image_id = $this->app_model->insert_image($file, null);
            echo "<input type='hidden' value='" . $image_id . "' name='file_image' />";
            echo "<img src='" . base_url('uploads') . '/' . $file . "' width='300px' alt='image' />";
            die;
        }
    }

    public function upload_apk_file() {
        $destination_path = getcwd() . DIRECTORY_SEPARATOR;
        $result = 0;
        $target_path = $destination_path . '/uploads/apps/' . $this->session->userdata('admin_id') . '_' . basename($_FILES['file']['name']);
        $target_file = $destination_path . '/uploads/apps/' . $this->session->userdata('admin_id') . '_' . basename($_FILES["file"]["name"]);
        $apkFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if ($apkFileType != "apk") {
            $result = 0;
            echo '<div class="alert alert-danger">  File tải lên phải có định dạng APK </div>';
        } else {
            if (@move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                $result = 1;
            }
            $tempappid = $this->app_model->insert_app(basename($_FILES['file']['name']), "http://files.ayolo.net/" .$this->session->userdata('admin_id').'_'. basename($_FILES['file']['name']), 0);
            sleep(1);
            echo '<div class="alert alert-success"> Tải file lên thành công !</div>';
            echo "<input type='hidden' value='" . $tempappid . "' name='apk_id' />";
        }
    }

    /*
     * Danh muc cho ung dung
     */

    function categories($params = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_cateapps'] = $this->cateapp_model->list_all_type($params);

            if (isset($_REQUEST['btt_submit_search'])) {
                $keyword = $this->input->post('keyword', true);
                $data['list_cateapps'] = $this->cateapp_model->search_keyword($keyword);
            }
            if (isset($_REQUEST['btt_submit_insert'])) {
                $catename = $this->input->post('catename', true);
                $catetype = $this->input->post('catetype', true);
                $active = $this->input->post('active', true);
                $this->cateapp_model->insert($catename, $catetype, $active);
                redirect('admincp/cateapp');
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    /*
     * Chi tiet danh muc ung dung 
     * Edit 
     */

    function details_cate($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['id'] = $id;
            $data['catedetails'] = $this->cateapp_model->details($id);
            $data['list_menu'] = $this->modules_model->list_all_active();

            if (isset($_REQUEST['btt_submit_insert'])) {
                $catename = $this->input->post('catename', true);
                $catetype = $this->input->post('catetype', true);
                $active = $this->input->post('active', true);
                $this->cateapp_model->insert($catename, $catetype, $active);
                redirect('admincp/cateapp');
            }
            if (isset($_REQUEST['btt_submitedit'])) {
                $catename = $this->input->post('catename', true);
                $catetype = $this->input->post('catetype', true);
                $active = $this->input->post('active', true);
                $this->cateapp_model->update($id, $catename, $catetype, $active);
                redirect('admincp/cateapp');
            }

            if (isset($_REQUEST['btt_submitexit'])) {
                redirect('admincp/cateapp');
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    /*
     * Xoa Danh muc cua ung dung
     */

    function delete($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->cateapp_model->delete($id);
            redirect('admincp/cateapp');
        }
    }

    /*
     * Xoa ung dung
     */

    function delete_app($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->app_model->delete($id);
            redirect('admincp/app');
        }
    }

    /*
     * Upload File
     */

    function do_upload_file($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'jar|jad|apk|ipa';
        $config['max_size'] = '5000000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                echo $error;
                die;
                return null;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $appname = $this->upload->file_name;
                echo $appname;
                die;
                return $appname;
            }
        } else {
            echo $this->upload->display_errors();
            die;
        }
    }

    function do_upload_image($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'png|jpg|bmp|gif|';
        $config['max_size'] = '5000000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return null;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                $this->resize_image($mypath, 'thumb_' . $imagename, $imagename);
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function resize_image($dir, $new_name, $image) {
        $img_cfg_thumb['image_library'] = 'gd2';
        $img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
        $img_cfg_thumb['maintain_ratio'] = TRUE;
        $img_cfg_thumb['new_image'] = $new_name;
        $img_cfg_thumb['width'] = 300;
        $img_cfg_thumb['height'] = 300;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }

}
