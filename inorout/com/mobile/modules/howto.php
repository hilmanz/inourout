<?php
class howto extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='howto') $this->log('surf','howto');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/howto.html');
		
	}
	
}
?>