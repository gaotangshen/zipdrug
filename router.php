<?php
$page =  array();
$action = array();

$page['user']['signup']['body'] = 'signup.php';
$page['user']['login']['body'] = 'login.php';
$page['user']['home']['body'] = 'home.php';
$page['blog']['post']['body'] = 'blog.php';

$user = new User();

$action['user']['signup'] = array(array($user,'register'),array($_POST));
$action['user']['login'] = array(array($user,'login'),array($_POST));
$action['user']['signout']['no_post'] = array(array($user,'signout'));

$blog = new Blog();
$action['blog']['post'] = array(array($blog,'post'),array($_POST));



?>
