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


	public function mypage()
	{
		if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
			$this->load->view("Mypage");
		} else {									//ログインしていない場合の処理
			redirect("main/lp");
		}
	}

	public function post()
	{
		if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
			$this->load->view('Post_scr');
		} else {									//ログインしていない場合の処理
			redirect("main/lp");
		}
	}

	public function individual()
	{
		if ($this->session->userdata("is_logged_in")) {	//ログインしている場合の処理
			$this->load->view('Individual_img');
		} else {									//ログインしていない場合の処理
			redirect("main/lp");
		}
	}


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
}
