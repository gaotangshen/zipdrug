<?php
Class Blog{
	private $conn;
	public function __construct(){
		$this->conn = new DB('localhost','test');
	}
	function post($data){		
		$stmt = $this->conn->dbh->prepare("insert into blogs(username, content, date, published, title, file) values(:username, :content, :date, :published, :title , :file)");
		$stmt->bindParam(':username', $email);
		$stmt->bindParam(':content', $content);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':published', $published);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':file', $file);
		$this->conn->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$email = $_COOKIE['username'];
		$content = $data['content'];
		$title = $data['title'];
		$date = date('Y-m-d H:i:s');
		$published = 1;
		$target_dir = 'C:/wamp/www/Zipdrug/static/files/';
		$file = time().basename($_FILES["file"]["name"]);
		$target_file = $target_dir .$file;
		if(!move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)){
			return $error = "failed to upload";
		}
		try{
			$stmt->execute();
		}catch(Exception $e){
			var_dump($e);
		}
		
		header("Location: http://localhost/Zipdrug/user/home"); /* Redirect browser */
		exit();
	}

	function all(){
		$blogs = array();
		$stmt = $this->conn->dbh->prepare("select * from blogs where published = 1 order by date desc");
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $key => $value) {
			$blogs[$key]['blogid'] = $value['blogid'];
			$blogs[$key]['username'] = $value['username'];
			$blogs[$key]['content'] = $value['content'];
			$blogs[$key]['date'] = $value['date'];
			$blogs[$key]['title'] = $value['title'];
			$blogs[$key]['file'] = $value['file'];
		}
		return $blogs;
	}
	function blogFromFollower($user){
		$blogs = array();
		$stmt = $this->conn->dbh->prepare("select blogs.* 
											from blogs 
											join follows on blogs.username=follows.following
											where published = 1 and follows.username=:username and follows.status=1
											order by date desc");
		$stmt->bindParam(':username', $username);
		$username = $user;
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $key => $value) {
			$blogs[$key]['blogid'] = $value['blogid'];
			$blogs[$key]['username'] = $value['username'];
			$blogs[$key]['content'] = $value['content'];
			$blogs[$key]['date'] = $value['date'];
			$blogs[$key]['title'] = $value['title'];
			$blogs[$key]['file'] = $value['file'];
		}
		return $blogs;
	}

}