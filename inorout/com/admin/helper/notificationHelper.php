<?php 
global $ENGINE_PATH;
require_once($ENGINE_PATH.'Utility/PHPMailer/PHPMailerAutoload.php');

class notificationHelper {
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
	}

	function checkUser($id=null){
		$sql="SELECT * FROM {$CONFIG['DATABASE_WEB']}.social_member Where id={$id} LIMIT 1";
		$rs = $this->apps->fetch($sql);
		return $rs;
	}

	function notif_log($type=null,$from=0,$to=0,$msg=""){
		global $CONFIG;

		$ins = "INSERT INTO {$CONFIG['DATABASE_WEB']}.notifications
				(`to`,created_date,posted_date,`from`,notiftype,static_message,n_status)
				VALUES ({$to},NOW(),NOW(),{$from},{$type},'{$msg}',0)";
		
		$insQuery = $this->apps->query($ins);

		if(!$insQuery)return 0;
		else return 1;
	}

	function email_template($email){
		global $CONFIG;

		$template = '<html>
							<head>
								<title>email-blast1</title>
								<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
							</head>
							<body bgcolor="#666" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
								<table  width="700"border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
									<tr>
										<td background="images/email_01.png" headers="129">
											<img src="'.$CONFIG['ASSETS_DOMAIN_WEB'].'email/email_01.png" width="700" height="129" alt="">
										</td>
									</tr>
									<tr>
										<td background="'.$CONFIG['ASSETS_DOMAIN_WEB'].'email/email_02.png">
						        			<div style="font-family:Arial, Helvetica, sans-serif; padding:0 30px; font-size:14px; line-height:1.4;">
						                		<h2>Hi '.$email['username'].',</h2>
						                		'.$email['message'].'
						            		</div>
						        		</td>
									</tr>
									<tr>
										<td>
											<img src="'.$CONFIG['ASSETS_DOMAIN_WEB'].'email/email_04.jpg" width="700" height="183" alt="">
										</td>
									</tr>
								</table>
							</body>
						</html>';

		return $template;
	}

	function allUser(){
		global $CONFIG;
		$sql="SELECT * FROM {$CONFIG['DATABASE_WEB']}.social_member WHERE n_status=1";

		$rs = $this->apps->fetch($sql,1);
		//var_dump($rs);exit;
		return $rs;
	}

	function send_mail($data=null){
		global $ENGINE_PATH,$CONFIG;

		$mail = new PHPMailer;
		
		//$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $CONFIG['EMAIL_SMTP_HOST'];  // Specify main and backup server
		//$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $CONFIG['EMAIL_SMTP_USER'];                            // SMTP username
		$mail->Password = $CONFIG['EMAIL_SMTP_PASSWORD'];                           // SMTP password
		//$mail->SMTPSecure = 0;                            // Enable encryption, 'ssl' also accepted

		$mail->From = $CONFIG['EMAIL_FROM_DEFAULT'];
		$mail->FromName = 'neversaymaybe';

		//pr($data);exit;

		foreach ($data as $key => $value) {
			$mail->addAddress($value['email'], $value['name']);  // Add a recipient
		
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $value['subject'];
			$mail->Body    = $value['msg'];
			$mail->AltBody = strip_tags($value['msg']);

			$mail->send();
			$mail->ClearAllRecipients();
			
		}
	}
}
?>