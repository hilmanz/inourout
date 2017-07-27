<?php
class profile extends App{
	
	
	function beforeFilter(){	
		global $LOCALE,$CONFIG;
		$this->userHelper = $this->useHelper('userHelper');
		$this->eventHelper = $this->useHelper('eventHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);

		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
		$this->tradeHelper = $this->useHelper('tradeHelper');

		$myactivetrade = $this->tradeHelper->myTrade(0,3,true);
		$mybadges = $this->badgesHelper->myCurrentBadges(1);
		$mybadgepoint = $this->badgesHelper->myCurrentBadgePoints();
		$unread = $this->notificationHelper->unread();

		//pr($myactivetrade);
		
		if($this->user->n_status==0) {	
			$this->assign('unverified', 1);
		}

		$this->assign('myactivetrade', $myactivetrade);
		$this->assign('mybadge', $mybadges);
		$this->assign('unread', $unread);
		$this->assign('mybadgepoint', $mybadgepoint);		
		$this->assign('thisuser', $this->userHelper->getUserProfile());

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
					$this->assign('stamps', $getStamp['data']);
					$this->assign('showPopup', $getStamp['popup']);
					$this->assign('messagewildcard', $getStamp['message']);
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
			}
		$this->assign('newsFeed', $getNewsFeed);
		//pr($getNewsFeed);die;
		if(strip_tags($this->_g('page'))=='profile') $this->log('surf','profile');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/profile.html');	
	}

	function editPhoto(){
		global $CONFIG;
		$this->assign('edit', 'photo');

		$edit = intval($this->_p('editPhoto'));
		if($edit){
			$upload = $this->uploadHelper->profilePhoto();
			//pr($upload);exit;
			if($upload['result']){
				$editPhoto = $this->userHelper->updateProfileFoto($upload['arrImage']['filename']);
				if($editPhoto){
					$this->log('edit',"photo-{$upload['arrImage']['filename']}");
					$this->assign("msg","updating...");
					
					 
					// sendRedirect("{$CONFIG['BASE_DOMAIN']}profile");
					 
					// return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
					// die();
					echo json_encode(array('status'=>1,'msg'=>'Foto profilmu berhasil diperbaharui!'));
					exit;
				}else{
					echo json_encode(array('status'=>2,'msg'=>'Foto profilmu gagal diperbaharui!'));
					exit;
				}
			}else{
				echo json_encode(array('status'=>0,'msg'=>'Foto profilmu gagal diperbaharui!'));
				exit;
			}
		}
		
		if(strip_tags($this->_g('page'))=='profile') $this->log('surf','profile_edit_photo');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/profile.html');
	}

	function change(){
		global $CONFIG;
		$this->assign('change', 'aspiration');

		$change = intval($this->_p('change_aspiration'));
		if($change){	
			$changeAspiration = $this->userHelper->aspirationSubmit();
			if($changeAspiration['status']==1){
				$this->log('change',"change-aspiration");
				$this->assign("msg",$changeAspiration['msg']);
				
				echo json_encode(array('status'=>1,'msg'=>'Aspirasimu berhasil diperbaharui!'));
				exit;
				// sendRedirect("{$CONFIG['BASE_DOMAIN']}profile");
				 
				// return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
				// die();
			}else{
				echo json_encode(array('status'=>0,'msg'=>'Aspirasimu gagal diperbaharui!'));
				exit;
			}
		}
		$getNewsFeed = $this->userHelper->getNewsFeed();
		foreach ($getNewsFeed as $key => $val){
				// change Format date "j F Y"
				$getNewsFeed[$key]['changeDate'] = $this->userHelper->changeDate($val['posted_date']);
			}
		$this->assign('newsFeed', $getNewsFeed);
		if(strip_tags($this->_g('page'))=='profile') $this->log('surf','change_aspiration');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/profile.html');
	}
	function detailNewsFeed(){
		$articleid =  $this->_p('articleid');
		// $articleid =  5;
		$getEventByID = $this->userHelper->getNewsFeed($articleid);
		
		$getEvent['title']=$getEventByID[0]['title'];
		$getEvent['content']=$getEventByID[0]['content'];
		
		echo json_encode($getEvent);
		exit;
	}
	function loadNewsFeed(){
		$start =  intval($this->_p('start'));
		$getEvent = $this->userHelper->getNewsFeed('',$start);
		foreach ($getEvent as $key => $val){
				// change Format date "j F Y"
				$getEvent[$key]['changeDate'] = $this->userHelper->changeDate($val['posted_date']);
			}
		$getEventTotal = $this->userHelper->getNewsFeedTotal();
		
		echo json_encode(array('data'=>$getEvent,'total'=>$getEventTotal['total']));
		exit;
	}
	function getUnreadNotif(){
		global $CONFIG;

		$count = $this->notificationHelper->unread();

		//pr($count);
		echo json_encode($count);
		exit;
	}
	
}
?>