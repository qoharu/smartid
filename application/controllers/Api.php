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
			header('Access-Control-Allow-Origin: *');
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

		function postGeo(){
			header('Access-Control-Allow-Origin: *');
			$data['long'] = $this->input->post('long');
			$data['lat'] = $this->input->post('lat');
			$data['mac'] = $this->input->post('mac');
			$kirim = $this->Main_model->postgeo($data['long'],$data['lat'],$data['mac']);
			if ($kirim) {
				$message['status'] = true;
			}else{
				$message['status'] = false;
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
			header('Access-Control-Allow-Origin: *');
			$data['id_user']=$this->input->post('id_user');
			$data['stasiun_asal']=$this->input->post('stasiun_asal');
			$data['stasiun_tujuan']=$this->input->post('stasiun_tujuan');
			$data['tanggal_keberangkatan']=$this->input->post('tanggal_keberangkatan');
			$data['waktu_keberangkatan']=$this->input->post('waktu_keberangkatan');
			$data['harga_tiket']=$this->input->post('harga_tiket');
			$result = $this->Main_model->ticketPost($data);
			if ($result) {
				$message['result'] = true;
				echo json_encode($message);
				if (!$ajax) redirect('home?notif=1&pesan=Anda berhasil memesan tiket baru');
			}else{
				$message['result'] = false;
				echo json_encode($message);
				if (!$ajax) redirect('home?notif=0&pesan=Pemesanan tiket tidak berhasil');
			}
		}
		function checkMac(){
			header('Access-Control-Allow-Origin: *');
			$mac = $this->input->post('mac');
			$ini = $this->Main_model->checkMac($mac);
			if ($ini == true) {
				$message['registered'] = true;
			}else{
				$message['registered'] = false;
			}
			echo json_encode($message);
		}

		function getUserData(){
			header('Access-Control-Allow-Origin: *');
			$mac = $this->input->post('mac');
			$ini = $this->Main_model->getUserMac($mac);
		}

		function getStasiun(){
			header('Access-Control-Allow-Origin: *');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getStasiun()));
		}

		function getWaktu($asal,$tujuan){
			header('Access-Control-Allow-Origin: *');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getWaktu($asal,$tujuan)));
		}

		function getHarga($asal,$tujuan){
			header('Access-Control-Allow-Origin: *');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getHarga($asal,$tujuan)));
		}

		function getDataTiket(){
			header('Access-Control-Allow-Origin: *');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getDataTiket()));
		}

		function getUserTerdaftar(){
			header('Access-Control-Allow-Origin: *');
			$url = base_url('assets/data/network.json');
			$contents = file_get_contents($url); 
			$contents = utf8_encode($contents); 
			$results = json_decode($contents); 

			$daftarhadir = $this->Main_model->getDataUser();
		    $i=0;
		    $dataorang="";
		    foreach ($daftarhadir as $data) {
		    	if ($this->getMac($data->mac_address, $results, count($results)-1)){
			    	$dataorang[$i]['id_user'] = $data->id_user;
			    	$dataorang[$i]['no_id'] = $data->no_id;
			    	$dataorang[$i]['nama'] = $data->nama;
			    	$dataorang[$i]['mac_address'] = $data->mac_address;
			    	$dataorang[$i]['waktu_login'] = $data->waktu_login;
			    	$dataorang[$i]['email'] = $data->email;
			    	$i++;
		    	}
		    }

		    $this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($dataorang));
		}

		function getDataUser(){
			header('Access-Control-Allow-Origin: *');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getDataUser()));
		}

		function getPersonal(){
			header('Access-Control-Allow-Origin: *');
			$mac = $this->input->post('mac');
			$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($this->Main_model->getPersonal($mac)));	
		}

		function getMac($mac,$in,$count){
			$hasil = FALSE;
        	for ($i=0; $i <= $count ; $i++) { 
        			// echo $mac." - ".$in[$i]->mac."\n";
        		if ( strtolower($mac) == strtolower($in[$i]->mac)) {
					$hasil = TRUE;
					// echo "true";
        		}
        	}
        	return $hasil;
    	}

    	function cekip(){
    		$url = base_url('assets/data/network.json');
			$contents = file_get_contents($url); 
			$contents = utf8_encode($contents); 
			$results = json_decode($contents);
			$message = "";
			// echo $_SERVER['REMOTE_ADDR']."\n\n";
			for ($i=0; $i < count($results) ; $i++) {
				// echo $results[$i]->ipv4."\n"; 
				if ($_SERVER['REMOTE_ADDR'] == $results[$i]->ipv4) {
					$message['ip'] = $results[$i]->ipv4;
					$message['mac'] = $results[$i]->mac;
				}
			}
			echo json_encode($message);
    	}


	}




