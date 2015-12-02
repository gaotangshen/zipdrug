<?php
	function __autoload($class_name) {
	    include 'controller/'.$class_name . '.class.php';
	}
	if(isset($_POST['email']) && isset($_POST['password'])){
		$user = new User;
		$user->register($_POST);
	}
	if(isset($_COOKIE['username']) &&isset($_COOKIE['password']) ){
		$login = true;
		// header("Location: http://localhost/Zipdrug/views/home.php"); /* Redirect browser */
		// exit();
	}
?>
	<?php require_once(__DIR__.'\views\head.php');?>

  	<?php 
  		if($login==true){
  			require_once(__DIR__.'\views\home.php');
  		}else{
  			require_once(__DIR__.'\views\signup.php');
  		}
  	 
  	?>
  	<?php require_once(__DIR__.'\views\foot.php'); 
  	?>
<!-- Warning: require_once(C:\wamp\www\Zipdrug\views\singup.html): failed to open stream: No such file or directory -->