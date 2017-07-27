<?php
class entercode extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		$this->badgesHelper = $this->useHelper('badgesHelper');
	}
	
	function main(){
		if(strip_tags($this->_g('page'))=='entercode') $this->log('surf','entercode');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/entercode.html');	
	}
	function codePopup(){
		if(strip_tags($this->_g('page'))=='entercode') $this->log('surf','codePopup');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/entercode-popup.html');	
	}
	
	function inputcode(){
		
		$checkCode = array();
		$checkCode = $this->badgesHelper->inputCode(false,'input code');
		// pr($checkCode);
		if ($checkCode['result']){
			
			$this->assign('data', $checkCode);	
			return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/entercode-popup.html');
		}else{
			$this->assign('message', $checkCode['message']);	
			return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/entercode.html');	
		}
		
		
	}
}
?>