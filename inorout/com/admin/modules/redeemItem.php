<?php
class redeemItem extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->merchandiseHelper = $this->useHelper('merchandiseHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main(){
		$redeemlist = $this->merchandiseHelper->redeemlist($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',intval($redeemlist['total']));
		$this->assign('list',$redeemlist['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','list_user');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/redeem-list.html');
	}
	
	function ajaxconfirmed()
	{
		
		$ajax = $this->merchandiseHelper->ajaxcheckdate();
		// var_dump($ajax);
		
		if ($ajax){ 
			print json_encode(array('status'=>false));
		}else{ 
			print json_encode(array('status'=>true));
		}
		
		exit;
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->merchandiseHelper->redeemlist($start);		
		}
		// pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
	
	function downloadit(){
		global $config;
		$filename = "redeem_item_report".date('Ymd_gia').".xls";
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		// echo "Some Text"; //no ending ; here
		$resReport = $this->merchandiseHelper->downloadreport();
		// $this->log->sendActivity("user printing trade monitoring report");
		// pr($resReport);	 	exit;	
		echo "<table border='1'>";	 	 		
		echo "<tr>"; 	
				echo "<th class='head0'>No</th>";
				echo "<th class='head0'>Name</th>";
				echo "<th class='head0'>Email</th>";
				echo "<th class='head0'>Address</th>";
				echo "<th class='head0'>Merchandise Name</th>";
				echo "<th class='head0'>Phone Number</th>";
				echo "<th class='head0'>Redeem Date</th>"; 
		echo "</tr>";
		
		foreach ($resReport['result'] as $key => $val){			
			echo "<tr>";
					echo "<td width='10'>$val[no]</td>";
					echo "<td>$val[name] $val[last_name]</td>";
					echo "<td>$val[email]</td>";
					echo "<td>$val[address]</td>";
					echo "<td>$val[merchname]</td> ";
					echo "<td>$val[phonenumber]</td> ";
					echo "<td>$val[redeemdate]</td> ";
			echo "</tr>";
		}
		echo "</table>";
		
		
		exit;
	
	}
	
}
?>