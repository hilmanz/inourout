<?php 
class eventHelper {

	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
			if($this->apps->isUserOnline())  {
					if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
			}
		else $this->uid = 0;
		
		$this->dbshema = "";
	}
	
	function checkcurrentevent($articletype=1){
		
		$datetimes = date('Y-m-d');
		$sql = "SELECT eve.*, cr.city FROM events eve LEFT JOIN city_references cr 
				ON eve.cityid = cr.id
				WHERE eve.type = {$articletype} AND eve.n_status = 1 
				AND eve.title IS NOT NULL AND eve.title <> '' AND eve.posted_date > '{$datetimes}' GROUP BY eve.posted_date ORDER BY eve.posted_date ASC LIMIT 1";
				 //pr($sql);
		$qData = $this->apps->fetch($sql);
		if($qData)	{
			
			 
		 
				$qData['news_images'] = $this->apps->userHelper->getimagefullpath($qData,'img','news');
			
			 
			return $qData;
			
		}
		return false;
	}
	
	function getLastEvent()
	{
		$sql = "SELECT * FROM events WHERE n_status = 1 ORDER BY posted_date DESC ";
		$res = $this->apps->fetch($sql,1);
		if ($res){
			$index = 0;
			$dataEvent = array();
			foreach ($res as $key => $val){
				
				if ($index > 0){
					$dataEvent[] = $val;
				}
				$index++;
			}
		}
		
		if (!$dataEvent) return false;
		return $dataEvent;
	}
	
	function getEvent($id=false,$start=0,$end=10,$gallery=true,$past_event=false)
	{
		$filter = "";
		$filter_past_event = "";
		
		if ($id) $filter = "AND eve.id = {$id}";
		
		$datetimes = date('Y-m-d');
		if($past_event) $filter_past_event = "AND eve.posted_date <= '{$datetimes}'";
		
		$sql = "SELECT eve.*, cr.city FROM events eve LEFT JOIN city_references cr 
				ON eve.cityid = cr.id
				WHERE eve.type = 1 AND eve.n_status = 1 {$filter} {$filter_past_event} ORDER BY eve.posted_date DESC LIMIT {$start},{$end}";
		// pr($sql);		
		$res = $this->apps->fetch($sql,1);
		//pr($res);

		$sqlTotal = "SELECT eve.id total FROM events eve LEFT JOIN city_references cr 
				ON eve.cityid = cr.id
				WHERE eve.type = 1 AND eve.n_status = 1 {$filter} {$filter_past_event} ORDER BY eve.posted_date DESC";
		// pr($sql);		
		$resTotal = $this->apps->fetch($sqlTotal);
		if ($res){
			//check past event
			
			foreach ($res as $key => $value) {
				if(date('Y-m-d', strtotime($value['posted_date'])) <= $datetimes){
					$res[$key]['past_event'] = 1;
				}
			}
			//pr($res);

			// get gallery
			if ($gallery){
				foreach ($res as $key => $val){
					
					$res[$key]['news_images'] = $this->apps->userHelper->getimagefullpath($val,'img','news');
					$res[$key]['gallery'] = $this->getEventGallery($val['id']);
				}
			}
			
			return array('res'=>$res,'total'=>$resTotal['total']);
		}
		
		return false;
	}
	
	
	function getEventGallery($id=false)
	{
		if (!$id) return false;
		
		$sql = "SELECT * FROM events_gallery WHERE eventid = {$id} AND n_status = 1 ";
		$res = $this->apps->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	
	function getClues($id=false, $location=false, $type=3, $default=false)
	{
		/* Type :
			1 = Yellow Cab
			2 = Phone Booth
		*/
		
		$filter = "";
		if ($id) $filter = " AND eve.id = {$id}";
		
		if (!$location){
			$location = "";
			$city = $this->getCity(false, true);
			if ($city) $location = " AND eve.cityid = {$city[0]['id']}";
			else return false;
		}
		
		if ($default){
			$sql = "SELECT eve.*, cr.city FROM events eve 
				LEFT JOIN city_references cr ON eve.cityid = cr.id 
				WHERE eve.type = {$type} AND eve.n_status = 1";
		}else{
			$sql = "SELECT eve.*, cr.city FROM events eve 
				LEFT JOIN city_references cr ON eve.cityid = cr.id 
				WHERE eve.type = {$type} AND eve.n_status = 1 {$location} {$filter}";
		}
		
		// pr($sql);
		$res = $this->apps->fetch($sql,1);
		if ($res)return $res;
		
		return false;
	}
	
	function getCluesGallery($eventid=false, $city=false)
	{
		if (!$eventid) return false;
		$filter = "";
		if ($city) $filter = " AND cityid = {$city}";
		$sql = "SELECT * FROM events_gallery WHERE eventid = {$eventid} AND n_status = 1 {$filter}";
		// pr($sql);
		$res = $this->apps->fetch($sql,1);
		if ($res)return $res;
		
		return false;
	}
	
	function getCity($id=false, $default=false)
	{
		$filter = "";
		if ($id) $filter = " AND id = {$id}";
		if ($default) $filter = " AND city LIKE 'jakarta'";
		
		$sql = "SELECT * FROM  city_references WHERE city NOT LIKE '%NOT SPECIFIED%' {$filter}";
		$res = $this->apps->fetch($sql,1);
		if ($res) return $res;
		return false;
	}
	
	/* Helper logic */
	function eventParseData($event, $limit=3)
	{
		
		if (!$event) return false;
		
		$count = count($event);
		$numberSlide = ceil($count/$limit);
		$slide = $limit;
		if ($numberSlide){
			$stack = 0;
			$index = 0;
			foreach ($event as $key => $val){
				if ($stack==$slide){
					$stack = 0;
					$index++;
				}else{
					$index = $index;
				}
				if ($index>0){
					$dataEvent[$index][] = $val;
					// $dataMovefwd[$index][$key]['active'] = false;
				}else{
					$dataEvent[$index][] = $val;
					$dataEvent[$index][$key]['active'] = true;
				}
				
				$stack++;
				
			}
			
		}
		
		return $dataEvent;
	}
	
	function changeDate($date=false)
	{
		if (!$date) return false;
		$changeFormat = date("j F Y",strtotime($date));
		
		return $changeFormat;
	}
	
	/* End Helper logic */
}
?>