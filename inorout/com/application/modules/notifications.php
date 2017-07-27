<?php
class notifications extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->notificationHelper = $this->useHelper('notificationHelper');
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','notifications');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/notifications.html');
		
	}

	function load($ajax=false){
		$ajax = $this->_p('ajax');
		$limit = intval($this->_p('limit'));
		if($limit==0) $limit=10;
		
		$load = $this->notificationHelper->load(0,$limit);
		
		if($ajax){
			$unread = $this->notificationHelper->unread();
			echo json_encode(array('status'=>1,'data'=>$load,'unread'=>$unread));
			exit;
		}else{
			$this->assign('notif_list',$this->notificationHelper->load());
		}

		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','notifications list');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/notifications.html');
	}

	function details($ajax=false){
		$ajax = $this->_p('ajax');
		
		
		$load = $this->notificationHelper->details();
		if($ajax){
			echo json_encode(array('status'=>1,'data'=>$load));
			exit;
		}else{
			$this->assign('notif_detail',$this->notificationHelper->details());
		}

		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','notifications');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/notifications.html');
	}
	
}
?>