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
		function getPersonal($mac){
			return $this->db->query("SELECT * FROM user WHERE mac_address='$mac' ")->result();
		}
		function postgeo($long,$lat,$mac){
			$query = $this->db->query("UPDATE user SET geo_long = '$long', geo_lat = '$lat' WHERE mac_address = '$mac' ");
			if ($query) {
				return true;
			}else{
				return false;
			}
		}

		function getDataTiket(){
			return $this->db->query("
				SELECT a.id_tiket, a.id_user, a.tanggal_keberangkatan, c.waktu, b.harga, d.nama_stasiun as st_asal, e.nama_stasiun as st_tujuan, f.nama as nama

				FROM tiket a, harga_tiket b, waktu_keberangkatan c, stasiun d, stasiun e, user f

				WHERE a.waktu_keberangkatan = c.id_waktu AND a.harga_tiket = b.id_harga AND a.stasiun_asal = d.id_stasiun AND a.stasiun_tujuan = e.id_stasiun AND a.id_user = f.id_user
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
		function checkMac($mac){
			$db=$this->db->query("select * from user where mac_address='$mac'");
			if($db->num_rows()>=1){
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






