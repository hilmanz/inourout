<?php
class merchandise extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG; 
		
		$this->merchandiseHelper = $this->useHelper('merchandiseHelper');
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
	
		$merchandiseList = $this->merchandiseHelper->merchandiseList($start=null,$limit=10);	
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',intval($merchandiseList['total']));
		$this->assign('list',$merchandiseList['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','merchandise');
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/merchandise-pages.html');		
	}
	
	function hapus(){
		global $CONFIG;
		$cidStr = intval($this->_request('id'));
		$result = $this->merchandiseHelper->getHapus($cidStr);
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."merchandise");
			exit;
		}
	}
	
	function newDataInput()
	{
		global $CONFIG;
		if ($this->_p('submit')){
		// pr($_FILES);exit;
		// insert data dulu 
			$images = $_FILES['images'];
			$insertnewdata = $this->merchandiseHelper->insertnewdata();
			
			if($insertnewdata){
				$path = $CONFIG['LOCAL_PUBLIC_ASSET']."merchandise/";
				// upload image dulu
				$uploadnews = $this->uploadHelper->uploadThisImage($images,$path);
				
				// update data
				$updateEvent = $this->merchandiseHelper->newsupdate($insertnewdata,$uploadnews['arrImage']['filename']);
				$this->log('surf',"insert merchandise");
				sendRedirect($CONFIG['ADMIN_DOMAIN']."merchandise");
			}

		} 
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/merchandise-input.html');
	} 
	
	function merchandiseedit()
	{
		global $CONFIG;
		$id = intval($this->_request('id'));
		if($this->_p('editit')=='ok'){ 
			
			// pr($_FILES);
			// exit;
			if (isset($_FILES['image'])&&$_FILES['image']['name']!=NULL) {
					if (isset($_FILES['image'])&&$_FILES['image']['size'] <= 2000000) {
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."merchandise/";
						
						$data = $this->uploadHelper->uploadThisImage($_FILES['image'],$path);
						
						if ($data['arrImage']!=NULL) { 
							$uploadmerch = $data['arrImage']['filename'];
						}
					}else{
						echo '2';
					}
				}else{
					echo '1';
				}
		
			$updatethedata = $this->merchandiseHelper->updatethedata($id, $uploadmerch);  
			
			// exit;
			if($updatethedata==true){
				sendRedirect($CONFIG['ADMIN_DOMAIN']."merchandise");
				exit;
			}
		}	
		$selectupdatedata = $this->merchandiseHelper->selectupdatedata($id);
		// pr($selectupdatedata);
		$this->assign('selectupdatedata',$selectupdatedata); 
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/merchandise-update.html');
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->merchandiseHelper->merchandiseList($start);		
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