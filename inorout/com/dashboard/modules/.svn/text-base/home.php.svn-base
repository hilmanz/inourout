<?php
class home extends App{
	
	
	function beforeFilter(){
	
		$this->uCategoryHelper = $this->useHelper("uCategoryHelper");
		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['DASHBOARD_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_DASHBOARD']);
				
		$this->assign('locale', $LOCALE[1]);
		$this->assign('startdate', $this->_g('startdate'));
		$this->assign('enddate', $this->_g('enddate'));
	
	}
	
	function main(){

		$alluser = $this->uCategoryHelper->allUserRegistration();
		$activeUser = $this->uCategoryHelper->activeUser();
		$userUnverified = $this->uCategoryHelper->userUnverified();
				
		$this->assign("alluser",$alluser);
		$this->assign("activeUser",$activeUser);
		$this->assign("userUnverified",$userUnverified);
		
		
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','home');
		return $this->View->toString(TEMPLATE_DOMAIN_DASHBOARD .'home.html');
		
	}

	//Data
	function loginActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->loginActivityHelper = $this->useHelper("loginActivityHelper");
		$loginTotal = $this->loginActivityHelper->getLoginTotal();
		$loginDaily = $this->loginActivityHelper->getLoginDaily();

		if($ajax){
			print json_encode(array(
								'login_total'=>$loginTotal,
								'login_daily'=>$loginDaily
								));
			exit;
		}else{
			return false;
		}


	}
	function gameActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->gameActivityHelper = $this->useHelper("gameActivityHelper");
		$getGameTotal = $this->gameActivityHelper->getGameTotal();

		if($ajax){
			print json_encode(array(
								'game_total'=>$getGameTotal
								));
			exit;
		}else{
			return false;
		}


	}

	function badgeActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->badgeActivityHelper = $this->useHelper("badgeActivityHelper");
		$getBadgeTotal = $this->badgeActivityHelper->getBadgeTotal();

		if($ajax){
			print json_encode(array(
								'total_trade'=>$getBadgeTotal
								));
			exit;
		}else{
			return false;
		}


	}

	function redeemActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->badgeActivityHelper = $this->useHelper("badgeActivityHelper");
		$getRedeemCodes = $this->badgeActivityHelper->getRedeemCodes();
		$getRedeemMerchandise = $this->badgeActivityHelper->getRedeemMerchandise();

		if($ajax){
			print json_encode(array(
								'redeem_code'=>$getRedeemCodes,
								'redeem_merchandise'=>$getRedeemMerchandise
								));
			exit;
		}else{
			return false;
		}


	}

	function auctionActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->auctionActivityHelper = $this->useHelper("auctionActivityHelper");
		$getAuction = $this->auctionActivityHelper->getAuction();

		if($ajax){
			print json_encode(array(
								'auction'=>$getAuction
								));
			exit;
		}else{
			return false;
		}


	}

	function articleActivity(){
		$ajax= intval($this->_p('ajax'));

		$this->articleActivityHelper = $this->useHelper("articleActivityHelper");
		$getTotalArticleRead = $this->articleActivityHelper->getTotalArticleRead();
		$getMostArticleRead = $this->articleActivityHelper->getMostArticleRead();
		$getLeastArticleRead = $this->articleActivityHelper->getLeastArticleRead();

		if($ajax){
			print json_encode(array(
								'total_read_article'=>$getTotalArticleRead,
								'most_read'=>$getMostArticleRead,
								'least_read'=>$getLeastArticleRead
								));
			exit;
		}else{
			return false;
		}


	}

	function userActicity(){
		$ajax= intval($this->_p('ajax'));

		$this->userActivityHelper = $this->useHelper("userActivityHelper");
		$getTop10Participant = $this->userActivityHelper->getTop10Participant();
		///age, gender, channel, city, brand_preference, verified
		$getAgePercentage = $this->userActivityHelper->getDemographicData('age');
		$getGenderPercentage = $this->userActivityHelper->getDemographicData('gender');
		$getChannelBar = $this->userActivityHelper->getDemographicData('channel');
		$getCityBar = $this->userActivityHelper->getDemographicData('city');
		$getBrandBar = $this->userActivityHelper->getDemographicData('brand_preference');
		$getVerifiedUser = $this->userActivityHelper->getDemographicData('verified');
		$getLoginHistory = $this->userActivityHelper->getLoginHistory();
		$getTotalAspiration = $this->userActivityHelper->getTotalAspiration();
		$getTopUserPoint = $this->userActivityHelper->getTopUserPoint(20);
		$getTopUserTime = $this->userActivityHelper->getTopUserTime(20);
		$getDailyTotalUserLogin = $this->userActivityHelper->getDailyTotalUserLogin();

		if($ajax){
			print json_encode(array(
								'top_10_participant'=>$getTop10Participant,
								'age_percentage'=>$getAgePercentage,
								'gender_percentage'=>$getGenderPercentage,
								'channel_bar'=>$getChannelBar,
								'city_bar'=>$getCityBar,
								'brand_bar'=>$getBrandBar,
								'login_history'=>$getLoginHistory,
								'total_aspiration'=>$getTotalAspiration,
								'top_20_point'=>$getTopUserPoint,
								'top_20_time'=>$getTopUserTime,
								'total_login_daily'=>$getDailyTotalUserLogin,
								'verified_user_data'=>$getVerifiedUser
								));
			exit;
		}else{
			return false;
		}

	}

	function badgesRouteActivities(){
		$ajax= intval($this->_p('ajax'));

		$this->badgeActivityHelper = $this->useHelper("badgeActivityHelper");
		$getBadgesPerUser = $this->badgeActivityHelper->getBadgesPerUser();
		if($ajax){
				print json_encode(array(
						'badges_list_per_user'=>$getBadgesPerUser
				));
			exit;
		}else{
			return false;
		}
	}
		
}
?>