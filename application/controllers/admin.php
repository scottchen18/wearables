<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Europe/London');
class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index()
	{
		$data['page'] = "home";
		$this->load->view('headers/header',$data);
		$this->load->view('main/admin',$data);
		$this->load->view('headers/footer',$data);
	}
}