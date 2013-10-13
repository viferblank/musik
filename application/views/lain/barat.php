<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/css/full.css'/>

<table border='0' align='center'>
	<tr>
		<td colspan='7'>Musik Barat</td>
	</tr>
	<tr bgcolor='#078ff'>
		<td width=''>No</td>
		<td width=''>Judul Musik</td>
		<td width='400px'>File</td>
			<td width=''>Action</td>
	</tr>
			<?php 
			$i=1;
			foreach($data as $row): ?>
	<tr <?php if($i % 2 == 1){echo "bgcolor='#e2e5ef'";}else{echo "bgcolor='#bfddff'";}?>>
		<td><?php echo $i+$this->uri->segment(3);  ?></td>
		<td><?php echo $row->musik  ?></td>
		<td align='center'>	<audio controls><source src="<?php echo base_url(); ?>/musik/<?php echo $row->file; ?>" type="audio/mpeg" /> 	</audio></td>
		<td><a href='<?php echo base_url(); ?>first/download/<?php echo $row->file; ?>'>Download</a> <?php if($this->session->userdata('level') == 'admin') { ?> | <a href='<?php echo base_url();?>first/hapus_musik/<?php echo $row->id_album; ?>'>Hapus</a><? } ?></tr>
	</tr>
	<?php
	$i++;	
	endforeach; ?>

	
</table >
<hr>
<?php
	echo $links;
?>