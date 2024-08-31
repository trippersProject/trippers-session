<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('User_mdl', 'user_mdl');
    }

	public function index()
	{
      $this->login();
	}

    public function login(){

		$this->load->view('login.php');
	}

	public function user_join(){

		$this->load->view('user_join.php');
	}

	public function find_password(){

		$this->load->view('find_password.php');
	}

	//회원가입하기
	public function join_user(){

		$name = $this->input->post('username');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');

		// 이메일 중복 체크
		if ($this->user_mdl->email_exists($email)) {
			// 이메일아이디 중복확인
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => '이미 사용 중인 이메일입니다.']));
			return;
		}

		// 연락처 특수문자 제거
		$phone = preg_replace('/[^0-9]/', '', $phone);

		// 회원정보 입력 데이터
		$user_data = [
			'name' => $name,
			'auth_level' => 11, // 일반회원 권한 레벨 11 고정
			'email' => $email,
			'password' => md5($password), // MD5 암호화
			'phone' => $phone,
			'point' => 0, // 초기 포인트 0
			'terms_agree' => 'Y', // 이용약관 동의 여부
			'subscribe_agree' => 'Y', // 구독 동의 여부
			'regdate' => date('Y-m-d H:i:s'), // 현재 시간
		];

		// 회원 정보 저장
		if ($this->user_mdl->insert_user($user_data)) {

			// 사용자 인증
			$user = $this->user_mdl->get_user_by_email($email);

			//로그인 세션데이터 저장
			$this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('email', $user['email']);
            $this->session->set_userdata('name', $user['name']);
            $this->session->set_userdata('auth_level', $user['auth_level']);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => true, 'redirect' => '/main']));
		} else {
			// 실패 시 처리
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => '회원가입 중 오류가 발생했습니다.']));
		}
	}

	//회원 로그인
	public function user_login() {
        // 폼으로부터 전달된 데이터 수신
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // 이메일과 비밀번호가 입력되었는지 확인
        if (empty($email) || empty($password)) {
            echo "<script>alert('이메일 또는 비밀번호를 입력해주세요.'); return;</script>";
            redirect('/login'); // 로그인 페이지로 리디렉션
            return;
        }

        // 사용자 인증
        $user = $this->user_mdl->get_user_by_email($email);

		if ($user && $user['password'] === md5($password)) {
            // 로그인 성공
            // 세션에 사용자 정보 저장
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('email', $user['email']);
            $this->session->set_userdata('name', $user['name']);
            $this->session->set_userdata('auth_level', $user['auth_level']);

            // 메인 페이지로 리디렉션
            redirect('/main');
        } else {
            // 로그인 실패
            echo "<script>alert('이메일또는 비밀번호가 일치하지 않습니다.'); return;</script>";
            redirect('/login'); // 로그인 페이지로 리디렉션
            return;
        }
    }

}
