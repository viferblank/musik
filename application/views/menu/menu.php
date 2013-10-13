<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css'/>
	<div class='menukiri1' >
		<?php 
			//=========================Menu Admin==========================//
			if(($this->session->userdata('status') == "aktif") AND ($this->session->userdata('level') == "admin"))
			{
			?>
			<div class='menukiri' >
					<!--Menu Navigasi Sebelah Kanan-->
						<ul>
							<li><a href='<?php echo base_url();?>first/allmusik/'>All Musik<a/></li>	
							<li><a href='<?php echo base_url();?>first/musik/'>Musik<a/></li>	
							<li><a href='<?php echo base_url();?>second/user/'>User<a/></li>
							<li><a href='<?php echo base_url();?>first/profile/'>Profile<a/></li>
							<li><a href='<?php echo base_url();?>first/password/'>Password<a/></li>
						</ul>
						
				</div>
			<? 
			}
			//=========================Menu User==========================//
			else if(($this->session->userdata('status') == "aktif") AND ($this->session->userdata('level') == "user")){
			
			?>
				<div class='menukiri' >
					<!--Menu Navigasi Sebelah Kanan-->
						<ul>
							<li><a href='<?php echo base_url(); ?>first/allmusik/'>Home<a/></li>
							<li><a href='<?php echo base_url(); ?>first/musik/'>Musik<a/></li>	
							<li><a href='<?php echo base_url();?>first/profile/'>Profile<a/></li>
							<li><a href='<?php echo base_url();?>first/password/'>Password<a/></li>
						</ul>
						
				</div>
		<? }
			//=========================Menu Pengunjung==========================//
			else{
		?>
				<div class='menukiri' >
					<!--Menu Navigasi Sebelah Kanan-->
						<ul>
							<li><a href='<?php echo base_url(); ?>first/allmusik/'>Home<a/></li>
							<li><a href='<?php echo base_url(); ?>first/musik_baru/'>Musik Baru<a/></li>	
							<li><a href='#'>Jenis<a/>
								<ul>
									<li><a href='<?php echo base_url(); ?>first/rock/'>Rock<a/></li>
									<li><a href='<?php echo base_url(); ?>first/pop/'>Pop<a/></li>
								</ul>
							</li>
							<li><a href='<?php echo base_url();?>first/barat/'>Barat<a/></li>
						</ul>
						
				</div>
		<? } ?>

	<?php 
		$this->load->view('menu/login');
	?>
	</div>