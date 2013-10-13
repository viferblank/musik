<link rel='stylesheet' href='<?php echo base_url(); ?>/css/full.css' type='text/css' />
<?php
if($this->session->userdata('level')=='admin'){
echo"<div class='headeradmin'></div>";
}else{
echo"<div class='header'></div>";}
 ?>