<?php 
require_once("database.php");

class User{
/*
 public $id = "";
 public $fname = "hfjfhfjdl";
 public $lname = "jsfghhhhh";
 public $adm_no = "lllsjsjs";
 */
 public $id;
 public static $table_name;
 public $variables;
 //public id = $variables[id];
 
 /*
 public function create_object_vars($vars){
	   foreach($vars as $var => $value){
		 public $var = $value;
	   }
 }
 */
 public function destroy(){
   //first remove database entry
   if($this->delete()){
     //then remove the file
	 $target_path = $photograph->upload_dir .DS. $photograph->filename;
	 return unlink($target_path) ? true : false;
   } else {
     return false;
   }
 }
 
 //public static function image_path(){}
 //public function size_as_text(){}
 
 public static function find_all(){
   return self::find_by_sql("SELECT * FROM ".self::$table_name);
 }
 
 public static function find_by_id($id=0){
   global $database;
   //$result_array = self::find_by_sql("SELECT *FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
   $result_array = self::find_by_sql("SELECT *FROM ".self::$table_name." WHERE id=".$database->escape_value($id)." LIMIT 1");
   //$found = $database->fetch_array($result_set);
   //return $found
   return !empty($result_array) ? array_shift($result_array) : false;
 }
 
 public static function find_by_sql($sql=""){
   global $database;
   $result_set = $database->query($sql); 
   //return $result_set;
   $object_array = array();
   while($row = $database->fetch_array($result_set)){
     $object_array[] = self::instantiate($row);
   }
   return $object_array;
 }
 
 public function full_name(){
   if(isset($this->first_name) && isset($this->last_name)){
     return $this->first_name . " " . $this->last_name;
   } else{
     return "";
   }
 }
 
 private static function instantiate($record){
  $object = new self;
  //$object->id = $record['id'];
  //$object->username = $record['username'];
  //$object->password = $record['password'];
  //$object->first_name = $record['first_name'];
  //$object->last_name = $record['last_name'];
 
  foreach($record as $attribute=>$value){
    if($object->has_attribute($attribute)){
	  $object->$attribute = $value;
	}
  }
  return $object;
 }
 
 private function has_attribute($attribute){
   //get_object_vars returns an associative array with all attributes
   //(incl.private ones!) as the keys and their current values as the value
   $object_vars = $this->attributes();
   //we dont care about the value, we just want to know if the key exists
   //will return true or false
   return array_key_exists($attribute, $object_vars);
 }
 
 
 public function attributes(){
   //return an array of attribute keys and their values
   /*
   $attributes = array();
   foreach(self::$db_fields as $field){
     if(property_exists($this, $field)){
	   $attributes[$field] = $this->$field;
	 }
   }
   return $attributes;
   */
   
   //return get_object_vars($this);
   return $this->variables;
 }
 
 
 public function sanitized_attributes(){
   global $database;
   $clean_attributes = array();
   //sanitize values before submitting
   foreach($this->attributes() as $key => $value){
     $clean_attributes[$key] = $database->escape_value($value);
   }
   return $clean_attributes;
 }
 
 public function delete(){
   $sql = "DELETE FROM ".self::$table_name;
   $sql .= " Where id=". $database->escape_value($this->id);
   $sql .= " LIMIT 1";
   $database->quuery($sql);
   return ($database->affected_row() == 1) ? true : false;
 }
 
 public function update(){
   global $database;
   
   //$attributes = $this->attributes();
   /*
   $sql = "UPDATE ".self::$table_name." SET ";
   $sql .= "username='". $database->escape_value($this->username)."', ";
   $sql .= "password='". $database->escape_value($this->password)."', ";
   $sql .= "last_name='". $database->escape_value($this->last_name)."' ";
   $sql .= "WHERE id=". $database->escape_value($this->id);
   $database->query($sql);
   */
   $attributes = $this->sanitized_attributes();
   $attribute_pairs = array();
   foreach($attributes as $key => $value){
     $attribute_pairs[] = "{$key}='{$value}'";
   }
   $sql = "UPDATE ".self::$table_name." SET ";
   $sql .= join(", ", $attribute_pairs);
   $sql .= " WHERE id=". $database->escape_value($this->id);
   $database->query($sql);
   return ($database-affected_rows()==1) ? true : false;
 }
 
 public function save(){
   //A new record won't have an id yet
   return isset($this->id) ? $this->update() : $this->create();
 }

 public function create(){
   global $database; 
   $attributes = $this->sanitized_attributes();
   /*$sql = "INSERT INTO ".self::$table_name." (";  
   $sql .= "username, password, firstname,lastname";
   $sql .= ") VALUES ('";
   $sql .= $database->escape_value($this->username)."', '";
   $sql .= $database->escape_value($this->password)."', '";
   $sql .= $database->escape_value($this->last_name)."')";
   */
   $sql = "INSERT INTO ".self::$table_name." (";
   $sql .= join(", ", array_keys($attributes));
   $sql .= ") VALUES ('";
   $sql .= join("', '", array_values($attributes));
   $sql .= "')";
   if($database->query($sql)){
     $this->id = $database->insert_id();
	 return true;
   } else {
     return false;
   }
 }
 
 public static function authenticate($username = "", $password=""){}
 
}
	 
$user = new User();
?>