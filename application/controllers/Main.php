<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
		//$this->load->library('session');
		$this->load->model('Main_mdl');
    }

	public function index()
	{
      $this->main();
	}

	public function main(){
		$data = array();
		
		//메인 상단배너
		$data['mt_banners'] = $this->Main_mdl->get_banners('MT');
		//메인 하단배너
		$data['mb_banners'] = $this->Main_mdl->get_banners('MB');

		//상단 크리에이터 글목록
		$data['article_creator'] = $this->Main_mdl->get_article_list('1');
		//하단 우리동네 글목록
		$data['article_dongnae'] = $this->Main_mdl->get_article_list('2');

		//FIND ITEM 목록
		$data['find_item'] = $this->Main_mdl->get_find_item_list('main');

		$this->load->view('main.php',$data);
	}

	public function articleDetail() {
		$data = array();

		$id = $this->input->get('id');

		//글 상세 정보
		$data['info'] = $this->Main_mdl->get_article_info($id);

		//c_id(크리에이터 아이디)가 있으면
		if($data['info']['c_id'] != '0'){
			//글 크리에이터 정보 조회
			$data['creator'] = $this->Main_mdl->get_creator_info($data['info']['c_id']);
			//크리에이터의 연관콘텐츠 리스트 조회
			$data['article_list'] = $this->Main_mdl->get_article_list('1', $data['info']['c_id']);

		//p_id(매장 아이디)가 있으면
		}else if($data['info']['p_id'] != '0'){
			//글 매장 정보 조회
			$data['place'] = $this->Main_mdl->get_palce_info($data['info']['p_id']);
			//매장 연관콘텐츠 리스트 조회
			$data['article_list'] = $this->Main_mdl->get_article_list('2', $data['info']['p_id']);
		}

		$this->load->view('articleDetail.php',$data);
	}

	public function aboutTripper() {
		$data = array();

		$this->load->view('aboutTripper.php',$data);
	}

	public function archiveTripper() {
		$data = array();

		$this->load->view('archiveTripper.php',$data);
	}

	public function findTripperGoods() {
		$data = array();

		$this->load->view('findTripperGoods.php',$data);
	}

	//글 좋아요
	public function like_post() {
        check_login(); // 로그인 여부 체크
        
        $a_id = $this->input->post('post_id');
        $u_id = $this->session->userdata('user_id');

		$data = array(
            'u_id' => $u_id,
            'a_id' => $a_id,
            'regdate' => date("Y-m-d H:i:s")
        );

        if ($this->Main_mdl->like_post($data)) {

            //저장성공시 포인트 지급 헬퍼 함수 호출
			$point_given = change_user_point($u_id, $a_id, "E", "글 좋아요");

			if($point_given == true){
				echo json_encode(['status' => 'success']);
			}else{
				echo json_encode(['status' => 'error']);
			}
			
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

	//글 스크랩
    public function scrap_post() {
        check_login(); // 로그인 여부 체크
        
        $a_id = $this->input->post('post_id');
        $u_id = $this->session->userdata('user_id');

		$data = array(
            'u_id' => $u_id,
            'a_id' => $a_id,
            'regdate' => date("Y-m-d H:i:s")
        );

        if ($this->Main_mdl->scrap_post($data)) {
            //저장성공시 포인트 지급 헬퍼 함수 호출
			$point_given = change_user_point($u_id, $a_id, "E", "글 스크랩");

			if($point_given == true){
				echo json_encode(['status' => 'success']);
			}else{
				echo json_encode(['status' => 'error']);
			}

        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
