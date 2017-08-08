<?php
require_once("functions.php");
require_once("database.php");
require_once("session.php");
require_once("user.php");

    $username = $_POST["username"];
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$errors = array();
	$message = array();
	
	if(empty($username)|| empty($password)){
	  $errors[] = "Enter User Name and Password";
	  $session->message($errors);
	  //redirect_to("");
	} else{
		$vars = array(
		"id" => "",
		"username" => $username,
		"email" => $email,
		"password" => $password
		);
		
		$user->variables = $vars;
		User::$table_name = "sign_up";
		
		//$result = user::find_by_sql("SELECT username FROM sign_up WHERE username = '$username' LIMIT 1");
		$result = user::find_by_sql("SELECT username FROM sign_up WHERE username = '$username' LIMIT 1");
		if(!empty($result)){                                                          
		  $errors[] = "Input another Username, username already exists";
		  $session->message($errors);
		  //redirect_to("");
		}
		else{
		  if($user->save()){
			$message[] = "Signed Up successfully";
		  }
		  $session->message($message);
		  $session->login($username);
		  redirect_to("indexhtml.php");
		}
	 }	

?>