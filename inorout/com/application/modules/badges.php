<?php
class badges extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->badgesHelper = $this->useHelper('badgesHelper');
		$this->auctionHelper = $this->useHelper('auctionHelper');
		$this->tradeHelper = $this->useHelper('tradeHelper');
		$this->merchandiseHelper = $this->useHelper('merchandiseHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
		if(is_object($this->user)) $this->uid = intval($this->user->id);
	}
	
	function main(){
		
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','badges');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges.html');
		
	}

	function auction(){
		$pastauction = $this->auctionHelper->pastauction(0,5);
		$this->assign('pastauction', $pastauction);
		//pr($pastauction);
		$auctioniwon = $this->auctionHelper->auctioniwon();
		//pr($auctioniwon);
		$this->assign('auctioniwon', $auctioniwon);	
		$todayauction = $this->auctionHelper->todayauction();
		$this->assign('todayauction', $todayauction);
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		$this->assign('currentbadges', $currentbadges);
		//pr($todayauction);exit;
		
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','auction');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-auction.html');
	}

	function pastauction(){
		$ajax = intval($this->_p('ajax'));

		if($ajax){
			$start = intval($this->_p('start'));
			$pastauction = $this->auctionHelper->pastauction($start,5);
			foreach ($pastauction['result'] as $key => $value) {
				$pastauction['result'][$key]['start_date'] = strtotime($value['start_date']);
			}
			echo json_encode($pastauction);
			exit;
		}
	}
	
	function bidding(){
		global $CONFIG;

		$bidding = $this->auctionHelper->userbidauctionitem();

		if($bidding['result']){
			// $this->notificationHelper->notif_log(3,0,$this->uid);
			// $mail['email']=$this->user->email;
			// $mail['name']=$this->user->name;
			// $mail['subject'] = "Terima kasih sudah melakukan bidding di MARLBORO IN OR OUT";

			// $mail['msg']=$this->notificationHelper->email_template(
		 //    						array(
		 //    							'username'=>$this->user->name,
		 //    							'message'=>"<p>Terima kasih telah berpartisipasi dalam auction di MARLBORO IN OR OUT. Maaf, kali ini kamu belum beruntung. Masih banyak kesempatan untuk memenangkan hadiah-hadiah menarik lainnya dengan ikut serta di auction selanjutnya, 
			// 										cek jadwalnya di <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a></p>
			// 										<p>Good luck!</p>"
		 //    						));
			
			// $this->notificationHelper->send_mail($mail);f


			$opponentid = intval($this->_p('opponentid'));
			sleep(1);
			if($opponentid>0){
				$this->notificationHelper->notif_log(12,0,$opponentid);
			}
		}
		print json_encode($bidding);
		exit;
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
			$load = $this->tradeHelper->alltrade($start,10,$find,$give,$sort_by,$sort_AZ);
			echo json_encode($load);
			exit;
		}

		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','trading');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-trading.html');
	}

	function mytrade(){
		$ajax = $this->_p('ajax');	
		$start = intval($this->_p('start'));
		
		if($ajax){
			$load = $this->tradeHelper->myTrade($start,3);
			echo json_encode($load);
			exit;
		}

		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','my trade');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-trading.html');
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
		$find = intval($this->_p('find'));	
		$give = $this->_p('give');
		
		if($ajax){
			$load = $this->tradeHelper->makeTradeProceed($find,$give);

			if($load['status']==1){
				$this->notificationHelper->notif_log(5,0,$this->uid);
			}

			echo json_encode($load);
			exit;
		}
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
			echo json_encode(array('status'=>1,'data'=>$load));
			exit;
		}
	}

	function tradeProceed(){
		$ajax = $this->_p('ajax');	
		$tradeID = intval($this->_p('tradeID'));
		
		if($ajax){
			$load = $this->tradeHelper->tradeBadges($tradeID);
			
			if($load['status']==1){
				$this->notificationHelper->notif_log(4,$this->uid,$load['opponentid']);
				sleep(1);
				$this->notificationHelper->notif_log(13,$load['opponentid'],$this->uid,$load['list_badge']);
			}
			
			echo json_encode($load);
			exit;
		}
	}

	function collectibles(){
		$this->userHelper = $this->useHelper('userHelper');
		$merchandise = $this->merchandiseHelper->getMerchandise();
		$hasredeem = $this->merchandiseHelper->checkredeem();		
		// pr($merchandise);
		$this->assign('merchandise', $merchandise);
		$this->assign('hasredeem', $hasredeem);
		
		$currentbadges = $this->badgesHelper->myCurrentBadges();
		$getUser = $this->userHelper->getUserProfile();
		$this->assign('currentbadges', $currentbadges);
		$this->assign('getUser', $getUser);
		// pr($todayauction);
		
		
		if(strip_tags($this->_g('page'))=='badges') $this->log('surf','collectibles');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/badges-collectibles.html');
	}

	function redeem(){
		global $CONFIG;
		
		$redeem = $this->merchandiseHelper->redeemMerchandise();

		if($redeem['result']){
			$this->notificationHelper->notif_log(6,0,$this->uid);
			$mail['email']=$this->user->email;
			$mail['name']=$this->user->name;
			$mail['subject'] = "Kamu berhasil redeem 1 Collectible Item dari MARLBORO IN OR OUT!";		
		    $mail['msg']=$this->notificationHelper->email_template(
		    						array(
		    							'username'=>$this->user->name,
		    							'message'=>'
						                		<p>Kamu berhasil redeem 1 (satu) Limited Collectible item di MARLBORO IN OR OUT. untuk mengetahui status pengiriman collectible item, hubungi <a href="mailto:info@neversaymaybe.co.id">info@neversaymaybe.co.id</a></p>
						                		<p>Thank You!</p>
						                		<p>Masih banyak lagi merchandise keren dari MARLBORO IN OR OUT! kunjungi halaman Auction.</p>'
		    						));
			$this->notificationHelper->send_mail($mail);

			$redeem['message'] = "Kamu berhasil redeem 1 Collectible Item dari MARLBORO IN OR OUT!";
		}

		print json_encode($redeem);
		exit;
	}
		
	
	
	function inputcode(){ 
		print json_encode($this->badgesHelper->inputCode(false,'input code'));
		exit; 
	}
	
	
	function ajax(){
		$needs = $this->_p('needs');
		$data['result'] = false;
		$data['message'] = "please using credential ";
		if($needs =='whoiswinner') $data = $this->auctionHelper->generateAuctionWinner();		
		if($needs =='checkcollection') $data = $this->merchandiseHelper->checkredeem();		
		print json_encode($data);exit;
	}
} 
?>