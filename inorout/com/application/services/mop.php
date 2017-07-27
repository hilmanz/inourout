<?php
class mop extends ServiceAPI{
		
	function beforeFilter(){
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->mopHelper = $this->useHelper('mopHelper');
		
	}
		
	function login(){
	
		global $CONFIG,$logger;
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		$this->assign('basedomain',$basedomain);
	 
			$logger->log(strip_tags($this->_request('username')));
			if($this->_p('username')&&$this->_p('password')){
 
				$sessionid = $this->loginHelper->mopChecklogin();
				$res = $this->loginHelper->mopsessionlogin($sessionid);
				if($res){
							return array('status'=>true,'msg'=>'welcomes','data'=>@$this->session->getSession($CONFIG['SESSION_NAME'],"MOPADMIN"));
				}
			}
			
				print  $this->error_404();exit;
			
	}
	
	
	function realeaselock(){
		return $this->loginHelper->realeaselock();
		
	}
}
?>