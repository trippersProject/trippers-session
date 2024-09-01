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
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $this->db->where('status', 'Y');

        $query = $this->db->get('tp_users');

        return $query->row_array();
    }

    //좋아요 지정 게시글 조회
    public function get_user_like_article($id)
    {
        $this->db->select('ta.*, tc.name as category');

        $this->db->from('tp_like tl');
        $this->db->join('tp_articles ta', 'ta.id = tl.a_id');
        $this->db->join('tp_category tc', 'tc.id = ta.category1');

        $this->db->where('u_id', $id);

        $query = $this->db->get();

        return $query->result_array();
    }

    //스크랩 게시글 조회
    public function get_user_scrap_article($id)
    {
        $this->db->select('ta.*, tc.name as category');

        $this->db->from('tp_scrap ts');
        $this->db->join('tp_articles ta', 'ta.id = ts.a_id');
        $this->db->join('tp_category tc', 'tc.id = ta.category1');

        $this->db->where('u_id', $id);

        $query = $this->db->get();

        return $query->result_array();
    }

    //포인트 사용횟수 조회
    public function get_user_use_point($id)
    {
        $this->db->select('count(1) as cnt');

        $this->db->from('tp_point_use_log');

        $this->db->where('u_id', $id);
        $this->db->where('point_gubun', 'U');

        $query = $this->db->get();

        return $query->row_array();
    }

    //회원정보 수정
    public function modify_user_info($id, $params)
    {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->update('tp_users', $params);

        if ($this->db->trans_status() === FALSE) {
            // 오류 발생 시 롤백
            $this->db->trans_rollback();
            return false;
        } else {
            // 성공 시 커밋
            $this->db->trans_commit();
            return true;
        }
    }

    //회원정보 삭제
    public function delete_user_info($id){
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->delete('tp_users');

        if ($this->db->trans_status() === FALSE) {
            // 오류 발생 시 롤백
            $this->db->trans_rollback();
            return false;
        } else {
            // 성공 시 커밋
            $this->db->trans_commit();
            return true;
        }
    }

    //회원 스크랩 정보 삭제
    public function delete_user_scrap($id){
        $this->db->trans_begin();

        $this->db->where('u_id', $id);
        $this->db->delete('tp_scrap');

        if ($this->db->trans_status() === FALSE) {
            // 오류 발생 시 롤백
            $this->db->trans_rollback();
            return false;
        } else {
            // 성공 시 커밋
            $this->db->trans_commit();
            return true;
        }
    }

    //회원 좋아요 정보 삭제
    public function delete_user_like($id){
        $this->db->trans_begin();

        $this->db->where('u_id', $id);
        $this->db->delete('tp_like');

        if ($this->db->trans_status() === FALSE) {
            // 오류 발생 시 롤백
            $this->db->trans_rollback();
            return false;
        } else {
            // 성공 시 커밋
            $this->db->trans_commit();
            return true;
        }
    }

    //회원포인트 차감
    public function down_user_point($id, $point)
    {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->update('tp_users', array('point'=>$point));

        if ($this->db->trans_status() === FALSE) {
            // 오류 발생 시 롤백
            $this->db->trans_rollback();
            return false;
        } else {
            // 성공 시 커밋
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_password($email, $new_password) {
        $this->db->where('email', $email);
        return $this->db->update('tp_users', array('password' => $new_password));
    }

}