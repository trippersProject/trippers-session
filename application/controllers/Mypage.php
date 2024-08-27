<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

	public function __construct() 
	{
    	parent::__construct();
		$this->load->model('user_mdl');
  	}

	public function index()
	{
    	$this->mypage();
	}

	public function mypage() 
	{
		$data = array();
		$id = $this->session->userdata('user_id');
		$email = $this->session->userdata('email');
		
		$info = $this->user_mdl->get_user_by_email($email);

		$like_article = $this->user_mdl->get_user_like_article($id);
		$scrap_article = $this->user_mdl->get_user_scrap_article($id);
		$use_point = $this->user_mdl->get_user_use_point($id);

		$data['info'] = $info;
		$data['like_article'] = $like_article;
		$data['scrap_article'] = $scrap_article;
		$data['use_point'] = $use_point['cnt'];

		$this->load->view('mypage.php', $data);
	}
}
