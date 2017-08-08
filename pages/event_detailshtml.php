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
        <li class="active"><a href="#">Home</a></li>
		<li><a href="#">Events</a></li>
		<li><a href="#">Breeders</a></li>
		<li><a href="#">Vets</a></li>
		<li><a href="#">Clubs</a></li>
		<li><a data-toggle="modal" data-target="#contact">Contact Us</a></li>
	  </ul>	
	  <form action="" class="navbar-form navbar-left" role="search">
	   <div class="form-group">
		<input type="text" placeholder="search microchip no." class="form-control">
       </div>
	   <button type="submit" class="btn btn-info">Search</button>	  
	  </form>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="#">Register Pet</a></li>
		<li><a data-toggle="modal" data-target="#signin">Update Details</a></li>
		<li><a href="#">Lost A Pet?</a></li>
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
		  <input type="text" class="form-control" id="contact-name" placeholder="Enter Full Name">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="contact-email" class="col-lg-2 control-label">Email:</label>
		 <div class="col-lg-10">
		  <input type="email" class="form-control" id="contact-email" placeholder="you@example.com">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="contact-msg" class="col-lg-2 control-label">Message:</label>
		 <div class="col-lg-10">
		  <textarea class="form-control" id="contact-msg" rows="8"></textarea>
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
   
   <!-- Modal window for REGISTER PET -->
   <div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog">
	 <div class="modal-content">
	  <form class="form-horizontal">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">Please sign in</h4>
	   </div>
	   <div class="modal-body">
	   
	    <div class="form-group">
		 <label for="signin-email" class="col-lg-2 control-label">Email</label>
		 <div class="col-lg-10">
		  <input type="email" class="form-control" id="signin-email" placeholder="Email">
		 </div>
		</div>
		
		<div class="form-group">
		 <label for="signin-password" class="col-lg-2 control-label">Password:</label>
		 <div class="col-lg-10">
		  <input type="password" class="form-control" id="signin-password" placeholder="Password">
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
   
   
   <!-- form -->
   </br></br></br></br></br></br>
   
   <div class="container">
    <div class="row">
	 <div class="col-md-12">
	  <h2>Create Event Form</h2><hr/>
	  <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
	   
	   <div class="form-group">
	    <label for="event_name" class="col-sm-2 control-label">Event Name:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter The Event Name" id="event_name" name="name" value=""/>
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="event_name" class="col-sm-2 control-label">Venue:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter The Event Venue" id="event_venue" name="venue" value=""/>
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="event_date" class="col-sm-2 control-label">Event Date:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter The Event Date" id="event_date" name="date" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="event_time" class="col-sm-2 control-label">Event Time:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter The Event Time" id="event_time" name="time" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="club_name" class="col-sm-2 control-label">Dog Club:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="Enter The Dog Club Name" id="club_name" name="club" value="" />	
		</div>
	   </div>
	   
	   
	   <div class="form-group">
	    <label for="event_description" class="col-sm-2 control-label">Event Description:</label>
		<div class="col-sm-6">
		 <input type="text" class="form-control" placeholder="The event's description" id="event_description" name="description" value="" />	
		</div>
	   </div>
	   
	   <div class="form-group">
	    <label for="event_pic" class="col-sm-2 control-label">Event Picture:</label>
		<div class="col-sm-6">
		 <input type="hidden" name="" value=""/>
		 <input type="file"  id="event_pic" name="photo_upload" value="" />
		</div>
	   </div>
	   
	   
	   <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-6">
		<button type="submit" class="btn btn-primary" value="submit">Submit</button>
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