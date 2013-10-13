<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css'/>
	<label class='a' align='center'> <center>Add Musik</center></label>
	<hr>
<?php
	if($this->session->userdata('status') == 'aktif'){
		if(($this->session->userdata('level') == 'admin') || ($this->session->userdata('level') == 'user')){
?>
<?php echo form_open_multipart('first/add_musik_p',array('method'=>'post')) ?>
		<table border='0' cellspacing='20' align='center'>
			<tr>
				<td width='100px'>Nama Album</td>
				<td align='right'><input  name='nama_album' style='width:200px;' class='a' type='name' placeholder='Masukkan Nama Album' required></td>
			</tr>
			<tr>
				<td>Nama Musik</td>
				<td align='right'><input  name='nama_musik' style='width:200px;' class='a' type='name' placeholder='Masukkan Nama Musik' required></td>
			</tr>
			<tr>
				<td>Nama Artis</td>
				<td align='right'><input  name='nama_artis' style='width:200px;' class='a' type='name' placeholder='Masukkan Nama Artis' required></td>
			</tr>
			<tr>
				<td>File</td>
				<td align='right'><input name='userfile' style='width:200px;' class='a' type='file'></td>
			</tr>
			<tr>
				<td>Jenis Lagu</td>
				<td align='right'><select name='jenis' style='width:200px;border-radius:5px;'>
							<?php foreach($data as $row): ?>
									<option value='<?php echo $row->id_jenis; ?>'> <?php echo $row->nama_jenis; ?></option>
							<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>Ket Album</td>
				<td><textarea name='ket_album' placeholder='Keterangan Album'></textarea></td>
			</tr>
			<tr>
				<td colspan='2' align='right'><input name='submit' style='width:100px;border-radius:5px;' type='submit' value='Add'></td>
			</tr>			
		</table>
	</form>
<?php
	echo form_close();
		}
	}

 ?>