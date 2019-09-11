<?php
Class KwtConfigtrx{
	function __Construct(){
		$this->dbhost = 'localhost:3308';
		$this->dbuser = 'root';
		$this->dbpass = 'root';
		$this->dbName = 'kwitansi';
		$this->conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);
		$this->kwNumPattern = "/T M Z B S I _ T R X/".$this->Tanggal('romawi')."/".$this->Tanggal('th');
	}
}
?>