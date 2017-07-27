<?php 


class badgesHelper {
	var $uid;
	function __construct($apps){
		global $logger,$CONFIG,$LOCALE;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
		$this->config = $CONFIG;
		$this->locale = $LOCALE;
	}
	
	function masterbBadges(){
		 
		$sql="SELECT * 
				FROM {$this->config['DATABASE_WEB']}.badges
				WHERE n_status =1  ORDER BY id ASC ";
		$rs=$this->apps->fetch($sql,1);
		$badges = false;
		if($rs){
			foreach($rs as $val){
				$badges[$val['id']] = $val;
			}
		}
		return $badges;
	}
	
	function myCurrentBadges($profile=null){
		$uid = intval($this->apps->_g('uid'));
		if(!$uid) $uid = intval($this->uid);
		$sql="SELECT *,COUNT(*) total 
				FROM {$this->config['DATABASE_WEB']}.my_badges
				WHERE n_status = 1 AND userid={$uid} GROUP BY badgesid ORDER BY id ASC ";
				
		$rs=$this->apps->fetch($sql,1);
		$badges = false;
		if($rs){
			foreach($rs as $val){
				$badges[$val['badgesid']] = $val;
			}		
		}
		$mBadges = $this->masterbBadges();
		if($mBadges){
 
			foreach($mBadges as $key => $val){
				$mBadges[$key]['total'] = 0; 
				if($badges) {
					if(array_key_exists($key,$badges)) $mBadges[$key]['total'] = $badges[$key]['total'];
				}				
			}
			
		}

		//pr($profile);
		
		if($profile==1){
			$new_mBadges=array();
			$rearrange = array(2,5,6,8,3,7,4,11,1,12,10,9);
			foreach ($rearrange as $key => $value) {
				$new_mBadges[] = $mBadges[$value];
			}
		}else{
			$new_mBadges= $mBadges;
		}
		//pr($new_mBadges);
		return $new_mBadges;
		
	}

	function myCurrentBadgePoints(){
		$uid = intval($this->apps->_g('uid'));
		if(!$uid) $uid = intval($this->uid);
		$sql="SELECT SUM(b.point) total 
				FROM {$this->config['DATABASE_WEB']}.badges b
				LEFT JOIN {$this->config['DATABASE_WEB']}.my_badges mb
				ON mb.badgesid = b.id
				WHERE userid = {$uid} AND mb.n_status = 1";
				
		$rs=$this->apps->fetch($sql);
		//pr($sql);exit;
		return $rs;
	}
	
	
	
