<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_mdl extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // 이메일 중복 확인
    public function email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tp_users');
        return $query->num_rows() > 0;
    }
    
    //회원정보 삽입
    public function insert_user($data) {
        // 트랜잭션 시작
        $this->db->trans_start();

        // 회원 정보 삽입
        $this->db->insert('tp_users', $data);

        // 트랜잭션 종료 및 커밋
        $this->db->trans_complete();

        // 트랜잭션 상태 확인
        if ($this->db->trans_status() === FALSE) {
            // 트랜잭션 실패 시 롤백
            return false;
        } else {
            // 트랜잭션 성공 시 커밋
            return true;
        }
    }

    //  로그인 사용자 정보 조회
    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tp_users');
        return $query->row();
    }

}