<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->log_visitor();//접속자 로그 기록

        $this->load->model('Main_mdl');
        
        // 검색창 최신 글목록
        $where = '';
        $order_by = 'a.regdate';
        $data['article_recent'] = $this->Main_mdl->get_where_article_list($where, $order_by);

        // 검색창 조회수 높은 글목록
        $where = '';
        $order_by = 'a.hit';
        $data['article_popular'] = $this->Main_mdl->get_where_article_list($where, $order_by);

        // 데이터를 전역적으로 사용할 수 있도록 설정
        $this->load->vars($data);
    }

    // 접속자 정보를 기록하는 메소드
    protected function log_visitor() {
        // IP 수집
        $ip_address = $this->input->ip_address();       
        //유입경로
        $current_page = current_url();

        $today = date('Y-m-d');

        // 오늘 해당 IP와 페이지에 대한 기록이 있는지 확인
        $this->db->where('ip_address', $ip_address);
        $this->db->where('current_page', $current_page);
        $this->db->where('DATE(timestamp)', $today);
        $existing = $this->db->get('tp_visitor')->row();

        // 기존 기록이 없다면, 로그 저장
        if (!$existing) {
            // 브라우저 정보 가져오기
            $this->load->library('user_agent');
            if ($this->agent->is_browser()) {
                $agent = $this->agent->browser().' '.$this->agent->version();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot();
            } elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile();
            } else {
                $agent = 'Unidentified User Agent';
            }

            // 접속 시간
            $timestamp = date('Y-m-d H:i:s');

            // 로그 저장을 위한 데이터 배열 생성
            $data = array(
                'ip_address' => $ip_address,
                'user_agent' => $agent,
                'current_page' => $current_page,
                'timestamp' => $timestamp
            );

            // 데이터베이스에 저장
            $this->load->model('User_mdl');
            $this->User_mdl->save_visitor($data);
        }
    }
}
