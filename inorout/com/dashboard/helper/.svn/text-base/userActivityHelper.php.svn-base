<?php

class userActivityHelper {

	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);

		$this->dbshema = "marlborohunt";	
		
		$this->startdate = $this->apps->_g('startdate');
		$this->enddate = $this->apps->_g('enddate');	
		if($this->enddate=='') $this->enddate = date('Y-m-d');		
		if($this->startdate=='') $this->startdate = date('Y-m-d' ,  strtotime( '-7 day' ,strtotime($this->enddate)) );
		
	}

	function hackDateGapofDailyChart($results,$customLimit,$from,$to,$arrLabel){
			if($from==null&&$to==null){
				$customLimit = true;
			}
			//To make data start and/or end from the date that was given
			$n_size = sizeof($results);
			
			//To fix the gap between date
			$n_size = sizeof($results); //recalculate n_size
			$start_over = 0;
			if($n_size>0){
				foreach($results as $n=>$rs){		
					$results[$n]['ts'] = strtotime($rs['date_d']);
				}
				$results = subval_sort($results, 'ts');
				//pr($results);exit;
				for($i=0;$i<$n_size;$i++){
					$rs = $results[$i];
					if($i>0){						
						$curr_ts = strtotime($rs['date_d']);
						$last_ts = strtotime($results[$i-1]['date_d']);
						$diff_ts = $curr_ts - $last_ts;
						if($diff_ts>(60*60*24)){				
							$n_days = ceil($diff_ts/(60*60*24));
							
							while($n_days>1){
								$hasil[$start_over]['date_d'] = date("Y-m-d",$curr_ts-(($n_days-1)*60*60*24));
								foreach($arrLabel as $l){
									$hasil[$start_over][$l]=0;
								}
								$start_over++;
								$n_days--;
							}				
						}
					}
					
					$hasil[$start_over]['date_d'] = $rs['date_d'];
					foreach($arrLabel as $l){
						$hasil[$start_over][$l]=(($rs[$l]>0)?$rs[$l]:0);
					}
					$start_over++;
				}
			}

			return $hasil;
	}

	function getTop10Participant(){
		global $CONFIG;
		
		$sql="SELECT COUNT(1) AS total_activities,IF(sm.image_profile = '', sm.img, sm.image_profile) AS img_profile, sm.name
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_badges tur
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.social_member sm
				ON sm.id = tur.userid
				WHERE 1
				GROUP BY tur.userid
				ORDER BY total_activities DESC LIMIT 10";
		$rs = $this->apps->fetch($sql,1);

		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getDemographicData($type='age'){
		global $CONFIG;
		$type_select = $type;
		$group='';
		if($type=='brand_preference'){
			$type_select='brand_preference AS brand_id, COUNT(brand_preference) AS total';
		}else if($type=='verified'){
			$type_select = "IF(verified='1',COUNT(1),0) AS verified, 
							IF(verified='0',COUNT(1),0) AS unverified";
			$group = "GROUP BY register_date";
		}

		$sql="SELECT {$type_select}, register_date AS date_d
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_demographic
				WHERE n_status=1
				{$group}
				ORDER BY register_date DESC";
		$rs = $this->apps->fetch($sql,1);

		if($type=='age'){
			$ageRange = array('17-24'=>0,'25-29'=>0,'30-40'=>0,'40+'=>0);
			$totalUser = sizeof($rs);
			$color = array('#8a898c','#a0a0a1','#bdbcbd','#d0cfd2');
			foreach ($rs as $key => $value) {
				$age = intval($value['age']);
				if($age>=17&&$age<=24) $ageRange['17-24'] = $ageRange['17-24']+1;
				if($age>=25&&$age<=29) $ageRange['25-29'] = $ageRange['25-29']+1;
				if($age>=30&&$age<=40) $ageRange['30-40'] = $ageRange['30-40']+1;
				if($age>40) $ageRange['40+'] = $ageRange['40+']+1;
			}
			arsort($ageRange); //desc of value
			$idx=0;
			foreach ($ageRange as $key => $value) {
				$colors[$key] = $color[$idx];
				$idx++;
			}
			ksort($ageRange);
			foreach ($ageRange as $key => $value) {
				$percentage = round(((intval($value)/$totalUser)*100),2);
				$result[] = array('label'=>$key,
									'value'=>$percentage,
									'real_value'=> $value,
									'color'=>$colors[$key]
									);
				$idx++;
			}
			$title='AGE';
		}else if($type=='gender'){
			$ageRange = array('Man'=>0,'Woman'=>0);
			$totalUser = sizeof($rs);
			$color = array('#8a898c','#a0a0a1','#bdbcbd','#d0cfd2');
			foreach ($rs as $key => $value) {
				//$age = intval($value['age']);
				switch ($value['gender']) {
					case 'M':
						$ageRange['Man'] = $ageRange['Man']+1;
						break;
					case 'F':
						$ageRange['Woman'] = $ageRange['Woman']+1;
						break;
					
					default:
						$ageRange['Man'] = $ageRange['Man']+1;
						break;
				}
			}
			arsort($ageRange); //desc of value
			$idx=0;
			foreach ($ageRange as $key => $value) {
				$colors[$key] = $color[$idx];
				$idx++;
			}
			ksort($ageRange);
			foreach ($ageRange as $key => $value) {
				$percentage = round(((intval($value)/$totalUser)*100),2);
				$result[] = array('label'=>$key,
									'value'=>$percentage,
									'real_value'=> $value,
									'color'=>$colors[$key]
									);
				$idx++;
			}
			$title='GENDER';
		}else if($type=='channel'){
			$result['categories'] = array('Online','Offline');
			$result['data']=array(0,0);
			foreach ($rs as $key => $value) {
				if(intval($value['channel'])==1){
					$result['data'][0]=intval($result['data'][0])+1;
				}else{
					$result['data'][1]=intval($result['data'][1])+1;
				}
			}
			
			$result['title']='Channel';
			$title='CHANNEL';
		}else if($type=='city'){
			$str_cityid = '';
			$res=array();
			$rw=array();
			foreach ($rs as $key => $value) {
				$cityid = intval($value['city']);
				if(!array_key_exists($cityid, $res)){
					if($key!=0) $str_cityid.=',';
					$str_cityid.=$cityid;					
				}

				if(array_key_exists($cityid, $res)) $res[$cityid] = intval($res[$cityid])+1;
				else $res[$cityid] = 1;
				
			}

			$sql = "SELECT id,city
					FROM {$CONFIG['DATABASE_WEB']}.city_references
					WHERE id IN ({$str_cityid})";
			$rs = $this->apps->fetch($sql,1);
			foreach ($rs as $key => $value) {
				$rw[$value['id']]=$value['city'];
			}
			foreach ($res as $key => $value) {
				$result['categories'][]=strtoupper($rw[$key]);
				$result['data'][]=$value;
			}
			$result['title']='Total';
			$title='DEMOGRAPHIC DATA (City)';

		}else if($type=='brand_preference'){
			$str_brandid = '';
			$res=array();
			$rw=array();
			foreach ($rs as $key => $value) {
				if($key!=0) $str_brandid.=',';
				$str_brandid.=$value['brand_id'];					
				$res[$value['brand_id']] = intval($value['total']);		
			}
			$sql = "SELECT code,brand_name
					FROM {$CONFIG['DATABASE_REPORTS']}.tbl_brand_preferences_references
					WHERE code IN ({$str_brandid})
					GROUP BY code";
			$rs = $this->apps->fetch($sql,1);
			
			foreach ($rs as $key => $value) {
				$rw[$value['code']]=$value['brand_name'];
			}
			foreach ($res as $key => $value) {
				$result['categories'][]=strtoupper($rw[$key]);
				$result['data'][]=$value;
			}
			$result['title']='Total';
			$title=' DEMOGRAPHIC DATA (Brand Preference)';

		}else if($type='verified'){
			
			$verified_status = array('Verified'=>0,'Unverified'=>0);
			$verified_data = array();
			foreach ($rs as $key => $value) {

				$verified_status['Verified'] =  $verified_status['Verified'] + $value['verified'];
				$verified_status['Unverified'] =  $verified_status['Unverified'] + $value['unverified'];
				$rs[$key]['total'] = $value['verified']+$value['unverified'];		
			}
			array_reverse($rs);
			$data = $this->hackDateGapofDailyChart($rs,false,null,null,array('total'));
			$res = array();
			$res_utc = array();
			foreach ($data as $key => $value) {
				$res['categories'][] = $value['date_d'];
				$res['data'][] = intval($value['total']);
				$res_utc[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['total']));
			}
			$res['data_title']='Total';
			$result['daily'] = $res_utc;
			$result['total'] = $verified_status;
			$title=' DEMOGRAPHIC DATA';

		}

		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$result,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getLoginHistory(){
		global $CONFIG;

		$sql = "SELECT  tul.userid,
						COUNT(tul.id) AS unique_login_per_days , 
						SUM(tul.total) AS total_login,
						SUM(tul.spenttimes) AS average_visit_duration
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_login tul
				WHERE tul.n_status=1
				GROUP BY tul.userid
				ORDER BY total_login DESC";

		$rs=$this->apps->fetch($sql,1);


		foreach ($rs as $key => $value) {
			//get name
			$sql = "SELECT name FROM {$CONFIG['DATABASE_WEB']}.social_member
					WHERE id = {$value['userid']} LIMIT 1";
			$name = $this->apps->fetch($sql);
			$rs[$key]['user_name'] = $name['name'];

			//get first_login and last_login
			$sql = "SELECT MAX(date_time) AS last_login,MIN(date_time) AS first_login
					FROM {$CONFIG['DATABASE_LOGS']}.tbl_activity_log
					WHERE user_id = {$value['userid']} LIMIT 1";
			$time = $this->apps->fetch($sql);
			$rs[$key]['last_login'] = $time['last_login'];
			$rs[$key]['first_login'] = $time['first_login'];
		}

		$title = "LOGIN HISTORY PER USER";
		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getTotalAspiration(){
		global $CONFIG;

		$sql = "SELECT COUNT(1) AS total
				FROM {$CONFIG['DATABASE_WEB']}.my_aspiration
				WHERE 1 LIMIT 1";
		$rs = $this->apps->fetch($sql);

		$title = "TOTAL SUBMITTED ASPIRATION";
		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getTopUserPoint($top=20){
		global $CONFIG;

		$sql = "SELECT sm.name, mb.userid, SUM(b.point) AS total_point
				FROM {$CONFIG['DATABASE_WEB']}.my_badges mb
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.badges b
				ON b.id = mb.badgesid
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.social_member sm
				ON sm.id = mb.userid
				WHERE mb.n_status = 1
				GROUP BY mb.userid
				ORDER BY total_point DESC LIMIT {$top}";
		$rs = $this->apps->fetch($sql,1);

		$title = "TOP 20 USER Based total point";
		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}
	function getTopUserTime($top=20){
		global $CONFIG;

		$sql = "SELECT tul.userid, sm.name, SUM(tul.spenttimes) AS total_time
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_login tul
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.social_member sm
				ON sm.id = tul.userid
				ORDER BY total_time DESC LIMIT {$top}";
		$rs = $this->apps->fetch($sql,1);

		$title = "TOP 20 Active User Based On Timespent";
		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}
	function getDailyTotalUserLogin(){
		global $CONFIG;

		$sql = "SELECT dates AS date_d,COUNT(1) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_login
				WHERE n_status = 1
				GROUP BY dates
				ORDER BY dates DESC";
		$rs = $this->apps->fetch($sql,1);
		array_reverse($rs);

		$data = $this->hackDateGapofDailyChart($rs,false,null,null,array('total'));
			
		$res = array();
		foreach ($data as $key => $value) {
			$res['categories'][] = $value['date_d'];
			$res['data'][] = intval($value['total']);
		}
		$res['title'] = 'Total';
		$title = "TOTAL USER LOGIN";
		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$res,'title'=>$title);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}
}

?>