<?php 


class tradeHelper {
	function __construct($apps){
		global $logger,$CONFIG,$LOCALE,$notif;
		$this->logger = $logger;
		$this->apps = $apps;
		
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
		$this->config = $CONFIG;
		$this->locale = $LOCALE;
	}
	
	function replace_hashtags($string,$replace){
		preg_match_all('/#(\w+)/',$string,$findHashWord);

		foreach ($findHashWord[1] as $key => $value) {
			$result = preg_replace('/#([\w-]+)/i', '<b>'.$replace[$value].'</b>', $string);
		}
	    
	    return $result;
	}

	function alltrade($start=0,$limit=3,$find=null,$give=null,$sort_by=mull,$sort_AZ=0){
		$findFilter="";
		$giveFilter="";
		$findLocale = false;
		$sortBy="trd.published_date";
		
		
		// $qnonuser = " AND trd.creator <> {$this->uid} ";
		$qnonuser = "  ";
		
		if($sort_by){
			if($sort_AZ){
				$ascDesc="ASC";
			}else{
				$ascDesc = "DESC";
			}
			switch ($sort_by) {
				case 'published_date':
					$sortBy="trd.published_date";
					break;
				case 'name':
					$sortBy="sm.name";
					break;
				case 'status':
					$sortBy="trading_status";
					break;
				
				default:
					$sortBy="trd.published_date";
					break;
			}
		}else{
			$ascDesc = "DESC";
		}

		if($find){
			$findFilter = "AND trd.offer IN ({$find})";
			$findLocale = true;
			$list_badge = $this->getBadgeDetails($find);
			$list_badge_name = '';
			foreach ($list_badge as $key => $value) {
				if($key!=0) $list_badge_name .=', ';
				$list_badge_name .= $value['name'];
			}
		}
		if($give){
			$idsGiveBadges=array();
			$sql = "SELECT id,request FROM trades trd
					WHERE n_status=1 {$qnonuser} ";
			$rs = $this->apps->fetch($sql,1);
			$give = explode(',', $give);

			foreach ($rs as $key => $value) {
				$check = false;
				$rs_offer = explode(',', $value['request']);
				foreach ($give as $k => $v) {
					foreach ($rs_offer as $kk => $vv) {
						if($v==$vv){
							$check=true;
						}
					}
				}
				if($check==true){
					$idsGiveBadges[]=$value['id'];
				}
			}

			$idsGiveBadges = implode(',', $idsGiveBadges);
			
			$giveFilter = "AND trd.id IN ({$idsGiveBadges})";
		}

		$sql ="SELECT trd.*, DATE_FORMAT(trd.published_date,'%d %M %Y') AS formatted_date, sm.name, sm.last_name,{$this->uid} currentactiveuser,
				IFNULL(assa.badgesid,0) AS trading_status
				FROM trades trd
				LEFT JOIN social_member sm
				ON trd.creator = sm.id
				LEFT JOIN (SELECT badgesid FROM my_badges WHERE userid = {$this->uid} AND n_status=1 ) assa
                ON  assa.badgesid = trd.request
				WHERE trd.n_status = 1 {$qnonuser} 
				{$findFilter} {$giveFilter}
				GROUP BY trd.id
				ORDER BY {$sortBy} {$ascDesc} LIMIT {$start},{$limit}";
		$rs = $this->apps->fetch($sql,1);

		//pr($sql);exit;
		// pr($rs);exit;
		
		if($rs){
			foreach ($rs as $key => $value) {
				$rs[$key]['offer_badges'] = $this->getBadgeDetails($value['offer']);
				$rs[$key]['request_badges'] = $this->getBadgeDetails($value['request']);
				//$rs[$key]['trading_status'] = $this->checkMyBadges($value['request']);
			}
			$sql ="SELECT COUNT(trd.id) total
				FROM trades trd
				LEFT JOIN social_member sm
				ON trd.creator = sm.id
				WHERE trd.n_status = 1
				 {$qnonuser} 
				{$findFilter} {$giveFilter}
				LIMIT 1";
			$rstotal = $this->apps->fetch($sql);
		}
		
		if($rs){
			return array('status'=>1,'data'=>$rs,'total'=>$rstotal['total']);
		}else{
			if($findLocale==true) $dynamic_locale = $this->replace_hashtags($this->locale[1]['no_trade_found'],array('nama_badge'=>$list_badge_name));
			else $dynamic_locale = $this->locale[1]['no_trade_available'];

			return array('status'=>0,'msg'=>$dynamic_locale);
		}
				
	}

