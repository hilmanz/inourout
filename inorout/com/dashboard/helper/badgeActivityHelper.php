<?php

class badgeActivityHelper {

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

	function getBadgeTotal(){
		global $CONFIG;
		$sql = "SELECT *
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_games
				WHERE n_status = 1 
				GROUP BY gamesid";
		$rs = $this->apps->fetch($sql,1);

		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>"Total Game Played by Unique Visitor & User");
		else return array('status'=>0,'message'=>'No Data');
	}

	function getRedeemMerchandise(){
		global $CONFIG;
		$sql = "SELECT col.name, COUNT(tur.id) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_redeem tur
				LEFT JOIN {$CONFIG['DATABASE_WEB']}.collectables col
				ON tur.merchandiseid = col.id
				WHERE tur.n_status = 1
				GROUP BY tur.merchandiseid";
		$rs = $this->apps->fetch($sql,1);
		
		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>"Redeem",'subtitle'=>'Total Redeem Merchandise');
		else return array('status'=>0,'message'=>'No Data');
	}

	function getRedeemCodes(){
		global $CONFIG;
		$sql = "SELECT COUNT(*) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_badges
				WHERE n_status = 1 LIMIT 1";
		$rs = $this->apps->fetch($sql);
	
		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>"Entry Code",'subtitle'=>'Total Redeem Codes');
		else return array('status'=>0,'message'=>'No Data');
	}

	function getBadgesPerUser(){
		global $CONFIG;
		$sql = "SELECT tub.*, b.name AS badge_name
				FROM  {$CONFIG['DATABASE_WEB']}.badges b
				INNER JOIN {$CONFIG['DATABASE_REPORTS']}.tbl_user_badges tub
				ON b.id = tub.badgeid
				WHERE b.n_status = 1";
		$rs = $this->apps->fetch($sql,1);
	
		$badge_list = array();
		foreach ($rs as $key => $value) {
			if (isset($badge_list[$value['userid']][$value['badge_name']])){
				$badge_list[$value['userid']][$value['badge_name']]=$badge_list[$value['userid']][$value['badge_name']]+1;
			}else{
				$badge_list[$value['userid']][$value['badge_name']]=1;
			}
			
		}

		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>"Browser List");
		else return array('status'=>0,'message'=>'No Data');
	}

}

?>