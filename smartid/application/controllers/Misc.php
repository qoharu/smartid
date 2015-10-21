<?php 

	/**
	* 
	*/
	class Misc extends CI_Controller
	{
		
		function index(){
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
		}

		function checkin(){
			$isLogin = $this->session->userdata('isLogin');
			if(!$isLogin){
				redirect('account/login?notif=2&pesan=you should login first to buy a tickets');
			}
			$data['stasiun'] = $this->Main_model->getStasiun();

			$this->load->view('header');
			$this->load->view('ticket');
			$this->load->view('footer');
		}

		function tutorial(){
			echo "Under Contruction";
			$this->load->view('header');
			$this->load->view('footer');
		}

		function terdaftar(){
			$data['daftarhadir'] = $this->Main_model->getDataUser();

			$this->load->view('header',$data);
			$this->load->view('terdaftar');
			$this->load->view('footer');
		}
	}