	function myTrade($start=0,$limit=3,$active=false){
		$n_status = "trd.n_status IN (1,2,0)";
		if($active){
			$n_status = "trd.n_status IN (1)";
		}

		$sql ="SELECT trd.*, 
				DATE_FORMAT(trd.published_date,'%d %M %Y') AS formatted_date, sm.name, sm.last_name
				FROM trades trd
				LEFT JOIN social_member sm
				ON trd.creator = sm.id
				WHERE {$n_status}
				AND trd.creator = {$this->uid}
				ORDER BY trd.published_date DESC LIMIT {$start},{$limit}";
		$rs = $this->apps->fetch($sql,1);
		if($rs){
			foreach ($rs as $key => $value) {
				$rs[$key]['offer_badges'] = $this->getBadgeDetails($value['offer']);
				$rs[$key]['request_badges'] = $this->getBadgeDetails($value['request']);
				$rs[$key]['trading_status'] = $this->checkMyTrades($value['id']);
			}
			$sql ="SELECT COUNT(trd.id) total
				FROM trades trd
				LEFT JOIN social_member sm
				ON trd.creator = sm.id
				WHERE {$n_status}
				AND trd.creator = {$this->uid}
				LIMIT 1";
			$rstotal = $this->apps->fetch($sql);
		}
		if($rs){
			return array('status'=>1,'data'=>$rs,'total'=>$rstotal['total']);
		}else{
			return array('status'=>0,'msg'=>$this->locale[1]['you_dont_have_any_trade_yet']);
		}
	}

	function getBadgeDetails($id=null){
		$id = explode(',', $id);
		asort($id);
		foreach ($id as $key => $value) {
			$sql ="SELECT *
				FROM badges WHERE id = {$value} LIMIT 1";
			$rs[$key] = $this->apps->fetch($sql);
			$rs[$key]['nextID'] = $id[$key+1];
		}
		return $rs;
	}

	function checkMyBadges($badgeID=null){
		$sql = "SELECT *
				FROM my_badges
				WHERE badgesid IN ({$badgeID}) 
				AND userid = {$this->uid}
				AND n_status=1 LIMIT 1";
		//dpr($sql);exit;
		$rs = $this->apps->fetch($sql);

		if($rs)return 1;
		else return 0;
	}

	function checkMyTrades($tradeID=null){
		$sql = "SELECT th.*, DATE_FORMAT(th.trade_date,'%d %M %Y') AS formatted_date, sm.name, sm.last_name
				FROM trades_history th
				LEFT JOIN social_member sm
				ON th.traderid = sm.id
				WHERE th.tradeid = {$tradeID} AND th.n_status = 1 LIMIT 1";
		
		$rs = $this->apps->fetch($sql);

		if($rs)return $rs;
		else return 0;
	}

	function tradeBadgesConfirmation($tradeID=null){
		$sql = "SELECT * FROM trades 
				WHERE id={$tradeID} 
				AND n_status = 1 
				AND creator <> {$this->uid} LIMIT 1";
		$trade_rs = $this->apps->fetch($sql);

		if($trade_rs){
			$trade_rs['offer_badges'] = $this->getBadgeDetails($trade_rs['offer']);
			$trade_rs['request_badges'] = $this->getBadgeDetails($trade_rs['request']);
		}

		return $trade_rs;
	}

	function populateMark(){
		// $sql = "SELECT * FROM my_badges WHERE userid = {$this->uid} AND mark = 0";
		// $rs = $this->apps->fetch($sql,1);
		// if($rs){
		// 	foreach ($rs as $key => $value) {
		// 		$value['mark']=intval($value['mark']);
		// 		if($value['mark']==0){
					$qry = "UPDATE my_badges 
								SET mark={$this->uid}
								WHERE userid={$this->uid} AND mark = 0";
					$this->apps->query($qry);

		// 		}
		// 	}
		// }


	}

