<?php
class games extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->gamesHelper = $this->useHelper('gamesHelper');
		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/games.html');
		
	}

	function spotted(){
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games-spotted');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/games/spotted.html');
	}
	
	function doublechecker(){
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games-doublechecker');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/games/doublechecker.html');
	}
	
	function badgesbreaker(){
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games-badgesbreaker');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/games/badgesbreaker.html');
	}
	
	function doubleornothing(){ 
	 
		$listsuser = $this->gamesHelper->getListUserDoubleOrNothing(); 
		$this->assign('listsuser', $listsuser); 			
		 
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games double or nothing lists');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/widgets/popup-double-or-nothing-list.html');
	}
	
	function daredoubles(){ 
		global $CONFIG;
		
			$decrypt = unserialize(urldecode64($this->_g('token')));
		 
			// pr($this->uid);exit;
			if(is_array($decrypt)) {
				$gamesid = 0;
				if(array_key_exists('gamesid',$decrypt))$gamesid	=intval($decrypt['gamesid']);	
				if(array_key_exists('userid',$decrypt)) $userid	=intval($decrypt['userid']); 
				
				$imchallanging = $decrypt['takechallanges'];
		
				if($imchallanging==1){
					// double it
						$status = $this->gamesHelper->doubleOrNothing();
						
				}
				if($imchallanging==3){
					//pass
					
					$status = $this->gamesHelper->passDoubleOrNothing();
					
						// pr($imchallanging);exit;
				}	
				if($imchallanging==0){
					$status = $this->gamesHelper->setDoubleOrNothing();
					 
				}
			
		  
			}
			
		$this->assign('listsuser', $status); 
		if(strip_tags($this->_g('page'))=='games') $this->log('surf','games double or nothing lists');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/widgets/popup-double-or-nothing-list.html');
	}
	
	function hiddencode()
	{
		
		if ($this->_p('hiddenCode')){
			if ($this->_p('param')){
			
				$validateCode = $this->gamesHelper->ValidateHiddenCode();
				if ($validateCode){
					print json_encode(array('status'=>true, 'rec'=>$validateCode));
				}else{
					print json_encode(array('status'=>false));
				}
			}
			
		}
		
		exit;
	}
		
}
?>