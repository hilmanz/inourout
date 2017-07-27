<?php
class updateaccount extends App{

	
	function beforeFilter(){
		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->assign('assets_domain_mobile', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		global $CONFIG;
		$this->log('update profile mop',$this->user->id);
		//id={$_SESSION['mop_sess_id']}&
	
		$url = "{$CONFIG['BASE_MOP_URL']}Templates/UpdateProfileStart.aspx?id={$_SESSION['mop_sess_id']}&promoref=ID14000403001";
		sendRedirect($url);
		exit;
	}
	
	 
}
?>