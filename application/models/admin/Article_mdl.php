<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_mdl extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    //글 리스트
    public function get_article_list() 
    {
        $this->db->select('ta.id as ta_id, ta.c_id as ta_c_id, ta.category1 as ta_category, 
                           ta.thumbnail as ta_thumbnail, ta.title as ta_title, ta.sort as ta_sort, ta.use_yn as ta_use_yn,
                           ta.regdate as ta_regdate, tc.name as tc_name');
        $this->db->from('tp_articles ta');
        $this->db->join('tp_category tc', 'tc.id = ta.category1');
        $this->db->order_by('ta.id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //글 정보
    public function get_article_info($idx) 
    {
        $this->db->select('*');
        $this->db->from('tp_articles');
        $this->db->where('id', $idx);

        $query = $this->db->get();

        return $query->row_array();
    }

    //카테고리 리스트
    public function get_category_list($type) 
    {
        $this->db->select('*');
        $this->db->from('tp_category');
        if($type == 'P')
        {
            $this->db->where('parent', '0');
        }
        else
        {
            $this->db->where('parent !=', '0');
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    //작성글 수정
    public function update_articles($idx, $data) {
        $this->db->trans_begin();

        $this->db->where('id', $idx);
        $this->db->update('tp_articles', $data);

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
    public function insert_articles($data) {
        $this->db->trans_begin();

        $this->db->insert('tp_articles', $data);

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