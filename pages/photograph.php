<?php
require_once("initialize.php");
//require_once("functions.php");
require_once("database.php");

class Photograph{
	 public $id;
	 public $filename;
	 public $type;
	 public $size;
	 
	 private $temp_path;
	 protected $upload_dir = "uploads";
	 
	 protected $upload_errors = array(
		UPLOAD_ERR_OK => "No errors.",
		UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL => "Partial upload.",
		UPLOAD_ERR_NO_FILE => "No file.",
		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
		UPLOAD_ERR_EXTENSION => "File upload stopped by extension.",
	 );
	 
	 public $errors = array();
	 
	 //pass in $_FILE(['uploaded_file'] as an argument)
	 public function attach_file($file){
	  //perform error checking on the form parameters
	  if(!$file || empty($file) || !is_array($file)){
	     $this->errors[] = "No file was uploaded";
		 return false;
      } elseif($file['error'] != 0){
	     $this->errors[] = $this->upload_errors[$file['error']];
		 return false;
	  } else{
	     $this->temp_path = $file['tmp_name'];
		 $this->filename = basename($file['name']);
		 $this->type = $file['type'];
		 $this->size = $file['size'];
		 return true;
	  }
	  
	 }
	 
	 public function save(){
	 //cant save if there are preexisting errors
	   if(!empty($this->errors)){
	     return false;
	   }
	   if(empty($this->filename) || empty($this->temp_path)){
	     $this->errors[] = "The file location was not available.";
		 return false;
	   }
	   
	   $target_path = $this->upload_dir .DS. $this->filename;
	   
	   if(file_exists($target_path)){
	     $this->errors[] = "The file {$this->filename} already exists.";
		 return false;
	   }
	   
	   //attempt to move the file
	   if(move_uploaded_file($this->temp_path, $target_path)){
	      //success
		  //we are done with temp_path, the file isn't there anymore
		  unset($this->temp_path);
		  return true;
	   } else{
	      //file was not moved
		  $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
		  return false;
	   }
	   
	 }
}	 

$photograph = new photograph();

?>