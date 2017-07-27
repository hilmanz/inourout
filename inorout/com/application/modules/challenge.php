<?php
class challenge extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		$this->badgesHelper = $this->useHelper('badgesHelper'); 
		$this->challengeHelper = $this->useHelper('challengeHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->votingHelper = $this->useHelper('votingHelper');
	}
	
	function main(){
	
		$challenge = $this->challengeHelper->getChallenge();
		// pr($challenge);
		$this->assign('challenge', $challenge);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','challenge');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/challenge.html');
		
	}

	function categories(){
		$challenge = $this->challengeHelper->getChallenge();
		//pr($challenge[0]['id']);
		$this->assign('challenge', $challenge);
		$this->assign('challenge_id', $challenge[0]['id']);
		$gallery = $this->challengeHelper->getChallengeGallery();
		//var_dump($gallery);exit;
		$this->assign('gallery', $gallery);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','categories');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/challenge-categories.html');
	}

	function finalist(){
		$challenge = $this->challengeHelper->getChallenge();
		// pr($challenge);
		$this->assign('challenge', $challenge);
		$gallery = $this->challengeHelper->getChallengeGallery(false,true,false);
		//var_dump($gallery);
		foreach ($gallery as $key => $value) {
			$gallery[$key]['is_voted']=0;
			// $gallery[$key]['photo_id_voted'] = 0;

			// if($key==0){
			$check = $this->votingHelper->check_vote($value['eventid'],$value['id']);
			if($check){
				$gallery[$key]['is_voted'] =1;
				$gallery[$key]['photo_id_voted'] =  intval($check['photoID']);
			} 
			// }else{
				// $gallery[$key]['photo_id_voted'] = $gallery[0]['photo_id_voted'];
			// }
			
		}
		//pr($gallery);
		$this->assign('gallery', $gallery);
		$nextchallenge = $this->challengeHelper->getNextChallenge();
		
		$this->assign('nextchallenge', $nextchallenge);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','finalist');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/challenge-finalist.html');
	}

	function winner(){
		$challenge = $this->challengeHelper->getChallenge();
		// pr($challenge);
		$this->assign('challenge', $challenge);
		$gallerywinner = $this->challengeHelper->getChallengeGallery(false,true,true);
		// pr($challenge);
		$this->assign('gallerywinner', $gallerywinner);
		$gallery = $this->challengeHelper->getChallengeGallery(false,true,false);
		// pr($challenge);
		$this->assign('gallery', $gallery);
	 	$nextchallenge = $this->challengeHelper->getNextChallenge();
		// pr($challenge);
		$this->assign('nextchallenge', $nextchallenge);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','winner');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/challenge-winner.html');
	}

	function rules(){
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','rules');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/challenge-rules.html');
	}
	
	function ajax(){
		global $CONFIG;
		$needs = strip_tags($this->_g('needs'));
		$challenge_id = intval($this->_p('challenge_id'));
		//pr($challenge_id);exit;
		if($needs=='upload') {
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."sharebrags/";
				//pr($path);exit;
				if (isset($_FILES['images'])&&$_FILES['images']['name']!=NULL) {
					if (isset($_FILES['images'])&&$_FILES['images']['size'] <= 20000000) {
						$uploadata = $this->uploadHelper->uploadThisFile($_FILES['images'],$path);
						if($uploadata['result']==1){
							$data = array('challenge_id'=>$challenge_id,
									'img'=>$uploadata['arrFile']['filename']);
							//pr($data);exit;
							$sharebrags = $this->challengeHelper->saveChallenge($data);

							if($sharebrags){
								if($challenge_id==2){
									$badge = $this->badgesHelper->giveuserbadges('1st upload photo tokyo',1);
								}elseif($challenge_id==1){
									$badge = $this->badgesHelper->giveuserbadges('1st upload photo london',1);	
								}elseif($challenge_id==3){
									$badge = $this->badgesHelper->giveuserbadges('1st upload photo newyork',1);	
								}
								if($badge['result']){
									print json_encode(array(
										'result'=>true,
										'message'=>'Fotomu berhasil terupload! Selamat kamu mendapatkan 1 badge! Terus ikuti Challenge of The Week untuk melengkapi koleksi badges-mu!',
										'type'=>'popup'
									));
								}else{
									print json_encode(array('result'=>true,'message'=>'Fotomu berhasil terupload! Terus ikuti Challenge of The Week untuk melengkapi koleksi badges-mu!'));
								}
								exit;
							}
						}else{
							print json_encode(array('result'=>true,'message'=>'Upload gagal, tipe file harus jpg atau png.'));
							exit;
						}


					} 
				}
		}
		
		
	}

	function vote(){
		global $CONFIG;		
		
		$check = $this->votingHelper->check_vote();
		
		$vote=null;
		if(!$check){
			$contentID = intval($this->_p('content_id'));
			$photoid = intval($this->_p('photo_id'));
			if($contentID>0&&$photoid>0){
				$vote = $this->votingHelper->vote();
				if($vote){
					$event_name = strip_tags($this->_p('theme'));
					$getCommonBadge = $this->badgesHelper->offlinebadges('vote photo '.$event_name,'online');
					
					print json_encode(array('result'=>1,'message'=>'Vote telah berhasil'));
					exit;
				}else{
					print json_encode(array('result'=>2,'message'=>'Vote Gagal, Silahkan coba lagi.'));
					exit;
				}
			}else{
				print json_encode(array('result'=>2,'message'=>'Vote Gagal, Silahkan coba lagi.'));
				exit;
			}
		}

		print json_encode(array('result'=>0,'message'=>'Kamu sudah pernah vote photo di theme ini.'));
		exit;	
	}
	
} 
?>