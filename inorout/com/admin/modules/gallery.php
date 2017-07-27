<?php
class gallery extends App{
	
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
	
		
		
		$getGalleryList = $this->eventHelper->getAlbumEventList();	
		// pr($getGalleryList);
		
		// $idGallery = intval($this->_request('id'));
		// if ($idGallery<=0) exit;
		
		// $eventList = $this->eventHelper->getEventGallery($idGallery);	
		$time['time'] = '%H:%M:%S';
		
		if ($getGalleryList){
			$no = 1;
			foreach ($getGalleryList as $key => $val){
				$getGalleryList[$key]['no'] = $no;
				$no++;
			}
		}
		// pr($getGalleryList);
		$this->assign('total',intval(count($getGalleryList)));
		$this->assign('list',$getGalleryList);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		
		$this->log('surf','event');
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/gallery-list.html');		
	}
	
	function seegallery()
	{
		
		$idGallery = intval($this->_request('id'));
		if ($idGallery<=0) exit;
		
		$eventList = $this->eventHelper->getEventGallery(false,$idGallery);	
		$time['time'] = '%H:%M:%S';
		
		if ($eventList){
			$no = 1;
			foreach ($eventList as $key => $val){
				$eventList[$key]['no'] = $no;
				$no++;
			}
		}
		// pr($eventList);
		$this->assign('total',intval(count($eventList)));
		$this->assign('list',$eventList);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->assign('id',$idGallery);
		$this->log('surf','event');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/gallery-album-list.html');		
	}
	
	function newDataInput()
	{
		global $CONFIG;
			$eventid = $this->_g('id');
			$this->assign('eventid',$eventid);
			$cityreference = $this->eventHelper->getCity(false,true);	
			$this->assign('cityreference',$cityreference);
	
		if ($this->_p('submit')){
		
			// pr($_POST);exit;
			// insert data dulu 
			$images = $_FILES['images'];
			$insertGallery = $this->eventHelper->insertGallery();
			
			if($insertGallery){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."event/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				$eventid = $this->_p('eid');
				// update data
				$updateEvent = $this->eventHelper->storeEventGallery($insertGallery,$uploadnews['arrImage']['filename']);
				$this->log('surf',"insert event gallery");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."gallery/seegallery?id={$eventid}");
				exit;
			}
	
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/gallery-input.html');
	}

	function getListAlbum()
	{
		// $id = intval($this->_p('id'))
		
		$type = intval($this->_p('type'));
		
		$getList = $this->eventHelper->getListAlbumEvent(false,$type);
		// pr($getList);
		if ($getList){
			print json_encode(array('status'=>true, 'res'=>$getList));
		}
		
		exit;
	}
	
	function editData($id=false)
	{
		global $CONFIG;
		$eventid = intval($this->_g('id'));
		
		$isEventorclues = $this->eventHelper->isEventorClues($eventid);
		// pr($isEventorclues);
		$eventList = $this->eventHelper->getEventGallery($eventid);	
		$time['time'] = '%H:%M:%S';
		$cityid = $this->eventHelper->getCity(false,true);	
		
		$cityreference = $cityid[0]['id'];
		
		$this->assign('cityreference',$cityreference);
		$this->assign('isEventorclues',$isEventorclues[0]['type']);
		
		$this->assign('total',count(intval($eventList)));
		$this->assign('list',$eventList[0]);
		$this->assign('eventid',$eventid);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','update event');
		
		// pr($eventList);
		if ($this->_p('submit')){
			
			
			$id = intval($this->_p('eventid'));
			if ($id<=0) {sendRedirect($CONFIG['ADMIN_DOMAIN']."gallery"); exit;}

			$updateData = $this->eventHelper->editEventGallery();	
			
			$images = $_FILES['images'];
			$eid = $this->_p('eid');
			if ($images['name']){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."event/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				
				$updateEvent = $this->eventHelper->storeEventGallery($id,$uploadnews['arrImage']['filename']);
			}
			
			
			if ($updateData) sendRedirect($CONFIG['ADMIN_DOMAIN']."gallery/seegallery?id={$eid}");
			exit;
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/gallery-edit.html');
	}
	
	function ajaxCity()
	{
		
		$city = $this->eventHelper->getCity();	
		if ($city){
			
			print json_encode(array('status'=>true, 'res'=>$city));
		}
		
		exit;
	}
	
	function removeGallery(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->eventHelper->removeEventGallery($cidStr);
		
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."gallery");
			exit;
		}
	}
}
?>