<?php

class Logout extends CI_Controller{

	function index(){

		$this->session->unset_userdata('nameFull');
		$this->session->unset_userdata('memberId');
		$this->session->unset_userdata('image');
		$this->session->unset_userdata('email');

		$this->session->sess_destroy();

		//$this->load->helper('url');
		redirect(base_url());
	}
}