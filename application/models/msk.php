<?php
	class Msk extends CI_Model{
		function clogin()
		{
			$user=$this->input->post('user');
			$pass=md5($this->input->post('pass'));
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			
			$q=$this->db->get('user');
			if($q->num_rows == 1){
				return true;
			}
		}
		function creg()
		{
			$user=$this->input->post('user');
			$pass=$this->input->post('pass');
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			
			$q=$this->db->get('user');
			if($q->num_rows == 1){
				return true;
			}
		}
		function tampiluser($limit,$start)
		{
			$this->db->limit($limit, $start);
			$query = $this->db->get("user");
	 
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
		}
		function edit_user($pass)
		{
			$query = array('fullname' => $this->input->post('name'),
				'username' => $this->input->post('user'),
				'password' => $pass,
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level'),
				'status' => $this->input->post('status')
			);
			$this->db->where('id_user',$this->input->post('id'));
			$up=$this->db->update('user',$query);
			return $up;
		}
		function edit_profile($pass,$nama_file)
		{
			$query = array('fullname' => $this->input->post('name'),
				'username' => $this->input->post('user'),
				'password' => $pass,
				'email' => $this->input->post('email'),
				'foto' => $nama_file,
				'level' => $this->input->post('level'),
				'status' => $this->input->post('status')
			);
			$this->db->where('id_user',$this->input->post('id'));
			$up=$this->db->update('user',$query);
			return $up;
		}
		function hapus_user($id_user)
		{
			$this->db->where('id_user',$id_user);
			$hapus = $this->db->delete('user');
		}
		function hapus_musik($id)
		{
			$this->db->where('id_album',$id);
			$hapus = $this->db->delete('album');
		}
		function tampilprofile($id)
		{
			$this->db->where('id_user',$id);
			$query = $this->db->get('user');
			return $query->result();
		}
		Function regis($nama_foto){

			$data = array('fullname' => $this->input->post('name'),
						'username' => $this->input->post('user'),
						'password' => md5($this->input->post('pass')),
						'email' => $this->input->post('email'),
						'foto' => $nama_foto,
						'level' => 'user',
						'status' => 'aktif',);
			$q = $this->db->insert('user',$data);
			return $q;
		}
		Function add_user(){

			$data = array('fullname' => $this->input->post('name'),
						'username' => $this->input->post('user'),
						'password' => md5($this->input->post('pass')),
						'email' => $this->input->post('email'),
						'level' => $this->input->post('level'),
						'status' => 'aktif',);
			$q = $this->db->insert('user',$data);
			return $q;
		}
		function pass_change($id){
			$edit = array('password' => md5($this->input->post('pass')));
			$this->db->where('id_user',$id);
			$id = $this->db->update('user',$edit);
			return $id;
		}
		function record_count_user() {
				$this->db->where('level','user');
				return $this->db->count_all("user");
		}
		function record_count_album() {
				return $this->db->count_all("album");
		}
		function jenis_lagu(){
			$query = $this->db->get('jenis_lagu');
			return $query->result();
		}
		function add_musik_p($nama_file){
			$datestring = "%Y-%m-%d";
			$time = time();
			$upl = mdate($datestring, $time);
			$id=$this->session->userdata('id');
			$data=array('id_user' => $id,
			'nama_album' => $this->input->post('nama_album'),
			'musik' => $this->input->post('nama_musik'),
			'artis' => $this->input->post('nama_artis'),
			'file' => $nama_file,
			'tgl_upload' => $upl,
			'id_jenis' => $this->input->post('jenis'),
			'ket_album' => $this->input->post('ket_album'));
			$id = $this->db->insert('album',$data);
			return $id;
		}
		function m_musik($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_us($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album WHERE id_user='$id'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_baru($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album order by id_album DESC");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_Ad($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album WHERE id_user='$id'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_barat($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album WHERE id_jenis='3'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_rock($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album WHERE id_jenis='2'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
		function m_musik_pop($limit, $start){
			$this->db->limit($limit, $start);
			$id=$this->session->userdata('id');
			$query=$this->db->query("SELECT * FROM album WHERE id_jenis='1'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			
		}
	}
?>