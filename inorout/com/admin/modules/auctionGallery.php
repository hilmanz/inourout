<?php
class auctionGallery extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->auctionHelper = $this->useHelper('auctionHelper'); 
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
	
		
		
		$getGalleryList = $this->auctionHelper->getAlbumAuctionList();	
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
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-gallery-list.html');		
	}
	
	function seegallery()
	{
		
		$idGallery = intval($this->_request('id'));
		if ($idGallery<=0) exit;
		
		$auctionList = $this->auctionHelper->getAuctionGallery(false,$idGallery);	
		$time['time'] = '%H:%M:%S';
		
		if ($auctionList){
			$no = 1;
			foreach ($auctionList as $key => $val){
				$auctionList[$key]['no'] = $no;
				$no++;
			}
		}
		// pr($eventList);
		$this->assign('total',intval(count($auctionList)));
		$this->assign('list',$auctionList);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->assign('id',$idGallery);
		$this->log('surf','event');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-album-list.html');		
	}
	
	function newDataInput()
	{
		global $CONFIG;
			$auctionid = $this->_g('id');
			$this->assign('auctionid',$auctionid);  
	
		if ($this->_p('submit')){
		
			// pr($_POST);exit;
			// insert data dulu 
			$images = $_FILES['images'];
			$insertGallery = $this->auctionHelper->insertGallery();
			// pr($insertGallery);exit;
			if($insertGallery){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."auctions/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path); 
				// update data
				$updateEvent = $this->auctionHelper->storeEventGallery($insertGallery,$uploadnews['arrImage']['filename']);
				$this->log('surf',"insert auctions gallery");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."auctionGallery/seegallery?id={$auctionid}");
				exit;
			}
	
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-gallery-input.html');
	} 
	
	function editData($id=false)
	{
		global $CONFIG;
		$id = intval($this->_g('id'));
		$auctionid = intval($this->_g('auctionid'));
		 
		$eventList = $this->auctionHelper->getAuctionGallery($id);	
		$time['time'] = '%H:%M:%S';
		  
		$this->assign('total',count(intval($eventList)));
		$this->assign('list',$eventList[0]);
		$this->assign('aid',$id);
		$this->assign('auctionid',$auctionid);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','update event');
		
		// pr($eventList);
		if ($this->_p('submit')){
		// pr($_POST);
			// echo 'ada'; exit;
			
			$id = intval($this->_p('auctionid'));
			if ($id<=0) {sendRedirect($CONFIG['ADMIN_DOMAIN']."auctionGallery"); exit;}

			$updateData = $this->auctionHelper->editEventGallery();	
			
			$images = $_FILES['images']; 
			// $auctionid = intval($this->_p('auctionid'));
			if ($images['name']){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."auctions/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				
				$updateEvent = $this->auctionHelper->storeEventGallery($id,$uploadnews['arrImage']['filename']);
			}
			
			$auctionList = $this->auctionHelper->getAuctionGallery($id);
			// pr($auctionList);
			
			$auctionid = $auctionList[0]['auctionid']; 
			if ($updateData) sendRedirect($CONFIG['ADMIN_DOMAIN']."auctionGallery/seegallery?id={$auctionid}");
			exit;
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-gallery-edit.html');
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