	function inputCode($code=false,$source=false){
		
		$data['images'] ="";
		$data['message'] = $this->locale[1]['badge_code_invalid'];
		$data['code'] =0;
		$data['badgesnames'] = "";
		$data['badgesdesc'] = "";
		$data['result'] =false;
		
		if(!$code)$code = strip_tags($this->apps->_p('code'));
		if(!$source)$source = strip_tags($this->apps->_p('source'));
		$getMasterCode = $this->masterbBadges();
	 
		$iscommonbadges = 0;
		if(!$code){
				$data['message'] = $this->locale[1]['mandatory_fill_code'];
				$data['code'] =10;
				return $data;
		}
		
		//check source type
		$sql = "SELECT * FROM {$this->config['DATABASE_WEB']}.badges_source_type WHERE name = '{$source}' and n_status = '1'  LIMIT 1";
		// var_dump($sql);exit;
		$qSource = $this->apps->fetch($sql);
		if(!$qSource){
				$data['message'] = $this->locale[1]['badge_source_type_invalid'];
				$data['code'] =10;
				return $data;
		}
		
		$sourceType = intval($qSource['id']);
		if($sourceType<=0){
				$data['message'] = $this->locale[1]['badge_code_invalid'];
				$data['code'] =11;
				return $data;
		}
		$sql = "SELECT * FROM {$this->config['DATABASE_WEB']}.badges_code WHERE code = '{$code}' and n_status = '1'  LIMIT 1";
		 
		$res = $this->apps->fetch($sql);
	 
		if ($res){
			
			if($res['code_reused']==0) {
				//check code in used
				$sql = "SELECT count(id)total,userid FROM  {$this->config['DATABASE_WEB']}.my_badges WHERE codeid = {$res['id']} LIMIT 1";
				$result = $this->apps->fetch($sql);	
				if($result){
					if( $result['total']>=1 ) {
						if($result['userid']==$this->uid) $data['message'] ="Maaf, kode yang kamu masukkan sudah tersubmit sebelumnya.";
						else $data['message'] ="Maaf, kode yang kamu masukkan sudah tersubmit sebelumnya.  ";
						return $data;
					}
				}
			}
			
			if(!in_array($res['code_channel'],array('online','offline'))){
				
				$data['message'] = $this->locale[1]['badge_code_invalid'] ;
				$data['code'] =11;
				return $data;
			
			}
			 $badgeid = false;
			
			//check code special condition code
			$codespecial = false;
			
			if($res['code_type']==2){
				$sql = " SELECT COUNT(1) total,badgesid FROM `badges_special_condition` WHERE channelid = '{$res['code_sub_channel']}' AND n_status = 1 LIMIT 1 ";
				$codespecial = $this->apps->fetch($sql);
				$this->logger->log($sql);
				$this->logger->log(json_encode($codespecial));
			}
		 
			if($codespecial)if($codespecial['total']) $randcodeidmekans = $codespecial['badgesid'];
			if(!$randcodeidmekans) $randcodeidmekans = $this->randomcodegen($getMasterCode,$res['code_type']);
			
			if(!$randcodeidmekans){
				$data['message'] = $this->locale[1]['badge_not_found'];
				$data['code'] =2;
				return $data;
			}else	$badgeid=$randcodeidmekans;
			
			if(!$badgeid) {
				$data['message'] = $this->locale[1]['badge_not_found'];
				$data['code'] =2;
				return $data;
			}
			
			// check user have this code
			$sql = "SELECT id FROM  {$this->config['DATABASE_WEB']}.my_badges WHERE userid = {$this->uid} AND codeid = {$res['id']} LIMIT 1";
			$result = $this->apps->fetch($sql);
		 
			if ($result){
				// yes i have
				$data['message'] ="Maaf, kode yang kamu masukkan sudah tersubmit sebelumnya.";
				return $data;
			}else{
				
				$dateTime = date('Y-m-d H:i:s');
				 
				$sql = "INSERT INTO {$this->config['DATABASE_WEB']}.my_badges (userid, badgesid,codeid, n_status ,redeem_date,sourceType)
						VALUES ({$this->uid}, {$badgeid},  {$res['id']},  1 ,'{$dateTime}','{$sourceType}')";
				
				$this->apps->query($sql);
			  
				
				if($this->apps->getLastInsertId()>0){
						
						$data['images'] = $getMasterCode[$badgeid]['image'];
						// $data['message'] = "the {$getMasterCode[$badgeid]['name_display']} badge ";
						$data['message'] = " {$getMasterCode[$badgeid]['name_display']}  ";
						//$data['message'] = "you get {$getMasterCode[$badgeid]['name']} badges ";
						$data['code'] =1;
						$tooltips = $this->randomtooltips();
						
						$data['messagetooltips'] = $tooltips['content'];
						$data['messagetooltips_link'] = $basedomain.$tooltips['link'];
						
						$data['badgesnames'] =$getMasterCode[$badgeid]['name'];
						$data['badgesdesc'] =$getMasterCode[$badgeid]['desc'];
						$data['result'] =true;
						
						$this->savetohistory($this->uid,$badgeid,$res['id']);
						
						return $data;
					 
				}
				$data['message'] = $this->locale[1]['badge_code_already_used'];
				
				return $data;
			}
		}
		 
		return $data;
	}
	
	function savetohistory($userid=0,$badgeid=0,$codeid=0){
	
		if($userid==0) return false;
		if($badgeid==0) return false;
		if($codeid==0) return false;
		$dateTime = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO {$this->config['DATABASE_WEB']}.badges_history (userid, badgesid,codeid, n_status ,redeem_date)
				VALUES ({$userid}, {$badgeid},  {$codeid},  1 ,'{$dateTime}')";
	 
		$this->apps->query($sql);
	}
	
