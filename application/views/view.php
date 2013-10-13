<html>
<head><title>Musik Share</title>
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css' />
<link rel='shortcut icon' href='<?php echo base_url(); ?>/image/icon.ico' type='image/x-icon'/>
</head>
<body>
	<?php
	if(($this->session->userdata('level') == 'admin' ) AND ($this->session->userdata('status') == 'aktif')){
		?>
			<div id='body'>	
		<?
	}
	else{
	?>
		<div id='body'>
			<?php
			}
				$this->load->view('menu/header');
				$this->load->view('menu/menu');
			?>

			<div class='content'>
				<?php
	//========================User Biasa===============================//
					if($page == "home"){
						$this->load->view('home');
					}
					else if($page == "musik_baru"){
						$this->load->view('lain/musik_baru');
					}			
					else if($page == "barat"){
						$this->load->view('lain/barat');
					}
					else if($page == "register"){
						$this->load->view('menu/register');
					}
	//========================admin===============================//
					else if($page == "user"){
						$this->load->view('admin/user');
					}					
					else if($page == "musik"){
						$this->load->view('lain/musik');
					}
					else if($page == "profile"){
						$this->load->view('lain/profile');
					}
					else if($page == "tambah_user"){
						$this->load->view('admin/tambah');
					}
					else if($page == "password"){
						$this->load->view('lain/password');
					}
					else if($page == "edit_user"){
						$this->load->view('admin/edit');
					}
					else if($page == "profile_edit"){
						$this->load->view('lain/edit_profile');
					}
					else if($page == "add_musik"){
						$this->load->view('lain/add_musik');
					}
					else if($page == "allmusik"){
						$this->load->view('lain/allmusik');
					}
					else if($page == "pop"){
						$this->load->view('lain/pop');
					}
					else if($page == "rock"){
						$this->load->view('lain/rock');
					}
				?>
			</div>
			<?php
				$this->load->view('menu/footer');
			?>	
		</div>
</body>
</html>