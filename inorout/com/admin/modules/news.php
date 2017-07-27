<?php
class news extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG; 
		
		$this->newsHelper = $this->useHelper('newsHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){ 
	
		$newsList = $this->newsHelper->newsList($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		
		// pr($newsList);
		$this->assign('total',intval($newsList['total']));
		$this->assign('list',$newsList['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','news update');
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/news-pages.html');		
	}
	
	function hapus(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->newsHelper->getHapus($cidStr);
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."news");
			exit;
		}
	}
	
	function newscontentedit()
	{	
		// test
		global $CONFIG;
		$id = intval($this->_request('id'));
		if($this->_p('editit')=='ok'){ 
		$uploadnews = false;
		// pr($_POST);exit;
		if (isset($_FILES['image'])&&$_FILES['image']['name']!=NULL) {
			if (isset($_FILES['image'])&&$_FILES['image']['size'] <= 2000000) {
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."news/";
				//$files=NULL,$path=NULL,$maxSize=1000,$resizeOriginal=false,$createThumb=true
				$data = $this->uploadHelper->uploadThisImage($_FILES['image'],$path,1000,false,false);
				
				if ($data['arrImage']!=NULL) { 
					$uploadnews = $data['arrImage']['filename'];
				}
			}else{
				echo '2';
			}
		} 
		
			$updatethedata = $this->newsHelper->updatethedata($id, $uploadnews); 
			if($updatethedata==true){
				sendRedirect($CONFIG['ADMIN_DOMAIN']."news");
				exit;
			}
		}	
		$selectupdatedata = $this->newsHelper->selectupdatedata($id);
		// pr($selectupdatedata);
		$this->assign('type',$selectupdatedata['type']);
		$this->assign('selectupdatedata',$selectupdatedata);
		$cityreference = $this->newsHelper->cityreference();	
		$this->assign('cityreference',$cityreference);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/news-update.html');
	}
	
	function newDataInput()
	{
		global $CONFIG;
			 
			$cityreference = $this->newsHelper->cityreference();	
			// pr($cityreference);
			// var_dump($cityreference);exit;
			$this->assign('cityreference',$cityreference);
		 
		if ($this->_p('submit')){
		
			// insert data dulu 
			$images = $_FILES['images'];
			$insertnewsupdate = $this->newsHelper->insertnewsupdate();
			
			if($insertnewsupdate){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."news/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path,1000,false,false);
				
				// update data
				$updateEvent = $this->newsHelper->newsupdate($insertnewsupdate,$uploadnews['arrImage']['filename']);
				$this->log('surf',"insert news");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."news");
			}
	
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/news-input.html');
	} 
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->newsHelper->newsList($start);		
		}
		// pr($ajax);
		if ($ajax){ 
			print json_encode(array('status'=>true, 'data'=>$ajax));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
	}
	
}
?>