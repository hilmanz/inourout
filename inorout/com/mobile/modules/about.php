<?php
class about extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='about') $this->log('surf','about');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/about.html');
		
	}
	function howto(){
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'apps/about-howto.html');
	
	}
	function whatis(){
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'apps/about-whatis.html');
	
	}
	function prizes(){
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'apps/about-prizes.html');
	
	}
	function rules(){
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'apps/about-rules.html');
	
	}
	
}
?>