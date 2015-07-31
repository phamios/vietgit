<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        redirect('home');
    }

    public function admega() {
        $this->load->model('app_model');
        $response = array();
        $response["status"] = 1;
        $response["store8x"] = array();
        $lists = $this->app_model->list_app_all();
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['cateid'] = $value->appcate;
            $item['icon'] = $value->appicon;
            $item['name'] = $value->app_name;
            $item['created'] = $value->datecreated;
            $item['des'] = $value->appdes;
            $item['link'] = $value->app_link;
            $item['view_count'] = $value->viewcount;
            $item['size'] = $value->filesize;
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    }

    public function gallery($userid) {
        $this->load->model('app_model');
        $response = array();
        $response["store8x"] = array();
        $lists = $this->app_model->show_allgallery($userid);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['img_thumb'] = $value->imageslink;
            $item['link'] = $value->imageslink;
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    }
    
   

    //Xu ly tren Mobile: 
    public function cate_by_user($id) {
        $this->load->model('cateimage_model');
        $response = array();
        $response["store8x"] = array();
        $lists = $this->cateimage_model->list_cate_user($id); 
        if ($lists <> null) {
            foreach ($lists as $value) {
                $item = array();
                $item['id'] = $value->id;
                $item['catename'] = $value->catename;
                $item['cateroot'] = $value->id;
                $item['cateicon'] = $value->cateicon;
                $item['active'] = $value->active;
                $item['count_item'] = rand(100, 9000); //$value->count_item;
                array_push($response["store8x"], $item);
            }
            echo json_encode($response);
        } else {
            $item = array();
            $item['id'] = "0";
            $item['catename'] = "None";
            $item['cateroot'] = 0;
            $item['cateicon'] = null;
            $item['active'] = 1;
            $item['count_item'] = rand(100, 9000); //$value->count_item;
            array_push($response["store8x"], $item);
            echo json_encode($response);
        }
    }

    public function pro_by_cate($userid, $id) {
        $this->load->model('youtube_model');
        $response = array();
        $response["store8x"] = array();
        $lists = $this->youtube_model->get_video_by_cate($userid, $id);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['cateid'] = $value->cateid;
            $item['image'] = $value->video_image;
            $item['name'] = $value->video_name;
            $item['created'] = $value->video_created;
            $item['content'] = $value->video_content;
            $item['link'] = $value->video_link;
            $item['video_duration'] = $value->video_duration; 
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }

        echo json_encode($response);
    }

    public function product($cateid = null) {
        $response = array();
        $response["store8x"] = array();
        $lists = $this->app_content->get_cate();
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['catename'] = $value->catename;
            $item['cateroot'] = $value->cateroot;
            $item['cateimages'] = $value->cateimages;
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    } 
    //------KET THUC XU LY TREN MOBILE
    
    

    public function sms($userid, $api_id) {
        $this->load->model('app_model');
        $this->load->model('api_model');
        $this->load->model('shortcode_model');
        $shortcodes = $this->shortcode_model->list_shortcode();
        $response = array();
        $response["store8x"] = array();
        $datas = $this->api_model->get_api_details($userid, $api_id);
        foreach ($datas as $data) {
            $item = array();
            $item['id'] = $data->id;

            $item['cuphap'] = 'GKD ' . $userid . ' ' . $api_id;
            $item['tin_tra_ve'] = $data->mess;
            foreach ($shortcodes as $shortcode) {
                if ($shortcode->id == $data->cost) {
                    $item['dauso'] = $shortcode->shortcode;
                    $item['gia_tin'] = $shortcode->price;
                }
            }

            $item['active'] = $data->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    }

    public function video($username = null) {
        $this->load->model('user_model');
        $this->load->model('video_model');
        $userid = $this->user_model->checkuserexit($username);
        $response = array();
        $response["store8x"] = array();
        $lists = $this->video_model->list_video_user($userid);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['cateid'] = $value->cateid;
            $item['image'] = $value->video_image;
            $item['name'] = $value->video_name;
            $item['created'] = $value->video_created;
            $item['content'] = $value->video_content;
            $item['link'] = $value->video_link;
            $item['video_duration'] = $value->video_duration;
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    }

    public function app_apk($user_id = null) {
        $this->load->model('user_model');
        $this->load->model('app_model');
        $response = array();
        $response["store8x"] = array();
        $lists = $this->app_model->list_app_userid($user_id);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['cateid'] = $value->catewap;
            $item['appicon'] = $value->appicon;
            $item['app_name'] = $value->app_name;
            $item['created'] = $value->datecreated;
            $item['appdes'] = $value->appdes;
            $item['app_link'] = $value->app_link;
            $item['filesize'] = $value->filesize;
            $item['thumbnails'] = $value->thumbnails;
            $item['score'] = $value->score;
            $item['datePublished'] = $value->datePublished;
            $item['active'] = $value->active;
            array_push($response["store8x"], $item);
        }
        echo json_encode($response);
    }

    // Radio Online Content

    public function list_cate($userid = null) {
        $response = array();
        $response["status"] = 0;
        $response["data"] = array();
        $this->load->model('member/category_content_model');
        $lists = $this->category_content_model->_list($userid);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['name'] = $value->cate_name;
            $item['image'] = "";
            $item['description'] = $value->cate_name;
            $item['created_at'] = $value->timeupdate;
            $item['updated_at'] = $value->timeupdate;
            array_push($response["data"], $item);
        }
        $response['totals'] = $this->category_content_model->_total_cate($userid);
        echo json_encode($response);
    }

    public function radio_bycate($id) {
        $response = array();
        $response["status"] = 0;
        $response["data"] = array();
        $this->load->model('member/category_content_model');
        $this->load->model('member/content_model');
        $lists = $this->content_model->show_all_by_cate($id);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['name'] = $value->title;
            $item['alias'] = "admega-vn-alias";
            $item['length'] = "42";
            $item['likes'] = rand(100, 2000);
            $item['views'] = rand(300, 9999);
            $item['total_comments'] = rand(10, 200);
            $item['downloads'] = rand(100, 2000);
            $item['image'] = $value->imageupload;
            $item['link'] = $value->fileupload;
            $item['no'] = null;
            $item['description'] = $value->content;
            $item['cat_id'] = $value->cateid;
            $item['date'] = $value->timeupdate;
            array_push($response["data"], $item);
        }
        $response['totals'] = $this->category_content_model->_total_content_incate($id);
        echo json_encode($response);
    }

    public function radio_track($id) {
        $response = array();
        $response["status"] = 0;
        $response["data"] = array();
        $this->load->model('member/content_model');
        $lists = $this->content_model->details($id);
        foreach ($lists as $value) {
            $item = array();
            $item['id'] = $value->id;
            $item['name'] = $value->title;
            $item['alias'] = "admega-vn-alias";
            $item['length'] = "42";
            $item['likes'] = rand(100, 2000);
            $item['views'] = rand(300, 9999);
            $item['total_comments'] = rand(10, 200);
            $item['downloads'] = rand(100, 2000);
            $item['image'] = $value->imageupload;
            $item['link'] = $value->fileupload;
            $item['no'] = null;
            $item['description'] = $value->content;
            $item['cat_id'] = $value->cateid;
            $item['date'] = $value->timeupdate;
            array_push($response["data"], $item);
        }
        $response['totals'] = null;
        echo json_encode($response);
    }

}

?>