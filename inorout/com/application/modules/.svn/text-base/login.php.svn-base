<?php
class login extends App{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->mopHelper = $this->useHelper('mopHelper');
	}
	
	function main(){
		 
		global $CONFIG,$logger;
		$basedomain = $CONFIG['BASE_DOMAIN'];
		$this->assign('basedomain',$basedomain);
		$this->assign('user',$this->user);
		
		$sessionid = strip_tags($this->_g('id'));
	 
		
		if($sessionid!=""){
			 
	 
			if ($this->detect->isMobile() && $this->detect->is('Bot') == false ) {  
				 
				header("Location: {$CONFIG['MOBILE_REAL_DOMAIN']}login/?id={$sessionid}");
			}


			 
			$res = $this->loginHelper->mopsessionlogin($sessionid);
				
			if($res){
				$this->log('login','welcome');
				$this->assign("msg","login-in.. please wait");
				$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				
				 
				sendRedirect("{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				 
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
			}
		}
	 
		sendRedirect("{$CONFIG['LOGIN_PAGE']}");
		//return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
		die();
	}
	
	function local(){
		global $CONFIG,$logger;
		 
	
		$basedomain = $CONFIG['BASE_DOMAIN'];
		$this->assign('basedomain',$basedomain);
		$this->assign('user',"");
			$res = $this->loginHelper->loginSession();
			// var_dump($res);exit;
			if($res){
				$this->log('login','welcome');
				$this->assign("msg","login-in.. please wait");
				$this->assign("link","{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				
			 
				sendRedirect("{$CONFIG['BASE_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				 
				return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				die();
			}
	
		$this->assign("msg","failed to login..");
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/login.html');
	}
}
?>