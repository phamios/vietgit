<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class MainProduct extends CI_Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function app_video() {
        $this->load->view('home4/index');
    }
    function app_content(){
        $this->load->view('home4/index');
    }
    function app_walpaper(){
        $this->load->view('home4/index');
    }
    function app_business(){
        $this->load->view('home4/index');
    }
    function appvideo_beautiful(){
        $this->load->view('home4/index');
    }
    function appvideo_backend(){
        $this->load->view('home4/index');
    }
    function appvideo_content(){
        $this->load->view('home4/index');
    }
    function appvideo_users(){
        $this->load->view('home4/index');
    }
    
    
}
?>