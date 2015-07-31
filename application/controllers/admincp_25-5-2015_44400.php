<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class admincp extends CI_Controller {

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
        $this->load->model('log_model');
        $this->load->model('config_model');
        $this->load->model('user_model');
        $this->load->helper("slug");
        @session_start();
    }

    function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_user'] = $this->user_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function api() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function giftcard() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {

            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->model('gift_model');
            $data['list_gift'] = $this->gift_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function deletegift($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('gift_model');
            $this->gift_model->delete($id);
            redirect('admincp/giftcard');
        }
    }

    function configsite() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $array['sitename'] = $this->input->post('sitename', true);
                $array['meta_author'] = $this->input->post('meta_author', true);
                $array['meta_des'] = $this->input->post('meta_des', true);
                $array['meta_keyword'] = $this->input->post('meta_keyword', true);
                $array['address1'] = $this->input->post('address1', true);
                $array['address2'] = $this->input->post('address2', true);
                $array['phone1'] = $this->input->post('phone1', true);
                $array['phone2'] = $this->input->post('phone2', true);
                $array['codeanalytic'] = $this->input->post('codeanalytic', true);
                $this->load->model('config_model');
                $this->config_model->updateconfig($array);
                redirect('admincp/configsite');
            }
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function configslide() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('product/product_model');
            if (isset($_REQUEST['btt_submit'])) {
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->product_model->updateslide($imageid[$i]);
                }
                redirect('admincp/configslide');
            }
            $data['list_slide'] = $this->product_model->list_slide();
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function deleteslide($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('image_model');
            $this->image_model->delete_image($id);
            redirect('admincp/configslide');
        }
    }

    function updatepass($nof = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('user_model');
            $userid = $this->session->userdata('admin_id');
            $this->load->model('product/product_model');
            if (isset($_REQUEST['btt_submitedit'])) {
                $newpass = $this->input->post('yourpassword', true);
                $this->user_model->update_password($userid, $newpass);
                redirect('admincp/updatepass/1');
            }
            if ($nof == 1) {
                $data['notify'] = "Updated new Password !";
            } else {
                $data['notify'] = "";
            }
            $data['id'] = $userid;
            $data['profile'] = $this->user_model->get_profile($this->session->userdata('admin_id'));
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function uploadimage() {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            if ($_FILES['file']['name'] != null) {
                move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . time() . '_' . $_FILES['file']['name']);
                $file = time() . '_' . $_FILES['file']['name'];
                $this->load->model('product/product_model');
                $image_id = $this->product_model->insert_image($file, null);

                echo "<input type='hidden' value='" . $image_id . "' name='file_image[]' />";
                echo "<img src='" . base_url('uploads') . '/' . $file . "' width='10%' alt='image' />";
                die;
            }
        }
    }

    function menu() {
 
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {

            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_navigator'] = $this->modules_model->list_front();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function menu_update_order($id, $order) {
 
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->modules_model->status_order($id, $order);
            return "OK ";
        }
    }

    function modules() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {

            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function requestapp() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {

            $data['list_menu'] = $this->modules_model->list_all_active();
            if(isset($_REQUEST['btt_submit'])){
                $apptype = null;
                $appid = $this->input->post('apptype');
                if($appid == 1){
                    $apptype == "Youtube đơn lẻ";
                }elseif($appid == 2){
                    $apptype == "Youtube Channel";
                }elseif($appid == 3){
                    $apptype == "Youtube Playlist tổng hợp ";
                }elseif($appid == 4){
                    $apptype == "Ứng dụng Wallpaper";
                }elseif($appid == 5){
                    $apptype == "Ứng dụng tin tức";
                }
                $pakageapp = "com.vietadmob.".trim(create_slug($this->session->userdata('admin_name')));
                $appicon = $this->do_upload_image('./uploads/apps/', 'appicon');
                $appname = $this->input->post('appname');
                $appdesc = $this->input->post('appdesc');

                $this->load->model('app_model');
                $userid = $this->session->userdata('admin_id');
                $result = $this->app_model->insert_request_app($userid,$appid,$appname,$apptype,$pakageapp,$appicon,$appdesc);
                if($result <> null | $result <> 0 ){
                    $content = $pakageapp."<br/>".$apptype."<br/>".$appname;
                    $this->sendemail('admegavn@gmail.com',$content);
                    redirect('admincp/listrequestapp');
                }else{
                    redirect('admincp/requestapp/error');
                }
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }


    function sendemail($emailrecieve, $content){
         $this->load->model('config_model');
         $emailsent = "alexposterusa@gmail.com";
         $emailsentpass = "1q2w3e4r5t6y7u8i";
         $this->load->library('email');
         $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.gmail.com',
                 'smtp_port' => 465,
                 'smtp_user' => $emailsent,
                 'smtp_pass' => $emailsentpass,
                 'mailtype' => 'html',
                 'priority' => 1,
                 'charset' => 'utf-8',
                 'wordwrap' => TRUE
         );
         $this->email->initialize($config);
         $this->email->set_newline("\r\n");
         $this->email->set_crlf("\r\n");
         $this->email->from($emailsent, "Vietadmob");
         $this->email->to($emailrecieve);
         $this->email->subject("Yeu cau ung dung");
         $this->email->message(mb_convert_encoding($content, "UTF-8"));
         $this->email->send();
         echo $this->email->print_debugger();
     }



    function listrequestapp(){
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->model('app_model');
            $userid = $this->session->userdata('admin_id');
            $data['list_request_app'] = $this->app_model->list_request($userid);
            $this->load->view('admincp/dashboard', $data);

        }
    }

    function login() {
        if ($this->session->userdata('admin_id') == null) {
            if (isset($_REQUEST['go'])) {
                $username = $this->input->post('email', true);
                $password = $this->input->post('password', true);
                $this->load->model('user_model');
                $result = $this->user_model->authen($username, $password);
                if (empty($result)) {
                    redirect('admincp/login/error');
                } else {
                    $session_user = array(
                        'admin_id' => $result['user_id'],
                        'admin_name' => $result['user_name'],
                        'admin_type' => $result['user_type'],
                        'admin_active' => $result['user_active'],
                    );
                    $this->session->set_userdata($session_user);
                    redirect('admincp/index');
                }
            }
            $this->load->view('admincp/login/index');
        } else {
            redirect('admincp/index');
        }
    }

    function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_type');
        $this->session->unset_userdata('admin_active');
        redirect('dang-nhap');
    }

    function register($error = null) {
        if ($this->session->userdata('admin_id') === null) {
             redirect('admincp');
        } else { 
             $this->load->model('user_model');
            if (isset($_REQUEST['go'])) { 
                $email = $this->input->post('useremail', true);
                $username = $this->input->post('username', true);
                $userpass = $this->input->post('userpass', true);
                $utype = $this->input->post('usertype', true);

                $array = array(
                    'username' => $username,
                    'password' => $userpass,
                    'active' => 1,
                    'usertype' => $utype,
                    'useremail' => $email,
                );

                if(strlen($username) < 5 || strlen($userpass) < 1){
                    redirect('dang-ky/'.md5($email.$username.$userpass));
                }
                $userid = $this->user_model->insert($array);
                if ($userid == null) {
                    redirect('dang-ky');
                } else {
                    redirect('dang-nhap');
                }
            }
            if($error <> null){
                $data['error'] = "Các trường bạn nhập đang lỗi hoặc thiếu, vui lòng kiểm tra lại.";
            }else{
                $data['error'] = "";
            }
            $this->load->view('admincp/register/index',$data);
           
        }
    }

    function catenews($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('catenews_model'); 
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_catenews'] = $this->catenews_model->list_all_byuser($this->session->userdata('admin_id'));
            $data['list_user'] = $this->user_model->list_all_member();
            if (isset($_REQUEST['btt_submit'])) {
                $name = $this->input->post('catename', true);
                $active = $this->input->post('active', true);
                $this->catenews_model->insert($name, 0, $active,$this->session->userdata('admin_id'));
                redirect('admincp/catenews');
            }
            if (isset($_REQUEST['btt_submitedit'])) {
                $name = $this->input->post('catename', true);
                $active = $this->input->post('active', true);
                $this->catenews_model->update($id, $name, 0, $active);
                redirect('admincp/catenews');
            }
            if ($id <> null) {
                $data['id'] = $id;
                $data['catedetails'] = $this->catenews_model->details($id);
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function del_catenews($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('catenews_model');
            $this->catenews_model->delete($id);
            redirect('admincp/catenews');
        }
    }

    /*
     * Function Blog 
     */

//    function blog() {
//        if ($this->session->userdata('admin_id') == null ) {
//            redirect('admincp/login');
//        } else {
//            $this->load->model('blog_model');
//            $data['list_menu'] = $this->modules_model->list_all_active();
//            $data['list_modules'] = $this->modules_model->list_all();
//            $data['list_blog'] = $this->blog_model->list_all();
//            if(isset($_REQUEST['btt_submit'])){
//                 $blogname = $this->input->post('blogname');
//                 $blogtype = $this->input->post('blog_type');
//                 $blogshort = $this->input->post('blogshort');
//                 $blogcontent = $this->input->post('blogcontent');
//                 $blogactive = $this->input->post('blogactive');
//                 $this->load->model('blog_model');
//                 $id = $this->blog_model->insert($blogname, $blogshort, $blogcontent,$blogtype,$blogactive);
//                 redirect('admincp/blog');
//            }
//            
//            $this->load->view('admincp/dashboard', $data);
//        }
//    }
    
//    function add_blog() {
//        if ($this->session->userdata('admin_id') == null ) {
//            redirect('admincp/login');
//        } else {
//            $this->load->model('blog_model');
//            $data['list_menu'] = $this->modules_model->list_all_active();
//            $data['list_modules'] = $this->modules_model->list_all(); 
//            if(isset($_REQUEST['btt_submit'])){
//                 $blogname = $this->input->post('blogname');
//                 $blogtype = $this->input->post('blog_type');
//                 $blogshort = $this->input->post('blogshort');
//                 $blogcontent = $this->input->post('blogcontent');
//                 $blogactive = $this->input->post('blogactive');
//                 $this->load->model('blog_model');
//                 $id = $this->blog_model->insert($blogname, $blogshort, $blogcontent,$blogtype,$blogactive);
//                 redirect('admincp/blog');
//            }
//            
//            $this->load->view('admincp/dashboard', $data);
//        }
//    }
    
//    function edit_blog($id=null){
//        if ($this->session->userdata('admin_id') == null ) {
//            redirect('admincp/login');
//        } else {
//            $this->load->model('blog_model');
//            $data['list_menu'] = $this->modules_model->list_all_active();
//            $data['list_modules'] = $this->modules_model->list_all();
//            $data['details_blog'] = $this->blog_model->details($id);
//            if(isset($_REQUEST['btt_submitedit'])){
//                 $blogname = $this->input->post('blogname');
//                 $blogtype = $this->input->post('blog_type');
//                 $blogshort = $this->input->post('blogshort');
//                 $blogcontent = $this->input->post('blogcontent');
//                 $blogactive = $this->input->post('blogactive');
//                 $this->load->model('blog_model');
//                 $id = $this->blog_model->update($id,$blogname, $blogshort, $blogcontent,$blogtype,$blogactive);
//                 redirect('admincp/blog');
//            }
//            
//            $this->load->view('admincp/dashboard', $data);
//        }
//    }
//    
//    function del_blog($id=null){
//        if ($this->session->userdata('admin_id') == null ) {
//            redirect('admincp/login');
//        } else {
//             $this->load->model('blog_model');
//            $this->blog_model->delete($id);
//             redirect('admincp/blog');
//        }
//    }


    function do_upload_image($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '80000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return NULL;
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
        $img_cfg_thumb['height'] = 200;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }


}
