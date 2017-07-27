<?php 

class offlineHelper {

	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->config = $CONFIG;
		$this->apps = $apps;
		$this->uid  = 0;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id); 
	}
	
	
	function addOfflineUserRights(){
		$data['message'] = "failed to input ";
		$data['result'] = false;
		$data['code'] = 0;
		
		$email		=strip_tags($this->apps->_p('email'));
		$event		=strip_tags($this->apps->_p('event'));
		$datetimes	=date("Y-m-d H:i:s");
		$dates		=date("Y-m-d");
		$times		=date("H:i:s");
		
		$sql = "  
			INSERT INTO `marlboro_inorout_web`.`offline_engagement` 
			( `email`, `event`, `created_date`, `upload_date`, `upload_time`, `n_status`) 
			VALUES 
			(  '{$email}', '{$event}', '{$datetimes}', '{$dates}', '{$times}', '1'); ";
		
		$qData = $this->apps->query($sql);
		$theid =$this->apps->getLastInsertId();
		if($theid) {
			$data['message'] ="success upload offline datas";
			$data['code'] =1;
			$data['result'] =true;
			return $data;
		
		}
		return $data;
	
	}
}

?>

