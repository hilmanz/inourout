<?php
class SQLData{
	var $schema;
	var $conn;
	var $rs;
	var $msg;
	var $lastInsertId;
	var $autoconnect=false;
	var $database;
	var $previous_query;
	var $idxdb=0;
	function SQLData(){
		global $CONFIG;
		$this->msg="";
		$this->host = $CONFIG['DATABASE'][0]['HOST'];
		$this->username = $CONFIG['DATABASE'][0]['USERNAME'];
		$this->password = $CONFIG['DATABASE'][0]['PASSWORD'];
		$this->database = $CONFIG['DATABASE'][0]['DATABASE'];
	}
	function getConnection(){
		return $this->conn;
	}
	function open($db=0){
		
		global $CONFIG;
		$this->idxdb = $db;
        $this->host = $CONFIG['DATABASE'][$db]['HOST'];
		$this->username = $CONFIG['DATABASE'][$db]['USERNAME'];
		$this->password = $CONFIG['DATABASE'][$db]['PASSWORD'];
		$this->database = $CONFIG['DATABASE'][$db]['DATABASE'];
		
		if($this->conn==NULL){
			
			$this->conn = mysql_connect($this->host,$this->username,$this->password);
			$this->addMessage("Open Connection -->".$this->conn);
		}else{
			$this->addMessage("Connection already opened : ".$this->conn."<br/>");
		}	
		//print $this->database;
	}
	function addMessage($msg){
		$this->msg.=$msg."<br/>";
	}
	function close(){
		if($this->conn!=NULL){
			if(@mysql_close($this->conn)){
				$this->addMessage("Connection closed --> ".$this->conn);
				$this->conn=NULL;
			}
		}else{
			$this->addMessage("Connection already closed --> ".$this->conn);
		}
	}
	function setSchema($schema){
		$this->schema = $schema;
	}
	function force_utf8(){
		mysql_query('SET CHARACTER SET utf8');
	}
	/**
	 * @deprecated
	 */
	function force_connect($flag){
		$this->autoconnect = $flag;
	}
	function fetch($str,$flag=0){
		$rs = null;
		
		if($this->conn==null) $this->open($this->idxdb);
		$sql = $this->query($str);
		if($sql){
			if($flag){
				$n=0;
				while($fetch = mysql_fetch_array($sql,MYSQL_ASSOC)){
					$rs[$n] = $fetch;
					$n++;
				}
			}else{
				$rs = mysql_fetch_array($sql,MYSQL_ASSOC);
			}
			mysql_free_result($sql);
		}
		if($this->conn==null) $this->close();
		$this->previous_query = $sql;
		return $rs;
	}
	function fetch_single($sql,$flag=false){
		if($flag)$this->open($this->idxdb);
		$q = $this->query($sql);
		$n=0;
		$fetch = @mysql_fetch_array($q,MYSQL_ASSOC);
		mysql_free_result($q);
		if($flag)$this->close();
		$this->previous_query = $sql;
		return $fetch;
	}
	function fetch_many($sql,$flag=false){
		if($flag)$this->open($this->idxdb);
		$q = $this->query($sql);
		$n=0;
		while($fetch = @mysql_fetch_array($q,MYSQL_ASSOC)){
			$rs[$n] = $fetch;
			$n++;
		}
		mysql_free_result($q);
		if($flag)$this->close();
		$this->previous_query = $sql;
		return $rs;
	}
	function reset(){
		$this->rs = NULL;
		
	}
	function query($sql,$flag=false){
		$this->addMessage("do query using ".$this->conn.":".PHP_EOL);
		if($this->conn==null) $this->open($this->idxdb);			
		$sDbQuery = mysql_select_db($this->database);
		$rs = mysql_query($sql,$this->conn);	
		
		//do these as default if the query have "INSERT" keyword
		if(@eregi("INSERT",$sql)){
			$this->lastInsertId = mysql_insert_id();
		}
		$this->addMessage($rs);
		$this->addMessage(mysql_error().PHP_EOL);
		
		if($this->conn==null) $this->close();	
		$this->previous_query = $sql;
		return $rs;
	}
	function query_manual($sql,$flag=false){
		$this->addMessage("do query using ".$this->conn.":".PHP_EOL);
					
		$sDbQuery = mysql_select_db($this->database);
		$rs = mysql_query($sql,$this->conn);	
		
		//do these as default if the query have "INSERT" keyword
		if(@eregi("INSERT",$sql)){
			$this->lastInsertId = mysql_insert_id();
		}
		$this->addMessage($rs);
		$this->addMessage(mysql_error().PHP_EOL);
			
		$this->previous_query = $sql;
		return $rs;
	}
	 
	function getMessage(){
		$msg=mysql_error();
		$msg.="<br/>";
		$msg.=$this->msg;
		return $msg;
	}
	function getConsoleMessage(){
		$msg=mysql_error();
		$msg.="\n";
		$msg.=str_replace("<br/>","\n",$this->msg);
		return $msg;
	}
	function getLastInsertId(){
		return $this->lastInsertId;
	}
	
}
?>