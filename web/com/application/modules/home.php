<?php
class home extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain',$CONFIG['BASE_DOMAIN']);
		$this->playerSubmitHelper = $this->useHelper('playerSubmitHelper');
	}
	
	function main(){
		//pr($this->user);exit;
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','home');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/home.html');		
	}
	
	function downloadExcel(){
		$from = strip_tags($this->_g('from'));
		$to = strip_tags($this->_g('to'));
		$username = strip_tags($this->_g('username'));
		$detail=(($username!='all')?true:false);
	
		$playerList = $this->playerSubmitHelper->getPlayerLogs(0,0,$from,$to,0,'all',$username,$detail);
		if($username!=null&&$username!=''&&$username!='all')$filename = "InOrOut_PlayerID_{$playerList['data'][0]['username']}_".date('Y_m_d_g_ia').".xls";
		else $filename = "InOrOut_Player_List_".date('Y_m_d_g_ia').".xls";
		

		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		//pr($playerList);exit;
		if($username!=null&&$username!=''&&$username!='all'){
			echo "<table border='1'>";
			echo "<tr><th colspan='4'>PLAYER LOGS : {$playerList['data'][0]['username']}</th></tr>";
			echo "<tr><th>PLAY TIME</th><th>WIN</th><th>LOSE</th><th>SUBMIT DATE</th></tr>";
			foreach ($playerList['data'] as $key => $val){	
				echo "<tr>";
				echo "<td>{$val['playing_date']}</td>
					 <td>{$val['win']}</td> 	
					 <td>{$val['lose']}</td> 	
					 <td>{$val['submit_date']}</td> ";
				echo "</tr>";
			}
			echo "</table>";
			exit;
		}else{
			$fr = date('d/m/Y',strtotime($from));
			$tt = date('d/m/Y',strtotime($to));
			echo "<table border='1'>";
			if($from) echo "<tr><th colspan='6'>INOROUT PLAYER LOGS ({$fr} - {$tt})</th></tr>";
			else echo "<tr><th colspan='6'>INOROUT PLAYER LOGS (All)</th></tr>";
			echo "<tr><th>BA NAME</th><th>USERNAME</th><th>PLAY</th><th>WIN</th><th>LOSE</th><th>SUBMIT DATE</th></tr>";
			foreach ($playerList['data'] as $key => $val){	
				echo "<tr>";
				echo "<td>{$val['ba_name']}</td>
					 <td>{$val['username']}</td> 	
					 <td>{$val['play']}</td> 	
					 <td>{$val['win']}</td> 	
					 <td>{$val['lose']}</td> 	
					 <td>{$val['submit_date']}</td> ";
				echo "</tr>";
			}
			echo "</table>";
			exit;
		}
	}

	function player(){
		$username = strip_tags($this->_g('username'));

		$this->assign('username',htmlspecialchars($username));
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','player_details_{$username}');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/player_details.html');
	}

	function registerSBA(){
		global $CONFIG;
		/*$name = strip_tags($this->_p('name'));
		$username = strip_tags($this->_p('username'));
		$password = strip_tags($this->_p('password'));
		$role = strip_tags($this->_p('role'));
		$city = strip_tags($this->_p('city'));
		$msg="Oops!";
		$hashPass = sha1($password.$CONFIG['salt']);
		$sql="INSERT INTO social_member (PASSWORD,email,register_date,salt,n_status,NAME,nickname,username,last_name) 
			VALUES (
					'{$hashPass}',
					'',NOW(),
					'{$CONFIG['salt']}',1,
					'{$name}',
					'',
					'{$username}',
					'')";
		if(!$this->query($sql)){print($msg);exit;}
		$lastID = $this->getLastInsertId();
		
		if($lastID>0) {
				$sql = "
					INSERT INTO my_pages (ownerid ,	name, 	description ,	type 	,img ,	otherid,	brandid 	,brandsubid ,	areaid ,	city 	,created_date ,	closed_date,n_status) 
					VALUES ('{$lastID}','{$role}','',1,'','','','',0,'{$city}',NOW(),DATE_ADD(NOW(),INTERVAL 5 YEAR),1)
				";
				if($this->query($sql)){
					$msg="Yeah";
				}else{
					$msg="Damn";
				}

		}
		print($msg);exit;*/

		/*$sql="SELECT * FROM social_member WHERE n_status=0";
		$rs = $this->fetch($sql,1);
		$type=1;
		foreach ($rs as $key => $value) {
			switch($value['email']){
				case 'Project Leader (PL)':
					$type=2;
					break;
				case 'TL':
					$type=7;
					break;
				default:
					$type=1;
			}
			$sql="INSERT INTO my_pages (ownerid ,name,description,type,img,otherid,brandid,brandsubid,areaid,city,created_date,closed_date,n_status) 
					VALUES ('{$value['id']}','{$value['name']}','{$value['deviceid']}',{$type},'','','','',0,0,NOW(),DATE_ADD(NOW(),INTERVAL 5 YEAR),1)
				";
			$this->query($sql);
		}*/
	}
}
?>	