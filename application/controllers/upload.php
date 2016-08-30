<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class upload extends CI_Controller {

public function __construct() {
  parent::__construct();
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('form_validation');
}

public function index() {
    $rand = rand(100000, 999999);

    if ( 0 < $_FILES['file']['error'] ) {
      echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
      move_uploaded_file($_FILES['file']['tmp_name'], "nectorimg/".$rand.".png");
	   echo getenv( 'SOIREE_BASE_URL' ) . '/nectorimg/'.$rand.'.png';
    }
     
  }
}
