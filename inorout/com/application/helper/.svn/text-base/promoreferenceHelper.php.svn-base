<?php 

class promoreferenceHelper {

	var $uid;

	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;

		$this->apps = $apps;
		if($this->apps->isUserOnline())  {
			if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
			
		}
		
	
		$this->config = $CONFIG;

		
	}
	
	function sendDataPromo(){
		$promoid = strip_tags($this->apps->_request('promoref'));
		if(!$promoid)return false;
		$sessionid = md5(date("YmdHis").rand(900000,9000000));
		
		$this->apps->session->setSession($this->config['SESSION_NAME'],"PROMOBANNER",array('id'=> $sessionid,'promoid'=>$promoid));
		
		$sql ="SELECT id,reference FROM tbl_banner_publisher WHERE refID = \"{$promoid}\" LIMIT 1 ";
		$qData = $this->apps->fetch($sql);
		// pr($sql);
		if(!$qData) {
			$publisherid = 0;
			$refmop = '';
		}else {
			$publisherid = intval($qData['id']);
			$refmop = $qData['reference'];
		}
		
		$sessionid = $this->apps->session->getSession($this->config['SESSION_NAME'],"PROMOBANNER");
		if(property_exists($sessionid,'id')){ 
			$sql =" 
			INSERT INTO tbl_banner_log ( userid , sessionid,publisherid,promoid,datetimes ,n_status, page)
			VALUES (0,'{$sessionid->id}','{$publisherid}','{$promoid}',NOW(),0,'landing')
			";		
			$rs = $this->apps->query($sql);		
			if($rs) return array('result'=> true,'refmop'=>$refmop);
		}
		return  array('result'=> false,'refmop'=>$refmop);
	}
	
	
	function updateDataPromo(){
		$sessionid = $this->apps->session->getSession($this->config['SESSION_NAME'],"PROMOBANNER");
		$user = $this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$page = strip_tags($this->apps->_g('page'));
		
		if($sessionid&&property_exists($sessionid,'id')){ 
			$sql =" 
				UPDATE tbl_banner_log SET userid={$user->id} , n_status =1 WHERE  sessionid = '{$sessionid->id}' AND n_status = 0 LIMIT 1
			";
					
			$rs = $this->apps->query($sql);		
			if($rs) return true;
		}
		return false;
	}
	
	function sendDataPromoLogAfterLoginOnly(){
		$sessionid = $this->apps->session->getSession($this->config['SESSION_NAME'],"PROMOBANNER");
		$user = $this->apps->session->getSession($this->config['SESSION_NAME'],"WEB");
		$page = strip_tags($this->apps->_g('page'));
		if($page!=''){	
		
			if($sessionid&&property_exists($sessionid,'id')){ 
			
				$sql ="SELECT id FROM tbl_banner_publisher WHERE refID = \"{$sessionid->promoid}\" AND n_status = 1 LIMIT 1 ";
				$qData = $this->apps->fetch($sql);
				
				if(!$qData) $publisherid = 0;
				else $publisherid = intval($qData['id']);
		
				$sql =" 
				INSERT INTO tbl_banner_log ( userid , sessionid,publisherid,promoid,datetimes ,n_status,page)
				VALUES ({$user->id},'{$sessionid->id}','{$publisherid}','{$sessionid->promoid}',NOW(),1,'{$page}')
				";		
				$rs = $this->apps->query($sql);		
				if($rs) return true;
			}
		}
		return false;
	}
}
?>

