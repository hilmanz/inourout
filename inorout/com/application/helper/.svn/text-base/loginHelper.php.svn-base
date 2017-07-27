<?php

class loginHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		
		$this->config = $CONFIG;
			if( $this->apps->session->getSession($this->config['SESSION_NAME'],"WEB") ){
			
			$this->login = true;
		
		}
	
	}
	
	function checkLogin(){
		
		return $this->login;
	}
	
	function mopChecklogin( ){
	 
		
	 
		$sessionid = $this->apps->mopHelper->checklogin();
		return $sessionid;
		 
				
	}
	
	function mopsessionlogin($sessionid=false){
		if(!$sessionid) return false;
		
		$ok = false;
		$MOP_PROFILE = $this->apps->mopHelper->mop($sessionid);
		if($this->mopLogin($MOP_PROFILE)){	
			
			return true;
		}else return false;
				
	}
	
	function mopsessionloginmobile(){
	 
		$MOP_PROFILE = false;
		$ok = false;
		$sessionid = $this->apps->mopHelper->checklogin();
		if($sessionid) $MOP_PROFILE = $this->apps->mopHelper->mop($sessionid);
		if($this->mopLogin($MOP_PROFILE)){	
			
			return true;
		}else return false;
				
	}
	
	function updateDataPromo(){
		
		$promoreferenceHelper = $this->apps->useHelper('promoreferenceHelper');
		$res = $promoreferenceHelper->updateDataPromo();
		if($res) return true;
		return false;
		
	}
	
	function mopLogin($MOP_SESSION=false){
		if($MOP_SESSION==false) return false;
		if(!is_array($MOP_SESSION))return false;
		
		if(!array_key_exists("UserProfile",$MOP_SESSION)) return false;
		
		foreach($MOP_SESSION['UserProfile'] as $key => $val){
			$$key = $val;
		}
		
		$sql = "SELECT * FROM social_member WHERE registerid='{$RegistrationID}' LIMIT 1";
		$rs = $this->apps->fetch($sql);
		$this->logger->log($sql);
		// pr($sql);
 		if($rs){
		 
			$this->logger->log('can login');
			$id = $rs['id'];
			$this->add_stat_login($id);
	  
			$this->apps->session->setSession($this->config['SESSION_NAME'],"WEB",$rs);
			$this->login = true;
			return true;
		}else {
			$this->logger->log("cannot login, password or username not exists ");

			return false;
		}
	
	}
	
	
	/* below function used as local login only: on development phase without MOP */
	
	function loginSession($mobile=false){
		$ok = false;
		$login = intval($this->apps->_p('login'));
		$login = 1;
		if($login==1){
		
			if($this->goLogin()){
				$this->updateDataPromo();
				return true;
			}else{
				return false;
			}
		}
		
		if($mobile) return $this->apps->out(TEMPLATE_DOMAIN_MOBILE.'/login.html');
		return false;
	}
	
	function goLogin(){
		global $logger, $APP_PATH;

		$username = trim($this->apps->_p('username'));
		$password = trim($this->apps->_p('password'));
		
		$sql = "SELECT * FROM social_member WHERE username='{$username}' LIMIT 1";
		//pr($password);
		// pr($sql);
		$rs = $this->apps->fetch($sql);
		
		$logger->log($sql);
		
		$hash = sha1($password.$rs['salt']);
		// pr($hash);
		// pr($sql);exit;
		//check password and phonumber , each field must be same of input value (higher security)
 		if($rs['password']==$hash){
			
			$this->setdatasessionuser($rs);
		
			$logger->log('can login');
			$this->login = true;
			return true;
		}else {
			$logger->log("cannot login, password or username not exists ");
			return false;
		}
	}
	
	function loginType(){
		global $logger, $APP_PATH;
		
		//pr($this->apps->mopHelper->mop());exit;
		$MOP_PROFILE = $this->apps->mopHelper->mop();
		$regid = $MOP_PROFILE['UserProfile']['RegistrationID'];
		$sql = "SELECT * FROM social_member WHERE registerid='{$regid}' LIMIT 1";
		$rs = $this->apps->fetch($sql);
		return $rs;
	}
	
	function setdatasessionuser($rs=false){
		if(!$rs) return false;
		$rs['hasband'] = false;
		$rs['hasdj'] = false;
		$rs['pageid'] = false;
		$rs['immember'] = false;
		$rs['ownerid'] = false;
	
		$id = $rs['id'];
		$pagestat = $this->getPagesStat($id);
		if($pagestat)	$rs = array_merge($rs,$pagestat);
		
		$memberstat = $this->getMemberPagesStat($id);
		if($memberstat)	$rs = array_merge($rs,$memberstat);
		$this->apps->session->setSession($this->config['SESSION_NAME'],"WEB",$rs);
	}
	
	function getPagesStat($user_id=null){
			if($user_id==null) return false;
			
			$sql = "SELECT * FROM my_pages WHERE n_status=1 AND ownerid ={$user_id} LIMIT 1";
			$qData = $this->apps->fetch($sql);
			if(!$qData) return false;
			$data = false;
			if($qData['type']==1) $data['hasband'] = true;
			if($qData['type']==4) $data['hasdj'] = true;
			if(!$data) return false;
			$data['pageid'] = $qData['id'];
			$data['ownerid'] = $qData['ownerid'];
			$data['immember'] = false;				
			return $data;
	}
	
	function getMemberPagesStat($user_id=null){
			if($user_id==null) return false;
			
			$sql = "SELECT * FROM my_pages_member WHERE mypagestype IN (1,4) AND mymember={$user_id} LIMIT 1";
			$qData = $this->apps->fetch($sql);
			if(!$qData) return false;
			$data = false;
			if($qData['mypagestype']==1) $data['hasband'] = true;
			if($qData['mypagestype']==4) $data['hasdj'] = true;
			if(!$data) return false;
			$data['pageid'] = $qData['myid'];
			$data['ownerid'] = false;			
			$data['immember'] = true;			
			return $data;
	}
	
	function add_stat_login($user_id){
	
	
	$sql ="UPDATE social_member SET last_login=now(),login_count=login_count+1 WHERE id={$user_id} LIMIT 1";
	$rs = $this->apps->query($sql);

	
	}
	
	function getProfile(){
	
		$user = json_decode(urldecode64($this->apps->session->getSession($this->config['SESSION_NAME'],"WEB")));
		
		return $user;
	
	}
	
	
	
}
