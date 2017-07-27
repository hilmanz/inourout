<?php
class itemManagement extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->contentHelper = $this->useHelper('contentHelper');
		$this->passwordHelper  = $this->useHelper('passwordHelper');
	 
		$this->contentHelper = $this->useHelper('contentHelper');
		$this->activityHelper = $this->useHelper('activityHelper');
		$this->searchHelper  = $this->useHelper('searchHelper');
		$this->messageHelper = $this->useHelper('messageHelper');
		$this->userHelper = $this->useHelper('userHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->loginHelper = $this->useHelper('loginHelper');
		$this->registerHelper = $this->useHelper('registerHelper');
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){ 
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->assign('search',$this->_p('search'));
		$this->View->assign('my_profile_box',$this->setWidgets('my_profile_box'));
		$this->View->assign('lates_engagement_box',$this->setWidgets('lates_engagement_box'));
		$this->View->assign('inbox_box',$this->setWidgets('inbox_box'));
		$this->View->assign('line_chart',$this->setWidgets('line_chart'));
		$this->View->assign('medium_banner',$this->setWidgets('medium_banner'));		
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','home');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/item-management.html');		
	}
	
	
}
?>