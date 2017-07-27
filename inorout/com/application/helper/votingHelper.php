<?php 


class votingHelper {
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
	}
	
	function check_vote($contentID=null,$photoID=false){
		global $CONFIG;
		
		if(!$contentID) $contentID = intval($this->apps->_p('content_id'));
		$photoID = intval($photoID);
		if(!$contentID) return false;
		if(!$photoID) return false;
		
		$sql="SELECT * 
				FROM {$CONFIG['DATABASE_WEB']}.votes
				WHERE contentid = {$contentID} AND userid = {$this->uid}  LIMIT 1";
		
		$rs=$this->apps->fetch($sql);
		if($rs)	return $rs;
		return false;
	}

	function vote($contentID=null){
		global $CONFIG;
		
		if(!$contentID){
			$contentID = intval($this->apps->_p('content_id'));
			$photoid = intval($this->apps->_p('photo_id'));
		}
		
		if(!$this->check_vote()){
			$sql="INSERT INTO {$CONFIG['DATABASE_WEB']}.votes
					VALUES (NULL, {$contentID},{$photoid}, {$this->uid},1,NOW(),1)";
			$rs=$this->apps->query($sql);
			
			return $rs;
		}else{
			return false;
		}
	}
}
?>