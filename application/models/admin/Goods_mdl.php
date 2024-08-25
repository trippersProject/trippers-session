<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_mdl extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    //글 리스트
    public function get_goods_list() 
    {
        $this->db->select('*');
        $this->db->from('tp_goods');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //글 정보
    public function get_goods_info($id) 
    {
        $this->db->select('*');
        $this->db->from('tp_goods');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    //작성글 수정
    public function update_goods($id, $data) {
        $this->db->trans_begin();

        $this->db->where('id', $id);
        $this->db->update('tp_goods', $data);

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

    //작성글 등록
    public function insert_goods($data) {
        $this->db->trans_begin();

        $this->db->insert('tp_goods', $data);

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
}