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
		
		$data['title'] = 'We Are Wearables';
		$data['meta'] = '
						<meta name="description" content="We Are Wearables is on a mission to make wearable tech accessible to people and businesses. Our hope is that by bringing people together with the tech we can work together to usher in this third wave of computing." />
						
						';
		$data['f_meta'] = '
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="We Are Wearables" />
			<meta property="description" content="We Are Wearables is on a mission to make wearable tech accessible to people and businesses. Our hope is that by bringing people together with the tech we can work together to usher in this third wave of computing." />
			<meta property="og:image" content="http://localhost/application/assets/img/w_logo.jpg" />
			<meta property="og:url" content="www.wearewearables.com" />
			<meta property="og:site_name" content="" />
		
							';
		//get portfolio videos
		$data['page'] = ($this->session->flashdata('page')) ? $this->session->flashdata('page'):'';
		
		$this->load->view('headers/header',$data);
		$this->load->view('main/landing',$data);
		$this->load->view('headers/footer',$data);

	}
	public function feature()
	{	
		
		/*$this->db->where('email','r@clayza.com');
		$query = $this->db->get('user');
		$query = $query->row_array();*/
		
		$data['title'] = 'Featured Story - Bionym';
		$data['meta'] = '
						<meta name="description" content="Put Your Heart Into It" />
						
						';
		$data['f_meta'] = '
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="" />
			<meta property="description" content="" />
			<meta property="og:image" content="" />
			<meta property="og:url" content="" />
			<meta property="og:site_name" content="" />';
		
		
		$data['page'] = "home";
		$this->load->view('headers/header',$data);
		$this->load->view('main/story',$data);
		$this->load->view('headers/footer',$data);

	}
	
	public function about()
	{	
		
		/*$this->db->where('email','r@clayza.com');
		$query = $this->db->get('user');
		$query = $query->row_array();*/
		
		$data['title'] = 'About';
		$data['meta'] = '
						<meta name="description" content="About We Are Wearables" />
						
						';
		$data['f_meta'] = '
			<meta property="og:locale" content="en_US" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="About - We Are Wearables" />
			<meta property="description" content="We Are Wearables is on a mission to make wearable tech accessible to people and businesses. Our hope is that by bringing people together with the tech we can work together to usher in this third wave of computing." />
			<meta property="og:image" content="http://localhost/application/assets/img/w_logo.jpg" />
			<meta property="og:url" content="www.wearewearables.com/about" />
			<meta property="og:site_name" content="" />';
		
		
		$data['page'] = "home";
		$this->load->view('headers/header',$data);
		$this->load->view('main/static',$data);
		$this->load->view('headers/footer',$data);

	}
	
	public function page($page){
		
		$this->session->set_flashdata('page', $page);
		redirect(base_url());
	}

}