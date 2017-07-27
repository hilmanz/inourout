<?php 

class merchandiseHelper {
	
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
		$this->dbshema= 'tbl';
	}
	function getUserMerchandise(){
		global $CONFIG;
		$sql =" 
		SELECT md.id,md.name,md.detail,md.image  FROM my_collectables mm
		LEFT JOIN collectables md ON md.id = mm.merchandiseid
		WHERE mm.userid = {$this->uid}
		AND md.n_status = 1
		GROUP BY mm.merchandiseid
		";
		$qData =  $this->apps->fetch($sql,1);
		if($qData)	{
			
			foreach($qData as $key => $val){
				
				$qData[$key]['imagepath'] = false;
				
				if(is_file("{$CONFIG['LOCAL_PUBLIC_ASSET']}merchandise/{$val['image']}"))  	$qData[$key]['imagepath'] = "merchandise";	
							
				//CHECK FILE SMALL
				if(is_file("{$CONFIG['LOCAL_PUBLIC_ASSET']}{$qData[$key]['imagepath']}/small_{$val['image']}")) $qData[$key]['image'] = "small_{$val['image']}";
				
				
				if($qData[$key]['imagepath']) $qData[$key]['image_full_path'] = $CONFIG['BASE_DOMAIN_PATH']."public_assets/".$qData[$key]['imagepath']."/".$qData[$key]['image'];
				else $qData[$key]['image_full_path'] = $CONFIG['BASE_DOMAIN_PATH']."public_assets/article/default.jpg";
				
			}
			
			return $qData;		
		}
		
		return false;
			
	}
	
	
	function getMerchandise(){
		global $CONFIG;
		
		$datetimes = date("Y-m-d");
		$sql =" SELECT * FROM collectables WHERE   stock > 0  AND n_status = 1 AND postdate<='{$datetimes}' AND enddates>='{$datetimes}'  ";
		// pr($sql);
		$qData =  $this->apps->fetch($sql,1);
		if($qData)	{
			
			foreach($qData as $key => $val){
					if($key%2) $queue = "even";
					else $queue = "odd";
					$qData[$key]['queue'] = $queue;
				$qData[$key]['collectibles'] = $this->apps->userHelper->getimagefullpath($val,'image','merchandise');					
			 
				
			}
			
			return $qData;		
		}
		
		return array();
					
	}
	
	function redeemMerchandise(){
	
		 
		$arrBadge = false;
		$arrBadgeValue = false;
		$arrBadgeSet = false;
		
		$result['result'] = false;
		$result['message'] = " not changed status ";
		
		// pr($this->apps->user);exit;
		$merchandiseid = intval($this->apps->_p("merchandiseid"));
		
		$badgeid = strip_tags($this->apps->_p("badgeid")); 			/* 3,1,2 */
		$badgeamount = strip_tags($this->apps->_p("badgeamount"));	/* 5,2,3 */
		
		$fullname= strip_tags($this->apps->_p("fullname")); 	
		$address= strip_tags($this->apps->_p("address")); 	
		$phonenumber= strip_tags($this->apps->_p("phonenumber")); 	
		$city= strip_tags($this->apps->_p("city")); 	
		$postalcode= strip_tags($this->apps->_p("postalcode")); 	
		
		$neededpoint = 0;
		$usergivenpoint = 0;
		
		// check user has redeem merchandise		 
		$userhasredeem = $this->checkredeem();
		if(!$userhasredeem['result']) { 
					$result['message']=' kamu sudah pernah me-redeem item lain nya ';
					return $result;  
		}
		//explode badge
		$arrBadge = explode(',',$badgeid);
		$arrBadgeAmount = explode(',',$badgeamount);
		
		if(!$arrBadge) {
				$result['message'] = "not badge to send ";
				return $result;
		}
		if(!$arrBadgeAmount) {
				$result['message'] = "not badge accumulation to send ";
				return $result;
		}
		if(count($arrBadge)!=count($arrBadgeAmount)) {
				$result['message'] = "badge accumulation  and badge not same to send ";
				return $result;
		} 
		// pr($arrBadge);
		// pr($arrBadgeAmount);
		$arrbadgesid = array();
		foreach($arrBadge as $key => $val){
			if($arrBadgeAmount[$key]!=0) $arrBadgeSet[$val] = $arrBadgeAmount[$key];
			if($arrBadgeAmount[$key]!=0) $arrbadgesid[$val] = $val;
		}
		if(!$arrBadgeSet) {
				$result['message'] = "badge not found to send ";
				return $result;
		}  
		if(!$arrbadgesid) {
				$result['message'] = "badge not found bro";
				return $result;
		}  
		$badgeid = implode(',',$arrbadgesid);
		// check user current badge / point
		$sql = " 
		SELECT mb.* ,COUNT(*) badgesamount ,bd.point realpointbadge , SUM(bd.point) badgepoint 
		FROM my_badges mb
		LEFT JOIN badges bd ON bd.id = mb.badgesid
		WHERE mb.userid = {$this->uid} 
		AND mb.n_status = 1 
		AND bd.n_status = 1 
		AND mb.badgesid IN ({$badgeid})
		GROUP BY mb.badgesid 
		 ";
		$qData = $this->apps->fetch($sql,1);
		// pr($sql);
	
		if(!$qData){
				$result['message'] = "badge not found on this user ";
				return $result;
		}  
		//check current badge
		
		if(count($qData)!=count($arrBadgeSet)){
				$result['message'] = "badge not founded and badge current not same on this user ";
				return $result;
		}  
		$can = false;
		$badgeuser = false;
		$userusingbadge = false;
		foreach($qData as $val){
			if(array_key_exists($val['badgesid'],$arrBadgeSet)){
				if($arrBadgeSet[$val['badgesid']]<=$val['badgesamount']) $can[] = true;
				else $can[] = false;
			}else $can[] = false;
			$badgeuser[$val['badgesid']] = $val['realpointbadge'];
			$userusingbadge[$val['badgesid']] = $val['badgesamount'];
		}
		if(!$badgeuser) {
				$result['message'] = "badge not found ";
				return $result;
		}
		if(!$userusingbadge) {
				$result['message'] = "badge not found ";
				return $result;
		}
		if(in_array(false,$can)) {
				$result['message'] = "your badge not enough : ".json_encode($can);
				return $result;
		}  
	 
		// check current merchandise needed point
		$sql ="SELECT * FROM collectables WHERE  id ={$merchandiseid} AND stock > 0  AND n_status = 1  LIMIT 1"; 
		$qData = $this->apps->fetch($sql);
		
		if(!$qData){
				$result['message'] = " stock collectables item kita sudah habis ";
				return $result;
		}  
		$merchandisename = $qData['name'];
		
		/* s: if using point comparison */
			// compare needed point and given point user
			$setBadgePoint = false;
			
			foreach($arrBadgeSet as  $badgesid => $val){
				$setBadgePoint[$badgesid] = $val*$badgeuser[$badgesid];
			}
			if(!$setBadgePoint){
					$result['message'] = "  set poin badge not found ";
					return $result;
			}  
			$usergivenpoint = array_sum($setBadgePoint);
			$neededpoint = intval($qData['point']);
			if($usergivenpoint==0||$neededpoint==0) {
					$result['message'] = " your point is zero : {$usergivenpoint} OR your merchandise point is zero : {$neededpoint} ";
					return $result;
			}  
				// pr($countpointusersend);
			if($neededpoint>$usergivenpoint) {
					$result['message'] = " your point not enough : {$usergivenpoint} OR your merchandise point not enough  : {$neededpoint} ";
					return $result;
			}  
		/* e: point comparison */	
		
		
		
		/* s: if use badge comparison for merchandis */
			/*
			
			$sql ="SELECT COUNT(*) badgeneed,badgesid FROM collectables_requirement_badge WHERE  merchandiseid ={$merchandiseid} AND n_status = 1 GROUP BY badgesid"; 
			
			$qBadgeNeeds = $this->apps->fetch($sql,1);
			if(!$qBadgeNeeds){
					$result['message'] = "  your merchandise needed badge not found ";
					return $result;
			} 
			$can = false;
			foreach($qBadgeNeeds as $val){
				if(array_key_exists($val['badgesid'],$arrBadgeSet)){
				if($arrBadgeSet[$val['badgesid']]>=$val['badgeneed']) $can[] = true;
				else $can[] = false;
			}else $can[] = false;
			
			}
			// pr($qBadgeNeeds);
			// pr($arrBadgeSet);
			
			if(in_array(false,$can)) {
				$result['message'] = "badge not fill requirement on matching merchandise needs : ".json_encode($can);
				return $result;
			}
			*/
		/* e: badge comparison */	
		
		//if fullfill
			// change status my badge to 4 : locked by collectables
			$countpointusersend = 0;
			$requirement = false;
			foreach($arrBadgeSet as $badgesid => $val){
				for($i=1;$i<=$val;$i++){
					
					if($countpointusersend>=$neededpoint) continue;
					else {
						$sql = " UPDATE my_badges SET n_status = 4 WHERE badgesid = {$badgesid} AND userid = {$this->uid} AND n_status = 1 LIMIT 1 ";
						// pr($sql);
						$arrUpdate[] = $sql;
						$qData = $this->apps->query($sql);
						$requirement[] = $qData;
					 }
					 
					 // $countpointusersend+=$badgeuser[$badgesid] ; /* do not use this if requirement from badge only */
					 // pr($countpointusersend);
				}
			}
			$this->logger->log(json_encode($arrUpdate));
			if($requirement==false){
				$result['message'] = "badge not fill requirement on matching merchandise needs : ".json_encode($arrBadgeSet);
				return $result;
			}
			if(!in_array(false,$requirement)) {				
				// if success change
					// give merchandise to my_merchandise
					
						
						$sql = " UPDATE collectables SET stock=stock-1 WHERE  id ={$merchandiseid}  AND n_status = 1 LIMIT 1 ";
						// pr($sql);
						 
						$qData = $this->apps->query($sql);

						if($qData){
							$sql = " INSERT INTO my_collectables  
							(merchandiseid,userid,redeemdate,date_redeemed,name,address,phonenumber,email,city,postalcode) 
							VALUES  
							({$merchandiseid},{$this->uid},NOW(),NOW(),\"{$fullname}\",\"{$address}\",\"{$phonenumber}\",\"{$this->apps->user->email}\",\"{$city}\",\"{$postalcode}\")  ";
							$qData = $this->apps->query($sql);
							
							$result['message'] = " SUCCESS REDEEM.. enough badge : {$usergivenpoint} OR your merchandise point enough  : {$neededpoint} ";
							$result['result'] = true;
						  
							return $result;
						}else {
							$result['message'] = " stock collectables item kita sudah habis ";
							return $result;
						}
			}else{
				$result['message'] = " not enough requirement data badge, your point not enough : {$usergivenpoint} OR your merchandise point not enough  : {$neededpoint} ";
				return $result;
			}  
		
 
		 
			$result['message'] = " You Dont Have Right to use this method ";
			return $result;
	}
	
	function redeemList(){
		global $CONFIG;
		$start = intval($this->apps->_p("start"));
		$limit = intval($this->apps->_p("limit"));
		$fromdate = strip_tags($this->apps->_p("fromdate"));
		$todate = strip_tags($this->apps->_p("todate"));
		$sorter = strip_tags($this->apps->_p("sorter"));
		$search = strip_tags($this->apps->_p("search"));
		$sorter_type = intval($this->apps->_p("sorter_type"));
		$rdmtype = intval($this->apps->_p("rdmtype"));
		$sorter_sql = "mm.redeemdate DESC";

		if($search){
			$search_sql="AND (mm.name LIKE '%{$search}%' OR mm.email LIKE '%{$search}%' OR tmd.name LIKE '%{$search}%')";
		}

		if($fromdate!=''&&$todate!=''){
			$fromdate = date('Y-m-d',strtotime($fromdate));
			$todate = date('Y-m-d',strtotime($todate));
			$filterDate = "AND mm.redeemdate BETWEEN '{$fromdate} 00:00:00' AND '{$todate} 23:59:59'";
		}

		//Sorter
		if($sorter){
			if($sorter_type>0) $sorter_text = 'ASC';
			else $sorter_text = 'DESC';
			$sorter_sql = "{$sorter} {$sorter_text}";
		}

		$sql="SELECT mm.id,mm.name, mm.redeemdate, mm.email, mm.n_status,
				tmd.name AS badge_name, tmd.image AS badge_image
				FROM my_merchandise mm
				INNER JOIN tbl_merchandise_detail tmd
				ON mm.merchandiseid = tmd.id
				WHERE mm.n_status = {$rdmtype} {$filterDate} {$search_sql}
				ORDER BY {$sorter_sql} LIMIT {$start},{$limit}";
		//var_dump($sql);
		$rs = $this->apps->fetch($sql,1);

		$sql="SELECT COUNT(mm.id) AS total
				FROM my_merchandise mm
				INNER JOIN tbl_merchandise_detail tmd
				ON mm.merchandiseid = tmd.id
				WHERE mm.n_status = {$rdmtype} {$filterDate} {$search_sql}";
		//var_dump($rs);exit;
		$rs_total = $this->apps->fetch($sql);

		if($rs) return array('data'=>$rs,'total'=>$rs_total['total']);
		else return false;
	}
	function redeemListDownload(){
		global $CONFIG;

		$sql="SELECT mm.id,mm.name, mm.redeemdate, mm.email, mm.n_status,
				tmd.name AS badge_name, tmd.image AS badge_image
				FROM my_merchandise mm
				INNER JOIN tbl_merchandise_detail tmd
				ON mm.merchandiseid = tmd.id
				WHERE mm.n_status IN (1,0)
				ORDER BY mm.redeemdate DESC";
		//var_dump($sql);exit;
		$rs = $this->apps->fetch($sql,1);

		return $rs;
	}
	function redeemVerify($id=null){
		global $CONFIG;

		$sql = "UPDATE my_merchandise SET n_status = 1 WHERE id={$id}";
		if($this->apps->query($sql)) return true;
		else return false;
	}
	
	function checkredeem(){
		$data['result']  = true;
		$data['message'] ='kamu bisa redeem';
					 
		// check user has redeem merchandise
		$sql =" SELECT COUNT(1) total FROM `my_collectables` WHERE  userid = {$this->uid} LIMIT 1 ";
			 
		$userhasredeem = $this->apps->fetch($sql);
		if($userhasredeem) {
				if($userhasredeem['total']>0){	
					$data['result']  = false;
					$data['message']='kamu sudah pernah me-redeem item lain nya';
					return $data;
				}
		} 
		
		return $data;
	}
}
?>
