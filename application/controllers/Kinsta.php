<?php
defined('BASEPATH') or exit('No direct script access allowed');

// class Api extends CI_Controller
//  {}
// class Kinsta extends CI_Controller
// class Kinsta extends Api
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
	// redirect("kinsta/lp");
	// }


	////藤田担当 マイページ,マイページ編集ページ,投稿ページ/////
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_mypage');
		$this->load->helper('url', 'form');
		$this->load->helper('html');
	}

	public function mypage()
	{
		//user_idの獲得処理
		$this->load->model('Kinsta_model');

		$email = null;
		$email = ($_SESSION["E-mail"]);
		$take_id = null;
		$take_id = $this->Kinsta_model->get_userid($email);
		$id = $take_id[0]["user_id"];

		// var_dump($_GET['userId']);
		// $id = $_GET['userId'] ?: null;
		if (!empty($id) && is_numeric($id)) {
			$this->load->model('Kinsta_model');
			$data['myData'] = $this->Kinsta_model->mydata_get($id);
			$this->load->model('Model_mypage');
			$data['array_post'] = $this->Model_mypage->individual_get();
			//$data['all_posts'] = $this->Kinsta_model->all_post();
			// $this->load->view('header_page');
			// $this->load->view('only_mypage', $data);
			$this->load->view('Mypage', $data);
		} else {
		}




		// $this->load->model('Kinsta_model');
		// $data['login_userid'] = $this->Kinsta_model->get_userid($email);
		// $data['array_user'] = $this->Model_mypage->mypage_get();
		// $data['array_post'] = $this->Model_mypage->individual_get();
		// $this->load->view('Mypage', $data);
	}

	public function mypage_update()
	{
		//バリデーション
		$this->form_validation->set_rules("E-mail", "メールアドレス", "required|trim|valid_email|is_unique[users.E-mail]");
		$this->form_validation->set_rules("user_name", "ユーザ名", "required|trim");
		$this->form_validation->set_rules("password", "パスワード", "required|trim|min_length[8]|max_length[16]|md5");

		$this->load->model('Model_mypage');

		//アイコン画像を変更する
		$config['upload_path'] = './img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_hight'] = 1500;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('profile_image')) {
			$file_info = $this->upload->data('file_name');
		}

		//Model_mypageのmypage_updateメソッドにアクセスし更新情報を渡す
		// 更新情報を変数定義する
		$profile_image = $file_info;
		$user_name = $this->input->post('user_name');
		$introduction = $this->input->post('introduction');
		$my_category = $this->input->post('my_category');
		$email = $this->input->post('E-mail');
		$password = md5($this->input->post('password'));

		//変数を配列に格納
		$user = [
			'profile_image' => $profile_image,
			'user_name' => $user_name,
			'introduction' => $introduction,
			'my_category' => $my_category,
			'E-mail' => $email,
			'password' => $password,
		];

		//Model_mypageに送る
		$this->Model_mypage->mypage_update($user);
		//  $dataを第二引数に入れてviewに送る
		redirect('Kinsta/Mypage');
	}

	public function add()
	{
		$this->load->model('Model_mypage');

		//画像を投稿する
		$config['upload_path'] = './img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_hight'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('list_image')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('Post_scr', $error);
		} else {
			$data = array('image_metadata' => $this->upload->data());
			//投稿が成功したら成功ページへ推移
			$this->load->view('files/upload_result', $data);
		}
		//user_idの獲得処理
		$this->load->model('Kinsta_model');

		$email = null;
		$email = ($_SESSION["E-mail"]);
		$id = null;
		$id = $this->Kinsta_model->get_userid($email);
		$user_id = $id[0]["user_id"];

		//Model_mypageのpost_addメソッドにアクセスしpost情報を渡す
		// post情報を変数定義
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
	}

	public function post()
	{
		$this->load->view('Post_scr');
	}

	public function individual()
	{
		$this->load->helper('files');
		if (delete_files('/img/'.'post-img')) {
			//削除しました
		}

		$post_data = null;
		$this->load->model('Model_mypage');
		$post_data['array_post'] = $this->Model_mypage->individual_get();
		$post_data['array_user'] = $this->Model_mypage->mypage_get();
		//  $dataを第二引数に入れてviewに送る
		$this->load->view('Mypage', $post_data);
	}

	public function individual_top()
	{
		$data = null;
		$this->load->model('Model_mypage');

		$this->load->view('top_page', $data);
	}
	///// 藤田担当 ここまで ////////


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
		$this->form_validation->set_rules("E-mail", "メールアドレス", "required|trim|valid_email|is_unique[users.E-mail]");
		$this->form_validation->set_rules("user_name", "ユーザ名", "required|trim");
		$this->form_validation->set_rules("password", "パスワード", "required|trim|min_length[8]|max_length[16]");
		$this->form_validation->set_rules("password_check", "パスワード確認", "required|trim|matches[password]");

		$this->form_validation->set_message("is_unique", "入力したメールアドレスはすでに登録されています");
		// 必要であれば、ユーザ名もユニーク設定する。

		if ($this->form_validation->run()) {
			//ランダムキーを生成する
			$key = md5(uniqid());

			$this->load->model("model_users");
			$this->load->helper('phpmailer');

			//メッセージの本文
			$message = "会員登録ありがとうございます。\n\n http://localhost2/kinsta/resister_user/$key";

			//各ユーザーにランダムキーをパーマリンクに含むURLを送信する
			$message .= "\nこちらをクリックして、会員登録を完了してください。\n あなたに、素晴らしい筋肉たちとの出会いがあらんことを...!\n\n 注意:\n\n※本メールは送信専用です。ご返信いただいてもお答えできませんのでご了承ください。\n※本メールは、Kinstagramの会員登録に入力いただいたメールアドレス宛に送信しております。\nメールにお心当たりがない場合は、当サービス、サポート窓口までご連絡をお願いいたします。
			";

			$result = phpmailer_send(
				$this->input->post('E-mail'),
				'Kinstagram',
				'kinstagram111@gmail.com',
				'Welcome to Muscle World!!!',
				"$message"
			);

			//ユーザーに確認メールを送信できた場合、ユーザーを temp_users DBに追加する
			if ($result) {
				if ($this->model_users->add_temp_users($key)) {
					$this->load->view('kin_top2');
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
		$this->form_validation->set_rules("E-mail", "メールアドレス", "required|trim|valid_email|callback_validate_credentials");
		$this->form_validation->set_rules("password", "パスワード", "required|md5|trim");

		if ($this->form_validation->run()) {	//バリデーションエラーがなかった場合の処理
			$data = array(
				"E-mail" => $this->input->post("E-mail"),
				"is_logged_in" => 1
			);
			$this->session->set_userdata($data);
			redirect("kinsta/top");
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
				// echo "新規会員登録に成功しました。下記フォームよりログインしてください。";
				// $this->load->view('kin_top');
				$session_data = $this->model_users->temp_login($key);
				$this->session->set_userdata($session_data);
				redirect("kinsta/top");
			} else echo "fail to add user. please try again";
		} else echo "有効期限切れのURLです。";
	}

	public function check_favolite_duplicate()
	{
		$data['user_id'] = $this->input->post('user_id');
		$data['post_id'] = $this->input->post('post_id');
		$data['favorite_pattern'] = $this->input->post('favorite_pattern');
	}
	///// 山下担当　ここまで ////////
	/////////////////////////////////////////二宮//////////////////////////////////////////////////////
	public function top()
	{
		$this->load->model('Kinsta_model');

		$email = ($_SESSION["E-mail"]);
		$data = null;
		$data['login_userid'] = $this->Kinsta_model->get_userid($email);
		$data['ten_data'] = $this->Kinsta_model->random_member_ten();
		$data['five_data'] = $this->Kinsta_model->random_member_five();
		$data['all_posts'] = $this->Kinsta_model->all_post();
		$data['array_user'] = $this->Model_mypage->postUser_get();
		$data['array_post'] = $this->Model_mypage->individual_get();
		// if ($this->session->userdata("is_logged_in")) {
		$this->load->view('top_page', $data,);
		// } else {
		// 		redirect("kinsta/lp");
		// }

	}
	public function addFileMesMenTra()
	{
		$token = isset($_POST['token']) ? $_POST['token'] : '';
		$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
		unset($_SESSION["token"]);

		if ($token != "" && $token == $session_token) {

			$this->load->model('Kinsta_model');
			$data = null;
			$data['uploadFile'] = $_FILES['uploadFile']['name'] ?: null;
			$data['uploadPostMessage'] = $this->input->post('uploadPostMessage', true) ?: null;
			$data['uploadMyMenu'] = $this->input->post('uploadMyMenu', true) ?: null;
			$data['uploadMyTraining'] = $this->input->post('uploadMyTraining', true) ?: null;
			$email = ($_SESSION["E-mail"]);

			$data['user_id'] = $this->Kinsta_model->get_userid_upload($email);
			if ($this->Kinsta_model->uploadPostMessageMenuTraning($data)) {
				$_SESSION['success_message'] = '投稿データを保存しました。';
			} else {
				$_SESSION['error_message'] = '保存に失敗しました。';
			}
			header('Location:/kinsta/rank');
			exit();
		} else {
			// $data[]=$token;
			// $data[]=$session_token;

			echo "ERROR：不正な登録処理です";
			// $this->load->view('header_page',$data);
			// 	exit();
		}
	}
	public function serch()
	{

		header("Content-Type: application/json; charset=utf-8");

		$keyword = $this->input->post('serchText', true);
		$this->load->model('Kinsta_model');
		$data['match_data'] = $this->Kinsta_model->serch_for($keyword);
		echo json_encode(['message' => $data['match_data']]);
		exit();
	}
	public function getMessageMenuTraning()
	{
		$this->load->model('Kinsta_model');
		header("Content-Type: application/json; charset=UTF-8");
		$data = file_get_contents('php://input');
		$data = json_decode($data, true);
		$data['mestraMen'] = $this->Kinsta_model->getMessageMenuTraning($data);
		echo json_encode(['message' => $data['mestraMen']]);

		// if(!empty($data['mestraMen'] = $this->Kinsta_model->getMessageMenuTraning($data))){
		// exit();
		// };

	}
	public function kiretemasuClick()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$data = file_get_contents('php://input');
		$data = json_decode($data, true);
		$this->load->model('Kinsta_model');
		$data['countKiretemasu'] = $this->Kinsta_model->kiretemasuClick($data);
		// var_dump($data['countKiretemasu']);
		echo json_encode(['message' => $data['countKiretemasu']]);
	}
	public function kiretemasuFirst()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$data = file_get_contents('php://input');
		$data = json_decode($data, true);
		$this->load->model('Kinsta_model');
		$data['countKiretemasuFirst'] = $this->Kinsta_model->kiretemasuFirst($data);
		// var_dump($data['countKiretemasuFirst']);
		echo json_encode(['message' => $data['countKiretemasuFirst']]);
	}

	public function addMember()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$data = file_get_contents('php://input');
		$data = json_decode($data, true);
		$this->load->model('Kinsta_model');
		if ($this->Kinsta_model->addMember($data)) {
			echo json_encode(['message' => "マッスルメンバー解除"], JSON_UNESCAPED_UNICODE);
			$this->Kinsta_model->recount_follower($data);
		} else {
			echo json_encode(['message' => "マッスルメンバー追加"], JSON_UNESCAPED_UNICODE);
			$this->Kinsta_model->recount_follower($data);
		}
		exit();
	}

	public function addOrDelete()
	{
		header("Content-Type: application/json; charset=UTF-8");

		$data['memberUserId'] = $this->input->post('memberUserId', true);
		$data['loginId'] = $this->input->post('loginId', true);

		$this->load->model('Kinsta_model');
		if ($this->Kinsta_model->addOrDelete($data)) {
			echo json_encode(['add' => "マッスルメンバー追加"], JSON_UNESCAPED_UNICODE);
			$this->Kinsta_model->recount_follower($data);
		} else {
			echo json_encode(['alreadyAdd' => "マッスルメンバー解除"], JSON_UNESCAPED_UNICODE);
			$this->Kinsta_model->recount_follower($data);
		}
		exit();
	}

	public function memberChange()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$loginId = file_get_contents('php://input');
		$data[] = json_decode($loginId, true);
		$this->load->model('Kinsta_model');
		$data['fiveChange'] = $this->Kinsta_model->random_member_five();

		for ($i = 0; $i < 5; $i++) {
			$data[0]['memberUserId'] = $data['fiveChange'][$i]['user_id'];
			if ($this->Kinsta_model->addOrDelete($data)) {
				$data['fiveChange'][$i]['mussleMemberAddOrDelete'] = 'マッスルメンバー追加';
			} else {
				$data['fiveChange'][$i]['mussleMemberAddOrDelete'] = 'マッスルメンバー解除';
			}
		}
		echo json_encode(['message' => $data['fiveChange']]);
		exit();
	}




	public function onlyMypage()
	{
		$id = $_GET['userId'] ?: null;
		if (!empty($id) && is_numeric($id)) {
			$this->load->model('Kinsta_model');
			$data['myData'] = $this->Kinsta_model->mydata_get($id);
			$this->load->view('header_page');
			$this->load->view('only_mypage', $data);
		} else {
		}
	}

	public function select()
	{
		$this->load->view('header_page');
		// $this->load->view('select_page');
	}

	public function rank()
	{
		$this->load->model('Kinsta_model');
		$email = ($_SESSION["E-mail"]);
		$data = null;
		$data['login_userid'] = $this->Kinsta_model->get_userid($email);

		// $data['total_rank'] = $this->Kinsta_model->total_rank();
		$data['message_rank'] = $this->Kinsta_model->message_rank();
		$data['favorite'] = $this->Kinsta_model->favorite_rank();

		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('rank_page', $data);
	}
	public function shoulderRank()
	{
		$this->load->model('Kinsta_model');
		$data['favorite_shoulder_rank'] = $this->Kinsta_model->favorite_shoulder_rank();

		if ($this->session->userdata("is_logged_in")) {
			// $this->load->view('top_page', $data,);
		} else {
			redirect("kinsta/lp");
		}

		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('shoulder_rank_page', $data);
	}
	public function armRank()
	{
		$this->load->model('Kinsta_model');
		$data['favorite_arm_rank'] = $this->Kinsta_model->favorite_arm_rank();
		if ($this->session->userdata("is_logged_in")) {
			// $this->load->view('top_page', $data,);
		} else {
			redirect("kinsta/lp");
		}
		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('arm_rank_page', $data);
	}
	public function breastRank()
	{
		$this->load->model('Kinsta_model');
		$data['favorite_breast_rank'] = $this->Kinsta_model->favorite_breast_rank();
		if ($this->session->userdata("is_logged_in")) {
			// $this->load->view('top_page', $data,);
		} else {
			redirect("kinsta/lp");
		}
		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('breast_rank_page', $data);
	}

	public function absRank()
	{
		$this->load->model('Kinsta_model');
		$data['favorite_abs_rank'] = $this->Kinsta_model->favorite_abs_rank();
		if ($this->session->userdata("is_logged_in")) {
			// $this->load->view('top_page', $data,);
		} else {
			redirect("kinsta/lp");
		}
		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('abs_rank_page', $data);
	}
	public function footRank()
	{
		$this->load->model('Kinsta_model');
		$data['favorite_foot_rank'] = $this->Kinsta_model->favorite_foot_rank();
		if ($this->session->userdata("is_logged_in")) {
			// $this->load->view('top_page', $data,);
		} else {
			redirect("kinsta/lp");
		}
		if (!isset($_SESSION)) {
			session_start();
		}

		$token = uniqid('', true);
		$data['token'] = $token;
		$_SESSION['token'] = $token;

		$this->load->view('header_page', $data);
		$this->load->view('foot_rank_page', $data);
	}
}

///////////////////////////////////二宮///////////////////////////////////////////////////////////////
