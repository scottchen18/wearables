<?php

class User_info extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	
	public function get_userInfo($user){

		$query = $this->db->query("SELECT * 
								FROM user 
								WHERE userName ='".$user."'");
		if($query->num_rows() <= 0){
			$this->db->where('user_Id','2');
			$query=$this->db->get('user');
			return $query->result_array();
		}
		return $query->result_array();
	}
	
	public function get_userInfoId($user){

		$query = $this->db->query("SELECT * 
								FROM user 
								WHERE user_Id ='".$user."'");
		return $query->result_array();
	}
	public function get_userJobData($user){

		$query = $this->db->query("SELECT userImage, nameFull, userName
								FROM user 
								WHERE user_Id ='".$user."'");
		return $query->row_array();
	}
	public function get_user_mainDetails_Email($email){
		
		$query = $this->db->query("SELECT userImage,nameFull, userName, user_Id FROM user WHERE email='".$email."'");
		
		if($query->num_rows() >= 1){
			return $query->row_array();
		}
		else{
			return 'Empty';
		}
	}

	public function get_userEmail($user){
		$query = $this->db->query("SELECT  email
								FROM user 
								WHERE user_Id ='".$user."'");
		return $query->row_array();	
	}
	
	public function get_user_mainDetails($userId){
		
		$query = $this->db->query("SELECT nameFull,email,userName,userImage,user_Id,title FROM user WHERE user_Id=".$userId);
		
		return $query->row_array();
	}
	public function get_user_projectDetails($userId){
		
		$query = $this->db->query("SELECT nameFull,email,userName,userImage,scharge,payAddress,payCity,payCountry,payProv,payPC,invoiceImage,user_Id,title FROM user WHERE user_Id=".$userId);
		
		return $query->row_array();
	}
	public function get_client_projectDetails($userId){
		
		$query = $this->db->query("SELECT U.nameFull,U.email,U.userName,U.userImage,C.card,C.cardAddress,C.cardCity,C.cardCountry,C.cardProv,C.cardPC,U.user_Id,U.title FROM user U, ccData C WHERE U.user_Id=".$userId." AND U.user_Id=C.userId");
		
		return $query->row_array();
	}
	
	

	public function get_userPayoutInfo($userId){
		$query = $this->db->query("SELECT payAddress,payCity, payProv,payPC,payCountry FROM user WHERE user_Id=".$userId);
		
		return $query->row_array();
	}

	public function usersearch_result($username)
	{	
		$username =urldecode($username);
		//$userName = explode(' ',$username);
		$this->db->select('nameFull, email, user_Id,userImage,userName');
		$this->db->like('nameFull',$username,'after');
	
		$query= $this->db->get('user');

		
		return $query->result_array();
	}
	public function global_usersearch_results($username)
	{	
		$username =urldecode($username);
		//$userName = explode(' ',$username);
		$this->db->select('nameFull, email, user_Id,userImage,userName,title,locationCity,locationCountry,company,jobTitle,degree,institution');
		$this->db->like('nameFull',$username,'after');
		$this->db->or_like('title',$username,'both');
		$this->db->or_like('userName',$username,'after');
		$this->db->or_like('tags',$username,'both');
	
		$query= $this->db->get('user');

		
		return $query->result_array();
	}
	public function location_usersearch_results($username,$location)
	{	
		$username =urldecode($username);
		$location =urldecode($location);
		//$userName = explode(' ',$username);
	/*	$this->db->select('nameFull, email, user_Id,userImage,userName,title,locationCity,locationCountry,company,jobTitle,degree,institution');
		$this->db->like('nameFull',$username,'after');
		$this->db->or_like('title',$username,'both');
		$this->db->or_like('userName',$username,'after');
		$this->db->or_like('tags',$username,'both');
		$this->db->where('locationCity',$location);
		
		$query= $this->db->get('user');
		*/
	
		$query = $this->db->query("SELECT nameFull, email, user_Id,userImage,userName,title,locationCity,locationCountry,company,jobTitle,degree,institution FROM user WHERE locationCity='".$location."' AND ( title LIKE '%".$username."%' OR tags LIKE '%".$username."%')");
		

		
		return $query->result_array();
	}
	

	public function reset_email($tempPass){
		$this->db->select('email');
		$this->db->where('tempPass',$tempPass);
		
		$query = $this->db->get('user');
		return $query->row_array();
	}
	

	
	public function email_verified($email){
		//$this->load->model('emails/portfolio_emails');
		//$this->portfolio_emails->send_verification();
		
		$postData=array(
			"verify" => 'set'
		);
		$this->db->where('email',$email);
		$this->db->update('user',$postData);
		
	}

}

//