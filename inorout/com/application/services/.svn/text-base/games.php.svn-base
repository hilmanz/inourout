<?php
class games  extends ServiceAPI{
			

	function beforeFilter(){
		
		$this->contentHelper = $this->useHelper('contentHelper');
		$this->gamesHelper = $this->useHelper('gamesHelper');
		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->userHelper = $this->useHelper('userHelper');
		$this->offlineHelper = $this->useHelper('offlineHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
	
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));		
		
	}
	
	function getUser(){		
		$user = $this->userHelper->getUserProfile(); 
		if($user){
			$profile['id'] = $user['id'];
			$profile['name'] = $user['name'];
			$profile['last_name'] = $user['last_name'];
			$this->gamesHelper->setplaydates('getuser');
		}else return false;
		$lastoken = $this->gamesHelper->getLastOldToken(); 
		$data['profile'] = $profile;	
		$data['playingat'] = date("YmdHi").$lastoken;	
		return $data;
	}
	
		
	function savedata(){
	  GLOBAL $CONFIG;
		$data['result'] = false;
		$data['badges'] = false;
		$data['message'] = "failed";
		$data['double'] = false;
		$data['double_next_url'] = "";
		$result =  $this->gamesHelper->checkstatus();
		
		if(!$this->gamesHelper->checkuserplaygames()) {	
		
				$data['message'] = "already get badges this level games this day";
		}
		
		if($result){
			 
			$doubleornothingdata['userid'] = 0;	 	
			$doubleornothingdata['gamesid'] = 0;	
			
			$getMasterCode = $this->badgesHelper->masterbBadges();
			$mastercode = false;
			if ($getMasterCode){
				foreach ($getMasterCode as $value){
							$mastercode[$value['id']] = $value['name'];
						}
			}
			
			$data['result'] = true;
			$data['badges'] = @$mastercode[$result['badgesid']];			
			$data['images_badges']	= $CONFIG['ASSETS_DOMAIN_WEB']."images/badges/badges-{$result['badgesid']}.png";
			$data['double'] = $result['double'];
			
			 
			if($result['double']){
				
				$doubleornothingdata['userid'] = strip_tags($this->_p('userid'));
				$doubleornothingdata['gamesid'] = strip_tags($this->_p('gamesid'));	 		
					
				$encoderdata = urlencode64(serialize($doubleornothingdata));
				$data['double_next_url'] = $CONFIG['BASE_DOMAIN']."games/doubleornothing/?token={$encoderdata}";			
			}
			$data['message'] = "success";
			
		}
		$this->gamesHelper->setplaydates('savedata');
		
		return $data;
	}
	
	function offline(){
		
		print json_encode($this->badgesHelper->checkrightsuseroffline());
		// print json_encode($this->offlineHelper->addOfflineUserRights());
		exit;
	
	}
	
	function getlocalsavedata(){
			return false;
			  GLOBAL $CONFIG;
			$result['userid'] = 2;
			$result['gamesid'] = 1;		
		 
			$encoderdata = urlencode64(serialize($result));
			$data['double_next_url'] = $CONFIG['BASE_DOMAIN']."games/doubleornothing/?token={$encoderdata}";
			
			print_r($data);exit;
	}
	
	function freeuserdoubleornothing(){
		$this->gamesHelper->freeuserdoubleornothing();
	
	}
}
?>
