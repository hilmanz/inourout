<?php
class auction extends App{
	
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
	
		$auctionList = $this->auctionHelper->auctionList($start=null,$limit=10);	
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',intval($auctionList['total']));
		$this->assign('list',$auctionList['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','auction');
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-pages.html');		
	}
	
	function hapus(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->auctionHelper->getHapus($cidStr);
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."auction");
			exit;
		}
	}
	
	function newDataInput()
	{
		global $CONFIG;
		if ($this->_p('submit')){
	// pr($_FILES);exit;
		// insert data dulu 
			$images = $_FILES['images'];
			$insertauctiondata = $this->auctionHelper->insertauctiondata();
			// var_dump($insertauctiondata);exit;
			if($insertauctiondata){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."auctions/";
				// upload image dulu
				$uploadauction = $this->uploadHelper->uploadThisImage($images,$path);
				
				// update data
				$auctionimageupdate = $this->auctionHelper->auctionimageupdate($insertauctiondata,$uploadauction['arrImage']['filename']);
				$this->log('surf',"insert auction");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."auction");
			}

		} 
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-input.html');
	} 
	
	function auctionedit()
	{
		global $CONFIG;
		$id = intval($this->_request('id'));
		if($this->_p('editit')=='ok'){ 
			$uploadauct = false;
			// pr($_FILES);
			// exit;
			if (isset($_FILES['images'])&&$_FILES['images']['name']!=NULL) {
					if (isset($_FILES['images'])&&$_FILES['images']['size'] <= 2000000) {
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."auctions/";
						// pr($path);exit;
						$data = $this->uploadHelper->uploadThisImage($_FILES['images'],$path);
						
						if ($data['arrImage']!=NULL) { 
							$uploadauct = $data['arrImage']['filename'];
						}
					}else{
						echo '2';
					}
				}
		
			$updatethedata = $this->auctionHelper->updatethedata($id, $uploadauct);  
			
			// exit;
			if($updatethedata==true){
				sendRedirect($CONFIG['ADMIN_DOMAIN']."auction");
				exit;
			}
		}	
		
		$selectupdatedata = $this->auctionHelper->selectupdatedata($id);
		// pr($selectupdatedata);
		$this->assign('selectupdatedata',$selectupdatedata); 
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/auction-update.html');
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->auctionHelper->auctionList($start);		
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