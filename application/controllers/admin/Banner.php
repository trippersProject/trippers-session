<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/banner_mdl', 'banner_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//배너목록
		$data['list'] = $this->banner_mdl->get_banner_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/banner_list.php', $data);
	}

    //정렬순서 업데이트
    public function update_sort(){
        $id = $this->input->post('id', TRUE);
        $sort = $this->input->post('sort', TRUE);
        $table = "tp_banner";

        update_sort($table, $id, $sort);
    }

    //사용여부 업데이트
    public function update_use_yn(){
        $id = $this->input->post('id', TRUE);
        $use_yn = $this->input->post('use_yn', TRUE);
        $table = "tp_banner";

        update_use_yn($table, $id, $use_yn);
    }

	//본문 첨부 이미지 저장
	public function upload_image() {
        if ($_FILES['file']['name']) {
            $config['upload_path'] =  "images/banner/";
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
                $file_path = base_url("images/banner/".$data['file_name']);
                echo $file_path;
            }
        }
    }

    private function generate_unique_filename() {
        // 현재 시간과 랜덤 숫자를 조합하여 고유한 파일명 생성
        return date('YmdHis') . '_' . rand(1000, 9999);
    }

    //배너 등록화면 이동
	public function apply()	
	{	
        $data = array();

        $this->load->view('admin/layout/header.php');
        $this->load->view('admin/banner_apply.php', $data);
	}

	//배너 수정화면 이동
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
        
        $data['info'] = $this->banner_mdl->get_banner_info($id);

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/banner_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//배너 등록,수정
	public function regi_banner() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $name = $this->input->post('name', TRUE);
            $category = $this->input->post('category', TRUE);
            $link = $this->input->post('link', TRUE);

            $banner = $this->banner_mdl->get_banner_info($id);

            if(empty($banner) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }

            //PC용 이미지 업로드 처리
            $filename_pc = null;
            if (!empty($_FILES['filename_pc']['name'])) 
            { 
                $config['upload_path'] = 'images/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);
                //config 초기화
                $this->upload->initialize($config);

                if ($this->upload->do_upload('filename_pc')) {

                    $data = $this->upload->data();

                    $filename_pc = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $filename_pc = $banner['filename_pc'];
            }

            //모바일용 이미지 업로드 처리
            $filename_mobile = null;
            if (!empty($_FILES['filename_mobile']['name'])) 
            { 
                $config['upload_path'] = 'images/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);
                //config 초기화
                $this->upload->initialize($config);

                if ($this->upload->do_upload('filename_mobile')) {

                    $data = $this->upload->data();

                    $filename_mobile = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $filename_mobile = $banner['filename_mobile'];
            }

            //데이터베이스에 저장
            $data = array(
                'name'              => $name,
                'category'          => $category,
                'filename_pc'       => $filename_pc,
                'filename_mobile'   => $filename_mobile,
                'link'              => $link,
            );

            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->banner_mdl->update_banner($id, $data);

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
                $res = $this->banner_mdl->insert_banner($data);

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
