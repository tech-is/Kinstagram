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

	public function lp()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('kin_top');
	}

	public function validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "メール", "required");
		$this->form_validation->set_rules("password", "パスワード", "required|md5");
	}
}
