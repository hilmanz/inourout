<?php

class articleActivityHelper {

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

	function getTotalArticleRead(){
		global $CONFIG;
		$sql = "SELECT COUNT(id) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_read_articles
				WHERE n_status = 2 LIMIT 1";
		$rs = $this->apps->fetch($sql);


		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,
						'title'=>"Total User Read Article (News Update)"
				);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getMostArticleRead(){
		global $CONFIG;
		$sql = "SELECT ta.names, COUNT(tura.id) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_read_articles tura
				LEFT JOIN {$CONFIG['DATABASE_REPORTS']}.tbl_articles ta
				ON ta.articlesid = tura.articleid
				WHERE tura.n_status = 2 
				GROUP BY tura.articleid
				ORDER BY total DESC LIMIT 5";
		$rs = $this->apps->fetch($sql,1);


		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,
						'title'=>"Top 5 most read articles"
				);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

	function getLeastArticleRead(){
		global $CONFIG;
		$sql = "SELECT ta.names, COUNT(tura.id) AS total
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_user_read_articles tura
				LEFT JOIN {$CONFIG['DATABASE_REPORTS']}.tbl_articles ta
				ON ta.articlesid = tura.articleid
				WHERE tura.n_status = 2 
				GROUP BY tura.articleid
				ORDER BY total ASC LIMIT 5";
		$rs = $this->apps->fetch($sql,1);
		

		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$rs,
						'title'=>"Top 5 least read articles"
				);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

}

?>