	function randomcodegen($getMasterCode = false,$type=0){
			 
			$randbadge = false;
			// pr($getMasterCode);
			if($getMasterCode){
				foreach ($getMasterCode as $key => $value){
					 
						if($value['type']==$type){
							$popprob = ($value['prob'] * ($value['prob'] * (rand(1,12))));
							$randbadge[$value['id']] = $popprob;
						}
					 
				}
			 
				if($randbadge){
					$maxBadge = max($randbadge);
					// pr($maxBadge);
					// pr($randbadge); 
					 
					if(!$maxBadge) return false;
					$badgeid = array_search($maxBadge, $randbadge);
			
					return $badgeid;
				}
			}
			return false;
	}
	
	function offlinebadges($subchannel=false,$line='offline'){
		
	
		$data['message'] = $this->locale[1]['redeem_badge_privilage'];
		$data['code'] =0;
		$data['result'] =false;
		if(!$subchannel){
					
				$data['message'] = $this->locale[1]['redeem_badge_cannel_not_found'];
				$data['code'] =6;
				return $data;
		}
			
		$givebadges = false;
		// check user has this bagdes this days
			$checkuser = $this->checkuserhasofflinebadges($line,$subchannel);
			if(!$checkuser) {
					
				$data['message'] = $this->locale[1]['user_already_redeem_this_badge'];
				$data['code'] =2;
				return $data;
			}
			
			// check existing code
			$checkcode = $this->checkexisitingcode($line,$subchannel);
			if($checkcode){
			//if found insert to my badges
				// give badges status true
				$datacode = $checkcode;
				$givebadges = true;
			}else{
			//else
				// generate badges for this user
				$datacode = $this->generateCode($line,$subchannel);
				//give badges status true
				if($datacode){
					if($datacode['result']){
						$givebadges = true;
					}else{
						$data['message'] = $datacode['message'];
						$data['code'] =5;
						return $data;
					}
				}else{
					$data['message'] = $this->locale[1]['redeem_code_failed'];
					$data['code'] =4;
					return $data;
				}
			}
			if($givebadges){
				// give user badges 
				$inputthecodetouser = $this->inputCode($datacode['code'],"{$datacode['channel']} {$datacode['subchannel']}");
					
				if($inputthecodetouser['result']){
					$data['data'] = $inputthecodetouser;
					$data['message'] = $this->locale[1]['redeem_success'];
					$data['code'] =1;
					$data['result'] =true;
					
					return $data;
				}else{
					$data['message'] = $inputthecodetouser['message'];
					$data['code'] =9;
					return $data;
				}
				
			}else {
					 
				return $data;
			}
	}
	
	function checkuserhasofflinebadges($channel=false,$subchannel=false){
		if(!$channel||!$subchannel) return false;
		$datetimes = date("Y-m-d");
		$sql ="
			SELECT COUNT(*) total 
			FROM my_badges b
			LEFT JOIN badges_source_type t ON t.id = b.sourceType
			WHERE 
			userid={$this->uid}  
			AND t.name = '{$channel} {$subchannel}' AND DATE(redeem_date) = '{$datetimes}' 
			LIMIT 1";
		
		$this->logger->log($sql);
		$qData = $this->apps->fetch($sql);
		if(!$qData) return false;
		if(!array_key_exists('total',$qData)) return false;
		if($qData['total']>0)return false;
		return true;
		 
	
	}
	
	
	function checkexisitingcode($channel=false,$subchannel=false){
		if(!$channel||!$subchannel) return false;
		$sql ="
			SELECT id,code,code_channel channel,code_sub_channel subchannel
			FROM badges_code 			 
			WHERE 
			code_sub_channel= '{$subchannel}'
			AND code_channel= '{$channel}' 
			AND n_status = 1
			LIMIT 1";
		
		$this->logger->log($sql);
		$qData = $this->apps->fetch($sql);
		if(!$qData) return false;
		if(!array_key_exists('total',$qData)) return false;
		if($qData['id']<=0)return false;
		return $qData;
		 
	
	}
	
