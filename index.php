<?php
	/**
	*load class when need.
	*/
	function __autoload($class_name) {
	    include 'controller/'.$class_name . '.class.php';
	}
	include('router.php');
	/**
	*parse uri;
	*/
	$uri = parse_url($_SERVER['REQUEST_URI']);
	// preg_match('/.*+\/?/', $uri, $matches);
    $action_alias = str_replace('/Zipdrug/','',$uri['path']);
	$q = explode('/', $action_alias);
	if(empty($q[0])){
		$module = 'user';
		$component = 'signup';
	}else{
		$module = $q[0];
		$component = $q[1];
	}
	
	$login = false;
	if(isset($_COOKIE['username']) &&isset($_COOKIE['password']) ){
		$login = true;
	}
	// if(isset($model[$module][$component])){
	// 	include(__DIR__.'/models/'.$model[$module][$component]);
	// }
	/**
	*take care of form post here. call back.
	*/
	if($_POST && $action[$module][$component]){
		$a = $action[$module][$component];
		$error = call_user_func_array($a[0],$a[1]);
	}
	if( isset($action[$module][$component]['no_post'] )){
		$a = $action[$module][$component]['no_post'];
		call_user_func($a[0]);
	}
	/**
	* render templates
	*/
 	include(__DIR__.'\views\head.php');
 	if(isset($error)){
 		print '<div class="alert alert-danger">
				  <strong>Error!</strong>'.$error.'
				</div>';
 	}
	if($login==false && $component!='login'){
		include(__DIR__.'\views\signup.php');
	}else{
		include(__DIR__.'\views\\'.$page[$module][$component]['body']);
	}
  	 
  	 include(__DIR__.'\views\foot.php'); 
