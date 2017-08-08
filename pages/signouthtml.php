<?php
require_once("functions.php");
require_once("session.php");

$session->logout();
redirect_to("indexhtml.php");

?> 

