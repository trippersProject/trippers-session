<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creator extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/creator_mdl', 'creator_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//글목록
		$data['list'] = $this->creator_mdl->get_creator_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/creator_list.php', $data);
	}

	//작성글 저장
	public function apply_creator()
	{	
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('content', FALSE);  // XSS 필터링하지 않음
		$category = $this->input->post('category', TRUE);
		$category_sub = $this->input->post('category_sub', TRUE);
	}

	//본문 첨부 이미지 저장
	public function upload_image() {
        if ($_FILES['file']['name']) {
            $config['upload_path'] =  "images/creator/";
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
                $file_path = base_url("images/creator/".$data['file_name']);
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
        $this->load->view('admin/creator_apply.php', $data);
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
        
        $data['info'] = $this->creator_mdl->get_creator_info($id);

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/creator_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//작성글 등록,수정
	public function regi_creator() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $name = $this->input->post('name', TRUE);
            $sub_name = $this->input->post('sub_name', TRUE);
            $tag = $this->input->post('tag', TRUE);
            $description = $this->input->post('description', TRUE);
            $homepage_url = $this->input->post('homepage_url', TRUE);
            $sns_url_1 = $this->input->post('sns_url_1', TRUE);
            $sns_url_2 = $this->input->post('sns_url_2', TRUE);
            $sns_url_3 = $this->input->post('sns_url_3', TRUE);  
            
            $creator = $this->creator_mdl->get_creator_info($id);

            if(empty($creator) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }

            // 프로필 이미지 업로드 처리
            $profile_image = null;
            if (!empty($_FILES['profile_image']['name'])) 
            { 
                $config['upload_path'] = 'images/creator/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);
                //config 초기화
                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_image')) {

                    $data = $this->upload->data();

                    $profile_image = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $profile_image = $creator['profile_image'];
            }

            // 대표 이미지 업로드 처리
            $banner_image = null;
            if (!empty($_FILES['banner_image']['name'])) 
            { 
                $config['upload_path'] = 'images/creator/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);
                //config 초기화
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('banner_image')) {

                    $data = $this->upload->data();

                    $banner_image = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $banner_image = $creator['banner_image'];
            }

            //데이터베이스에 저장
            $data = array(
                'name'          => $name,
                'sub_name'      => $sub_name,
                'tag'           => $tag,
                'description'   => $description,
                'homepage_url'  => $homepage_url,
                'sns_url_1'     => $sns_url_1,
                'sns_url_2'     => $sns_url_2,
                'sns_url_3'     => $sns_url_3,
                'banner_image'  => $banner_image,
                'profile_image' => $profile_image,
                'regdate'       => date('Y-m-d H:i:s'),
            );
            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->creator_mdl->update_creator($id, $data);

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
                $res = $this->creator_mdl->insert_creator($data);

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

    //크리에이터 삭제
	public function creator_delete()	
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
        
        $info = $this->creator_mdl->get_creator_info($id);

        if (!empty($info))
        {
            //delete헬퍼
            $res = delete_record('tp_creator', $id);

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
