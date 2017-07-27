<?php
class event extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->eventHelper = $this->useHelper('eventHelper'); 
		$this->uploadHelper = $this->useHelper('uploadHelper'); 
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){ 
	
		$eventList = $this->eventHelper->eventList($start=null,null,$limit=10);	
		$time['time'] = '%H:%M:%S';
		
		if ($eventList){
			if($eventList['result']){
			 
				foreach ($eventList['result'] as $key => $val){
					
					$count = strlen($val['content']);
					if ($count>=100){
						$cutContent = substr($val['content'],0,100). " ...";
					}else{
						$cutContent = $val['content'];
					}
					
					// pr($cutContent);
					$eventList['result'][$key]['headline'] = $cutContent;
				}
			}
		}
		// pr($eventList['total']);
		$this->assign('total',intval($eventList['total']));
		$this->assign('list',$eventList['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','event');
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/event-pages.html');		
	}
	
	function hapus(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->eventHelper->getHapus($cidStr);
		// echo 'ada';
		// pr($result);
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."event");
			exit;
		}
	}
	
	function saveData($id=false)
	{
		global $CONFIG;
		$id = intval($this->_g('id'));
		$eventList = $this->eventHelper->eventList($id);	
		$time['time'] = '%H:%M:%S';
		$cityreference = $this->eventHelper->getCity(false,true);	
		$this->assign('cityreference',$cityreference);
		
		$this->assign('total',intval($eventList['total']));
		$this->assign('list',$eventList['result'][0]);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','update event');
		
		// pr($_POST);
		if ($this->_p('submit')){
			
			$id = intval($this->_p('eventid'));
			if ($id<=0) {sendRedirect($CONFIG['ADMIN_DOMAIN']."event"); exit;}

			$updateData = $this->eventHelper->storeDataEvent();	
			
			$images = $_FILES['images'];
			// pr($images);exit;
			if ($images['name']){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."event/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				$updateEvent = $this->eventHelper->storeImageEvent($id,$uploadnews['arrImage']['filename']);
			}
			if ($updateData) sendRedirect($CONFIG['ADMIN_DOMAIN']."event");
			exit;
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/event-edit.html');
	}
	
	function newDataInput()
	{
		global $CONFIG;
			 
			$cityreference = $this->eventHelper->getCity();	
			// pr($cityreference);
			// var_dump($cityreference);exit;
			$this->assign('cityreference',$cityreference);
	
		if ($this->_p('submit')){
		
			// insert data dulu 
			$images = $_FILES['images'];
			$insertnewevent = $this->eventHelper->insertnewevent();
			// var_dump($insertnewevent);
			// pr($_POST);
			// pr($_FILES);
			// exit;
			if($insertnewevent){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."event/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				
				// update data
				$updateEvent = $this->eventHelper->storeImageEvent($insertnewevent,$uploadnews['arrImage']['filename']);
				$this->log('surf',"insert event");
				// echo 'sukses';
				sendRedirect($CONFIG['ADMIN_DOMAIN']."event");
				exit;
			}
	
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/event-input.html');
	} 
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->eventHelper->eventList($start);		
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