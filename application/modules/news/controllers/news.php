<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SimpleXMLExtended extends SimpleXMLElement {

    public function addCData($cdata_text) {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($cdata_text));
    }

}

class News extends MX_Controller {

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
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('news_model');
        $this->load->model('categories/categories_model');
        $this->load->model('catenews_model');
        $this->load->model('user_model');

        @session_start();
    }

    public function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_category'] = $this->categories_model->list_all();
            $data['list_user'] = $this->user_model->list_all_member();
            $data['list_catenews'] = $this->catenews_model->list_all_byuser($this->session->userdata('admin_id'));
            if (isset($_REQUEST['btt_submit_search'])) {
                $keyword = $this->input->post('keyword', true);
                $data['list_news'] = $this->news_model->search_keyword($keyword);
            } else {
                $data['list_news'] = $this->news_model->list_all_bycate($this->session->userdata('admin_id'));
            }
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function export_content() {
        $userid = $this->session->userdata('admin_id');
        $cates = $this->catenews_model->list_all_byuser($userid);
        foreach ($cates as $cate) {
            $news = $this->news_model->list_all_bycate($userid,$cate->id);
            $xml = new SimpleXMLExtended("<root></root>"); 
            foreach ($news as $new) {
                $xml_post = $xml->addChild('story');
                $xml_post->addChild('story_id', $new->id);
                $title = $xml_post->addChild('story_title');
                $title->addCData($new->news_title);
                $descript = $xml_post->addChild('story_des');
                $descript->addCData($new->news_des);
            }
            $dom = new DOMDocument("1.0");
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML($xml->asXML());
            $xml->asXML('export/'.$userid.'/category_' . $cate->id . '.xml');
        }
    }

    public function export_category() {
        $id = $this->session->userdata('admin_id');
        $cates = $this->catenews_model->list_all_byuser($id);
        $xml = new SimpleXMLExtended("<root></root>");
        foreach ($cates as $cate) {
            $xml_post = $xml->addChild('category');
            $xml_post->addChild('cat_id', $cate->id);
            $content = $xml_post->addChild('cat_name');
            $content->addCData($cate->catenewsname);
        }
        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $xml->asXML('export/'.$id.'/category.xml');
    }

    public function create_new() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_catenews'] = $this->catenews_model->list_all();
            if (isset($_REQUEST['btt_submit'])) {
                $news_cateid = $this->input->post('news_cateid', true);
                $news_type = $this->input->post('news_type', true);
                $news_title = $this->input->post('news_title', true);
                $news_short = $this->input->post('news_short', true);
                $news_des = $this->input->post('news_des', true);
                $news_active = $this->input->post('news_active', true);
                $params = array(
                    'news_cateid' => $news_cateid,
                    'news_title' => $news_title,
                    'news_short' => $news_short,
                    'news_des' => $news_des,
                    'news_active' => $news_active,
                    'userid' => $this->session->userdata('admin_id'),
                );
                $proid = $this->news_model->insert($params);
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->news_model->updateimagepro($imageid[$i], $proid);
                }
                redirect('news/index');
            }
            $data['list_category'] = $this->categories_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function update($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $data['list_catenews'] = $this->catenews_model->list_all();

            $data['list_menu'] = $this->modules_model->list_all_active();
            //$data['list_product'] = $this->news_model->list_all();
            if (isset($_REQUEST['btt_submit'])) {
                $news_cateid = $this->input->post('news_cateid', true);
                $news_type = $this->input->post('news_type', true);
                $news_title = $this->input->post('news_title', true);
                $news_short = $this->input->post('news_short', true);
                $news_des = $this->input->post('news_des', true);
                $news_active = $this->input->post('news_active', true);
                $params = array(
                    'id' => $id,
                    'news_cateid' => $news_cateid,
                    'news_title' => $news_title,
                    'news_short' => $news_short,
                    'news_des' => $news_des,
                    'news_active' => $news_active,
                    'userid' => $this->session->userdata('admin_id'),
                );
                $proid = $this->news_model->update($params);
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->news_model->updateimagepro($imageid[$i], $proid);
                }
                redirect('news/index');
            }
            $data['list_product'] = $this->news_model->details($id);
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

            $image_id = $this->news_model->insert_image($file, null);

            echo "<input type='hidden' value='" . $image_id . "' name='file_image[]' />";
            echo "<img src='" . base_url('uploads') . '/' . $file . "' width='10%' alt='image' />";
            die;
        }
    }

    public function delete($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->news_model->delete($id);
            redirect('news/index');
        }
    }

}