	function tradeBadges($tradeID=null){
		//NOTE
		//need to simplify the query to prevent fail bugs.
		
		$sql = "SELECT * FROM trades WHERE id={$tradeID} AND n_status = 1 LIMIT 1";
		$trade_rs = $this->apps->fetch($sql);
		//pr($trade_rs);
		if(!$trade_rs) return array('status'=>0,'msg'=>$this->locale[1]['no_trade']);

		$offer = $this->getBadgeDetails($trade_rs['offer']);
		$request = $this->getBadgeDetails($trade_rs['request']);
		$list_badge_name = '';
		$indexTmpList=0;
		$tmpList = array();
		foreach ($offer as $key => $value) {	
			

			if(in_array($value['id'], $tmpList)){
				$indexTmpList++;
			}else{
				$tmpList[] = $value['id'];

				if($indexTmpList>0){
					$indexTmpList = $indexTmpList+1;
					$count = " (".$indexTmpList.")";
					$list_badge_name .= $count;
					$indexTmpList=0;
				}

				if($key!=0){
					$list_badge_name .=', ';
				}

				$list_badge_name .= $value['name'];
			}
			
		}

		if($indexTmpList>0){
			$indexTmpList = $indexTmpList+1;
			$count = " (".$indexTmpList." badges)";
			$list_badge_name .= $count;
			$indexTmpList=0;
		}

		$list_badge_name = $list_badge_name.',0,'.$request[0]['name'];


		$checkBadges = $this->checkMyBadges($trade_rs['request']);
		//pr($checkBadges);
		if($checkBadges==0) return array('status'=>0,'msg'=>$this->locale[1]['no_badge']);

		$qry = "UPDATE trades
				SET n_status = 2
				WHERE id={$tradeID}";
		
		$uptTrades = $this->apps->query($qry);

		if(!$uptTrades) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);

		$sql="SELECT * FROM my_badges WHERE badgesid = {$trade_rs['request']}
					AND n_status=1 AND userid = {$this->uid} LIMIT 1";
		$rs=$this->apps->fetch($sql);
		
		$qry = "UPDATE my_badges
				SET n_status = 0
				WHERE id = {$rs['id']}";

		$uptMyBadges = $this->apps->query($qry);

