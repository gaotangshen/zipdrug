<?php
class User{
	private $conn;
	public function __construct(){
		$this->conn = new DB('localhost','test');
	}
	function register($data){
		/**
		*check exist
		*/
		$stmt = $this->conn->dbh->prepare("select * from users where username=:username and password=:password and status=1");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':password', $password);
		$email = $data['email'];
		$password = md5($data['password']);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['username']){
			return $error = "username exist";
		}

		$stmt = $this->conn->dbh->prepare("insert into users(username, password, status) values(:username,:password,:status)");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':status', $status);
		$email = $data['email'];
		$password = md5($data['password']);
		$status = 1;
		$stmt->execute();
		setcookie("username", $email, time()+3600*24,'/');
		setcookie("password", $password, time()+3600*24,'/');
		header("Location: http://localhost/Zipdrug/user/home"); /* Redirect browser */
		exit();
	}
	function login($data){
		$stmt = $this->conn->dbh->prepare("select * from users where username=:username and password=:password and status=1");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':password', $password);
		$email = $data['email'];
		$password = md5($data['password']);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['username']){
			setcookie("username", $email, time()+3600*24,'/');
			setcookie("password", $password, time()+3600*24,'/');
			header("Location: http://localhost/Zipdrug/user/home"); /* Redirect browser */
			exit();
		}else{
			return $error = "username or password wrong";
		}

	}
	function follow($data){
		$stmt = $this->conn->dbh->prepare("insert into follows(username, following, status) values(:username,:following,:status)");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':following', $following);
		$stmt->bindParam(':status', $status);
		$email = $_COOKIE['username'];
		$following = $data['username'];
		$status = 1;
		$stmt->execute();
		header("Location: http://localhost/Zipdrug/user/home"); /* Redirect browser */
		exit();
	}
	function unfollow($data){
		$stmt = $this->conn->dbh->prepare("update follows set status=:status where username=:username and following=:following and status=1");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':following', $following);
		$stmt->bindParam(':status', $status);
		$email = $_COOKIE['username'];
		$following = $data['username'];
		$status = 0;
		$stmt->execute();
		header("Location: http://localhost/Zipdrug/user/home"); /* Redirect browser */
		exit();
	}
	function follower($data){
		$follows = array();
		$stmt = $this->conn->dbh->prepare("select * from follows where username=:username and status=:status");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':status', $status);
		$email = $_COOKIE['username'];
		$status = 1;
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $key => $value) {
			$follows[$value['following']] = true;
		}
		return $follows;
	}
	function signout(){
		setcookie("username", $email, time()-3600,'/');
		setcookie("password", $password, time()-3600,'/');
		header("Location: http://localhost/Zipdrug/user/signup"); /* Redirect browser */
		exit();
	}
}