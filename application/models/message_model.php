<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Rares Crisan
 * Description: Message model class
 */
class Message_model extends CI_Model{
    function __construct(){
        parent::__construct();
		$this->load->database();
    }

	public function add_message($messageData){
		
		$messageArray = array(
			'message' => $messageData['message'],
			'memberId'=> $this->session->userdata('memberId'),
			'replyId' => $messageData['mId']
		);
		
		return ($this->db->insert('message_wall',$messageArray) ? '200' :'400');
	}
	
	public function get_message_thread(){
		
		$query = $this->db->query('SELECT M.nameFull,M.image, W.message, W.posted, W.mId FROM message_wall W, members M WHERE M.memberId = W.memberId AND W.replyId=0 ORDER BY W.posted desc LIMIT 10 ' );
		return $query->result_array();
		
	}
	public function get_reply_thread($mId){
		
		$query = $this->db->query('SELECT M.nameFull,M.image, W.message, W.posted, W.mId, W.replyId FROM message_wall W, members M WHERE M.memberId = W.memberId AND W.replyId='.$mId.' ORDER BY W.posted ASC');
		return $query->result_array();
		
	}

}