		if(!$uptMyBadges) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);

		$badgesCol = explode(",",$trade_rs['offer']);
		
		//cek apakah badge ini pernah punya lw sebelumnya
		$cek = "SELECT * FROM my_badges
				WHERE codeid = {$rs['codeid']}
				AND userid = {$trade_rs['creator']}
				AND n_status IN (0) LIMIT 1";
		$cek_f = $this->apps->fetch($cek);
		//pr($cek_f);
		if(!$cek_f){
			//badge that i trade with
			$qry = "INSERT INTO my_badges (badgesid,codeid,userid,n_status,sourceType,redeem_date,mark)
					VALUES ({$trade_rs['request']},{$rs['codeid']},{$trade_rs['creator']},1,{$rs['sourceType']},NOW(),{$rs['mark']})";
			$insTradeBadges = $this->apps->query($qry);
		}else{
			$qry = "UPDATE my_badges
				SET n_status = 1
				WHERE codeid = {$rs['codeid']}
				AND userid = {$trade_rs['creator']}
				AND n_status=0";
			$insTradeBadges = $this->apps->query($qry);
		}

		if(!$insTradeBadges) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);

		//badge that i get
		foreach ($badgesCol as $key => $value) {
			$sql = "SELECT * FROM my_badges
					WHERE n_status=3 AND userid = {$trade_rs['creator']}
					AND badgesid = {$value} LIMIT 1";
			$check_offer_badge = $this->apps->fetch($sql);
			//pr($check_offer_badge);
			if(!$check_offer_badge) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);

			$qry = "UPDATE my_badges
				SET n_status = 0
				WHERE id = {$check_offer_badge['id']}";
			$uptOfferBadges = $this->apps->query($qry);

			if(!$uptOfferBadges) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);


			$cek = "SELECT * FROM my_badges
				WHERE codeid = {$check_offer_badge['codeid']}
				AND userid = {$this->uid}
				AND n_status=0 LIMIT 1";
			$cek_f = $this->apps->fetch($cek);
			
			if(!$cek_f){
				$qry = "INSERT INTO my_badges (badgesid,codeid,userid,n_status,sourceType,redeem_date,mark)
					VALUES ({$value},{$check_offer_badge['codeid']},{$this->uid},1,{$check_offer_badge['sourceType']},NOW(),{$check_offer_badge['mark']})";
				$insMyBadges = $this->apps->query($qry);
			}else{
				$qry = "UPDATE my_badges
				SET n_status = 1
				WHERE codeid = {$check_offer_badge['codeid']}
				AND userid = {$this->uid}
				AND n_status=0";
				$insMyBadges = $this->apps->query($qry);
			}
			if(!$insMyBadges){
				return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);
			}
			
		}
		
		

		$qry = "INSERT INTO trades_history (tradeid, traderid, trade_date, n_status)
				VALUES ({$tradeID},{$this->uid},NOW(),1)";
		$insTradesHistory = $this->apps->query($qry);

		if(!$insTradesHistory) return array('status'=>0,'msg'=>$this->locale[1]['trade_gagal']);

		return array('status'=>1,'msg'=>$this->locale[1]['trade_success_2'],'opponentid'=>$trade_rs['creator'],'list_badge'=>$list_badge_name);
	}
	
	function makeTradeConfirmation($find=null,$give=null){
		$give = explode(',', $give);
		$giveArr = array();
		$rs = array();
		foreach ($give as $key => $value) {
			$k = $key-1;
			$v = intval($value);
			if($v!=0){
				$tempBadge = $this->getBadgeDetails($key);
				$rs['give'][] = $tempBadge[0];
				$giveArr[] = $v;
			}
		}
		foreach ($rs['give'] as $key => $value) {
			$rs['give'][$key]['total'] = $giveArr[$key];
		}
		$rs['find'] = $this->getBadgeDetails($find);

		return $rs;
	}

	function cancelMyTrade($id=null){
		//check my trade status
		$sql = "SELECT * FROM trades
				WHERE creator = {$this->uid} 
				AND n_status = 1
				AND id = {$id} LIMIT 1";
		$isStillActive = $this->apps->fetch($sql);

		if($isStillActive['id']>0){
			$qry = "UPDATE trades 
						SET n_status = 0
						WHERE id={$isStillActive['id']} AND creator = {$this->uid}";
			if($this->apps->conn==null)$this->apps->open(0);
			$cancelTrade = $this->apps->query_manual($qry);
			if($this->apps->conn==null)$this->apps->close();
			if(!$cancelTrade) return array('status'=>0,'msg'=>$this->locale[1]['cancel_trade_gagal']);

			$badge_offer = explode(',', $isStillActive['offer']);
	if($this->apps->conn==null)$this->apps->open(0);
			foreach ($badge_offer as $key => $value) {
				$qry="UPDATE my_badges
						SET n_status = 1
						WHERE badgesid = {$value} AND userid= {$this->uid}";
			
				$cancelBadgeFlag = $this->apps->query_manual($qry);
			
				if(!$cancelBadgeFlag) return array('status'=>0,'msg'=>$this->locale[1]['cancel_trade_gagal']);
			}
	if($this->apps->conn==null)$this->apps->close();
			return array('status'=>1,'msg'=>$this->locale[1]['cancel_trade']);
		}
		return array('status'=>1,'msg'=>$this->locale[1]['cancel_trade_failed'],'opponentid'=>$trade_rs['creator']);
	}

	function makeTradeProceed($request=null,$offer=null){
		$c_request = intval($request);
		
		if($c_request==0 || $offer==""){
			return array('status'=>0,'msg'=>'Silahkan pilih badge yang akan anda trade terlebih dahulu.');
		}

		// $checkBadges = $this->checkMyBadges($offer);
		// if($checkBadges==0) return array('status'=>0,'msg'=>$this->locale[1]['no_badge']);

		//Check if user doesn't have more than 3 active trade
		$sql = "SELECT COUNT(id) AS total FROM trades 
				WHERE creator = {$this->uid} AND n_status = 1 LIMIT 1";
		$threeActive = $this->apps->fetch($sql);
		if($threeActive['total']>=3) return array('status'=>0,'msg'=>$this->locale[1]['three_active_trade']);

		//get badges id
		$tempBadgeOffer = array();
		$offer = explode(',', $offer);
		foreach ($offer as $key => $value) {
			$v = intval($value);
			if($v!=0){
				while ($value>0) {
					$tempBadgeOffer[] = $key;
					$value--;
				}
				
			}
		}

		$offer = implode(',', $tempBadgeOffer);

		$qry = "INSERT INTO trades (offer,request,creator,created_date,published_date,n_status)
				VALUES ('{$offer}',{$request},{$this->uid},NOW(),NOW(),1)";
			if($this->apps->conn==null)$this->apps->open(0);
		$insTrade = $this->apps->query_manual($qry);
			if($this->apps->conn==null)$this->apps->close();

		if(!$insTrade) return array('status'=>0,'msg'=>$this->locale[1]['bikin_trade_gagal']);
		if($this->apps->conn==null)$this->apps->open(0);
		foreach ($tempBadgeOffer as $key => $value) {
			$sql="SELECT id FROM my_badges WHERE badgesid = {$value}
					AND n_status=1 AND userid = {$this->uid} LIMIT 1";
			$rs=$this->apps->fetch($sql);

			$qry = "UPDATE my_badges
				SET n_status = 3
				WHERE id = {$rs['id']}";
			
			$uptMyBadges = $this->apps->query_manual($qry);
			

			if(!$uptMyBadges) return array('status'=>0,'msg'=>$this->locale[1]['bikin_trade_gagal']);
		}
			if($this->apps->conn==null)$this->apps->close();

		return array('status'=>1,'msg'=>$this->locale[1]['create_trade_success']);
	}
}
?>