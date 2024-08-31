<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_mdl extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //배너목록 조회
    public function get_banners($category)
    {
        $this->db->select('*');
        $this->db->from('tp_banner');
        $this->db->where('category', $category);
        $this->db->where('use_yn', 'Y');
        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //글 목록 조회
    public function get_article_list($category='', $c_id='', $p_id='')
    {
        $this->db->select('*');
        $this->db->from('tp_articles');
        $this->db->join('tp_category', 'tp_category.id = tp_articles.category1');
        $this->db->where('use_yn', 'Y');
        if($c_id)
        {
            $this->db->where('c_id', $c_id);
        }
        else if($p_id)
        {
            $this->db->where('p_id', $p_id);
        }
        if($category) $this->db->where('tp_articles.category1', $category);
        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //FIND ITEM 리스트 조회
    public function get_find_item_list($main='')
    {
        $this->db->select('*');
        $this->db->from('tp_find_item');
        if($main != '')
        {
            $this->db->where('main_use_yn', 'Y');
        }
        else
        {
            $this->db->where('use_yn', 'Y');
        }
        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //굿즈 리스트 조회
    public function get_goods_list()
    {
        $this->db->select('*');
        $this->db->from('tp_goods');
        $this->db->where('use_yn', 'Y');

        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //글 정보 조회
    public function get_article_info($id)
    {
        $this->db->select('*');
        $this->db->from('tp_articles');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    //크리에이터 정보 조회
    public function get_creator_info($id)
    {
        $this->db->select('*');
        $this->db->from('tp_creator');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    //매장 정보 조회
    public function get_place_info($id)
    {
        $this->db->select('*');
        $this->db->from('tp_place');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function like_post($data)
    {
        $this->db->trans_start(); // 트랜잭션 시작

        $this->db->insert('tp_like', $data); // 데이터 삽입

        $this->db->trans_complete(); // 트랜잭션 종료

        // 트랜잭션 상태 확인
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function scrap_post($data)
    {
        $this->db->trans_start(); // 트랜잭션 시작

        $this->db->insert('tp_scrap', $data); // 데이터 삽입

        $this->db->trans_complete(); // 트랜잭션 종료

        // 트랜잭션 상태 확인
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}