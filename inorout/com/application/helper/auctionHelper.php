<?php 


class auctionHelper {
	function __construct($apps){
		global $logger,$CONFIG,$LOCALE;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
		$this->config = $CONFIG;
		$this->locale = $LOCALE;
		$this->turn = 2;
	}
	
	
	function pastauction($start=0, $limit=2){
		$data['result'] = false;
		$data['total'] = 0;
		
			$sql =" 
				SELECT ac.*,mac.userid,sm.name,sm.last_name,sm.image_profile imageprofile 
				FROM auctions ac
				LEFT JOIN my_auctions mac ON mac.auctionid = ac.id
				LEFT JOIN social_member sm ON sm.id = mac.userid				
				WHERE   ac.end_date < NOW() AND ac.n_status = 0  ORDER BY ac.end_date DESC  LIMIT {$start},{$limit} ";
			// pr($sql);
			$qData = $this->apps->fetch($sql,1);
			if($qData){
					
				foreach($qData as $key =>  $val){
					if($key%2) $queue = "even";
					else $queue = "odd";
					$qData[$key]['queue'] = $queue;
					$qData[$key]['auctions'] = $this->apps->userHelper->getimagefullpath($val,'img','auctions');
					$qData[$key]['profile'] = $this->apps->userHelper->getimagefullpath($val,'imageprofile','profile');
					$qData[$key]['content'] = str_replace('\\','',html_entity_decode(strip_tags($val['content'])));
				}
				
				// pr($qData);
				$sql =" 
					SELECT count(1) total
					FROM auctions ac
					LEFT JOIN my_auctions mac ON mac.auctionid = ac.id
					LEFT JOIN social_member sm ON sm.id = mac.userid				
					WHERE   ac.end_date < NOW() AND ac.n_status = 0 ";
				$restotal = $this->apps->fetch($sql);
				
				$data['result'] = $qData;
				$data['total'] = intval($restotal['total']);
				
				return $data;
			}
			return false;
			
	}
	
