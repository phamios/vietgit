<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Openid extends CI_Controller {

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
        $this->lang->load("admin", "vietnam");
        $this->lang->load("menu", "vietnam");
        $this->lang->load("login", "vietnam");
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->load->model('config_model');

        @session_start();
    }

    function index() {
        try {
            # Change 'localhost' to your domain name.
            $openid = $this->load->library('lightopenid', site_url());
            if ($openid->mode) {
                echo $openid->validate() ? 'Logged in.' : 'Failed';
            }
            die;
            if (!$openid->mode) {
                $openid->identity = 'https://www.google.com/accounts/o8/id';
                header('Location: ' . $openid->authUrl());
                $ok = $openid->ValidateWithServer();
                $openid->SetApprovedURL(site_url('admincp/login'));
                $openid->SetTrustRoot(site_url());
                $openid->SetOptionalFields('email');
                $identity = $openid->GetIdentity();
                var_dump($openid);
                die;
            } else {
                $openid->identity = 'https://www.google.com/accounts/o8/id';   
                
                var_dump($openid);
                die;
            }
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

        $data['list_menu'] = $this->modules_model->list_all_active();
        $this->load->view('admincp/dashboard', $data);
    }

}
