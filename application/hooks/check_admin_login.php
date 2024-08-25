<?php
function check_admin_login() {
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->helper('url');
    
    // 현재 URI 경로 가져오기
    $uri_string = $CI->uri->uri_string();

    // Login 컨트롤러 관련 경로는 모두 검사에서 제외
    if (strpos($uri_string, 'login') !== false) {
        return; // Login 경로가 포함된 모든 URI는 체크에서 제외
    }

    echo "sdfsdafsdfasd:";
    print_r($CI->session->userdata);
    exit;

    // 모든 /admin 하위 경로에 대해 로그인 체크 수행
    if (strpos($uri_string, 'admin') === 0) {
        if (!$CI->session->userdata('logged_in')) {
            // 로그인되지 않은 경우 로그인 페이지로 리디렉트
            redirect('admin/login');
        }
    }
}