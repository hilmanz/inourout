<?php
class aspiration extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		GLOBAL $CONFIG;
		if(intval($this->_p('asp_post'))==1){
			$asp = strlen(strip_tags($this->_p('aspiration')));

			if($asp>0){
				$this->userHelper = $this->useHelper('userHelper');
				$submit = $this->userHelper->aspirationSubmit();

				if($submit['status'] == 1){
					$this->assign("msg","saving.. please wait");
		
					// sendRedirect("{$CONFIG['BASE_DOMAIN']}profile");
					 
					// return $this->out(TEMPLATE_DOMAIN_WEB . '/login_message.html');
					// die();
					echo json_encode(array('status'=>1));
					exit;
				}else{
					echo json_encode(array('status'=>2,'msg'=>'Aspirasimu gagal disimpan, silahkan coba lagi.'));
					exit;
				}
			}else{
				echo json_encode(array('status'=>0,'msg'=>'Kamu belum mengisi kolom aspirasimu. Kamu dapat mengisi atau memperbaharui aspirasimu di menu Profile.'));
				exit;
			}
		}
		
		if(strip_tags($this->_g('page'))=='aspiration') $this->log('surf','aspiration');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/aspiration.html');
		
	}
}
?>