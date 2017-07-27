<?php
class updateaccount extends App{

	
	function beforeFilter(){
		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		
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