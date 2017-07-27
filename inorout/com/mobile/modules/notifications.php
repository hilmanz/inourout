<?php
class notifications extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		
		$total = 0;
		
		$load = $this->notificationHelper->load(0,10);
		$total = $this->notificationHelper->load(0,1000);
		if ($load){
			$unread = $this->notificationHelper->unread(true);
			foreach ($load as $key=>$val){
				if (in_array($val['id'],$unread['data'])) $load[$key]['unread'] = true;
				else $load[$key]['unread'] = false;
				
			}
			// pr($load);
			$this->assign('notif', $load);
			$this->assign('total', count($total));
		}
		
		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','notifications');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/notification.html');		
	}
	
	function firstBadges()
	{
		$load = $this->notificationHelper->load(0,10);
		// pr($load);
		if($load){
			// pr($this->user);
			$this->assign('user', $this->user);
			$this->assign('detail', $load[0]);
		}	
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/notification-detail.html');		
	}
	
	function ajax()
	{
		
		$start = intval($this->_p('start'));
		$limit = intval($this->_p('limit'));
		
		$load = $this->notificationHelper->load($start,$limit);
		if ($load){
			$unread = $this->notificationHelper->unread(true);
			foreach ($load as $key=>$val){
				if (in_array($val['id'],$unread['data'])) $load[$key]['unread'] = true;
				else $load[$key]['unread'] = false;
				
			}
			
			print json_encode(array('status'=>true,'res'=>$load));
			// pr($load);
			$this->assign('notif', $load);
		}else{
			print json_encode(array('status'=>false));
		}
		exit;
	}
	
	function detail(){
		
		// pr($_GET);
		$load = $this->notificationHelper->details();
		// pr($load);
		if($load){
			// pr($this->user);
			$this->assign('user', $this->user);
			$this->assign('detail', $load);
		}	
		
		
		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','detail');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/notification-detail.html');		
	}
	function badges(){
		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','badges');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/badges-notifications.html');		
	}
	function badgesMessage(){
		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','badgesMessage');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/badges-message.html');		
	}
	
	function load($ajax=false){
		$ajax = $this->_p('ajax');
		$limit = intval($this->_p('limit'));
		if($limit==0) $limit=10;
		
		$load = $this->notificationHelper->load(0,$limit);
		if($ajax){
			echo json_encode(array('status'=>1,'data'=>$load));
			exit;
		}else{
			$this->assign('notif_list',$this->notificationHelper->load());
		}

		if(strip_tags($this->_g('page'))=='notifications') $this->log('surf','notifications list');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/notifications.html');
	}
}
?>