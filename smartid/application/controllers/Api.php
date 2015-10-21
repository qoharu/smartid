<?php 

	/**
	* 
	*/
	class Api extends CI_Controller
	{
		
		function index(){
			$this->load->view('header');
			echo "Welcome to API Page";
			$this->load->view('footer');
		}

		function post_register($ajax=false){
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['nama'] = $this->input->post('nama');
			$data['identitas'] = $this->input->post('identitas');
			$data['mac'] = $this->input->post('mac');
			$data['alamat'] = $this->input->post('alamat');
			$data['nohp'] = $this->input->post('nohp');

			$result = $this->Main_model->registerPost($data);
			if ($result) {
				$message['status'] = 'true';
				$message['message'] = 'User has been successfully registered, please login';
				echo json_encode($message);
				if (!$ajax) redirect('home?notif=1&pesan=User has been successfully registered, please login');
			}else{
				$message['status'] = 'false';
				$message['message'] = 'Something wrong, try again with another details';
				echo json_encode($message);
				if (!$ajax) redirect('account/register?notif=2&pesan=Something wrong, try again with another details');
			}
		}

		function post_login($ajax=false){
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$result = $this->Main_model->validate($data);
			if ($result) {
				redirect('home?notif=1&pesan=You\'ve been logged in');
			}else{
				redirect('account/login?notif=2&pesan=Wrong details, try again');
			}
		}
		function post_ticket($ajax=false){
			$data['id_user']=$this->input->post('id_user');
			$data['stasiun_asal']=$this->input->post('stasiun_asal');
			$data['stasiun_tujuan']=$this->input->post('stasiun_tujuan');
			$data['tanggal_keberangkatan']=$this->input->post('tanggal_keberangkatan');
			$data['waktu_keberangkatan']=$this->input->post('waktu_keberangkatan');
			$data['harga_tiket']=$this->input->post('harga_tiket');
			$result = $this->Main_model->ticketPost($data);
			if ($result) {
				redirect('home?notif=1&pesan=Anda berhasil memesan tiket baru');
			}else{
				echo "gagal";
				var_dump($data);
			}
		}

		function getStasiun(){
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getStasiun()));
		}

		function getWaktu($asal,$tujuan){
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getWaktu($asal,$tujuan)));
		}

		function getHarga($asal,$tujuan){
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getHarga($asal,$tujuan)));
		}

		function getDataTiket(){
			// $this->output
		 //    ->set_content_type('application/json')
		 //    ->set_output(json_encode($this->Main_model->getDataTiket()));
			var_dump($this->Main_model->getDataUser());
		}

		function getDataUser(){
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getDataUser()));
		}


	}




