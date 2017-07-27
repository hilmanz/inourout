<?php
class badges extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('assets_domain_mobile', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
		$this->assign('locale', $LOCALE[1]);
		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->auctionHelper = $this->useHelper('auctionHelper');
		$this->tradeHelper = $this->useHelper('tradeHelper');
		$this->merchandiseHelper = $this->useHelper('merchandiseHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
		$this->userHelper = $this->useHelper('userHelper');
		if(is_object($this->user)) $this->uid = intval($this->user->id);
	}
	
	function main(){
			
		$this->badgesHelper->myCurrentBadges();
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','badges');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/badges.html');
		
	}

	function auction(){
	
		
		$pastauction = $this->auctionHelper->pastauction();
		
		$this->assign('pastauction', $pastauction['result']);
		$this->assign('pastauctiontotal', $pastauction['total']);
		$auctioniwon = $this->auctionHelper->auctioniwon();
		$this->assign('auctioniwon', $auctioniwon['result']);	
		$this->assign('auctioniwontotal', $auctioniwon['total']);
		$todayauction = $this->auctionHelper->todayauction();
		
		$this->assign('todayauction', $todayauction['result']);
		$this->assign('todayauctiontotal', $todayauction['total']);
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','auction');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/badges-auction.html');
	}
	
	function pastAuctionAjax()
	{
		if ($this->_p('ajaxPaging')){
			
			$start = intval($this->_p('start'));
			$limit = intval($this->_p('limit'));
		
			$pastauction = $this->auctionHelper->pastauction($start, $limit);
			if ($pastauction){
				// pr($pastauction['res']);
				print json_encode(array('status'=>true, 'res'=>$pastauction['result']));
			}else{
				print json_encode(array('status'=>false));
			
			}
			exit;
		}
	}
	
	function todayAuctionAjax()
	{
		if ($this->_p('ajaxPaging')){
			
			$start = intval($this->_p('start'));
			$limit = intval($this->_p('limit'));
		
			$pastauction = $this->auctionHelper->todayauction($start, $limit);
			if ($pastauction){
				// pr($pastauction['res']);
				print json_encode(array('status'=>true, 'res'=>$pastauction['result']));
			}else{
				print json_encode(array('status'=>false));
			
			}
			exit;
		}
	}
	
	function auctionRules(){
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','auctionRules');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/auction-rules.html');
	}

	function trading($ajax=false){
		$ajax = $this->_p('ajax');	
		$start = intval($this->_p('start'));	
		$find = $this->_p('find');	
		$give = $this->_p('give');	
		$sort_by = $this->_p('sort_by');	
		$sort_AZ = intval($this->_p('sort_AZ'));
		
		//hack! populating mark if zero
		$this->tradeHelper->populateMark();
		
		$badges = $this->badgesHelper->myCurrentBadges();
		//pr($badges);exit;
		$this->assign('mybadges', $badges);
		$this->assign('mybadges_json', json_encode($badges));

		if($ajax){
			$load = $this->tradeHelper->alltrade($start,3,$find,$give,$sort_by,$sort_AZ);
			echo json_encode($load);
			exit;
		}

		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','trading');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/badges-trading.html');
	}
	
	function mytrade(){
		$ajax = $this->_p('ajax');	
		$start = intval($this->_p('start'));
		// pr($_POST);
		if($ajax){
			$load = $this->tradeHelper->myTrade($start,3);
			// pr($load);
			echo json_encode($load);
			exit;
		}

		// if(strip_tags($this->_g('page'))=='badges') $this->log('surf','my trade');
		// return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-trading.html');
	}

	function makeTradeConfirmation(){
		$ajax = $this->_p('ajax');
		$find = intval($this->_p('find'));	
		$give = $this->_p('give');	
		
		if($ajax){
			$load = $this->tradeHelper->makeTradeConfirmation($find,$give);
			echo json_encode(array('status'=>1,'data'=>$load));
			exit;
		}
	}

	function makeTradeProceed(){
		$ajax = $this->_p('ajax');			
		$find = intval($this->_p('findPost'));	
		$give = $this->_p('givePost');
		
		if($ajax){
			$load = $this->tradeHelper->makeTradeProceed($find,$give);

			if($load['status']==1){
				$this->notificationHelper->notif_log(5,0,$this->uid);
			}
			
			if ($load['status']==1){
				$this->assign('success', $load['msg']);
			}else{
				$this->assign('failed', $load['msg']);
			}
			
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/trading-succes.html');
	}

	function cancelMyTrade(){
		$ajax = $this->_p('ajax');			
		$tradeID = intval($this->_p('tradeID'));

		if($ajax){
			$load = $this->tradeHelper->cancelMyTrade($tradeID);
			echo json_encode($load);
			exit;
		}
	}

	function tradeConfirmation(){
		$ajax = $this->_p('ajax');	
		$tradeID = intval($this->_p('tradeID'));
		
		if($ajax){
			$load = $this->tradeHelper->tradeBadgesConfirmation($tradeID);
			// pr($load);
			if ($load){
				$this->assign('give', $load['offer_badges']);
				$this->assign('find', $load['request_badges']);
				$this->assign('tradeID', $load['id']);
				$this->assign('trade', true);
			}
			// echo json_encode(array('status'=>1,'data'=>$load));
			// exit;
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/trading-confirm.html');
	}

	function tradeProceed(){
		$ajax = $this->_p('ajax');	
		$tradeID = intval($this->_p('tradeID'));
		
		if($ajax){
			$load = $this->tradeHelper->tradeBadges($tradeID);
			// echo json_encode($load);
			// exit;
			
			if ($load['status']==1){
				$this->assign('success', $load['msg']);
			}else{
				$this->assign('failed', $load['msg']);
			}
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/trading-succes.html');
	}

	function collectibles(){
		$merchandise = $this->merchandiseHelper->getMerchandise();
		
		if ($merchandise){
			foreach ($merchandise as $key => $val){
				$merchandise[$key]['calculateBadges'] = $this->calculateBadges($val['point']);
			}
		}
		// pr($merchandise);
		
		$hasredeem = $this->merchandiseHelper->checkredeem();
		
		$this->assign('merchandise', $merchandise);
		$this->assign('hasredeem', $hasredeem);
		
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		$this->assign('currentbadges', $currentbadges);
		
		// $calculateBadges = $this->calculateBadges(10000);
		// pr($calculateBadges);
		// exit;
		// if ($calculateBadges) $this->assign('calculateBadges', $calculateBadges);
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','collectibles');
		// return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-collectibles.html');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/badges-redeem.html');
	}
	
	// function redeem(){
		
		// print json_encode($this->merchandiseHelper->redeemMerchandise());
		// exit;
	// }
		
	function calculateBadges($point=0)
	{
		if (intval($point<1)) return false;
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		
		$badgePoint = 0;
		$arrBadge = array();
		$maxBadge = 3;
		$startIndex = 0; 
		if ($currentbadges){
			
			foreach ($currentbadges as $key => $val){
				$dataVal[$val['point']] = $val;
				$dataKey[] = $val['point'];

			}
			
			if ($dataKey) sort($dataKey);
			else return false;
			
			$flag = 0;
			foreach ($dataKey as $key => $val){
				
				if ($key>=$startIndex){
				
					if (count($arrBadge)<$maxBadge){
						if (intval(array_sum($arrBadge))<=$point)$arrBadge[] = $val;
					}
					
					if (count($arrBadge)==$maxBadge){
						
						if ($flag ==0){
							$temp = array_sum($arrBadge) + $val;
							
							if ($temp>$point){
								$arrBadge[] = $val;
								$flag = 1;
							}
							
							$startIndex++;
							$arrBadge = array();
						}
					
					}
				}
				
			}
			
			$calculate = array();
			foreach ($dataVal as $key => $val){
				if (in_array($key, $arrBadge)) $calculate[] = $val; 
			}
			
			// pr($calculate);
			/*
			cek apakah point badge kurang dari point yg dicari
			maksimal badge 4
			*/
			
			if (intval(count($calculate)<1)) return false;
			
			return $calculate;
		}
		
	}
	
	function tradingRules(){
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','tradingRules');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/trading-rules.html');
	}
	function tradingConfirm(){
	
		// pr($_POST);
		
		$ajax = $this->_p('ajax');
		$find = intval($this->_p('badgesFindingValue'));	
		$give = $this->_p('badgesGiveValue');	
		$totalBadges = $this->_p('totalBadges');	
		
		if($find>0&& $totalBadges<=4){
			if($ajax){
				$load = $this->tradeHelper->makeTradeConfirmation($find,$give);
				if ($load){
					// pr($load);
					$this->assign('give', $load['give']);
					$this->assign('find', $load['find']);
					
					
					$this->assign('givePost', $give);
					$this->assign('findPost', $find);
					
					
				}
				
			}
		}
		
		
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','tradingConfirm');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/trading-confirm.html');
	}
	function tradingSucces(){
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','tradingSucces');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/trading-succes.html');
	}
	function tradingFind(){
		
		$badges = $this->badgesHelper->myCurrentBadges();
		//pr($badges);exit;
		$this->assign('mybadges', $badges);
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','tradingFind');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/find-trade.html');
	}

	function redeem(){
		
		global $LOCALE,$CONFIG;
		$redeem = $this->merchandiseHelper->redeemMerchandise();
		
		if($redeem['result']){
			$this->notificationHelper->notif_log(6,0,$this->uid);
			$mail['email']=$this->user->email;
			$mail['name']=$this->user->name;
			$mail['subject'] = "Kamu berhasil redeem 1 Collectible Item dari MARLBORO IN OR OUT!";
			$mail['msg'] = "<p>Hai, <strong>".$this->user->name."</strong></p><br /><br />
							<p>Kamu berhasil redeem 1 (satu) Limited Collectible item di MARLBORO IN OR OUT. Segera lengkapi data dirimu untuk proses pengiriman barang. Untuk informasi pengiriman silakan log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
							<br/><p>Masih banyak lagi merchandise keren dari MARLBORO IN OR OUT! Caranya gampang, tingkatkan terus poinmu dan lengkapi koleksi badges-nya!</p>
							";
			$this->notificationHelper->send_mail($mail);

			$redeem['message'] = "Kamu baru redeem satu Collectibe Item dari Marlboro";
			$this->assign('message', $redeem['message']);
		}else{
			// pr($LOCALE);
			$this->assign('message', $LOCALE[1]['redeem']['failed']['head']);
		}
		
		$this->assign('merchimage', strip_tags($this->_p('merchimage')));
		$this->assign('merchandisename', strip_tags($this->_p('merchandisename')));
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','redeemsucces');
		
		// return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/badges-redeem.html');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/redeem-succes.html');
	}
	function redeemRules(){
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','redeemRules');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/redeem-rules.html');
	}
	function placingBid(){
		
		if ($this->_p('token')){
			$aid = intval($this->_p('aid'));
			$desc = strip_tags($this->_p('desc'));
			$currentbid = intval($this->_p('currentbid'));
			$img = strip_tags($this->_p('img'));
			
			$this->assign('aid', $aid);
			$this->assign('desc', $desc);
			$this->assign('currentbid', $currentbid);
			$this->assign('img', $img);
			
		}
		
		// pr($_POST);exit;
		$aid = intval($this->_p('aid'));
		$todayauction = $this->auctionHelper->todayauction(0,4,$aid);
		$this->assign('todayauction', $todayauction);
		
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		// pr($todayauction);
		$this->assign('currentbadges', $currentbadges);
		// pr($todayauction);
		// exit;
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','placingBid');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/placing-bid.html');
	}
	function redeemPrize(){
	
		if ($this->_p('token')){
			
			$merchid = $this->_p('merchid');
			$merchimage = $this->_p('merchimage');
			$merchname = $this->_p('merchname');
			$merchpoint = $this->_p('merchpoint');
			if ($merchid>0){
				
				$this->assign('merchid', $merchid);
				$this->assign('merchimage', $merchimage);
				$this->assign('merchimagesbid', $merchid);
				$this->assign('merchname', $merchname);
				$this->assign('merchpoint', $merchpoint);
				$this->assign('myofferingpointsubbed', $merchpoint);
				$this->assign('badgestoform', 0);
				$this->assign('amounttoform', 0);
			}
			
		}
		
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		$this->assign('currentbadges', $currentbadges);
				
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','redeemPrize');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/redeem-prize.html');
	}
	
	function redeemForm(){
	
		
		if ($this->_p('token')){
			
			$badges = array();
			foreach ($_POST as $key => $val){
				
				$explode = explode('_',$key);
				
				if (count($explode)>1){
					
					if ($explode[1]){
						if (intval($val)>0){
							$badges['badges'][$explode[1]] = $val;
							$badges['badgesid'][] = $explode[1];
						}
					}
				}
				
				if ($key=='merchid') $badges['merchid'] = $val;
				
			}
			
			if (is_array($badges)){
				/*
				- ambil point merchandise id
				- cek badges id apakah user ada atau gk ada
				- compare point
				*/
				
				$dataReddem = array();
				$merchandise = $this->merchandiseHelper->getMerchandise();
				if ($merchandise){
					foreach ($merchandise as $key => $val){
						if ($val['id']==$badges['merchid']) $dataReddem['merch'] = $val;
					}
				}
				
				$currentbadges = $this->badgesHelper->myCurrentBadges();
				if ($currentbadges){
					foreach ($currentbadges as $key => $val){
						if ($val['total']>0){
							
							if (in_array($val['id'], $badges['badgesid']))$dataReddem['currentbadges'][] = $val;
						}
					}
				}
				
				/* hitung point user sama point merch */
				$point = 0;
				foreach ($dataReddem['currentbadges'] as $key => $val){
					
					if ($val['total']>=$badges['badges'][$val['id']]){
						$point += $val['point'] * $badges['badges'][$val['id']];
					}
				}
				// pr($point);
				
				if ($point>=$dataReddem['merch']['point']){
					$this->assign('merchandise', $dataReddem['merch']);
					$this->assign('mypoint', $point);
				}else{
					
					// redirect to collectables
				}
			}
			
			// pr($this->user);
			// pr($dataReddem);
			
			$cityName = $this->userHelper->getCity($this->user->city);
			
			$this->assign('badgeid', strip_tags($this->_p('badgeid')));
			$this->assign('badgeamount', strip_tags($this->_p('badgeamount')));
			$this->assign('merchimage', strip_tags($this->_p('merchimage')));
			$this->assign('user', $this->user);
			$this->assign('userCity', $cityName['city']);
		}
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','redeemForm');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/redeem-form.html');
	}
	function redeemSucces(){
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','redeemSucces');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/redeem-succes.html');
	}
		
	function generate(){
		
		print json_encode($this->badgesHelper->generateCode());
		exit;
	
	}
	
	function inputcode(){
		
		print json_encode($this->badgesHelper->inputCode(false,'input code'));
		exit;
	
	}
	
	function bidding(){
		
		global $CONFIG;
		$bidding = $this->auctionHelper->userbidauctionitem();

		if($bidding['result']){
			// $this->notificationHelper->notif_log(3,0,$this->uid);
			// $mail['email']=$this->user->email;
			// $mail['name']=$this->user->name;
			// $mail['subject'] = "Terima kasih sudah melakukan bidding di MARLBORO IN OR OUT";
			// $mail['msg'] = "<p>Hai, <strong>".$this->user->name."</strong></p><br /><br />
			// 				<p>Terima kasih telah berpartisipasi dalam auction di MARLBORO IN OR OUT. Maaf, kali ini kamu belum beruntung. Masih banyak kesempatan untuk memenangkan hadiah-hadiah menarik lainnya dengan ikut serta di auction selanjutnya, 
			// 				cek jadwalnya di <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
			// 				<br/><br /><p>Good luck!</p>";
			// $this->notificationHelper->send_mail($mail);


			$opponentid = intval($this->_p('opponentid'));
			sleep(1);														
			$this->notificationHelper->notif_log(12,0,$opponentid);
		}
		print json_encode($bidding);
		exit;
	}
	
} 
?>