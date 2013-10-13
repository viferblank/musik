<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {
		function __Construct(){
			parent::__Construct();
			$this->load->model('msk');
			$this->session->userdata('log');
			$this->load->library('pagination');
			$this->load->helper('download');
		}
		function index()
		{
			$data['page'] = "home";
			$data['judul'] = "Home";
			$this->load->view('view',$data);
		}

		//======================Musik Baru=================//
		function musik_baru()
		{
			$config['base_url'] = base_url().'first/musik_baru';
			$config['total_rows'] = $this->db->count_all('album');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			$data["data"] = $this->msk->m_musik_baru($config["per_page"], $this->uri->segment(3));
			$data["links"] = $this->pagination->create_links();
			$data['page'] = "musik_baru";
			$data['judul'] = "Musik_baru";

			$this->load->view('view',$data);
		}
		//======================Musik=================//
		function musik()
		{
			$config['base_url'] = base_url().'first/musik';
			$config['total_rows'] = $this->db->count_all('album');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			if($this->session->userdata('level') =='admin'){
				$msk = $this->msk->m_musik_us($config["per_page"], $this->uri->segment(3));
			}else{
				$msk = $this->msk->m_musik_ad($config["per_page"], $this->uri->segment(3));
			}
			$data["data"] = $msk;
			$data["links"] = $this->pagination->create_links();
			$data['page'] = "musik";
			$data['judul'] = "Musik";

			$this->load->view('view',$data);
		}

		function allmusik()
		{
			$config['base_url'] = base_url().'first/allmusik';
			$config['total_rows'] = $this->db->count_all('album');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			$data["data"] = $this->msk->m_musik($config["per_page"], $this->uri->segment(3));
			$data["links"] = $this->pagination->create_links();
			$data['page'] = "allmusik";
			$data['judul'] = "Allmusik";

			$this->load->view('view',$data);
		}
		//======================Delete Musik=================//	
		function hapus_musik(){
		$id=$this->uri->segment(3);
		$file=$this->uri->segment(4);
		$this->msk->hapus_musik($id);
		$data['page']='allmusik';
			$this->load->view('view',$data);
			echo "<script>alert('Hapus Musik Beerhasil');location='".base_url()."first/allmusik'</script>"; 
			return unlink('musik/'.$file);
		}
		//======================Barat=================//		
		function barat(){
			$config['base_url'] = base_url().'first/barat';
			$config['total_rows'] = $this->db->count_all('album') ;
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			$data['page'] = "barat";
			$data['judul'] = "Barat";
			$jenis="barat";
			$data["data"] = $this->msk->m_musik_barat($jenis, $config["per_page"], $this->uri->segment(3));
			$data["links"] = $this->pagination->create_links();
			$this->load->view('view',$data);
		}
		//======================Pop=================//		
		function pop(){
			$config['base_url'] = base_url().'first/pop';
			$config['total_rows'] = $this->db->count_all('album');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			$data["data"] = $this->msk->m_musik_pop($config["per_page"], $this->uri->segment(3));
			$data["links"] = $this->pagination->create_links();
			$data['page'] = "barat";
			$data['judul'] = "Barat";

			$this->load->view('view',$data);
		}
		//======================Rock=================//		
		function rock(){
			$config['base_url'] = base_url().'first/rock';
			$config['total_rows'] = $this->db->count_all('album');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			$config['next_tag']='Next';
			$config['prev_page']='Previus';
			$config['next_tag_open'] ="Next";
			$this->pagination->initialize($config);
			$jenis='rock';
			$data["data"] = $this->msk->m_musik_rock($config["per_page"], $this->uri->segment(3),$jenis);
			$data["links"] = $this->pagination->create_links();
			$data['page'] = "rock";


			$this->load->view('view',$data);
		}
		//======================Profile=================//
		function profile()
		{
			$id = $this->session->userdata('id');
			$config['base_url'] = base_url().'lain/profile/';
			$this->pagination->initialize($config);
			$data['data'] = $this->msk->tampilprofile($id);
			$data['page'] = "profile";
			$data['judul'] = "Profile";
			$this->load->view('view',$data);
		}
		//======================Change password=================//
		function password()
		{
			$id = $this->session->userdata('id');
			$config['base_url'] = base_url().'lain/profile/';
			$this->pagination->initialize($config);
			$data['data'] = $this->msk->tampilprofile($id);
			$data['page'] = "password";
			$this->load->view('view',$data);
		}
		function password_c()
		{
			$id=$this->session->userdata('id');
			$lib=$this->msk->pass_change($id);
			$data['page'] = "password";
			$data['img'] = "password";
			$pass=$this->input->post('pass');
			$pass_con=$this->input->post('confir');
			if($pass == $pass_con){
				if($lib){
					echo "<script>alert('Change Passwrod Sukses');location='".base_url()."first/password'</script>";
				}else{
					echo "<script>alert('Change Passwrod Gagal');location='".base_url()."first/password'</script>";
				}
			}
			else{

					echo "<script>alert('Password Berbeda');location='".base_url()."first/password'</script>";
			}
		}
		function profile_edit(){
			$id = $this->session->userdata('id');
			$config['base_url'] = base_url().'admin/edit/';
			$this->pagination->initialize($config);
			$data['data'] = $this->msk->tampilprofile($id);
			$data['page']='profile_edit';
			$this->load->view('view',$data);
		}
		function profile_edit_p(){
			if($this->input->post('password') == ''){
				$pass=$this->input->post('pass');
				}
			else{
				$pass=$this->input->post('password');			
			}
			if($this->session->userdata('level') == 'admin'){
			$fld="admin";
			}
			else{
			$fld="user";
			}
			$nama_asli = $_FILES['userfile']['name'];
			$config['file_name'] = $nama_asli;
			$config['upload_path'] = './image/'.$fld;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9000';
			$config['max_width']  = '9000';
			$config['max_height']  = '9000';
			$this->load->library('upload', $config);
			$data['page']='home';
			if ( ! $this->upload->do_upload())

					{
						//echo $this->upload->display_errors('<p>', '</p>');
						$this->load->view('view',$data);
					}
			else{
						$get_name = $this->upload->data();
					if($this->input->post('userfile') ==''){
						$nama_file = $get_name['file_name'];
					}else{
						$nama_file = $this->input->post('foto');
					}
					$query= $this->msk->edit_profile($pass,$nama_file);
					if($query){
					$this->load->view('view',$data);
					echo "<script>alert('Sukses Edit Profil');location='".base_url()."first/profile'</script>";
					}
					else{
					$this->load->view('view',$data);
					echo "<script>alert('Failed Edit Profil ...!!');location='".base_url()."first/profile'</script>";
					}
				}
		}
		function add_musik(){
			$data['page']='add_musik';
			$data['data']=$this->msk->jenis_lagu();
			$this->load->view('view',$data);
		}
		function add_musik_p(){
			if($this->session->userdata('level') == 'admin'){
			$fld="admin";
			}
			else{
			$fld="user";
			}

			$nama_asli = $_FILES['userfile']['name'];
			$config['file_name'] = $nama_asli;
			$config['upload_path'] = './musik';
			$config['allowed_types'] = 'mp3|ogg|Flac';
			$config['max_size']	= '9000';
			$config['max_width']  = '9000';
			$config['max_height']  = '9000';
			$data['page']='home';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())

				{
				echo $this->upload->display_errors('<p>', '</p>');
				$this->load->view('view',$data);
				}
			else{
			$get_name = $this->upload->data();
			$nama_file = $get_name['file_name'];
			$query=$this->msk->add_musik_p($nama_file);

				if($query){
					$this->load->view('view',$data);
					echo "<script>alert('Sukses Upload Musik');location='".base_url()."first/musik'</script>";
					}
					else{
					$this->load->view('view',$data);
					echo "<script>alert('Failed Upload Musik ...!!');location='".base_url()."first/musik'</script>";
					}
				}
		}
		function download(){
			$filename=$this->uri->segment(3);
			$data = file_get_contents("musik/".$filename);
			$dl=force_download($filename, $data); 
			echo $dl;
		}
	}
