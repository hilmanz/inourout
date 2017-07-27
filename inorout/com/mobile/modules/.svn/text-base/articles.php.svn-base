<?php
class articles extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		$this->eventHelper = $this->useHelper('eventHelper');
	}
	function main(){
		if(strip_tags($this->_g('page'))=='articles') $this->log('surf','articles');
		
		$currentEvent = $this->eventHelper->checkcurrentevent();
		$oripastEvent = $this->eventHelper->getEvent(false,0,1,true,true);
		
		// var_dump($currentEvent);
		// $changeFormat = date("j F Y",strtotime($currentEvent['posted_date']));
		if($currentEvent){
			$currentEvent['changeDate'] = $this->eventHelper->changeDate($currentEvent['posted_date']);
		}
		foreach ($oripastEvent['res'] as $key => $val){
			$oripastEvent['res'][$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
		}
		// pr($oripastEvent);
		// $pastEvent = $this->eventHelper->eventParseData($oripastEvent,3);
		$this->View->assign('currentEvent',$currentEvent);
		$this->View->assign('pastEvent',$oripastEvent['res']);
		$this->View->assign('total',$oripastEvent['total']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/articles.html');
	}
	function detail(){
		
		global $CONFIG;
		$articleid = intval($this->_g('id'));
		$this->log('surf','articles detail '.$articleid);
		
		if (!$articleid) sendRedirect("{$CONFIG['BASE_DOMAIN']}articles");
		
		$getEventByID = $this->eventHelper->getEvent($articleid);
		
		$otherEvent = $this->eventHelper->getEvent(false,1,3);
		// pr($otherEvent);
		if($otherEvent){
			foreach ($otherEvent['res'] as $key => $val){
				$otherEvent['res'][$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
			}
		}
		
		$getEventByID['res'][0]['changeDate'] = $this->eventHelper->changeDate($getEventByID['res'][0]['posted_date']);
		$this->View->assign('getEventByID',$getEventByID['res'][0]);
		
		$this->View->assign('otherEvent',$otherEvent['res']);
		$this->View->assign('total',$otherEvent['total']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'apps/article-detail.html');
	
	}
	
	function getPastEvent()
	{
		$start = intval($this->_p('start'));
		$limit = intval($this->_p('limit'));
		
		$oripastEvent = array();
		$oripastEvent = $this->eventHelper->getEvent(false,$start,$limit);
		// pr($oripastEvent);
		if (empty($oripastEvent)) {print json_encode(array('status'=>false)); exit;}
		
		foreach ($oripastEvent['res'] as $key =>$val){
			if ($val['title']!='')$oripastEvent['res'][$key]['title']= strip_tags($val['title']);
		}
		// pr($oripastEvent);
		// exit;
		// $changeFormat = date("j F Y",strtotime($currentEvent['posted_date']));
		if ($oripastEvent){
			foreach ($oripastEvent['res'] as $key => $val){
				$oripastEvent['res'][$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
			}
			
			if($oripastEvent['res']){
				print json_encode(array('status'=>true, 'res'=>$oripastEvent['res']));
			}else{
				print json_encode(array('status'=>false));
			}
		}else{
			print json_encode(array('status'=>false));
		}
		
		
		
		exit;
	}
	
	function getMoreEvent()
	{
		$start = intval($this->_p('start'));
		$limit = intval($this->_p('limit'));
		
		$otherEvent = array();
		$otherEvent = $this->eventHelper->getEvent(false,$start,$limit);
		// pr($otherEvent);
		
		if (empty($otherEvent)) {print json_encode(array('status'=>false)); exit;}
		foreach ($otherEvent['res'] as $key =>$val){
			if ($val['title']!='')$otherEvent['res'][$key]['title']= strip_tags($val['title']);
		}
		
		if($otherEvent){
			foreach ($otherEvent['res'] as $key => $val){
				$otherEvent['res'][$key]['changeDate'] = $this->eventHelper->changeDate($val['posted_date']);
			}
			
			if($otherEvent['res']){
				print json_encode(array('status'=>true, 'res'=>$otherEvent['res']));
			}else{
				print json_encode(array('status'=>false));
			}
			
		}else{
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
	
}
?>