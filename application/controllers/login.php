<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	    var $imagePath = 'image/';
		
		function __Construct(){
			parent::__Construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('msk');
			$this->session->userdata('log');
			//$this->load->helper('parenta');
			
		}
		function logout(){
			$this->session->sess_destroy();
			$data['page'] = "home";			
			$this->load->view('view',$data);

		}
		//======================Login=================//		
		function loginl(){
			$user = $this->input->post('user');
			$query = $this->db->query("SELECT * FROM user WHERE username ='$user'");
			$data = $query->row_array();
			$q = $this->msk->clogin();
			$dt['page'] ='home';
			if($q){
				$session = array('user' => $user,
				'name' => $data['fullname'], 
				'foto' => $data['foto'], 
				'level' => $data['level'] , 
				'status' => $data['status'] ,
				'id' => $data['id_user']);
				$this->session->set_userdata($session);
				$this->load->view('view',$dt);
			}else{
				//$pesan['pesan'] ="salah";
				$this->load->view('view' , $dt);
				echo "<script>alert('Maaf anda salah username/password');</script>";
			}
		}
		//======================Register=================//		
		function Register(){
			$data['page']='register';
			$this->load->view('view',$data);
		}
		function Register1(){
			$user = $this->input->post('user');
			$email = $this->input->post('email');
			$query = $this->db->query("SELECT * FROM user WHERE username = '$user' or email = '$email' ");
			$nama_asli = $_FILES['userfile']['name'];
			$config['file_name'] = $nama_asli;
			$config['upload_path'] = './image/user';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9000';
			$config['max_width']  = '9000';
			$config['max_height']  = '9000';
			$this->load->library('upload', $config);
			$datas['page']='home';
			if($query->num_rows == 1){
				echo "<script>alert('maaf username atau email anda sudah terpakai');location='.base_url()./login/Register'</script>";
				exit;}
			else{
				if ( !  $this->upload->do_upload())
					{
						echo $this->upload->display_errors('<p>', '</p>');
						$this->load->view('view', $datas);
					}
				else{
						$get_name = $this->upload->data();
						$nama_foto = $get_name['file_name'];
						$dt = $this->msk->regis($nama_foto);
						if($dt){
							$this->load->view('view',$datas);
							echo "<script>alert('Sukses Registrasi');</script>";
						}else{
							$this->load->view('view',$datas);
							echo "<script>alert('Maaf anda salah username/password');</script>";
						}
				}
			}
			
		}				
	}
