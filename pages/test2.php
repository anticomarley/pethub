<?php 
require_once("database.php");
require_once("user.php");
/*
if(isset($database)){echo "true";} else{echo "false";}
echo $database->escape_value("truethe's fjff'ddd");

$sql = "INSERT INTO test (id, fname, lname, adm_no)" ;
$sql .= "VALUES (1, 'ttttttttttt', 'hgdhgdk', 'fhghfj')" ;

$result = $database->query($sql);
*/

/*
$ass = array(
"id" => "",
"fname" => "kajjhhhhhhhhhhh",
"lname" => "skjfsk",
"adm_no" => "jdfdf"
);
//$user->id = 3;
$user->variables = $ass;
User::$table_name = "test2";
if($user->create()){
  echo "inserted successfully";
}
else{
  echo "failed";
}
*/

$username = "kgjgljg";
$email = "hjfjhf";
$password = "ljgjgk";

$vars = array(
"id" => "",
"username" => $username,
"email" => $email,
"password" => $password
);
/*
$vars = array(
"id" => "",
"username" => "{$username}",
"email" => "{$email}",
"password" => "{$password}"
);
*/
$user->variables = $vars;
User::$table_name = "sign_up";

if($user->save()){
  echo "inserted successfully";
}
else{
  echo "failed";
}

/*
echo "dgdggdgdd";
$ass = array(
"id" => "1",
"fname" => "kajj",
"lname" => "skjfsk",
"adm_no" => "jdfdf"
);
*/
?>