<?php
class clues extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->eventHelper = $this->useHelper('eventHelper');
	}
	function main(){
	
		if(strip_tags($this->_g('page'))=='clues') $this->log('surf','clues');
	
		$getCity = $this->eventHelper->getCity();
		$getClue = $this->eventHelper->getClues(false,false,3,true);
		// pr($getClue);
		// pr($getCity);
		if($getClue){
			foreach ($getClue as $key => $val){
				$mapsDefault = $this->eventHelper->getCluesGallery($val['id'],$getCity[0]['id']);
				if ($mapsDefault) $getClue[$key]['maps'] = $mapsDefault;
			}
		}
		// pr($getClue);
		$this->View->assign('city',$getCity);
		$this->View->assign('clue',$getClue);
		
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/clues.html');
	}
	
	function getClueAjax()
	{
		
		if ($this->_p('param')){
		
			$eventid = intval($this->_p('eventid'));
			$cityid = intval($this->_p('cityid'));
			if ($eventid<=0 or $cityid <=0){
				print json_encode(array('status'=>false));
				exit;
			}
			
			$getClues = $this->eventHelper->getCluesGallery($eventid,$cityid);
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