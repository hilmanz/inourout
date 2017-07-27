<?php 


class galleryHelper {
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
	}
	
	function load(){
		global $CONFIG;
		

		$sql="SELECT * 
				FROM {$CONFIG['DATABASE_WEB']}.share_brag_contest
				WHERE userid = {$this->uid} LIMIT 0,10";
		$rs=$this->apps->fetch($sql,1);
		
		return $rs;
	}

}
?>