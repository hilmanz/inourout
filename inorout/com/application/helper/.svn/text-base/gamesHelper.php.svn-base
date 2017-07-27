<?php 

class gamesHelper {

	function __construct($apps){
		global $logger,$CONFIG,$LOCALE;
		$this->locale = $LOCALE;
		$this->logger = $logger;
		$this->config = $CONFIG;
		$this->apps = $apps;
		$this->uid  = 0;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
		
		$this->dbshema = "marlborohunt";	
		
		$this->week = 7;
		$week = intval($this->apps->_request('weeks'));
		if($week!=0) $this->week = $week;
		
		$this->startweekcampaign = "2013-05-20";
		$this->datetimes = date("Y-m-d H:i:s");
		
		$this->level = array(1,2,3);
		$this->gamesarrayid =array(1,2,3,4,5,6);
		$this->singlelevelgame =array(9);
		$this->pointarr = array(0,0,0,0);	
		
		$this->pointsgames[1] = array(1=>60,2=>105,3=>135);
		$this->pointsgames[2] = array(1=>60,2=>105,3=>135);
		$this->pointsgames[3] = array(1=>60,2=>105,3=>135);
		
		$this->hiddencodegamesid = 80;
		// pr($this->apps->_request('week'));
	}
	
	
	function getLastOldToken(){
	
	 
		
		$sql = " SELECT token FROM my_games WHERE userid = {$this->uid}  ORDER BY datetimes DESC LIMIT 1";
		
		$lastToken = $this->apps->fetch($sql);
		if($lastToken){
			//fresh start
				// pr($sql);
				// pr($lastToken);
			if($lastToken['token']==''){
				return $this->uid;
			}else{
			// has token old
				return $lastToken['token'];
			}
			
		}
			
		return false;	
		
	}
	
	
	function checkstatus()
	{
		$checkCode = false;
		$mytoken = false;

		/* parse win status of user games */
		$token = strip_tags($this->apps->_p('token'));
		$win = strip_tags($this->apps->_p('win'));
		$userid = strip_tags($this->apps->_p('userid'));
				
		$gamesid = strip_tags($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		$level = intval($this->apps->_p('level'));
		
		$point = intval($this->pointarr[$level]);
		
		if(!in_array($point,$this->pointarr)) return false;

		$getLastOldToken = $this->getLastOldToken();
		
		$salt = "gameapihelper";
			$this->logger->log('phase 1: check token '.$gamesid );
			$this->logger->log('phase 1b: check level '.$level );
		if(!$token) return false;
			$this->logger->log('phase 1: OK ');
		/* token matching with erwin */
		$mytoken = sha1($this->uid.date("YmdHi").$getLastOldToken."true{".$salt."}");
		$mytokentolerance = sha1($this->uid.date("YmdHi",strtotime(date("YmdHi")." -1 minute ")).$getLastOldToken."true{".$salt."}"); /* tolerance 1 minute */
			$this->logger->log('phase 2: check param information ');
		if($this->uid==0) return false;
			$this->logger->log('phase 2: id OK ');
		if($this->uid!=$userid) return false;
			$this->logger->log('phase 2: all OK ');
		/* check user dont have code in publicity code where code not exists in their inventory */
		$checkuserplaygames = $this->checkuserplaygames();
		$checkuserwinthislevel = $this->checkuserwinthislevel();
		
		
		
			$this->logger->log('phase 2b: token '.$token.' '.$mytoken.', tolerance: '.$mytokentolerance.' using token concat this = '.$this->uid.date("YmdHi").$getLastOldToken."true{".$salt."}");
		if($token!=$mytoken) {
			if($token!=$mytokentolerance) return false;
		}
		
		/* give user log playing games */
			$this->logger->log('phase 3: log user current games ');
			$playinggamesid = intval($this->playinggames($mytoken));
			$this->logger->log('phase 3: OK ');
			
			$this->logger->log('phase 2b: token OK ');
		
			$this->logger->log('phase 4: check win ');
		if($win!="true") return false;
			$this->logger->log('phase 4: OK ');
		
			$this->logger->log('phase 5: check user play games ');
		if(!$checkuserplaygames) return false;
			$this->logger->log('phase 5: OK ');
		
		$this->logger->log('phase 6: check code public for games in inventory');
		$checkCode = $this->checkpublicexistsinventory();
		if(!$checkCode) return false;
			$this->logger->log('phase 6: OK ');
		
		if($checkCode['result']){
				$checkCode['data']['double'] = false;
					$this->logger->log('phase 6: result OK ');
					/* save to inventory user if win */
					$this->logger->log('phase 7: save to inventory ');
				if($win=="true"){
					$this->logger->log('phase 7: OK ');
					if(!$checkuserwinthislevel)  return false;
					
					if(in_array($level,$this->level)) {
						$checkuserplaygames = $this->checkuserplaygames();
						if(!$checkuserplaygames) return false;
						
							if(($level==3) and (!in_array($gamesid,$this->singlelevelgame))){
								 $checkCode['data']['double'] = true;
							} 							
						$saved = $this->savetoinventory($win,$checkCode['data'],$playinggamesid);
					}else $saved = true;
					if($saved) return $checkCode['data'];
				}
				
		}else{
				$this->logger->log('phase 6: result NOT OK ');
			$checkCode = false;
			/* if not found code in publicity code, create 1 code for this user */
				$this->logger->log('phase 7b: generate code ');
			$firstcreatecode = $this->generateCode();
			if(!$firstcreatecode) return false;		
				$this->logger->log('phase 7b: OK ');
			
				$this->logger->log('phase 8: check code in this inventory again ');
			$checkCode = $this->checkpublicexistsinventory();
			if(!$checkCode) return false;
				$this->logger->log('phase 8: OK ');
			if($checkCode['result']){
				$checkCode['data']['double'] = false;
					$this->logger->log('phase 8: result OK ');
					/* save to inventory user if win */
				if($win=="true"){
					$this->logger->log('phase 9: save to inventory ');
					if(!$checkuserwinthislevel) return false;
					
					if(in_array($level,$this->level)) {	
						$checkuserplaygames = $this->checkuserplaygames();
						if(!$checkuserplaygames) return false;
						if(($level==3) and (!in_array($gamesid,$this->singlelevelgame))){
							 $checkCode['data']['double'] = true;
						} 					
						$saved = $this->savetoinventory($win,$checkCode['data'],$playinggamesid);
					}else $saved = true;
					$this->logger->log('phase 9: '.$saved);
					if($saved) return $checkCode['data'];
				}
			}else return false;
		}
		
		return false;
	}
	
	function getgametask(){
		return false; // tanya kia notif buat game apa fungsi nya
		$gamesid = intval($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		$typeofgames[1] = 6; // cross out
		$typeofgames[2] = 22; // wallbreaker
		$typeofgames[4] = 25; // word hunt
		$typeofgames[5] = 24; // doubt crasher
		$typeofgames[6] = 26;// move forward
		$typeofgames[7] = 27;// word master
		$sql =" SELECT * FROM {$this->dbshema}_news_content WHERE articleType={$typeofgames[$gamesid]} AND n_status=1 LIMIT 1";
		$qData = $this->apps->fetch($sql);
		// pr($qData); 
		$this->logger->log($sql);
		if(!$qData) return false;
		return $qData;
		
	}
	
	function playinggames($token=false){
		
		$datetime = date("Y-m-d H:i:s");
		
		$gamesid = intval($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		
		$level = intval($this->apps->_p('level'));
		// $point = intval($this->pointarr[$level]);
		$point = intval($this->apps->_p('point'));
		// if(!in_array($point,$this->pointarr)) return false;
		if($token==false)  return false;
		$capspoint = 3;
		
		/* validation for point games */
		if(array_key_exists($gamesid,$this->pointsgames)){
			if(array_key_exists($level,$this->pointsgames[$gamesid])){
				if(($this->pointsgames[$gamesid][$level]-($capspoint*$level))<$point) return false;
			}else{
				return false;
			}
			
		}else return false;
		
		$sql = " INSERT INTO my_games 
		( 	gamesid ,	userid 	,point 	,datetimes, 	n_status ,token,win,level) 
		VALUES ({$gamesid},{$this->uid},{$point},'{$datetime}',1,'{$token}',0,'{$level}')";		
		
		$this->apps->query($sql);
		// pr($sql);
		$lastid = intval($this->apps->getLastInsertId());
		if($lastid){
			return $lastid;
		}else return false;
		
	
	}
	
	function checkuserwinthislevel(){
	
		$datetime = date("Y-m-d H:i:s");
		
		$gamesid = intval($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		
		$level = intval($this->apps->_p('level'));
		$point = intval($this->pointarr[$level]);
		if(!in_array($point,$this->pointarr)) return false;
		if(!in_array($level,$this->level)) return false;
		
		//check user has win the game at this level
		$sql = " 
		SELECT COUNT(*) total 
		FROM my_games 
		WHERE 
		gamesid={$gamesid}  
		AND level={$level} 
		AND win=1 
		AND userid={$this->uid} 
		AND DATE(datetimes)=DATE('{$datetime}') 
		LIMIT 1 ";
		
		$this->logger->log($sql);
		$qData = $this->apps->fetch($sql);
		if(!$qData) return false;
		if(!array_key_exists('total',$qData)) return false;
		if (in_array($gamesid,$this->singlelevelgame)){
			if($qData['total']<1) return true;
		}else{
			if($qData['total']<3) return true;
			// if($qData['total']<=14) return true; /* changes 3 times per games point*/
		}
		
		return false;
	}
	
	
	function checkuserplaygames(){
	
		$datetime = date("Y-m-d H:i:s");
		
		$gamesid = intval($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		
		$level = intval($this->apps->_p('level'));
		$point = intval($this->pointarr[$level]);
		if(!in_array($point,$this->pointarr)) return false;
		
		$sql ="
			SELECT COUNT(*) total 
			FROM my_badges b
			LEFT JOIN badges_source_type t ON t.id = b.sourceType
			WHERE 
			userid={$this->uid} 
			AND DATE(redeem_date)=DATE('{$datetime}')  
			AND t.name = 'games {$gamesid}' 
			LIMIT 1";
		
		$this->logger->log($sql);
		$qData = $this->apps->fetch($sql);
		if(!$qData) return false;
		if(!array_key_exists('total',$qData)) return false;
		if (!in_array($gamesid,$this->singlelevelgame)){
			if($qData['total']<9) return true;
 
		}else{
			if($qData['total']<1) return true;
		}
		
		return false;
	}
	
	 
	
	function checkuserplayingthislevel(){
		
		$datetime = date("Y-m-d H:i:s");
		$gamesid = intval($this->apps->_p('gamesid'));
		$level = intval($this->apps->_p('level'));
		$point = intval($this->pointarr[$level]);
		if(!in_array($level,$this->level)) return false;
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		
		$sql ="SELECT COUNT(1) total FROM my_games WHERE DATE(datetimes)=DATE('{$datetime}') AND userid={$this->uid} AND gamesid={$gamesid} AND level={$level} AND win=1 LIMIT 1";
		$this->logger->log(" check level games : ".$sql);
		$data = $this->apps->fetch($sql);
		$this->logger->log(" check level games result : ".json_encode($data));			
		if(!$data) return false;
		if(!array_key_exists('total',$data)) return false; 
		if($data['total']<3) return true;		
		return false;
	}
	
	function savetoinventory($win=false,$code=false,$playinggamesid=0){	
		
		if(!$win) return false;
		if(!$code) return false;
		if($playinggamesid==0) return false;
		if(!$this->checkuserplayingthislevel()) return false;
		
		 
		$point = intval($this->apps->_p('point'));
		$gamesid = intval($this->apps->_p('gamesid'));
		$level = intval($this->apps->_p('level'));
		$gamepoint = intval($this->pointarr[$level]);
		if(!in_array($gamepoint,$this->pointarr)) return false;
				 
		$win = strip_tags($this->apps->_p('win'));
		$this->logger->log(" win : ".$win);
		if($win!="true") return false;
		$this->logger->log($gamesid);
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		$gamenames =$gamesid;
		 /* userid 	codeid 	codepublicityid 	n_status 	histories */
		$sql = "SELECT id FROM badges_source_type WHERE name = 'games {$gamesid}' LIMIT 1";
		$sourceType = $this->apps->fetch($sql);
		if(!$sourceType) return false;
		$datetimes = date("Y-m-d H:i:s");
		
		$capspoint = 3;		
		/* validation for point games */
		if(array_key_exists($gamesid,$this->pointsgames)){
			if(array_key_exists($level,$this->pointsgames[$gamesid])){
				if(($this->pointsgames[$gamesid][$level]-($capspoint*$level))<$point) return false;
			}else{
				return false;
			}
			
		}else return false;
		
		$sql = " INSERT INTO my_badges 
		(userid, badgesid, codeid, n_status, sourceType,redeem_date) 
		VALUES ({$this->uid},{$code['badgesid']},{$code['id']},1,'{$sourceType['id']}','{$datetimes}')";	
		
		$this->logger->log($sql);
		
		$this->apps->query($sql);
		if($this->apps->getLastInsertId()){
			
			$sql = " UPDATE my_games SET win  = 1 WHERE id = {$playinggamesid}  AND gamesid ={$gamesid} LIMIT 1";
			$this->apps->query($sql);
			$this->logger->log($sql);
			
			return true;
		}else return false;
		return false;
	}
	
	function checkpublicexistsinventory(){
		
		
		$data['result'] = false;
		$data['data'] = false;
	
		$gamesid = intval($this->apps->_p('gamesid'));
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		
		$sql ="
			SELECT * FROM  badges_code public
			WHERE NOT EXISTS 
			( SELECT * FROM my_badges WHERE codeid = public.id AND userid={$this->uid} ) 
			AND code_channel='games' 
			AND code_sub_channel='games_{$gamesid}' 
			AND code_reused='1' 
			AND n_status = 1 
			LIMIT 1";
		
		$qData = $this->apps->fetch($sql);
					
		if($qData) {
			/* randcode , add proba in here if want to use of fontend */
			$masterbBadges = $this->apps->badgesHelper->masterbBadges();
			$randcodeidmekans = $this->apps->badgesHelper->randomcodegen($masterbBadges);
			$this->logger->log("before : ");
			if($randcodeidmekans!=false) $qData['badgesid']=$randcodeidmekans;
			$this->logger->log("after : ".$qData['badgesid']);
			$data['result'] = true;
			$data['data'] = $qData;
		
		}
		return $data;
		
	
	}
	
	function generateCode()
	{
	
		$gamesid = intval($this->apps->_p('gamesid'));
		
		if(!in_array($gamesid,$this->gamesarrayid)) return false;
		$location = 'GAMES CODES';
		$channel = "games";
		$subchannel = "games_{$gamesid}";
		 
	 	$iscommonbadges=1;
	 	$reusesable=1;
		$datetime = date("Y-m-d H:i:s");
		$getres = false;		
		
	 
		 
			$letters  = "ABCDEFGHJKMNPQRSTUVWXYZ23456789";
			$maskcode = substr(str_shuffle($letters), 0, 8);
			

			$sql = "INSERT INTO {$this->config['DATABASE_WEB']}.badges_code 
					(code, code_type, code_sub_channel, code_channel, created_date,  n_status,code_reused)
					VALUES 
					('{$maskcode}', {$iscommonbadges}, '{$subchannel}', '{$channel}',   '{$datetime}', 1,{$reusesable} )";
			// pr($sql);
			 
			 $this->apps->query($sql);
			if($this->apps->getLastInsertId()){
				$getres[$maskcode] = 1;
			}else $getres[$maskcode] = 0;
			
	 
		
		if($getres){
			$success = 0;
			$failed = 0;
			foreach($getres as $key => $val){
				if($val==1) $success++;
				else $failed++;			
			}
				
		 
			return true;
		}
		
				
		return true;
		
	}
	 
	function setDoubleOrNothing(){
		global $CONFIG;
		//get code id won by winning games
 
		// gamesid = 1
		// created date = date()
		// modif date = created date
		// my user id = opponentid
		// my point = opponent point
		// n_status 0
		$data['result']=false;
		$data['code']=0;
		$data['message'] = "Maaf, kesempatan double or nothing anda untuk hari ini sudah habis.";
		$tokenz = $this->apps->_g('token');
		$decrypt = unserialize(urldecode64($tokenz)); 
		$this->logger->log(" tokenizeeeeee ".json_encode($decrypt));
		// pr($decrypt);
		if(!is_array($decrypt)) {
			$data['message'] = " token not founds ";
			return $data;
		}
		
		//get point user from clocking max and min when playing games
		$datetimes = date("Y-m-d");
		$sql= "SELECT COUNT(1) total FROM double_or_nothing WHERE token=\"{$tokenz}\" LIMIT 1 ";
		$qData = $this->apps->fetch($sql);
		if($qData)if($qData['total']>0) { $data['message'] = "  you already submit this challenges "; return $data; }
		
		$sql= "SELECT * FROM my_games WHERE userid={$this->uid} AND DATE(datetimes) = '{$datetimes}' AND gamesid ='{$decrypt['gamesid']}' ORDER BY id DESC LIMIT 1 ";
		$qData = $this->apps->fetch($sql);
		
		// pr($qData);
		$uservalidpoint = 0;
		$arrbadgeset = false;
		$arrCodeid=false;
		$arrBadgesid=false;
		$arrMarkid=false;
		if($qData){
			$uservalidgamesid = $qData['gamesid'] ;
			if($qData['level']==3) $uservalidpoint = $qData['point'];
			else {
				$data['message'] = " you dont have any point from games too ";
				return $data;
			}
		}else {
			$data['message'] = " you dont have any point from games  ";
			return $data;
		}
		if($uservalidpoint==0) {
			$data['message'] = " point not valid ";
			return $data;
		}
		// get user badges to daring
		$sql = "SELECT * FROM my_badges WHERE userid={$this->uid} AND DATE(redeem_date) = '{$datetimes}' AND n_status = 1 ORDER BY id DESC LIMIT 3 ";
		$qData = $this->apps->fetch($sql,1);
		// pr($sql);
		// pr($qData);
		if($qData){
		
			if(count($qData)<3) {
						$data['message'] = "you dont have enought badges ";
						return $data;
				}
			
			//arrbadge set
				foreach($qData as $val){
					$arrbadgeset[$val['codeid']] = $val['badgesid'];
					
					$arrCodeid[$val['codeid']] = $val['codeid'];
					$arrBadgesid[$val['codeid']] = $val['badgesid'];
					$arrMarkid[$val['codeid']] = $val['mark'];
				}
			
		}else  {
						$data['message'] = " yyour badges not  found ";
						return $data;
				}
		 
		if(!$arrbadgeset){
						$data['message'] = "you dont have enought badges 2 ";
						return $data;
				}
			
	 
		$opponentid =  intval($decrypt['opponentid']);
		$gamesid = intval( $decrypt['gamesid']);
		$playdaretimes = $decrypt['playtimelist'];
		
		if(!in_array($gamesid,$this->gamesarrayid)) {
						$data['message'] = " gamesid not found ";
						return $data;
				}
			
		$userid = $this->uid;
		   
		if($opponentid==0) {
						$data['message'] = " opponent not found ";
						return $data;
				}
		if($uservalidgamesid!=$gamesid)  {
						$data['message'] = " yyour game not valid not found ";
						return $data;
				}
		 
		// opponent id get from list of DON
		
		$createddate = date("Y-m-d H:i:s");
		$modifieddate =$createddate;
		$arrSetBadges = false;
	 
		$qInsertBadgesDoubleNothing = false; 
		if($qData){
			if(count($qData)!=count($arrCodeid))  {
						$data['message'] = " yyour badges not valid not found ";
						return $data;
				}
		 
		}else  {
						$data['message'] = " yyour game not valid not found 2 ";
						return $data;
				}
		 
		// insert user data as opponent list on double or nothing
		$sql = "INSERT INTO  double_or_nothing (userid,userpoint,`opponentid`, `opponentpoint`, `gamesid`, `created_date`, `modified_date`, `n_status`,token) 
		VALUES ( '{$userid}', '{$uservalidpoint}', '{$opponentid}','0', '{$uservalidgamesid}', '{$createddate}', '{$modifieddate}', '0',\"{$tokenz}\");";
		 
		$this->apps->query($sql);
		$doubleid = $this->apps->getLastInsertId();
		// pr($sql);
		// pr($doubleid);
		if($doubleid){
			
			if($arrCodeid){
				// pr($arrCodeid);
	
				foreach($arrCodeid as $key => $val){
					$arrSetBadges[$val] = $arrBadgesid[$val];
				}
				if($arrSetBadges){
					// pr($arrSetBadges);
					foreach($arrSetBadges as $codeid => $badgesid){
						$qInsertBadgesDoubleNothing[$codeid] = "
						INSERT INTO  double_or_nothing_badges ( `badgesid`, `codeid`, `doubleid`, `userid`, `created_date`, `n_status`,mark) 
						VALUES  ('{$badgesid}','{$codeid}','{$doubleid}','{$userid}','{$createddate}',0,'{$arrMarkid[$codeid]}') ";
						$qUpdateMyBadges[$codeid] = " UPDATE my_badges SET n_status=6 WHERE codeid='{$codeid}' AND userid='{$userid}' AND mark='{$arrMarkid[$codeid]}' LIMIT 1 ";
					}
					
					if($qUpdateMyBadges){
						$keepingprocess  =false;
						 foreach($qUpdateMyBadges as $key => $val){
							$insertedid = 0;
							$this->apps->query($qInsertBadgesDoubleNothing[$key]);
							$insertedid = $this->apps->getLastInsertId();
							// pr($qInsertBadgesDoubleNothing[$key]);
							// pr($insertedid);
							if($insertedid) {
								$keepingprocess[$key] = true;
								$this->apps->query($qUpdateMyBadges[$key]); 
							}else $keepingprocess[$key] = false;
							
						}
								// pr($keepingprocess);
							if($keepingprocess){
								if(!in_array(false,$keepingprocess)){ 
									switch (intval($uservalidgamesid)) {
										case 1:
											$msg = "games/spotted";
											break;
										case 3:
											$msg = "games/badgesbreaker";
											break;
										case 2:
											$msg = "games/doublechecker";
											break;
										
										default:
											$msg = "";
											break;
									}

									$this->apps->notificationHelper->notif_log(14,$opponentid,$this->uid);
									sleep(1);
									$this->apps->notificationHelper->notif_log(16,$this->uid,$opponentid,$msg);
									
									//send mail challenge to user
									$to = $this->apps->notificationHelper->checkUser($opponentid);
									$from = $this->apps->notificationHelper->checkUser($this->uid);

									$mail['email']=$to['email'];
									$mail['name']=$to['name'];
									$mail['subject'] = "Invitation Double or Nothing!";
									$mail['msg']=$this->apps->notificationHelper->email_template(
		    						array(
		    							'username'=>$to['name'],
										'message'=>"<p>Kamu ditantang oleh ".$from['name']." dalam Double or Nothing! Are you IN or OUT? Tentukan pilihanmu dengan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
													<p>Good luck!</p>"
		    						));
			
									$this->apps->notificationHelper->send_mail($mail);



									$data['result']=true;
									$data['code']=1;
									$data['message'] = "Tantangan Double or Nothing berhasil dikirim!";
								}
							}
							return $data;
					}
				} 
			}
		}
		return $data;
		
	}
	
	function doubleOrNothing(){
		global $CONFIG;
		//double or nothing tables
		// badges double or nothing tables
		// trigger DON 
		// always hit this function after finish games
		$datetimes = date("Y-m-d");
		$uservalidpoint = 0;
		$arrbadgeset = false;
		$arrMarkid = false;
		$uservalidgamesid = false;
		$arrCodeid=false;
		$arrBadgesid=false;
		$arrSetBadges = false;
		$challengeArrSetBadges = false;
		$doubleid = false;
		$userpoint = false;
		$userid = false;
		$mypoint = false;
		$challengerArrbadgeset = false;
		$challengerArrCodeid=false;
		$challengerArrBadgesid=false;
		$challengerArrMarkid=false;
		
		$challengeArrSetBadges=false;
		$rollbackbadgesloser=false;
		
		$data['result']=false;
		$data['code']=0;
		$data['message']=" maaf tantangan yang kamu masukan tidak benar ";
		
		$token = $this->apps->_g('token');
		 
		$decrypt = unserialize(urldecode64($token));
		// pr($this->uid);exit;
		if(!is_array($decrypt)) return $data;
		$gamesid = 0;
		if(array_key_exists('gamesid',$decrypt))$gamesid	=intval($decrypt['gamesid']);	
		if(array_key_exists('userid',$decrypt)) $userid	=intval($decrypt['userid']);	
		if(array_key_exists('doubleid',$decrypt)) $doubleid	=intval($decrypt['doubleid']);	
		if($gamesid==0)	return $data;
		if($userid!=$this->uid)	return $data;
		if(!in_array($gamesid,$this->gamesarrayid))return $data;
		
		
		//cek user has double or nothing on tables 
		$sql = "SELECT * FROM `double_or_nothing` WHERE opponentid={$this->uid} AND n_status = 0 AND gamesid = {$gamesid}  AND DATE(created_date)='{$datetimes}' AND id ='{$doubleid}' AND token<>''  ORDER BY id DESC LIMIT 1 ";
		$qData = $this->apps->fetch($sql);
			//if has
		if($qData){
			$doubleid = $qData['id'];
			$userid = $qData['userid']; 
			$userpoint = $qData['userpoint'];
			if(!$doubleid){
				$data['code'] =4;
				$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
				return $data;
			}
			if(!$userid){
				$data['code'] =4;
				$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
				return $data;
			}
			
			$createddate = date("Y-m-d H:i:s");
			$modifieddate =$createddate;
			//cek challanger user badges active on badge double or nothing tables
			$sql ="SELECT * FROM `double_or_nothing_badges` WHERE userid={$userid} AND doubleid={$doubleid} ORDER BY id DESC LIMIT 3";
			$qData = $this->apps->fetch($sql,1);
			if($qData){
						if(count($qData)<3) {
								$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
								return $data;
						}
						foreach($qData as $val){
								$challengerArrbadgeset[$val['codeid']] = $val['badgesid'];
								
								$challengerArrCodeid[$val['codeid']] = $val['codeid'];
								$challengerArrBadgesid[$val['codeid']] = $val['badgesid'];
								$challengerArrMarkid[$val['codeid']] = $val['mark'];
						}
						foreach($challengerArrCodeid as $key => $val){
							$challengeArrSetBadges[$val] = $challengerArrBadgesid[$val];
						}
						
					//if all badges active with status open 0
					//cek own badge active						 
					$sql = "SELECT * FROM my_badges WHERE userid={$this->uid} AND DATE(redeem_date) = '{$datetimes}' AND n_status = 1 ORDER BY id DESC LIMIT 3 ";
					$qData = $this->apps->fetch($sql,1);
					 
					if($qData){
						
							if(count($qData)<3) {
										$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
										return $data;
							}
							
							foreach($qData as $val){
								$arrbadgeset[$val['codeid']] = $val['badgesid']; 
								$arrCodeid[$val['codeid']] = $val['codeid'];
								$arrBadgesid[$val['codeid']] = $val['badgesid'];
								$arrMarkid[$val['codeid']] = $val['mark'];
							}
							
						//cek user point and games id
						$sql= "SELECT * FROM my_games WHERE userid={$this->uid} AND DATE(datetimes) = '{$datetimes}' ORDER BY id DESC LIMIT 1 ";
						$qData = $this->apps->fetch($sql);
						$uservalidpoint = 0;
						// pr($sql);
						if($qData){
							$uservalidgamesid = $qData['gamesid'] ;
							if($qData['level']==3) $uservalidpoint = $qData['point'];
							else {
								$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
								return $data;
							}
						}else {
							$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
							return $data;
						}
						if($uservalidpoint==0) {
						$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
						return $data;
						}
												 
						if($uservalidgamesid!=$gamesid)  {
										$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
										return $data;
						}
								 
						if($uservalidpoint==0) {
							$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
							return $data;
						}
						if($arrCodeid){
							$processswap = false;
							foreach($arrCodeid as $key => $val){
								$arrSetBadges[$val] = $arrBadgesid[$val];
							}
							if($arrSetBadges){
									foreach($arrSetBadges as $codeid => $badgesid){
									$qInsertBadgesDoubleNothing[$codeid] = "
									INSERT INTO  double_or_nothing_badges ( `badgesid`, `codeid`, `doubleid`, `userid`, `created_date`, `n_status`,mark) 
									VALUES  ('{$badgesid}','{$codeid}','{$doubleid}','{$this->uid}','{$createddate}',0,'{$arrMarkid[$codeid]}') ";
									$qUpdateMyBadges[$codeid] = " UPDATE my_badges SET n_status=6 WHERE codeid='{$codeid}' AND userid={$this->uid} AND mark='{$arrMarkid[$codeid]}' LIMIT 1 ";
								}
								if($qUpdateMyBadges){
									$keepingprocess  =false;
									 foreach($qUpdateMyBadges as $key => $val){
										$this->apps->query($qInsertBadgesDoubleNothing[$key]);
										if($this->apps->getLastInsertId()) {
											$keepingprocess[$key] = true;
											$this->apps->query($qUpdateMyBadges[$key]); 
										}else $keepingprocess[$key] = false;
										
									}
										if($keepingprocess){
											if(!in_array(false,$keepingprocess)){ 
												// $this->apps->notificationHelper->notif_log(13,0,$this->uid);
												 $processswap = true;
											}
										}
										 
								}
							} 
							$mypoint = intval($uservalidpoint);
							
							if($processswap){
							//if changes process ok
								$sql =" UPDATE double_or_nothing SET n_status = 1,opponentpoint={$mypoint},token=\"{$token}\",modified_date='{$datetimes}' WHERE id = {$doubleid} AND opponentid={$this->uid} ";
								 
								if($this->apps->query($sql)){
									//change all badges influences status of double or nothing to 1
									//cek you are winner
									//if winner
									if($mypoint>$userpoint){
									//if active all status open 0 
											//give badges to this user
												if($challengeArrSetBadges){ 
													//revert opponent badges to you
													foreach($challengeArrSetBadges as $codeid => $badgesid){
														$rollbackbadgesloser[$codeid] = " UPDATE my_badges SET n_status=1,userid={$this->uid},mark={$userid}  WHERE n_status=6 AND codeid={$codeid} AND userid={$userid}   LIMIT 1 ";
														
													}
													if($rollbackbadgesloser){
														$this->logger->log(' player win : '.json_encode($rollbackbadgesloser));
														foreach($rollbackbadgesloser as $key => $val){
															 
																$this->apps->query($rollbackbadgesloser[$key]); 
																sleep(1);
														}
													}
												}
												
												if($arrSetBadges){ 
													//revert opponent badges to you
													foreach($arrSetBadges as $codeid => $badgesid){
														$revertbadgesloser[$codeid] = " UPDATE my_badges SET n_status=1 WHERE n_status=6 AND codeid={$codeid} AND userid={$this->uid} AND mark<>{$this->uid}  LIMIT 1 ";
														
													}
													if($revertbadgesloser){
														$this->logger->log(' challenger lose : '.json_encode($revertbadgesloser));
														foreach($revertbadgesloser as $key => $val){
															 
																$this->apps->query($revertbadgesloser[$key]); 
															 	sleep(1);
														}
													}
												}
												$data['result']= true;
												$data['code'] = 1; 
												$data['message'] = "Kamu memenangkan tantangan Double or Nothing!";

												//send notification
												$this->apps->notificationHelper->notif_log(18,0,$this->uid);
												sleep(1);
												$this->apps->notificationHelper->notif_log(19,$this->uid,$userid);

												//send mail
												$to = $this->apps->notificationHelper->checkUser($this->uid);
												$from = $this->apps->notificationHelper->checkUser($userid);

												//winner mail
												$mail['email']=$to['email'];
												$mail['name']=$to['name'];
												$mail['subject'] = "Kamu memenangkan tantangan Double or Nothing!";
												$mail['msg']=$this->apps->notificationHelper->email_template(
					    						array(
					    							'username'=>$to['name'],
													'message'=>"<p>Selamat! Kamu memenangkan tantangan Double or Nothing! Kamu berhak memiliki 3 badges temanmu. Lihat tambahan badge yang kamu dapat dengan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
															"
					    						));
						
												$this->apps->notificationHelper->send_mail($mail);

												//sleep(1);

												//loser mail
												$mail = array();
												$mail['email']=$from['email'];
												$mail['name']=$from['name'];
												$mail['subject'] = "Oh, tidak! Kamu kehilangan 3 badges di Double or Nothing!";
												$mail['msg']=$this->apps->notificationHelper->email_template(
					    						array(
					    							'username'=>$from['name'],
													'message'=>"<p>".$to['name']." baru saja memenangkan tantangan Double or Nothing darimu, membuatmu terpaksa kehilangan 3 badges milikmu! Lihat koleksi badge-mu sekarang dengan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
															"
					    						));
						
												$this->apps->notificationHelper->send_mail($mail);
												
												
												sleep(1);
												$sql ="UPDATE double_or_nothing_badges SET n_status = 1 WHERE doubleid='{$doubleid}'  ";
												$this->apps->query($sql);
												
												return $data;
									}else{		
									//else
										//give badges to oppnent
											//revert this user badges to opponent
												if($arrSetBadges){ 
													//revert opponent badges to you
													foreach($arrSetBadges as $codeid => $badgesid){
														$revertbadgesloser[$codeid] = " UPDATE my_badges SET n_status=1,userid={$userid},mark={$this->uid} WHERE n_status=6 AND codeid={$codeid} AND userid={$this->uid}  LIMIT 1 ";
														
														
													}
													if($revertbadgesloser){
													$this->logger->log(' player lose : '.json_encode($revertbadgesloser));
														foreach($revertbadgesloser as $key => $val){
															 
																$this->apps->query($revertbadgesloser[$key]); 
															 sleep(1);
														}
													}
												}
												
												if($challengeArrSetBadges){ 
													//revert opponent badges to you
													foreach($challengeArrSetBadges as $codeid => $badgesid){
														$rollbackbadgesloser[$codeid] = " UPDATE my_badges SET n_status=1 WHERE n_status=6 AND codeid={$codeid} AND userid={$userid} AND mark<>{$userid} LIMIT 1 ";
														
													}
													if($rollbackbadgesloser){
														$this->logger->log(' challanger win : '.json_encode($rollbackbadgesloser));
														foreach($rollbackbadgesloser as $key => $val){
															 
																$this->apps->query($rollbackbadgesloser[$key]); 
															 sleep(1);
														}
													}
												}
												$data['result'] = true;
												$data['code'] = 1; 
												$data['message'] = "Oh, tidak! Kamu kehilangan 3 badges di Double or Nothing!";
												
												//send notification
												$this->apps->notificationHelper->notif_log(18,0,$userid);
												sleep(1);
												$this->apps->notificationHelper->notif_log(19,$userid,$this->uid);

												//send mail
												$to = $this->apps->notificationHelper->checkUser($this->uid);
												$from = $this->apps->notificationHelper->checkUser($userid);

												//winner mail
												$mail['email']=$from['email'];
												$mail['name']=$from['name'];
												$mail['subject'] = "Kamu memenangkan tantangan Double or Nothing!";
												$mail['msg']=$this->apps->notificationHelper->email_template(
					    						array(
					    							'username'=>$from['name'],
													'message'=>"<p>Selamat! Kamu memenangkan tantangan Double or Nothing! Kamu berhak memiliki 3 badges temanmu. Lihat tambahan badge yang kamu dapat dengan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
															"
					    						));
						
												$this->apps->notificationHelper->send_mail($mail);

												//sleep(1);

												//loser mail
												$mail = array();
												$mail['email']=$to['email'];
												$mail['name']=$to['name'];
												$mail['subject'] = "Oh, tidak! Kamu kehilangan 3 badges di Double or Nothing!";
												$mail['msg']=$this->apps->notificationHelper->email_template(
					    						array(
					    							'username'=>$to['name'],
													'message'=>"<p>".$from['name']." baru saja memenangkan tantangan Double or Nothing darimu, membuatmu terpaksa kehilangan 3 badges milikmu! Lihat koleksi badge-mu sekarang dengan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
															"
					    						));
						
												$this->apps->notificationHelper->send_mail($mail);
												
												sleep(1);
												$sql ="UPDATE double_or_nothing_badges SET n_status = 1 WHERE doubleid='{$doubleid}'  ";
												$this->apps->query($sql);
												
												
												return $data;
									}
								}
							}else{
								//else
								$data['code'] = 3; 
								$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
								return $data;
							}
						}else {
								//else
								$data['code'] = 3; 
								$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
								return $data;
								
						}
					//else
					}else{
						//else
							$data['code'] = 3;
							$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
							return $data;
					}
					
			 
			}else{
						 
						$data['code'] =4;
						$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
						return $data;
			}
		}else{
				$data['code'] =3;
				$data['message'] = " kamu sudah pernah melakukan tantangan ini ";
				return $data;
			}
		return $data;
	}
	
	function getListUserDoubleOrNothing($start=0,$limit=3){
		/*
			this algoritme not used
		// get user where add to double or nothing tables
		// list all user on DON board  	// 	opponentid have but not you, userid not  // set on opponent trigger button DON
		// list user dare to you		// 	opponentid have , userid you
		*/
		
		// list all user not have play less than 7 time in games
		$data['result']=false;
		$data['code']=0;
		$data['message']=" you dont have opponent list ";
		$data['data']=array();
		$token = $this->apps->_g('token');
		 
		$decrypt = unserialize(urldecode64($this->apps->_g('token')));
		
		if(!is_array($decrypt)) return $data;
		$gamesid = 0;
		if(array_key_exists('gamesid',$decrypt))$gamesid	=intval($decrypt['gamesid']);	
		if(array_key_exists('userid',$decrypt)) $userid	=intval($decrypt['userid']);	
		if($gamesid==0)	return $data;
		if($userid!=$this->uid)	return $data;
		if(!in_array($gamesid,$this->gamesarrayid))return $data;
		
			
		$datetimes = date('Y-m-d');
		$sql = "SELECT * FROM my_badges WHERE userid={$this->uid} AND DATE(redeem_date) = '{$datetimes}' AND n_status = 1 ORDER BY id DESC LIMIT 3 ";
		$qData = $this->apps->fetch($sql,1);
		
		// if(!$qData) return $data;
		
		$sql = "
			SELECT sm.id opponentid,  sm.name   names,sm.image_profile,IF(gg.total IS NULL,0,gg.total) total, {$gamesid} gamesid,0 takechallanges, 0 doubleid
			FROM social_member sm 	
			LEFT JOIN ( 
					SELECT count(*) total,
					g.userid 
					FROM my_games g 
					WHERE 
					g.gamesid = {$gamesid}
					AND DATE(g.datetimes) = '{$datetimes}'
					AND g.n_status = 1 
					GROUP BY g.userid,g.gamesid
					HAVING count(*) < 7 ) gg ON gg.userid = sm.id
			WHERE 
				 sm.n_status = 1 AND sm.id <> {$this->uid} AND sm.name <> ''  
				 AND NOT EXISTS ( SELECT opponentid FROM double_or_nothing dn WHERE dn.opponentid=sm.id AND dn.n_status=0 AND DATE(created_date)='{$datetimes}' GROUP BY dn.opponentid ) 
			LIMIT {$start},{$limit}
			
			";
		$challangerdata = $this->hasChallenger($gamesid,$userid,$datetimes);
		// pr($challangerdata);
		if($challangerdata){
			if($challangerdata['result']){
				$sql = "
				SELECT 
					dn.id doubleid,
					dn.userid opponentid,
					 sm.name  names,
					sm.image_profile,
					dn.userpoint total, 
					{$gamesid} gamesid,1 takechallanges
				FROM double_or_nothing dn
				LEFT JOIN social_member sm  ON sm.id = dn.userid	
				WHERE dn.opponentid={$this->uid} AND dn.n_status = 0 AND dn.gamesid = {$gamesid} AND DATE(dn.created_date)='{$datetimes}' 
				AND	 sm.n_status = 1  AND sm.name <> ''  
				LIMIT {$start},{$limit}						
				";					
				
			}
		} 
			
		 
	
		$qData = $this->apps->fetch($sql,1);
			// pr($sql); 
		if($qData){
			
			foreach($qData as $key => $val){
					$userdata['opponentid'] = 0;
					$userdata['doubleid'] = $val['doubleid'];
					$userdata['playtimelist'] = date("YmdHis");
					$userdata['userid'] = $this->uid;
					$userdata['gamesid'] = 0;
					$userdata['takechallanges'] = 4;
					$qData[$key]['profile'] = $this->apps->userHelper->getimagefullpath($val,'image_profile','profile');
					$userdata['opponentid'] = $qData[$key]['opponentid'];
					$userdata['gamesid'] = $qData[$key]['gamesid'];
					$userdata['takechallanges'] = $qData[$key]['takechallanges']; 
					$qData[$key]['encrypted'] = urlencode64(serialize($userdata));					
					$qData[$key]['encryptedchallanges'] = urlencode64(serialize($userdata));
					$userdata['takechallanges'] = 3;
					$qData[$key]['encryptednotchallanges'] = urlencode64(serialize($userdata));
			}
			
			$data['result']=true;
			$data['code']=1;
			$data['message']=" success retrieve list ";
			$data['data']=$qData;// pr($qData);
			// pr($qData);
			return $data;
		} 
		return $data;
		 
	}
	
	
	
	function getTodayHiddenCode(){
		
		global $CONFIG;
		
		$user = $this->apps->user;
		$totalPerDayCode = intval($CONFIG['HIDDENCODELIMIT']);
		$datetimes = date("Y-m-d H:i:s");
		$gamesid= $this->hiddencodegamesid;
		// gamesid 3  : is hidden code games
		// get user has been win this games
		$sql = "SELECT COUNT(1) total FROM my_games WHERE gamesid={$gamesid} AND userid={$this->uid} AND DATE(datetimes)=DATE('{$datetimes}') GROUP BY gamesid ";
		$qData = $this->apps->fetch($sql);
		// $this->logger->log($sql);
		$this->logger->log($sql);
		$this->logger->log(" get today hidden code: ".json_encode($qData));
		if(!$qData) {
			//get history data user has got hidden code > 50 , must less than 50 times per day
			$sql = "SELECT COUNT(1) total FROM my_games WHERE gamesid={$gamesid} AND DATE(datetimes)=DATE('{$datetimes}') GROUP BY gamesid ";
			$qData = $this->apps->fetch($sql);
			// pr($qData);
			$total = 0;
			if($qData)$total = intval($qData['total']);
			
			$this->logger->log(" get hidden code 50 times : ".$sql);
			$this->logger->log(" get hidden code 50 times : ".json_encode($qData));
			if($total<$totalPerDayCode) {
				
				$totalwingames = intval($qData['total']);
				$this->logger->log(" check : ".$totalwingames);
				if($totalwingames<=$totalPerDayCode){
					//get letter hidden code this day
					$sql = " 
					SELECT id, code maskcode ,code_channel,code_sub_channel
					FROM   badges_code public
					WHERE 
					code_channel='games' 
					AND code_sub_channel='gamesellusive'  
					AND n_status = 1 
					AND code_type = 1 
					AND NOT EXISTS ( SELECT codeid FROM my_badges inv WHERE  inv.codeid = public.id AND inv.userid = {$this->uid} )
					ORDER BY rand() 
					LIMIT 1" ;
					// pr($sql);
					$this->logger->log(" query get code public : ".$sql);
					$qData = $this->apps->fetch($sql);
					
						if($qData){
							$this->logger->log($qData['id']);
							// cek apakah user sudah memiliki kode ini sebelumnya
							$sql = "SELECT id FROM  my_badges WHERE userid = {$user->id} AND codeid = {$qData['id']} LIMIT 1";
							// pr($sql);
							$result = $this->apps->fetch($sql);
							$this->logger->log($sql);
							$this->logger->log(json_encode($result));
							if(!$result){
								$getLastOldToken = $this->getLastOldToken();
									$salt = "gameapihelper";
								$qData['token'] = sha1($this->uid.date("YmdHi").$getLastOldToken."true{".$salt."}");
								return $qData;
							}
						}
				}
			}
			
		}
		return false;
		
	}
	
	
	
	function ValidateHiddenCode()
	{	
		global $CONFIG, $LOCALE;
		$data['message'] = " sorry you dont have previl ";
		$data['code'] = 0;
		$data['images'] = "";
		$data['result'] = false;
		$totalPerDayCode = intval($CONFIG['HIDDENCODELIMIT']);
		$date = date('Y-m-d H');
		$dateTime = date('Y-m-d H:i:s');
		$datetimes =  date('Y-m-d H:i:s');
		$getUrl = $this->apps->_request('param');
		// cek tabel log apakah user sudah pernah dapat hiddencode hari ini atau belum
		$parseUrl = unserialize(urldecode64($getUrl));
		$gamesid= $this->hiddencodegamesid;
		
		$getLastOldToken = $this->getLastOldToken();
		
		$salt = "gameapihelper";
		 
		if (is_array($parseUrl)){

			$userid=$parseUrl['userid'] ;

			$token = $parseUrl['token'];
			
			if(!$token){
				$data['message'] = "your token mismatch";
				return $data;
			}
			 
			$mytoken = sha1($this->uid.date("YmdHi").$getLastOldToken."true{".$salt."}");
			$mytokentolerance = sha1($this->uid.date("YmdHi",strtotime(date("YmdHi")." -1 minute ")).$getLastOldToken."true{".$salt."}"); /* tolerance 1 minute */
			 
			if($this->uid==0){
				$data['message'] = " your id not found ";
				return $data;
			}
			 
			if($this->uid!=$userid){
				$data['message'] = " your id wrongss ";
				return $data;
			}
			  
				$this->logger->log('phase 2b: token '.$token.' '.$mytoken.', tolerance: '.$mytokentolerance.' using token concat this = '.$this->uid.date("YmdHi").$getLastOldToken."true{".$salt."}");
			if($token!=$mytoken) {
				if($token!=$mytokentolerance) {
					$data['message'] = " token failed ";
					return $data;
				}
			}
		
		}
		
		// get user has been win this games
		$sql = "SELECT COUNT(1) total FROM my_games WHERE gamesid={$gamesid} AND userid={$this->apps->user->id} AND DATE(datetimes)=DATE('{$datetimes}') GROUP BY gamesid ";
		$qData = $this->apps->fetch($sql);
		 
		$this->logger->log($sql);
		 
		if(!$qData) {
		
			//get history data user has got hidden code > 50 , must less than 50 times per day
			$sql = "SELECT COUNT(1) total FROM my_games WHERE gamesid={$gamesid} AND DATE(datetimes)=DATE('{$datetimes}') GROUP BY gamesid ";
			$qData = $this->apps->fetch($sql);
			// pr($sql);
			$total = 0;
			if($qData)$total = intval($qData['total']);
			if($total<$totalPerDayCode) {
			
		 
						if (is_array($parseUrl)){
					
							if ($parseUrl['userid'] == $this->apps->user->id){
							
								if ($parseUrl['token']){ 
									$iscommonbadges = 1;
									$source =$parseUrl['code']['code_channel'].' '.$parseUrl['code']['code_sub_channel'];
									
									//check source type
									$sql = "SELECT * FROM {$this->config['DATABASE_WEB']}.badges_source_type WHERE name = '{$source}' and n_status = '1'  LIMIT 1";
									 
									$qSource = $this->apps->fetch($sql);
									if(!$qSource){
											$data['message'] = $this->locale[1]['badge_source_type_invalid'];
											$data['code'] =10;
											return $data;
									}
									
									$sourceType = intval($qSource['id']);
									if($sourceType<=0){
											$data['message'] = $this->locale[1]['badge_code_invalid'];
											$data['code'] =11;
											return $data;
									}
									$sql = "SELECT * FROM {$this->config['DATABASE_WEB']}.badges_code WHERE code = '{$parseUrl['code']['maskcode']}' and n_status = '1' AND code_type={$iscommonbadges} LIMIT 1";
									 	$res = $this->apps->fetch($sql);
	 
									if ($res){
									
									$masterbBadges = $this->apps->badgesHelper->masterbBadges();
									$randcodeidmekans = $this->apps->badgesHelper->randomcodegen($masterbBadges);
									$this->logger->log("before : ");
									if($randcodeidmekans!=false) $badgesid=$randcodeidmekans;
									$this->logger->log("after : ".$badgesid);
							  
									// cek apakah user sudah memiliki kode ini sebelumnya
									$sql = "SELECT id FROM  my_badges WHERE userid = {$this->apps->user->id} AND codeid = {$parseUrl['code']['id']} LIMIT 1";
									$result = $this->apps->fetch($sql);
									$this->logger->log($sql);
									if ($result){
										$data['message'] = " your already redeem this event ";
										return $data; 
									}
									
									// $saved = $this->savetoinventory($win,$checkCode['data']);
									// if ($saved)
									$point = 10;
									$dateTime = date('Y-m-d H:i:s');
										$sql = " INSERT INTO my_games 
										( 	gamesid ,	userid 	,point 	,datetimes, 	n_status ,token,win) 
										VALUES ({$gamesid},{$this->uid},{$point},'{$dateTime}',1,'{$token}',1)";		
								
									$res = $this->apps->query($sql);
									
									if($this->apps->getLastInsertId()!=0){
									// if($saved){
																	
										$sql = "INSERT INTO  my_badges (userid, badgesid,codeid, n_status ,redeem_date,sourceType)
											VALUES ({$this->uid}, {$badgesid},  {$parseUrl['code']['id']},  1 ,'{$dateTime}','{$sourceType}')";
										
										$this->apps->query($sql);
										// pr($sql);
										  
										$data['images'] = $masterbBadges[$badgesid]['image'];
										$data['message'] = "the {$masterbBadges[$badgesid]['name_display']} badge ";
										//$data['message'] = "you get {$masterbBadges[$badgesid]['name']} badges ";
										$data['code'] =1;
										$data['result'] =true;
		 
										return $data;
										
									}else{
										$data['message'] = " sorry failed to save badgeds	";
										return $data;
									}
									
								 }else {
										$data['message'] = " sorry the badges not founds ";
										return $data; 
								 }
								}else{
									$data['message'] = " token not found ";
									return $data; 
								}
								
							}else{
								$data['message'] = " your credential id not correct ";
								return $data; 
							}
							
						}else{
							$data['message'] = " your credential not correct ";
								return $data; 
						}
						 
			}else{
					$data['message'] = " total user redeem hidden badges already reach limit ";
					return $data; 
					 
			}
		}
		return $data;
	}
	
	function setplaydates($fromapi="getuser"){
		
		$datetimes = date("Y-m-d H:i:s");
		 
		if($fromapi=='getuser'){
			$sql = " 
			INSERT INTO `my_games_point_bytime` 
			(`userid`, `startdates`, `enddates`, `point`, `n_status`) 
				VALUES 
			( '{$this->uid}', '{$datetimes}', '', '0', '0') 
			
			";
			$this->apps->query($sql);
		}
		if($fromapi=='savedata'){
			$sql = " SELECT * FROM my_games_point_bytime WHERE n_status = 0 AND userid={$this->uid} ORDER BY id DESC LIMIT 3 ";
			
			$qData = $this->apps->fetch($sql,1);
			if($qData&&(COUNT($qData)>=2)){				
				$theid = $qData[1]['id'];
				
				$points = ( strtotime( $datetimes )   - strtotime( $qData[1]['startdates']) );
				$sql = " 
					UPDATE `my_games_point_bytime` 
						SET `enddates` = '{$datetimes}', `point` = '{$points}', `n_status` = '2' 
					WHERE `userid` = {$this->uid} AND id={$theid}  AND n_status = 0
					";
				$this->apps->query($sql);
				
				if(COUNT($qData)==3){
					$theid = $qData[2]['id'];
					$sql = " 
					UPDATE `my_games_point_bytime` 
						SET `enddates` = NOW(), `point` = '0', `n_status` = '1' 
					WHERE `userid` = {$this->uid} AND id>={$theid} AND n_status = 0
					";
					$this->apps->query($sql);
				}
			}
		} 
		
	}
	
	 function hasChallenger($gamesid,$userid,$datetimes){
		$data['result'] = false;
		$data['challengerpoint'] = 0;
		$data['challengerid'] = 0;
		$data['gamesid'] = 0;
		 
		$sql = "SELECT * FROM `double_or_nothing` WHERE opponentid={$this->uid} AND n_status = 0 AND gamesid = {$gamesid} AND DATE(created_date)='{$datetimes}' ORDER BY id DESC LIMIT 1 ";
		
		$qData = $this->apps->fetch($sql);
		// pr($sql);
		if($qData){
			$data['result'] = true;
			$data['challengerpoint'] = $qData['userpoint'];
			$data['challengerid'] = $qData['userid'];
			$data['gamesid'] =  $qData['gamesid'];
		}
		return $data;
	 }
	 
	 function passDoubleOrNothing(){
		$data['result'] = false;
		$data['challengerpoint'] = 0;
		$data['challengerid'] = 0;
		$data['gamesid'] = 0;
		
		$decrypt = unserialize(urldecode64($this->apps->_g('token')));  
		// pr($decrypt);
		if(!is_array($decrypt)) {
			$data['message'] = " token not founds ";
			return $data;
		}
		$userid =  intval($decrypt['opponentid']);	 
		$gamesid = intval( $decrypt['gamesid']);
		$doubleid = intval( $decrypt['doubleid']);
		
		if(!in_array($gamesid,$this->gamesarrayid)) {
						$data['message'] = " gamesid not found ";
						return $data;
				}			
		 
		if($userid==0) {
						$data['message'] = " opponent not found ";
						return $data;
				}
		$datetimes= date("Y-m-d");
		$sql = "UPDATE `double_or_nothing` SET modified_date='{$datetimes}',n_status = 1 WHERE opponentid={$this->uid} AND n_status = 0 AND gamesid = {$gamesid} AND userid ={$userid} AND id='{$doubleid}' ORDER BY id DESC LIMIT 1 ";
		
		$qData = $this->apps->query($sql);
		// pr($sql);
		if($qData){
			$data['result'] = true;
			$data['challengerpoint'] = $qData['userpoint'];
			$data['challengerid'] = $qData['userid'];
			$data['gamesid'] =  $qData['gamesid'];
		}
		return $data;
	 }
	
	
	function freeuserdoubleornothing(){
			global $CONFIG;

			$expireddate = date("Ymd",strtotime(date("Ymd")." -2 day "));
			$datetimes = date("Y-m-d H:i:s");
			$sql ="UPDATE double_or_nothing SET modified_date='{$datetimes}',n_status = 1 WHERE DATE(created_date)<'{$expireddate}' AND n_status =  0 ";
			$qData_r = $this->apps->query($sql);
			
			$sql ="UPDATE double_or_nothing_badges SET n_status = 1 WHERE DATE(created_date)<'{$expireddate}' AND n_status = 0 ";
			$qData = $this->apps->query($sql);
			
			$sql ="UPDATE my_badges SET n_status = 1 WHERE DATE(redeem_date)<'{$expireddate}' AND n_status=  6 ";
			$qData = $this->apps->query($sql);
			
			
			$sql =  "SELECT d.*,s.name,s.email FROM double_or_nothing d
					LEFT JOIN social_member s
					ON s.id = d.userid
					WHERE d.modified_date='{$datetimes}' AND d.n_status =  1";
			$rs = $this->apps->fetch($sql,1);

			if($rs){
				foreach ($rs as $key => $value) {
					$this->apps->notificationHelper->notif_log(21,$value['opponentid'],$value['userid']);
					//get opponent name
					$sql = "SELECT name FROM social_member WHERE id={$value['opponentid']} LIMIT 1";
					$opp = $this->apps->fetch($sql);

					//get my name
					$sql = "SELECT name FROM social_member WHERE id={$value['userid']} LIMIT 1";
					$user = $this->apps->fetch($sql);

					$mail = array();
					$mail['email']=$val['name'];
					$mail['name']=$val['email'];
					$mail['subject'] = "Tantangan Double or Nothing untuk ".$user['name']." telah otomatis dibatalkan!";

					$mail['msg']=$this->apps->notificationHelper->email_template(
		    						array(
		    							'username'=>$mail['email'],
										'message'=>"<p>Dikarenakan tidak ada respon dari ".$opp['name'].", tantangan Double or Nothing telah otomatis dibatalkan. Undangan tantangan Double or Nothing hanya berlaku 48 jam terhitung setelah dikirimkan.</p>
														<p>Kirimkan tantangan Double or Nothing lainnya ke temanmu untuk merebut 3 badges miliknya! Langsung log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a> sekarang juga!</p>"
		    						));
			
					$this->apps->notificationHelper->send_mail($mail);

				}
				
			}
			
	}
}

?>

