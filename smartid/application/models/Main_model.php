<?php 

	/**
	* 
	*/
	class Main_model extends CI_Model
	{
		
		function registerPost($data){
			$password=md5($data['password']);
			$db=$this->db->query("select * from user where email='$data[email]' or mac_address='$data[mac]' ");

			if($db->num_rows()>=1){
				return FALSE;
			}else{
				$query=$this->db->query("insert into user(no_id, nama, mac_address, email, no_hp, alamat, password) 
					values('$data[identitas]','$data[nama]','$data[mac]','$data[email]','$data[nohp]','$data[alamat]','$password')");
				if ($query) {
					return TRUE;
				}else{
					return FALSE;
				}
			}
		}

		function ticketPost($data){
			$query=$this->db->query("INSERT INTO tiket(id_user,stasiun_asal,stasiun_tujuan,tanggal_keberangkatan,waktu_keberangkatan,harga_tiket) 
					VALUES('$data[id_user]','$data[stasiun_asal]','$data[stasiun_tujuan]','$data[tanggal_keberangkatan]','$data[waktu_keberangkatan]','$data[harga_tiket]')");
			if ($query) {
				return TRUE;
			}else{
				return FALSE;
			}
		}

		function getStasiun(){
			return $this->db->query("SELECT * FROM stasiun")->result();
		}

		function getWaktu($asal,$tujuan){
			return $this->db->query("SELECT * FROM waktu_keberangkatan 
				WHERE stasiun_asal='$asal'
				AND stasiun_tujuan='$tujuan' ")->result();
		}

		function getHarga($asal,$tujuan){
			return $this->db->query("SELECT * FROM harga_tiket 
				WHERE asal='$asal'
				AND tujuan='$tujuan' ")->result();
		}

		function getDataUser(){
			return $this->db->query("SELECT * FROM user")->result();
		}

		function getDataTiket(){
			return $this->db->query("SELECT id_user,tanggal_keberangkatan, stasiun_asal.nama_stasiun AS asl,
				stasiun_tujuan.nama_stasiun AS stasiun_tujuan, waktu.waktu AS waktu_keberangkatan,
				harga.harga AS harga_tiket 
				FROM tiket, harga_tiket, stasiun, waktu_keberangkatan
				INNER JOIN stasiun AS stasiun_asal ON (tiket.stasiun_asal = stasiun.id_stasiun)
				INNER JOIN stasiun AS stasiun_tujuan ON (tiket.stasiun_tujuan = stasiun.id_stasiun)
				INNER JOIN waktu_keberangkatan AS waktu ON (tiket.waktu_keberangkatan = waktu_keberangkatan.id_waktu)
				INNER JOIN harga_tiket as harga ON (tiket.harga_tiket = harga_tiket.id_harga)
			")->result(); 
		}

		function validate($data){
			$password=md5($data['password']);
			$query="select * from user where email='$data[email]' and password='$password' ";
			$db=$this->db->query($query);
			if($db->num_rows()==1){
				$data=$db->row();
				$admin = false;
				if ($data->email=='admin@smartid.com') $admin = true;
				$this->setsession($data,$admin);
				return true;
			}else{
				return false;
			}
		}

		function setsession($data, $admin=false)
		{
			$sesi = array(
		        'uid' => $data->id_user,
		        'identitas' => $data->no_id,
		        'email'  => $data->email,
		        'nama'  => $data->nama,
		        'mac'  => $data->mac_address,
		        'admin'  => $admin,
		        'isLogin'  => TRUE
		    );
		    $this->session->set_userdata($sesi);
		}

	}






