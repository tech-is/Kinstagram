<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mypage extends CI_Model
{
    public function __construct()
    {
        //db接続
        $this->load->database();
    }

    public function post_add($post)
    {
        $this->db->insert('posts',$post);
    }

    public function mypage_get()
    {
         //自らのプロフィール情報を取り出す ※ 自分判定
        $this->db->where('user_id',1);
         //dbのusersテーブルから取得
        $query = $this->db->get('users');
         //配列に入れる
        return $query->result_array();
    }

    public function mypage_update($user)
    {
        $this->db->update('users',$user);
    }

    public function individual_get()
    {
        //自らの投稿の情報を取り出す　※　自分の投稿判定
        $this->db->where('post_id',1);
        //dbのpostsテーブルから取得
        $query = $this->db->get('posts');
        //配列に入れる
        return $query->result_array();
    }
}