	function generateCode($channel=false,$subchannel=false){
		
		 
		$data['message'] = $this->locale[1]['badge_code_invalid'];
		$data['code'] =0;
		$data['result'] =false;
		if(!$channel||!$subchannel) return false;
		// $channel = "digital banner";
		// $subchannel = 'TEST SUBJECT CODES';
		$posteddate = date('Y-m-d H:i:s');
		$expireddate =date('Y-m-d H:i:s');
		$loop = 1;
		
		$iscommonbadges=0;
		$datetime = date("Y-m-d H:i:s");
		$getres = false;		
		
	 
		 
			$letters  = "ABCDEFGHJKMNPQRSTUVWXYZ23456789";
			$maskcode = substr(str_shuffle($letters), 0, $this->config['codedigit']);
			

			$sql = "INSERT INTO {$this->config['DATABASE_WEB']}.badges_code 
					(code, code_type, code_sub_channel, code_channel, created_date,  n_status,code_reused)
					VALUES 
					('{$maskcode}', {$iscommonbadges}, '{$subchannel}', '{$channel}',   '{$datetime}', 1,1 )";
			// pr($sql);
			 
			 $this->apps->query($sql);
			 $theid =$this->apps->getLastInsertId();
			if($theid){
				$getres[$maskcode] = 1;
			}else $getres[$maskcode] = 0;
			
	
	 
		
		if($getres){
			$success = 0;
			$failed = 0;
			foreach($getres as $key => $val){
				if($val==1) $success++;
				else $failed++;			
			}
				
			$data['message'] = " success : {$success} , failed ; {$failed} ";
			$data['code'] =$maskcode;
			$data['result'] =true;
			$data['id'] =$theid;
			$data['channel'] =$channel;
			$data['subchannel'] =$subchannel;
			return $data;
		}
		
				
		return $data;
		
	}
	
	function checkrightsuseroffline(){
		
		$data = array('no data');
		$datetimes =date("Y-m-d");
		$sql="
		SELECT sm.id,e.event
		FROM offline_engagement e
		LEFT JOIN social_member sm ON sm.email=e.email
		WHERE e.n_status = 1 AND DATE(created_date) = '{$datetimes}'
		";
		// pr($sql);
		
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return $data;
		 
		foreach($qData as $val){
			if($val['id']){
				$this->uid = $val['id'];
			
				$offlinebadges  = $this->offlinebadges($val['event']);
				$data[$val['id']][]  = $offlinebadges;
				sleep(1);
				if($offlinebadges['result']){
					$nama_game = "";
					switch ($val['event']) {
						case 'GAMES 1':
							$nama_game = "Face Maker";
							break;
						case 'GAMES 3':
							$nama_game = "Find What Missing";
							break;
						case 'GAMES 4':
							$nama_game = "Find What Missing";
							break;
						
						default:
							$nama_game = "Testing Game";
							break;
					}

					$this->apps->notificationHelper->notif_log(20,0,$val['id'],serialize(array('#~badge'=>$offlinebadges['data']['message'],'#~game'=>$nama_game)));
				}
			}
		}
		//give back user id of current user
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
		return $data;
		
	}
	
	
	/* global function to user distribute user event badges on online event */
	function giveuserbadges($event='not available',$howmany=1){ 
	
		$data = $this->ONlinebadges($event,'online',$howmany);		 
		return $data;
	
	}
		
