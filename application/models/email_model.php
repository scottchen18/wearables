<?php

class Email_model  extends CI_Model{

	function __construct(){

		parent::__construct();
		$this->load->database();

		$this->load->library('email');
		$this->email->initialize(array(
		  'protocol'  => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_user' => 'rares.t.crisan@gmail.com',
		  'smtp_pass' => 'b10m3dm3',
		  'smtp_port' => 465,
	      'mailtype'  => 'html',
		  'charset'   => 'iso-8859-1',
		  'crlf'      => "\r\n",
		  'newline'   => "\r\n"
		));
	}

	private function send_email($to, $from, $fromEmail,  $message, $subject){

		$this->email->from($fromEmail, $from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

	}
	
	public function new_account($emailData,$password){
		
	
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		   "http://www.w3.org/TR/html4/loose.dtd">

		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Collaborator Invite</title>
			<style>
			a:hover {
				text-decoration: underline !important;
			}
			td.promocell p {
				color:#e1d8c1;
				font-size:16px;
				line-height:26px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:0;
				padding-top:0;
				padding-bottom:14px;
				font-weight:normal;
			}
			td.contentblock h4 {
				color:#676767 !important;
				font-size:14px;
				line-height:24px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:10px;
				padding-top:0;
				padding-bottom:0;
				padding-right:0px;
				padding-left:0px;
				font-weight:normal;
			}
			td.contentblock h4 a {
				color:#676767;
				text-decoration:none;
			}
			td.contentblock p {
			  	color:#676767;
				font-size:14px;
				line-height:19px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:12px;
				padding-top:0;
				padding-bottom:0;
				padding-right:0px;
				padding-left:0px;
				font-weight:normal;
			}
			td.contentblock p a {
			  	color:#3ca7dd;
				text-decoration:none;
			}
			@media only screen and (max-device-width: 480px) {
			     div[class="header"] {
			          font-size: 16px !important;
			     }
			     table[class="table"], td[class="cell"] {
			          width: 300px !important;
			     }
				table[class="promotable"], td[class="promocell"] {
			          width: 325px !important;
			     }
				td[class="footershow"] {
			          width: 300px !important;

			     }
			     img[class="divider"] {
				      height: 1px !important;
				 }
				 td[class="logocell"] {
					padding-top: 15px !important;
					padding-left: 15px !important;
					width: 300px !important;
				 }
			     img[id="screenshot"] {
			          width: 325px !important;
			          height: 81px !important;
			     }
				img[class="galleryimage"] {
					  width: 53px !important;
			          height: 53px !important;
				}
				p[class="reminder"] {
					font-size: 11px !important;
				}
				h4[class="secondary"] {
					line-height: 24px !important;
					margin-bottom: 15px !important;
					font-size: 14px !important;
				}
			}

			</style>
		</head>
		<body bgcolor="#e4e4e4" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#e4e4e4;-webkit-text-size-adjust:none;">

		<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4">
		<tr>
			<td bgcolor="#e4e4e4" width="100%">

			<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
			<tr>
				<td width="600" class="cell">

			   	<table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
				<tr>


				</tr>
				</table>
				<img border="0" src="https://s3.amazonaws.com/199480/email_top.png" editable="true" width="600" id="screenshot">


					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>

						<td width="100%" bgcolor="#ffffff">

							<table width="100%" cellpadding="20" cellspacing="0" border="0">
							<tr>
								<td bgcolor="#ffffff" class="contentblock">

<div style="padding:16px 16px;color:#676767;">
	<p>
		Thanks '.$emailData['first_name'].',<br>
		
		for submitting your boat info to us.<br><br>
		
		Below is your login information that you can use to modify your listing<br><br>
		username: '.$emailData['email'].'<br>
		password: '.$password.'<br><br> 
		
		Your listing is live at '.base_url().'usedboats/'.$emailData['id_hash'].'
	</p>
	
	<p>
		You will receive an update email in 2-4 business days with a list of where we are marketing your boat. You can pay for your listing now, or wait until you get your follow up email. The payment link is listed below:
	<br><br>
	'.base_url().'payment/'.$emailData['id_hash'].'

	</p>
	
	<p>
	Cheers,<br>
	BSG
	</p>
								
</div>
									</multiline>

										</td>
									</tr>
									</table>

								</td>
							</tr>
							</table>

							</layout>


						</repeater>

						</td>
					</tr>
					</table>


					<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4">
					<tr>
						<td>



							<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
							<tr>
								<td width="600" nowrap bgcolor="#e4e4e4" class="cell">

									<table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
									<tr>

										<td align="center" width="600" style="color:#a6a6a6;font-size:12px;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;text-shadow: 0 1px 0 #ffffff;" valign="top" class="hide">

											<table cellpadding="0" cellspacing="0" border="0">
											<tr>


											</tr>
											</table>

											<img border="0" src="http://www.konekt.me/assets/email/spacer.gif" width="1" height="10"><br><p style="color:#b3b3b3;font-size:11px;line-height:15px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;font-weight:bold;">BSG</p><p style="color:#b3b3b3;font-size:11px;line-height:15px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;font-weight:normal;">74615 South Landings Dr, Fort Myers, FL, USA, 33919</p></td>
									</tr>
									</table>

								</td>
							</tr>
					   		</table>

							<img border="0" src="http://www.konekt.me/assets/email/spacer.gif" width="1" height="25"><br>

					   </td>
					</tr>
					</table>

					</td>
				</tr>
				</table>

				</body>
		</html>
		';
	
		$this->send_email($dataPush['email'],'BSG','info@boatsellersgroup.com',$message,'New Account');
	}
	
	public function new_listing($emailData){
		
	
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		   "http://www.w3.org/TR/html4/loose.dtd">

		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Collaborator Invite</title>
			<style>
			a:hover {
				text-decoration: underline !important;
			}
			td.promocell p {
				color:#e1d8c1;
				font-size:16px;
				line-height:26px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:0;
				padding-top:0;
				padding-bottom:14px;
				font-weight:normal;
			}
			td.contentblock h4 {
				color:#676767 !important;
				font-size:14px;
				line-height:24px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:10px;
				padding-top:0;
				padding-bottom:0;
				padding-right:0px;
				padding-left:0px;
				font-weight:normal;
			}
			td.contentblock h4 a {
				color:#676767;
				text-decoration:none;
			}
			td.contentblock p {
			  	color:#676767;
				font-size:14px;
				line-height:19px;
				font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;
				margin-top:0;
				margin-bottom:12px;
				padding-top:0;
				padding-bottom:0;
				padding-right:0px;
				padding-left:0px;
				font-weight:normal;
			}
			td.contentblock p a {
			  	color:#3ca7dd;
				text-decoration:none;
			}
			@media only screen and (max-device-width: 480px) {
			     div[class="header"] {
			          font-size: 16px !important;
			     }
			     table[class="table"], td[class="cell"] {
			          width: 300px !important;
			     }
				table[class="promotable"], td[class="promocell"] {
			          width: 325px !important;
			     }
				td[class="footershow"] {
			          width: 300px !important;

			     }
			     img[class="divider"] {
				      height: 1px !important;
				 }
				 td[class="logocell"] {
					padding-top: 15px !important;
					padding-left: 15px !important;
					width: 300px !important;
				 }
			     img[id="screenshot"] {
			          width: 325px !important;
			          height: 81px !important;
			     }
				img[class="galleryimage"] {
					  width: 53px !important;
			          height: 53px !important;
				}
				p[class="reminder"] {
					font-size: 11px !important;
				}
				h4[class="secondary"] {
					line-height: 24px !important;
					margin-bottom: 15px !important;
					font-size: 14px !important;
				}
			}

			</style>
		</head>
		<body bgcolor="#e4e4e4" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#e4e4e4;-webkit-text-size-adjust:none;">

		<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4">
		<tr>
			<td bgcolor="#e4e4e4" width="100%">

			<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
			<tr>
				<td width="600" class="cell">

			   	<table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
				<tr>


				</tr>
				</table>
				<img border="0" src="https://s3.amazonaws.com/199480/email_top.png" editable="true" width="600" id="screenshot">


					<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>

						<td width="100%" bgcolor="#ffffff">

							<table width="100%" cellpadding="20" cellspacing="0" border="0">
							<tr>
								<td bgcolor="#ffffff" class="contentblock">

<div style="padding:16px 16px;color:#676767;">
	<p>
		Thanks '.$emailData['first_name'].',<br>
		
		for submitting your boat info to us.<br><br>
	
		Your listing is live at '.base_url().'usedboats/'.$emailData['id_hash'].'
	</p>
	
	<p>
		You will receive an update email in 2-4 business days with a list of where we are marketing your boat. You can pay for your listing now, or wait until you get your follow up email. The payment link is listed below:
	<br><br>
	'.base_url().'payment/'.$emailData['id_hash'].'

	</p>
	
	<p>
	Cheers,<br>
	BSG
	</p>
								
</div>
									</multiline>

										</td>
									</tr>
									</table>

								</td>
							</tr>
							</table>

							</layout>


						</repeater>

						</td>
					</tr>
					</table>


					<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4">
					<tr>
						<td>



							<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
							<tr>
								<td width="600" nowrap bgcolor="#e4e4e4" class="cell">

									<table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
									<tr>

										<td align="center" width="600" style="color:#a6a6a6;font-size:12px;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;text-shadow: 0 1px 0 #ffffff;" valign="top" class="hide">

											<table cellpadding="0" cellspacing="0" border="0">
											<tr>


											</tr>
											</table>

											<img border="0" src="http://www.konekt.me/assets/email/spacer.gif" width="1" height="10"><br><p style="color:#b3b3b3;font-size:11px;line-height:15px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;font-weight:bold;">BSG</p><p style="color:#b3b3b3;font-size:11px;line-height:15px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;font-weight:normal;">74615 South Landings Dr, Fort Myers, FL, USA, 33919</p></td>
									</tr>
									</table>

								</td>
							</tr>
					   		</table>

							<img border="0" src="http://www.konekt.me/assets/email/spacer.gif" width="1" height="25"><br>

					   </td>
					</tr>
					</table>

					</td>
				</tr>
				</table>

				</body>
		</html>
		';
	
		$this->send_email($dataPush['email'],'BSG','info@boatsellersgroup.com',$message,'New Listing');
	}
	
}