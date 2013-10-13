<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css'/>
	<label class='a' align='center'> <center>Register User</center></label>
	<hr>
<?php echo form_open_multipart('login/Register1',array('method'=>'post')) ?>
		<table border='0' cellspacing='20' align='center'>
			<tr>
				<td width='100px'>Fullname</td>
				<td align='right'><input  name='name' style='width:200px;' class='a' type='name' placeholder='Masukkan Nama' required></td>
			</tr>
			<tr>
				<td>Username</td>
				<td align='right'><input  name='user' style='width:200px;' class='a' type='name' placeholder='Masukkan Username' required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td align='right'><input name='pass' style='width:200px;' class='a' type='password' placeholder='Masukkan Password' required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td align='right'><input name='email' style='width:200px;' class='a' type='email' placeholder='Masukkan Email' required></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="userfile" size="20" /></td>
			</tr>
			<tr>
				<td><input name='submit' type='submit' value='Submit'></td>
			</tr>
		</table>
<?php echo form_close(); ?>