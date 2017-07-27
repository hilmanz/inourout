<?php

class gameActivityHelper {

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

	function getGameTotal(){
		global $CONFIG;
		$sql = "SELECT gamesid, SUM(total) AS total, COUNT(DISTINCT(userid)) AS unik_user
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_games
				WHERE n_status = 1 
				GROUP BY gamesid";
		$rs = $this->apps->fetch($sql,1);

		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'title'=>"Total Game Played by Unique Visitor & User");
		else return array('status'=>0,'message'=>'No Data');
	}

}

?>