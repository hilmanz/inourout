<?php

class loginActivityHelper {

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

	function getLoginTotal(){
		global $CONFIG;
		$sql = "SELECT COUNT(DISTINCT(userid)) AS unik_user, SUM(total) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_login
				WHERE n_status = 1 LIMIT 1";
		$rs = $this->apps->fetch($sql);
		
		foreach ($rs as $key => $value) {
			if($key == 'unik_user') $data[$key]['title'] = "Unique Visitor Per-Campaign";
			if($key == 'total') $data[$key]['title'] = "Total Login";
			$data[$key]['num'] = intval($value);
		}

		if($rs) return array('status'=>1,'message'=>'Success','data'=>$data,'title'=>"Number of Login");
		else return array('status'=>0,'message'=>'No Data');
	}

	function getLoginDaily(){
		global $CONFIG;
		$sql = "SELECT dates,COUNT(DISTINCT(userid)) AS unik_user
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_login
				WHERE n_status = 1 
				GROUP BY dates";
		$rs = $this->apps->fetch($sql,1);
		
		foreach ($rs as $key => $value) {
			$chart_data['categories'][]=$value['dates'];
			$chart_data['data'][]=intval($value['unik_user']);
			$chart_data['title']="DAILY UNIQUE VISITORS LOGIN";
			$chart_data['data_title']="Visits";
		}

		if($rs) return array('status'=>1,'message'=>'Success','data'=>$chart_data);
		else return array('status'=>0,'message'=>'No Data');
	}

}

?>