<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('uploadimage')) {

    function getimage($filename) {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
           echo  $_FILES['file']['name'];
        }
    }

}