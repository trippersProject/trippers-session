<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('article_upload_path')) {
    function get_article_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('article_upload_path');
    }
}
if (!function_exists('banner_upload_path')) {
    function get_banner_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('banner_upload_path');
    }
}
if (!function_exists('creator_upload_path')) {
    function get_creator_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('creator_upload_path');
    }
}
if (!function_exists('etc_upload_path')) {
    function get_goods_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('goods_upload_path');
    }
}
if (!function_exists('find_item_upload_path')) {
    function get_find_item_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('find_item_upload_path');
    }
}
if (!function_exists('etc_upload_path')) {
    function get_etc_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('etc_upload_path');
    }
}
if (!function_exists('place_upload_path')) {
    function get_place_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('place_upload_path');
    }
}

//정렬순서 업데이트
function update_sort($table, $id, $sort)
{
    $CI =& get_instance();

    if($table && $id){
        // 배너의 노출순서 업데이트 로직
        $CI->db->where('id', $id);
        $CI->db->update($table, array('sort' => $sort));

        echo json_encode(array('status' => 'success'));
    }else{
        echo json_encode(array('status' => '필수값 누락'));
    }

}

//사용여부 업데이트
function update_use_yn($table, $id, $use_yn)
{
    $CI =& get_instance();

    if($table && $id){
        // 배너의 사용여부 업데이트 로직
        $CI->db->where('id', $id);
        $CI->db->update($table, array('use_yn' => $use_yn));

        echo json_encode(array('status' => 'success'));
    }else{
        echo json_encode(array('status' => '필수값 누락'));
    }
}

//일반회원 로그인여부 체크
function check_login()
{
    $CI =& get_instance();
    $user_id = $CI->session->userdata('user_id');
    
    if (!$user_id) {
        echo '<script type="text/javascript">';
        echo 'alert("로그인 후 가능합니다.");';
        echo 'window.location.href = "/login";';
        echo '</script>';

        exit;
    }
}

//포인트 지급
function change_user_point($u_id, $a_id, $gubun, $path)
{
    $CI =& get_instance();
    $CI->load->database();  

    if($gubun == 'E'){
        // 이미 포인트가 지급되었는지 확인
        $CI->db->where('u_id', $u_id);
        $CI->db->where('a_id', $a_id);
        $CI->db->where('point_gubun', $gubun);
        $CI->db->where('point_path', $path);
        $CI->db->from('tp_point_use_log');
        $exists = $CI->db->count_all_results();

        if ($exists > 0) {
            return "already"; // 이미 포인트가 지급된 경우
        }
    }

    $point_amount = 1;

    // 포인트 로그 기록
    $point_data = array(
        'u_id' => $u_id,
        'a_id' => $a_id,
        'point_path' => $path,
        'point_gubun' => 'E', // Earning 포인트 구분
        'point_acount' => $point_amount,
        'record_date' => date("Y-m-d H:i:s")
    );
    
    $CI->db->insert('tp_point_use_log', $point_data);
    
    // 현재 사용자 포인트 가져오기
    $CI->db->where('id', $u_id);
    $user = $CI->db->get('tp_users')->row();

    
    if ($user) {
        // 사용자 포인트 업데이트
        if($gubun == 'E'){//획득
            $new_point = $user->point + $point_amount;
        }else if($gubun == 'U'){//사용
            $new_point = $user->point - $point_amount;
        }else{
            $new_point = $user->point;
        }
        $CI->db->where('id', $u_id);
        $CI->db->update('tp_users', array('point' => $new_point));

        if ($CI->db->trans_status() === FALSE) {
            $CI->db->trans_rollback(); // 오류 발생 시 롤백
            return -1;
        } else {
            $CI->db->trans_commit(); // 성공 시 커밋
            return 1;
        }
    } else {
        return -1; // 유저를 찾지 못했을 경우 false 반환
    }

    return 1;
}


//글 조회수 업데이트
function update_article_hit($id, $hit)
{
    $CI =& get_instance();

    // 배너의 사용여부 업데이트 로직
    $CI->db->where('id', $id);
    $CI->db->update('tp_articles', array('hit' => $hit));

    return true;

}

//DB삭제
function delete_record($table, $id)
{
    // CI 인스턴스 가져오기
    $CI =& get_instance();
    // 데이터베이스 로드
    $CI->load->database();

    // 테이블명과 ID 값 검증
    if (empty($table) || !is_numeric($id)) {
        return false;
    }

    // 트랜잭션 시작
    $CI->db->trans_start();

    // 삭제 쿼리 실행
    $CI->db->where('id', $id);
    $CI->db->delete($table);

    // 트랜잭션 완료 또는 롤백
    $CI->db->trans_complete();

    // 트랜잭션 성공 여부 확인
    if ($CI->db->trans_status() === FALSE) {
        // 트랜잭션 실패 시 롤백
        return false;
    } else {
        // 트랜잭션 성공 시 커밋
        return true;
    }
}