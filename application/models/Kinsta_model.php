<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kinsta_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function random_member_ten()
    {
        return $this->db
        ->order_by(10, 'RANDOM')
        ->join('followers', 'users.user_id = followers.user_id','left')
        ->distinct()
        ->select('users.user_name,followers.follower_number,users.profile_image')
        ->get('users')
        ->result_array();
    }
    public function random_member_five()
    {
        return $this->db
        ->order_by(5, 'RANDOM')
        ->join('followers', 'users.user_id = followers.user_id','left')
        ->distinct()
        ->select('users.user_name,users.user_id,followers.follower_number,users.profile_image')
        ->get('users')
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
    public function serch_for($keyword)
    {
        // return $serchWord;
        
        return $this->db
        ->distinct()
        ->like('users.user_name',$keyword,'after')
        ->or_like('comments.text_group', $keyword,'both')
        ->or_like('posts.post_message',$keyword,'both')
        ->or_like('followers.follower_number',$keyword,'both')

        // ->join('favorites','favorites.post_id = posts.post_id','left')
        ->join('followers','followers.user_id = comments.user_id','right')
        ->join('posts', 'posts.user_id = comments.user_id','right')
        ->join('users', 'users.user_id = comments.user_id','right')
        // ->join('comments', 'comments.user_id = users.user_id','left')
        // ->select('users.user_name,followers.follower_number,users.profile_image')
        ->select('users.user_name,posts.post_id,followers.follower_number')
        ->get('comments')
        ->result_array();
    }
}