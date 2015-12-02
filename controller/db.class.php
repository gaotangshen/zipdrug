<?php
class DB extends PDO{
	private $host;
	private $dbname;
	private $user;
	private $password;
	private $dsn;
	private $dbh;
	/**
	*start connection
	*/
	public function __construct($host,$dbname,$user=null,$password=null){
		$this->host = $host;
		$this->dbname = $dbname;
		$this->user = $user;
		$this->password = $password;
		$this->dsn = "mysql:host=".$host.";dbname=".$dbname;
		try{
			$this->dbh = new PDO($this->dsn);
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		
	}
	/**
	*close connection
	*/
	public function __destruct(){
		if($this->dbh){
			$dbh = null;
		}
	}
}

?>