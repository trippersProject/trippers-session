<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auth_hook {

    public function check_login()
    {
        // CI 인스턴스 가져오기
        $CI =& get_instance();

        // 현재 URI 가져오기
        $current_uri = $CI->uri->uri_string();

        // 'admin' 폴더 내의 URI만 체크하도록 설정
        if (strpos($current_uri, 'admin') === 0) {

            // 'admin/login'으로 시작하는 모든 URI는 제외
            if (strpos($current_uri, 'admin/login') === 0) {
                return; // 'admin/login'으로 시작하는 모든 경로에 대해 체크하지 않음
            }

            // 로그인 상태 확인 (예: 세션에 로그인 정보가 있는지 확인)
            if (!$CI->session->userdata('logged_in')) {
                // 로그인 페이지로 리디렉션
                redirect('admin/login');
            }
        }
    }
}