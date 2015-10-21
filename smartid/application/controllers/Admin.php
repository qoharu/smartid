<?php 

	class Admin extends CI_Controller
	{
		
		function index(){
			$this->load->view('header');
			$this->load->view('Admin');
			$this->load->view('footer');
		}

		function datatiket(){
			$this->load->view('header');
			$this->load->view('datatiket');
			$this->load->view('footer');
		}

		function daftarhadir(){
			$this->load->view('header');
			$this->load->view('datatiket');
			$this->load->view('footer');
		}

	}




