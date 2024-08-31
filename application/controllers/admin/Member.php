<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/member_mdl', 'member_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//회원목록
		$data['list'] = $this->member_mdl->get_member_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/member_list.php', $data);
	}

	//회원정보 수정화면 이동
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
        
        $data['info'] = $this->member_mdl->get_member_info($id);

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/member_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//회원정보 등록,수정
	public function regi_member() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $name = $this->input->post('name', TRUE);
            $auth_level = $this->input->post('auth_level', TRUE);
            $password = $this->input->post('password', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $point = $this->input->post('point', TRUE);
            
            $member = $this->member_mdl->get_member_info($id);

            if(empty($member) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }
            
            //데이터베이스에 저장
            $data = array(
                'name'          => $name,
                'auth_level'    => $auth_level,
                'phone'         => $phone,
                'point'         => $point,
                'regdate'       => date('Y-m-d H:i:s'),
            );

            if($password != ''){
                $data['password'] = md5($password);
            }

            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->member_mdl->update_member($id, $data);

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
                $res = $this->member_mdl->insert_member($data);

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

    //포인트내역 조회
    public function point_log()
    {
        $data = array();

        $list = $this->member_mdl->list_point_log();

        if(!$list)
        {
            $data['code'] = '9999';
            $data['msg'] = '조회된 포인트 내역이 없습니다';
            echo json_encode($data);
            exit;
        }

        $data['list'] = $list;
        
        $this->load->view('admin/layout/header.php');
        $this->load->view('admin/point_log.php', $data);
    }
}
