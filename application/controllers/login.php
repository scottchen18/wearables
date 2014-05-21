<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Adrian Li
 * Description: Login controller class
 */
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
		$this->load->model('user_info');
	//	$this->load->model('settings_model');
		$this->load->helper('url');
    }

	public function index(){
		if($this->session->userdata('userName')){
			redirect(base_url().$this->session->userdata('userName'));
		}
		$this->view();
		
	}
    public function view($msg = NULL){
        // Load our view to be displayed
        // to the user
		$data['msg'] = $msg;
		$data['title'] = 'CeeFields';
		$this->load->view('headers/header',$data);
        $this->load->view('main/home');
		$this->load->view('headers/footer',$data);
    }



    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if ($result == 'error'){
            // If user did not validate, then show them login page again
            $msg = '<p class="errLogMess">Invalid username and/or password.</p><br />';
            //$this->view($msg);
			echo '400';
			//redirect(base_url().'login/view/'.$msg);
        }
		else if($result == 'notFirst'){
            // If user did validate,
            // Send them to members area w/ the userName
			//$this->load->helper('url');
			//redirect(base_url().'owl/');
			echo '200';
        }

    }

	public function passwordreset($tempPass){

		$data['tempPass']= $tempPass;
		$data['title'] ='Password Reset';
		$data['msg']='';
		//get email
		$data['email'] = $this->user_info->reset_email($tempPass);
		$this->load->view('templates/loginheaderNT',$data);
        $this->load->view('signup/forgotPass', $data);
	}

	public function resetpassword(){
		$passInfo = $this->input->post(null,true);
		if($this->settings_model->reset_password($passInfo)){
			echo 'true';
		}
		else{
			echo 'false';
		}
	}
	


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */