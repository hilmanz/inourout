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
	
	function load($start=0,$limit=10){
		global $CONFIG;
		
		$sql="SELECT ntf.*,nd.subject,nd.detail,nd.href,nd.img,nd.link_text, DATE_FORMAT(ntf.posted_date,'%d/%m/%Y %h:%i%p') AS formatted_date, ntf.n_status AS read_status
				FROM {$CONFIG['DATABASE_WEB']}.notifications ntf
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.notifications_details nd
				ON ntf.notiftype = nd.type 
				WHERE ntf.n_status IN (0,1) AND ntf.to IN ({$this->uid},0) 
				ORDER BY ntf.posted_date DESC 
				LIMIT {$start},{$limit}";
		$rs=$this->apps->fetch($sql,1);
		
		foreach ($rs as $key => $value) {
			$from = $this->checkUser($value['from']);
			$rs[$key]['subject']=str_replace("#~user",$from['name'],$value['subject']);
		}

		return $rs;
	}

	function unread($record=false){
		global $CONFIG;
		
		$data = array();
		$sql="SELECT COUNT(ntf.id) AS total
				FROM {$CONFIG['DATABASE_WEB']}.notifications ntf
				WHERE ntf.n_status IN (0) AND ntf.to IN ({$this->uid},0) LIMIT 1";
		$rs=$this->apps->fetch($sql);
		//pr($sql);exit;
		$data = $rs;
		if ($record){
			$idNotif = array();
			$sqlRec="SELECT id
					FROM {$CONFIG['DATABASE_WEB']}.notifications ntf
					WHERE ntf.n_status IN (0) AND ntf.to IN ({$this->uid},0)";
			// pr($sqlRec);
			$res=$this->apps->fetch($sqlRec,1);
			if ($res){
				foreach ($res as $key=>$val){
					$idNotif[] = $val['id']; 
				}
			}
			$data['total'] = $rs;
			$data['data'] = $idNotif;
		}
		
		
		
		return $data;	
	}

	function details(){
		global $CONFIG;
		
		$reqID = intval($this->apps->_request('req'));

		$sql="SELECT *,DATE_FORMAT(ntf.posted_date,'%d/%m/%Y %h:%i%p') AS formatted_date, ntf.n_status AS read_status
				FROM {$CONFIG['DATABASE_WEB']}.notifications ntf
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.notifications_details nd
				ON ntf.notiftype = nd.type 
				WHERE ntf.n_status IN (0,1) AND ntf.id = {$reqID}  LIMIT 1";
		$rs=$this->apps->fetch($sql);
		//pr($rs);exit;
		
		if($rs['from']!="0"){
			$from = $this->checkUser($rs['from']);
			$rs['subject']=str_replace("#~user","<a href='#'>".$from['name']."</a>",$rs['subject']);
			$rs['detail']=str_replace("#~user","<a href='#'>".$from['name']."</a>",$rs['detail']);
		}

		if($rs['static_message']!=""){
			switch ($rs['notiftype']) {
				case 13:
					$badge_list = explode(",0,", $rs['static_message']);
		
					$rs['detail']=str_replace("#~badge1","<a>".$badge_list[0]."</a>",$rs['detail']);
					$rs['detail']=str_replace("#~badge2","<a>".$badge_list[1]."</a>",$rs['detail']);
					break;
				
				case 20:
					$msg = unserialize($rs['static_message']);
		
					$rs['detail']=str_replace("#~badge","<a>".$msg['#~badge']."</a>",$rs['detail']);
					$rs['detail']=str_replace("#~game","<a>".$msg['#~game']."</a>",$rs['detail']);
					break;
				default:
					break;
			}
		}
			
		
		if($rs['read_status'] == '0'){
			$sql = "UPDATE {$CONFIG['DATABASE_WEB']}.notifications ntf
					SET ntf.n_status = 1
					WHERE ntf.id = {$reqID}";
			$upt=$this->apps->query($sql);
		}
		$rs['username'] = $this->apps->user->name;
		$rs['update_status'] = $rs['read_status'];
		return $rs;
	}

	function checkUser($id=null){
		$sql="SELECT * FROM social_member Where id={$id} LIMIT 1";
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

		//Make assest url static for production
		if($CONFIG['BASE_DOMAIN']=='https://m.neversaymaybe.co.id' OR $CONFIG['BASE_DOMAIN']=='https://www.neversaymaybe.co.id'){
			$STATIC['ASSETS_DOMAIN_WEB'] = 'https://www.neversaymaybe.co.id/assets/';
		}else{
			$STATIC['ASSETS_DOMAIN_WEB'] = $CONFIG['ASSETS_DOMAIN_WEB'];
		}
		

		$template = '<html>
							<head>
								<title>email-blast1</title>
								<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
							</head>
							<body bgcolor="#666" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
								<table  width="700"border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
									<tr>
										<td background="images/email_01.png" headers="129">
											<img src="'.$STATIC['ASSETS_DOMAIN_WEB'].'email/email_01.png" width="700" height="129" alt="">
										</td>
									</tr>
									<tr>
										<td background="'.$STATIC['ASSETS_DOMAIN_WEB'].'email/email_02.png">
						        			<div style="font-family:Arial, Helvetica, sans-serif; padding:0 30px; font-size:14px; line-height:1.4;">
						                		<h2>Hi '.$email['username'].',</h2>
						                		'.$email['message'].'
						            		</div>
						        		</td>
									</tr>
									<tr>
										<td>
											<img src="'.$STATIC['ASSETS_DOMAIN_WEB'].'email/email_04.jpg" width="700" height="183" alt="">
										</td>
									</tr>
								</table>
							</body>
						</html>';

		return $template;
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
		$mail->addAddress($data['email'], $data['name']);  // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $data['subject'];
		$mail->Body    = $data['msg'];
		$mail->AltBody = strip_tags($data['msg']);

		$mail->send();

		// if(!$mail->send()) {
		//    echo 'Message could not be sent.';
		//    echo 'Mailer Error: ' . $mail->ErrorInfo;
		//    exit;
		// }

		//echo 'Message has been sent';
		//pr($mail);exit;
	}
}
?>