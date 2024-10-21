<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_mdl extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    // 날짜별 접속자 수 집계
    public function get_daily_visitors() {
        $this->db->select('DATE(timestamp) as visit_date, COUNT(no) as visitor_count');
        $this->db->group_by('visit_date');
        $this->db->order_by('visit_date', 'ASC');
        $query = $this->db->get('tp_visitor'); 
        return $query->result_array();
    }
}