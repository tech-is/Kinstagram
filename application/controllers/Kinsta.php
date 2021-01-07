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
		$this->load->view('Mypage');
	}

	public function post()
	{
		$this->load->view('Post_scr');
	}

	public function individual()
	{
		$this->load->view('Individual_img');
	}


	////山下担当　lp,ログイン,会員登録,ログアウト,その他 /////
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
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "メール", "required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("user_name", "ユーザ名", "required|trim|");
		$this->form_validation->set_rules("password", "パスワード", "required|trim");
		$this->form_validation->set_rules("password_check", "パスワード確認", "required|trim|matches[password]");

		$this->form_validation->set_message("is_unique", "入力したメールアドレスはすでに登録されています");
		//必要であれば、ユーザ名もユニーク設定する。

		if ($this->form_validation->run()) {
			//ランダムキーを生成する
			$key = md5(uniqid());
			//Emailライブラリとモデルを読み込む。
			$this->load->library("email", array("mailtype" => "html"));
			$this->load->model("model_users");
			//送信元の情報
			$this->email->from("shono.yamashita@gmail.com", "送信元");
			//送信先の設定
			$this->email->to($this->input->post("email"));
			//タイトルの設定
			$this->email->subject("仮の会員登録が完了しました。");
			//メッセージの本文
			$message = "会員登録ありがとうございます。";
			// 各ユーザーにランダムキーをパーマリンクに含むURLを送信する
			$message .= "こちらをクリックして、会員登録を完了してください。";

			$this->email->message($message);

			//ユーザーに確認メールを送信できた場合、ユーザーを temp_users DBに追加する
			if ($this->model_users->add_temp_users($key)) {
				if ($this->email->send()) {
					echo "Message has been sent.";
				} else echo "Coulsn't send the message.";
			} else echo "problem adding to database";
		} else {
			echo "You can't pass,,,";
			$this->load->view("kin_top");
		}
	}

	public function login_validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "メール", "required|trim|xss_clean|callback_validate_credentials");
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
			if ($new_email = $this->model_users->add_user($key)) {	//add_usersがTrueを返したら以下を実行
				$data = array(
					"email" => $new_email,
					"is_logged_in" => 1
				);

				$this->sessinon->set_userdata($data);
				redirect("kinsta/mypage");
			} else echo "fail to add user. please try again";
		} else echo "invalid key";
	}
	///// 山下担当　ここまで ////////
}
