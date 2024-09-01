<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('admin/login_mdl', 'login_mdl'); // 모델에서 로그인 로직 처리
    }

    public function index() {
        // 로그인 페이지 로드
        $this->load->view('admin/login');
    }

    public function authenticate() {
        // 입력된 데이터 가져오기
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // 모델을 사용해 사용자 인증 시도
        $admin = $this->login_mdl->login($username, $password);

        if($admin){
            // 로그인 성공
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('admin_id', $admin->email);
            $this->session->set_userdata('admin_username', $admin->name);

            // 관리자 페이지로 리다이렉트
            redirect('admin/home');
        } else {
            // 로그인 실패 시 에러 메시지와 함께 다시 로그인 페이지로
            echo "<script>alert('이메일또는 비밀번호가 다릅니다.');return;</script>";
            redirect('admin/login');
        }

    }

    public function logout() {
        // 세션 삭제로 로그아웃 처리
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');

        // 로그인 페이지로 리다이렉트
        redirect('admin/login');
    }
}