	function ONlinebadges($subchannel=false,$line='online',$howmany=1){
		
	
		$data['message'] = $this->locale[1]['redeem_badge_privilage'];
		$data['code'] =0;
		$data['result'] =false;
		if(!$subchannel){
					
				$data['message'] = $this->locale[1]['redeem_badge_cannel_not_found'];
				$data['code'] =6;
				return $data;
		}
			
		$givebadges = false;
		// check user has this bagdes
			$checkuser = $this->checkuserhasthisbadges($line,$subchannel,$howmany);
			if(!$checkuser) {
					
				$data['message'] = $this->locale[1]['user_already_redeem_this_badge'];
				$data['code'] =2;
				return $data;
			}
			
			// check existing code
			$checkcode = $this->checkexisitingcode($line,$subchannel);
			if($checkcode){
			//if found insert to my badges
				// give badges status true
				$datacode = $checkcode;
				$givebadges = true;
			}else{
			//else
				// generate badges for this user
				$datacode = $this->generateCode($line,$subchannel);
				//give badges status true
				if($datacode){
					if($datacode['result']){
						$givebadges = true;
					}else{
						$data['message'] = $datacode['message'];
						$data['code'] =5;
						return $data;
					}
				}else{
					$data['message'] = $this->locale[1]['redeem_code_failed'];
					$data['code'] =4;
					return $data;
				}
			}
			if($givebadges){
				// give user badges 
				$inputthecodetouser = $this->inputCode($datacode['code'],"{$datacode['channel']} {$datacode['subchannel']}");
					
				if($inputthecodetouser['result']){
					$data['message'] = $this->locale[1]['redeem_success'];
					$data['code'] =1;
					$data['result'] =true;
					
					return $data;
				}else{
					$data['message'] = $inputthecodetouser['message'];
					$data['code'] =9;
					return $data;
				}
				
			}else {
					 
				return $data;
			}
	}
	
	
	function checkuserhasthisbadges($channel=false,$subchannel=false,$howmany=1){
	// pr('masuk');
		if(!$channel||!$subchannel) return false;
		
		$sql ="
			SELECT COUNT(*) total 
			FROM my_badges b
			LEFT JOIN badges_source_type t ON t.id = b.sourceType
			WHERE 
			userid={$this->uid}  
			AND t.name = '{$channel} {$subchannel}' 
			LIMIT {$howmany}";
		// pr($sql);
		$this->logger->log($sql);
		$qData = $this->apps->fetch($sql);
		if(!$qData) return false;
		if(!array_key_exists('total',$qData)) return false;
		if($qData['total']>=$howmany)return false;
		return true;
		 
	
	}
	function randomtooltips($datarandom=array('1','2','3','4','6','7','8')){
		 
		$random = array_rand($datarandom, 1);
		
		if($random == 1)
		{
			$sql="SELECT COUNT(*) total  
				FROM {$this->config['DATABASE_WEB']}.my_badges
				WHERE userid ='$this->uid' and badgesid='11'   ";
			$rs=$this->apps->fetch($sql);
			
				$sql="SELECT * 
				FROM {$this->config['DATABASE_WEB']}.badges_tooltips
				WHERE id='1' ";
				$rs=$this->apps->fetch($sql);
				
				return $rs;
			
		}
		else if($random == 2)
		{
			$sql="SELECT COUNT(*) total  
				FROM {$this->config['DATABASE_WEB']}.my_collectables
				WHERE userid ='$this->uid' ";
			$rs=$this->apps->fetch($sql);
			
				$sql="SELECT *  
				FROM {$this->config['DATABASE_WEB']}.badges_tooltips
				WHERE id='2' ";
				$rs=$this->apps->fetch($sql);
				
				return $rs;
			
		
		}
		else if($random == 3)
		{
			$sql="SELECT COUNT(*) total  
				FROM {$this->config['DATABASE_WEB']}.my_auctions
				WHERE userid ='$this->uid' ";
			$rs=$this->apps->fetch($sql);
			
				$sql="SELECT *  
				FROM {$this->config['DATABASE_WEB']}.badges_tooltips
				WHERE id='3' ";
				$rs=$this->apps->fetch($sql);
				
				return $rs;
			
		}
		else if($random == 4)
		{
			$sql="SELECT COUNT(*) total  
				FROM {$this->config['DATABASE_WEB']}.my_badges
				WHERE userid ='$this->uid' and n_status='3'   ";
			$rs=$this->apps->fetch($sql);
			
				$sql="SELECT *  
				FROM {$this->config['DATABASE_WEB']}.badges_tooltips
				WHERE id='4' ";
				$rs=$this->apps->fetch($sql);
				
				return $rs;
			
		}
		else
		{
				$sql="SELECT *  
				FROM {$this->config['DATABASE_WEB']}.badges_tooltips
				WHERE id='{$random}' ";
				$rs=$this->apps->fetch($sql);
				
				return $rs;
		
		}
	}
	 
}
?>