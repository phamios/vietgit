<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Moduledmos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->lang->load("menu", "vietnam");
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $lang = $this->config->item('language_site');
        $this->lang->load($lang, $lang);
        $this->load->model('modules_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->lang->load("admin", "vietnam");
        @session_start();
    }

    function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    //Always have this function for each class 
    /*
     * Create New Function
     */
    function create_new($param = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            if ($param <> null) {
//                $type = $this->read_type($param);
//                if ($type == 'admin') {
//                    $module_type = '1';
//                } elseif ($type == 'view') {
//                    $module_type = '2';
//                }

                $type = $this->read_xml($param);

                $array_param = array(
                    'mod_name' => $param,
                    'mod_slug' => trim($this->read_title($param)),
                    'mod_link' => site_url($param),
                    'mod_autoload' => 1,
                    'mod_active' => 1,
                    'mod_type' => $type,
                );

                $this->modules_model->add_new($array_param);
                redirect('admin/moduledmos');
            }
            $array = $this->list_dir();
            $data['arr_modules'] = $array;
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function updatedb($file) {
        $sqlFileToExecute = './application/modules/' . trim($file) . '/'.trim($file).'.sql';
        $f = fopen($sqlFileToExecute, "r+");
        $sqlFile = fread($f, filesize($sqlFileToExecute));
        $sqlArray = explode(';', $sqlFile);
        $sqlErrorCode = null;
        foreach ($sqlArray as $stmt) {
            if (strlen($stmt) > 3 && substr(ltrim($stmt), 0, 2) != '/*') {
                $result = mysql_query($stmt);
                if (!$result) {
                    $sqlErrorCode = mysql_errno();
                    $sqlErrorText = mysql_error();
                    $sqlStmt = $stmt;
                    break;
                }
            }
        }
        if ($sqlErrorCode == 0) {
            echo "Script is executed succesfully!";
            redirect('admin/moduledmos');
        } else {
            echo "An error occured during installation!<br/>";
            echo "Error code: $sqlErrorCode<br/>";
            echo "Error text: $sqlErrorText<br/>";
            echo "Statement:<br/> $sqlStmt<br/>";
        }
    }

    function read_xml($file) {
        $xml = simplexml_load_file('./application/modules/' . trim($file) . '/note.xml');
        foreach ($xml->modules_type as $key => $value) {
            return $value->type;
        }
    }
    
    function read_title($file) {
        $xml = simplexml_load_file('./application/modules/' . trim($file) . '/note.xml');
        foreach ($xml->title as $key => $value) {
            return $value->content;
        }
    }

    function delete($param) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->modules_model->delete_by_name($param);
            redirect('admin/moduledmos');
        }
    }

    function list_dir() {
        $arr = array();
        if ($handle = opendir('./application/modules')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if ($entry != ".DS_Store") {
                        array_push($arr, "$entry\n");
                    }
                }
            }
            closedir($handle);
        }
        return $arr;
    }

    function read_type($folder) {
        $myFile = './application/modules/' . trim($folder) . '/type.txt';
        $fh = fopen($myFile, 'r');
        $theData = fread($fh, 500);
        fclose($fh);
        return trim($theData);
    }

}
