<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
		$this->load->database();
		//$this->load->model('emails/portfolio_emails');

    }
    
    public function validate(){
        // grab user input
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));   
		// hash the password
		$password = crypt($password,'B!)m3dm3');
		
		// load the database
    	// Prep the query
		//check if it's a username or email
	//	if(strpos($email,'@') !== false){
		$this->db->where('email', $email);
	//	}
       /* else{
			$this->db->where('userName', $username);
		}*/
        $this->db->where('password', $password);
        
		// Run the query
		$query = $this->db->get('members');
		
		// Let's check if there are any results
        if($query->num_rows === 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'memberId' => $row->memberId,
                    'nameFull' => $row->nameFull,
					'image' =>$row->image,
					'email' => $row->email,
                    'validated' => true

                    );
            $this->session->set_userdata($data);
			//$this->portfolio_emails->welcome_email($row->email);
			
			// Set cookies
			$this->load->helper('cookie');
			$cookie = array(
				'name'   => 'PSCookie',
				'value'  => 'Value',
				'expire' => '86500',
				'domain' => '.Clayza.com',
				'path'   => '/',
				'prefix' => 'myprefix_',
				'secure' => TRUE
			);
			$this->input->set_cookie($cookie);
			
			//log into db
		/*	$loginArray = array(
				'userId' => $row->user_Id,
				'eventName'  => 'login',
				'sessionId'=> $this->session->userdata('session_id'),
				'userName'=> $row->userName
				);*/
			
			
		/*	if($row->firstLogin == '1'){
				$this->unset_First_Login($row->user_Id);
				return 'first';
				
			}
			else{
				
			}*/
            return 'notFirst';
        }
        // If the previous process did not validate
        // then return false.
      
			return 'error';
    }
/*	public function validate_mobile(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
		// hash the password
		$password = crypt($password,'B!)m3dm3');
		
		// load the database
		$this->load->database();
		
        // Prep the query
		//check if it's a username or email
		if(strpos($username,'@') !== false){
			$this->db->where('email', $username);
		}
        else{
			$this->db->where('userName', $username);
		}
        $this->db->where('password', $password);
        
		// Run the query
		$query = $this->db->get('members');
		
		// Let's check if there are any results
        if($query->num_rows === 1)
        {
            // If there is a user, then create session data
			$row = $query->row();
            $data = array(
					'success' => 1,
                    'memberId' => $row->memberId,
                    'nameFull' => $row->nameFull,
					'image' =>$row->image
                    );
				//$jsonLogin='{"success":1,"user_Id":"'.$row->user_Id.'","userName":"'.$row->userName.'","userImage":"'.$row->userImage.'"}';
			$jsonLogin = json_encode($data);
            return $jsonLogin;

        }
        // If the previous process did not validate
        // then return false.
        return '';
    }

	private function unset_First_Login($userId){
		$this->db->where('user_Id',$userId);
		$userData = array(
			'firstLogin' => 0
		);
		$this->db->update('user',$userData);
	}*/
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */