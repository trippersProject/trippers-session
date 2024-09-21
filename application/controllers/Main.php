<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

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

	public function search_article_list()
	{
		$data = array();

		$keyword = $this->input->get('sk') ? trim($this->input->get('sk')) : '';

		$where = [
			'a.title' => $keyword,
			'a.content' => $keyword,
			'a.tag' => $keyword
		];

		$list = $this->Main_mdl->get_search_article_list($where);

		$data['code'] = "0000";
		$data['msg'] = "검색결과를 조회하였습니다";
		$data['article'] = $list;

		$this->load->view('search_result.php', $data);
	}

	public function articleDetail()
	{
		$data = array();

		$id = $this->input->get('id');
		$u_id = $this->session->userdata('user_id');

		$like_post = $this->Main_mdl->get_like_info($u_id, $id);
		$scrap_post = $this->Main_mdl->get_scrap_info($u_id, $id);

		$data['like_post'] = ($like_post['cnt'] > 0) ? true : false;
		$data['scrap_post'] = ($scrap_post['cnt'] > 0) ? true : false;

		//글 상세 정보
		$data['info'] = $this->Main_mdl->get_article_info($id);

		//조회수 증가
		if(!empty($data['info']))
		{
			update_article_hit($data['info']['id'], $data['info']['hit'] + 1);
		}

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

		//NEWS 글목록
		$article_news = $this->Main_mdl->get_article_list('16');

		//STORY 글목록
		$article_story = $this->Main_mdl->get_article_list('17');

		$data['article'] = array_merge($article_news, $article_story);

		$this->load->view('aboutTripper.php',$data);
	}

	public function archiveTripper() {
		$data = array();

		//배너목록
		$data['banner'] = $this->Main_mdl->get_banners('AC');

		//글목록
		$data['article'] = $this->Main_mdl->get_article_list();

		//크리에이터 글목록
		$data['article_creator'] = $this->Main_mdl->get_article_list('1');

		//우리동네 글목록
		$data['article_dongnae'] = $this->Main_mdl->get_article_list('2');


		$this->load->view('archiveTripper.php',$data);
	}

	//find_item, goods 페이지
	public function findTripperGoods() {
		$data = array();

		//find_item 리스트 조회
		$data['find_item'] = $this->Main_mdl->get_find_item_list();

		//굿즈 리스트 조회
		$data['goods'] = $this->Main_mdl->get_goods_list();

		$this->load->view('findTripperGoods.php',$data);
	}

	//글 좋아요
	public function like_post() {
        //check_login(); // 로그인 여부 체크

		$response = array();
        
        $a_id = $this->input->post('post_id');
        $u_id = $this->session->userdata('user_id');

		if(!$u_id)
		{
			$response['status'] = 'login';
			$response['msg'] = '로그인 후 가능합니다.';
			echo json_encode($response);
			exit;
		}

		$data = array(
            'u_id' => $u_id,
            'a_id' => $a_id,
            'regdate' => date("Y-m-d H:i:s")
        );

        if ($this->Main_mdl->like_post($data)) {

            //저장성공시 포인트 지급 헬퍼 함수 호출
			$point_given = change_user_point($u_id, $a_id, "E", "글 좋아요");

			if($point_given == 1){
				$response['status'] = 'success';
				$response['msg'] = '좋아요 1포인트 적립되었습니다.';

			}elseif($point_given === 'already'){
				$response['status'] = 'already';
				$response['msg'] = '이미 포인트적립 된 글입니다.';

			}else{
				$response['status'] = 'error';
				$response['msg'] = '처리중 문제가 발생하였습니다.';
			}

        } else {
            $response['status'] = 'error';
			$response['msg'] = '처리중 오류가 발생하였습니다.';
        }

		echo json_encode($response);
		exit;
    }

	//글 스크랩
    public function scrap_post() {
        //check_login(); // 로그인 여부 체크
        
        $a_id = $this->input->post('post_id');
        $u_id = $this->session->userdata('user_id');

		if(!$u_id)
		{
			$response['status'] = 'login';
			$response['msg'] = '로그인 후 가능합니다.';
			echo json_encode($response);
			exit;
		}

		$data = array(
            'u_id' => $u_id,
            'a_id' => $a_id,
            'regdate' => date("Y-m-d H:i:s")
        );

        if ($this->Main_mdl->scrap_post($data)) {
            //저장성공시 포인트 지급 헬퍼 함수 호출
			$point_given = change_user_point($u_id, $a_id, "E", "글 스크랩");

			if($point_given == 1){
				$response['status'] = 'success';
				$response['msg'] = '좋아요 1포인트 적립되었습니다.';

			}elseif($point_given === 'already'){
				$response['status'] = 'already';
				$response['msg'] = '이미 포인트적립 된 글입니다.';

			}else{
				$response['status'] = 'error';
				$response['msg'] = '처리중 문제가 발생하였습니다.';
			}

        } else {
            $response['status'] = 'error';
			$response['msg'] = '처리중 오류가 발생하였습니다.';
        }

		echo json_encode($response);
		exit;
    }

	//find_item 정보 조회
	public function get_find_item_info()
	{
		$id = $this->input->post('id');

		$data = array();

		$item = $this->Main_mdl->get_find_item_info($id);

		if(!$item){
			$data['code'] = "9999";
			$data['mag'] = "FIND ITEM 정보 조회에 실패하였습니다.";
			echo json_encode($data);
			exit;
		}

		$data['code'] = "0000";
		$data['mag'] = "FIND ITEM 정보를 조회하였습니다.";
		$data['item'] = $item;
		echo json_encode($data);
		exit;
	}

	//find_item 응모
	public function apply_find_item()
	{
		check_login(); // 로그인 여부 체크

        $id = $this->input->post('id');
		$data = array();     

        if($id) 
		{
			$this->load->model('user_mdl');
			//사용자 포인트 조회
			$user = $this->user_mdl->get_user_by_email($this->session->userdata('email'));

			if(!$user){
				$data['code'] = '9999';
				$data['msg'] = '회원정보 조회에 실패하였습니다.';
				echo json_encode($data);
				exit;
			}

			if($user['point'] <= 0)
			{
				$data['code'] = '9999';
				$data['msg'] = '응모가능한 포인트가 부족합니다.';
				echo json_encode($data);
				exit;
			}

			//사용자 포인트 차감
			$point = $user['point'] -1;

			$res = $this->user_mdl->down_user_point($user['id'], $point);
			if(!$res)
			{
				$data['code'] = '0500';
				$data['msg'] = 'DB ERORR';
				echo json_encode($data);
				exit;
			}

            //포인트 사용로그 기록
			$params=[
				'u_id' => $this->session->userdata('user_id'),
				'f_id' => $id,
				'point_path' => "FIND ITEM 응모",
				'point_gubun' => 'U',
				'point_acount' => 1,
				'record_date' => date("Y-m-d H:i:s"), 
			];

			$result = $this->Main_mdl->apply_find_item($params);
			
			if(!$result)
			{
				$data['code'] = '0500';
           		$data['msg'] = 'DB ERORR';
				echo json_encode($data);
				exit;
			}

        } 
		else 
		{
            $data['code'] = '9999';
            $data['msg'] = '응모에 실패하였습니다 다시 시도해주세요.';
			echo json_encode($data);
			exit;
        }

		$data['code'] = '0000';
        $data['msg'] = 'FIND ITEM 응모되었습니다.';
		echo json_encode($data);
		exit;
	}
}
