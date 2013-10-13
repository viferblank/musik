<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Third extends CI_Controller {
	//======================Musik Baru=================//
	function musik()
	{
		$config['base_url'] = base_url().'user/musik/';
		$this->pagination->initialize($config);
		$data['page'] = "Tmusik";
		$data['judul'] = "TMusik";
		$this->load->view('view',$data);
	}
	//======================Barat=================//		
	function profile(){
		$config['base_url']=base_url().'user/profile/';
		$this->pagination->initialize($config);
		$data['page']="profile";
		$data['judul']="profile";
		$this->load->view('view',$data);
	}
	}
