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
        return $this->db->query('SELECT users.user_id,user_name,follower_number,profile_image  FROM users INNER JOIN followers ON users.user_id = followers.user_id INNER JOIN posts ON users.user_id = posts.user_id ORDER BY RAND() LIMIT 5')
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
    public function total_rank()
    {
        // return $this->db->limit(3)
        //     ->order_by('follower_number','DESC')
        //     ->join('users', 'users.user_id = followers.user_id')
        //     ->select('users.user_id,follower_number,users.user_name')
        //     ->get('followers')
        //     ->result_array();
    }
    public function message_rank()
    {
        return $this->db
                ->select('comments.user_id,comments.text_group')
                ->get('comments')
                ->result_array(); 
    }
    public function favorite_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','1')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
    public function favorite_arm_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','2')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
    public function favorite_shoulder_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','3')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
    public function favorite_breast_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','4')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
    public function favorite_abs_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','5')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
    public function favorite_foot_rank()
    {
        return $this->db
        // ->limit(3)
        ->order_by('count','DESC')
        ->group_by('comments.comment_id')
        ->group_by('posts.post_id')
        ->where('favorite_pattern','6')
        ->join('posts', 'favorites.post_id=posts.post_id', 'left')
        ->join('users as test','test.user_id=posts.user_id','left')
        ->join('followers','followers.user_id=posts.user_id','left')
        ->join('comments','comments.post_id=posts.post_id ','left')
        ->join('users as comment_user','comments.comment_user_id=comment_user.user_id','left')
        ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
        ->get('favorites')
        ->result_array();
    }
}