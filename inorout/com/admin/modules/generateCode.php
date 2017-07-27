<?php
class generateCode extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		 
		$this->badgeHelper = $this->useHelper('badgeHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data); 
		
		 
	}
	
	function main(){ 
	// pr($_POST);
		$codelist = $this->badgeHelper->getcodelist($start=null,$limit=20);
		$channellistdropdown = $this->badgeHelper->channellistdropdown();
		$subchannellistdropdown = $this->badgeHelper->subchannellistdropdown();
		$time['time'] = '%H:%M:%S';
		// pr($channellistdropdown);
		$this->assign('total',intval($codelist['total']));
		$this->assign('codelist',$codelist['result']);
		$this->assign('channellistdropdown',$channellistdropdown);
		$this->assign('subchannellistdropdown',$subchannellistdropdown);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','generated code');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/generate-code.html');		
	}
	
	function doit(){
	
		print json_encode($this->badgeHelper->generateCode());
		exit;
	
	}
	
	function downloadit(){
		global $config;
		$filename = "generatecode_report".date('Ymd_gia').".xls";
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		// echo "Some Text"; //no ending ; here
		$resReport = $this->badgeHelper->downloadreport();
		// $this->log->sendActivity("user printing trade monitoring report");
		// pr($resReport);	 	exit;	
		echo "<table border='1'>";	 	 		
		echo "<tr>"; 	
			echo "<th class='head0'>No</th>";
			echo "<th class='head1'>code</th>";
			echo "<th class='head1'>code type</th>";
			echo "<th class='head1'>code channel</th>";
			echo "<th class='head1'>code sub channel</th>";
			echo "<th class='head1'>ReUsable</th>";
			echo "<th class='head1'>created date</th>";
		echo "</tr>";
		
		foreach ($resReport['result'] as $key => $val){			
			echo "<tr>";
				echo "<td>$val[no]</td>";
				echo "<td>$val[code]</td>";
				
					if($val['code_type']==0) echo "<td>Common</td>";
					if($val['code_type']==1) echo "<td>Special</td>";
					if($val['code_type']==2) echo "<td>Rare</td>";
				
				echo "<td>$val[code_channel]</td>";
				echo "<td>$val[code_sub_channel]</td>";
				
					if($val['code_reused']==1){
						echo "<td>Yes</td>";
					}else{
						echo "<td>No</td>";
					}
					
				echo "<td>$val[created_date]</td>";	
			echo "</tr>";
		}
		echo "</table>";
		
		
		exit;
	
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->badgeHelper->getcodelist($start);		
		}
		// pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
	
}
?>