<?php 
require_once("initialize.php");
require_once("functions.php");
require_once("database.php");
require_once("session.php");
require_once("photograph.php");
require_once("user.php");
?>

<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/reverse.css" rel="stylesheet">
 </head>
 <body>
 
  
   <!-- navbar -->	
   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
	<div class="navbar-header">
	     <a class="navbar-brand" href="#">EAST AFRICAN KENNEL CLUB</a>
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		 </button>
	 </div>	 
	 <div class="collapse navbar-collapse navHeaderCollapse">
	  <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="indexhtml.php">Home</a></li>
		<li><a href="eventshtml.php">Events</a></li>
		<li><a href="breedershtml.php">Breeders</a></li>
		<li><a href="vetshtml.php">Vets</a></li>
		<li><a href="clubshtml.php">Clubs</a></li>
		<li><a data-toggle="modal" data-target="#contact">Contact Us</a></li>
	  </ul>	
	  <form action="" class="navbar-form navbar-left" role="search">
	   <div class="form-group">
		<input type="text" placeholder="search microchip no." class="form-control">
       </div>
	   <button type="submit" class="btn btn-info">Search</button>	  
	  </form>
	  <ul class="nav navbar-nav navbar-right">
	   <?php if(!$session->is_logged_in()){ 
	    echo "<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#signin\">SignIn</a></li>
		<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#signup\">SignUp</a></li>";
	    } else{ 
			echo "<li><a href=\"pet_registerhtml.php\">Register Pet</a></li>
			<li><a href=\"pet_losthtml.php\">Lost A Pet?</a></li>
			<li><a href=\"signouthtml.php\">SignOut</a></li>";
	    } 
	   ?>	
	  </ul>	
	 </div>
	</div>
   </div>
   
   <!-- Modal window for CONTACT US DETAILS -->
   <div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
	 <div class="modal-content">
	  <form class="form-horizontal">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Contact The East African Kennel Club</h4>
	   </div>
	   <div class="modal-body">
	   
	    <div class="form-group">
		 <label for="contact-name" class="col-lg-2 control-label">Name:</label>
		 <div class="col-lg-10">
		  <input type="text" class="form-control" id="contact-name" name="name" value="" placeholder="Enter Full Name">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="contact-email" class="col-lg-2 control-label">Email:</label>
		 <div class="col-lg-10">
		  <input type="email" class="form-control" id="contact-email" name="email" value="" placeholder="you@example.com">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="contact-msg" class="col-lg-2 control-label">Message:</label>
		 <div class="col-lg-10">
		  <textarea class="form-control" id="contact-msg" name="message" value="" rows="8"></textarea>
		 </div>
		</div>
		
	   </div>
	   <div class="modal-footer">
	    <a class="btn btn-default" data-dismiss="modal">Close</a>
		<button class="btn btn-primary" type="submit">Send</button>
	   </div>
	  </form>
	 </div>
	</div>
   </div>
   
   <!-- Modal window for Sign in -->
   <div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog">
	 <div class="modal-content">
	  <form class="form-horizontal" action="signinhtml.php" method="POST">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Please Sign In</h4>
	   </div>
	   <div class="modal-body">
	   
	    <div class="form-group">
		 <label for="username_signin" class="col-lg-2 control-label">User Name:</label>
		 <div class="col-lg-10">
		  <input type="text" class="form-control" id="username_signin" name="username" value="" placeholder="Enter Username">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="signin_password" class="col-lg-2 control-label">Password:</label>
		 <div class="col-lg-10">
		  <input type="password" class="form-control" id="signin_password" name="password" value="" placeholder="Password">
		 </div>
		</div>
		
		<div class="form-group">
         <div class="col-lg-offset-2 col-lg-10">
          <div class="checkbox">
           <label>
            <input type="checkbox"> Remember me
           </label>
          </div>
         </div>
        </div>
		
	   </div>
	   <div class="modal-footer">
	    <a class="btn btn-default" data-dismiss="modal">Close</a>
		<button class="btn btn-primary" type="submit">Sign in</button>
	   </div>
	  </form>
	 </div>
	</div>
   </div>
   
   
   
   <!-- Modal window for Sign up -->
   <div class="modal fade" id="signup" role="dialog">
    <div class="modal-dialog">
	 <div class="modal-content">
	  <form class="form-horizontal" action="signuphtml.php" method="POST">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Please Sign Up</h4>
	   </div>
	   <div class="modal-body">
	   
	    <div class="form-group">
		 <label for="username_signup" class="col-lg-2 control-label">User Name:</label>
		 <div class="col-lg-10">
		  <input type="text" class="form-control" id="username_signup" name="username" value="" placeholder="Enter Username">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="email_address" class="col-lg-2 control-label">Email:</label>
		 <div class="col-lg-10">
		  <input type="email" class="form-control" id="email_address" name="email" value="" placeholder="Email">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="signup_password" class="col-lg-2 control-label">Password:</label>
		 <div class="col-lg-10">
		  <input type="password" class="form-control" id="signup_password" name="password" value="" placeholder="Password">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="retype_password" class="col-lg-2 control-label">Retype Password:</label>
		 <div class="col-lg-10">
		  <input type="password" class="form-control" id="retype_password" placeholder="Retype Password">
		 </div>
		</div>
		
		<div class="form-group">
         <div class="col-lg-offset-2 col-lg-10">
          <div class="checkbox">
           <label>
            <input type="checkbox"> Remember me
           </label>
          </div>
         </div>
        </div>
		
	   </div>
	   <div class="modal-footer">
	    <a class="btn btn-default" data-dismiss="modal">Close</a>
		<button class="btn btn-primary" type="submit">Sign Up</button>
	   </div>
	  </form>
	 </div>
	</div>
   </div>   
  
   <script src="../js/jquery-1.10.2.min"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
 </body>
</html> 