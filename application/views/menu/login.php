<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css'/>
	<!--Script Untuk Login-->
	<hr>
	<?php

	if(($this->session->userdata('status') == "aktif") AND ($this->session->userdata('level') == "admin") || ($this->session->userdata('level') == "user")){
		?>
			Selamat Datang <?php echo $this->session->userdata('name'); ?>
			<a href='<?php echo base_url(); ?>login/logout' style='float:right;font-size:15px;'>Log out</a>
		<?
	}else{ ?>
		<form action='<?php echo base_url(); ?>login/loginl/' method='post'>
			<h3 align='center'>Login</h3>
			<?php 
				if(isset($pesan)){
					if($pesan == 'salah'){
						echo "Username / Password Salah";
					}
				}
			?>
				<div class='text'>	
					<img src='<?php echo base_url(); ?>/image/usr.png'></img>
					<input type='text' name='user' placeholder='Username' class='text1'><br>
				</div>
				<div class='text'>	
					<img src='<?php echo base_url(); ?>/image/gembok.png'></img>
					<input type='password' name='pass' placeholder='Password' class='text1'>
				</div>
				<a href='<?php echo base_url(); ?>login/register' align='left' >Sign Up</a>
					<input type='submit' name='submit' value='Log In' style='float:right;'>		

		</form>	
	<? }?>
