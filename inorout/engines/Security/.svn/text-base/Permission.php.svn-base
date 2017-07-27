<?php

class Permission {
	function __construct($admin=null){
			$this->admin = $admin;		
	}
	function isAllowed($reqID){
		global $CONFIG,$ENGINE_PATH;
		$userID = $this->admin->Session->getVariable("uid");
		$this->admin->open();
		$rs = $this->admin->fetch("SELECT * FROM {$CONFIG['DATABASE_ADMIN']}.gm_permission WHERE userID='".mysql_escape_string($userID)."' AND reqID='".mysql_escape_string($reqID)."'");
		$this->admin->close();
		
		if($rs['userID']==$userID&&$rs['reqID']==$reqID){
			return true;
		}
	}
	
	
	function checkAdminLevel(){
		global $CONFIG,$ENGINE_PATH;
		$this->admin->open();
		$userID = $this->admin->Session->getVariable("uid");
		//check available role
		$sql = "SELECT * FROM {$CONFIG['DATABASE_ADMIN']}.gm_level WHERE n_status=1";
		$rs = $this->admin->fetch($sql,1);
		if(!$rs)return false;
			foreach($rs as $val){
				$role[$val['level']] = true;
			}
		
		//get admin level
		$sql = "SELECT level FROM {$CONFIG['DATABASE_ADMIN']}.gm_user WHERE userID='".mysql_escape_string($userID)."' LIMIT 1";
		$rs = $this->admin->fetch($sql);
		if(!$rs)return false;
		if($rs['level']==0)return false;
		//check admin what he/she can do
		$sql = "SELECT * FROM {$CONFIG['DATABASE_ADMIN']}.gm_level WHERE id='{$rs['level']}' AND n_status=1 LIMIT 1";
		$rs = $this->admin->fetch($sql);
		if(!$rs)return false;
		$this->admin->close();
		
		if($rs['specified_role']==1) $specifiedRole = $this->checkSpecificationLevel($rs['id']);
		else $specifiedRole = false;
		
		$adminRole = explode(',',$rs['type']);
		
		if(!$adminRole) return false;
			foreach($adminRole as $val){
				$arrRole[$val] = true;
			}
		
		if(!$role) return false;
	
		foreach($role as $key => $val){
			if(array_key_exists($key,$arrRole)) $adminLevel[$key] = true;
			else $adminLevel[$key] = false;
		}
		
		
		$this->admin->Session->addVariable("roler",$adminLevel);
		$this->admin->Session->addVariable("specified_role",$specifiedRole);		
		
			
		return true;
		
	}
	
	function checkSpecificationLevel($level=null){
		global $CONFIG,$ENGINE_PATH;
		if($level==null) return true;
		$this->admin->open();
		$userID = $this->admin->Session->getVariable("uid");
		$sql = "SELECT * FROM {$CONFIG['DATABASE_ADMIN']}.gm_specified_role WHERE aid='{$userID}' AND level ={$level}  AND n_status=1 ";
		$rs = $this->admin->fetch($sql,1);
	
		$this->admin->close();
		if($rs){
			// pr($rs);exit;
			return $rs;
		}
		return true;
	}
	
	
}
?>