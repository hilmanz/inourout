<?php
class landing extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basemopurl', $CONFIG['BASE_MOP_URL']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		$this->log('surf','landing');
		print $this->View->toString(TEMPLATE_DOMAIN_WEB .'/landing.html');
		exit;
		
	}
	
}
?>