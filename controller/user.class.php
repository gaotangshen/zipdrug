<?php
class User{
	function register($data){
		$dbh = new PDO('mysql:host=localhost;dbname=test');
		$stmt = $dbh->prepare("insert into users(username, password, status) values(:username,:password,:status)");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':status', $status);
		$email = $data['email'];
		$password = md5($data['password']);
		$status = 1;
		$stmt->execute();
		setcookie("username", $email, time()+3600);
		setcookie("password", $password, time()+3600);
		return;
		// header("Location: http://localhost/Zipdrug/index.php"); /* Redirect browser */
		// exit();
	}
}