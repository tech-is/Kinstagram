<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kinsta extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	// 各viewに飛ぶ際には以下のコードを記入してほしいです。
	//セッションがある場合指定のページに飛べるが、
	//セッションがなければ、lpに飛びます。

	// if ($this->session->userdata("is_logged_in")) {
	// 	$this->load->view("あああ");
	// } else {
	// 	redirect("kinsta/lp");
	// }


	////藤田担当　マイページ,マイページ編集ページ,投稿ページ/////
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->helper('html'); 
	}

	public function mypage()
	{
		
		$id = $this->input->post('user_id') ?: null;
		var_dump($id);
		if(!empty($id) && is_numeric($id)){
			$this->load->model('Kinsta_model');
			$this->load->model('Model_mypage');
			$data['myposts_data'] = $this->Kinsta_model->fetch_one_row($id);
			$data['array_user'] = $this->Model_mypage->mypage_get();
			$this->load->view('Mypage', $data); 
		}else{
		$data = null;
		$this->load->model('Model_mypage');
		$data['array_user'] = $this->Model_mypage->mypage_get();
		//  $dataを第二引数に入れてviewに送る
		var_dump($data['myposts_data']);
		$this->load->view('Mypage', $data);  //ここ確認

    //if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
			//$this->load->view("Mypage");
		//} else {									//ログインしていない場合の処理
		//	redirect("main/lp");
		//}
		}
	}

	public function add()
	{
		$this->load->model('Model_mypage');
		
		//画像を投稿する
		$config['upload_path'] = './img/list_img_userid_1';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_hight'] = 1500;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('list_image')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('Post_scr',$error);
		} else {
			$data = array('image_metadata' => $this->upload->data());
			$this->load->view('files/upload_result',$data);
		}
		
		//Model_mypageのpost_addメソッドにアクセスしpost情報を渡す
		// post情報を変数定義
		$user_id = 0;
		$list_image = $this->upload->data('file_name');
		$post_message = $this->input->post('post_message');
		$mymenu = $this->input->post('mymenu');
		$mytraining = $this->input->post('mytraining');
		//変数を配列に格納
		$post = [
			'user_id' => $user_id,
			'list_image' => $list_image,
			'post_message' => $post_message,
			'mymenu' => $mymenu,
			'mytraining' => $mytraining
		];
		//Model_mypageに送る
		$this->Model_mypage->post_add($post);
		redirect("/Kinsta/mypage");
	}
	
	public function post()
	{
		$this->load->view('Post_scr');
//		if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
//			$this->load->view('Post_scr');
//		} else {									//ログインしていない場合の処理
//			redirect("main/lp");
//		}
	}

	public function individual()
	{
		$post_data = null;
		$this->load->model('Model_mypage');
		$post_data['array_post'] = $this->Model_mypage->individual_get();
		$post_data['array_user'] = $this->Model_mypage->mypage_get();
		//  $dataを第二引数に入れてviewに送る
		$this->load->view('Individual_img',$post_data);
		
//		if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
//			$this->load->view('Individual_img');
//		} else {									//ログインしていない場合の処理
//			redirect("main/lp");
//		}
	}
	///// 藤田担当　ここまで ////////


	////山下担当  lp,ログイン,会員登録,ログアウト,その他 /////
	public function lp()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('kin_top');
	}

	public function registration_validation()
	{
		$this->form_validation->set_rules("email", "メールアドレス", "required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("username", "ユーザ名", "required|trim");
		$this->form_validation->set_rules("password", "パスワード", "required|trim");
		$this->form_validation->set_rules("password_check", "パスワード確認", "required|trim|matches[password]");

		$this->form_validation->set_message("is_unique", "入力したメールアドレスはすでに登録されています");
		// 必要であれば、ユーザ名もユニーク設定する。

		if ($this->form_validation->run()) {
			//ランダムキーを生成する
			$key = md5(uniqid());

			$this->load->model("model_users");
			$this->load->helper('phpmailer');

			//メッセージの本文
			$message = "会員登録ありがとうございます。http://localhost2/kinsta/resister_user/$key";

			//各ユーザーにランダムキーをパーマリンクに含むURLを送信する
			$message .= "こちらをクリックして、会員登録を完了してください。";

			$result = phpmailer_send(
				$this->input->post('email'),
				'キンスタ',
				'kinstagram111@gmail.com',
				'仮会員登録が完了しました。',
				"$message"
			);

			//ユーザーに確認メールを送信できた場合、ユーザーを temp_users DBに追加する
			if ($result) {
				if ($this->model_users->add_temp_users($key)) {
					echo "仮登録完了メールを送信しました。";
				} else {
					echo "会員登録に失敗しました。（データベースエラー）";
				}
			} else {
				echo "メッセージの送信に失敗しました。メールアドレスを確認してください。";
			}
		} else {
			echo "新規会員登録に失敗しました。";
			$this->load->view("kin_top");
		}
	}

	public function login_validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "メールアドレス", "required|trim|valid_email|callback_validate_credentials");
		$this->form_validation->set_rules("password", "パスワード", "required|md5|trim");

		if ($this->form_validation->run()) {	//バリデーションエラーがなかった場合の処理
			$data = array(
				"email" => $this->input->post("email"),
				"is_logged_in" => 1
			);
			$this->session->set_userdata($data);
			redirect("kinsta/mypage");
		} else {							//バリデーションエラーがあった場合の処理
			$this->load->view("kin_top.php");
		}
	}

	public function validate_credentials()
	{		//Email情報がPOSTされたときに呼び出されるコールバック機能
		$this->load->model("model_users");

		if ($this->model_users->can_log_in()) {	//ユーザーがログインできたあとに実行する処理
			return true;
		} else {					//ユーザーがログインできなかったときに実行する処理
			$this->form_validation->set_message("validate_credentials", "ユーザー名かパスワードが異なります。");
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();		//セッションデータの削除
		redirect("kinsta/lp");		//lpにリダイレクトする
	}

	public function resister_user($key)
	{
		//add_temp_usersモデルが書かれている、model_uses.phpをロードする
		$this->load->model("model_users");

		if ($this->model_users->is_valid_key($key)) {	//キーが正しい場合は、以下を実行
			if ($this->model_users->add_user($key)) {	//add_usersがTrueを返したら以下を実行
				echo "success";
			} else echo "fail to add user. please try again";
		} else echo "invalid key";
	}
	///// 山下担当　ここまで ////////
	/////////////////////////////////////////二宮//////////////////////////////////////////////////////
	public function top()
	{
		$this->load->model('Kinsta_model');
		$data = null;
		// $data['data_array'] = $this->Kinsta_model->fetch_all_rows();
		$data['data_array'] = $this->Kinsta_model->random_member_ten();
		// var_dump($data);
		$data['five_data'] = $this->Kinsta_model->random_member_five();
		// $data['all_data'] = $this->kinsta_model->all_member();
		$data['all_posts'] = $this->Kinsta_model->all_post();
		// var_dump($data['all_posts']);
		$this->load->view('top_page',$data,);

	}
	public function select()
	{
		$this->load->view('header_page');
		$this->load->view('select_page');
	}
	public function rank()
    {
        $this->load->view('header_page');
        $this->load->view('rank_page');
	}
	public function armRank()
	{
		$this->load->view('header_page');
        $this->load->view('arm_rank_page');
	}
	public function breastRank()
    {
        $this->load->view('header_page');
        $this->load->view('breast_rank_page');
	}
	public function shoulderRank()
    {
        $this->load->view('header_page');
        $this->load->view('shoulder_rank_page');
	}
	public function absRank()
    {
        $this->load->view('header_page');
        $this->load->view('abs_rank_page');
	}
	public function footRank()
    {
        $this->load->view('header_page');
        $this->load->view('foot_rank_page');
	}
}
///////////////////////////////////二宮///////////////////////////////////////////////////////////////

