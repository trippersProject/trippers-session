<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_item extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/find_item_mdl', 'find_item_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//아이템목록
		$data['list'] = $this->find_item_mdl->get_find_item_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/find_item_list.php', $data);
	}

    //정렬순서 업데이트
    public function update_sort(){
        $id = $this->input->post('id', TRUE);
        $sort = $this->input->post('sort', TRUE);
        $table = "tp_find_item";

        update_sort($table, $id, $sort);
    }

    //사용여부 업데이트
    public function update_use_yn(){
        $id = $this->input->post('id', TRUE);
        $use_yn = $this->input->post('use_yn', TRUE);
        $table = "tp_find_item";

        update_use_yn($table, $id, $use_yn);
    }

    //메인페이지 노출여부 업데이트
    public function update_main_use_yn(){
        $id = $this->input->post('id', TRUE);
        $use_yn = $this->input->post('main_use_yn', TRUE);

        if($id){
            $this->db->where('id', $id);
            $this->db->update('tp_find_item', array('main_use_yn' => $use_yn));

            echo json_encode(array('status' => 'success'));
        }else{
            echo json_encode(array('status' => '필수값 누락'));
        }
    }

    private function generate_unique_filename() {
        // 현재 시간과 랜덤 숫자를 조합하여 고유한 파일명 생성
        return date('YmdHis') . '_' . rand(1000, 9999);
    }

    //아이템 등록화면 이동
	public function apply()	
	{	
        $data = array();

        $this->load->view('admin/layout/header.php');
        $this->load->view('admin/find_item_apply.php', $data);
	}

	//아이템 수정화면 이동
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
        
        $data['info'] = $this->find_item_mdl->get_find_item_info($id);

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/find_item_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//아이템 등록,수정
	public function regi_find_item() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $name = $this->input->post('name', TRUE);
            $use_point = $this->input->post('use_point', TRUE);
            $content = $this->input->post('content', FALSE);
            $content_sub = $this->input->post('content_sub', FALSE);
            
            $find_item = $this->find_item_mdl->get_find_item_info($id);

            if(empty($find_item) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }

            // 대표 이미지 업로드 처리
            $thumbnail = null;
            if (!empty($_FILES['thumbnail']['name'])) 
            { 
                $config['upload_path'] = 'images/find_item/';
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
                $thumbnail = $find_item['thumbnail'];
            }

            //데이터베이스에 저장
            $data = array(
                'name'          => $name,
                'use_point'     => $use_point,
                'content'       => $content,
                'content_sub'   => $content_sub,
                'thumbnail'     => $thumbnail,
                'regdate'       => date('Y-m-d H:i:s'),
            );
            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->find_item_mdl->update_find_item($id, $data);

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
                $res = $this->find_item_mdl->insert_find_item($data);

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

    //파인드아이템 삭제
	public function item_delete()	
	{	
		$id = $this->input->post('id', TRUE);

        $result = array();
        $data = array();

        if(empty($id))
        {
            $result['msg'] = "id가 없습니다";
            json_encode($result);
            exit;
        }
        
        $info = $this->find_item_mdl->get_find_item_info($id);

        if (!empty($info))
        {
            //delete헬퍼
            $res = delete_record('tp_find_item', $id);

            if($res == true)
            {
                $result['code'] = "0000";
                $result['msg'] = "삭제되었습니다.";
            }else{
                $result['code'] = "9999";
                $result['msg'] = "처리중 에러가 발생하였습니다";
            }
		}else{
            $result['code'] = "9999";
			$result['msg'] = "조회된 정보가 없습니다";        
		}
        echo json_encode($result);
        exit;
	}
}
