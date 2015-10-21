<?php 

	/**
	* 
	*/
	class Account extends CI_Controller
	{
		
		function login(){
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
		
		function register(){
			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		}

		function logout(){
			$this->session->sess_destroy();
			redirect('account/login?notif=1&pesan=successfully logged out');
		}


	}






