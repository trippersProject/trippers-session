<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mdl extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        // 사용자 인증 로직 (예: 비밀번호 해시와 함께)
        $this->db->select('*');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password)); // 비밀번호는 보통 해시로 저장됨
        $this->db->where('auth_level', 99);
        $this->db->from('tp_users');
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row(); // 사용자가 있으면 정보 반환
        } else {
            return false; // 없으면 false 반환
        }
    }
}
