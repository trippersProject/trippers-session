<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $this->load->model('admin/Home_mdl', 'Home_mdl');
        // 날짜별 접속자 수 가져오기
        $data['daily_visitors'] = $this->Home_mdl->get_daily_visitors();

        $this->load->view('admin/layout/header.php');  
        $this->load->view('admin/home.php', $data);
	}
}