	function todayauction($start=0, $limit=4,$id=false){
		// search auction by date
		
		$filter = "";
		if ($id) $filter = " AND ac.id = {$id}";
		$data['result'] = false;
		$data['total'] = 0;
		
		$sql =" 
				SELECT ac.* ,op.userid as opponentid
				FROM auctions ac 
				LEFT JOIN (	
					SELECT COUNT(*) total,b.userid,b.auctionid 
					FROM bidding b 						
					WHERE  b.n_status = 1
					GROUP BY b.auctionid
					)	op ON op.auctionid = ac.id
				WHERE  ac.start_date <= NOW() AND  ac.end_date >= NOW() AND ac.n_status = 1 {$filter} LIMIT {$start},{$limit} ";
			
			$qData = $this->apps->fetch($sql,1);
			// pr($sql);
			if($qData){
					
				foreach($qData as $key =>  $val){
					 
					if($key%2) $queue = "even";
					else $queue = "odd";
					$qData[$key]['queue'] = $queue;
					$qData[$key]['auctions'] = $this->apps->userHelper->getimagefullpath($val,'img','auctions');
					$arrdate = explode(' ',$val['end_date']);
					if(!$arrdate){
						 $arrdate[0] = "0000-00-00";
						 $arrdate[1] = "00:00:00";
					}
					
					list($year, $month, $days) = 	explode('-', $arrdate[0]);
					list($hour, $minute, $sec) =  explode(':',$arrdate[1]);
					
					$qData[$key]['auctiondate']['days'] = intval($days);
					$qData[$key]['auctiondate']['month'] = intval($month);
					$qData[$key]['auctiondate']['year'] = intval($year);
					$qData[$key]['auctiondate']['hour'] = intval($hour);
					$qData[$key]['auctiondate']['minute'] = intval($minute);
					$qData[$key]['auctiondate']['sec'] = intval($sec);

					$qData[$key]['content'] = html_entity_decode(stripslashes($val['content']));
					$checkturn = $this->checknextturn($val['id']);
					$qData[$key]['nextturn'] = $checkturn['nextturn'];
				}
				
				// pr($qData);
				$sql =" 
					SELECT COUNT(1) total
				FROM auctions ac 
				LEFT JOIN (	
					SELECT COUNT(*) total,b.userid,b.auctionid 
					FROM bidding b 						
					WHERE  b.n_status = 1
					GROUP BY b.auctionid
					)	op ON op.auctionid = ac.id
				WHERE  ac.start_date <= NOW() AND  ac.end_date >= NOW() AND ac.n_status = 1 ";
				$restotal = $this->apps->fetch($sql);
				
				$data['result'] = $qData;
				$data['total'] = $restotal['total'];
				
				return $data;
			}
			return false;
				
		
	
	}
	 
		
	function userbidauctionitem(){
		// badge list 			: 1,2,3,4,5,6,7
		// amountofbadgeslist 	: 10,2,5,6,20,2,6 
		// auction id			: 1
		// user id				: 2
		// opponent id			: 6
		// status bidding 		: 0: lose, 1: user try bidding(status lock cannot use the badges) , 5: highest bidder
		$data['message'] = $this->locale[1]['cant_bidding'];
		$data['code'] = 0;
		$data['result'] = false;
		$badgeliststatus= false;
		$icanbidauction = false;
		$insertbadgesbidding = array();
		$thebadgeslist =  array();
		$badgelist = strip_tags($this->apps->_p('badgelist'));
		$amountofbadgeslist = strip_tags($this->apps->_p('amountlist'));
		$auctionid = intval($this->apps->_p('auctionid'));
		$opponentid = intval($this->apps->_p('opponentid'));
		$fromopponent = false;
		$userbiddingpoint = 0;
		$userid = $this->uid;
		if($badgelist==0){
			$data['message'] = $this->locale[1]['blom_masukin_poin'];
				return $data;
		}

		//cek user sending badge list and amount index
		$arrbadgelist = explode(',',$badgelist);
		$arramountofbadgeslist = explode(',',$amountofbadgeslist);

		$arrbadgeslist = array();
		
		if(count($arrbadgelist)==count($arramountofbadgeslist)){
			foreach($arrbadgelist as $key => $val){							
				if($arramountofbadgeslist[$key]!=0) $thebadgeslist[$val] = $arramountofbadgeslist[$key];
				if($arramountofbadgeslist[$key]!=0) $arrbadgeslist[$val] = $val;
			}
		}else {
			// cek user turn function
			$nturn = $this->turn ;
			$sql = "SELECT MAX(id) id,MAX(bid_time) max_time, userid, DATE(bid_time) biddingtime FROM bidding WHERE  auctionid={$auctionid} GROUP BY userid,auctionid,biddingtime  ORDER BY max_time DESC LIMIT {$nturn} ";
			$qData = $this->apps->fetch($sql,1);
			if(!$qData) $qData= array();
			$uturn = array();
			foreach($qData as $val){
				$uturn[$val['userid']] = $val['userid'];
			}
			if(!in_array($userid,$uturn)){		 
				$data['message'] = $this->locale[1]['blom_masukin_poin'];
				return $data;
			}else{
				$data['message'] = $this->locale[1]['cant_bidding'].".";
				return $data;
			}

			
		}
		
		if(!$thebadgeslist) return $data;
		if(!$arrbadgeslist) {
				$data['message'] = $this->locale[1]['badge_not_found'];
				return $data;
		}  
		//pr($arrbadgeslist);
		$badgelist = implode(',',$arrbadgeslist);
		
		$datetimes =  date("Y-m-d H:i:s");
        //cek user has win auction 2 times
        	$sql =" 
				SELECT COUNT(1) total 
				FROM   my_auctions ma  			
				WHERE   ma.userid = {$this->uid} LIMIT 1";
			// pr($sql);
			$qData = $this->apps->fetch($sql);
			if($qData){
				if($qData['total']>1)  {
					$data['message'] = "Kamu telah memenangkan 2 Auction sebelumnya. Tingkatkan terus poinmu, raih kesempatan untuk merasakan VIP experience kota Tokyo, London & <br>New York!";
					return $data;
				}  
			}
		// cek user turn function
		$nturn = $this->turn ;
		$sql = "SELECT MAX(id) id,MAX(bid_time) max_time, userid, DATE(bid_time) biddingtime FROM bidding WHERE  auctionid={$auctionid} GROUP BY userid,auctionid,biddingtime  ORDER BY max_time DESC LIMIT {$nturn} ";
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) $qData= array();
		$uturn = array();
		foreach($qData as $val){
			$uturn[$val['userid']] = $val['userid'];
		}
			// pr($sql);
		if(!in_array($userid,$uturn)){		 
			// if ok user turn
				
				// cek user current badge  and current number of badges
					$sql = "
					SELECT mb.badgesid,count(mb.badgesid) amount , b.point
					FROM my_badges mb
					LEFT JOIN badges b ON b.id = mb.badgesid
					WHERE 
					mb.userid = {$userid} 
					AND mb.badgesid IN ({$badgelist}) 
					AND mb.n_status = 1 
					AND NOT EXISTS ( SELECT bd.codeid FROM bidding bd WHERE bd.codeid=mb.codeid AND bd.auctionid={$auctionid} AND bd.n_status = 1 )
					GROUP BY mb.badgesid ";
					
					$qData = $this->apps->fetch($sql,1);

					if($qData){
					//if exist badge
						
						// cek compare user current badge with user badges list
							foreach($qData as $key => $val){
								$userbiddingpoint+=intval($thebadgeslist[$val['badgesid']]*$val['point']);
								if((array_key_exists($val['badgesid'],$thebadgeslist))&&($val['amount'] >= intval($thebadgeslist[$val['badgesid']]))){
									$badgeliststatus[] = true;
								}else $badgeliststatus[] = false;
							}
							
							//if dont have false value
							if(!in_array(false,$badgeliststatus)){
									// can bid ok badgeliststatus true
									$icanbidauction = true;
							}else{
								//if not match
								$data['message'] = $this->locale[1]['badge_not_match'];
								$data['code'] = 3;
								return $data;
							}
						 
						//if icanbidauction true
						if($icanbidauction){
							//cek auction have bidder as user opponent , is opponent or minimal bid : possible of locking table if not MyISAM tables transaction type
							$sql ="
							SELECT COUNT(a.id) total,b.userid,a.minimalBid,a.currentBid,a.end_date
							FROM auctions a
							LEFT JOIN bidding b ON a.id= b.auctionid							
							WHERE 
							a.n_status = 1  
							AND b.n_status = 1
							AND a.id = {$auctionid} 
							LIMIT 1";
							
							$qData = $this->apps->fetch($sql);
							if($qData){
								if($qData['total']>0){
									//if have opponent
										// cek opponent id and bidder id\
										// pr($qData);
											if($qData['userid']==$opponentid){
												// if match 
														if($qData['currentBid']>0){
															// get current bidder point
															$getCurrentBidderPoint = intval($qData['currentBid']);
														}else{
															$sql ="
															SELECT c.point,b.bid_badges badgesid 
															FROM bidding b
															LEFT JOIN badges c ON c.id = b.bid_badges
															WHERE b.n_status = 1 AND b.auctionid = {$auctionid} ";
															// pr($sql);
															$recountbidderpoint = $this->apps->fetch($sql,1);
															if($recountbidderpoint){
																$opponentbidding = 0;
																foreach($recountbidderpoint as $val){
																	$opponentbidding+=$val['point'];
																}
																if($opponentbidding>0){
																	$getCurrentBidderPoint = $opponentbidding;
																	//update new bidding point to auctions tables
																	// update current bid to user badges amount bid
																	$sql = "UPDATE auctions SET currentBid = {$opponentbidding} WHERE id = {$auctionid} LIMIT 1 ";
																	$this->apps->query($sql); 
																}else{
																	$data['message'] = $this->locale[1]['bidder_data_not_valid'];
																	$data['code'] = 7;
																	return $data;
																}
															}else{
																//else
																$data['message'] = $this->locale[1]['bidder_data_not_valid'];
																$data['code'] = 7;
																return $data;
															}
														}
														$fromopponent = true;
											}else{
												//else
												$data['message'] = $this->locale[1]['bidder_data_not_valid'];
												$data['code'] = 7;
												return $data;
											}
								}else{
									//if dont have opponent , but have minimal bid
										// get current bidder point
										$sql ="
										SELECT a.minimalBid,a.currentBid,a.end_date
										FROM auctions a										 						
										WHERE 
										a.n_status = 1  									 
										AND a.id = {$auctionid} 
										LIMIT 1";
										// pr($sql);
										$qData = $this->apps->fetch($sql);
										if($qData){										
											$getCurrentBidderPoint = intval($qData['minimalBid']);
										}else{
											
											//else
											$data['message'] = $this->locale[1]['data_auction_not_valid'];
											$data['code'] = 7;
											return $data;
										}
								
								}		
							}else{
								//else
								$data['message'] = $this->locale[1]['data_auction_not_valid'];
								$data['code'] = 7;
								return $data;
							}
							
							//cek current bidder point 
							if($fromopponent){
								if($getCurrentBidderPoint<=0) {
									$data['message'] = $this->locale[1]['bidder_data_not_valid'];
									$data['code'] = 10;
									return $data;
								}
							}
							// pr($userbiddingpoint);
								// cek user point of amount of badges
									if($userbiddingpoint>$getCurrentBidderPoint){
									// pr($userbiddingpoint);
									// pr($getCurrentBidderPoint);
										// if user point of amount of badges GT current bidder point
												// cek auction is exists this datetimes
											
												$auctiondate = intval(strtotime($qData['end_date']));
												$currenttimes = intval(strtotime($datetimes));
												$subauctiondate = $auctiondate - $currenttimes;
												// pr($getCurrentBidderPoint);
												// pr($qData['end_date']);
												// pr($auctiondate);
												// pr($subauctiondate);
												// pr($currenttimes);
												if($subauctiondate>=0){
													// insert user badges n amount with status 1
														$sqlInsert = array();
														$numberinserted = 0;
														$badgesCodeid = false;
														$updatethiscodeid = false;
														$updatethiscodeidMARK = false;
														$manytimes = 1;
														//get user bidding times
														$sql =" SELECT MAX(manytimes) manytimes FROM bidding WHERE userid={$userid} ORDER BY id DESC LIMIT 1 ";
														$manytimesData = $this->apps->fetch($sql);

														if($manytimesData){ 
															if($manytimesData['manytimes']){
																$manytimes = $manytimesData['manytimes']+1;
															}
														}
														 
														// get codeid of user badges
														foreach($thebadgeslist as $badgesid => $amount){
																 $sqlSelectCodeid = "
																 SELECT mb.codeid,mb.mark
																 FROM my_badges mb
																 WHERE 
																 badgesid={$badgesid} 
																 AND userid = {$userid}
																 AND mb.n_status = 1 
																 AND NOT EXISTS ( SELECT bd.codeid FROM bidding bd WHERE bd.codeid=mb.codeid AND bd.auctionid={$auctionid} AND bd.n_status = 1 )
																 LIMIT {$amount}";
																 //pr($sqlSelectCodeid);
																 $badgesCodeid[$badgesid]=$this->apps->fetch($sqlSelectCodeid,1);
																 //pr($badgesCodeid);
														}

														if(!$badgesCodeid) {
															$data['message'] = $this->locale[1]['badge_not_found'];
															$data['code'] = 2;
															return $data;
														}
														//pr($badgesCodeid);
														foreach($thebadgeslist as $badgesid => $amount){
																$i=0;
																for($i=0;$i<$amount;$i++){
																	$numberinserted++;
																	$updatethiscodeid[$badgesCodeid[$badgesid][$i]['codeid']."_".$badgesCodeid[$badgesid][$i]['mark']] = $badgesCodeid[$badgesid][$i]['codeid'];
																	$updatethiscodeidMARK[$badgesCodeid[$badgesid][$i]['codeid']."_".$badgesCodeid[$badgesid][$i]['mark']] = $badgesCodeid[$badgesid][$i]['mark'];
																	$sqlInsert[]=" ({$userid},{$auctionid},'{$datetimes}',{$badgesid},1,{$badgesCodeid[$badgesid][$i]['codeid']},{$manytimes},{$badgesCodeid[$badgesid][$i]['mark']}) ";
																}
														}

														//pr($sqlInsert);exit;	
														$numberaffectedrows = 0;
														if($sqlInsert){
															$sqlQueryInsert = implode(',',$sqlInsert);
															$sql = " 
																INSERT INTO 
																bidding (userid,auctionid,bid_time,bid_badges,n_status,codeid,manytimes,mark) 
																VALUES 
																{$sqlQueryInsert}
																";
																//pr($sql); 
															$this->apps->query($sql);
															$this->logger->log("auction bidding :".$sql);
															$numberaffectedrows = mysql_affected_rows();
															//pr($numberaffectedrows );
														}else{
																//$data['message'] = " your credential badges not enough to update the outbid ";
																$this->logger->log($sqlInsert);
																$data['message'] = $this->locale[1]['badge_not_enough'].".";
																$data['code'] = 9;
																return $data;
														}
														//if all insert success
														// pr($sql);
														// pr($numberinserted);
														// pr($numberaffectedrows);
														$this->logger->log($numberinserted." : ".$numberaffectedrows);
														if($numberinserted==$numberaffectedrows){
															// update all id badges user to 2
																if($updatethiscodeid){
																	$numberupdated = count($updatethiscodeid);
																	$strupdatethiscodeid = implode(',',$updatethiscodeid);
																	$strupdatethiscodeidMARK = implode(',',$updatethiscodeidMARK);
																	$strupdatethiscodeid_change='';
																	$sizeuptcode = sizeof($updatethiscodeid)-1;
																	$idx = 0;
																	foreach ($updatethiscodeid as $key => $value) {
																		$fil = ""; 
																		if($idx>0) {
																			$fil = "OR ";
																		}else{
																			$strupdatethiscodeid_change .="AND (";
																		} 
																		$strupdatethiscodeid_change .= "{$fil} (codeid = {$value} AND mark = {$updatethiscodeidMARK[$key]}) ";
																		if($sizeuptcode == $idx){
																			$strupdatethiscodeid_change .=")";
																		}
																		$idx++;
																	}
																	
																	if($strupdatethiscodeid){
																		// $sql = "UPDATE my_badges SET n_status = 2  WHERE userid={$userid} AND codeid IN ({$strupdatethiscodeid}) AND mark IN ({$strupdatethiscodeidMARK}) ";
																		$sql = "UPDATE my_badges SET n_status = 2  WHERE userid={$userid} {$strupdatethiscodeid_change} ";
																		$this->apps->query($sql);
																		//pr($sql);
																		$numberinserted = mysql_affected_rows();
																		
																		if($numberinserted==$numberaffectedrows){
																		// if all badges user updated																		
																			// update opponent badges on bidding to 0
																			if(($opponentid!=0)&&($opponentid!=$userid)){
																				//select opponent codeid to returning
																				$sql = "SELECT codeid,manytimes,mark FROM bidding WHERE auctionid = {$auctionid} AND userid={$opponentid} AND n_status = 1 ";
																				$opponentbadges = $this->apps->fetch($sql,1);
																				if($opponentbadges){
																					$opponentcodeid = false;
																					foreach($opponentbadges as $val){
																						$opponentcodeid[$val['codeid']."_".$val['mark']] =$val['codeid'];
																						$opponentcodeidMARK[$val['codeid']."_".$val['mark']] =$val['mark'];
																						$opponentmanytimes[$val['codeid']."_".$val['mark']] =$val['manytimes'];
																					}
																					if($opponentcodeid){
																						$stropponentcodeid = implode(',',$opponentcodeid);
																						$stropponentcodeidMARK = implode(',',$opponentcodeidMARK);
																						
																						$stropponentmanytimes = implode(',',$opponentmanytimes);
																						
																						$sql = "UPDATE bidding SET n_status = 0 WHERE auctionid = {$auctionid} AND userid={$opponentid} AND manytimes IN ({$stropponentmanytimes}) AND mark IN ({$stropponentcodeidMARK}) ";
																						$this->apps->query($sql);
																						
																						$this->logger->log('opponent mark many times :'.$stropponentmanytimes);
																						
																						$sql = "UPDATE my_badges SET n_status = 1  WHERE userid={$opponentid} AND codeid IN ({$stropponentcodeid}) AND mark IN ({$stropponentcodeidMARK})  ";
																						$this->apps->query($sql);
																					}else{
																					
																						//else																			
																						// reset status to 1 the all id of user inserted
																						$sql = "UPDATE my_badges SET n_status = 1  WHERE userid={$userid} {$strupdatethiscodeid_change} ";
																						$this->apps->query($sql);
																						
																						$data['message'] = $this->locale[1]['badge_not_enough'].".." ;
																						$data['code'] = 9;
																						return $data;
																					
																					}
																				}else{
																				
																					//else																			
																					// reset status to 1 the all id of user inserted
																					$sql = "UPDATE my_badges SET n_status = 1  WHERE userid={$userid} {$strupdatethiscodeid_change} ";
																					$this->apps->query($sql);
																					// reset status to 0 the all id of user inserted
																					$sql = "UPDATE bidding SET n_status = 0  WHERE userid={$userid} {$strupdatethiscodeid_change} AND auctionid={$auctionid} "; 
																					$this->apps->query($sql);
																					
																					$data['message'] = $this->locale[1]['badge_not_enough']."..." ;
																					$data['code'] = 9;
																					return $data;
																				}
																			}
																			// update current bid to user badges amount bid
																			$sql = "UPDATE auctions SET currentBid = {$userbiddingpoint} WHERE id = {$auctionid} LIMIT 1 ";
																			$this->apps->query($sql);
																			
																			$data['message'] = $this->locale[1]['bidding_success'];
																			$data['code'] = 1;
																			$data['result'] = true;
																			
																		
																			return $data;
																			
																		}else{
																			//else																			
																			// reset status to 1 the all id of user inserted
																			//$sql = "UPDATE my_badges SET n_status = 1  WHERE userid={$userid} AND codeid IN ({$strupdatethiscodeid}) AND mark IN ({$strupdatethiscodeidMARK}) ";
																			$sql = "UPDATE my_badges SET n_status = 1  WHERE userid={$userid} {$strupdatethiscodeid_change} ";
																			$this->apps->query($sql);
																			//pr($sql);
																			// reset status to 0 the all id of user inserted
																			$sql = "UPDATE bidding SET n_status = 0  WHERE userid={$userid} {$strupdatethiscodeid_change} AND auctionid={$auctionid} "; 
																			$this->apps->query($sql);
																			
																			
																			$data['message'] = $this->locale[1]['badge_not_enough']."12" ;
																			$data['code'] = 9;
																			return $data;
																		}
																	}else{
																		$data['message'] = $this->locale[1]['badge_not_found']."13";
																		$data['code'] = 2;
																		return $data;
																	}
																}else{
																	$data['message'] = $this->locale[1]['badge_not_found']."14";
																	$data['code'] = 2;
																	return $data;
															
																}
																
														}else{
															//else
															$strupdatethiscodeid = implode(',',$updatethiscodeid);
															$strupdatethiscodeidMARK = implode(',',$updatethiscodeidMARK);
															$strupdatethiscodeid_change='';
															$sizeuptcode = sizeof($updatethiscodeid)-1;
															$idx = 0;
															foreach ($updatethiscodeid as $key => $value) {
																$fil = ""; 
																if($idx>0) {
																	$fil = "OR ";
																}else{
																	$strupdatethiscodeid_change .="AND (";
																} 
																$strupdatethiscodeid_change .= "{$fil} (codeid = {$value} AND mark = {$updatethiscodeidMARK[$key]}) ";
																if($sizeuptcode == $idx){
																	$strupdatethiscodeid_change .=")";
																}
																$idx++;
															}
															$sql = "UPDATE bidding SET n_status = 0 WHERE auctionid = {$auctionid} AND userid={$userid} {$strupdatethiscodeid_change} ";
															$this->apps->query($sql);
															// reset status to 0 the all id of user inserted
															$data['message'] = $this->locale[1]['badge_not_enough']." eight ";
															$data['code'] = 8;
															return $data;
														}
												}else{
													//else
													$data['message'] = $this->locale[1]['auction_expired'];
													$data['code'] = 11;
													return $data;
												}
										}else{
											//else
											$data['message'] = $this->locale[1]['point_not_enough'];
											$data['code'] = 6;
											return $data;
										}
						}
						//else
						$data['message'] = " {$this->locale[1]['badges_status']['part_1']} {$badgeliststatus} {$this->locale[1]['badges_status']['part_2']} {$amountofbadgeliststatus} ";
						$data['code'] = 5;
						return $data;
					}
					// if not exist badges
					$data['message'] = $this->locale[1]['no_badge']."...";
					$data['code'] = 2;
					return $data;
			}
			// if not ok return false
			return $data;	
		
	}
	
	function auctioniwon(){
			$data['result'] = false;
		$data['total'] = 0;
		
		$sql =" 
				SELECT ac.*,mac.userid,sm.name,sm.last_name,sm.image_profile imageprofile 
				FROM auctions ac
				LEFT JOIN my_auctions mac ON mac.auctionid = ac.id
				LEFT JOIN social_member sm ON sm.id = mac.userid				
				WHERE    mac.userid = {$this->uid} AND sm.id IS NOT NULL AND sm.id <>'' ";
			// pr($sql);
			$qData = $this->apps->fetch($sql,1);
			if($qData){
					
				foreach($qData as $key =>  $val){
					if($key%2) $queue = "even";
					else $queue = "odd";
					$qData[$key]['queue'] = $queue;
					$qData[$key]['auctions'] = $this->apps->userHelper->getimagefullpath($val,'img','auctions');
					$qData[$key]['profile'] = $this->apps->userHelper->getimagefullpath($val,'imageprofile','profile');
					$qData[$key]['content'] = str_replace('\\','',html_entity_decode(strip_tags($val['content'])));
				}
				
					// pr($qData);
				$sql =" 
					SELECT count(1) total
					FROM auctions ac
					LEFT JOIN my_auctions mac ON mac.auctionid = ac.id
					LEFT JOIN social_member sm ON sm.id = mac.userid				
					WHERE    mac.userid = {$this->uid} AND sm.id IS NOT NULL AND sm.id <>'' ";
				$restotal = $this->apps->fetch($sql);
				
				$data['result'] = $qData;
				$data['total'] = $restotal['total'];
				return $data;
			}
			return false;
	}
	
	function generateAuctionWinner(){
	
		$data['result'] = false;
		$data['message'] = " no winner ";
		
		$datetimes = date("Y-m-d H:i:s");
		// get auction expired
		$sql = " SELECT id,currentBid FROM auctions WHERE end_date <= '{$datetimes}' AND n_status = 1 ";
		$qData = $this->apps->fetch($sql,1);
		$arrAucId = array();
		if($qData){	
		
			foreach($qData as $val){
				$arrAucId[$val['id']]['currentBid'] =$val['currentBid']; 
				$arrAuctionId[$val['id']] =$val['id']; 
			}
			if(!$arrAucId) return false;
			
			$strAucId = implode(',',$arrAuctionId);
			if($strAucId){
				
				//get bidding point peruser winner per auction
				$sql = "
						SELECT SUM(weight) sumweight,userid,auctionid
						FROM (
							SELECT COUNT(1), bad.point, (COUNT(1)* bad.point) weight,bid.userid,auctionid
							FROM `bidding` bid
							LEFT JOIN badges bad ON bad.id = bid.bid_badges
							WHERE bid.n_status = 1 AND auctionid IN ({$strAucId})
							GROUP BY bid.userid,auctionid,bid.bid_badges
						) a
						GROUP BY userid,auctionid
						";	
				$qData = $this->apps->fetch($sql,1);
				// pr($sql);
				if($qData){
					//matching data winner, inject to my auction if match
					foreach($qData as $val){
						if(array_key_exists($val['auctionid'],$arrAucId)){
							if($arrAucId[$val['auctionid']]['currentBid']==$val['sumweight']){
								//inject data to winner
									$sql ="INSERT INTO  `my_auctions` (`auctionid`, `userid`, `badges_bid`, `winner_date`, `n_status`) VALUES ( '{$val['auctionid']}', '{$val['userid']}', '', NOW(), '1')";
									$this->apps->query($sql);
									$sql =" UPDATE `auctions` SET n_status = 0 ,points={$val['sumweight']} WHERE id={$val['auctionid']} LIMIT 1 ";
									$this->apps->query($sql);
									$data['result'] = true;
									$data['message'] = " has winner ";

									$this->apps->notificationHelper->notif_log(2,0,$val['userid']);
									$user_data = $this->apps->notificationHelper->checkUser($val['userid']);
									$mail['email']=$user_data['email'];
									$mail['name']=$user_data['name'];
									$mail['subject'] = "Selamat kamu menang Auction!";		
								    $mail['msg']=$this->apps->notificationHelper->email_template(
						    						array(
						    							'username'=>$user_data['name'],
						    							'message'=>"
										                		<p>Bid yang kamu pasang adalah yang tertinggi. Untuk info pengiriman hadiah silahkan menghubungi <a href='mailto:info@neversaymaybe.co.id'>info@neversaymaybe.co.id</a></p>
										                		<br />
										                		<p>Good luck!</p>"
					    						));
									$this->apps->notificationHelper->send_mail($mail);
							}else{
								$this->apps->notificationHelper->notif_log(3,0,$val['userid']);
								$user_data = $this->apps->notificationHelper->checkUser($val['userid']);
								$mail = array();
								$mail['email']=$user_data['email'];
								$mail['name']=$user_data['name'];
								$mail['subject'] = "Terima kasih sudah melakukan bidding di MARLBORO IN OR OUT";

								$mail['msg']=$this->apps->notificationHelper->email_template(
							    						array(
							    							'username'=>$user_data['name'],
							    							'message'=>"<p>Terima kasih telah berpartisipasi dalam auction di MARLBORO IN OR OUT. Maaf, kali ini kamu belum beruntung. Masih banyak kesempatan untuk memenangkan hadiah-hadiah menarik lainnya dengan ikut serta di auction selanjutnya, 
																		cek jadwalnya di <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
																		<p>Good luck!</p>"
							    						));
								
								$this->apps->notificationHelper->send_mail($mail);
							}
						}
					}
				}
			}
		}
		return $data;
	}
	
	function checknextturn($auctionid=0){
		// cek user turn function
		$data['nextturn'] = 0;
		if($auctionid==0) return $data;
		$nturn = $this->turn ;
		$sql = "SELECT MAX(id) id,MAX(bid_time) max_time, userid, DATE(bid_time) biddingtime FROM bidding WHERE  auctionid={$auctionid} GROUP BY userid,auctionid,biddingtime  ORDER BY max_time DESC LIMIT {$nturn} ";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) $qData= array();
		$uturn = array();
		foreach($qData as $val){
			$uturn[] = $val['userid'];
		}
			// pr($uturn);
				// pr($this->uid);
		if(in_array($this->uid,$uturn)){
			
			$keys = array_keys($uturn,$this->uid);	
	
			if($keys){
				
				$data['nextturn'] = 3 - ($keys[0]+1);
				// pr($data['nextturn']);
			}
		}
			
		return $data;
	}
}
?>