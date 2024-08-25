<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

	public function __construct() {
    parent::__construct();
  }

	public function index()
	{
    $this->mypage();
	}

	public function mypage() {
		$data = array();

		$this->load->view('mypage.php',$data);
	}
}
