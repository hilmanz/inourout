<?php
class clues extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		$this->eventHelper = $this->useHelper('eventHelper');
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='clues') $this->log('surf','clues');
		
		// $getCity = $this->eventHelper->getCity();
		$getClue = $this->eventHelper->getClues(false,false,3,true);
		
		
		foreach ($getClue as $key => $val){
			$mapsDefault = $this->eventHelper->getCluesGallery($val['id'],false);
			if ($mapsDefault) $getClue[$key]['maps'] = $mapsDefault;
			$getClue[$key]['content'] = html_entity_decode($val['content']);
		}
		
		// pr($getClue);
		// $this->View->assign('city',$getCity);
		$this->View->assign('clue',$getClue);
		$this->View->assign('firstclue',$getClue[0]);
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/clues.html');
		
	}
	
	function getClueAjax()
	{
		
		if ($this->_p('param')){
		
			$eventid = intval($this->_p('eventid'));
			$cityid = intval($this->_p('cityid'));
			if ($cityid<1){
				$cityDefault = $this->eventHelper->getCity(false,true);
				$cityid = $cityDefault[0]['id'];
			}
			
			
			if ($eventid<=0 ){
				print json_encode(array('status'=>false));
				exit;
			}
			
			$getClues = $this->eventHelper->getCluesGallery($eventid,$cityid);
			// pr($getClues);
			if ($getClues){
				// pr($getClues);
				print json_encode(array('status'=>true, 'res'=>$getClues));
			}else{
				print json_encode(array('status'=>false));
			}
		}
		
		exit;
		
	}
}
?>