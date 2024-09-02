<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();

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
}
