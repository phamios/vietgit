<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Media extends CI_Controller {

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
        $this->load->model('cateimage_model');
        $this->load->model('modules_model');
        $this->load->model('media_model');
        $this->load->model('youtube_model');
        $this->load->model('user_model');
        @session_start();
    }

    function index($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_category'] = $this->cateimage_model->list_cate_user($this->session->userdata('admin_id'));
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_user'] = $this->user_model->list_all_member();
            $i = 0;
            if (isset($_REQUEST['btt_submit'])) {
                $name = $this->input->post('catename', true);
                $root = $this->input->post('cateroot', true);
                $type = $this->input->post('catetype', true);
                $active = $this->input->post('active', true);
                $this->cateimage_model->insert($this->session->userdata('admin_id'), $name, $root, $type, $active);
                redirect('admincp/media');
            }

            $this->load->view('admincp/dashboard', $data);
        }
    }

    function edit_catenews($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_cate_image'] = $this->cateimage_model->list_all_type(1,$this->session->userdata('admin_id'));
            $data['list_cate_video'] = $this->cateimage_model->list_all_type(2,$this->session->userdata('admin_id'));

            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            if (isset($_REQUEST['btt_submitedit'])) {
                $name = $this->input->post('catename', true);
                $root = $this->input->post('cateroot', true);
                $type = $this->input->post('catetype', true);
                $active = $this->input->post('active', true);
                $this->cateimage_model->update($id, $name, $root, $type, $active);
                redirect('admincp/media');
            }
            if ($id <> null) {
                $data['id'] = $id;
                $data['catedetails'] = $this->cateimage_model->details($id);
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function del_catenews($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('cateimage_model');
            $this->cateimage_model->delete($id);
            redirect('admincp/media');
        }
    }

    function create_new() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_cate_image'] = $this->cateimage_model->list_all_type(1,$this->session->userdata('admin_id'));
            $data['list_cate_video'] = $this->cateimage_model->list_all_type(2,$this->session->userdata('admin_id'));

            $data['list_menu'] = $this->modules_model->list_all_active();
            if (isset($_REQUEST['btt_submit_insertlink'])) {
                $this->load->library('youtube');
                $mediatype = $this->input->post('mediatype', true);
                $video_mode = $this->input->post('video_mode', true);
                $youtube_mode = $this->input->post('youtube_mode', true);
                $media_link = $this->input->post('media_link', true);
                $media_cateid = $this->input->post('media_cateid_video', true);
                if ($video_mode == 0 && $youtube_mode == 0) {
                    $video_link = $media_link;
                    $userid = $this->session->userdata('admin_id');
                    $cateid = $media_cateid;
                    $youtube = $this->youtube->get_youtube($video_link);
                    $title = $youtube['title'];
                    $content = $youtube['content'];
                    $image = $youtube['image'];
                    $duration = $youtube['duration'];
                    $this->youtube_model->add_video($cateid, $userid, $title, $video_link, $content, $image, $duration, 1, $video_mode, $youtube_mode);
                } elseif ($video_mode == 0 && $youtube_mode == 1) {
                    $video_link = $media_link;
                    $userid = $this->session->userdata('admin_id');
                    $cateid = $media_cateid;
                    $playlist = $this->youtube->getPlaylist($video_link);
                    foreach ($playlist as $videos) {
                        $youtube = $this->youtube->get_youtube("https://www.youtube.com/watch?v=" . $videos, 1);
                        $link = "https://www.youtube.com/watch?v=" . $videos;
                        $title = $youtube['title'];
                        $content = $youtube['content'];
                        $image = $youtube['image'];
                        $duration = $youtube['duration'];
                        $this->youtube_model->add_video($cateid, $userid, $title, $link, $content, $image, $duration, 1, $video_mode, $youtube_mode);
                    }
                }
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function del_media_video($id = null) {
        if ($this->session->userdata('userid') == null) {
            redirect('user/login');
        } else {
            $data['username'] = $this->session->userdata('username');
            $this->load->model('youtube_model');
            $userid = $this->session->userdata('userid');
            $this->youtube_model->del_video($userid, $id);
            redirect('user/video');
        }
    }

    function pictures() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function video() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_cate_video'] = $this->cateimage_model->list_all_type(2,$this->session->userdata('admin_id')); 
            $config['base_url'] = site_url('admincp/videos');
            $config['total_rows'] = $this->youtube_model->total_media($this->session->userdata('admin_id'));
            $config['per_page'] = 5;
            $config['num_links'] = 2;
            $config['prev_link'] = 'First';
            $config['next_link'] = 'Next';
        
            $this->pagination->initialize($config);
            $userid = $this->session->userdata('admin_id');
            
            $data["list_video"] = $this->youtube_model->list_video_user($userid, $config['per_page'], $this->uri->segment(3));
           
            $data['pages'] = $this->pagination->create_links();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function del_video($userid, $id) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->youtube_model->del_video($userid, $id);
            redirect('admincp/videos');
        }
    }

    function delete_all() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $userid = $this->session->userdata('admin_id');
            if (isset($_REQUEST['btt_submit_del_all'])) {
                $videos = $this->input->post('check', true);
                foreach ($videos as $video) { 
                     $this->youtube_model->del_video($userid, $video);
                } 
                redirect('admincp/videos');
            }
        }
    }

}
