<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinsta_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // public function random_member_ten()
    // {
    //     return $this->db
    //     ->limit(10)
    //     ->order_by('users.user_id', 'RANDOM')
    //     ->join('followers', 'users.user_id = followers.user_id','left')
    //     ->distinct()
    //     ->select('users.user_name,followers.follower_number,users.profile_image')
    //     ->get('users')
    //     ->result_array();
    // }
    public function get_userid($email)
    {
    return         $this->db
                    ->where('users.E-mail',$email)
                    ->select('users.user_id')
                    ->get('users')
                    ->result_array();
    
    
    }
    public function get_userid_upload($email)
    {
    $query = $this->db
                    ->where('users.E-mail',$email)
                    ->select('users.user_id')
                    ->get('users')
                    ->row_array();
    
        foreach($query as $row){
            return $row;
        }
    }
    public function uploadPostMessageMenuTraning($data)
    {
        $array = array(
            'user_id' => $data['user_id'],
            'post_message' => $data['uploadPostMessage'],
            'mytraining' => $data['uploadMyTraining'],
            'mymenu' => $data['uploadMyMenu'],
            'list_image' => $data['uploadFile']
        );
        return $this->db
                    ->insert('posts',$array);
                    return true;
        //             ->
    }
    public function getMessageMenuTraning($data)
    {
        return $this->db
            ->where('posts.list_image', $data['fName'])
            ->join('users', 'users.user_id = posts.user_id', 'left')
            ->select('users.user_id,users.user_name,posts.post_message,posts.mytraining,posts.mymenu,posts.post_id')
            ->get('posts')
            ->row_array();
    }
    
    public function random_member_ten()
    {
        return $this->db
            ->limit(10)
            ->order_by('users.user_id', 'RANDOM')
            ->distinct()
            ->select('users.user_name,users.profile_image,users.follower_number')
            ->get('users')
            ->result_array();
    }
    // public function random_member_five()
    // {
    //     return $this->db
    //     ->limit(5)
    //     ->order_by('users.user_id','RANDOM')
    //     ->join('followers', 'users.user_id = followers.user_id','left')
    //     ->distinct()
    //     ->select('users.user_name,users.user_id,followers.follower_number,users.profile_image')
    //     ->get('users')
    //     ->result_array();
    // }
    public function random_member_five()
    {
        return $this->db
            ->limit(5)
            ->order_by('users.user_id', 'RANDOM')
            ->distinct()
            ->select('users.user_name,users.user_id,users.profile_image')
            ->get('users')
            ->result_array();
    }
    public function all_post()
    {
        return $this->db->query('SELECT user_id,list_image,post_message,mytraining,mymenu,updated_at FROM posts ORDER BY updated_at DESC')
            ->result_array();
    }

    public function recount_follower($data)
    {
        //フォローされた人のid用の変数作成
        $member_id = $data["memberUserId"];

        // セレクト文でフォロワーテーブルから、フォローした人のフォロワーをすべて取得
        $member_follower = $this->db->select("following_id")->where("following_id", $member_id)->get('followers')->result_array();

        // 取得した人の数を取得
        $follower_count = count($member_follower);

        // その数をuserテーブルに反映
        $array = array(
            'follower_number' => $follower_count
        );

        $this->db->where("users.user_id", $member_id)->update("users", $array);
    }
    //マッスルメンバー追加/解除処理
    public function addMember($data)
    {
        $array = array(
            'followed_id' => $data['loginId'],
            'following_id' => $data['memberUserId'],
        );
        $dataResult = $this->db->get_where("followers", $array)->row_array();

        if (!empty($dataResult)) {
            $this->db->delete('followers', $array);

            return false;
        }
        $this->db
            ->insert('followers', $array);
        return true;
    }
    //表示処理マッスルメンバー解除/追加
    public function addOrDelete($data)
    {
        if (!empty($data['loginId']) && ($data['memberUserId'])) {
            $add_Rerease = array(
                'followed_id' => $data['loginId'],
                'following_id' => $data['memberUserId'],
            );
        } else if (!empty($data[0]['loginId'] && $data[0]['memberUserId'])) {
            $memberChange_add_Rerease = array(
                'followed_id' => $data[0]['loginId'],
                'following_id' => $data[0]['memberUserId'],
            );
        }
        if (!empty($add_Rerease)) {
            $dataResult = $this->db->get_where("followers", $add_Rerease)->row_array();
        } else if (!empty($memberChange_add_Rerease)) {
            $dataResult = $this->db->get_where("followers", $memberChange_add_Rerease)->row_array();
        }
        if (!empty($dataResult)) {
            return false;
        }
        return true;
    }



    public function kiretemasuClick($data)
    {
        $array = array(
            'user_id' => $data['loginUserId'],
            'post_id' => $data['postId'],
            'favorite_pattern' => $data['kireType']
        );
        
        if(is_null($this->db->get_where("favorites", $array)->row_array())) {
            $this->db->insert('favorites', $array);
            return $this->db
                    ->order_by('count', 'DESC')
                     ->group_by('favorite_pattern')
                     ->where('favorites.post_id', $data['postId'])
                     ->select('favorites.user_id,favorites.post_id,favorites.favorite_pattern,COUNT(favorites.favorite_pattern) as count')
                    ->get('favorites')
            ->result_array();
        }else{
            $matchFavorite=$this->db->get_where("favorites", $array)->row_array();
            // var_dump($matchFavorite);
            $countData=$this->db
                    ->order_by('count', 'DESC')
                     ->group_by('favorite_pattern')
                     ->where('favorites.post_id', $data['postId'])
                     ->select('favorites.user_id,favorites.post_id,favorites.favorite_pattern,COUNT(favorites.favorite_pattern) as count')
                    ->get('favorites')
            ->result_array();
            $deleteTorF = "";
            for($i=0; $i < count($countData); $i++){
                if($matchFavorite['favorite_pattern'] == $countData[$i]['favorite_pattern'] && $countData[$i]['count'] ==1 ){
                    $deleteTorF = $this->db->delete('favorites',$array);
                    $countData[$i]['count'] = "0";
                    return $countData;
                }
            }
            if($deleteTorF==""){
            $this->db->delete('favorites',$array);
            return $this->db
                    ->order_by('count', 'DESC')
                     ->group_by('favorite_pattern')
                     ->where('favorites.post_id', $data['postId'])
                     ->select('favorites.user_id,favorites.post_id,favorites.favorite_pattern,COUNT(favorites.favorite_pattern) as count')
                    ->get('favorites')
            ->result_array();
            }
        }
    }
    public function kiretemasuFirst($data)
    {
        $postIdGet=$this->db
                        ->where('posts.list_image', $data['fileName'])
                        ->join('users', 'users.user_id = posts.user_id', 'left')
                        ->select('posts.post_id')
                        ->get('posts')
                        ->row_array();
            
            return $this->db
                    ->order_by('count', 'DESC')
                    ->group_by('favorite_pattern')
                    ->where('favorites.post_id', $postIdGet['post_id'])
                    ->select('favorites.user_id,favorites.post_id,favorites.favorite_pattern,COUNT(favorites.favorite_pattern) as count')
                    ->get('favorites')
                    ->result_array();
            

            
        
    }




    public function mydata_get($id)
    {
        return $this->db
            ->where('users.user_id', $id)
            ->where('delete_flag', 0)
            ->join('posts', 'posts.user_id=users.user_id', 'left')
            ->select('users.profile_image,users.user_name,users.introduction,users.my_category,users.E-mail,posts.list_image,posts.post_id')
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
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '1')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function favorite_arm_rank()
    {
        return $this->db
            // ->limit(3)
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '2')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            // ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
            //             comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
        comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function favorite_shoulder_rank()
    {
        return $this->db
            // ->limit(3)
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '3')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            // ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
            //             comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
        comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function favorite_breast_rank()
    {
        return $this->db
            // ->limit(3)
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '4')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            // ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
            //             comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function favorite_abs_rank()
    {
        return $this->db
            // ->limit(3)
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '5')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            // ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
            //             comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function favorite_foot_rank()
    {
        return $this->db
            // ->limit(3)
            ->order_by('count', 'DESC')
            ->group_by('comments.comment_id')
            ->group_by('posts.post_id')
            ->where('favorite_pattern', '6')
            ->join('posts', 'favorites.post_id=posts.post_id', 'left')
            ->join('users as test', 'test.user_id=posts.user_id', 'left')
            // ->join('followers','followers.user_id=posts.user_id','left')
            ->join('comments', 'comments.post_id=posts.post_id ', 'left')
            ->join('users as comment_user', 'comments.comment_user_id=comment_user.user_id', 'left')
            // ->select('test.user_name,followers.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
            //             comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->select('test.user_name,test.follower_number,posts.post_message,posts.post_id,COUNT(favorites.post_id) as count,comments.text_group,comments.
                    comment_user_id,posts.list_image,comment_user.user_name as comment_user_name,posts.mytraining,posts.mymenu')
            ->get('favorites')
            ->result_array();
    }
    public function serch_for($keyword)
    {
        // return $serchWord;

        return $this->db
            ->group_by('users.user_name')
            ->like('users.user_name', $keyword, 'after')
            ->or_like('comments.text_group', $keyword, 'both')
            ->or_like('posts.post_message', $keyword, 'both')
            // ->or_like('followers.follower_number',$keyword,'both')

            // ->join('favorites','favorites.post_id = posts.post_id','left')
            // ->join('followers','followers.user_id = comments.user_id','right')
            ->join('posts', 'posts.user_id = comments.user_id', 'right')
            ->join('users', 'users.user_id = comments.user_id', 'right')
            // ->join('comments', 'comments.user_id = users.user_id','left')
            // ->select('users.user_name,followers.follower_number,users.profile_image')
            ->select('users.user_name,users.profile_image,users.user_id,posts.post_id')
            ->get('comments')

            ->result_array();
    }
}
