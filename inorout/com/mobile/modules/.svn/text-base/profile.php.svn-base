<?php
class profile extends App{
	
	
	function beforeFilter(){	
		global $LOCALE,$CONFIG;
		$this->userHelper = $this->useHelper('userHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('webdomain', $CONFIG['BASE_DOMAIN_PATH']);		
		$this->assign('locale', $LOCALE[1]);

		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
		$this->tradeHelper = $this->useHelper('tradeHelper');
		
		$myactivetrade = $this->tradeHelper->myTrade(0,3,true);
		$mybadges = $this->badgesHelper->myCurrentBadges(1);
		$mybadgepoint = $this->badgesHelper->myCurrentBadgePoints();
		$unread = $this->notificationHelper->unread();
		
		$this->assign('myactivetrade', $myactivetrade);
		$this->assign('mybadge', $mybadges);
		$this->assign('unread', $unread);
		$this->assign('mybadgepoint', $mybadgepoint);		
		$this->assign('thisuser', $this->userHelper->getUserProfile());
		
		// pr($this->userHelper->getUserProfile());
		
		if($this->user->n_status==0) {	
			$this->assign('unverified', 1);
		}

		
	}
	
	function main(){
		global $CONFIG;
		
		
		if($this->user->n_status==1) {
			$getStamp = $this->userHelper->getStamp();	
			if($this->user->usertype==2)$getfirstbadges = 2;
			
			else $getfirstbadges = 1;
			for($i=1;$i<=$getfirstbadges;$i++){
				$firstbadges = $this->badgesHelper->giveuserbadges('first login badges',1);			 
			}
			if($firstbadges){
				if($firstbadges['result']){
					$this->notificationHelper->notif_log(1,0,$this->user->id);
					$this->assign('showPopup_1stBadges', 1);
				}else{
					$this->assign('showPopup_1stBadges', 0);
				}
			}
		
			if($getStamp['code']==2){
				$stampbadges = $this->badgesHelper->giveuserbadges('stamp',1);	
				if($stampbadges){
					if($stampbadges['result']) $this->notificationHelper->notif_log(1,0,$this->user->id);
				}
			}
			if($getStamp['code']==1){
				$this->assign('stamps', $getStamp['data']);
				$this->assign('showPopup', $getStamp['popup']);
			}
		}
		$getNewsFeed = $this->userHelper->getNewsFeed();
		foreach ($getNewsFeed as $key => $val){
				// change Format date "j F Y"
				$getNewsFeed[$key]['changeDate'] = $this->userHelper->changeDate($val['posted_date']);
				$getNewsFeed[$key]['title'] = stripslashes($val['title']);
			}
		// pr($getNewsFeed);
		$this->assign('newsFeed', $getNewsFeed);
		if ($getStamp['popup']){
		
			if(strip_tags($this->_g('page'))=='profile') $this->log('surf','getstamp');
			return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/wild-card.html');	
		}else{
			if(strip_tags($this->_g('page'))=='profile') $this->log('surf','profile');
			return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/profile.html');	
		}
		
		
	}

	function editPhoto(){
		global $CONFIG, $basedomain;
		$this->assign('edit', 'photo');

		$edit = intval($this->_p('editPhoto'));
		if($edit){
			$upload = $this->uploadHelper->profilePhoto();
			if($upload['result']){
				$editPhoto = $this->userHelper->updateProfileFoto($upload['arrImage']['filename']);
				if($editPhoto){
					$this->log('edit',"photo-{$upload['arrImage']['filename']}");
					$this->assign("msg","updating...");
					
					 
					sendRedirect("{$basedomain}profile");
					 
					return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
					die();
				}
			}
		}
		
		if(strip_tags($this->_g('page'))=='profile') $this->log('surf','profile_edit_photo');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/edit-profilePhoto.html');
	}

	function change(){
		global $CONFIG, $basedomain;
		$this->assign('change', 'aspiration');

		$change = intval($this->_p('change_aspiration'));
		if($change){	
			$changeAspiration = $this->userHelper->aspirationSubmit();
			// pr($changeAspiration);
			if($changeAspiration){
				$this->log('change',"change-aspiration");
				$this->assign("msg",$changeAspiration['msg']);
				
				 
				sendRedirect("{$basedomain}profile");
				 
				return $this->out(TEMPLATE_DOMAIN_MOBILE . '/login_message.html');
				die();
			}
		}
		
		if(strip_tags($this->_g('page'))=='profile') $this->log('surf','change_aspiration');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/profile.html');
	}

	function getNewsFeed()
	{
		$start = $this->_p('start');
		$getNewsFeed = $this->userHelper->getNewsFeed('',$start);
		if ($getNewsFeed){
			foreach ($getNewsFeed as $key => $val){
				$getNewsFeed[$key]['changeDate'] = $this->userHelper->changeDate($val['posted_date']);
				$getNewsFeed[$key]['title'] = stripslashes($val['title']);
					
			}
			
			print json_encode(array('status'=>true,'res'=>$getNewsFeed));
		}else{
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
}
?>