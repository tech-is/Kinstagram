<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mypage extends CI_Model
{
    public function __construct()
    {
        //db接続
        $this->load->database();
    }

    public function mypage_get()
    {
         //自らのプロフィール情報を取り出す ※ 自分判定
        $this->db->where('user_id',1);
         //dbのusersテーブルから取得
        $query = $this->db->get('users');
         //配列に入れてあげる
        return $query->result_array();
    }          
}
