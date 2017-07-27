<?php
class login extends App{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->mopHelper = $this->useHelper('mopHelper');
	}
	
	function main(){
		 
		global $CONFIG,$logger;
		$basedomain = $CONFIG['MOBILE_SITE'];
		$this->assign('basedomain',$basedomain);
		$this->assign('user',$this->user);
		
		$sessionid = strip_tags($this->_g('id'));
		if($sessionid!=""){
			$res = $this->loginHelper->mopsessionlogin($sessionid);
				// pr($res);
			// exit;
			if($res){
				$this->log('login','welcome');
				$this->assign("msg","login-in.. please wait");
				$this->assign("link","{$CONFIG['MOBILE_SITE']}{$CONFIG['DINAMIC_MODULE']}"); 
				sendRedirect("{$CONFIG['MOBILE_SITE']}{$CONFIG['DINAMIC_MODULE']}"); 
				return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
				die();
			}
		 }
		sendRedirect("{$CONFIG['LOGIN_PAGE']}");
		//return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
		die();
	}
	
	function local(){
		global $CONFIG,$logger;
		 
	
		$basedomain = $CONFIG['MOBILE_SITE'];
		$this->assign('basedomain',$basedomain);
		$this->assign('user',"");
			$res = $this->loginHelper->loginSession();
			
			if($res){
				$this->log('login','welcome');
				$this->assign("msg","login-in.. please wait");
				$this->assign("link","{$CONFIG['MOBILE_SITE']}{$CONFIG['DINAMIC_MODULE']}");
				
			 
				sendRedirect("{$CONFIG['MOBILE_SITE']}{$CONFIG['DINAMIC_MODULE']}");
				 
				return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
				die();
			}
	
		$this->assign("msg","failed to login..");
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/login.html');
	}
}
?>