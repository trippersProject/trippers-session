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
function update_sort($table, $id, $sort) {
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
function update_use_yn($table, $id, $use_yn) {
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