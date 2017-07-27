<?php
class activityReportHelper{
		
	var $userID = null;
		
	function __construct($apps){
		$this->apps = $apps;		
	}
	
	function log($param=NULL,$id=NULL,$expLog=FALSE){
		global $CONFIG;
		$user = $this->apps->getUserOnline();
		if($user) $this->userID = $user->id;
		else $this->userID = 0;
	
		// if($this->userID==null) return false;
		$datenow = strtotime(date('Y-m-d H:i:s'));
		$dateNumNow = date('Y-m-d H:i:s');
		
		if($param!=NULL){
			$actionID=0;
			$userID = $this->userID;
			$actionValue = NULL;
			
			$sql ="SELECT id,point FROM {$CONFIG['DATABASE_LOGS']}.tbl_activity_actions WHERE activityName = '{$param}' ";
			
			
			$qData = $this->apps->fetch($sql);

									
			
			if($qData) 	$actionID = $qData['id'];
			
			$score=$qData['point'];			
			
			
			$qData=NULL;
			if($id!=NULL) $actionValue = $id;
			if(array_key_exists('log_session',$CONFIG)){
				if($CONFIG['log_session']==true){
					$sessionSerial = urlencode64(mysql_escape_string(cleanXSS(serialize($_SESSION))));
					$qSession = "{$sessionSerial}";
				}else $qSession = "";
			}else $qSession = "";
			$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			$sql = "INSERT IGNORE INTO {$CONFIG['DATABASE_LOGS']}.tbl_activity_log 
					(id,user_id,date_ts,date_time,action_id,action_value,ipaddress,session,sites) 
					VALUES 
					(NULL,{$userID},{$datenow},'{$dateNumNow}',{$actionID},'{$actionValue}','{$_SERVER['REMOTE_ADDR']}','{$qSession}','{$actual_link}')
					";
			
		// pr($sql);exit;
			//activity log : id 	user_id 	date_ts 	date_time 	action_id 	action_value
			if($actionID!=0 ){
		
					$this->apps->query($sql);

			}
		
		}
		
		if($expLog==TRUE){
	
		
		
		$actScore = intval($score);
		if($actScore==0)	return false;	
		$sql = "
		INSERT  IGNORE INTO {$CONFIG['DATABASE_LOGS']}.tbl_exp_point 
		(id,user_id,date_time_ts,date_time,activity_id,score) 
		VALUES 
		(NULL,{$userID},{$datenow},'{$dateNumNow}',{$actionID},{$actScore})
		";
	
			if($userID!=0  && $actionID!=0 ){

				$this->apps->query($sql);

			
			}
		}
			
	}
	
	
}
?>
