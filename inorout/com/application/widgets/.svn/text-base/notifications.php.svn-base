<?php
class notifications{
	
	function __construct($apps=null){
		$this->apps = $apps;	
		global $LOCALE,$CONFIG;
		
		$this->apps->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->apps->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->apps->assign('locale',$LOCALE[$this->apps->lid]);
	}

	function main(){
		
		/*$this->notificationHelper = $this->apps->useHelper('notificationHelper');
		$this->apps->assign('notif_list',$this->notificationHelper->load());*/
		//$this->apps->View->assign('notification_detail',$this->apps->setWidgets('notification_detail'));

		return $this->apps->View->toString(TEMPLATE_DOMAIN_WEB ."widgets/popup-notification.html"); 
	}
}
?>