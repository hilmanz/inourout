<?php

class auctionActivityHelper {

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

	function getAuction(){
		global $CONFIG;
		$sql = "SELECT *
				FROM {$CONFIG['DATABASE_REPORTS']}.tbl_auctions
				WHERE n_status = 1 
				GROUP BY auctionid";
		$rs = $this->apps->fetch($sql,1);

		foreach ($rs as $key => $value) {
			$result[] = array(	'title'=> $value['itemnames'],
								'Total Participants'=>intval($value['totaluser']),
								'Total Participants Unique Visitors Per Item'=> intval($value['uniqueuser']),
								'Current Highest Bid Per Item'=>intval($value['higestpoint']),
								'Total Bid Frequency Per Item'=>intval($value['totaluser'])
							);

			// $result['Total_Participants']['auction'][] = $value['itemnames'];
			// $result['Total_Participants']['total'][] = intval($value['totaluser']);

			// $result['Total_Participants_Unique_Visitors_Per_Item']['auction'][] = $value['itemnames'];
			// $result['Total_Participants_Unique_Visitors_Per_Item']['total'][] = intval($value['uniqueuser']);

			// $result['Current_Highest_Bid_Per_Item']['auction'][] = $value['itemnames'];
			// $result['Current_Highest_Bid_Per_Item']['total'][] = intval($value['higestpoint']);

			// $result['Total_Bid_Frequency_Per_Item']['auction'][] = $value['itemnames'];
			// $result['Total_Bid_Frequency_Per_Item']['total'][] = intval($value['totaluser']);
		}

		if($rs){ 
			return array('status'=>1,'message'=>'Success','data'=>$result,
						'title'=>"AUCTION"
				);
		}else{ return array('status'=>0,'message'=>'No Data'); 
			
		}
	}

}

?>