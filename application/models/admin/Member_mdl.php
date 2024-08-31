<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_mdl extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    //회원 리스트
    public function get_member_list() 
    {
        $this->db->select('*');
        $this->db->from('tp_users');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //회원 정보
    public function get_member_info($idx) 
    {
        $this->db->select('*');
        $this->db->from('tp_users');
        $this->db->where('id', $idx);

        $query = $this->db->get();

        return $query->row_array();
    }

    //회원정보 수정
    public function update_member($id, $data)
    {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->update('tp_users', $data);

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

    //회원 등록
    public function insert_member($data)
    {
        $this->db->trans_begin();

        $this->db->insert('tp_users', $data);

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

    //포인트내역 조회
    public function list_point_log()
    {
        $this->db->select('p.id as p_id, p.u_id as p_u_id, p.a_id as p_a_id, p.point_path as p_point_path, p.point_gubun as p_point_gubun, p.point_acount as p_point_acount, p.record_date as p_record_date,
                            a.title as a_title, u.name as u_name, u.email as u_email');
        $this->db->from('tp_point_use_log p');
        $this->db->join('tp_articles a', 'a.id = p.a_id');
        $this->db->join('tp_users u', 'u.id = p.u_id', 'left outer');
        $this->db->order_by('p.id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }
}