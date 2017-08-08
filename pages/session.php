<?php

 class Session{
   
  private $logged_in = false;
  public $user_id;
  public $message;
  //public $uname;
  
  function __construct(){
   session_start();
   $this->check_message();
   //$this->check_username();
   $this->check_login();
   if($this->logged_in){
    //action to take when user is logged in
   }
   else{
    //action to take when user is not logged in
   }
  }
  
  public function is_logged_in(){
   return $this->logged_in;
  }
     
  public function login($user=""){
   if($user){
    $this->user_id = $_SESSION['user_id'] = $user;
	$this->logged_in = true;
   }
  } 
  
  public function logout(){
   unset($_SESSION['user_id']);
   unset($this->user_id);
   $this->logged_in = false;
  }
  
  private function check_login(){
   if(isset($_SESSION['user_id'])){
    $this->user_id = $_SESSION['user_id'];
	$this->logged_in = true;
   }
   else{
    unset($this->user_id);
	$this->logged_in = false;
   }
  }
  
  public function message($msg=""){
    if(!empty($msg)){
	 //then this is "set message"
	 $_SESSION['message'] = $msg; 
	} else{
	  //then this is "get message"
	  return $this->message;
	}
  }
  /*
  public function username($usern=""){
    if(!empty($usern)){
	 //then this is "set message"
	 $_SESSION['uname'] = $usern; 
	} else{
	  //then this is "get message"
	  return $this->uname;
	}
  }
  */
  
  private function check_message(){
    //is there a message stored in the session?
	if(isset($_SESSION['message'])){
	   //Add it as an attribute and erase the stored version
	   $this->message = $_SESSION['message'];
	   unset($_SESSION['message']);
	} else {
	  $this->message = "";
	}
  }
  
  /*
   private function check_username(){
    //is there a message stored in the session?
	if(isset($_SESSION['uname'])){
	   //Add it as an attribute and erase the stored version
	   $this->uname = $_SESSION['uname'];
	   unset($_SESSION['uname']);
	} else {
	  $this->uname = "";
	}
  }
  */
  
 }
 
 $session = new Session();
?>