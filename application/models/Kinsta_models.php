<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kinsta_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function fetch_all_rows($limit = null)
    {
        !empty($limit) ? $this->db->limit($limit) : false;
        $data = $this->db->get('users')
                        ->result_array();
        

        // return $this->db->
    }
    public function random_member_ten()
    {
        // return $this->db->query('SELECT * FROM users ORDER BY RAND() LIMIT 1')
        // return $this->db->query('SELECT * FROM users JOIN followers ON users.user_id = followers.user_id ORDER BY RAND() LIMIT 1')
        return $this->db->query('SELECT user_name,follower_number,list_image  FROM users INNER JOIN followers ON users.user_id = followers.user_id INNER JOIN posts ON users.user_id = posts.user_id')
                        ->result_array();
                        // ->order_by('user_id','random');
    }
    public function random_member_five()
    {
        return $this->db->query('SELECT user_name,follower_number,list_image  FROM users INNER JOIN followers ON users.user_id = followers.user_id INNER JOIN posts ON users.user_id = posts.user_id LIMIT 5')
                        ->result_array();
    }
    public function all_post()
    {
        return $this->db->query('SELECT user_id,list_image,updated_at FROM posts ORDER BY updated_at DESC')
                        ->result_array();

    }
    public function images_get($id)
    {
        return $this->db->where('user_id',$id)
        ->select('user_id,list_image')
        ->get('posts')
        ->result_array();
    }
    public function icon_get($id)
    {
        return $this->db->where('user_id',$id)
        ->select('user_id,profile_image')
        ->get('users')
        ->result_array();
    }
}