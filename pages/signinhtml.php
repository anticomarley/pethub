<?php
require_once("functions.php");
require_once("database.php");
require_once("session.php");
require_once("user.php");
   
    $username = $_POST["username"];
	$password = md5($_POST["password"]);
	$errors = array();
	$message = array();
	
	if(empty($username)|| empty($password)){
      $errors[] = "Username and Password are mandatory";
	  $session->message($errors);
	  //redirect_to("");
    } else {
	  //$result = user::find_by_sql("SELECT count(*) FROM sign_up WHERE username = '$username' AND password = '$password' LIMIT 1");
	  $result = user::find_by_sql("SELECT username, password FROM sign_up WHERE username = '$username' AND password = '$password' LIMIT 1");
	  if(!empty($result)){
	    $message[] = "User Successul Login";
	    $session->message($message);
	    $session->login($username);
		redirect_to("indexhtml.php");
	  } else {
	    $errors[] = "Wrong Username or Password";
		$session->message($errors);
		//redirect_to("");
	  }
	}
?>