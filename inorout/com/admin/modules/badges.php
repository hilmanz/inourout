<?php
class badges extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->badgeHelper = $this->useHelper('badgeHelper'); 
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
		$badgeslist = $this->badgeHelper->badgeslist($start=null,$limit=12);
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',intval($badgeslist['total']));
		$this->assign('list',$badgeslist['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','badges');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/badge-pages.html');		
	}
	
	function hapus(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->badgeHelper->getHapus($cidStr);
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."badges");
			exit;
		}
	}
	
	function newDataInput()
	{
		global $CONFIG;
		if ($this->_p('submit')){
	
		// insert data dulu 
			$images = $_FILES['images'];
			$insertnewbadges = $this->badgeHelper->insertnewbadges();
			
			if($insertnewbadges){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."badges/";
				// upload image dulu
				$uploadbadge = $this->uploadHelper->uploadThisImage($images,$path);
				
				// update data
				$badgesimageupdate = $this->badgeHelper->badgesimageupdate($insertnewbadges,$uploadbadge['arrImage']['filename']);
				$this->log('surf',"insert badges");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."badges");
			}

		} 
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/badges-input.html');
	} 
	
	function badgesedit()
	{
		global $CONFIG;
		$id = intval($this->_request('id'));
		if($this->_p('editit')=='ok'){ 
			$uploadbadge = false;
			// pr($_FILES);
			// exit;
			if (isset($_FILES['images'])&&$_FILES['images']['name']!=NULL) {
					if (isset($_FILES['images'])&&$_FILES['images']['size'] <= 2000000) {
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."badges/";
						
						$data = $this->uploadHelper->uploadThisImage($_FILES['images'],$path);
						
						if ($data['arrImage']!=NULL) { 
							$uploadbadge = $data['arrImage']['filename'];
						}
					}else{
						echo '2';
					}
				} 
		
			$updatethedata = $this->badgeHelper->updatethedata($id, $uploadbadge);  
			
			// exit;
			if($updatethedata==true){
				sendRedirect($CONFIG['ADMIN_DOMAIN']."badges");
				exit;
			}
		}	
		$selectupdatedata = $this->badgeHelper->selectupdatedata($id);
		// pr($selectupdatedata);
		$this->assign('selectupdatedata',$selectupdatedata); 
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/badges-update.html');
	}
		
}
?>