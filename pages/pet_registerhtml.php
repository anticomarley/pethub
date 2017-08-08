<?php 
require_once("initialize.php");
require_once("functions.php");
require_once("database.php");
require_once("session.php");
require_once("photograph.php");
require_once("user.php");
?>

<?php 
    $username = $session->user_id;
	$reg_no = $_POST["reg_no"];
	$breed = $_POST["breed"];
	$species = $_POST["species"];
	$genderRadio = $_POST["genderRadio"];
	$date = $_POST["date"];
	$colour_markings = $_POST["colour_markings"];
	$eakc_no = $_POST["eakc_no"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$cellphone = $_POST["cellphone"];
	$telphone = $_POST["telphone"];
	$county = $_POST["county"];
	$country = $_POST["country"];
	$post_box = $_POST["post_box"];
	$post_code = $_POST["post_code"];
	$photo_upload = $_FILES["photo_upload"];
	
	
	
	$vars = array(
	"id" => "",
	"microchip_no" => $reg_no,
	"breed" => $breed,
	"species" => $species,
	"gender" => $genderRadio,
	"dob" => $date,
	"colour_markings" => $colour_markings,
	"eakc_no" => $eakc_no,
	"owner_fname" => $fname,
	"owner_lname" => $lname,
	"email_address" => $email,
	"cellphone" => $cellphone,
	"telephone" => $telphone,
	"po_box" => $post_box,
	"postcode" => $post_code,
	"username" => $username,
	"county" => $county,
	"country" => $country,
	"filename" => $county
	);
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
        <li><a href="indexhtml.php">Home</a></li>
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
			echo "<li class=\"active\"><a href=\"pet_registerhtml.php\">Register Pet</a></li>
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
   
   
   <!-- form -->
   </br></br></br>
   
   <div class="container">
    <div class="row">
	 <div class="col-md-12">
	  </br></br></br>
	  <h2>Pet Register Form</h2><hr/>
	  <form class="form-horizontal" action="pet_registerhtml.php" enctype="multipart/form-data" method="POST">
	   
	   <div class="form-group">
	    <label for="registration" class="col-sm-2 control-label">Microchip Number:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Microchip/Registration Number" id="registration" name="reg_no" value=""/>
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="breed_name" class="col-sm-2 control-label">Breed:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Breed Name" id="breed_name" name="breed" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="animal_species" class="col-sm-2 control-label">Species:</label>
		<div class="col-sm-6">
		 <select class="form-control" name="species" id="animal_species">
		  <option value="dog">Dog</options>
		  <option value="cat">Cat</options>
		  <option value="rabitt">Rabbit</options>
		 </select>	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="gender" class="col-sm-2 control-label">Gender:</label>
		<div class="col-sm-6">
		 <label class="radio-inline">
		  <input type="radio" name="genderRadio" value="Male" />Male
		 </label>
		 <label class="radio-inline">
		  <input type="radio" name="genderRadio" value="Female" />Female
		 </label> 	
		</div>
	   </div>
	   
	   
	   <div class="form-group">
	    <label for="date_of_birth" class="col-sm-2 control-label">Date Of Birth:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Date of birth" id="date_of_birth" name="date" value="" />	
		</div>
	   </div>
	   
	   
	   <div class="form-group">
	    <label for="colour_mark" class="col-sm-2 control-label">Colour Marking:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Colour Markings" id="colour_mark" name="colour_markings" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="eakc_reg_no" class="col-sm-2 control-label">EAKC Registered Number:</label>
		<div class="col-sm-6">
		 <input type="number" class="form-control" placeholder="Enter EAKC Registered Number" id="eakc_reg_no" name="eakc_no" value="" />	
		</div>
	   </div>
		
		
		<div class="form-group">
	    <label for="first_name" class="col-sm-2 control-label">First Name:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Your First Name" id="first_name" name="fname" value="" />	
		</div>
	   </div>
		
		<div class="form-group">
	    <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Your Last Name" id="last_name" name="lname" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="email_address" class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-6">
		 <input type="email" class="form-control" placeholder="Enter Email" id="email_address" name="email" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="cellphone_no" class="col-sm-2 control-label">Cellphone:</label>
		<div class="col-sm-6">
		 <div class="input-group">
		  <span class="input-group-addon">+254</span>
		  <input type="number" class="form-control" placeholder="Enter Cellphone Number" id="cellphone_no" name="cellphone" value="" />	
		 </div> 
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="telphone_no" class="col-sm-2 control-label">Telphone:</label>
		<div class="col-sm-6">
		 <input type="number" class="form-control" placeholder="Enter Your Telphone Number" id="tellphone_no" name="telphone" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="county_name" class="col-sm-2 control-label">County:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Your County or Your location" id="county_name" name="county" value="" />	
		</div>
	   </div>
	   
	   
	   <div class="form-group">
	    <label for="country_name" class="col-sm-2 control-label">Country:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter Your Country" id="country_name" name="country" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="post_office_box" class="col-sm-2 control-label">PO_box:</label>
		<div class="col-sm-6">
		 <input type="number" class="form-control" placeholder="Enter Post Office Box" id="post_office_box" name="post_box" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="post_office_code" class="col-sm-2 control-label">Postal Code:</label>
		<div class="col-sm-6">
		 <input type="number" class="form-control" placeholder="Enter Postal Code" id="post_office_code" name="post_code" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="photo" class="col-sm-2 control-label">Animal's Photo Upload</label>
		<div class="col-sm-6">
		 <input type="hidden" name="Max_File_Size" value="1000000"/>
		 <input type="file"  id="photo" name="photo_upload" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-6">
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		<button type="reset" class="btn btn-default">Clear</button>
		</div>
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
