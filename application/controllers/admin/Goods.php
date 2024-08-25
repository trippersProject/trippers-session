<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/goods_mdl', 'goods_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//글목록
		$data['list'] = $this->goods_mdl->get_goods_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/goods_list.php', $data);
	}

    //정렬순서 업데이트
    public function update_sort(){
        $id = $this->input->post('id', TRUE);
        $sort = $this->input->post('sort', TRUE);
        $table = "tp_goods";

        update_sort($table, $id, $sort);
    }

    //사용여부 업데이트
    public function update_use_yn(){
        $id = $this->input->post('id', TRUE);
        $use_yn = $this->input->post('use_yn', TRUE);
        $table = "tp_goods";

        update_use_yn($table, $id, $use_yn);
    }

	//작성글 저장
	public function apply_goods()
	{	
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('content', FALSE);  // XSS 필터링하지 않음
		$category = $this->input->post('category', TRUE);
		$category_sub = $this->input->post('category_sub', TRUE);
	}

	//본문 첨부 이미지 저장
	public function upload_image() {
        if ($_FILES['file']['name']) {
            $config['upload_path'] =  "images/goods/";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
            $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
            //$config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
            } else {
                $data = $this->upload->data();
                $file_path = base_url("images/goods/".$data['file_name']);
                echo $file_path;
            }
        }
    }

    private function generate_unique_filename() {
        // 현재 시간과 랜덤 숫자를 조합하여 고유한 파일명 생성
        return date('YmdHis') . '_' . rand(1000, 9999);
    }

    //글 등록화면 이동
	public function apply()	
	{	
        $data = array();

        $this->load->view('admin/layout/header.php');
        $this->load->view('admin/goods_apply.php', $data);
	}

	//작성글 수정화면 이동
	public function modify()	
	{	
		$id = $this->input->get('id', TRUE);

        $result = array();
        $data = array();

        if(empty($id))
        {
            $result['msg'] = "id가 없습니다";
            json_encode($result);
            exit;
        }
        
        $data['info'] = $this->goods_mdl->get_goods_info($id);

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/goods_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//작성글 등록,수정
	public function regi_goods() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $goods_name = $this->input->post('goods_name', TRUE);
            $normal = $this->input->post('normal', TRUE);
            $price = $this->input->post('price', TRUE);
            $url = $this->input->post('url', TRUE);
            
            $goods = $this->goods_mdl->get_goods_info($id);

            if(empty($goods) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }

            // 썸네일 이미지 업로드 처리
            $thumbnail = null;
            if (!empty($_FILES['thumbnail']['name'])) 
            { 
                $config['upload_path'] = 'images/goods/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('thumbnail')) {

                    $data = $this->upload->data();

                    $thumbnail = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $thumbnail = $goods['thumbnail'];
            }

            //데이터베이스에 저장
            $data = array(
                'goods_name'=> $goods_name,
                'normal'    => $normal,
                'price'     => $price,
                'url'       => $url,
                'thumbnail' => $thumbnail,
                'regdate'   => date('Y-m-d H:i:s'),
            );
            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->goods_mdl->update_goods($id, $data);

                if($res)
                {
                    $result['msg'] = "수정되었습니다";
                }
                else
                {
                    $result['msg'] = "수정 실패하였습니다";
                }
            }
            //id값 없으면 insert
            else
            {
                $res = $this->goods_mdl->insert_goods($data);

                if($res)
                {
                    $result['msg'] = "저장되었습니다";
                }
                else
                {
                    $result['msg'] = "저장 실패하였습니다";
                }
            }
        }else{
            $result['msg'] = "입력된 정보가 없습니다.";
        }

        echo json_encode($result);
        exit;
    }
}
