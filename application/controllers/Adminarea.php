<?php 

	class Adminarea extends CI_Controller
	{
		
		function index(){
			if (!$this->session->userdata('admin')) {
				redirect('home?notif=2&pesan=Not authorized');
			}
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




