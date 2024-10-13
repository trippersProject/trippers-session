<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('User_mdl', 'user_mdl');
		$this->load->library('email');
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
            // 로그인 실패 시 에러 메시지와 함께 다시 로그인 페이지로
            echo "<script>
                    alert('이메일 또는 비밀번호가 다릅니다.');
                    window.location.href = '".site_url('/login')."';
                </script>";
            exit;
        }
    }

	//비밀번호 찾기(임시비밀번호 메일전송)
	public function reset_password() {
        $email = $this->input->post('email');

        // 이메일이 존재하는지 확인
        $user = $this->user_mdl->get_user_by_email($email);

        if ($user) {
            // 임시 비밀번호 생성
            $temp_password = $this->generate_temp_password();

            // 임시 비밀번호 암호화
            $encrypted_password = md5($temp_password);

            // 데이터베이스에 임시 비밀번호 저장
            $this->user_mdl->update_password($email, $encrypted_password);

            // 이메일 발송
            $result = $this->send_email($email, $temp_password);

			if(!$result) {
				 echo $this->email->print_debugger();
			}

            // 성공 메시지 출력
			echo "<script>
					alert('임시비밀번호가 이메일로 발송되었습니다.');
					window.location.href = '".site_url('/login')."';
				</script>";
				exit;
        } else {
            // 실패 메시지 출력
            echo "<script>alert('회원정보 조회에 실패하였습니다.'); history.back();</script>";
			exit;
        }

        // 비밀번호 찾기 페이지로 리다이렉트
        redirect('/main');
    }

	//임시비밀번호 생성
    private function generate_temp_password($length = 8) {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
    }

	//이메일 전송
    private function send_email($to_email, $temp_password) {
		//메일설정 세팅
		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'trippers.me0@gmail.com',
			'smtp_pass' => 'zwrudvvohygxdsjl',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		));

        $this->email->from('admin@trippers.com', '트리퍼스 관리자');
        $this->email->to($to_email);
        $this->email->subject('트리퍼스 임시 비밀번호 안내');
        $this->email->message("발급된 임시 비밀번호는 다음과 같습니다: <strong>". $temp_password ."</strong><br/>".
							  "로그인 후 비밀번호를 변경해주세요.<br/><br/>".
							  "사이트이름: tripper<br/>".
							  "사용자 아이디: ".$to_email."<br/><br/>".
							  "본인이 아닌 사람이 요청한 경우, 이 이메일을 무시하세요."
							);

        return $this->email->send();
    }

}
