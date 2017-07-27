<?php
class notification extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->notificationHelper = $this->useHelper('notificationHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main(){
		$notificationlist = $this->notificationHelper->getNotification($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		$this->assign('total',intval($notificationlist['total']));
		$this->assign('list',$notificationlist['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		// $this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','notification');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/notification-pages.html');
	}
	
	function add(){
		global $CONFIG;
		
		$addNotification = $this->notificationHelper->addNotification();
		
		if ($addNotification['result']==1) {
			//return $this->View->showMessage('you are not authorize for this category id', "index.php?s={$this->folder}");
			sendRedirect($CONFIG['ADMIN_DOMAIN']."notification");
			exit;
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/notification_add.html');
	}
	
	function edit(){
		global $CONFIG;
		
		$cid = intval($this->_request('id'));
		$editNotification = $this->notificationHelper->editNotification();
		
		$this->assign('detail',$editNotification['result']);
		$this->assign('cid',$cid);
		if ($editNotification['result']==1) {
			//return $this->View->showMessage('you are not authorize for this category id', "index.php?s={$this->folder}");
			sendRedirect($CONFIG['ADMIN_DOMAIN']."notification");
			exit;
		}
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/notification_edit.html');
	}
	
	function hapus(){
		global $CONFIG;
		
		$result = $this->notificationHelper->getHapus();
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."notification");
			exit;
		}
	}
	
	function unpublish(){
		global $CONFIG;
		
		$this->Request->setParamPost('cid',intval($this->_request('id')));
		$this->Request->setParamPost('publishedtype',3);
		$this->Request->setParamPost('type',3);
		
		$data = $this->contentHelper->unContentPost();
		sendRedirect($CONFIG['ADMIN_DOMAIN']."moderation");
		return $this->out(TEMPLATE_DOMAIN_ADMIN . '/login_message.html');
		exit;
	}
	
	function ajax(){
		$needs = $this->_request("needs");
		$contentid = intval($this->_request("contentid"));

		$start = intval($this->_request("start"));
		if ($this->_request("startdate") || $this->_request("enddate") || $this->_request("search")) {
			$this->Request->setParamPost('startdate',$this->_request('startdate'));
			$this->Request->setParamPost('enddate',$this->_request('enddate'));
			$this->Request->setParamPost('search',$this->_request('search'));
		}
		
		if($needs=="notification") $data =  $this->notificationHelper->getNotification($start=null,$limit=10);
		
		print json_encode($data);exit;
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->notificationHelper->getNotification($start);		
		}
		// pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
	
}
?>