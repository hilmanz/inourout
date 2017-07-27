<?php
class shareandbrag extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		 
		$this->sharebragHelper = $this->useHelper('sharebragHelper');
		$this->notificationHelper = $this->useHelper('notificationHelper');
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
				
		$sharebragList = $this->sharebragHelper->sharebragList($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		// pr($sharebragList);
		$this->assign('total',intval($sharebragList['total']));
		$this->assign('list',$sharebragList['result']);
		$this->assign('resEvent',$sharebragList['resEvent']);
		$this->assign('time',$time);
		$this->assign('winner',intval($this->_p('winner')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','notification');
				
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','home');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/share-and-brag.html');		
	}
	
	function ajaxconfirmed()
	{
		
		$ajax = $this->sharebragHelper->ajax();
		//var_dump($ajax);
		
		if ($ajax){
			echo json_encode($ajax);
		}else{ 
			echo json_encode(array('status'=>false));
		}
		
		exit;
	}

	function ajaxnotifNmail(){
		global $CONFIG;

		$eventID = intval($this->_p('vid'));

		$this->notificationHelper->notif_log(7,0,0,"challenge/finalist/".$eventID);
		$allUser = $this->notificationHelper->allUser();
		//pr($allUser);exit;
		
		//send to all user
		$mail=array();
		foreach ($allUser as $key => $value) {

			$mail[$key]['email']=$value['email'];
			$mail[$key]['name']=$value['name'];
			$mail[$key]['subject'] = 'Pengumuman "Top 10 Finalists Challenge of The Week" di MARLBORO IN OR OUT';

			$mail[$key]['msg']=$this->notificationHelper->email_template(
		    						array(
		    							'username'=>$value['name'],
		    							'message'=>"<p>Untuk kamu yang belum tahu siapa saja 10 finalis teratas di Challenge of The Week, langsung aja log on ke <a href='".$CONFIG['BASE_DOMAIN']."'>www.neversaymaybe.co.id</a> untuk lihat daftarnya. Jangan lewatkan tantangan baru Challenge of The Week di bulan depan!</p>"
		    						));
		}
		//pr($mail);exit;
		$this->notificationHelper->send_mail($mail);
	}
	
	function ajaxPaging()
	{
		
		$start = $this->_p('start');
		
		if ($this->_p('ajax')){
			$ajax = $this->sharebragHelper->sharebragList($start);		
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