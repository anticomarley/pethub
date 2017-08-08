<?php
require_once("initialize.php");
require_once("database.php");
require_once("photograph.php");
require_once("functions.php");
//if(!$session->is_logged_in()){ redirect_to("indexhtml.php")}
?>


<?php
/*
if(isset($database)){echo "true";} else{echo "false";}

$sql = "INSERT INTO test (id, fname, lname, adm_no)" ;
$sql .= "VALUES (1, 'jdkjgdgj', 'hgdhgdk', 'fhghfj')" ;

$result = $database->query($sql);
*/
$max_file_size = 1048576;
//expressed in byte
//10240 = 10KB
//102400 = 100KB
//1048576 = 1MB
//10485760 = 10MB

if(isset($_POST['submit'])){
  $photograph->attach_file($_FILES['photo_upload']);
  if($photograph->save()){
    //success
	$session->message("photograph uploaded successfully");
	//redirect_to('list.php');
  } else {
    $message = join("<br/>", $photograph->errors);
  }
}
 
?>
<?php // include_layout_template('admin_header.php'); ?>

<h2>Photo Upload</h2>

<?php echo $message;?>
<form class="form-horizontal" action="test.php" enctype="multipart/form-data" method="POST">
   <label for="photo">Animal's Photo Upload</label>
		 <input type="hidden" name="Max_File_Size" value="<?php echo $max_file_size ?>"/>
		 <input type="file"  id="photo" name="photo_upload" value="" />	
		
		<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		<button type="reset" class="btn btn-default">Clear</button>	   
</form>

<?php // include_layout_template('admin_header.php');  ?>



<?php /* foreach($photos as $photo):?>
 <?php echo $photo->filename; ?>
 <?php echo $photo->caption; ?>
 <?php <a href="delete_photo.php?id= <? php echo $photo->id; ?>">Delete</a>?>
<?php endforeach; */ ?>


