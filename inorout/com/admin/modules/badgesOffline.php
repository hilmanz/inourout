<?php
class badgesOffline extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->badgeHelper = $this->useHelper('badgeHelper'); 
		$this->uploadHelper = $this->useHelper('uploadHelper'); 
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){  
		
		$codelist = $this->badgeHelper->badgesofflinelist(); 
		
		$this->assign('codelist',$codelist);
		
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','badges offline distribution code');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/offline-badges.html');		
	} 
	
	
	function doit(){
	
		print json_encode($this->badgeHelper->sendGlobalMail($to,$from,$msg, 2));
		exit;
	
	}
		
}
?>