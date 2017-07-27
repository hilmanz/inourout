<?php
class articles extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->eventHelper = $this->useHelper('eventHelper');
	}
	function main(){
		if(strip_tags($this->_g('page'))=='articles') $this->log('surf','articles');
		
		$currentEvent = $this->eventHelper->checkcurrentevent();
		$getpastEvent = $this->eventHelper->getEvent(false,0,10,true,true);
		$pastEvent = $getpastEvent['res'];
		
		// $changeFormat = date("j F Y",strtotime($currentEvent['posted_date']));
		if($currentEvent){
			$currentEvent['changeDate'] = $this->eventHelper->changeDate($currentEvent['posted_date']);
		}
		if($pastEvent){
			foreach ($pastEvent as $key => $val){
				// $changeFormat = date("j F Y",strtotime($val['posted_date']));
				$pastEvent[$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
			}
		}
		//pr($pastEvent);
		$this->View->assign('currentEvent',$currentEvent);
		$this->View->assign('pastEvent',$pastEvent);
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/articles.html');
	}
	
	function detail(){
		
		global $CONFIG;
		$articleid = intval($this->_g('id'));
		$this->log('surf','articles detail '.$articleid);
		
		if (!$articleid) sendRedirect("{$CONFIG['BASE_DOMAIN']}articles");
		
		$getEventByID = $this->eventHelper->getEvent($articleid);
		$otherEvent = $this->eventHelper->getEvent(false,1,3);
		//pr($getEventByID);
		if($otherEvent){
			foreach ($otherEvent['res'] as $key => $val){
				$otherEvent['res'][$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
			}
		}
		//pr($getEventByID['res'][0]['changeDate']);
		$getEventByID['res'][0]['changeDate'] = $this->eventHelper->changeDate($getEventByID['res'][0]['posted_date']);
		// pr($otherEvent);
		$this->View->assign('getEventByID',$getEventByID['res'][0]);
		$this->View->assign('otherEvent',$otherEvent['res']);
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/article-detail.html');
	
	}
	
}
?>