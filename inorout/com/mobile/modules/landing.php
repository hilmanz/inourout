<?php
class landing extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('basemopurl', $CONFIG['BASE_MOBILE_MOP_URL']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		$this->log('surf','landing');
		print $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/landing.html');
		exit;
		
	}
	
}
?>