<?php
class aspiration extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		GLOBAL $CONFIG;
		if($this->_p('asp_post')==1){
			$this->userHelper = $this->useHelper('userHelper');
			$submit = $this->userHelper->aspirationSubmit();

			if($submit['status'] == 1){
				$this->assign("msg","saving.. please wait");
	
				sendRedirect("{$CONFIG['MOBILE_SITE']}profile");
				 
				return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
				die();
			}
		}
		
		if(strip_tags($this->_g('page'))=='aspiration') $this->log('surf','aspiration');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/aspiration.html');
		
	}
	
}
?>