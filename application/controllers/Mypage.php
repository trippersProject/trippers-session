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
	
	//회원정보 수정
	public function modify_user_info()
	{
		$id = $this->session->userdata('user_id'); //로그인여부
		$user_name = trim($this->input->post('username'));
		$phone = trim($this->input->post('phone'));
		$password = trim($this->input->post('password'));
		
		$data = array();

		if(empty($id))
		{
			echo "<script>alert('로그인후 이용해주세요.);</script>";
			redirect('/login');
			exit;
		}

		$user_info = $this->user_mdl->get_user_by_email($this->session->userdata('email'));

		if(!$user_info){
			$data['code'] = "9999";
			$data['msg'] = "회원정보 조회에 실패하였습니다";
			echo json_encode($data);
			exit;
		}

		$params = [
			'name' => $user_name,
			'phone' => $phone,
			'password' => md5($password),
		];

		$result = $this->user_mdl->modify_user_info($id, $params);

		if(!$result){
			$data['code'] = "0500";
			$data['msg'] = "DB_ERROR";
			echo json_encode($data);
			exit;
		}

		$data['code'] = "0000";
		$data['msg'] = "회원정보가 수정되었습니다";
		echo json_encode($data);
		exit;
	}

	//회원 탈퇴처리
	public function dismiss_user()
	{
		$id = $this->session->userdata('user_id'); //로그인여부
		
		$data = array();

		if(empty($id))
		{
			echo "<script>alert('로그인후 이용해주세요.);</script>";
			redirect('/login');
			exit;
		}

		//회원정보 조회
		$user_info = $this->user_mdl->get_user_by_email($this->session->userdata('email'));

		if(!$user_info){
			$data['code'] = "9999";
			$data['msg'] = "회원정보 조회에 실패하였습니다";
			echo json_encode($data);
			exit;
		}

		//회원정보 삭제
		$result = $this->user_mdl->delete_user_info($id);
		//스크랩 정보 삭제
		$scrap_result = $this->user_mdl->delete_user_scrap($id);
		//게시글 좋아요 삭제
		$like_result = $this->user_mdl->delete_user_like($id);

		//로그인 세션정보 삭제
		session_destroy();

		if(!$result || !$scrap_result || !$like_result){
			$data['code'] = "0500";
			$data['msg'] = "DB_ERROR";
			echo json_encode($data);
			exit;
		}

		$data['code'] = "0000";
		$data['msg'] = "탈퇴처리 되었습니다";
		echo json_encode($data);
		exit;
	}
}
