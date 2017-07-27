<?php
class synch  extends ServiceAPI{
			

	function beforeFilter(){
		  
		$this->offlineHelper = $this->useHelper('offlineHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->gamesHelper = $this->useHelper('gamesHelper');
	
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));

		if( $_SERVER['REMOTE_ADDR'] == '117.54.1.121' ||  $_SERVER['REMOTE_ADDR'] == '117.54.1.109'){
			 // pr($_SERVER['REMOTE_ADDR']);
		}else{
			echo "You're not authorize.  ";
			die();
		}	
		
	}
	 
	function offline(){
	 
		// print json_encode($this->badgesHelper->checkrightsuseroffline());
		print json_encode($this->offlineHelper->addOfflineUserRights());
		exit;
	
	}

	function generateopenbadges(){
	 	
		print json_encode($this->badgesHelper->checkrightsuseroffline());
		exit;
	
	}

	function freeuserdoubleornothing(){
		
		$this->gamesHelper->freeuserdoubleornothing();
	
	}
}
?>
