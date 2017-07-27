<?php 
class challengeHelper {

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
	
	function checkcurrentchallenge($articletype=1){
		
		$datetimes = date('Y-m-d');
		$sql = " SELECT * FROM events WHERE type=4 AND WEEK(event_date,1) = WEEK('{$datetimes}',1)  LIMIT 1";
				 // pr($sql);
		$qData = $this->apps->fetch($sql);
		if($qData)	return $qData;
		return false;
	}
	
	function getChallenge()
	{
		$qEid = "";
		$datetimes = date('Y-m-d');
	 	$id = intval($this->apps->_g('id'));	
		$qWeeklyEvent  = "";
		$qLimitForFinalist  = "";
		if($id!=0) $qWeeklyEvent = " AND id={$id}  ";
		if($id!=0) $qLimitForFinalist = " LIMIT 2  ";
		$sql = "SELECT * FROM events				
				WHERE n_status IN (1,2,3) 
					AND type=4 {$qWeeklyEvent} 
					AND WEEK(event_date,1) <= WEEK('{$datetimes}',1)  
				ORDER BY event_date DESC {$qLimitForFinalist} ";
		//pr($sql);		
		$qData = $this->apps->fetch($sql,1);
	 	
		if ($qData){
			foreach($qData as $key => $val){
				$id = $val['id'];
				$sql = "SELECT COUNT(1) total_finalist
						FROM share_brag_contest
						WHERE n_status = 2 AND eventid = {$id} LIMIT 1";
				
				$rs = $this->apps->fetch($sql);

				if($rs) $qData[$key]['total_finalist'] = $rs['total_finalist'];

				$qData[$key]['event'] = $this->apps->userHelper->getimagefullpath($val,'img','event');
			}
			//pr($qData);exit;
			return  $qData;

		}
		
		return false;
	}
	
	function getNextChallenge()
	{
		$qEid = "";
		$datetimes = date('Y-m-d'); 
		$sql = "SELECT * FROM events WHERE type=4  AND WEEK(event_date,1) > WEEK('{$datetimes}',1)  ORDER BY event_date ASC LIMIT 1 ";
		// pr($sql);		
		$qData = $this->apps->fetch($sql,1);
	 
		if ($qData){
			foreach($qData as $key =>  $val){
				$qData[$key]['event'] = $this->apps->userHelper->getimagefullpath($val,'img','event');
			}
			return  $qData;
		}
		
		return false;
	}
	
	
	function getChallengeGallery($own=true,$finalist=false,$win=false, $start=0, $limit=30)
	{
		$id = intval($this->apps->_g('id'));		
		if($id==0) return false;
		
		$qOwnerGallery = "";
		if($own) $qOwnerGallery = " AND s.userid={$this->uid} ";	
		
		$qFinalistGallery = "  AND s.n_status IN (1,2) ";
		if($finalist) $qFinalistGallery = "  AND s.n_status=2  ";
		
		$qWinnerGallery = "";
		if($win) $qWinnerGallery = " AND s.win=1 ";
		
		$sql = "SELECT s.*,e.title AS event_title 
				FROM share_brag_contest s
				LEFT JOIN events e ON e.id = {$id}
				WHERE s.eventid = {$id} {$qOwnerGallery} {$qFinalistGallery} {$qWinnerGallery} ORDER BY s.uploaddate DESC  limit {$start}, {$limit}";
		//pr($sql);
		$rqData = $this->apps->fetch($sql,1);
		if ($rqData){
			$qData = false;
			foreach($rqData as $key =>  $val){
				$rqData[$key]['gallery'] = $this->apps->userHelper->getimagefullpath($val,'img','sharebrags');				 
			}
			if($rqData) $qData=	$this->getStatistictChallenge($rqData);

			return  $qData;
		}
		
		return false;
	}
	
	function getStatistictChallenge($rqData=null){
		
		if($rqData==null) return false;
	 
		$qData = false;
		$cidArr = false;
		$arrAuthorid = false;
		  
		foreach($rqData as $key => $val){
		
			$cidArr[] = $val['id'];		 
			$arrAuthorid[] = $val['userid'];		 
			$qData[$key] = $val;		 
			$qData[$key]['vote'] = 0;
			$qData[$key]['author'] = false;
		 
		}
		
		if(!$arrAuthorid)return false;
		$socialStr = implode(",",$arrAuthorid);
		 		
		if(!$cidArr) return false;
		$cidStr = implode(",",$cidArr);	

		
	
		// vote or like data
		$voteData = $this->getVote($cidStr);
		if($voteData){
			
			foreach($qData as $key => $val){
				if(array_key_exists($val['id'],$voteData)) $qData[$key]['vote'] = $voteData[$val['id']];			
			}
		
		}
		
		// author
		$authorData = $this->getAuthorProfile($socialStr);
		if($authorData){
			
			foreach($qData as $key => $val){
				if(array_key_exists($val['userid'],$authorData)) $qData[$key]['author'] = $authorData[$val['userid']];			
			}
		
		}
		 	 
		if($qData) {
			return $qData;
		} else {
		return false;
		}
	}
	
	function getVote($cid=null){
		if($cid==null) $cid = intval($this->apps->_p('cid'));
		if($cid){
			$cidin = " AND contentid IN ({$cid}) ";
		}
			$sql ="
					SELECT count(*) total,contentid FROM votes WHERE n_status=  1 {$cidin}  GROUP BY contentid
					";
				$qData = $this->apps->fetch($sql,1);
				if($qData) {
					$this->logger->log("have favorite");
					foreach($qData as $val){
						$favoriteData[$val['contentid']]=$val['total'];
					}
					
						return $favoriteData;
				}
		return false;
	}
	
	function getAuthorProfile($userid=null ){
		if($userid==null) return false;
		
		$sql = "SELECT name, id AS authorid, last_name, image_profile img  FROM social_member WHERE id IN ({$userid}) ";
 
		// pr($sql);
		$data = $this->apps->fetch($sql,1);
		
		if(!$data) return false;
		
		foreach($data as $key => $val){
			$data[$key]['profiles'] = $this->apps->userHelper->getimagefullpath($val,'img','profiles');	
			$arrData[$val['authorid']] = $data[$key];
		}
		if(!isset($arrData)) return false;
		return $arrData;
	}
	
	function saveChallenge($data=false){
		$img = $data["img"];
		$challenge_id = $data["challenge_id"];

		$sql =" 
		INSERT INTO `share_brag_contest` 
		( `eventid`, `userid`, `title`, `desc`, `img`, `uploaddate`, `windate`, `win`, `n_status`) 
		VALUES 
		({$challenge_id}, {$this->uid}, NULL, NULL, '{$img}',  NOW(), NULL, 0, 1); 
		";
		$rs = $this->apps->query($sql);
		
		return $rs;
		
	}
	
	/* End Helper logic */
}
?>