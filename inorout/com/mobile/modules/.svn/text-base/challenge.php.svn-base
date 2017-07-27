<?php
class challenge extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['MOBILE_SITE']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_MOBILE']);		
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
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/challenge.html');
		
	}

	function categories(){
		$challenge = $this->challengeHelper->getChallenge();
		//pr($challenge[0]['id']);
		$this->assign('challenge', $challenge);
		$this->assign('challenge_id', $challenge[0]['id']);
		$gallery = $this->challengeHelper->getChallengeGallery();
		//pr($gallery);exit;
		$this->assign('gallery', $gallery);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','categories');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/challenge-categories.html');
	}
	function uploadphoto(){
		
		global $CONFIG, $basedomain;
		
		$challenge_id = intval($_GET['id']);
		if ($challenge_id<1) sendRedirect("{$basedomain}challenge");
		
		$this->assign('challenge_id', $challenge_id);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','uploadphoto');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/challenge-UploadPhoto.html');
	}
	
	function finalist(){
		$challenge = $this->challengeHelper->getChallenge();
		// pr($challenge);
		$this->assign('challenge', $challenge);
		$gallery = $this->challengeHelper->getChallengeGallery(false,true,false);
		// pr($challenge);
		foreach ($gallery as $key => $value) {
			$gallery[$key]['is_voted']=2;
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
		
		$this->assign('gallery', $gallery);
		$nextchallenge = $this->challengeHelper->getNextChallenge();
		// pr($challenge);
		$this->assign('nextchallenge', $nextchallenge);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','finalist');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/challenge-finalist.html');
	}
	function photodetails(){
		
		$pid = intval($this->_g('pid'));
		$contentid = intval($this->_g('id'));
		
		// pr($_GET);
		// pr($paging);
		// $count = 0;
		$countData = $this->challengeHelper->getChallengeGallery(false,true,false);
		if ($countData){
			$count = intval(count($countData));
		}
		// pr($countData);
		
		foreach ($countData as $key=>$val){
			$newKey[$key] = $val['id']; 
			
		}
		
		if (in_array($pid,$newKey)){
			foreach ($newKey as $key=>$val){
				if ($pid==$val){
					$current = $key;
				}
			}
		}
		
		if ($current>0 and $current<($count-1)){
			$prev = $countData[$current-1]['id'];
			$newDataArr[] = $countData[$current];
			$next = $countData[$current+1]['id'];
		}else{
			if ($current==$count-1){ 
				$prev = $countData[$current-1]['id'];
				$newDataArr[] = $countData[$current];
				$next = "";
			}else{ 
				$prev = "";
				$newDataArr[] = $countData[$current];
				$next = $countData[$current+1]['id'];
			}
			
		}
		
		
		// pr($prev);
		// pr($newDataArr);
		// pr($next);
		// pr($current);
		
		if (in_array($pid,$newKey)){
			
			$pidKey = array_keys($newKey[$pid]);
		}
		// $gallery = $this->challengeHelper->getChallengeGallery(false,true,false,$pid,3);
		
		
	 	$nextchallenge = $this->challengeHelper->getNextChallenge();
		// pr($gallery);
		foreach ($newDataArr as $key => $value) {
			$newDataArr[$key]['is_voted']=2;
			// $gallery[$key]['photo_id_voted'] = 0;

			// if($key==0){
			$check = $this->votingHelper->check_vote($value['eventid'],$value['id']);
			if($check){
				$newDataArr[$key]['is_voted'] =1;
				$newDataArr[$key]['photo_id_voted'] =  intval($check['photoID']);
			} 
			// }else{
				// $gallery[$key]['photo_id_voted'] = $gallery[0]['photo_id_voted'];
			// }
			
		}
		// pr($count);
		$this->assign('gallery', $newDataArr);
		$this->assign('next', $next);
		$this->assign('prev', $prev);
		$this->assign('contentid', $contentid);
		
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','photodetails');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/widgets/photo-detail.html');
	}

	function rules(){
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','rules');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/challenge-rules.html');
	}
	
	function winner(){
		$challenge = $this->challengeHelper->getChallenge();
		// pr($challenge);
		$this->assign('challenge', $challenge);
		$gallerywinner = $this->challengeHelper->getChallengeGallery(false,true,true);
		// pr($challenge);
		$this->assign('gallerywinner', $gallerywinner);
		$gallery = $this->challengeHelper->getChallengeGallery(false,true,false);
		
		
	 	$nextchallenge = $this->challengeHelper->getNextChallenge();
		// pr($challenge);
		foreach ($gallery as $key => $value) {
			$gallery[$key]['is_voted']=2;
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
		$this->assign('gallery', $gallery);
		pr($gallery);
		$this->assign('nextchallenge', $nextchallenge);
		if(strip_tags($this->_g('page'))=='challenge') $this->log('surf','winner');
		return $this->View->toString(TEMPLATE_DOMAIN_MOBILE .'/apps/challenge-winner.html');
	}
	
	function ajax(){
		global $CONFIG,$basedomain;
		$needs = strip_tags($this->_g('needs'));
		$challenge_id = strip_tags($this->_p('challenge_id'));
		$uploadPhoto = intval($this->_p('uploadPhoto'));
		
		// pr($_GET);
		// exit;
		if($uploadPhoto) {
			$path = $CONFIG['LOCAL_PUBLIC_ASSET']."sharebrags/";
			//pr($path);exit;
			if (isset($_FILES['upload_photo'])&&$_FILES['upload_photo']['name']!=NULL) {
				if (isset($_FILES['upload_photo'])&&$_FILES['upload_photo']['size'] <= 20000000) {
					$uploadata = $this->uploadHelper->uploadThisFile($_FILES['upload_photo'],$path);
					if($uploadata['result']==1){
						$data = array('challenge_id'=>$challenge_id,
								'img'=>$uploadata['arrFile']['filename']);
						
						$sharebrags = $this->challengeHelper->saveChallenge($data);
// pr($sharebrags);
						if($sharebrags){
							// print json_encode(array('result'=>true,'message'=>'Upload Berhasil.'));
							// exit;
							sendRedirect("{$basedomain}categories/{$challenge_id}");
							exit;
						}
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
					print json_encode(array('result'=>2,'message'=>'Vote1 Gagal, Silahkan coba lagi.'));
					exit;
				}
			}else{
				print json_encode(array('result'=>2,'message'=>'Vote2 Gagal, Silahkan coba lagi.'));
				exit;
			}
		}

		print json_encode(array('result'=>0,'message'=>'Kamu sudah pernah vote photo di theme ini.'));
		exit;	
	}
} 
?>