<?php

class registerHelper extends Application{
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct(){
		global $logger;
		parent::__construct();
		$this->logger = $logger;
	
	}
	
	function registerPhase($mobile=false){
		$ok = false;
		global $CONFIG;
		$mobilePath = '';
		if($mobile) $mobilePath = '/mobile';
		
		if($this->Request->getPost('register')==1){
		
			$this->logger->log('can register');
			if($this->doRegister()){
				$this->log('register','');
				$this->assign("msg","register-in.. please wait");
				$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				sendRedirect("{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
			}
				$this->logger->log('failed to register');
			if(!$ok){
				$this->log('access_denied','');
				$this->assign("msg","failed to register..");
				$this->assign("link","{$CONFIG['BASE_DOMAIN']}login");
				sendRedirect("{$CONFIG['BASE_DOMAIN']}login");
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
			}
		}
		$this->logger->log('can not register');
		return false;
	}
	
	function doRegister(){
		global $CONFIG;
		$this->logger->log('do register');

		$name = $this->Request->getPost('name');
		$username = $this->Request->getPost('username');
		$password = trim($this->Request->getPost('password'));
		$repassword = trim($this->Request->getPost('repassword'));
		$nickname = $this->Request->getPost('name');
		$email = trim($this->Request->getPost('email'));
		
		if($name==''||$name==null){
			$this->logger->log('name is null');
			return false;
		}
		if($password!=$repassword) {
			$this->logger->log('pass and re pass not match');
			return false;
		}
			
		$hashPass = sha1($password.$CONFIG['salt']);
		$sql = "
			INSERT INTO social_member (password,email,register_date,salt,n_status,name,nickname,username) 
			VALUES ('{$hashPass}','{$email}',NOW(),'{$CONFIG['salt']}',1,'{$name}','{$nickname}','{$username}')
		";
		$rs = $this->query($sql);
		$this->logger->log($sql);
	
		
 		if($rs)return true;
		else return false;
	
	}
	
	
	
	
}
