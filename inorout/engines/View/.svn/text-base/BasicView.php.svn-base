<?php
include_once $GLOBAL_PATH."engines/Smarty/Smarty.class.php";
class BasicView extends Smarty{
	var $templates = array();
	function BasicView(){
		global $GLOBAL_PATH;
		 parent::__construct();
		 
		  $this->setTemplateDir($GLOBAL_PATH."templates/");
        $this->setCompileDir($GLOBAL_PATH.'tmp/');
        $this->setConfigDir($GLOBAL_PATH.'config/');
        // $this->setCacheDir($GLOBAL_PATH.'cache/');

		 // $this->debugging = true; 
        $this->caching = false; 
		$this->error_reporting = E_ALL & ~E_NOTICE;

	}
	 function toString($str){
		//return parent::fetch($this->template_dir.$str);
		return parent::fetch($str);
	 }
	 function attach($arr){
	 	foreach($arr as $name=>$value){
			$this->assign($name,$value);
		}
	 }


	 function confirm($msg,$onYes,$onNo,$path_to_template="common"){
	 	$this->assign("msg",$msg);
	 	$this->assign("onyes",$onYes);
	 	$this->assign("onno",$onNo);
	 	return $this->toString($path_to_template."/confirm.html");
	 }
	 function showMessage($msg,$urlBackTo,$path_to_template="common"){
	 	$this->assign("msg",$msg);
		$this->assign("url",$urlBackTo);
	 	return $this->toString($path_to_template."/message.html");
	 }

     //link 02-07-2010, ERROR HANDLING
     function showMessageError($er,$urlBackTo,$path_to_template="common"){
	 	$this->assign("er",$er);
		$this->assign("url",$urlBackTo);
	 	return $this->toString($path_to_template."/error.html");
	 }
}
?>