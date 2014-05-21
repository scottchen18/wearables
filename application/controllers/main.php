<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Europe/London');
class Main extends CI_Controller {

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
		
		/*$this->db->where('email','r@clayza.com');
		$query = $this->db->get('user');
		$query = $query->row_array();*/
		
		$data['title'] = 'Simply';
		$data['meta'] = '
						<meta name="description" content="" />
						
						';
		$data['f_meta'] = '
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="" />
			<meta property="description" content="" />
			<meta property="og:image" content="" />
			<meta property="og:url" content="" />
			<meta property="og:site_name" content="" />
		
							';
		//get portfolio videos
		
		$data['page'] = "home";
		$this->load->view('headers/header',$data);
		$this->load->view('main/landing',$data);
		$this->load->view('headers/footer',$data);

	}

}